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
//     return view('layouts.website');
// });
Route::get('/', 'WebsiteController@index')->name('website');
Route::post('/contact-msg', 'WebsiteController@contact_msg')->name('web_contact_msg');