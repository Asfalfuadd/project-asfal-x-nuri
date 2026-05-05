<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'penyedia'){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$data = mysqli_query($conn, "SELECT id FROM penyedia WHERE user_id='$user_id'");
$penyedia = mysqli_fetch_assoc($data);

if(!$penyedia){
    header("Location: profil_penyedia.php");
    exit;
}



$penyedia_id = $penyedia['id'];

$jasa = mysqli_query($conn, "
    SELECT ps.*, s.nama AS kategori 
    FROM penyedia_servis ps
    JOIN servis s ON ps.servis_id = s.id
    WHERE ps.penyedia_id='$penyedia_id'
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Jasain.co</title>

<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #f1f5f9;
}

/* TOPBAR */
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

/* NAV */
.nav-links a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
    padding: 8px 12px;
    border-radius: 5px;
    font-size: 14px;
    transition: 0.3s;
}

/* CONTAINER */
.container {
    max-width: 1100px;
    margin: 30px auto;
}

.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
}

.card {
    background: white;
    padding: 18px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);

    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.card-content {
    flex: 1;
}

.badge {
    display: inline-block;
    background: #e0f2fe;
    color: #0369a1;
    padding: 5px 10px;
    border-radius: 6px;
    font-size: 12px;
    margin-bottom: 10px;
}

.card h3 {
    margin: 5px 0;
}

.card p {
    font-size: 14px;
    color: #555;
}

.harga {
    font-weight: bold;
    color: #0f766e;
    margin-top: 10px;
}

.card-footer {
    margin-top: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.btn {
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 13px;
}

.btn-delete {
    background: #ef4444;
    color: white;
}

/* TOP BUTTON */
.top-btn {
    margin-bottom: 20px;
}

.top-btn a {
    background: #14b8a6;
    color: white;
    padding: 10px 18px;
    text-decoration: none;
    border-radius: 6px;
}
</style>

</head>
<body>

<!-- TOPBAR -->
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

<!-- CONTENT -->
<div class="container">

    <div class="top-btn">
        <a href="tambah_jasa.php">+ Tambah Jasa</a>
    </div>

    <div class="grid">

    <?php if(mysqli_num_rows($jasa) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($jasa)): ?>

            <div class="card">

                <div class="card-content">
                    <span class="badge"><?= $row['kategori']; ?></span>

                    <h3><?= $row['judul']; ?></h3>

                    <p><?= substr($row['deskripsi'], 0, 100); ?>...</p>

                    <div class="harga">
                        Rp <?= number_format($row['harga']); ?>
                    </div>
                </div>

                <div class="card-footer">
                    <small>ID: <?= $row['id']; ?></small>

                    <a class="btn btn-delete"
                       href="hapus_jasa.php?id=<?= $row['id']; ?>"
                       onclick="return confirm('Yakin hapus?')">
                       Hapus
                    </a>
                </div>

            </div>

        <?php endwhile; ?>
    <?php else: ?>
        <p>Belum ada jasa 😢</p>
    <?php endif; ?>

    </div>

</div>

</body>
</html>