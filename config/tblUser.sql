-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 13, 2022 at 06:55 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblUser`
--

CREATE TABLE `tblUser` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `student_number` varchar(255) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblUser`
--

INSERT INTO `tblUser` (`user_id`, `username`, `password`, `role`, `created_on`, `student_number`, `is_approved`, `name`) VALUES
(1, 'itumeleng', '$2y$10$ERoBYMtWb1csHNJc2sjgQOngARKSa/hcrO3gruiaSo/Ad/5.jV0yG', 'student', '2022-05-13 06:38:59', 'ST10120001', 1, 'Itumeleng Doe'),
(2, 'johnny', '$2y$10$ZqYFFLsK2j.PgQo8a86j9uSY9X8PKXX8OV.mEc2DaJk4YwMohGGBO', 'student', '2022-05-13 06:38:59', 'ST10120002', 0, 'John Doe'),
(3, 'jean', '$2y$10$//43ZPinpVABncAS8W/iO.Iov79equBKkIuQFEPcyYL2WOJ7aP9G2', 'student', '2022-05-13 06:38:59', 'ST10120003', 0, 'Jean Doe'),
(4, 'j_wick', '$2y$10$Du8iNlH9.gm2gMRgIjOWOOo9DGX2mgJJcY9g1E2Rf0G/WWjvwAjyi', 'student', '2022-05-13 06:38:59', 'ST10120004', 0, 'John Wick'),
(5, 'ironman', '$2y$10$kXNdpKWzKBRZ1dsCW7hxOelpq8UWlhW7qR4LxrLC4nU4Fu4D8znM2', 'student', '2022-05-13 06:38:59', 'ST10120005', 0, 'Tony Stack');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblUser`
--
ALTER TABLE `tblUser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblUser`
--
ALTER TABLE `tblUser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
