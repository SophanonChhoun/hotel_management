<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IdentificationController;
use App\Http\Controllers\IdentificationTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\BookingTypeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
use \Illuminate\Support\Facades\App;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SlidersController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\AdminRoleMiddleware;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/",[AdminAuthController::class,"signin"]);
Route::post('/admin/login',[AdminAuthController::class,'login']);

Route::get("/auth/google/login",[AdminAuthController::class,"redirectToProvider"]);
Route::get("/auth/google/callback",[AdminAuthController::class,"handleProviderCallback"]);

Route::get("/test",[AdminAuthController::class,"signin"]);

Route::get('/lang/{locale}', [LocalizationController::class,"lang"]);

Route::post("foo/bar",[TestController::class,"index"]);

Route::middleware(AdminMiddleware::class)->group(function (){
    Route::group(["prefix" => "admin"],function() {

        Route::get("/logout",[AdminAuthController::class,"logout"]);
        Route::get("/dashboard", [DashboardController::class,"index"]);
        Route::group(['prefix' => 'about_us'],function(){
            Route::get("/{id}",[AboutUsController::class,"show"]);
            Route::post("/{id}",[AboutUsController::class,"update"]);
        });
        Route::middleware(AdminRoleMiddleware::class)->group(function(){
            Route::group(['prefix' => 'user'],function(){
                Route::get("/list",[UserController::class,'index']);
                Route::get("/create",[UserController::class,"create"]);
                Route::post("/create",[UserController::class,"store"]);
                Route::get("/show/{id}",[UserController::class,"show"]);
                Route::post("/update/{id}",[UserController::class,"update"]);
                Route::post("/update/status/{id}",[UserController::class,"updateStatus"]);
                Route::post("/delete/{id}",[UserController::class,"destroy"]);
            });

            Route::group(["prefix" => "hotel"],function () {
                Route::get("/list",[HotelController::class,'index']);
                Route::get("/create",[HotelController::class,"create"]);
                Route::post("/create",[HotelController::class,"store"]);
                Route::get("/show/{id}",[HotelController::class,"show"]);
                Route::post("/update/{id}",[HotelController::class,"update"]);
                Route::post("/update/status/{id}",[HotelController::class,"updateStatus"]);
                Route::post("/delete/{id}",[HotelController::class,"destroy"]);
                Route::get("roomType/{id}",[HotelController::class,"listAll"]);
            });
        });

        Route::get("/report/show",[ReportController::class,"index"]);

        Route::group(['prefix' => 'rooms'],function(){
            Route::get('/list/{is_enable}',[RoomController::class,'indexStatus']);
            Route::get('/list',[RoomController::class,'index']);
            Route::get("/create",[RoomController::class,"create"]);
            Route::post("/create",[RoomController::class,"store"]);
            Route::get("/show/{id}",[RoomController::class,"show"]);
            Route::post("/update/{id}",[RoomController::class,"update"]);
            Route::post("/update/status/{id}",[RoomController::class,"updateStatus"]);
            Route::post("/delete/{id}",[RoomController::class,"destroy"]);
        });

        Route::group(["prefix" => "room_type"],function () {
            Route::get('/list',[RoomTypeController::class,'index']);
            Route::get("/create",[RoomTypeController::class,"create"]);
            Route::post("/create",[RoomTypeController::class,"store"]);
            Route::get("/show/{id}",[RoomTypeController::class,"show"]);
            Route::post("/update/{id}",[RoomTypeController::class,"update"]);
            Route::post("/update/status/{id}",[RoomTypeController::class,"updateStatus"]);
            Route::post("/delete/{id}",[RoomTypeController::class,"destroy"]);
        });


        Route::group(["prefix" => "contact_us"],function () {
            Route::get('/list',[ContactUsController::class,'index']);
            Route::get("/create",[ContactUsController::class,"create"]);
            Route::post("/create",[ContactUsController::class,"store"]);
            Route::get("/show/{id}",[ContactUsController::class,"show"]);
            Route::post("/update/{id}",[ContactUsController::class,"update"]);
            Route::post("/update/status/{id}",[ContactUsController::class,"updateStatus"]);
            Route::post("/delete/{id}",[ContactUsController::class,"destroy"]);
        });


        Route::group(["prefix" => "identification"],function () {
            Route::get("/create",[IdentificationController::class,"create"]);
            Route::post("/create",[IdentificationController::class,"store"]);
            Route::get("/show/{id}",[IdentificationController::class,"show"]);
            Route::post("/update/{id}",[IdentificationController::class,"update"]);
            Route::post("/delete/{id}",[IdentificationController::class,"destroy"]);
        });


        Route::group(["prefix" => "identification_type"],function () {
            Route::get("/list",[IdentificationTypeController::class,"index"]);
            Route::post("/update",[IdentificationTypeController::class,"update"]);
        });

        Route::group(["prefix" => "payments_type"],function () {
            Route::get("/list",[PaymentTypeController::class,"index"]);
            Route::post("/update",[PaymentTypeController::class,"update"]);
        });


        Route::group(["prefix" => "bookings_type"],function () {
            Route::get("/list",[BookingTypeController::class,"index"]);
            Route::post("/update",[BookingTypeController::class,"update"]);
        });


        Route::group(["prefix" => "slider"],function () {
            Route::get("/list",[SlidersController::class,"index"]);
            Route::get("/create",[SlidersController::class,"create"]);
            Route::get("/show/{id}",[SlidersController::class,"show"]);
            Route::post("/create",[SlidersController::class,"store"]);
            Route::post("/update/status/{id}",[SlidersController::class,"updateStatus"]);
            Route::post("/update/{id}",[SlidersController::class,"update"]);
            Route::post("/delete/{id}",[SlidersController::class,"destroy"]);
        });

        Route::group(["prefix" => "bookings"],function () {
            Route::get("/list",[BookingController::class,"index"]);
            Route::get("/create",[BookingController::class,"create"]);
            Route::post("/create",[BookingController::class,"store"]);
            Route::get("/show/{id}",[BookingController::class,"show"]);
            Route::get("/show/payment/{id}",[BookingController::class,"showPayment"]);
            Route::post("/update/{id}",[BookingController::class,"update"]);
            Route::post("/update/status/{id}",[BookingController::class,"updateStatus"]);
            Route::post("/delete/{id}",[BookingController::class,"destroy"]);
            Route::post("/getRoom",[BookingController::class,"getRoom"]);
        });

        Route::group(['prefix' => "profile"],function (){
            Route::get("/show",[ProfileController::class,"show"]);
            Route::post("/update",[ProfileController::class,"update"]);
            Route::get("/change/password",[ProfileController::class,"changePassword"]);
            Route::post("/password",[ProfileController::class,"updatePassword"]);
            Route::get("/change/avatar",[ProfileController::class,"changeAvatar"]);
            Route::post("/avatar",[ProfileController::class,"updateAvatar"]);
        });

        Route::group(["prefix" => "payments"],function () {
            Route::get("/show/{id}",[PaymentController::class,"show"]);
            Route::get("/list",[PaymentController::class,"index"]);
        });

        Route::group(['prefix' => "customer"],function(){
            Route::get("/list",[CustomerController::class,"index"]);
            Route::get("/create",[CustomerController::class,"create"]);
            Route::post("/create",[CustomerController::class,"store"]);
            Route::get("/show/{id}",[CustomerController::class,"show"]);
            Route::post("/update/{id}",[CustomerController::class,"update"]);
            Route::post("/update/status/{id}",[CustomerController::class,"updateStatus"]);
            Route::post("/delete/{id}",[CustomerController::class,"destroy"]);

        });
    });

});
