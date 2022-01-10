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

Route::get('/','HomeController@index')->name('home');
Route::get('/cart', function () {
    return view('frontend.cart');
})->name('cart');

Route::get('/gallery', function () {
    return view('frontend.gallery');
})->name('gallery');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');





Route::get('/frontendwater','FrontendwaterController@water')->name('frontendwater');





Route::get('/shopdetail', function () {
    return view('frontend.detail');
})->name('shopdetail');

// Route::group(['middleware' => ['role:admin|shop'] ],function(){
Route::resource('/order','OrderController');

// });



 Route::resource('/shop','ShopController');
 Route::resource('/water','WaterController');
 Route::resource('/laundry','LaundryController');
 Route::resource('/category','CategoryController');
 Route::resource('/service','ServiceController');
 Route::resource('/township','TownshipController');
 Route::resource('/shopowner','ShopownerController');
Route::get('/frontendshop','FrontendshopController@shop');

Route::post('/findshop','FrontendshopController@find');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
