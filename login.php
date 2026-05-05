<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Login - Jasain</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: #334155;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* CARD */
.card {
    background: white;
    padding: 30px;
    width: 350px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* TITLE */
h2 {
    text-align: center;
    margin-bottom: 20px;
}

/* INPUT */
input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

/* BUTTON */
button {
    width: 100%;
    padding: 10px;
    background: #14b8a6;
    border: none;
    color: white;
    border-radius: 6px;
    cursor: pointer;
}

/* LINK */
.link {
    text-align: center;
    margin-top: 15px;
}

* {
    box-sizing: border-box;
}

</style>
</head>

<body>

<div class="card">
    <h2>Login</h2>

    <form method="POST" action="proses_login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Masuk</button>
    </form>

    <div class="link">
        <p>Belum punya akun? <a href="register.php">Daftar</a></p>
    </div>
</div>

</body>
</html>