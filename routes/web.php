<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReservationController as AdminReservationController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\TestDriveController as AdminTestDriveController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WishlistController as AdminWishlistController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\Customer\CompareController;
use App\Http\Controllers\Customer\OrderController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\ReservationController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\TestDriveController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/cars');


// Public catalog.
Route::get('/cars', [CarController::class, 'index'])->name('cars.index');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');

require __DIR__.'/auth.php';

// Authenticated customer area.
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/{car}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

    Route::get('/cars/{car}/test-drive', [TestDriveController::class, 'create'])->name('test-drive.create');
    Route::post('/cars/{car}/test-drive', [TestDriveController::class, 'store'])->name('test-drive.store');
    Route::get('/test-drive', [TestDriveController::class, 'index'])->name('test-drive.index');

    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/cars/{car}/reservation', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/cars/{car}/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservation.show');

    Route::get('/orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/orders/{reservation}', [OrderController::class, 'show'])->name('order.show');

    Route::get('/orders/{reservation}/payment', [PaymentController::class, 'create'])->name('payment.create');
    Route::post('/orders/{reservation}/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payment.show');

    Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');
});

// Admin area.
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::resource('cars', AdminCarController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::resource('brands', BrandController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::get('/test-drive', [AdminTestDriveController::class, 'index'])->name('test-drive.index');
        Route::put('/test-drive/{testDrive}', [AdminTestDriveController::class, 'update'])->name('test-drive.update');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/wishlist', [AdminWishlistController::class, 'index'])->name('wishlist.index');

        Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
        Route::put('/reservations/{reservation}', [AdminReservationController::class, 'update'])->name('reservations.update');

        Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');
        Route::put('/payments/{payment}', [AdminPaymentController::class, 'update'])->name('payments.update');
    });
