<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Beauty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
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
                        <a class="nav-link active" aria-current="page" href="#">OUR BEUTY</a>
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
                        <a class="nav-link" href="video.php">VIDEO</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(255, 245, 252);">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1" style="font-weight: bold; font-size: 24px;">OUR BEUTY</span>
            <form class="d-flex" role="search">
                <input class="form-control me-2 bg-transparent border-dark btn-outline-dark text-dark" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
            <a class="btn btn-outline-dark" href="logout.php" role="button">Logout</a>
        </div>
    </nav>

    <!--1-->
    <div class="pembuka">
        <div class="welcome">
            Welcome to Our Beauty
        </div>
        <div class="hello">
            Your beauty journey starts here
        </div>
        <div class="hello">
            We have everything you want on all things beauty
        </div>
    </div>

    <!--2-->
    <div class="explore">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#" style="font-size: 14px; color: gray;">EXPLORE ______</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="font-size: 14px; color: gray;">SKINCARE</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="font-size: 14px; color: gray;">MAKEUP</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="font-size: 14px; color: gray;">BODY</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="font-size: 14px; color: gray;">HAIR</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" style="font-size: 14px; color: gray;">FRAGRANCE</a>
            </li>
        </ul>
    </div>

    <a class="btn btn-outline-dark" href="addproduk.php" role="button" style="margin: 2%">Add Produk</a>
    <form action="">

        <?php
        include 'database.php';
        $produk = mysqli_query($koneksi, "SELECT * FROM produk");
        while ($hasil = mysqli_fetch_array($produk)) {
        ?>
            <div class="card border-dark mb-3" style="width: 10rem; height: 17rem; float: left; margin: 2%; text-align: center ;">
                <div class="card-header bg-transparent border-dark"><?php echo $hasil['nama_produk'] ?></div>
                <div class="card-body text-dark">
                    <img src="produk/<?php echo $hasil['foto_produk']; ?>" class="card-img-top" alt="..." style="max-height: 150px;">
                </div>
                <div class="card-footer bg-transparent border-dark"><?php echo $hasil['deskripsi'] ?></div>
            </div>
        <?php
        }
        ?>
    </form>

    <!--footer-->
    <footer>
        <div class="footer">
            <div>OUR BEAUTY</div>



        </div>

    </footer>


</body>

</html>