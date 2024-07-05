-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 juil. 2024 à 09:05
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ent`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `prenom`, `contact`, `email`, `password`) VALUES
(1, 'bah', 'ibrahim', 82071032, 'ba@gmail.com', '123');

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `idClasse` int NOT NULL AUTO_INCREMENT,
  `nomClasse` varchar(255) NOT NULL,
  `designationClasse` varchar(255) NOT NULL,
  `anneeScolaire` varchar(255) NOT NULL,
  `niveau` varchar(255) NOT NULL,
  PRIMARY KEY (`idClasse`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`idClasse`, `nomClasse`, `designationClasse`, `anneeScolaire`, `niveau`) VALUES
(1, 'AP', 'Analyse Programmation', '2002-2003', 'Licence 1'),
(2, 'IG', 'Informatique de gestion', '2002-2003', 'Licence 1'),
(3, 'EMI', 'Energie ', '2002-2003', 'Licence 1'),
(4, 'EMI', 'Energie ', '2002-2003', 'Licence 1');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `idCours` int NOT NULL AUTO_INCREMENT,
  `nomCours` varchar(255) NOT NULL,
  `credit` int DEFAULT NULL,
  `enseignant` int DEFAULT NULL,
  `horaire` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idCours`),
  KEY `enseignant` (`enseignant`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`idCours`, `nomCours`, `credit`, `enseignant`, `horaire`) VALUES
(1, 'Programmation c', 4, 2, '2h');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `nom`, `prenom`, `contact`, `email`, `password`) VALUES
(2, 'TOURE', 'Ibrahim', 1010202, 'toure@gmail.com', 'password1');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `id` int NOT NULL AUTO_INCREMENT,
  `matricule` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `datenaiss` date DEFAULT NULL,
  `dateInscription` date DEFAULT NULL,
  `classeETUDIANT` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id`, `matricule`, `nom`, `prenom`, `contact`, `email`, `password`, `datenaiss`, `dateInscription`, `classeETUDIANT`) VALUES
(1, '1452', 'ba', 'Mamadou', 76454119, 'ba6353158@gmail.com', 'Mamadou1234', NULL, NULL, NULL),
(2, 'kd02', 'Diallo', 'Kadidia', 82071032, 'kadi@gmail.com', '123', NULL, NULL, NULL),
(3, 'kd02', 'dayuif', 'sd', 99487923, 'sekou@gmail.com', '123', NULL, NULL, NULL),
(4, 'Ab12', 'coulibaly', 'abdoul', 82071032, 'abdoulaye@gmail.com', '123', NULL, NULL, NULL),
(5, 'DI24', 'DABO', 'ISSA', 20202024, 'Dabo1@gmail.com', '123456', NULL, NULL, NULL),
(6, 'DI24', 'DIA', 'awa', 44556677, 'DIALLO@gmail.com', 'password', NULL, NULL, NULL),
(7, 'M001', 'DIA', 'awa', 44556677, 'kadidi@gmail.com', 'password', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `montant` int NOT NULL,
  `datePaiement` date DEFAULT NULL,
  `matriculeEtudiant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `matriculeEtudiant` (`matriculeEtudiant`(250))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `numParent` int NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `parent`
--

INSERT INTO `parent` (`id`, `nom`, `prenom`, `numParent`, `email`, `password`) VALUES
(1, 'Ba', 'Abdoulaye', 76454119, 'abdoulaye@gmail.com', 'abdoul123'),
(2, 'bah', 'ibrahim', 82071032, 'ba@gmail.com', '123'),
(3, 'TRAORE', 'YAYA', 202223, 'yaya@gmail.com', '987654321'),
(4, 'DIALLO', 'seydou', 998877, 'DIALLO@gmail.com', 'passwordD'),
(5, 'cisse', 'ousmane', 77665544, 'cisse@gmail.com', 'passwordD'),
(6, 'cisse', 'ousmane', 77665544, 'cisse@gmail.com', 'passwordC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
