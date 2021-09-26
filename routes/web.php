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

/* Admin routes*/
Route::get('/admin/home', 'App\Http\Controllers\FraganceController@list')->name('admin.home');

Route::get('/admin/create', 'App\Http\Controllers\FraganceController@addIndex')->name('fragance.index');

Route::post('admin/create', 'App\Http\Controllers\FraganceController@add')->name("fragance.add");

Route::get('admin/show/{id}', 'App\Http\Controllers\FraganceController@show')->name("fragance.show");

Route::delete('admin/show/{id}', 'App\Http\Controllers\FraganceController@delete')->name("fragance.delete");

Route::put('admin/show/{id}', 'App\Http\Controllers\FraganceController@edit')->name("fragance.edit");




