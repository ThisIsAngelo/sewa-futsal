<?php
if ($_SESSION['role'] != 'admin') {
    echo "<script>alert('Anda Bukan Admin!'); window.location.replace('../user.php')</script>";
    exit;
}