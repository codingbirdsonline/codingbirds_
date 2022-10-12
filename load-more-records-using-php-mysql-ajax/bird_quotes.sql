-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2022 at 12:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingbirds`
--

-- --------------------------------------------------------

--
-- Table structure for table `bird_quotes`
--

CREATE TABLE `bird_quotes` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `author` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bird_quotes`
--

INSERT INTO `bird_quotes` (`id`, `quote`, `author`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Source Title');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bird_quotes`
--
ALTER TABLE `bird_quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bird_quotes`
--
ALTER TABLE `bird_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
