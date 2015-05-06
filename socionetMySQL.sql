-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 23 Avril 2015 à 15:11
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  'socionet'
--
CREATE DATABASE IF NOT EXISTS socionet DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE socionet;

-- --------------------------------------------------------

--
-- Structure de la table 'grantees'
--

CREATE TABLE IF NOT EXISTS grantees (
  idGrantee int(11) NOT NULL AUTO_INCREMENT,
  idTxtGranteeName int(11) NOT NULL,
  Pictogram varchar(50) NOT NULL,
  PRIMARY KEY (idGrantee),
  UNIQUE KEY Grantee (idTxtGranteeName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'institution_provides_ressource'
--

CREATE TABLE IF NOT EXISTS institution_provides_ressource (
  idInstitution int(11) NOT NULL,
  idRessource int(11) NOT NULL,
  PRIMARY KEY (idInstitution,idRessource),
  KEY idRessource (idRessource)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'institution_targets_grantee'
--

CREATE TABLE IF NOT EXISTS institution_targets_grantee (
  idInstitution int(11) NOT NULL,
  idGrantee int(11) NOT NULL,
  PRIMARY KEY (idInstitution,idGrantee),
  KEY idGrantee (idGrantee)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'institutions'
--

CREATE TABLE IF NOT EXISTS institutions (
  idInstitution int(11) NOT NULL AUTO_INCREMENT,
  InstitutionName varchar(100) NOT NULL,
  Address varchar(255) NOT NULL,
  GeoLocation varchar(100) NOT NULL,
  idTxtDescription int(11) NOT NULL,
  Logo varchar(50) DEFAULT NULL,
  Image varchar(50) DEFAULT NULL,
  PRIMARY KEY (idInstitution),
  KEY idDescription (idTxtDescription)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'languages'
--

CREATE TABLE IF NOT EXISTS languages (
  idLanguage varchar(2) NOT NULL,
  LanguageName varchar(25) NOT NULL,
  Enabled tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (idLanguage),
  UNIQUE KEY LanguageName (LanguageName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table 'languages'
--

INSERT INTO languages (idLanguage, LanguageName, Enabled) VALUES
('en', 'English', 1),
('es', 'Espagnol', 0),
('fr', 'Français', 0),
('it', 'Italiano', 1);

-- --------------------------------------------------------

--
-- Structure de la table 'phones'
--

CREATE TABLE IF NOT EXISTS phones (
  idPhone int(11) NOT NULL AUTO_INCREMENT,
  PhoneNumber varchar(25) NOT NULL,
  idInstitution int(11) NOT NULL,
  PRIMARY KEY (idPhone),
  KEY idInstitution (idInstitution)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'ressources'
--

CREATE TABLE IF NOT EXISTS ressources (
  idRessource int(11) NOT NULL AUTO_INCREMENT,
  idTxtRessourceName int(11) NOT NULL,
  Pictogram varchar(50) NOT NULL,
  PRIMARY KEY (idRessource),
  UNIQUE KEY RessourceName (idTxtRessourceName)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'schedules'
--

CREATE TABLE IF NOT EXISTS schedules (
  idSchedule int(11) NOT NULL AUTO_INCREMENT,
  idTxtDescription int(11) NOT NULL,
  idInstitution int(11) NOT NULL,
  idRessource int(11) DEFAULT NULL,
  Days tinyint(4) DEFAULT NULL COMMENT 'Anciennement SET(''Monday'',...''Sunday'')',
  StartTime time DEFAULT NULL,
  EndTime time DEFAULT NULL,
  StartDate date DEFAULT NULL,
  EndDate date DEFAULT NULL,
  PRIMARY KEY (idSchedule),
  KEY idInstitution (idInstitution),
  KEY idDescription (idTxtDescription),
  KEY idRessource (idRessource)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'texts'
--

CREATE TABLE IF NOT EXISTS texts (
  idText int(11) NOT NULL AUTO_INCREMENT,
  ShortDescription varchar(100) NOT NULL,
  PRIMARY KEY (idText)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table 'translations'
--

CREATE TABLE IF NOT EXISTS translations (
  idLanguage varchar(2) NOT NULL DEFAULT '',
  idText int(11) NOT NULL,
  Translation text NOT NULL,
  PRIMARY KEY (idLanguage,idText),
  KEY idTranslation (idText)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'user_manages_institution'
--

CREATE TABLE IF NOT EXISTS user_manages_institution (
  idUser int(11) NOT NULL,
  idInstitution int(11) NOT NULL,
  PRIMARY KEY (idUser,idInstitution),
  KEY idInstitution (idInstitution)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table 'users'
--

CREATE TABLE IF NOT EXISTS users (
  idUser int(11) NOT NULL AUTO_INCREMENT,
  Nickname varchar(25) NOT NULL,
  Pwd varchar(20) NOT NULL,
  `Status` enum('Nobody','Helpdesk','SuperUser','Admin') NOT NULL,
  PRIMARY KEY (idUser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table grantees
--
ALTER TABLE grantees
  ADD CONSTRAINT grantees_ibfk_1 FOREIGN KEY (idTxtGranteeName) REFERENCES `texts` (idText) ON DELETE CASCADE;

--
-- Contraintes pour la table institution_provides_ressource
--
ALTER TABLE institution_provides_ressource
  ADD CONSTRAINT institution_provides_ressource_ibfk_1 FOREIGN KEY (idInstitution) REFERENCES institutions (idInstitution) ON DELETE CASCADE,
  ADD CONSTRAINT institution_provides_ressource_ibfk_2 FOREIGN KEY (idRessource) REFERENCES ressources (idRessource);

--
-- Contraintes pour la table institution_targets_grantee
--
ALTER TABLE institution_targets_grantee
  ADD CONSTRAINT institution_targets_grantee_ibfk_1 FOREIGN KEY (idGrantee) REFERENCES grantees (idGrantee),
  ADD CONSTRAINT institution_targets_grantee_ibfk_2 FOREIGN KEY (idInstitution) REFERENCES institutions (idInstitution) ON DELETE CASCADE;

--
-- Contraintes pour la table institutions
--
ALTER TABLE institutions
  ADD CONSTRAINT institutions_ibfk_1 FOREIGN KEY (idTxtDescription) REFERENCES `texts` (idText) ON DELETE CASCADE;

--
-- Contraintes pour la table phones
--
ALTER TABLE phones
  ADD CONSTRAINT phones_ibfk_1 FOREIGN KEY (idInstitution) REFERENCES institutions (idInstitution) ON DELETE CASCADE;

--
-- Contraintes pour la table ressources
--
ALTER TABLE ressources
  ADD CONSTRAINT ressources_ibfk_1 FOREIGN KEY (idTxtRessourceName) REFERENCES `texts` (idText) ON DELETE CASCADE;

--
-- Contraintes pour la table schedules
--
ALTER TABLE schedules
  ADD CONSTRAINT schedules_ibfk_1 FOREIGN KEY (idInstitution) REFERENCES institutions (idInstitution) ON DELETE CASCADE,
  ADD CONSTRAINT schedules_ibfk_2 FOREIGN KEY (idTxtDescription) REFERENCES `texts` (idText);

--
-- Contraintes pour la table translations
--
ALTER TABLE translations
  ADD CONSTRAINT translations_ibfk_1 FOREIGN KEY (idLanguage) REFERENCES `languages` (idLanguage),
  ADD CONSTRAINT translations_ibfk_2 FOREIGN KEY (idText) REFERENCES `texts` (idText) ON DELETE CASCADE;

--
-- Contraintes pour la table user_manages_institution
--
ALTER TABLE user_manages_institution
  ADD CONSTRAINT user_manages_institution_ibfk_1 FOREIGN KEY (idUser) REFERENCES `users` (idUser) ON DELETE CASCADE,
  ADD CONSTRAINT user_manages_institution_ibfk_2 FOREIGN KEY (idInstitution) REFERENCES institutions (idInstitution) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
