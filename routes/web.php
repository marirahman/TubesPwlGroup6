<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product routes
    Route::resource('products', ProductController::class);

    // Transaction routes
    Route::resource('transactions', TransactionController::class);

    // Branch routes
    Route::resource('branches', BranchController::class);

    // Report routes
    Route::prefix('reports')->group(function () {
        Route::get('/transactions', [ReportController::class, 'transactions'])->name('reports.transactions');
        Route::get('/stock', [ReportController::class, 'stock'])->name('reports.stock');
    });
});

require __DIR__.'/auth.php';
