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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/app/submitForm','App\Http\Controllers\MainController@submit');
Route::post('/app/adminLogin','App\Http\Controllers\MainController@adminLogin');
Route::post('/app/submitHotel','App\Http\Controllers\MainController@submitHotel');
Route::post('/app/submitState','App\Http\Controllers\MainController@submitState');
Route::get('/app/getStates','App\Http\Controllers\MainController@getStates');
Route::get('/app/getHotels/{id}','App\Http\Controllers\MainController@getHotels');
Route::get('/app/checkAdmin','App\Http\Controllers\MainController@checkAdmin');



Route::get('/logout','App\Http\Controllers\MainController@logout');
Route::get('/admin','App\Http\Controllers\MainController@adminPage');
Route::get('/','App\Http\Controllers\MainController@index');
Route::any('{slug}','App\Http\Controllers\MainController@index')->where('slug', '([-a-z/0-9_\s]+)');



