#include "TiketBioskop.h"

// Constructor
TiketBioskop::TiketBioskop(
    string idTiket,
    string nomorKursi,
    int harga,
    string statusTiket,
    string judulFilm,
    string genre,
    int durasi,
    int ratingUsia,
    string studio,
    string jamTayang,
    string tanggalTayang,
    string jenisStudio
) : TiketFilm(
        idTiket,
        nomorKursi,
        harga,
        statusTiket,
        judulFilm,
        genre,
        durasi,
        ratingUsia
    ) {

    this->studio = studio;
    this->jamTayang = jamTayang;
    this->tanggalTayang = tanggalTayang;
    this->jenisStudio = jenisStudio;
}

// Getter
string TiketBioskop::getStudio() {
    return studio;
}

string TiketBioskop::getJamTayang() {
    return jamTayang;
}

string TiketBioskop::getTanggalTayang() {
    return tanggalTayang;
}

string TiketBioskop::getJenisStudio() {
    return jenisStudio;
}

// Setter
void TiketBioskop::setStudio(string studio) {
    this->studio = studio;
}

void TiketBioskop::setJamTayang(string jamTayang) {
    this->jamTayang = jamTayang;
}

void TiketBioskop::setTanggalTayang(string tanggalTayang) {
    this->tanggalTayang = tanggalTayang;
}

void TiketBioskop::setJenisStudio(string jenisStudio) {
    this->jenisStudio = jenisStudio;
}