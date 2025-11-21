<?php

namespace App\Http\Requests;

use App\Traits\FailureResponse;
use Illuminate\Foundation\Http\FormRequest;

class DealUploadRequest extends FormRequest
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
            'excel_file' => 'required|mimes:xlsx,csv|max:2048',
        ];
    }
}
