<?php

use Illuminate\Support\Facades\Route;
use App\Mail\UserRegisteredMail;
use Illuminate\Support\Facades\Mail;
//use App\Http\Resources\Slot as SlotResource;
//use App\Slot;

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

Route::get('/', 'MainController@index')->name('client.index');
Route::get('/community-services', 'MainController@services')->name('client.services');
Route::get('/admin/appointments/all', 'AdminAppointmentController@index')->name('client.user.appointments');
Route::get('/admin/appointments/{appointment}/edit', 'AdminAppointmentController@edit')->name('client.user.appointments.edit');
Route::patch('/admin/appointments/{appointment}', 'AdminAppointmentController@update')->name('client.user.appointments.update');

Route::post('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function() {
	// Dashboard
	Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');

	// Login Routes
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

	// Logout Route
	Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');

	// Register Routes
	Route::get('/register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
	Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

	// Password Reset Routes
	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset')->name('admin.password.update');
});

/*
Route::resource('appointments', 'AppointmentController')->parameters([
	'create' => 'service_id'
]);
/**/
Route::resource('appointments', 'AppointmentController');
Route::get('/appointments/create/{service_id}', 'AppointmentController@create')->name('appointments.create');

Route::resources([
	'addresses' => 'AddressController',
	'slots' => 'SlotController',
	'services' => 'ServiceController',
	'requirements' => 'RequirementController',
]);

Route::get('/slots/available-slots/', 'AppointmentController@availableTimeSlots');

Route::get('/download/{service_id}', 'AppointmentController@download')->name('pdf.download');

//Route::get('/slot', function () {
//  return new SlotResource(Slot::findOrFail(4));
//});

//Route::get('/services', function() {
//	$services = App\Service::get();

//	return view('partials._service-index.blade.php', ['services' => $services]);
//})->name('services.index');

/*Publish mail template to edit: php artisan vendor:publish --tag=laravel-mail*/
/*
Route::get('/email', function() {
	Mail::to('email@email.com')->send(new UserRegisteredMail());
	return new UserRegisteredMail();
});
/**/