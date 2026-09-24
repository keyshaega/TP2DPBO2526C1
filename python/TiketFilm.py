from Tiket import Tiket


class TiketFilm(Tiket):
    def __init__(
        self,
        idTiket,
        nomorKursi,
        harga,
        statusTiket,
        judulFilm,
        genre,
        durasi,
        ratingUsia
    ):
        super().__init__(
            idTiket,
            nomorKursi,
            harga,
            statusTiket
        )

        self.__judulFilm = str(judulFilm)
        self.__genre = str(genre)
        self.__durasi = int(durasi)
        self.__ratingUsia = int(ratingUsia)

    def getJudulFilm(self):
        return self.__judulFilm

    def getGenre(self):
        return self.__genre

    def getDurasi(self):
        return self.__durasi

    def getRatingUsia(self):
        return self.__ratingUsia

    def setJudulFilm(self, judulFilm):
        self.__judulFilm = str(judulFilm)

    def setGenre(self, genre):
        self.__genre = str(genre)

    def setDurasi(self, durasi):
        self.__durasi = int(durasi)

    def setRatingUsia(self, ratingUsia):
        self.__ratingUsia = int(ratingUsia)