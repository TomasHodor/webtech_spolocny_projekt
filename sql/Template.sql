-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:3306
-- Vytvořeno: Pon 20. kvě 2019, 20:26
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
-- Struktura tabulky `Template`
--

CREATE TABLE `Template` (
  `id_template` int(11) NOT NULL,
  `start` varchar(200) NOT NULL,
  `core` varchar(500) NOT NULL,
  `end` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `Template`
--

INSERT INTO `Template` (`id_template`, `start`, `core`, `end`) VALUES
(1, 'Dobrý deň,', 'na predmete Webové technológie 2 budete mať k dispozícii vlastný virtuálny linux server, ktorý budete\npoužívať počas semestra, a na ktorom budete vypracovávať zadania. Prihlasovacie údaje k Vašemu serveru\n\nsu uvedené nižšie.\nip adresa: {{verejnaIP}}\nprihlasovacie meno: {{login}}\nheslo: {{heslo}}\nVaše web stránky budú dostupné na: http:// {{verejnaIP}}:{{http}}', 'S pozdravom,\r\n{{sender}}'),
(3, 'Zdravim', 'Mam problemy s travenim', 'S pozdravom {{sender}}');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `Template`
--
ALTER TABLE `Template`
  ADD PRIMARY KEY (`id_template`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `Template`
--
ALTER TABLE `Template`
  MODIFY `id_template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
