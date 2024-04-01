<?php

include 'Karyawan.php';
include 'Keuangan.php';

// Form Handle Submission
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['hitung'])) {
    // Mengambil Nilai Dari Form
    $UpahPerJam = $_GET['UpahPerJam'];
    $JamKerja = $_GET['JamKerja'];

    // Menghitung Upah Total
    $karyawan = new Karyawan($UpahPerJam, $JamKerja);
    $UpahTotal = Keuangan::HitungUpahTotal($karyawan);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menghitung Upah Karyawan</title>
    <style>
        body {
            font-family: 'poppins', Tahoma, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }
        .container:hover {
            transform: translateY(-5px);
        }
        h2 {
            margin-top: 0;
            text-align: center;
            color: #1a4c3c;
        }
        form {
            text-align: left;
        }
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s ease-in-out;
        }
        input[type="number"]:focus {
            outline: none;
            border-color: #1a4c3c;
        }
        input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background-color: #1a4c3c;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0d261e;
        }
        .hasil {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .hasil h3 {
            margin-top: 0;
            text-align: center;
            color: #1a4c3c;
        }
        .hasil p {
            margin: 10px 0;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Program Menghitung Upah<br>Karyawan PT.XXX</h2>
        <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="UpahPerJam">Jumlah Upah Per Jam :</label>
            <input type="number" name="UpahPerJam" required><br>
            <label for="JamKerja">Jumlah Jam Kerja :</label>
            <input type="number" name="JamKerja" required><br>
            <input type="submit" name="hitung" value="Hitung">
        </form>

        <?php if(isset($UpahTotal)): ?>
        <div class="hasil">
            <h3>Hasil Perhitungan Upah</h3>
            <p>Jumlah Upah Per Jam : Rp. <?php echo $UpahPerJam; ?></p>
            <p>Jumlah Jam Kerja : <?php echo $JamKerja; ?> Jam</p>
            <p>Jumlah Upah Total : Rp. <?php echo $UpahTotal; ?></p> 
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
