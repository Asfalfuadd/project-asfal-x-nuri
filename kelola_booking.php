<?php
session_start();
include 'koneksi.php';

if($_SESSION['role'] != 'admin'){
    header("Location: login.php");
    exit;
}
if(isset($_POST['aksi'])){
    $id = $_POST['id'];

    if($_POST['aksi'] == 'approve'){
        $status = 'approved';
    } else {
        $status = 'rejected';
    }

    mysqli_query($conn, "
        UPDATE bookings 
        SET status='$status'
        WHERE id='$id'
    ");

    header("Location: admin_booking.php");
    exit;
}


$data = mysqli_query($conn, "
    SELECT b.*, u.nama 
    FROM bookings b
    JOIN users u ON b.user_id = u.id
    ORDER BY b.id DESC
");
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

/* TOPBAR (SAMA SEPERTI USER) */
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
    max-width: 1100px;
    margin: 30px auto;
}

/* TABLE */
table {
    width: 100%;
    background: white;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

/* BUTTON */
button {
    padding: 6px 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.btn.ok {
    background: #14b8a6;
    color: white;
}
.btn.no {
    background: red;
    color: white;
}
</style>
</head>

<body>

<!-- TOPBAR -->
<div class="topbar">
    <div class="topbar-container">

        <div class="brand">
            <h2>jasain.co</h2>
            <p>Dashboard Admin</p>
        </div>

        <div class="nav-links">
            <a href="dashboard_admin.php">Beranda</a>
            <a href="kelola_user.php">User</a>
            <a href="kelola_penyedia.php">Penyedia</a>
            <a href="kelola_jasa.php">Jasa</a>
            <a href="kelola_booking.php">Booking</a>
            <a href="logout.php">Logout</a>
        </div>

    </div>
</div>

<div class="container">

<h2>Kelola Booking</h2>

<table>
<tr>
<th>User</th>
<th>Tanggal</th>
<th>Jam</th>
<th>Status</th>
<th>Aksi</th>
</tr>

<?php while($row=mysqli_fetch_assoc($data)): ?>
<tr>
<td><?= $row['nama']; ?></td>
<td><?= $row['booking_date']; ?></td>
<td><?= date("H:i",strtotime($row['booking_time'])); ?></td>
<td><?= $row['status']; ?></td>
<td>
    <form method="POST" style="display:inline;">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="hidden" name="aksi" value="approve">

        <button type="submit" name="update_status" class="btn ok">
            Approve
        </button>
    </form>

    <form method="POST" style="display:inline;">
        <input type="hidden" name="id" value="<?= $row['id']; ?>">
        <input type="hidden" name="aksi" value="reject">

        <button type="submit" name="update_status" class="btn no">
            Reject
        </button>
    </form>
</td>
</tr>
<?php endwhile; ?>

</table>

</div>

</body>
</html>