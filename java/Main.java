import java.util.ArrayList;
import java.util.Scanner;

public class Main {

    static final String MERAH = "\u001B[91m";
    static final String HIJAU = "\u001B[92m";
    static final String RESET = "\u001B[0m";

    static Scanner input = new Scanner(System.in);


    // Fungsi untuk membaca input angka
    public static int inputAngka(String pesan) {
        boolean valid = false;
        int angka = 0;

        while (!valid) {
            System.out.print(pesan);
            String inputData = input.nextLine();

            try {
                angka = Integer.parseInt(inputData);
                valid = true;
            } catch (NumberFormatException e) {
                System.out.print(MERAH);
                System.out.println("Error: Input harus berupa angka.");
                System.out.print(RESET);
            }
        }

        return angka;
    }


    // Fungsi untuk membaca input jam
    public static String inputJam(String pesan) {
        String jam = "";
        boolean valid = false;

        while (!valid) {
            System.out.print(pesan);
            jam = input.nextLine();

            if (
                jam.length() == 5 &&
                jam.charAt(2) == ':' &&
                Character.isDigit(jam.charAt(0)) &&
                Character.isDigit(jam.charAt(1)) &&
                Character.isDigit(jam.charAt(3)) &&
                Character.isDigit(jam.charAt(4))
            ) {
                int jamAngka = Integer.parseInt(jam.substring(0, 2));
                int menitAngka = Integer.parseInt(jam.substring(3, 5));

                if (
                    jamAngka >= 0 &&
                    jamAngka <= 23 &&
                    menitAngka >= 0 &&
                    menitAngka <= 59
                ) {
                    valid = true;
                } else {
                    System.out.print(MERAH);
                    System.out.println(
                        "Error: Jam harus dalam format HH:MM " +
                        "dan berada pada 00:00 - 23:59."
                    );
                    System.out.print(RESET);
                }

            } else {
                System.out.print(MERAH);
                System.out.println("Error: Format jam harus HH:MM.");
                System.out.print(RESET);
            }
        }

        return jam;
    }


    // Fungsi untuk membaca input tanggal
    public static String inputTanggal(String pesan) {
        String tanggal = "";
        boolean valid = false;

        while (!valid) {
            System.out.print(pesan);
            tanggal = input.nextLine();

            if (
                tanggal.length() == 10 &&
                tanggal.charAt(2) == '-' &&
                tanggal.charAt(5) == '-' &&
                Character.isDigit(tanggal.charAt(0)) &&
                Character.isDigit(tanggal.charAt(1)) &&
                Character.isDigit(tanggal.charAt(3)) &&
                Character.isDigit(tanggal.charAt(4)) &&
                Character.isDigit(tanggal.charAt(6)) &&
                Character.isDigit(tanggal.charAt(7)) &&
                Character.isDigit(tanggal.charAt(8)) &&
                Character.isDigit(tanggal.charAt(9))
            ) {
                int hari = Integer.parseInt(tanggal.substring(0, 2));
                int bulan = Integer.parseInt(tanggal.substring(3, 5));
                int tahun = Integer.parseInt(tanggal.substring(6, 10));

                int jumlahHari = 31;

                if (
                    bulan == 4 ||
                    bulan == 6 ||
                    bulan == 9 ||
                    bulan == 11
                ) {
                    jumlahHari = 30;

                } else if (bulan == 2) {
                    if (
                        tahun % 400 == 0 ||
                        (tahun % 4 == 0 && tahun % 100 != 0)
                    ) {
                        jumlahHari = 29;
                    } else {
                        jumlahHari = 28;
                    }
                }

                if (
                    bulan >= 1 &&
                    bulan <= 12 &&
                    hari >= 1 &&
                    hari <= jumlahHari
                ) {
                    valid = true;
                } else {
                    System.out.print(MERAH);
                    System.out.println("Error: Tanggal tidak valid.");
                    System.out.print(RESET);
                }

            } else {
                System.out.print(MERAH);
                System.out.println(
                    "Error: Format tanggal harus DD-MM-YYYY."
                );
                System.out.print(RESET);
            }
        }

        return tanggal;
    }


    // Mengecek apakah ID sudah digunakan
    public static boolean idSudahAda(
        ArrayList<TiketBioskop> daftarTiket,
        String idTiket
    ) {
        boolean ditemukan = false;

        for (TiketBioskop tiket : daftarTiket) {
            if (tiket.getIdTiket().equals(idTiket)) {
                ditemukan = true;
            }
        }

        return ditemukan;
    }


    // Menampilkan seluruh data dalam satu tabel
public static void tampilkanData(
    ArrayList<TiketBioskop> daftarTiket
) {
    System.out.println();

    if (daftarTiket.size() == 0) {
        System.out.println("Belum ada data tiket.");
    } else {

        // Menentukan panjang maksimal setiap kolom
        int lebarID = "ID".length();
        int lebarKursi = "Kursi".length();
        int lebarHarga = "Harga".length();
        int lebarStatus = "Status".length();
        int lebarFilm = "Film".length();
        int lebarGenre = "Genre".length();
        int lebarDurasi = "Durasi".length();
        int lebarRating = "Rating".length();
        int lebarStudio = "Studio".length();
        int lebarJam = "Jam".length();
        int lebarTanggal = "Tanggal".length();
        int lebarJenis = "Jenis".length();

        // Mengecek panjang data terpanjang
        for (TiketBioskop tiket : daftarTiket) {

            lebarID = Math.max(
                lebarID,
                tiket.getIdTiket().length()
            );

            lebarKursi = Math.max(
                lebarKursi,
                tiket.getNomorKursi().length()
            );

            lebarHarga = Math.max(
                lebarHarga,
                String.valueOf(tiket.getHarga()).length()
            );

            lebarStatus = Math.max(
                lebarStatus,
                tiket.getStatusTiket().length()
            );

            lebarFilm = Math.max(
                lebarFilm,
                tiket.getJudulFilm().length()
            );

            lebarGenre = Math.max(
                lebarGenre,
                tiket.getGenre().length()
            );

            lebarDurasi = Math.max(
                lebarDurasi,
                (tiket.getDurasi() + " menit").length()
            );

            lebarRating = Math.max(
                lebarRating,
                String.valueOf(tiket.getRatingUsia()).length()
            );

            lebarStudio = Math.max(
                lebarStudio,
                tiket.getStudio().length()
            );

            lebarJam = Math.max(
                lebarJam,
                tiket.getJamTayang().length()
            );

            lebarTanggal = Math.max(
                lebarTanggal,
                tiket.getTanggalTayang().length()
            );

            lebarJenis = Math.max(
                lebarJenis,
                tiket.getJenisStudio().length()
            );
        }

        // Tambahan 2 spasi supaya tabel tidak terlalu rapat
        lebarID += 2;
        lebarKursi += 2;
        lebarHarga += 2;
        lebarStatus += 2;
        lebarFilm += 2;
        lebarGenre += 2;
        lebarDurasi += 2;
        lebarRating += 2;
        lebarStudio += 2;
        lebarJam += 2;
        lebarTanggal += 2;
        lebarJenis += 2;

        // Menghitung panjang garis tabel
        int totalLebar =
            lebarID +
            lebarKursi +
            lebarHarga +
            lebarStatus +
            lebarFilm +
            lebarGenre +
            lebarDurasi +
            lebarRating +
            lebarStudio +
            lebarJam +
            lebarTanggal +
            lebarJenis;

        System.out.println("=".repeat(totalLebar));

        String judul = "DATA TIKET BIOSKOP JAVA";

        int spasiKiri =
            (totalLebar - judul.length()) / 2;

        System.out.println(
            " ".repeat(Math.max(0, spasiKiri)) + judul
        );

        System.out.println("=".repeat(totalLebar));

        // Header
        System.out.printf(
            "%-" + lebarID + "s" +
            "%-" + lebarKursi + "s" +
            "%-" + lebarHarga + "s" +
            "%-" + lebarStatus + "s" +
            "%-" + lebarFilm + "s" +
            "%-" + lebarGenre + "s" +
            "%-" + lebarDurasi + "s" +
            "%-" + lebarRating + "s" +
            "%-" + lebarStudio + "s" +
            "%-" + lebarJam + "s" +
            "%-" + lebarTanggal + "s" +
            "%-" + lebarJenis + "s%n",

            "ID",
            "Kursi",
            "Harga",
            "Status",
            "Film",
            "Genre",
            "Durasi",
            "Rating",
            "Studio",
            "Jam",
            "Tanggal",
            "Jenis"
        );

        System.out.println("-".repeat(totalLebar));

        // Isi tabel
        for (TiketBioskop tiket : daftarTiket) {

            System.out.printf(
                "%-" + lebarID + "s" +
                "%-" + lebarKursi + "s" +
                "%-" + lebarHarga + "d" +
                "%-" + lebarStatus + "s" +
                "%-" + lebarFilm + "s" +
                "%-" + lebarGenre + "s" +
                "%-" + lebarDurasi + "s" +
                "%-" + lebarRating + "d" +
                "%-" + lebarStudio + "s" +
                "%-" + lebarJam + "s" +
                "%-" + lebarTanggal + "s" +
                "%-" + lebarJenis + "s%n",

                tiket.getIdTiket(),
                tiket.getNomorKursi(),
                tiket.getHarga(),
                tiket.getStatusTiket(),
                tiket.getJudulFilm(),
                tiket.getGenre(),
                tiket.getDurasi() + " menit",
                tiket.getRatingUsia(),
                tiket.getStudio(),
                tiket.getJamTayang(),
                tiket.getTanggalTayang(),
                tiket.getJenisStudio()
            );
        }

        System.out.println("=".repeat(totalLebar));
    }
}

    // Menambahkan data tiket
    public static void tambahData(
        ArrayList<TiketBioskop> daftarTiket
    ) {
        System.out.println();
        System.out.println("=".repeat(53));
        System.out.println(
            "|              TAMBAH DATA TIKET JAVA               |"
        );
        System.out.println("=".repeat(53));

        System.out.print(" ID Tiket       : ");
        String idTiket = input.nextLine();

        // Mengecek ID duplikat
        if (idSudahAda(daftarTiket, idTiket)) {
            System.out.println("=".repeat(53));
            System.out.print(MERAH);
            System.out.println("Error: ID Tiket sudah digunakan.");
            System.out.print(RESET);
            System.out.println("=".repeat(53));

        } else {
            System.out.print(" Nomor Kursi    : ");
            String nomorKursi = input.nextLine();

            int harga = inputAngka(" Harga          : ");

            System.out.print(" Status Tiket   : ");
            String statusTiket = input.nextLine();

            System.out.print(" Judul Film     : ");
            String judulFilm = input.nextLine();

            System.out.print(" Genre          : ");
            String genre = input.nextLine();

            int durasi = inputAngka(" Durasi (menit) : ");

            int ratingUsia = inputAngka(" Rating Usia    : ");

            System.out.print(" Studio         : ");
            String studio = input.nextLine();

            String jamTayang = inputJam(" Jam Tayang     : ");

            String tanggalTayang =
                inputTanggal(" Tanggal Tayang : ");

            System.out.print(" Jenis Studio   : ");
            String jenisStudio = input.nextLine();

            TiketBioskop tiket = new TiketBioskop(
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
            );

            daftarTiket.add(tiket);

            System.out.println("=".repeat(53));
            System.out.print(HIJAU);
            System.out.println("Data tiket berhasil ditambahkan.");
            System.out.print(RESET);
            System.out.println("=".repeat(53));
        }
    }


    public static void main(String[] args) {

        ArrayList<TiketBioskop> daftarTiket =
            new ArrayList<>();


        // 5 OBJECT AWAL
        TiketBioskop t1 = new TiketBioskop(
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
        );

        TiketBioskop t2 = new TiketBioskop(
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
        );

        TiketBioskop t3 = new TiketBioskop(
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
        );

        TiketBioskop t4 = new TiketBioskop(
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
        );

        TiketBioskop t5 = new TiketBioskop(
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
        );


        daftarTiket.add(t1);
        daftarTiket.add(t2);
        daftarTiket.add(t3);
        daftarTiket.add(t4);
        daftarTiket.add(t5);


        int pilihan = -1;

        while (pilihan != 0) {

            System.out.println();
            System.out.println("=".repeat(41));
            System.out.println(
                "|          SISTEM BIOSKOP JAVA          |"
            );
            System.out.println("=".repeat(41));
            System.out.println("| 1. Tambah Data                        |");
            System.out.println("| 2. Tampilkan Data                     |");
            System.out.println("| 0. Keluar                             |");
            System.out.println("=".repeat(41));

            pilihan = inputAngka(" Pilih menu: ");

            if (pilihan == 1) {
                tambahData(daftarTiket);

            } else if (pilihan == 2) {
                tampilkanData(daftarTiket);

            } else if (pilihan == 0) {
                System.out.println("=".repeat(41));
                System.out.print(HIJAU);
                System.out.println("Program selesai.");
                System.out.print(RESET);
                System.out.println("=".repeat(41));

            } else {
                System.out.println("=".repeat(41));
                System.out.print(MERAH);
                System.out.println("Error: Pilihan tidak tersedia.");
                System.out.print(RESET);
                System.out.println("=".repeat(41));
            }
        }

        input.close();
    }
}