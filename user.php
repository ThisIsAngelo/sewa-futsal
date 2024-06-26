<?php
include 'koneksi.php';
session_start();

if(!isset($_SESSION['username'])) {
    header('location:login.php');
    exit();
}
$id = $_SESSION['id'];
$username = $_SESSION['username'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/user.css">
    <link rel="icon" href="img/logo-icon.jpeg">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/88d08e83f5.js" crossorigin="anonymous"></script>

    <title>Futsalaxy</title>
</head>

<body>
    <header>
        <div class="logo">
            <img width="60" src="img/logo.png">
            <a href="#">Futsalaxy</a>
        </div>

        <nav class="navbar">
            <a href="#hero">Home</a>
            <a href="#guide">Guide</a>
            <a href="#book">Book</a>
            <a href="#about">About</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="extra-nav">
            <a href="user/user_profile.php" title="Profile"><i class="fa-regular fa-user"></i></a>
            <a href="logout.php" title="Logout" onclick="return confirm('Apakah anda yakin ingin logout?')"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </header>

    <main>
        <section id="hero" class="hero">
            <div class="content">
                <div class="c-1">
                    <h1>WELCOME TO <span style="color: #fff; font-weight: bold;">FUTSALAXY</span> <?= $username ?>!</h1>
                    <p>Dengan sistem pembayaran yang aman dan dukungan pelanggan yang responsif, kami berkomitmen untuk memberikan pengalaman pemesanan lapangan futsal yang menyenangkan dan tanpa kerumitan. Jadikan setiap momen bermain futsal Anda lebih mudah dan menyenangkan!</p>
                    <div class="row-1">
                        <a href="booking/booking.php">Booking Now</a>
                        <a href="#guide">How To Book</a>
                    </div>
                    <div class="row-2">
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-youtube"></i>
                        <i class="fa-brands fa-x-twitter"></i>
                        <i class="fa-brands fa-facebook"></i>
                    </div>
                </div>
                <div class="c-2">
                    <img src="img/logo.png" alt="">
                </div>
            </div>
        </section>
        <section id="guide" class="guide">
            <div class="title">
                <h1>GUIDE</h1>
                <p>Panduan singkat untuk melakukan pemesanan lapangan futsal secara online.</p>
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
        <section id="book" class="book">
            <div class="title">
                <h1>BOOK</h1>
                <p>Mulai petualangan futsal Anda dengan booking lapangan sekarang!</p>
            </div>
            <div class="content">
                <div class="col-1">
                    <h1>Gain the <span>BEST <br>EXPERIENCE</span> with <br>starting your booking</h1>
                    <p class="description">Disini anda dapat memilih jenis lapangan yang diinginkan, termasuk reguler, matras, atau rumput, saat melakukan booking lapangan futsal di halaman booking kami untuk menyesuaikan dengan kebutuhan anda.</p>
                    <div class="row-1">
                        <div class="group-1">
                            <h6>110<span>x</span></h6>
                            <p>Lapangan Reguler telah dipesan</p>
                        </div>
                        <div class="group-2">
                            <h6>87<span>x</span></h6>
                            <p>Lapangan Matras telah dipesan</p>
                        </div>
                    </div>
                    <div class="row-2">
                        <div class="group-1">
                            <h6>132<span>x</span></h6>
                            <p>Lapangan Rumput telah dipesan</p>
                        </div>
                        <div class="group-2">
                            <h6>329<span>x</span></h6>
                            <p>Total Lapangan telah dipesan</p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="row-1">
                        <img src="img/lapangan/lapangan-reguler.jpg" width="50">
                        <div class="desc-1">
                            <h6>Lapangan Reguler</h6>
                            <p>110 Booking</p>
                        </div>
                        <div class="arrow">
                            <a href="booking/booking.php"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="row-2">
                        <img src="img/lapangan/lapangan-matras.jpg" width="50">
                        <div class="desc-2">
                            <h6>Lapangan Matras</h6>
                            <p>87 Booking</p>
                        </div>
                        <div class="arrow">
                            <a href="booking/booking.php"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="row-3">
                        <img src="img/lapangan/lapangan-rumput.jpg" width="50">
                        <div class="desc-3">
                            <h6>Lapangan Rumput</h6>
                            <p>132 Booking</p>
                        </div>
                        <div class="arrow">
                            <a href="booking/booking.php"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>