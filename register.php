<?php
include "koneksi.php";

if(isset($_POST['daftar'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = "user";

    // hash password
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // cek email
    $cek = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($cek) > 0){
        echo "Email sudah terdaftar!";
    } else {
        $insert = mysqli_query($conn,
            "INSERT INTO users (nama, email, password, role)
             VALUES ('$nama', '$email', '$hash', '$role')"
        );

        if($insert){
            echo "Berhasil daftar! <a href='login.php'>Login</a>";
        } else {
            echo "Gagal daftar!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>

    <button name="daftar">Daftar</button>
</form>

<a href="login.php">Sudah punya akun?</a>

</body>
</html>
