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

/*Tabela Obese*/
CREATE TABLE `yearly_data_obese` (
  `country_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `yearly_data_obese` (`country_id`, `year`, `percentage`) VALUES
(1, 2008, 14.0),
(1, 2014, 14.0),
(1, 2017, 14.7),
(1, 2019, 16.3),
(1, 2022, 15.8),
(2, 2008, 11.5),
(2, 2014, 14.8),
(2, 2017, 14.1),
(2, 2019, 13.6),
(2, 2022, 11.7),
(3, 2008, 18.3),
(3, 2014, 19.3),
(3, 2017, 20.5),
(3, 2019, 19.8),
(3, 2022, 17.8),
(4, 2008, NULL),
(4, 2014, 14.9),
(4, 2017, 18.0),
(4, 2019, 16.5),
(4, 2022, 19.4),
(5, 2008, 15.8),
(5, 2014, 16.9),
(5, 2017, 20.0),
(5, 2019, 19.0),
(5, 2022, NULL),
(6, 2008, 18.5),
(6, 2014, 20.4),
(6, 2017, 21.0),
(6, 2019, 21.8),
(6, 2022, 22.1),
(7, 2008, NULL),
(7, 2014, 18.7),
(7, 2017, 15.2),
(7, 2019, NULL),
(7, 2022, 19.6),
(8, 2008, 17.6),
(8, 2014, 17.3),
(8, 2017, 11.6),
(8, 2019, 16.7),
(8, 2022, 12.0),
(9, 2008, 15.7),
(9, 2014, 16.7),
(9, 2017, 14.1),
(9, 2019, 16.0),
(9, 2022, 14.9),
(10, 2008, 12.2),
(10, 2014, 15.3),
(10, 2017, 15.3),
(10, 2019, 15.0),
(10, 2022, 15.2),
(11, 2008, NULL),
(11, 2014, 18.7),
(11, 2017, 18.2),
(11, 2019, 23.0),
(11, 2022, 16.7),
(12, 2008, NULL),
(12, 2014, 10.8),
(12, 2017, 5.9),
(12, 2019, 11.7),
(12, 2022, 7.1),
(13, 2008, 15.6),
(13, 2014, 14.5),
(13, 2017, 14.7),
(13, 2019, 15.2),
(13, 2022, 13.5),
(14, 2008, 16.9),
(14, 2014, 21.3),
(14, 2017, 21.5),
(14, 2019, 23.0),
(14, 2022, 23.3),
(15, 2008, NULL),
(15, 2014, 17.3),
(15, 2017, 17.5),
(15, 2019, 18.9),
(15, 2022, 20.6),
(16, 2008, NULL),
(16, 2014, 15.6),
(16, 2017, 16.0),
(16, 2019, 16.5),
(16, 2022, 17.0),
(17, 2008, 20.0),
(17, 2014, 21.2),
(17, 2017, 20.0),
(17, 2019, 24.5),
(17, 2022, 22.2),
(18, 2008, 22.9),
(18, 2014, 26.0),
(18, 2017, 25.7),
(18, 2019, 28.7),
(18, 2022, 26.1),
(19, 2008, NULL),
(19, 2014, 13.3),
(19, 2017, 13.0),
(19, 2019, 14.7),
(19, 2022, 13.8),
(20, 2008, 12.8),
(20, 2014, 14.7),
(20, 2017, 15.0),
(20, 2019, 17.1),
(20, 2022, 17.6),
(21, 2008, 16.4),
(21, 2014, 17.2),
(21, 2017, 16.9),
(21, 2019, 19.0),
(21, 2022, 18.6),
(22, 2008, NULL),
(22, 2014, 16.6),
(22, 2017, 15.7),
(22, 2019, 17.7),
(22, 2022, 15.8),
(23, 2008, 7.9),
(23, 2014, 9.4),
(23, 2017, 10.4),
(23, 2019, 10.9),
(23, 2022, 10.3),
(24, 2008, 16.8),
(24, 2014, 19.2),
(24, 2017, 17.3),
(24, 2019, 19.9),
(24, 2022, 17.9),
(25, 2008, 15.1),
(25, 2014, 16.3),
(25, 2017, 14.4),
(25, 2019, 19.7),
(25, 2022, 17.1),
(26, 2008, NULL),
(26, 2014, 18.3),
(26, 2017, 20.8),
(26, 2019, 20.9),
(26, 2022, 22.0),
(27, 2008, NULL),
(27, 2014, 14.0),
(27, 2017, 17.4),
(27, 2019, 15.3),
(27, 2022, 17.2),
(28, 2008, NULL),
(28, 2014, 19.0),
(28, 2017, 21.4),
(28, 2019, 22.3),
(28, 2022, NULL),
(29, 2008, NULL),
(29, 2014, 13.1),
(29, 2017, 13.8),
(29, 2019, 14.1),
(29, 2022, 16.8),
(30, 2008, NULL),
(30, 2014, NULL),
(30, 2017, 11.3),
(30, 2019, NULL),
(30, 2022, 13.5),
(31, 2008, NULL),
(31, 2014, 20.1),
(31, 2017, 21.0),
(31, 2019, NULL),
(31, 2022, NULL),
(32, 2008, NULL),
(32, 2014, NULL),
(32, 2017, NULL),
(32, 2019, NULL),
(32, 2022, 7.8),
(33, 2008, NULL),
(33, 2014, NULL),
(33, 2017, 10.5),
(33, 2019, NULL),
(33, 2022, NULL),
(34, 2008, NULL),
(34, 2014, NULL),
(34, 2017, 13.3),
(34, 2019, 17.3),
(34, 2022, 11.7),
(35, 2008, 16.2),
(35, 2014, 21.2),
(35, 2017, NULL),
(35, 2019, 22.3),
(35, 2022, NULL),
(36, 2008, NULL),
(36, 2014, 15.4),
(36, 2017, 14.9),
(36, 2019, 16.5),
(36, 2022, 14.8),
(37, 2008, NULL),
(37, 2014, 15.9),
(37, 2017, 15.2),
(37, 2019, NULL),
(37, 2022, NULL),
(38, 2008, NULL),
(38, 2014, NULL),
(38, 2017, 15.2),
(38, 2019, NULL),
(38, 2022, NULL);


ALTER TABLE `yearly_data_obese`
  ADD KEY `country_id` (`country_id`);

ALTER TABLE `yearly_data_obese`
  ADD CONSTRAINT `yearly_data_obese_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;




/*Tabela Pre-Obese*/
CREATE TABLE `yearly_data_pre_obese` (
  `country_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `yearly_data_pre_obese` (`country_id`, `year`, `percentage`) VALUES
(1, 2008, 33.5),
(1, 2014, 35.3),
(1, 2017, 33.9),
(1, 2019, 33.9),
(1, 2022, 33.2),
(2, 2008, 39.3),
(2, 2014, 39.2),
(2, 2017, 45.3),
(2, 2019, 41.2),
(2, 2022, 42.0),
(3, 2008, 38.3),
(3, 2014, 37.6),
(3, 2017, 41.9),
(3, 2019, 40.1),
(3, 2022, 38.7),
(4, 2008, NULL),
(4, 2014, 32.9),
(4, 2017, 36.5),
(4, 2019, 34.0),
(4, 2022, 35.2),
(5, 2008, 36.3),
(5, 2014, 35.2),
(5, 2017, 35.3),
(5, 2019, 34.5),
(5, 2022, NULL),
(6, 2008, 32.5),
(6, 2014, 33.5),
(6, 2017, 35.1),
(6, 2019, 34.9),
(6, 2022, 35.2),
(7, 2008, NULL),
(7, 2014, 37.0),
(7, 2017, 41.9),
(7, 2019, NULL),
(7, 2022, 33.4),
(8, 2008, 38.7),
(8, 2014, 39.4),
(8, 2017, 43.2),
(8, 2019, 41.0),
(8, 2022, 42.9),
(9, 2008, 37.3),
(9, 2014, 35.7),
(9, 2017, 37.6),
(9, 2019, 37.8),
(9, 2022, 36.2),
(10, 2008, 31.4),
(10, 2014, 31.9),
(10, 2017, 30.7),
(10, 2019, 32.1),
(10, 2022, 31.2),
(11, 2008, NULL),
(11, 2014, 38.7),
(11, 2017, 42.6),
(11, 2019, 41.7),
(11, 2022, 41.3),
(12, 2008, NULL),
(12, 2014, 34.1),
(12, 2017, 34.4),
(12, 2019, 33.9),
(12, 2022, 34.8),
(13, 2008, 35.7),
(13, 2014, 33.8),
(13, 2017, 38.0),
(13, 2019, 34.6),
(13, 2022, 34.5),
(14, 2008, 38.0),
(14, 2014, 35.2),
(14, 2017, 35.5),
(14, 2019, 35.3),
(14, 2022, 37.1),
(15, 2008, NULL),
(15, 2014, 38.3),
(15, 2017, 38.7),
(15, 2019, 37.9),
(15, 2022, 38.7),
(16, 2008, NULL),
(16, 2014, 32.4),
(16, 2017, 33.3),
(16, 2019, 31.9),
(16, 2022, 32.7),
(17, 2008, 34.9),
(17, 2014, 34.0),
(17, 2017, 36.3),
(17, 2019, 35.4),
(17, 2022, 36.2),
(18, 2008, 36.8),
(18, 2014, 35.0),
(18, 2017, 36.5),
(18, 2019, 36.1),
(18, 2022, 36.3),
(19, 2008, NULL),
(19, 2014, 36.0),
(19, 2017, 34.0),
(19, 2019, 35.4),
(19, 2022, 34.5),
(20, 2008, 36.5),
(20, 2014, 33.3),
(20, 2017, 35.0),
(20, 2019, 35.0),
(20, 2022, 35.0),
(21, 2008, 37.6),
(21, 2014, 37.5),
(21, 2017, 39.2),
(21, 2019, 39.1),
(21, 2022, 39.8),
(22, 2008, NULL),
(22, 2014, 36.9),
(22, 2017, 37.6),
(22, 2019, 38.2),
(22, 2022, 37.2),
(23, 2008, 42.4),
(23, 2014, 46.4),
(23, 2017, 52.5),
(23, 2019, 47.7),
(23, 2022, 49.4),
(24, 2008, 39.8),
(24, 2014, 37.4),
(24, 2017, 37.2),
(24, 2019, 38.2),
(24, 2022, 37.8),
(25, 2008, 35.6),
(25, 2014, 38.0),
(25, 2017, 40.0),
(25, 2019, 38.9),
(25, 2022, 41.3),
(26, 2008, NULL),
(26, 2014, 36.4),
(26, 2017, 40.3),
(26, 2019, 38.1),
(26, 2022, 37.8),
(27, 2008, NULL),
(27, 2014, 35.9),
(27, 2017, 40.1),
(27, 2019, 36.0),
(27, 2022, 36.0),
(28, 2008, NULL),
(28, 2014, 38.6),
(28, 2017, 37.8),
(28, 2019, 39.7),
(28, 2022, NULL),
(29, 2008, NULL),
(29, 2014, 36.2),
(29, 2017, 35.4),
(29, 2019, 36.5),
(29, 2022, 36.7),
(30, 2008, NULL),
(30, 2014, NULL),
(30, 2017, 31.9),
(30, 2019, NULL),
(30, 2022, 32.1),
(31, 2008, NULL),
(31, 2014, 35.6),
(31, 2017, 35.2),
(31, 2019, NULL),
(31, 2022, NULL),
(32, 2008, NULL),
(32, 2014, NULL),
(32, 2017, NULL),
(32, 2019, NULL),
(32, 2022, 40.2),
(33, 2008, NULL),
(33, 2014, NULL),
(33, 2017, 45.2),
(33, 2019, NULL),
(33, 2022, NULL),
(34, 2008, NULL),
(34, 2014, NULL),
(34, 2017, 36.2),
(34, 2019, 36.3),
(34, 2022, 40.9),
(35, 2008, 34.4),
(35, 2014, 35.3),
(35, 2017, NULL),
(35, 2019, 36.5),
(35, 2022, NULL),
(36, 2008, NULL),
(36, 2014, 35.7),
(36, 2017, 36.9),
(36, 2019, NULL),
(36, 2022, NULL),
(37, 2008, NULL),
(37, 2014, NULL),
(37, 2017, 36.8),
(37, 2019, NULL),
(37, 2022, NULL),
(38, 2008, NULL),
(38, 2014, NULL),
(38, 2017, 36.8),
(38, 2019, NULL),
(38, 2022, NULL);


ALTER TABLE `yearly_data_pre_obese`
  ADD KEY `country_id` (`country_id`);

ALTER TABLE `yearly_data_pre_obese`
  ADD CONSTRAINT `yearly_data_pre_obese_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`);
COMMIT;