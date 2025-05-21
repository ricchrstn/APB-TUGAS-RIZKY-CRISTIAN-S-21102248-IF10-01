<?php

use App\Http\Controllers\Lat1Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VariantController;

Route::get('/lat1', [Lat1Controller::class, 'index']);
Route::get('/lat1/m2', [Lat1Controller::class, 'method2']);
Route::get('/products-with-variants', [Lat1Controller::class, 'showProductsWithVariants']);
Route::get('/produk', [ProductController::class, 'index'])->name('products.single');
Route::post('/produk', [ProductController::class, 'storeOrUpdate'])->name('products.storeOrUpdate');
Route::delete('/produk/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::post('/varian', [VariantController::class, 'store'])->name('variant.store');
Route::delete('/varian/{id}', [VariantController::class, 'destroy'])->name('variant.destroy');

Route::get('/', function () {
    return view('welcome');
});