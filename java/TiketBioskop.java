public class TiketBioskop extends TiketFilm {
    private String studio;
    private String jamTayang;
    private String tanggalTayang;
    private String jenisStudio;

    public TiketBioskop(
        String idTiket,
        String nomorKursi,
        int harga,
        String statusTiket,
        String judulFilm,
        String genre,
        int durasi,
        int ratingUsia,
        String studio,
        String jamTayang,
        String tanggalTayang,
        String jenisStudio
    ) {
        super(
            idTiket,
            nomorKursi,
            harga,
            statusTiket,
            judulFilm,
            genre,
            durasi,
            ratingUsia
        );

        this.studio = studio;
        this.jamTayang = jamTayang;
        this.tanggalTayang = tanggalTayang;
        this.jenisStudio = jenisStudio;
    }

    public String getStudio() {
        return studio;
    }

    public String getJamTayang() {
        return jamTayang;
    }

    public String getTanggalTayang() {
        return tanggalTayang;
    }

    public String getJenisStudio() {
        return jenisStudio;
    }

    public void setStudio(String studio) {
        this.studio = studio;
    }

    public void setJamTayang(String jamTayang) {
        this.jamTayang = jamTayang;
    }

    public void setTanggalTayang(String tanggalTayang) {
        this.tanggalTayang = tanggalTayang;
    }

    public void setJenisStudio(String jenisStudio) {
        this.jenisStudio = jenisStudio;
    }
}