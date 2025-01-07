<?php

namespace App\Http\Controllers;

use App\Models\Transaction; // Pastikan ini ada
use App\Models\Product;     // Jika model ini digunakan
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth untuk pengecekan otentikasi

class DashboardController extends Controller
{
    // Menambahkan middleware 'auth' untuk memastikan pengguna terautentikasi
    public function __construct()
    {
        $this->middleware('auth');  // Ini memastikan hanya user yang sudah login yang bisa mengakses
    }

    public function index()
    {
        // Cek apakah user yang terautentikasi adalah admin atau owner
        if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('owner')) {
            $totalTransactions = Transaction::count();
            $totalProducts = Product::count();
            $totalRevenue = Transaction::sum('total_amount');
    
            return view('dashboard', compact('totalTransactions', 'totalProducts', 'totalRevenue'));
        }
    
        // Jika bukan admin atau owner, tampilkan halaman error 403
        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
    
}
