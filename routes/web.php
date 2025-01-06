<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BranchController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('transactions', TransactionController::class);
Route::resource('stocks', StockController::class);
Route::resource('branches', BranchController::class);
