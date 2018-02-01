-- MySQL Script generated by MySQL Workbench
-- Sat Jul  1 09:33:52 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema optimas
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `optimas` ;

-- -----------------------------------------------------
-- Schema optimas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `optimas` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci ;
USE `optimas` ;

-- -----------------------------------------------------
-- Table `optimas`.`klient`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`klient` ;

CREATE TABLE IF NOT EXISTS `optimas`.`klient` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `kod_zakaznika` INT NOT NULL,
  `nazev_firmy` VARCHAR(255) NOT NULL,
  `zeme` VARCHAR(255) NOT NULL,
  `ulice` VARCHAR(255) NULL,
  `mesto` VARCHAR(255) NULL,
  `psc` VARCHAR(45) NULL,
  `telefon` VARCHAR(45) NULL,
  `fax` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `www` VARCHAR(255) NULL,
  `wimag` TINYINT NULL,
  `optimas` TINYINT NULL,
  `ziva` TINYINT NULL,
  `stavebni` TINYINT NULL,
  `obchodnik` TINYINT NULL,
  `poznamka` TEXT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `kod_zakaznika_UNIQUE` (`kod_zakaznika` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `optimas`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`user` ;

CREATE TABLE IF NOT EXISTS `optimas`.`user` (
  `username` VARCHAR(16) NOT NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(32) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP);


-- -----------------------------------------------------
-- Table `optimas`.`jednatel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`jednatel` ;

CREATE TABLE IF NOT EXISTS `optimas`.`jednatel` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titul` VARCHAR(45) NULL,
  `jmeno` VARCHAR(45) NULL,
  `prijmeni` VARCHAR(45) NOT NULL,
  `mobil` VARCHAR(45) NULL,
  `email` VARCHAR(255) NULL,
  `funkce` VARCHAR(255) NULL,
  `klient_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_jednatel_klient_idx` (`klient_id` ASC),
  CONSTRAINT `fk_jednatel_klient`
    FOREIGN KEY (`klient_id`)
    REFERENCES `optimas`.`klient` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `optimas`.`stroj`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`stroj` ;

CREATE TABLE IF NOT EXISTS `optimas`.`stroj` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `vyrobce` VARCHAR(45) NULL,
  `typ` VARCHAR(45) NULL,
  `vyrobnicislo` VARCHAR(45) NOT NULL,
  `rokvyroby` INT NULL,
  `poznamka` TEXT NULL,
  `stav` VARCHAR(25) NULL,
  `strojcol` VARCHAR(45) NULL,
  `klient_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_stroj_klient1_idx` (`klient_id` ASC),
  CONSTRAINT `fk_stroj_klient1`
    FOREIGN KEY (`klient_id`)
    REFERENCES `optimas`.`klient` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `optimas`.`objednavka`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`objednavka` ;

CREATE TABLE IF NOT EXISTS `optimas`.`objednavka` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datumobjednavky` DATE NOT NULL,
  `prijal` VARCHAR(255) NOT NULL,
  `datumvyrizeni` DATE NULL,
  `vyridil` VARCHAR(255) NULL,
  `predmetobjednavky` TEXT NOT NULL,
  `jakvyridil` VARCHAR(255) NULL,
  `cislo_obj_jejich` INT NULL,
  `cislo_obj_nase` INT NOT NULL,
  `klient_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_objednavka_klient1_idx` (`klient_id` ASC),
  CONSTRAINT `fk_objednavka_klient1`
    FOREIGN KEY (`klient_id`)
    REFERENCES `optimas`.`klient` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `optimas`.`jednani`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`jednani` ;

CREATE TABLE IF NOT EXISTS `optimas`.`jednani` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datumjednani` DATE NULL,
  `datumvyrizeni` DATE NULL,
  `kdojednal` VARCHAR(255) NULL,
  `kdovyridil` VARCHAR(255) NULL,
  `predmet_jednani` TEXT NULL,
  `klient_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_jednani_klient1_idx` (`klient_id` ASC),
  CONSTRAINT `fk_jednani_klient1`
    FOREIGN KEY (`klient_id`)
    REFERENCES `optimas`.`klient` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `optimas`.`dopravce`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`dopravce` ;

CREATE TABLE IF NOT EXISTS `optimas`.`dopravce` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nazev` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
