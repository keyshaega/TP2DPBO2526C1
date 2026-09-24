public class TiketFilm extends Tiket {
    private String judulFilm;
    private String genre;
    private int durasi;
    private int ratingUsia;

    public TiketFilm(
        String idTiket,
        String nomorKursi,
        int harga,
        String statusTiket,
        String judulFilm,
        String genre,
        int durasi,
        int ratingUsia
    ) {
        super(idTiket, nomorKursi, harga, statusTiket);

        this.judulFilm = judulFilm;
        this.genre = genre;
        this.durasi = durasi;
        this.ratingUsia = ratingUsia;
    }

    public String getJudulFilm() {
        return judulFilm;
    }

    public String getGenre() {
        return genre;
    }

    public int getDurasi() {
        return durasi;
    }

    public int getRatingUsia() {
        return ratingUsia;
    }

    public void setJudulFilm(String judulFilm) {
        this.judulFilm = judulFilm;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    public void setDurasi(int durasi) {
        this.durasi = durasi;
    }

    public void setRatingUsia(int ratingUsia) {
        this.ratingUsia = ratingUsia;
    }
}