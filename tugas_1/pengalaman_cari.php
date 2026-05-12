<?php

// JUDUL TABEL
$ar_judul = [
    'NO',
    'PERUSAHAAN',
    'POSISI',
    'TAHUN',
    'LOGO',
    'AKSI'
];

// OBJECT
$obj = new Pengalaman();

// KEYWORD
$keyword = $_GET['keyword'] ?? '';

// HASIL SEARCH
$rs = $obj->cari($keyword);

?>

<div class="card shadow-sm border-0">

    <!-- HEADER -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            Hasil Pencarian Pengalaman
        </h4>

        <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] != 'staff') { ?>

            <a href="index.php?hal=pengalaman_form"
               class="btn btn-light btn-sm fw-semibold">

               + Tambah Data
            </a>

        <?php } ?>

    </div>

    <!-- BODY -->
    <div class="card-body">

        <!-- INFO KEYWORD -->
        <div class="alert alert-info">

            Hasil pencarian:
            <strong>
                <?= htmlspecialchars($keyword) ?>
            </strong>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle text-center">

                <!-- HEAD -->
                <thead class="table-primary">

                    <tr>

                        <?php
                        foreach ($ar_judul as $jdl) {
                            echo "<th>$jdl</th>";
                        }
                        ?>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody>

                    <?php

                    $no = 1;

                    if (!empty($rs)) {

                        foreach ($rs as $row) {

                    ?>

                        <tr>

                            <!-- NO -->
                            <td>

                                <?= $no++ ?>

                            </td>

                            <!-- PERUSAHAAN -->
                            <td class="fw-semibold">

                                <?= htmlspecialchars($row['nama_perusahaan']) ?>

                            </td>

                            <!-- POSISI -->
                            <td>

                                <?= htmlspecialchars($row['posisi']) ?>

                            </td>

                            <!-- TAHUN -->
                            <td>

                                <?= $row['tahun_mulai'] ?> -
                                <?= $row['tahun_selesai'] ?? 'Sekarang' ?>

                            </td>

                            <!-- LOGO -->
                            <td>

                                <?php if (!empty($row['logo_perusahaan'])) { ?>

                                    <img src="img/<?= $row['logo_perusahaan'] ?>"
                                         class="rounded shadow-sm"
                                         width="70">

                                <?php } else { ?>

                                    <img src="img/nophoto.jpg"
                                         class="rounded shadow-sm"
                                         width="70">

                                <?php } ?>

                            </td>

                            <!-- AKSI -->
                            <td style="white-space: nowrap;">

                                <!-- DETAIL -->
                                <a href="index.php?hal=pengalaman_detail&id=<?= $row['id_peng'] ?>"
                                   class="btn btn-info btn-sm">

                                   Detail
                                </a>

                                <!-- EDIT -->
                                <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] != 'staff') { ?>

                                    <a href="index.php?hal=pengalaman_form&id=<?= $row['id_peng'] ?>"
                                       class="btn btn-warning btn-sm text-white">

                                       Edit
                                    </a>

                                <?php } ?>

                                <!-- HAPUS -->
                                <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] == 'admin') { ?>

                                    <form method="POST"
                                          action="controller/pengalamanController.php"
                                          style="display:inline;">

                                        <input type="hidden"
                                               name="id_peng"
                                               value="<?= $row['id_peng'] ?>">

                                        <button type="submit"
                                                name="proses"
                                                value="hapus"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data ini?')">

                                            Hapus
                                        </button>

                                    </form>

                                <?php } ?>

                            </td>

                        </tr>

                    <?php

                        }

                    } else {

                    ?>

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted">

                                Data tidak ditemukan

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>