<?php

namespace App\Providers;

use App\Models\RefreshToken;
use App\Models\User;
use App\Repositories\RefreshTokenRepository;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Auth::viaRequest('jwt', function(Request $request) {
            if ($request->bearerToken()) {
                $jwt = (array)JWT::decode($request->bearerToken(), new Key(config('api.public_key'), 'RS256'));

                return $jwt['sub'] ? (new RefreshTokenRepository($this->app))->getUsingUserId($jwt['sub']) : new RefreshToken();
            }
            return new RefreshToken();
        });
    }
}
