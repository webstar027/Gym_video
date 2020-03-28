-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 08:06 PM
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
-- Database: `ground_monkey`
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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `video_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(5, 1, '2020-03-29 00:01:20', '2020-03-29 00:01:20'),
(5, 5, '2020-03-29 00:31:26', '2020-03-29 00:31:26'),
(7, 1, '2020-03-28 23:43:17', '2020-03-28 23:43:17'),
(7, 2, '2020-03-28 23:45:23', '2020-03-28 23:45:23');

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
(2, 'Isi Aucaman', 'Los Angeles', 'Los Angeles', 'Los Angeles', 'Los Angeles', 'United States', '123456', 'www.web.com', 6, '2020-03-26 14:00:00', '2020-03-26 14:00:00'),
(3, 'Joseph Scott', 'Joseph Scott', 'Joseph Scott', 'Tucson', 'AZ', 'US', '85750', 'www.website.com', 7, '2020-03-27 15:38:37', '2020-03-27 15:38:37'),
(5, 'GrandGym', 'New York', 'Los Angeles', 'New York', 'New York', 'US', '1994', 'https://www.web.com', 9, '2020-03-28 16:06:39', '2020-03-28 16:06:39');

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
(5, 2, 3, '2020-03-29 01:12:58', '2020-03-29 01:12:58'),
(5, 3, 3, '2020-03-29 00:57:17', '2020-03-29 00:57:17'),
(5, 5, 2, '2020-03-29 01:09:35', '2020-03-29 01:09:35');

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
(8, '2020_03_25_221351_create_favorites_table', 1);

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
(1, 'judyferrell@yandex.com', '$2y$10$FK3leldLRkxwpUcYUSlWq.D9mBhpUpZ99gENP1yFONbssOy6kztxS', '2020-03-29 01:10:45', NULL);

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
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'johnhh', 'smith', 'johnsmith', 'ruima027@gmail.com', '2020-03-27 15:26:50', '$2y$10$MgAIMhODqpdsbN.43YSOle5e6Sdt2H8DCNqujqt7sxepdNABt8AVS', 3, '7hAtTrbEP7U0I0hPFQwA4rBgb73I1Z6KA9y9WHY2FEHpywSgvO5uiX1LUAXe', '2020-03-27 15:26:18', '2020-03-28 08:13:30'),
(4, 'Joseph', 'Scott', 'Josephscott0605', 'joseph.scott0605@gmail.com', '2020-03-27 15:28:27', '$2y$10$r9hd5uLxdtDU8Bl1z91Thu08JJyJ2e3b7gwo/WkWXZ/mMYGGFlqOy', 3, '4cCdLciurquXk9C7rkyV35MyjEAmxgdsQnz5VnhfRuvVl7f6DftMQXn09ra0', '2020-03-27 15:27:44', '2020-03-28 16:52:25'),
(5, 'bill', 'chong', 'bchong', 'bchong753@gmail.com', '2020-03-27 15:31:03', '$2y$10$OLTwwO/OJnf26Ry50N/B1OrZBTxOlQEjfyfVKDebiLI9Dt5TqlDNy', 3, 'IvAUBSoZQUWoWUL1kZUVno9TgYbxEPzjy7mqhVQIumYatheH2U5iXghhcB1S', '2020-03-27 15:30:36', '2020-03-28 17:03:32'),
(6, 'Isi', 'Aucaman', 'isi.aucaman', 'isi.aucaman@yandex.com', '2020-03-27 15:33:16', '$2y$10$kUII4MSZsRPyKVV1LG8iC.Kj8hc1Cmp3YAbDbUxW4PkogOG1qas.m', 2, NULL, '2020-03-27 15:32:54', '2020-03-27 15:33:16'),
(7, 'Joseph', 'Scott', 'Joseph Scott', 'joseph.scott027@outlook.com', '2020-03-27 15:39:47', '$2y$10$DidLDiNRZRDo53CAMvEw0OetNhOr5LXKli9k5imdLlshZ4QNjLXp.', 2, 'aZQSNzZRQ8eykvGfBDeWXMCbXYXCfkpCsHFxMc1vwsfFAxw3stIS4iIR7OXo', '2020-03-27 15:38:37', '2020-03-27 15:39:47'),
(9, 'Judy', 'Ferrell', 'judyferrell', 'judyferrell@yandex.com', '2020-03-27 22:07:14', '$2y$10$z0X7WVSW81iiORbx/kE6TeDXcKPd22q9H4ATfH94EY4NXtf8II73.', 2, NULL, '2020-03-28 16:06:39', '2020-03-28 16:06:39');

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
  `tag` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `gym_id`, `video_url`, `video_title`, `description`, `tag`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'https://youtu.be/6g8G3YQtQt4', 'Deploy Laravel To Shared Hosting The Easy Way', 'In this video I will show you how to easily deploy a Laravel application to a shared hosting account with InMotion hosting. We will deploy without having to type in one command. Everything will be done via Cpanel and FTP.\r\n\r\nINMOTION HOSTING: Get an account for $5.99 per month\r\nhttps://secure1.inmotionhosting.com/cgi-bin/gby/clickthru.cgi?id=traversymedia\r\n\r\n10 PROJECT LARAVEL COURSE: Please use affiliate link below\r\nhttps://www.eduonix.com/affiliates/id/16-10485\r\n50% OFF: Use special code \"traversy\"\r\n\r\nCODE: Complete Code For This Series\r\nhttps://github.com/bradtraversy/lsapp\r\n\r\nFULL SERIES:\r\nhttps://www.youtube.com/watch?v=EU7PRmCpx-0\r\n\r\nSUPPORT: We spend massive amounts of time creating these free videos, please donate to show your support:\r\nhttp://www.paypal.me/traversymedia\r\nhttp://www.patreon.com/traversymedia\r\n\r\nFOLLOW TRAVERSY MEDIA:\r\nhttp://www.facebook.com/traversymedia\r\nhttp://www.twitter.com/traversymedia\r\nhttp://www.linkedin.com/in/bradtraversy', 'laravel deploy,deploy laravel,laravel hosting,laravel shared hosting,laravel,host laravel,laravel server,laravel ftp,laravel cpanel,inmotion hosting', 1, '2020-03-28 22:37:46', '2020-03-28 22:40:08'),
(2, 3, 'https://www.youtube.com/watch?v=BcaqAvLdiCU', 'The GYM - Service Experience', 'Gym or work out facility tour example of how to welcome and how not to welcome people visiting. Reminds us of all the inappropriate examples that may be available in such a setting whereby the visitor may feel vulnerable as they are in a new place.', 'Service Video,gym,customer service,satisfaction,service quality,consumer behavior,treadmill,elliptical,weights,service encounter.', 0, '2020-03-28 23:07:53', '2020-03-28 23:07:53'),
(3, 3, 'https://www.youtube.com/watch?v=hm1pX3Qb7L0', 'Gym Music 2015', 'The best Gym Music 2015 & workout music playlists of 2015 to use for the gym ... ►More Free Music: http://goo.gl/hUpPJV - https://goo.gl/aX6Wa3 The best pump up songs put into workout playlists to pump you up in the gym. Can be used for running playlists, lifting playlists and anything else you need to ...\r\n\r\nWatch our best Gym Music 2016 Video : https://youtu.be/jFhbc7CTVRA\r\n\r\nWatch our best Gym Music 2015 Video : https://youtu.be/ManrLUntl1U\r\n\r\nWorkout Music Mobile Gym Music 2015 App: \r\nIOS: https://goo.gl/FpURHx \r\nAndroid: https://goo.gl/TjGwev \r\n\r\n\r\nPlease subscribe our Workout Music Channel for more free music: http://goo.gl/1qWwDI\r\n\r\nWorkout Motivation Music, Workout Songs To Help You Get Bigger, Stronger, and Faster in Health & Sports.\r\nhttps://www.facebook.com/WorkoutMusicService\r\n\r\nWorkout Music on Twitter:\r\nhttps://twitter.com/WorkoutMusic1\r\n\r\nBest Workout Music Playlist on Spotify:\r\nhttp://goo.gl/m73QMy\r\n\r\nYou want a Channel like Workout Music Service ? Register here your channel to earn money with youtube: http://goo.gl/bJs4Rb', 'music for gym,Gym Music 2015,gym music,Gym Music,workout music 2015,music gym 2016,gym,gym music 2016,best workout songs,gym motivation music,pump up songs,pump up music,pump up music 2016,best gym music,workout songs,workout music 2017,bodybuilding,crossfit,motivation 2017,charts,tracklist,2018,gym channel,gym motivation,fitness,gym music 2017,powerlifting motivation,aggressive,best,nfl pump up,running music,playlist,2017-2018,trap mix 2017', 0, '2020-03-28 23:11:23', '2020-03-28 23:11:23'),
(4, 3, 'https://www.youtube.com/watch?v=FNimYaJzlF8', 'How Service Dogs Workout In The Gym', 'A service dog can be a great help to many people such as myself. As a blind bodybuilder I have a guide dog that goes to the gym with me just about every day. But how does he workout in the gym? What does a service dog do while I workout? Well as you can see I tie him up so he cant get in the way of the weights and he just lays there and looks pretty. Also in this vlog I am going over my strength progression as well as how my training is going to be for the next couple of months as I continue to bulk for my next bodybuilding competition this year. Click here to SUBSCRIBE to follow me in my fitness journey: https://www.youtube.com/channel/UCprS1kuhPed1MK_T6uyuTeg?sub-confirmation=1\r\n\r\nOnline Coaching / Training: Http://www.justinhollandfitness.com/\r\nEmail: justinhollandfitness@gmail.com\r\n\r\nInstagram: https://www.instagram.com/JustinnHollandd/\r\nSnapchat: https://www.snapchat.com/add/jhollandfitness\r\nTwitter: https://www.twitter.com/JustinnHollandd\r\nFacebook: https://www.facebook.com/JustinnHollandd/\r\n\r\nPodcasts  \r\nSoundcloud: https://soundcloud.com/user-938123919\r\nStitcher Radio: http://www.stitcher.com/s?fid=138409&refid=stpr\r\nItunes: https://itunes.apple.com/us/podcast/the-justin-holland-fitness-podcast/id1232974549?mt=2\r\n\r\nSupport Me & The Channel:\r\nAmazon: http://amzn.to/2zqjtjJ', 'service dog,guide dog,workout,bodybuilding,blind,physique,muscle,justin holland,lose weight,abs,aesthetic,vlog,blindness,disabled,motivation,inspiration', 1, '2020-03-28 23:11:52', '2020-03-28 23:50:23'),
(5, 3, 'https://www.youtube.com/watch?v=ggdcIW5MdhA', 'Workout music motivation - Best music workout for GYM and your workout playlist', 'Workout music motivation - Best music workout for GYM and your workout playlist. \r\n\r\nPlease subscribe our  bodybuilding motivation 2017 top 100 training channel: http://goo.gl/1qWwDI\r\n\r\nWorkout Motivation on Facebook:\r\nhttps://www.facebook.com/WorkoutMusicService\r\n\r\nWorkout Music Mobile App:\r\nhttps://goo.gl/FpURHx \r\n\r\nWorkout Music Service on Twitter:\r\nhttps://twitter.com/WorkoutMusic1\r\n\r\nWorkout Music on Instagram:\r\nhttps://instagram.com/workout_music_service/\r\n\r\nBest Workout Music Playlist on Spotify:\r\nhttp://goo.gl/m73QMy\r\n\r\nYou want a Channel like this ? Build your own Channel: http://goo.gl/bJs4Rb', 'Workout music,music workout,workout music,workout music playlist,music for workout,fitness music,music for exercise,exercise music,music,best workout music,2017,hits,motivation,bodybuilding motivation,music motivation gym,top 100,workout songs,workout 2017,workout motivation,motivation music,best workout,bodybuilding,fitness,workout fitness,workout,gym workout,pump up music,training music,gym music 2017,exercise songs,workout motivation music', 1, '2020-03-28 23:12:21', '2020-03-28 23:50:12'),
(6, 3, 'https://www.youtube.com/watch?v=qlRC72jwu4s', 'Tiger Shroff’s gym workout video leaked!', 'Tiger Shroff who is known to be quite an avid fitness freak was caught working out in his gym. Here are some exclusive videos and photos of the actor’s fitness regime. Check it out!\r\n\r\nWatch latest Bollywood gossip videos, latest Bollywood news and behind the scene Bollywood Masala. For interesting Latest Bollywood News subscribe to Biscoot TV now : http://www.youtube.com/BiscootTV\r\n\r\nLike us on Facebook\r\nhttps://www.facebook.com/BiscootLive\r\n\r\nFollow us on Twitter\r\nhttp://www.twitter.com/BiscootLive\r\n\r\nFor Latest Bollywood News Subscribe us on Youtube \r\nhttp://www.youtube.com/c/BiscootTV\r\n\r\nCircle us on G+ \r\nhttps://plus.google.com/+BiscootLive\r\n\r\nFind us on Pinterest\r\nhttp://pinterest.com/BiscootLive', 'tiger shroff gym,tiger shroff gym video,gym video,tiger shroff body workout,tiger shroff gym workout,tiger shroff workout in gym videos,tiger shroff body building in gym,gym video workout,tiger shroff exercise,tiger shroff fitness,gym workout,tiger shroff workout,zym work out,gym work out,tiger shroff video,work out videos,gym videos,gym workout videos,tiger shroff body,workout gym,tiger shroff,tiger shrof,workout videos,work out,gym,workout', 1, '2020-03-28 23:12:49', '2020-03-28 23:14:22'),
(8, 3, 'https://www.youtube.com/watch?v=KRtx_SbAlXw', 'Bringing Your SERVICE DOG to the GYM: Tips and Tricks!', 'HOUSEWARMING WISHLIST – http://a.co/exMhN1h\r\nOUR PATREON PAGE – https://www.patreon.com/ChronicallyJaquie\r\n- LIVE STREAMS, EARLY video access, SKYPE sessions and more!\r\nOUR ONLINE STORE – https://teespring.com/stores/chronicallyjaquie\r\n\r\nNEW TO CHRONICALLY JAQUIE? START HERE!\r\n- All About My Chronic Illnesses – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMOPAUpC5zjqGxFiko9FH3p\r\n- All About Harlow – https://www.youtube.com/watch?v=QCb2Rl3BB4s\r\n- Judd and Jaq Relationship Q&A Vlog – https://www.youtube.com/watch?v=Co3ctXejU6w&index=68&list=PLrAi_F1oEjCOCESscC9SX8knIJjfKRVpF&t=701s\r\n--- Skip to 7:03 in the Vlog to watch the Relationship Q&A section!\r\n- “New Here” Playlist - https://www.youtube.com/playlist?list=PLrAi_F1oEjCMOPAUpC5zjqGxFiko9FH3p\r\n\r\nLIKE WHAT YOU SEE?\r\n- Cambridge Mask – https://cambridgemask.com/\r\n--- I wear the mask due to my Mast Cell and Immunodeficiency, it filters allergens and germs. Thanks to IVIG (a treatment for my immunodeficiency), I no longer need it as often as before. However, I still wear it in higher risk areas, such as hospitals/emergency rooms.\r\n- Primary Camera (Canon G7 X Mark II) – https://shop.usa.canon.com/shop/en/catalog/powershot-g7-x-mark-ii?cm_mmc=GA-_-CameraGroup-_-160224Brand%20Paid%20Search-_-canon%20G7%20X%20Mark%20II&Ap=Camera%20General&gclid=Cj0KEQjw0IvIBRDF0Yzq4qGE4IwBEiQATMQlMQV9VB6friCb290bDPvMB70AbclocCMqy58uFX13d2waAqCK8P8HAQ\r\n- Secondary Camera (Canon SX620) – https://shop.usa.canon.com/shop/en/catalog/powershot-sx620-hs-red-digital-camera?krypto=UCdm6VXznCPNmFdZVYYXtVDRRtyaWArk1AvLZe9yU9Tf3xY%2F6zptnlo42D%2B%2BwTodNSM9dmePQunDRXt4rkOh8GmPqYk8iySBNNllVQdxyUKXTqo7iIdDN2eKxZpW%2Bv9YR%2BCU6EE1eNnB7b5yto7%2BJ5RFhgkGu2urb2k3OOrLUTc%3D&ddkey=http%3Aen%2Fcatalog%2Fpowershot-sx620-hs-black-digital-camera#\r\n- My Editing Software (Filmora) – https://filmora.wondershare.com/\r\n\r\nNEED MORE CHRONIC ILLNESS OR SERVICE DOG INFO?\r\n- Chronic Illness Support Playlist – https://www.youtube.com/watch?v=yjprUf9wHvg\r\n- Service Dog Support Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCOTWZJyvgqJV1Y5uP6xrvtS\r\n- Training Tutorial Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCM53-RI_yxebqrcwIc-lmge\r\n- Mito Disease/Genetics Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMFMgqRvI3HIZJOEabb08we\r\n- Mast Cell/Xolair Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCNRVP3Qu0Y8IAivKXDcH2Gw\r\n- Dysautonomia/POTS Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMp_-Lhptp0eh90natpCzKc\r\n- Feeding Tube/Gastroparesis Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCM6tTJsNeA0wR-4eI2XU-J0\r\n- IV Therapy/Central Line Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCN2opVmL52XThP0pFFsgFkf\r\n- Pain Management/EDS Playlist – https://www.youtube.com/watch?v=AZ95DqE6An4&list=PLrAi_F1oEjCNPSs3kb8YQBKGWQbnKL8dV\r\n- Medical Cannabis Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMQ-a2WpfU4OeN71ZnyifAw\r\n- IVIG/Immunodeficiency Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMimJMcrtJw2Njhw-nXejRV\r\n- Custom Wheelchair Playlist – https://www.youtube.com/playlist?list=PLrAi_F1oEjCMxwq35jtx-L5ivk67ElCI9\r\n- Other Helpful Playlists – https://www.youtube.com/channel/UCKaX0dQwEUgTafzCZ2yEjUQ/playlists', 'weight training (hobby),physical exercise (interest),how to train a service dog,service dog,Service Dog at the Gym,Golden Retriever Service Dog,Dysautonomia Exercie,Ehlers Danlos Exercise,Chronic Illness Exercise,Dog Training,Service Dog Training,Public Access Training,Chronic Illness,Chronic Pain,Disability,Spoonie,Health,Medicine', 1, '2020-03-28 23:13:42', '2020-03-28 23:17:37'),
(9, 3, 'https://www.youtube.com/watch?v=U6SBVeWpJ6Q', 'Gym Music 2018 - Best Gym Music Playlist', 'Please subscribe our Workout Music Channel for more weekly new free music: http://goo.gl/1qWwDI\r\n\r\nWorkout Motivation on Facebook:\r\nhttps://www.facebook.com/WorkoutMusicService\r\n\r\nWorkout Music Mobile App:\r\nhttps://goo.gl/FpURHx \r\n\r\nWorkout Music Service on Twitter:\r\nhttps://twitter.com/WorkoutMusic1\r\n\r\nWorkout Music on Instagram:\r\nhttps://instagram.com/workout_music_service/\r\n\r\nBest Workout Music Playlist on Spotify:\r\nhttp://goo.gl/m73QMy\r\n\r\nYou want a Channel like this ? Build your own Channel: http://goo.gl/bJs4Rb\r\n\r\n\r\n charts 2018 2019 2k18 motivacion fitness motivation', 'Gym Music 2018,Gym Music,workout songs,workout music,gym motivation,2018,motivation,charts 2018,2019,motivacion,2k18,best songs of 2018,top 2018,crossfit music,best songs 2018,warm up,playlist,female motivation,2018 mix,free download,best gym music,training,motivation music workout,songs for workout,top songs of 2018,music workout,gym workout,powerlifting motivation,morning motivation,mix 2018,charts,workout music mix 2017,running playlist 2017', 0, '2020-03-28 23:53:05', '2020-03-28 23:53:05');

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_gym_id_foreign` (`gym_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_gym_id_foreign` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;