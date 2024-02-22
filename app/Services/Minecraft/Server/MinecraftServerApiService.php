<?php

namespace App\Services\Minecraft\Server;

use App\Models\Minecraft\Profile;
use Firebase\JWT\JWT;

class MinecraftServerApiService
{
    /**
     * Create JWT used to communicate with backend Minecraft servers
     *
     * @param Profile|null $profile
     * @return string
     */
    public function createSignedToken(Profile $profile = null): string
    {
        $aud = 'https://mc.labs.nonverse.test/'; // TODO Conditionally generate audience with .test or .net

        $payload = [
            'sub' => $profile?->mc_uuid,
            'iss' => env('APP_URL'),
            'aud' => $aud,
            'iat' => time(),
            'exp' => time() + 60,
            'ttp' => 'labs:mc:xs'
        ];

        return JWT::encode($payload, config('minecraft.xs_private_key'), 'RS256');
    }
}
