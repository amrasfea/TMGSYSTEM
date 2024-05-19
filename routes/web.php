<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('staff/dashboard', [HomeController::class, 'index']);

//registration
Route::get('/platinum', [RegistrationController::class, 'index'])->name('platinum.index');
Route::get('/platinum/create', [RegistrationController::class, 'create'])->name('platinum.create');
Route::post('/platinum', [RegistrationController::class, 'store'])->name('platinum.store');
Route::get('/platinum/{platinum}/edit', [RegistrationController::class, 'edit'])->name('platinum.edit');
Route::put('/platinum/{platinum}/update', [RegistrationController::class, 'update'])->name('platinum.update');
Route::delete('/platinum/{platinum}/destroy', [RegistrationController::class, 'destroy'])->name('platinum.destroy');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');