<?php
include '../koneksi.php';
include '../auth.php';
$username = $_SESSION['username'];
$id_user = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking/booking.css">
    <link rel="icon" href="../img/logo-icon.jpeg">

    <!-- Icon -->
    <script src="https://kit.fontawesome.com/88d08e83f5.js" crossorigin="anonymous"></script>

    <title>Booking</title>
</head>

<body>

    <nav>
        <div class="logo">
            <img width="60" src="../img/logo.png">
            <a href="#">Futsalaxy</a>
        </div>

        <div class="extra-nav">
            <a href="../user/user_profile.php" title="Profile"><i class="fa-regular fa-user"></i></a>
            <a href="../logout.php" title="Logout" onclick="return confirm('Apakah anda yakin ingin logout?')"><i class="fa-solid fa-right-from-bracket"></i></a>
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
                            <input type="number" id="durasi_sewa" name="durasi_sewa" placeholder="Hitungan Jam" required min='0'>
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
                            <input type="text" id="kembali" name="kembali" readonly>
                        </div>
                        <div class="group-2">
                            <a href="../user.php">Back</a>
                            <input type="submit" value="Booking Now" name="booking">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        const prices = {
            'INDOOR': {
                'Reguler': 300000,
                'Matras': 250000,
                'Rumput': 200000
            },
            'OUTDOOR': {
                'Reguler': 250000,
                'Matras': 200000,
                'Rumput': 150000
            }
        }

        const kostumPerJam = 50000;
        const sepatuPerJam = 45000;

        document.getElementById('durasi_sewa').addEventListener('keyup', updateHarga);
        document.getElementById('jumlah_pemain').addEventListener('change', updateHarga);
        document.getElementById('lapangan').addEventListener('change', updateHarga);
        document.getElementById('jenis_lapangan').addEventListener('change', updateHarga);
        document.getElementById('bayar').addEventListener('keyup', updateHarga);
        document.getElementById('kostum').addEventListener('keyup', updateHarga);
        document.getElementById('sepatu').addEventListener('keyup', updateHarga);

        function updateHarga() {
            const durasi = document.getElementById('durasi_sewa').value;
            const jumlahPemain = document.getElementById('jumlah_pemain').value;
            const lapangan = document.getElementById('lapangan').value;
            const jenisLapangan = document.getElementById('jenis_lapangan').value;
            const bayar = document.getElementById('bayar').value;
            const kostum = document.getElementById('kostum').value;
            const sepatu = document.getElementById('sepatu').value;

            const totalHarga = durasi * (prices[lapangan][jenisLapangan] * (jumlahPemain / 10) + (kostum * kostumPerJam) + (sepatu * sepatuPerJam));

            document.getElementById('total').value = totalHarga;
            if (bayar) {
                document.getElementById('kembali').value = bayar - totalHarga;
            }
        }
    </script>
</body>

</html>