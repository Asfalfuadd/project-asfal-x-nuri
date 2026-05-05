<?php
session_start();
include 'koneksi.php';

// 🔒 Proteksi
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'penyedia'){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// ambil penyedia
$data = mysqli_query($conn, "SELECT id FROM penyedia WHERE user_id='$user_id'");
$penyedia = mysqli_fetch_assoc($data);

if(!$penyedia){
    header("Location: profil_penyedia.php");
    exit;
}

$penyedia_id = $penyedia['id'];

// 🔥 ambil order + join
$order = mysqli_query($conn, "
    SELECT b.*, u.nama, ps.judul
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    JOIN penyedia_servis ps ON b.penyedia_servis_id = ps.id
    WHERE ps.penyedia_id='$penyedia_id'
    ORDER BY b.created_at DESC
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

/* GRID */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
}

/* CARD */
.card {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

/* STATUS */
.status {
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 12px;
    display: inline-block;
    margin-bottom: 10px;
}

.pending { background: #facc15; }
.proses { background: #60a5fa; color: white; }
.selesai { background: #4ade80; }

/* BUTTON */
.btn {
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    color: white;
    font-size: 13px;
}

.btn-proses { background: #3b82f6; }
.btn-selesai { background: #22c55e; }

.harga {
    font-weight: bold;
    color: #0f766e;
    margin-top: 10px;
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

    <h2>Order Masuk</h2>

    <div class="grid">

    <?php if(mysqli_num_rows($order) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($order)): ?>

            <div class="card">

                <!-- STATUS -->
                <div class="status <?= $row['status']; ?>">
                    <?= $row['status'] ?? 'pending'; ?>
                </div>

                <h3><?= $row['judul']; ?></h3>

                <p><b>Customer:</b> <?= $row['nama']; ?></p>
                <p><b>Tanggal:</b> <?= $row['booking_date']; ?></p>
                <p><b>Jam:</b> <?= date("H:i", strtotime($row['booking_time'])); ?></p>
                <p><b>Alamat:</b> <?= $row['alamat']; ?></p>

                <div class="harga">
                    Rp <?= number_format($row['total_harga'],0,',','.'); ?>
                </div>

                <br>

                <!-- AKSI -->
                <?php if($row['status'] == 'pending'): ?>
                    <a class="btn btn-proses" href="update_status.php?id=<?= $row['id']; ?>&status=proses">
                        Proses
                    </a>
                <?php elseif($row['status'] == 'proses'): ?>
                    <a class="btn btn-selesai" href="update_status.php?id=<?= $row['id']; ?>&status=selesai">
                        Selesai
                    </a>
                <?php endif; ?>

            </div>

        <?php endwhile; ?>
    <?php else: ?>
        <p>Tidak ada order</p>
    <?php endif; ?>

    </div>

</div>

</body>
</html>