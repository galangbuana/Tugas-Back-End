<?php
// Fungsi Untuk Menghitung Rata-Rata Nilai
function hitungRataRata($tugas, $uts, $uas) {
    $avg = ($tugas + $uts + $uas) / 3;
    return $avg;
}

// Fungsi Untuk Nilai Akhir
function nilaiAkhir($avg) {
    if ($avg > 80) {
        return "A";
    } else if ($avg > 70) {
        return "B";
    } else if ($avg > 60) {
        return "C";
    } else {
        return "D";
    }
}

// Array Associative Satu Dimensi
$namaKolom = array(
    "nama" => "Nama",
    "tugas" => "Nilai Tugas",
    "uts" => "Nilai UTS",
    "uas" => "Nilai UAS",
    "avg" => "Nilai Rata-Rata",
    "nilai" => "Nilai Akhir"
);

// Array Associative Multidimensi
$datamhs = array(
    array(
        $namaKolom["nama"] => "Putu",
        $namaKolom["tugas"] => 70,
        $namaKolom["uts"] => 80,
        $namaKolom["uas"] => 80
    ),
    array(
        $namaKolom["nama"] => "Kadek",
        $namaKolom["tugas"] => 80,
        $namaKolom["uts"] => 70,
        $namaKolom["uas"] => 70
    ),
    array(
        $namaKolom["nama"] => "Komang",
        $namaKolom["tugas"] => 90,
        $namaKolom["uts"] => 70,
        $namaKolom["uas"] => 60
    ),
    array(
        $namaKolom["nama"] => "Ketut",
        $namaKolom["tugas"] => 90,
        $namaKolom["uts"] => 85,
        $namaKolom["uas"] => 90
    )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Nilai Mahasiswa</title>
    <style>
        table {
            font-family: 'poppins', sans-serif;
            border-collapse: collapse;
            width: 70%; 
            margin: 0 auto; 
            background-color: #99BC85;
            color: black; 
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 6px; 
        }

        tr:nth-child(even) {
            background-color: #BFD8AF;
        }

        h2 {
            text-align: center;
            font-family: 'poppins', sans-serif;
        }
    </style>
</head>
<body>
<h2>Tabel Nilai Mahasiswa</h2>
<table>
    <tr>
        <?php foreach ($namaKolom as $kolom): ?>
            <th><?php echo $kolom; ?></th>
        <?php endforeach; ?>
    </tr>
    <!-- Loop untuk setiap data mahasiswa dalam $datamhs -->
    <?php foreach ($datamhs as $mahasiswa): ?>
        <tr>
            <td><?php echo $mahasiswa[$namaKolom["nama"]]; ?></td>
            <td><?php echo $mahasiswa[$namaKolom["tugas"]]; ?></td>
            <td><?php echo $mahasiswa[$namaKolom["uts"]]; ?></td>
            <td><?php echo $mahasiswa[$namaKolom["uas"]]; ?></td>
            <?php 
                $avg = round(hitungRataRata(
                    $mahasiswa[$namaKolom["tugas"]], 
                    $mahasiswa[$namaKolom["uts"]], 
                    $mahasiswa[$namaKolom["uas"]]), 2
                );
            ?>
            <td><?php echo $avg; ?></td>
            <td><?php echo nilaiAkhir($avg); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>