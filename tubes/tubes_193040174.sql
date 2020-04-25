-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2020 pada 18.22
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
-- Database: `tubes_193040174`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alat musik`
--

CREATE TABLE `alat musik` (
  `id` int(11) NOT NULL,
  `gambar` varchar(10) NULL,
  `nama` varchar(20) NULL,
  `deskripsi` varchar(100) NULL,
  `asal_daerah` varchar(50) NULL,
  `Cara_memainkan` varchar(20) NULL,
  `harga` int(11) NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `alat musik`
--

INSERT INTO `alat musik` (`id`, `gambar`, `nama`, `deskripsi`, `asal_daerah`, `Cara_memainkan`, `harga`) VALUES
(1, 'g1.jpg', 'angklung', 'Alat musik yang terbuat dari bambu', 'jawa barat', 'digoyangkan', 75000),
(2, 'g2.jpg', 'Sasando', 'Alat musik yang terbuat dari daun lontar', 'Tanah rote', 'dipetik', 150000),
(3, 'g3.jpg', 'Gamelan', 'Alat musik yag terbuat dari tembaga', 'Tanah jawa', 'dipukul', 300000),
(4, 'g4.jpg', 'Kolintang', 'Alat musik yang terbuat dari kayu/besi', 'Sulawesi selatan', 'dipukul', 250000),
(5, 'g10.jpg', 'Gendang', 'Alat musik yang terbuat dari kulit binatang', 'Yogyakarta', 'dipukul', 497000),
(6, 'g5.jpg', 'Kendang', 'Alat musik yang terbuat dari kulit binatang', 'jawa timur', 'dipukul', 89000),
(7, 'g6.jpeg', 'Tifa', 'Alat musik yang terbuat dari kulit binatng', 'Papua', 'dipukul', 185000),
(8, 'g7.jpg', 'Saluang', 'Alat musik yang terbuat dari bambu', 'Sumatra Barat', 'ditiup', 950000),
(9, 'g8.jpg', 'Aramba', 'Alat musik yang terbuat dari besi/tembaga', 'Sumatra Utara', 'dipukul', 350000),
(10, 'g9.jpg', 'Gambus', 'Alat musik yang terbuat dari kayu dan mempunyai senar seperti gitar', 'Riau', 'dipetik', 400000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alat musik`
--
ALTER TABLE `alat musik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alat musik`
--
ALTER TABLE `alat musik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
