<?php
session_start();
include 'koneksi.php';

// 🔒 Proteksi admin
if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}

// 🔥 HAPUS USER
if(isset($_GET['hapus'])){
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM users WHERE id='$id'");
    header("Location: admin_users.php");
    exit;
}

// 🔥 UBAH ROLE
if(isset($_POST['ubah_role'])){
    $id   = $_POST['id'];
    $role = $_POST['role'];

    mysqli_query($conn, "UPDATE users SET role='$role' WHERE id='$id'");
    header("Location: admin_users.php");
    exit;
}

// ambil semua user
$data = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
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

/* NAVBAR */
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

.btn-update {
    background: #14b8a6;
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

<!-- CONTENT -->
<div class="container">

    <h2>Kelola User</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($data)): ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['email']; ?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">

                    <select name="role">
                        <option value="user" <?= $row['role']=='user'?'selected':'' ?>>User</option>
                        <option value="penyedia" <?= $row['role']=='penyedia'?'selected':'' ?>>Penyedia</option>
                        <option value="admin" <?= $row['role']=='admin'?'selected':'' ?>>Admin</option>
                    </select>

                    <button type="submit" name="ubah_role" class="btn-update">Update</button>
                </form>
            </td>
            <td>
                <a href="admin_users.php?hapus=<?= $row['id']; ?>" 
                   onclick="return confirm('Yakin hapus user?')">
                    <button class="btn-hapus">Hapus</button>
                </a>
            </td>
        </tr>
        <?php endwhile; ?>

    </table>

</div>

</body>
</html>