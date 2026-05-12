<?php
session_start();

if (!isset($_SESSION['LOGIN'])) {
    die("Akses ditolak!");
}
?>
<?php
require_once '../models/Pendidikan.php';

$obj = new Pendidikan();

$proses = $_POST['proses'];

if ($proses == "simpan") {
    $obj->simpan($_POST);
}
elseif ($proses == "ubah") {
    $obj->ubah($_POST);
}
elseif ($proses == "hapus") {
    $obj->hapus($_POST['id_pendidikan']);
}

header("Location: ../index.php?hal=pendidikan_list");
?>