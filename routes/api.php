<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
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

Route::post('/register',[UserController::class, 'register']);
Route::post('/login',[UserController::class, 'login']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/refresh',[UserController::class, 'refreshToken']);
Route::get('/profile',[UserController::class, 'getProfile']);

Route::get('/movies',[MovieController::class,'index']);
Route::get('/movies/{movie}',[MovieController::class,'show']);
Route::post('/movies',[MovieController::class,'store']);
Route::delete('/movies/{movie}',[MovieController::class,'destroy']);



