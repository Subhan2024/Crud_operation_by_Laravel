<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/' ,[productController::class, 'index'])->name('product.index');
Route::get('product/create' ,[productController::class, 'create'])->name('product.create');
Route::post('product/store' ,[productController::class, 'store'])->name('product.store');

Route::get('products/{id}/edit' ,[ productController::class , 'edit']);
Route::put('products/{id}/update' ,[ productController::class , 'update']);
Route::delete('products/{id}/delete' ,[ productController::class , 'destroy']);
