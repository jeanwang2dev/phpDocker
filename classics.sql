-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Generation Time: Jul 16, 2019 at 02:09 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `classics`
--

CREATE TABLE `classics` (
  `author` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `category` varchar(16) DEFAULT NULL,
  `year` smallint(6) DEFAULT NULL,
  `isbn` char(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classics`
--

INSERT INTO `classics` (`author`, `title`, `category`, `year`, `isbn`) VALUES
('Charles Dickens', 'Little Dorrit', 'Fiction', 1857, '9780141439969'),
('Mark Twain', 'The Adventures of Tom Sawyer', 'Fiction', 1876, '9780141439206'),
('Jane Austen', 'Pride and Prejudice', 'Fiction', 1811, '9780141439201'),
('Charles Darwin', 'The Origin of Species', 'Non-Fiction', 1856, '9780131439968'),
('William Shakespeare', 'Romeo and Juliet', 'Play', 1594, '9780131439474');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classics`
--
ALTER TABLE `classics`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `author` (`author`(20)),
  ADD KEY `title` (`title`(20)),
  ADD KEY `title_2` (`title`(20)),
  ADD KEY `category` (`category`(4)),
  ADD KEY `year` (`year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
