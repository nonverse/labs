<?php

namespace App\Http\Controllers\Minecraft;

use App\Http\Controllers\Controller;
use App\Services\Minecraft\CreateProfileService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class MinecraftProfileController extends Controller
{
    /**
     * @var CreateProfileService
     */
    private CreateProfileService $createProfileService;

    public function __construct(
        CreateProfileService $createProfileService
    )
    {
        $this->createProfileService = $createProfileService;
    }

    /**
     * Handle request to create a user's Minecraft profile
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        /**
         * Validate request
         */
        $validator = Validator::make($request->all(), [
            'username' => 'required'
        ]);

        if ($validator->fails()) {
            return new JsonResponse([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            /**
             * Try to create profile
             */
            $profile = $this->createProfileService->handle($request, $request->input('username'));
        } catch (Exception $e) {

            return new JsonResponse([
                'success' => false,
                'errors' => $e->getMessage()
            ], 400);
        }

        return new JsonResponse([
            'success' => true,
            'data' => [
                'username' => $profile->username
            ]
        ]);
    }
}
