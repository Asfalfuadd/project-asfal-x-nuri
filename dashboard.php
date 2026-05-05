<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

if($_SESSION['role'] == 'penyedia'){
    header("Location: dashboard_penyedia.php");
} else {
    header("Location: dashboard_user.php");
}
exit;
?>