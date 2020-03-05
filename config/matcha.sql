-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 05, 2020 at 11:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`cmt_id`, `user_id`, `post_id`, `username`, `comment`, `created_at`) VALUES
(19, 13, 26, 'elchouai', 'ghjghghgh', '2019-12-26 21:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE `like_table` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`like_id`, `user_id`, `post_id`, `liked`, `created_at`) VALUES
(5, 13, 26, 1, '2019-12-26 21:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `imgName` text NOT NULL,
  `imgURL` text NOT NULL,
  `imgTYPE` text NOT NULL,
  `imgSrcNAME` text NOT NULL,
  `imgSrcURL` text NOT NULL,
  `filter` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `username`, `imgName`, `imgURL`, `imgTYPE`, `imgSrcNAME`, `imgSrcURL`, `filter`, `created_at`) VALUES
(26, 13, 'elchouai', '13__2019_12_26_21_56_01.png', '../assets/img/13__2019_12_26_21_56_01.png', 'data:image/png;base64', '13__2019_12_26_21_56_01Src.png', '../assets/img/13__2019_12_26_21_56_01Src.png', '3.png', '2019-12-26 20:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `hash` text DEFAULT NULL,
  `notification` tinyint(1) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `birthday` date DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `sex_pre` varchar(50) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `bio` varchar(1000) DEFAULT NULL,
  `pic1` varchar(255) DEFAULT NULL,
  `pic2` varchar(255) DEFAULT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `pic4` varchar(255) DEFAULT NULL,
  `pic5` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `popularity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fname`, `lname`, `email`, `hash`, `notification`, `active`, `created_at`, `birthday`, `gender`, `sex_pre`, `tag`, `bio`, `pic1`, `pic2`, `pic3`, `pic4`, `pic5`, `location`, `popularity`) VALUES
(13, 'issam', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'First name', 'Last name', 'chouaib7991@gmail.com', 'd045c59a90d7587d8d671b5f5aec4e7c', 1, 1, '2019-12-26 20:53:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'issamissamissam', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'First name', 'Last name', 'hh@hh', '013d407166ec4fa56eb1e1f8cbe183b9', 1, 0, '2020-02-24 22:46:14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'khjkhjkhjkhjk', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'First name', 'Last name', 'ghjghjg@hjghgh', '31fefc0e570cb3860f2a6d4b38c6490d', 1, 0, '2020-02-24 22:55:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'issamelferkh', '210ad1da7fbb8f5067e23918ab3a3ad9eb9237cb4bc7211ec73391dc34951016dc573337abf7f2528ca7427518f137191d18431f65847e1956df29865fb51558', 'First name', 'Last name', 'issam.elferkh@gmail.com', 'aa942ab2bfa6ebda4840e7360ce6e7ef', 1, 1, '2020-03-03 17:09:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `like_table`
--
ALTER TABLE `like_table`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;