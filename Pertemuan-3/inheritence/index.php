<?php

require 'Dosen.php';
require 'Mahasiswa.php';

// Object Dosen
$d1 = new Dosen('Budi', 'L', 'N11', 'S.Kom., M.Kom');
$d2 = new Dosen('Nina', 'P', 'N12', 'S.Kom., M.Kom');

// Object Mahasiswa
$m1 = new Mahasiswa('Rasya', 'L', 2, 'Teknik Informatika');
$m2 = new Mahasiswa('Lana', 'P', 4, 'Sistem Informasi');

// Ubah Jadi Array
$data = [$d1, $d2, $m1, $m2];


// Outuput
echo "<h3>Data Civitas Kampus</h3>";

foreach($data as $d){
    $d->cetak();
}

?>