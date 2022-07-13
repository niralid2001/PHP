-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 02:15 PM
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
(6, 'ice-cream');

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
  `file` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud`
--

INSERT INTO `crud` (`id`, `name`, `age`, `gender`, `hobbies`, `city`, `file`) VALUES
(1, 'hiii', 11, 'male', 'playing,singing,', 'vadodra', 'umiya temple.jpeg1657618650'),
(2, 'hello', 12, 'female', 'playing,singing,dancing,', 'surat', 'ma umiya.jpeg1657618688'),
(3, 'world', 13, 'male', 'playing,', 'ahemdabad', 'linkedin.jpg1657618738'),
(4, 'earth', 14, 'female', 'dancing,', 'rajkot', 'admin dashboard.jpg1657618794'),
(5, 'flower', 15, 'male', 'singing,', 'ahemdabad', 'Tulips.jpg1657618864'),
(6, 'koala', 15, 'male', 'playing,dancing,', 'ahemdabad', 'Koala.jpg1657618904'),
(7, 'red flower', 16, 'female', 'singing,', 'vadodra', 'Chrysanthemum.jpg1657618942'),
(8, 'jellyfish', 17, 'female', 'playing,', 'surat', 'Jellyfish.jpg1657618985'),
(9, 'desert', 18, 'male', 'playing,dancing,', 'surat', 'Desert.jpg1657619019'),
(10, 'penguins', 19, 'male', 'playing,dancing,', 'rajkot', 'Penguins.jpg1657619084'),
(11, 'bell off', 20, 'female', 'singing,', 'ahemdabad', 'off.png1657619131'),
(12, 'bell on', 20, 'female', 'singing,', 'ahemdabad', 'on.png1657619159');

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
(11, 3, 'red velvate', 550, 'decilious', 'upload/images.jpg');

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
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `crud`
--
ALTER TABLE `crud`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
