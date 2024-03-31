<?php
if ($_SESSION['role'] != '1') {
    echo "<script>alert('Anda Bukan Admin!'); window.location.replace('../user.php')</script>";
    exit;
}
