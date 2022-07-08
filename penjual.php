<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shopping.css">
    <title>Shopping</title>
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
                        <a class="nav-link" href="review.php">REVIEWS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="shopping.php">SHOPPING</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">BRAND</a>
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
            <span class="navbar-brand mb-0 h1" style="font-weight: bold; font-size: 24px;">BRAND</span>
        </div>
    </nav>

    <form action="">
        <?php
        include 'database.php';
        $penjual = mysqli_query($koneksi, "SELECT p.id_penjual, p.alamat_produk, k.nama_produk
                                            FROM penjual p
                                            INNER JOIN produk k
                                            ON p.id_penjual = k.id_produk");
        while ($hasil = mysqli_fetch_array($penjual)) {
        ?>
            <div class="d-grid gap-2 col-6 mx-auto" style="width: 20rem; height: 3rem; margin: 2%; text-align: center ;">
                <a class="btn text-light" style="background-color:rgb(248, 169, 207); font-size: 20px; font-weight: bold;" href="<?php echo $hasil['alamat_produk'] ?>" role="button"><?php echo $hasil['nama_produk'] ?></a>
            </div>  
        <?php
        }
        ?>
    </form>


</body>

</html>