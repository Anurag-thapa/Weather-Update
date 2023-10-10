-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 03:46 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weather-app-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `weather_table`
--

CREATE TABLE `weather_table` (
  `weather_id` int(255) NOT NULL,
  `temprature` float NOT NULL,
  `wind_speed` varchar(25) NOT NULL,
  `wind_direction` varchar(25) NOT NULL,
  `precipitation` float NOT NULL,
  `city_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weather_table`
--

INSERT INTO `weather_table` (`weather_id`, `temprature`, `wind_speed`, `wind_direction`, `precipitation`, `city_id`) VALUES
(26, 12, '665', 'NORTH-EAST', 54, 1),
(27, 12, '665', 'NORTH-EAST', 54, 1),
(28, 12, '665', 'NORTH-EAST', 54, 1),
(29, 12, '665', 'NORTH-EAST', 54, 1),
(30, 12, '665', 'NORTH-EAST', 54, 1),
(31, 12, '665', 'NORTH-EAST', 54, 1),
(32, 12, '665', 'NORTH-EAST', 54, 1),
(33, 12, '665', 'NORTH-EAST', 54, 1),
(34, 12, '665', 'NORTH-EAST', 54, 1),
(35, 12, '665', 'NORTH-EAST', 54, 1),
(36, 12, '665', 'NORTH-EAST', 54, 1),
(37, 12, '665', 'NORTH-EAST', 54, 1),
(38, 12, '665', 'NORTH-EAST', 54, 1),
(39, 12, '665', 'NORTH-EAST', 54, 1),
(40, 12, '665', 'NORTH-EAST', 54, 1),
(41, 11, '231', 'SOUTH-EAST', 23, 1),
(42, 11, '231', 'SOUTH-EAST', 23, 1),
(43, 11, '231', 'SOUTH-EAST', 23, 1),
(44, 11, '231', 'SOUTH-EAST', 23, 1),
(45, 11, '231', 'SOUTH-EAST', 23, 1),
(46, 11, '231', 'SOUTH-EAST', 23, 1),
(47, 11, '231', 'SOUTH-EAST', 23, 1),
(48, 11, '231', 'SOUTH-EAST', 23, 1),
(49, 11, '231', 'SOUTH-EAST', 23, 1),
(50, 11, '231', 'SOUTH-EAST', 23, 1),
(51, 11, '231', 'SOUTH-EAST', 23, 1),
(52, 11, '231', 'SOUTH-EAST', 23, 1),
(53, 11, '231', 'SOUTH-EAST', 23, 1),
(54, 11, '231', 'SOUTH-EAST', 23, 1),
(55, 11, '231', 'SOUTH-EAST', 23, 1),
(56, 11, '231', 'SOUTH-EAST', 23, 1),
(58, 0.02, '0.54', 'SOUTH', 0.05, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `weather_table`
--
ALTER TABLE `weather_table`
  ADD PRIMARY KEY (`weather_id`),
  ADD KEY `city_id` (`city_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `weather_table`
--
ALTER TABLE `weather_table`
  MODIFY `weather_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `weather_table`
--
ALTER TABLE `weather_table`
  ADD CONSTRAINT `FK_WEATHER_CITY_ID` FOREIGN KEY (`city_id`) REFERENCES `city_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
