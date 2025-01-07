<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\Auth\UserAuthController;

/*///////////////////////////////////////////
*
*           PUBLIC API
* // http://127.0.0.1:8000/api/user/login
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
    Route::put('users/{id}/deausersctivate', [UserAuthController::class, 'updateProfile']);
    // Create, Read, Update
    // Name Func, + Method, 
    // Method: GET, POST, PUT
    //    Get : Get All, Get One by Global_id
    //    Post: Create
    //    Put : Update ( Get One by Global_id => Update ) 
});

// http://127.0.0.1:8000/api/user/auth/v1/logout

// Call API 
// Route -> Controller -> Function -> Filter params -> Service 
// -> BaseService -> Serivce -> Function -> BaseAPI (Response) -> Client get data.