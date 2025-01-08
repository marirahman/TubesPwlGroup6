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
    public function __construct()
    {
        // Middleware untuk membatasi akses hanya untuk pengguna dengan role 'owner'
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->role !== 'owner') {
                abort(403, 'Unauthorized access');
            }
            return $next($request);
        });
    }

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
    public function show(Branch $branch)
{
    // Ambil transaksi terkait branch
    $transactions = Transaction::where('branch_id', $branch->id)
        ->select('created_at as transaction_date', 'total_amount as total')
        ->get()
        ->map(function ($transaction) {
            $transaction->transaction_date = $transaction->transaction_date
                ? Carbon::parse($transaction->transaction_date)->format('Y-m-d H:i:s') 
                : 'N/A';
            return $transaction;
        });

    // Ambil stok barang terkait branch
    $stocks = Stock::where('branch_id', $branch->id)
        ->join('products', 'stocks.product_id', '=', 'products.id')
        ->select('products.name as product_name', 'stocks.quantity')
        ->get();

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
