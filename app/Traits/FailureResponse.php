<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailureResponse
{
    protected function isApiRequest(): bool
    {
        return $this->expectsJson() || $this->is('api/*');
    }

    protected function failedAuthorization(): void
    {
        if ($this->isApiRequest()) {
            throw new HttpResponseException(response()->json([
                'code' => 403,
                'success' => false,
                'message' => __('The user is not authorized to perform this action.'),
                'errors' => [],
            ], 403));
        }
        parent::failedAuthorization();
    }

    protected function failedValidation(Validator $validator): void
    {
        if ($this->isApiRequest()) {
            throw new HttpResponseException(response()->json([
                'code' => 422,
                'success' => false,
                'message' => ($validator->errors()->first() ?: 'Validation failed'),
                'errors' => $validator->errors(),
            ], 422));
        }
        parent::failedValidation($validator);
    }
}
