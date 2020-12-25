<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Middleware\CustomerMiddleware;

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

Route::get('/spotlights',[SlidersController::class,'indexCustomer']);

Route::post('/login',[CustomerAuthController::class,'login']);
Route::post('/register',[CustomerAuthController::class,'register']);

Route::middleware(CustomerMiddleware::class)->group(function (){
    Route::post('/logout',[CustomerAuthController::class,'logout']);
    Route::get('/test',[CustomerAuthController::class,'test']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
