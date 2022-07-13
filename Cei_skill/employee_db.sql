-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2018 at 11:34 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `stateid` int(11) NOT NULL,
  `citynam` varchar(10) NOT NULL,
  `cityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `emp_details`
--

CREATE TABLE `emp_details` (
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `empid` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hpass` varchar(32) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `stateid` varchar(2) NOT NULL,
  `cityid` varchar(2) NOT NULL,
  `gender` tinytext NOT NULL,
  `phno` bigint(11) NOT NULL,
  `inter` int(4) NOT NULL,
  `activeindi` varchar(2) NOT NULL DEFAULT 'a',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `udts` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp_details`
--

INSERT INTO `emp_details` (`fname`, `lname`, `id`, `empid`, `email`, `password`, `hpass`, `dob`, `address`, `stateid`, `cityid`, `gender`, `phno`, `inter`, `activeindi`, `admin`, `udts`) VALUES
('Amay', 'Singh', 1, 'cei2011', 'amaysingh@outlook.com', 'amaysingh', '0a886e724c21b3ea200ccc38657d4301', '1999-03-31', 'c-201, Raheja Regency, Chennai-28', '', '', 'm', 7550005994, 4312, 'a', 1, '2018-06-13 18:49:20'),
('Aakash', 'Singh', 2, 'cei2000', 'aakashsingh@outlook.com', 'aakash', 'd2a0dd3330065e226e04471bcb534095', '1999-03-31', 'c-201, Raheja Regency apts, 90 santhome high road.', '', '', 'm', 9876543210, 0, 'a', 0, '2018-06-13 23:04:00'),
('Gopinath', 'Mohan', 3, 'cei2001', 'gopi@gmail.com', 'gopinath', 'ba577f8759be11cdb591d181b732ec77', '1986-05-01', 'chennai', '', '', 'm', 9790222579, 1111, 'a', 0, '2018-06-28 16:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `eskill`
--

CREATE TABLE `eskill` (
  `id` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `skillid` int(11) NOT NULL,
  `lastused` int(4) NOT NULL,
  `exp_y` int(11) NOT NULL,
  `exp_m` int(11) NOT NULL,
  `ver` float NOT NULL,
  `activ` varchar(2) NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eskill`
--

INSERT INTO `eskill` (`id`, `eid`, `skillid`, `lastused`, `exp_y`, `exp_m`, `ver`, `activ`) VALUES
(1, 1, 1, 2005, 3, 0, 3, 'a'),
(2, 1, 2, 2009, 3, 2, 3, 'a'),
(3, 2, 1, 2001, 3, 1, 2.1, 'a'),
(4, 1, 3, 2011, 3, 6, 1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `skill`
--

CREATE TABLE `skill` (
  `skillnam` varchar(10) NOT NULL,
  `skillid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill`
--

INSERT INTO `skill` (`skillnam`, `skillid`) VALUES
('C++', 3),
('HTML', 4),
('Java', 1),
('Python', 2);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(11) NOT NULL,
  `statenam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityid`);

--
-- Indexes for table `emp_details`
--
ALTER TABLE `emp_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `empid` (`empid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `eskill`
--
ALTER TABLE `eskill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empid` (`eid`);

--
-- Indexes for table `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`skillid`),
  ADD UNIQUE KEY `skillnam` (`skillnam`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp_details`
--
ALTER TABLE `emp_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eskill`
--
ALTER TABLE `eskill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skill`
--
ALTER TABLE `skill`
  MODIFY `skillid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
