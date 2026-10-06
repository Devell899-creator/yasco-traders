<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\WebsiteContentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminLoginController;

Route::get('/', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/shop', [FrontendController::class, 'shop'])->name('frontend.shop');
Route::get('/products', [FrontendController::class, 'products'])->name('frontend.products');
Route::get('/login', [FrontendController::class, 'login'])->name('frontend.login');
Route::get('/cart', [FrontendController::class, 'cart'])->name('frontend.cart');
Route::get('/products/{product}', [FrontendController::class, 'productDetail'])->name('frontend.product-detail');
Route::post('/contact', [FrontendController::class, 'storeContact'])->name('frontend.contact.store');
Route::post('/login', [FrontendController::class, 'loginSubmit'])->name('frontend.login.submit');
Route::post('/cart/add', [FrontendController::class, 'addToCart'])->name('frontend.cart.add');
Route::post('/cart/update', [FrontendController::class, 'updateCart'])->name('frontend.cart.update');
Route::post('/cart/remove', [FrontendController::class, 'removeFromCart'])->name('frontend.cart.remove');
Route::get('/checkout', [FrontendController::class, 'checkout'])->name('frontend.checkout');
Route::post('/checkout', [FrontendController::class, 'placeOrder'])->name('frontend.checkout.place');
Route::get('/order-success/{order}', [FrontendController::class, 'orderSuccess'])->name('frontend.order.success');
Route::get('/register', [RegisterController::class, 'showRegister'])->name('frontend.register');
Route::post('/register', [RegisterController::class, 'register'])->name('frontend.register.submit');

Route::middleware('admin')->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/products', ProductController::class)
        ->names('admin.products');

    Route::resource('/admin/categories', CategoryController::class)
        ->names('admin.categories');

    Route::resource('/admin/orders', OrderController::class)
        ->names('admin.orders');

    Route::resource('/admin/customers', CustomerController::class)
        ->names('admin.customers');

    Route::resource('/admin/messages', MessageController::class)
        ->names('admin.messages');

    Route::resource('/admin/website-content', WebsiteContentController::class)
        ->names('admin.website-content');
});
Route::get('/admin/login', [AdminLoginController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
