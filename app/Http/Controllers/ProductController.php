<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\StockNotification;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_sell' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_sell' => 'required|numeric',
            'price_buy' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
    
        // Update data produk
        $product->update($request->all());
    
        // Kirim notifikasi jika stok rendah
        if ($product->stock < 10) { // Ubah angka 10 sesuai kebutuhan bisnis
            $admins = User::where('role', 'admin')->get(); // Pastikan ada kolom `role` di tabel users
            foreach ($admins as $admin) {
                $admin->notify(new StockNotification($product));
            }
        }
    
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
