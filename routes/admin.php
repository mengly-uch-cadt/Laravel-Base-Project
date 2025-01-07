<?php

use App\Http\Controllers\Api\v1\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

/*///////////////////////////////////////////
*
*           PUBLIC API
*
*///////////////////////////////////////////
Route::post('/register', [AdminAuthController::class, 'register']);
Route::post('/login', [AdminAuthController::class, 'login']);


/*///////////////////////////////////////////
*
*           PRIVATE API
*
*///////////////////////////////////////////
Route::group(['middleware' => 'auth:api', 'prefix' => 'auth/v1'], function ($router) {
    Route::post('/refresh-token', [AdminAuthController::class, 'refreshToken']);
    Route::post('/logout', [AdminAuthController::class, 'logout']);
});
