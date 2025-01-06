<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Branch;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['branch', 'user'])->get();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $branches = Branch::all();
        $products = Product::all();
        return view('transactions.create', compact('branches', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'user_id' => 'required|exists:users,id',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $totalAmount = 0;
        foreach ($request->products as $item) {
            $product = Product::findOrFail($item['product_id']);
            $totalAmount += $product->price_sell * $item['quantity'];
        }

        $transaction = Transaction::create([
            'branch_id' => $request->branch_id,
            'user_id' => $request->user_id,
            'total_amount' => $totalAmount,
        ]);

        foreach ($request->products as $item) {
            $product = Product::findOrFail($item['product_id']);
            TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price_sell,
                'subtotal' => $product->price_sell * $item['quantity'],
            ]);
        }

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
    }

    public function show(Transaction $transaction)
    {
        $transaction->load('details.product');
        return view('transactions.show', compact('transaction'));
    }

    public function edit(Transaction $transaction)
    {
        return redirect()->back()->with('error', 'Editing transactions is not allowed.');
    }

    public function update(Request $request, Transaction $transaction)
    {
        return redirect()->back()->with('error', 'Editing transactions is not allowed.');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
