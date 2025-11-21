<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ShoppingCartController extends Controller
{
    /**
     * Get current user's shopping cart.
     */
    public function getCart(): JsonResponse
    {
        try {
            $userId = Auth::id();
            
            $cartItems = ShoppingCart::where('user_id', $userId)
                ->with('menuItem.category')
                ->get();

            $total = $cartItems->sum(function ($item) {
                return $item->quantity * $item->menuItem->price;
            });

            return response()->json([
                'success' => true,
                'data' => [
                    'items' => $cartItems,
                    'total_items' => $cartItems->sum('quantity'),
                    'subtotal' => $total,
                    'total' => $total // Can add taxes, fees, discounts here
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Add item to shopping cart.
     */
    public function addToCart(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'menu_item_id' => 'required|integer|exists:menu_items,id',
                'quantity' => 'required|integer|min:1|max:99',
                'special_instructions' => 'nullable|string|max:500',
                'people_count' => 'nullable|integer|min:1|max:20'
            ]);

            $userId = Auth::id();
            $menuItemId = $request->menu_item_id;

            // Check if menu item is available
            $menuItem = MenuItem::available()->findOrFail($menuItemId);

            DB::beginTransaction();

            // Check if item already exists in cart
            $cartItem = ShoppingCart::where('user_id', $userId)
                ->where('menu_item_id', $menuItemId)
                ->first();

            if ($cartItem) {
                // Update existing cart item
                $cartItem->quantity += $request->quantity;
                if ($request->has('special_instructions')) {
                    $cartItem->special_instructions = $request->special_instructions;
                }
                if ($request->has('people_count')) {
                    $cartItem->people_count = $request->people_count;
                }
                $cartItem->save();
            } else {
                // Create new cart item
                $cartItem = ShoppingCart::create([
                    'user_id' => $userId,
                    'menu_item_id' => $menuItemId,
                    'quantity' => $request->quantity,
                    'special_instructions' => $request->special_instructions,
                    'people_count' => $request->people_count
                ]);
            }

            DB::commit();

            // Load the cart item with related data
            $cartItem->load('menuItem.category');

            return response()->json([
                'success' => true,
                'message' => 'Item added to cart successfully',
                'data' => $cartItem
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Error adding item to cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update cart item quantity.
     */
    public function updateCartItem(Request $request, int $cartItemId): JsonResponse
    {
        try {
            $request->validate([
                'quantity' => 'required|integer|min:1|max:99',
                'special_instructions' => 'nullable|string|max:500',
                'people_count' => 'nullable|integer|min:1|max:20'
            ]);

            $userId = Auth::id();
            
            $cartItem = ShoppingCart::where('user_id', $userId)
                ->where('id', $cartItemId)
                ->firstOrFail();

            $cartItem->update([
                'quantity' => $request->quantity,
                'special_instructions' => $request->special_instructions,
                'people_count' => $request->people_count
            ]);

            $cartItem->load('menuItem.category');

            return response()->json([
                'success' => true,
                'message' => 'Cart item updated successfully',
                'data' => $cartItem
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating cart item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove item from shopping cart.
     */
    public function removeFromCart(int $cartItemId): JsonResponse
    {
        try {
            $userId = Auth::id();
            
            $cartItem = ShoppingCart::where('user_id', $userId)
                ->where('id', $cartItemId)
                ->firstOrFail();

            $cartItem->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error removing item from cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Clear entire shopping cart.
     */
    public function clearCart(): JsonResponse
    {
        try {
            $userId = Auth::id();
            
            ShoppingCart::where('user_id', $userId)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Cart cleared successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error clearing cart',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get cart summary (total items and amount).
     */
    public function getCartSummary(): JsonResponse
    {
        try {
            $userId = Auth::id();
            
            $cartItems = ShoppingCart::where('user_id', $userId)
                ->with('menuItem')
                ->get();

            $totalItems = $cartItems->sum('quantity');
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->quantity * $item->menuItem->price;
            });

            return response()->json([
                'success' => true,
                'data' => [
                    'total_items' => $totalItems,
                    'total_amount' => $totalAmount
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching cart summary',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
