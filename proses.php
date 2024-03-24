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
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('location:user.php ?>');
            exit();
        }
    } else {
        echo "<script>alert('Login Gagal!'); window.location.replace('login.html');</script>";
        exit();
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = (md5($_POST['password']));
    $sql = mysqli_query($koneksi, "INSERT INTO account (username,password) VALUES ('$username','$password')");

    if ($sql) {
        echo "<script>alert('Akun berhasil ditambahkan!'); window.location.replace('login.html');</script>";
    } else {
        echo "<script>alert('Gagal')</script>";
    }
}

if (isset($_POST['booking'])) {
    $id_user = $_SESSION['id'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $no_telepon = $_POST['no_telepon'];
    $tgl_pesan = $_POST['tgl_pesan'];
    $jam = $_POST['jam'];
    $durasi_sewa = $_POST['durasi_sewa'];
    $jumlah_pemain = $_POST['jumlah_pemain'];
    $lapangan = $_POST['lapangan'];
    $jenis_lapangan = $_POST['jenis_lapangan'];
    $kostum = $_POST['kostum'];
    $sepatu = $_POST['sepatu'];
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $kembali = $_POST['kembali'];

    $sql = mysqli_query($koneksi, "INSERT INTO sewa_confirm (id_user,nama_pemesan, no_telepon, tgl_pesan, jam, durasi_sewa, jumlah_pemain, lapangan, jenis_lapangan, kostum, sepatu, total, bayar, kembali) VALUES ('$id_user','$nama_pemesan', '$no_telepon', '$tgl_pesan', '$jam', '$durasi_sewa', '$jumlah_pemain', '$lapangan', '$jenis_lapangan' , '$kostum', '$sepatu', '$total', '$bayar', '$kembali')");
    if ($bayar < $total) {
        echo "<script>alert('Uang tidak cukup'); window.location.replace('booking/booking.php');</script>";
    } else {
        if ($sql) {
            echo "<script>alert('Harap Konfirmasi Telebih Dahulu!'); window.location.replace('booking/booking_confirm.php');</script>";
        }
    }
}

if (isset($_POST['cancel'])) {
    $sql = mysqli_query($koneksi, "DELETE FROM sewa_confirm");

    if ($sql) {
        echo "<script>alert('Booking telah di cancel'); window.location.replace('booking/booking.php')</script>";
    }
}

if (isset($_POST['confirm'])) {
    $id_user = $_SESSION['id'];
    $sql = mysqli_query($koneksi, "INSERT INTO sewa_user (id_user,nama_pemesan, no_telepon, tgl_pesan, jam, durasi_sewa, jumlah_pemain, lapangan, jenis_lapangan, kostum, sepatu, total, bayar, kembali) SELECT '$id_user',nama_pemesan, no_telepon, tgl_pesan, jam, durasi_sewa, jumlah_pemain, lapangan, jenis_lapangan, kostum, sepatu, total, bayar, kembali FROM sewa_confirm");
    
    if ($sql) {
        $sqlDelete = mysqli_query($koneksi, "DELETE FROM sewa_confirm");
        $sewa_user = mysqli_query($koneksi, "SELECT * FROM sewa_user ORDER BY id DESC LIMIT 1");
        $row = mysqli_fetch_assoc($sewa_user);
        $lapangan = $row['lapangan'];
        if ($lapangan == 'INDOOR') {
            $sewa_user = mysqli_query($koneksi, "SELECT * FROM sewa_user ORDER BY id DESC LIMIT 1");
            $row = mysqli_fetch_assoc($sewa_user);
            $jenis_lapangan = $row['jenis_lapangan'];
            $update_status = mysqli_query($koneksi, "UPDATE status_lapangan_indoor SET status = '0' WHERE jenis_lapangan = '$jenis_lapangan'");
            header('location:booking/user_book.php');
        } else if ($lapangan == 'OUTDOOR') {
            $sewa_user = mysqli_query($koneksi, "SELECT * FROM sewa_user ORDER BY id DESC LIMIT 1");
            $row = mysqli_fetch_assoc($sewa_user);
            $jenis_lapangan = $row['jenis_lapangan'];
            $update_status = mysqli_query($koneksi, "UPDATE status_lapangan_outdoor SET status = '0' WHERE jenis_lapangan = '$jenis_lapangan'");
            header('location:booking/user_book.php');
        }
    }
}

// code untuk saat kita ingin menampilkan data di halaman selanjutnya berdasarkan option yang kita select dari combo box
 // if (isset($_POST['lapangan'])) {
    //     if ($_POST['lapangan'] == "INDOOR") {
    //         $nama_pemesan = $_POST['nama_pemesan'];
    //         $no_telepon = $_POST['no_telepon'];
    //         $tgl_pesan = $_POST['tgl_pesan'];
    //         $jam = $_POST['jam'];
    //         $durasi_sewa = $_POST['durasi_sewa'];
    //         $jumlah_pemain = $_POST['jumlah_pemain'];
    //         $lapangan = $_POST['lapangan'];
    //         $kostum = $_POST['kostum'];
    //         $sepatu = $_POST['sepatu'];
    //         $total = $_POST['total'];
    //         $bayar = $_POST['bayar'];

    //         $sql = mysqli_query($koneksi, "INSERT INTO sewa_confirm (nama_pemesan, no_telepon, tgl_pesan, jam, durasi_sewa, jumlah_pemain, lapangan, reguler, matras, rumput, kostum, sepatu, total, bayar)
    //         SELECT '$nama_pemesan', '$no_telepon', '$tgl_pesan', '$jam', '$durasi_sewa', '$jumlah_pemain', '$lapangan', reguler_indoor, matras_indoor, rumput_indoor, '$kostum', '$sepatu', '$total', '$bayar'
    //         FROM harga_sewa");
    //         if ($sql) {
    //             echo "<script>alert('Harap Konfirmasi Telebih Dahulu!'); window.location.replace('booking/booking_confirm.php');</script>";
    //         }
    //     } else if ($_POST['lapangan'] == "OUTDOOR") {
    //         $nama_pemesan = $_POST['nama_pemesan'];
    //         $no_telepon = $_POST['no_telepon'];
    //         $tgl_pesan = $_POST['tgl_pesan'];
    //         $jam = $_POST['jam'];
    //         $durasi_sewa = $_POST['durasi_sewa'];
    //         $jumlah_pemain = $_POST['jumlah_pemain'];
    //         $lapangan = $_POST['lapangan'];
    //         $kostum = $_POST['kostum'];
    //         $sepatu = $_POST['sepatu'];
    //         $total = $_POST['total'];
    //         $bayar = $_POST['bayar'];

    //         $sql = mysqli_query($koneksi, "INSERT INTO sewa_confirm (nama_pemesan, no_telepon, tgl_pesan, jam, durasi_sewa, jumlah_pemain, lapangan, reguler, matras, rumput, kostum, sepatu, total, bayar)
    //     SELECT '$nama_pemesan', '$no_telepon', '$tgl_pesan', '$jam', '$durasi_sewa', '$jumlah_pemain', '$lapangan', reguler_outdoor, matras_outdoor, rumput_outdoor, '$kostum', '$sepatu', '$total', '$bayar'
    //     FROM harga_sewa");
    //         if ($sql) {
    //             echo "<script>alert('Harap Konfirmasi Telebih Dahulu!'); window.location.replace('booking/booking_confirm.php');</script>";
    //         }
    //     }
    // }