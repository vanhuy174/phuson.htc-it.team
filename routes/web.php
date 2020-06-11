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

Route::get('/', 'AreaController@index');

Auth::routes();

Route::prefix('/area')->group(function (){
    Route::get('/', 'AreaController@index')->middleware('auth');
    Route::post('/', 'AreaController@store')->name('postArea');
    Route::get('show_area/{id}', 'AreaController@show')->name('show_area');
    Route::get('edit_area/{id}', 'AreaController@edit')->name('edit_area');
    Route::post('update_area', 'AreaController@update')->name('update_area');
    Route::delete('/{id}', 'AreaController@destroy')->name('deleteArea');
    Route::post('show_area/export', 'AreaController@export')->name('export');
});

Route::prefix('/product')->group(function (){
    Route::get('/{id}', 'ProductController@index')->name('getProduct');
    Route::get('/{id}/{id_product}', 'ProductController@show')->middleware('auth');
    Route::post('save_product', 'ProductController@update')->name('save_product');
    Route::post('/delete', 'ProductController@destroy')->name('deleteProduct');
});

Route::prefix('/ncc')->group(function (){
    Route::get('/', 'NccController@index');
    Route::get('/{id}', 'NccController@edit');
    Route::post('/', 'NccController@store');
    Route::post('save_ncc/', 'NccController@update');
    Route::delete('delete/{id}', 'NccController@destroy');
});

    //Route::get('/product', 'ProductController@index')->name('getProduct');
    Route::post('/product', 'ProductController@store')->name('postProduct');
    Route::post('exportday', 'AreaController@exportday')->name('exportday');
    Route::post('export_excel_month', 'AreaController@export_excel_month')->name('export_excel_month');

    Route::get('/my-profile', 'ProfileController@index');
    Route::post('/my-profile', 'ProfileController@update')->name('updateProfile');
    Route::get('/create-account', 'ProfileController@index');

