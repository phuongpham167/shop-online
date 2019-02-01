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

Route::get('index',[
	'as' => 'index',
	'uses' => 'PageController@getIndex'
]);

Route::get('chitiet', [
	'as' => 'chitiet_sanpham',
	'uses' => 'PageController@getChitiet'
]);

Route::get('dangnhap', [
	// 'as' => 'dangnhap',
	'uses' => 'PageController@getLogin'
])->name('dangnhap');

Route::post('dangnhap', [
	'uses' => 'PageController@postLogin'
])->name('login');

Route::get('dangki', [
	'as' => 'dangki',
	'uses' => 'PageController@getSignup'
]);

Route::post('dangki', [
	'as' => 'signup',
	'uses' => 'PageController@postSignup'
]);

Route::get('dangxuat', [
	'uses' => 'PageController@getLogout'
])->name('logout');

Route::get('cart', 'ProdutcsController@cart')->name('cart');
Route::get('add-to-cart/{id}', 'ProdutcsController@addToCart')->name('addToCart');
Route::patch('update-cart', 'ProdutcsController@update');
Route::patch('remove-from-cart', 'ProdutcsController@remove');

Route::get('lang/{lang}','LangController@lang')->name('lang');
//Route::get('lang/{lang}', function($lang){
//    App::setLocale($lang);
//    redirect(route('index'));
//})->name('lang');