<?php
session_start();
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
        
        .jasa-angkut-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .jasa-angkut-card {
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
        
        .jasa-angkut-info {
            padding: 15px;
        }
        
        .jasa-angkut-info h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .jasa-angkut-info p {
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
            <h2>Daftar jasa angkut</h2>
            <p>Pilih jasa angkut yang anda inginkan</p>
            
            <div class="jasa-angkut-list">
                <!-- CARD 1 -->
                <div class="jasa-angkut-card">
                    <div class="image">Foto Armada</div>
                    <div class="jasa-angkut-info">
                        <h3>Pickup Bak Terbuka</h3>
                        <p>Kapasitas: 1 Ton</p>
                        <p>Cocok: Pindahan kecil</p>
                        <p>Driver: Termasuk</p>
                        <div class="price">Rp 150.000 / Trip</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="jasa-angkut-card">
                    <div class="image">Foto Armada</div>
                    <div class="jasa-angkut-info">
                        <h3>Mobil Box</h3>
                        <p>Kapasitas: 2 Ton</p>
                        <p>Cocok: Pindahan rumah</p>
                        <p>Driver + Helper</p>
                        <div class="price">Rp 300.000 / Trip</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="jasa-angkut-card">
                    <div class="image">Foto Armada</div>
                    <div class="jasa-angkut-info">
                        <h3>Truk Engkel</h3>
                        <p>Kapasitas: 4 Ton</p>
                        <p>Cocok: Barang besar</p>
                        <p>Driver + 2 Helper</p>
                        <div class="price">Rp 500.000 / Trip</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 4 -->
                <div class="jasa-angkut-card">
                    <div class="image">Foto Armada</div>
                    <div class="jasa-angkut-info">
                        <h3>Truk </h3>
                        <p>Kapasitas: 4 Ton</p>
                        <p>Cocok: Pasir, Batu, Bata</p>
                        <p>Driver + 2 Helper</p>
                        <div class="price">Rp 500.000 / Trip</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

</body>
</html>
