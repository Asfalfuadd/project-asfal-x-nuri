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
<title>Dashboard User</title>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: white;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #020617;
    padding: 15px 30px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.5);
}

.navbar h2 {
    margin: 0;
}

.nav-links a {
    color: white;
    margin-left: 20px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.nav-links a:hover {
    color: #38bdf8;
}

.container {
    padding: 30px;
}

.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
}

.card {
    background: #1e293b;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    transition: 0.3s;
}

.card:hover {
    transform: translateY(-5px);
}

.card h3 {
    margin-top: 0;
}

button {
    padding: 8px 15px;
    background: #38bdf8;
    border: none;
    border-radius: 5px;
    color: black;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #0ea5e9;
}

.search-box {
    margin: 20px 0;
}

.search-box input {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: none;
}
</style>
</head>

<body>

<div class="navbar">
    <h2>JasaIn.co</h2>
    <div class="nav-links">
        <a href="#">Dashboard</a>
        <a href="#">Jasa</a>
        <a href="#">Booking</a>
        <a href="#">Harga</a>
        <a href="#">Notifikasi</a>
        <a href="#">Riwayat</a>
        <a href="#">Profil</a>
    </div>
</div>

<div class="container">

    <h1>Cari Jasa yang Kamu Butuhkan 🔍</h1>
    <p>Temukan berbagai layanan dengan mudah.</p>

    <div class="cards">

        <div class="card">
            <h3>Rental Kendaraan</h3>
            <p>Sewa motor / mobil dengan harga terjangkau.</p>
            <button>Lihat</button>
        </div>

        <div class="card">
            <h3>Jasa Angkut Barang</h3>
            <p>Pindahan & kirim barang jadi lebih mudah.</p>
            <button>Lihat</button>
        </div>

        <div class="card">
            <h3>Service Elektronik</h3>
            <p>Perbaikan HP, laptop, dan perangkat lainnya.</p>
            <button>Lihat</button>
        </div>

        <div class="card">
            <h3>Laundry</h3>
            <p>Cuci & setrika cepat dan bersih.</p>
            <button>Lihat</button>
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
