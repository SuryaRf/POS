<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sales</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Header styles */
        header {
            background-color: #140535;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }

        /* Navigation styles */
        nav {
            background-color: #eee;
            padding: 1rem 0;
        }

        nav ul {
            display: flex; /* Menggunakan flexbox untuk navigasi */
            justify-content: center; /* Rata tengah horizontal */
            align-items: center; /* Rata tengah vertikal */
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            margin: 0 1rem;
            position: relative; /* Penting untuk dropdown */
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px; /* Padding untuk area klik */
        }

        /* Dropdown styles */
        .dropdown {
            display: inline-block;
        }

        .dropbtn {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Main content styles */
        main {
            padding: 2rem;
            text-align: center;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Footer styles */
        footer {
            background-color: #140550;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }

        /* Button styles */
        main .container a { /* Style untuk tombol "Mulai Sekarang" */
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Point of Sales</h1>
    </header>
    <nav>
        <ul>
            <li><a href="../public/home">Beranda</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Produk</a>
                <div class="dropdown-content">
                    <a href="../public/category/food-beverage">Makanan & Minuman</a>
                    <a href="../public/category/beauty-health">Kecantikan & Kesehatan</a>
                    <a href="../public/category/home-care">Perawatan Rumah</a>
                    <a href="../public/category/baby-kid">Perlengkapan Bayi & Anak</a>
                </div>
            </li>
            <li><a href="../public/penjualan">Transaksi</a></li>
            <li><a href="../public/userPOS">User</a></li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <h2>Selamat Datang di Point of Sales Kami</h2>
            <p>
                Aplikasi Point of Sales ini akan membantu Anda mengelola penjualan dan inventaris dengan mudah dan efisien.
            </p>
            <p>
                Fitur-fitur utama kami meliputi:
            </p>
            <ul>
                <li>Manajemen Produk</li>
                <li>Transaksi Penjualan</li>
                <li>Laporan Penjualan</li>
                <li>Manajemen Pelanggan</li>
            </ul>
            <p>
                Mulai gunakan aplikasi Point of Sales kami sekarang dan rasakan manfaatnya!
            </p>
            <a href="#" style="background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Mulai Sekarang</a>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Point of Sales</p>
    </footer>
</body>
</html>