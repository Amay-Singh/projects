-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 05:41 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loan_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_number` int(11) NOT NULL,
  `customer_name` tinytext NOT NULL,
  `phone_number` bigint(12) NOT NULL,
  `email` tinytext NOT NULL,
  `address` text NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_number`, `customer_name`, `phone_number`, `email`, `address`, `age`) VALUES
(5594, 'varun ramana', 9884190504, 'arunramana912@gmail.com', 'I-21 nest apartments, 9a rathna nagar,\ncenotaph road, teynampet\nChennai', 21),
(63727, 'arun ramana', 9884190504, 'arunramana912@gmail.com', 'I-21 nest apartments, 9a rathna nagar,\ncenotaph road, teynampet\nChennai', 21);

-- --------------------------------------------------------

--
-- Table structure for table `financier`
--

CREATE TABLE `financier` (
  `financier_number` int(11) NOT NULL,
  `financier_name` text NOT NULL,
  `phone_number` bigint(12) NOT NULL,
  `email` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `financier`
--

INSERT INTO `financier` (`financier_number`, `financier_name`, `phone_number`, `email`) VALUES
(17253, 'Tarun', 9884190504, 'arunramana912@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `loan_contract`
--

CREATE TABLE `loan_contract` (
  `loan_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `loan_status_code` int(11) NOT NULL,
  `contract_start` date NOT NULL,
  `contract_end` date NOT NULL,
  `interest_rate` double NOT NULL,
  `loan_amount` double NOT NULL,
  `loan_payment_amount` double NOT NULL,
  `amt_per_payment` double NOT NULL,
  `interest_type` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_contract`
--

INSERT INTO `loan_contract` (`loan_id`, `f_id`, `c_id`, `loan_status_code`, `contract_start`, `contract_end`, `interest_rate`, `loan_amount`, `loan_payment_amount`, `amt_per_payment`, `interest_type`) VALUES
(2, 17253, 63727, 0, '2020-03-03', '2020-03-05', 1, 1020, 0, 510, 'd'),
(3, 17253, 5594, 0, '2020-03-03', '2020-03-06', 1, 1030, 0, 343.333, 'd'),
(4, 17253, 63727, 2, '2020-03-03', '2020-03-04', 1, 1010, 1010, 1010, 'd'),
(5, 17253, 63727, 1, '2020-03-04', '2020-03-05', 1, 1010, 1010, 1010, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `loan_payment`
--

CREATE TABLE `loan_payment` (
  `payment_id` int(11) NOT NULL,
  `loan_id` int(11) NOT NULL,
  `date_payment` date NOT NULL,
  `amount_payment` double NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `carry_on` double NOT NULL,
  `description` text NOT NULL,
  `next_due` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_payment`
--

INSERT INTO `loan_payment` (`payment_id`, `loan_id`, `date_payment`, `amount_payment`, `paid`, `carry_on`, `description`, `next_due`) VALUES
(7, 2, '2020-03-03', 510, 0, 0, 'Start', '2020-03-03'),
(8, 3, '2020-03-03', 343.333, 0, 0, 'Start', '2020-03-03'),
(9, 3, '2020-03-03', 343.333, 1, 0, 'None', '2020-03-04'),
(10, 2, '2020-03-03', 510, 1, 0, 'None', '2020-03-04'),
(11, 2, '2020-03-04', 510, 0, 0, 'None', '2020-03-05'),
(12, 2, '2020-03-05', 1020, 1, 0, 'None', '2020-03-06'),
(13, 3, '2020-03-04', 343.333, 1, 0, 'None', '2020-03-05'),
(14, 3, '2020-03-05', 343.333, 1, 0, 'None', '2020-03-06'),
(15, 3, '2020-03-06', 343.333, 1, 0, 'None', '2020-03-07'),
(16, 3, '2020-03-07', 343.333, 1, 0, 'None', '2020-03-08'),
(17, 2, '2020-03-03', 1010, 0, 0, 'Start', '2020-03-03'),
(18, 2, '2020-03-04', 1010, 0, 0, 'Start', '2020-03-04'),
(19, 5, '0000-00-00', 1010, 1, 0, 'None', '2020-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `loan_request`
--

CREATE TABLE `loan_request` (
  `r_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `required_by` date NOT NULL,
  `interest_type` char(1) NOT NULL,
  `accepted` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loan_status`
--

CREATE TABLE `loan_status` (
  `loan_status_code` int(11) NOT NULL,
  `loan_status_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan_status`
--

INSERT INTO `loan_status` (`loan_status_code`, `loan_status_description`) VALUES
(0, 'Loan Closed'),
(1, 'Loan Active'),
(2, 'Loan Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `financer` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `financer`) VALUES
(5594, 'varun', 'c44a471bd78cc6c2fea32b9fe028d30a', 0),
(17253, 'tarun', 'c44a471bd78cc6c2fea32b9fe028d30a', 1),
(63727, 'arun', 'c44a471bd78cc6c2fea32b9fe028d30a', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_number`);

--
-- Indexes for table `financier`
--
ALTER TABLE `financier`
  ADD PRIMARY KEY (`financier_number`);

--
-- Indexes for table `loan_contract`
--
ALTER TABLE `loan_contract`
  ADD PRIMARY KEY (`loan_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `loan_status_code` (`loan_status_code`);

--
-- Indexes for table `loan_payment`
--
ALTER TABLE `loan_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `loan_id` (`loan_id`);

--
-- Indexes for table `loan_request`
--
ALTER TABLE `loan_request`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `loan_status`
--
ALTER TABLE `loan_status`
  ADD PRIMARY KEY (`loan_status_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loan_contract`
--
ALTER TABLE `loan_contract`
  MODIFY `loan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `loan_payment`
--
ALTER TABLE `loan_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `loan_request`
--
ALTER TABLE `loan_request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_status`
--
ALTER TABLE `loan_status`
  MODIFY `loan_status_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan_contract`
--
ALTER TABLE `loan_contract`
  ADD CONSTRAINT `loan_contract_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`customer_number`),
  ADD CONSTRAINT `loan_contract_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `financier` (`financier_number`),
  ADD CONSTRAINT `loan_contract_ibfk_3` FOREIGN KEY (`loan_status_code`) REFERENCES `loan_status` (`loan_status_code`);

--
-- Constraints for table `loan_payment`
--
ALTER TABLE `loan_payment`
  ADD CONSTRAINT `loan_payment_ibfk_1` FOREIGN KEY (`loan_id`) REFERENCES `loan_contract` (`loan_id`);

--
-- Constraints for table `loan_request`
--
ALTER TABLE `loan_request`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `customer` (`customer_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
