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
<title>Laundry</title>

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

<!-- HEADER -->
<div class="header">
    <div class="header-container">
        <h2>jasain.co</h2>
        <p>Layanan Penyedia jasa Terpercaya</p>
    </div>
</div>

<!-- NAVBAR -->
<div class="navbar">
    <div class="nav-container">
        <a href="dashboard.php">Beranda</a>
        <a href="rental.php">Rental</a>
        <a href="jasa_angkut.php">Jasa Angkut</a>
        <a href="#">Service Elektronik</a>
        <a href ="laundry.php">Laundry</a>
        <a href="#">Profil</a>
    </div>
</div>

    <div class="container">
        <div class="content">
            <h2>Daftar Layanan Laundry</h2>
            <p>Pilih layanan laundry sesuai kebutuhan Anda</p>

            <div class="laundry-list">
                <!-- CARD 1 -->
                <div class="laundry-card">
                    <div class="image">Foto Laundry</div>
                    <div class="laundry-info">
                        <h3>Laundry Kiloan</h3>
                        <p>Layanan: Cuci + Setrika</p>
                        <p>Estimasi: 2-3 Hari</p>
                        <p>Minimum: 3 Kg</p>
                        <div class="price">Rp 7.000 / Kg</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 2 -->
                <div class="laundry-card">
                    <div class="image">Foto Laundry</div>
                    <div class="laundry-info">
                        <h3>Laundry Express</h3>
                        <p>Layanan: Cuci + Setrika</p>
                        <p>Estimasi: 1 Hari</p>
                        <p>Prioritas Cepat</p>
                        <div class="price">Rp 10.000 / Kg</div>
                        <div class="button-group">
                            <a href="#" class="btn btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>

                <!-- CARD 3 -->
                <div class="laundry-card">
                    <div class="image">Foto Laundry</div>
                    <div class="laundry-info">
                        <h3>Laundry Satuan</h3>
                        <p>Layanan: Per Item</p>
                        <p>Cocok: Jas, Selimut, dll</p>
                        <p>Harga Fleksibel</p>
                        <div class="price">Mulai Rp 15.000</div>
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
