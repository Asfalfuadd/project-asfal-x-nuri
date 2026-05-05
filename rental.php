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
        
        .rental-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .rental-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        
        .rental-image {
            width: 100%;
            height: 200px;
            background-color: #ecf0f1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #95a5a6;
            font-size: 14px;
        }
        
        .rental-info {
            padding: 15px;
        }
        
        .rental-info h3 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .rental-info p {
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

<body>
    <div class="container">
        <div class="content">
            <h2>Daftar Kendaraan Rental</h2>
            <p>Pilih kendaraan favorit Anda untuk disewa</p>
            
            <div class="rental-list">
                <!-- Kendaraan 1 -->
                <div class="rental-card">
                    <div class="rental-image">Foto Kendaraan</div>
                    <div class="rental-info">
                        <h3>Toyota Avanza</h3>
                        <p>Tipe: MPV</p>
                        <p>Kapasitas: 7 Penumpang</p>
                        <p>Transmisi: Manual</p>
                        <div class="price">Rp 300.000/Hari</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <!-- Kendaraan 2 -->
                <div class="rental-card">
                    <div class="rental-image">Foto Kendaraan</div>
                    <div class="rental-info">
                        <h3>Honda Jazz</h3>
                        <p>Tipe: Hatchback</p>
                        <p>Kapasitas: 5 Penumpang</p>
                        <p>Transmisi: Otomatis</p>
                        <div class="price">Rp 250.000/Hari</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <!-- Kendaraan 3 -->
                <div class="rental-card">
                    <div class="rental-image">Foto Kendaraan</div>
                    <div class="rental-info">
                        <h3>Daihatsu Gran Max</h3>
                        <p>Tipe: Minibus</p>
                        <p>Kapasitas: 14 Penumpang</p>
                        <p>Transmisi: Manual</p>
                        <div class="price">Rp 500.000/Hari</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <!-- Kendaraan 4 -->
                <div class="rental-card">
                    <div class="rental-image">Foto Kendaraan</div>
                    <div class="rental-info">
                        <h3>Nissan Serena</h3>
                        <p>Tipe: MPV</p>
                        <p>Kapasitas: 8 Penumpang</p>
                        <p>Transmisi: Otomatis</p>
                        <div class="price">Rp 450.000/Hari</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <!-- Kendaraan 5 -->
                <div class="rental-card">
                    <div class="rental-image">Foto Kendaraan</div>
                    <div class="rental-info">
                        <h3>Suzuki APV</h3>
                        <p>Tipe: Van</p>
                        <p>Kapasitas: 8 Penumpang</p>
                        <p>Transmisi: Manual</p>
                        <div class="price">Rp 350.000/Hari</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
                
                <!-- Kendaraan 6 -->
                <div class="rental-card">
                    <div class="rental-image">Foto Kendaraan</div>
                    <div class="rental-info">
                        <h3>Toyota Fortuner</h3>
                        <p>Tipe: SUV</p>
                        <p>Kapasitas: 7 Penumpang</p>
                        <p>Transmisi: Otomatis</p>
                        <div class="price">Rp 600.000/Hari</div>
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
