<?php

use App\Http\Controllers\Admin\CoverageCheckController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Public\CoverageController;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\OrderController as PublicOrderController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('public.home');
Route::get('/packages', [HomeController::class, 'packages'])->name('public.packages.index');
Route::get('/packages/{slug}', [HomeController::class, 'packageDetail'])->name('public.packages.show');

Route::get('/coverage', [CoverageController::class, 'showForm'])->name('public.coverage.check');
Route::post('/coverage', [CoverageController::class, 'check'])->name('public.coverage.submit');

Route::get('/register-wifi', [PublicOrderController::class, 'showForm'])->name('public.orders.create');
Route::post('/register-wifi', [PublicOrderController::class, 'submit'])->name('public.orders.submit');
Route::get('/register-wifi/success', [PublicOrderController::class, 'success'])->name('public.orders.success');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes (Restricted to Admin & Sales roles)
Route::middleware(['auth', 'role:admin,sales'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('packages', PackageController::class);

    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');

    Route::get('/coverage-checks', [CoverageCheckController::class, 'index'])->name('coverage-checks.index');
    Route::patch('/coverage-checks/{check}/status', [CoverageCheckController::class, 'updateStatus'])->name('coverage-checks.updateStatus');
});

require __DIR__.'/auth.php';
