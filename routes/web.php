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
Route :: group(['prefix' => '/admin' , 'middleware' => ['auth','admin'] ], function(){
    Route::resource('/admin',AdminController::class);
    Route::resource('/users',UserController::class);
    Route::resource('/categories',CategoryController::class);
});

Route :: group(['middleware' => ['auth']] , function(){
    Route::get('/account', [UserController::class, 'account'])->name('users.account');
    Route::get('/favorite', [BookController::class, 'favorites'])->name('books.favorites');
    Route::get('/mybooks', [UserController::class, 'userBooks'])->name('users.mybooks');
    Route::get('/addbook', [BookController::class, 'addbook'])->name('books.addbook');
    Route::get('/favorite/{id}', [BookController::class, 'favorite'])->name('books.favorite');
});

Route::get('/', [BookController::class, 'bestprice'])->name('books.bestprice');
Route::get('/filter', [BookController::class, 'filter'])->name('books.filter');
Route::get('/deleteFav/{id}', [BookController::class, 'deleteFav'])->name('books.deleteFav');
Route::get('/about', function () {
    return view('shelf/about');
});

Route::get('/contact', function () {
    return view('shelf/contact');
});

Route::resource('/books',BookController::class);
Auth::routes();

