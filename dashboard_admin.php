<?php
session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Jasain.co - Dashboard Admin</title>

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
            <p>Dashboard Admin</p>
        </div>

        <div class="nav-links">
            <a href="dashboard_admin.php">Beranda</a>
            <a href="kelola_user.php">User</a>
            <a href="kelola_penyedia.php">Penyedia</a>
            <a href="kelola_jasa.php">Jasa</a>
            <a href="kelola_booking.php">Booking</a>
            <a href="logout.php">Logout</a>
        </div>

    </div>
</div>

<div class="container">

    <h1>Halo Admin, <?php echo $_SESSION['nama']; ?> 👋</h1>
    <p>Kelola seluruh sistem dari dashboard ini.</p>

    <div class="cards">

        <div class="card">
            <h3>Kelola User</h3>
            <p>Lihat, edit, atau hapus akun user.</p>
            <button><a href="kelola_user.php">Masuk</a></button>
        </div>

        <div class="card">
            <h3>Kelola Penyedia</h3>
            <p>Kontrol penyedia jasa yang terdaftar.</p>
            <button><a href="kelola_penyedia.php">Masuk</a></button>
        </div>

        <div class="card">
            <h3>Kelola Jasa</h3>
            <p>Atur kategori layanan dalam sistem.</p>
            <button><a href="kelola_jasa.php">Masuk</a></button>
        </div>

        <div class="card">
            <h3>Kelola Booking</h3>
            <p>Monitor keseluruhan transaksi user.</p>
            <button><a href="kelola_booking.php">Masuk</a></button>
        </div>

    </div>

    <br>

    <div class="card">
        <h3>Statistik Sistem</h3>
        <p>Jumlah user, penyedia, dan transaksi bisa ditampilkan di sini nanti.</p>
    </div>

</div>

</body>
</html>