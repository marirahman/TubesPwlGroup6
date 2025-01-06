<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Transaction Report</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Transaction ID</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                        <td>Rp {{ number_format($transaction->total_amount, 2) }}</td>
                        <td>{{ $transaction->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No transactions available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
