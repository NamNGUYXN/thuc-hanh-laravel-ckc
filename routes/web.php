<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index');

Route::get('/about', [HomeController::class, 'about'])
    ->name('home.about');

Route::get('/products', [ProductController::class, 'index'])
    ->name('product.index');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name("product.show");

Route::middleware('admin')->group(function () {
    Route::get('/admin', [AdminHomeController::class, 'index'])
        ->name('admin.home.index');

    Route::get('/admin/products', [AdminProductController::class, 'index'])
        ->name('admin.product.index');

    Route::post('/admin/products/store', [AdminProductController::class, 'store'])
        ->name('admin.product.store');

    Route::delete('/admin/products/{id}/delete', [AdminProductController::class, 'delete'])
        ->name('admin.product.delete');

    Route::get('/admin/products/{id}/edit', [AdminProductController::class, 'edit'])
        ->name('admin.product.edit');

    Route::put('/admin/products/{id}/update', [AdminProductController::class, 'update'])
        ->name('admin.product.update');
});

Route::get('/cart', [CartController::class, 'index'])
->name('cart.index');

Route::get('/cart/delete', [CartController::class, 'delete'])
->name('cart.delete');

Route::get('/cart/delete-single/{id}', [CartController::class, 'deleteSingle'])
->name('cart.delete-single');

Route::post('/cart/add/{id}', [CartController::class, 'add'])
->name('cart.add');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
