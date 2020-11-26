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

Route::get('/', function () {
    return view('layout.default');
});

Route::group(["middleware" => "web"],function() {
    Route::group(["prefix" => "hotel"],function () {
        Route::get("/create",[HotelController::class,"create"]);
        Route::post("/create",[HotelController::class,"store"]);
        Route::get("/show/{id}",[HotelController::class,"show"]);
        Route::post("/update/{id}",[HotelController::class,"update"]);
        Route::post("/delete/{id}",[HotelController::class,"destroy"]);
    });

    Route::group(["prefix" => "room"],function () {
        Route::get("/create",[RoomController::class,"create"]);
        Route::post("/create",[RoomController::class,"store"]);
        Route::get("/show/{id}",[RoomController::class,"show"]);
        Route::post("/update/{id}",[RoomController::class,"update"]);
        Route::post("/delete/{id}",[RoomController::class,"destroy"]);

        Route::group(["prefix" => "type"],function () {
            Route::get("/create",[RoomTypeController::class,"create"]);
            Route::post("/create",[RoomTypeController::class,"store"]);
            Route::get("/show/{id}",[RoomTypeController::class,"show"]);
            Route::post("/update/{id}",[RoomTypeController::class,"update"]);
            Route::post("/delete/{id}",[RoomTypeController::class,"destroy"]);
        });
    });


    Route::group(["prefix" => "identification"],function () {
        Route::get("/create",[IdentificationController::class,"create"]);
        Route::post("/create",[IdentificationController::class,"store"]);
        Route::get("/show/{id}",[IdentificationController::class,"show"]);
        Route::post("/update/{id}",[IdentificationController::class,"update"]);
        Route::post("/delete/{id}",[IdentificationController::class,"destroy"]);

        Route::group(["prefix" => "type"],function () {
            Route::get("/create",[IdentificationTypeController::class,"create"]);
            Route::post("/create",[IdentificationTypeController::class,"store"]);
            Route::get("/show/{id}",[IdentificationTypeController::class,"show"]);
            Route::post("/update/{id}",[IdentificationTypeController::class,"update"]);
            Route::post("/delete/{id}",[IdentificationTypeController::class,"destroy"]);
        });
    });

    Route::group(["prefix" => "booking"],function () {
        Route::get("/create",[BookingController::class,"create"]);
        Route::post("/create",[BookingController::class,"store"]);
        Route::get("/show/{id}",[BookingController::class,"show"]);
        Route::post("/update/{id}",[BookingController::class,"update"]);
        Route::post("/delete/{id}",[BookingController::class,"destroy"]);

        Route::group(["prefix" => "type"],function () {
            Route::get("/create",[BookingTypeController::class,"create"]);
            Route::post("/create",[BookingTypeController::class,"store"]);
            Route::get("/show/{id}",[BookingTypeController::class,"show"]);
            Route::post("/update/{id}",[BookingTypeController::class,"update"]);
            Route::post("/delete/{id}",[BookingTypeController::class,"destroy"]);
        });
    });

    Route::group(["prefix" => "payment"],function () {
        Route::get("/create",[PaymentController::class,"create"]);
        Route::post("/create",[PaymentController::class,"store"]);
        Route::get("/show/{id}",[PaymentController::class,"show"]);
        Route::post("/update/{id}",[PaymentController::class,"update"]);
        Route::post("/delete/{id}",[PaymentController::class,"destroy"]);

        Route::group(["prefix" => "type"],function () {
            Route::get("/create",[PaymentTypeController::class,"create"]);
            Route::post("/create",[PaymentTypeController::class,"store"]);
            Route::get("/show/{id}",[PaymentTypeController::class,"show"]);
            Route::post("/update/{id}",[PaymentTypeController::class,"update"]);
            Route::post("/delete/{id}",[PaymentTypeController::class,"destroy"]);
        });
    });
});
