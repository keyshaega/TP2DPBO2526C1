
#include <iostream>
#include <vector>
#include <iomanip>
#include <string>
#include <sstream>
#include <algorithm>
#include "TiketBioskop.h"

using namespace std;

const string MERAH = "\033[91m";
const string HIJAU = "\033[92m";
const string RESET = "\033[0m";


// Fungsi untuk membaca input angka
int inputAngka(string pesan) {
    string input;
    int angka;
    bool valid = false;

    while (!valid) {
        cout << pesan;
        getline(cin, input);

        stringstream ss(input);

        if (ss >> angka && ss.eof()) {
            valid = true;
        } else {
            cout << MERAH;
            cout << "Error: Input harus berupa angka." << endl;
            cout << RESET;
        }
    }

    return angka;
}


// Fungsi untuk membaca input jam
string inputJam(string pesan) {
    string jam;
    bool valid = false;

    while (!valid) {
        cout << pesan;
        getline(cin, jam);

        if (jam.length() == 5 &&
            jam[2] == ':' &&
            isdigit(jam[0]) &&
            isdigit(jam[1]) &&
            isdigit(jam[3]) &&
            isdigit(jam[4])) {

            int jamAngka = stoi(jam.substr(0, 2));
            int menitAngka = stoi(jam.substr(3, 2));

            if (jamAngka >= 0 && jamAngka <= 23 &&
                menitAngka >= 0 && menitAngka <= 59) {
                valid = true;
            } else {
                cout << MERAH;
                cout << "Error: Jam harus dalam format HH:MM dan berada pada 00:00 - 23:59." << endl;
                cout << RESET;
            }

        } else {
            cout << MERAH;
            cout << "Error: Format jam harus HH:MM." << endl;
            cout << RESET;
        }
    }

    return jam;
}


// Fungsi untuk membaca input tanggal
string inputTanggal(string pesan) {
    string tanggal;
    bool valid = false;

    while (!valid) {
        cout << pesan;
        getline(cin, tanggal);

        if (tanggal.length() == 10 &&
            tanggal[2] == '-' &&
            tanggal[5] == '-' &&
            isdigit(tanggal[0]) &&
            isdigit(tanggal[1]) &&
            isdigit(tanggal[3]) &&
            isdigit(tanggal[4]) &&
            isdigit(tanggal[6]) &&
            isdigit(tanggal[7]) &&
            isdigit(tanggal[8]) &&
            isdigit(tanggal[9])) {

            int hari = stoi(tanggal.substr(0, 2));
            int bulan = stoi(tanggal.substr(3, 2));
            int tahun = stoi(tanggal.substr(6, 4));

            int jumlahHari = 31;

            if (bulan == 4 || bulan == 6 || bulan == 9 || bulan == 11) {
                jumlahHari = 30;
            } else if (bulan == 2) {
                if ((tahun % 400 == 0) || (tahun % 4 == 0 && tahun % 100 != 0)) {
                    jumlahHari = 29;
                } else {
                    jumlahHari = 28;
                }
            }

            if (bulan >= 1 && bulan <= 12 &&
                hari >= 1 && hari <= jumlahHari) {
                valid = true;
            } else {
                cout << MERAH;
                cout << "Error: Tanggal tidak valid." << endl;
                cout << RESET;
            }

        } else {
            cout << MERAH;
            cout << "Error: Format tanggal harus DD-MM-YYYY." << endl;
            cout << RESET;
        }
    }

    return tanggal;
}


// Mengecek apakah ID sudah digunakan
bool idSudahAda(vector<TiketBioskop>& daftarTiket, string idTiket) {
    bool ditemukan = false;

    for (TiketBioskop& tiket : daftarTiket) {
        if (tiket.getIdTiket() == idTiket) {
            ditemukan = true;
        }
    }

    return ditemukan;
}


// Menampilkan seluruh data dalam satu tabel
void tampilkanData(vector<TiketBioskop>& daftarTiket) {
    cout << endl;

    if (daftarTiket.size() == 0) {
        cout << "Belum ada data tiket." << endl;
    } else {
        // Menentukan panjang maksimal setiap kolom
        int lebarID = string("ID").length();
        int lebarKursi = string("Kursi").length();
        int lebarHarga = string("Harga").length();
        int lebarStatus = string("Status").length();
        int lebarFilm = string("Film").length();
        int lebarGenre = string("Genre").length();
        int lebarDurasi = string("Durasi").length();
        int lebarRating = string("Rating").length();
        int lebarStudio = string("Studio").length();
        int lebarJam = string("Jam").length();
        int lebarTanggal = string("Tanggal").length();
        int lebarJenis = string("Jenis").length();

        // Mengecek panjang data terpanjang
        for (TiketBioskop& tiket : daftarTiket) {
            lebarID = max(lebarID, (int)tiket.getIdTiket().length());
            lebarKursi = max(lebarKursi, (int)tiket.getNomorKursi().length());
            lebarHarga = max(
                lebarHarga,
                (int)to_string(tiket.getHarga()).length()
            );
            lebarStatus = max(
                lebarStatus,
                (int)tiket.getStatusTiket().length()
            );
            lebarFilm = max(
                lebarFilm,
                (int)tiket.getJudulFilm().length()
            );
            lebarGenre = max(
                lebarGenre,
                (int)tiket.getGenre().length()
            );
            lebarDurasi = max(
                lebarDurasi,
                (int)(to_string(tiket.getDurasi()) + " menit").length()
            );
            lebarRating = max(
                lebarRating,
                (int)to_string(tiket.getRatingUsia()).length()
            );
            lebarStudio = max(
                lebarStudio,
                (int)tiket.getStudio().length()
            );
            lebarJam = max(
                lebarJam,
                (int)tiket.getJamTayang().length()
            );
            lebarTanggal = max(
                lebarTanggal,
                (int)tiket.getTanggalTayang().length()
            );
            lebarJenis = max(
                lebarJenis,
                (int)tiket.getJenisStudio().length()
            );
        }

        // Tambahan 2 spasi supaya antar kolom tidak terlalu rapat
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

        // Menghitung total lebar tabel
        int totalLebar =
            lebarID + lebarKursi + lebarHarga + lebarStatus +
            lebarFilm + lebarGenre + lebarDurasi + lebarRating +
            lebarStudio + lebarJam + lebarTanggal + lebarJenis;

        // Garis atas tabel
        cout << string(totalLebar, '=') << endl;

        // Judul tabel
        string judul = "DATA TIKET BIOSKOP CPP";
        int spasiKiri = (totalLebar - judul.length()) / 2;

        if (spasiKiri < 0) {
            spasiKiri = 0;
        }

        cout << string(spasiKiri, ' ') << judul << endl;

        // Garis bawah judul
        cout << string(totalLebar, '=') << endl;

        // Header tabel
        cout << left
            << setw(lebarID) << "ID"
            << setw(lebarKursi) << "Kursi"
            << setw(lebarHarga) << "Harga"
            << setw(lebarStatus) << "Status"
            << setw(lebarFilm) << "Film"
            << setw(lebarGenre) << "Genre"
            << setw(lebarDurasi) << "Durasi"
            << setw(lebarRating) << "Rating"
            << setw(lebarStudio) << "Studio"
            << setw(lebarJam) << "Jam"
            << setw(lebarTanggal) << "Tanggal"
            << setw(lebarJenis) << "Jenis"
            << endl;

        cout << string(totalLebar, '-') << endl;

        // Menampilkan isi data
        for (TiketBioskop& tiket : daftarTiket) {
            cout << left
                << setw(lebarID) << tiket.getIdTiket()
                << setw(lebarKursi) << tiket.getNomorKursi()
                << setw(lebarHarga) << tiket.getHarga()
                << setw(lebarStatus) << tiket.getStatusTiket()
                << setw(lebarFilm) << tiket.getJudulFilm()
                << setw(lebarGenre) << tiket.getGenre()
                << setw(lebarDurasi)
                << (to_string(tiket.getDurasi()) + " menit")
                << setw(lebarRating) << tiket.getRatingUsia()
                << setw(lebarStudio) << tiket.getStudio()
                << setw(lebarJam) << tiket.getJamTayang()
                << setw(lebarTanggal) << tiket.getTanggalTayang()
                << setw(lebarJenis) << tiket.getJenisStudio()
                << endl;
        }

        // Garis bawah tabel
        cout << string(totalLebar, '=') << endl;
    }
}

// Menambahkan data tiket
void tambahData(vector<TiketBioskop>& daftarTiket) {
    cout << endl;
    cout << "=====================================================" << endl;
    cout << "|              TAMBAH DATA TIKET CPP                |" << endl;
    cout << "=====================================================" << endl;

    string idTiket;

    cout << " ID Tiket       : ";
    getline(cin, idTiket);

    // Mengecek ID duplikat
    if (idSudahAda(daftarTiket, idTiket)) {
        cout << "=====================================================" << endl;
        cout << MERAH;
        cout << "Error: ID Tiket sudah digunakan." << endl;
        cout << RESET;
        cout << "=====================================================" << endl;
    } else {
        string nomorKursi;
        int harga;
        string statusTiket;
        string judulFilm;
        string genre;
        int durasi;
        int ratingUsia;
        string studio;
        string jamTayang;
        string tanggalTayang;
        string jenisStudio;

        cout << " Nomor Kursi    : ";
        getline(cin, nomorKursi);

        harga = inputAngka(" Harga          : ");

        cout << " Status Tiket   : ";
        getline(cin, statusTiket);

        cout << " Judul Film     : ";
        getline(cin, judulFilm);

        cout << " Genre          : ";
        getline(cin, genre);

        durasi = inputAngka(" Durasi (menit) : ");

        ratingUsia = inputAngka(" Rating Usia    : ");

        cout << " Studio         : ";
        getline(cin, studio);

        jamTayang = inputJam(" Jam Tayang     : ");

        tanggalTayang = inputTanggal(" Tanggal Tayang : ");

        cout << " Jenis Studio   : ";
        getline(cin, jenisStudio);

        TiketBioskop tiket(
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

        daftarTiket.push_back(tiket);

        cout << "=====================================================" << endl;
        cout << HIJAU;
        cout << "Data tiket berhasil ditambahkan." << endl;
        cout << RESET;
        cout << "=====================================================" << endl;
    }
}


int main() {

    vector<TiketBioskop> daftarTiket;

    // 5 OBJECT AWAL
    TiketBioskop t1(
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

    TiketBioskop t2(
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

    TiketBioskop t3(
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

    TiketBioskop t4(
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

    TiketBioskop t5(
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


    daftarTiket.push_back(t1);
    daftarTiket.push_back(t2);
    daftarTiket.push_back(t3);
    daftarTiket.push_back(t4);
    daftarTiket.push_back(t5);


    int pilihan = -1;

    while (pilihan != 0) {

        cout << endl;
        cout << "=========================================" << endl;
        cout << "|          SISTEM BIOSKOP CPP           |" << endl;
        cout << "=========================================" << endl;
        cout << "| 1. Tambah Data                        |" << endl;
        cout << "| 2. Tampilkan Data                     |" << endl;
        cout << "| 0. Keluar                             |" << endl;
        cout << "=========================================" << endl;

        pilihan = inputAngka(" Pilih menu: ");

        if (pilihan == 1) {
            tambahData(daftarTiket);

        } else if (pilihan == 2) {
            tampilkanData(daftarTiket);

        } else if (pilihan == 0) {
            cout << "=========================================" << endl;
            cout << HIJAU;
            cout << "Program selesai." << endl;
            cout << RESET;
            cout << "=========================================" << endl;

        } else {
            cout << "=========================================" << endl;
            cout << MERAH;
            cout << "Error: Pilihan tidak tersedia." << endl;
            cout << RESET;
            cout << "=========================================" << endl;
        }
    }

    return 0;
}