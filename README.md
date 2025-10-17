![alt text](public/homepage.jpg?raw=true)
![alt text](public/daftar.jpg?raw=true)
![alt text](public/login.jpg?raw=true)
![alt text](public/barang.jpg?raw=true)
![alt text](public/editbarang.jpg?raw=true)
![alt text](public/kategori.jpg?raw=true)
![alt text](public/editkategori.jpg?raw=true)
![alt text](public/tambahkategori.jpg?raw=true)
![alt text](public/pemijaman.jpg?raw=true)
![alt text](public/tambahpeminjam.jpg?raw=true)



<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Aplikasi Inventaris Barang

Pada proyek aplikasi ini, kami menggunakan Laragon
sebagai lingkungan pengembangan (development environment).
Laragon memudahkan proses pembuatan proyek Laravel karena
sudah menyediakan web server (Apache), database server
(MySQL), dan PHP secara terintegrasi. Selain itu, Laragon juga
mendukung virtual host sehingga aplikasi bisa dijalankan di
browser dengan alamat yang mudah diingat.
Untuk pengelolaan database, digunakan phpMyAdmin
yang sudah termasuk di dalam Laragon. Tools ini membantu
dalam membuat tabel, relasi antar tabel, serta melakukan
pengujian query database secara visual.
Selain itu, proyek ini dibangun dengan framework
Laravel, yang menerapkan konsep MVC (Model-ViewController). Framework ini membantu membuat struktur kode
yang rapi, terpisah antara bagian tampilan, logika, dan data,
sehingga aplikasi lebih mudah dikembangkan.

## Fitur Utama

Berikut adalah fitur-fitur utama yang telah berhasil diterapkan
pada aplikasi inventaris barang:
1. Login dan Registrasi Pengguna
Pengguna dapat melakukan login menggunakan akun
masing-masing. Admin memiliki hak akses penuh untuk
mengelola data, sedangkan user hanya dapat melihat atau
meminjam barang.
2. Dashboard
Menampilkan ringkasan data inventaris, seperti total
jumlah barang, kondisi barang, serta aktivitas terakhir.
3. Manajemen Barang
Fitur utama aplikasi, berfungsi untuk menambah,
mengedit, dan menghapus data barang.
Barang memiliki atribut seperti nama, kode, kategori,
jumlah, satuan, kondisi, gambar, dan keterangan.
4. Preview Gambar dengan Pop-up
Salah satu fitur interaktif yang ditambahkan adalah popup gambar yang muncul saat kursor diarahkan ke nama
barang.
Gambar barang diambil dari folder public/uploads/
dan ditampilkan secara otomatis di halaman daftar
barang.
5. Manajemen Kategori Barang
Admin dapat menambah atau menghapus kategori sesuai
jenis barang yang dimiliki laboratorium.
6. Pengecekan atau Peminjaman Barang
Fitur tambahan untuk mencatat aktivitas peminjaman
dan pengembalian barang.
7. Dapat Responsif
