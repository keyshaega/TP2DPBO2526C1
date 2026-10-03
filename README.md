# TP2 DPBO 2025/2026 C1 - Program Tiket Bioskop

## Janji

Saya Keysha Ega Magani dengan NIM 2507925 mengerjakan Tugas Praktikum 2 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Konsep OOP

Program ini merupakan implementasi konsep **Object-Oriented Programming (OOP)** menggunakan **multilevel inheritance**. Program dibuat dalam empat bahasa pemrograman, yaitu **C++, Java, PHP, dan Python**.

Program digunakan untuk mengelola data tiket bioskop dengan fitur utama **menampilkan data** dan **menambahkan data tiket baru**.

Program menggunakan hubungan **multilevel inheritance** dengan struktur:

```text
Tiket
  ↓
TiketFilm
  ↓
TiketBioskop
```
1. Class Tiket

   Class Tiket merupakan parent class yang menyimpan data dasar tiket.
   Atribut:
   - idTiket
   - nomorKursi
   - harga
   - statusTiket

2. Class TiketFilm

   Class TiketFilm merupakan turunan dari class Tiket.
   Atribut tambahan:
   - judulFilm
   - genre
   - durasi
   - ratingUsia
  
3. Class TiketBioskop

   Class TiketBioskop merupakan turunan dari class TiketFilm.
   Atribut tambahan:
   - studio
   - jamTayang
   - tanggalTayang
   - jenisStudio

## Fitur Program
1. Data Awal

   Program memiliki 5 objek awal sebelum user memasukkan data baru, yaitu:
   - Interstellar
   - Inside Out 2
   - Avengers: Endgame
   - Toy Story 5
   - Dune: Part Two

2. Tambah data : User dapat menambahkan data tiket baru
3. Tampil Data

   Seluruh data tiket ditampilkan dalam satu tabel.

   Tampilan data di program php :
   <img width="1869" height="827" alt="Show all" src="https://github.com/user-attachments/assets/bd13c1bc-09f9-4b3c-9c9a-c90541a7d501" />

   Tampilan data di program C++, Python dan Java :
   <img width="1676" height="546" alt="Show all data" src="https://github.com/user-attachments/assets/65a33834-ff1e-4b96-affc-f507c1046a27" />

   Lebar setiap kolom pada program C++, Python, dan Java disesuaikan berdasarkan data terpanjang sehingga isi tabel tetap rapi ketika data baru ditambahkan (tabel dinamis).

4. Error Handling

   Program memiliki validasi terhadap beberapa input yang tidak sesuai. Data yang tidak valid tidak akan ditambahkan ke dalam daftar tiket.

   Validasi yang diterapkan antara lain:
   - ID tiket tidak boleh kosong.
   - ID tiket tidak boleh sama dengan data yang sudah ada.
   - Harga harus berupa angka dan tidak boleh negatif.
   - Durasi harus berupa angka dan tidak boleh negatif.
   - Rating usia harus berupa angka.
   - Jam tayang harus menggunakan format yang sesuai.
   - Tanggal tayang harus menggunakan format yang sesuai dan merupakan tanggal yang valid.

     Tampilan error handling :
     
     <img width="645" height="215" alt="Error handling (2)" src="https://github.com/user-attachments/assets/399ca256-59d6-4646-b573-990512f31245" />

      <img width="668" height="776" alt="Error handling (1)" src="https://github.com/user-attachments/assets/6424b05f-d24a-499d-bca1-66dc1fb0226c" />

## Struktur Class

```text
┌──────────────────────┐
│        Tiket         │
├──────────────────────┤
│ - idTiket            │
│ - nomorKursi         │
│ - harga              │
│ - statusTiket        │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│      TiketFilm       │
├──────────────────────┤
│ - judulFilm          │
│ - genre              │
│ - durasi             │
│ - ratingUsia         │
└──────────┬───────────┘
           │
           ▼
┌──────────────────────┐
│     TiketBioskop     │
├──────────────────────┤
│ - studio             │
│ - jamTayang          │
│ - tanggalTayang      │
│ - jenisStudio        │
└──────────────────────┘
```

## Struktur Folder

```text
TP2DPBO2526C1/
│
├── cpp/
│   ├── Main.cpp
│   ├── Tiket.cpp
│   ├── Tiket.h
│   ├── TiketFilm.cpp
│   ├── TiketFilm.h
│   ├── TiketBioskop.cpp
│   └── TiketBioskop.h
│
├── java/
│   ├── Main.java
│   ├── Tiket.java
│   ├── TiketFilm.java
│   └── TiketBioskop.java
│
├── python/
│   ├── Main.py
│   ├── Tiket.py
│   ├── TiketFilm.py
│   └── TiketBioskop.py
│
├── php/
│   ├── Index.php
│   ├── proses.php
│   ├── style.css
│   ├── Tiket.php
│   ├── TiketFilm.php
│   ├── TiketBioskop.php
│   └── images/
│
├── dokumentasi/
│   ├── cpp/
│   ├── java/
│   ├── php/
│   └── python/
│
├── design.png
└── input.txt

```
