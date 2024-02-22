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
        $payload = [
            'sub' => $profile?->mc_uuid,
            'iss' => env('APP_URL'),
            'aud' => `https://mc.labs.nonverse.` . (env('APP_ENV') === 'local') ? 'test' : 'net',
            'iat' => time(),
            'exp' => time() + 60,
            'ttp' => 'labs:mc:xs'
        ];

        return JWT::encode($payload, config('minecraft.xs_private_key'), 'RS256');
    }
}
