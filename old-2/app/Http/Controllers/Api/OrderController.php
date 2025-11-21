<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatusHistory;
use App\Models\ShoppingCart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * Create order from shopping cart.
     */
    public function createOrder(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'notes' => 'nullable|string|max:1000',
                'delivery_time' => 'nullable|date|after:now',
                'delivery_location' => 'nullable|string|max:255'
            ]);

            $userId = Auth::id();

            // Get cart items
            $cartItems = ShoppingCart::where('user_id', $userId)
                ->with('menuItem')
                ->get();

            if ($cartItems->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cart is empty'
                ], 400);
            }

            DB::beginTransaction();

            // Calculate totals
            $subtotal = $cartItems->sum(function ($item) {
                return $item->quantity * $item->menuItem->price;
            });

            // Create order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'user_id' => $userId,
                'status' => 'pending',
                'subtotal' => $subtotal,
                'total_amount' => $subtotal, // Can add taxes, fees, discounts here
                'notes' => $request->notes,
                'delivery_time' => $request->delivery_time,
                'delivery_location' => $request->delivery_location
            ]);

            // Create order items
            foreach ($cartItems as $cartItem) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $cartItem->menu_item_id,
                    'quantity' => $cartItem->quantity,
                    'unit_price' => $cartItem->menuItem->price,
                    'total_price' => $cartItem->quantity * $cartItem->menuItem->price,
                    'special_instructions' => $cartItem->special_instructions
                ]);
            }

            // Create initial status history
            OrderStatusHistory::create([
                'order_id' => $order->id,
                'status' => 'pending',
                'previous_status' => null,
                'notes' => 'Order created',
                'changed_by' => $userId
            ]);

            // Clear shopping cart
            ShoppingCart::where('user_id', $userId)->delete();

            DB::commit();

            // Load order with relationships
            $order->load(['items.menuItem', 'user']);

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully',
                'data' => $order
            ], 201);

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
                'message' => 'Error creating order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get user's orders.
     */
    public function getUserOrders(Request $request): JsonResponse
    {
        try {
            $userId = Auth::id();
            
            $status = $request->get('status');
            $perPage = $request->get('per_page', 15);

            $query = Order::where('user_id', $userId)
                ->with(['items.menuItem', 'statusHistory'])
                ->orderBy('created_at', 'desc');

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
     * Get specific order details.
     */
    public function getOrderDetails(int $orderId): JsonResponse
    {
        try {
            $userId = Auth::id();
            
            $order = Order::where('user_id', $userId)
                ->where('id', $orderId)
                ->with(['items.menuItem.category', 'statusHistory.changedBy', 'user'])
                ->firstOrFail();

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
     * Cancel an order (only if status is pending or confirmed).
     */
    public function cancelOrder(Request $request, int $orderId): JsonResponse
    {
        try {
            $request->validate([
                'cancellation_reason' => 'required|string|max:500'
            ]);

            $userId = Auth::id();
            
            $order = Order::where('user_id', $userId)
                ->where('id', $orderId)
                ->firstOrFail();

            if (!in_array($order->status, ['pending', 'confirmed'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Order cannot be cancelled at this stage'
                ], 400);
            }

            DB::beginTransaction();

            $previousStatus = $order->status;
            
            $order->update([
                'status' => 'cancelled',
                'cancellation_reason' => $request->cancellation_reason,
                'cancelled_at' => now()
            ]);

            // Add status history
            OrderStatusHistory::create([
                'order_id' => $order->id,
                'status' => 'cancelled',
                'previous_status' => $previousStatus,
                'notes' => 'Order cancelled by customer: ' . $request->cancellation_reason,
                'changed_by' => $userId
            ]);

            DB::commit();

            $order->load(['items.menuItem', 'statusHistory']);

            return response()->json([
                'success' => true,
                'message' => 'Order cancelled successfully',
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
                'message' => 'Error cancelling order',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get order status options.
     */
    public function getOrderStatuses(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'pending' => 'Pending',
                'confirmed' => 'Confirmed',
                'preparing' => 'Preparing',
                'ready' => 'Ready',
                'delivered' => 'Delivered',
                'cancelled' => 'Cancelled'
            ]
        ]);
    }

    /**
     * Reorder - Add items from a previous order to cart.
     */
    public function reorder(int $orderId): JsonResponse
    {
        try {
            $userId = Auth::id();
            
            $order = Order::where('user_id', $userId)
                ->where('id', $orderId)
                ->with('items.menuItem')
                ->firstOrFail();

            DB::beginTransaction();

            $addedItems = [];
            
            foreach ($order->items as $orderItem) {
                // Check if menu item is still available
                if ($orderItem->menuItem && $orderItem->menuItem->is_available && $orderItem->menuItem->is_active) {
                    // Check if item already exists in cart
                    $cartItem = ShoppingCart::where('user_id', $userId)
                        ->where('menu_item_id', $orderItem->menu_item_id)
                        ->first();

                    if ($cartItem) {
                        $cartItem->quantity += $orderItem->quantity;
                        $cartItem->save();
                    } else {
                        ShoppingCart::create([
                            'user_id' => $userId,
                            'menu_item_id' => $orderItem->menu_item_id,
                            'quantity' => $orderItem->quantity,
                            'special_instructions' => $orderItem->special_instructions
                        ]);
                    }
                    
                    $addedItems[] = $orderItem->menuItem->name;
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Items added to cart successfully',
                'data' => [
                    'added_items' => $addedItems,
                    'total_added' => count($addedItems)
                ]
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error processing reorder',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
