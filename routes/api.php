<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::controller(\App\Http\Controllers\UserController::class)
    ->group(function () {
        Route::post(uri: 'register', action: 'store');
        Route::post(uri: 'login', action: 'login');
    });
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('opinions')->group(function () {
        Route::controller(\App\Http\Controllers\OpinionController::class)->group(function () {
            Route::get(uri: '', action: 'index');
            Route::post(uri: '', action: 'store');
        });
        Route::prefix('{opinion}')->group(function () {
            Route::prefix('comments')->controller(\App\Http\Controllers\CommentController::class)
                ->group(function () {
                    Route::post(uri: '', action: 'store')->middleware(\App\Http\Middleware\Admin::class);
                });
        });
    });
});
