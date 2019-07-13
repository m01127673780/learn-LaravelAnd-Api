-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 02:39 PM
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
-- Database: `laravel_api4`
--

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
(3, '2019_05_28_220344_create_news_table', 1);

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `user_id`, `desc`, `content`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(62, 'Suscipit odio minus', 1, 'Enim placeat quod a', 'Non error aperiam ac', 'deactive', '2019-07-13 00:05:00', '2019-07-12 10:20:32', '2019-07-13 00:05:00'),
(63, 'Et sed dolores conse', 1, 'Est consectetur est', 'Omnis corrupti volu', 'pending', NULL, '2019-07-12 11:33:34', '2019-07-12 11:33:34'),
(64, 'Amet sunt quia est', 1, 'Placeat ullamco cup', 'Cupiditate voluptate', 'pending', NULL, '2019-07-12 11:33:59', '2019-07-12 11:33:59'),
(65, 'Enim laborum quasi n', 1, 'Vitae ipsa sed pari', 'Quos laborum in quae', 'actiev', NULL, '2019-07-12 11:36:55', '2019-07-12 11:36:55'),
(66, 'Praesentium laborum', 1, 'Enim sed sint ipsum', 'Quis vitae libero et', 'pending', '2019-07-13 00:05:00', '2019-07-13 00:03:39', '2019-07-13 00:05:00'),
(67, 'Error eum cupiditate', 1, 'Quis sunt iusto qui', 'Accusamus reprehende', 'deactive', NULL, '2019-07-13 00:04:50', '2019-07-13 00:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Mohamed', 'M@M.com ', '$2y$10$KJNPVlOzArS3NS38iJMX6ecSmy7uk8.7rGclIpY31PmRdEn1xfF/G', 'gHHpRJTt8QSAppSJ301IrlAFadPoRcsBLTC2PUuO4FF5wtU8S0mQwMRlhrfa', '2019-07-11 12:50:23', '2019-07-11 12:50:23'),
(3, 'Mohamed', 'M@M.m ', '$2y$10$l.Ez8eWg.0zkFMmgLHCMleq3X/IYyLaFeEj7KAi0zYRtLoIvDPguy', NULL, '2019-07-11 12:51:21', '2019-07-11 12:51:21'),
(4, 'Mohamed', 'M@M.mm ', '$2y$10$Ga2yRshnHXbtOI4rT1NyFezGQXAkSWOxdJh0aDTq6qAtJmG1UIFNi', NULL, '2019-07-11 12:51:44', '2019-07-11 12:51:44'),
(5, 'Mohmed', 'test@admin.com', '$2y$10$LANGQE3va3j5FoCKaTh3teNLNljsLUAX6yOoP23QIo6k1JK98lbP.', 'kwvegxMd5UwS3wt5FZWqW6cWjceMwr1mMfNOdqW0y4UexCX0G1CXACtnTZ66', '2019-07-13 09:36:05', '2019-07-13 09:36:05'),
(6, 'Mohamed', 'admin@test.com', '$2y$10$bZe3.qvZIpQ93VsMaD/R8eKEVtUcsl9GWyvzGTuF6GryoKnQ3EXm2', '2X6xewwBGuatkB1oAzjP5cakQII9D4VFaSlrY6LhGJPkwR9MFfLIt8Rw81BR', '2019-07-13 09:37:18', '2019-07-13 09:37:18');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
