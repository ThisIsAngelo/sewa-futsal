<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($koneksi, "SELECT id,username,password,role FROM account WHERE username = '$username' AND password = '$password'");
    $count = mysqli_num_rows($sql);
    $data = mysqli_fetch_array($sql);

    if ($count > 0) {
        $role = $data['role'];
        $id = $data['id'];

        if ($role == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('location:admin.php');
            exit();
        } else if ($role == 0) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('location:index.php ?>');
            exit();
        }
    } else {
        echo "<script>alert('Login Gagal!'); window.location.replace('login.php');</script>";
        exit();
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = (md5($_POST['password']));
    $sql = mysqli_query($koneksi, "INSERT INTO account (username,password) VALUES ('$username','$password')");

    if ($sql) {
        echo "<script>alert('Akun berhasil ditambahkan!'); window.location.replace('login.php');</script>";
    } else {
        echo "<script>alert('Gagal')</script>";
    }
}

if (isset($_POST['booking'])) {
    $nama_pemesan = $_POST['nama_pemesan'];
    $no_telepon = $_POST['no_telepon'];
    $tgl_pesan = $_POST['tgl_pesan'];
    $jam = $_POST['jam'];
    $durasi_sewa = $_POST['durasi_sewa'];
    $jumlah_pemain = $_POST['jumlah_pemain'];
    $lapangan = $_POST['lapangan'];
    $kostum = $_POST['kostum'];
    $sepatu = $_POST['sepatu'];
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];

    $sql = mysqli_query($koneksi, "INSERT INTO sewa_confirm (nama_pemesan,no_telepon,tgl_pesan,jam,durasi_sewa,jumlah_pemain,lapangan,kostum,sepatu,total,bayar) VALUES('$nama_pemesan','$no_telepon','$tgl_pesan','$jam','$durasi_sewa','$jumlah_pemain','$lapangan','$kostum','$sepatu','$total','$bayar')");

    if($sql) {
        echo "<script>alert('Harap Konfirmasi Telebih Dahulu!'); window.location.replace('booking_confirm.php');</script>";
    }
}

// if($sql) {
// if($lapangan == 'indoor') {
//     $_SESSION['reguler_indoor'] = $reguler_indoor;
//     $_SESSION['matras_indoor'] = $matras_indoor;
//     $_SESSION['rumput_indoor'] = $rumput_indoor;
//     header('booking_confirm.php');
// } else if ($lapangan == 'outdoor') {
//     $_SESSION['reguler_outdoor'] = $reguler_outdoor;
//     $_SESSION['matras_outdoor'] = $matras_outdoor;
//     $_SESSION['rumput_outdoor'] = $rumput_outdoor;
//     header('booking_confirm.php');
// }
// }