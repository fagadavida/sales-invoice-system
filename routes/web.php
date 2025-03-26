<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('receipt', [InvoiceController::class, 'receipt'])->name('receipt');
Route::post('getProduct', [ProductController::class, 'getProduct'])->name('getProduct');
Route::resource('products', ProductController::class);

Route::get('search', [ProductController::class, 'search'])->name("search");
Route::resource('customers', CustomerController::class);
Route::resource('sales', SaleController::class);
Route::resource('invoices', InvoiceController::class);
