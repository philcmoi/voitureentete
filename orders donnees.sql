-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 17 août 2022 à 07:01
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
  `idtrajet` int DEFAULT '0',
  `idmembre` int DEFAULT '0',
  PRIMARY KEY (`order_number`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_number`, `conducteur`, `lieudepart`, `lieuarrive`, `participation`, `datedepart`, `datearrive`, `idtrajet`, `idmembre`) VALUES
(38, 'elan retrouve et moi', 'Paris', 'Bordeaux', 50, '2022-08-17 06:05:00', '2022-08-31 06:05:00', 0, 0),
(39, 'elan retrouve', 'Paris', 'Paris', 0, '2022-08-09 12:00:00', '2022-08-09 15:00:00', 0, 0),
(43, 'itinerer 2', 'Paris', 'Bordeaux', 50, '2022-08-09 09:23:00', '2022-09-01 09:23:00', 0, 0),
(52, 'Philippe', 'paris', 'pekin', 500, '2022-08-15 05:38:12', '2022-08-31 07:38:13', 0, 0),
(53, 'Philippe', 'paris', 'pekin', 500, '2022-08-15 05:38:12', '2022-08-31 07:38:13', 0, 0),
(54, 'philippe', 'Paris', 'Bordeaux', 50, '2022-08-15 08:49:00', '2022-08-21 08:49:00', 0, 0),
(55, 'elan retrouve', 'Paris', 'Paris', 0, '2022-08-09 12:00:00', '2022-08-09 15:00:00', 0, 0),
(56, 'itinerer 2', 'Paris', 'Bordeaux', 50, '2022-08-09 09:23:00', '2022-09-01 09:23:00', 0, 0),
(57, 'Philippe', 'Paris', 'Bordeux', 50, '2022-08-15 10:34:16', '2022-08-16 10:34:16', 0, 0),
(58, 'Elan Retrouve', 'Paris', 'Pekin', 200, '2022-08-15 08:36:45', '2022-08-31 10:36:45', 0, 0),
(59, 'Philippe', 'Paris', 'Nice', 50, '2022-08-15 08:48:59', '2022-08-31 10:48:59', 0, 0),
(60, 'Elan Retrouve', 'Paris', 'Pekin', 200, '2022-08-15 08:36:45', '2022-08-31 10:36:45', 0, 0),
(61, 'Philippe', 'Paris', 'Limoge', 50, '2022-08-15 12:31:27', '2022-08-31 14:31:27', 0, 0),
(62, 'Philippe', 'Paris', 'Troy', 10, '2022-08-15 12:41:04', '2022-08-31 14:41:05', 0, 0),
(64, 'Philippe', 'Paris', 'Limoge', 50, '2022-08-15 12:31:27', '2022-08-31 14:31:27', 0, 0),
(65, 'Philippe', 'Paris', 'Limoge', 50, '2022-08-15 12:31:27', '2022-08-31 14:31:27', 0, 0),
(66, 'Philippe', 'Paris', 'Berlin', 50, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(76, 'Philippe', 'Paris', 'Bordeaux', 50, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(77, 'Philippe', 'Paris', 'Bordeaux', 50, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(78, 'Elan Retrouve', 'Paris', 'Bordeaux', 50, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(81, 'Elan Retrouve 2', 'Paris', 'Pekin', 50, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(82, 'Elan Retrouve', 'Paris', 'Limoge', 50, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(86, 'Moi et mamam', 'Paris', 'Pekin', 500, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(107, 'Moi et mamam', 'Paris', 'Pekin', 500, '2022-08-09 09:23:00', '2022-09-09 09:23:00', 0, 0),
(111, 'DECONNECTE', 'Paris', 'Bordeaux', 50, '2022-08-17 06:55:00', '2022-08-31 06:55:00', 0, 0),
(109, 'elan retrouve', 'Paris', 'Bordeaux', 50, '2022-08-16 18:02:00', '2022-08-31 18:02:00', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
