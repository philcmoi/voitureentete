-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema philippe
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema philippe
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `philippe` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `philippe` ;

-- -----------------------------------------------------
-- Table `philippe`.`membre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `philippe`.`membre` (
  `idmembre` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `pseudo` VARCHAR(100) NOT NULL,
  `token` VARCHAR(10000) NOT NULL,
  `password` VARCHAR(10000) NOT NULL,
  PRIMARY KEY (`idmembre`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `philippe`.`trajet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `philippe`.`trajet` (
  `idtrajet` INT NOT NULL AUTO_INCREMENT,
  `intitule` VARCHAR(255) NULL DEFAULT NULL,
  `depart` VARCHAR(255) NULL DEFAULT NULL,
  `arrive` VARCHAR(255) NULL DEFAULT NULL,
  `idmembre` INT NULL DEFAULT NULL,
  PRIMARY KEY (`idtrajet`),
  INDEX `fk_trajet_membre1_idx1` (`idmembre` ASC) VISIBLE,
  CONSTRAINT `fk_trajet_membre1`
    FOREIGN KEY (`idmembre`)
    REFERENCES `philippe`.`membre` (`idmembre`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `philippe`.`events`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `philippe`.`events` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_0900_ai_ci' NOT NULL,
  `lat` VARCHAR(255) NOT NULL,
  `lng` VARCHAR(255) NOT NULL,
  `idtrajet` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_events_trajet1_idx1` (`idtrajet` ASC) VISIBLE,
  CONSTRAINT `fk_events_trajet1`
    FOREIGN KEY (`idtrajet`)
    REFERENCES `philippe`.`trajet` (`idtrajet`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `philippe`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `philippe`.`orders` (
  `order_number` INT NOT NULL AUTO_INCREMENT,
  `conducteur` VARCHAR(100) CHARACTER SET 'utf8' NOT NULL,
  `lieudepart` VARCHAR(500) CHARACTER SET 'utf8' NOT NULL,
  `lieuarrive` VARCHAR(255) CHARACTER SET 'utf8' NOT NULL,
  `participation` DOUBLE NOT NULL,
  `datedepart` DATETIME NOT NULL,
  `datearrive` DATETIME NOT NULL,
  `idmembre` INT NULL DEFAULT NULL,
  PRIMARY KEY (`order_number`),
  INDEX `fk_orders_membre_idx` (`idmembre` ASC) VISIBLE,
  CONSTRAINT `fk_orders_membre`
    FOREIGN KEY (`idmembre`)
    REFERENCES `philippe`.`membre` (`idmembre`))
ENGINE = InnoDB
AUTO_INCREMENT = 71
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
