<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyApiRequest
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|JsonResponse|Response
    {
        if (!$request->bearerToken()) {
            return view('app');
        }

        /**
         * Decode JWT
         */

        try {
            $jwt = (array)JWT::decode($request->bearerToken(), new Key(config('api.public_key'), 'RS256'));
        } catch (Exception) {
            abort(401);
        }

        if ($jwt['aud'] !== env('APP_URL')) {
            abort(401);
        }

        if ($jwt['iss'] !== env('VITE_API_SERVER')) {
            abort(401);
        }

        return $next($request);
    }
}
