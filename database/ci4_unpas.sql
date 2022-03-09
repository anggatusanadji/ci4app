-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Mar 2022 pada 02.40
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci4_unpas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `judul` varchar(25) NOT NULL,
  `slug` varchar(25) NOT NULL,
  `pencipta` varchar(25) NOT NULL,
  `negara` varchar(25) NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `films`
--

INSERT INTO `films` (`id`, `judul`, `slug`, `pencipta`, `negara`, `tanggal_rilis`, `sampul`, `created_at`, `updated_at`) VALUES
(1, 'Doraemon1', 'doraemon1', 'Fujiko F. Fujio', 'Jepang', '1973-04-01', 'doraemon.jpg', NULL, '2022-03-08 19:34:34'),
(2, 'Spongebob Squarepants', 'spongebob-squarepants', 'Stephen Hillenburg', 'Amerika Serikat', '1999-05-01', 'spongebob.png', NULL, '2021-08-17 04:00:32'),
(3, 'Toy Story', 'toy-story', 'John Lasseter', 'Amerika Serikat', '1995-11-22', 'toystory.jpg', '2021-08-15 22:54:55', '2021-08-15 22:54:55'),
(20, 'Larva', 'larva', 'Byeong-wook Anh', 'Korea Selatan', '2011-03-26', '1629255237_1e3b5ca6ea998d428d2c.jpg', '2021-08-17 21:53:57', '2021-08-17 21:53:57'),
(21, 'default', 'default', 'default', 'default', '0001-01-01', 'default.png', '2021-08-17 21:55:08', '2021-08-17 21:55:08'),
(23, 'Up', 'up', 'Pete Docter', 'Amerika Serikat', '2009-05-29', '1629257044_e4cdf6d2b195fe5e88e7.jpg', '2021-08-17 22:20:58', '2021-08-17 22:27:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-08-18-033400', 'App\\Database\\Migrations\\Peoples', 'default', 'App', 1629258099, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `peoples`
--

CREATE TABLE `peoples` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peoples`
--

INSERT INTO `peoples` (`id`, `nama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Angga', 'Jl. Tukad Buana V no.22', '2021-08-17 23:11:10', '2021-08-17 23:11:10'),
(2, 'Ferdian', 'Jl. Patih Nambi', '2021-08-17 23:11:10', '2021-08-17 23:11:10'),
(3, 'Rifki', 'Jl. Cokroaminoto', '2021-08-17 23:11:10', '2021-08-17 23:11:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peoples`
--
ALTER TABLE `peoples`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peoples`
--
ALTER TABLE `peoples`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
