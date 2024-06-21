-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: mai 17, 2024 la 11:41 PM
-- Versiune server: 10.4.32-MariaDB
-- Versiune PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `eurostat_data`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Belgium'),
(2, 'Bulgaria'),
(3, 'Czech Republic'),
(4, 'Denmark'),
(5, 'Germany'),
(6, 'Estonia'),
(7, 'Ireland'),
(8, 'Greece'),
(9, 'Spain'),
(10, 'France'),
(11, 'Croatia'),
(12, 'Italy'),
(13, 'Cyprus'),
(14, 'Latvia'),
(15, 'Lithuania'),
(16, 'Luxembourg'),
(17, 'Hungary'),
(18, 'Malta'),
(19, 'Netherlands'),
(20, 'Austria'),
(21, 'Poland'),
(22, 'Portugal'),
(23, 'Romania'),
(24, 'Slovenia'),
(25, 'Slovakia'),
(26, 'Finland'),
(27, 'Sweden'),
(28, 'Iceland'),
(29, 'Norway'),
(30, 'Switzerland'),
(31, 'United Kingdom'),
(32, 'Montenegro'),
(33, 'North Macedonia'),
(34, 'Serbia'),
(35, 'Türkiye'),
(36, 'EU_2020'),
(37, 'EU_2013-2020'),
(38, 'EU_2007-2013');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `yearlydata`
--

CREATE TABLE `yearlydata` (
  `country_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `yearlydata`
--

INSERT INTO `yearlydata` (`country_id`, `year`, `percentage`) VALUES
(1, 2008, 47.50),
(1, 2014, 49.30),
(1, 2017, 48.60),
(1, 2019, 50.20),
(1, 2022, 48.90),
(2, 2008, 50.80),
(2, 2014, 54.00),
(2, 2017, 59.50),
(2, 2019, 54.90),
(2, 2022, 53.70),
(3, 2008, 56.60),
(3, 2014, 56.80),
(3, 2017, 62.30),
(3, 2019, 60.00),
(3, 2022, 56.50),
(4, 2008, NULL),
(4, 2014, 54.50),
(4, 2017, 50.40),
(4, 2019, 54.60),
(5, 2008, 52.10),
(5, 2014, 52.10),
(5, 2017, 55.20),
(5, 2019, 53.50),
(5, 2022, NULL),
(6, 2008, 51.00),
(6, 2014, 53.90),
(6, 2017, 56.10),
(6, 2019, 56.70),
(6, 2022, 57.40),
(7, 2008, NULL),
(7, 2014, 55.70),
(7, 2017, 57.10),
(7, 2019, NULL),
(7, 2022, 53.00),
(8, 2008, 56.30),
(8, 2014, 56.70),
(8, 2017, 54.80),
(8, 2019, 57.60),
(8, 2022, 54.90),
(9, 2008, 53.00),
(9, 2014, 52.40),
(9, 2017, 51.60),
(9, 2019, 53.70),
(9, 2022, 51.20),
(10, 2008, 43.60),
(10, 2014, 47.20),
(10, 2017, 46.00),
(10, 2019, 47.20),
(10, 2022, 46.40),
(11, 2008, NULL),
(11, 2014, 57.40),
(11, 2017, 60.90),
(11, 2019, 64.80),
(11, 2022, 58.10),
(12, 2008, NULL),
(12, 2014, 44.90),
(12, 2017, 40.30),
(12, 2019, 45.70),
(12, 2022, 41.90),
(13, 2008, 51.30),
(13, 2014, 48.30),
(13, 2017, 52.70),
(13, 2019, 49.80),
(13, 2022, 47.90),
(14, 2008, 54.90),
(14, 2014, 56.50),
(14, 2017, 57.00),
(14, 2019, 58.30),
(14, 2022, 60.40),
(15, 2008, NULL),
(15, 2014, 55.60),
(15, 2017, 56.20),
(15, 2019, 56.80),
(15, 2022, 59.40),
(16, 2008, NULL),
(16, 2014, 48.00),
(16, 2017, 49.30),
(16, 2019, 48.40),
(16, 2022, 49.70),
(17, 2008, 54.90),
(17, 2014, 55.20),
(17, 2017, 56.30),
(17, 2019, 59.90),
(17, 2022, 58.40),
(18, 2008, 57.10),
(18, 2014, 61.00),
(18, 2017, 62.20),
(18, 2019, 64.80),
(18, 2022, 62.50),
(19, 2008, NULL),
(19, 2014, 49.40),
(19, 2017, 46.90),
(19, 2019, 50.00),
(19, 2022, 48.30),
(20, 2008, 49.30),
(20, 2014, 48.00),
(20, 2017, 50.00),
(20, 2019, 52.20),
(20, 2022, 52.70),
(21, 2008, 54.00),
(21, 2014, 54.70),
(21, 2017, 56.10),
(21, 2019, 58.10),
(21, 2022, 58.40),
(22, 2008, NULL),
(22, 2014, 53.60),
(22, 2017, 53.30),
(22, 2019, 55.90),
(22, 2022, 53.00),
(23, 2008, 50.30),
(23, 2014, 55.80),
(23, 2017, 62.90),
(23, 2019, 58.70),
(23, 2022, 59.70),
(24, 2008, 56.60),
(24, 2014, 56.60),
(24, 2017, 54.50),
(24, 2019, 58.10),
(24, 2022, 55.70),
(25, 2008, 50.70),
(25, 2014, 54.20),
(25, 2017, 54.50),
(25, 2019, 58.70),
(25, 2022, 58.40),
(26, 2008, NULL),
(26, 2014, 54.70),
(26, 2017, 61.10),
(26, 2019, 59.00),
(26, 2022, 59.80),
(27, 2008, NULL),
(27, 2014, 49.90),
(27, 2017, 57.50),
(27, 2019, 51.30),
(27, 2022, 53.20),
(28, 2008, NULL),
(28, 2014, 57.60),
(28, 2017, 59.20),
(28, 2019, 62.00),
(28, 2022, NULL),
(29, 2008, NULL),
(29, 2014, 49.30),
(29, 2017, 49.10),
(29, 2019, 50.60),
(29, 2022, 53.50),
(30, 2008, NULL),
(30, 2014, NULL),
(30, 2017, 43.20),
(30, 2019, NULL),
(30, 2022, 45.60),
(31, 2008, NULL),
(31, 2014, 55.70),
(31, 2017, 56.10),
(31, 2019, NULL),
(31, 2022, NULL),
(32, 2008, NULL),
(32, 2014, NULL),
(32, 2017, NULL),
(32, 2019, NULL),
(32, 2022, 48.10),
(33, 2008, NULL),
(33, 2014, NULL),
(33, 2017, 55.70),
(33, 2019, NULL),
(33, 2022, NULL),
(34, 2008, NULL),
(34, 2014, NULL),
(34, 2017, 49.50),
(34, 2019, 53.60),
(34, 2022, 52.50),
(35, 2008, 50.60),
(35, 2014, 56.50),
(35, 2017, NULL),
(35, 2019, 58.80),
(35, 2022, NULL),
(36, 2008, NULL),
(36, 2014, 51.10),
(36, 2017, 51.80),
(36, 2019, 52.70),
(36, 2022, 51.30),
(37, 2008, NULL),
(37, 2014, 51.60),
(37, 2017, 52.00),
(37, 2019, NULL),
(37, 2022, NULL),
(38, 2008, NULL),
(38, 2014, NULL),
(38, 2017, 51.90),
(38, 2019, NULL),
(38, 2022, NULL);

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `yearlydata`
--
ALTER TABLE `yearlydata`
  ADD KEY `country_id` (`country_id`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `yearlydata`
--
ALTER TABLE `yearlydata`
  ADD CONSTRAINT `yearlydata_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
