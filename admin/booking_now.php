<?php
session_start();
include '../koneksi.php';

$sql = mysqli_query($koneksi, 'SELECT * FROM sewa_user');
$no = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/88d08e83f5.js" crossorigin="anonymous"></script>

    <title>Booking Now</title>
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
                    <th>Aksi</th>
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
                <td>
                    <a href="booking_edit.php?edit=<?php echo $result['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="../proses.php"><i class="fa-solid fa-check"></i></a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</body>

</html>