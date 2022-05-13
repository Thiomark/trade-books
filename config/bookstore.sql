-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 13, 2022 at 06:56 AM
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
-- Table structure for table `tblBook`
--

CREATE TABLE `tblBook` (
  `book_id` int(11) NOT NULL,
  `title` varchar(400) NOT NULL,
  `image` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipping_price` decimal(10,0) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblBook`
--

INSERT INTO `tblBook` (`book_id`, `title`, `image`, `user_id`, `description`, `isbn`, `category`, `price`, `is_available`, `created_on`, `shipping_price`) VALUES
(1, 'Java', 'ctext.jpeg', 6, 'The book is still in good condition..', '12344321', 'Programing', '750', 1, '2022-05-12 10:15:26', '0'),
(2, 'android', 'android.jpeg', 6, '                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n            ', '00001', 'category1', '1000', 1, '2022-05-13 08:20:11', '0'),
(3, 'c#', 'ctext.jpeg', 1, '                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n            ', '00002', 'category1', '1000', 1, '2022-05-13 08:43:44', '0'),
(4, 'kotlin', 'kotlin.jpeg', 1, '                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n            ', '00003', 'category1', '1000', 1, '2022-05-13 08:45:07', '0'),
(5, 'html', 'html.jpeg', 1, '                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n            ', '00005', 'category1', '1300', 1, '2022-05-13 08:45:39', '0');

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
-- Indexes for table `tblBook`
--
ALTER TABLE `tblBook`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tblUser`
--
ALTER TABLE `tblUser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblBook`
--
ALTER TABLE `tblBook`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblUser`
--
ALTER TABLE `tblUser`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
