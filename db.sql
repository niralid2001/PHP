-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 02:21 PM
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
(7, 'pizza');

-- --------------------------------------------------------

--
-- Table structure for table `crud`
--

CREATE TABLE `crud` (
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

INSERT INTO `crud` (`id`, `name`, `age`, `gender`, `hobbies`, `city`, `file`) VALUES
(95, 'hiii', 34, 'male', 'playing,singing', 'ahemdabad', 'Chrysanthemum1658923560.jpg,Desert1658923560.jpg'),
(96, 'earth', 22, 'male', 'singing,dancing', 'surat', 'Hydrangeas1658923580.jpg,Koala1658923580.jpg'),
(97, 'hello', 24, 'female', 'singing', 'vadodra', 'Penguins1658923606.jpg,Tulips1658923606.jpg'),
(98, 'jellyfish', 45, 'female', 'dancing', 'ahemdabad', 'Jellyfish1658923631.jpg'),
(101, 'land', 24, 'female', 'singing,dancing', 'surat', 'Chrysanthemum1658924328.jpg,Tulips1658924328.jpg');

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
