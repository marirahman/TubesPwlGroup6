<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard umum untuk semua role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile routes (diakses oleh semua pengguna yang login)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Rute untuk owner
    Route::middleware(['role:owner'])->group(function () {
        // Akses penuh untuk owner
        Route::resource('branches', BranchController::class); // Mengelola cabang
        Route::resource('products', ProductController::class); // Mengelola produk
        Route::resource('users', ProfileController::class); // Mengelola pengguna
    });

    // Rute untuk admin
    Route::middleware(['auth', 'role:owner'])->group(function () {
        Route::get('/admin/branches', [AdminController::class, 'manageBranches'])->name('admin.branches');
        Route::get('/admin/products', [AdminController::class, 'manageProducts'])->name('admin.products');
        Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
    });

    // Rute untuk supervisor dan manager
    Route::middleware(['role:manager,supervisor'])->group(function () {
        Route::prefix('reports')->group(function () {
            Route::get('/transactions', [ReportController::class, 'transactions'])->name('reports.transactions');
            Route::get('/stock', [ReportController::class, 'stock'])->name('reports.stock');
        });

        Route::resource('transactions', TransactionController::class); // Mengelola transaksi
    });

    // Rute untuk cashier
    Route::middleware(['role:cashier'])->group(function () {
        Route::resource('transactions', TransactionController::class)->only(['index', 'create', 'store']);
    });

    // Rute untuk warehouse
    Route::middleware(['role:warehouse'])->group(function () {
        Route::resource('products', ProductController::class)->only(['index', 'update']);
    });
});

// Include rute autentikasi bawaan Laravel
require __DIR__.'/auth.php';
