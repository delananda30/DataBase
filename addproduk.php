<?php
include 'database.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/shopping.css">
    <title>Add Produk</title>
</head>

<body>
    <!--NAVBAR-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:rgb(255, 245, 252);">
        <div class="container-fluid">
            <a class="btn-close" href="home.php" type="button" aria-label="Close"></a>
        </div>
    </nav>

    <div class="mx-auto">
        <div class="card mt-5">
            <div class="card-body">

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Produk">
                        <label for="floatingInput">Nama Produk</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Produk</label>
                        <input class="form-control" type="file" name="foto">
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Deskripsi Produk" name="deskripsi" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Deskripsi</label>
                    </div>
                    <div class="d-grid gap-2" style="margin-top: 2%">
                        <input type="submit" name="simpan" value="simpan produk" class="btn btn-dark">
                    </div>
                </form>

                <?php
                if (isset($_POST['simpan'])) {
                    $folder = './produk/';
                    $name_p = $_FILES['foto']['name'];
                    $rename = date('Hs') . $name_p;
                    $sumber_p = $_FILES['foto']['tmp_name'];
                    move_uploaded_file($sumber_p, $folder . $rename);
                    $insert = mysqli_query($koneksi, "INSERT INTO produk VALUES (NULL,'" . $_POST['nama'] . "', '" . $rename . "', '" . $_POST['deskripsi'] . "')");
                    if ($insert) {
                        echo 'Data berhasil disimpan';
                    } else {
                        echo 'Gagal disimpan';
                    }
                }
                ?>
            </div>
        </div>
    </div>


</body>

</html>