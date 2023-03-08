-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 09 août 2022 à 07:33
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

-- DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_number` int NOT NULL AUTO_INCREMENT,
  `conducteur` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lieudepart` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lieuarrive` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `participation` double NOT NULL,
  `datedepart` datetime NOT NULL,
  `datearrive` datetime NOT NULL,
  PRIMARY KEY (`order_number`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_number`, `conducteur`, `lieudepart`, `lieuarrive`, `participation`, `datedepart`, `datearrive`) VALUES ('', 'elan retrouve', 'Paris', 'Paris', 0, '2022-08-09 12:00:00', '2022-08-09 15:00:00'), 
('', 'itinerer 2', 'Paris', 'Bordeaux', 50, '2022-08-09 09:23:00', '2022-09-01 09:23:00'); 
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
