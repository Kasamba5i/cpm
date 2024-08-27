-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 31 juil. 2024 à 09:31
-- Version du serveur : 10.5.20-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id22415840_db_cpm`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_camion`
--

CREATE TABLE `t_camion` (
  `idcamion` int(10) UNSIGNED NOT NULL,
  `plaque` varchar(9) NOT NULL,
  `capacite` tinyint(4) NOT NULL,
  `chauffeur` varchar(50) NOT NULL,
  `contact` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `t_camion`
--

INSERT INTO `t_camion` (`idcamion`, `plaque`, `capacite`, `chauffeur`, `contact`) VALUES
(2, 'T852EEV', 2, 'JACKSON ', '0810000002'),
(6, 'HZ64RMGP', 1, 'POWER', ' 77511258625'),
(4, '038CC02', 1, '', '77511258625'),
(5, '3325AV05', 1, 'BTT', '77511258625');

-- --------------------------------------------------------

--
-- Structure de la table `t_checkpoint`
--

CREATE TABLE `t_checkpoint` (
  `idcheckpoint` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `localisation` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_checkpoint`
--

INSERT INTO `t_checkpoint` (`idcheckpoint`, `nom`, `localisation`) VALUES
(1, 'KOLWEZI', 'RDC'),
(2, 'LUBUMBASHI', 'RDC'),
(3, 'KASUMBALESA', 'RDC'),
(4, 'SAKANIA', 'RDC'),
(5, 'ENTRE IMPORT', 'RDC'),
(6, 'SORTIE IMPORT', 'RDC'),
(7, 'WISKY KASUMBALESA', 'RDC'),
(8, 'COTE ZAMBIE ENTRE', 'RDC'),
(9, 'COTE ZAMBIE SORTIE', 'ZAMBIE'),
(10, 'COTE ZAMBIE ENTRE', 'ZAMBIE'),
(11, 'KANYAKA', 'RDC');

-- --------------------------------------------------------

--
-- Structure de la table `t_course`
--

CREATE TABLE `t_course` (
  `idcourse` varchar(18) NOT NULL COMMENT 'Générer à partir de de KME, date du jour, i et heure complète\r\n\r\nEx: KME16072024i125301',
  `datecourse` date NOT NULL,
  `typecourse` varchar(3) NOT NULL,
  `source` tinyint(4) NOT NULL,
  `destination` tinyint(4) NOT NULL,
  `details` varchar(500) NOT NULL,
  `plaque` varchar(9) NOT NULL,
  `contact` varchar(13) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_course`
--

INSERT INTO `t_course` (`idcourse`, `datecourse`, `typecourse`, `source`, `destination`, `details`, `plaque`, `contact`) VALUES
('KME20240723i071641', '2024-07-22', 'IMP', 3, 1, 'PRIVE', '3325AV05', '0990927948'),
('KME20240723i125951', '2024-07-23', 'IMP', 1, 3, 'xyz', '0001AA04', '0994152488');

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `idutilisateur` int(10) UNSIGNED NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telephone` varchar(13) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `idcheckpoint` int(10) UNSIGNED NOT NULL,
  `typecompte` tinytext NOT NULL,
  `motdepasse` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`idutilisateur`, `nom`, `email`, `telephone`, `photo`, `idcheckpoint`, `typecompte`, `motdepasse`) VALUES
(1, 'KASAMBA SENKI MARCEL', 'marcelkasamba@gmail.com', ' 243994152488', 'photo_id/WhatsApp Image 2024-03-18 at 21.42.17_b691e1ca.jpg', 1, 'SUA', '12345'),
(3, 'MULAJA K JOEL', 'mulajajoelm@gmail.com', '0990927948', 'photo_id/itmlogo.jpg', 3, 'SUA', '27948'),
(4, 'IMANI SHUKURU RUTH', '', '0900000100', 'photo_id/image_1449569_20240208_ob_6ff8a2_moyen-orient-carte.jpg', 2, 'SUP', 'AZERTY1'),
(5, 'LOMA BOKOTA NEHEMIE', 'l.bokota@yahoo.fr', ' 243854665482', 'photo_id/1000109205.jpg', 7, 'ADM', '12345'),
(7, 'AMANI RAUL', '', ' 243990922222', 'photo_id/dotted-spiral-vortex-royaltyfree-images-600w-2227567913.webp', 4, 'ADM', '123456'),
(8, 'BIMULOKO BITRIS', '', ' 24325825966', 'photo_id/dotted-spiral-vortex-royaltyfree-images-600w-2227567913.webp', 7, 'ADM', '123456');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_camion`
--
ALTER TABLE `t_camion`
  ADD PRIMARY KEY (`idcamion`);

--
-- Index pour la table `t_checkpoint`
--
ALTER TABLE `t_checkpoint`
  ADD PRIMARY KEY (`idcheckpoint`);

--
-- Index pour la table `t_course`
--
ALTER TABLE `t_course`
  ADD PRIMARY KEY (`idcourse`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`idutilisateur`),
  ADD KEY `idcheckpoint` (`idcheckpoint`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_camion`
--
ALTER TABLE `t_camion`
  MODIFY `idcamion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `t_checkpoint`
--
ALTER TABLE `t_checkpoint`
  MODIFY `idcheckpoint` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `idutilisateur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
