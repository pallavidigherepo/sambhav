<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('v1/logout', [AuthController::class, 'logout']);
});
Route::get('v1/get_menu_items', function() {
    $menus = ['competitions', 'activities'];
    return json_encode($menus);
});

Route::post('v1/login', [AuthController::class, 'login']);
Route::post('v1/forgot_password', [AuthController::class, 'forgot_password']);
Route::post('v1/reset_password', [AuthController::class, 'reset_password'])->name('password.reset');

Route::post('v1/register', [AuthController::class, 'register']);
Route::get('v1/verify_email/{token}', [AuthController::class, 'verifyEmail'])->name('email.verify');

