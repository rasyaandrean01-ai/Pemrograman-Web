<?php
$id = $_REQUEST['id'] ?? null;

$model = new Pendidikan();
$rs = $model->getPendidikan($id);
?>

<div class="card mb-3">
    <div class="row g-0">
        
        <!-- LOGO -->
        <div class="col-md-4">
            <?php if (!empty($rs['logo_institusi'])) { ?>
                <img src="img/<?= $rs['logo_institusi'] ?>" 
                     class="img-fluid rounded-start" alt="logo" />
            <?php } else { ?>
                <img src="img/nophoto.jpg" 
                     class="img-fluid rounded-start" alt="no image" />
            <?php } ?>
        </div>

        <!-- DETAIL -->
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    <?= htmlspecialchars($rs['institusi']) ?>
                </h5>

                <p class="card-text">
                    Jenjang: <?= htmlspecialchars($rs['jenjang']) ?> <br />
                    Jurusan: <?= htmlspecialchars($rs['jurusan']) ?> <br />
                    Tahun: 
                    <?= $rs['tahun_masuk'] ?> - 
                    <?= $rs['tahun_lulus'] ?? 'Sekarang' ?> <br />
                </p>

                <p class="card-text">
                    <a href="index.php?hal=pendidikan_list" 
                       class="btn btn-primary">
                        Kembali
                    </a>
                </p>
            </div>
        </div>

    </div>
</div>