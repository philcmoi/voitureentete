-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 20 août 2022 à 07:10
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
  `idtrajet` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_events_trajet1_idx` (`idtrajet`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

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
  `idmembre` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`order_number`),
  KEY `fk_orders_membre_idx` (`idmembre`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb3;

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
  `idmembre` int NOT NULL DEFAULT '0',
  `order_number` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`idtrajet`),
  KEY `fk_trajet_membre1_idx` (`idmembre`),
  KEY `fk_trajet_orders1_idx` (`order_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_membre` FOREIGN KEY (`idmembre`) REFERENCES `membre` (`idmembre`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `fk_trajet_orders1` FOREIGN KEY (`order_number`) REFERENCES `orders` (`order_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
