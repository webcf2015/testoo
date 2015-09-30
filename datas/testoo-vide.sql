SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema testoo
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `testoo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `testoo` ;

-- -----------------------------------------------------
-- Table `testoo`.`droit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `testoo`.`droit` (
  `id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `ledroit` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testoo`.`utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `testoo`.`utilisateur` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lelogin` VARCHAR(60) NULL,
  `lepass` VARCHAR(64) NULL,
  `lemail` VARCHAR(150) NULL,
  `droit_id` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `lelogin_UNIQUE` (`lelogin` ASC),
  INDEX `fk_utilisateur_droit_idx` (`droit_id` ASC),
  CONSTRAINT `fk_utilisateur_droit`
    FOREIGN KEY (`droit_id`)
    REFERENCES `testoo`.`droit` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `testoo`.`article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `testoo`.`article` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `letitre` VARCHAR(120) NULL,
  `leslug` VARCHAR(120) NULL,
  `letexte` TEXT NULL,
  `ladate` DATETIME NULL,
  `utilisateur_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `leslug_UNIQUE` (`leslug` ASC),
  INDEX `fk_article_utilisateur1_idx` (`utilisateur_id` ASC),
  CONSTRAINT `fk_article_utilisateur1`
    FOREIGN KEY (`utilisateur_id`)
    REFERENCES `testoo`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
