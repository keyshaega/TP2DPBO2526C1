#include "Tiket.h"

class TiketFilm : public Tiket {
private:
    string judulFilm;
    string genre;
    int durasi;
    int ratingUsia;

public:
    // Constructor
    TiketFilm(
        string idTiket,
        string nomorKursi,
        int harga,
        string statusTiket,
        string judulFilm,
        string genre,
        int durasi,
        int ratingUsia
    );

    // Getter
    string getJudulFilm();
    string getGenre();
    int getDurasi();
    int getRatingUsia();

    // Setter
    void setJudulFilm(string judulFilm);
    void setGenre(string genre);
    void setDurasi(int durasi);
    void setRatingUsia(int ratingUsia);
};