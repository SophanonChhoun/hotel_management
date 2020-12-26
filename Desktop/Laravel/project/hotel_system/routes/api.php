<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomTypeController;

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
Route::get('/about_us',[AboutUsController::class,'showCustomer']);
Route::get('/contact_us',[ContactUsController::class,'indexCustomer']);
Route::get('/hotel/list',[HotelController::class,'indexCustomer']);
Route::get('/hotel/show/{id}',[HotelController::class,'showCustomer']);
Route::get('/roomType/list',[RoomTypeController::class,'indexCustomer']);
Route::get('/roomType/show/{id}',[RoomTypeController::class,'showCustomer']);

Route::post('/login',[CustomerAuthController::class,'login']);
Route::post('/register',[CustomerAuthController::class,'register']);

Route::middleware(CustomerMiddleware::class)->group(function (){
    Route::post('/logout',[CustomerAuthController::class,'logout']);
    Route::get('/test',[CustomerAuthController::class,'test']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
