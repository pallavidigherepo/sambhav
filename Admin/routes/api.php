<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ContactFormController;
use App\Http\Controllers\Api\V1\PostController;
use App\Services\DynamicMenuService;


Route::prefix('v1')->group(function () {
    
    // Auth-protected routes
    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
        Route::post('/logout', [AuthController::class, 'logout']);
    });

    // Public routes
    Route::get('/get_menu_items', [\App\Http\Controllers\Api\V1\MenuController::class, 'index']);
    
    Route::get('/blogs', [PostController::class, 'index']);
    Route::get('/blogs/{slug}', [PostController::class, 'show']);

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot_password', [AuthController::class, 'forgot_password']);
    Route::post('/reset_password', [AuthController::class, 'reset_password'])->name('password.reset');

    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/verify_email/{token}', [AuthController::class, 'verifyEmail'])->name('email.verify');

    Route::post('/contact', [ContactFormController::class, 'store']);
});