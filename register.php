<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Sewa Futsal</title>

</head>

<body>
    <div class="container">
        <div class="content">
            <form action="proses.php" method="post">
                <h1>Register <br>Sewa Futsal</h1>
                <input type="text" required name="username" placeholder="Username">
                <input type="password" required name="password" placeholder="Password">
                <input type="submit" value="Submit" name="register" onclick="confirm('Apakah anda sudah yakin sudah sesuai?')">
                <p>Already have account? <a href="login.php">Login</a></p>
            </form>
        </div>
    </div>
</body>

</html>