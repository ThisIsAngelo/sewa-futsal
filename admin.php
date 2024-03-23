<?php
session_start();
include 'koneksi.php';
$username = $_SESSION['username'];
$role = $_SESSION['role'];

$no = 0;
$sql = mysqli_query($koneksi, "SELECT * FROM account");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/logo-icon.jpeg">
    <title>Admin</title>
</head>

<body>
    <h1>Halo Admin <?= $username ?></h1>
    <a href="index.php">Back</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($result = mysqli_fetch_assoc($sql)) {
                $no++ ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $result['username'] ?></td>
                    <td><?php echo $result['password'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>