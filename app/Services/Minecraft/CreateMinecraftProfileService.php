<?php

namespace App\Services\Minecraft;

use App\Contracts\Repository\Minecraft\MinecraftProfileRepositoryInterface;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreateMinecraftProfileService
{
    /**
     * @var MinecraftProfileRepositoryInterface
     */
    private MinecraftProfileRepositoryInterface $profileRepository;

    public function __construct(
        MinecraftProfileRepositoryInterface $profileRepository
    )
    {
        $this->profileRepository = $profileRepository;
    }

    /**
     * Create new unverified profile for minecraft user
     *
     * @param Request $request
     * @param string $username
     * @return string
     * @throws Exception
     */
    public function handle(Request $request, string $username)
    {
        $response = Http::get('https://api.mojang.com/users/profiles/minecraft/' . $username);

        if ($response->successful()) {
            $mcUuid = json_decode($response->body(), true)['id'];

            try {
                $profile = $this->profileRepository->update($request->user()->user_id, [
                    'mc_uuid' => substr($mcUuid, 0, 8) . '-' . substr($mcUuid, 8, 4) . '-' . substr($mcUuid, 12, 4) . '-' . substr($mcUuid, 16, 4) . '-' . substr($mcUuid, 20),
                    'username' => $username
                ]);
            } catch (Exception $e) {
                $profile = $this->profileRepository->create([
                    'uuid' => $request->user()->user_id,
                    'mc_uuid' => $mcUuid,
                    'username' => $username
                ]);
            }

            return $profile;
        }

        throw new Exception('Unable to find Minecraft user', 422);
    }
}
