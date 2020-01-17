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


//User Route
Route::get('/', 'PageController@home');
Route::get('/product/detail/{product}', 'PageController@productDetail');


Auth::routes();


//Admin routes
Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index');

    //Product Route
    Route::resource('products', 'ProductController');

    //product  trashed route
    Route::get('product/trashed', 'ProductController@trashed')->name('product.trashed');

    // Product restore  route
    Route::put('/restore/product/{id}', 'ProductController@restore')->name('restore.product');

    //product remove image
    Route::delete('/product/{product}/remove-image', 'ProductController@imageDelete')->name('product.remove-image');

    Route::put('/product/toggle/{product}', 'ProductController@toggle')->name('product.toggle');

    //Product Delete Permently
     Route::delete('/product/delete/{id}',  'ProductController@permanentlyDelete')->name('product.delete');

});
