<?php
include '../koneksi.php';
include '../auth.php';
$id_user = $_SESSION['id'];
$username = $_SESSION['username'];

$no = 0;
$sql = mysqli_query($koneksi, "SELECT * FROM sewa_user WHERE id_user = '$id_user'");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/user_profile.css">
    <link rel="icon" href="../img/logo-icon.jpeg" />
    <title>User Book</title>
    <script src="https://kit.fontawesome.com/88d08e83f5.js" crossorigin="anonymous"></script>
</head>

<body>
    <section class="hero">
        <aside class="side-bar">
            <div class="row-1">
                <h1>FUTSALAXY</h1>
            </div>
            <div class="row-2">
                <div id="selected" class="square-1">
                    <a href="user_profile.php"><i class="fa-solid fa-cart-shopping"></i> Book (1)</a>
                </div>
                <div class="square-2">
                    <a href="user_history.php"><i class="fa-solid fa-clock"></i> History (2)</a>
                </div>
            </div>
        </aside>
        <div class="main">
            <div class="row-1">
                <div class="square-1">
                    <i class="fa-solid fa-bag-shopping"></i>
                    <div class="desc">
                        <h6 href="user_history.php">Total Book</h6>
                        <p>(71) Booking</p>
                    </div>
                </div>
                <div class="square-2">
                    <i class="fa-regular fa-futbol"></i></i>
                    <div class="desc">
                        <h6 href="user_history.php">Reguler</h6>
                        <p>(36) Booking</p>
                    </div>
                </div>
                <div class="square-3">
                    <i class="fa-regular fa-futbol"></i></i>
                    <div class="desc">
                        <h6 href="user_history.php">Matras</h6>
                        <p>(14) Booking</p>
                    </div>
                </div>
                <div class="square-4">
                    <i class="fa-regular fa-futbol"></i></i>
                    <div class="desc">
                        <h6 href="user_history.php">Rumput</h6>
                        <p>(21) Booking</p>
                    </div>
                </div>
            </div>
            <div class="row-2">
                <h1>Hello <?= $username ?></h1>
            </div>
            <div class="row-3">
                <?php if (mysqli_num_rows($sql) == 0) {  ?>
                    <a href="../user.php">Back</a>
                    <a href="../booking/booking.php">Booking Sekarang!</a>
                <?php } else { ?>
                    <a href="../user.php">Back</a>
                    <a href="../booking/booking.php">Booking lagi?</a>
                <?php } ?>
            </div>
            <div class="row-4">
                <?php if (mysqli_num_rows($sql) == 0) { ?>
                    <h1>Kamu belum booking apapun</h1>
                <?php } else { ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                        <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Tanggal</th>
                                        <th>Jam</th>
                                        <th>Durasi</th>
                                        <th>Jumlah_Pemain</th>
                                        <th>Lapangan</th>
                                        <th>Jenis_Lapangan</th>
                                        <th>Kostum</th>
                                        <th>Sepatu</th>
                                        <th>Total</th>
                                        <th>Bayar</th>
                                        <th>Kembali</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <tr>
                                    <td><?php echo ++$no ?></td>
                                    <td><?php echo $result['nama_pemesan'] ?></td>
                                    <td><?php echo $result['no_telepon'] ?></td>
                                    <td><?php echo $result['tgl_pesan'] ?></td>
                                    <td><?php echo $result['jam'] ?></td>
                                    <td><?php echo $result['durasi_sewa'] ?></td>
                                    <td><?php echo $result['jumlah_pemain'] ?></td>
                                    <td><?php echo $result['lapangan'] ?></td>
                                    <td><?php echo $result['jenis_lapangan'] ?></td>
                                    <td><?php echo $result['kostum'] ?></td>
                                    <td><?php echo $result['sepatu'] ?></td>
                                    <td><?php echo $result['total'] ?></td>
                                    <td><?php echo $result['bayar'] ?></td>
                                    <td><?php echo $result['kembali'] ?></td>
                                </tr>
                        <?php }
                            }
                        ?>
                            </tbody>
                        </table>
            </div>
        </div>
    </section>
</body>

</html>