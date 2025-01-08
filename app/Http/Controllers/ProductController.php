<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Branch;
use App\Models\Stock;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::with('stocks')->get();
        return view('products.index', compact('products'));
    }

    // Menampilkan halaman form tambah produk
    public function create()
    {
        $branches = Branch::all();
        return view('products.create', compact('branches'));
    }

    // Menyimpan data produk baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price_sell' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'stock' => 'required|numeric',
        ]);

        $product = Product::create([
            'name' => $validatedData['name'],
            'price_sell' => $validatedData['price_sell'],
            'price_buy' => $validatedData['price_buy'],
            'branch_id' => $validatedData['branch_id'],
            'code' => $request->code ?? null,
        ]);

        Stock::create([
            'branch_id' => $validatedData['branch_id'],
            'product_id' => $product->id,
            'quantity' => $validatedData['stock'],
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully!');
    }

    // Menampilkan halaman edit produk
    public function edit(Product $product)
{
    $branches = Branch::all(); // Mengambil semua data cabang
    $stock = $product->stocks->first(); // Mengambil stok terkait (jika ada)
    return view('products.edit', compact('product', 'stock', 'branches'));
}


    // Memperbarui data produk
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price_sell' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'branch_id' => 'required|exists:branches,id',
            'stock' => 'required|numeric',
        ]);

        $product->update([
            'name' => $validatedData['name'],
            'price_sell' => $validatedData['price_sell'],
            'price_buy' => $validatedData['price_buy'],
            'branch_id' => $validatedData['branch_id'],
            'code' => $request->code ?? $product->code,
        ]);

        $stock = Stock::where('branch_id', $validatedData['branch_id'])
                      ->where('product_id', $product->id)
                      ->first();

        if ($stock) {
            $stock->update(['quantity' => $validatedData['stock']]);
        } else {
            Stock::create([
                'branch_id' => $validatedData['branch_id'],
                'product_id' => $product->id,
                'quantity' => $validatedData['stock'],
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }

    // Menghapus data produk
    public function destroy(Product $product)
    {
        Stock::where('product_id', $product->id)->delete();
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
