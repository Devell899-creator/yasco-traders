<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function(){
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::resource('/admin/products', ProductController::class)->names('admin.products');