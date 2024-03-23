<?php
include 'koneksi.php';
session_start();

$sql = mysqli_query($koneksi, "SELECT * FROM harga_sewa")

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    <title>Persewaan Lapangan Futsal</title>
</head>

<body>
    <header>
        <div class="logo">
            <img width="60" src="img/logo.png">
            <a href="#">Logo</a>
        </div>

        <nav class="navbar">
            <a href="">Home</a>
            <a href="">Guide</a>
            <a href="">Book</a>
            <a href="">About</a>
            <a href="">Contact</a>
        </nav>

        <div class="extra-nav">
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <a href="logout.php" class="logout" onclick="return confirm('Apakah anda yakin ingin logout?')">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
                <a href="register.php" class="register">Register</a>
            <?php } ?>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="content">
                <div class="c-1">
                    <h1>Selamat Datang Di <br>Persewaan Lapangan Futsal</h1>
                    <p>Dengan sistem pembayaran yang aman dan dukungan pelanggan yang responsif, kami berkomitmen untuk memberikan pengalaman pemesanan lapangan futsal yang menyenangkan dan tanpa kerumitan. Jadikan setiap momen bermain futsal Anda lebih mudah dan menyenangkan!</p>
                    <?php
                    if (isset($_SESSION['username'])) {
                    ?>
                        <a href="booking/booking.php">Booking Sekarang</a>
                    <?php } else { ?>
                        <a href="login.php">Booking Sekarang</a>
                    <?php } ?>
                </div>
                <div class="c-2">
                    <img src="img/logo.png" alt="">
                </div>
            </div>
        </section>
        <section class="guide">
            <div class="title">
                <h1>GUIDE</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore earum magni officiis fugiat totam sint.</p>
            </div>
            <div class="content">
                <div class="col-1">
                    <div class="col-1-title">
                        <h3><span style="color: #e82c3d;">GUIDE &</span><br>HOW TO BOOK</h3>
                    </div>
                    <div class="description">
                        <p>Di sini, kami akan membantu Anda melalui proses pemesanan lapangan futsal dengan mudah dan lancar. Dari langkah-langkah sederhana untuk memilih lapangan yang sesuai hingga konfirmasi pemesanan, kami siap memandu Anda melalui setiap langkah. </p>
                    </div>
                    <div class="shape">
                        <div class="shape-1"></div>
                        <div class="shape-2"></div>
                        <div class="shape-3"></div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="row-1">
                        <div class="title-1">
                            <h1>01</h1>
                            <h5>Login / Register</h5>
                        </div>
                        <div class="desc-1">
                            <p>Login ke dalam sistem dengan akun yang sudah ada atau mendaftar jika Anda belum memiliki akun. Ini memungkinkan Anda untuk mengakses fitur booking lapangan futsal.</p>
                        </div>
                    </div>
                    <div class="row-2">
                        <div class="title-2">
                            <h1>02</h1>
                            <h5>Pergi ke halaman booking</h5>
                        </div>
                        <div class="desc-2">
                            <p> Setelah login, silahkan pergi ke halaman booking untuk proses pemesanan lapangan futsal. Ini dapat ditemukan di menu navigasi</p>
                        </div>
                    </div>
                    <div class="row-3">
                        <div class="title-3">
                            <h1>03</h1>
                            <h5>Masukkan Data Sesuai Kebutuhan Anda</h5>
                        </div>
                        <div class="desc-3">
                            <p> isi formulir dengan informasi yang diperlukan, seperti tanggal, waktu, durasi, dan lapangan yang dibutuhkan.</p>
                        </div>
                    </div>
                    <div class="row-4">
                        <div class="title-4">
                            <h1>04</h1>
                            <h5>Konfirmasi Booking</h5>
                        </div>
                        <div class="desc-4">
                            <p>Periksa kembali informasi yang Anda masukkan dan pastikan semuanya benar. Kemudian, konfirmasikan pemesanan Anda dengan mengklik confirm</p>
                        </div>
                    </div>
                    <div class="row-5">
                        <div class="title-5">
                            <h1>05</h1>
                            <h5>Datang ke Lokasi Sesuai Tanggal</h5>
                        </div>
                        <div class="desc-5">
                            <p>Pada hari dan waktu yang telah Anda pesan, pastikan untuk datang ke lokasi lapangan futsal sesuai dengan jadwal yang telah Anda booking. Jangan lupa membawa bukti pemesanan atau konfirmasi yang diberikan oleh pihak pengelola.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>

<!-- <h1>Halo <?= $username ?></h1>
                <table border="1">
                    <thead>
                        <tr>
                            <th>LAPANGAN</th>
                            <th colspan="3">INDOOR</th>
                            <th colspan="3">OUTDOOR</th>
                        </tr>
                        <tr>
                            <th>Jenis Lapangan</th>
                            <th>Reguler</th>
                            <th>Matras</th>
                            <th>Rumput</th>
                            <th>Reguler</th>
                            <th>Matras</th>
                            <th>Rumput</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($result = mysqli_fetch_assoc($sql)) :
                        ?>
                            <tr>
                                <td>Biaya Lapangan</td>
                                <td>Rp.<?= $result['reguler_indoor'] ?></td>
                                <td>Rp.<?= $result['matras_indoor'] ?></td>
                                <td>Rp.<?= $result['rumput_indoor'] ?></td>
                                <td>Rp.<?= $result['reguler_outdoor'] ?></td>
                                <td>Rp.<?= $result['matras_outdoor'] ?></td>
                                <td>Rp.<?= $result['rumput_outdoor'] ?></td>
                            </tr>
                        <?php
                        endwhile
                        ?>
                    </tbody>
                </table> -->