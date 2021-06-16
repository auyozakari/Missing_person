-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 04:51 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missing_person`
--

-- --------------------------------------------------------

--
-- Table structure for table `found_missing`
--

CREATE TABLE `found_missing` (
  `id` int(50) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `cps` varchar(100) NOT NULL,
  `vcs` varchar(10) NOT NULL,
  `pd` varchar(150) NOT NULL,
  `rptn` varchar(30) NOT NULL,
  `rpte` varchar(30) NOT NULL,
  `rptp` varchar(15) NOT NULL,
  `dateFound` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `report_missing`
--

CREATE TABLE `report_missing` (
  `id` int(30) NOT NULL,
  `serial` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `poo` varchar(50) NOT NULL,
  `pls` varchar(50) NOT NULL,
  `age` int(20) NOT NULL,
  `tribe` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `rptn` varchar(30) NOT NULL,
  `rpte` varchar(30) NOT NULL,
  `rptp` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dom` varchar(30) NOT NULL,
  `tom` varchar(30) NOT NULL,
  `ext` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_missing`
--

CREATE TABLE `volunteer_missing` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `number` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `found_missing`
--
ALTER TABLE `found_missing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_missing`
--
ALTER TABLE `report_missing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `serial` (`serial`);

--
-- Indexes for table `volunteer_missing`
--
ALTER TABLE `volunteer_missing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `found_missing`
--
ALTER TABLE `found_missing`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `report_missing`
--
ALTER TABLE `report_missing`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `volunteer_missing`
--
ALTER TABLE `volunteer_missing`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
