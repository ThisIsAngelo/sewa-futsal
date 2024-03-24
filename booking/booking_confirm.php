<?php
include '../koneksi.php';
session_start();

$username = $_SESSION['username'];
$sql = mysqli_query($koneksi, "SELECT * FROM sewa_confirm");
$no = 0;

if (!isset($_SESSION['username'])) {
    header('location:../login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/logo-icon.jpeg">
    <link rel="stylesheet" href="../css/booking_confirm.css">
    <title>Confirm Your Booking</title>
</head>

<body>
    <nav>
        <div class="logo">
            <img width="60" src="../img/logo.png">
            <a href="#">Futsalaxy</a>
        </div>

        <div class="extra-nav">
            <?php
            if (isset($_SESSION['username'])) {
            ?>
                <a href="../logout.php" onclick="return confirm('Apakah anda yakin ingin logout?')">Logout</a>
            <?php } ?>
        </div>
    </nav>
    <main>
        <div class="content">
            <div class="container">
                <h1>HALO <?= $username ?></h1>
                <table>
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
                    <?php } ?>
                    </tbody>
                </table>
                <div class="row">
                    <p>Apakah anda sudah yakin dengan pesanan anda?</p>
                    <form method="post" action="../proses.php" class="action">
                        <input type="submit" name="cancel" value="Cancel" onclick="return confirm('Apakah anda yakin ingin cancel?')">
                        <input type="submit" name="confirm" value="Confirm" onclick="return confirm('Apakah anda sudah yakin?')">
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>