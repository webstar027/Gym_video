-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 02:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_video`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `favorit_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gym_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gym_address_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gym_address_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `gym_name`, `gym_address_1`, `gym_address_2`, `city`, `state_province`, `country`, `zip_code`, `website`, `owner_id`, `created_at`, `updated_at`) VALUES
(2, 'Isi Aucaman', 'Los Angeles', 'Los Angeles', 'Los Angeles', 'Los Angeles', 'United States', '123456', 'www.web.com', 6, '2020-03-26 07:00:00', '2020-03-26 07:00:00'),
(3, 'Joseph Scott', 'Joseph Scott', 'Joseph Scott', 'Tucson', 'AZ', 'US', '85750', 'www.website.com', 7, '2020-03-27 08:38:37', '2020-03-27 08:38:37'),
(5, 'GrandGym', 'New York', 'Los Angeles', 'New York', 'New York', 'US', '1994', 'https://www.web.com', 9, '2020-03-28 09:06:39', '2020-03-28 09:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `gym_user`
--

CREATE TABLE `gym_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `gym_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gym_user`
--

INSERT INTO `gym_user` (`user_id`, `gym_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 2, '2020-03-28 09:44:05', '2020-03-28 09:44:05'),
(5, 3, 1, '2020-03-28 13:05:43', '2020-03-28 13:05:43'),
(5, 5, 1, '2020-03-28 10:07:19', '2020-03-28 10:07:19');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_24_213034_create_permission_tables', 1),
(5, '2020_03_24_221215_create_gym_table', 1),
(6, '2020_03_25_022541_create_video_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'joseph.scott027@outlook.com', '$2y$10$6ZHyGOrCLbnKBqpyQfuBIenkyX9Sn7Ax96yEGZVQEgLFFQiC7v2QO', '2020-03-27 23:21:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'gymowner', NULL, NULL),
(3, 'student', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'johnhh', 'smith', 'johnsmith', 'ruima027@gmail.com', '2020-03-27 08:26:50', '$2y$10$MgAIMhODqpdsbN.43YSOle5e6Sdt2H8DCNqujqt7sxepdNABt8AVS', 3, '7hAtTrbEP7U0I0hPFQwA4rBgb73I1Z6KA9y9WHY2FEHpywSgvO5uiX1LUAXe', '2020-03-27 08:26:18', '2020-03-28 01:13:30'),
(4, 'Joseph', 'Scott', 'Josephscott0605', 'joseph.scott0605@gmail.com', '2020-03-27 08:28:27', '$2y$10$r9hd5uLxdtDU8Bl1z91Thu08JJyJ2e3b7gwo/WkWXZ/mMYGGFlqOy', 3, '4cCdLciurquXk9C7rkyV35MyjEAmxgdsQnz5VnhfRuvVl7f6DftMQXn09ra0', '2020-03-27 08:27:44', '2020-03-28 09:52:25'),
(5, 'bill', 'chong', 'bchong', 'bchong753@gmail.com', '2020-03-27 08:31:03', '$2y$10$OLTwwO/OJnf26Ry50N/B1OrZBTxOlQEjfyfVKDebiLI9Dt5TqlDNy', 3, 'IvAUBSoZQUWoWUL1kZUVno9TgYbxEPzjy7mqhVQIumYatheH2U5iXghhcB1S', '2020-03-27 08:30:36', '2020-03-28 10:03:32'),
(6, 'Isi', 'Aucaman', 'isi.aucaman', 'isi.aucaman@yandex.com', '2020-03-27 08:33:16', '$2y$10$kUII4MSZsRPyKVV1LG8iC.Kj8hc1Cmp3YAbDbUxW4PkogOG1qas.m', 2, NULL, '2020-03-27 08:32:54', '2020-03-27 08:33:16'),
(7, 'Joseph', 'Scott', 'Joseph Scott', 'joseph.scott027@outlook.com', '2020-03-27 08:39:47', '$2y$10$DidLDiNRZRDo53CAMvEw0OetNhOr5LXKli9k5imdLlshZ4QNjLXp.', 2, 'aZQSNzZRQ8eykvGfBDeWXMCbXYXCfkpCsHFxMc1vwsfFAxw3stIS4iIR7OXo', '2020-03-27 08:38:37', '2020-03-27 08:39:47'),
(9, 'Judy', 'Ferrell', 'judyferrell', 'judyferrell@yandex.com', '2020-03-27 15:07:14', '$2y$10$z0X7WVSW81iiORbx/kE6TeDXcKPd22q9H4ATfH94EY4NXtf8II73.', 2, NULL, '2020-03-28 09:06:39', '2020-03-28 09:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gym_id` bigint(20) NOT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `gym_id`, `video_url`, `video_title`, `description`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(20, 3, 'https://www.youtube.com/watch?v=EgjHkGu3aKg', 'How to Build the Perfect Home Gym | Home Gym Tour', 'Like I said in the video, some items are sold out/prices have been inflated massively. I will still leave links to all the items but also ...', 'tag', 1, '2020-03-27 11:21:41', '2020-03-28 00:57:49'),
(22, 3, 'https://www.youtube.com/watch?v=6VqqTdZrhhc', 'Ultimate Home Gym Tour!!!😄', 'Justin and Trey wanted to take y\'all along on a gym tour/fixer upper, we needed to get a couple of things', 'without', 1, '2020-03-27 11:42:12', '2020-03-28 00:57:36'),
(23, 3, 'https://www.youtube.com/watch?v=UC6CumOP3Ug', '$20 A Month Gym VS $300+ A Month Gym', 'Check out ESNTLS, they sell the best essentials in the world: https://www.esntls.co/ Our collection', 'without', 1, '2020-03-27 11:47:10', '2020-03-27 20:30:43'),
(25, 3, 'https://youtu.be/6g8G3YQtQt4', 'Deploy Laravel To Shared Hosting The Easy Way', 'In this video I will show you how to easily deploy a Laravel application to a shared hosting account with InMotion hosting. We will deploy without having to type in one command. Everything will be done via Cpanel and FTP.', 'tag1, tag3', 1, '2020-03-27 21:14:47', '2020-03-27 21:14:47'),
(26, 3, 'https://www.youtube.com/watch?v=DJ6PD_jBtU0', 'Full Stack Vue.js & Laravel', 'In this video I will show you how to easily deploy a Laravel application to a shared hosting account with InMotion hosting. We will deploy without having to type in one command. Everything will be done via Cpanel and FTP.', 'tag3, tag4', 0, '2020-03-27 21:15:32', '2020-03-27 21:15:32'),
(27, 3, 'https://www.youtube.com/watch?v=L36aleJeB3o', 'Test', 'Testing description', 'testing, the, tags', 1, '2020-03-28 01:22:34', '2020-03-28 01:23:00'),
(28, 5, 'https://www.youtube.com/watch?v=ZK2KY5zWSPE', 'How I Shoot EPIC Gym Videos!💪🏼🎥| Fitness Film Tutorial', 'In this video, i take a bit of a turn away from the regular music video behind the scenes that you\'d normally see on my channel and ...', 'Tag1, Tag2', 0, '2020-03-28 09:09:09', '2020-03-28 09:09:09'),
(29, 5, 'https://www.youtube.com/watch?v=X_9VoqR5ojM', 'LET\'S GO 🔥 GYM MOTIVATION', 'Edited by Me: @fochbymotivation Footage by: Jeremy Buendia, Andrei Deiu, Sergi Constance, Simeon panda, David laid, Gerardo ...', 'Tag2, Tag3', 1, '2020-03-28 09:09:57', '2020-03-28 09:10:38'),
(30, 5, 'https://www.youtube.com/watch?v=UBMk30rjy0o', '20 MIN FULL BODY WORKOUT // No Equipment | Pamela Reif', 'NO EXCUSES ♥︎ a Full Body Workout that can do whenever and wherever you like. // Werbung You don\'t need any equipment ...', 'Tag2,Tag3, Tag4', 0, '2020-03-28 09:10:29', '2020-03-28 09:10:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gyms_owner_id_foreign` (`owner_id`);

--
-- Indexes for table `gym_user`
--
ALTER TABLE `gym_user`
  ADD PRIMARY KEY (`user_id`,`gym_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gyms`
--
ALTER TABLE `gyms`
  ADD CONSTRAINT `gyms_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
