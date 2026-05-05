<?php
session_start();
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}

if(isset($_GET['hapus'])){
    mysqli_query($conn, "DELETE FROM penyedia_servis WHERE id='$_GET[hapus]'");
    header("Location: admin_servis.php");
}

$data = mysqli_query($conn, "
    SELECT ps.*, u.nama 
    FROM penyedia_servis ps
    JOIN penyedia p ON ps.penyedia_id = p.id
    JOIN users u ON p.user_id = u.id
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

/* TOPBAR (SAMA SEPERTI USER) */
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
    max-width: 1100px;
    margin: 30px auto;
}

table {
    width: 100%;
    background: white;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

/* BUTTON */
button {
    padding: 6px 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.btn-hapus {
    background: red;
    color: white;
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

<h2>Kelola Jasa</h2>

<table>
<tr>
<th>Judul</th>
<th>Penyedia</th>
<th>Harga</th>
<th>Aksi</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $row['judul']; ?></td>
<td><?= $row['nama']; ?></td>
<td>Rp <?= number_format($row['harga']); ?></td>
<td>
<a href="?hapus=<?= $row['id']; ?>">
<button class="btn-hapus">Hapus</button>
</a>
</td>
</tr>
<?php endwhile; ?>

</table>

</div>

</body>
</html>