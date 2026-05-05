<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit;
}

// ambil jasa kategori servis (misal id servis = 3)
$data = mysqli_query($conn, "
    SELECT ps.*, u.nama 
    FROM penyedia_servis ps
    JOIN penyedia p ON ps.penyedia_id = p.id
    JOIN users u ON p.user_id = u.id
    WHERE ps.servis_id = 3
");
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

.brand h2 { margin: 0; }

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
}

.content {
    margin: 30px auto;
    background-color: white;
    padding: 30px;
    max-width: 1100px;
}

.servis-list {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
    margin-top: 20px;
}

.servis-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

.image {
    width: 100%;
    height: 200px;
    background-color: #ecf0f1;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #95a5a6;
}

.servis-info {
    padding: 15px;
}

.servis-info h3 {
    margin: 0 0 10px;
}

.servis-info p {
    font-size: 14px;
    color: #666;
    margin: 5px 0;
}

.price {
    font-size: 18px;
    font-weight: bold;
    color: #1abc9c;
    margin: 10px 0;
}

.button-group {
    margin-top: 15px;
}

.btn-primary {
    display: block;
    text-align: center;
    padding: 10px;
    background-color: #1abc9c;
    color: white;
    text-decoration: none;
    border-radius: 5px;
}
</style>
</head>

<body>

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

<div class="content">
    <h2>Daftar Layanan Servis</h2>
    <p>Pilih layanan servis sesuai kebutuhan Anda</p>

    <div class="servis-list">

        <?php if(mysqli_num_rows($data) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($data)): ?>

                <div class="servis-card">

                    <div class="image">Foto Servis</div>

                    <div class="servis-info">
                        <h3><?= $row['judul']; ?></h3>

                        <p>Penyedia: <?= $row['nama']; ?></p>
                        <p><?= substr($row['deskripsi'],0,60); ?>...</p>

                        <div class="price">
                            Rp <?= number_format($row['harga'],0,',','.'); ?>
                        </div>

                        <div class="button-group">
                            <a href="booking.php?id=<?= $row['id']; ?>" class="btn-primary">
                                Pesan
                            </a>
                        </div>
                    </div>

                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <p>Tidak ada layanan tersedia</p>
        <?php endif; ?>

    </div>
</div>

</body>
</html>