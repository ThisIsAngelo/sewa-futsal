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
    <title>UserBook</title>
    <script src="https://kit.fontawesome.com/88d08e83f5.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <div class="logo">
            <img width="60" src="../img/logo.png">
            <a href="#">Futsalaxy</a>
        </div>

        <div class="extra-nav">
            <h4><?= $username ?></h4>
            <a href="../logout.php" title="Logout" onclick="return confirm('Apakah anda yakin ingin logout?')"><i class="fa-solid fa-right-from-bracket"></i></a>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="side-bar">
                


            </div>
            <div class="main">

                <?php if (mysqli_num_rows($sql) == 0) { ?>
                    <h1>Kamu belum booking apapun</h1>
                <?php } else { ?>

                    <table border="1">
                        <thead>
                            <?php while ($result = mysqli_fetch_assoc($sql)) { ?>
                                <tr>
                                    <th colspan="14"><?php echo $result['lapangan'] ?></th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Tanggal</th>
                                    <th>Jam</th>
                                    <th>Durasi</th>
                                    <th>Jumlah_Pemain</th>
                                    <th>Jenis_Lapangan</th>
                                    <th>Kostum</th>
                                    <th>Sepatu</th>
                                    <th>Total</th>
                                    <th>Bayar</th>
                                    <th>Kembali</th>
                                </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo ++$no ?></td>
                                <td><?php echo $result['nama_pemesan'] ?></td>
                                <td><?php echo $result['no_telepon'] ?></td>
                                <td><?php echo $result['tgl_pesan'] ?></td>
                                <td><?php echo $result['jam'] ?></td>
                                <td><?php echo $result['durasi_sewa'] ?></td>
                                <td><?php echo $result['jumlah_pemain'] ?></td>
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
                    <?php if (mysqli_num_rows($sql) == 0) {  ?>
                        <a href="../user.php">Back</a>
                        <a href="booking.php">Booking Sekarang!</a>
                    <?php } else { ?>
                        <a href="../user.php">Back</a>
                        <a href="booking.php">Booking lagi?</a>
                    <?php } ?>
            </div>
        </section>
    </main>
</body>

</html>