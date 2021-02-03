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



Auth::routes();

Route::get('/', [App\Http\Controllers\MainController::class, 'index']); 
Route::get('load-more-data', [App\Http\Controllers\MainController::class, 'more_data']); 
Route::get('/admin', [App\Http\Controllers\MainController::class, 'admin'])->name('admin'); 


///product 

Route::get('/product-create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create'); 
Route::get('/product-edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit'); 
Route::post('/product-store', [App\Http\Controllers\ProductController::class, 'store'])->name('
	product.store'); 
Route::put('/product-update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update'); 
Route::get('/product-delete/{id}', [App\Http\Controllers\ProductController::class, 'delete'])->name('product.delete'); 

//filter data
Route::get('/filter-price', [App\Http\Controllers\MainController::class, 'filterPrice']);
Route::get('/filter-date', [App\Http\Controllers\MainController::class, 'filterDate']);
//search product
Route::get('/search-product', [App\Http\Controllers\MainController::class, 'search']);





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
