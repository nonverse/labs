<?php

namespace App\Http\Controllers\Minecraft;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MinecraftProfileVerificationController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function send(Request $request): JsonResponse
    {
        $profile = $request->user()->profile();

        try {
            $code = $profile->createVerifier();
            $profile->sendMessage('Your profile verification code is ' . $code);

        } catch (Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage()
            ], $e->getCode() ?: 500);
        }

        return new JsonResponse([
            'success' => true
        ]);
    }

    public function verify(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|min:6|max:6'
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
                'success' => false,
                'error' => $validator->errors()
            ], 422);
        }

        $profile = $request->user()->profile();

        try {
            $profile->verify($request->input('code'));
        } catch (Exception $e) {
            return new JsonResponse([
                'success' => false,
            ], 401);
        }
    }
}
