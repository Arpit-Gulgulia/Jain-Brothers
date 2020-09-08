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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
    Route::post('/category', 'CategoryController@store')->name('category.store');

    Route::get('/subcategory', 'SubcategoryController@index')->name('subcategory.index');
    Route::get('/subcategory/create', 'SubcategoryController@create')->name('subcategory.create');
    Route::post('/subcategory', 'SubcategoryController@store')->name('subcategory.store');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

});
