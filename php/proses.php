<?php

require_once 'TiketBioskop.php';

session_start();


// ==================== CEK SESSION ====================

$sessionValid = true;

if (!isset($_SESSION['daftarTiket']) || !is_array($_SESSION['daftarTiket'])) {
    $sessionValid = false;
} else {
    foreach ($_SESSION['daftarTiket'] as $tiket) {
        if (!is_object($tiket) || get_class($tiket) != 'TiketBioskop') {
            $sessionValid = false;
            break;
        }
    }
}


// Kalau session lama tidak valid,
// buat kembali 5 data awal

if (!$sessionValid) {
    $_SESSION['daftarTiket'] = [

        new TiketBioskop(
            'T001',
            'A05',
            50000,
            'Aktif',
            'Interstellar',
            'Sci-Fi',
            169,
            13,
            'interstellar.jpg',
            'Studio 1',
            '13:00',
            '25-09-2026',
            'IMAX'
        ),

        new TiketBioskop(
            'T002',
            'B10',
            45000,
            'Aktif',
            'Inside Out 2',
            'Animation',
            96,
            13,
            'inside_out_2.jpg',
            'Studio 2',
            '15:30',
            '25-09-2026',
            'Regular'
        ),

        new TiketBioskop(
            'T003',
            'C07',
            55000,
            'Aktif',
            'Avengers: Endgame',
            'Action',
            181,
            13,
            'avengers_endgame.jpg',
            'Studio 3',
            '18:00',
            '25-09-2026',
            'IMAX'
        ),

        new TiketBioskop(
            'T004',
            'D12',
            40000,
            'Aktif',
            'Toy Story 5',
            'Animation',
            125,
            13,
            'toy_story_5.jpg',
            'Studio 4',
            '16:00',
            '26-09-2026',
            'Regular'
        ),

        new TiketBioskop(
            'T005',
            'E03',
            60000,
            'Aktif',
            'Dune: Part Two',
            'Sci-Fi',
            166,
            17,
            'dune_part_two.jpg',
            'Studio 5',
            '20:00',
            '26-09-2026',
            'IMAX'
        )
    ];
}


$aksi = isset($_POST['aksi']) ? $_POST['aksi'] : '';


// ==================== TAMBAH DATA ====================

if ($aksi == 'tambah') {

    $idTiket = isset($_POST['idTiket']) ? trim($_POST['idTiket']) : '';
    $nomorKursi = isset($_POST['nomorKursi']) ? trim($_POST['nomorKursi']) : '';
    $harga = isset($_POST['harga']) ? $_POST['harga'] : '';
    $statusTiket = isset($_POST['statusTiket']) ? trim($_POST['statusTiket']) : '';
    $judulFilm = isset($_POST['judulFilm']) ? trim($_POST['judulFilm']) : '';
    $genre = isset($_POST['genre']) ? trim($_POST['genre']) : '';
    $durasi = isset($_POST['durasi']) ? $_POST['durasi'] : '';
    $ratingUsia = isset($_POST['ratingUsia']) ? $_POST['ratingUsia'] : '';
    $studio = isset($_POST['studio']) ? trim($_POST['studio']) : '';
    $jamTayang = isset($_POST['jamTayang']) ? $_POST['jamTayang'] : '';
    $tanggalTayang = isset($_POST['tanggalTayang']) ? $_POST['tanggalTayang'] : '';
    $jenisStudio = isset($_POST['jenisStudio']) ? trim($_POST['jenisStudio']) : '';


    // ==================== VALIDASI ====================

    if ($idTiket == '') {
        echo "<script>
                alert('Error: ID Tiket tidak boleh kosong.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek ID sudah digunakan

    foreach ($_SESSION['daftarTiket'] as $tiket) {
        if ($tiket->getIdTiket() == $idTiket) {
            echo "<script>
                    alert('Error: ID Tiket sudah digunakan.');
                    window.location='index.php';
                  </script>";
            exit;
        }
    }


    // Cek harga

    if (!is_numeric($harga)) {
        echo "<script>
                alert('Error: Harga harus berupa angka.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek durasi

    if (!is_numeric($durasi)) {
        echo "<script>
                alert('Error: Durasi harus berupa angka.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek rating

    if (!is_numeric($ratingUsia)) {
        echo "<script>
                alert('Error: Rating Usia harus berupa angka.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek harga tidak negatif

    if ($harga < 0) {
        echo "<script>
                alert('Error: Harga tidak boleh negatif.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek durasi tidak negatif

    if ($durasi < 0) {
        echo "<script>
                alert('Error: Durasi tidak boleh negatif.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek rating tidak negatif

    if ($ratingUsia < 0) {
        echo "<script>
                alert('Error: Rating Usia tidak boleh negatif.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek jam

    if (
        !preg_match(
            '/^([01][0-9]|2[0-3]):([0-5][0-9])$/',
            $jamTayang
        )
    ) {
        echo "<script>
                alert('Error: Format jam harus HH:MM dan berada pada 00:00 - 23:59.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Cek tanggal

    $tanggalValid = DateTime::createFromFormat(
        'd-m-Y',
        $tanggalTayang
    );

    if (
        !$tanggalValid ||
        $tanggalValid->format('d-m-Y') != $tanggalTayang
    ) {
        echo "<script>
                alert('Error: Format tanggal harus DD-MM-YYYY dan tanggal harus valid.');
                window.location='index.php';
              </script>";
        exit;
    }


    // ==================== UPLOAD GAMBAR ====================

    if (
        !isset($_FILES['gambar']) ||
        $_FILES['gambar']['error'] != 0
    ) {
        echo "<script>
                alert('Error: Gambar film wajib dipilih.');
                window.location='index.php';
              </script>";
        exit;
    }


    $tipeGambar = $_FILES['gambar']['type'];

    $formatGambar = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/webp'
    ];

    if (!in_array($tipeGambar, $formatGambar)) {
        echo "<script>
                alert('Error: Format gambar harus JPG, JPEG, PNG, atau WEBP.');
                window.location='index.php';
              </script>";
        exit;
    }


    // Batas ukuran 2 MB

    if ($_FILES['gambar']['size'] > 2 * 1024 * 1024) {
        echo "<script>
                alert('Error: Ukuran gambar maksimal 2 MB.');
                window.location='index.php';
              </script>";
        exit;
    }


    $folderGambar = 'images/';

    if (!is_dir($folderGambar)) {
        mkdir($folderGambar, 0777, true);
    }


    $ekstensi = pathinfo(
        $_FILES['gambar']['name'],
        PATHINFO_EXTENSION
    );

    $namaGambar = uniqid() . '.' . strtolower($ekstensi);

    $lokasiGambar = $folderGambar . $namaGambar;


    if (!move_uploaded_file(
        $_FILES['gambar']['tmp_name'],
        $lokasiGambar
    )) {
        echo "<script>
                alert('Error: Gambar gagal disimpan.');
                window.location='index.php';
              </script>";
        exit;
    }


    // ==================== BUAT OBJECT ====================

    $dataBaru = new TiketBioskop(
        $idTiket,
        $nomorKursi,
        $harga,
        $statusTiket,
        $judulFilm,
        $genre,
        $durasi,
        $ratingUsia,
        $namaGambar,
        $studio,
        $jamTayang,
        $tanggalTayang,
        $jenisStudio
    );


    // ==================== TAMBAHKAN DATA ====================

    $_SESSION['daftarTiket'][] = $dataBaru;


    echo "<script>
            alert('Data tiket berhasil ditambahkan.');
            window.location='index.php';
            </script>";

    exit;
}

?>