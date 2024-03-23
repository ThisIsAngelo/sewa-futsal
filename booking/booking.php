<?php
session_start();
$username = $_SESSION['username'];

// $reguler_indoor = $_SESSION['reguler_indoor'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking.css">
    <title>Document</title>
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
        <section class="booking">
            <div class="content">
                <form action="../proses.php" method="post">
                    <h1>BOOKING</h1>
                    <div class="row-1">
                        <input type="text" name="nama_pemesan" placeholder="Nama Pemesan" required>
                        <input type="text" name="no_telepon" placeholder="No. Telepon" required>
                    </div>
                    <div class="row-2">
                        <div class="col-1">
                            <label for="tgl">Tanggal-Pesan</label>
                            <input type="date" id="tgl" name="tgl_pesan" required>
                        </div>
                        <div class="col-2">
                            <label for="jam">Jam</label>
                            <input type="time" id="jam" name="jam" required>
                        </div>
                        <div class="col-3">
                            <label for="durasi">Durasi Sewa</label>
                            <input type="number" id="durasi" name="durasi_sewa" placeholder="Hitungan Jam" required>
                        </div>
                    </div>
                    <div class="row-3">
                        <div class="col-1">
                            <label for="jumlah_pemain">Jumlah Pemain</label>
                            <select name="jumlah_pemain" id="jumlah_pemain">
                                <option value="10">10 Orang</option>
                                <option value="20">20 Orang</option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label for="lapangan">Lapangan</label>
                            <select name="lapangan" id="lapangan">
                                <option value="indoor">INDOOR</option>
                                <option value="outdoor">OUTDOOR</option>
                            </select>
                        </div>
                    </div>
                    <div class="row-4">
                        <div class="col-1">
                            <label for="kostum">Kostum <br>(Optional)</label>
                            <input type="number" name="kostum" placeholder="Jumlah Orang">
                        </div>
                        <div class="col-2">
                            <label for="sepatu">Sepatu <br>(Optional)</label>
                            <input type="number" name="sepatu" placeholder="Jumlah Orang">
                        </div>
                    </div>
                    <div class="row-5">
                        <div class="col-1">
                            <label for="harga">Harga Bayar</label>
                            <input type="number" id="harga" name="total" disabled>
                        </div>
                        <div class="col-2">
                            <label for="bayar">Bayar</label>
                            <input type="number" id="bayar" name="bayar" required>
                        </div>
                    </div>
                    <div class="row-6">
                        <a href="../index.php">Back</a>
                        <input type="submit" value="Booking Now" name="booking">
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!-- <table>
    <tbody>
        <?php if ($lapangan == 'indoor') { ?>
        <tr>
            <td><?= $reguler_indoor ?></td>
            <td></td>
            <td></td>
        </tr>
        <?php } ?>
    </tbody>
</table> -->
    <script>

    </script>
</body>

</html>