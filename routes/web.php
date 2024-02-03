<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ProductController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);

Route::get('/products-in-cart', [CartController::class, 'viewCart']);
Route::get('/products-in-cart/add/{productId}', [CartController::class, 'addToCart']);
Route::get('/products-in-cart/clear', [CartController::class, 'clearCart']);

Route::post('/orders/create', [OrderController::class, 'createOrder']);

Route::get('/login', [CustomAuthController::class, 'index'])->name('loginn');
Route::post('/login', [CustomAuthController::class, 'loginAction']);

Route::get('/logout', [CustomAuthController::class, 'logoutAction'])->name('logout');

Route::get('/register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('/register', [CustomAuthController::class, 'registerSubmit'])->name('registerSubmit');