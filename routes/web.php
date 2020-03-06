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

//member
Route::get('/Cancelorder/{id}', 'MemberController@cancelorder');
Route::get('/Payorder/{id}', 'MemberController@payorder');

//cart
Route::get('/Cart', 'CartController@cart');
Route::get('/Remove-item/{id}', 'CartController@removeItem');
//Route::get('/Add-to-cart/{id}', 'CartController@getAddToCart');
Route::get('/Add-to-cart/{id}/{color}/{size}', 'CartController@getAddToCart');
Route::get('/Increase-one-item/{id}', 'CartController@increaseByOne');
Route::get('/Decrease-one-item/{id}', 'CartController@decreaseByOne');
Route::get('/Clear-cart', 'CartController@clearCart');


Route::get('/', function () {
    return view('mik');
});

//會員
Route::get('/Member', 'MemberController@member');

//qa
Route::get('/QA', 'QAController@QA');

//ajax 查詢存貨
Route::post('Detail/Inventory','AjaxController@Inventory');

//訂單
Route::get('/Order/new', 'OrdersController@new')->middleware(['login_auth']);
Route::post('/Orders', 'OrdersController@store')->middleware(['login_auth']);//送出訂單到綠界

//綠界回調網址
Route::post('/Callback', 'OrdersController@callback');
Route::get('/Success', 'OrdersController@redirectFromECpay');

//login,register
Route::post('/Sendpassword', 'Login_RegisteController@Sendpassword');
Route::get('/Register', 'Login_RegisteController@Register');
Route::get('/Login_Register', 'Login_RegisteController@Login_Register');
Route::post('/Register/Validate', 'Login_RegisteController@Register_Validate');
Route::post('/Login_Register/Validate', 'Login_RegisteController@Login_Validate');
Route::get('/Logout', 'Login_RegisteController@Logout');//登出

//detail
Route::group(['prefix' => 'Detail'], function () {

    Route::get('/{id}', 'DetailController@Detail');

});

//product Women
Route::group(['prefix' => 'Women'], function () {

    Route::get('/', 'WomenSearchController@Women');
    Route::get('/Cloth', 'WomenSearchController@WomenCloth');
    Route::get('/Pant', 'WomenSearchController@WomenPant');
    Route::get('/Coat', 'WomenSearchController@WomenCoat');
    Route::get('/Underwear','WomenSearchController@WomenUnderwear');
    Route::get('/Other', 'WomenSearchController@WomenOther');

});

//product men
Route::group(['prefix' => 'Men'], function () {

    Route::get('/', 'MenSearchController@Men');
    Route::get('/Cloth', 'MenSearchController@MenCloth');
    Route::get('/Pant', 'MenSearchController@MenPant');
    Route::get('/Coat', 'MenSearchController@MenCoat');
    Route::get('/Underwear', 'MenSearchController@MenUnderwear');
    Route::get('/Other', 'MenSearchController@MenOther');

});

//product kids
Route::group(['prefix' => 'Kids'], function () {

    Route::get('/', 'KidsSearchController@Kids');
    Route::get('/Cloth', 'KidsSearchController@KidsCloth');
    Route::get('/Pant', 'KidsSearchController@KidsPant');
    Route::get('/Coat', 'KidsSearchController@KidsCoat');
    Route::get('/Underwear', 'KidsSearchController@KidsUnderwear');
    Route::get('/Other', 'KidsSearchController@KidsOther');

});

//product new
Route::group(['prefix' => 'New'], function () {

    Route::get('/', 'NewSearchController@New');
});

//product sale
Route::group(['prefix' => 'Sale'], function () {

    Route::get('/', 'SaleSearchController@Sale');
});

//user/auth/third-sign-in
Route::group(['prefix' => 'User'], function(){
    //使用者驗證
    Route::group(['prefix' => 'Auth'], function(){
        //Facebook登入
        Route::get('/Facebook-sign-in', 'FbAuthController@facebookSignInProcess');
        //Facebook登入重新導向授權資料處理
        Route::get('/Facebook-sign-in-callback', 'FbAuthController@facebookSignInCallbackProcess');
        //google登入
        Route::get('/Google-sign-in', 'GoogleAuthController@googleSignInProcess');
        //google登入重新導向授權資料處理
        Route::get('/Google-sign-in-callback', 'GoogleAuthController@googleSignInCallbackProcess');
        //line登入
        Route::get('/Line-sign-in', 'LineAuthController@lineSignInProcess');
        //line登入重新導向授權資料處理
        Route::get('/Line-sign-in-callback', 'LineAuthController@lineSignInCallbackProcess');

    });
});


