<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "tugas_1"
);

if (!$conn) {
    die("Koneksi gagal : " . mysqli_connect_error());
}
?>