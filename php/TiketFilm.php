<?php
require_once 'Tiket.php';

class TiketFilm extends Tiket
{
    private $judulFilm;
    private $genre;
    private $durasi;
    private $ratingUsia;
    private $gambar;

    public function __construct(
        $idTiket,
        $nomorKursi,
        $harga,
        $statusTiket,
        $judulFilm,
        $genre,
        $durasi,
        $ratingUsia,
        $gambar
    ) {
        parent::__construct($idTiket, $nomorKursi, $harga, $statusTiket);

        $this->judulFilm = $judulFilm;
        $this->genre = $genre;
        $this->durasi = (int) $durasi;
        $this->ratingUsia = (int) $ratingUsia;
        $this->gambar = $gambar;
    }

    public function getJudulFilm()
    {
        return $this->judulFilm;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getDurasi()
    {
        return $this->durasi;
    }

    public function getRatingUsia()
    {
        return $this->ratingUsia;
    }

    public function getGambar()
    {
        return $this->gambar;
    }

    public function setJudulFilm($judulFilm)
    {
        $this->judulFilm = $judulFilm;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

    public function setDurasi($durasi)
    {
        $this->durasi = (int) $durasi;
    }

    public function setRatingUsia($ratingUsia)
    {
        $this->ratingUsia = (int) $ratingUsia;
    }

    public function setGambar($gambar)
    {
        $this->gambar = $gambar;
    }
}
?>