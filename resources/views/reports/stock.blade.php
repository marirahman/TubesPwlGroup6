<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Stock Report</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Stock Quantity</th>
                    <th>Price (Sell)</th>
                    <th>Price (Buy)</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>Rp {{ number_format($product->price_sell, 2) }}</td>
                        <td>Rp {{ number_format($product->price_buy, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No products available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
