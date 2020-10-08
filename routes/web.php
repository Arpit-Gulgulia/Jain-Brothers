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

Route::get('/', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/c/{consumer}', 'CategoryController@index')->name('category.show');
Route::get('/p/{consumer}/{category}', 'ProductController@listing')->name('product.list');
Route::get('/fashion-store/{tag}', 'ProductController@fashionStore')->name('product.fashionStore');


// Admin Routes
Route::prefix('/admin')->name('admin.')->namespace('Admin')->group(function (){

    // All Admin Authentication routes here
    Route::namespace('Auth')->group(function(){

        // Login Routes
        Route::get('/login','LoginController@showLoginForm')->name('login');
        Route::post('/login','LoginController@login')->name('login.submit');
        Route::post('/logout','LoginController@logout')->name('logout');

        // Forgot Password Routes
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');
        Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');

    });

    Route::get('/category', 'CategoryController@index')->name('category.index');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/category/{id}', 'CategoryController@show')->name('category.show');
    Route::get('/category/{id}/edit', 'CategoryController@edit')->name('category.edit');
    Route::put('/category/{id}', 'CategoryController@update')->name('category.update');
    Route::delete('/category/{id}', 'CategoryController@destroy')->name('category.destroy');

    Route::post('/category', 'CategoryController@store')->name('category.store');


    Route::get('/product', 'ProductController@index')->name('product.index');
    Route::get('/product/create', 'ProductController@create')->name('product.create');
    Route::get('/product/{product}', 'ProductController@show')->name('product.show');
    Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
    Route::put('/product/{product}', 'ProductController@update')->name('product.update');
    Route::delete('/product/{product}', 'ProductController@destroy')->name('product.destroy');


    Route::post('/product', 'ProductController@store')->name('product.store');
    Route::post('/product/getCategories', 'ProductController@getCategories')->name('product.category');
    Route::post('/product/getSubcategories', 'ProductController@getSubcategories')->name('product.subcategory');


    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

});
