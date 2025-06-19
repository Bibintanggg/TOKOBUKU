<?php

// == ROUTES ==

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;

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
    $user = auth()->user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.books.index');
    }
})->name('dashboard');


Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('books', AdminBookController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('orders', AdminOrderController::class);
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

// ======================
// USER ROUTES
// ======================
Route::middleware(['auth'])->group(function () {
    // Keranjang
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Checkout & Pesanan
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout'); // ✅ ini GET
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process'); // opsional, tergantung kamu pakai atau nggak
    Route::get('/orders', [CheckoutController::class, 'index'])->name('orders.index'); // atau bisa pakai route lain
});



require __DIR__.'/auth.php';