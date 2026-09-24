<?php

require_once 'TiketFilm.php';

class TiketBioskop extends TiketFilm
{
    private $studio;
    private $jamTayang;
    private $tanggalTayang;
    private $jenisStudio;

    public function __construct(
        $idTiket,
        $nomorKursi,
        $harga,
        $statusTiket,
        $judulFilm,
        $genre,
        $durasi,
        $ratingUsia,
        $studio,
        $jamTayang,
        $tanggalTayang,
        $jenisStudio
    ) {
        parent::__construct(
            $idTiket,
            $nomorKursi,
            $harga,
            $statusTiket,
            $judulFilm,
            $genre,
            $durasi,
            $ratingUsia
        );

        $this->studio = $studio;
        $this->jamTayang = $jamTayang;
        $this->tanggalTayang = $tanggalTayang;
        $this->jenisStudio = $jenisStudio;
    }

    public function getStudio()
    {
        return $this->studio;
    }

    public function getJamTayang()
    {
        return $this->jamTayang;
    }

    public function getTanggalTayang()
    {
        return $this->tanggalTayang;
    }

    public function getJenisStudio()
    {
        return $this->jenisStudio;
    }

    public function setStudio($studio)
    {
        $this->studio = $studio;
    }

    public function setJamTayang($jamTayang)
    {
        $this->jamTayang = $jamTayang;
    }

    public function setTanggalTayang($tanggalTayang)
    {
        $this->tanggalTayang = $tanggalTayang;
    }

    public function setJenisStudio($jenisStudio)
    {
        $this->jenisStudio = $jenisStudio;
    }
}
?>