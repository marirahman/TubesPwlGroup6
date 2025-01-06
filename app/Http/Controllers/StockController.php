<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'branch_id' => 'required|exists:branches,id',
        'product_name' => 'required|string',
        'quantity' => 'required|integer',
    ]);

    $stock = Stock::create($validated);

    return redirect()->route('stocks.index');
}

}
