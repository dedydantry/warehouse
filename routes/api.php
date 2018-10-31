<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('brand', 'BrandController@index');
Route::get('brand/{id}', 'BrandController@show');
Route::post('brand', 'BrandController@store');
Route::put('brand/{id}', 'BrandController@update');
Route::delete('brand/{id}', 'BrandController@destroy');

Route::get('satuan', 'SatuanController@index');
Route::get('satuan/{id}', 'SatuanController@show');
Route::post('satuan', 'SatuanController@store');
Route::put('satuan/{id}', 'SatuanController@update');
Route::delete('satuan/{id}', 'SatuanController@destroy');

Route::get('barang', 'BarangController@index');
Route::get('barang/create', 'BarangController@create');
Route::post('barang', 'BarangController@store');
Route::delete('barang/{id}', 'BarangController@destroy');
Route::get('barang/{id}', 'BarangController@show');
Route::put('barang/{id}', 'BarangController@update');

Route::get('transaction', 'TransactionController@index');
Route::post('transaction', 'TransactionController@store');
Route::get('transaction/show/{id}', 'TransactionController@show');

Route::get('order', 'OrderController@index');
