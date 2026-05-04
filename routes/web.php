<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BlogController;




/*
|--------------------------------------------------------------------------
| TRANG USER
|--------------------------------------------------------------------------
*/

// TRANG CHỦ
Route::get('/', [HomeController::class, 'index']);

// SHOP (DANH MỤC)
Route::get('/shop', [ShopController::class, 'index']);

// CATEGORY
Route::get('/category/{id}', [ShopController::class, 'category']);

// GIỎ HÀNG
Route::get('/cart', [CartController::class, 'index']);


/*
|--------------------------------------------------------------------------
| AUTH (Laravel Breeze / mặc định)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| ADMIN (CHUẨN)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index']);

    // Products
    Route::resource('products', ProductController::class);

    // Categories
    Route::resource('categories', CategoryController::class);

    // Orders
    Route::resource('orders', OrderController::class);

    // Users
    Route::resource('users', UserController::class);

    // Blogs
    Route::resource('blogs', BlogController::class);
});
require __DIR__.'/auth.php';
Route::get('/add-to-cart/{id}', [CartController::class, 'add'])
->name('cart.add');
Route::post('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove-cart', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/clear-cart', [CartController::class, 'clear'])->name('cart.clear');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.place');