# Gotham - Library
project-perpustakaan-php-oop

Changelog (22/08/2022) ©2022
Project Tugas Akhir Pemrograman Web dan Perangkat Bergerak

Untuk dokumentasi lebih lanjutnya bisa buka pdf yang ada pada folder laporan studi kasus


Pembuat 	: Ammar Ayyis Azizan
Absen		: 04
Kelas		: XI RPL 1

Menggunakan	: 
- Bootstrap 5 
- Jquery
- DataTables
- Html2Pdf
- PopperJs 
- Font Awesome
- SweetAlert2
- File Upload With Preview

host 		: localhost
user 		: root
password	: ''
Nama Database 	: Perpus


Studi Kasus PWPB [24][02]

Pengelolaan Perpustakaan

Intinyaa kita buat website dimana hanya admin yang bisa login dan juga yang admin lakukan ialah CRUD untuk member perpus, CRUD data pustaka dan juga membuat laporan mengenai peminjaman dan pengembalian data buku dan juga bebrapa laporan lainnya. Dengan cara pembuatan website yang komplex dari mulai membuat DFD(data Flow Diagram), kemudian membuat flowchart, membuat perancangan database (table apa saja yang diperlukan dan akan seperti apa nanti jadinya) Buat ERD dan jugaa membuat sketsa awal interface berupa wireframe, kemudian baru memulai coding website kita tersebut.

pustaka : buku

1.Skeanrio pendaftaran anggota
ada 2 jenis pengunjung: - Pengunjung biasa
                                        - Pengunjung member
untuk menjadi member daftar ke pustakawan

2.Skeanario pencarian pustaka
tidak terpakai


3.Skeanario peminjaman pustaka
untuk peminjaman diharuskan menunjukan kartu member
[1]table peminjaman:
- no peminjaman {primary
- tanggal peminjaman
- nama anggota dari table anggota
- nama pustaka dari table pustaka
Setiap anggota maks meminjam 3 buku dan dengan waktu peminjaman 10 hari dari masa pinjam (denda = telat pengembalian * 2rb)

4.pengembalian pustaka dan denda
[2]table pengembalian:
- no pengembalian {primary}
- jatuh tempo pengembalian
- lama pengembalian
- nama anggota dari table anggota
- nama pustaka dari table pustaka
- no peminjaman
- tanggal pengembalian
- banyak denda

5. Pembuatan laporan
laporan peminjaman bulanan (dari table peminjaman where bulan sesuai bulan)
laporan pengembalian bulanan (dari table bulanan where bulan sesuai bulan)
laporan rekap dana bulanan (dari table pengembalian dihitung sesuai bulan) dan anggota yang meminjam
laporan pustaka buku (banyak jumlah buku)
laporan anggota baru (banyak anggota baru perbulan)


6.Skenario manajemen pustaka
[3]table pustaka:
- nomor pustaka {primary}
- nomor rak [gajadi karna rasanya useless]
- judul pustaka y
- pengarang y
- tahun terbit
- penerbit y
- tipe pustaka (buku,majalah, jurnal) y
- tanggal masuk (date) y

7.mnajemen anggota
[4]table anggota:
- no anggota {primary
- nama anggota
- jenis kelamin
- tanggal lahir
- nomor telepon
- kelas 
- kompetensi keahlian
- alamat


SMK Negeri 1 Cibinong mempunyai 10 Jurusan Kompetensi Keahlian yaitu :

01 Teknik Pemesinan
02 Teknik Kendaraan Ringan
03 Teknik Komputer Jaringan
04 Teknik Gambar Bangunan / DPIB
05 Teknik Konstruksi Kayu / BKP
06 Teknik Fabrikasi Logam dan Manufakturing
07 Teknik Otomasi Industri
08 Multimedia
09 Rekayasa Perangkat Lunak
10 Sistem Informasi Jaringan dan Aplikasi


 
