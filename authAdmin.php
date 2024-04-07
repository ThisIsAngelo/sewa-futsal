<?php
if ($_SESSION['role'] == '0') {
    echo "<script>alert('Anda Bukan Admin!'); window.location.replace('../user.php')</script>";
    exit;
}