<?php

$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "ourbeauty";

$koneksi    = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) { //cek koneksi
    die("Tidak dapat terkoneksi ke database");
}

?>