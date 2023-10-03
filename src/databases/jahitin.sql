-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Okt 2023 pada 12.19
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jahitin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `reviewID` int(11) NOT NULL,
  `penjahitID` int(11) NOT NULL,
  `ulasan` varchar(255) NOT NULL,
  `foto_ulasan` varchar(255) NOT NULL,
  `video_ulasan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`reviewID`, `penjahitID`, `ulasan`, `foto_ulasan`, `video_ulasan`) VALUES
(2, 1, 'Puas Banget', 'netflix.jpeg', 'netflixVid.mp4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tailor`
--

CREATE TABLE `tailor` (
  `tailorID` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `foto_tailor` varchar(255) NOT NULL,
  `video_tailor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tailor`
--

INSERT INTO `tailor` (`tailorID`, `nama`, `alamat`, `jenis`, `foto_tailor`, `video_tailor`) VALUES
(1, 'Ganteng', 'Sayang', 'Wedding', 'netflix.jpeg', 'netflixVid.mp4'),
(6, 'Cantik', 'Legacy', 'Permak', 'example.png', 'exampleVid.mp4'),
(12, 'Handsome', 'Flosse', 'Wedding', '651acc771ea1b.jpeg', '651acc771f015.mp4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'salmanalga@gmail.com', 'alfa', '1234'),
(2, 'satu@gmail.com', 'salman', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indeks untuk tabel `tailor`
--
ALTER TABLE `tailor`
  ADD PRIMARY KEY (`tailorID`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tailor`
--
ALTER TABLE `tailor`
  MODIFY `tailorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
