-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 02:38 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_api5`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Mohamed', 'admin@admin.com', '$2y$10$dG8YkyzoKrvc/1rK1z3cMOX4MjyhrRGhIcZtVbwi/mgiGLrcM.Qs6', 'U9OI3LuutJyEKxJZ2FoW3k7rqgxKQRcxx5bwJi0v35pd1v5JQVXFNfZBmyHA', '2019-07-13 21:08:04', '2019-07-14 21:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_05_28_220344_create_news_table', 1),
(4, '2019_07_13_222257_admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('actiev','pending','deactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@test.com', '$2y$10$H86y42XX3YU2JlpOift7o.HwwfBKWjaR5ztaXtOUpjf.qqxAC1k0K', '2019-07-16 20:24:44'),
('admin@admin.com', '$2y$10$4zVKmIoGfSZIfVyJh8O0g.Ftmq3sKeUuiqyKmpDxbFODjGINPNCVq', '2019-07-16 21:04:58'),
('user@user.com', '$2y$10$yAldQF7prM028BwcUBd4Y.hkMGOdDHYjxr2y1lZn7m/I8uWZeq8su', '2019-07-17 02:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed', 'M@M.mm ', '$2y$10$iRx0E78mKP6OJ8jRlhSdteqcw.86OgTDNDNaDHT4mqkq6T.TcRnZS', NULL, '2019-07-13 20:44:34', '2019-07-13 20:44:34'),
(2, 'Mohamed', 'admin@test.com', '$2y$10$4hHvmam67H33.RM2a.GcRuF9QPt6OsGskWX0ab9CKM3cTZTW2aNIa', 'gKNEfMsc1nRlgFzJ6MNcHJ3ErveWDOhk8X0oDCEksWmCtJwOnVCRozmscgRl', '2019-07-13 21:20:08', '2019-07-14 21:34:31'),
(3, 'Mohamed', 'm@m.com', '$2y$10$UZqwKKnObgMluva1PvX6G.2jPw5qywCzzwv6.wN7Q66Mp.3UHBw7u', NULL, '2019-07-14 10:49:35', '2019-07-14 10:49:35'),
(4, 'Mohamed', 'm@m.m', '$2y$10$IBt7Prx7edoXHPh7ppTqN.as1RyPMXLeqNM7ohXIjXZC4YL/Kgssa', 'DgyDw1r1HUcMwi6aIqwN1iVF5GcbG1qUXA6p8FBGTIUVewNTHpXUIf1VlY6Q', '2019-07-14 10:55:31', '2019-07-14 10:55:31'),
(5, 'Mohamed', 'A@A.com', '$2y$10$85zgM9akeDowSTpDv9pybOY.1j8zBgegHNbW59NZj21DB29yY2cWO', 'wxSJnSdYDMyHNjeMseprxF2raIVoDhyrCPfmLOK8JgndagBGjB6UPodcBP6E', '2019-07-14 10:58:17', '2019-07-14 10:58:17'),
(6, 'Mohamed', 'm@m.n', '$2y$10$1qewZrQR6G/rCtWtxl4p5u9qK2vjkYzox2pYtWKidap77SdpxGNRC', NULL, '2019-07-16 12:48:48', '2019-07-16 12:48:48'),
(7, 'محمد سعيد فرج', 'n@n.com', '$2y$10$sK2Qccys1wrTmIO3IWyEJOJhlvkey3wJb1OYKP0aJQg9gtwb.sjJ.', NULL, '2019-07-16 13:00:27', '2019-07-16 13:00:27'),
(8, 'Mohamed', 'h@h.com', '$2y$10$AMwdQTTskvoNK24E0kx9O.7Bolz9TiemOHVKX56137Za0ir1127XO', 'dOty7JgsEUrlAkzgan0CIcE7LW8E1jbaq1PIgHlDW2zaePTwpN8WbGSBGKJB', '2019-07-16 16:08:23', '2019-07-16 16:08:23'),
(9, 'محمد سعيد فرج', 's@s.com', '$2y$10$tM.Eva.u.ydRFyBoNyrhku2raJL.wyxWPXFCEH3baZrL2uoh/U/gC', 'sFwm8Em1GVkmp789nQMDGENzv9ByWebHGuTnA9c6PmDt9NbTdlhCqJCOtwcW', '2019-07-16 20:25:46', '2019-07-16 20:25:46'),
(10, 'user', 'user@user.com', '$2y$10$QqIgbqrMHBaBv2dfnrO3XuK4T95x9xth2v/jaEVYygMw0mktwzabG', 'QGKlor1kXne3MXjmuNszUJ2Mnc0Lqh5XylFcweUrRPGIJqm7WStU9zbHvgZa', '2019-07-16 20:32:04', '2019-07-16 20:43:04'),
(11, 'Mohamed', 'sh@sh.com', '$2y$10$E86UfcqtcQ2kHkrbd.7DmudKCpSCcZoVwrNE19QnWtr55rAKh9dri', NULL, '2019-07-17 02:58:32', '2019-07-17 02:58:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
