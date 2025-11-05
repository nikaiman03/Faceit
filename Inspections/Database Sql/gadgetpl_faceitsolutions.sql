-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2023 at 01:22 PM
-- Server version: 10.6.15-MariaDB
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gadgetpl_faceitsolutions`
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
('After Repair', 41, 'Smartfix Bertam', '01820244200', 'iPhone 11 Pro', '567407', '2023-08-16', '15:49', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'A', 'A', 'C', 'A', '1. Broken BackGlass\r\n2. Battery Health (79%)\r\n3. Screen Rosak \r\n'),
('After Repair', 42, 'Imanis ', '-', 'Iphone XS Max', '5540', '2023-08-16', '19:46', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', ''),
('After Repair', 43, 'Customer Boss', '-', 'Iphone 8 Plus ', '-', '2023-08-16', '20:30', '', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '1. Masalah Battery Drain'),
('Before Repair', 44, 'Smartfix SP', '-', 'iPhone 8 Plus', '021106', '2023-08-17', '15:00', 'A', 'A', 'A', 'A', 'A', 'A', 'B', 'A', 'A', 'A', 'A', 'A', '1. Bunyi pecah sikit'),
('Before Repair', 45, 'Azmi ', '0133321829', 'Iphone 13', '0000', '2023-08-17', '16:23', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '1. '),
('After Repair', 46, 'Smartfix Kulim', '-', 'Iphone XR ', '204051', '2023-08-18', '17:35', 'D', 'A', 'A', 'A', 'A', 'A', 'D', 'A', 'A', 'A', 'A', 'A', ''),
('After Repair', 47, 'Aniq', '017 5195546', 'Iphone XS Max', '061004', '2023-08-18', '18:10', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', ''),
('After Repair', 48, 'Smartfix SP', '-', 'iPhone 11', '010709', '2023-08-19', '08:59', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', '1. Rear Camera Pecah'),
('After Repair', 49, 'Smartfix Kulim', '-', 'Iphone 11 Pro Max', '085853', '2023-08-19', '17:03', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'A', 'A', 'A', 'A', '1. Battery Unknown Part\r\n2. Display Unknown Part\r\n'),
('Before Repair', 50, 'Smartfix Bertam (Ikhwan)', '-', 'iPhone 11', '371920', '2023-08-21', '10:55', '', 'C', 'A', 'A', 'C', 'A', 'C', 'C', 'A', 'A', 'A', 'A', '1. Face id not available\r\n2.speaker atas bawah tak function '),
('After Repair', 51, 'Lapkom', '-', 'Iphone 11 Pro Max', '150401', '2023-08-21', '14:04', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'A', ''),
('Before Repair', 52, 'Smartfix PP', '-', 'Iphone XS', '5555', '2023-08-21', '11:18', '', 'A', 'A', '', '', 'A', '', '', 'A', 'A', 'A', 'A', ''),
('After Repair', 53, 'Azri ', '0125954069', 'Iphone 13 ', '985212', '2023-08-22', '15:08', 'A', 'A', 'A', 'A', 'C', 'A', 'A', 'A', 'A', 'A', 'A', 'C', '\r\n2. Face ID Disable (TrueDepth)\r\n3. Compass tak function'),
('After Repair', 54, 'Hafiz', '013 503 4562', 'Iphone 11 Pro Max', '323436', '2023-08-23', '10:33', 'A', 'A', 'A', 'A', 'A', 'A', 'A', 'D', 'A', 'A', 'A', 'A', '1. Battery Unknown Part\r\n2. Vol (-) x function'),
('After Repair', 55, 'Smartfix SP', '-', 'Iphone X', '192004', '2023-08-23', '12:06', '', 'A', '', '', '', '', 'C', 'C', 'A', '', '', '', '1. Pasang Earpiece pun jadi stuck logo \r\n2. Battery Health (72%) -Service\r\n3. '),
('Before Repair', 56, 'Smartfix Bertam (Afiq)', '-', 'iPhone 11', '-', '2023-08-23', '14:57', 'A', 'A', '', 'A', '', '', 'A', '', 'A', 'A', 'A', '', '1. LCD Blank\r\n2. Camera belakang kabur'),
('After Repair', 57, 'Smartfix SP (Faizal)', '-', 'IP Xs', '844848', '2023-08-24', '09:31', 'C', 'A', 'A', 'A', 'C', 'A', 'A', 'C', 'A', 'A', 'A', 'A', '1. Face Id Truedepth\r\n\r\n2. Battery dia kadang2 gila. Sat2 ok 86%, sat2 unkown part\r\n\r\n3. Panic full semua naik TG0B\r\n\r\n4. Sim pasang no service, x pasang pn sama no service.\r\n\r\n5. lcd blank\r\n'),
('Before Repair', 58, 'Smartfix Bertam', '-', 'iPhone 11 Pro', '423400', '2023-08-25', '15:34', 'C', 'A', 'C', 'C', 'C', 'A', 'C', 'A', 'A', 'A', 'B', 'A', '1. LCD Blank\r\n2. Mobile data Error (Simcard problem)\r\n3. Wifi Problem\r\n4. Bluetooth Problem \r\n5. Camera depan belakang blank\r\n6. Microphone depan belakang takboleh check\r\n7. face id - camera blank\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(200) NOT NULL,
  `user_id` bigint(110) NOT NULL,
  `user_name` varchar(400) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`) VALUES
(0, 921450700, 'Faceit Admin', 'faceitsolutions123', '2023-08-25 15:08:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faceit`
--
ALTER TABLE `faceit`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faceit`
--
ALTER TABLE `faceit`
  MODIFY `No` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
