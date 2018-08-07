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



Auth::routes();


Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'CarController@index')->name('home');
    Route::post('/add-car', 'CarController@addCar')->name('addCar');
    Route::get('delete/{id}', 'CarController@deleteCar')->name('deleteCar');
});

Route::group(['middleware' => 'guest'], function () {
      Route::get('/', 'Auth\LoginController@showLoginForm');
});
