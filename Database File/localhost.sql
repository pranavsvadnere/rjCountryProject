-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 20, 2021 at 01:16 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Country`
--
CREATE DATABASE IF NOT EXISTS `Country` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Country`;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` blob NOT NULL,
  `status` enum('1','0') NOT NULL,
  `flag_delete` enum('1','0') DEFAULT '0',
  `created_on` date NOT NULL,
  `modified_on` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `name`, `image`, `status`, `flag_delete`, `created_on`, `modified_on`) VALUES
(1, 'IN', 'INDIA', 0x6173736574732f696d616765732f494e5f494e4449415f315f313632313530353236375f706e67, '1', '0', '2021-05-20', '2021-05-20'),
(2, 'CD', 'CANADA', 0x6173736574732f696d616765732f43445f43414e4144415f5f313632313530383830325f706e67, '0', '0', '2021-05-20', '2021-05-20'),
(3, 'BR', 'BRITAN', 0x6173736574732f696d616765732f42525f42524954414e5f5f313632313530383330355f6a706567, '0', '0', '2021-05-20', '2021-05-20'),
(4, 'US', 'UNITED STATES', 0x6173736574732f696d616765732f55535f554e49544544205354415445535f5f313632313530383835345f706e67, '1', '0', '2021-05-20', '2021-05-20'),
(5, 'JP', 'JAPAN', 0x6173736574732f696d616765732f4a505f4a4150414e5f355f313632313530393132335f6a7067, '1', '0', '2021-05-20', '2021-05-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
