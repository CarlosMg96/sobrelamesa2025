<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'place' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:start_date'],
            'travels_later' => ['nullable', 'array'],
            'travels_later.*.law_firm_id' => ['required'],
            'travels_later.*.message_transmitted' => ['required'],
            'travels_later.*.actions' => ['required'],
            'travels_later.*.conclutions' => ['required'],
        ];
    }
}
