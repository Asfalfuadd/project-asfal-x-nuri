<?php
session_start();

if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jasain.co</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f1f5f9;
        }

        .topbar {
            background: #334155;
            color: white;
        }

        .topbar-container {
            max-width: 1100px;
            margin: auto;
            padding: 15px 0;
            
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* BRAND */
        .brand h2 {
            margin: 0;
        }

        .brand p {
            margin: 3px 0 0;
            font-size: 12px;
            color: #cbd5f5;
        }

        /* NAVBAR */
        .nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        .container {
            margin: 30px auto;
            max-width: 1100px;
        }

        /* CARD */
        .card {
            background: #ffffff;
            padding: 20px;
        }

        .card h3 {
            margin-top: 0;
        }

        /* BUTTON */
        button {
            padding: 8px 15px;
            background: #14b8a6;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        /* FIX LINK DALAM BUTTON */
        button a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="topbar">
    <div class="topbar-container">
        <div class="brand">
            <h2>jasain.co</h2>
            <p>Layanan Penyedia jasa Terpercaya</p>
</div>

        <!-- BAGIAN NAVBAR -->
        <div class="nav-links">
            <a href="#">Beranda</a>
            <a href="rental.php">Rental</a>
            <a href="angkut.php">Angkut</a>
            <a href="servis.php">Servis</a>
            <a href="laundry.php">Laundry</a>
            <a href="#">Profil</a>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <h1>Cari Jasa yang Kamu Butuhkan 🔍</h1>
    <p>Temukan berbagai layanan dengan mudah.</p>

    <div class="cards">

        <div class="card">
            <h3>Rental Kendaraan</h3>
            <p>Sewa motor / mobil dengan harga terjangkau.</p>
            <button>
                <a href="rental.php">Lihat</a>
            </button>
        </div>

        <div class="card">
            <h3>Jasa Angkut Barang</h3>
            <p>Pindahan & kirim barang jadi lebih mudah.</p>
            <button>
                <a href="jasa_angkut.php">Lihat</a>
            </button>
        </div>

        <div class="card">
            <h3>Service Elektronik</h3>
            <p>Perbaikan HP, laptop, dan perangkat lainnya.</p>
            <button>Lihat</button>
        </div>

        <div class="card">
            <h3>Laundry</h3>
            <p>Cuci & setrika cepat dan bersih.</p>
             <button>
                <a href="laundry.php">Lihat</a>
            </button>
        </div>

    </div>

    <br>

    <div class="card">
        <h3>Ingin Menyediakan Jasa?</h3>
        <p>Mulai tawarkan layanan kamu dan dapatkan penghasilan.</p>
        <button>Mulai Menyediakan Jasa</button>
    </div>

</div>

</body>
</html>
