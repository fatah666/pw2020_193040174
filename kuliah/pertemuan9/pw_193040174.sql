-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2020 pada 18.21
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
(1, 'ujang fatah', '193040174', 'ujangfatah15@gmail.com', 'teknik informatika', 'ujangfatah.jpeg'),
(2, 'bambang', '193040176', 'bambang@gmail.com', 'teknik informatika', 'bmb.jpeg'),
(3, 'gunadi', '193040146', 'gunadi@gmail.com', 'teknik informatika', 'bb.jpeg'),
(4, 'goib', '193040133', 'goib@gmail.com', 'teknik informatika', 'bbd.jpeg'),
(5, 'nunu', '193040169', 'nunu@gmail.com', 'teknik informatika', 'dbd.jpeg'),
(6, 'abah', '193040149', 'abah@gmail.com', 'teknik informatika', 'dbdd.jpeg'),
(7, 'madon', '193040188', 'madon@gmail.com', 'teknik informatika', 'waw.jpeg'),
(8, 'adit', '193040187', 'adit@gmail.com', 'teknik informatika', 'wer.jpeg'),
(9, 'ibo', '193040180', 'ibo@gmail.com', 'teknik informatika', 'were.jpeg'),
(10, 'noerhadi', '193040183', 'noer@gmail.com', 'teknik informatika', 'noerhadi.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
