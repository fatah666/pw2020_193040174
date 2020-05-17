-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Bulan Mei 2020 pada 20.08
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pw_193040174`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat_musik`
--

CREATE TABLE `alat_musik` (
  `id` int(11) NOT NULL,
  `gambar` varchar(10) DEFAULT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `asal_daerah` varchar(50) DEFAULT NULL,
  `cara_memainkan` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat_musik`
--

INSERT INTO `alat_musik` (`id`, `gambar`, `nama`, `deskripsi`, `asal_daerah`, `cara_memainkan`, `harga`) VALUES
(1, 'g1.jpg', 'angklung', 'alat musik yang terbuat dari bambu', 'jawa barat', 'digoyangkan', 75000),
(2, 'g2.jpg', 'sasando', 'alat musik yang terbuat dari dau lontar ', 'tanah rote', 'dipetik', 150000),
(3, 'g3.jpg', 'Gamelan', 'Alat musik yag terbuat dari tembaga', 'Tanah jawa', 'dipukul', 300000),
(4, 'g4.jpg', 'Kolintang', 'Alat musik yang terbuat dari kayu/besi', 'Sulawesi selatan', 'dipukul', 250000),
(5, 'g10.jpg', 'Gendang', 'Alat musik yang terbuat dari kulit binatang', 'Yogyakarta', 'dipukul', 497000),
(6, 'g5.jpg', 'Kendang', 'Alat musik yang terbuat dari kulit binatang', 'jawa timur', 'dipukul', 89000),
(7, 'g6.jpg', 'Tifa', 'Alat musik yang terbuat dari kulit binatng', 'Papua', 'dipukul', 185000),
(8, 'g7.jpg', 'Saluang', 'Alat musik yang terbuat dari bambu', 'Sumatra Barat', 'ditiup', 950000),
(9, 'g8.jpg', 'Aramba', 'Alat musik yang terbuat dari besi/tembaga', 'Sumatra Utara', 'dipukul', 350000),
(10, 'g9.jpg', 'Gambus', 'Alat musik yang terbuat dari kayu dan mempunyai se...', 'Riau', 'dipetik', 400000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nrp` char(9) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`) VALUES
(1, 'ujang fatah ak', '193040174', 'ujangfatah15@gmail.com', 'teknik informatika', 'ujangfatah.jpeg'),
(2, 'bambang', '193040176', 'bambang@gmail.com', 'teknik informatika', 'bmb.jpeg'),
(3, 'gunadi', '193040146', 'gunadi@gmail.com', 'teknik informatika', 'bb.jpeg'),
(4, 'goib', '193040133', 'goib@gmail.com', 'teknik informatika', 'bbd.jpeg'),
(5, 'nunu', '193040169', 'nunu@gmail.com', 'teknik informatika', 'dbd.jpeg'),
(6, 'abah', '193040149', 'abah@gmail.com', 'teknik informatika', 'dbdd.jpeg'),
(7, 'madon', '193040188', 'madon@gmail.com', 'teknik informatika', 'waw.jpeg'),
(8, 'adit', '193040187', 'adit@gmail.com', 'teknik informatika', 'wer.jpeg'),
(9, 'ibo', '193040180', 'ibo@gmail.com', 'teknik informatika', 'were.jpeg'),
(10, 'noerhadi', '193040183', 'noer@gmail.com', 'teknik informatika', 'noerhadi.jpeg'),
(12, 'jaenudin', '193040005', 'jeje@gmail.com', 'seni', 'jeje.jpg'),
(13, 'adh', 'ad', 'ad', 'addada', '5ebeaeb186bab.jpg'),
(15, 'dia', '1234', 'jbhvjv', 'ihbbb', '5ebeb12e104ea.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'ujang', '$2y$10$FRaNyXNVEskMV7y/0C4kFeT8sg.WGayM5sqn/mAvX2TfQqCVY0kcu'),
(5, 'mas ujang', '$2y$10$2FupMEAuL0rZ6Je1LK/XNu58fJQ3MyXIsyhre.38lEO0/Cud.qR1u'),
(6, 'siapaaa', '$2y$10$2xhG5pFaBLlszLLgOzNvoehdWzcfCHhh6HX7gpEs1LlyHI2.gS9L6'),
(7, 'admin2', '$2y$10$.cVlle4GQWnXH1vC6f4YNeDN.xdI8zObRK.KZ/0Jsen77BGukWs9q'),
(8, 'siapaaaa', '$2y$10$wxkyL9ZjcmkebaRmz16wt.wpHPr2ujZnR9SZ2p30Av3EWo/nrqtD2'),
(9, 'aku', '$2y$10$isL6D.CjjDPFg9IBtZ98He/uuAekd/1GO2K0trYeJC/vCN04TzfPK'),
(10, 'asd', '$2y$10$WrKvZQrPqYu/khyppSkHfOO1/Ho44PN6mzQcDtGE042OGhVl3nNxS'),
(11, 'qwerty', '$2y$10$B287QLZF4mXqnSV.1PkLpOHsVDiJZlS4ckzz50X1D3idGJM44hA.C'),
(12, 'dewi', '$2y$10$3q6MXY85prgXH1HAySESOuBtyxL7ncvRDye70GnBO1Fpxx0A28GBe'),
(13, 'zxcvb', '$2y$10$N5WjzH7.38wWq1JuPaFD/uS7wBV7TC/X0xhB/DMTh4p9j65dcN3ui'),
(14, 'fahrii', '$2y$10$EJ6DVrHDGxJb.XRfWFhdUeLRd.13cGRvCQHfFXhqTwEzKV1cpEne6'),
(15, 'saya', '$2y$10$rwGi8TXdmmhSIinwgJppBuPYKCnZF5p646HuocJ1ywNkj8sH25uxi'),
(16, 'kamu', '$2y$10$KWk/Bc2IgdS622LNxRFFyu216o.4XQOXGXrqIedc5vidJ.iCMeP6S'),
(17, 'dia', '$2y$10$VvnF8LJQz91tdokPJ/BPJ.DOuZRq8973KxHyx8K3Zts4xFyFexVgq'),
(18, 'wert', '$2y$10$8HgGLFbekR0iySAxFM9gYu37fIk3vG3F7KRwKpBj89ktxqtLCSSCm'),
(19, 'monas', '$2y$10$WdGmZ.k328HN0jE3lpa0E.CtcksI2XU4coWY8r2gh/dD4Xo9tsJpy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat_musik`
--
ALTER TABLE `alat_musik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat_musik`
--
ALTER TABLE `alat_musik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
