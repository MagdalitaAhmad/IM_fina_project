-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 01:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `flocks` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `itembought` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `mop` varchar(255) DEFAULT NULL,
  `pstatus` varchar(255) DEFAULT NULL,
  `buyfrom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `flocks`, `date`, `itembought`, `qty`, `amount`, `mop`, `pstatus`, `buyfrom`) VALUES
(1, 'Flock 1', '', 's', 's', 's', 's', 's', 's'),
(2, 's', '', 's', 's', 's', 's', 's', 's');

-- --------------------------------------------------------

--
-- Table structure for table `flockmanagement`
--

CREATE TABLE `flockmanagement` (
  `id` int(11) NOT NULL,
  `flock` varchar(255) DEFAULT NULL,
  `date` varchar(25) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `breed` varchar(255) DEFAULT NULL,
  `SourceofFlocks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `flocks` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `itemsold` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `mop` varchar(255) DEFAULT NULL,
  `pstatus` varchar(255) DEFAULT NULL,
  `soldTo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `flocks`, `date`, `itemsold`, `qty`, `amount`, `mop`, `pstatus`, `soldTo`) VALUES
(7, 'Flock 1', '2023-12-17', '', 'gfdgf', 'gdfgfd', 'fdgfd', 'dfgfd', ''),
(8, 'dfgvfd', '', 'sdfsd', 'sdfds', 'sdf', 'dfd', 'fdfd', 'dfdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flockmanagement`
--
ALTER TABLE `flockmanagement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `flockmanagement`
--
ALTER TABLE `flockmanagement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
