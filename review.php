<?php
include 'database.php';

//variabel
$id_review      = "";
$id_pembeli     = "";
$id_produk      = "";
$nama_produk    = "";
$rating         = "";
$deskripsi      = "";
$username       = "";
$sukses         = "";
$error          = "";


//4
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}


//8
if ($op == 'delete') {
    $id_review  = $_GET['id_review'];
    $sql1       = "delete from review where id_review = '$id_review'";
    $q1         = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    } else {
        $error  = "Gagal melakukan delete data";
    }
}


//5
if ($op == 'edit') {
    $id_review      = $_GET['id_review'];
    $sql1           = "SELECT p.nama_produk, r.rating, r.deskripsi, m.username
                        FROM review r
                        INNER JOIN produk p
                        ON r.id_produk = p.id_produk
                        INNER JOIN pembeli m
                        ON r.id_pembeli = m.id_pembeli
                        WHERE r.id_review = '$id_review'";
    $q1             = mysqli_query($koneksi, $sql1);
    while ($r1       = mysqli_fetch_array($q1)) {
        $nama_produk    = $r1['nama_produk'];
        $rating         = $r1['rating'];
        $deskripsi      = $r1['deskripsi'];
        $username       = $r1['username'];
    }
}

//1
if (isset($_POST['simpan'])) {
    $id_pembeli    = $_POST['username'];
    $nama_produk    = $_POST['nama_produk'];
    $rating         = $_POST['rating'];
    $deskripsi      = $_POST['deskripsi'];
    $username       = $_POST['username'];

    //pengecekan isi
    if ($nama_produk && $rating && $deskripsi && $username) {

        //6 update
        if ($op == 'edit') {
            $id_review = $_GET['id_review'];
            $sql1 = "UPDATE review SET rating='$rating', deskripsi='$deskripsi' WHERE id_review='$id_review'";
            $q1 = mysqli_query($koneksi, $sql1);

            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            echo $nama_produk, $id_pembeli;
            //memasukkan data
            $sql2 = "INSERT INTO review (id_produk, id_pembeli, rating, deskripsi) 
                    VALUES ($nama_produk,$id_pembeli , '$rating', '$deskripsi')";
            $q2 = mysqli_query($koneksi, $sql2);

            if ($q2) {
                $sukses = "Data berhasil ditambahkan";
            } else {
                $error = "Data gagal ditambahkan";
            }
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
    <title>Our Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/review.css">
</head>

<body>

    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown" style="font-weight: bold; font-size: 16px;">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">OUR BEUTY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">REVIEWS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="shopping.php">SHOPPING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="penjual.php">BRAND</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="berita.php">NEWS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="video.php">VIDEO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(255, 245, 252);">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="font-weight: bold; font-size: 24px;">REVIEWS</span>
        </div>
    </nav>

    <div class="mx-auto">

        <!-- INPUT DATA -->
        <div class="card mt-5">
            <div class="card-body">

                <!--2-->
                <!--php-->
                <?php
                if ($error) {
                ?>
                    <div class="alert" style="background-color:rgb(255, 245, 252);" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    //refresh
                    header("refresh:5;url=review.php");
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                    <div class="alert" style="background-color:rgb(255, 245, 252);" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    //refresh
                    header("refresh:5;url=review.php");
                }
                ?>

                <!--form-->
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="nama_produk">
                                <option <?php
                                        include 'database.php';
                                        $sql1 = "SELECT * FROM produk";
                                        $q1 = mysqli_query($koneksi, $sql1);
                                        while ($pilih = mysqli_fetch_array($q1)) {
                                            echo "<option value='" . $pilih['id_produk'] . "'>" . $pilih['nama_produk'] . "</option>";
                                        } ?>></option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="rating" class="col-sm-2 col-form-label">Rating</label>
                        <div class="col-sm-10">
                            <input type="range" class="form-range range-dark" id="rating" min="0" max="10" name="rating" value="<?php echo $rating ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" rows="5"><?php echo $deskripsi ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                            <select class="form-select" aria-label="Default select example" name="username">
                                <option <?php
                                        include 'database.php';
                                        $sql2 = "SELECT * FROM pembeli";
                                        $q2 = mysqli_query($koneksi, $sql2);
                                        while ($pilih = mysqli_fetch_array($q2)) {
                                            echo "<option value='" . $pilih['id_pembeli'] . "'>" . $pilih['username'] . "</option>";
                                        } ?>></option>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <input type="submit" name="simpan" value="simpan data" class="btn btn-dark">

                    </div>
                </form>
            </div>
        </div>

        <img class="#" src="assets/e.png" alt="#" style="height: 50px">
        <?php
        include 'database.php';
        $rating = mysqli_query($koneksi, "SELECT count(id_review) as banyak FROM review")->fetch_array();
        ?>
        <div class="count-box" style="margin: 2%">
            <span> Banyaknya Review : <?php echo $rating['banyak']; ?> </span>

        </div>

        <!-- TAMPIL DATA -->
        <div class="card-body">
            <form action="" method="POST">
                <table class="table">

                    <tbody>
                        <!--3-->
                        <?php
                        $sql2   = "SELECT r.id_review, p.nama_produk, r.rating, r.deskripsi, username
                                    FROM review r
                                    INNER JOIN produk p
                                    ON r.id_produk = p.id_produk
                                    INNER JOIN pembeli m
                                    ON r.id_pembeli = r.id_pembeli";
                        $q2     = mysqli_query($koneksi, $sql2);
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id_review      = $r2['id_review'];
                            $nama_produk    = $r2['nama_produk'];
                            $rating         = $r2['rating'];
                            $deskripsi      = $r2['deskripsi'];
                            $username       = $r2['username'];
                        ?>
                            <tr>
                                <div class="card text-center">
                                    <div class="card-header" style="background-color:rgb(255, 245, 252);">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <ul class="nav nav-pills card-header-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="review.php?op=edit&id_review=<?php echo $id_review ?>"><button type="button" class="btn btn-outline-dark">Edit</button></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="review.php?op=delete&id_review=<?php echo $id_review ?>" onclick="return confirm('Hapus Data ?')"><button type="button" class="btn btn-outline-dark">Delete</button></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $nama_produk ?></h5>
                                        <p class="card-text"><?php echo $deskripsi ?></p>
                                        <p class="card-text">Rating : <?php echo $rating ?></p>
                                        <h5 class="card-title"><?php echo $username ?></h5>
                                    </div>
                                </div>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>


    </div>
</body>

</html>