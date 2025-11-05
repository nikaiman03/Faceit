-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 06:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faceitsolutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `remind`
--

CREATE TABLE `remind` (
  `No` int(11) NOT NULL,
  `Name` varchar(500) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Notel` varchar(14) NOT NULL,
  `ItemRepair` varchar(500) NOT NULL,
  `ItemRepairO` varchar(200) NOT NULL,
  `DateR` date NOT NULL,
  `DateF` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `remind`
--

INSERT INTO `remind` (`No`, `Name`, `Model`, `Notel`, `ItemRepair`, `ItemRepairO`, `DateR`, `DateF`) VALUES
(1, 'Nik', 'Samsung S23 Ultra', '011 7305 5188', 'Battery Replacement', '', '2023-09-07', '2023-09-27'),
(2, 'FAUZI', ' : Samsung A30', '01173137702', 'BatteryIphone', '', '2023-09-23', '2023-10-07'),
(3, 'FAUZI', 'vivo y20', '01173055188', 'LCD Android', '', '2023-09-23', '2023-10-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remind`
--
ALTER TABLE `remind`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remind`
--
ALTER TABLE `remind`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
