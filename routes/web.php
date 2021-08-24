<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProductController;
 
Route::get('/', function () {
    return view('auth.login');
});
 
Auth::routes();
 
Route::middleware(['auth'])->group(function () {
 
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
 
    Route::middleware(['admin'])->group(function () {
        Route::get('admin', [AdminController::class, 'index']);
    });
 
    Route::middleware(['supplier'])->group(function () {
        Route::get('supplier', [SupplierController::class, 'index']);
        Route::resource('products', ProductController::class);
    });
 
    Route::get('/logout', function() {
        Auth::logout();
        redirect('/');
    });
 
});