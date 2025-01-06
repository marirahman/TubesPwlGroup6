<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Transaction List</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Add New Transaction</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $transaction->date }}</td>
                        <td>Rp {{ number_format($transaction->total_amount, 2) }}</td>
                        <td>
                            <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info btn-sm">View</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No transactions available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
