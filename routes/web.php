<?php

use Illuminate\Support\Facades\Route;

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


Route::get('category','CategoryController@app')->name('category.app');
Route::get('movie','MovieController@app')->name('movie.app');
Route::get('rental','RentalController@app')->name('rental.app');
Route::get('rol','RolController@app')->name('rol.app');
Route::get('status','StatusController@app')->name('status.app');
Route::get('typestatus','TypeStatusController@app')->name('typestatus.app');
Route::get('user','UserController@app')->name('user.app');
