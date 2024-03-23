<?php
include '../koneksi.php';
session_start();

$sql = mysqli_query($koneksi, "SELECT * FROM sewa_confirm");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Your Booking</title>
</head>

<body>
    <div class="container">
        <table border="1">
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
                        <td>1</td>
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
    </div>
    <h1>*MASIH BELUM SELESAI</h1>
</body>

</html>