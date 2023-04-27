<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => true]);

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/contact', [ContactController::class,'index'])->name('contact');
Route::post('/contact', [ContactController::class,'store'])->name('contact.store');
Route::get('/about', [AboutController::class,'index'])->name('about');

// all product
Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/products/category/{slug}', [ProductController::class,'category'])->name('products.category');
Route::get('/products/{slug}', [ProductController::class,'show'])->name('products.show');

// blog
Route::get('/blog', [BlogController::class,'index'])->name('blogs.index');
Route::get('/blog/{slug}', [BlogController::class,'show'])->name('blogs.show');

Route::middleware(['auth'])->group(function(){
    // cart
    Route::get('/cart', [CartController::class,'index'])->name('cart.index');
    Route::post('/cart', [CartController::class,'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class,'destroy'])->name('cart.destroy');

    // checkout
    Route::post('/checkout', CheckoutController::class)->name('checkout');

    // transactions
    Route::get('/transactions', [TransactionController::class,'index'])->name('transactions.index');
     Route::get('/transactions/success/{uuid}', [TransactionController::class,'success'])->name('transactions.success');
});
