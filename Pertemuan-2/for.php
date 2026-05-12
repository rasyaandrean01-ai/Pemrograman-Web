<?php
//contoh 1 for (mencetak bilangan 1-10)
for ($i = 1; $i <= 10; $i++) {
    echo "Bilangan ke-$i <br>";
}

echo "<hr>";

//contoh 2 while (mencetak bilangan ganjil dari 1-20)
$i = 1;
while ($i <= 20) {
    if ($i % 2 != 0) {
        echo "Bilangan Ganjil ke-$i <br>";
    }
    $i++;
}

echo "<hr>";

//contoh 3 do-while (mencetak bilangan genap dari 1-20)
$i = 1;
do {
    if ($i % 2 == 0) {
        echo "Bilangan Genap-$i <br>";
    }
    $i++;
} while ($i <= 20);

echo "<hr>";