<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
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
        'user' => null,
    ]);
});
