-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Sep 2022 pada 17.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `attendance_records`
--

CREATE TABLE `attendance_records` (
  `namapeserta` varchar(255) NOT NULL,
  `attendance_status` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `attendance_records`
--

INSERT INTO `attendance_records` (`namapeserta`, `attendance_status`, `date`) VALUES
('sel', 'tidakhadir', '2022-09-07'),
('fatimah A', 'hadir', '2022-09-07'),
('Nur', 'tidakhadir', '2022-09-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kehadiran`
--

CREATE TABLE `kehadiran` (
  `idpegawai` int(11) NOT NULL,
  `namapeserta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kehadiran`
--

INSERT INTO `kehadiran` (`idpegawai`, `namapeserta`) VALUES
(25, 'haha'),
(26, 'cobain'),
(27, 'sel'),
(28, 'selna'),
(29, 'a'),
(30, 'b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`iduser`, `username`, `email`, `password`) VALUES
(1, '', 'adm@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `idpertemuan` int(11) NOT NULL,
  `namapertemuan` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pertemuan`
--

INSERT INTO `pertemuan` (`idpertemuan`, `namapertemuan`, `tanggal`, `lokasi`) VALUES
(20221002, 'rapim', '2022-09-02 13:49:00', 'lokasi'),
(20221003, 'rapim', '2022-09-03 14:01:00', 'lokasi'),
(20221004, 'rapim', '2022-09-02 14:08:00', 'fti'),
(20221005, 'rapim', '2022-09-02 14:04:00', 'lokasi'),
(20221006, 'rapim', '2022-09-03 14:02:00', 'lokasi'),
(20221007, 'rapim', '2022-09-02 14:05:00', 'lokasi'),
(20221008, 'ra', '2022-09-02 14:05:00', 'lokasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `namapeserta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `namapeserta`) VALUES
(68, 'fatimah A'),
(70, 'sel');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`idpegawai`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

--
-- Indeks untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`idpertemuan`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `idpertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20221009;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
