<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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
Route::prefix('/')->name('')->group(function () {
    Route::get('/', [ClientController::class, 'index'])->name('home');

    Route::get('/about', function () {
        return view('client.pages.about');
    });
    Route::get('/contact', function () {
        return view('client.pages.contact');
    });
    Route::get('/blog', function () {
        return view('client.pages.blog');
    });
    // Route::get('/product-detail/{id}', [ClientController::class, 'productDetail'])->name('productDetail');
    // Route::get('/shop', [ClientController::class, 'shop'])->name('shop');
    // Route::get('/categoryProducts/{id}', [ClientController::class, 'categoryProducts'])->name('categoryProducts');
    // Route::get('/searchProduct', [ClientController::class, 'searchProduct'])->name('searchProduct');
});



// Route::get('/', function () {
//     return view('admin.layouts.admin');
// });

Route::get('register', [RegisterController::class, 'create'])->name('register.create');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

Route::get('login', [LoginController::class, 'create'])->name('login.create');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

Route::get('/logout', [LoginController::class, 'destroy']);
// Route::prefix('admin')->group(function () {
//     return view('admin.layouts.client');
//     Route::get('dashboard', [HomeController::class, 'index'])->name('home.index');
//     Route::resource('user', UserController::class);
//     Route::resource('category', CategoryController::class);
//     Route::resource('product', ProductController::class);
//     Route::resource('stock', StockController::class);
// });



Route::post('check-mail-register', [RegisterController::class, 'checkMailRegister'])->name('register.checkMail');
Route::post('/product/checkCode', [ProductController::class, 'checkProductCode'])->name('product.checkCode');
Route::post('check-user-login', [LoginController::class, 'checkUserLogin'])->name('login.checkUserLogin');