-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 03:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poultrymanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedings`
--

CREATE TABLE `feedings` (
  `id` int(11) NOT NULL,
  `flocks` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `typeoffeeds` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedings`
--

INSERT INTO `feedings` (`id`, `flocks`, `date`, `typeoffeeds`, `qty`) VALUES
(1, 'h', '', 'h', 'h'),
(2, 'e', '', 'e', 'e'),
(3, 'Flock 1', '2023-12-17', 'Pellets', '1kg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedings`
--
ALTER TABLE `feedings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedings`
--
ALTER TABLE `feedings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
