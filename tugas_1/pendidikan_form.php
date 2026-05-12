<?php
$id = $_GET['id'] ?? null;

$obj = new Pendidikan();

if ($id) {
    $row = $obj->getPendidikan($id);
} else {
    $row = [];
}

// helper biar aman
function val($row, $key) {
    return isset($row[$key]) ? $row[$key] : '';
}
?>

<div class="container mt-4">
    <h3>Form Pendidikan</h3>

    <form method="POST" action="controller/pendidikanController.php">

        <div class="mb-3">
            <label>Institusi</label>
            <input type="text" name="institusi" class="form-control"
                value="<?= val($row, 'institusi') ?>" required>
        </div>

        <div class="mb-3">
            <label>Jenjang</label>
            <select name="jenjang" class="form-control" required>
                <?php
                $jenjang_list = ['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2'];
                foreach ($jenjang_list as $j) {
                    $selected = (val($row, 'jenjang') == $j) ? "selected" : "";
                    echo "<option value='$j' $selected>$j</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control"
                value="<?= val($row, 'jurusan') ?>">
        </div>

        <div class="mb-3">
            <label>Tahun Masuk</label>
            <input type="number" name="tahun_masuk" class="form-control"
                value="<?= val($row, 'tahun_masuk') ?>" required>
        </div>

        <div class="mb-3">
            <label>Tahun Lulus</label>
            <input type="number" name="tahun_lulus" class="form-control"
                value="<?= val($row, 'tahun_lulus') ?>">
        </div>

        <div class="mb-3">
            <label>Logo Institusi</label>
            <input type="text" name="logo_institusi" class="form-control"
                value="<?= val($row, 'logo_institusi') ?>" 
                placeholder="contoh: kampus.png">
        </div>

        <div class="mt-3">
            <?php if (!$id) { ?>
                <button type="submit" name="proses" value="simpan" class="btn btn-primary">
                    Simpan
                </button>
            <?php } else { ?>
                <button type="submit" name="proses" value="ubah" class="btn btn-success">
                    Update
                </button>
                <input type="hidden" name="id_pendidikan" value="<?= $id ?>">
            <?php } ?>

            <a href="index.php?hal=pendidikan_list" class="btn btn-secondary">
                Kembali
            </a>
        </div>

    </form>
</div>