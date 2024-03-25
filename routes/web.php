<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\OrderMgmtController;

//main
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
Route::post('/login-action', [CustomAuthController::class, 'loginAction'])->name('dashboard');
Route::get('/dashboard-sub', [CustomAuthController::class, 'dashboardSub'])->name('dashboardSub');

Route::get('/manage-orders', [OrderMgmtController::class, 'orderMgmtView'])->name('orderMgmtView');

Route::put('/manage-orders/change-deli-status/{id}', [OrderMgmtController::class, 'statusChange'])->name('statusChange');

Route::get('/logout', [CustomAuthController::class, 'logoutAction'])->name('logout');

Route::get('/register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('/register', [CustomAuthController::class, 'registerSubmit'])->name('registerSubmit');

Route::get('/manage-prducts/delete/{id}', [CustomAuthController::class, 'productDelete'])->name('products.delete');

Route::get('/manage-prducts/edit/{id}', [CustomAuthController::class, 'productEdit'])->name('products.edit');
Route::post('/manage-prducts/edit/{id}', [CustomAuthController::class, 'productUpdate'])->name('products.update');

Route::get('/manage-prducts/add', [CustomAuthController::class, 'productAdd'])->name('products.add');
Route::post('/manage-prducts/add', [CustomAuthController::class, 'productCreate'])->name('products.create');