<?php

use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';

// Route::get('admin/dashboard', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Auth::routes();
/*
|--------------------------------------------------------------------------
| Front End Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','App\Http\Controllers\Frontend\PagesController@index')->name('homepage');

Route::group(['prefix'=>'products'], function(){
	Route::get('/','App\Http\Controllers\Frontend\PagesController@products')->name('allproducts');
	Route::get('/{slug}','App\Http\Controllers\Frontend\PagesController@productshow')->name('product.show');
	Route::get('/category/{slug}','App\Http\Controllers\Frontend\PagesController@categoryproduct')->name('category.show');
});
//Search
Route::get('/search','App\Http\Controllers\Frontend\PagesController@search')->name('search');
//Brand Route
Route::group(['prefix' => 'cart'], function(){
	Route::get('/manage','App\Http\Controllers\Frontend\cartController@index')->name('cart.manage');
	Route::post('/store','App\Http\Controllers\Frontend\cartController@store')->name('cart.store');
	Route::post('/update/{id}','App\Http\Controllers\Frontend\cartController@update')->name('cart.update');
	Route::post('/delete/{id}','App\Http\Controllers\Frontend\cartController@destroy')->name('cart.destroy');
});

Route::group(['prefix' => 'checkout'],function(){
    Route::get('/manage','App\Http\Controllers\Backend\orderController@index')->name('checkout.page');
    Route::post('/store','App\Http\Controllers\Backend\orderController@store')->name('order.store');
});
Route::group(['prefix'=>'customer'],function(){
	route::get('/login','App\Http\Controllers\Auth\LoginController@customerloginform')->name('customer.login');
	route::get('/register','App\Http\Controllers\Auth\RegisterController@customerregform')->name('customer.reg');
	route::post('/login','App\Http\Controllers\Auth\LoginController@customerlogin')->name('auth.login');
	route::post('/register','App\Http\Controllers\Auth\RegisterController@customerreg')->name('auth.reg');
});
Route::group(['prefix'=>'customer','middleware'=>'auth:customer'],function(){
	route::view('/home','frontend/pages/customer')->name('customer.home');

});

// SSLCOMMERZ Start
Route::get('/example1','App\Http\Controllers\SslCommerzPaymentController@exampleEasyCheckout');
Route::get('/example2','App\Http\Controllers\SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay','App\Http\Controllers\SslCommerzPaymentController@index');
Route::post('/pay-via-ajax','App\Http\Controllers\SslCommerzPaymentController@payViaAjax');

Route::post('/success','App\Http\Controllers\SslCommerzPaymentController@success');
Route::post('/fail','App\Http\Controllers\SslCommerzPaymentController@fail');
Route::post('/cancel','App\Http\Controllers\SslCommerzPaymentController@cancel');

Route::post('/ipn','App\Http\Controllers\SslCommerzPaymentController@ipn');
//SSLCOMMERZ END





// Route::get('/login','App\Http\Controllers\Frontend\PagesController@login')->name('login');
// Route::get('/register','App\Http\Controllers\Frontend\PagesController@register')->name('register');
/*
|--------------------------------------------------------------------------
| Back End Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'middleware' => 'auth' ], function(){
	//Dashboard Route
	Route::get('/dashboard','App\Http\Controllers\Backend\Pagescontroller@index')->name('dashboard');

	//Brand Route
	Route::group(['prefix' => 'brand'], function(){
		Route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage');
		Route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create');
		Route::post('/store','App\Http\Controllers\Backend\BrandController@store')->name('brand.store');
		Route::get('/edit/{id}','App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');
		Route::post('/update/{id}','App\Http\Controllers\Backend\BrandController@update')->name('brand.update');
		Route::get('/delete/{id}','App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy');
	});
	//Category route
	Route::group(['prefix'=>'category'], function(){
		Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('category.manage');
		Route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->name('category.create');
		Route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->name('category.store');
		Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');
		Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('category.update');
		Route::get('/delete/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('category.delete');
	});
	//Shop Route
	Route::group(['prefix'=>'shop'],function(){
		//Shop Product
		Route::group(['prefix'=>'product'],function(){
			Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('product.manage');
			Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('product.create');
			Route::post('/store','App\Http\Controllers\Backend\ProductController@store')->name('product.store');
			Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('product.edit');
			Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('product.update');
			Route::get('/delete/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('product.delete');
		});
		Route::group(['prefix'=>'order'],function(){
			Route::get('/manage','App\Http\Controllers\Backend\OrderControl@index')->name('order.manage');
			Route::get('/invoice/{id}','App\Http\Controllers\Backend\OrderControl@invoice')->name('order.invoice');
			Route::get('/orderdetails/{id}','App\Http\Controllers\Backend\OrderControl@orderdetails')->name('order.orderdetails');
			Route::get('/edit/{id}','App\Http\Controllers\Backend\OrderControl@edit')->name('order.edit');
			Route::post('/update/{id}','App\Http\Controllers\Backend\OrderControl@update')->name('order.update');
			Route::get('/delete/{id}','App\Http\Controllers\Backend\OrderControl@destroy')->name('order.delete');
		});
	});

	//Slider Route
	Route::group(['prefix' => 'slider'], function(){
		Route::get('/manage','App\Http\Controllers\Backend\SliderController@index')->name('slider.manage');
		Route::get('/create','App\Http\Controllers\Backend\SliderController@create')->name('slider.create');
		Route::post('/store','App\Http\Controllers\Backend\SliderController@store')->name('slider.store');
		Route::get('/edit/{id}','App\Http\Controllers\Backend\SliderController@edit')->name('slider.edit');
		Route::post('/update/{id}','App\Http\Controllers\Backend\SliderController@update')->name('slider.update');
		Route::get('/delete/{id}','App\Http\Controllers\Backend\SliderController@destroy')->name('slider.delete');

		Route::get('m/create','App\Http\Controllers\HomeSlidersController@create')->name('mslider.create');
		Route::post('m/store','App\Http\Controllers\HomeSlidersController@store')->name('mslider.store');
		Route::get('m/edit/{id}','App\Http\Controllers\HomeSlidersController@edit')->name('mslider.edit');
		Route::post('m/update/{id}','App\Http\Controllers\HomeSlidersController@update')->name('mslider.update');
		Route::get('m/delete/{id}','App\Http\Controllers\HomeSlidersController@destroy')->name('mslider.delete');

	});

	//Division Route
	Route::group(['prefix' => 'division'], function(){
		Route::get('/manage','App\Http\Controllers\Backend\DivisionController@index')->name('division.manage');
		Route::get('/create','App\Http\Controllers\Backend\DivisionController@create')->name('division.create');
		Route::post('/store','App\Http\Controllers\Backend\DivisionController@store')->name('division.store');
		Route::get('/edit/{id}','App\Http\Controllers\Backend\DivisionController@edit')->name('division.edit');
		Route::post('/update/{id}','App\Http\Controllers\Backend\DivisionController@update')->name('division.update');
		Route::get('/delete/{id}','App\Http\Controllers\Backend\DivisionController@destroy')->name('division.destroy');
	});

	//District Route
	Route::group(['prefix' => 'district'], function(){
		Route::get('/manage','App\Http\Controllers\Backend\DistrictController@index')->name('district.manage');
		Route::get('/create','App\Http\Controllers\Backend\DistrictController@create')->name('district.create');
		Route::post('/store','App\Http\Controllers\Backend\DistrictController@store')->name('district.store');
		Route::get('/edit/{id}','App\Http\Controllers\Backend\DistrictController@edit')->name('district.edit');
		Route::post('/update/{id}','App\Http\Controllers\Backend\DistrictController@update')->name('district.update');
		Route::get('/delete/{id}','App\Http\Controllers\Backend\DistrictController@destroy')->name('district.destroy');
	});

});


