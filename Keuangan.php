<?php

class Keuangan {
    public static function HitungUpahTotal($karyawan) {
        // Validasi Input
        $UpahPerJam = $karyawan->getUpahPerJam();
        $JamKerja = $karyawan->getJamKerja();

        if ($UpahPerJam <= 0 || $JamKerja <= 0) {
            return false; // Input Tidak Valid
        }

        // Menghitung Upah Total
        if ($JamKerja <= 48) {
            $UpahTotal = $UpahPerJam * $JamKerja;
        } else {
            $UpahNormal = $UpahPerJam * 48;
            $UpahLembur = ($JamKerja - 48) * ($UpahPerJam * 1.15);
            $UpahTotal = $UpahNormal + $UpahLembur;
        }

        return $UpahTotal;
    }
}
?>