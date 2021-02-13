<?php

use Illuminate\Support\Facades\Route;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;

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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Publish mail template to edit: php artisan vendor:publish --tag=laravel-mail*/
/*
Route::get('/email', function() {
	Mail::to('email@email.com')->send(new UserRegisteredMail());
	return new UserRegisteredMail();
});
/**/