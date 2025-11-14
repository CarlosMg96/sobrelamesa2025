<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    use FailureResponse;
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email,' . $this->route('id'),
            'number' => 'nullable|string|max:20',
            'directory_name' => 'nullable|string|max:255',
            'direct_number' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:255',
            'area' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date'
        ];
    }
}
