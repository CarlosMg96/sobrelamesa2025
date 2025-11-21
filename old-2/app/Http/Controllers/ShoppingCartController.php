<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * Mostrar todos los ítems del carrito del usuario.
     */
    public function index()
    {
        $user = Auth::user();
        $cartItems = ShoppingCart::with('menuItem')->forUser($user->id)->get();

        return view('menu_items.shopping-cart', compact('cartItems'));
    }

    /**
     * Agregar un item al carrito.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'special_instructions' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();

      $cartItem = ShoppingCart::updateOrCreate(
            [
                'user_id' => $user->id,
                'menu_item_id' => $request->menu_item_id,
            ],
            [
                'quantity' => 1,
                'special_instructions' => null,
                'people_count' => 1,
            ]
        );


        // Si quieres actualizar instrucciones si ya existe
        if (!$cartItem->wasRecentlyCreated) {
            $cartItem->special_instructions = $request->special_instructions;
            $cartItem->save();
        }


        return redirect()->route('menu_items.shopping-cart')->with('success', 'Paquete agregado al carrito.');
    }

    /**
     * Eliminar un item del carrito.
     */
    public function destroy($id)
    {
        $user = Auth::user();

        $item = ShoppingCart::where('id', $id)->where('user_id', $user->id)->withTrashed()->firstOrFail();
        $item->forceDelete();

        return redirect()->route('menu_items.shopping-cart')->with('success', 'Paquete eliminado del carrito.');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

}
