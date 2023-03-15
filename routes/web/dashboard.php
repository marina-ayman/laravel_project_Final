<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\registerationController\DriverController;
use App\Http\Controllers\Auth\registerationController\HotelOwnerController;
use App\Http\Controllers\Auth\registerationController\TourguideController;
use App\Http\Controllers\Auth\registerationController\userController;
use App\Http\Controllers\Controllers\regularController;
use App\Http\Controllers\orderController\OrderController;
use App\Http\Controllers\orderController\OrderDetailsController;

use App\Http\Controllers\orderController\BookedRoomController;
use App\Http\Controllers\orderController\OrderedPlaceController;
use App\Http\Controllers\placesController\PlaceController;
use App\Http\Controllers\placesController\PlaceImgController;
use App\Http\Controllers\vehicleController\vehicleController;
use App\Http\Controllers\hotelsController\hotelsController;
use App\Http\Controllers\tripController\tripController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\ViewPlacesController;
use App\Http\Controllers\viewHotelsController;
use App\Http\Controllers\ViewTourGidesController;






// //Driverregistrations---
Route::get('/driverDashForm',[DriverController :: class ,"createDriver"])->name("driverDash.create");
Route::get('/driverRegistrations',[DriverController :: class ,"indexDriver"])->name("getdriverDash.index");
Route::post('/driverRegistrations',[DriverController :: class ,"storeDriver"])->name("driverDash.store");
Route::delete('/deldriverReg/{id}',[DriverController::class,'destroy'])->name("driverDash.destroy");

// //Userregistrations---
Route::get('/userDashForm',[userController :: class ,"createUser"])->name("UserDash.create");
Route::get('/userRegistrations',[userController :: class ,"index"])->name("UserDash.index");
Route::post('/userRegistrations',[userController :: class ,"storeuser"])->name("UserrDash.store");
Route::get('/deleteUser/{UserID}',[userController::class,'deleteUser'])->name("deleteUser");
// //hotelOwnerRegistrations---
Route::get('/HotelDashForm',[HotelOwnerController :: class ,"createHotelOwnwer"])->name("hotelOwnerDash.create");
Route::get('/hotelOwnerRegistrations',[HotelOwnerController :: class ,"index"])->name("hotelOwnerDash.index");
Route::post('/hotelOwnerRegistrations',[HotelOwnerController :: class ,"storeHotelOwner"])->name("hotelOwnerDash.store");
Route::delete('/deletehotelOwner/{id}',[HotelOwnerController::class,'destroy'])->name("hotelOwnerDash.destroy");
// //TourgideRegistrations---
Route::get('/tourguideDashForm',[TourguideController :: class ,"createTourguide"])->name("tourgideDash.create");
Route::get('/tourguideRegistrations',[TourguideController :: class ,"index"])->name("tourgideDash.index");
Route::post('/tourguideRegistrations',[TourguideController :: class ,"storeTourguide"])->name("tourgideDash.store");
Route::delete('/deletetourguideReg/{id}',[TourguideController::class,'destroy'])->name("tourgideDash.destroy");


///   login
Route::post('/login',[userController :: class ,"login"]);





// //=============================================================================================================================================


Route::get('/PlaceDashForm',[PlaceController :: class ,"create"])->name("PlaceeDash.create");
Route::get('/PlaceDash',[PlaceController :: class ,"index"])->name("PlaceeDash.index");
Route::post('/PlaceDash',[PlaceController :: class ,"store"])->name("PlaceeDash.store");
Route::get('/deletePlaceDash/{id}',[PlaceController::class,'destroy'])->name("PlaceeDash.destroy");
Route::post('/PlaceDash/{id}', [PlaceController::class, 'update'])->name('PlaceDash.update');
Route::get('/PlaceDash/{id}/edit', [PlaceController::class, 'edit'])->name('PlaceDash.edit');


// //=============================================================================================================================================
Route::post('/driverRegistrations/{id}', [DriverController::class, 'update'])->name('driverprofileDash.update');
Route::get('/driverRegistrations/{id}/edit', [DriverController::class, 'edit'])->name('driverprofileDash.edit');
Route::get('/driverRegistrations',[DriverController :: class ,"indexprofile"])->name("driverprofileDash.index");


Route::get('/VehicleDashForm',[VehicleController :: class ,"create"])->name("VehiclleDash.create");
Route::get('/VehicleDash',[VehicleController :: class ,"index"])->name("VehiclleDash.index");
Route::post('/VehicleDash',[VehicleController :: class ,"store"])->name("VehiclleDash.store");
Route::get('/deleteVehicleDash/{id}',[VehicleController::class,'destroy'])->name("VehiclleDash.destroy");
Route::get('/updateVehicle/{id}',[VehicleController::class,'edit'])->name("editVehicle");
Route::post('/updateVehicle/{id}',[VehicleController::class,'update'])->name("updateVehicle");
// //=============================================================================================================================================



Route::get('/HotelDashForm',[HotelController :: class ,"create"])->name("HotellDash.create");
Route::get('/HotelDash',[HotelController :: class ,"index"])->name("HotellDash.index");
Route::post('/HotelDash',[HotelController :: class ,"store"])->name("HotellDash.store");
Route::delete('/deleteHotelDash/{id}',[HotelController::class,'destroy'])->name("HotellDash.destroy");


// //=============================================================================================================================================



Route::get('/TripDashForm',[TripController :: class ,"create"])->name("TrippDash.create");
Route::get('/TripDash',[TripController :: class ,"index"])->name("TrippDash.index");
Route::post('/TripDash',[TripController :: class ,"store"])->name("TrippDash.store");
Route::get('/deleteTripDash/{id}',[TripController::class,'destroy'])->name("TrippDash.destroy");
Route::post('/TripDash/{id}', [TripController::class, 'update'])->name('TripDash.update');
Route::get('/TripDash/{id}/edit', [TripController::class, 'edit'])->name('TripDash.edit');



// //=============================================================================================================================================



Route::get('/OrderDetails',[OrderDetailsController :: class ,"create"])->name("OrderrDetails.create");
Route::get('/OrderDetails',[OrderDetailsController :: class ,"index"])->name("OrderrDetails.index");
Route::post('/OrderDetails/{order}',[OrderDetailsController :: class ,"store"])->name("OrderrDetails.store");
Route::get('/deleteOrderDetails/{id}',[OrderDetailsController::class,'destroy'])->name("OrderrDetails.destroy");

// //=============================================================================================================================================
// //=============================================================================================================================================
// //=============================================================================================================================================
// //===========================================================================================================================================


Route::get('/TourguideProfile',[TourguideController :: class ,"index"])->name("TourguideProfile.index");
Route::delete('/deleterequest/{id}',[TourguideController::class,'destroy'])->name("deleterequest.destroy");
Route::post('/TourguideProfile',[TourguideController :: class ,"storeTourguide"])->name("TourguideProfile.store");
Route::PUT('/TourguideProfile/{id}', [TourguideController::class, 'update'])->name('TourguideProfile.update');
Route::get('/TourguideProfile/{id}/edit', [TourguideController::class, 'edit'])->name('TourguideProfile.edit');




// //==================Hotel Owner Dashboard=======================================================================================================
// //=============================================================================================================================================
// //=============================================================================================================================================
// //=============================================================================================================================================


Route::get('/HotelOwnerDashboard',[DashboardController :: class ,"addHotelView"])->name("addHotelView");
Route::post('/addHotel/HotelOwnerDashboard',[DashboardController :: class ,"addHotel"])->name("addHotel");
Route::get('/MyDashboard',[DashboardController :: class ,"dashboard"])->name("hotelOwnerDashboard");
Route::get('/MyOwnedHotels',[DashboardController :: class ,"allOwnedHotels"])->name("MyOwnedHotels");
Route::get('/previewHotel/{hotelID}',[DashboardController :: class ,"previewHotel"])->name("previewHotel");
Route::get('/deleteHotel/{hotelID}',[DashboardController :: class ,"deleteHotel"])->name("deleteHotel");
Route::get('/editHotel/{hotelID}',[DashboardController :: class ,"editHotel"])->name("editHotel");
Route::post('/updateHotel/{hotelID}',[DashboardController :: class ,"updateHotel"])->name("updateHotel");

// --------------------------rooms

Route::get('/AllRooms/{hotelID}',[DashboardController :: class ,"AllRooms"])->name("AllRooms");
Route::get('/addRoom',[DashboardController :: class ,"addRoomForm"])->name("addRoomForm");
Route::get('/addRoomforHotel/{hotelID}',[DashboardController :: class ,"addRoomFormForHotel"])->name("addRoomFormForHotel");
Route::post('/storeRoom',[DashboardController :: class ,"storeRoom"])->name("storeRoom");
Route::get('/previewRoom/{roomID}',[DashboardController :: class ,"previewRoom"])->name("previewRoom");
Route::get('/deleteRoom/{roomID}',[DashboardController :: class ,"deleteRoom"])->name("deleteRoom");
Route::get('/editRoom/{roomID}',[DashboardController :: class ,"editRoom"])->name("editRoom");
Route::post('/updateRoom/{roomID}',[DashboardController :: class ,"updateRoom"])->name("updateRoom");
Route::get('/editRoom/{roomID}',[DashboardController :: class ,"editRoom"])->name("editRoom");
Route::get('/editRoom/{roomID}',[DashboardController :: class ,"editRoom"])->name("editRoom");

Route::get('/allRequests/{id}',[DashboardController :: class ,"allRequests"])->name("allRequests");
Route::post('/changeRequest/{order}',[DashboardController :: class ,"changeStatus"])->name("changeStatus");


// /=====================================================================================================================

// ======================================================================================================

Route::get('/AdminDash',function(){return view('/dashboardAdmin/admin');})->name('AdminDash');


Route::get('/Placesall',[ViewPlacesController::class,'index'])->name('Placesall');

Route::get('allHotel',[viewHotelsController::class,'index'])->name('allHotell');
Route::get('Hotel/{id}',[viewHotelsController::class,'showhotel'])->name('hotel.show');
Route::get('Room/{id}',[viewHotelsController::class,'room'])->name('roomm');

Route::post('/bookRoom', [viewHotelsController::class, 'store'])->name('bookRoomm');

Route::get('allPlaces',[ViewTourGidesController::class,'index'])->name('allTourguide');



// =========================================
Route::get('/tourguideRequests/{id}',[DashboardController :: class ,"tourguideRequests"])->name("tourguideRequests");
Route::post('/tourChangeStatus/{order}',[DashboardController :: class ,"tourChangeStatus"])->name("tourChangeStatus");
Route::post('/storeRegRoom/{id}',[regularController :: class ,"storeRegRoom"])->name("storeRegRoom.store");
Route::post('/storeRegTourguide/{id}',[regularController :: class ,"storeRegTourguide"])->name("storeRegTourguide.store");
Route::post('/storeRegPlace/{id}',[regularController :: class ,"storeRegPlace"])->name("storeRegPlace.store");
