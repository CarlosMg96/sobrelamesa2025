<?php

use App\Http\Controllers\Api\DealController;
use App\Http\Controllers\Api\PartyController; // Agregar esta línea
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\LawFirmController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PracticeAreaController;
// Restaurant API Controllers
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\ShoppingCartController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderManagementController;
use App\Http\Requests\TokenRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('hi', function () {
    return ['success' => true];
});

// Route::post('/login', function (TokenRequest $request) {
//     $user = User::where('email', $request->email)->first();

//     if (! $user || ! Hash::check($request->password, $user->password)) {
//         throw ValidationException::withMessages([
//             'email' => 'The provided credentials are incorrect.',
//         ]);
//     }
//     return response()->json([
//         'token' => $user->createToken('API Token')->plainTextToken,
//         'user' => $user,
//     ], 200);
// });
Route::post('/login', [LoginController::class, 'login']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('me', function (Request $request) {
        return $request->user();
    });
    
    Route::get('deals', [DealController::class, 'index']);
    Route::get('deals/{id}', [DealController::class, 'show']);
    Route::post('deals', [DealController::class, 'store']);
    Route::put('deals/{id}', [DealController::class, 'update']);
    Route::delete('deals/{id}', [DealController::class, 'destroy']);
    
    Route::get('parties', [PartyController::class, 'index']);
    Route::get('parties/{id}', [PartyController::class, 'show']);
    Route::post('parties', [PartyController::class, 'store']);
    Route::put('parties/{id}', [PartyController::class, 'update']);
    Route::delete('parties/{id}', [PartyController::class, 'destroy']);
    
    Route::prefix('clients')->group(function () {
        Route::get('/', [ClientController::class, 'index']);
        Route::get('/{id}', [ClientController::class, 'show']);
        Route::post('/', [ClientController::class, 'store']);
        Route::put('/{id}', [ClientController::class, 'update']);
        Route::delete('/{id}', [ClientController::class, 'destroy']);
    });
    
    Route::prefix('law-firms')->group(function () {
        Route::get('/', [LawFirmController::class, 'index']);
        Route::get('/{id}', [LawFirmController::class, 'show']);
        Route::post('/', [LawFirmController::class, 'store']);
        Route::put('/{id}', [LawFirmController::class, 'update']);
        Route::delete('/{id}', [LawFirmController::class, 'destroy']);
    });

    Route::prefix('practice-areas')->group(function () {
        Route::get('/', [PracticeAreaController::class, 'index']);
        Route::get('/{id}', [PracticeAreaController::class, 'show']);
        Route::post('/', [PracticeAreaController::class, 'store']);
        Route::put('/{id}', [PracticeAreaController::class, 'update']);
        Route::delete('/{id}', [PracticeAreaController::class, 'destroy']);
    });

    Route::prefix('partners')->group(function () {
        Route::get('/', [PartnerController::class, 'index']);
        Route::get('/{id}', [PartnerController::class, 'show']);
        Route::post('/', [PartnerController::class, 'store']);
        Route::put('/{id}', [PartnerController::class, 'update']);
        Route::delete('/{id}', [PartnerController::class, 'destroy']);
    });
    
    // Public Menu Routes (no authentication required)
    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'getCategories']);
        Route::get('categories/{categoryId}/items', [MenuController::class, 'getItemsByCategory']);
        Route::get('items/{itemId}', [MenuController::class, 'getItemDetails']);
        Route::get('search', [MenuController::class, 'searchItems']);
        Route::get('featured', [MenuController::class, 'getFeaturedItems']);
    });

    // Shopping Cart Routes
    Route::prefix('cart')->group(function () {
        Route::get('/', [ShoppingCartController::class, 'getCart']);
        Route::post('add', [ShoppingCartController::class, 'addToCart']);
        Route::put('items/{cartItemId}', [ShoppingCartController::class, 'updateCartItem']);
        Route::delete('items/{cartItemId}', [ShoppingCartController::class, 'removeFromCart']);
        Route::delete('clear', [ShoppingCartController::class, 'clearCart']);
        Route::get('summary', [ShoppingCartController::class, 'getCartSummary']);
    });

    // Customer Order Routes
    Route::prefix('orders')->group(function () {
        Route::post('/', [OrderController::class, 'createOrder']);
        Route::get('/', [OrderController::class, 'getUserOrders']);
        Route::get('{orderId}', [OrderController::class, 'getOrderDetails']);
        Route::post('{orderId}/cancel', [OrderController::class, 'cancelOrder']);
        Route::post('{orderId}/reorder', [OrderController::class, 'reorder']);
        Route::get('statuses/list', [OrderController::class, 'getOrderStatuses']);
    });

    // Admin Order Management Routes (add middleware for admin/staff roles)
    Route::prefix('admin/orders')->group(function () {
        Route::get('/', [OrderManagementController::class, 'getAllOrders']);
        Route::get('stats', [OrderManagementController::class, 'getOrderStats']);
        Route::get('active', [OrderManagementController::class, 'getActiveOrders']);
        Route::get('status/{status}', [OrderManagementController::class, 'getOrdersByStatus']);
        Route::get('{orderId}/details', [OrderManagementController::class, 'getOrderDetails']);
        Route::put('{orderId}/status', [OrderManagementController::class, 'updateOrderStatus']);
        Route::post('bulk-update-status', [OrderManagementController::class, 'bulkUpdateStatus']);
    });

    // Directory API Routes
    Route::prefix('directory')->group(function () {
        Route::get('/', [\App\Http\Controllers\Api\DirectoryController::class, 'index']);
        Route::get('/{id}', [\App\Http\Controllers\Api\DirectoryController::class, 'show']);
        Route::post('/', [\App\Http\Controllers\Api\DirectoryController::class, 'store']);
        Route::put('/{id}', [\App\Http\Controllers\Api\DirectoryController::class, 'update']);
        Route::delete('/{id}', [\App\Http\Controllers\Api\DirectoryController::class, 'destroy']);
        Route::get('/birthdays/today', [\App\Http\Controllers\Api\DirectoryController::class, 'getTodaysBirthdays']);
    });
    
    // Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //     return $request->user();
    // });
});

