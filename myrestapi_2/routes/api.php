<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});

// Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::put('/posts/{id}',[PostController::class,'update']);
    Route::delete('/posts/{id}',[PostController::class,'destroy']);
    Route::post('/post',[PostController::class,'store']);
    // Protected Route for logout
    Route::post('/logout',[AuthController::class,'logout']);

});
// Public Routes
Route::get('/posts/{id}',[PostController::class,'show']);
Route::get('/posts',[PostController::class,'index']);
Route::get('/posts/search/{name}',[PostController::class,'search']);

// Public Routes for registration and login
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);