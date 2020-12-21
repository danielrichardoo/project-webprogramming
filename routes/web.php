<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detail/{id}',  'ItemController@detail');
Route::get('/cart', 'CartController@index');
Route::get('/addToCart/{id}', 'CartController@view');
Route::post('/addToCart/{id}', 'CartController@add');
Route::get('/editCart/{id}', 'CartController@edit');
Route::put('/cart/{id}', 'CartController@editItem');
Route::get('/addShoe', 'ItemController@index');
Route::post('/addShoe', 'ItemController@add');
Route::get('/updateShoe/{id}', 'ItemController@indexupdate');
Route::post('/updateShoe/{id}', 'ItemController@update');
Route::get('/transaction', 'TransactionController@index');
Route::post('/checkout', 'TransactionController@add');
