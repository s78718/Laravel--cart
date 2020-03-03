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

//cart

Route::get('/Cart', 'CartController@cart');
Route::get('/Remove-item/{id}', 'CartController@removeItem');
Route::get('/Add-to-cart/{id}', 'CartController@getAddToCart');
Route::get('/Increase-one-item/{id}', 'CartController@increaseByOne');
Route::get('/Decrease-one-item/{id}', 'CartController@decreaseByOne');
Route::get('/Clear-cart', 'CartController@clearCart');


//訂單
Route::get('/Order/new', 'OrdersController@new');
Route::post('/Orders', 'OrdersController@store');
Route::get('/Orders', 'OrdersController@index');
Route::get('/Confirm-orders/{order}', 'OrdersController@confirm');
Route::post('/Callback', 'OrdersController@callback');
Route::get('/Success', 'OrdersController@redirectFromECpay');


Route::get('/', function () {
    return view('mik');
});

//ajax
Route::post('Detail/Inventory','AjaxController@Inventory');


//login,register

Route::get('/Register', 'Login_RegisteController@Register');
Route::get('/Login_Register', 'Login_RegisteController@Login_Register');
Route::post('/Register/Validate', 'Login_RegisteController@Register_Validate');
Route::post('/Login_Register/Validate', 'Login_RegisteController@Login_Validate');
Route::get('/Logout', 'Login_RegisteController@Logout');




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


//user/auth/facebook-sign-in
Route::group(['prefix' => 'user'], function(){
    //使用者驗證
    Route::group(['prefix' => 'auth'], function(){
        //Facebook登入
        Route::get('/facebook-sign-in', 'FbAuthController@facebookSignInProcess');
        //Facebook登入重新導向授權資料處理
        Route::get('/facebook-sign-in-callback', 'FbAuthController@facebookSignInCallbackProcess');
        //google登入
        Route::get('/google-sign-in', 'GoogleAuthController@googleSignInProcess');
        //google登入重新導向授權資料處理
        Route::get('/google-sign-in-callback', 'GoogleAuthController@googleSignInCallbackProcess');
        //line登入
        Route::get('/line-sign-in', 'LineAuthController@lineSignInProcess');
        //line登入重新導向授權資料處理
        Route::get('/line-sign-in-callback', 'LineAuthController@lineSignInCallbackProcess');
         //yahoo登入
         Route::get('/yahoo-sign-in', 'YahooAuthController@yahooSignInProcess');
         //yahoo登入重新導向授權資料處理
         Route::get('/yahoo-sign-in-callback', 'YahooAuthController@yahooSignInCallbackProcess');
        //登出
        Route::get('/logout', 'FbAuthController@logout');
    });
});
