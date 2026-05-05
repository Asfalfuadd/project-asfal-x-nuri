<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}

// hapus penyedia
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM penyedia WHERE id='$id'");
    header("Location: admin_penyedia.php");
    exit;
}

$data = mysqli_query($conn, "
    SELECT p.*, u.nama, u.email 
    FROM penyedia p
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

/* TABLE */
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

<h2>Kelola Penyedia</h2>

<table>
<tr>
<th>ID</th>
<th>Nama</th>
<th>Email</th>
<th>Alamat</th>
<th>No HP</th>
<th>Aksi</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['nama']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['alamat']; ?></td>
<td><?= $row['no_hp']; ?></td>
<td>
<a href="?hapus=<?= $row['id']; ?>" onclick="return confirm('Hapus penyedia?')">
<button class="btn-hapus">Hapus</button>
</a>
</td>
</tr>
<?php endwhile; ?>
</table>

</div>

</body>
</html>