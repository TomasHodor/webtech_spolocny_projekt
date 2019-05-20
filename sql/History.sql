-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:3306
-- Vytvořeno: Pon 20. kvě 2019, 20:27
-- Verze serveru: 5.7.25-0ubuntu0.18.04.2
-- Verze PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `spolocny_projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `History`
--

CREATE TABLE `History` (
  `id_history` int(11) NOT NULL,
  `date` date NOT NULL,
  `person` varchar(100) NOT NULL,
  `template` int(11) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `History`
--

INSERT INTO `History` (`id_history`, `date`, `person`, `template`, `sender`, `subject`) VALUES
(5, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(6, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(7, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(8, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(9, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `History`
--
ALTER TABLE `History`
  ADD PRIMARY KEY (`id_history`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `History`
--
ALTER TABLE `History`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
