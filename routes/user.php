<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\UserAuthController;

/*///////////////////////////////////////////
*
*           PUBLIC API
*
*///////////////////////////////////////////
Route::post('/register', [UserAuthController::class, 'register']);
Route::post('/login', [UserAuthController::class, 'login']);


/*///////////////////////////////////////////
*
*           PRIVATE API
*
*///////////////////////////////////////////
Route::group(['middleware' => 'auth:api-user', 'prefix' => 'auth/v1'], function ($router) {
// Route::group(['middleware' => 'auth:api-user', 'prefix' => 'auth/v1'], function ($router) {
    Route::post('/refresh-token', [UserAuthController::class, 'refreshToken']);
    Route::post('/logout', [UserAuthController::class, 'logout']);
    // Route::apiResource('/users', UserController::class);
});
