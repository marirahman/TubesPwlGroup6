<?php

namespace App\Http\Controllers;

use App\Models\Transaction; // Pastikan ini ada
use App\Models\Product;     // Jika model ini digunakan
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTransactions = Transaction::count();
        $totalProducts = Product::count();
        $totalRevenue = Transaction::sum('total_amount');

        return view('dashboard.index', compact('totalTransactions', 'totalProducts', 'totalRevenue'));
    }
}
