-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 08 Octobre 2013 à 21:14
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `fff`
--
CREATE DATABASE IF NOT EXISTS `fff` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fff`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `loginAdmin` varchar(30) NOT NULL,
  `mdpAdmin` varchar(30) NOT NULL,
  `nomAdmin` varchar(30) NOT NULL,
  `prenomAdmin` varchar(30) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `loginAdmin`, `mdpAdmin`, `nomAdmin`, `prenomAdmin`) VALUES
(1, 'admin', 'admin', 'Admin1', 'Admin2'),
(2, 'toto', 'toto', 'Toto', 'Tata');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `NumCat` int(11) NOT NULL,
  `NomCat` varchar(10) NOT NULL,
  `AgeMinCat` int(11) NOT NULL,
  `AgeMaxCat` int(11) NOT NULL,
  PRIMARY KEY (`NumCat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`NumCat`, `NomCat`, `AgeMinCat`, `AgeMaxCat`) VALUES
(1, 'U7', 6, 7),
(2, 'U9', 8, 9),
(3, 'U11', 10, 11),
(4, 'U13', 12, 13),
(5, 'U15', 14, 15),
(6, 'U17', 16, 17),
(7, 'U19', 18, 20),
(8, 'U20', 21, 30),
(9, 'U21', 31, 40),
(10, 'U22', 41, 50),
(11, 'U23', 51, 60);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

CREATE TABLE IF NOT EXISTS `club` (
  `NumClub` int(11) NOT NULL AUTO_INCREMENT,
  `NomClub` varchar(30) NOT NULL,
  `AdresseClub` varchar(50) NOT NULL,
  `CPClub` int(5) NOT NULL,
  `VilleClub` varchar(30) NOT NULL,
  `TelClub` varchar(30) NOT NULL,
  `MailClub` varchar(30) NOT NULL,
  `imgClub` varchar(50) NOT NULL,
  PRIMARY KEY (`NumClub`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `club`
--

INSERT INTO `club` (`NumClub`, `NomClub`, `AdresseClub`, `CPClub`, `VilleClub`, `TelClub`, `MailClub`, `imgClub`) VALUES
(1, 'Association Sportive Nancy-Lor', '90 boulevard Jean Jaures', 54510, 'Tomblaine', '**.**.**.**.**', '****@****.**', 'images/asnl.png'),
(2, 'Football Club de Metz', '3 allée Saint Symphorien', 57000, 'Metz', '**.**.**.**.**', '****@****.**', 'images/fcmetz.png'),
(3, 'SAS Épinal', 'Chemin du chaperon Rouge', 88005, 'Épinal', '0123456789', '********@*******.**', 'images/epinal.png'),
(19, 'Testance 123', 'Test', 12346, 'a', '123456788', 'drgfv@dgf.coma', 'images/ph.png');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `NumIns` int(11) NOT NULL AUTO_INCREMENT,
  `DateDebutIns` date NOT NULL,
  `DateFinIns` date DEFAULT NULL,
  `idJou` int(11) NOT NULL,
  `NumClub` int(11) NOT NULL,
  PRIMARY KEY (`NumIns`),
  KEY `NumJou` (`idJou`,`NumClub`),
  KEY `NumClub` (`NumClub`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`NumIns`, `DateDebutIns`, `DateFinIns`, `idJou`, `NumClub`) VALUES
(6, '2009-12-18', '2010-12-18', 1, 3),
(7, '2010-12-18', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE IF NOT EXISTS `joueur` (
  `idJou` int(11) NOT NULL AUTO_INCREMENT,
  `NumJou` int(11) NOT NULL,
  `NomJou` varchar(30) NOT NULL,
  `PrenomJou` varchar(30) NOT NULL,
  `AdresseJou` varchar(50) NOT NULL,
  `CPJou` int(11) NOT NULL,
  `VilleJou` varchar(30) NOT NULL,
  `TelJou` int(11) NOT NULL,
  `MailJou` varchar(30) NOT NULL,
  `Date_NaissJou` date NOT NULL,
  `imgJou` varchar(30) NOT NULL,
  `NumCat` int(11) NOT NULL,
  `NumClub` int(11) NOT NULL,
  PRIMARY KEY (`idJou`),
  KEY `NumCat` (`NumCat`),
  KEY `NumCat_2` (`NumCat`),
  KEY `NumCat_3` (`NumCat`),
  KEY `NumCat_4` (`NumCat`),
  KEY `NumClub` (`NumClub`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `joueur`
--

INSERT INTO `joueur` (`idJou`, `NumJou`, `NomJou`, `PrenomJou`, `AdresseJou`, `CPJou`, `VilleJou`, `TelJou`, `MailJou`, `Date_NaissJou`, `imgJou`, `NumCat`, `NumClub`) VALUES
(1, 16, 'GREGORINI', 'Damien', '10 rue Jeanne d''Arc', 54000, 'Nancy', 635269854, '*****@***.**', '1979-03-02', 'images/gregorini.png', 9, 1),
(2, 17, 'CORNET', 'Maxwel', '9 rue de bar', 57000, 'Metz', 785682546, '*****@***.**', '1996-09-27', 'images/maxwell.png', 6, 2),
(3, 0, 'MICHELOT', 'Ludovic', '104 rue du parc', 88000, ' Épinal', 123456789, '************@*******@**', '1986-01-19', 'images/michelot.png', 6, 3),
(11, 1, 'Bli', 'bla', 'Blou', 12345, 'zera', 1234567890, 'erfds', '1970-01-01', 'images/phJ.png', 1, 1),
(15, 42, 'Testy', 'Test', '18 rue blabla', 12345, 'Zed', 123, 'fds@fsd.fr', '1970-01-01', 'images/phJ.png', 11, 1),
(16, 42, 'Test', 'Epinal', 'Testytest', 12345, 'Epinal', 123456789, 'rfgds@fdse.com', '1970-01-01', 'images/phJ.png', 1, 1),
(17, 8, 'uiè_hy', 'hyugi', 'dgvfr', 78, 'er', 21, 'u1', '1970-01-06', 'images/phJ.png', 1, 1);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`idJou`) REFERENCES `joueur` (`idJou`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscription_ibfk_3` FOREIGN KEY (`NumClub`) REFERENCES `club` (`NumClub`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD CONSTRAINT `joueur_ibfk_1` FOREIGN KEY (`NumCat`) REFERENCES `categorie` (`NumCat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `joueur_ibfk_2` FOREIGN KEY (`NumClub`) REFERENCES `club` (`NumClub`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
