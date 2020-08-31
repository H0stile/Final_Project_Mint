-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2020 at 08:05 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mint_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

DROP TABLE IF EXISTS `collaboration`;
CREATE TABLE IF NOT EXISTS `collaboration` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `mentee_id` bigint(20) UNSIGNED NOT NULL,
  `request_msg` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_rqs` enum('pending','connected') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `collaboration_mentor_id_foreign` (`mentor_id`),
  KEY `collaboration_mentee_id_foreign` (`mentee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `languages`) VALUES
(1, 'French'),
(2, 'German'),
(3, 'Luxembourgish'),
(4, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `languages_intermediate`
--

DROP TABLE IF EXISTS `languages_intermediate`;
CREATE TABLE IF NOT EXISTS `languages_intermediate` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  KEY `languages_intermediate_user_id_foreign` (`user_id`),
  KEY `languages_intermediate_language_id_foreign` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `writer_id` bigint(20) UNSIGNED NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_writer_id_foreign` (`writer_id`),
  KEY `messages_target_id_foreign` (`target_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `writer_id`, `target_id`) VALUES
(1, 'Text message number 1', 1, 2),
(2, 'Text message number 2', 2, 1),
(3, 'Text message number 3', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_21_084447_create_collaboration_table', 1),
(5, '2020_08_21_084450_create_messages_table', 1),
(6, '2020_08_21_095245_create_ratings_table', 1),
(7, '2020_08_21_095958_create_skills_table', 1),
(8, '2020_08_21_100316_create_skills_intermediate_table', 1),
(9, '2020_08_21_104203_create_languages_table', 1),
(10, '2020_08_21_105135_create_languages_intermediate_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `writer_id` bigint(20) UNSIGNED NOT NULL,
  `target_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `comment` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ratings_writer_id_foreign` (`writer_id`),
  KEY `ratings_target_id_foreign` (`target_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `writer_id`, `target_id`, `score`, `comment`) VALUES
(1, 1, 2, 5, 'this is the first message'),
(2, 1, 2, 3, 'this is the second message'),
(3, 1, 2, 2, 'this is the third message');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skill` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'HTML/CSS'),
(2, 'JavaScript'),
(3, 'JQuery'),
(4, 'Vue'),
(5, 'React'),
(6, 'Angular'),
(7, 'TypeScript'),
(8, 'NodeJS'),
(9, 'PHP'),
(10, 'Laravel'),
(11, 'Symphony'),
(12, 'SQL'),
(13, 'Java'),
(14, 'C'),
(15, 'C++'),
(16, 'C#'),
(17, 'Python'),
(18, 'Assembly'),
(19, 'VBA'),
(20, 'Visual Basic .NET'),
(21, 'Swift'),
(22, 'Bash/Shell/PowerShell'),
(23, 'Go'),
(24, 'Kotlin'),
(25, 'Ruby'),
(26, 'Cobol'),
(27, 'Perl'),
(28, 'Scala'),
(29, 'MATLAB'),
(30, 'Groovy'),
(31, 'Delphi/Object Pascal'),
(32, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `skills_intermediate`
--

DROP TABLE IF EXISTS `skills_intermediate`;
CREATE TABLE IF NOT EXISTS `skills_intermediate` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  KEY `skills_intermediate_user_id_foreign` (`user_id`),
  KEY `skills_intermediate_skill_id_foreign` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('mentor','mentee','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mentor_status` enum('pending','validate') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pitch` varchar(600) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `type`, `linkedin`, `mentor_status`, `profile_image`, `pitch`, `availability`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'elmore.schuster@gmail.com', '$2y$10$rkTqYFeEt3TjXVma1tg4auEMlxiFUUffo0jfTJqS22312wH91MhFm', 'Makenzie', 'Welch', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Dolor sapiente vel omnis et temporibus. Quasi nisi reprehenderit qui porro sed sed autem eligendi.', 0, NULL, NULL, '2019-11-05 07:41:40', NULL),
(2, 'jkautzer@hotmail.com', '$2y$10$W992Y3SDetcZ1eNTD9O6jOt2bqT2X0HhrXpZoN3rnQIF.bQI0HciO', 'Loyce', 'Senger', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Qui amet modi velit incidunt. Dicta est veniam facilis mollitia exercitationem maxime aut.', 0, NULL, NULL, '2020-04-04 22:38:31', NULL),
(3, 'saufderhar@gmail.com', '$2y$10$zLu9kTNqrEEOHS6doD.VNOW7auJlT9EzlAx3KuaMr1eEbItfKItg2', 'Sarina', 'Strosin', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Architecto dolores et sapiente corporis sit.', 1, NULL, NULL, '2020-03-06 10:53:39', NULL),
(4, 'gennaro.hoeger@hotmail.com', '$2y$10$sxFJoLhdpxsVMiYCxTNYAeEQA0Ef84zUSE0iZe2BkC6sTB7Q7NqSy', 'Rosella', 'Fadel', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Incidunt reprehenderit sunt ex necessitatibus fuga voluptatem sint dolorem. Optio accusamus dolorem ab magnam.', 1, NULL, NULL, '2020-08-14 02:28:52', NULL),
(5, 'pgleason@hotmail.com', '$2y$10$TO0rQ91.xKhbQJKNjW5pSO2oSv2khB8N7SjODvvtogGjc60PP4iZK', 'Clarissa', 'Runolfsdottir', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Voluptatem earum provident laborum delectus. Est quis saepe reprehenderit ducimus sint.', 1, NULL, NULL, '2020-07-05 09:11:39', NULL),
(6, 'kbaumbach@gmail.com', '$2y$10$7a.uQISsKACKTc9.BHSjK.pb52FqDWqng5fFhLQK8z.eyUuK3jcoG', 'Lucinda', 'Gibson', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Quos adipisci placeat vel eos distinctio dolorum.', 1, NULL, NULL, '2019-12-30 17:31:05', NULL),
(7, 'matilde39@yahoo.com', '$2y$10$g1UTamzGVZJx7pr5x/ZJTOGiKokkrBlsSCFAA6hu5gcZCHqTpxkgi', 'Geovany', 'Heaney', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Enim quis officia sunt ut numquam.', 0, NULL, NULL, '2019-12-23 18:10:54', NULL),
(8, 'adenesik@hotmail.com', '$2y$10$O7lMVZrkydgCc4q0M604bu1bpIYoKB9v/jVjm8T3oFU5.esLNWwi6', 'Arnaldo', 'Schamberger', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Iusto voluptate impedit excepturi nam necessitatibus accusamus vitae. Maiores harum dolores aut sed.', 0, NULL, NULL, '2020-08-27 07:28:29', NULL),
(9, 'ettie.rohan@yahoo.com', '$2y$10$LTkgal0QGMMeJ0IP7Qpg6.XaiNEQDVRvvcoOcWyuqmN5.qNmcL/3C', 'America', 'Hackett', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Iure quo at eius quos.', 1, NULL, NULL, '2020-01-12 14:45:50', NULL),
(10, 'urban.johnson@yahoo.com', '$2y$10$Oxa0UMSc050Ncj2f3Toonu0JqnwAx6KVpt0E4RbPlvPqmPrmNgGvO', 'Green', 'Weimann', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Eum et aliquid quos occaecati temporibus unde qui. Vel nisi voluptatem itaque dolorem velit.', 0, NULL, NULL, '2020-02-27 01:01:24', NULL),
(11, 'hickle.finn@gmail.com', '$2y$10$8Ech3u9bP54eYnQYQmejB.4cS7Jbp7n..TQWUCRW/DxB3ff.n7TDS', 'Preston', 'Pouros', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ut in fuga qui id perferendis veniam.', 1, NULL, NULL, '2020-04-01 07:40:32', NULL),
(12, 'wolf.allie@yahoo.com', '$2y$10$/axr/SbZKiqBu9mzsvCbmuNGfi5HjpIdOdOuxN74HxSjO4Fpktf8S', 'Johan', 'Terry', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Nulla quo aut iste aliquam saepe.', 1, NULL, NULL, '2019-12-25 23:27:05', NULL),
(13, 'millie92@gmail.com', '$2y$10$4X/hMJg5IajjUmFIwtiJpO212sQzUMAJtqBp1oNJO6GgGoXjDSU9G', 'Anya', 'Zulauf', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut unde voluptatem sequi quaerat nulla. Labore veritatis numquam quaerat ratione a saepe repellendus.', 1, NULL, NULL, '2020-03-04 20:34:14', NULL),
(14, 'wgreenfelder@hotmail.com', '$2y$10$4rv/4E8njxOBJcvJQMr0xufRbAc4oJCJMVM1BbJofxKwRlbA8qlZ.', 'Isobel', 'Bailey', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Nesciunt fugit dicta et enim. Quia illum vel explicabo sed illum.', 0, NULL, NULL, '2019-12-09 12:18:16', NULL),
(15, 'pearl16@gmail.com', '$2y$10$23KwSFaQU8J6oLRWfcRUxuVnacVuP/a0yKBVoBFW.4Fh5.l7SfCsu', 'Milton', 'Smith', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Temporibus inventore dolore et voluptas. Natus dolores delectus ut sed qui fuga.', 0, NULL, NULL, '2019-12-05 10:34:07', NULL),
(16, 'mellie.quigley@hotmail.com', '$2y$10$LyG1mJ9nI2nbt4/N/nK68ehDB4yzX/HgOf.4ahV.U4T13MpKlwh3K', 'Brionna', 'Mayer', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Esse et qui est rerum veniam atque sed necessitatibus.', 0, NULL, NULL, '2020-04-12 00:57:29', NULL),
(17, 'odeckow@hotmail.com', '$2y$10$WJH18Kr2oOUUJILDCQ6i7exT8sL8QTv7fVOLv7Fiow9ofDpeUIkGq', 'Yesenia', 'Larkin', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Consectetur provident aut aut.', 0, NULL, NULL, '2020-07-20 20:49:35', NULL),
(18, 'andreane83@hotmail.com', '$2y$10$cn/4883sFRcdg60dhduYjuyHKo7PhAK6rp2BN7uK3ft6CsQDOCVVK', 'Emory', 'Bins', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Quidem inventore molestias eum placeat nemo iusto officia. Unde deserunt sit error dolores adipisci minima totam.', 0, NULL, NULL, '2020-07-02 08:19:08', NULL),
(19, 'bhessel@gmail.com', '$2y$10$fBc4ecAKucRJ7ljD3SsX5uUbC7Hva79tGmIw00ee..2/2IpejQt/u', 'Dolores', 'Kerluke', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Ut ratione voluptatem consequuntur id nihil. Sit quod nobis est alias.', 1, NULL, NULL, '2020-08-09 12:03:27', NULL),
(20, 'maybelle03@hotmail.com', '$2y$10$nIh7wpFz2DBuJ1UEW3xP3.7zilDMFsr09Cfn2aejj0B64ReJJQ6Gy', 'Barney', 'Reichert', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Ut natus nemo harum quae labore. Sunt et beatae error nihil non animi.', 1, NULL, NULL, '2020-02-11 11:09:05', NULL),
(21, 'verna.beatty@hotmail.com', '$2y$10$Q/hhA8nRaWrtz86x.RH90uYpWSWfGz/tzfHT74axorVV9AzyfMQ6i', 'Romaine', 'Hessel', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Corrupti quae dolorum ratione architecto et cupiditate. Quasi et quo mollitia cupiditate.', 0, NULL, NULL, '2019-12-02 10:15:17', NULL),
(22, 'mharber@gmail.com', '$2y$10$065tvWxhFY/2zwzRBhQ1u.q/9N6jjQdq2NosBzu0hZdfBrRlFLD4y', 'Braxton', 'Murazik', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Eius officia commodi non dolorem nihil distinctio labore tempore.', 1, NULL, NULL, '2019-12-30 03:10:10', NULL),
(23, 'armstrong.anabel@yahoo.com', '$2y$10$Djk9nJyl03RRzflncr9/7ODU9KGRMSN4kcQsvSaCDY6H4gBxwlXCW', 'Camron', 'Greenfelder', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Voluptates molestiae excepturi rerum qui alias et.', 0, NULL, NULL, '2020-04-22 07:39:52', NULL),
(24, 'art.herman@yahoo.com', '$2y$10$qzeqHueoJ1F99Mwq3XPoOOhXc3.ohr80DIxgF7na/ZxC71WZvJPLm', 'Abraham', 'Turcotte', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut corporis aut et mollitia esse. Unde corporis explicabo voluptatibus cum.', 1, NULL, NULL, '2020-08-16 12:27:33', NULL),
(25, 'lavinia.nienow@yahoo.com', '$2y$10$nFTAFuRvUsy2NIfYizOuZO72MRE3ZLCEenMyBPj6XMUBpioPdVAZu', 'Grover', 'Klein', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Accusantium sunt eos optio deleniti ipsa.', 0, NULL, NULL, '2020-04-28 04:24:02', NULL),
(26, 'rodrick09@yahoo.com', '$2y$10$mF.hOIfVN0jy5B52eTrDBOYllMjuYbgtQxPmfnDGOy8OQU4xPknaS', 'Antone', 'Kshlerin', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Pariatur architecto fugit qui laudantium necessitatibus debitis quae. Occaecati rerum itaque qui omnis et.', 0, NULL, NULL, '2020-01-28 14:56:05', NULL),
(27, 'purdy.payton@gmail.com', '$2y$10$M9WhcaSyTBvG0YsxWBqyoeLPt9qmjCkayCgB2q/vIydmxzwAUHooC', 'Cassidy', 'O\'Reilly', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Quo rem eius est magni minus occaecati.', 1, NULL, NULL, '2020-01-14 01:23:28', NULL),
(28, 'maxine03@gmail.com', '$2y$10$vVeF2t7Kgy8JaDHLWRj6eegu8TFrBNk/HyWJo1WlpMLuTeoZw2Ja2', 'Kristoffer', 'Fahey', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Nostrum quia quidem sint occaecati.', 1, NULL, NULL, '2020-01-22 13:42:36', NULL),
(29, 'larkin.liana@yahoo.com', '$2y$10$NjDYhr..ZQ7DjgmOOk1lc.rPMyVBXN4B3Mo.KZ7lpY0hIUFysKZ/q', 'Joshuah', 'Langworth', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Ipsa eum facilis est debitis eum.', 0, NULL, NULL, '2020-04-06 07:20:35', NULL),
(30, 'polly.prohaska@hotmail.com', '$2y$10$2iMZxvU2Xqe3YvrMKSOa0.WJXbp0CORvzAnbe/NrOIXZvUVmkOL3C', 'Albin', 'Mills', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Nam similique nesciunt dolor dignissimos voluptatem et. Repellat porro voluptatem aut reprehenderit qui rerum.', 0, NULL, NULL, '2019-12-18 10:33:35', NULL),
(31, 'brandy.ondricka@hotmail.com', '$2y$10$kWQZm5cZE0xyX8PKN6CuSurUPjsEqAytYk7cHDeP7ZR0RKJDMe45i', 'Timmy', 'Gusikowski', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Est reiciendis quo delectus libero fugiat enim.', 0, NULL, NULL, '2020-05-11 14:20:27', NULL),
(32, 'minerva18@gmail.com', '$2y$10$zT1Zf/DObvkvPSysyLjJde5LlpP/NcVKEPqWlnmnTrxsp8mzMMqEK', 'Jordan', 'Hayes', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Voluptate pariatur tempore perferendis facere. Ab totam natus ex velit eaque odio.', 0, NULL, NULL, '2020-02-06 01:52:52', NULL),
(33, 'qhalvorson@yahoo.com', '$2y$10$q3hY1Vnah3BSyPUdsowhVunJHptI3DcRvYgKB533tHHiUxKj9ibpi', 'Itzel', 'DuBuque', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Officiis error illo recusandae tempora. Placeat nostrum accusantium possimus sunt fugit debitis.', 1, NULL, NULL, '2020-01-25 06:41:28', NULL),
(34, 'yhickle@hotmail.com', '$2y$10$zRCBuQxl4EoFqQZboeCoy.RPYvta05yqNEMecdJ9FdZSIEk7YkAXu', 'Keshawn', 'Cruickshank', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'In eum aliquid unde voluptas iste sed ut rerum. Maiores nihil accusamus consequatur aut ut explicabo odio.', 1, NULL, NULL, '2020-04-27 17:30:08', NULL),
(35, 'norris85@gmail.com', '$2y$10$At1cPZ8Km8Qu0xke2zB4FuZ76iSWLauC2CCWRW/T0XAhDpc897Ou2', 'Laurence', 'Bailey', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Eos rerum in dolores consectetur. Vel consectetur deserunt amet.', 0, NULL, NULL, '2020-05-18 13:35:44', NULL),
(36, 'welch.deshaun@yahoo.com', '$2y$10$DFgPLlzqoGZOQM/lp0/rDOExtt1EQLKqwQKlC.B4lO/EdwKLdrDLG', 'Amparo', 'Kunde', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ad veritatis in tempore labore illum impedit. Natus voluptatum dolorem sunt reiciendis.', 0, NULL, NULL, '2020-03-19 09:47:28', NULL),
(37, 'jody61@yahoo.com', '$2y$10$FnoqBxzPYMqMltlUgARF3O2FmZZPM5my9sPi2esRyQ65SzXGyuYLi', 'Chandler', 'Johns', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Corrupti repudiandae ut numquam quod qui illo.', 1, NULL, NULL, '2020-06-06 05:50:36', NULL),
(38, 'uhauck@gmail.com', '$2y$10$mYVq7L8pqKSa0/i.kGyCwepyCjzPnN3lL/.ZMVLeA7iD/Cl.eH9jq', 'Ruthe', 'Rath', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut dolor fugiat et omnis rem est.', 1, NULL, NULL, '2020-07-19 04:54:08', NULL),
(39, 'gerlach.jessyca@gmail.com', '$2y$10$0va9HRyWhidM8TyjZqGP1OWuqNSaDQ/u0JiY5sEJQm1G.iLLsShCa', 'Donato', 'Romaguera', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Consequatur consequuntur qui et quasi et.', 1, NULL, NULL, '2019-11-20 02:03:12', NULL),
(40, 'leffler.morton@gmail.com', '$2y$10$kMA5fUUmvPOuJlDMkhAv8OdzQsg1iSPmFtpJEEh1LO/QQ53CrvkLC', 'Jaylen', 'Gottlieb', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Odio aut at reiciendis praesentium ex.', 0, NULL, NULL, '2020-04-02 15:41:50', NULL),
(41, 'admint@mint.com', '$2y$10$8SJz7ty0CJDaBZS6IaN.EuCgdOjgtfJiA3B0Wu5TtnL66gSAynNC6', 'Derrick', 'Carter', 'admin', NULL, NULL, 'mintlogo.png', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD CONSTRAINT `collaboration_mentee_id_foreign` FOREIGN KEY (`mentee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collaboration_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `languages_intermediate`
--
ALTER TABLE `languages_intermediate`
  ADD CONSTRAINT `languages_intermediate_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `languages_intermediate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_writer_id_foreign` FOREIGN KEY (`writer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_writer_id_foreign` FOREIGN KEY (`writer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills_intermediate`
--
ALTER TABLE `skills_intermediate`
  ADD CONSTRAINT `skills_intermediate_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skills_intermediate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
