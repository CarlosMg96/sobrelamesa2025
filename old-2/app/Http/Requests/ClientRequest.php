<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    use FailureResponse;
    public function authorize()
    {
        return true; // Adjust authorization logic if needed
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:clients,email,' . $this->route('id'),
            // 'phone' => 'nullable|string|max:15',
            // 'address' => 'nullable|string|max:255',
        ];
    }
}
