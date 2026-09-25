<?php

require_once 'TiketBioskop.php';

session_start();


// ==================== DATA AWAL ====================

$dataAwal = [
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


// Kalau session lama / tidak valid, gunakan 5 data awal

if (!$sessionValid) {

    $_SESSION['daftarTiket'] = $dataAwal;

}

// ==================== SEARCH ====================

$keyword = isset($_GET['search']) ? trim($_GET['search']) : '';

$hasilTiket = [];

foreach ($_SESSION['daftarTiket'] as $tiket) {

    if (
        $keyword == '' ||
        stripos($tiket->getIdTiket(), $keyword) !== false ||
        stripos($tiket->getJudulFilm(), $keyword) !== false
    ) {
        $hasilTiket[] = $tiket;
    }
}


// ==================== STATISTIK ====================

$totalTiket = count($_SESSION['daftarTiket']);

$daftarFilm = [];
$daftarStudio = [];

foreach ($_SESSION['daftarTiket'] as $tiket) {
    $daftarFilm[] = $tiket->getJudulFilm();
    $daftarStudio[] = $tiket->getStudio();
}

$totalFilm = count(array_unique($daftarFilm));
$totalStudio = count(array_unique($daftarStudio));

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manajemen Tiket Bioskop</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <link rel="stylesheet" href="style.css">

</head>


<body>

<div class="container py-5">

    <!-- HEADER -->

    <div class="header-section mb-4">

        <div>
            <p class="small-title">SISTEM INFORMASI BIOSKOP</p>

            <h1>Manajemen Tiket Bioskop</h1>

            <p class="subtitle">
                Kelola data tiket, film, dan jadwal tayang bioskop.
            </p>
        </div>

    </div>


    <!-- STATISTIK -->

    <div class="row g-4 mb-4">

        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-label">
                    TOTAL TIKET
                </div>

                <div class="stat-number">
                    <?= $totalTiket ?>
                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-label">
                    TOTAL FILM
                </div>

                <div class="stat-number">
                    <?= $totalFilm ?>
                </div>

            </div>

        </div>


        <div class="col-md-4">

            <div class="stat-card">

                <div class="stat-label">
                    TOTAL STUDIO
                </div>

                <div class="stat-number">
                    <?= $totalStudio ?>
                </div>

            </div>

        </div>

    </div>


    <!-- FORM TAMBAH -->

    <div class="section-card mb-4">

        <div class="section-header">

            <div>

                <p class="small-title">ADD DATA</p>

                <h2>Tambah Tiket</h2>

            </div>

        </div>


        <form action="proses.php" method="POST"  enctype="multipart/form-data">

            <input
                type="hidden"
                name="aksi"
                value="tambah"
            >


            <div class="row g-3">


                <!-- ID TIKET -->

                <div class="col-md-3">

                    <label class="form-label">
                        ID Tiket
                    </label>

                    <input
                        type="text"
                        name="idTiket"
                        class="form-control"
                        placeholder="Contoh: T006"
                        required
                    >

                </div>


                <!-- NOMOR KURSI -->

                <div class="col-md-3">

                    <label class="form-label">
                        Nomor Kursi
                    </label>

                    <input
                        type="text"
                        name="nomorKursi"
                        class="form-control"
                        placeholder="Contoh: F08"
                        required
                    >

                </div>


                <!-- HARGA -->

                <div class="col-md-3">

                    <label class="form-label">
                        Harga
                    </label>

                    <input
                        type="number"
                        name="harga"
                        class="form-control"
                        placeholder="Contoh: 50000"
                        min="0"
                        required
                    >

                </div>


                <!-- STATUS -->

                <div class="col-md-3">

                    <label class="form-label">
                        Status Tiket
                    </label>

                    <select
                        name="statusTiket"
                        class="form-select"
                        required
                    >

                        <option value="Aktif">
                            Aktif
                        </option>

                        <option value="Tidak Aktif">
                            Tidak Aktif
                        </option>

                    </select>

                </div>


                <!-- JUDUL FILM -->

                <div class="col-md-6">

                    <label class="form-label">
                        Judul Film
                    </label>

                    <input
                        type="text"
                        name="judulFilm"
                        class="form-control"
                        placeholder="Contoh: Avatar"
                        required
                    >

                </div>


                <!-- GENRE -->

                <div class="col-md-3">

                    <label class="form-label">
                        Genre
                    </label>

                    <input
                        type="text"
                        name="genre"
                        class="form-control"
                        placeholder="Contoh: Action"
                        required
                    >

                </div>


                <!-- DURASI -->

                <div class="col-md-3">

                    <label class="form-label">
                        Durasi (menit)
                    </label>

                    <input
                        type="number"
                        name="durasi"
                        class="form-control"
                        placeholder="Contoh: 120"
                        min="0"
                        required
                    >

                </div>


                <!-- RATING USIA -->

                <div class="col-md-3">

                    <label class="form-label">
                        Rating Usia
                    </label>

                    <input
                        type="number"
                        name="ratingUsia"
                        class="form-control"
                        placeholder="Contoh: 13"
                        min="0"
                        required
                    >

                </div>

                <div class="col-md-6">
                    <label class="form-label">Poster / Gambar Film</label>
                    <input
                        type="file"
                        name="gambar"
                        class="form-control"
                        accept="image/*"
                        required
                    >
                </div>

                <!-- STUDIO -->

                <div class="col-md-3">

                    <label class="form-label">
                        Studio
                    </label>

                    <input
                        type="text"
                        name="studio"
                        class="form-control"
                        placeholder="Contoh: Studio 6"
                        required
                    >

                </div>


                <!-- JAM TAYANG -->

                <div class="col-md-3">

                    <label class="form-label">
                        Jam Tayang
                    </label>

                    <input
                        type="time"
                        name="jamTayang"
                        class="form-control"
                        required
                    >

                </div>


                <!-- TANGGAL TAYANG -->

                <div class="col-md-3">

                    <label class="form-label">
                        Tanggal Tayang
                    </label>

                    <input
                        type="text"
                        name="tanggalTayang"
                        class="form-control"
                        placeholder="DD-MM-YYYY"
                        required
                    >

                </div>


                <!-- JENIS STUDIO -->

                <div class="col-md-3">

                    <label class="form-label">
                        Jenis Studio
                    </label>

                    <select
                        name="jenisStudio"
                        class="form-select"
                        required
                    >

                        <option value="Regular">
                            Regular
                        </option>

                        <option value="IMAX">
                            IMAX
                        </option>

                    </select>

                </div>


                <!-- BUTTON -->

                <div class="col-12 mt-4">

                    <button
                        type="submit"
                        class="btn btn-add"
                    >
                        + Tambah Tiket
                    </button>

                </div>

            </div>

        </form>

    </div>


    <!-- DATA TIKET -->

    <div class="section-card">

        <div class="section-header">

            <div>

                <p class="small-title">
                    DATABASE
                </p>

                <h2>Daftar Tiket</h2>

            </div>


            <!-- SEARCH -->

            <form
                method="GET"
                class="search-form"
            >

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari ID atau judul film..."
                    value="<?= htmlspecialchars($keyword) ?>"
                >

                <button
                    type="submit"
                    class="btn btn-search"
                >
                    Cari
                </button>

            </form>

        </div>


        <!-- TABLE -->

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Kursi</th>

                        <th>Harga</th>

                        <th>Status</th>

                        <th>Gambar</th>

                        <th>Judul Film</th>

                        <th>Genre</th>

                        <th>Durasi</th>

                        <th>Rating</th>

                        <th>Studio</th>

                        <th>Jam</th>

                        <th>Tanggal</th>

                        <th>Jenis</th>

                    </tr>

                </thead>


                <tbody>

                <?php if (count($hasilTiket) > 0): ?>

                    <?php foreach ($hasilTiket as $tiket): ?>

                        <tr>

                            <td>
                                <strong>
                                    <?= htmlspecialchars($tiket->getIdTiket()) ?>
                                </strong>
                            </td>

                            <td>
                                <?= htmlspecialchars($tiket->getNomorKursi()) ?>
                            </td>

                            <td>
                                Rp <?= number_format($tiket->getHarga(), 0, ',', '.') ?>
                            </td>

                            <td>

                                <span class="status-badge">

                                    <?= htmlspecialchars($tiket->getStatusTiket()) ?>

                                </span>

                            </td>

                            <td>
                                <img
                                    src="images/<?php echo htmlspecialchars($tiket->getGambar()); ?>"
                                    alt="<?php echo htmlspecialchars($tiket->getJudulFilm()); ?>"
                                    class="poster-film"
                            </td>

                            <td>
                                <?= htmlspecialchars($tiket->getJudulFilm()) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($tiket->getGenre()) ?>
                            </td>

                            <td>
                                <?= $tiket->getDurasi() ?> menit
                            </td>

                            <td>
                                <?= $tiket->getRatingUsia() ?>+
                            </td>

                            <td>
                                <?= htmlspecialchars($tiket->getStudio()) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($tiket->getJamTayang()) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($tiket->getTanggalTayang()) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($tiket->getJenisStudio()) ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td
                            colspan="12"
                            class="text-center py-5"
                        >

                            Data tiket tidak ditemukan.

                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>


</body>

</html>