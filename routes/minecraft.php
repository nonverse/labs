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

// Profile routes
Route::prefix('profile')->group(function() {
    // Base
    Route::post('/', [\App\Http\Controllers\Minecraft\MinecraftProfileController::class, 'create']);
    Route::get('/', [\App\Http\Controllers\Minecraft\MinecraftProfileController::class, 'get'])->middleware('profile:minecraft');

    // Verification
    Route::post('/send-verification', [\App\Http\Controllers\Minecraft\MinecraftProfileVerificationController::class, 'send'])->middleware('profile:minecraft,unverified');
});
