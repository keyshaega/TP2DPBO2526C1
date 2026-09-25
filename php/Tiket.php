<?php

class Tiket
{
    private $idTiket;
    private $nomorKursi;
    private $harga;
    private $statusTiket;

    public function __construct(
        $idTiket,
        $nomorKursi,
        $harga,
        $statusTiket
    ) {
        $this->idTiket = $idTiket;
        $this->nomorKursi = $nomorKursi;
        $this->harga = (int) $harga;
        $this->statusTiket = $statusTiket;
    }

    public function getIdTiket()
    {
        return $this->idTiket;
    }

    public function getNomorKursi()
    {
        return $this->nomorKursi;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function getStatusTiket()
    {
        return $this->statusTiket;
    }

    public function setIdTiket($idTiket)
    {
        $this->idTiket = $idTiket;
    }

    public function setNomorKursi($nomorKursi)
    {
        $this->nomorKursi = $nomorKursi;
    }

    public function setHarga($harga)
    {
        $this->harga = (int) $harga;
    }

    public function setStatusTiket($statusTiket)
    {
        $this->statusTiket = $statusTiket;
    }
}
?>
