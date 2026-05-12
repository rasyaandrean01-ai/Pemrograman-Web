<?php
session_start();

if (!isset($_SESSION['LOGIN'])) {
    die("Akses ditolak!");
}
?>
<?php
require_once '../models/Pengalaman.php';

$obj = new Pengalaman();
$proses = $_POST['proses'];

// ambil logo langsung dari input text
$logo = $_POST['logo_perusahaan'];

// kalau kosong saat edit → pakai logo lama
if (empty($logo)) {
    $logo = $_POST['logo_lama'] ?? null;
}

// data
$data = [
    'id_peng' => $_POST['id_peng'] ?? null,
    'nama_perusahaan' => $_POST['nama_perusahaan'],
    'posisi' => $_POST['posisi'],
    'tahun_mulai' => $_POST['tahun_mulai'],
    'tahun_selesai' => $_POST['tahun_selesai'],
    'logo_perusahaan' => $logo
];

// proses
if ($proses == "simpan") {
    $obj->simpan($data);
} elseif ($proses == "ubah") {
    $obj->ubah($data);
} elseif ($proses == "hapus") {
    $obj->hapus($_POST['id_peng']);
}

header("Location: ../index.php?hal=pengalaman_list");