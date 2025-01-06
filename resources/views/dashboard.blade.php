@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Dashboard Mini Market</h1>
    
    <div class="row mt-5">
        <div class="col-md-6">
            <h2>Transaksi Terakhir</h2>
            <ul class="list-group">
                @foreach($transactions as $transaction)
                    <li class="list-group-item">
                        <strong>{{ $transaction->transaction_date }}</strong> - 
                        Total: Rp. {{ number_format($transaction->total, 2) }}
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6">
            <h2>Stok Barang Terakhir</h2>
            <ul class="list-group">
                @foreach($stocks as $stock)
                    <li class="list-group-item">
                        {{ $stock->product_name }} - 
                        Stok: {{ $stock->quantity }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
