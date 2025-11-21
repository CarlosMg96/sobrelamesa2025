<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderStatusRequest extends FormRequest
{
    use FailureResponse;
    public function authorize()
    {
        return true; // Authorization handled by middleware
    }

    public function rules()
    {
        return [
            'status' => 'required|string|in:pending,confirmed,preparing,ready,delivered,cancelled',
            'notes' => 'nullable|string|max:500',
            'cancellation_reason' => 'required_if:status,cancelled|string|max:500'
        ];
    }

    public function messages()
    {
        return [
            'status.required' => 'Status is required.',
            'status.in' => 'Invalid status selected.',
            'cancellation_reason.required_if' => 'Cancellation reason is required when cancelling an order.',
            'notes.max' => 'Notes cannot exceed 500 characters.',
            'cancellation_reason.max' => 'Cancellation reason cannot exceed 500 characters.'
        ];
    }
}
