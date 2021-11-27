-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 08:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noiseapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `id` int(11) NOT NULL,
  `district_name` varchar(40) NOT NULL,
  `block_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `block`
--

INSERT INTO `block` (`id`, `district_name`, `block_name`) VALUES
(1, 'Ganjam', 'Purushottampur'),
(2, 'Kendrapara', 'Rajnagar'),
(3, 'Ganjam', 'Polasara'),
(4, 'Ganjam', 'Rangeilunda'),
(6, 'Ganjam', 'Digapahandi'),
(8, 'Ganjam', 'Chhatrapur'),
(10, 'Ganjam', 'Khalikote'),
(12, 'Ganjam', 'Hinjilicut'),
(14, 'Kendrapara', 'Pattamundai'),
(15, 'Kendrapara', 'Rajkanika'),
(16, 'Puri', 'Chandanpur'),
(17, 'Puri', 'Brahmagiri'),
(18, 'Puri', 'Satyabadi'),
(19, 'Khordha', 'Begunia'),
(20, 'Khordha', 'Jatani'),
(21, 'Khordha', 'Khandagiri'),
(22, 'Cuttack', 'Athagad'),
(23, 'Cuttack', 'Kishannagar'),
(24, 'Cuttack', 'Narasinghpur');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` bigint(20) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district_name`) VALUES
(1, 'Ganjam'),
(2, 'Puri'),
(3, 'Cuttack'),
(4, 'Khordha'),
(5, 'Kendrapara'),
(6, 'Balasore'),
(7, 'Sambalpur'),
(8, 'Malkangiri'),
(9, 'Koraput'),
(10, 'Gajapati');

-- --------------------------------------------------------

--
-- Table structure for table `loginiot`
--

CREATE TABLE `loginiot` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `district_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loginiot`
--

INSERT INTO `loginiot` (`id`, `username`, `passwd`, `district_name`) VALUES
(1, 'ganjam', 'ganjam', 'Ganjam'),
(2, 'puri', 'puri', 'Puri'),
(3, 'cuttack', 'cuttack', 'Cuttack'),
(4, 'khordha', 'khordha', 'Khordha'),
(5, 'kendrapara', 'kendrapara', 'Kendrapara'),
(6, 'balasore', 'balasore', 'Balasore');

-- --------------------------------------------------------

--
-- Table structure for table `noise_value`
--

CREATE TABLE `noise_value` (
  `id` int(11) NOT NULL,
  `district_name` varchar(40) NOT NULL,
  `block_name` varchar(40) NOT NULL,
  `day_value` float NOT NULL,
  `night_value` float NOT NULL,
  `date` date NOT NULL,
  `average` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noise_value`
--

INSERT INTO `noise_value` (`id`, `district_name`, `block_name`, `day_value`, `night_value`, `date`, `average`) VALUES
(37, 'Ganjam', 'Purushottampur', 51.6, 40.7, '2021-11-25', 46.15),
(38, 'Ganjam', 'Purushottampur', 49.8, 40.8, '2021-11-26', 45.3),
(39, 'Ganjam', 'Rangeilunda', 44.2, 37.3, '2021-11-25', 40.75),
(40, 'Ganjam', 'Rangeilunda', 48.3, 41.1, '2021-11-26', 44.7),
(41, 'Ganjam', 'Chhatrapur', 41.1, 37.9, '2021-11-25', 39.5),
(42, 'Ganjam', 'Chhatrapur', 55.2, 38.4, '2021-11-26', 46.8),
(43, 'Puri', 'Brahmagiri', 52.2, 39.4, '2021-11-25', 45.8),
(44, 'Puri', 'Brahmagiri', 49.9, 35.6, '2021-11-26', 42.75),
(45, 'Puri', 'Chandanpur', 47.9, 34.6, '2021-11-25', 41.25),
(46, 'Puri', 'Chandanpur', 51.7, 43, '2021-11-26', 47.35),
(47, 'Puri', 'Satyabadi', 40.6, 38.6, '2021-11-25', 39.6),
(48, 'Puri', 'Satyabadi', 49.5, 34.2, '2021-11-26', 41.85),
(49, 'Kendrapara', 'Pattamundai', 42.9, 40.4, '2021-11-25', 41.65),
(50, 'Kendrapara', 'Pattamundai', 58.9, 39, '2021-11-26', 48.95),
(51, 'Kendrapara', 'Rajkanika', 46.6, 39.8, '2021-11-25', 43.2),
(52, 'Kendrapara', 'Rajkanika', 42.4, 39.4, '2021-11-26', 40.9),
(53, 'Kendrapara', 'Rajnagar', 44.7, 44.5, '2021-11-25', 44.6),
(54, 'Kendrapara', 'Rajnagar', 41.2, 41.1, '2021-11-26', 41.15),
(55, 'Khordha', 'Begunia', 56.1, 37.9, '2021-11-25', 47),
(56, 'Khordha', 'Begunia', 53.4, 34.8, '2021-11-26', 44.1),
(57, 'Khordha', 'Jatani', 41.5, 35.9, '2021-11-25', 38.7),
(58, 'Khordha', 'Jatani', 54.4, 41.6, '2021-11-26', 48),
(59, 'Khordha', 'Khandagiri', 45.4, 38.4, '2021-11-25', 41.9),
(60, 'Khordha', 'Khandagiri', 41.2, 40.2, '2021-11-26', 40.7),
(61, 'Cuttack', 'Athagad', 47.1, 39, '2021-11-25', 43.05),
(62, 'Cuttack', 'Athagad', 58.3, 34.9, '2021-11-26', 46.6),
(63, 'Cuttack', 'Kishannagar', 57.3, 43, '2021-11-25', 50.15),
(64, 'Cuttack', 'Kishannagar', 41.7, 34.1, '2021-11-26', 37.9),
(65, 'Cuttack', 'Narasinghpur', 42, 36.4, '2021-11-25', 39.2),
(66, 'Cuttack', 'Narasinghpur', 45.7, 42.3, '2021-11-26', 44),
(67, 'Puri', 'Brahmagiri', 52.5, 42.9, '2021-11-27', 47.7),
(68, 'Puri', 'Chandanpur', 57.3, 35.4, '2021-11-27', 46.35),
(69, 'Puri', 'Satyabadi', 51.5, 42.7, '2021-11-27', 47.1),
(70, 'Ganjam', 'Chhatrapur', 58.1, 43.1, '2021-11-27', 50.6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `loginiot`
--
ALTER TABLE `loginiot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noise_value`
--
ALTER TABLE `noise_value`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `loginiot`
--
ALTER TABLE `loginiot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `noise_value`
--
ALTER TABLE `noise_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
