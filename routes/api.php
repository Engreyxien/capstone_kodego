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
use App\Http\Controllers\UserController;



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
    Route::get("/countries", [CountryController::class, "getCountries"]);
    Route::get("/country/{id}", [CountryController::class, "getCountry"]);
    Route::post("/country", [CountryController::class, "setCountry"]);

    //Provinces
    Route::get("/provinces", [ProvinceController::class, "getProvinces"]);
    Route::get("/province/{id}", [ProvinceController::class, "getProvince"]);
    Route::post("/province", [ProvinceController::class, "setProvince"]);

    //CitiesandMunicipalities
    Route::get("/citymuns", [CitymunController::class, "getCityMuns"]);
    Route::get("/citymun/{id}", [CitymunController::class, "getCityMun"]);
    Route::post("/citymun", [CitymunController::class, "setCityMun"]);

    //Languages
    Route::get("/languages", [LanguageController::class, "getLanguages"]);
    Route::get("/language/{id}", [LanguageController::class, "getLanguage"]);
    Route::post("/language", [LanguageController::class, "setLanguage"]);

    //Currencies
    Route::get("/currencies", [CurrencyController::class, "getCurrencies"]);
    Route::get("/currency/{id}", [CurrencyController::class, "getCurrency"]);
    Route::post("/currency", [CurrencyController::class, "setCurrency"]);

    //CostumerServices
    Route::get("/customerservices", [CostumerServiceController::class, "getCustomerServices"]);
    Route::get("/customerservice/{id}", [CostumerServiceController::class, "getCustomerService"]);
    Route::post("/customerservice", [CostumerServiceController::class, "setCustomerService"]);

    //Tours
    Route::get("/tours", [TourController::class, "getTours"]);
    Route::get("/tour/{id}", [TourController::class, "getTour"]);
    Route::get("/tour/destination/{id}", [TourController::class, "getToursByDestination"]);
    Route::get("/tour/user/{id}", [TourController::class, "getToursByUser"]);
    Route::post("/tour", [TourController::class, "setTour"]); 
    Route::put("/tour/{id}", [TourController::class, "updateTour"]);
    Route::delete("/tour/{id}", [TourController::class, "deleteTour"]);

    //Transports
    Route::get("/transportations", [TransportationController::class, "getTransportations"]);
    Route::get("/transportation/{id}", [TransportationController::class, "getTransportation"]);
    Route::post("/transportation", [TransportationController::class, "setTransportation"]);
    Route::put("/transportation/{id}", [TransportationController::class, "updateTransportation"]);
    Route::delete("/transportation/{id}", [TransportationController::class, "deleteTransportation"]);

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
    Route::post("/upload-image", [UploadController::class, "upload"]);


    Route::post("/logout", [AuthController::class, "logout"]);

    Route::post("/profile", [UserController::class, "updateProfile"]);
});
