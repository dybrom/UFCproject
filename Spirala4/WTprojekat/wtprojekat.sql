-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2017 at 09:51 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtprojekat`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `Capital` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `NumberOfFighters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`ID`, `Name`, `Capital`, `NumberOfFighters`) VALUES
(1, 'Brasil', 'Brasilia', 0),
(2, 'USA', 'Washington, D.C.', 0),
(3, 'Ireland', 'Dublin', 0),
(4, 'Bosnia and Herzegovina', 'Sarajevo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `fighters`
--

CREATE TABLE `fighters` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `Country` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `Weightclass` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `weightclass_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `fighters`
--

INSERT INTO `fighters` (`ID`, `Name`, `Country`, `country_id`, `Weightclass`, `weightclass_id`) VALUES
(17, 'Dominick Cruz', 'USA', 2, 'Bantamweight', 3),
(18, 'Demetrious Johnson', 'USA', 2, 'Flyweight', 2),
(19, 'Jose Aldo', 'Brasil', 1, 'Featherweight', 4),
(20, 'Jon Jones', 'USA', 2, 'Light Heavyweight', 4),
(21, 'Anderson Silva', 'Brasil', 1, 'Middleweight', 7),
(22, 'Mirsad Bektic', 'Bosnia and Herzegovina', 4, 'Featherweight', 4),
(23, 'Conor McGregor', 'Ireland', 3, 'Lightweight', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(14, 'arif', 'arif'),
(15, 'novi', 'test'),
(16, 'korisnik', 'korisnik'),
(17, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `weightclass`
--

CREATE TABLE `weightclass` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `Pound limit` int(11) NOT NULL,
  `KG limit` float NOT NULL,
  `NumberOfFighters` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `weightclass`
--

INSERT INTO `weightclass` (`ID`, `Name`, `Pound limit`, `KG limit`, `NumberOfFighters`) VALUES
(1, 'Strawweight', 115, 52.2, 0),
(2, 'Flyweight', 125, 56.7, 0),
(3, 'Bantamweight', 135, 61.2, 0),
(4, 'Featherweight', 145, 65.8, 0),
(5, 'Lightweight', 155, 70.3, 0),
(6, 'Welterweight', 170, 77.1, 0),
(7, 'Middleweight', 185, 83.9, 0),
(8, 'Lightheavyweight', 205, 93, 0),
(9, 'Heavyweight', 265, 120.2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fighters`
--
ALTER TABLE `fighters`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `weightclass_id` (`weightclass_id`),
  ADD KEY `country_id_2` (`country_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `weightclass`
--
ALTER TABLE `weightclass`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fighters`
--
ALTER TABLE `fighters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `weightclass`
--
ALTER TABLE `weightclass`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fighters`
--
ALTER TABLE `fighters`
  ADD CONSTRAINT `fighters_countries_fk` FOREIGN KEY (`country_id`) REFERENCES `countries` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fighters_weightclass_fk` FOREIGN KEY (`weightclass_id`) REFERENCES `weightclass` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
