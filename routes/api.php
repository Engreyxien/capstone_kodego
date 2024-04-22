<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\DestinationController;


//Authentication
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

//User
Route::get("/user", [AuthController::class, "getusers"]);
Route::get("/user/{id}", [AuthController::class, "getuser"]);

//Test Protected Routes
Route::group(["middleware" => ["auth:sanctum"]], function () {
    //Destinations
    Route::get("/destinations", [DestinationController::class, "getDestinations"]);
    Route::get("/destination/{id}", [DestinationController::class, "getDestination"]);
    Route::post("/destination", [DestinationController::class, "setDestination"]);
    Route::put("/destination/{id}", [DestinationController::class, "updateDestination"]);
    Route::delete("/destination/{id}", [DestinationController::class, "deleteDestination"]);
    Route::get("/destination/tour/{id}", [DestinationController::class, "getDestinationsByTour"]);


    //Accommodations
    Route::get("/accommodations", [AccommodationController::class, "getAccommodations"]);
    Route::get("/accommodation/{id}", [AccommodationController::class, "getAccommodation"]);
    Route::post("/accommodation", [AccommodationController::class, "setAccommodation"]);
    Route::put("/accommodation/{id}", [AccommodationController::class, "updateAccommodation"]);
    Route::delete("/accommodation/{id}", [AccommodationController::class, "deleteAccommodation"]);
    Route::get("/accommodation/destination/{id}", [AccommodationController::class, "getAccommodationsByDestination"]);
    Route::get("/accommodation/user/{id}", [AccommodationController::class, "getAccommodationsByUser"]);
    Route::get("/accommodation/tour/{id}", [AccommodationController::class, "getAccommodationsByTour"]);

    //Upload
    Route::post("/upload", [UploadController::class, "uploadImage"]);
    Route::post("/logout", [AuthController::class, "logout"]);

});
