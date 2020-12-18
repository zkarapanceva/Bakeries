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
    return view('index');
});

Route::get('/help', function () {
    return view('help');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/search/{city}', 'BakeryController@index');
