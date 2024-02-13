<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Endpoint: https://api.nonverse.net/labs
|
*/

Route::get('/', function () {
    return new JsonResponse([
        'application_name' => env('APP_NAME'),
        'application_description' => 'Nonverse application programming interface',
        'internal_identifier' => env('APP_IDENTIFIER'),
        'environment' => 'closed_development',
        'version' => env('APP_VERSION'),
        'base_route' => '/labs',
    ]);
});

Route::prefix('minecraft')->group(base_path('routes/minecraft.php'));
