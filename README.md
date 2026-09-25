# TP2DPBO2526C1 
## Janji
Saya Keysha Ega magani dengan NIM 2507925 mengerjakan Tugas Praktikum 2 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Program Tiket Bioskop
Program ini terdiri dari 3 class, yaitu Tiket, TiketFilm, dan TiketBioskop. Program menggunakan konsep multilevel inheritance dengan urutan:

Tiket → TiketFilm → TiketBioskop

Class `Tiket` berisi data dasar tiket, `TiketFilm` menambahkan data mengenai film, sedangkan `TiketBioskop` menambahkan data mengenai penayangan di bioskop.

Atribut yang digunakan yaitu:

- **Tiket**
  - ID Tiket
  - Nomor Kursi
  - Harga
  - Status Tiket
  - 
- **TiketFilm**
  - Judul Film
  - Genre
  - Durasi
  - Rating Usia
  - 
- **TiketBioskop**
  - Studio
  - Jam Tayang
  - Tanggal Tayang
  - Jenis Studio

Program juga menggunakan encapsulation dengan atribut private, serta getter, setter, dan constructor pada setiap class.

Terdapat 5 data awal yang ditampilkan sebelum user dapat menambahkan data baru. User juga dapat memasukkan data tiket baru melalui input yang tersedia.

## Tampilan Program

Untuk tampilan data pada program Python, Java, dan C++ menggunakan tabel dinamis, kurang lebih seperti berikut:

<img width="1706" height="340" alt="Hasil add data" src="https://github.com/user-attachments/assets/b34d0174-346c-41e0-8109-df67287ffd11" />


Sedangkan untuk PHP, program dibuat dalam bentuk website sehingga tampilannya seperti berikut:

<img width="1869" height="827" alt="Show all" src="https://github.com/user-attachments/assets/488500fe-d00d-42ef-8c88-cb6efb654f11" />


Fitur utamanya adalah input data, berikut contoh tampilan input data pada program Python, Java, dan C++ :

<img width="1745" height="728" alt="Add data" src="https://github.com/user-attachments/assets/e8b79651-ea4a-4d6b-a1da-616de721fbb1" />

dan berikut tampilan input data pada program PHP :

<img width="1844" height="797" alt="Screenshot (826)" src="https://github.com/user-attachments/assets/6f727a90-fcd4-4ca8-b63d-148e03ee8e34" />


## Error Handling

Program memiliki beberapa validasi untuk menangani input yang tidak sesuai, seperti ID yang kosong atau duplikat, input angka yang tidak valid, harga/durasi negatif, serta format jam dan tanggal yang salah.

<img width="633" height="743" alt="Error handling (2)" src="https://github.com/user-attachments/assets/7cd4559d-f186-4cff-956b-1b45fad59232" />
