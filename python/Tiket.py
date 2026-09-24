class Tiket:
    def __init__(self, idTiket, nomorKursi, harga, statusTiket):
        self.__idTiket = str(idTiket)
        self.__nomorKursi = str(nomorKursi)
        self.__harga = int(harga)
        self.__statusTiket = str(statusTiket)

    def getIdTiket(self):
        return self.__idTiket

    def getNomorKursi(self):
        return self.__nomorKursi

    def getHarga(self):
        return self.__harga

    def getStatusTiket(self):
        return self.__statusTiket

    def setIdTiket(self, idTiket):
        self.__idTiket = str(idTiket)

    def setNomorKursi(self, nomorKursi):
        self.__nomorKursi = str(nomorKursi)

    def setHarga(self, harga):
        self.__harga = int(harga)

    def setStatusTiket(self, statusTiket):
        self.__statusTiket = str(statusTiket)