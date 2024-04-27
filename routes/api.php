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
use App\Http\Controllers\BookingController;



Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);

//User
Route::get("/user", [UserController::class, "getusers"]);
Route::get("/user/{id}", [UserController::class, "getuser"]);

Route::group([], function() {
    Route::get("/accommodations", [AccommodationController::class, "getAccommodations"]);
    Route::get("/accommodation/{id}", [AccommodationController::class, "getAccommodation"]);

//Destinations
    Route::get("/destinations", [DestinationController::class, "getDestinations"]);
    Route::get("/destination/{id}", [DestinationController::class, "getDestination"]);

//Countries
    Route::get("/countries", [CountryController::class, "getCountries"]);
    Route::get("/country/{id}", [CountryController::class, "getCountry"]);
});

//Test Protected Routes
Route::group(["middleware" => ["auth:sanctum"]], function () {
    //Destinations
    Route::post("/destination", [DestinationController::class, "setDestination"]);
    Route::put("/destination/user/{id}", [DestinationController::class, "updateDestination"]);
    Route::delete("/destination/user/{id}", [DestinationController::class, "deleteDestination"]);
    Route::get("/destination/user/{id}", [DestinationController::class, "getDestinationsByUser"]);
    Route::get("/destination/tour/{id}", [DestinationController::class, "getDestinationsByTour"]);
    Route::get("/destination/accommodation/{id}", [DestinationController::class, "getDestinationsByAccommodation"]);

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

    //CustomerServices
    Route::get("/customerservices", [CustomerServiceController::class, "getCustomerServices"]);
    Route::get("/customerservice/{id}", [CustomerServiceController::class, "getCustomerService"]);
    Route::post("/customerservice", [CustomerServiceController::class, "setCustomerService"]);

    //Bookings
    Route::get("/bookings", [BookingController::class, "getBookings"]);
    Route::get("/booking/{id}", [BookingController::class, "getBooking"]);
    Route::post("/booking", [BookingController::class, "setBooking"]);
    Route::put("/booking/{id}", [BookingController::class, "updateBooking"]);
    Route::delete("/booking/{id}", [BookingController::class, "deleteBooking"]);
    Route::get("/booking/user/{id}", [BookingController::class, "getBookingsByUser"]);
    Route::get("/booking/destination/accommodation/user/{id}", [BookingController::class, "getBookingsByUserAndDestinationAndAccommodation"]);

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
    Route::post("/accommodation", [AccommodationController::class, "setAccommodation"]);
    Route::put("/accommodation/user/{id}", [AccommodationController::class, "updateAccommodation"]);
    Route::delete("/accommodation/user/{id}", [AccommodationController::class, "deleteAccommodation"]);
    Route::get("/accommodation/destination/{id}", [AccommodationController::class, "getAccommodationsByDestination"]);
    Route::get("/accommodation/user/{id}", [AccommodationController::class, "getAccommodationsByUser"]);
    Route::get("/accommodation/tour/{id}", [AccommodationController::class, "getAccommodationsByTour"]);

    //Upload
    Route::post("/upload-image", [UploadController::class, "upload"]);

    Route::post("/profile", [UserController::class, "updateProfile"]);
    
    Route::post("/logout", [AuthController::class, "logout"]);

});
