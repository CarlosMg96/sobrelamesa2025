<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class PracticeAreaRequest extends FormRequest
{
    use FailureResponse;
    public function authorize()
    {
        // Allow all users to make this request. Adjust as needed.
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}
