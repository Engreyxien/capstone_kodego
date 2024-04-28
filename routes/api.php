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
//Accommodations
    Route::get("/accommodations", [AccommodationController::class, "getAccommodations"]);
    Route::get("/accommodation/{id}", [AccommodationController::class, "getAccommodation"]);

//Destinations
    Route::get("/destinations", [DestinationController::class, "getDestinations"]);
    Route::get("/destination/{id}", [DestinationController::class, "getDestination"]);

//Countries
    Route::get("/countries", [CountryController::class, "getCountries"]);
    Route::get("/country/{id}", [CountryController::class, "getCountry"]);

//Cities
Route::get("/citymuns", [CitymunController::class, "getCityMuns"]);
Route::get("/citymun/{id}", [CitymunController::class, "getCityMun"]);

//Provinces
Route::get("/provinces", [ProvinceController::class, "getProvinces"]);
Route::get("/province/{id}", [ProvinceController::class, "getProvince"]);

//Tours
Route::get("/tours", [TourController::class, "getTours"]);
Route::get("/tour/{id}", [TourController::class, "getTour"]);

//Languages
    Route::get("/languages", [LanguageController::class, "getLanguages"]);
    Route::get("/language/{id}", [LanguageController::class, "getLanguage"]);

//Currencies
    Route::get("/currencies", [CurrencyController::class, "getCurrencies"]);
    Route::get("/currency/{id}", [CurrencyController::class, "getCurrency"]);
});

//Test Protected Routes
Route::group(["middleware" => ["auth:sanctum"]], function () {
    //Destinations
    Route::post("/destinations", [DestinationController::class, "setDestination"]);
    Route::put("/destinations/{id}", [DestinationController::class, "updateDestination"]);
    Route::delete("/destinations/{id}", [DestinationController::class, "deleteDestination"]);
    Route::get("/destination/user/{id}", [DestinationController::class, "getDestinationsByUser"]);
    Route::get("/destination/tour/{id}", [DestinationController::class, "getDestinationsByTour"]);
    Route::get("/destination/accommodation/{id}", [DestinationController::class, "getDestinationsByAccommodation"]);

    //Countries
    Route::post("/countries", [CountryController::class, "setCountry"]);
    Route::put("/countries/{id}", [CountryController::class, "updateCountry"]);
    Route::delete("/countries/{id}", [CountryController::class, "deleteCountry"]);
    Route::get("/country/user/ {id}", [CountryController::class, "getCountriesByUser"]);

    //Provinces
    Route::post("/province", [ProvinceController::class, "setProvince"]);

    //CitiesandMunicipalities
    Route::post("/citymun", [CitymunController::class, "setCityMun"]);

    //Languages
    Route::post("/language", [LanguageController::class, "setLanguage"]);
    Route::put("/language/user/{id}", [LanguageController::class, "updateLanguage"]);
    Route::get("/language/user/{id}", [LanguageController::class, "getLanguagesByUser"]);

    //Currencies
    Route::post("/currency", [CurrencyController::class, "setCurrency"]);
    Route::put("/currency/user/{id}", [CurrencyController::class, "updateCurrency"]);
    Route::get("/currency/user/{id}", [CurrencyController::class, "getCurrenciesByUser"]);

    //CustomerServices
    Route::get("/customerservices", [CustomerServiceController::class, "getCustomerServices"]);
    Route::get("/customerservice/{id}", [CustomerServiceController::class, "getCustomerService"]);
    Route::post("/customerservice", [CustomerServiceController::class, "setCustomerService"]);

    //Bookings
    Route::get("/bookings", [BookingController::class, "getBookings"]);
    Route::get("/booking/{id}", [BookingController::class, "getBookingbyUser"]);
    Route::post("/bookings", [BookingController::class, "setBookings"]);
    Route::put("/bookings/{id}", [BookingController::class, "updateBooking"]);
    Route::delete("/bookings/{id}", [BookingController::class, "deleteBooking"]);
    Route::get("/booking/destination/accommodation/tour/user/{id}", [BookingController::class, "getBookingsByUserAndDestinationAndAccommodation"]);

    //Tours
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
    Route::post("/accommodations", [AccommodationController::class, "setAccommodation"]);
    Route::put("/accommodations/{id}", [AccommodationController::class, "updateAccommodation"]);
    Route::delete("/accommodations/{id}", [AccommodationController::class, "deleteAccommodation"]);
    Route::get("/accommodation/destination/{id}", [AccommodationController::class, "getAccommodationsByDestination"]);
    Route::get("/accommodation/user/{id}", [AccommodationController::class, "getAccommodationsByUser"]);
    Route::get("/accommodation/tour/{id}", [AccommodationController::class, "getAccommodationsByTour"]);

    //Upload
    Route::post("/upload-image", [UploadController::class, "upload"]);

    Route::post("/profile", [UserController::class, "updateProfile"]);
    
    Route::post("/logout", [AuthController::class, "logout"]);

});
