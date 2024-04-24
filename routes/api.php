<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\CitymunController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\LanguageController;


//Authentication
Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

//User
Route::get("/user", [UserController::class, "getusers"]);
Route::get("/user/{id}", [UserController::class, "getuser"]);

//Test Protected Routes
Route::group(["middleware" => ["auth:sanctum"]], function () {
    //Destinations
    Route::get("/destinations", [DestinationController::class, "getDestinations"]);
    Route::get("/destination/{id}", [DestinationController::class, "getDestination"]);
    Route::post("/destination", [DestinationController::class, "setDestination"]);
    Route::put("/destination/{id}", [DestinationController::class, "updateDestination"]);
    Route::delete("/destination/{id}", [DestinationController::class, "deleteDestination"]);
    Route::get("/destination/tour/{id}", [DestinationController::class, "getDestinationsByTour"]);

    //Countries
    Route::get("/countries", [Controller::class, "getCountries"]);
    Route::get("/country/{id}", [Controller::class, "getCountry"]);
    Route::post("/country", [Controller::class, "setCountry"]);

    //Provinces
    Route::get("/provinces", [Controller::class, "getProvinces"]);
    Route::get("/province/{id}", [Controller::class, "getProvince"]);
    Route::post("/province", [Controller::class, "setProvince"]);

    //CitiesandMunicipalities
    Route::get("/citymuns", [Controller::class, "getCityMuns"]);
    Route::get("/citymun/{id}", [Controller::class, "getCityMun"]);
    Route::post("/citymun", [Controller::class, "setCityMun"]);

    //Languages
    Route::get("/languages", [Controller::class, "getLanguages"]);
    Route::get("/language/{id}", [Controller::class, "getLanguage"]);
    Route::post("/language", [Controller::class, "setLanguage"]);

    //Currencies
    Route::get("/currencies", [Controller::class, "getCurrencies"]);
    Route::get("/currency/{id}", [Controller::class, "getCurrency"]);
    Route::post("/currency", [Controller::class, "setCurrency"]);

    //CostumerServices
    Route::get("/customerservices", [Controller::class, "getCustomerServices"]);
    Route::get("/customerservice/{id}", [Controller::class, "getCustomerService"]);
    Route::post("/customerservice", [Controller::class, "setCustomerService"]);

    //Tours
    Route::get("/tours", [Controller::class, "getTours"]);
    Route::get("/tour/{id}", [Controller::class, "getTour"]);
    Route::get("/tour/destination/{id}", [Controller::class, "getToursByDestination"]);
    Route::get("/tour/user/{id}", [Controller::class, "getToursByUser"]);
    Route::post("/tour", [Controller::class, "setTour"]); 
    Route::put("/tour/{id}", [Controller::class, "updateTour"]);
    Route::delete("/tour/{id}", [Controller::class, "deleteTour"]);

    //Transports
    Route::get("/transportations", [Controller::class, "getTransportations"]);
    Route::get("/transportation/{id}", [Controller::class, "getTransportation"]);
    Route::post("/transportation", [Controller::class, "setTransportation"]);
    Route::put("/transportation/{id}", [Controller::class, "updateTransportation"]);
    Route::delete("/transportation/{id}", [Controller::class, "deleteTransportation"]);

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

    Route::post("/profile", [UserController::class, "updateProfile"]);

    //Logout
    Route::post("/logout", [AuthController::class, "logout"]);
});
