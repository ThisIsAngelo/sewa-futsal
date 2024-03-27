<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['username'])) {
    header('location:../login.html');
    exit();
}

if (isset($_POST['search'])) {
    $search_date = $_POST['search_date'];
    $sql = mysqli_query($koneksi, "SELECT * FROM sewa_user WHERE tgl_pesan = '$search_date'");
} else {
    $sql = mysqli_query($koneksi, 'SELECT * FROM sewa_user');
}

if (isset($_POST['reset'])) {
    $sql = mysqli_query($koneksi, 'SELECT * FROM sewa_user');
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
    <h1>BOOKING SAAT INI</h1>

    <form action="" method="post">
        <label for="search_date">Search Date</label>
        <input type="date" name="search_date" id="search_date">
        <input type="submit" name="search" value="Search">
        <input type="submit" name="delete" value="Reset">
    </form>
    <?php if ($count == 0) { ?>
        <h1>BELUM ADA YANG BOOKING</h1>
        <a href="admin.php">Back?</a>
    <?php } else { ?>
        <table border="1">
            <thead>
                <?php while ($result = mysqli_fetch_assoc($sql)) { ?>
                    <tr>
                        <th colspan="15"><?php echo $result['lapangan'] ?></th>
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
                        <th>Aksi</th>
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
                    <td>
                        <a title="Edit" href="booking_edit.php?edit=<?php echo $result['id']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a title="Confirm" onclick="return confirm('Apakah anda ingin mengkonfirmasi pesanan ini?')" href="../proses.php?admin_confirm=<?php echo $result['id']; ?>"><i class="fa-solid fa-check"></i></a>
                        <a title="Delete" onclick="return confirm('Apakah anda ingin membatalkan pesanan ini?')" href="../proses.php?admin_delete=<?php echo $result['id']; ?>"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
        <?php }
            } ?>
            </tbody>
        </table>
</body>

</html>