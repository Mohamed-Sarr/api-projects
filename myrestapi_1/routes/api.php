<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\PostApiController;

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

// Default Middleware route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); 
});


// Auth Routes
Route::post('/register', [ApiAuthController::class,'register']);
Route::post('/login', [ApiAuthController::class,'login']);


// Public Routes
Route::get('/posts/search/{name}', [PostApiController::class,'search']);
Route::get('/posts', [PostApiController::class,'index']);
Route::get('/posts/{post}', [PostApiController::class,'show']);


// Protected Routes
Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post('/logout', [ApiAuthController::class,'logout']);
    Route::post('/post', [PostApiController::class,'store']);
    Route::put('/posts/{post}', [PostApiController::class,'update']);
    Route::delete('/posts/{post}', [PostApiController::class,'destroy']);
});

