<?php
include '../koneksi.php';
include '../authAdmin.php';
include '../auth.php';

if (isset($_POST['search'])) {
    $search_date = $_POST['search_date'];

    $sql = mysqli_query($koneksi, "SELECT * FROM riwayat WHERE tgl_pesan = '$search_date'");
} else {
    $sql = mysqli_query($koneksi, 'SELECT * FROM riwayat');
}

if (isset($_POST['reset'])) {
    $reset = $_POST['reset'];

    $sql = mysqli_query($koneksi, "SELECT * FROM riwayat");
}


$count = mysqli_num_rows($sql);
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
    <h1>RIWAYAT TRANSAKSI</h1>

    <form action="" method="post">
        <label for="search_date">Search</label>
        <input type="date" name="search_date" id="search_date">
        <input type="submit" name="search" value="Submit">
        <input type="submit" name="reset" value="Reset">
    </form>
    <?php if ($count == 0) { ?>
        <h1>BELUM ADA RIWAYAT</h1>
        <a href="admin.php">Back?</a>
    <?php } else { ?>
        <table border="1">
            <thead>
                <?php while ($result = mysqli_fetch_assoc($sql)) { ?>
                    <tr>
                        <th colspan="14"><?php echo $result['lapangan'] ?></th>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Id_User</th>
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
                    <td><?php echo $result['id_user'] ?></td>
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
            } ?>
            </tbody>
        </table>
        <a href="admin.php">Back</a>
</body>

</html>