-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2019 at 10:55 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-5+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spolocna`
--

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `team` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `agree` int(11) DEFAULT NULL,
  `max` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `leader` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`id`, `student_id`, `name`, `email`, `password`, `team`, `points`, `agree`, `max`, `subject`, `year`, `leader`) VALUES
(96, '12345', 'AAq', 'aa@aa.aa', '111', 1, 10, 3, 20, 'WT2', '2018', 'aa@aa.aa'),
(97, '22345', 'AAw', 'a2@aa.aa', '111', 1, 10, 3, 20, 'WT2', '2018', 'aa@aa.aa'),
(98, '32345', 'AAe', 'a3@aa.aa', '111', 2, 30, 3, 150, 'WT2', '2018', 'a3@aa.aa'),
(99, '42345', 'AAr', 'a4@aa.aa', '', 2, 30, 1, 150, 'WT2', '2018', 'a3@aa.aa'),
(100, '52345', 'AAt', 'a5@aa.aa', '111', 3, 0, NULL, 0, 'WT2', '2018', 'a5@aa.aa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `meno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `heslo` varchar(256) DEFAULT NULL,
  `tim` int(11) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
