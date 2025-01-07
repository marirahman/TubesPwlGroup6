<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Aplikasi PWL Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Body styling */
        body {
            background-color: #1a202c; /* Warna gelap Laravel */
            color: #e2e8f0; /* Warna teks terang */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar styling */
        .navbar {
            background-color: #2d3748; /* Warna navbar gelap Laravel */
        }

        .navbar a {
            color: #e2e8f0 !important;
        }

        .navbar-brand {
            font-weight: bold;
            letter-spacing: 1px;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(45deg, #2d3748, #1a202c); /* Sesuai dengan tema gelap Laravel */
            color: white;
            padding: 120px 0;
            text-align: center;
            position: relative;
        }

        .hero::before {
            content: "";
            background-image: url('https://via.placeholder.com/1600x900/333/fff?text=Background+Image');
            background-size: cover;
            background-position: center;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.5;
            z-index: -1;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            font-weight: 300;
            margin-top: 20px;
        }

        /* Features Section */
        .features {
            padding: 80px 20px;
            background-color: #2d3748; /* Warna latar belakang sesuai tema Laravel */
            text-align: center;
        }

        .features h2 {
            font-size: 2.5rem;
            color: #e2e8f0;
            margin-bottom: 40px;
        }

        .feature-card {
            border: none;
            background-color: #1a202c; /* Warna kartu yang lebih gelap */
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
            color: #e53e3e; /* Warna merah Laravel untuk aksen */
        }

        .feature-card .card-text {
            font-size: 1.1rem;
            color: #e2e8f0;
        }

        /* Footer Styling */
        .footer {
            background-color: #2d3748; /* Warna footer gelap Laravel */
            color: #e2e8f0;
            text-align: center;
            padding: 40px 20px;
        }

        .btn-primary {
            background-color: #e53e3e; /* Warna merah Laravel */
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #c53030;
        }

        /* Responsiveness */
        @media (max-width: 767px) {
            .hero h1 {
                font-size: 2.2rem;
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
            <a class="navbar-brand" href="#">PWL Laravel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container">
            <h1>Selamat Datang di Aplikasi PWL Laravel</h1>
            <p>Solusi Terbaik untuk Manajemen Cabang, Stok Barang, dan Transaksi</p>
            <a href="#features" class="btn btn-primary">Lihat Fitur</a>
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
                            <h5 class="card-title">Manajemen Cabang</h5>
                            <p class="card-text">Kelola semua cabang bisnis Anda dengan mudah dan efisien.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Manajemen Stok</h5>
                            <p class="card-text">Pantau stok barang Anda secara real-time.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Transaksi</h5>
                            <p class="card-text">Dapatkan laporan transaksi yang terperinci dan terstruktur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Aplikasi PWL Laravel. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
