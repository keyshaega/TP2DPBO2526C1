#include "TiketFilm.h"

// Constructor
TiketFilm::TiketFilm(
    string idTiket,
    string nomorKursi,
    int harga,
    string statusTiket,
    string judulFilm,
    string genre,
    int durasi,
    int ratingUsia
) : Tiket(idTiket, nomorKursi, harga, statusTiket) {

    this->judulFilm = judulFilm;
    this->genre = genre;
    this->durasi = durasi;
    this->ratingUsia = ratingUsia;
}

// Getter
string TiketFilm::getJudulFilm() {
    return judulFilm;
}

string TiketFilm::getGenre() {
    return genre;
}

int TiketFilm::getDurasi() {
    return durasi;
}

int TiketFilm::getRatingUsia() {
    return ratingUsia;
}

// Setter
void TiketFilm::setJudulFilm(string judulFilm) {
    this->judulFilm = judulFilm;
}

void TiketFilm::setGenre(string genre) {
    this->genre = genre;
}

void TiketFilm::setDurasi(int durasi) {
    this->durasi = durasi;
}

void TiketFilm::setRatingUsia(int ratingUsia) {
    this->ratingUsia = ratingUsia;
}