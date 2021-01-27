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

Auth::routes(['register' => false]);


Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    // inserirò un gruppo di rotte che devono avere queste caratteristiche in comune
    Route::get('/', 'HomeController@index')->name('index');
    // rotte resource del PostController
    Route::resource('post', 'PostController');

});
