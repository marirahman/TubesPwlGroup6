<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:owner');
    }

    public function manageBranches()
    {
        $branches = Branch::all();
        return view('admin.branches', compact('branches'));
    }

    public function manageProducts()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
}
