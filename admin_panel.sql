-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 10:04 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `complaint_id` int(11) NOT NULL,
  `e_id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `i_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`complaint_id`, `e_id`, `username`, `i_id`, `date`, `status`) VALUES
(41, 20, 'User', 5, '2021-06-01', 'processing'),
(40, 20, 'User', 7, '2021-05-31', 'resolved'),
(38, 23, 'User4', 2, '2021-09-19', 'processing'),
(39, 20, 'User', 4, '2021-05-31', 'New'),
(37, 22, 'User3', 6, '2021-05-31', 'resolved'),
(36, 21, 'User2', 4, '2021-05-31', 'processing'),
(35, 21, 'User2', 6, '2021-09-19', 'processing'),
(42, 20, 'User', 3, '2021-06-08', 'New'),
(43, 19, 'Admin2', 2, '2021-06-08', 'processing'),
(44, 20, 'User', 7, '2021-09-12', 'New'),
(45, 20, 'User', 6, '2021-09-12', 'New'),
(46, 20, 'User', 1, '2021-09-12', 'New'),
(47, 20, 'User', 2, '2021-09-12', 'New'),
(48, 21, 'User2', 1, '2021-09-12', 'New'),
(49, 21, 'User2', 2, '2021-09-19', 'resolved'),
(50, 21, 'User2', 3, '2021-09-19', 'resolved'),
(51, 22, 'User3', 3, '2021-09-19', 'resolved'),
(52, 26, 'User5', 1, '2021-09-18', 'resolved');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `S.NO` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`S.NO`, `email`, `contact`, `message`, `dt`) VALUES
(1, 'abc@gmail.com', '981', 'vbiohpojpojiljuhu', '2021-09-11'),
(2, 'def@gmail.com', '671', 'bhfsrgbjkdfgbjdgotdkgjti', '2021-09-11'),
(3, 'qwe@abc.com', '981-563-506', 'nd jgnkdgoktnktnb', '2021-09-11');

-- --------------------------------------------------------

--
-- Table structure for table `item-list`
--

CREATE TABLE `item-list` (
  `i_id` int(20) NOT NULL,
  `i_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item-list`
--

INSERT INTO `item-list` (`i_id`, `i_name`) VALUES
(1, 'CPU'),
(2, 'Monitor'),
(3, 'Printer'),
(4, 'Scanner'),
(5, 'Keyboard'),
(6, 'Mouse'),
(7, 'Ethernet');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `S.no` int(50) NOT NULL,
  `e_id` int(20) NOT NULL,
  `status_from` varchar(20) NOT NULL,
  `status_to` varchar(20) NOT NULL,
  `status_by` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`S.no`, `e_id`, `status_from`, `status_to`, `status_by`, `date`) VALUES
(1, 21, 'New', 'processing', 'admin2@gmail.com', '2021-05-31'),
(2, 22, 'resolved', 'resolved', 'admin2@gmail.com', '2021-05-31'),
(3, 21, 'resolved', 'New', 'admin2@gmail.com', '2021-05-31'),
(4, 23, 'processing', 'New', 'admin2@gmail.com', '2021-05-31'),
(5, 22, 'processing', 'resolved', 'admin@gmail.com', '2021-05-31'),
(6, 21, 'processing', 'New', 'admin@gmail.com', '2021-05-31'),
(7, 21, 'resolved', 'processing', 'admin@gmail.com', '2021-05-31'),
(8, 22, 'resolved', 'processing', 'admin@gmail.com', '2021-05-31'),
(9, 22, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(10, 23, 'resolved', 'processing', 'admin@gmail.com', '2021-05-31'),
(11, 23, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(12, 21, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(13, 21, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(14, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-05-31'),
(15, 20, 'New', 'processing', 'admin@gmail.com', '2021-05-31'),
(16, 20, 'processing', 'resolved', 'admin@gmail.com', '2021-05-31'),
(17, 20, 'resolved', 'New', 'admin@gmail.com', '2021-05-31'),
(18, 20, 'New', 'resolved', 'admin@gmail.com', '2021-05-31'),
(19, 20, 'New', 'processing', 'admin@gmail.com', '2021-06-01'),
(20, 20, 'processing', 'resolved', 'admin@gmail.com', '2021-06-01'),
(21, 20, 'resolved', 'New', 'admin@gmail.com', '2021-06-01'),
(22, 20, 'New', 'New', 'admin@gmail.com', '2021-06-08'),
(23, 20, 'New', 'processing', 'admin@gmail.com', '2021-06-08'),
(24, 19, 'New', 'processing', 'admin@gmail.com', '2021-06-08'),
(25, 22, 'resolved', 'processing', 'admin2@gmail.com', '2021-09-19'),
(26, 21, 'resolved', 'processing', 'admin2@gmail.com', '2021-09-19'),
(27, 21, 'resolved', 'resolved', 'admin2@gmail.com', '2021-09-19'),
(28, 22, 'resolved', 'resolved', 'admin2@gmail.com', '2021-09-19'),
(29, 22, 'resolved', 'resolved', 'admin2@gmail.com', '2021-09-19'),
(30, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(31, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(32, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(33, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(34, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(35, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(36, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(37, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(38, 22, 'resolved', 'resolved', 'admin@gmail.com', '2021-09-19'),
(39, 22, 'resolved', 'resolved', 'admin2@gmail.com', '2021-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `empid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`empid`, `username`, `email`, `password`, `dept`, `usertype`, `created`) VALUES
(22, 'User3', 'user3@gmail.com', 'user3', '', 'user', '2021-08-03'),
(20, 'User', 'user@gmail.com', 'user', '', 'user', '2021-08-03'),
(21, 'User2', 'user2@gmail.com', 'user2', '', 'admin', '2021-08-03'),
(19, 'Admin2', 'admin2@gmail.com', 'admin2', '', 'admin', '2021-08-03'),
(18, 'Admin', 'admin@gmail.com', 'admin', '', 'admin', '2021-08-03'),
(23, 'User4', 'user4@gmail.com', 'user4', '', 'user', '2021-08-03'),
(24, '$2y$10$kKR6fARFmLjw3P5WKWSYSOcVaKlB72gWR2ATvfy6UfJ', 'user5@abc.com', 'user5@abc.com', 'Sales', '', '2021-09-10'),
(25, 'User6', 'def@gmail.com', '$2y$10$9GUUzSi9ZFVF.0IIq93LIu9rR/.5I46lvmgHCxKo66j', 'Marketing', 'admin', '2021-09-10'),
(26, 'User5', 'user5@gmail.com', 'user5', 'Marketing', 'user', '2021-09-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`S.NO`);

--
-- Indexes for table `item-list`
--
ALTER TABLE `item-list`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`S.no`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`empid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `S.NO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item-list`
--
ALTER TABLE `item-list`
  MODIFY `i_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `S.no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `empid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
