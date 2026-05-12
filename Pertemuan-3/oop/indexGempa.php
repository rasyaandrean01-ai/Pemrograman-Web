<?php

require 'Gempa.php';

// Object Gempa
$g1 = new Gempa("Banten", 0.2);
$g2 = new Gempa("Tokyo", 3.1);
$g3 = new Gempa("Florida", 9);
$g4 = new Gempa("Bogor", 4);

// Menampilkan Output
$g1->cetak();
$g2->cetak();
$g3->cetak();
$g4->cetak();

?>