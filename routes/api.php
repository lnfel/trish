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

Route::post('/login', 'Api\AuthController@login')->name('login');
Route::post('/register', 'Api\AuthController@register')->name('register');

Route::get('/all-slot-dates', 'Api\SlotApiController@allSlotDates')->name('allSlotDates');
Route::get('/all-slot-date-times/{date}', 'Api\SlotApiController@allSlotDateTimes')->name('allSlotDateTimes');
Route::get('/service/{service}/purposes', 'Api\PurposeApiController@allServicePurposes')->name('allServicePurposes');
Route::get('/regions', 'Api\PSGCApiController@allRegions')->name('allRegions');
Route::get('/regions/{region}/provinces', 'Api\PSGCApiController@provinces')->name('provinces');
Route::get('/provinces/{province}/cities', 'Api\PSGCApiController@cities')->name('cities');
Route::get('/cities/{city}/brgys', 'Api\PSGCApiController@brgys')->name('brgys');

Route::middleware('auth:api')->group(function() {
	Route::resource('/slots', 'Api\SlotApiController');
	Route::post('/logout', 'Api\AuthController@logout')->name('logout');
});

Route::post('webhook/paymongo', 'Api\PaymongoWebhookController')->middleware('paymongo.signature');