-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2020 at 07:45 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`id`, `mentor_id`, `mentee_id`, `request_msg`, `status_rqs`) VALUES
(1, 6, 11, 'Hello !!!!', 'pending'),
(2, 6, 12, 'I want to learn PHP', 'pending'),
(3, 6, 13, 'My request', 'pending'),
(4, 7, 14, 'I want to learn Python', 'pending'),
(5, 7, 15, 'Hello, I want to learn Cobol', 'pending'),
(6, 8, 16, 'My request', 'connected'),
(7, 9, 17, 'I want to learn JavaScript', 'connected'),
(8, 9, 18, 'Hello', 'connected'),
(9, 10, 19, 'I want to learn Ruby', 'connected'),
(10, 10, 20, 'I want to learn C#', 'pending');

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
(21, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `writer_id`, `target_id`, `score`, `comment`) VALUES
(1, 1, 6, 5, 'this is the first message'),
(2, 1, 6, 3, 'this is the second message'),
(3, 1, 6, 2, 'this is the third message'),
(4, 20, 7, 4, 'nice mentor, with experience'),
(5, 15, 7, 2, 'Problem for meeting'),
(6, 19, 7, 5, 'Woaw, great mentor'),
(7, 11, 8, 3, 'Good'),
(8, 12, 8, 5, 'A really great mentor'),
(9, 13, 8, 3, 'I learn a lot'),
(10, 14, 9, 1, 'To much basic level'),
(11, 15, 9, 4, 'Great'),
(12, 17, 9, 3, 'Good'),
(13, 20, 10, 4, 'Good'),
(14, 19, 10, 2, 'His level is to basic'),
(15, 18, 10, 0, 'Not came to the rdv');

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
(1, 6),
(2, 18),
(3, 22),
(4, 14),
(5, 16),
(6, 16),
(7, 6),
(8, 26),
(9, 10),
(10, 5);

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
  `pitch` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `type`, `linkedin`, `mentor_status`, `profile_image`, `pitch`, `availability`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'witting.rudolph@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Witting', 'Rudolph', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'defaultProfileLogo.png', 'Voluptatibus officiis commodi quia.', 1, NULL, NULL, NULL, NULL),
(2, 'melyna.rodriguez@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Melyna', 'Rodriguez', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'defaultProfileLogo.png', 'Et animi voluptatem dolor possimus consequatur saepe. Rem consequatur error ut et amet iure.', 1, NULL, NULL, NULL, NULL),
(3, 'jewell.lemke@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Jewell', 'Lemke', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'defaultProfileLogo.png', 'Rerum laborum facilis et officia exercitationem magni.', 0, NULL, NULL, NULL, NULL),
(4, 'kristofer.weimann@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Kristofer', 'Weimann', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'defaultProfileLogo.png', 'Sequi maiores quibusdam rerum eum dolor culpa voluptas quae. Dolorem doloribus nam sit libero.', 0, NULL, NULL, NULL, NULL),
(5, 'kara.keeling@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Kara', 'Keeling', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'defaultProfileLogo.png', 'Omnis atque voluptatem placeat earum. Qui alias qui enim nobis.', 0, NULL, NULL, NULL, NULL),
(6, 'shaina.labadie@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Shaina', 'Labadie', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Repellat ea ex unde modi nesciunt praesentium ut.', 1, NULL, NULL, NULL, NULL),
(7, 'johathan.bergnaum@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Johathan', 'Bergnaum', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Repellendus qui molestias quas repellat consequatur velit in. Quasi itaque enim sit explicabo iusto ratione ut asperiores.', 1, NULL, NULL, NULL, NULL),
(8, 'corine.bauch@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Corine', 'Bauch', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Officiis amet nisi aut accusamus excepturi cum aut eius.', 1, NULL, NULL, NULL, NULL),
(9, 'frida.murzik@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Frida', 'Murazik', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Sit nam id beatae et quasi nihil.', 1, NULL, NULL, NULL, NULL),
(10, 'leopoldo.sipes@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Leopoldo', 'Sipes', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Sapiente beatae neque voluptas deleniti.', 1, NULL, NULL, NULL, NULL),
(11, 'carlee.lakin@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Carlee', 'Lakin', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Esse architecto repellat voluptatem sapiente commodi.', 0, NULL, NULL, NULL, NULL),
(12, 'houston.mann@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Houston', 'Mann', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Saepe aperiam est distinctio provident.', 1, NULL, NULL, NULL, NULL),
(13, 'alan.kshlerin@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Alan', 'Kshlerin', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Suscipit aut dolores ex qui laboriosam sit.', 1, NULL, NULL, NULL, NULL),
(14, 'virginie.jast@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Virginie', 'Jast', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Non alias nihil nihil aut facilis dolore.', 1, NULL, NULL, NULL, NULL),
(15, 'felipa.fisher@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Felipa', 'Fisher', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Doloribus expedita sunt earum nobis aut non placeat expedita.', 0, NULL, NULL, NULL, NULL),
(16, 'shyanne.ebert@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Shyanne', 'Ebert', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Aut libero tempora eligendi et.', 0, NULL, NULL, NULL, NULL),
(17, 'ashly.harber@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Ashly', 'Harber', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Dolores expedita exercitationem repudiandae est veritatis autem dolorem nemo. Enim odio voluptas assumenda id dolor qui.', 1, NULL, NULL, NULL, NULL),
(18, 'paolo.hagenes@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Paolo', 'Hagenes', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Dolore cupiditate voluptates itaque animi.', 1, NULL, NULL, NULL, NULL),
(19, 'jakayla.wolff@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Jakayla', 'Wolff', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Velit dolor qui aut vel mollitia.', 1, NULL, NULL, NULL, NULL),
(20, 'dora.jaskolski@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Dora', 'Jaskolski', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'defaultProfileLogo.png', 'Quibusdam aut inventore corporis aut. Tenetur reiciendis ea corrupti ducimus quasi qui.', 0, NULL, NULL, NULL, NULL),
(21, 'admint.mint@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Admint', 'Mint', 'admin', NULL, 'validate', 'defaultProfileLogo.png', NULL, NULL, NULL, NULL, NULL, NULL);

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
