-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jan 2016 om 19:11
-- Serverversie: 5.6.26
-- PHP-versie: 5.6.12

SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `done_tasks`
--

CREATE TABLE IF NOT EXISTS `done_tasks` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) TYPE=InnoDB AUTO_INCREMENT=27;

--
-- Gegevens worden geëxporteerd voor tabel `done_tasks`
--

INSERT INTO `done_tasks` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(22, 3, '123', '2016-01-24 15:51:44', '2016-01-24 15:51:44'),
(25, 1, 'sitetest', '2016-01-25 16:49:07', '2016-01-25 16:49:07'),
(26, 1, 'ytest', '2016-01-25 16:49:25', '2016-01-25 16:49:25');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) TYPE=InnoDB;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_22_150401_create_tasks_table', 1),
('2016_01_23_130712_create_donetasks_table', 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL
) TYPE=InnoDB;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) TYPE=InnoDB AUTO_INCREMENT=44;

--
-- Gegevens worden geëxporteerd voor tabel `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `name`, `created_at`, `updated_at`) VALUES
(4, 2, 'test', '2016-01-22 14:43:43', '2016-01-22 14:43:43'),
(35, 3, '<script>alert("hey")</script>', '2016-01-24 15:50:39', '2016-01-24 15:50:39'),
(41, 1, 'dgdrgdrg', '2016-01-25 16:19:49', '2016-01-25 16:19:49'),
(42, 1, 'yrdy', '2016-01-25 16:19:52', '2016-01-25 16:19:52');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) TYPE=InnoDB AUTO_INCREMENT=4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ruben', 'ruben@php.be', '$2y$10$GTyaGrKX1OdqMs3SALq9Y.LaN/YHvWl6JZHrqZqsKzFhT9qIgTkk2', 'kCgX2g9J6C7UHjqP9ZkCgvOnI7iD4dZlRohnf25GmaXbpKwVrBA2KvGuySVe', '2016-01-25 17:58:52', '2016-01-25 16:58:52'),
(2, 'test', 'test@test.be', '$2y$10$utQrKMRMHNAlvDdp9iDVseIuDDlBR1WpxsmBykkgkzV5e/9d1ewje', '2syOVbL70soxePAYDJidCsvUlXlKz2WQSwwKty2jPzNThYHKDwoDY3Z7gElh', '2016-01-22 15:43:50', '2016-01-22 14:43:50'),
(3, '<script>alert("hey")</script>', 'ikke@ikke.be', '$2y$10$C7mf.Kp4Ae.3dKvbEShcO.IZsk0VcbbV1bpM4UkrwLZBYvPY1fKYi', '2RTuO5G0BixE2Fr6NKrc4X3kgih79TDqyYo4tAWnhSD00vfzbnM9qXPOALA2', '2016-01-24 16:56:28', '2016-01-24 15:56:28');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `done_tasks`
--
ALTER TABLE `done_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donetasks_user_id_index` (`user_id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexen voor tabel `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_user_id_index` (`user_id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `done_tasks`
--
ALTER TABLE `done_tasks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT voor een tabel `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
