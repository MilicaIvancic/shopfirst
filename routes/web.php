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
*

Route::get('/', function () {
    return view('pages.streetStore');
});*/

Route::get('/', "FrontEndContoller@streetStore");
Route::get('/shopAll', "FrontEndContoller@shopAll");
Route::get('/shopClothes', "FrontEndContoller@shopClothes");
Route::get('/shopByCategory/{id}', "FrontEndContoller@shopByCategory");

/// sort controlerr
Route::get('/SortNameAZ/{id?}', "SortController@sortNameAZ");
Route::get('/SortNameZA/{id?}', "SortController@sortNameZA");
Route::get('/SortPriceLow/{id?}', "SortController@SortPriceLow");
Route::get('/SortPriceHight/{id?}', "SortController@SortPriceHight");

Route::get('/singleProduct/{id}', "FrontEndContoller@singleProduct");
////card

Route::get('/card', "FrontEndContoller@card");
Route::get('/createCard', "FrontEndContoller@createCard");
Route::post('/addToCard/{id}', "FrontEndContoller@addToCard");
Route::get('/updateCardItem/{id}', "FrontEndContoller@updateCardItem");
Route::get('/loverSum/{id}', "FrontEndContoller@loverSum");
Route::get('/delete/{id}', "FrontEndContoller@delete");
Route::get('/congratulatio/{id}', "FrontEndContoller@finishCard");
Route::get('/userCardFinished/{id}', "FrontEndContoller@userCardFinished");
Route::put('/updatemyaccount/{id}', "FrontEndContoller@updatemyaccount")->name('updatemyacc');
Route::get('/updateformuser/{id}', "FrontEndContoller@form");



Route::get('/contact', "FrontEndContoller@contact");

/** Login, register, logout */
Route::get('/loginForm', "LoginController@LoginForm");
Route::post('/login', "LoginController@login")->name('login');
Route::get('/logout', "LoginController@logout")->name('logout');
Route::get('/registerForm', "LoginController@registerform");
Route::post('/register', "LoginController@register")->name('r');




Route::get('/SortPriceLow/{id?}', "SortController@SortPriceLow");
Route::get('/SortPriceHight/{id?}', "SortController@SortPriceHight");

//admin
Route::group(['middleware' => 'admin'], function() {

    Route::get('/adminpanel', 'AdminController@index');
    Route::get('/adminproduct/delete/{id}', 'DeleteAjaxProductController@deletAjax');
    Route::resource('/adminuser', 'AdminUserController');
    Route::resource('/adminproduct', 'AdminProductController');
    Route::resource('/adminmenu', 'AdminMenuProductController');


});


