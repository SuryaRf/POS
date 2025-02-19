<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sales - Food & Beverage</title>
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
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav li {
            margin: 0 1rem;
            position: relative;
        }

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            padding: 10px;
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

        .product-list { /* Style untuk daftar produk */
            display: grid; /* Menggunakan grid untuk layout produk */
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive columns */
            gap: 20px; /* Spasi antar produk */
        }

        .product { /* Style untuk setiap produk */
            border: 1px solid #ddd;
            padding: 1rem;
            text-align: center;
        }

        .product img {
            max-width: 100%;
            height: auto;
        }


        /* Footer styles */
        footer {
            background-color: #140550;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
        }

        /* Button styles */
        main .container a {
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
            <li><a href="../home">Beranda</a></li>
            <li class="dropdown">
                <a href="#" class="dropbtn">Produk</a>
                <div class="dropdown-content">
                    <a href="../category/food-beverage">Makanan & Minuman</a>
                    <a href="../category/beauty-health">Kecantikan & Kesehatan</a>
                    <a href="../category/home-care">Perawatan Rumah</a>
                    <a href="../category/baby-kid">Perlengkapan Bayi & Anak</a>
                </div>
            </li>
            <li><a href="../penjualan">Transaksi</a></li>
            <li><a href="../userPOS">User</a></li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <h2>Baby Kid</h2>
            <div class="product-list">

                <div class="product">
                    <img src="/PWL_2024/resources/img/baby.jpg" alt="Minuman Segar">
                    <h3>Mainan</h3>
                    <p>Empuk dan aman untuk bayi</p>
                    <a href="#">Detail</a>
                </div>

                <div class="product">
                    <img src="/PWL_2024/resources/img/babyoil.jpg" alt="Makanan Ringan">
                    <h3>Baby Oil</h3>
                    <p>Oil yang aman untuk bayi</p>
                    <a href="#">Detail</a>
                </div>

                <div class="product">
                    <img src="/PWL_2024/resources/img/dot.jpg" alt="Makanan Berat">
                    <h3>Empeng Bayi</h3>
                    <p>Diformulasikan untuk bayi lusyu</p>
                    <a href="#">Detail</a>
                </div>

                <div class="product">
                    <img src="/PWL_2024/resources/img/telon.jpg" alt="Kopi">
                    <h3>Minyak Telon</h3>
                    <p>Menghangatkan bayi</p>
                    <a href="#">Detail</a>
                </div>

                <div class="product">
                    <img src="/PWL_2024/resources/img/topi.jpg" alt="Makanan Berat">
                    <h3>Topi bayi</h3>
                    <p>Melindungi kulit kepala bayi</p>
                    <a href="#">Detail</a>
                </div>

                <div class="product">
                    <img src="/PWL_2024/resources/img/tisu.jpg" alt="Kopi">
                    <h3>Tisu Basah</h3>
                    <p>Buat ganti pampers deh</p>
                    <a href="#">Detail</a>
                </div>

            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Point of Sales</p>
    </footer>
</body>
</html>