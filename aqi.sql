-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2025 at 08:29 AM
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
-- Database: `aqi`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `city`, `country`) VALUES
(1, 'Dhaka', 'Bangladesh'),
(2, 'New York', 'USA'),
(3, 'Tokyo', 'Japan'),
(4, 'London', 'UK'),
(5, 'Paris', 'France'),
(6, 'Berlin', 'Germany'),
(7, 'Toronto', 'Canada'),
(8, 'Sydney', 'Australia'),
(9, 'Rome', 'Italy'),
(10, 'Madrid', 'Spain'),
(11, 'Moscow', 'Russia'),
(12, 'Cairo', 'Egypt'),
(13, 'Beijing', 'China'),
(14, 'Seoul', 'South Korea'),
(15, 'Mumbai', 'India'),
(16, 'Bangkok', 'Thailand'),
(17, 'Kuala Lumpur', 'Malaysia'),
(18, 'Dubai', 'UAE'),
(19, 'Nairobi', 'Kenya'),
(20, 'Istanbul', 'Turkey');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
