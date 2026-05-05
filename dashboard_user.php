<?php
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jasain.co - Dashboard User</title>

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
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.brand h2 {
    margin: 0;
}

.brand p {
    margin: 3px 0 0;
    font-size: 12px;
    color: #cbd5f5;
}

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

/* GRID CARD */
.cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
}

.card {
    background: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.card h3 {
    margin-top: 0;
}

button {
    padding: 8px 15px;
    background: #14b8a6;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
}

button a {
    color: white;
    text-decoration: none;
}
</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="topbar-container">

        <div class="brand">
            <h2>jasain.co</h2>
            <p>Layanan Penyedia Jasa Terpercaya</p>
        </div>

        <div class="nav-links">
            <a href="dashboard_user.php">Beranda</a>
            <a href="rental.php">Rental</a>
            <a href="angkut.php">Angkut</a>
            <a href="servis.php">Servis</a>
            <a href="laundry.php">Laundry</a>
            <a href="profil_user.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>

    </div>
</div>

<!-- CONTENT -->
<div class="container">

    <h1>Halo, <?php echo $_SESSION['nama']; ?> 👋</h1>
    <p>Cari jasa yang kamu butuhkan dengan mudah.</p>

    <div class="cards">

        <div class="card">
            <h3>Rental Kendaraan</h3>
            <p>Sewa motor / mobil dengan harga terjangkau.</p>
            <button><a href="rental.php">Lihat</a></button>
        </div>

        <div class="card">
            <h3>Jasa Angkut Barang</h3>
            <p>Pindahan & kirim barang jadi lebih mudah.</p>
            <button><a href="angkut.php">Lihat</a></button>
        </div>

        <div class="card">
            <h3>Service Elektronik</h3>
            <p>Perbaikan HP, laptop, dan perangkat lainnya.</p>
            <button><a href="servis.php">Lihat</a></button>
        </div>

        <div class="card">
            <h3>Laundry</h3>
            <p>Cuci & setrika cepat dan bersih.</p>
            <button><a href="laundry.php">Lihat</a></button>
        </div>

    </div>

    <br>

    <div class="card">
        <h3>Ingin Menjadi Penyedia?</h3>
        <p>Daftar sebagai penyedia dan mulai tawarkan jasa kamu.</p>
        <button><a href="#">Mulai Sekarang</a></button>
    </div>

</div>

</body>
</html>