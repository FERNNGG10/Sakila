<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\FilmActorController;
use App\Http\Controllers\FilmCategoryController;
use App\Http\Controllers\FilmTextController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RentalController;      
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StoreController;

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
    return view('welcome');
});

Route::resource('actors', ActorController::class);
Route::resource('addresses', AddressController::class);
Route::resource('categories', CategoryController::class);
Route::resource('cities', CityController::class);
Route::resource('countries', CountryController::class);
Route::resource('customers', CustomerController::class);
Route::resource('films', FilmController::class);
Route::resource('film-actors', FilmActorController::class);
Route::resource('film-categories', FilmCategoryController::class);
Route::resource('film-texts', FilmTextController::class);
Route::resource('inventories', InventoryController::class);
Route::resource('languages', LanguageController::class);
Route::resource('payments', PaymentController::class);
Route::resource('rentals', RentalController::class);
Route::resource('staffs', StaffController::class);
Route::resource('stores', StoreController::class);
