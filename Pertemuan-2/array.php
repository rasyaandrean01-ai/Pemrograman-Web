<?php
//contoh array scalar
$buah = array("Apel", "Jeruk", "Mangga");
echo "Buah Pertama : " . $buah[0] . "<br>";
echo "Buah Kedua : " . $buah[1] . "<br>";
echo "Buah Ketiga : " . $buah[2] . "<br>";

echo "<hr>";

//contoh array asosiatif
//membuat menu makanan
$menu_makanan = array(
    "Nasi Goreng" => 15000,
    "Mie Ayam" => 12000,
    "Sate Ayam" => 20000,
    "Soto Ayam" => 18000
);
//menampilkan array asosiatif memakai foreach
echo "<h2>Menu Makanan</h2>";
foreach ($menu_makanan as $makanan => $harga) {
    $harga_rupiah = number_format($harga, 0, ',', '.');

    echo "<div style='background-color: #lightyellow; padding: 10px; margin-bottom: 10px;'>";
    echo "<span>$makanan</span>";
    echo "<span>Rp $harga_rupiah</span>";
    echo "</div>";
}
?>      