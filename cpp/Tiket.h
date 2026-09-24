#include <string>
using namespace std;

class Tiket {
private:
    string idTiket;
    string nomorKursi;
    int harga;
    string statusTiket;

public:
    // Constructor
    Tiket(string idTiket, string nomorKursi, int harga, string statusTiket);

    // Getter
    string getIdTiket();
    string getNomorKursi();
    int getHarga();
    string getStatusTiket();

    // Setter
    void setIdTiket(string idTiket);
    void setNomorKursi(string nomorKursi);
    void setHarga(int harga);
    void setStatusTiket(string statusTiket);
};