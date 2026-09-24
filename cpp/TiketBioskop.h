#include "TiketFilm.h"

class TiketBioskop : public TiketFilm {
private:
    string studio;
    string jamTayang;
    string tanggalTayang;
    string jenisStudio;

public:
    TiketBioskop(
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
    );

    string getStudio();
    string getJamTayang();
    string getTanggalTayang();
    string getJenisStudio();

    void setStudio(string studio);
    void setJamTayang(string jamTayang);
    void setTanggalTayang(string tanggalTayang);
    void setJenisStudio(string jenisStudio);
};