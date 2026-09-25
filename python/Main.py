from TiketBioskop import TiketBioskop


MERAH = "\033[91m"
HIJAU = "\033[92m"
RESET = "\033[0m"


# Fungsi untuk membaca input angka
def inputAngka(pesan):
    valid = False

    while not valid:
        input_data = input(pesan)

        try:
            angka = int(input_data)
            valid = True
        except ValueError:
            print(MERAH, end="")
            print("Error: Input harus berupa angka.")
            print(RESET, end="")

    return angka


# Fungsi untuk membaca input jam
def inputJam(pesan):
    valid = False

    while not valid:
        jam = input(pesan)

        if (
            len(jam) == 5
            and jam[2] == ":"
            and jam[0].isdigit()
            and jam[1].isdigit()
            and jam[3].isdigit()
            and jam[4].isdigit()
        ):
            jamAngka = int(jam[0:2])
            menitAngka = int(jam[3:5])

            if (
                jamAngka >= 0
                and jamAngka <= 23
                and menitAngka >= 0
                and menitAngka <= 59
            ):
                valid = True
            else:
                print(MERAH, end="")
                print(
                    "Error: Jam harus dalam format HH:MM "
                    "dan berada pada 00:00 - 23:59."
                )
                print(RESET, end="")
        else:
            print(MERAH, end="")
            print("Error: Format jam harus HH:MM.")
            print(RESET, end="")

    return jam


# Fungsi untuk membaca input tanggal
def inputTanggal(pesan):
    valid = False

    while not valid:
        tanggal = input(pesan)

        if (
            len(tanggal) == 10
            and tanggal[2] == "-"
            and tanggal[5] == "-"
            and tanggal[0].isdigit()
            and tanggal[1].isdigit()
            and tanggal[3].isdigit()
            and tanggal[4].isdigit()
            and tanggal[6].isdigit()
            and tanggal[7].isdigit()
            and tanggal[8].isdigit()
            and tanggal[9].isdigit()
        ):
            hari = int(tanggal[0:2])
            bulan = int(tanggal[3:5])
            tahun = int(tanggal[6:10])

            jumlahHari = 31

            if bulan == 4 or bulan == 6 or bulan == 9 or bulan == 11:
                jumlahHari = 30

            elif bulan == 2:
                if (
                    tahun % 400 == 0
                    or (tahun % 4 == 0 and tahun % 100 != 0)
                ):
                    jumlahHari = 29
                else:
                    jumlahHari = 28

            if (
                bulan >= 1
                and bulan <= 12
                and hari >= 1
                and hari <= jumlahHari
            ):
                valid = True
            else:
                print(MERAH, end="")
                print("Error: Tanggal tidak valid.")
                print(RESET, end="")

        else:
            print(MERAH, end="")
            print("Error: Format tanggal harus DD-MM-YYYY.")
            print(RESET, end="")

    return tanggal


# Mengecek apakah ID sudah digunakan
def idSudahAda(daftarTiket, idTiket):
    ditemukan = False

    for tiket in daftarTiket:
        if tiket.getIdTiket() == idTiket:
            ditemukan = True

    return ditemukan


# Menampilkan seluruh data dalam satu tabel
def tampilkanData(daftarTiket):
    print()

    if len(daftarTiket) == 0:
        print("Belum ada data tiket.")
    else:
        # Menentukan panjang maksimal setiap kolom
        lebarID = len("ID")
        lebarKursi = len("Kursi")
        lebarHarga = len("Harga")
        lebarStatus = len("Status")
        lebarFilm = len("Film")
        lebarGenre = len("Genre")
        lebarDurasi = len("Durasi")
        lebarRating = len("Rating")
        lebarStudio = len("Studio")
        lebarJam = len("Jam")
        lebarTanggal = len("Tanggal")
        lebarJenis = len("Jenis")

        # Mengecek panjang data terpanjang
        for tiket in daftarTiket:
            lebarID = max(lebarID, len(tiket.getIdTiket()))
            lebarKursi = max(lebarKursi, len(tiket.getNomorKursi()))
            lebarHarga = max(lebarHarga, len(str(tiket.getHarga())))
            lebarStatus = max(lebarStatus, len(tiket.getStatusTiket()))
            lebarFilm = max(lebarFilm, len(tiket.getJudulFilm()))
            lebarGenre = max(lebarGenre, len(tiket.getGenre()))
            lebarDurasi = max(
                lebarDurasi,
                len(str(tiket.getDurasi()) + " menit")
            )
            lebarRating = max(
                lebarRating,
                len(str(tiket.getRatingUsia()))
            )
            lebarStudio = max(lebarStudio, len(tiket.getStudio()))
            lebarJam = max(lebarJam, len(tiket.getJamTayang()))
            lebarTanggal = max(
                lebarTanggal,
                len(tiket.getTanggalTayang())
            )
            lebarJenis = max(lebarJenis, len(tiket.getJenisStudio()))

        # Tambahan 2 spasi supaya antar kolom tidak terlalu rapat
        lebarID += 2
        lebarKursi += 2
        lebarHarga += 2
        lebarStatus += 2
        lebarFilm += 2
        lebarGenre += 2
        lebarDurasi += 2
        lebarRating += 2
        lebarStudio += 2
        lebarJam += 2
        lebarTanggal += 2
        lebarJenis += 2

        # Menghitung total lebar tabel
        totalLebar = (
            lebarID + lebarKursi + lebarHarga + lebarStatus
            + lebarFilm + lebarGenre + lebarDurasi + lebarRating
            + lebarStudio + lebarJam + lebarTanggal + lebarJenis
        )

        # Garis atas tabel
        print("=" * totalLebar)

        # Judul tabel berada di tengah
        judul = "DATA TIKET BIOSKOP PYTHON"
        spasiKiri = (totalLebar - len(judul)) // 2
        print(" " * max(0, spasiKiri) + judul)

        # Garis bawah judul
        print("=" * totalLebar)

        # Header tabel
        print(
            f"{'ID':<{lebarID}}"
            f"{'Kursi':<{lebarKursi}}"
            f"{'Harga':<{lebarHarga}}"
            f"{'Status':<{lebarStatus}}"
            f"{'Film':<{lebarFilm}}"
            f"{'Genre':<{lebarGenre}}"
            f"{'Durasi':<{lebarDurasi}}"
            f"{'Rating':<{lebarRating}}"
            f"{'Studio':<{lebarStudio}}"
            f"{'Jam':<{lebarJam}}"
            f"{'Tanggal':<{lebarTanggal}}"
            f"{'Jenis':<{lebarJenis}}"
        )

        print("-" * totalLebar)

        # Menampilkan isi data
        for tiket in daftarTiket:
            print(
                f"{tiket.getIdTiket():<{lebarID}}"
                f"{tiket.getNomorKursi():<{lebarKursi}}"
                f"{tiket.getHarga():<{lebarHarga}}"
                f"{tiket.getStatusTiket():<{lebarStatus}}"
                f"{tiket.getJudulFilm():<{lebarFilm}}"
                f"{tiket.getGenre():<{lebarGenre}}"
                f"{str(tiket.getDurasi()) + ' menit':<{lebarDurasi}}"
                f"{tiket.getRatingUsia():<{lebarRating}}"
                f"{tiket.getStudio():<{lebarStudio}}"
                f"{tiket.getJamTayang():<{lebarJam}}"
                f"{tiket.getTanggalTayang():<{lebarTanggal}}"
                f"{tiket.getJenisStudio():<{lebarJenis}}"
            )

        print("=" * totalLebar)

# Menambahkan data tiket
def tambahData(daftarTiket):
    print()
    print("=" * 53)
    print("|              TAMBAH DATA TIKET PYTHON             |")
    print("=" * 53)

    idTiket = input(" ID Tiket       : ")

    # Mengecek ID duplikat
    if idSudahAda(daftarTiket, idTiket):
        print("=" * 53)
        print(MERAH, end="")
        print("Error: ID Tiket sudah digunakan.")
        print(RESET, end="")
        print("=" * 53)

    else:
        nomorKursi = input(" Nomor Kursi    : ")

        harga = inputAngka(" Harga          : ")

        statusTiket = input(" Status Tiket   : ")

        judulFilm = input(" Judul Film     : ")

        genre = input(" Genre          : ")

        durasi = inputAngka(" Durasi (menit) : ")

        ratingUsia = inputAngka(" Rating Usia    : ")

        studio = input(" Studio         : ")

        jamTayang = inputJam(" Jam Tayang     : ")

        tanggalTayang = inputTanggal(" Tanggal Tayang : ")

        jenisStudio = input(" Jenis Studio   : ")

        tiket = TiketBioskop(
            idTiket,
            nomorKursi,
            harga,
            statusTiket,
            judulFilm,
            genre,
            durasi,
            ratingUsia,
            studio,
            jamTayang,
            tanggalTayang,
            jenisStudio
        )

        daftarTiket.append(tiket)

        print("=" * 53)
        print(HIJAU, end="")
        print("Data tiket berhasil ditambahkan.")
        print(RESET, end="")
        print("=" * 53)


def main():

    daftarTiket = []

    # 5 OBJECT AWAL
    t1 = TiketBioskop(
        "T001",
        "A05",
        50000,
        "Aktif",
        "Interstellar",
        "Sci-Fi",
        169,
        13,
        "Studio 1",
        "13:00",
        "25-09-2026",
        "IMAX"
    )

    t2 = TiketBioskop(
        "T002",
        "B10",
        45000,
        "Aktif",
        "Inside Out 2",
        "Animation",
        96,
        13,
        "Studio 2",
        "15:30",
        "25-09-2026",
        "Regular"
    )

    t3 = TiketBioskop(
        "T003",
        "C07",
        55000,
        "Aktif",
        "Avengers: Endgame",
        "Action",
        181,
        13,
        "Studio 3",
        "18:00",
        "25-09-2026",
        "IMAX"
    )

    t4 = TiketBioskop(
        "T004",
        "D12",
        40000,
        "Aktif",
        "Toy Story 5",
        "Animation",
        125,
        13,
        "Studio 4",
        "16:00",
        "26-09-2026",
        "Regular"
    )

    t5 = TiketBioskop(
        "T005",
        "E03",
        60000,
        "Aktif",
        "Dune: Part Two",
        "Sci-Fi",
        166,
        17,
        "Studio 5",
        "20:00",
        "26-09-2026",
        "IMAX"
    )

    daftarTiket.append(t1)
    daftarTiket.append(t2)
    daftarTiket.append(t3)
    daftarTiket.append(t4)
    daftarTiket.append(t5)


    pilihan = -1

    while pilihan != 0:

        print()
        print("=" * 41)
        print("|          SISTEM BIOSKOP PYTHON        |")
        print("=" * 41)
        print("| 1. Tambah Data                        |")
        print("| 2. Tampilkan Data                     |")
        print("| 0. Keluar                             |")
        print("=" * 41)

        pilihan = inputAngka(" Pilih menu: ")

        if pilihan == 1:
            tambahData(daftarTiket)

        elif pilihan == 2:
            tampilkanData(daftarTiket)

        elif pilihan == 0:
            print("=" * 41)
            print(HIJAU, end="")
            print("Program selesai.")
            print(RESET, end="")
            print("=" * 41)

        else:
            print("=" * 41)
            print(MERAH, end="")
            print("Error: Pilihan tidak tersedia.")
            print(RESET, end="")
            print("=" * 41)


main()