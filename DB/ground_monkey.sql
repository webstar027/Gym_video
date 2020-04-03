-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 04:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ground_monkey`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `properties`, `created_at`, `updated_at`) VALUES
(49, 'default', 'delete_video', 5, 'App\\Video', 7, 'App\\User', '[]', '2020-04-03 10:28:26', '2020-04-03 10:28:26'),
(50, 'default', 'update_gym', 3, 'App\\Gym', 7, 'App\\User', '[]', '2020-04-03 10:29:52', '2020-04-03 10:29:52'),
(51, 'default', 'deny_member', 3, 'App\\Gym', 7, 'App\\User', '[]', '2020-04-03 10:31:46', '2020-04-03 10:31:46'),
(52, 'default', 'request_member', 3, 'App\\Gym', 5, 'App\\User', '[]', '2020-04-03 10:35:39', '2020-04-03 10:35:39'),
(54, 'default', 'request_member', 3, 'App\\Gym', 5, 'App\\User', '[]', '2020-04-03 10:38:32', '2020-04-03 10:38:32'),
(55, 'default', 'approve_member', 3, 'App\\Gym', 7, 'App\\User', '[]', '2020-04-03 10:39:03', '2020-04-03 10:39:03'),
(56, 'default', 'create_video', 23, 'App\\Video', 7, 'App\\User', '[]', '2020-04-03 10:41:13', '2020-04-03 10:41:13'),
(57, 'default', 'watch_video', 2, 'App\\Video', 5, 'App\\User', '[]', '2020-04-03 10:45:45', '2020-04-03 10:45:45'),
(59, 'default', 'watch_video', 2, 'App\\Video', 5, 'App\\User', '[]', '2020-04-03 11:14:43', '2020-04-03 11:14:43'),
(60, 'default', 'comment_video', 2, 'App\\Video', 5, 'App\\User', '[]', '2020-04-03 11:14:58', '2020-04-03 11:14:58'),
(61, 'default', 'watch_video', 2, 'App\\Video', 6, 'App\\User', '[]', '2020-04-03 11:15:18', '2020-04-03 11:15:18'),
(62, 'default', 'login_user', NULL, NULL, 5, 'App\\User', '[]', '2020-04-03 14:07:31', '2020-04-03 14:07:31'),
(63, 'default', 'login_user', NULL, NULL, 7, 'App\\User', '[]', '2020-04-03 16:19:38', '2020-04-03 16:19:38'),
(64, 'default', 'create_video', 24, 'App\\Video', 7, 'App\\User', '[]', '2020-04-03 17:33:35', '2020-04-03 17:33:35'),
(65, 'default', 'login_user', NULL, NULL, 5, 'App\\User', '[]', '2020-04-03 17:38:33', '2020-04-03 17:38:33'),
(66, 'default', 'login_user', NULL, NULL, 6, 'App\\User', '[]', '2020-04-03 17:45:48', '2020-04-03 17:45:48'),
(67, 'default', 'update_user', 7, 'App\\User', 7, 'App\\User', '[]', '2020-04-03 18:31:16', '2020-04-03 18:31:16'),
(68, 'default', 'login_user', NULL, NULL, 6, 'App\\User', '[]', '2020-04-03 20:50:43', '2020-04-03 20:50:43'),
(69, 'default', 'watch_video', 24, 'App\\Video', 6, 'App\\User', '[]', '2020-04-03 20:50:45', '2020-04-03 20:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `video_id`, `parent_id`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(56, 5, 2, NULL, 'Gym or work out facility tour example of how to welcome and how not to welcome people visiting. Reminds us of all the inappropriate examples that may be available in such a setting whereby the visitor may feel vulnerable as they are in a new place.', '2020-04-03 11:14:58', '2020-04-03 11:14:58', NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(5, 3, '2020-04-02 21:57:13', '2020-04-02 21:57:13'),
(5, 6, '2020-04-02 21:56:33', '2020-04-02 21:56:33'),
(5, 8, '2020-04-02 21:56:38', '2020-04-02 21:56:38'),
(5, 11, '2020-04-02 21:56:36', '2020-04-02 21:56:36'),
(7, 2, '2020-04-03 10:09:28', '2020-04-03 10:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gym_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gym_address_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gym_address_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `gym_name`, `gym_address_1`, `gym_address_2`, `city`, `state_province`, `country`, `zip_code`, `website`, `owner_id`, `created_at`, `updated_at`) VALUES
(2, 'Isi Aucaman', 'Los Angeles', 'Los Angeles', 'Los Angeles', 'Los Angeles', 'United States', '123456', 'www.web.com', 6, '2020-03-26 14:00:00', '2020-03-26 14:00:00'),
(3, 'Josephscott', 'Joseph Scott', 'Joseph Scott', 'Tucson', 'AZ', 'United States', '85750', 'www.websitettt.com', 7, '2020-03-27 15:38:37', '2020-04-03 10:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `gym_user`
--

CREATE TABLE `gym_user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gym_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gym_user`
--

INSERT INTO `gym_user` (`user_id`, `gym_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 1, '2020-04-03 10:39:03', '2020-04-03 10:39:03');

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
(6, '2020_03_25_022541_create_video_table', 1),
(7, '2020_03_25_022605_create_user_gym_table', 1),
(8, '2020_03_25_221351_create_favorites_table', 1),
(9, '2020_03_31_234640_create_videos_comments_table', 2),
(10, '2020_04_01_143736_playlist', 3),
(11, '2020_04_02_172502_create_activity_log_table', 4);

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
(2, 'judyferrell@yandex.com', '$2y$10$Ncc0df.Vc1zVV08gkRD6KOxOSOQ7cD/UX3D5lEHaNnb67jrqGy4l.', '2020-03-29 06:54:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gym_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `gym_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 2, 'playlist-1', '2020-04-01 07:00:00', '0000-00-00 00:00:00'),
(5, 3, 'Playlist-2', '2020-04-01 09:17:21', '2020-04-01 09:17:21'),
(9, 3, 'dargon', '2020-04-01 14:04:00', '0000-00-00 00:00:00'),
(10, 3, 'tiger', '2020-04-01 14:05:00', '0000-00-00 00:00:00'),
(11, 3, 'preferred', '2020-04-01 14:06:00', '0000-00-00 00:00:00'),
(12, 3, 'love', '2020-04-01 16:17:21', '2020-04-01 16:17:21'),
(13, 3, 'hello', '2020-04-02 12:17:09', '2020-04-02 12:17:09'),
(14, 3, 'Perfect', '2020-04-03 07:05:22', '2020-04-03 07:05:22'),
(15, 3, 'dddddd', '2020-04-03 08:49:45', '2020-04-03 08:49:45'),
(16, 3, 'dgdgdg', '2020-04-03 08:51:04', '2020-04-03 08:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_videos`
--

CREATE TABLE `playlist_videos` (
  `playlist_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `playlist_videos`
--

INSERT INTO `playlist_videos` (`playlist_id`, `video_id`, `created_at`, `updated_at`) VALUES
(5, 6, '2020-04-03 06:38:17', '2020-04-03 06:38:17'),
(5, 20, '2020-04-03 08:30:15', '2020-04-03 08:30:15'),
(11, 8, '2020-04-02 12:28:07', '2020-04-02 12:28:07'),
(11, 19, '2020-04-03 06:09:11', '2020-04-03 06:09:11'),
(13, 2, '2020-04-02 12:17:09', '2020-04-02 12:17:09'),
(14, 21, '2020-04-03 07:05:22', '2020-04-03 07:05:22'),
(16, 3, '2020-04-03 08:51:04', '2020-04-03 08:51:04');

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
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Joseph', 'Scott', 'Josephscott0605', 'joseph.scott0605@gmail.com', '2020-03-27 15:28:27', '$2y$10$r9hd5uLxdtDU8Bl1z91Thu08JJyJ2e3b7gwo/WkWXZ/mMYGGFlqOy', 3, '4cCdLciurquXk9C7rkyV35MyjEAmxgdsQnz5VnhfRuvVl7f6DftMQXn09ra0', '2020-03-27 15:27:44', '2020-03-28 16:52:25'),
(5, 'bill', 'chong', 'bchong', 'bchong753@gmail.com', '2020-03-27 15:31:03', '$2y$10$kf8trzyo2l7KSVkqlQRJnec//NcM5Nwe88PpTBYrdu1VyhBstRccq', 3, 'yM04DIOp2Cm6nN3HqDRBDC9Mwk4fFzCwlMcYuxj4BdiDli0Eh1gaXQGQUoVz', '2020-03-27 15:30:36', '2020-03-30 05:27:29'),
(6, 'Isi', 'Aucaman', 'isi.aucaman', 'isi.aucaman@yandex.com', '2020-03-27 15:33:16', '$2y$10$kUII4MSZsRPyKVV1LG8iC.Kj8hc1Cmp3YAbDbUxW4PkogOG1qas.m', 1, NULL, '2020-03-27 15:32:54', '2020-03-27 15:33:16'),
(7, 'Joseph', 'Scott', 'Joseph Scott', 'joseph.scott027@outlook.com', '2020-03-27 15:39:47', '$2y$10$QEgnEV/i/OX7q6VwJAS9dO43//sSlyq9VrIzPT.B0mN4SU1x3vegC', 2, 'B1vxhdLNQQ3hmFUTUMDr747ZaWHF0QDwbqa8VLsKKXLjFBsIOWzzwDC2MFv6', '2020-03-27 15:38:37', '2020-04-03 18:31:16'),
(12, 'Rui', 'Ma', 'ruima027', 'ruima027@gmail.com', NULL, '$2y$10$FTLsRixdFiSmf2Om9CItleG7L4852/18qXQLRF7fmnXpd9F9sxg2C', 3, NULL, '2020-04-01 22:55:32', '2020-04-01 22:55:32');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gym_id` bigint(20) UNSIGNED NOT NULL,
  `video_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `gym_id`, `video_url`, `video_title`, `description`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'https://www.youtube.com/watch?v=BcaqAvLdiCU', 'The GYM - Service Experience', 'Gym or work out facility tour example of how to welcome and how not to welcome people visiting. Reminds us of all the inappropriate examples that may be available in such a setting whereby the visitor may feel vulnerable as they are in a new place.', 'Service Video,gym,customer service,satisfaction,service quality,consumer behavior,treadmill,elliptical,weights,service encounter.', 1, '2020-03-28 23:07:53', '2020-03-31 00:13:16'),
(3, 3, 'https://www.youtube.com/watch?v=hm1pX3Qb7L0', 'Gym Music 2015', 'The best Gym Music 2015 & workout music playlists of 2015 to use for the gym ... ►More Free Music: http://goo.gl/hUpPJV - https://goo.gl/aX6Wa3 The best pump up songs put into workout playlists to pump you up in the gym. Can be used for running playlists, lifting playlists and anything else you need to ...\r\n\r\nWatch our best Gym Music 2016 Video : https://youtu.be/jFhbc7CTVRA\r\n\r\nWatch our best Gym Music 2015 Video : https://youtu.be/ManrLUntl1U\r\n\r\nWorkout Music Mobile Gym Music 2015 App: \r\nIOS: https://goo.gl/FpURHx \r\nAndroid: https://goo.gl/TjGwev \r\n\r\n\r\nPlease subscribe our Workout Music Channel for more free music: http://goo.gl/1qWwDI\r\n\r\nWorkout Motivation Music, Workout Songs To Help You Get Bigger, Stronger, and Faster in Health & Sports.\r\nhttps://www.facebook.com/WorkoutMusicService\r\n\r\nWorkout Music on Twitter:\r\nhttps://twitter.com/WorkoutMusic1\r\n\r\nBest Workout Music Playlist on Spotify:\r\nhttp://goo.gl/m73QMy\r\n\r\nYou want a Channel like Workout Music Service ? Register here your channel to earn money with youtube: http://goo.gl/bJs4Rb', 'music for gym,Gym Music 2015,gym music,Gym Music,workout music 2015,music gym 2016,gym,gym music 2016,best workout songs,gym motivation music,pump up songs,pump up music,pump up music 2016,best gym music,workout songs,workout music 2017,bodybuilding,crossfit,motivation 2017,charts,tracklist,2018,gym channel,gym motivation,fitness,gym music 2017,powerlifting motivation,aggressive,best,nfl pump up,running music,playlist,2017-2018,trap mix 2017', 1, '2020-03-28 23:11:23', '2020-03-31 00:13:24'),
(6, 3, 'https://www.youtube.com/watch?v=qlRC72jwu4s', 'Tiger Shroff’s gym workout video leaked!', 'Tiger Shroff who is known to be quite an avid fitness freak was caught working out in his gym. Here are some exclusive videos and photos of the actor’s fitness regime. Check it out!\r\n\r\nWatch latest Bollywood gossip videos, latest Bollywood news and behind the scene Bollywood Masala. For interesting Latest Bollywood News subscribe to Biscoot TV now : http://www.youtube.com/BiscootTV\r\n\r\nLike us on Facebook\r\nhttps://www.facebook.com/BiscootLive\r\n\r\nFollow us on Twitter\r\nhttp://www.twitter.com/BiscootLive\r\n\r\nFor Latest Bollywood News Subscribe us on Youtube \r\nhttp://www.youtube.com/c/BiscootTV\r\n\r\nCircle us on G+ \r\nhttps://plus.google.com/+BiscootLive\r\n\r\nFind us on Pinterest\r\nhttp://pinterest.com/BiscootLive', 'tiger shroff gym,tiger shroff gym video,gym video,tiger shroff body workout,tiger shroff gym workout,tiger shroff workout in gym videos,tiger shroff body building in gym,gym video workout,tiger shroff exercise,tiger shroff fitness,gym workout,tiger shroff workout,zym work out,gym work out,tiger shroff video,work out videos,gym videos,gym workout videos,tiger shroff body,workout gym,tiger shroff,tiger shrof,workout videos,work out,gym,workout', 1, '2020-03-28 23:12:49', '2020-03-28 23:14:22'),
(8, 3, 'https://www.youtube.com/watch?v=KRtx_SbAlXw', 'Bringing Your SERVICE DOG to the GYM: Tips and Tricks!', 'HOUSEWARMING WISHLIST – http://a.co/exMhN1h\r\nOUR PATREON PAGE – https://www.patreon.com/ChronicallyJaquie\r\n- LIVE STREAMS, EARLY video access, SKYPE sessions and more!\r\nOUR ONLINE STORE – https://teespring.com/stores/chronicallyjaquie\r\n\r\nNEW TO CHRONICALLY JAQUIE? START HERE!\r\n- All About My Chronic Illnesses – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMOPAUpC5zjqGxFiko9FH3p\r\n- All About Harlow – https://www.youtube.com/watch?v=QCb2Rl3BB4s\r\n- Judd and Jaq Relationship Q&A Vlog – https://www.youtube.com/watch?v=Co3ctXejU6w&index=68&list=PLrAi_F1oEjCOCESscC9SX8knIJjfKRVpF&t=701s\r\n--- Skip to 7:03 in the Vlog to watch the Relationship Q&A section!\r\n- “New Here” Playlist - https://www.youtube.com/playlist?list=PLrAi_F1oEjCMOPAUpC5zjqGxFiko9FH3p\r\n\r\nLIKE WHAT YOU SEE?\r\n- Cambridge Mask – https://cambridgemask.com/\r\n--- I wear the mask due to my Mast Cell and Immunodeficiency, it filters allergens and germs. Thanks to IVIG (a treatment for my immunodeficiency), I no longer need it as often as before. However, I still wear it in higher risk areas, such as hospitals/emergency rooms.\r\n- Primary Camera (Canon G7 X Mark II) – https://shop.usa.canon.com/shop/en/catalog/powershot-g7-x-mark-ii?cm_mmc=GA-_-CameraGroup-_-160224Brand%20Paid%20Search-_-canon%20G7%20X%20Mark%20II&Ap=Camera%20General&gclid=Cj0KEQjw0IvIBRDF0Yzq4qGE4IwBEiQATMQlMQV9VB6friCb290bDPvMB70AbclocCMqy58uFX13d2waAqCK8P8HAQ\r\n- Secondary Camera (Canon SX620) – https://shop.usa.canon.com/shop/en/catalog/powershot-sx620-hs-red-digital-camera?krypto=UCdm6VXznCPNmFdZVYYXtVDRRtyaWArk1AvLZe9yU9Tf3xY%2F6zptnlo42D%2B%2BwTodNSM9dmePQunDRXt4rkOh8GmPqYk8iySBNNllVQdxyUKXTqo7iIdDN2eKxZpW%2Bv9YR%2BCU6EE1eNnB7b5yto7%2BJ5RFhgkGu2urb2k3OOrLUTc%3D&ddkey=http%3Aen%2Fcatalog%2Fpowershot-sx620-hs-black-digital-camera#\r\n- My Editing Software (Filmora) – https://filmora.wondershare.com/\r\n\r\nNEED MORE CHRONIC ILLNESS OR SERVICE DOG INFO?\r\n- Chronic Illness Support Playlist – https://www.youtube.com/watch?v=yjprUf9wHvg\r\n- Service Dog Support Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCOTWZJyvgqJV1Y5uP6xrvtS\r\n- Training Tutorial Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCM53-RI_yxebqrcwIc-lmge\r\n- Mito Disease/Genetics Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMFMgqRvI3HIZJOEabb08we\r\n- Mast Cell/Xolair Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCNRVP3Qu0Y8IAivKXDcH2Gw\r\n- Dysautonomia/POTS Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMp_-Lhptp0eh90natpCzKc\r\n- Feeding Tube/Gastroparesis Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCM6tTJsNeA0wR-4eI2XU-J0\r\n- IV Therapy/Central Line Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCN2opVmL52XThP0pFFsgFkf\r\n- Pain Management/EDS Playlist – https://www.youtube.com/watch?v=AZ95DqE6An4&list=PLrAi_F1oEjCNPSs3kb8YQBKGWQbnKL8dV\r\n- Medical Cannabis Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMQ-a2WpfU4OeN71ZnyifAw\r\n- IVIG/Immunodeficiency Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMimJMcrtJw2Njhw-nXejRV\r\n- Custom Wheelchair Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMxwq35jtx-L5ivk67ElCI9\r\n- Other Helpful Playlists – https://www.youtube.com/channel/UCKaX0dQwEUgTafzCZ2yEjUQ/playlists', 'weight training (hobby),physical exercise (interest),how to train a service dog,service dog,Service Dog at the Gym,Golden Retriever Service Dog,Dysautonomia Exercie,Ehlers Danlos Exercise,Chronic Illness Exercise,Dog Training,Service Dog Training,Public Access Training,Chronic Illness,Chronic Pain,Disability,Spoonie,Health,Medicine', 1, '2020-03-28 23:13:42', '2020-03-28 23:17:37'),
(10, 2, 'https://www.youtube.com/watch?v=6g8G3YQtQt4', 'Deploy Laravel To Shared Hosting The Easy Way', 'In this video I will show you how to easily deploy a Laravel application to a shared hosting account with InMotion hosting. We will deploy without having to type in one command. Everything will be done via Cpanel and FTP.\r\n\r\nINMOTION HOSTING: Get an account for $5.99 per month\r\nhttps://secure1.inmotionhosting.com/cgi-bin/gby/clickthru.cgi?id=traversymedia\r\n\r\n10 PROJECT LARAVEL COURSE: Please use affiliate link below\r\nhttps://www.eduonix.com/affiliates/id/16-10485\r\n50% OFF: Use special code \"traversy\"\r\n\r\nCODE: Complete Code For This Series\r\nhttps://github.com/bradtraversy/lsapp\r\n\r\nFULL SERIES:\r\nhttps://www.youtube.com/watch?v=EU7PRmCpx-0\r\n\r\nSUPPORT: We spend massive amounts of time creating these free videos, please donate to show your support:\r\nhttp://www.paypal.me/traversymedia\r\nhttp://www.patreon.com/traversymedia\r\n\r\nFOLLOW TRAVERSY MEDIA:\r\nhttp://www.facebook.com/traversymedia\r\nhttp://www.twitter.com/traversymedia\r\nhttp://www.linkedin.com/in/bradtraversy', 'laravel deploy,deploy laravel,laravel hosting,laravel shared hosting,laravel,host laravel,laravel server,laravel ftp,laravel cpanel,inmotion hosting', 1, '2020-03-29 07:56:01', '2020-03-29 07:56:09'),
(11, 3, 'https://youtu.be/U6SBVeWpJ6Q', 'Gym Music 2018 - Best Gym Music Playlist', 'Please subscribe our Workout Music Channel for more weekly new free music: http://goo.gl/1qWwDI\r\n\r\nWorkout Motivation on Facebook:\r\nhttps://www.facebook.com/WorkoutMusicService\r\n\r\nWorkout Music Mobile App:\r\nhttps://goo.gl/FpURHx \r\n\r\nWorkout Music Service on Twitter:\r\nhttps://twitter.com/WorkoutMusic1\r\n\r\nWorkout Music on Instagram:\r\nhttps://instagram.com/workout_music_service/\r\n\r\nBest Workout Music Playlist on Spotify:\r\nhttp://goo.gl/m73QMy\r\n\r\nYou want a Channel like this ? Build your own Channel: http://goo.gl/bJs4Rb\r\n\r\n\r\n charts 2018 2019 2k18 motivacion fitness motivation', 'Gym Music 2018,Gym Music,workout songs,workout music,gym motivation,2018,motivation,charts 2018,2019,motivacion,2k18,best songs of 2018,top 2018,crossfit music,best songs 2018,warm up,playlist,female motivation,2018 mix,free download,best gym music,training,motivation music workout,songs for workout,top songs of 2018,music workout,gym workout,powerlifting motivation,morning motivation,mix 2018,charts,workout music mix 2017,running playlist 2017', 1, '2020-03-29 14:16:46', '2020-03-31 00:13:32'),
(17, 3, 'https://www.youtube.com/watch?v=6g8G3YQtQt4', 'Deploy Laravel To Shared Hosting The Easy Way', 'In this video I will show you how to easily deploy a Laravel application to a shared hosting account with InMotion hosting. We will deploy without having to type in one command. Everything will be done via Cpanel and FTP.\r\n\r\nINMOTION HOSTING: Get an account for $5.99 per month\r\nhttps://secure1.inmotionhosting.com/cgi-bin/gby/clickthru.cgi?id=traversymedia\r\n\r\n10 PROJECT LARAVEL COURSE: Please use affiliate link below\r\nhttps://www.eduonix.com/affiliates/id/16-10485\r\n50% OFF: Use special code \"traversy\"\r\n\r\nCODE: Complete Code For This Series\r\nhttps://github.com/bradtraversy/lsapp\r\n\r\nFULL SERIES:\r\nhttps://www.youtube.com/watch?v=EU7PRmCpx-0\r\n\r\nSUPPORT: We spend massive amounts of time creating these free videos, please donate to show your support:\r\nhttp://www.paypal.me/traversymedia\r\nhttp://www.patreon.com/traversymedia\r\n\r\nFOLLOW TRAVERSY MEDIA:\r\nhttp://www.facebook.com/traversymedia\r\nhttp://www.twitter.com/traversymedia\r\nhttp://www.linkedin.com/in/bradtraversy', 'laravel deploy,deploy laravel,laravel hosting,laravel shared hosting,laravel,host laravel,laravel server,laravel ftp,laravel cpanel,inmotion hosting', 1, '2020-04-02 02:05:54', '2020-04-02 02:07:58'),
(19, 3, 'https://www.youtube.com/watch?v=Ns_ljK5VlEU', 'REFUSE TO LOSE - FIGHT UNTIL THE END - HOME GYM TRAINING MOTIVATION', '● Motivation Merch http://www.gymmotivationwear.com\r\n● Follow me on Facebook https://www.fb.com/nicandrovisionmotivation\r\n● Follow me on Instagram https://www.instagram.com/nicandro_vision_motivation/\r\n● Motivation Playlist http://bit.ly/MotivationPlaylist\r\n\r\nDorian Yates Speech https://www.instagram.com/ronniecoleman8/\r\nVincent Masone https://www.instagram.com/vincenzomasone/\r\nRonnie Coleman https://www.instagram.com/ronniecoleman8/\r\nAnimal https://www.instagram.com/animalpak/\r\nEvan Centopani https://www.instagram.com/evancentopani/\r\n\r\nMusic by Fearless Motivation \r\nDownload or Stream it on iTunes, Spotify or Google Play.\r\nwww.FearlessMotivation.com\r\nMore Fearless Motivation you can listen to every day:\r\niTunes: https://goo.gl/T5gm5W\r\nGooglePlay: https://goo.gl/NciJJS\r\nSpotify: https://goo.gl/tlEU5T\r\nAmazonMP3: https://amzn.to/2GBGIOC\r\nWorldwide MP3: https://goo.gl/nuZwpP\r\n\r\n#Mentality #BlastTheBasics #KeepMovingForward', 'nicandro,nicandro vision,nicandro vision motivation,nicandro motivation,home training,best gym motivation,best preworkout motivation,ronnie coleman motivation,evan centopani motivation,animal motivation,monster motivation,home training for mass,blast the basics,no excuses,whatever it takes mentality,arm day,gym motivation speech,dorian yates motivation,hardcore gym motivation,stay hungry motivation,hard work pays off,build real muscle at home', 0, '2020-04-03 06:09:11', '2020-04-03 06:09:11'),
(20, 3, 'https://www.youtube.com/watch?v=VdxDnuXj4yc', 'Workout Mix 2020 | Fitness & Gym Motivation', '👉 Stream/Download 👉 https://band.link/maxoazo\r\n🎵 Spotify: ►This is Max Oazo: 👉https://spoti.fi/2TGqY4l  \r\n                     ►Fresh Summer Hits: 👉https://spoti.fi/2Fi1KR9\r\n                     ►TikTok Biggest Hits 2020: 👉https://urlzs.com/f3qDp\r\n                     ►Deep Nation Fresh Songs 2020: 👉 https://urlzs.com/th2VN\r\n                     ►Selected Vibes: 👉https://urlzs.com/D73pf\r\n                     ►Car Music Mix: 👉https://urlzs.com/BHg2N\r\n                     ►Roadtrip Music: 👉https://urlzs.com/475oU\r\n🎵 More music: https://bit.ly/2F3SUoF              https://bit.ly/2pFpfuz\r\n                             https://bit.ly/2UxpmX1             https://bit.ly/2T2jp2S\r\n                             https://bit.ly/2FeAJ0N              https://bit.ly/2TSNhmI\r\n\r\n🎵 Youtube Playlists:\r\n►https://bit.ly/2VVrw38\r\n►https://bit.ly/2Y19PAU\r\n►https://urlzs.com/juppj \r\n\r\nHit the gym and get ready to sweat with this ultimate workout music mix featuring the best workout songs of all time. 60 minutes of non-stop music to get you in your zone, push harder in your workouts, and pump up that speed. All these songs will help turn every gym session or run into a party. \r\n\r\n► Follow EnormousTunes \r\nhttp://www.facebook.com/EnormousTunes \r\nhttp://soundcloud.com/EnormousTunes \r\nhttp://twitter.com/EnormousTunes\r\nhttps://www.instagram.com/EnormousTunesRecords\r\n\r\nHomebase of: Croatia Squad // Nora En Pure // Passenger 10 // Calippo // Stanley Ross // Sons of Maria// Me & MyToothbrush// Fort Arkansas // Platinum Doug // Leventina // EDX // Daniel Portman // Lika Morgan // Paul Richmond\r\n\r\n► Follow Max Oazo:\r\nhttps://soundcloud.com/maxoazo\r\nhttps://facebook.com/maxoazomusic\r\nhttps://twitter.com/maxoazomusic\r\nhttps://youtube.com/maxoazomusic\r\nhttps://instagram.com/maxoazo\r\n\r\n► Follow OWN MUSIC:\r\nhttps://facebook.com/ownmusiclabel\r\nhttps://twitter.com/ownmusiclabel\r\nhttps://instagram.com/ownmusiclabel\r\nhttps://soundcloud.com/ownmusiclabel\r\n\r\nHello beautiful people ❤\r\nThank you so much for your continuous love and support. Your Like, Share and Comment means the world for me. ENJOY this mix and have a fantastic day!\r\n\r\nListen Max Oazo\'s music here:\r\nhttp://hyperurl.co/maxoazomusic\r\n------------------------------------------------------\r\nDeep House\r\nIbiza Summer Mix 2020\r\nBest Summer Music\r\nIbiza Music\r\nBest Summer Hits\r\nWorkout Mix 2020\r\nFitness & Gym Motivation\r\nIbiza Party\r\nTropical Deep House\r\ntravel music mix 2020\r\nIbiza Beach\r\nSummer Tropical House Mix\r\nSummer Chill Mix\r\nChill Out Music\r\nnext cardio workout\r\nstrength training\r\nдип хаус 2020\r\nDance Music\r\nSummer chill mix\r\nDeep House & Chill Music\r\nKлассная музыка\r\nЗарубежные песни\r\nMузыка в Mашину\r\nDrive Music Mix\r\nIbiza Music\r\nCar Music Mix\r\nSummer Music\r\ndriving music mix\r\nRoad Trip music mix\r\n夏季寒意音乐组合\r\n流行搖滾音樂的超級組合，以推動在道路上的汽車或卡車\r\n\r\n#maxoazo #workout #fitness #cardio #strengthtraining\r\n\r\n© & P 2019 OWN MUSIC All rights are reserved \r\n       For more information: contact@ownmusiclabel.com', 'max oazo supergirl,songs for workout in gym,max oazo,fitness & gym motivation,gym songs motivation,gym motivation playlist 2020,workout women fitness,training musik mix,workout music,fitness music 2020 clean,street fitness music,best powerlifting songs,jogging playlist 2020,crossfit songs,gym workout for women,Workout Mix 2020,workout music mix,female fitness motivation,cardio training workout to fast fat loss,strength training for women beginners', 1, '2020-04-03 06:36:45', '2020-04-03 07:32:35'),
(21, 3, 'https://www.youtube.com/watch?v=ePbFsn5hYi0', 'Música Electrónica Motivadora para Hacer Ejercicio🔥Motivación Hombres🔥Entrenar Duro en el Gym🔥', 'Música Electrónica Motivadora para Hacer Ejercicio🔥Motivación Hombres🔥Entrenar Duro en el Gym🔥\r\n\r\n✪ Follow : Parker - Música Electrónica ⤵️ \r\n◢ Youtube ➞ https://bit.ly/2V5ZJgD\r\n🔔 CONTÁCTENOS : copyright.deepvibes@gmail.com\r\n\r\n___\r\n▽ Todos los derechos pertenecen a sus respectivos propietarios. Si algún dueño de la pista / fondo utilizado en esta mezcla es infeliz, por favor no nos informe, tome su tiempo para ponerse en contacto con nosotros.\r\nLe proporcionaremos créditos apropiados o quitaremos el video si usted lo solicita.\r\n\r\n#GYM, #mejor, #musica, #electronicas, #mix', 'musica para hacer ejercicio,musica motivadora,musica motivadora para hacer ejercicio,musica para correr,musica electronica,musica electronica 2020,musica electro house,musica electro house 2020,musica house electronica,musica house 2020,musica electro 2020,musica para hacer ejercicio motivadora,musica para correr motivacion,musica para hacer ejercicio 2020,musica para ejercicio,musica electronica para hacer ejercicio,musica para hacer,musica para hacer 2020', 0, '2020-04-03 07:05:22', '2020-04-03 07:05:22'),
(22, 3, 'https://www.youtube.com/watch?v=EgjHkGu3aKg', 'How to Build the Perfect Home Gym | Home Gym Tour', 'Shop at MyProtein (Use Code \"JOE\" for 30% off your entire order- https://bit.ly/3dGZodO\r\n\r\nLike I said in the video, some items are sold out/prices have been inflated massively. I will still leave links to all the items but also links to alternatives:\r\n\r\nMy Power Rack - https://www.ebay.co.uk/itm/RYNO-ULTIMATE-POWER-RACK-CAGE-WITH-WEIGHT-BENCH-COMBO-DEAL-SQUAT-RACK-PULL-UP/301183922407?_trkparms=ispr%3D1&hash=item461ff5f0e7:m:m8y4YqdOD5bmt7q87RY6veA\r\n\r\nOther Power Rack Alternative: https://www.ebay.co.uk/i/133144728238?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=133144728238&targetid=882152737572&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9461445820&mkgroupid=96337107832&rlsatarget=pla-882152737572&abcId=1139576&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FTxJHmOMMZjaqZRJh0x7bUPI_YMAFtDnpxv2dMgMbhLMFoX5OrjOCWBoCraQQAvD_BwE\r\n\r\nOther Power Rack Alternative 2: https://www.ebay.co.uk/i/122612033410?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=122612033410&targetid=878026981600&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9437609954&mkgroupid=94749635494&rlsatarget=pla-878026981600&abcId=1139126&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT2gedacKpTv9t3r5Rk4HGltxu9lysa1pSxbIJe42YY0xi2jqT_mdlBoC38kQAvD_BwE\r\n\r\nMy Barbell: https://www.ebay.co.uk/i/123897816259?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=123897816259&targetid=879210061183&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9437867657&mkgroupid=96613766395&rlsatarget=pla-879210061183&abcId=1139366&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT5yXvEvgFNs9TfYw1nQRwmz-5I__3g3kQG5FJS98Z56OpBLp2s8bNhoCFA0QAvD_BwE\r\n\r\nOther Barbell Alternative: https://www.ebay.co.uk/p/1743747658?iid=113844759985&chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=113844759985&targetid=877514743599&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9441122112&mkgroupid=94116287925&rlsatarget=pla-877514743599&abcId=1140496&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT5Unhjjpu3TGDCz9S10mNKhBxya1wTplX4LIIcWvZVEbVkQF_-V9nRoCVPcQAvD_BwE\r\n\r\nMy Bench Press: https://www.ebay.co.uk/i/113793313928?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=113793313928&targetid=878634471058&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9437742368&mkgroupid=95452926426&rlsatarget=pla-878634471058&abcId=1140496&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT0kdDzszEasNg3AzSkJgcvI_qhBzlQLJqw-R2xXdrOHliEw2W_i_jBoCvnQQAvD_BwE\r\n\r\nOther Bench Press Alternative: https://www.ebay.co.uk/itm/KELTON-HD-HL4-BENCH-AVENGER-INCLINE-DECLINE-ADJUSTABLE-LIFTING-CHEST-PRESS-GYM/263846242040?epid=19021944247&hash=item3d6e7626f8:g:PcsAAOSwrh5bXkjn\r\n\r\nMy Weights (currently sold out at the time of this recording): https://www.extremefitness.co.uk/extreme-fitness-colour-rubber-bumper-plates\r\n\r\nBox Squat Box: https://www.ebay.co.uk/i/163731577905?chn=ps&var=463239374839&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=463239374839_163731577905&targetid=878634471058&device=c&mktype=pla&googleloc=9046224&campaignid=9437742368&mkgroupid=95452926426&rlsatarget=pla-878634471058&abcId=1140496&merchantid=113735254&gclid=CjwKCAjwguzzBRBiEiwAgU0FT3mg1Ph59sdYPVkLYRNiD3oNjwF9Zv3_-aAnpRP9Blrj7xhJgt5bvRoCCsAQAvD_BwE\r\n\r\nResistance Bands: https://www.rogueeurope.eu/rogue-monster-bands-eu', 'gym,youtube,bodybuilder,powerlifter,vlog,vlogging,funny,muscle,eating,davidlaid,david,laid,gymshark,how to build a home gym,cheap home gym,best home gym equipment,what equipment do you need for a home gym,building a home gym,the perfect home gym,cheap equipment for a home gym,how to build the cheapest home gym,the worlds best home gym,how to build big arms,how to workout at home', 0, '2020-04-03 07:31:58', '2020-04-03 07:31:58'),
(23, 3, 'https://www.youtube.com/watch?v=EgjHkGu3aKg', 'How to Build the Perfect Home Gym | Home Gym Tour', 'Shop at MyProtein (Use Code \"JOE\" for 30% off your entire order- https://bit.ly/3dGZodO\r\n\r\nLike I said in the video, some items are sold out/prices have been inflated massively. I will still leave links to all the items but also links to alternatives:\r\n\r\nMy Power Rack - https://www.ebay.co.uk/itm/RYNO-ULTIMATE-POWER-RACK-CAGE-WITH-WEIGHT-BENCH-COMBO-DEAL-SQUAT-RACK-PULL-UP/301183922407?_trkparms=ispr%3D1&hash=item461ff5f0e7:m:m8y4YqdOD5bmt7q87RY6veA\r\n\r\nOther Power Rack Alternative: https://www.ebay.co.uk/i/133144728238?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=133144728238&targetid=882152737572&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9461445820&mkgroupid=96337107832&rlsatarget=pla-882152737572&abcId=1139576&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FTxJHmOMMZjaqZRJh0x7bUPI_YMAFtDnpxv2dMgMbhLMFoX5OrjOCWBoCraQQAvD_BwE\r\n\r\nOther Power Rack Alternative 2: https://www.ebay.co.uk/i/122612033410?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=122612033410&targetid=878026981600&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9437609954&mkgroupid=94749635494&rlsatarget=pla-878026981600&abcId=1139126&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT2gedacKpTv9t3r5Rk4HGltxu9lysa1pSxbIJe42YY0xi2jqT_mdlBoC38kQAvD_BwE\r\n\r\nMy Barbell: https://www.ebay.co.uk/i/123897816259?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=123897816259&targetid=879210061183&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9437867657&mkgroupid=96613766395&rlsatarget=pla-879210061183&abcId=1139366&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT5yXvEvgFNs9TfYw1nQRwmz-5I__3g3kQG5FJS98Z56OpBLp2s8bNhoCFA0QAvD_BwE\r\n\r\nOther Barbell Alternative: https://www.ebay.co.uk/p/1743747658?iid=113844759985&chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=113844759985&targetid=877514743599&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9441122112&mkgroupid=94116287925&rlsatarget=pla-877514743599&abcId=1140496&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT5Unhjjpu3TGDCz9S10mNKhBxya1wTplX4LIIcWvZVEbVkQF_-V9nRoCVPcQAvD_BwE\r\n\r\nMy Bench Press: https://www.ebay.co.uk/i/113793313928?chn=ps&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=113793313928&targetid=878634471058&device=c&mktype=pla&googleloc=1006965&poi=&campaignid=9437742368&mkgroupid=95452926426&rlsatarget=pla-878634471058&abcId=1140496&merchantid=138357610&gclid=CjwKCAjwguzzBRBiEiwAgU0FT0kdDzszEasNg3AzSkJgcvI_qhBzlQLJqw-R2xXdrOHliEw2W_i_jBoCvnQQAvD_BwE\r\n\r\nOther Bench Press Alternative: https://www.ebay.co.uk/itm/KELTON-HD-HL4-BENCH-AVENGER-INCLINE-DECLINE-ADJUSTABLE-LIFTING-CHEST-PRESS-GYM/263846242040?epid=19021944247&hash=item3d6e7626f8:g:PcsAAOSwrh5bXkjn\r\n\r\nMy Weights (currently sold out at the time of this recording): https://www.extremefitness.co.uk/extreme-fitness-colour-rubber-bumper-plates\r\n\r\nBox Squat Box: https://www.ebay.co.uk/i/163731577905?chn=ps&var=463239374839&norover=1&mkevt=1&mkrid=710-134428-41853-0&mkcid=2&itemid=463239374839_163731577905&targetid=878634471058&device=c&mktype=pla&googleloc=9046224&campaignid=9437742368&mkgroupid=95452926426&rlsatarget=pla-878634471058&abcId=1140496&merchantid=113735254&gclid=CjwKCAjwguzzBRBiEiwAgU0FT3mg1Ph59sdYPVkLYRNiD3oNjwF9Zv3_-aAnpRP9Blrj7xhJgt5bvRoCCsAQAvD_BwE\r\n\r\nResistance Bands: https://www.rogueeurope.eu/rogue-monster-bands-eu', 'gym,youtube,bodybuilder,powerlifter,vlog,vlogging,funny,muscle,eating,davidlaid,david,laid,gymshark,how to build a home gym,cheap home gym,best home gym equipment,what equipment do you need for a home gym,building a home gym,the perfect home gym,cheap equipment for a home gym,how to build the cheapest home gym,the worlds best home gym,how to build big arms,how to workout at home', 0, '2020-04-03 10:41:13', '2020-04-03 10:41:13'),
(24, 3, 'https://www.youtube.com/watch?v=6g8G3YQtQt4', 'dragondragondraogn', 'In this video I will show you how to easily deploy a Laravel application to a shared hosting account with InMotion hosting. We will deploy without having to type in one command. Everything will be done via Cpanel and FTP.\r\n\r\nINMOTION HOSTING: Get an account for $5.99 per month\r\nhttps://secure1.inmotionhosting.com/cgi-bin/gby/clickthru.cgi?id=traversymedia\r\n\r\n10 PROJECT LARAVEL COURSE: Please use affiliate link below\r\nhttps://www.eduonix.com/affiliates/id/16-10485\r\n50% OFF: Use special code \"traversy\"\r\n\r\nCODE: Complete Code For This Series\r\nhttps://github.com/bradtraversy/lsapp\r\n\r\nFULL SERIES:\r\nhttps://www.youtube.com/watch?v=EU7PRmCpx-0\r\n\r\nSUPPORT: We spend massive amounts of time creating these free videos, please donate to show your support:\r\nhttp://www.paypal.me/traversymedia\r\nhttp://www.patreon.com/traversymedia\r\n\r\nFOLLOW TRAVERSY MEDIA:\r\nhttp://www.facebook.com/traversymedia\r\nhttp://www.twitter.com/traversymedia\r\nhttp://www.linkedin.com/in/bradtraversy', 'laravel deploy,deploy laravel,laravel hosting,laravel shared hosting,laravel,host laravel,laravel server,laravel ftp,laravel cpanel,inmotion hosting', 0, '2020-04-03 17:33:34', '2020-04-03 17:33:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_log_log_name_index` (`log_name`),
  ADD KEY `subject` (`subject_id`,`subject_type`),
  ADD KEY `causer` (`causer_id`,`causer_type`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`user_id`,`video_id`),
  ADD KEY `favorites_video_id_foreign` (`video_id`);

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
  ADD PRIMARY KEY (`user_id`,`gym_id`),
  ADD KEY `gym_user_gym_id_foreign` (`gym_id`);

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
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist_videos`
--
ALTER TABLE `playlist_videos`
  ADD PRIMARY KEY (`playlist_id`,`video_id`),
  ADD KEY `playlist_videos_video_id_foreign` (`video_id`);

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
  ADD UNIQUE KEY `users_name_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_gym_id_foreign` (`gym_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gyms`
--
ALTER TABLE `gyms`
  ADD CONSTRAINT `gyms_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gym_user`
--
ALTER TABLE `gym_user`
  ADD CONSTRAINT `gym_user_gym_id_foreign` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gym_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `playlist_videos`
--
ALTER TABLE `playlist_videos`
  ADD CONSTRAINT `playlist_videos_playlist_id_foreign` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `playlist_videos_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_gym_id_foreign` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
