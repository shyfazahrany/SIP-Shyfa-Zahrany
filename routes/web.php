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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');
Route::get('export', 'ProductController@export')->name('export');
Route::get('importView', 'ProductController@importView')->name('importView');
Route::get('import', 'ProductController@import')->name('import');
Route::get('products', 'ProductController@search')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
