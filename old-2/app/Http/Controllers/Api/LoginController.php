<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\TokenRequest;
use App\Models\User;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    //
    function login(TokenRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        // return response()->json($user, 200);

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw new HttpResponseException(response()->json([
                'code' => 403,
                'success' => false,
                'message' => __('The provided credentials are incorrect.'),
                'errors' => [
                    'email' => __('The provided credentials are incorrect.'),
                ],
            ], 403));
            // throw ValidationException::withMessages([
            //     'email' => 'The provided credentials are incorrect.',
            // ]);
        }
        return ApiResponse::success($user, 200, 'Login successful.');
        return response()->json([
            'token' => $user->createToken('API Token')->plainTextToken,
            'user' => $user,
        ], 200);
    }
}
