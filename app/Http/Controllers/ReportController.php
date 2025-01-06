<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function transactionReport()
    {
        $transactions = Transaction::with('details')->get();
        return view('reports.transactions', compact('transactions'));
    }

    public function stockReport()
    {
        $products = Product::all();
        return view('reports.stock', compact('products'));
    }

    public function transactions()
{
    $transactions = Transaction::all();
    return view('reports.transactions', compact('transactions'));
}

public function stock()
{
    $products = Product::all();
    return view('reports.stock', compact('products'));
}

}
