<?php
include '../koneksi.php';
session_start();

$username = $_SESSION['username'];
$sql = mysqli_query($koneksi, "SELECT * FROM sewa_confirm");
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo-icon.jpg">
    <link rel="stylesheet" href="../css/booking_confirm.css">
    <title>Confirm Your Booking</title>
</head>

<body>
    <nav>
        <div class="logo">
            <img width="60" src="../img/logo.png">
            <a href="#">Logo</a>
        </div>

        <div class="extra-nav">
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <a href="../logout.php" onclick="confirm('Apakah anda yakin ingin logout?')">Logout</a>
            <?php } ?>
        </div>
    </nav>
    <main>
        <div class="content">
            <div class="container">
                <h1>HALO <?= $username ?></h1>
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
                            <!-- <th>Reguler</th>
                    <th>Matras</th>
                    <th>Rumput</th> -->
                            <th>Kostum</th>
                            <th>Sepatu</th>
                            <th>Total</th>
                            <th>Bayar</th>
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
                                <td><?php echo $result['kostum'] ?></td>
                                <td><?php echo $result['sepatu'] ?></td>
                                <td><?php echo $result['total'] ?></td>
                                <td><?php echo $result['bayar'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="row">
                    <p>Apakah anda sudah yakin dengan pesanan anda?</p>
                    <div class="action">
                        <input type="submit" name="Batal" value="Batal">
                        <input type="submit" name="confirm" value="Confirm">
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>

</html>