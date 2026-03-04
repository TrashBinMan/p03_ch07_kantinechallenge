-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2026 at 02:01 PM
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
-- Table structure for table `tb_menu_kaart`
--

CREATE TABLE `tb_menu_kaart` (
  `ID` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `plaatje` varchar(70) NOT NULL,
  `prijs` varchar(8) NOT NULL,
  `groep` varchar(50) NOT NULL,
  `allergie` varchar(100) NOT NULL,
  `gezond` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_menu_kaart`
--

INSERT INTO `tb_menu_kaart` (`ID`, `naam`, `plaatje`, `prijs`, `groep`, `allergie`, `gezond`) VALUES
(1, 'Cola', 'Media/cola-img.png', '2,75', 'drank', 'Geen', 'Nee'),
(2, 'Fanta', 'Media/fanta-img.png', '2,65', 'drank', 'Geen', 'Nee'),
(3, 'Ice Tea', 'Media/icetea-img.png', '2,20', 'drank', 'Geen', 'Nee'),
(4, 'Vitamine Water', 'Media/o2-img.png', '2,69', 'drank', 'Geen', 'Nee'),
(5, 'Melk', 'Media/Melk-img.avif', '1,90', 'zuivel', 'zuivel', 'Ja'),
(6, 'Kwark', 'Media/kwark-img.png', '2,10', 'zuivel', 'zuivel', 'Nee'),
(7, 'Yoghurt', 'Media/yoghurt-img.png', '2,10', 'zuivel', 'zuivel', 'Ja'),
(8, 'Fristi', 'Media/fristi-img.webp', '3,00', 'zuivel', 'zuivel', 'Nee'),
(9, 'Chocomel', 'Media/chocomel-img.avif', '3,00', 'zuivel', 'zuivel', 'Nee'),
(10, 'Ice coffee', 'Media/cappucchino-img.png', '2,95', 'zuivel', 'Geen', 'Nee'),
(11, 'Popcorn', 'Media/Zoute_popcorn-img.webp', '2,00', 'sweets', 'Geen', 'Nee'),
(12, 'B\'tween', 'Media/btween-img.png', '0,80', 'sweets', 'Geen', 'Ja'),
(13, 'Bueno', 'Media/bueno-img.png', '1,90', 'sweets', 'Geen', 'Nee'),
(14, 'Haribo', 'Media/Haribo-img.webp', '2,90', 'sweets', 'Geen', 'Nee'),
(15, 'Chips', 'Media/chips-img.png', '1,90', 'sweets', 'Geen', 'Nee'),
(16, 'Chocolade', 'Media/mars-img.png', '1,70', 'sweets', 'Geen', 'Nee'),
(17, 'Groentesoep', 'Media/groentesoep-img.png', '2,00', 'Soep', 'Geen', 'Ja'),
(18, 'Tomatentesoep', 'Media/tomatensoep-img.png', '2,00', 'Soep', 'Tomaat', 'Ja'),
(19, 'Kippensoep', 'Media/kippensoep-img.webp', '2,00', 'Soep', 'Geen', 'Ja'),
(20, 'Paprikasoep', 'Media/tomatensoep-img.png', '2,00', 'Soep', 'Paprika', 'Ja'),
(21, 'Brood', 'Media/broodjes-img.png', '1,00', 'Brood', 'Geen', 'Ja'),
(22, 'Croissant', 'Media/croissant-img.png', '1,60', 'Brood', 'Geen', 'Nee'),
(23, 'Muffin', 'Media/muffin-img.webp', '2,45', 'Brood', 'Geen', 'Nee'),
(24, 'Wafel', 'Media/wafel-img.png', '2,20', 'Brood', 'Geen', 'Nee'),
(25, 'Broodje Gezond Ham/Kaas', 'Media/gezond_ham-img.jpg', '3,50', 'Brood', 'Geen', 'Ja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_menu_kaart`
--
ALTER TABLE `tb_menu_kaart`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_menu_kaart`
--
ALTER TABLE `tb_menu_kaart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
