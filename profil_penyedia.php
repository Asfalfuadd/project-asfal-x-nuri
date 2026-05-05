<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'penyedia'){
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// ambil data profil
$query = mysqli_query($conn, "SELECT * FROM penyedia WHERE user_id='$user_id'");
$data  = mysqli_fetch_assoc($query);

if(isset($_POST['simpan'])){
    $deskripsi = $_POST['deskripsi'];
    $alamat    = $_POST['alamat'];
    $no_hp     = $_POST['no_hp'];

    if($data){
        // UPDATE
        mysqli_query($conn, "UPDATE penyedia SET
            deskripsi='$deskripsi',
            alamat='$alamat',
            no_hp='$no_hp'
            WHERE user_id='$user_id'
        ");
    } else {
        // INSERT
        mysqli_query($conn, "INSERT INTO penyedia 
            (user_id, deskripsi, alamat, no_hp)
            VALUES ('$user_id','$deskripsi','$alamat','$no_hp')
        ");
    }

    echo "<script>
        alert('Profil berhasil disimpan!');
        window.location='profil_penyedia.php';
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
    max-width: 700px;
    margin: 30px auto;
}

/* CARD */
.card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
}

/* INPUT */
input, textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

/* BUTTON */
button {
    background: #14b8a6;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

/* LABEL */
label {
    font-weight: bold;
}

/* TITLE */
h2 {
    margin-top: 0;
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

    <div class="card">
        <h2>Profil Penyedia</h2>

        <form method="POST">

            <label>Deskripsi</label>
            <textarea name="deskripsi" required><?= $data['deskripsi'] ?? '' ?></textarea>

            <label>Alamat</label>
            <input type="text" name="alamat" value="<?= $data['alamat'] ?? '' ?>" required>

            <label>No HP</label>
            <input type="text" name="no_hp" value="<?= $data['no_hp'] ?? '' ?>" required>

            <button type="submit" name="simpan">Simpan Profil</button>

        </form>
    </div>

</div>

</body>
</html>