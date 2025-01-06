<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <!-- Total Transactions -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Transactions</h5>
                        <p class="card-text fs-3">{{ $totalTransactions }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Products -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Products</h5>
                        <p class="card-text fs-3">{{ $totalProducts }}</p>
                    </div>
                </div>
            </div>

            <!-- Total Revenue -->
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Revenue</h5>
                        <p class="card-text fs-3">Rp {{ number_format($totalRevenue, 2) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
