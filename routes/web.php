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

Route::auth();
Route::get('/', function(){
    return redirect('/produk');
});
Route::get('/produk', 'Client\ProdukController@index');
Route::get('/produk/{id}', 'Client\ProdukController@show');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'can:isAdmin', 'prefix' => 'admin'], function(){
        Route::get('/', function(){
            return redirect('admin/transaksi');
        });
        Route::resource('/transaksi', 'Admin\TransaksiController');
        Route::resource('/barang', 'Admin\BarangController');
        Route::resource('/kategori', 'Admin\KategoriController');
        Route::resource('/user', 'Admin\UserController');
    });
    Route::group(['middleware' => 'can:isCustomer'], function(){
        Route::post('/cart/checkout', 'Client\CartController@checkout');
        Route::resource('/cart', 'Client\CartController');
        Route::get('/checkout', 'Client\CheckoutController@index');
        Route::post('/checkout', 'Client\CheckoutController@checkout');
        Route::get('/payment-info/{id}', 'Client\PaymentInfoController@index');
        Route::get('/order', 'Client\OrderController@index');
    });
});
