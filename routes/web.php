<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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
Route::get('/', [BookController::class, 'bestprice'])->name('books.bestprice');
// Route::get('/', function () {
//     return view('shelf/home');
// });
Route::get('/about', function () {
    return view('shelf/about');
});
Route::get('/account', function () {
    return view('shelf/account');
});
Route::get('/addbook', function () {
    return view('shelf/addbook');
});
Route::get('/contact', function () {
    return view('shelf/contact');
});

Route::resource('/admin',AdminController::class);
Route::resource('/books',BookController::class);
Route::resource('/users',UserController::class);
Route::resource('/categories',CategoryController::class);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
