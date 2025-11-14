<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderStatusHistoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'order_id' => $this->order_id,
            'status' => $this->status,
            'previous_status' => $this->previous_status,
            'notes' => $this->notes,
            'changed_by' => $this->changed_by,
            'changed_by_user' => $this->whenLoaded('changedBy', function () {
                return [
                    'id' => $this->changedBy->id,
                    'name' => $this->changedBy->name,
                    'email' => $this->changedBy->email,
                ];
            }),
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),
        ];
    }
}
