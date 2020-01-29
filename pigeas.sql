-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 05:56 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pigeas`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_message`
--

CREATE TABLE `customer_message` (
  `id` varchar(25) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `message` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_access_map`
--

CREATE TABLE `user_access_map` (
  `id` int(11) NOT NULL,
  `parent_map_id` int(11) NOT NULL,
  `access_map` varchar(32) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_map`
--

INSERT INTO `user_access_map` (`id`, `parent_map_id`, `access_map`, `create_time`, `update_time`) VALUES
(1, 1, 'User_Mapping', '2019-11-05 15:18:49', '2020-01-29 02:25:59'),
(2, 1, 'User_Admin', '2019-11-05 15:18:49', '2019-12-09 07:31:50'),
(3, 1, 'User_Permission', '2019-11-05 15:18:49', '2020-01-29 02:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `email`, `password`, `create_time`, `update_time`) VALUES
('1580271268', 'gesang', 'gesangseto@gmail.com', 'ed75ee07e532cbe3a2d549d52609f2b7162d062664d0e6c2dce1cae7', '2020-01-29 04:14:28', '2020-01-29 04:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `user_parent_map`
--

CREATE TABLE `user_parent_map` (
  `id` int(11) NOT NULL,
  `parent_map` varchar(32) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_parent_map`
--

INSERT INTO `user_parent_map` (`id`, `parent_map`, `icon`, `create_time`, `update_time`) VALUES
(1, 'Administrator', 'fa fa-certificate', '2019-11-05 14:24:41', '2019-11-10 07:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(25) NOT NULL,
  `access_map_id` int(11) NOT NULL,
  `create` int(11) NOT NULL,
  `read` int(11) NOT NULL,
  `update` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `admin_id`, `access_map_id`, `create`, `read`, `update`, `delete`, `create_time`, `update_time`) VALUES
(48, '1580271268', 1, 1, 1, 1, 1, '2020-01-29 04:15:05', '2020-01-29 04:15:05'),
(49, '1580271268', 2, 1, 1, 1, 1, '2020-01-29 04:15:12', '2020-01-29 04:15:12'),
(50, '1580271268', 3, 1, 1, 1, 1, '2020-01-29 04:15:21', '2020-01-29 04:15:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_message`
--
ALTER TABLE `customer_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_map`
--
ALTER TABLE `user_access_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_map_id` (`parent_map_id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_parent_map`
--
ALTER TABLE `user_parent_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_map_id` (`access_map_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_access_map`
--
ALTER TABLE `user_access_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user_parent_map`
--
ALTER TABLE `user_parent_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
