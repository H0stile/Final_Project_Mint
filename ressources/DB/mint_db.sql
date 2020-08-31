-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 31, 2020 at 09:20 AM
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

--
-- Dumping data for table `languages_intermediate`
--

INSERT INTO `languages_intermediate` (`user_id`, `language_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1),
(6, 2),
(7, 3),
(8, 4),
(9, 1),
(10, 2),
(11, 3),
(12, 4),
(13, 1),
(14, 2),
(15, 3),
(16, 4),
(17, 1),
(18, 2),
(19, 3),
(20, 4),
(21, 1),
(22, 2),
(23, 3),
(24, 4),
(25, 1),
(26, 2),
(27, 3),
(28, 4),
(29, 1),
(30, 2),
(31, 3),
(32, 4),
(33, 1),
(34, 2),
(35, 3),
(36, 4),
(37, 1),
(38, 2),
(39, 3),
(40, 4),
(41, 1);

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

--
-- Dumping data for table `skills_intermediate`
--

INSERT INTO `skills_intermediate` (`user_id`, `skill_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 3),
(5, 2),
(6, 4),
(7, 5),
(8, 6),
(9, 7),
(10, 6),
(11, 8),
(12, 8),
(13, 1),
(14, 9),
(15, 9),
(16, 10),
(17, 10),
(18, 13),
(19, 16),
(20, 26);

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
(1, 'makenzie.welch@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Makenzie', 'Welch', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Dolor sapiente vel omnis et temporibus. Quasi nisi reprehenderit qui porro sed sed autem eligendi.', 1, NULL, NULL, NULL, NULL),
(2, 'loyce.senger@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Loyce', 'Senger', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Qui amet modi velit incidunt. Dicta est veniam facilis mollitia exercitationem maxime aut.', 0, NULL, NULL, '2020-04-04 22:38:31', NULL),
(3, 'sarina.strosin@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Sarina', 'Strosin', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Architecto dolores et sapiente corporis sit.', 1, NULL, NULL, '2020-03-06 10:53:39', NULL),
(4, 'rosella.fadel@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Rosella', 'Fadel', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Incidunt reprehenderit sunt ex necessitatibus fuga voluptatem sint dolorem. Optio accusamus dolorem ab magnam.', 1, NULL, NULL, '2020-08-14 02:28:52', NULL),
(5, 'clarissa.runolfsdottir@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Clarissa', 'Runolfsdottir', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Voluptatem earum provident laborum delectus. Est quis saepe reprehenderit ducimus sint.', 1, NULL, NULL, '2020-07-05 09:11:39', NULL),
(6, 'lucinda.gibson@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Lucinda', 'Gibson', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Quos adipisci placeat vel eos distinctio dolorum.', 1, NULL, NULL, '2019-12-30 17:31:05', NULL),
(7, 'geovany.heaney@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Geovany', 'Heaney', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Enim quis officia sunt ut numquam.', 0, NULL, NULL, '2019-12-23 18:10:54', NULL),
(8, 'arnaldo.schamberger@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Arnaldo', 'Schamberger', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Iusto voluptate impedit excepturi nam necessitatibus accusamus vitae. Maiores harum dolores aut sed.', 0, NULL, NULL, '2020-08-27 07:28:29', NULL),
(9, 'america.hackett@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'America', 'Hackett', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Iure quo at eius quos.', 1, NULL, NULL, '2020-01-12 14:45:50', NULL),
(10, 'green.weimann@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Green', 'Weimann', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Eum et aliquid quos occaecati temporibus unde qui. Vel nisi voluptatem itaque dolorem velit.', 0, NULL, NULL, '2020-02-27 01:01:24', NULL),
(11, 'preston.pouros@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Preston', 'Pouros', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ut in fuga qui id perferendis veniam.', 1, NULL, NULL, '2020-04-01 07:40:32', NULL),
(12, 'johan.terry@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Johan', 'Terry', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Nulla quo aut iste aliquam saepe.', 1, NULL, NULL, '2019-12-25 23:27:05', NULL),
(13, 'anya.zulauf@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Anya', 'Zulauf', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut unde voluptatem sequi quaerat nulla. Labore veritatis numquam quaerat ratione a saepe repellendus.', 1, NULL, NULL, '2020-03-04 20:34:14', NULL),
(14, 'isobel.bailey@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Isobel', 'Bailey', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Nesciunt fugit dicta et enim. Quia illum vel explicabo sed illum.', 0, NULL, NULL, '2019-12-09 12:18:16', NULL),
(15, 'milton.smith@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Milton', 'Smith', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Temporibus inventore dolore et voluptas. Natus dolores delectus ut sed qui fuga.', 0, NULL, NULL, '2019-12-05 10:34:07', NULL),
(16, 'brionna.mayer@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Brionna', 'Mayer', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Esse et qui est rerum veniam atque sed necessitatibus.', 0, NULL, NULL, '2020-04-12 00:57:29', NULL),
(17, 'yesenia.larkin@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Yesenia', 'Larkin', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Consectetur provident aut aut.', 0, NULL, NULL, '2020-07-20 20:49:35', NULL),
(18, 'emory.bins@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Emory', 'Bins', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Quidem inventore molestias eum placeat nemo iusto officia. Unde deserunt sit error dolores adipisci minima totam.', 0, NULL, NULL, '2020-07-02 08:19:08', NULL),
(19, 'dolores.kerluke@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Dolores', 'Kerluke', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Ut ratione voluptatem consequuntur id nihil. Sit quod nobis est alias.', 1, NULL, NULL, '2020-08-09 12:03:27', NULL),
(20, 'barney.reichert@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Barney', 'Reichert', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Ut natus nemo harum quae labore. Sunt et beatae error nihil non animi.', 1, NULL, NULL, '2020-02-11 11:09:05', NULL),
(21, 'romaine.hessel@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Romaine', 'Hessel', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Corrupti quae dolorum ratione architecto et cupiditate. Quasi et quo mollitia cupiditate.', 0, NULL, NULL, '2019-12-02 10:15:17', NULL),
(22, 'braxton.murazik@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Braxton', 'Murazik', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Eius officia commodi non dolorem nihil distinctio labore tempore.', 1, NULL, NULL, '2019-12-30 03:10:10', NULL),
(23, 'camron.greenfelder@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Camron', 'Greenfelder', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Voluptates molestiae excepturi rerum qui alias et.', 0, NULL, NULL, '2020-04-22 07:39:52', NULL),
(24, 'abraham.turcotte@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Abraham', 'Turcotte', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut corporis aut et mollitia esse. Unde corporis explicabo voluptatibus cum.', 1, NULL, NULL, '2020-08-16 12:27:33', NULL),
(25, 'grover.klein@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Grover', 'Klein', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Accusantium sunt eos optio deleniti ipsa.', 0, NULL, NULL, '2020-04-28 04:24:02', NULL),
(26, 'antone.kshlerin@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Antone', 'Kshlerin', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Pariatur architecto fugit qui laudantium necessitatibus debitis quae. Occaecati rerum itaque qui omnis et.', 0, NULL, NULL, '2020-01-28 14:56:05', NULL),
(27, 'cassidy.oreilly@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Cassidy', 'O\'Reilly', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Quo rem eius est magni minus occaecati.', 1, NULL, NULL, '2020-01-14 01:23:28', NULL),
(28, 'kristoffer.fahey@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Kristoffer', 'Fahey', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Nostrum quia quidem sint occaecati.', 1, NULL, NULL, '2020-01-22 13:42:36', NULL),
(29, 'joshuah.langworth@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Joshuah', 'Langworth', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Ipsa eum facilis est debitis eum.', 0, NULL, NULL, '2020-04-06 07:20:35', NULL),
(30, 'albin.mills@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Albin', 'Mills', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Nam similique nesciunt dolor dignissimos voluptatem et. Repellat porro voluptatem aut reprehenderit qui rerum.', 0, NULL, NULL, '2019-12-18 10:33:35', NULL),
(31, 'timmy.gusikowski@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Timmy', 'Gusikowski', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Est reiciendis quo delectus libero fugiat enim.', 0, NULL, NULL, '2020-05-11 14:20:27', NULL),
(32, 'jordan.hayes@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Jordan', 'Hayes', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Voluptate pariatur tempore perferendis facere. Ab totam natus ex velit eaque odio.', 0, NULL, NULL, '2020-02-06 01:52:52', NULL),
(33, 'itzel.dubuque@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Itzel', 'DuBuque', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Officiis error illo recusandae tempora. Placeat nostrum accusantium possimus sunt fugit debitis.', 1, NULL, NULL, '2020-01-25 06:41:28', NULL),
(34, 'keshawn.cruickshank@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Keshawn', 'Cruickshank', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'In eum aliquid unde voluptas iste sed ut rerum. Maiores nihil accusamus consequatur aut ut explicabo odio.', 1, NULL, NULL, '2020-04-27 17:30:08', NULL),
(35, 'laurence.bailey@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Laurence', 'Bailey', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Eos rerum in dolores consectetur. Vel consectetur deserunt amet.', 0, NULL, NULL, '2020-05-18 13:35:44', NULL),
(36, 'amparo.kunde@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Amparo', 'Kunde', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ad veritatis in tempore labore illum impedit. Natus voluptatum dolorem sunt reiciendis.', 0, NULL, NULL, '2020-03-19 09:47:28', NULL),
(37, 'chandler.johns@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Chandler', 'Johns', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Corrupti repudiandae ut numquam quod qui illo.', 1, NULL, NULL, '2020-06-06 05:50:36', NULL),
(38, 'ruthe.rath@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Ruthe', 'Rath', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut dolor fugiat et omnis rem est.', 1, NULL, NULL, '2020-07-19 04:54:08', NULL),
(39, 'donato.romaguera@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Donato', 'Romaguera', 'mentee', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Consequatur consequuntur qui et quasi et.', 1, NULL, NULL, '2019-11-20 02:03:12', NULL),
(40, 'jaylen.gottlieb@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Jaylen', 'Gottlieb', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Odio aut at reiciendis praesentium ex.', 0, NULL, NULL, '2020-04-02 15:41:50', NULL),
(41, 'admint@mint.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Derrick', 'Carter', 'admin', NULL, NULL, 'mintlogo.png', NULL, NULL, NULL, NULL, NULL, NULL);

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
