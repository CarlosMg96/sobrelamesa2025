<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class PartyRequest extends FormRequest
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
            'role' => 'nullable|string|max:255',
            'in_house_counsel' => 'nullable|string',
            'external_counsel' => 'nullable|string',
            'deal_id' => 'nullable|exists:deals,id',
        ];
    }
}
