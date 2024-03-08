<?php

namespace App\Http\Controllers\Minecraft;

use App\Contracts\Repository\Minecraft\MinecraftProfileRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Services\Minecraft\CreateMinecraftProfileService;
use Exception;
use Illuminate\Container\EntryNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MinecraftProfileController extends Controller
{
    /**
     * @var MinecraftProfileRepositoryInterface
     */

    private MinecraftProfileRepositoryInterface $profileRepository;
    /**
     * @var CreateMinecraftProfileService
     */
    private CreateMinecraftProfileService $createProfileService;

    public function __construct(
        MinecraftProfileRepositoryInterface $profileRepository,
        CreateMinecraftProfileService $createProfileService
    )
    {
        $this->profileRepository = $profileRepository;
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
            ], $e->getCode());
        }

        return new JsonResponse([
            'success' => true,
            'data' => [
                'username' => $profile->username
            ]
        ]);
    }

    /**
     * Handle request to get user's Minecraft profile
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function get(Request $request): JsonResponse
    {
        try {
            return new JsonResponse([
                'success' => true,
                'data' => $this->profileRepository->get($request->user()->user_id)
            ]);
        } catch (Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => $e->getMessage()
            ], $e->getCode());
        }
    }
}
