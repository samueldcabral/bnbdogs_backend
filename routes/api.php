<?php

use Illuminate\Http\Request;

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

Route::group(['middleware' => 'cors'], function() 
{
    Route::resource('booking', 'BookingController');
    Route::resource('dog', 'DogController');
    Route::resource('user', 'UserController');
    Route::resource('service', 'ServiceController');
    Route::resource('bookingservice', 'BookingServiceController');
    Route::post('booking/{booking}', 'BookingController@addservice');
    
});

Route::fallback(function(){
    return response()->json(['message' => 'Route Forbidden.'], 403);
})->name('api.fallback.404');