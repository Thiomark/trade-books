-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 13, 2022 at 06:53 AM
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

INSERT INTO `tblBook` (`title`, `image`, `user_id`, `description`, `isbn`, `category`, `price`, `is_available`, `shipping_price`) VALUES
('Java', 'ctext.jpeg', 6, 'The book is still in good condition..', '12344321', 'Programing', '750', 1, '0'),
('android', 'android.jpeg', 6, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n', '00001', 'category1', '1000', 1, '0'),
('c#', 'ctext.jpeg', 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n', '00002', 'category1', '1000', 1, '0'),
('kotlin', 'kotlin.jpeg', 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n', '00003', 'category1', '1000', 1, '0'),
('html', 'html.jpeg', 1, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid at blanditiis magnam atque itaque.\r\n', '00005', 'category1', '1300', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblBook`
--
ALTER TABLE `tblBook`
  ADD PRIMARY KEY (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblBook`
--
ALTER TABLE `tblBook`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
