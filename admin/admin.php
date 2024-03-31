<?php
include '../auth.php';
include '../authAdmin.php';
include '../koneksi.php';
$username = $_SESSION['username'];
$role = $_SESSION['role'];

$no = 0;
$sql = mysqli_query($koneksi, "SELECT * FROM account");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-icon.jpeg">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/88d08e83f5.js" crossorigin="anonymous"></script>

    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="box-1">
            <a href="booking_now.php">BOOKING SAAT INI <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <div class="box-2">
            <a href="booking_riwayat.php">BOOKING HISTORY <i class="fa-solid fa-arrow-right"></i></a>
        </div>
        <a href="../logout.php">Logout</a>
    </div>
</body>

</html>