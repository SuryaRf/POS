<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Point of Sales - User</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensure footer sticks to bottom */
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
            flex: 1; /* Allow main to take up available space */
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

        .transaction-details th { /* Style table headers */
            background-color: #f0f0f0; /* Example header background */
            font-weight: bold;
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

        /* Button Styles */
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin-bottom: 1rem; /* Space below the button */
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 5px; /* Slightly rounded corners */
            transition: background-color 0.3s ease; /* Smooth transition for hover effect */
        }

        .btn-primary {
            background-color: #007bff; /* Example primary color */
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        .btn-edit {
            background-color: #efe932; /* Example edit color */
            color: #fff;
        }

        .btn-edit:hover {
            background-color: #efe932; /* Darker shade on hover */
        }

        .btn-delete {
            background-color: #ac0b0b; /* Example delete color */
            color: #fff;
        }

        .btn-delete:hover {
            background-color: #ac0b0b; /* Darker shade on hover */
        }

        /* Table Styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 1rem;
        }

        th,
        td {
            padding: 0.8rem; /* Increased padding */
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        /* Improved responsiveness (example) */
        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            table {
                font-size: 0.9rem; /* Smaller font on smaller screens */
            }

            th,
            td {
                padding: 0.5rem; /* Reduced padding */
            }
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
            <li><a href="../pwublic/userPOS">User</a></li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <h2>Daftar User</h2>
            <a href="/user/create" class="btn btn-primary">Tambah User Baru</a>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>2374</td>
                        <td>Keysha Cantik</td>
                        <td>arkey@gmail.com</td>
                        <td><button class="btn btn-edit">Edit</button><button class="btn btn-delete">Delete</button></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>&copy; 2023 Point of Sales</p>
    </footer>
</body>

</html>