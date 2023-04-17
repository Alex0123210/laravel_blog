<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

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


Route::get('/posts', [PostController::class,'index']);
Route::get('/post/show/{id}', [PostController::class,'show']);
Route::post('/post', [PostController::class,'store']);
Route::patch('/post/update/{id}', [PostController::class,'update']);
Route::delete('/post/delete/{id}', [PostController::class,'destroy']);


Route::get('/users', [UserController::class, 'index']);
Route::get('/user/show/{id}',function ($id) {return new UserResource(User::findOrFail($id));});
//Route::get('/user/show/{id}',[UserController::class, 'show']);
Route::post('/user', [UserController::class, 'store']);
Route::patch('/user/update/{id}', [UserController::class, 'update']);
Route::delete('/user/delete/{id}', [UserController::class, 'destroy']);

Route::get('/comments', [CommentController::class, 'index']);
Route::get('/comment/show/{id}', [CommentController::class, 'show']);
Route::post('/comment', [CommentController::class, 'store']);
Route::patch('/comment/update/{id}', [CommentController::class, 'update']);
Route::delete('/comment/delete/{id}', [CommentController::class, 'destroy']);


Route::post('/home', [RegisterController::class, 'create']);
Route::get('/login', [LoginController::class, 'store']);

Route::middleware('auth:api')->post('/home', function (Request $request) {
    return $request->user();

});



