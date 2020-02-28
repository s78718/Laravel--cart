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

Route::post('/Login_Register/Validate', 'Login_RegisteController@Login_Validate');
Route::get('/Logout', 'Login_RegisteController@Logout');
Route::get('/Login_Register', 'Login_RegisteController@Login_Register');
Route::get('/Search/Woman', 'SearchController@SearchWoman');
Route::get('/Search/Man', 'SearchController@SearchMan');
Route::get('/Search/Kid', 'SearchController@SearchKid');
