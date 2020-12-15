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

// email: admin@gmail.com
// mật khẩu: 12345678


//Client
Route::get('/','client\ClientController@home');

Route::get('slide/{id}/{slug}.html','client\ClientController@detailSlide');

Route::get('category/{id}/{slug}.html','client\ClientController@getCategory');

Route::get('product-type/{id}/{slug}.html','client\ClientController@getProductType');

Route::get('cate-tags/{id}/{slug}.html','client\ClientController@getCategoryTags');

Route::get('product-detail/{id}/{slug}.html','client\ClientController@detailProduct');
Route::post('product-detail/{id}/{slug}.html','client\ClientController@createCommentProduct');

Route::get('search','client\ClientController@search');


//Cart
Route::group(['prefix'=>'cart'],function(){
	Route::resource('cart','Client\CartController');
	Route::get('create/{id}','Client\CartController@store');
	Route::get('show','Client\CartController@show');
	Route::post('show','Client\CartController@complete');
	Route::get('update','Client\CartController@update');
	Route::get('delete/{id}','Client\CartController@destroy');
});



//admin
Auth::routes(['register' => true]);
Route::get('admin/home', 'HomeController@index')->name('admin');

Route::get('product-type','Admin\AjaxController@getProductType');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

	Route::get('/', 'HomeController@index')->name('home');

	Route::get('category-multiple','Admin\CateController@deleteMultiple')->name('cate-multiple');
	Route::resource('category','Admin\CateController');

	Route::resource('tags','Admin\TagsController');

	Route::post('slideEditId/{id}','Admin\SlidesController@update');
	Route::resource('slides','Admin\SlidesController');

	Route::get('password','Admin\UsersController@getUpdatePassword');
	Route::post('password','Admin\UsersController@postUpdatePassword');
	Route::post('updateUserId/{id}','Admin\UsersController@update');
	Route::resource('users','Admin\UsersController');

	Route::resource('product-types','Admin\ProductTypeController');

	Route::post('productsEditId/{id}','Admin\ProductsController@update');
	Route::resource('products','Admin\ProductsController');


	Route::resource('comments','Admin\CommentsController');

});//->middleware('auth')
