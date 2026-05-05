<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Register - Jasain</title>

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
}

/* INPUT */
input, select {
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

.link {
    text-align: center;
    margin-top: 10px;
}

* {
    box-sizing: border-box;
}

</style>
</head>

<body>

<div class="card">
    <h2>Daftar</h2>

    <form method="POST" action="proses_register.php">
        <input type="text" name="nama" placeholder="Nama Lengkap" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>

        <select name="role" required>
            <option value="">-- Pilih Role --</option>
            <option value="user">User</option>
            <option value="penyedia">Penyedia</option>
        </select>

        <button type="submit">Daftar</button>
    </form>

    <div class="link">
        <p>Sudah punya akun? <a href="login.php">Login</a></p>
    </div>
</div>

</body>
</html>