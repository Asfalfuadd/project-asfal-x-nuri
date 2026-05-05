<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'user'){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// ambil data user
$query = mysqli_query($conn, "SELECT * FROM users WHERE id='$user_id'");
$data  = mysqli_fetch_assoc($query);

if(isset($_POST['simpan'])){
    $nama     = $_POST['nama'];
    $password = $_POST['password'];

    // kalau password diisi → update password
    if(!empty($password)){
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        mysqli_query($conn, "UPDATE users SET
            nama='$nama',
            password='$password_hash'
            WHERE id='$user_id'
        ");
    } else {
        mysqli_query($conn, "UPDATE users SET
            nama='$nama'
            WHERE id='$user_id'
        ");
    }

    echo "<script>
        alert('Profil berhasil diperbarui!');
        window.location='profil_user.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
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
    max-width: 700px;
    margin: 30px auto;
}

/* CARD */
.card {
    background: white;
    padding: 25px;
    border-radius: 10px;
}

/* INPUT */
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
}

/* BUTTON */
button {
    background: #14b8a6;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
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

    <div class="card">
        <h2>Profil Saya</h2>

        <form method="POST">

            <label>Nama</label>
            <input type="text" name="nama" value="<?= $data['nama']; ?>" required>

            <label>Email</label>
            <input type="email" value="<?= $data['email']; ?>" disabled>

            <label>Password Baru (opsional)</label>
            <input type="password" name="password" placeholder="Kosongkan jika tidak diubah">

            <button type="submit" name="simpan">Simpan Perubahan</button>

        </form>
    </div>

</div>

</body>
</html>