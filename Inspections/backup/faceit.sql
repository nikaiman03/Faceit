-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2023 at 05:30 AM
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
-- Table structure for table `faceit`
--

CREATE TABLE `faceit` (
  `Inspec` varchar(40) NOT NULL,
  `No` int(5) NOT NULL,
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

INSERT INTO `faceit` (`Inspec`, `No`, `Name`, `Notel`, `Model`, `Pin`, `Date`, `Time`, `Sim`, `Bspeaker`, `Bluetooth`, `Tmic`, `Fprint`, `Gyro`, `Espeaker`, `Bhealth`, `Charging`, `Bmic`, `Body`, `Compass`, `Other`) VALUES
('', 5, ' : Nik', '011 7305 5188', ' : Samsung A30', '161103', '2023-06-27', '13:27', 'B', 'A', 'A', 'A', 'B', '', '', '', '', '', '', '', 'fsgfhghfn'),
('', 7, 'as', '011 6112 167', 'as', 'as', '2023-07-30', '12:57', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('After Repair', 8, 'Amalina', '012 440 646', 'Iphone Xr', '111100', '2023-07-31', '09:05', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'A', 'A', 'Mic kurang jelas'),
('Before Repair', 9, 'Fatimah', '12331', 'vivo y20', '123456', '2023-08-01', '11:28', 'A', 'A', 'A', 'A', 'A', 'B', 'A', 'A', 'B', 'B', 'B', 'B', 'Test jer ni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faceit`
--
ALTER TABLE `faceit`
  ADD PRIMARY KEY (`No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faceit`
--
ALTER TABLE `faceit`
  MODIFY `No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
