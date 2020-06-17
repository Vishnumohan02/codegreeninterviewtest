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

Route::get('/page', function () {
    return view('Layout.head');
});

Route::get('/Register','HomeController@register');
Route::post('/store','HomeController@store');
Route::post('/otpverification','HomeController@verify');
Route::get('/Login','LoginController@login');
Route::post('/profile','LoginController@profilelogin');
Route::get('/edit/{id}','LoginController@profileedit');
Route::get('/cancel/{id}','LoginController@canceledit');
Route::post('/update/{id}','LoginController@update');
Route::get('/Logout','LoginController@logout');

