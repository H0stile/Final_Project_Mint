-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 07 sep. 2020 à 16:37
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mint_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `collaboration`
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `collaboration`
--

INSERT INTO `collaboration` (`id`, `mentor_id`, `mentee_id`, `request_msg`, `status_rqs`) VALUES
(1, 6, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(2, 6, 22, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(3, 6, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(4, 6, 24, '', 'connected'),
(5, 6, 25, '', 'connected'),
(6, 6, 26, '', 'connected'),
(7, 7, 27, '', 'pending'),
(8, 7, 28, '', 'pending'),
(9, 7, 29, '', 'pending'),
(10, 7, 30, '', 'connected'),
(11, 7, 31, '', 'connected'),
(12, 7, 32, '', 'connected'),
(13, 8, 33, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(14, 8, 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(15, 8, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(16, 8, 36, '', 'connected'),
(17, 8, 37, '', 'connected'),
(18, 8, 38, '', 'connected'),
(19, 9, 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(20, 9, 40, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(21, 9, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(22, 9, 22, '', 'connected'),
(23, 9, 23, '', 'connected'),
(24, 9, 24, '', 'connected'),
(25, 10, 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(26, 10, 26, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(27, 10, 27, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(28, 10, 28, '', 'connected'),
(29, 10, 29, '', 'connected'),
(30, 10, 30, '', 'connected'),
(31, 11, 31, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(32, 11, 32, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(33, 11, 33, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(34, 11, 34, '', 'connected'),
(35, 11, 35, '', 'connected'),
(36, 11, 36, '', 'connected'),
(37, 12, 37, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(38, 12, 38, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(39, 12, 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(40, 12, 40, '', 'connected'),
(41, 12, 21, '', 'connected'),
(42, 12, 22, '', 'connected'),
(43, 13, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(44, 13, 24, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(45, 13, 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(46, 13, 26, '', 'connected'),
(47, 13, 27, '', 'connected'),
(48, 13, 28, '', 'connected'),
(49, 14, 29, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(50, 14, 30, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(51, 14, 31, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(52, 14, 32, '', 'connected'),
(53, 14, 33, '', 'connected'),
(54, 14, 34, '', 'connected'),
(55, 15, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(56, 15, 36, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(57, 15, 37, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(58, 15, 38, '', 'connected'),
(59, 15, 39, '', 'connected'),
(60, 15, 40, '', 'connected'),
(61, 16, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(62, 16, 22, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(63, 16, 23, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(64, 16, 24, '', 'connected'),
(65, 16, 25, '', 'connected'),
(66, 16, 26, '', 'connected'),
(67, 17, 27, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(68, 17, 28, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(69, 17, 29, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(70, 17, 30, '', 'connected'),
(71, 17, 31, '', 'connected'),
(72, 17, 32, '', 'connected'),
(73, 18, 33, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(74, 18, 34, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(75, 18, 35, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(76, 18, 36, '', 'connected'),
(77, 18, 37, '', 'connected'),
(78, 18, 38, '', 'connected'),
(79, 19, 39, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(80, 19, 40, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(81, 19, 21, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(82, 19, 22, '', 'connected'),
(83, 19, 23, '', 'connected'),
(84, 19, 24, '', 'connected'),
(85, 20, 25, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(86, 20, 26, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(87, 20, 27, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'pending'),
(88, 20, 28, '', 'connected'),
(89, 20, 29, '', 'connected'),
(90, 20, 30, '', 'connected'),
(91, 10, 22, 'Hello, I want to be your mentee', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `languages`
--

INSERT INTO `languages` (`id`, `languages`) VALUES
(1, 'French'),
(2, 'German'),
(3, 'Luxembourgish'),
(4, 'English');

-- --------------------------------------------------------

--
-- Structure de la table `languages_intermediate`
--

DROP TABLE IF EXISTS `languages_intermediate`;
CREATE TABLE IF NOT EXISTS `languages_intermediate` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  KEY `languages_intermediate_user_id_foreign` (`user_id`),
  KEY `languages_intermediate_language_id_foreign` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `languages_intermediate`
--

INSERT INTO `languages_intermediate` (`user_id`, `language_id`) VALUES
(2, 2),
(3, 3),
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
(41, 1),
(6, 1),
(6, 4),
(20, 1),
(20, 4);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `message`, `writer_id`, `target_id`) VALUES
(5, '\"Test\"', 40, 9);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
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
-- Structure de la table `password_resets`
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
-- Structure de la table `ratings`
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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `writer_id`, `target_id`, `score`, `comment`) VALUES
(4, 21, 6, 4, 'Perfect mentor, I learnt a lot with him.'),
(5, 22, 6, 2, 'I had some problem reaching him.'),
(6, 23, 6, 5, 'He helped me a lot to improve myself'),
(7, 24, 7, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(8, 25, 7, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(9, 26, 7, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(10, 27, 8, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(11, 28, 8, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(12, 29, 8, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(13, 30, 9, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(14, 31, 9, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(15, 32, 9, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(16, 33, 10, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(17, 34, 10, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(18, 35, 10, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(19, 36, 11, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(20, 37, 11, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(21, 38, 11, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(22, 39, 12, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(23, 40, 12, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(24, 21, 12, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(25, 22, 13, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(26, 23, 13, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(27, 24, 13, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(28, 25, 14, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(29, 26, 14, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(30, 27, 14, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(31, 28, 15, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(32, 29, 15, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(33, 30, 15, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(34, 31, 16, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(35, 32, 16, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(36, 33, 16, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(37, 34, 17, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(38, 35, 17, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(39, 36, 17, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(40, 37, 18, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(41, 38, 18, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(42, 39, 18, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(43, 40, 19, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(44, 21, 19, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(45, 22, 19, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(46, 23, 20, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(47, 24, 20, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(48, 25, 20, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(49, 6, 21, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(50, 7, 22, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(51, 8, 23, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(52, 9, 24, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(53, 10, 25, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(54, 11, 26, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(55, 12, 27, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(56, 13, 28, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(57, 14, 29, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(60, 15, 30, 4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
(61, 12, 40, 5, 'Really good student, enjoyed working with her.'),
(62, 16, 40, 4, 'I was so happy to teach her PHP. Good Student.');

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `skill` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skills`
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
-- Structure de la table `skills_intermediate`
--

DROP TABLE IF EXISTS `skills_intermediate`;
CREATE TABLE IF NOT EXISTS `skills_intermediate` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED NOT NULL,
  KEY `skills_intermediate_user_id_foreign` (`user_id`),
  KEY `skills_intermediate_skill_id_foreign` (`skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `skills_intermediate`
--

INSERT INTO `skills_intermediate` (`user_id`, `skill_id`) VALUES
(2, 1),
(3, 2),
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
(7, 17),
(6, 1),
(6, 9),
(6, 10),
(20, 26),
(20, 31);

-- --------------------------------------------------------

--
-- Structure de la table `users`
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
  `user_skills` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_languages` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_fullName` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstname`, `lastname`, `type`, `linkedin`, `mentor_status`, `profile_image`, `pitch`, `availability`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `user_skills`, `user_languages`, `user_fullName`) VALUES
(2, 'loyce.senger@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Loyce', 'Senger', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Qui amet modi velit incidunt. Dicta est veniam facilis mollitia exercitationem maxime aut.', 1, NULL, NULL, '2020-04-04 22:38:31', NULL, 'HTML/CSS-', 'English-', 'Loyce Senger'),
(3, 'sarina.strosin@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Sarina', 'Strosin', 'mentor', 'https://www.linkedin.com/in/john-doe', 'pending', 'mintlogo.png', 'Architecto dolores et sapiente corporis sit.', 1, NULL, NULL, '2020-03-06 10:53:39', NULL, NULL, NULL, NULL),
(6, 'johnson@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Michael', 'Johnson', 'mentor', 'https://www.linkedin.com/in/mjohnson/', 'validate', 'mintlogo.png', 'Happy to help if anyone has questions around mobile engineering and engineering\r\nmanagement best practices! I trained as an engineering physicist turned to software engineer,\r\nteacher, mentor, and consultant.', 1, NULL, NULL, '2019-12-30 17:31:05', NULL, 'HTML/CSS-PHP-Laravel-', 'French-English-', 'Michael Johnson'),
(7, 'geovany.heaney@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Geovany', 'Heaney', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Enim quis officia sunt ut numquam.', 1, NULL, NULL, '2019-12-23 18:10:54', NULL, 'React-Python', 'Luxembourgish', 'Geovany Heaney'),
(8, 'arnaldo.berger@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Arnaldo', 'berger', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Iusto voluptate impedit excepturi nam necessitatibus accusamus vitae. Maiores harum dolores aut sed.', 1, NULL, NULL, '2020-08-27 07:28:29', NULL, 'Angular-', 'English-', 'Arnaldo Berger'),
(9, 'america.hackett@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'America', 'Hackett', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Iure quo at eius quos.', 1, NULL, NULL, '2020-01-12 14:45:50', NULL, 'TypeScript-', 'French-', 'America Hackett'),
(10, 'green.weimann@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Green', 'Weimann', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Eum et aliquid quos occaecati temporibus unde qui. Vel nisi voluptatem itaque dolorem velit.', 1, NULL, NULL, '2020-02-27 01:01:24', NULL, 'Angular-', 'German-', 'Green Weimann'),
(11, 'preston.pouros@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Preston', 'Pouros', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ut in fuga qui id perferendis veniam.', 0, NULL, NULL, '2020-04-01 07:40:32', NULL, 'NodeJS-', 'Luxembourgish', 'Preston Pouros'),
(12, 'johan.terry@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Johan', 'Terry', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Nulla quo aut iste aliquam saepe.', 0, NULL, NULL, '2019-12-25 23:27:05', NULL, NULL, NULL, NULL),
(13, 'anya.zulauf@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Anya', 'Zulauf', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut unde voluptatem sequi quaerat nulla. Labore veritatis numquam quaerat ratione a saepe repellendus.', 0, NULL, NULL, '2020-03-04 20:34:14', NULL, NULL, NULL, NULL),
(14, 'isobel.bailey@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Isobel', 'Bailey', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Nesciunt fugit dicta et enim. Quia illum vel explicabo sed illum.', 1, NULL, NULL, '2019-12-09 12:18:16', NULL, 'PHP-', 'German-', 'Isobel Bailey'),
(15, 'milton.smith@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Milton', 'Smith', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Temporibus inventore dolore et voluptas. Natus dolores delectus ut sed qui fuga.', 0, NULL, NULL, '2019-12-05 10:34:07', NULL, NULL, NULL, NULL),
(16, 'brionna.mayer@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Brionna', 'Mayer', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Esse et qui est rerum veniam atque sed necessitatibus.', 1, NULL, NULL, '2020-04-12 00:57:29', NULL, 'Laravel-', 'English-', 'Brionna Mayer'),
(17, 'yesenia.larkin@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Yesenia', 'Larkin', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Consectetur provident aut aut.', 1, NULL, NULL, '2020-07-20 20:49:35', NULL, 'Laravel-', 'French-', 'Yesenia Larkin'),
(18, 'emory.bins@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Emory', 'Bins', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Quidem inventore molestias eum placeat nemo iusto officia. Unde deserunt sit error dolores adipisci minima totam.', 1, NULL, NULL, '2020-07-02 08:19:08', NULL, 'Java-', 'German-', 'Emory Bins'),
(19, 'dolores.kerluke@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Dolores', 'Kerluke', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ut ratione voluptatem consequuntur id nihil. Sit quod nobis est alias.', 1, NULL, NULL, '2020-08-09 12:03:27', NULL, 'C#-', 'Luxembourgish-', 'Dolores Kerluke'),
(20, 'barney.reichert@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Barney', 'Reichert', 'mentor', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ut natus nemo harum quae labore. Sunt et beatae error nihil non animi.', 1, NULL, NULL, '2020-02-11 11:09:05', NULL, 'Cobol-Delphi/Object Pascal-', 'French-English-', 'Barney Reichert'),
(21, 'romaine.hessel@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Romaine', 'Hessel', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Corrupti quae dolorum ratione architecto et cupiditate. Quasi et quo mollitia cupiditate.', 1, NULL, NULL, '2019-12-02 10:15:17', NULL, NULL, NULL, NULL),
(22, 'braxton.murazik@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Braxton', 'Murazik', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Eius officia commodi non dolorem nihil distinctio labore tempore.', 1, NULL, NULL, '2019-12-30 03:10:10', NULL, NULL, NULL, NULL),
(23, 'camron.greenfelder@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Camron', 'Greenfelder', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Voluptates molestiae excepturi rerum qui alias et.', 1, NULL, NULL, '2020-04-22 07:39:52', NULL, NULL, NULL, NULL),
(24, 'abraham.turcotte@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Abraham', 'Turcotte', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut corporis aut et mollitia esse. Unde corporis explicabo voluptatibus cum.', 1, NULL, NULL, '2020-08-16 12:27:33', NULL, NULL, NULL, NULL),
(25, 'grover.klein@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Grover', 'Klein', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Accusantium sunt eos optio deleniti ipsa.', 1, NULL, NULL, '2020-04-28 04:24:02', NULL, NULL, NULL, NULL),
(26, 'antone.kshlerin@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Antone', 'Kshlerin', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Pariatur architecto fugit qui laudantium necessitatibus debitis quae. Occaecati rerum itaque qui omnis et.', 1, NULL, NULL, '2020-01-28 14:56:05', NULL, NULL, NULL, NULL),
(27, 'cassidy.oreilly@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Cassidy', 'O\'Reilly', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Quo rem eius est magni minus occaecati.', 1, NULL, NULL, '2020-01-14 01:23:28', NULL, NULL, NULL, NULL),
(28, 'kristoffer.fahey@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Kristoffer', 'Fahey', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Nostrum quia quidem sint occaecati.', 1, NULL, NULL, '2020-01-22 13:42:36', NULL, NULL, NULL, NULL),
(29, 'joshuah.langworth@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Joshuah', 'Langworth', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ipsa eum facilis est debitis eum.', 1, NULL, NULL, '2020-04-06 07:20:35', NULL, NULL, NULL, NULL),
(30, 'albin.mills@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Albin', 'Mills', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Nam similique nesciunt dolor dignissimos voluptatem et. Repellat porro voluptatem aut reprehenderit qui rerum.', 1, NULL, NULL, '2019-12-18 10:33:35', NULL, NULL, NULL, NULL),
(31, 'timmy.gusikowski@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Timmy', 'Gusikowski', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Est reiciendis quo delectus libero fugiat enim.', 1, NULL, NULL, '2020-05-11 14:20:27', NULL, NULL, NULL, NULL),
(32, 'jordan.hayes@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Jordan', 'Hayes', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Voluptate pariatur tempore perferendis facere. Ab totam natus ex velit eaque odio.', 1, NULL, NULL, '2020-02-06 01:52:52', NULL, NULL, NULL, NULL),
(33, 'itzel.dubuque@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Itzel', 'DuBuque', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Officiis error illo recusandae tempora. Placeat nostrum accusantium possimus sunt fugit debitis.', 1, NULL, NULL, '2020-01-25 06:41:28', NULL, NULL, NULL, NULL),
(34, 'keshawn.cruickshank@hotmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Keshawn', 'Cruickshank', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'In eum aliquid unde voluptas iste sed ut rerum. Maiores nihil accusamus consequatur aut ut explicabo odio.', 1, NULL, NULL, '2020-04-27 17:30:08', NULL, NULL, NULL, NULL),
(35, 'laurence.bailey@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Laurence', 'Bailey', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Eos rerum in dolores consectetur. Vel consectetur deserunt amet.', 1, NULL, NULL, '2020-05-18 13:35:44', NULL, NULL, NULL, NULL),
(36, 'amparo.kunde@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Amparo', 'Kunde', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Ad veritatis in tempore labore illum impedit. Natus voluptatum dolorem sunt reiciendis.', 1, NULL, NULL, '2020-03-19 09:47:28', NULL, NULL, NULL, NULL),
(37, 'chandler.johns@yahoo.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Chandler', 'Johns', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Corrupti repudiandae ut numquam quod qui illo.', 1, NULL, NULL, '2020-06-06 05:50:36', NULL, NULL, NULL, NULL),
(38, 'ruthe.rath@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Ruthe', 'Rath', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Aut dolor fugiat et omnis rem est.', 1, NULL, NULL, '2020-07-19 04:54:08', NULL, NULL, NULL, NULL),
(39, 'donato.romaguera@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Donato', 'Romaguera', 'mentee', 'https://www.linkedin.com/in/john-doe', 'validate', 'mintlogo.png', 'Consequatur consequuntur qui et quasi et.', 1, NULL, NULL, '2019-11-20 02:03:12', NULL, NULL, NULL, NULL),
(40, 'brown@gmail.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Linda', 'Brown', 'mentee', 'https://www.linkedin.com/in/lindabrown/\r\n', 'validate', 'mintlogo.png', 'My name is Linda Brown and I am a 2nd-year undergraduate student from\r\nLuxembourg. I am a self-motivated and resourceful individual.g work ethic and the ability\r\nto work within a group is something important to me. My excellent track of attendance\r\nduring my work experience and studies demonstrate that I am reliable and disciplined.\r\n', 1, NULL, 'TyzjKYUtz5maqzJyOIzrS1GULa3TG8h2qKCQmHPp97tKYZvBOYAHp2xgcBA1', '2020-04-02 15:41:50', NULL, NULL, NULL, NULL),
(41, 'admint@mint.com', '$2y$10$/m4aeO.VMWouT6z4bZXiz.ACnOasvQQiKbFJZrD52M3d1lWhcTCAu', 'Derrick', 'Carter', 'admin', NULL, 'validate', 'mintlogo.png', NULL, 1, NULL, NULL, '2020-04-02 15:41:50', NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `collaboration`
--
ALTER TABLE `collaboration`
  ADD CONSTRAINT `collaboration_mentee_id_foreign` FOREIGN KEY (`mentee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collaboration_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `languages_intermediate`
--
ALTER TABLE `languages_intermediate`
  ADD CONSTRAINT `languages_intermediate_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `languages_intermediate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_writer_id_foreign` FOREIGN KEY (`writer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_target_id_foreign` FOREIGN KEY (`target_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_writer_id_foreign` FOREIGN KEY (`writer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `skills_intermediate`
--
ALTER TABLE `skills_intermediate`
  ADD CONSTRAINT `skills_intermediate_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skills_intermediate_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
