<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Constructor untuk middleware jika hanya admin yang bisa mengakses
    public function __construct()
    {
        $this->middleware('role:owner');
    }

    // Menampilkan halaman pengelolaan cabang
    public function manageBranches()
    {
        $branches = Branch::all();
        return view('admin.branches', compact('branches'));
    }

    // Menampilkan halaman pengelolaan produk
    public function manageProducts()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    // Menampilkan halaman pengelolaan pengguna
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
