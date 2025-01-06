<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Laporan Cabang: {{ $branch->branch_name }}</h1>
    
    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Laporan Transaksi</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->transaction_date }}</td>
                            <td>Rp. {{ number_format($transaction->total, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-6">
            <h2>Laporan Stok Barang</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $stock)
                        <tr>
                            <td>{{ $stock->product_name }}</td>
                            <td>{{ $stock->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Tombol untuk mencetak laporan -->
    <!-- <div class="mt-3">
        <a href="#" class="btn btn-primary">Cetak Laporan Transaksi</a>
        <a href="#" class="btn btn-secondary">Cetak Laporan Stok</a>
    </div>
</div>
@endsection 
