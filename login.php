<?php
session_start();
if (isset($_SESSION['login'])) {
  echo "<script>alert('Kamu sudah login!'); window.location.replace('user.php')</script>";
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/login.css" />
  <link rel="icon" href="img/logo-icon.jpeg" />
  <title>Login</title>
</head>

<body>
  <div class="container">
    <div class="content">
      <form action="proses.php" method="post">
        <h1>Login <br />Sewa Futsal</h1>
        <input type="text" required name="username" placeholder="Username" />
        <input type="password" required name="password" placeholder="Password" />
        <input type="submit" value="Submit" name="login" />
        <p>Don't have account? <a href="register.php">Register</a></p>
        <p><a class="back" href="index.html">Back?</a></p>
      </form>
    </div>
  </div>
</body>

</html>