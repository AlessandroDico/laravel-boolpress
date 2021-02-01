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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/contacts', 'HomeController@contacts')->name('contacts');
Route::get('post', 'PostController@index')->name('post.index');
Route::get('post/{slug}', 'PostController@show')->name('post.show');
Route::get('categories/{slug}', 'CategoryController@show')->name('category.show');

Auth::routes(['register' => false]);


Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    // inserirò un gruppo di rotte che devono avere queste caratteristiche in comune
    Route::get('/', 'HomeController@index')->name('index');
    Route::post('/generate-token', 'HomeController@generateToken')->name('generateToken');
    // rotte resource del PostController
    Route::resource('post', 'PostController');

});
