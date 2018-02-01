-- MySQL Script generated by MySQL Workbench
-- Sat Jul 15 17:25:17 2017
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
  `pouzitestroje` TINYINT NULL,
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
  `password` VARCHAR(255) NOT NULL,
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
  `stav` VARCHAR(25) NULL DEFAULT 'volné',
  `klient_id` INT NULL,
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
  `datumvyrizeni` DATE NULL DEFAULT '0000-00-00',
  `vyridil` VARCHAR(255) NULL,
  `predmetobjednavky` TEXT NOT NULL,
  `jakvyridil` VARCHAR(255) NULL,
  `cislo_obj_jejich` VARCHAR(10) NULL,
  `cislo_obj_nase` VARCHAR(10) NOT NULL,
  `klient_id` INT NOT NULL,
  `nabidka` TINYINT NULL DEFAULT 1,
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
  `skym` VARCHAR(45) NULL,
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


-- -----------------------------------------------------
-- Table `optimas`.`produkt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`produkt` ;

CREATE TABLE IF NOT EXISTS `optimas`.`produkt` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nazevproduktu` VARCHAR(255) NULL,
  `cena` INT NULL,
  `katalog_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `katalog_id_UNIQUE` (`katalog_id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `optimas`.`objednavka_has_produkt`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `optimas`.`objednavka_has_produkt` ;

CREATE TABLE IF NOT EXISTS `optimas`.`objednavka_has_produkt` (
  `objednavka_id` INT NOT NULL,
  `produkt_id` INT NOT NULL,
  `kolik` INT NULL DEFAULT 1,
  INDEX `fk_objednavka_has_produkt_produkt1_idx` (`produkt_id` ASC),
  INDEX `fk_objednavka_has_produkt_objednavka1_idx` (`objednavka_id` ASC),
  CONSTRAINT `fk_objednavka_has_produkt_objednavka1`
    FOREIGN KEY (`objednavka_id`)
    REFERENCES `optimas`.`objednavka` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_objednavka_has_produkt_produkt1`
    FOREIGN KEY (`produkt_id`)
    REFERENCES `optimas`.`produkt` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
