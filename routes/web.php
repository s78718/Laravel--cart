<?php

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
    return view('mik');
});


//login,register
Route::get('/Register', 'Login_RegisteController@Register');
Route::get('/Login_Register', 'Login_RegisteController@Login_Register');
Route::post('/Register/Validate', 'Login_RegisteController@Register_Validate');
Route::post('/Login_Register/Validate', 'Login_RegisteController@Login_Validate');
Route::get('/Logout', 'Login_RegisteController@Logout');


//product
Route::get('/Women/Cloth', 'SearchController@WomenCloth');
Route::get('/Men/Cloth', 'SearchController@MenCloth');
Route::get('/Kids/Cloth', 'SearchController@KidsCloth');

//cart
Route::get('/cart', 'CartController@cart');
Route::get('/remove-item/{id}', 'CartController@removeItem');
Route::get('/add-to-cart/{id}', 'CartController@getAddToCart');
Route::get('/clear-cart', 'vController@clearCart');
Route::get('/increase-one-item/{id}', 'CartController@increaseByOne');
Route::get('/decrease-one-item/{id}', 'CartController@decreaseByOne');
