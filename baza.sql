-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 11:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baza`
--
CREATE DATABASE IF NOT EXISTS `baza` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `baza`;

-- --------------------------------------------------------

--
-- Table structure for table `film`
--
-- Creation: Feb 08, 2023 at 10:39 AM
-- Last update: Feb 08, 2023 at 10:46 AM
--

DROP TABLE IF EXISTS `film`;
CREATE TABLE `film` (
  `id_filma` int(11) NOT NULL,
  `naslov` varchar(30) NOT NULL,
  `cena` double NOT NULL,
  `trajanje` double NOT NULL,
  `vreme_projekcije` time NOT NULL,
  `vrsta_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `film`:
--   `vrsta_fk`
--       `vrsta` -> `id_vrste`
--

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_filma`, `naslov`, `cena`, `trajanje`, `vreme_projekcije`, `vrsta_fk`) VALUES
(3, 'Avatar - put vode', 560, 190, '20:30:00', 2),
(4, 'Čovek po imenu oto', 500, 160, '19:45:00', 1),
(5, 'Oluja', 480, 120, '18:30:00', 8),
(6, 'Opasan let', 500, 108, '19:45:00', 3),
(7, 'Vavilon', 480, 120, '18:30:00', 3),
(8, 'Stric', 500, 160, '17:15:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--
-- Creation: Feb 08, 2023 at 10:40 AM
-- Last update: Feb 08, 2023 at 10:44 AM
--

DROP TABLE IF EXISTS `vrsta`;
CREATE TABLE `vrsta` (
  `id_vrste` int(11) NOT NULL,
  `naziv_vrste` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `vrsta`:
--

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`id_vrste`, `naziv_vrste`) VALUES
(1, 'Drama'),
(2, 'Avantura'),
(3, 'Akcija'),
(4, 'Komedija'),
(5, 'Romantika'),
(6, 'Triler'),
(7, 'Naučna fantastika'),
(8, 'Ratni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_filma`),
  ADD KEY `Žanr` (`vrsta_fk`);

--
-- Indexes for table `vrsta`
--
ALTER TABLE `vrsta`
  ADD PRIMARY KEY (`id_vrste`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_filma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vrsta`
--
ALTER TABLE `vrsta`
  MODIFY `id_vrste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `Žanr` FOREIGN KEY (`vrsta_fk`) REFERENCES `vrsta` (`id_vrste`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
