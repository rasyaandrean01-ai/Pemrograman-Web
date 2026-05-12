<?php
require_once __DIR__ . '/../koneksi.php';

class Pendidikan
{

    // =========================
    // TAMPIL SEMUA DATA
    // =========================
    function index()
    {
        global $conn;

        $sql = "SELECT * FROM pendidikan
                ORDER BY id_pendidikan DESC";

        $query = mysqli_query($conn, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
    // =========================
    // DETAIL DATA
    // =========================
    function getPendidikan($id)
    {
        global $conn;

        $sql = "SELECT * FROM pendidikan
                WHERE id_pendidikan='$id'";

        $query = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($query);
    }

    // =========================
    // SIMPAN DATA
    // =========================
    function simpan($data)
    {
        global $conn;

        $sql = "INSERT INTO pendidikan
                (
                    institusi,
                    jenjang,
                    jurusan,
                    tahun_masuk,
                    tahun_lulus,
                    logo_institusi
                )

                VALUES
                (
                    '{$data['institusi']}',
                    '{$data['jenjang']}',
                    '{$data['jurusan']}',
                    '{$data['tahun_masuk']}',
                    '{$data['tahun_lulus']}',
                    '{$data['logo_institusi']}'
                )";

        return mysqli_query($conn, $sql);
    }

    // =========================
    // UPDATE DATA
    // =========================
    function ubah($data)
    {
        global $conn;

        $sql = "UPDATE pendidikan SET

                institusi = '{$data['institusi']}',
                jenjang = '{$data['jenjang']}',
                jurusan = '{$data['jurusan']}',
                tahun_masuk = '{$data['tahun_masuk']}',
                tahun_lulus = '{$data['tahun_lulus']}',
                logo_institusi = '{$data['logo_institusi']}'

                WHERE id_pendidikan = '{$data['id_pendidikan']}'";

        return mysqli_query($conn, $sql);
    }

    // =========================
    // HAPUS DATA
    // =========================
    function hapus($id)
    {
        global $conn;

        $sql = "DELETE FROM pendidikan
                WHERE id_pendidikan='$id'";

        return mysqli_query($conn, $sql);
    }

    // =========================
    // SEARCH DATA
    // =========================
    function cari($keyword)
    {
        global $conn;

        $sql = "SELECT * FROM pendidikan

                WHERE institusi LIKE '%$keyword%'
                OR jenjang LIKE '%$keyword%'
                OR jurusan LIKE '%$keyword%'

                ORDER BY id_pendidikan DESC";

        $query = mysqli_query($conn, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
}
?>