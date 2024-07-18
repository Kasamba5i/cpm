-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 16, 2024 at 03:40 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_camion`
--

DROP TABLE IF EXISTS `t_camion`;
CREATE TABLE IF NOT EXISTS `t_camion` (
  `idcamion` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `plaque` varchar(9) NOT NULL,
  `capacite` tinyint NOT NULL,
  `chauffeur` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  PRIMARY KEY (`idcamion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `t_checkpoint`
--

DROP TABLE IF EXISTS `t_checkpoint`;
CREATE TABLE IF NOT EXISTS `t_checkpoint` (
  `idcheckpoint` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `localisation` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idcheckpoint`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_course`
--

DROP TABLE IF EXISTS `t_course`;
CREATE TABLE IF NOT EXISTS `t_course` (
  `idcourse` varchar(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Générer à partir de de KME, date du jour, i et heure complète\r\n\r\nEx: KME16072024i125301',
  `datecourse` date NOT NULL,
  `typecourse` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `source` tinyint NOT NULL,
  `destination` tinyint NOT NULL,
  `details` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `plaque` varchar(9) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idcourse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_utilisateur`
--

DROP TABLE IF EXISTS `t_utilisateur`;
CREATE TABLE IF NOT EXISTS `t_utilisateur` (
  `idutilisateur` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telephone` varchar(13) COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `idcheckpoint` int UNSIGNED NOT NULL,
  `typecompte` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `motdepasse` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idutilisateur`),
  KEY `idcheckpoint` (`idcheckpoint`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
