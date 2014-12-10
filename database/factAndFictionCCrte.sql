SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `factandfictionC` ;
CREATE SCHEMA IF NOT EXISTS `factandfictionC` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci ;
USE `factandfictionC` ;

-- -----------------------------------------------------
-- Table `factandfictionC`.`authors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`authors` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`authors` (
  `au_id` VARCHAR(11) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `au_lname` VARCHAR(40) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `au_fname` VARCHAR(20) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `phone` VARCHAR(12) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `address` VARCHAR(40) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `city` VARCHAR(20) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `state_id` VARCHAR(2) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `zip` VARCHAR(5) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`au_id`),
  INDEX `author_id` (`au_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;


-- -----------------------------------------------------
-- Table `factandfictionC`.`customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`customer` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`customer` (
  `c_id` INT(11) NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(255) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `password` VARCHAR(255) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `firstName` VARCHAR(45) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `lastName` VARCHAR(45) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE INDEX `Usersname_UNIQUE` (`userName` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;


-- -----------------------------------------------------
-- Table `factandfictionC`.`order`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`order` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`order` (
  `o_id` INT(11) NOT NULL AUTO_INCREMENT,
  `c_id` INT(11) NULL DEFAULT NULL,
  `checkedOut` TINYINT(1) NOT NULL DEFAULT '0',
  `lastUpdated` TIMESTAMP NOT NULL DEFAULT  CURRENT_TIMESTAMP ON UPDATE  CURRENT_TIMESTAMP,
  `salesTax` DECIMAL(13,2) NOT NULL DEFAULT '0.00',
  `shipping` DECIMAL(13,2) NOT NULL DEFAULT '0.00',
  `subTotal` DECIMAL(13,2) NOT NULL DEFAULT '0.00',
  `total` DECIMAL(13,2) NOT NULL DEFAULT '0.00',
  `dateAdded` DATETIME NOT NULL,
  PRIMARY KEY (`o_id`),
  INDEX `fk_order_customer1_idx` (`c_id` ASC),
  CONSTRAINT `fk_order_customer1`
    FOREIGN KEY (`c_id`)
    REFERENCES `factandfictionC`.`customer` (`c_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;


-- -----------------------------------------------------
-- Table `factandfictionC`.`states`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`states` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`states` (
  `state_id` VARCHAR(2) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `state_name` VARCHAR(50) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`state_id`),
  INDEX `state_id` (`state_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;


-- -----------------------------------------------------
-- Table `factandfictionC`.`publishers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`publishers` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`publishers` (
  `pub_id` VARCHAR(4) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `pub_name` VARCHAR(40) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `city` VARCHAR(20) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `state_id` VARCHAR(2) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `country` VARCHAR(30) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`pub_id`),
  INDEX `pub_id` (`pub_id` ASC),
  INDEX `fk_publishers_states1_idx` (`state_id` ASC),
  CONSTRAINT `fk_publishers_states1`
    FOREIGN KEY (`state_id`)
    REFERENCES `factandfictionC`.`states` (`state_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;


-- -----------------------------------------------------
-- Table `factandfictionC`.`titles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`titles` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`titles` (
  `title_id` VARCHAR(6) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `title` VARCHAR(80) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `pub_id` VARCHAR(4) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `au_id` VARCHAR(11) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `price` DECIMAL(19,4) NULL DEFAULT NULL,
  `notes` VARCHAR(200) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  `pubdate` DATETIME NULL DEFAULT NULL,
  `quantityOnHand` INT(11) NOT NULL DEFAULT '0',
  `unit` VARCHAR(45) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL DEFAULT 'each',
  `image` VARCHAR(100) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NULL DEFAULT NULL,
  PRIMARY KEY (`title_id`),
  INDEX `au_id` (`au_id` ASC),
  INDEX `pub_id` (`pub_id` ASC),
  INDEX `title_id` (`title_id` ASC),
  INDEX `fk_titles_publishers1_idx` (`pub_id` ASC),
  INDEX `fk_titles_authors1_idx` (`au_id` ASC),
  CONSTRAINT `fk_titles_publishers1`
    FOREIGN KEY (`pub_id`)
    REFERENCES `factandfictionC`.`publishers` (`pub_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_titles_authors1`
    FOREIGN KEY (`au_id`)
    REFERENCES `factandfictionC`.`authors` (`au_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;


-- -----------------------------------------------------
-- Table `factandfictionC`.`orderitem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`orderitem` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`orderitem` (
  `oi_id` INT(11) NOT NULL AUTO_INCREMENT,
  `o_id` INT(11) NOT NULL,
  `title_id` VARCHAR(6) CHARACTER SET 'latin1' COLLATE 'latin1_bin' NOT NULL,
  `quantity` INT(11) NOT NULL DEFAULT '1',
  `lastUpdate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE  CURRENT_TIMESTAMP,
  `dateAdded` DATETIME NOT NULL,
  PRIMARY KEY (`oi_id`),
  INDEX `fk_orderitem_order1_idx` (`o_id` ASC),
  INDEX `fk_orderitem_titles1_idx` (`title_id` ASC),
  CONSTRAINT `fk_orderitem_order1`
    FOREIGN KEY (`o_id`)
    REFERENCES `factandfictionC`.`order` (`o_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orderitem_titles1`
    FOREIGN KEY (`title_id`)
    REFERENCES `factandfictionC`.`titles` (`title_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1
COLLATE = latin1_bin;


-- -----------------------------------------------------
-- Table `factandfictionC`.`addressType`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`addressType` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`addressType` (
  `at_addressType` CHAR(1) NULL,
  `at_Description` VARCHAR(45) NOT NULL DEFAULT 'unknown',
  PRIMARY KEY (`at_addressType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `factandfictionC`.`custAddress`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`custAddress` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`custAddress` (
  `ca_id` INT NULL AUTO_INCREMENT,
  `c_id` INT NOT NULL,
  `ca_addressType` CHAR(1) NOT NULL DEFAULT 'b',
  `ca_streetAddress` VARCHAR(45) NOT NULL,
  `ca_city` VARCHAR(45) NOT NULL,
  `ca_state_id` VARCHAR(2) NOT NULL DEFAULT 'CA',
  `ca_zip` VARCHAR(10) NOT NULL,
  `ca_email` VARCHAR(100) NOT NULL,
  `ca_phone` VARCHAR(15) NULL,
  `ca_cell` VARCHAR(15) NULL,
  PRIMARY KEY (`ca_id`),
  INDEX `fk_custAddress_customer1_idx` (`c_id` ASC),
  INDEX `fk_custAddress_addressType1_idx` (`ca_addressType` ASC),
  CONSTRAINT `fk_custAddress_customer1`
    FOREIGN KEY (`c_id`)
    REFERENCES `factandfictionC`.`customer` (`c_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_custAddress_addressType1`
    FOREIGN KEY (`ca_addressType`)
    REFERENCES `factandfictionC`.`addressType` (`at_addressType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `factandfictionC`.`orderAddress`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `factandfictionC`.`orderAddress` ;

CREATE TABLE IF NOT EXISTS `factandfictionC`.`orderAddress` (
  `oa_id` INT NULL AUTO_INCREMENT,
  `o_id` INT NULL,
  `oa_addressType` CHAR(1) NOT NULL DEFAULT 'b',
  `oa_firstName` VARCHAR(45) NULL,
  `oa_lastName` VARCHAR(45) NULL,
  `oa_streetAddress` VARCHAR(45) NOT NULL,
  `oa_state_id` VARCHAR(2) NOT NULL DEFAULT 'CA',
  `oa_city` VARCHAR(45) NOT NULL,
  `oa_zip` VARCHAR(10) NOT NULL,
  `oa_phone` VARCHAR(15) NULL,
  `oa_email` VARCHAR(100) NOT NULL,
  `oa_cell` VARCHAR(15) NULL,
  PRIMARY KEY (`oa_id`),
  INDEX `fk_custAddress_addressType1_idx` (`oa_addressType` ASC),
  INDEX `fk_custAddress_o_id_idx` (`o_id` ASC),
  CONSTRAINT `fk_custAddress_addressType10`
    FOREIGN KEY (`oa_addressType`)
    REFERENCES `factandfictionC`.`addressType` (`at_addressType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_custAddress_o_id`
    FOREIGN KEY (`o_id`)
    REFERENCES `factandfictionC`.`order` (`o_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
