<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatusHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderManagementController extends Controller
{
    /**
     * Get all orders for admin management.
     */
    public function getAllOrders(Request $request): JsonResponse
    {
        try {
            $status = $request->get('status');
            $perPage = $request->get('per_page', 20);
            $orderBy = $request->get('order_by', 'created_at');
            $orderDirection = $request->get('order_direction', 'desc');

            $query = Order::with(['items.menuItem', 'user', 'statusHistory'])
                ->orderBy($orderBy, $orderDirection);

            if ($status) {
                $query->where('status', $status);
            }

            $orders = $query->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $orders
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get orders statistics for dashboard.
     */
    public function getOrderStats(): JsonResponse
    {
        try {
            $today = now()->startOfDay();
            $thisWeek = now()->startOfWeek();
            $thisMonth = now()->startOfMonth();

            $stats = [
                'today' => [
                    'total_orders' => Order::whereDate('created_at', $today)->count(),
                    'total_revenue' => Order::whereDate('created_at', $today)
                        ->whereNotIn('status', ['cancelled'])
                        ->sum('total_amount'),
                    'pending_orders' => Order::whereDate('created_at', $today)
                        ->where('status', 'pending')->count(),
                    'completed_orders' => Order::whereDate('created_at', $today)
                        ->where('status', 'delivered')->count(),
                ],
                'this_week' => [
                    'total_orders' => Order::where('created_at', '>=', $thisWeek)->count(),
                    'total_revenue' => Order::where('created_at', '>=', $thisWeek)
                        ->whereNotIn('status', ['cancelled'])
                        ->sum('total_amount'),
                ],
                'this_month' => [
                    'total_orders' => Order::where('created_at', '>=', $thisMonth)->count(),
                    'total_revenue' => Order::where('created_at', '>=', $thisMonth)
                        ->whereNotIn('status', ['cancelled'])
                        ->sum('total_amount'),
                ],
                'status_breakdown' => Order::select('status', DB::raw('count(*) as count'))
                    ->whereDate('created_at', $today)
                    ->groupBy('status')
                    ->get()
                    ->pluck('count', 'status')
                    ->toArray()
            ];

            return response()->json([
                'success' => true,
                'data' => $stats
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching order statistics',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update order status.
     */
    public function updateOrderStatus(Request $request, int $orderId): JsonResponse
    {
        try {
            $request->validate([
                'status' => 'required|string|in:pending,confirmed,preparing,ready,delivered,cancelled',
                'notes' => 'nullable|string|max:500'
            ]);

            $order = Order::findOrFail($orderId);
            $previousStatus = $order->status;
            $newStatus = $request->status;

            // Validate status transition
            if (!$this->isValidStatusTransition($previousStatus, $newStatus)) {
                return response()->json([
                    'success' => false,
                    'message' => "Invalid status transition from {$previousStatus} to {$newStatus}"
                ], 400);
            }

            DB::beginTransaction();

            // Update order status and timestamps
            $updateData = ['status' => $newStatus];
            
            switch ($newStatus) {
                case 'confirmed':
                    $updateData['confirmed_at'] = now();
                    break;
                case 'preparing':
                    $updateData['prepared_at'] = now();
                    break;
                case 'delivered':
                    $updateData['delivered_at'] = now();
                    break;
                case 'cancelled':
                    $updateData['cancelled_at'] = now();
                    if ($request->has('cancellation_reason')) {
                        $updateData['cancellation_reason'] = $request->cancellation_reason;
                    }
                    break;
            }

            $order->update($updateData);

            // Add status history
            OrderStatusHistory::create([
                'order_id' => $order->id,
                'status' => $newStatus,
                'previous_status' => $previousStatus,
                'notes' => $request->notes ?: "Status changed from {$previousStatus} to {$newStatus}",
                'changed_by' => Auth::id()
            ]);

            DB::commit();

            $order->load(['items.menuItem', 'user', 'statusHistory']);

            return response()->json([
                'success' => true,
                'message' => 'Order status updated successfully',
                'data' => $order
            ]);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error updating order status',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get orders by status for kitchen/preparation management.
     */
    public function getOrdersByStatus(string $status): JsonResponse
    {
        try {
            $validStatuses = ['pending', 'confirmed', 'preparing', 'ready', 'delivered', 'cancelled'];
            
            if (!in_array($status, $validStatuses)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid status'
                ], 400);
            }

            $orders = Order::where('status', $status)
                ->with(['items.menuItem', 'user'])
                ->orderBy('created_at', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $orders
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get order details for admin.
     */
    public function getOrderDetails(int $orderId): JsonResponse
    {
        try {
            $order = Order::with([
                'items.menuItem.category',
                'user',
                'statusHistory.changedBy'
            ])->findOrFail($orderId);

            return response()->json([
                'success' => true,
                'data' => $order
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Order not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Get active orders (not delivered or cancelled).
     */
    public function getActiveOrders(): JsonResponse
    {
        try {
            $orders = Order::whereNotIn('status', ['delivered', 'cancelled'])
                ->with(['items.menuItem', 'user'])
                ->orderBy('created_at', 'asc')
                ->get()
                ->groupBy('status');

            return response()->json([
                'success' => true,
                'data' => $orders
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching active orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Bulk update order statuses.
     */
    public function bulkUpdateStatus(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'order_ids' => 'required|array',
                'order_ids.*' => 'integer|exists:orders,id',
                'status' => 'required|string|in:confirmed,preparing,ready,delivered,cancelled',
                'notes' => 'nullable|string|max:500'
            ]);

            $orderIds = $request->order_ids;
            $newStatus = $request->status;
            $notes = $request->notes;

            DB::beginTransaction();

            $updatedOrders = [];

            foreach ($orderIds as $orderId) {
                $order = Order::findOrFail($orderId);
                $previousStatus = $order->status;

                if ($this->isValidStatusTransition($previousStatus, $newStatus)) {
                    $order->update(['status' => $newStatus]);

                    OrderStatusHistory::create([
                        'order_id' => $order->id,
                        'status' => $newStatus,
                        'previous_status' => $previousStatus,
                        'notes' => $notes ?: "Bulk status change from {$previousStatus} to {$newStatus}",
                        'changed_by' => Auth::id()
                    ]);

                    $updatedOrders[] = $order->id;
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Orders updated successfully',
                'data' => [
                    'updated_orders' => $updatedOrders,
                    'total_updated' => count($updatedOrders)
                ]
            ]);

        } catch (ValidationException $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error updating orders',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check if status transition is valid.
     */
    private function isValidStatusTransition(string $currentStatus, string $newStatus): bool
    {
        $allowedTransitions = [
            'pending' => ['confirmed', 'cancelled'],
            'confirmed' => ['preparing', 'cancelled'],
            'preparing' => ['ready', 'cancelled'],
            'ready' => ['delivered'],
            'delivered' => [], // No transitions from delivered
            'cancelled' => [] // No transitions from cancelled
        ];

        return in_array($newStatus, $allowedTransitions[$currentStatus] ?? []);
    }
}
