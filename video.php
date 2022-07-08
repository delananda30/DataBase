<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/berita.css">
    <title>Video</title>
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
                        <a class="nav-link" href="penjual.php">BRAND</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="berita.php">NEWS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">VIDEO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(255, 245, 252);">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="font-weight: bold; font-size: 24px;">VIDEO</span>
        </div>
    </nav>

    <div class="card mt-8">
        <div class="card-body">
            <form action="">

                <?php
                include 'database.php';
                $vid = mysqli_query($koneksi, "SELECT v.id_produk, v.link_video, p.nama_produk 
                                                FROM videos v
                                                INNER JOIN produk p
                                                ON v.id_video = p.id_produk");
                while ($hasil = mysqli_fetch_array($vid)) {
                ?>

                    <div class="card mb-3" style="width: 200px;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $hasil['nama_produk'] ?></h5>
                            <a class="btn btn-outline-dark" href="<?php echo $hasil['link_video'] ?>" role="button">Tonton</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
    </div>

</body>

</html>