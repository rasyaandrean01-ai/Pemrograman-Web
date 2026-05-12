<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ujian Nasional</h1>
    <form method="post" action="">
        <label>Nama Siswa:</label>
        <input type="text" namwe="nama" required><br>
        <label>Nilai Matematika</label>
        <input type="number" name="nilai_matematika" required><br>
        <label>Nilai Bahasa Indonesia</label>
        <input type="number" name="nilai_bahasa_indonesia" required><br>
        <label>Nilai Bahasa Inggris</label>
        <input type="number" name="nilai_bahasa_inggris" required><br>

        <button type="submit" name="hasil">Hasil Nilai</button>
    </form>

    <?php
    if (isset($_POST['hasil'])) {
        
        echo "<h2>Hasil Nilai Ujian Nasional</h2>";

        //Ambil data dari form
        $nama = $_POST['nama'] ?? 'nama';
        $nilai_matematika = $_POST['nilai_matematika'];
        $nilai_bahasa_indonesia = $_POST['nilai_bahasa_indonesia'];
        $nilai_bahasa_inggris = $_POST['nilai_bahasa_inggris'];
        //Hitung rata-rata
        $rata_rata = ($nilai_matematika + $nilai_bahasa_indonesia + $nilai_bahasa_inggris) / 3;
        echo "Nama Siswa: $nama <br>";
        echo "Nilai Rata-rata: $rata_rata <br><br>";
        //Menentukan Grade
        $grade = '';
        if ($rata_rata >= 90) {
            $grade = 'A';
        } elseif ($rata_rata >= 80) {
            $grade = 'B';
        } elseif ($rata_rata >= 70) {
            $grade = 'C';
        } elseif ($rata_rata >= 60) {
            $grade = 'D';
        } else {
            $grade = 'E';
        }
        echo "Grade Anda: <strong>$grade</strong><br><br>";
    }
        //Menentukan Kelulusan
        $status = ($rata_rata >= 60) ? 'Lulus' : 'Tidak Lulus';
        $warna = ($status == 'Lulus') ? 'green' : 'red';
        echo "Status Kelulusan: <strong style='color: $warna;'>$status</strong>";
        //Pesan Untuk Siswa
        echo "<strong>Pesan Cinta:</strong> ";
        switch ($grade) {
            case 'A':
                echo "Selamat! Anda mendapatkan nilai yang sangat baik. Terus pertahankan prestasi Anda!";
                break;
            case 'B':
                echo "Bagus! Anda mendapatkan nilai yang baik. Terus tingkatkan usaha Anda!";
                break;
            case 'C':
                echo "Cukup baik, tetapi masih ada ruang untuk perbaikan. Jangan menyerah!";
                break;
            case 'D':
                echo "Nilai Anda kurang memuaskan. Cobalah untuk lebih fokus dan belajar lebih giat!";
                break;
            case 'E':
                echo "Nilai Anda sangat rendah. Sangat disarankan untuk mencari bantuan tambahan dan meningkatkan usaha belajar Anda!";
                break;
        }
?>
</body>
</html> 