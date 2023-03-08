-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 août 2022 à 12:07
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `philippe`
--

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `idtrajet` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_events_trajet_idx` (`idtrajet`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `idmembre` int NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `token` varchar(10000) NOT NULL,
  `password` varchar(10000) NOT NULL,
  PRIMARY KEY (`idmembre`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`idmembre`, `email`, `pseudo`, `token`, `password`) VALUES
(1, 'lhpp.philippe@gmail.com', 'phil', '1412598942', '$2y$10$wwYKexq8fvruxrCEW/ARgOB0uStKaJj/W4zJTUZiwMsUKIqSPf.9G'),
(2, 'wongfeyhong45@gmail.com', 'wfh', '1999020360', '$2y$10$EmCYxGPJB9PSeruaUsAna.vGQOpX8/xWNBHCmHKpaCgCQxA7QfxMW'),
(3, 'wongfeyhong1@gmail.com', 'ww', '1558004525', '$2y$10$A86PiVixTxzB2bgSDC83eevv3gmhlEfeOXHpYzqKEcdhs7rupU6Q6');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_number` int NOT NULL AUTO_INCREMENT,
  `conducteur` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lieudepart` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lieuarrive` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `participation` double NOT NULL,
  `datedepart` datetime NOT NULL,
  `datearrive` datetime NOT NULL,
  `idtrajet` int DEFAULT NULL,
  `idmembre` int DEFAULT NULL,
  PRIMARY KEY (`order_number`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_number`, `conducteur`, `lieudepart`, `lieuarrive`, `participation`, `datedepart`, `datearrive`, `idtrajet`, `idmembre`) VALUES
(52, 'elan retrouve et moi', 'Paris', 'Pekin', 500, '2022-08-18 09:31:00', '2022-08-31 09:31:00', NULL, NULL),
(55, 'elan retrouve 2', 'Paris', 'Bordeaux', 50, '2022-08-18 10:44:00', '2022-08-31 10:44:00', NULL, NULL),
(43, 'DECONNECTE', 'Paris', 'Pekin', 500, '2022-08-18 10:34:00', '2022-08-31 10:34:00', NULL, NULL),
(54, 'elan retrouve', 'Paris', 'Pekin', 500, '2022-08-18 09:34:00', '2022-08-18 09:34:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `idtrajet` int NOT NULL AUTO_INCREMENT,
  `intitule` varchar(255) DEFAULT NULL,
  `depart` varchar(255) DEFAULT NULL,
  `arrive` varchar(255) DEFAULT NULL,
  `idmembre` int DEFAULT NULL,
  PRIMARY KEY (`idtrajet`),
  KEY `fk_trajet_membre1_idx` (`idmembre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
