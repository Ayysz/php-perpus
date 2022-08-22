-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Apr 2022 pada 06.12
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(40) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `user`, `username`, `password`) VALUES
(1, 'doma', 'upper', '123'),
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buk` varchar(8) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `jenis` int(11) NOT NULL,
  `rak` int(1) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `thn_terbit` varchar(4) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `stok` int(3) NOT NULL,
  `cover` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `kode_buk`, `judul`, `jenis`, `rak`, `pengarang`, `penerbit`, `thn_terbit`, `tgl_masuk`, `stok`, `cover`) VALUES
(1, 'P0001', 'Bumi', 1, 3, 'Tere Liye', 'gramedia pustaka jakarta', '2014', '2022-03-24', 13, 'bumi.jpg'),
(2, 'P0002', 'Dilan: Dia adalah Dilanku tahun 1990', 4, 3, 'Pidi Baiq', 'Pastel Books', '2014', '2022-03-24', 1, 'dilan_1990.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dtl_peminjaman`
--

CREATE TABLE `dtl_peminjaman` (
  `id` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `id_pustaka` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dtl_peminjaman`
--

INSERT INTO `dtl_peminjaman` (`id`, `id_pinjam`, `id_pustaka`, `qty`) VALUES
(38, 27, 1, 1),
(39, 27, 1, 1),
(40, 29, 2, 1),
(41, 29, 1, 1),
(47, 40, 2, 1),
(49, 42, 2, 2);

--
-- Trigger `dtl_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `buku_dihapus` AFTER DELETE ON `dtl_peminjaman` FOR EACH ROW BEGIN
UPDATE buku 
SET buku.stok = buku.stok + old.qty
WHERE buku.id_buku = old.id_pustaka;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `buku_dipinjam` BEFORE INSERT ON `dtl_peminjaman` FOR EACH ROW BEGIN
UPDATE buku SET buku.stok = buku.stok - new.qty
WHERE id_buku = new.id_pustaka;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(2) NOT NULL,
  `singkatan_jurusan` varchar(6) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `singkatan_jurusan`, `nama_jurusan`) VALUES
('01', 'TP', 'Teknik Permesinan'),
('02', 'TKR', 'Teknik Kendaraan Ringan'),
('03', 'TKJ', 'Teknik Komputer Jaringan'),
('04', 'DPIB', 'Desain Pemodelan dan Informasi Bangunan'),
('05', 'BKP', 'Bisnis Konstruksi dan Properti'),
('06', 'TFLM', 'Teknik Fabrikasi Logam dan Manufakturing'),
('07', 'TOI', 'Teknik Otomasi Industri'),
('08', 'MM', 'Multimedia'),
('09', 'RPL', 'Rekayasa Perangkat Lunak'),
('10', 'SIJA', 'Sistem Informasi Jaringan dan Aplikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Buku'),
(2, 'Majalah'),
(3, 'Jurnal'),
(4, 'Novel'),
(5, 'Komik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_mem` int(11) NOT NULL,
  `no_mem` varchar(8) NOT NULL,
  `nama_mem` varchar(100) NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `kelas` enum('x','xi','xii','xiii') NOT NULL,
  `jurusan` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `maks` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_mem`, `no_mem`, `nama_mem`, `jk`, `kelas`, `jurusan`, `alamat`, `no_telp`, `tgl_lahir`, `maks`) VALUES
(1, '22090001', 'Ammar Ayyis', 'laki-laki', 'xi', '09', 'Susukan', '089677699892', '2004-10-13', 0),
(3, '22030002', 'Abyan', 'laki-laki', 'xi', '03', 'Susukan', '0813413167', '2022-03-27', 2),
(4, '22050004', 'Jupar', 'laki-laki', 'xii', '05', 'Pondok Rajeg', '08888821231', '2022-03-27', 2),
(5, '22100005', 'Lala', 'perempuan', 'x', '10', 'Jaksel abies', '08885612131', '2005-03-29', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `no_pinjam` varchar(6) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `no_pinjam`, `id_anggota`, `tgl_pinjam`) VALUES
(27, '000027', 3, '2022-03-29'),
(29, '000028', 4, '2022-03-29'),
(30, '000030', 1, '2022-03-29'),
(31, '000031', 5, '2022-03-29'),
(34, '000032', 4, '2022-03-30'),
(40, '000035', 5, '2022-03-31'),
(42, '000041', 5, '2022-03-31');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `kode_peminjaman` BEFORE INSERT ON `peminjaman` FOR EACH ROW BEGIN

DECLARE code int;

SET code = (SELECT max(id_pinjam)+1 FROM `peminjaman`);

IF (code IS NULL) THEN 
	SET code = 1;
END IF;

SET NEW.no_pinjam = CONCAT(LPAD(code,6,'0'));

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `peminjaman_dihapus` BEFORE DELETE ON `peminjaman` FOR EACH ROW BEGIN
UPDATE buku 
INNER JOIN dtl_peminjaman
ON dtl_peminjaman.id_pinjam = old.id_pinjam
SET buku.stok = buku.stok + dtl_peminjaman.qty
WHERE buku.id_buku = dtl_peminjaman.id_pustaka;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `no_pinjam` varchar(6) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `pustaka` varchar(100) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `no_pinjam`, `nama_anggota`, `pustaka`, `tanggal_pinjam`, `tanggal_kembali`, `denda`) VALUES
(1, '000031', 'Lala', 'Bumi', '2022-03-29', '2022-04-14', '12000'),
(2, '000031', 'Lala', 'Bumi', '2022-03-29', '2022-04-14', '12000'),
(3, '000031', 'Lala', 'Bumi', '2022-03-29', '2022-04-14', '12000'),
(4, '000030', 'Ammar Ayyis', 'Dilan: Dia adalah Dilanku tahun 1990', '2022-03-29', '2022-04-14', '12000'),
(5, '000030', 'Ammar Ayyis', 'Dilan: Dia adalah Dilanku tahun 1990', '2022-03-29', '2022-04-14', '12000'),
(6, '000030', 'Ammar Ayyis', 'Dilan: Dia adalah Dilanku tahun 1990', '2022-03-29', '2022-04-14', '12000'),
(7, '000030', 'Ammar Ayyis', 'Dilan: Dia adalah Dilanku tahun 1990', '2022-03-29', '2022-04-14', '12000'),
(8, '000032', 'Jupar', 'Dilan: Dia adalah Dilanku tahun 1990', '2022-03-30', '2022-04-14', '10000'),
(9, '000032', 'Jupar', 'Dilan: Dia adalah Dilanku tahun 1990', '2022-03-30', '2022-04-14', '10000'),
(10, '000031', 'Lala', 'Dilan: Dia adalah Dilanku tahun 1990', '2022-03-29', '2022-04-14', '12000'),
(11, '000041', 'Ammar Ayyis', 'Bumi', '2022-03-31', '2022-04-14', '8000'),
(12, '000027', 'Abyan', 'Bumi', '2022-03-29', '2022-04-14', '12000');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `r_buku`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `r_buku` (
`id_buku` int(11)
,`kode_buk` varchar(8)
,`judul` varchar(200)
,`kategori` varchar(50)
,`rak` int(1)
,`pengarang` varchar(100)
,`penerbit` varchar(100)
,`thn_terbit` varchar(4)
,`tgl_masuk` date
,`stok` int(3)
,`cover` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `r_member`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `r_member` (
`id_mem` int(11)
,`no_mem` varchar(8)
,`nama_mem` varchar(100)
,`jk` enum('laki-laki','perempuan')
,`kelas` enum('x','xi','xii','xiii')
,`nama_jurusan` varchar(100)
,`alamat` text
,`no_telp` varchar(13)
,`tgl_lahir` date
,`limit_pinjam` tinyint(1)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `r_peminjaman`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `r_peminjaman` (
`id_pinjam` int(11)
,`tgl_pinjam` date
,`no_pinjam` varchar(6)
,`no_mem` varchar(8)
,`nama_mem` varchar(100)
,`jurusan` varchar(6)
,`pustaka` varchar(200)
,`qty` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id_stat` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id_stat`, `status`) VALUES
(1, 'dipinjam'),
(2, 'dikembalikan');

-- --------------------------------------------------------

--
-- Struktur untuk view `r_buku`
--
DROP TABLE IF EXISTS `r_buku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `r_buku`  AS SELECT `buku`.`id_buku` AS `id_buku`, `buku`.`kode_buk` AS `kode_buk`, `buku`.`judul` AS `judul`, `kategori`.`kategori` AS `kategori`, `buku`.`rak` AS `rak`, `buku`.`pengarang` AS `pengarang`, `buku`.`penerbit` AS `penerbit`, `buku`.`thn_terbit` AS `thn_terbit`, `buku`.`tgl_masuk` AS `tgl_masuk`, `buku`.`stok` AS `stok`, `buku`.`cover` AS `cover` FROM (`buku` join `kategori` on(`kategori`.`id_kategori` = `buku`.`jenis`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `r_member`
--
DROP TABLE IF EXISTS `r_member`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `r_member`  AS SELECT `member`.`id_mem` AS `id_mem`, `member`.`no_mem` AS `no_mem`, `member`.`nama_mem` AS `nama_mem`, `member`.`jk` AS `jk`, `member`.`kelas` AS `kelas`, `jurusan`.`nama_jurusan` AS `nama_jurusan`, `member`.`alamat` AS `alamat`, `member`.`no_telp` AS `no_telp`, `member`.`tgl_lahir` AS `tgl_lahir`, `member`.`maks` AS `limit_pinjam` FROM (`member` join `jurusan` on(`jurusan`.`id_jurusan` = `member`.`jurusan`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `r_peminjaman`
--
DROP TABLE IF EXISTS `r_peminjaman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `r_peminjaman`  AS SELECT `dtl_peminjaman`.`id_pinjam` AS `id_pinjam`, `peminjaman`.`tgl_pinjam` AS `tgl_pinjam`, `peminjaman`.`no_pinjam` AS `no_pinjam`, `member`.`no_mem` AS `no_mem`, `member`.`nama_mem` AS `nama_mem`, `jurusan`.`singkatan_jurusan` AS `jurusan`, `buku`.`judul` AS `pustaka`, `dtl_peminjaman`.`qty` AS `qty` FROM ((((`dtl_peminjaman` join `peminjaman` on(`peminjaman`.`id_pinjam` = `dtl_peminjaman`.`id_pinjam`)) join `member` on(`member`.`id_mem` = `peminjaman`.`id_anggota`)) join `jurusan` on(`jurusan`.`id_jurusan` = `member`.`jurusan`)) join `buku` on(`buku`.`id_buku` = `dtl_peminjaman`.`id_pustaka`)) WHERE `dtl_peminjaman`.`id_pinjam` = `peminjaman`.`id_pinjam` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `kode_buk` (`kode_buk`),
  ADD UNIQUE KEY `judul` (`judul`),
  ADD KEY `jenis` (`jenis`);

--
-- Indeks untuk tabel `dtl_peminjaman`
--
ALTER TABLE `dtl_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_pustaka` (`id_pustaka`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_mem`),
  ADD UNIQUE KEY `no_mem` (`no_mem`),
  ADD KEY `jurusan` (`jurusan`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `no_pinjam` (`no_pinjam`),
  ADD KEY `no_anggota` (`id_anggota`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_stat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dtl_peminjaman`
--
ALTER TABLE `dtl_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id_mem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id_stat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`jenis`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `dtl_peminjaman`
--
ALTER TABLE `dtl_peminjaman`
  ADD CONSTRAINT `dtl_peminjaman_ibfk_4` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dtl_peminjaman_ibfk_5` FOREIGN KEY (`id_pustaka`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`jurusan`) REFERENCES `jurusan` (`id_jurusan`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `member` (`id_mem`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
