<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Endpoint: https://api.nonverse.net/labs/minecraft
|
*/

Route::prefix('profile')->group(function() {
    Route::post('/', [\App\Http\Controllers\Minecraft\MinecraftProfileController::class, 'create']);
    Route::get('/', [\App\Http\Controllers\Minecraft\MinecraftProfileController::class, 'get']);
});
