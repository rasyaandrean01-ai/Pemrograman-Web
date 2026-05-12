<?php
// proses for get
$nama = "";
$alamat = "";

if (isset($_GET['proses'])) {
    $nama = $_GET['nama'] ?? "";
    $alamat = $_GET['alamat'] ?? "";
}
?>

<h3>Form GET</h3>
<form>
    <label>Nama</label>
    <input type="text" name="nama"><br>

    <label>Alamat</label>
    <input type="text" name="alamat"><textarea></textarea><br>

    <input type="submit" name="proses" value="Simpan">
</form>
<hr>

<?php
// proses for post
$username = "";
$pw = "";

if (isset($_POST['proses'])) {
    $username = $_POST['nama'] ?? "";
    $pw = $_POST['alamat'] ?? "";
}
?>

<h3>Form POST</h3>
<form method="post">
    <label>Username</label>
    <input type="text" name="Username"><br>

    <label>Password</label>
    <input type="password" name="pw"><br>

    <input type="submit" name="login" value="Login">
</form>

<?php if (isset($_POST['login'])): ?>
    <p>
        <strong>Hasil POST:</strong>
        Hello <?= htmlspecialchars($username); ?>,
        Password Anda adalah <?= htmlspecialchars($pw); ?>,
    </p>
<?php endif; ?>