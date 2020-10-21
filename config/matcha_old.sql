-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 03:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matcha`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE `like_table` (
  `like_id` int(11) NOT NULL,
  `user_p` int(11) NOT NULL,
  `user_o` int(11) NOT NULL,
  `liked` tinyint(1) DEFAULT '0',
  `noped` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`like_id`, `user_p`, `user_o`, `liked`, `noped`, `created_at`) VALUES
(9, 23, 23, 1, 0, '2020-03-31 14:50:17'),
(10, 23, 23, 1, 0, '2020-03-31 14:50:40'),
(12, 23, 24, 1, 0, '2020-03-31 14:55:18'),
(13, 23, 23, 1, 0, '2020-03-31 14:56:18'),
(14, 23, 24, 1, 0, '2020-03-31 14:56:22'),
(15, 23, 23, 0, 1, '2020-03-31 14:56:36'),
(16, 23, 24, 0, 1, '2020-03-31 14:56:38'),
(17, 23, 23, 1, 0, '2020-04-01 00:10:33'),
(18, 23, 23, 1, 0, '2020-04-01 00:57:47'),
(19, 23, 23, 1, 0, '2020-04-01 00:58:02');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
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
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`img_id`, `user_id`, `username`, `imgName`, `imgURL`, `asProfile`, `created_at`) VALUES
(29, 8, '', '', '', 0, '2020-03-17 19:48:02'),
(32, 2, '', '', '', 0, '2020-03-17 18:59:02'),
(34, 24, 'issam', '23_2020_03_17_20_48_17_profile.png', '../assets/img/23_2020_03_17_20_48_17_profile.png', 1, '2020-03-23 15:00:40'),
(35, 23, 'issamelferkh', '23_2020_03_17_20_52_36_profile.png', '../assets/img/23_2020_03_17_20_52_36_profile.png', 0, '2020-03-17 19:52:38'),
(36, 23, 'issamelferkh', '23_2020_03_19_14_12_39_profile.png', '../assets/img/23_2020_03_19_14_12_39_profile.png', 1, '2020-03-23 15:22:20'),
(37, 23, 'issamelferkh', '23_2020_03_19_14_25_38_profile.png', '../assets/img/23_2020_03_19_14_25_38_profile.png', 0, '2020-03-19 14:03:15'),
(38, 23, 'issamelferkh', '23_2020_03_23_16_22_58_profile.png', '../assets/img/23_2020_03_23_16_22_58_profile.png', 0, '2020-03-23 15:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `tag_table`
--

CREATE TABLE `tag_table` (
  `tag_id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tag_table`
--

INSERT INTO `tag_table` (`tag_id`, `tag`) VALUES
(19, '13');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
  `birthday` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `sex_pre` varchar(50) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `popularity` varchar(255) DEFAULT NULL,
  `loc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `lname`, `email`, `hash`, `notification`, `active`, `created_at`, `birthday`, `gender`, `sex_pre`, `tag`, `bio`, `location`, `popularity`, `loc`) VALUES
(23, 'issamelferkh', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'Issam 01', 'EL FERKH', 'issam.elferkh@gmail.com', 'aa942ab2bfa6ebda4840e7360ce6e7ef', 1, 1, '2020-03-03 17:09:52', '1999-03-16', 'Men', 'hhh', 'aaaa', 'im name i have x years old', NULL, NULL, '32.8811,-6.9063'),
(24, 'issam', NULL, NULL, NULL, 'issam@issam.com', NULL, 1, 0, '2020-03-16 17:22:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `tag_table`
--
ALTER TABLE `tag_table`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tag_table`
--
ALTER TABLE `tag_table`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;