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
    Route::get('/', 'AreaController@index')->middleware('auth');
    Route::post('/', 'AreaController@store')->name('postArea');
    Route::get('/{id}', 'AreaController@show')->middleware('auth');

    Route::get('/{id}/{id_product}', 'ProductController@show')->middleware('auth');
    Route::post('/{id}/{id_product}', 'ProductController@update')->name('updateProduct');

    Route::delete('/{id}/{id_product}', 'AreaController@update')->name('deleteProduct');
    Route::delete('/{id}', 'AreaController@destroy')->name('deleteArea');
    Route::post('export', 'AreaController@export')->name('export');
});

Route::prefix('/product')->group(function (){
    Route::get('/{id}', 'ProductController@index')->name('getProduct');
});

//Route::get('/product', 'ProductController@index')->name('getProduct');
Route::post('/product', 'ProductController@store')->name('postProduct')->middleware('auth');
