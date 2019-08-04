<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function () {
});
Route::get('/locations', 'LocationController@index');
Route::get('/customers', 'CustomerController@index');
// Route::get('/manufacturers', 'ManufacturerController@index');
// Route::post('/manufacturers', 'ManufacturerController@store');
Route::resource('/manufacturers', 'ManufacturerController', ['only' => ['index', 'store']]);

Route::resource('/vehicles', 'VehicleController');
// Route::get('/vehicle/{id}', 'VehicleController@show');

Route::get('/model-vehicles', 'ModelVehicleController@index');
Route::get('/type-vehicles', 'TypeVehicleController@index');

Route::get('/rental-statuses', 'RentalStatusController@index');
Route::get('/rentals', 'RentalController@index');
Route::get('/rentals/paginated', 'RentalController@paginate');
Route::get('/rentals/{customer}/customer', 'RentalController@forCustomer');