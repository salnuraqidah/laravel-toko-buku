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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('homes');
})->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource("member", "MemberController");
Route::resource('categories', 'CategoryController');
Route::resource('books', 'BookController');
Route::resource('orders', 'OrderController');
Route::resource('bookorder', 'Book_OrderController');
Route::post('orders/{id}', 'OrderController@pesan');
Route::get('/kontak', function () {
    return view('kontak');
});
