-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: localhost:3306
-- Čas generovania: St 22.Máj 2019, 19:16
-- Verzia serveru: 5.7.25-0ubuntu0.18.04.2
-- Verzia PHP: 7.2.15-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `zav_zad`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `History`
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
-- Sťahujem dáta pre tabuľku `History`
--

INSERT INTO `History` (`id_history`, `date`, `person`, `template`, `sender`, `subject`) VALUES
(5, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(6, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(7, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(8, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla'),
(9, '2019-05-20', 'tomas.hodor@gmail.com', 1, 'Marienka', 'Hesla');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `hodnotenie_predmetu`
--

CREATE TABLE `hodnotenie_predmetu` (
  `id_user` int(11) NOT NULL,
  `id_predmet` int(3) NOT NULL,
  `meno` varchar(26) COLLATE utf8_slovak_ci NOT NULL,
  `json_object` varchar(256) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `Template`
--

CREATE TABLE `Template` (
  `id_template` int(11) NOT NULL,
  `start` varchar(200) NOT NULL,
  `core` varchar(500) NOT NULL,
  `end` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sťahujem dáta pre tabuľku `Template`
--

INSERT INTO `Template` (`id_template`, `start`, `core`, `end`) VALUES
(1, 'Dobrý deň,', 'na predmete Webové technológie 2 budete mať k dispozícii vlastný virtuálny linux server, ktorý budete\npoužívať počas semestra, a na ktorom budete vypracovávať zadania. Prihlasovacie údaje k Vašemu serveru\n\nsu uvedené nižšie.\nip adresa: {{verejnaIP}}\nprihlasovacie meno: {{login}}\nheslo: {{heslo}}\nVaše web stránky budú dostupné na: http:// {{verejnaIP}}:{{http}}', 'S pozdravom,\r\n{{sender}}'),
(3, 'Zdravim', 'Mam problemy s travenim', 'S pozdravom {{sender}}');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
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
-- Štruktúra tabuľky pre tabuľku `zoznam_predmetov`
--

CREATE TABLE `zoznam_predmetov` (
  `id_predmet` int(3) NOT NULL,
  `nazov` varchar(20) COLLATE utf8_slovak_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `History`
--
ALTER TABLE `History`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexy pre tabuľku `Template`
--
ALTER TABLE `Template`
  ADD PRIMARY KEY (`id_template`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `zoznam_predmetov`
--
ALTER TABLE `zoznam_predmetov`
  ADD PRIMARY KEY (`id_predmet`),
  ADD UNIQUE KEY `nazov` (`nazov`),
  ADD UNIQUE KEY `id_predmet` (`id_predmet`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `History`
--
ALTER TABLE `History`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pre tabuľku `Template`
--
ALTER TABLE `Template`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pre tabuľku `zoznam_predmetov`
--
ALTER TABLE `zoznam_predmetov`
  MODIFY `id_predmet` int(3) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
