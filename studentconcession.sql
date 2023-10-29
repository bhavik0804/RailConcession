-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 11:20 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentconcession`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `p_id` int(11) NOT NULL,
  `p_mob` varchar(12) NOT NULL,
  `p_dob` date NOT NULL,
  `p_address` varchar(70) NOT NULL,
  `p_city` varchar(30) NOT NULL,
  `p_state` varchar(30) NOT NULL,
  `p_sem` int(11) NOT NULL,
  `p_year` varchar(30) NOT NULL,
  `p_program` varchar(30) NOT NULL,
  `p_branch` varchar(30) NOT NULL,
  `p_regid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`p_id`, `p_mob`, `p_dob`, `p_address`, `p_city`, `p_state`, `p_sem`, `p_year`, `p_program`, `p_branch`, `p_regid`) VALUES
(6, '9769514275', '2002-12-06', 'Jasmine,Sundarvan Park, Samta Nagar, Shirwadkar road', 'Thane', 'Maharashtra', 5, 'Third Year', 'B.Tech', 'Information Technology', 201081007);

-- --------------------------------------------------------

--
-- Table structure for table `passdetails`
--

CREATE TABLE `passdetails` (
  `p_tk` varchar(30) NOT NULL,
  `p_class` text NOT NULL,
  `prev_startstation` varchar(50) NOT NULL,
  `prev_endstation` varchar(30) NOT NULL,
  `p_startdate` date NOT NULL,
  `end_date` date NOT NULL,
  `curr_startstation` varchar(50) NOT NULL,
  `curr_endstation` varchar(30) NOT NULL,
  `p_period` varchar(10) NOT NULL,
  `curr_class` varchar(10) NOT NULL,
  `p_regid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passdetails`
--

INSERT INTO `passdetails` (`p_tk`, `p_class`, `prev_startstation`, `prev_endstation`, `p_startdate`, `end_date`, `curr_startstation`, `curr_endstation`, `p_period`, `curr_class`, `p_regid`) VALUES
('674548', 'First', 'Thane', 'Dadar', '2022-11-24', '2023-02-02', 'Thane', 'Dadar', 'Quarterly', 'First', 201081007);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `p_fname` varchar(30) NOT NULL,
  `p_lname` varchar(30) NOT NULL,
  `p_regid` int(11) NOT NULL,
  `p_email` varchar(30) NOT NULL,
  `p_password` varchar(10) NOT NULL,
  `p_gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`p_fname`, `p_lname`, `p_regid`, `p_email`, `p_password`, `p_gender`) VALUES
('Saniya', 'Gupte', 201081007, 'sugupte_b20@it.vjti.ac.in', '12345678', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_regid_fk` (`p_regid`);

--
-- Indexes for table `passdetails`
--
ALTER TABLE `passdetails`
  ADD PRIMARY KEY (`p_tk`),
  ADD KEY `p_regid_fk` (`p_regid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`p_regid`),
  ADD UNIQUE KEY `p_email` (`p_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`p_regid`) REFERENCES `students` (`p_regid`);

--
-- Constraints for table `passdetails`
--
ALTER TABLE `passdetails`
  ADD CONSTRAINT `passdetails_ibfk_1` FOREIGN KEY (`p_regid`) REFERENCES `students` (`p_regid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
