#include "Tiket.h"

// Constructor
Tiket::Tiket(string idTiket, string nomorKursi, int harga, string statusTiket) {
    this->idTiket = idTiket;
    this->nomorKursi = nomorKursi;
    this->harga = harga;
    this->statusTiket = statusTiket;
}

// Getter
string Tiket::getIdTiket() {
    return idTiket;
}

string Tiket::getNomorKursi() {
    return nomorKursi;
}

int Tiket::getHarga() {
    return harga;
}

string Tiket::getStatusTiket() {
    return statusTiket;
}

// Setter
void Tiket::setIdTiket(string idTiket) {
    this->idTiket = idTiket;
}

void Tiket::setNomorKursi(string nomorKursi) {
    this->nomorKursi = nomorKursi;
}

void Tiket::setHarga(int harga) {
    this->harga = harga;
}

void Tiket::setStatusTiket(string statusTiket) {
    this->statusTiket = statusTiket;
}