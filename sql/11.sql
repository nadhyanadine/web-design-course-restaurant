-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2024 pada 07.25
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `11`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `username`, `password`, `name`, `email`) VALUES
(1, 'client1', 'password1', 'Client One', 'client1@example.com'),
(2, 'client2', 'password2', 'Client Two', 'client2@example.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) NOT NULL CHECK (`rating` >= 0 and `rating` <= 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `freelancers`
--

INSERT INTO `freelancers` (`id`, `name`, `bio`, `profile_picture`, `rating`) VALUES
(1, 'John Doe', 'Expert in web development with 10 years of experience.', 'profile1.jpg', 4.8),
(2, 'Jane Smith', 'Creative graphic designer with a passion for visual storytelling.', 'profile2.jpg', 4.9),
(3, 'Alice Johnson', 'Professional content writer specializing in SEO and digital marketing.', 'profile3.jpg', 4.6),
(4, 'Bob Brown', 'Data analyst with expertise in Python and R.', 'profile4.jpg', 4.2),
(5, 'Charlie Davis', 'Mobile app developer proficient in Java and Kotlin.', 'profile5.jpg', 4.5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `freelancer_skills`
--

CREATE TABLE `freelancer_skills` (
  `freelancer_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `freelancer_skills`
--

INSERT INTO `freelancer_skills` (`freelancer_id`, `skill_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 7),
(3, 8),
(4, 9),
(4, 10),
(4, 11),
(5, 12),
(5, 13),
(5, 14);

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `freelancer_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` enum('open','in_progress','completed') NOT NULL DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `freelancer_id`, `title`, `description`, `status`, `created_at`) VALUES
(1, 1, 1, 'Website Redesign', 'Redesign the company website to improve user experience.', 'completed', '2024-05-29 05:44:36'),
(2, 1, 2, 'Brand Logo Creation', 'Design a new logo for our brand.', 'completed', '2024-05-29 05:44:36'),
(3, 2, 3, 'SEO Content Writing', 'Create SEO optimized content for our blog.', 'completed', '2024-05-29 05:44:36'),
(4, 2, NULL, 'Mobile App Development', 'Develop a new mobile app for our services.', 'open', '2024-05-29 05:44:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Jambi'),
(7, 'Sumatera Selatan'),
(8, 'Bangka Belitung'),
(9, 'Bengkulu'),
(10, 'Lampung'),
(11, 'DKI Jakarta'),
(12, 'Jawa Barat'),
(13, 'Banten'),
(14, 'Jawa Tengah'),
(15, 'DI Yogyakarta'),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Sulawesi Tengah'),
(27, 'Sulawesi Selatan'),
(28, 'Sulawesi Tenggara'),
(29, 'Gorontalo'),
(30, 'Sulawesi Barat'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua Barat'),
(34, 'Papua'),
(35, 'Papua Selatan'),
(36, 'Papua Tengah'),
(37, 'Papua Pegunungan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `register_freelancer`
--

CREATE TABLE `register_freelancer` (
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
-- Dumping data untuk tabel `register_freelancer`
--

INSERT INTO `register_freelancer` (`id`, `full_name`, `display_name`, `profile_picture`, `description`, `occupation`, `skills`, `experience_level`, `education_country`, `education_college`, `education_major`, `education_year`, `education_title`, `certification`, `personal_website`, `email`, `phone_number`) VALUES
(0, 'Angel Levyne', 'Angel Levyne', 'WIN_20240520_11_27_04_Pro.jpg', 'kujyhtgrfedws', 'Software programmer/Developer', 'Python', 'Expert', 'Indonesia', 'jhgfd', 'mnhbgfvfc', '6546', 'nhgbfvdcsx', 'nbgvc', 'https://www.w3schools.com/', 'angellevyne@gmail.com', '081283720481');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL CHECK (`rating` >= 0 and `rating` <= 5),
  `review` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `reviews`
--

INSERT INTO `reviews` (`id`, `project_id`, `client_id`, `freelancer_id`, `rating`, `review`, `created_at`) VALUES
(1, 1, 1, 1, 4.8, 'Great work on the website redesign. Very professional.', '2024-05-29 05:44:36'),
(2, 2, 1, 2, 5.0, 'Amazing logo design! Exceeded our expectations.', '2024-05-29 05:44:36'),
(3, 3, 2, 3, 4.6, 'Excellent content with great SEO optimization.', '2024-05-29 05:44:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `theme` varchar(20) DEFAULT NULL,
  `province` varchar(50) DEFAULT NULL,
  `company_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skills`
--

INSERT INTO `skills` (`id`, `name`) VALUES
(7, 'Content Writing'),
(9, 'Data Analysis'),
(4, 'Graphic Design'),
(6, 'Illustrator'),
(13, 'Java'),
(3, 'JavaScript'),
(14, 'Kotlin'),
(12, 'Mobile App Development'),
(5, 'Photoshop'),
(2, 'PHP'),
(10, 'Python'),
(11, 'R'),
(8, 'SEO'),
(1, 'Web Development');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `province` int(11) DEFAULT NULL,
  `company_description` text DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'default.jpg',
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `province`, `company_description`, `profile_pic`, `reset_token_hash`, `reset_token_expires_at`) VALUES
(4, '', 'nadhyasigalingging@gmail.com', '$2y$10$rG0UaPoSzLZzh49PV5Bf6.zPTQZa5SlLkqnP6yo4N3dEKLAAE3Nv.', NULL, NULL, 'default.jpg', '134d934aa493bc98e46f3a09a7fcb32f498630315439de2a60195f20a47b85c5', NULL),
(5, '', 'angellevyne@gmail.com', '$2y$10$nPWt7lyTsD9VmDtjsvgC4eJgkjbWs/cjxa4rLR4kMqX39a8ZDJGAG', NULL, NULL, 'default.jpg', '2f167965412a486947ab63fbc6e0020fc858ba1406d1cc32a9284021b8673f1e', NULL),
(6, '', 'galinggingnathann@gmail.com', '$2y$10$GAl5JhZ.X826eiPXijPWNOXEuOJz2grINdrNtlS5kDhAaGZjj32RG', NULL, NULL, 'default.jpg', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `freelancer_skills`
--
ALTER TABLE `freelancer_skills`
  ADD PRIMARY KEY (`freelancer_id`,`skill_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `freelancer_id` (`freelancer_id`);

--
-- Indeks untuk tabel `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `client_id` (`client_id`),
  ADD KEY `freelancer_id` (`freelancer_id`);

--
-- Indeks untuk tabel `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `freelancer_skills`
--
ALTER TABLE `freelancer_skills`
  ADD CONSTRAINT `freelancer_skills_ibfk_1` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`id`),
  ADD CONSTRAINT `freelancer_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Ketidakleluasaan untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `projects_ibfk_2` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`id`);

--
-- Ketidakleluasaan untuk tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
