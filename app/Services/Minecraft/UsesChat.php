<?php

namespace App\Services\Minecraft;

use Exception;
use Illuminate\Support\Facades\Http;

trait UsesChat
{
    /**
     * @throws Exception
     */
    public function sendMessage(string $message): void
    {
        $response = Http::withToken('')->post($this->url(), [
            'message' => $message
        ]);

        if (!$response->successful()) {
            throw new Exception("Failed to send message");
        }
    }

    private function url(): string
    {
        return 'https://mc.labs.nonverse.' (env('APP_ENV') === 'local') ? 'test' : 'net' . '/player/message';
    }
}
