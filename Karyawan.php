<?php

class Karyawan {
    private $UpahPerJam;
    private $JamKerja;

    public function __construct($UpahPerJam, $JamKerja) {
        $this->UpahPerJam = $UpahPerJam;
        $this->JamKerja = $JamKerja;
    }

    public function getUpahPerJam() {
        return $this -> UpahPerJam;
    }

    public function getJamKerja() {
        return $this -> JamKerja;
    }
}

?>