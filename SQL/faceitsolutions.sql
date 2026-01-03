-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2026 at 02:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.14

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
-- Table structure for table `faceit`
--

CREATE TABLE `faceit` (
  `No` int(5) NOT NULL,
  `Inspec` varchar(50) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Notel` varchar(17) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `Pin` varchar(20) NOT NULL,
  `Date` varchar(15) NOT NULL,
  `Time` varchar(15) NOT NULL,
  `Sim` char(2) NOT NULL,
  `Bspeaker` char(2) NOT NULL,
  `Bluetooth` char(2) NOT NULL,
  `Tmic` char(2) NOT NULL,
  `Fprint` char(2) NOT NULL,
  `Gyro` varchar(10) NOT NULL,
  `Espeaker` char(2) NOT NULL,
  `Bhealth` char(2) NOT NULL,
  `Charging` char(2) NOT NULL,
  `Bmic` char(2) NOT NULL,
  `Body` char(2) NOT NULL,
  `Compass` varchar(10) NOT NULL,
  `Other` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faceit`
--

INSERT INTO `faceit` (`No`, `Inspec`, `Name`, `Notel`, `Model`, `Pin`, `Date`, `Time`, `Sim`, `Bspeaker`, `Bluetooth`, `Tmic`, `Fprint`, `Gyro`, `Espeaker`, `Bhealth`, `Charging`, `Bmic`, `Body`, `Compass`, `Other`) VALUES
(5, '', ' : Nik', '011 7305 5188', ' : Samsung A30', '161103', '2023-06-27', '13:27', 'B', 'A', 'A', 'A', 'B', '', '', '', '', '', '', '', 'fsgfhghfn'),
(7, '', 'as', '011 6112 167', 'as', 'as', '2023-07-30', '12:57', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 'Before Repair', 'Aminah', '01115471125', 'Samasung Pixel 71 Pr', '099090', '2026-01-03', '20:45', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', ''),
(10, 'After Repair', 'ramly', '011543748', 'realme c21', '000000', '2026-01-02', '09:00', 'C', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '52852528528529yghnmjk,l;');

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
(3, 'FAUZI', 'vivo y20', '01173055188', 'LCD Android', '', '2023-09-23', '2023-10-23'),
(4, 'rokiah', 'realme c21', '0117856473', 'Battery Android', '', '2026-01-03', '2026-01-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_name` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_name`, `password`) VALUES
('aiman', 'kuat161103'),
('cekenani', '$2y$12$T5eVSjNAu1yWUnZeoHBaAOBzy5ngZJwpI.jBTVJ9rucD57N.NPADy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faceit`
--
ALTER TABLE `faceit`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `remind`
--
ALTER TABLE `remind`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faceit`
--
ALTER TABLE `faceit`
  MODIFY `No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `remind`
--
ALTER TABLE `remind`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
