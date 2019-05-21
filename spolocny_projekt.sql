-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 09:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.17
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 21, 2019 at 10:55 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-5+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zav_zad`
-- Database: `spolocna`
--

-- --------------------------------------------------------

--
-- Table structure for table `hodnotenie_predmetu`
--

CREATE TABLE `hodnotenie_predmetu` (
  `id_user` int(11) NOT NULL,
  `id_predmet` int(3) NOT NULL,
  `meno` varchar(26) COLLATE utf8_slovak_ci NOT NULL,
  `json_object` varchar(256) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;
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

-- --------------------------------------------------------

--
-- Table structure for table `zoznam_predmetov`
--

CREATE TABLE `zoznam_predmetov` (
  `id_predmet` int(3) NOT NULL,
  `nazov` varchar(20) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `persons`
--
--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoznam_predmetov`
--
ALTER TABLE `zoznam_predmetov`
  ADD PRIMARY KEY (`id_predmet`),
  ADD UNIQUE KEY `nazov` (`nazov`),
  ADD UNIQUE KEY `id_predmet` (`id_predmet`);

--
-- AUTO_INCREMENT for dumped tables
--

ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `zoznam_predmetov`
--
ALTER TABLE `zoznam_predmetov`
  MODIFY `id_predmet` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

=======
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `persons`
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
