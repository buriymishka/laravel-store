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
    return view('welcome');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware'=>'admin'], function (){
	Route::get('/', 'DashboardController@index');
	Route::resource('/post-categories', 'PostCategoriesController');
	Route::resource('/partners', 'PartnersController');
	Route::resource('/posts', 'PostsController');
	Route::resource('/product-categories', 'ProductCategoriesController');
	Route::resource('/products', 'ProductsController');
	Route::resource('/info', 'InfoController');
	Route::resource('/orders', 'OrdersController');
	Route::get('/password', 'AuthController@changePasswordForm')->name('password');
	Route::post('/password', 'AuthController@changePassword')->name('password');
	Route::get('/logout', 'AuthController@logout')->name('logout');
	Route::match(['get', 'post'], 'ajax-image-upload', 'Ajax\PhotoController@ajaxImage');
	Route::delete('ajax-remove-image', 'Ajax\PhotoController@ajaxImageDelete');
	Route::delete('ajax-remove-image-storage', 'Ajax\PhotoController@ajaxImageDeleteStorage');
});


Route::get('/', 'HomeController@index');
Route::get('/post/{slug}', 'HomeController@post')->name('post');
Route::get('/blog/{page?}', 'HomeController@blog')->name('blog');
Route::get('/store/{category?}/{page?}', 'HomeController@store')->name('store');
Route::get('product/{slug}', 'HomeController@product')->name('product');
Route::get('check', 'HomeController@check')->name('check');
Route::get('contacts', 'HomeController@contacts')->name('contacts');
Route::post('contacts', 'MailController@sendAdmin')->name('contacts');
Route::get('order-form', 'HomeController@orderForm')->name('order-form');
Route::post('order', 'HomeController@order')->name('order');
Route::get('about', 'HomeController@about')->name('about');

Route::get('/cabinet', 'AuthController@loginForm');
Route::post('/cabinet', 'AuthController@login');

Route::post('add-product', 'HomeController@addProduct');
Route::get('delete-cart-product/{id}', 'HomeController@deleteCartProduct')->name('delete-cart-product');

Route::post('ajax-cart-add', 'AjaxCartController@add');
Route::post('create-order', 'HomeController@createOrder');

