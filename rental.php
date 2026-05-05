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

        /* HEADER ATAS */
        .header {
            background: #334155;
            color: white;
            padding: 15px 30px;
        }

        .header h2 {
            margin: 0;
            margin-left: 400px;
        }

        .header p {
            margin: 3px 0 0;
            font-size: 13px;
            margin-left: 400px;
            color: #cbd5f5;
        }

        /* NAVBAR */
        .navbar {
            background: #475569;
            padding: 10px 30px;
        }

        .navbar a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 14px;
        }

        .nav-container {
            max-width: 1100px;
            margin: auto;
            display: flex;
            gap: 15px;
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

<!-- HEADER -->
<div class="header">
    <h2>jasain.co</h2>
    <p>Layanan Penyedia jasa Terpercaya</p>
</div>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <a href="dashboard.php">Beranda</a>
        <a href="rental.php">Rental</a>
        <a href="jasa_angkut.php">Jasa Angkut</a>
        <a href="#">Service Elektronik</a>
        <a href ="#">Laundry</a>
        <a href="#">Profil</a>
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
                        <p><strong>Tipe:</strong> MPV</p>
                        <p><strong>Kapasitas:</strong> 7 Penumpang</p>
                        <p><strong>Transmisi:</strong> Manual</p>
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
                        <p><strong>Tipe:</strong> Hatchback</p>
                        <p><strong>Kapasitas:</strong> 5 Penumpang</p>
                        <p><strong>Transmisi:</strong> Otomatis</p>
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
                        <p><strong>Tipe:</strong> Minibus</p>
                        <p><strong>Kapasitas:</strong> 14 Penumpang</p>
                        <p><strong>Transmisi:</strong> Manual</p>
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
                        <p><strong>Tipe:</strong> MPV</p>
                        <p><strong>Kapasitas:</strong> 8 Penumpang</p>
                        <p><strong>Transmisi:</strong> Otomatis</p>
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
                        <p><strong>Tipe:</strong> Van</p>
                        <p><strong>Kapasitas:</strong> 8 Penumpang</p>
                        <p><strong>Transmisi:</strong> Manual</p>
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
                        <p><strong>Tipe:</strong> SUV</p>
                        <p><strong>Kapasitas:</strong> 7 Penumpang</p>
                        <p><strong>Transmisi:</strong> Otomatis</p>
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
