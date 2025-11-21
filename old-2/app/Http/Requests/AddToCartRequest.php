<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
{
    use FailureResponse;
    public function authorize()
    {
        return true; // Authorization handled by middleware
    }

    public function rules()
    {
        return [
            'menu_item_id' => 'required|integer|exists:menu_items,id',
            'quantity' => 'required|integer|min:1|max:99',
            'special_instructions' => 'nullable|string|max:500',
            'people_count' => 'nullable|integer|min:1|max:20'
        ];
    }

    public function messages()
    {
        return [
            'menu_item_id.required' => 'Please select a menu item.',
            'menu_item_id.exists' => 'The selected menu item is not available.',
            'quantity.required' => 'Please specify the quantity.',
            'quantity.min' => 'Quantity must be at least 1.',
            'quantity.max' => 'Maximum quantity allowed is 99.',
            'people_count.min' => 'People count must be at least 1.',
            'people_count.max' => 'Maximum people count is 20.',
            'special_instructions.max' => 'Special instructions cannot exceed 500 characters.'
        ];
    }
}
