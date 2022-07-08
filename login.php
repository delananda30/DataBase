<?php
session_start();
include 'database.php';

$username  = "";
$password  = "";
$err       = "";

if (isset($_POST['Login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' or $password == '') {
        $err = 'Silahkan masukkan data';
    } else {
        $sql1       = "select * from pembeli where username = '$username'";
        $q1         = mysqli_query($koneksi, $sql1);
        $r1         = mysqli_fetch_array($q1);
        $n1         = mysqli_num_rows($q1);

        $sql2       = "select * from register where username = '$username' and password = '$password'";
        $q2         = mysqli_query($koneksi, $sql2);
        $r2         = mysqli_fetch_array($q2);
        $n2         = mysqli_num_rows($q2);

        if ($n1 < 1) {
            $err = "username tidak ditemukan";
        } elseif ($r1['password'] != md5($password)) {
            $err = "Password yang kamu masukkan tidak sesuai";
        } else {
            $_SESSION['admin_username'] = $username;
            header("location:home.php");
            exit();
        }

        if ($n2 < 1) {
            $err = "username tidak ditemukan";
        } elseif ($r2['password'] != $password) {
            $err = "Password yang kamu masukkan tidak sesuai";
        } else {
            $_SESSION['admin_username'] = $username;
            header("location:home.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Pembeli</title>
</head>

<body>
    <!--1-->
    <div class="pembuka mb-3 row">
        <div class="welcome">
            Welcome back to Our Beauty Network!
        </div>
        <div class="hello">
            Enter your registered username to log in
        </div>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card-body">
            <form action="" method="POST">
                <?php
                if ($err) {
                ?>
                    <div class="alert border-light" style="max-width: 20rem; background-color:rgb(255, 245, 252);">
                        <?php echo $err ?>
                    </div>
                <?php
                }
                ?>
                <div class="card border-dark" style="max-width: 20rem;">
                    <div class="card-header text-center border-dark" style="background-color:rgb(255, 245, 252);">
                        <img class="#" src="assets/i.png" alt="#" style="width: 180px">
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gap-2">
                            <label for="username">Username</label>
                            <input type="text" class="form-control bg-transparent" id="username" name="username" placeholder="Masukkan username" value="<?php echo $username ?>">
                        </div>
                        <div class="mb-4 row gap-2">
                            <label for="password">Pasword</label>
                            <input type="password" class="form-control bg-transparent" id="password" name="password" placeholder="Masukkan password">
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="Login" class="btn btn-dark">
                        </div>
                        <div>
                            Don't have an account? <a href="register.php" class="alert-link text-dark">Sign Up</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>