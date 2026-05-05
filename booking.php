<?php
session_start();
include 'koneksi.php';

// Proteksi user
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// ambil id jasa dari URL
$id = $_GET['id'];

// ambil detail jasa
$jasa = mysqli_query($conn, "
    SELECT ps.*, p.alamat, u.nama AS penyedia_nama
    FROM penyedia_servis ps
    JOIN penyedia p ON ps.penyedia_id = p.id
    JOIN users u ON p.user_id = u.id
    WHERE ps.id='$id'
");

$data = mysqli_fetch_assoc($jasa);

// PROSES BOOKING
if(isset($_POST['booking'])){
    $tanggal = $_POST['tanggal'];
    $jam     = $_POST['jam'];
    $alamat  = $_POST['alamat'];
    $catatan = $_POST['catatan'];

    $total = $data['harga'];

    mysqli_query($conn, "INSERT INTO bookings
        (user_id, penyedia_servis_id, booking_date, booking_time, alamat, catatan, status, total_harga, created_at)
        VALUES
        ('$user_id','$id','$tanggal','$jam','$alamat','$catatan','pending','$total',NOW())
    ");

    echo "<script>
        alert('Booking berhasil!');
        window.location='dashboard_user.php';
    </script>";
}
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
    max-width: 600px;
    margin: 30px auto;
}

.card {
    background: white;
    padding: 25px;
    border-radius: 10px;
}

input, textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
}

button {
    background: #14b8a6;
    color: white;
    padding: 10px;
    border: none;
    width: 100%;
    cursor: pointer;
}

.harga {
    font-weight: bold;
    color: #0f766e;
    margin-bottom: 10px;
}

* {
    box-sizing: border-box;
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

<div class="container">

    <div class="card">

        <h2><?= $data['judul']; ?></h2>
        <p><b>Penyedia:</b> <?= $data['penyedia_nama']; ?></p>

        <div class="harga">
            Rp <?= number_format($data['harga'],0,',','.'); ?>
        </div>

        <hr>

        <form method="POST">

            <label>Tanggal</label>
            <input type="date" name="tanggal" required>

            <label>Jam</label>
            <input type="time" name="jam" step="60" required>

            <label>Alamat</label>
            <textarea name="alamat" required></textarea>

            <label>Catatan (opsional)</label>
            <textarea name="catatan"></textarea>

            <button type="submit" name="booking">Booking Sekarang</button>

        </form>

    </div>

</div>

</body>
</html>