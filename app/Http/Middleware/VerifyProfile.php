<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyProfile
{
    /**
     * Profile driver models
     *
     * @var string[]
     */
    protected $drivers = [
        'minecraft' => \App\Models\Minecraft\Profile::class
    ];

    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $driver, string $unverified = null): Response
    {

        try {
            $profile = $this->drivers[$driver]::query()->findOrFail($request->user()->user_id);

            if (!$profile->verified_at && ($unverified !== 'unverified')) {

                return new JsonResponse([
                    'success' => false,
                    'errors' => 'User experiment profile is unverified'
                ], 403);
            }

        } catch (Exception $e) {
            return new JsonResponse([
                'success' => false,
                'errors' => 'User does not have valid profile for the requested experiment'
            ], 403);
        }

        $request->user()->setProfile($profile);
        return $next($request);
    }
}
