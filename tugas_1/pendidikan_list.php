<?php

$ar_judul = [
    'NO',
    'INSTITUSI',
    'JENJANG',
    'JURUSAN',
    'TAHUN MASUK',
    'TAHUN LULUS',
    'LOGO',
    'AKSI'
];

// OBJECT
$obj_pendidikan = new Pendidikan();

// KEYWORD
$keyword = trim($_GET['keyword'] ?? '');

// SEARCH ATAU FULL LIST
if (!empty($keyword)) {

    $rs = $obj_pendidikan->cari($keyword);

} else {

    $rs = $obj_pendidikan->index();

}

?>

<div class="card shadow-sm border-0">

    <!-- HEADER -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            Data Pendidikan
        </h4>

        <!-- TOMBOL TAMBAH -->
        <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] != 'staff') { ?>

            <a href="index.php?hal=pendidikan_form"
               class="btn btn-light btn-sm fw-semibold">

               + Tambah Pendidikan
            </a>

        <?php } ?>

    </div>

    <!-- BODY -->
    <div class="card-body">

        <!-- INFO SEARCH -->
        <?php if (!empty($keyword)) { ?>

            <div class="alert alert-info">

                Hasil pencarian:
                <strong>
                    <?= htmlspecialchars($keyword) ?>
                </strong>

            </div>

        <?php } ?>

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

                        foreach ($rs as $pendidikan) {

                    ?>

                        <tr>

                            <!-- NO -->
                            <td>
                                <?= $no++ ?>
                            </td>

                            <!-- INSTITUSI -->
                            <td class="fw-semibold">

                                <?= htmlspecialchars($pendidikan['institusi']) ?>

                            </td>

                            <!-- JENJANG -->
                            <td>

                                <?= htmlspecialchars($pendidikan['jenjang']) ?>

                            </td>

                            <!-- JURUSAN -->
                            <td>

                                <?= htmlspecialchars($pendidikan['jurusan']) ?>

                            </td>

                            <!-- TAHUN MASUK -->
                            <td>

                                <?= $pendidikan['tahun_masuk'] ?>

                            </td>

                            <!-- TAHUN LULUS -->
                            <td>

                                <?= $pendidikan['tahun_lulus'] ?>

                            </td>

                            <!-- LOGO -->
                            <td>

                                <?php if (!empty($pendidikan['logo_institusi'])) { ?>

                                    <img src="img/<?= $pendidikan['logo_institusi'] ?>"
                                         class="rounded shadow-sm"
                                         width="65">

                                <?php } else { ?>

                                    <img src="img/nophoto.jpg"
                                         class="rounded shadow-sm"
                                         width="65">

                                <?php } ?>

                            </td>

                            <!-- AKSI -->
                            <td style="white-space: nowrap;">

                                <!-- DETAIL -->
                                <a href="index.php?hal=pendidikan_detail&id=<?= $pendidikan['id_pendidikan'] ?>"
                                   class="btn btn-info btn-sm">

                                   Detail
                                </a>

                                <!-- EDIT -->
                                <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] != 'staff') { ?>

                                    <a href="index.php?hal=pendidikan_form&id=<?= $pendidikan['id_pendidikan'] ?>"
                                       class="btn btn-warning btn-sm text-white">

                                       Edit
                                    </a>

                                <?php } ?>

                                <!-- HAPUS -->
                                <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] == 'admin') { ?>

                                    <form method="POST"
                                          action="controller/pendidikanController.php"
                                          style="display:inline;">

                                        <input type="hidden"
                                               name="id_pendidikan"
                                               value="<?= $pendidikan['id_pendidikan'] ?>">

                                        <button type="submit"
                                                name="proses"
                                                value="hapus"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">

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

                            <td colspan="8"
                                class="text-center text-muted">

                                Data pendidikan tidak ditemukan

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>