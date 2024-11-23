<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/products', [ProductController::class, 'index'])->name('product.index');

Route::get('/products/{id}', [ProductController::class, 'show'])->name("product.show");
