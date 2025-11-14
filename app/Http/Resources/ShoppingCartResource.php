<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingCartResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'menu_item_id' => $this->menu_item_id,
            'quantity' => $this->quantity,
            'special_instructions' => $this->special_instructions,
            'people_count' => $this->people_count,
            'menu_item' => new MenuItemResource($this->whenLoaded('menuItem')),
            'unit_price' => $this->when(
                $this->relationLoaded('menuItem'),
                fn() => $this->menuItem->price
            ),
            'total_price' => $this->when(
                $this->relationLoaded('menuItem'),
                fn() => $this->quantity * $this->menuItem->price
            ),
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
