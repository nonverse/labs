<?php

namespace App\Http\Controllers\Minecraft;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
}
