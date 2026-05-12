<?php
require_once __DIR__ . '/../koneksi.php';

class Pengalaman
{

    // =========================
    // TAMPIL SEMUA DATA
    // =========================
    function index()
    {
        global $conn;

        $sql = "SELECT * FROM pengalaman
                ORDER BY id_peng DESC";

        $query = mysqli_query($conn, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }

    // =========================
    // DETAIL DATA
    // =========================
    function getPengalaman($id)
    {
        global $conn;

        $sql = "SELECT * FROM pengalaman
                WHERE id_peng='$id'";

        $query = mysqli_query($conn, $sql);

        return mysqli_fetch_assoc($query);
    }

    // =========================
    // SIMPAN DATA
    // =========================
    function simpan($data)
    {
        global $conn;

        $sql = "INSERT INTO pengalaman
                (
                    nama_perusahaan,
                    posisi,
                    tahun_mulai,
                    tahun_selesai,
                    logo_perusahaan
                )

                VALUES
                (
                    '{$data['nama_perusahaan']}',
                    '{$data['posisi']}',
                    '{$data['tahun_mulai']}',
                    '{$data['tahun_selesai']}',
                    '{$data['logo_perusahaan']}'
                )";

        return mysqli_query($conn, $sql);
    }

    // =========================
    // UPDATE DATA
    // =========================
    function ubah($data)
    {
        global $conn;

        $sql = "UPDATE pengalaman SET

                nama_perusahaan = '{$data['nama_perusahaan']}',
                posisi = '{$data['posisi']}',
                tahun_mulai = '{$data['tahun_mulai']}',
                tahun_selesai = '{$data['tahun_selesai']}',
                logo_perusahaan = '{$data['logo_perusahaan']}'

                WHERE id_peng = '{$data['id_peng']}'";

        return mysqli_query($conn, $sql);
    }

    // =========================
    // HAPUS DATA
    // =========================
    function hapus($id)
    {
        global $conn;

        $sql = "DELETE FROM pengalaman
                WHERE id_peng='$id'";

        return mysqli_query($conn, $sql);
    }

    // =========================
    // SEARCH DATA
    // =========================
    function cari($keyword)
    {
        global $conn;

        $sql = "SELECT * FROM pengalaman

                WHERE nama_perusahaan LIKE '%$keyword%'
                OR posisi LIKE '%$keyword%'

                ORDER BY id_peng DESC";

        $query = mysqli_query($conn, $sql);

        return mysqli_fetch_all($query, MYSQLI_ASSOC);
    }
}
?>