public class Tiket {
    private String idTiket;
    private String nomorKursi;
    private int harga;
    private String statusTiket;

    public Tiket(String idTiket, String nomorKursi, int harga, String statusTiket) {
        this.idTiket = idTiket;
        this.nomorKursi = nomorKursi;
        this.harga = harga;
        this.statusTiket = statusTiket;
    }

    public String getIdTiket() {
        return idTiket;
    }

    public String getNomorKursi() {
        return nomorKursi;
    }

    public int getHarga() {
        return harga;
    }

    public String getStatusTiket() {
        return statusTiket;
    }

    public void setIdTiket(String idTiket) {
        this.idTiket = idTiket;
    }

    public void setNomorKursi(String nomorKursi) {
        this.nomorKursi = nomorKursi;
    }

    public void setHarga(int harga) {
        this.harga = harga;
    }

    public void setStatusTiket(String statusTiket) {
        this.statusTiket = statusTiket;
    }
}