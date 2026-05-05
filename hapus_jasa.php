<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'penyedia'){
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM penyedia_servis WHERE id='$id'");

header("Location: jasa_saya.php");
exit;
?>