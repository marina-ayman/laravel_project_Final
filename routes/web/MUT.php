<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MUTController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\placesController\PlaceController;

Route::get('/MUT',[MUTController::class,'create'])->name("MUT.create");
// ->middleware('auth')
Route::post('/MUTStoringOrder',[MUTController::class,'storeOrder'])->name("MUT.store");
Route::get('/availableHotels/{budgetForHotels}/{order}',[MUTController::class,'getAvailableHotels'])->name("getAvailableHotels");

// to view the prices of the rooms in specific hotel
Route::post('/availableRooms/{order}/{hotel}',[MUTController::class,'getAvailableRooms'])->name("getAvailableRooms");
Route::post('/BookInHotel/{order}/{hotel}',[MUTController::class,'BookInHotel'])->name("BookInHotel");

Route::post('/availablePlaces/{order}',[MUTController::class,'getAvailablePlaces'])->name("getAvailabletrip");
Route::get('/availablePlaces/{order}',[MUTController::class,'getAvailablePlaces'])->name("getAvailablePlaces");

Route::get('/showPlace/{place}',[PlaceController::class,'show'])->name('showPlace');

Route::post('/bookPlaces/{order}',[MUTController::class,'bookPlaces'])->name("bookPlaces");
Route::get('/availableTourguides/{order}',[MUTController::class,'getAvailableTourguides'])->name("getAvailableTourguides");

Route::get('/bookWithTourguide/{order}/{tourguide}',[MUTController::class,'bookWithTourguide'])->name("bookWithTourguide");

Route::get('/MUTE/{order}',[MUTController::class,'MUTE'])->name("MUTE");
// Route::get('/payForMyMUTE/{order}',[MUTController::class,'viewPayForMUTE'])->name("viewPayForMUTE");
// Route::get('/payForMyMUTE/{order}',[MUTController::class,'viewPayForMUTE'])->name("viewPayForMUTE");


Route::get('/order/{order}',[MUTController::class,'MUTE'])->name(" viewPayForMUTE");
Route::post('/cancelOrder/{orderID}',[MUTController::class,'cancelOrder'])->name("cancelOrder");
Route::get('/PayForMUTE',[MUTController::class,"PayForMUTE"])->name('PayForMUTE');
