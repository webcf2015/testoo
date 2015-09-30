-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 30 Septembre 2015 à 16:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `testoo`
--
DROP DATABASE `testoo`;
CREATE DATABASE IF NOT EXISTS `testoo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `testoo`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `letitre` varchar(120) DEFAULT NULL,
  `leslug` varchar(120) DEFAULT NULL,
  `letexte` text,
  `ladate` datetime DEFAULT NULL,
  `utilisateur_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `leslug_UNIQUE` (`leslug`),
  KEY `fk_article_utilisateur1_idx` (`utilisateur_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `letitre`, `leslug`, `letexte`, `ladate`, `utilisateur_id`) VALUES
(3, 'dfg ertg', 'dfg-ertg', 'ert eftyrtuyè§! ', '0000-00-00 00:00:00', 1),
(4, 'rt ''"(trh zert', 'rt-trh-zert', 'eratsr''', '2015-05-01 23:15:30', 3),
(5, 'Bon c''est assez shitty...', 'bon-c-est-assez-shitty', 'Première fois que j''enregistre en me branchant sur des amplis simulé par le PC toussa...', '0000-00-00 00:00:00', 4);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ledroit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`id`, `ledroit`) VALUES
(1, 'Administrateur'),
(2, 'Modérateur'),
(3, 'rédacteur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lelogin` varchar(60) DEFAULT NULL,
  `lepass` varchar(64) DEFAULT NULL,
  `lemail` varchar(150) DEFAULT NULL,
  `droit_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lelogin_UNIQUE` (`lelogin`),
  KEY `fk_utilisateur_droit_idx` (`droit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `lelogin`, `lepass`, `lemail`, `droit_id`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', 1),
(2, 'modo', 'modo', 'modo@modo.com', 2),
(3, 'redac1', 'redac1', 'redac1@redac.com', 3),
(4, 'redac2', 'redac2', 'redac2@redac.com', 3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_droit` FOREIGN KEY (`droit_id`) REFERENCES `droit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
