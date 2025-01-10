<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Stock;
use Carbon\Carbon;


class BranchController extends Controller
{
    // public function __construct()
    // {
    //     // Middleware untuk membatasi akses hanya untuk pengguna dengan role 'owner'
    //     $this->middleware(function ($request, $next) {
    //         if (auth()->check() && auth()->user()->role !== 'owner') {
    //             abort(403, 'Unauthorized access');
    //         }
    //         return $next($request);
    //     });
    // }

    // Menampilkan daftar cabang
    public function index()
{
    // Mengambil data branches termasuk kolom address
    $branches = Branch::select('id', 'name', 'address', 'supervisor_id')->get();
    return view('branches.index', compact('branches'));
}

    // Menampilkan form tambah cabang
    public function create()
    {
        $supervisors = User::where('role', 'supervisor')->get();
        return view('branches.create', compact('supervisors'));
    }

    // Menyimpan data cabang baru ke database
    public function store(Request $request)
    {
        // Menyimpan data tanpa validasi
        Branch::create($request->all());

        // Redirect ke halaman daftar cabang
        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    // Menampilkan detail cabang tertentu
    public function show($branchId)
    {
        // Ambil data cabang dan transaksi dengan eager loading
        $branch = Branch::with(['transactions.product', 'transactions.product.stocks'])->findOrFail($branchId);
    
        // Map transaksi untuk menambahkan nama produk dan tanggal transaksi
        $transactions = $branch->transactions->map(function ($transaction) {
            // Ambil nama produk dari transaksi
            $productName = optional($transaction->product)->name ?? 'Unknown Product';
    
            // Ambil stok produk terkait jika ada
            $stockQuantity = optional($transaction->product->stocks->first())->quantity ?? 'N/A';
    
            return (object) [
                'product_name' => $productName,
                'transaction_date' => $transaction->created_at
                    ? Carbon::parse($transaction->created_at)->format('Y-m-d H:i:s')
                    : 'N/A',
                'total' => $transaction->total_amount, // Pastikan total_amount benar
                'stock_quantity' => $stockQuantity,
            ];
        });
    
        // Ambil data stok barang untuk cabang
        $stocks = $branch->stocks->map(function ($stock) {
            return (object) [
                'product_name' => optional($stock->product)->name ?? 'Unknown Product',
                'quantity' => $stock->quantity,
            ];
        });
    
        // Kirim data ke view
        return view('branches.show', compact('branch', 'transactions', 'stocks'));
    }
    
    // Menampilkan form edit cabang
    public function edit(Branch $branch)
    {
        $supervisors = User::where('role', 'supervisor')->get();
        return view('branches.edit', compact('branch', 'supervisors'));
    }

    // Memperbarui data cabang
    public function update(Request $request, Branch $branch)
    {
        // Memperbarui data tanpa validasi
        $branch->update($request->all());

        // Redirect ke halaman daftar cabang
        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    // Menghapus cabang
    public function destroy(Branch $branch)
    {
        $branch->delete();

        // Redirect ke halaman daftar cabang
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}
