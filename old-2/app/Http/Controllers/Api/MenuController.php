<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuCategoryResource;
use App\Http\Resources\MenuItemResource;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Get all menu categories with their active items.
     */
    public function getCategories(): JsonResponse
    {
        try {
            $categories = MenuCategory::active()
                ->with(['activeMenuItems' => function ($query) {
                    $query->orderBy('sort_order', 'asc');
                }])
                ->orderBy('sort_order', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => MenuCategoryResource::collection($categories)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching menu categories',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get menu items by category.
     */
    public function getItemsByCategory(int $categoryId): JsonResponse
    {
        try {
            $category = MenuCategory::active()->findOrFail($categoryId);
            
            $items = MenuItem::available()
                ->where('category_id', $categoryId)
                ->orderBy('sort_order', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'category' => $category,
                    'items' => $items
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching menu items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get detailed information about a specific menu item.
     */
    public function getItemDetails(int $itemId): JsonResponse
    {
        try {
            $item = MenuItem::available()
                ->with('category')
                ->findOrFail($itemId);

            return response()->json([
                'success' => true,
                'data' => $item
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Menu item not found',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Search menu items by name or description.
     */
    public function searchItems(Request $request): JsonResponse
    {
        try {
            $query = $request->get('q', '');
            
            if (empty($query)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Search query is required'
                ], 400);
            }

            $items = MenuItem::available()
                ->with('category')
                ->where(function ($q) use ($query) {
                    $q->where('name', 'LIKE', "%{$query}%")
                      ->orWhere('description', 'LIKE', "%{$query}%")
                      ->orWhere('ingredients', 'LIKE', "%{$query}%");
                })
                ->orderBy('sort_order', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $items,
                'query' => $query
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error searching menu items',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get featured or recommended items.
     */
    public function getFeaturedItems(): JsonResponse
    {
        try {
            // For now, we'll get the first 6 available items
            // This could be enhanced with a 'featured' flag in the database
            $items = MenuItem::available()
                ->with('category')
                ->limit(6)
                ->orderBy('sort_order', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'data' => $items
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching featured items',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
