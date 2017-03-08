<?php
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
Route::get('login', function () {
    return view('pages.authentication.login');
});
Route::post('dologin', 'AuthController@dologin');
Route::group(['middleware' => 'auth'], function () {
Route::get('/', function () {
    return view('pages.welcome');
});
Route::get('booking/add', function () {
    return view('pages.booking.addwarrning');
});
Route::post('booking/add', 'BookingController@add');
// Route::post('booking/doAdd', );
Route::get('booking/view', function () {
    return view('pages.booking.view');
});
Route::get('booking/edit', function () {
    return redirect()->action('BookingController@index');
});
Route::get('booking/edit/{id}','BookingController@edit');
Route::post('booking/doEdit', 'BookingController@update');
Route::post('booking/doDelete', 'BookingController@delete');
Route::get('booking/view','BookingController@index')->name('bookingView');
Route::post('booking/doAdd', 'BookingController@create');


Route::post('booking/trip/assign', 'TripController@assign');
Route::post('booking/trip/doassignment', 'TripController@create');
Route::post('booking/trip/run', 'TripController@runtrip');
Route::post('booking/trip/dorun', 'TripController@run');
Route::post('booking/trip/complete', 'TripController@completetrip');
Route::post('booking/trip/docomplete', 'TripController@complete');
Route::post('booking/trip/info', 'TripController@info');

//Customer Routes
Route::get('customer/add', function () {
    return view('pages.customer.add');
});
Route::get('customer/view', function () {
    return view('pages.customer.view');
});
Route::get('customer/edit', function () {
    return redirect()->action('CustomerController@index');
});
Route::get('customer/edit/{id}','CustomerController@edit');
Route::post('customer/doEdit', 'CustomerController@update');
Route::post('customer/doDelete', 'CustomerController@delete');
Route::get('customer/view','CustomerController@index');
Route::post('customer/doAdd', 'CustomerController@create');
Route::post('customer/info', 'CustomerController@info');
//Vehicle Routes
Route::get('vehicle/add', function () {
    return view('pages.vehicle.add');
});
Route::get('vehicle/edit', function () {
    return redirect()->action('VehicleController@index');
});
Route::get('vehicle/edit/{id}','VehicleController@edit');
Route::post('vehicle/doEdit', 'VehicleController@update');
Route::post('vehicle/doDelete', 'VehicleController@delete');
Route::get('vehicle/view','VehicleController@index');
Route::post('vehicle/doAdd', 'VehicleController@create');

//Driver Routes
Route::get('driver/add', function () {
    return view('pages.driver.add');
});

Route::get('driver/view', function () {
    return view('pages.driver.view');
});
Route::get('driver/edit', function () {
    return redirect()->action('DriverController@index');
});
Route::get('driver/edit/{id}','DriverController@edit');
Route::post('driver/doEdit', 'DriverController@update');
Route::post('driver/doDelete', 'DriverController@delete');
Route::get('driver/view','DriverController@index');
Route::post('driver/doAdd', 'DriverController@create');

Route::get('sms/portal', function () {
    return view('pages.sms.portal');
});
Route::post('sms/portal', 'SmsController@show');
Route::post('sms/send', 'SmsController@send');
});

