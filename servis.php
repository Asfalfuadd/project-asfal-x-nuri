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
        
        .content {
            margin: 30px auto;
            background-color: white;
            padding: 30px;
        }
        
        .laundry-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .laundry-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        
        .image {
            width: 100%;
            height: 200px;
            background-color: #ecf0f1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #95a5a6;
            font-size: 14px;
        }
        
        .laundry-info {
            padding: 15px;
        }
        
        .laundry-info h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .laundry-info p {
            font-size: 14px;
            margin-bottom: 8px;
            color: #7f8c8d;
        }
        
        .price {
            font-size: 18px;
            font-weight: bold;
            color: #1abc9c;
            margin: 10px 0;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }
        
        button, a.btn {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
            font-size: 14px;
        }
        
        .btn-primary {
            background-color: #1abc9c;
            color: white;
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
            <a href="dashboard.php">Beranda</a>
            <a href="rental.php">Rental</a>
            <a href="angkut.php">Angkut</a>
            <a href="servis.php">Servis</a>
            <a href="laundry.php">Laundry</a>
            <a href="#">Profil</a>
        </div>
    </div>
</div>

    <div class="container">
        <div class="content">
            <h2>Daftar Layanan Laundry</h2>
            <p>Pilih layanan servis sesuai kebutuhan Anda</p>

            <div class="laundry-list">
                <!-- CARD 1 -->
                <div class="laundry-card">
                    <div class="image">Foto Servis</div>
                    <div class="laundry-info">
                        <h3>Servis Laptop</h3>
                        <p>Layanan: Perbaikan + Pemeriksaan</p>
                        <p>Estimasi: 1-5 Hari</p>
                        <p>Garansi: 7 Hari</p>
                        <div class="price">Rp 200.000 - Rp 1.000.000</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="laundry-card">
                    <div class="image">Foto Servis</div>
                    <div class="laundry-info">
                        <h3>Servis Handphone</h3>
                        <p>Layanan: Perbaikan + Pemeriksaan</p>
                        <p>Estimasi: 1-3 Hari</p>
                        <p>Garansi: 7 Hari</p>
                        <div class="price">Rp 200.000 - Rp 500.000</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="laundry-card">
                    <div class="image">Foto Servis</div>
                    <div class="laundry-info">
                        <h3>Servis Tv</h3>
                        <p>Layanan: Perbaikan + Pemeriksaan</p>
                        <p>Estimasi: 1-5 Hari</p>
                        <p>Garansi: 7 Hari</p>
                        <div class="price">Rp 500.000 - Rp 1.000.000</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
