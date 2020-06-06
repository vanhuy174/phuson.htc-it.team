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

Route::get('/', 'AreaController@index')->middleware('auth');

Auth::routes();

Route::prefix('/area')->group(function (){
    Route::get('/', 'AreaController@index')->name('getArea');
    Route::post('/', 'AreaController@store')->name('postArea');
    Route::get('/{id}', 'AreaController@show')->name('getInfoArea');
    Route::delete('/{id}', 'AreaController@destroy')->name('postDeleteArea');
    Route::post('export', 'AreaController@export')->name('export');
});

Route::prefix('/product')->group(function (){
    Route::get('/{id}', 'ProductController@index')->name('getProduct');
});

//Route::get('/product', 'ProductController@index')->name('getProduct');
Route::post('/product', 'ProductController@store')->name('postProduct');
