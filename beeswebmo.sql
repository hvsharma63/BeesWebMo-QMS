-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2018 at 09:34 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beeswebmo`
--

-- --------------------------------------------------------

--
-- Table structure for table `call_data`
--

CREATE TABLE `call_data` (
  `id` int(30) NOT NULL,
  `user` int(20) NOT NULL,
  `counter` int(30) NOT NULL,
  `department` int(11) NOT NULL,
  `number` int(20) NOT NULL,
  `call_status` int(11) NOT NULL DEFAULT '-1' COMMENT '0 Served. 1 Missed',
  `call_active` int(11) NOT NULL DEFAULT '1' COMMENT '0 inactive. 1 enable',
  `token_date` date NOT NULL,
  `token_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `call_data`
--

INSERT INTO `call_data` (`id`, `user`, `counter`, `department`, `number`, `call_status`, `call_active`, `token_date`, `token_time`) VALUES
(4, 2, 1, 1, 7, 0, 1, '2018-09-01', '05:09:26'),
(5, 2, 1, 1, 8, 0, 1, '2018-09-01', '10:09:09'),
(6, 2, 1, 1, 9, 0, 1, '2018-09-01', '10:09:47'),
(7, 1, 1, 2, 0, 0, 1, '2018-09-01', '10:09:42'),
(8, 2, 1, 1, 10, 0, 1, '2018-09-01', '10:09:47'),
(9, 2, 1, 2, 1, 1, 1, '2018-09-01', '10:09:43'),
(10, 2, 1, 1, 11, 0, 1, '2018-09-03', '09:09:57'),
(11, 0, 0, 2, 2, -1, 1, '2018-09-03', '09:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(500) NOT NULL,
  `company_logo` varchar(500) NOT NULL,
  `company_phone` int(30) NOT NULL,
  `company_email` varchar(50) NOT NULL,
  `company_address` text NOT NULL,
  `company_location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `counter_name` varchar(500) NOT NULL,
  `counter_status` int(30) NOT NULL DEFAULT '0' COMMENT '0 Default. 1 Delete'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `counter_name`, `counter_status`) VALUES
(1, 'CNT1', 0),
(2, 'CNT2', 0),
(3, 'CNT3', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(500) NOT NULL,
  `department_label` varchar(500) NOT NULL,
  `today_start` int(30) NOT NULL,
  `next_entry` int(11) NOT NULL DEFAULT '1',
  `department_active` int(11) NOT NULL DEFAULT '1' COMMENT '0 inactive. 1 enable'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `department_label`, `today_start`, `next_entry`, `department_active`) VALUES
(1, 'ABC', 'ABC', 0, 12, 1),
(2, 'BCD', 'BCD', 0, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_role` int(11) NOT NULL COMMENT '0-Admin; 1-staff',
  `user_password` varchar(50) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '0-Disable; 1-Enable'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_username`, `user_email`, `user_role`, `user_password`, `user_status`) VALUES
(1, 'Keval', 'Keval', 'bhogayatakb@gmail.com', 0, '12345', 1),
(2, 'Ishan', 'Ishan', 'iubhatt17@gmail.com', 1, '12345', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `call_data`
--
ALTER TABLE `call_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `call_data`
--
ALTER TABLE `call_data`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
