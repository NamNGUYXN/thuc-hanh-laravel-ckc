<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
->name('home.index');

Route::get('/about', [HomeController::class, 'about'])
->name('home.about');

Route::get('/products', [ProductController::class, 'index'])
->name('product.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
->name("product.show");

Route::get('/admin', [AdminHomeController::class, 'index'])
->name('admin.home.index');

Route::get('/admin/products', [AdminProductController::class, 'index'])
->name('admin.product.index');

Route::post('/admin/products/store', [AdminProductController::class, 'store'])
->name('admin.product.store');
