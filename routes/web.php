<?php

// == ROUTES ==

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\User\BookController as UserBookController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\ReviewController as UserReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->get('/dashboard', function () {
    return auth()->user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('user.books.index');
})->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('books', AdminBookController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('orders', AdminOrderController::class);
    Route::resource('admin/categories', CategoryController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('user')->name('user.')->group(function() {
    Route::get('books', [UserBookController::class, 'index'])->name('books.index');
    Route::get('books/{book}', [UserBookController::class, 'show'])->name('books.show');
    Route::resource('orders', UserOrderController::class);
    Route::resource('reviews', UserReviewController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';