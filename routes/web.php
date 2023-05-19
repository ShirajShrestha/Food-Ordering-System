<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InventoryController;


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


// Login and Registration for admin

Route::get('login', [AdminController::class,'index'])->name('login');
Route::post('post-login', [AdminController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AdminController::class, 'registration'])->name('register');
Route::post('post-registration', [AdminController::class, 'postRegistration'])->name('register.post');
Route::get('admin-logout',[AdminController::class, 'logout'])->name('admin-logout');
// Middleware
 Route::group(['middleware' => 'admin'], function(){
    Route::get('dashboard', [AdminController::class, 'dashboard']); 
    Route::resource('/menu', MenuController::class);
    Route::resource('/inventory', InventoryController::class);
    Route::get('/orders', [InventoryController::class, 'orders'])->name('orders');
    

});


Route::get('/', [CustomerController::class,'frontend'])->name('customer');

//login and registration for Customer

Route::prefix('customer')->group(function () {
    Route::get('login', [CustomerController::class,'index'])->name('customer-login');
    Route::get('registration', [CustomerController::class, 'registration'])->name('customer-register');
    Route::post('post-login', [CustomerController::class, 'postLogin'])->name('customer-login.post'); 
    Route::post('post-registration', [CustomerController::class, 'postRegistration'])->name('customer-register.post');
    Route::get('logout',[CustomerController::class, 'logout'])->name('customer-logout');
    
    // To check authentication
    Route::group(['middleware' => 'customer'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('cartIndex');  
        Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add-to-cart');
        Route::get('cart', [ProductController::class, 'cart'])->name('newcart');
        Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
        Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
        Route::get('store', [ProductController::class, 'store'])->name('store');
        Route::get('history', [ProductController::class, 'history'])->name('history');
        Route::get('search',[ProductController::class,'search'])->name('search');
    });
});

Route::get('check',[ProductController::class,'check']);