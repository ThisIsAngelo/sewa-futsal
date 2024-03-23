<?php
session_start();
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking.css">
    <link rel="icon" href="../img/logo-icon.jpeg">
    <title>Booking</title>
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
                            <input type="number" id="durasi_sewa" name="durasi_sewa" placeholder="Hitungan Jam" required>
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
                                <option value="INDOOR">INDOOR</option>
                                <option value="OUTDOOR">OUTDOOR</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <label for="jenis_lapangan">Jenis_lapangan</label>
                            <select name="jenis_lapangan" id="jenis_lapangan">
                                <option value="Reguler">Reguler</option>
                                <option value="Matras">Matras</option>
                                <option value="Rumput">Rumput</option>
                            </select>
                        </div>
                    </div>
                    <div class="row-4">
                        <div class="col-1">
                            <label for="kostum">Kostum <br>(Optional)</label>
                            <input type="number" id="kostum" name="kostum" placeholder="Jumlah Orang">
                        </div>
                        <div class="col-2">
                            <label for="sepatu">Sepatu <br>(Optional)</label>
                            <input type="number" id="sepatu" name="sepatu" placeholder="Jumlah Orang">
                        </div>
                    </div>
                    <div class="row-5">
                        <div class="col-1">
                            <label for="total">Harga Bayar</label>
                            <input type="number" id="total" name="total" readonly>
                        </div>
                        <div class="col-2">
                            <label for="bayar">Bayar</label>
                            <input type="number" id="bayar" name="bayar" required>
                        </div>
                    </div>
                    <div class="row-6">
                        <div class="group-1">
                            <label for="kembali">Kembali</label>
                            <input type="number" id="kembali" name="kembali" readonly>
                        </div>
                        <div class="group-2">
                            <a href="../index.php">Back</a>
                            <input type="submit" value="Booking Now" name="booking">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        document.getElementById('durasi_sewa').addEventListener('change', updateHarga);
        document.getElementById('jumlah_pemain').addEventListener('change', updateHarga);
        document.getElementById('lapangan').addEventListener('change', updateHarga);
        document.getElementById('jenis_lapangan').addEventListener('change', updateHarga);
        document.getElementById('bayar').addEventListener('change', updateHarga);
        document.getElementById('kostum').addEventListener('change', updateHarga);
        document.getElementById('sepatu').addEventListener('change', updateHarga);

        function updateHarga() {
            const durasi = document.getElementById('durasi_sewa').value;
            const jumlahPemain = document.getElementById('jumlah_pemain').value;
            const lapangan = document.getElementById('lapangan').value;
            const jenisLapangan = document.getElementById('jenis_lapangan').value;
            const bayar = document.getElementById('bayar').value;
            const kostum = document.getElementById('kostum').value;
            const sepatu = document.getElementById('sepatu').value;

            const regulerIndoor = 300000;
            const matrasIndoor = 250000;
            const rumputIndoor = 200000;
            const regulerOutdoor = 250000;
            const matrasOutdoor = 200000;
            const rumputOutdoor = 150000;
            const kostumPerJam = 50000;
            const sepatuPerJam = 45000;
            let totalHarga = 0

            if (jumlahPemain == 10) {
                if (lapangan == 'INDOOR') {
                    if (jenisLapangan == 'Reguler') {
                        totalHarga = regulerIndoor * durasi + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Matras') {
                        totalHarga = matrasIndoor * durasi + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Rumput') {
                        totalHarga = rumputIndoor * durasi + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    }
                } else if (lapangan == 'OUTDOOR') {
                    if (jenisLapangan == 'Reguler') {
                        totalHarga = regulerOutdoor * durasi + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Matras') {
                        totalHarga = matrasOutdoor * durasi + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Rumput') {
                        totalHarga = rumputOutdoor * durasi + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    }
                }
            } else if (jumlahPemain == 20) {
                if (lapangan == 'INDOOR') {
                    if (jenisLapangan == 'Reguler') {
                        totalHarga = regulerIndoor * durasi * 2 + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Matras') {
                        totalHarga = matrasIndoor * durasi * 2 + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Rumput') {
                        totalHarga = rumputIndoor * durasi * 2 + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    }
                } else if (lapangan == 'OUTDOOR') {
                    if (jenisLapangan == 'Reguler') {
                        totalHarga = regulerOutdoor * durasi * 2 + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Matras') {
                        totalHarga = matrasOutdoor * durasi * 2 + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    } else if (jenisLapangan == 'Rumput') {
                        totalHarga = rumputOutdoor * durasi * 2 + (kostum * kostumPerJam) + (sepatu * sepatuPerJam);
                    }
                }
            }

            document.getElementById('total').value = totalHarga;
            if (bayar) {
                document.getElementById('kembali').value = bayar - totalHarga;
            }
        }
    </script>
</body>

</html>