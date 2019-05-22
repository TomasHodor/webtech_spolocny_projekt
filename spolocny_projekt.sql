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
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zav_zad`
--

-- --------------------------------------------------------

--
-- Table structure for table `hodnotenie_predmetu`
--

DROP TABLE IF EXISTS `hodnotenie_predmetu`;
CREATE TABLE `hodnotenie_predmetu` (
  `id_user` int(11) NOT NULL,
  `id_predmet` int(3) NOT NULL,
  `meno` varchar(26) COLLATE utf8_slovak_ci NOT NULL,
  `json_object` varchar(256) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `hodnotenie_predmetu`
--

INSERT INTO `hodnotenie_predmetu` (`id_user`, `id_predmet`, `meno`, `json_object`) VALUES
(12348, 2, 'Priezvisko1 Meno1', '{\"Email\":\"xpriezvisko1@is.stuba.sk\",\"login\\r\":\"xpriezvisko1\\r\"}'),
(23456, 2, 'Priezvisko2 Meno2', '{\"Email\":\"xpriezvisko2@is.stuba.sk\",\"login\\r\":\"xpriezvisko2\\r\"}'),
(34567, 2, 'Priezvisko3 Meno3', '{\"Email\":\"xpriezvisko3@is.stuba.sk\",\"login\\r\":\"xpriezvisko3\\r\"}'),
(44556, 2, 'Priezvisko4 Meno4', '{\"Email\":\"xpriezvisko4@is.stuba.sk\",\"login\\r\":\"xpriezvisko4\\r\"}'),
(98542, 2, 'Priezvisko5 Meno5', '{\"Email\":\"xpriezvisko5@is.stuba.sk\",\"login\\r\":\"xpriezvisko5\"}'),
(75935, 5, 'sebest Meno1', '{\"Email\":\"xpriezvisko1@is.stuba.sk\",\"login\\r\":\"xpriezvisko1\\r\"}'),
(23456, 5, 'Priezvisko2 Meno2', '{\"Email\":\"xpriezvisko2@is.stuba.sk\",\"login\\r\":\"xpriezvisko2\\r\"}'),
(34567, 5, 'Priezvisko3 Meno3', '{\"Email\":\"xpriezvisko3@is.stuba.sk\",\"login\\r\":\"xpriezvisko3\\r\"}'),
(44556, 5, 'Priezvisko4 Meno4', '{\"Email\":\"xpriezvisko4@is.stuba.sk\",\"login\\r\":\"xpriezvisko4\\r\"}'),
(98542, 5, 'Priezvisko5 Meno5', '{\"Email\":\"xpriezvisko5@is.stuba.sk\",\"login\\r\":\"xpriezvisko5\\r\"}'),
(75935, 8, 'Peter Sebest', '{\"cv1\":\"8\",\"cv2\":\"4\",\"cv3\":\"1\",\"spolu\":\"1\",\"Znamka\\r\":\"e\\r\"}'),
(759, 8, 'Peter Sebestsds', '{\"cv1\":\"9\",\"cv2\":\"6\",\"cv3\":\"6\",\"spolu\":\"9\",\"Znamka\\r\":\"e\\r\"}'),
(-74417, 8, 'Peter Sebest', '{\"cv1\":\"9\",\"cv2\":\"8\",\"cv3\":\"3\",\"spolu\":\"1\",\"Znamka\\r\":\"e\\r\"}'),
(13215, 7, 'Janko Mrkvicka', '{\"cv1\":\"3\",\"cv2\":\"2\",\"Spolu\":\"5\",\"Znamka\\r\":\"A\\r\"}'),
(13516, 7, 'Marienka PernÃ­kovÃ¡', '{\"cv1\":\"3\",\"cv2\":\"2\",\"Spolu\":\"5\",\"Znamka\\r\":\"A\\r\"}'),
(2168, 7, 'Jezi Baba', '{\"cv1\":\"3\",\"cv2\":\"2\",\"Spolu\":\"5\",\"Znamka\\r\":\"A\\r\"}'),
(72145, 7, 'Peter Kalanin', '{\"cv1\":\"3\",\"cv2\":\"2\",\"Spolu\":\"5\",\"Znamka\\r\":\"A\\r\"}');

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
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

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `meno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `heslo` varchar(256) DEFAULT NULL,
  `tim` int(11) NOT NULL,
  `login` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `meno`, `email`, `heslo`, `tim`, `login`) VALUES
(75935, 'sebest peter', 'xsebest', '', 1, 'xsebest');

-- --------------------------------------------------------

--
-- Table structure for table `zoznam_predmetov`
--

DROP TABLE IF EXISTS `zoznam_predmetov`;
CREATE TABLE `zoznam_predmetov` (
  `id_predmet` int(3) NOT NULL,
  `nazov` varchar(20) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Dumping data for table `zoznam_predmetov`
--

INSERT INTO `zoznam_predmetov` (`id_predmet`, `nazov`) VALUES
(2, 'bez nazvu'),
(5, 'siete'),
(7, 'Webovky'),
(8, 'elektro...');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hodnotenie_predmetu`
--
ALTER TABLE `hodnotenie_predmetu`
  ADD KEY `id_predmet` (`id_predmet`);

--
-- Indexes for table `zoznam_predmetov`
--
ALTER TABLE `zoznam_predmetov`
  ADD PRIMARY KEY (`id_predmet`),
  ADD UNIQUE KEY `id_predmet` (`id_predmet`,`nazov`),
  ADD KEY `id_predmet_2` (`id_predmet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `zoznam_predmetov`
--
ALTER TABLE `zoznam_predmetov`
  MODIFY `id_predmet` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hodnotenie_predmetu`
--
ALTER TABLE `hodnotenie_predmetu`
  ADD CONSTRAINT `hodnotenie_predmetu_ibfk_1` FOREIGN KEY (`id_predmet`) REFERENCES `zoznam_predmetov` (`id_predmet`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
