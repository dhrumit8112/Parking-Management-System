-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 05:28 PM
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
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `allcars`
--

CREATE TABLE `allcars` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `CarCompanyName` varchar(255) NOT NULL,
  `OwnerName` varchar(255) NOT NULL,
  `NumberPlate` varchar(50) NOT NULL,
  `MobileNumber` varchar(10) NOT NULL,
  `EnteringDateTime` datetime DEFAULT NULL,
  `LeavingDateTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allcars`
--

INSERT INTO `allcars` (`id`, `username`, `CarCompanyName`, `OwnerName`, `NumberPlate`, `MobileNumber`, `EnteringDateTime`, `LeavingDateTime`) VALUES
(1, 'me', 'Audi', 'me', 'DL11AA1111', '9876543210', '2023-07-12 20:43:46', '2023-07-12 20:57:45'),
(2, 'me', 'BMW', 'me', 'AB12CD3456', '9876543210', '2023-07-12 20:47:42', NULL),
(3, 'rahul', 'Swift', 'rahul', 'ZX65CV7895', '9898989898', '2023-07-12 20:48:55', NULL),
(4, 'rohit', 'Kia', 'rohit', 'AS98DF6543', '9797979797', '2023-07-12 20:50:34', '2023-07-12 20:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `currentlyin`
--

CREATE TABLE `currentlyin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `CarCompanyName` varchar(255) NOT NULL,
  `OwnerName` varchar(255) NOT NULL,
  `NumberPlate` varchar(50) NOT NULL,
  `MobileNumber` varchar(10) NOT NULL,
  `EnteringDateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currentlyin`
--

INSERT INTO `currentlyin` (`id`, `username`, `CarCompanyName`, `OwnerName`, `NumberPlate`, `MobileNumber`, `EnteringDateTime`) VALUES
(2, 'me', 'BMW', 'me', 'AB12CD3456', '9876543210', '2023-07-12 20:47:42'),
(3, 'rahul', 'Swift', 'rahul', 'ZX65CV7895', '9898989898', '2023-07-12 20:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('admin', 'admin@admin.com', 'admin@123'),
('me', 'me@gamil.com', 'me@123'),
('rahul', 'rahul@gmail.com', 'rahul@123'),
('rohit', 'rohit@gmail.com', 'rohit@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allcars`
--
ALTER TABLE `allcars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currentlyin`
--
ALTER TABLE `currentlyin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allcars`
--
ALTER TABLE `allcars`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `currentlyin`
--
ALTER TABLE `currentlyin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
