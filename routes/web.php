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

Route::get('/branches', function () {
    return view('branch.index');
});

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profile routes (diakses oleh semua pengguna)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Rute untuk branches (diakses oleh semua pengguna)
Route::resource('branches', BranchController::class);


// Rute untuk products (diakses oleh semua pengguna)
Route::resource('products', ProductController::class);

// Rute untuk users (diakses oleh semua pengguna)
Route::resource('users', ProfileController::class);

// Rute untuk admin (diakses oleh semua pengguna)
// Route::get('/admin/branches', [AdminController::class, 'manageBranches'])->name('admin.branches');
// Route::get('/admin/products', [AdminController::class, 'manageProducts'])->name('admin.products');
// Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');

// Rute untuk reports (diakses oleh semua pengguna)
Route::prefix('reports')->group(function () {
    Route::get('/transactions', [ReportController::class, 'transactions'])->name('reports.transactions');
    Route::get('/stock', [ReportController::class, 'stock'])->name('reports.stock');
});

Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');


// Rute untuk transactions (diakses oleh semua pengguna)
Route::resource('transactions', TransactionController::class);

// Include rute autentikasi bawaan Laravel
require __DIR__.'/auth.php';
