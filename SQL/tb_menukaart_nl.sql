-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2026 at 09:47 AM
-- Server version: 5.7.24
-- PHP Version: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_c07`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_menukaart_nl`
--

CREATE TABLE `tb_menukaart_nl` (
  `ID` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `plaatje` varchar(70) NOT NULL,
  `prijs` varchar(8) NOT NULL,
  `groep` varchar(50) NOT NULL,
  `allergie` varchar(100) NOT NULL,
  `gezond` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_menukaart_nl`
--

INSERT INTO `tb_menukaart_nl` (`ID`, `naam`, `plaatje`, `prijs`, `groep`, `allergie`, `gezond`) VALUES
(1, 'test 1', 'image link', '51.84', 'drank', 'zuivel', 'Nee'),
(2, 'test 1', 'image link', '51.84', 'drank', 'zuivel', 'Nee'),
(3, 'adf 3', 'asdfaf', 'adffds', 'fasdfad', 'hthyj', 'jdgf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_menukaart_nl`
--
ALTER TABLE `tb_menukaart_nl`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_menukaart_nl`
--
ALTER TABLE `tb_menukaart_nl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
