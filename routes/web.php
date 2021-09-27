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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name("home.index");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('home/info/{id}', 'App\Http\Controllers\HomeController@info')->name("fragance.info");

/* Admin routes*/
Route::get('/admin/home', 'App\Http\Controllers\FraganceController@list')->name('admin.home')->middleware('auth');

Route::get('/admin/create', 'App\Http\Controllers\FraganceController@addIndex')->name('fragance.index')->middleware('auth');

Route::post('admin/create', 'App\Http\Controllers\FraganceController@add')->name("fragance.add")->middleware('auth');

Route::get('admin/show/{id}', 'App\Http\Controllers\FraganceController@show')->name("fragance.show")->middleware('auth');

Route::delete('admin/show/{id}', 'App\Http\Controllers\FraganceController@delete')->name("fragance.delete")->middleware('auth');

Route::put('admin/show/{id}', 'App\Http\Controllers\FraganceController@edit')->name("fragance.edit")->middleware('auth');




