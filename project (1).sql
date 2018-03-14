-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 09:12 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `pic` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `hcity` varchar(100) NOT NULL,
  `ccity` varchar(100) NOT NULL,
  `ppic` varchar(100) NOT NULL DEFAULT '00',
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `hcity`, `ccity`, `ppic`, `email`, `pass`) VALUES
(1, 'saurabh', 'meerut', 'meerut', '123', 'saurabh@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `distance`
--

CREATE TABLE `distance` (
  `fname` varchar(50) NOT NULL,
  `pune` int(100) NOT NULL,
  `mumbai` int(100) NOT NULL,
  `goa` int(100) NOT NULL,
  `dehradun` int(100) NOT NULL,
  `bangalore` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distance`
--

INSERT INTO `distance` (`fname`, `pune`, `mumbai`, `goa`, `dehradun`, `bangalore`) VALUES
('chirag', 600, 750, 800, 200, 600),
('saurabh', 550, 800, 750, 300, 450);

-- --------------------------------------------------------

--
-- Table structure for table `tagging`
--

CREATE TABLE `tagging` (
  `fname` varchar(100) NOT NULL DEFAULT 'saurabh',
  `location` varchar(100) DEFAULT NULL,
  `p1` varchar(100) DEFAULT NULL,
  `p2` varchar(100) DEFAULT NULL,
  `p3` varchar(100) DEFAULT NULL,
  `p4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tagging`
--

INSERT INTO `tagging` (`fname`, `location`, `p1`, `p2`, `p3`, `p4`) VALUES
('saurabh', 'pune', 'chirag', NULL, NULL, ''),
('saurabh', 'mumbai', NULL, 'chirag', NULL, ''),
('saurabh', 'bangalore', NULL, NULL, 'chirag', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
