-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 28 juin 2024 à 16:13
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_cpm`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_camion`
--

DROP TABLE IF EXISTS `t_camion`;
CREATE TABLE IF NOT EXISTS `t_camion` (
  `idcamion` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `plaque` varchar(9) NOT NULL,
  `capacite` tinyint NOT NULL,
  `chauffeur` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL,
  PRIMARY KEY (`idcamion`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `t_camion`
--

INSERT INTO `t_camion` (`idcamion`, `plaque`, `capacite`, `chauffeur`, `contact`) VALUES
(1, 'QB21D5 04', 2, 'KASONGO ILUNGA', ' 272654389180');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
