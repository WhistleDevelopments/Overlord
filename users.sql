-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 03, 2021 at 11:27 PM
-- Server version: 10.3.31-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monolcnx_overlord`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ouid` varchar(8000) NOT NULL COMMENT 'Overlord User ID',
  `username` varchar(8000) NOT NULL COMMENT 'Overlord Username',
  `password` varchar(8000) NOT NULL COMMENT 'Overlord Username',
  `hwid` varchar(8000) DEFAULT NULL COMMENT 'Overlord HardwareID',
  `ip` varchar(8000) DEFAULT NULL COMMENT 'Overlord IP',
  `ip_locked` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'IP Locked?',
  `hwid_locked` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'HWID Locked?',
  `banned` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'User Banned?',
  `ban_reason` varchar(8000) DEFAULT NULL COMMENT 'Ban Reason',
  `suspended` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'User Suspended?',
  `suspended_reason` varchar(8000) DEFAULT NULL COMMENT 'Suspension Reason',
  `suspended_expires` date DEFAULT NULL COMMENT 'Date of suspension end'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
