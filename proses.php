<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $sql = mysqli_query($koneksi, "SELECT * FROM account WHERE username = '$username' AND password = '$password'");
    $count = mysqli_num_rows($sql);
    $data = mysqli_fetch_array($sql);

    if ($count > 0) {
        $role = $data['role'];
        $id = $data['id'];

        if ($role == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('location:admin/admin.php');
            exit();
        } else if ($role == 0) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header('location:user.php');
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

    $check = mysqli_query($koneksi, "SELECT username FROM account");
    $data = mysqli_fetch_assoc($check);
    $checkUsername = $data['username'];

    if ($checkUsername == $username) {
        echo "<script>alert('Username Telah di pakai'); window.location.replace('register.html')</script>";
    } else {
        $sql = mysqli_query($koneksi, "INSERT INTO account (username,password) VALUES ('$username','$password')");

        if ($sql) {
            echo "<script>alert('Akun berhasil ditambahkan!'); window.location.replace('login.html');</script>";
        } else {
            echo "<script>alert('Gagal')</script>";
        }
    }
}

if (isset($_POST['booking'])) {
    $id_user = $_SESSION['id'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $no_telepon = $_POST['no_telepon'];
    $tgl_pesan = $_POST['tgl_pesan'];


    $jam = $_POST['jam'];
    $durasi_sewa = $_POST['durasi_sewa'];
    // $durasi_detik = $durasi_sewa * 3600;
    // $durasi_sewa_waktu = strtotime("+$durasi_detik seconds", strtotime($jam));
    // $jam_sewa_berakhir = date('H:i', $durasi_sewa_waktu);
    // echo "Jam Mulai: $jam <br>";
    // echo "Jam Berakhir: $jam_sewa_berakhir";
    // die();
    $jumlah_pemain = $_POST['jumlah_pemain'];
    $lapangan = $_POST['lapangan'];
    $jenis_lapangan = $_POST['jenis_lapangan'];
    $kostum = $_POST['kostum'];
    $sepatu = $_POST['sepatu'];
    $total = $_POST['total'];
    $bayar = $_POST['bayar'];
    $kembali = $_POST['kembali'];

    if ($lapangan == 'INDOOR') {
        $sql_status = mysqli_query($koneksi, "SELECT status FROM status_lapangan_indoor WHERE jenis_lapangan = '$jenis_lapangan'");
        $data_status = mysqli_fetch_assoc($sql_status);
        $status = $data_status['status'];
        if ($status == 1) {
            if ($bayar < $total) {
                echo "<script>alert('Uang tidak cukup'); window.location.replace('booking/booking.php');</script>";
            } else {
                $sql = mysqli_query($koneksi, "INSERT INTO sewa_confirm (id_user,nama_pemesan, no_telepon, tgl_pesan, jam, durasi_sewa, jumlah_pemain, lapangan, jenis_lapangan, kostum, sepatu, total, bayar, kembali) VALUES ('$id_user','$nama_pemesan', '$no_telepon', '$tgl_pesan', '$jam', '$durasi_sewa', '$jumlah_pemain', '$lapangan', '$jenis_lapangan' , '$kostum', '$sepatu', '$total', '$bayar', '$kembali')");
                echo "<script>alert('Harap Konfirmasi Telebih Dahulu!'); window.location.replace('booking/booking_confirm.php');</script>";
            }
        } else {
            echo "<script>alert('Maaf lapangan $jenis_lapangan pada $lapangan sedang tidak tersedia'); window.location.replace('booking/booking.php')</script>";
        }
    } else if ($lapangan == 'OUTDOOR') {
        $sql_status = mysqli_query($koneksi, "SELECT status FROM status_lapangan_outdoor WHERE jenis_lapangan = '$jenis_lapangan'");
        $data_status = mysqli_fetch_assoc($sql_status);
        $status = $data_status['status'];
        if ($status == 1) {
            if ($bayar < $total) {
                echo "<script>alert('Uang tidak cukup'); window.location.replace('booking/booking.php');</script>";
            } else {
                $sql = mysqli_query($koneksi, "INSERT INTO sewa_confirm (id_user,nama_pemesan, no_telepon, tgl_pesan, jam, durasi_sewa, jumlah_pemain, lapangan, jenis_lapangan, kostum, sepatu, total, bayar, kembali) VALUES ('$id_user','$nama_pemesan', '$no_telepon', '$tgl_pesan', '$jam', '$durasi_sewa', '$jumlah_pemain', '$lapangan', '$jenis_lapangan' , '$kostum', '$sepatu', '$total', '$bayar', '$kembali')");
                echo "<script>alert('Harap Konfirmasi Telebih Dahulu!'); window.location.replace('booking/booking_confirm.php');</script>";
            }
        } else {
            echo "<script>alert('Maaf lapangan $jenis_lapangan pada $lapangan sedang tidak tersedia'); window.location.replace('booking/booking.php')</script>";
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
            header('location:user/user_profile.php');
        } else if ($lapangan == 'OUTDOOR') {
            $sewa_user = mysqli_query($koneksi, "SELECT * FROM sewa_user ORDER BY id DESC LIMIT 1");
            $row = mysqli_fetch_assoc($sewa_user);
            $jenis_lapangan = $row['jenis_lapangan'];
            $update_status = mysqli_query($koneksi, "UPDATE status_lapangan_outdoor SET status = '0' WHERE jenis_lapangan = '$jenis_lapangan'");
            header('location:user/user_profile.php');
        }
    }
}



if (isset($_POST['admin_edit'])) {
    $id = $_POST['id'];
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

    $sql = mysqli_query($koneksi, "UPDATE sewa_user SET nama_pemesan = '$nama_pemesan',tgl_pesan = '$tgl_pesan', jam='$jam',durasi_sewa='$durasi_sewa',jumlah_pemain='$jumlah_pemain',lapangan='$lapangan',jenis_lapangan='$jenis_lapangan',kostum='$kostum',sepatu='$sepatu',total='$total',bayar='$bayar',kembali='$kembali' WHERE id = '$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil di UPDATE!'); window.location.replace('admin/booking_now.php')</script>";
    }
}

if (isset($_GET['admin_confirm'])) {
    $id = $_GET['admin_confirm'];

    $cek = mysqli_query($koneksi, "SELECT lapangan,jenis_lapangan FROM sewa_user WHERE id = '$id'");
    $dataCek = mysqli_fetch_assoc($cek);
    $lapangan = $dataCek['lapangan'];
    $jenis_lapangan = $dataCek['jenis_lapangan'];
    if ($lapangan == 'INDOOR') {
        $sqlUpdateStatus = mysqli_query($koneksi, "UPDATE status_lapangan_indoor SET status ='1' WHERE jenis_lapangan = '$jenis_lapangan'");
    } else if ($lapangan == 'OUTDOOR') {
        $sqlUpdateStatus = mysqli_query($koneksi, "UPDATE status_lapangan_outdoor SET status ='1' WHERE jenis_lapangan = '$jenis_lapangan'");
    }

    $sqlRiwayat = mysqli_query($koneksi, "INSERT INTO riwayat (id_user,nama_pemesan,no_telepon,tgl_pesan,jam,durasi_sewa,jumlah_pemain,lapangan,jenis_lapangan,kostum,sepatu,total,bayar,kembali) SELECT id_user,nama_pemesan,no_telepon,tgl_pesan,jam,durasi_sewa,jumlah_pemain,lapangan,jenis_lapangan,kostum,sepatu,total,bayar,kembali FROM sewa_user WHERE id = '$id'");
    if ($sqlRiwayat) {
        $sqlDelete = mysqli_query($koneksi, "DELETE FROM sewa_user WHERE id = '$id'");
        echo "<script>alert('Pesanan telah di konfirmasi!'); window.location.replace('admin/booking_now.php')</script>";
    }
}

if (isset($_GET['admin_delete'])) {
    $id = $_GET['admin_delete'];
    $sql = mysqli_query($koneksi, "DELETE FROM sewa_user WHERE id = '$id'");

    if ($sql) {
        echo "<script>alert('Data berhasil di batalkan'); window.location.replace('admin/booking_now.php')</script>";
    }
}
