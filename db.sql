-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2022 at 01:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(3, 'cakes'),
(4, 'cookies'),
(5, 'cold-drinks'),
(6, 'ice-cream'),
(7, 'pizza'),
(8, 'snacks');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
  `log_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `hobbies` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `file` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`log_id`, `id`, `name`, `age`, `gender`, `hobbies`, `city`, `file`) VALUES
(3, 158, 'rrt', 66, 'female', 'singing', 'rajkot', NULL),
(2, 159, 'yyyyyy', 99, 'female', 'singing', 'surat', NULL),
(3, 160, 'rtyu', 11, 'female', 'playing,singing', 'ahemdabad', NULL),
(1, 161, 'hiiii', 33, 'male', 'playing', 'rajkot', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `csv`
--

CREATE TABLE `csv` (
  `emp_id` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `reg_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `csv`
--

INSERT INTO `csv` (`emp_id`, `firstname`, `lastname`, `email`, `reg_date`) VALUES
('101', 'hii', 'heloo', '123@gmail.com', '14-Jul-22'),
('102', 'world', 'hiii', 'world@gmail.com', '15-Jul-22'),
('103', 'india', 'ind', 'india@gmail.com', '13-Aug-22'),
('104', 'russia', 'rus', 'russia@gmail.com', '22-Oct-19'),
('105', 'china', 'chi', 'china@gmail.com', '01-Jan-01'),
('106', 'america', 'usa', 'america@gmail.com', '02-Jun-02'),
('107', 'england', 'eng', 'eng@gmail.com', '30-Apr-22'),
('108', 'pak', 'pak', 'pak@gmail.com', '25-Dec-21'),
('109', 'shri-lanka', 'slnk', 'slnk@gmail.com', '26-Apr-18'),
('200', 'dubai', 'dub', 'dun@gmail.com', '05-Sep-30');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `github` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `email`, `password`, `twitter`, `github`, `website`, `firstname`, `lastname`, `phone`) VALUES
(39, 'user@gmail.com', '12344', 'twitter.com', 'githun.com', 'https://website.com', 'hiii', 'hello', 1234567890),
(40, 'user@gmail.com', '12345', 'twitter.com', 'githun.com', 'https://website.com', 'hiii', 'hello', 1234567895),
(41, 'user@gmail.com', '1234', 'twitter.com', 'githun.com', 'https://website.com', 'hiii', 'hello', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admintype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `email`, `password`, `admintype`) VALUES
(1, 'admin1@gmail.com', '123', 'admin1'),
(2, 'admin2@gmail.com', '456', 'admin2'),
(3, 'superadmin@gmail.com', '123456', 'superadmin');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proid` int(10) NOT NULL,
  `catid` int(10) NOT NULL,
  `proname` varchar(1000) NOT NULL,
  `proprice` int(10) NOT NULL,
  `prodesc` varchar(1000) NOT NULL,
  `proimg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proid`, `catid`, `proname`, `proprice`, `prodesc`, `proimg`) VALUES
(11, 3, 'red velvate', 550, 'decilious', 'upload/images.jpg'),
(12, 3, 'oreo', 300, 'tastfully....!', 'upload/images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `table_file`
--

CREATE TABLE `table_file` (
  `file_id` int(10) NOT NULL,
  `file` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_file`
--

INSERT INTO `table_file` (`file_id`, `file`) VALUES
(4, 'Jellyfish1660128393.jpg,Koala1660128393.jpg'),
(5, 'Chrysanthemum1660128971.jpg,Desert1660128971.jpg'),
(6, 'Tulips1660129058.jpg'),
(7, 'Jellyfish1660129771.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `crud`
--
ALTER TABLE `crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csv`
--
ALTER TABLE `csv`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `table_file`
--
ALTER TABLE `table_file`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `table_file`
--
ALTER TABLE `table_file`
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
