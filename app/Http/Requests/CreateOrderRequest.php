<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
{
    use FailureResponse;
    public function authorize()
    {
        return true; // Authorization handled by middleware
    }

    public function rules()
    {
        return [
            'notes' => 'nullable|string|max:1000',
            'delivery_time' => 'nullable|date|after:now',
            'delivery_location' => 'nullable|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'delivery_time.after' => 'Delivery time must be in the future.',
            'notes.max' => 'Notes cannot exceed 1000 characters.',
            'delivery_location.max' => 'Delivery location cannot exceed 255 characters.'
        ];
    }
}
