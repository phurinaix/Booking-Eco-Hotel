-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 10:09 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_room`
--

CREATE TABLE `booking_room` (
  `booking_room_id` int(10) NOT NULL,
  `room` varchar(2) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_room`
--

INSERT INTO `booking_room` (`booking_room_id`, `room`, `start_date`, `end_date`, `username`) VALUES
(22, '1A', '2018-11-29 00:00:00', '2018-12-02 00:00:00', 'dsf'),
(28, '1A', '2018-12-04 00:00:00', '2018-12-06 00:00:00', 'dsf'),
(29, '1A', '2018-12-12 00:00:00', '2018-12-13 00:00:00', 'dsf'),
(30, '2A', '2018-11-29 00:00:00', '2018-12-02 00:00:00', 'dsf'),
(32, '2A', '2018-12-04 00:00:00', '2019-01-05 00:00:00', 'dsf'),
(33, '1C', '2018-11-29 00:00:00', '2018-11-30 00:00:00', 'abcde@gmail.com'),
(34, '2C', '2018-11-29 00:00:00', '2018-11-30 00:00:00', 'abcde@gmail.com'),
(35, '1B', '2018-11-29 00:00:00', '2018-11-30 00:00:00', 'q@gmail.com'),
(36, '1D', '2018-11-29 00:00:00', '2018-11-30 00:00:00', 'q@gmail.com'),
(37, '1A', '2019-02-15 00:00:00', '2019-03-21 00:00:00', 'q@gmail.com'),
(39, '1B', '2018-12-26 00:00:00', '2018-12-28 00:00:00', 'tuteazone111@hotmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`) VALUES
(1, 'fook', 'fook@gmail.com', '$2y$10$OrFE/nCMInHFf4YYVR2d7uoIczpDJU0Zt4ULGB6QY2AGV8I6ThjaS'),
(2, 'fook', 'fook123@gmail.com', '$2y$10$tun5xhWJlhhr0uUTiGbpOe/K2iV372NfqnBiOUpT51WDMm.0v7Yri'),
(3, 'abc', 'abc123@gmail.com', '$2y$10$9mNWnwkGhBEpI7Pmv0tRhe3HfHfgujiDn7I/USYC6YyaYB.qj9mKu'),
(4, 'abcd', 'abcd@gmail.com', '$2y$10$.jlnn66y22IdpyCfz1IHhunK8PFHeXy7/5aY39Bu0lHYeyIxufshW'),
(5, 'abcde', 'abcde@gmail.com', '$2y$10$0ZlIqDxQ1JPsaj2TG5XAROPtYvnTx1CDNaOfmtusDuyZUUvL4wOU2'),
(6, 'qwe', 'q@gmail.com', '$2y$10$r8rsaD/dnvq/IqDfsHvhuO4gL55vq.Z51.pmnBXD4QIkFnfcyYmCK'),
(7, 'abc', 'tuteazone111@hotmail.com', '$2y$10$NtmMgzZyhHX6BGkewXaPxuLaMlSMWicOh8Ez3wy62g2ETqVJPt.jG'),
(8, 'test', 'test@gmail.com', '$2y$10$5KcOAmXfQMtvLVcL.O/xt.yL14xhw3yzuiwrNr8QtnDkwRgtYkypW');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(10) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_number` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `room_number`) VALUES
(1, 'dormitory', '1A'),
(2, 'dormitory', '2A'),
(3, 'suite', '1B'),
(4, 'suite', '2B'),
(5, 'mini-suite', '1C'),
(6, 'mini-suite', '2C'),
(7, 'superior', '1D'),
(8, 'superior', '2D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_room`
--
ALTER TABLE `booking_room`
  ADD PRIMARY KEY (`booking_room_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_room`
--
ALTER TABLE `booking_room`
  MODIFY `booking_room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
