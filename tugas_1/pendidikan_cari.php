<?php

// JUDUL TABEL
$ar_judul = [
    'NO',
    'INSTITUSI',
    'JENJANG',
    'JURUSAN',
    'TAHUN',
    'LOGO',
    'AKSI'
];

// OBJECT
$obj = new Pendidikan();

// KEYWORD
$keyword = $_GET['keyword'] ?? '';

// HASIL SEARCH
$rs = $obj->cari($keyword);

?>

<div class="card shadow-sm border-0">

    <!-- HEADER -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <h4 class="mb-0">
            Hasil Pencarian Pendidikan
        </h4>

        <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] != 'staff') { ?>

            <a href="index.php?hal=pendidikan_form"
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

                            <!-- INSTITUSI -->
                            <td class="fw-semibold">

                                <?= htmlspecialchars($row['institusi']) ?>

                            </td>

                            <!-- JENJANG -->
                            <td>

                                <?= htmlspecialchars($row['jenjang']) ?>

                            </td>

                            <!-- JURUSAN -->
                            <td>

                                <?= htmlspecialchars($row['jurusan']) ?>

                            </td>

                            <!-- TAHUN -->
                            <td>

                                <?= $row['tahun_masuk'] ?> -
                                <?= $row['tahun_lulus'] ?? 'Sekarang' ?>

                            </td>

                            <!-- LOGO -->
                            <td>

                                <?php if (!empty($row['logo_institusi'])) { ?>

                                    <img src="img/<?= $row['logo_institusi'] ?>"
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
                                <a href="index.php?hal=pendidikan_detail&id=<?= $row['id_pendidikan'] ?>"
                                   class="btn btn-info btn-sm">

                                   Detail
                                </a>

                                <!-- EDIT -->
                                <?php if (isset($_SESSION['LOGIN']) && $_SESSION['ROLE'] != 'staff') { ?>

                                    <a href="index.php?hal=pendidikan_form&id=<?= $row['id_pendidikan'] ?>"
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
                                               value="<?= $row['id_pendidikan'] ?>">

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

                            <td colspan="7"
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