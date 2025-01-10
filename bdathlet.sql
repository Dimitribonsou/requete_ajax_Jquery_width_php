-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 10 jan. 2025 à 03:32
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdathlet`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `IdCat` int NOT NULL AUTO_INCREMENT,
  `CodeCat` varchar(10) NOT NULL,
  `LibelleCat` varchar(60) NOT NULL,
  PRIMARY KEY (`IdCat`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`IdCat`, `CodeCat`, `LibelleCat`) VALUES
(1, 'VI', 'Vitesse'),
(2, 'ED', 'Endurance');

-- --------------------------------------------------------

--
-- Structure de la table `coureur`
--

DROP TABLE IF EXISTS `coureur`;
CREATE TABLE IF NOT EXISTS `coureur` (
  `NumC` int NOT NULL AUTO_INCREMENT,
  `NomPrenom` varchar(150) DEFAULT NULL,
  `sexe` char(1) NOT NULL,
  `age` varchar(10) NOT NULL,
  PRIMARY KEY (`NumC`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `coureur`
--

INSERT INTO `coureur` (`NumC`, `NomPrenom`, `sexe`, `age`) VALUES
(1, 'Mbarga Martin', 'M', '24 ans'),
(2, 'Bikoe Jeanette', 'F', '25 ans');

-- --------------------------------------------------------

--
-- Structure de la table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `IdCourse` int NOT NULL AUTO_INCREMENT,
  `CodeCourse` varchar(20) NOT NULL,
  `LibelleCourse` varchar(100) NOT NULL,
  `IdCat` int NOT NULL,
  PRIMARY KEY (`IdCourse`),
  KEY `IdCat` (`IdCat`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `course`
--

INSERT INTO `course` (`IdCourse`, `CodeCourse`, `LibelleCourse`, `IdCat`) VALUES
(1, '200mD', '200 mètres dame', 1),
(2, '100mH', '100 mètres homme', 1),
(3, '200mH', '200 mètres homme', 1),
(4, '500mH', '500 mètres homme ', 2),
(5, '1000mH', '1000 mètres homme', 2);

-- --------------------------------------------------------

--
-- Structure de la table `sprint`
--

DROP TABLE IF EXISTS `sprint`;
CREATE TABLE IF NOT EXISTS `sprint` (
  `IdSp` int NOT NULL AUTO_INCREMENT,
  `IdCourse` int NOT NULL,
  `NumC` int NOT NULL,
  `Rang` int NOT NULL,
  `TempsMis` time DEFAULT NULL,
  PRIMARY KEY (`IdSp`),
  KEY `IdCourse` (`IdCourse`),
  KEY `NumC` (`NumC`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `sprint`
--

INSERT INTO `sprint` (`IdSp`, `IdCourse`, `NumC`, `Rang`, `TempsMis`) VALUES
(1, 1, 2, 3, '00:04:57'),
(2, 2, 3, 3, '00:03:26'),
(3, 1, 1, 5, '01:15:00'),
(4, 3, 1, 1, '00:03:09'),
(5, 3, 2, 2, '00:04:09'),
(6, 4, 1, 2, '00:01:43'),
(7, 4, 2, 1, '00:01:09');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
