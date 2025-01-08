<?php

namespace App\Http\Controllers;

use App\Models\Transaction; 
use App\Models\Product;    
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class DashboardController extends Controller
{
    /**
     * Constructor untuk memastikan middleware auth digunakan.
     */
    public function __construct()
    {
        $this->middleware('auth'); 
    }

    /**
     * Fungsi untuk mengarahkan pengguna ke dashboard berdasarkan role.
     */
    public function index()
    {
        $user = Auth::user(); 

        
        if ($user->hasRole('owner')) {
            $totalTransactions = Transaction::count();
            $totalProducts = Product::count();
            $totalRevenue = Transaction::sum('total_amount');

            return view('dashboard', compact('totalTransactions', 'totalProducts', 'totalRevenue'));
        } elseif ($user->hasRole('cashier')) {
            return redirect()->route('dashboard.cashier');
        } elseif ($user->hasRole('manager')) {
            return redirect()->route('dashboard.manager');
        } elseif ($user->hasRole('supervisor')) {
            return redirect()->route('dashboard.supervisor');
        } elseif ($user->hasRole('warehouse')) {
            return redirect()->route('dashboard.warehouse');
        }

       
        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }
}
