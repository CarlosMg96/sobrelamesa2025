<?php

namespace App\Helper;

class ApiResponse
{
    /**
     * Create a new class instance.
     */
    public static function success($data = [], $code = 200, $message = 'Success')
    {
        return response()->json([
            'code' => $code,
            'success' => true,
            // 'message' => $message,
            'data' => $data,
        ], $code);
    }

    public static function error($code = 400, $errors = [], $message = 'Error')
    {
        return response()->json([
            'code' => $code,
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $code);
    }
}
