-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2024 pada 09.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `devhive`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `experience_level` varchar(255) NOT NULL,
  `education_country` varchar(255) NOT NULL,
  `education_college` varchar(255) NOT NULL,
  `education_major` varchar(255) NOT NULL,
  `education_year` varchar(4) NOT NULL,
  `education_title` varchar(255) NOT NULL,
  `certification` text DEFAULT NULL,
  `personal_website` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `freelancers`
--

INSERT INTO `freelancers` (`id`, `full_name`, `display_name`, `profile_picture`, `description`, `occupation`, `skills`, `experience_level`, `education_country`, `education_college`, `education_major`, `education_year`, `education_title`, `certification`, `personal_website`, `email`, `phone_number`) VALUES
(1, 'ARYA STEFHANI SINAGA', 'pankayooo', 'images (1).jpg', 'zasxksaxakjvas amc\">', '', 'PHP', 'Intermediate', 'Indonesia', 'telkom ', 'sistem informasi', '2023', 'hbsxsb', 'dbfcmndbcksbdcnbe\">', 'http://localhost/DEVHIVEFREELANCER/professional_info.php', 'stephaniearya80@gmail.com', '094588475893759345');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
