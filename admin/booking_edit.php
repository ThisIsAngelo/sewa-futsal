<?php
session_start();
include '../koneksi.php';

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = mysqli_query($koneksi, "SELECT * FROM sewa_user WHERE id = '$id'");
    $result =  mysqli_fetch_assoc($sql);
    $id_user = $result['id_user'];
    $nama_pemesan = $result['nama_pemesan'];
    $no_telepon = $result['no_telepon'];
    $tgl_pesan = $result['tgl_pesan'];
    $jam = $result['jam'];
    $durasi_sewa = $result['durasi_sewa'];
    $jumlah_pemain = $result['jumlah_pemain'];
    $lapangan = $result['lapangan'];
    $jenis_lapangan = $result['jenis_lapangan'];
    $kostum = $result['kostum'];
    $sepatu = $result['sepatu'];
    $total = $result['total'];
    $bayar  = $result['bayar'];
    $kembali  = $result['kembali'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/booking/booking_edit.css">
    <title>Edit</title>
</head>

<body>
    <div class="container">
        <form method="post" action="../proses.php">
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <label for="">Id_User:</label>
            <input type="text" readonly value="<?php echo $id_user ?>" name="id_user">
            <label for="">Nama_Pemesan:</label>
            <input type="text" value="<?php echo $nama_pemesan ?>" name="nama_pemesan">
            <label for="">No_Telp:</label>
            <input type="text" value="<?php echo $no_telepon ?>" name="no_telepon">
            <label for="">Tgl_pesan:</label>
            <input type="date" value="<?php echo $tgl_pesan ?>" name="tgl_pesan">
            <label for="">Jam:</label>
            <input type="time" value="<?php echo $jam ?>" name="jam">
            <label for="">Durasi_Sewa:</label>
            <input type="number" value="<?php echo $durasi_sewa ?>" name="durasi_sewa">
            <label for="">Jumlah_Pemain:</label>
            <select name="jumlah_pemain">
                <option <?php if ($jumlah_pemain == 10) {
                            echo 'selected';
                        } ?> value="10">10 Orang</option>
                <option <?php if ($jumlah_pemain == 20) {
                            echo 'selected';
                        } ?> value="20">20 Orang</option>
            </select>
            <label for="">Lapangan:</label>
            <select name="lapangan">
                <option <?php if ($lapangan == 'INDOOR') {
                            echo 'selected';
                        } ?> value="INDOOR">INDOOR</option>
                <option <?php if ($lapangan == 'OUTDOOR') {
                            echo 'selected';
                        } ?> value="OUTDOOR">OUTDOOR</option>
            </select>
            <label for="">Jenis_Lapangan:</label>
            <select name="jenis_lapangan">
                <option <?php if ($jenis_lapangan == 'Reguler') echo 'selected'; ?> value="Reguler">Reguler</option>
                <option <?php if ($jenis_lapangan == 'Matras') echo 'selected'; ?> value="Matras">Matras</option>
                <option <?php if ($jenis_lapangan == 'Rumput') echo 'selected'; ?> value="Rumput">Rumput</option>
            </select>
            <label for="">Kostum:</label>
            <input type="number" value="<?php echo $kostum ?>" name="kostum">
            <label for="">Sepatu:</label>
            <input type="number" value="<?php echo $sepatu ?>" name="sepatu">
            <label for="">Total:</label>
            <input type="number" value="<?php echo $total ?>" name="total">
            <label for="">Bayar:</label>
            <input type="number" value="<?php echo $bayar ?>" name="bayar">
            <label for="">Kembali:</label>
            <input type="number" value="<?php echo $kembali ?>" name="kembali">
            <input type="submit" value="Edit" name="admin">
        </form>
    </div>
</body>

</html>