<?php
include 'koneksi.php';

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$role     = $_POST['role'];

// validasi role

if(empty($role)){
    die("Role harus dipilih!");
}

// normalisasi (biar aman)
$role = strtolower(trim($role));
if($role != 'user' && $role != 'penyedia'){
    die("Role tidak valid!");
}

// cek email
$cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($cek) > 0){
    die("Email sudah digunakan!");
}

// insert
$query = "INSERT INTO users (nama, email, password, role, created_at)
VALUES ('$nama','$email','$password','$role',NOW())";

if(mysqli_query($conn, $query)){
    echo "Registrasi berhasil! <a href='login.php'>Login</a>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>