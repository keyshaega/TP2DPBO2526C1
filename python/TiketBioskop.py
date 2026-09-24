from TiketFilm import TiketFilm


class TiketBioskop(TiketFilm):
    def __init__(
        self,
        idTiket,
        nomorKursi,
        harga,
        statusTiket,
        judulFilm,
        genre,
        durasi,
        ratingUsia,
        studio,
        jamTayang,
        tanggalTayang,
        jenisStudio
    ):
        super().__init__(
            idTiket,
            nomorKursi,
            harga,
            statusTiket,
            judulFilm,
            genre,
            durasi,
            ratingUsia
        )

        self.__studio = str(studio)
        self.__jamTayang = str(jamTayang)
        self.__tanggalTayang = str(tanggalTayang)
        self.__jenisStudio = str(jenisStudio)

    def getStudio(self):
        return self.__studio

    def getJamTayang(self):
        return self.__jamTayang

    def getTanggalTayang(self):
        return self.__tanggalTayang

    def getJenisStudio(self):
        return self.__jenisStudio

    def setStudio(self, studio):
        self.__studio = str(studio)

    def setJamTayang(self, jamTayang):
        self.__jamTayang = str(jamTayang)

    def setTanggalTayang(self, tanggalTayang):
        self.__tanggalTayang = str(tanggalTayang)

    def setJenisStudio(self, jenisStudio):
        self.__jenisStudio = str(jenisStudio)