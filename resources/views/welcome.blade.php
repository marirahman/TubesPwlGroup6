<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopLaravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Body styling */
        body {
            background-color: #f8fafc; /* Warna latar terang */
            color: #334155; /* Warna teks biru gelap */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar styling */
        .navbar {
            background-color: #00008B; /* Biru utama */
        }

        .navbar a {
            color: #ffffff !important;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-primary {
            background-color: #1e40af; /* Biru gelap */
            border: none;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-outline-light {
            border-color: #ffffff;
        }

        .btn-outline-light:hover {
            background-color: #ffffff;
            color: #2563eb;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(45deg, #2563eb, #1e40af); /* Gradasi biru */
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            font-weight: 300;
        }

        /* Features Section */
        .features {
            padding: 80px 20px;
            text-align: center;
        }

        .features h2 {
            font-size: 2.5rem;
            color: #2563eb;
            margin-bottom: 40px;
        }

        .feature-card {
            border: none;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            padding: 30px;
            border-radius: 10px;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .feature-card .card-title {
            font-size: 1.5rem;
            font-weight: 500;
            color: #1e40af;
        }

        .feature-card .card-text {
            font-size: 1.1rem;
        }

        /* Footer Styling */
        .footer {
            background-color: #2563eb;
            color: #ffffff;
            text-align: center;
            padding: 40px 20px;
        }

        /* Responsiveness */
        @media (max-width: 767px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web Toko Group 6</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <h1>Selamat Datang di Web Toko Group 6</h1>
            <p>Belanja Mudah dan Praktis dengan website kami</p>
            <a href="#features" class="btn btn-primary mt-3">Lihat Fitur</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2>Fitur Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Katalog Produk</h5>
                            <p class="card-text">Temukan berbagai produk unggulan dengan harga terbaik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Manajemen Stok</h5>
                            <p class="card-text">Kelola stok produk Anda secara real-time dengan mudah.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Transaksi Cepat</h5>
                            <p class="card-text">Nikmati proses transaksi yang cepat dan aman.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Web Toko Group 6. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
