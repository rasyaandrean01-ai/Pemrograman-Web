<?php
$id = $_GET['id'] ?? null;
$obj = new Pengalaman();

if ($id) {
    $row = $obj->getPengalaman($id);
} else {
    $row = [];
}

function val($r, $k)
{
    return isset($r[$k]) ? htmlspecialchars($r[$k]) : '';
}
?>

<div class="container mt-4">
    <h3><?= $id ? 'Edit Pengalaman' : 'Tambah Pengalaman' ?></h3>

    <form method="POST" action="controller/pengalamanController.php">

        <!-- Nama Perusahaan -->
        <div class="mb-3">
            <label>Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control"
                value="<?= val($row, 'nama_perusahaan') ?>" required>
        </div>

        <!-- Posisi -->
        <div class="mb-3">
            <label>Posisi</label>
            <input type="text" name="posisi" class="form-control"
                value="<?= val($row, 'posisi') ?>">
        </div>

        <!-- Tahun Mulai -->
        <div class="mb-3">
            <label>Tahun Mulai</label>
            <input type="number" name="tahun_mulai" class="form-control"
                value="<?= val($row, 'tahun_mulai') ?>" min="1900" max="2100">
        </div>

        <!-- Tahun Selesai -->
        <div class="mb-3">
            <label>Tahun Selesai</label>
            <input type="number" name="tahun_selesai" class="form-control"
                value="<?= val($row, 'tahun_selesai') ?>" min="1900" max="2100">
            <small class="text-muted">Kosongkan jika masih bekerja</small>
        </div>

        <!-- Logo -->
        <div class="mb-3">
            <label>Logo Perusahaan</label>
            <input type="text" name="logo_perusahaan" class="form-control"
                value="<?= val($row, 'logo_perusahaan') ?>"
                placeholder="contoh: perusahaan.png">

            <?php if (!empty($row['logo_perusahaan'])) { ?>
                <div class="mt-2">
                    <img src="img/<?= $row['logo_perusahaan'] ?>" width="80">
                </div>
            <?php } ?>
        </div>
        <!-- BUTTON -->
        <div class="mt-3">
            <?php if (empty($id)) { ?>
                <button class="btn btn-primary" name="proses" value="simpan">
                    Simpan
                </button>
            <?php } else { ?>
                <button class="btn btn-success" name="proses" value="ubah">
                    Update
                </button>
                <input type="hidden" name="id_peng" value="<?= $id ?>">
            <?php } ?>

            <a href="index.php?hal=pengalaman_list" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>
</div>
<?php if (!empty($id)) { ?>
    <input type="hidden" name="logo_lama" value="<?= $row['logo_perusahaan'] ?>">
<?php } ?>