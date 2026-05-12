<?php

require 'Bank.php';

// Membuat Object Dari Class Bank
$n1 = new Bank('001', 'Siti', 5000000);
$n2 = new Bank('002', 'Andi', 7000000);
$n3 = new Bank('003', 'Dede', 3000000);
$n4 = new Bank('004', 'Didin', 10000000);

// Melakukan Transaksi Setor uang
$n1->setor(400000);
$n3->setor(100000);

// Ambil Uang
$n1->ambil(300000);
$n2->ambil(2000000);

// Output
echo "<h3>".Bank::BANK."</h3>";
$n1->cetak();
$n2->cetak();
$n3->cetak();

echo "Jumlah Nasabah : ".Bank::$jml." orang";

?>