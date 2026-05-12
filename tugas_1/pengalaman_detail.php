<?php

$id = $_GET['id'] ?? null;

$obj = new Pengalaman();

$row = $obj->getPengalaman($id);

?>

<div class="card shadow-sm border-0">

    <!-- HEADER -->
    <div class="card-header bg-primary text-white">

        <h4 class="mb-0">
            Detail Pengalaman
        </h4>

    </div>

    <!-- BODY -->
    <div class="card-body">

        <div class="row align-items-center">

            <!-- LOGO -->
            <div class="col-md-4 text-center">

                <?php if (!empty($row['logo_perusahaan'])) { ?>

                    <img src="img/<?= $row['logo_perusahaan'] ?>"
                         class="img-fluid rounded shadow-sm"
                         width="220">

                <?php } else { ?>

                    <img src="img/nophoto.jpg"
                         class="img-fluid rounded shadow-sm"
                         width="220">

                <?php } ?>

            </div>

            <!-- DETAIL -->
            <div class="col-md-8">

                <table class="table table-bordered">

                    <tr>

                        <th width="35%">
                            ID
                        </th>

                        <td>
                            <?= $row['id_peng'] ?>
                        </td>

                    </tr>

                    <tr>

                        <th>
                            Nama Perusahaan
                        </th>

                        <td>
                            <?= htmlspecialchars($row['nama_perusahaan']) ?>
                        </td>

                    </tr>

                    <tr>

                        <th>
                            Posisi
                        </th>

                        <td>
                            <?= htmlspecialchars($row['posisi']) ?>
                        </td>

                    </tr>

                    <tr>

                        <th>
                            Tahun
                        </th>

                        <td>
                            <?= $row['tahun_mulai'] ?> -
                            <?= $row['tahun_selesai'] ?? 'Sekarang' ?>
                        </td>

                    </tr>

                </table>

                <a href="index.php?hal=pengalaman_list"
                   class="btn btn-secondary">

                   Kembali
                </a>

            </div>

        </div>

    </div>

</div>