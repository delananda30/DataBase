<?php
session_start();
include 'database.php';

$username   = "";
$password   = "";
$email      = "";
$error      = "";
$sukses     = "";

if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email    = $_POST['email'];

    if ($username && $password && $email) {
        try {
            $sql1 = "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password')";
            $q1 = mysqli_query($koneksi, $sql1);

            $sql2 = "INSERT INTO pembeli (username, password) VALUES ('$username', '$password')";
            $q2 = mysqli_query($koneksi, $sql2);

            if ($q1) {
                $sukses = "Data berhasil ditambahkan";
                header("location:login.php");
            } else {
                $error = "Data gagal ditambahkan";
            }
        } catch (Exception $e) {
            header("location:register.php");
        }
    } else {
        $error = "Data tidak boleh kosong";
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
    <title>Register</title>
</head>

<body>
    <!--1-->
    <div class="pembuka mb-3 row">
        <div class="welcome">

        </div>
        <div class="hello">

        </div>
    </div>

    <div class="position-absolute top-50 start-50 translate-middle">
        <div class="card-body">
            <form action="" method="POST">
                <?php
                if ($error) {
                ?>
                    <div class="alert" style="background-color:rgb(255, 245, 252);" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert" style="background-color:rgb(255, 245, 252);" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                }
                ?>
                <div class="card border-dark" style="max-width: 20rem;">
                    <div class="card-header text-center border-dark" style="background-color:rgb(255, 245, 252);">
                        <img class="#" src="assets/n.png" alt="#" style="width: 180px">
                    </div>
                    <div class="card-body">
                        <div class="mb-4 row gap-2">
                            <label for="username">Username</label>
                            <input type="text" class="form-control bg-transparent" id="username" name="username" placeholder="Masukkan username" value="<?php echo $username ?>">
                        </div>
                        <div class="mb-4 row gap-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control bg-transparent" id="email" name="email" placeholder="Masukkan email">
                        </div>
                        <div class="mb-4 row gap-2">
                            <label for="password">Pasword</label>
                            <input type="password" class="form-control bg-transparent" id="password" name="password" placeholder="Masukkan password">
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" name="signup" class="btn btn-dark">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>