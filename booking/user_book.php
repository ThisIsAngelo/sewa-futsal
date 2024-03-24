<?php
include '../koneksi.php';
session_start();
$id_user = $_SESSION['id'];

if (!isset($_SESSION['username'])) {
    header('location:../login.html');
    exit();
}
$no = 0;

$sql = mysqli_query($koneksi, "SELECT * FROM sewa_user WHERE id_user = '$id_user'");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserBook</title>
</head>

<body>
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
        <?php } ?>
        </tbody>
    </table>
    <a href="../user.php">Back</a>
    <a href="booking.php">Booking lagi?</a>
</body>

</html>