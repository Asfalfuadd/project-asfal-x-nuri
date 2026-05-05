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

// kalau belum isi profil
if(!$penyedia){
    echo "<script>
        alert('Lengkapi profil penyedia dulu!');
        window.location='profil_penyedia.php';
    </script>";
    exit;
}

$penyedia_id = $penyedia['id'];

// ambil kategori
$servis = mysqli_query($conn, "SELECT * FROM servis");

if(isset($_POST['submit'])){

    $servis_id = $_POST['servis_id'];
    $judul     = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    $harga = str_replace(['.', ','], '', $_POST['harga']);

    $query = "INSERT INTO penyedia_servis 
        (penyedia_id, servis_id, judul, deskripsi, harga, created_at)
        VALUES ('$penyedia_id','$servis_id','$judul','$deskripsi','$harga',NOW())";

    if(mysqli_query($conn, $query)){
        echo "<script>
            alert('Jasa berhasil ditambahkan!');
            window.location='jasa_saya.php';
        </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
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
    max-width: 600px;
    margin: 40px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
}

/* INPUT */
input, textarea, select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
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

    <h2>Tambah Jasa</h2>

    <form method="POST">

        <label>Kategori</label>
        <select name="servis_id" required>
            <option value="">-- Pilih --</option>
            <?php while($row = mysqli_fetch_assoc($servis)){ ?>
                <option value="<?= $row['id']; ?>">
                    <?= $row['nama']; ?>
                </option>
            <?php } ?>
        </select>

        <label>Judul</label>
        <input type="text" name="judul" required>

        <label>Deskripsi</label>
        <textarea name="deskripsi" required></textarea>

        <label>Harga</label>
        <input type="text" name="harga" id="harga" required>

        <button type="submit" name="submit">Simpan</button>
    </form>

</div>

</body>
</html>