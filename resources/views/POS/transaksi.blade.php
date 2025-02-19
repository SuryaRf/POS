<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sales - Transaksi</title>
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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

        .transaction-details {
            text-align: left;
        }

        .transaction-details h2 {
            margin-bottom: 1rem;
        }

        .transaction-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        .transaction-details th,
        .transaction-details td {
            padding: 0.5rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        .transaction-details .total {
            font-weight: bold;
            font-size: 1.2rem;
            margin-top: 1rem;
        }

        /* Footer styles */
        footer {
            background-color: #140550;
            color: #fff;
            padding: 1rem 0;
            text-align: center;
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
                    <a href="../category/food-beverage">Makanan & Minuman</a>
                    <a href="../public/category/beauty-health">Kecantikan & Kesehatan</a>
                    <a href="../category/home-care">Perawatan Rumah</a>
                    <a href="../category/baby-kid">Perlengkapan Bayi & Anak</a>
                </div>
            </li>
            <li><a href="../public/penjualan">Transaksi</a></li>
            <li><a href="../public/userPOS">User</a></li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <div class="transaction-details">
                <h2>Detail Transaksi</h2>

                <table>
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Kopi</th>
                            <th>Rp. 19.000</th>
                            <th>2</th>
                            <th>Rp. 38.000</th>
                        </tr>
                        <tr>
                            <th>Kopi</th>
                            <th>Rp. 19.000</th>
                            <th>2</th>
                            <th>Rp. 38.000</th>
                        </tr>
                        <tr>
                            <th>Kopi</th>
                            <th>Rp. 19.000</th>
                            <th>2</th>
                            <th>Rp. 38.000</th>
                        </tr>
                        <tr>
                            <th>Kopi</th>
                            <th>Rp. 19.000</th>
                            <th>2</th>
                            <th>Rp. 38.000</th>
                        </tr>

                        {{-- @foreach ($transaction->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>

                {{-- <div class="total">
                    Total: Rp {{ number_format($transaction->total, 0, ',', '.') }}
                </div>

                <p>Metode Pembayaran: {{ $transaction->payment_method }}</p>
                <p>Tanggal: {{ $transaction->date }}</p> --}}
            </div>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Point of Sales</p>
    </footer>
</body>

</html>