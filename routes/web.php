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

//ajax
Route::post('Detail/inventory','ajaxController@inventory');


//login,register

Route::get('/Register', 'Login_RegisteController@Register');
Route::get('/Login_Register', 'Login_RegisteController@Login_Register');
Route::post('/Register/Validate', 'Login_RegisteController@Register_Validate');
Route::post('/Login_Register/Validate', 'Login_RegisteController@Login_Validate');
Route::get('/Logout', 'Login_RegisteController@Logout');


//cart

Route::get('/cart', 'CartController@cart');
Route::get('/remove-item/{id}', 'CartController@removeItem');
Route::get('/add-to-cart/{id}', 'CartController@getAddToCart');
Route::get('/clear-cart', 'vController@clearCart');
Route::get('/increase-one-item/{id}', 'CartController@increaseByOne');
Route::get('/decrease-one-item/{id}', 'CartController@decreaseByOne');


//detail

Route::group(['prefix' => 'Detail'], function () {

    Route::get('/{id}', 'DetailController@Detail');

});


//product
Route::group(['prefix' => 'Women'], function () {

    Route::get('/', 'WomenSearchController@Women');
    Route::get('/Cloth', 'WomenSearchController@WomenCloth');
    Route::get('/Pant', 'WomenSearchController@WomenPant');
    Route::get('/Coat', 'WomenSearchController@WomenCoat');
    Route::get('/Underwear','WomenSearchController@WomenUnderwear');
    Route::get('/Other', 'WomenSearchController@WomenOther');

});

Route::group(['prefix' => 'Men'], function () {

    Route::get('/', 'MenSearchController@Men');
    Route::get('/Cloth', 'MenSearchController@MenCloth');
    Route::get('/Pant', 'MenSearchController@MenPant');
    Route::get('/Coat', 'MenSearchController@MenCoat');
    Route::get('/Underwear', 'MenSearchController@MenUnderwear');
    Route::get('/Other', 'MenSearchController@MenOther');

});

Route::group(['prefix' => 'Kids'], function () {

    Route::get('/', 'KidsSearchController@Kids');
    Route::get('/Cloth', 'KidsSearchController@KidsCloth');
    Route::get('/Pant', 'KidsSearchController@KidsPant');
    Route::get('/Coat', 'KidsSearchController@KidsCoat');
    Route::get('/Underwear', 'KidsSearchController@KidsUnderwear');
    Route::get('/Other', 'KidsSearchController@KidsOther');

});

Route::group(['prefix' => 'New'], function () {

    Route::get('/', 'NewSearchController@New');
});

Route::group(['prefix' => 'Sale'], function () {

    Route::get('/', 'SaleSearchController@Sale');
});

