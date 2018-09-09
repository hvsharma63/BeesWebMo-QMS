-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 09:09 AM
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
  `token_time` time NOT NULL,
  `called_time` time NOT NULL,
  `called_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `call_data`
--

INSERT INTO `call_data` (`id`, `user`, `counter`, `department`, `number`, `call_status`, `call_active`, `token_date`, `token_time`, `called_time`, `called_date`) VALUES
(1, 4, 4, 2, 9, 0, 1, '2018-09-08', '03:09:26', '03:09:29', '2018-09-08'),
(2, 4, 3, 3, 2, 0, 1, '2018-09-08', '03:09:11', '03:09:31', '2018-09-08'),
(3, 4, 3, 3, 3, 0, 1, '2018-09-08', '03:09:33', '03:09:44', '2018-09-08'),
(4, 4, 2, 3, 4, 0, 1, '2018-09-08', '03:09:03', '03:09:42', '2018-09-08'),
(5, 4, 3, 2, 10, 0, 1, '2018-09-08', '03:09:12', '03:09:20', '2018-09-08'),
(6, 4, 3, 2, 11, 0, 1, '2018-09-08', '03:09:58', '03:09:05', '2018-09-08'),
(7, 4, 4, 2, 12, 0, 1, '2018-09-08', '03:09:32', '03:09:43', '2018-09-08'),
(8, 4, 3, 3, 5, 0, 1, '2018-09-08', '03:09:35', '03:09:43', '2018-09-08'),
(9, 4, 3, 3, 6, 0, 1, '2018-09-08', '04:09:12', '04:09:22', '2018-09-08'),
(10, 3, 2, 2, 13, 0, 1, '2018-09-08', '04:09:52', '04:09:03', '2018-09-08');

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
(2, 'CNT2', 0),
(3, 'CNT3', 0),
(4, 'CNT4', 0),
(5, 'CNT7', 0);

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
(2, 'BCD', 'BCD', 0, 14, 1),
(3, 'ABC', 'ABC', 0, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `display`
--

CREATE TABLE `display` (
  `id` int(11) NOT NULL,
  `token` varchar(20) NOT NULL,
  `counter` varchar(20) NOT NULL,
  `entry_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `display`
--

INSERT INTO `display` (`id`, `token`, `counter`, `entry_time`) VALUES
(1, 'ABC - 7', 'CNT3', '04:09:41'),
(2, 'BCD - 14', 'CNT6', '04:09:48');

-- --------------------------------------------------------

--
-- Table structure for table `marquee`
--

CREATE TABLE `marquee` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marquee`
--

INSERT INTO `marquee` (`id`, `title`, `size`, `color`) VALUES
(1, 'Keval', '50', '#FFFFFF');

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
  `user_status` int(11) NOT NULL DEFAULT '1' COMMENT '0-Disable; 1-Enable',
  `user_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_username`, `user_email`, `user_role`, `user_password`, `user_status`, `user_token`) VALUES
(9, 'Keval Bhogayata', 'admin', 'bhogayatakb@gmail.com', 0, '827ccb0eea8a706c4c34a16891f84e7b', 1, 'wgJ53P4DnWBVGRKqdcu0tpOQNj6oLvF8');

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
-- Indexes for table `display`
--
ALTER TABLE `display`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marquee`
--
ALTER TABLE `marquee`
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
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `display`
--
ALTER TABLE `display`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `marquee`
--
ALTER TABLE `marquee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
