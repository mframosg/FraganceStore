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

Route::get('home/{id}', 'App\Http\Controllers\WishListController@add')->name("wishlist.add");

Route::delete('home/{id}', 'App\Http\Controllers\WishListController@delete')->name("wishlist.delete");

Route::get('/home/car', 'App\Http\Controllers\HomeController@buy')->name('car.buy')->middleware('auth');

Route::get('/home/wish-list', 'App\Http\Controllers\HomeController@wishList')->name('home.wish')->middleware('auth');

Route::get('home/info/{id}', 'App\Http\Controllers\HomeController@info')->name("fragance.info");

Route::get('home/info/comment/{id}', 'App\Http\Controllers\ReviewController@list')->name("review.index")->middleware('auth');

//Route::post('home/info/comment/{id}', 'App\Http\Controllers\ReviewController@add')->name("review.add");

Route::get('home/info/comment/add/{id}', 'App\Http\Controllers\ReviewController@reviewAddIndex')->name("review.add.index")->middleware('auth');

Route::post('home/info/comment/add/{id}', 'App\Http\Controllers\ReviewController@add')->name("review.add")->middleware('auth');

Route::get('home/info/comment/show/{fragance_id}/{review_id}', 'App\Http\Controllers\ReviewController@show')->name("review.show")->middleware('auth');

Route::delete('home/info/comment/show/{fragance_id}/{review_id}', 'App\Http\Controllers\ReviewController@delete')->name("review.delete")->middleware('auth');

Route::put('home/info/comment/show/{fragance_id}/{review_id}', 'App\Http\Controllers\ReviewController@edit')->name("review.edit")->middleware('auth');


/* Admin routes*/
Route::get('/admin/home', 'App\Http\Controllers\FraganceController@list')->name('admin.home')->middleware('auth');

Route::get('/admin/create', 'App\Http\Controllers\FraganceController@addIndex')->name('fragance.index')->middleware('auth');

Route::post('admin/create', 'App\Http\Controllers\FraganceController@add')->name("fragance.add")->middleware('auth');

Route::get('admin/show/{id}', 'App\Http\Controllers\FraganceController@show')->name("fragance.show")->middleware('auth');

Route::delete('admin/show/{id}', 'App\Http\Controllers\FraganceController@delete')->name("fragance.delete")->middleware('auth');

Route::put('admin/show/{id}', 'App\Http\Controllers\FraganceController@edit')->name("fragance.edit")->middleware('auth');




