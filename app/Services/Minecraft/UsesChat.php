<?php

namespace App\Services\Minecraft;

use App\Services\Minecraft\Server\MinecraftServerApiService;
use Exception;
use Illuminate\Support\Facades\Http;

trait UsesChat
{
    /**
     * @throws Exception
     */
    public function sendMessage(string $message): void
    {
        $response = Http::withToken((new MinecraftServerApiService())->createSignedToken($this))->asForm()->post($this->url() . '/player/message', [
            'message' => $message
        ]);

        if (!$response->successful()) {
            throw new Exception('Failed to send message', 500);
        }
    }

    private function url(): string
    {
        return 'https://mc.labs.nonverse.' . (env('APP_ENV') === 'local') ? 'test:81' : 'net';
    }
}
