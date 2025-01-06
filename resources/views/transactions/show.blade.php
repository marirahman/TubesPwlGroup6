<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Transaction Details</h1>
        <div class="mb-3">
            <label class="form-label"><strong>Date:</strong></label>
            <p>{{ $transaction->date }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Total Amount:</strong></label>
            <p>Rp {{ number_format($transaction->total_amount, 2) }}</p>
        </div>
        <div class="mb-3">
            <label class="form-label"><strong>Items:</strong></label>
            <ul>
                @foreach ($transaction->items as $item)
                    <li>{{ $item->product->name }} - Quantity: {{ $item->quantity }} - Price: Rp {{ number_format($item->price, 2) }}</li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back to Transactions</a>
    </div>
</body>
</html>
