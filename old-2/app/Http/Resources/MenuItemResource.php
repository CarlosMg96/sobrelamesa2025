<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'image' => $this->image,
            'ingredients' => $this->ingredients,
            'is_available' => $this->is_available,
            'is_active' => $this->is_active,
            'preparation_time' => $this->preparation_time,
            'allergens' => $this->allergens,
            'sort_order' => $this->sort_order,
            'type' => $this->type,
            'discount_percentage' => $this->discount_percentage,
            'category_id' => $this->category_id,
            'category' => new MenuCategoryResource($this->whenLoaded('category')),
            'final_price' => $this->when(
                $this->type === 'package' && $this->discount_percentage > 0,
                fn() => $this->price * (1 - $this->discount_percentage / 100)
            ) ?: $this->price,
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
