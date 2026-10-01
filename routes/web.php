<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::resource('/admin/products', ProductController::class)->names('admin.products');
Route::resource('/admin/categories', CategoryController::class)->names('admin.categories');
Route::resource('/admin/orders', OrderController::class)->names('admin.orders');
Route::resource('/admin/customers', CustomerController::class)->names('admin.customers');
Route::resource('/admin/messages', MessageController::class)->names('admin.messages');