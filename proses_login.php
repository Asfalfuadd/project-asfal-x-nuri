<?php
session_start();
include 'koneksi.php';

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user  = mysqli_fetch_assoc($query);

if(!$user){
    die("Email tidak ditemukan!");
}

if(!password_verify($password, $user['password'])){
    die("Password salah!");
}

// set session
$_SESSION['user_id'] = $user['id'];
$_SESSION['nama']    = $user['nama'];
$_SESSION['role']    = strtolower(trim($user['role']));

if($_SESSION['role'] == 'admin'){
    header("Location: dashboard_admin.php");
} elseif($_SESSION['role'] == 'penyedia'){
    header("Location: dashboard_penyedia.php");
} else {
    header("Location: dashboard_user.php");
}
exit;