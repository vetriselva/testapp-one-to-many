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
Route::group(['prefix' => 'admin/', 'middleware'=> 'admin', 'as' => 'admin.'], function(){
    Route::get('dashboard','Admin\DashboardController@index')->name('dashboard');
    Route::get('get-category-api','CategoryController@getCategoryApi')->name('get-category-api');
    Route::resource('category', 'CategoryController');
    Route::get('get-brand-api','BrandController@getBrandApi')->name('get-brand-api');
    Route::resource('brand', 'BrandController');
});


Route::get('/', 'Admin\AuthController@getSignin')->name('login');
Route::post('/', 'Admin\AuthController@postSignin')->name('login');
Route::post('/logout', 'Admin\AuthController@postSignout')->name('logout');
