<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/{path?}', 'app')
    ->where('path', '.*');

/**
 * Initialise application
 */
Route::post('/initialize', [\App\Http\Controllers\Application\ApiController::class, 'initialize']);

/**
 * Logout user from application
 */
Route::post('/logout', [\App\Http\Controllers\UserController::class, 'logout']);

Route::prefix('api')->middleware('token')->group(function () {
    /**
     * Forwards API requests
     */
    Route::post('/forward-request', [\App\Http\Controllers\Application\ForwardRequestController::class, 'forward'])->middleware('withauthorization');

    Route::prefix('authorization-token')->group(function () {
        Route::post('/', [\App\Http\Controllers\Application\AuthorizationTokenController::class, 'set']);
        Route::post('/check', [\App\Http\Controllers\Application\AuthorizationTokenController::class, 'check']);
    });
});
