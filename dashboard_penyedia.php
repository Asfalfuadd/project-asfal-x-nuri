<?php
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'penyedia'){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jasain.co - Dashboard Penyedia</title>

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
    color: #ccfbf1;
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

<div class="topbar">
    <div class="topbar-container">

        <div class="brand">
            <h2>jasain.co</h2>
            <p>Dashboard Penyedia</p>
        </div>

        <div class="nav-links">
            <a href="dashboard_penyedia.php">Beranda</a>
            <a href="tambah_jasa.php">Tambah Jasa</a>
            <a href="jasa_saya.php">Jasa Saya</a>
            <a href="order_masuk.php">Order Masuk</a>
            <a href="profil_penyedia.php">Profil</a>
            <a href="logout.php">Logout</a>
        </div>

    </div>
</div>

<div class="container">

    <h1>Halo, <?php echo $_SESSION['nama']; ?> 👋</h1>
    <p>Kelola jasa dan pesanan kamu di sini.</p>

    <div class="cards">

        <div class="card">
            <h3>Tambah Jasa</h3>
            <p>Buat layanan baru yang bisa dipesan oleh user.</p>
            <button><a href="tambah_jasa.php">Tambah</a></button>
        </div>

        <div class="card">
            <h3>Jasa Saya</h3>
            <p>Lihat dan kelola semua jasa yang kamu tawarkan.</p>
            <button><a href="jasa_saya.php">Lihat</a></button>
        </div>

        <div class="card">
            <h3>Order Masuk</h3>
            <p>Cek dan kelola pesanan dari pelanggan.</p>
            <button><a href="order_masuk.php">Lihat</a></button>
        </div>

        <div class="card">
            <h3>Profil Penyedia</h3>
            <p>Lengkapi informasi profil agar lebih dipercaya.</p>
            <button><a href="profil_penyedia.php">Edit</a></button>
        </div>

    </div>

    <br>

    <div class="card">
        <h3>Tips Sukses</h3>
        <p>Lengkapi deskripsi jasa dan gunakan harga kompetitif agar lebih banyak order.</p>
    </div>

</div>

</body>
</html>