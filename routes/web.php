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

Route::get('/', 'PagesController@index');

Route::get('/services', 'PagesController@services');

Auth::routes();

Route::resource('brand', 'BrandController');

Route::resource('supplier', 'SupplierController');
Route::get('/supplierpdf/{id}', 'SupplierController@showpdf');

Route::get('/supplierorder/{id}', 'SupplierOrderController@index');
Route::get('/supplierorder/{id}/create', 'SupplierOrderController@create');
Route::post('/supplierorder/{id}', 'SupplierOrderController@store');
Route::get('/supplierorder/{id}/show', 'SupplierOrderController@show');
Route::get('/supplierorder/{id}/update', 'SupplierOrderController@update');

Route::get('/product/status/{id}', 'ProductController@status');
Route::resource('product', 'ProductController');
Route::get('/productreview/create/{id}', 'ProductReviewController@create');
Route::post('/productreview/{id}', 'ProductReviewController@store');
Route::get('/productstats/{id}', 'ProductController@stats');


Route::get('/store/{id}', 'StoreController@index');
Route::get('/add/{product}', 'StoreController@addToCart')->name('add');
Route::get('/remove/{productId}', 'StoreController@removeProductFromCart')->name('remove');
Route::get('/cart', 'StoreController@cart');
Route::get('/ordersuccess', 'StoreController@ordersuccess');

Route::resource('/order', 'OrderController');
Route::get('/orders', 'OrderController@orders');

Route::resource('userdetails', 'UserDetailsController');
Route::post('/userdetails/search/{id}', 'UserDetailsController@search');
Route::get('/userdetails/status/{id}', 'UserDetailsController@status');

Route::get('/contactus', 'ContactFormController@generalcontact');
Route::post('/contactus', 'ContactFormController@generalcontactsend');
Route::get('/usercontactus', 'ContactFormController@usercontact');
Route::post('/usercontactus', 'ContactFormController@usercontactsend');
Route::get('/ordercontactus/{id}', 'ContactFormController@ordercontact');
Route::post('/ordercontactus', 'ContactFormController@ordercontactsend');
Route::get('/supplierordersend/{id}', 'ContactFormController@supplierordersend');

Route::get('/home', 'HomeController@index')->name('home');
