<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    use FailureResponse;
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            // ...agregar otras reglas de validación según el modelo Contact...
        ];
    }
}
