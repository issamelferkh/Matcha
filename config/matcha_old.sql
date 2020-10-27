-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 05 Octobre 2020 à 22:58
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `matcha_mm`
--

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE `chat` (
  `msg_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_pic` text,
  `receiver_id` int(11) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_pic` text,
  `msg_text` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chat`
--

INSERT INTO `chat` (`msg_id`, `sender_id`, `sender_name`, `sender_pic`, `receiver_id`, `receiver_name`, `receiver_pic`, `msg_text`, `created_at`) VALUES
(17, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'salut', '2020-05-16 08:33:43'),
(18, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'salut cv ?', '2020-05-16 08:34:20'),
(19, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Btissam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'oui cv et toi', '2020-05-16 08:45:38'),
(20, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'sdssdsd', '2020-05-16 08:46:51'),
(21, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Btissam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'ddd', '2020-05-16 08:47:04'),
(22, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Btissam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'wswsws', '2020-05-16 08:47:40'),
(23, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qqqqq', '2020-05-16 08:51:20'),
(24, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'sss', '2020-05-16 08:52:59'),
(25, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qq', '2020-05-16 08:53:27'),
(26, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'sasasasas', '2020-05-16 08:54:14'),
(27, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qqqqqq', '2020-05-16 08:54:21'),
(28, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '   ghgh   d', '2020-05-16 09:38:15'),
(29, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'dsdsdsddsdsds\nsdsdsd', '2020-05-16 09:38:31'),
(30, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'yyyyy\niiiii', '2020-05-16 09:38:56'),
(31, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '&lt;script&gt;&lt;alert(1);/script&gt;', '2020-05-16 09:39:20'),
(32, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Issam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'ssss', '2020-05-16 10:15:15'),
(33, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Issam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qqqq', '2020-05-16 10:15:22'),
(34, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'qqqqq\naaaa', '2020-05-16 10:16:31'),
(35, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', '', '2020-05-16 10:39:58'),
(36, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', '', '2020-05-16 10:39:58'),
(37, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'sasas', '2020-05-16 10:40:00'),
(38, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', '', '2020-05-16 10:40:02'),
(39, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '', '2020-05-16 10:58:20'),
(40, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '', '2020-05-16 10:58:23'),
(41, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'f    f', '2020-05-16 10:59:36'),
(42, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'f   f', '2020-05-16 10:59:43'),
(43, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '', '2020-05-16 10:59:46'),
(44, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'test test test', '2020-05-16 11:13:09'),
(45, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'test', '2020-05-16 11:13:20'),
(46, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'testy 6 ffff', '2020-05-16 20:41:36'),
(47, 32, 'jamal', '/assets/img/avatar.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'xxzczxc', '2020-05-24 00:55:48'),
(48, 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 'ggggg', '2020-05-24 00:55:54'),
(49, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'ddsdds', '2020-05-24 01:29:07'),
(50, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'sdssdsd', '2020-05-24 01:29:10'),
(51, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'dsddsd', '2020-05-24 01:29:13'),
(52, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'dsdssdsd', '2020-05-24 01:29:19'),
(53, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'dsdsdds', '2020-05-24 01:29:23'),
(54, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'dd', '2020-05-24 01:29:27'),
(55, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'd', '2020-05-24 01:29:30'),
(56, 32, 'jamal', '../assets/img/32_2020_05_24_02_54_08_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'dff', '2020-05-24 01:29:35'),
(57, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 'aaa', '2020-05-26 09:13:13'),
(58, 23, 'Issam', '../assets/img/23_2020_05_20_15_31_42_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'yeah', '2020-05-26 09:13:31');

-- --------------------------------------------------------

--
-- Structure de la table `like_table`
--

CREATE TABLE `like_table` (
  `like_id` int(11) NOT NULL,
  `user_p` int(11) NOT NULL,
  `user_o` int(11) NOT NULL,
  `liked` int(1) DEFAULT '0',
  `noped` int(1) DEFAULT '0',
  `reported` int(1) NOT NULL DEFAULT '0',
  `blocked` int(1) NOT NULL DEFAULT '0',
  `connected` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `like_table`
--

INSERT INTO `like_table` (`like_id`, `user_p`, `user_o`, `liked`, `noped`, `reported`, `blocked`, `connected`, `created_at`) VALUES
(369, 23, 24, 0, 0, 0, 0, 0, '2020-05-25 17:19:37'),
(370, 23, 27, 0, 0, 0, 0, 0, '2020-05-25 17:30:20'),
(371, 23, 28, 0, 0, 0, 0, 0, '2020-05-25 17:30:20'),
(372, 23, 29, 0, 0, 0, 0, 0, '2020-05-25 17:19:37'),
(373, 23, 30, 1, 0, 0, 0, 1, '2020-05-26 09:11:59'),
(374, 30, 23, 1, 0, 0, 0, 1, '2020-05-26 09:11:59'),
(375, 23, 32, 0, 0, 0, 0, 1, '2020-06-01 11:35:04'),
(376, 32, 23, 0, 0, 0, 0, 1, '2020-06-01 11:34:53'),
(377, 23, 8, 0, 0, 0, 0, 0, '2020-05-25 17:19:37');

-- --------------------------------------------------------

--
-- Structure de la table `noti`
--

CREATE TABLE `noti` (
  `noti_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_pic` text,
  `receiver_id` int(11) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_pic` text,
  `noti_text` varchar(1000) DEFAULT NULL,
  `seen` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `noti`
--

INSERT INTO `noti` (`noti_id`, `sender_id`, `sender_name`, `sender_pic`, `receiver_id`, `receiver_name`, `receiver_pic`, `noti_text`, `seen`, `created_at`) VALUES
(17, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'salut', 1, '2020-05-16 08:33:43'),
(18, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'salut cv ?', 1, '2020-05-16 08:34:20'),
(19, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Btissam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'oui cv et toi', 1, '2020-05-16 08:45:38'),
(20, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'sdssdsd', 1, '2020-05-16 08:46:51'),
(21, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Btissam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'ddd', 1, '2020-05-16 08:47:04'),
(22, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Btissam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'wswsws', 1, '2020-05-16 08:47:40'),
(23, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qqqqq', 1, '2020-05-16 08:51:20'),
(24, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'sss', 1, '2020-05-16 08:52:59'),
(25, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qq', 1, '2020-05-16 08:53:27'),
(26, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'sasasasas', 1, '2020-05-16 08:54:14'),
(27, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qqqqqq', 1, '2020-05-16 08:54:21'),
(28, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '   ghgh   d', 1, '2020-05-16 09:38:15'),
(29, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'dsdsdsddsdsds\nsdsdsd', 1, '2020-05-16 09:38:31'),
(30, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'yyyyy\niiiii', 1, '2020-05-16 09:38:56'),
(31, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '&lt;script&gt;&lt;alert(1);/script&gt;', 1, '2020-05-16 09:39:20'),
(32, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Issam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'ssss', 1, '2020-05-16 10:15:15'),
(33, 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Issam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'qqqq', 1, '2020-05-16 10:15:22'),
(34, 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 23, 'Issam', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'qqqqq\naaaa', 1, '2020-05-16 10:16:31'),
(35, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', '', 1, '2020-05-16 10:39:58'),
(36, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', '', 1, '2020-05-16 10:39:58'),
(37, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 'sasas', 1, '2020-05-16 10:40:00'),
(38, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', '', 1, '2020-05-16 10:40:02'),
(39, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '', 1, '2020-05-16 10:58:20'),
(40, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '', 1, '2020-05-16 10:58:23'),
(41, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'f    f', 1, '2020-05-16 10:59:36'),
(42, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'f   f', 1, '2020-05-16 10:59:43'),
(43, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', '', 1, '2020-05-16 10:59:46'),
(44, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'test test test', 1, '2020-05-16 11:13:09'),
(45, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'test', 1, '2020-05-16 11:13:20'),
(46, 23, 'Issam 01', '../assets/img/23_2020_05_15_10_47_10_profile.png', 30, 'Btissam', '../assets/img/30_2020_05_15_03_03_50_profile.png', 'testy 6 ffff', 1, '2020-05-16 20:41:36'),
(47, 23, 'Issam 01 EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-18 10:46:21'),
(48, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 10:59:42'),
(49, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:00:05'),
(50, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:00:51'),
(51, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:06:49'),
(52, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:07:26'),
(53, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:08:30'),
(54, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:10:40'),
(55, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:14:26'),
(56, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:17:12'),
(57, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-18 11:24:48'),
(58, 30, 'Btissam Yaqine', NULL, 23, 'Issam 01 EL FERKH', NULL, 'Like your profile', 1, '2020-05-19 01:21:13'),
(59, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 1, '2020-05-24 00:54:58'),
(60, 32, 'jamal shady', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-24 00:55:30'),
(61, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 11:56:34'),
(62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2020-05-24 13:45:12'),
(63, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 13:47:51'),
(64, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:49:43'),
(65, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:50:38'),
(66, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:53:12'),
(67, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:54:18'),
(68, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:54:20'),
(69, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:54:22'),
(70, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:54:23'),
(71, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:54:25'),
(72, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:54:35'),
(73, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:13'),
(74, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:35'),
(75, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:39'),
(76, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:41'),
(77, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:42'),
(78, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:43'),
(79, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:45'),
(80, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:47'),
(81, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:55:58'),
(82, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:59:04'),
(83, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:59:22'),
(84, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 13:59:49'),
(85, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 14:01:15'),
(86, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 14:01:18'),
(87, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-24 14:01:38'),
(88, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 14:01:40'),
(89, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 22:11:09'),
(90, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 22:19:03'),
(91, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 22:20:06'),
(92, 23, 'Issam EL FERKH', NULL, 32, 'jamal shady', NULL, 'Like your profile', 0, '2020-05-24 22:21:04'),
(93, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 00:54:35'),
(94, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 00:56:03'),
(95, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:14:27'),
(96, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:17:55'),
(97, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:17:56'),
(98, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:20:16'),
(99, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:20:17'),
(100, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:31:45'),
(101, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:32:44'),
(102, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:05'),
(103, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:09'),
(104, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:11'),
(105, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:13'),
(106, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:17'),
(107, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:18'),
(108, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:31'),
(109, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:36:45'),
(110, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:37:17'),
(111, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:37:32'),
(112, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:37:47'),
(113, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:39:02'),
(114, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:39:35'),
(115, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:39:46'),
(116, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:40:46'),
(117, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:42:15'),
(118, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:44:37'),
(119, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:44:55'),
(120, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:44:58'),
(121, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:45:00'),
(122, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:45:01'),
(123, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:45:13'),
(124, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:45:15'),
(125, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:45:38'),
(126, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:45:40'),
(127, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:45:52'),
(128, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:46:23'),
(129, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:46:37'),
(130, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:47:28'),
(131, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:47:30'),
(132, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:48:10'),
(133, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:13'),
(134, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:15'),
(135, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:16'),
(136, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:18'),
(137, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:34'),
(138, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:48:40'),
(139, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:42'),
(140, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:44'),
(141, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:45'),
(142, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:48:47'),
(143, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:49:26'),
(144, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:49:32'),
(145, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:49:34'),
(146, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:49:44'),
(147, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:50:29'),
(148, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:50:31'),
(149, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:50:33'),
(150, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:51:06'),
(151, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:51:12'),
(152, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:51:33'),
(153, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:51:45'),
(154, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:51:51'),
(155, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:51:52'),
(156, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:52:07'),
(157, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:52:08'),
(158, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:52:10'),
(159, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:52:24'),
(160, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:53:18'),
(161, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:53:20'),
(162, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:53:37'),
(163, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:53:39'),
(164, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:54:00'),
(165, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:54:02'),
(166, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:54:34'),
(167, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:55:00'),
(168, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:55:05'),
(169, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:55:06'),
(170, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:55:27'),
(171, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 17:55:45'),
(172, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:57:17'),
(173, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:57:23'),
(174, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:57:44'),
(175, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 17:58:19'),
(176, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:03:49'),
(177, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:03:58'),
(178, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:04:10'),
(179, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:04:43'),
(180, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:04:54'),
(181, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:05:25'),
(182, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:05:40'),
(183, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:05:55'),
(184, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:07:31'),
(185, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:07:38'),
(186, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:14:22'),
(187, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:15:53'),
(188, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:16:30'),
(189, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:16:47'),
(190, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:17:03'),
(191, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:17:50'),
(192, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:21:28'),
(193, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:29:09'),
(194, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 18:29:11'),
(195, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:29:16'),
(196, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 18:29:17'),
(197, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:29:21'),
(198, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 18:29:22'),
(199, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:30:03'),
(200, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 18:30:09'),
(201, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:30:27'),
(202, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Like your profile', 0, '2020-05-25 18:30:29'),
(203, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 18:34:48'),
(204, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-25 19:17:41'),
(205, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:31:23'),
(206, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:31:46'),
(207, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:31:52'),
(208, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:32:05'),
(209, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:32:17'),
(210, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:36:45'),
(211, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:36:51'),
(212, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:36:57'),
(213, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:36:58'),
(214, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:40:17'),
(215, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:40:51'),
(216, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:41:21'),
(217, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:47:08'),
(218, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like back your profile', 1, '2020-05-26 08:47:36'),
(219, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-26 08:47:43'),
(220, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like back your profile', 1, '2020-05-26 08:47:43'),
(221, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:48:12'),
(222, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like back your profile', 1, '2020-05-26 08:48:12'),
(223, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-26 08:51:20'),
(224, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:51:38'),
(225, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like back your profile', 1, '2020-05-26 08:51:38'),
(226, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:59:07'),
(227, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-26 08:59:18'),
(228, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 08:59:37'),
(229, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like your profile', 1, '2020-05-26 09:00:38'),
(230, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like back your profile', 1, '2020-05-26 09:00:46'),
(231, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like back your profile', 1, '2020-05-26 09:00:57'),
(232, 23, 'Issam EL FERKH', NULL, NULL, ' ', NULL, 'Look at your profile', 0, '2020-05-26 09:07:21'),
(233, 23, 'Issam EL FERKH', NULL, 30, 'Btissam ', NULL, 'Look at your profile', 1, '2020-05-26 09:07:59'),
(234, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Like your profile', 1, '2020-05-26 09:08:33'),
(235, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Look at your profile', 1, '2020-05-26 09:08:45'),
(236, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Look at your profile', 1, '2020-05-26 09:08:54'),
(237, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Look at your profile', 1, '2020-05-26 09:09:07'),
(238, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Look at your profile', 1, '2020-05-26 09:09:12'),
(239, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like back your profile', 1, '2020-05-26 09:11:59'),
(240, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Look at your profile', 1, '2020-05-26 09:11:59'),
(241, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like back your profile', 1, '2020-05-26 09:12:03'),
(242, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Look at your profile', 1, '2020-05-26 09:12:03'),
(243, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like back your profile', 1, '2020-05-26 09:12:11'),
(244, 30, 'Btissam Yaqine', NULL, 23, 'Issam EL FERKH', NULL, 'Like back your profile', 1, '2020-05-26 09:12:18'),
(245, 30, 'Btissam', NULL, 23, 'Issam', NULL, 'Send you a new message', 1, '2020-05-26 09:13:13'),
(246, 23, 'Issam', NULL, 30, 'Btissam', NULL, 'Send you a new message', 1, '2020-05-26 09:13:31'),
(247, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Look at your profile', 0, '2020-06-01 11:41:00'),
(248, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Look at your profile', 0, '2020-06-01 11:41:09'),
(249, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Look at your profile', 0, '2020-06-01 12:07:40'),
(250, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Look at your profile', 0, '2020-06-02 13:03:04'),
(251, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Look at your profile', 0, '2020-06-02 13:03:12'),
(252, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Look at your profile', 0, '2020-06-02 13:03:19'),
(253, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Look at your profile', 0, '2020-06-02 13:28:27'),
(254, 23, 'Issam EL FERKH', NULL, 30, 'Btissam Yaqine', NULL, 'Look at your profile', 0, '2020-06-02 13:30:25'),
(255, 23, 'Issam EL FERKH', NULL, 32, 'jamal jhjh \' ; \n\n\n\n\n. , kj shady', NULL, 'Look at your profile', 0, '2020-06-16 16:03:33');

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `img_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `imgName` text NOT NULL,
  `imgURL` text NOT NULL,
  `asProfile` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `picture`
--

INSERT INTO `picture` (`img_id`, `user_id`, `username`, `imgName`, `imgURL`, `asProfile`, `created_at`) VALUES
(29, 8, '', '', '', 0, '2020-03-17 19:48:02'),
(32, 2, '', '', '', 0, '2020-03-17 18:59:02'),
(34, 24, 'issam', '23_2020_03_17_20_48_17_profile.png', '../assets/img/23_2020_03_17_20_48_17_profile.png', 1, '2020-03-23 15:00:40'),
(42, 26, 'btissamyaqine', '26_2020_05_02_02_39_47_profile.png', '../assets/img/26_2020_05_02_02_39_47_profile.png', 1, '2020-05-02 00:39:52'),
(44, 30, 'btissamtaqine', '30_2020_05_15_03_03_50_profile.png', '../assets/img/30_2020_05_15_03_03_50_profile.png', 1, '2020-05-15 01:03:58'),
(51, 32, 'shadyjamal', '32_2020_05_24_02_54_08_profile.png', '../assets/img/32_2020_05_24_02_54_08_profile.png', 1, '2020-05-24 00:54:22'),
(52, 23, 'issamelferkh', '23_2020_06_01_13_27_59_profile.png', '../assets/img/23_2020_06_01_13_27_59_profile.png', 1, '2020-06-01 11:28:03');

-- --------------------------------------------------------

--
-- Structure de la table `tag_table`
--

CREATE TABLE `tag_table` (
  `tag_id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Contenu de la table `tag_table`
--

INSERT INTO `tag_table` (`tag_id`, `tag`) VALUES
(19, '13');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `hash` text,
  `notification` tinyint(1) NOT NULL DEFAULT '1',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `gender` varchar(50) DEFAULT NULL,
  `sex_pre` varchar(50) DEFAULT NULL,
  `tag1` varchar(255) DEFAULT NULL,
  `tag2` varchar(255) DEFAULT NULL,
  `tag3` varchar(255) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `lati` varchar(255) DEFAULT NULL,
  `longi` varchar(255) DEFAULT NULL,
  `popularity` float DEFAULT '0',
  `lastonline` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `complete_profile` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `lname`, `email`, `hash`, `notification`, `active`, `created_at`, `gender`, `sex_pre`, `tag1`, `tag2`, `tag3`, `bio`, `lati`, `longi`, `popularity`, `lastonline`, `age`, `complete_profile`) VALUES
(23, 'issamelferkh', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'Issam', 'EL FERKH', 'issam.elferkh@gmail.com', 'aa942ab2bfa6ebda4840e7360ce6e7ef', 0, 1, '2020-03-03 17:09:52', 'Men', 'Other', 'eee', '', '', 'sssssddddww', '32.895317999999996', '-6.9266515', 50, '2020-06-03 13:33:48', 50, 1),
(24, 'test1', NULL, 'fname1', 'lname1', 'issam@issam.com', NULL, 1, 0, '2020-03-16 17:22:07', 'Men', 'Men', 'zaaa', 'qwe', NULL, NULL, '33.030148', '-7.196091', 100, '2020-08-14 14:25:02', 20, 0),
(27, 'test2', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'fname2', 'lname2', 'test@testtesttest', '5e388103a391daabe3de1d76a6739ccd', 1, 0, '2020-04-29 05:58:29', 'Men', NULL, 'bbb', 'asw', NULL, NULL, '35.167812', '-5.965622', 100, '', 22, 0),
(28, 'test3', '', 'fname3', 'lname3', 'testtesttest@testtesttest', '6c4b761a28b734fe93831e3fb400ce87', 1, 0, '2020-04-29 17:45:21', 'Men', 'h', 'ccc', 'azx', NULL, NULL, '32.918769', '-6.948103', 100, '', 30, 0),
(29, 'FuckUIssam', 'a310d5fa610aafbe778776c95159b19b1bc911043bead88a1be5998c31d98a6fb0ebaa8c46a3a58edb96e3bc46ec2da68ec589cc71f214e6d3a205acf8531a94', 'yassir', 'qqq', 'docibo2244@coalamails.com', '37f0e884fbad9667e38940169d0a3c95', 1, 1, '2020-05-07 11:31:53', 'Men', NULL, 'ddd', NULL, 'k', NULL, '32.5977', '-6.2684', 100, '2020-05-13 12:41:49', 40, 0),
(30, 'btissamyaqine', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'Btissam', 'Yaqine', 'btissamyaqine@gmail.com', 'db8e1af0cb3aca1ae2d0018624204529', 1, 1, '2020-05-15 00:49:02', 'Women', 'Other', 'php', '', '', 'I\'m a cute girl coder', '32.895291199999996', '-6.926647099999999', 100, '2020-05-26 09:56:17', 20, 1),
(31, 'issamissam2', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'lname issam', 'fname issam', 'kgkjhkhkjhjlhlj@jhjhjhjh', '6e0721b2c6977135b916ef286bcb49ec', 1, 1, '2020-05-15 04:33:59', NULL, NULL, NULL, NULL, NULL, NULL, '32.8952695', '-6.9266929', 0, '2020-05-15 05:37:21', 0, 0),
(32, 'shadyjamal', 'ab30bb26cba9506fb623eeb3692a7d25c682b355fdcd885e448a57020cbda8581801bc8b5d8f27741f75d891fec14756380baa04dc82ea0d5b9e5e8b5b6ad953', 'jamal jhjh \' ; \n\n\n\n\n. , kj', 'shady', 'chadijamal@gmail.com', '6da9003b743b65f4c0ccd295cc484e57', 1, 1, '2020-05-24 00:43:57', 'Men', 'Men', 'wydad', '', '', 'aaaa', '32.3143078', '-6.9101911', 0, '2020-05-24 01:32:20', 34, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`msg_id`);

--
-- Index pour la table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`like_id`);

--
-- Index pour la table `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`noti_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`img_id`);

--
-- Index pour la table `tag_table`
--
ALTER TABLE `tag_table`
  ADD PRIMARY KEY (`tag_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `chat`
--
ALTER TABLE `chat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;
--
-- AUTO_INCREMENT pour la table `noti`
--
ALTER TABLE `noti`
  MODIFY `noti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT pour la table `tag_table`
--
ALTER TABLE `tag_table`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
