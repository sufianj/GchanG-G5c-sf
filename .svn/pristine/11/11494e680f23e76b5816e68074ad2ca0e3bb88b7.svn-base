-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- G�n�r� le: Lun 20 Janvier 2014 � 20:26
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Base de donn�es: `gchang`
--
CREATE DATABASE IF NOT EXISTS `gchang` DEFAULT CHARACTER SET latin1 COLLATE latin1_bin;
USE `gchang`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAmin` int(8) NOT NULL AUTO_INCREMENT,
  `Nom` text COLLATE latin1_bin NOT NULL,
  `Contenu` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`idAmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(25) NOT NULL AUTO_INCREMENT,
  `NomCategorie` text COLLATE latin1_bin,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `categorieforum`
--

CREATE TABLE IF NOT EXISTS `categorieforum` (
  `idCategorieForum` int(8) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(30) COLLATE latin1_bin NOT NULL DEFAULT '',
  PRIMARY KEY (`idCategorieForum`,`Titre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(8) NOT NULL AUTO_INCREMENT,
  `Admin` int(1) NOT NULL,
  `Pseudo` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `Pwd` varchar(60) COLLATE latin1_bin NOT NULL,
  `AdresseMail` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `NomUtilisateur` varchar(15) COLLATE latin1_bin DEFAULT NULL,
  `PrenomUtilisateur` varchar(15) COLLATE latin1_bin DEFAULT NULL,
  `Sexe` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `DateInscription` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `NumRue` int(5) DEFAULT NULL,
  `Rue` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `CodePostal` int(5) DEFAULT NULL,
  `Ville` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `Pays` varchar(15) COLLATE latin1_bin DEFAULT NULL,
  `Lat` decimal(65,30) NOT NULL,
  `Lon` decimal(65,30) NOT NULL,
  `adresse` text COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commentobjet`
--

CREATE TABLE IF NOT EXISTS `commentobjet` (
  `idCommentObjet` int(8) NOT NULL AUTO_INCREMENT,
  `Commentaire` text COLLATE latin1_bin NOT NULL,
  `idUser` int(8) DEFAULT NULL,
  `idObjet` int(8) NOT NULL,
  `note` int(4) NOT NULL DEFAULT '3',
  PRIMARY KEY (`idCommentObjet`),
  KEY `idUser` (`idUser`),
  KEY `idObjet` (`idObjet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commentuser`
--

CREATE TABLE IF NOT EXISTS `commentuser` (
  `idCommentUser` int(8) NOT NULL AUTO_INCREMENT,
  `idUserCommentateur` int(8) DEFAULT NULL,
  `idUserCommente` int(8) NOT NULL,
  `Commentaire` text COLLATE latin1_bin NOT NULL,
  `note` int(4) NOT NULL DEFAULT '3',
  PRIMARY KEY (`idCommentUser`),
  KEY `idUserCommentateur` (`idUserCommentateur`),
  KEY `idUserCommente` (`idUserCommente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `conversationforum`
--

CREATE TABLE IF NOT EXISTS `conversationforum` (
  `idConversationForum` int(8) NOT NULL AUTO_INCREMENT,
  `TitreConv` varchar(30) COLLATE latin1_bin NOT NULL,
  `TitreCategorieForum` varchar(30) COLLATE latin1_bin NOT NULL,
  `Pseudo` varchar(10) COLLATE latin1_bin NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `StatutTopic` int(1) NOT NULL,
  PRIMARY KEY (`idConversationForum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `messageforum`
--

CREATE TABLE IF NOT EXISTS `messageforum` (
  `idMessageForum` int(25) NOT NULL AUTO_INCREMENT,
  `idConversationForum` int(8) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Pseudo` varchar(10) COLLATE latin1_bin NOT NULL,
  `Contenu` longtext COLLATE latin1_bin NOT NULL,
  `StatutMessageForum` int(1) NOT NULL,
  PRIMARY KEY (`idMessageForum`),
  KEY `idConversationForum` (`idConversationForum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `messageoperation`
--

CREATE TABLE IF NOT EXISTS `messageoperation` (
  `idMessageOperation` int(8) NOT NULL AUTO_INCREMENT,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(8) DEFAULT NULL,
  `Pseudo` varchar(10) COLLATE latin1_bin NOT NULL,
  `idObjet` int(8) NOT NULL,
  `Message` varchar(300) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`idMessageOperation`),
  KEY `idUser` (`idUser`),
  KEY `idOperation` (`idObjet`),
  KEY `Pseudo` (`Pseudo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `notifoperation`
--

CREATE TABLE IF NOT EXISTS `notifoperation` (
  `idNotif` int(8) NOT NULL AUTO_INCREMENT,
  `idObjet` int(8) NOT NULL,
  `idUser` int(8) NOT NULL,
  PRIMARY KEY (`idNotif`),
  KEY `idObjet` (`idObjet`),
  KEY `idUser` (`idUser`),
  KEY `idUser_2` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

CREATE TABLE IF NOT EXISTS `objet` (
  `idObjet` int(8) NOT NULL AUTO_INCREMENT,
  `TitreObjet` varchar(25) COLLATE latin1_bin DEFAULT NULL,
  `idUtilisateur` int(8) DEFAULT NULL,
  `TypeOperation` varchar(10) COLLATE latin1_bin DEFAULT NULL,
  `DescriptionObjet` longtext COLLATE latin1_bin NOT NULL,
  `idCategorie` int(8) NOT NULL,
  `idGrosseCat` int(11) NOT NULL,
  `PseudoProprio` varchar(15) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`idObjet`),
  KEY `idUtilisateur` (`idUtilisateur`),
  KEY `idCategorie` (`idCategorie`),
  KEY `idGrosseCat` (`idGrosseCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Structure de la table `subcategorie`
--

CREATE TABLE IF NOT EXISTS `subcategorie` (
  `idSubCategorie` int(8) NOT NULL AUTO_INCREMENT,
  `NomSubCategorie` text COLLATE latin1_bin NOT NULL,
  `CategorieAssocie` text COLLATE latin1_bin NOT NULL,
  `idCategorieAssocie` int(25) NOT NULL,
  PRIMARY KEY (`idSubCategorie`),
  KEY `idCategorieAssocie` (`idCategorieAssocie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Contraintes pour les tables export�es
--

--
-- Contraintes pour la table `commentobjet`
--
ALTER TABLE `commentobjet`
  ADD CONSTRAINT `commentobjet_ibfk_1` FOREIGN KEY (`idObjet`) REFERENCES `objet` (`idObjet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentobjet_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `client` (`idClient`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentuser`
--
ALTER TABLE `commentuser`
  ADD CONSTRAINT `commentuser_ibfk_1` FOREIGN KEY (`idUserCommentateur`) REFERENCES `client` (`idClient`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `commentuser_ibfk_2` FOREIGN KEY (`idUserCommente`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messageforum`
--
ALTER TABLE `messageforum`
  ADD CONSTRAINT `messageforum_ibfk_1` FOREIGN KEY (`idConversationForum`) REFERENCES `categorieforum` (`idCategorieForum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messageoperation`
--
ALTER TABLE `messageoperation`
  ADD CONSTRAINT `messageoperation_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messageoperation_ibfk_2` FOREIGN KEY (`idObjet`) REFERENCES `objet` (`idObjet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notifoperation`
--
ALTER TABLE `notifoperation`
  ADD CONSTRAINT `notifoperation_ibfk_1` FOREIGN KEY (`idObjet`) REFERENCES `objet` (`idObjet`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifoperation_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `client` (`idClient`) ON DELETE CASCADE;

--
-- Contraintes pour la table `objet`
--
ALTER TABLE `objet`
  ADD CONSTRAINT `objet_ibfk_4` FOREIGN KEY (`idUtilisateur`) REFERENCES `client` (`idClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `subcategorie`
--
ALTER TABLE `subcategorie`
  ADD CONSTRAINT `subcategorie_ibfk_1` FOREIGN KEY (`idCategorieAssocie`) REFERENCES `categorie` (`idCategorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contenu de la table `admin`
--

  
INSERT INTO `admin` (`idAmin`, `Nom`, `Contenu`) VALUES
(1, 'cgu', ''),
(2, 'qsn', '   <h1>Qui sommes-nous?</h1> <br /><br />\r\n\r\n        Gchang.com est un site de petites annonces qui part d''une idée simple : mettre en contact les vendeurs, donneurs, échangeur, troqueur et, les personnes désirant faire de bonnes affaires.<br /><br />\r\n           \r\n        Sur Gchang.com, déposer une annonce vous prendra 2 minutes. Vous choisissez le type de transaction parmis don, troc, prêt et location. Sélectionnez une catégorie puis saisissez le texte de votre annonce. <br />\r\n        Remplissez le formulaire d''inscription afin d''être informé de l''état de vos annonces et clients potentiels: c''est simple, efficace et en plus totalement gratuit.<br />\r\n        Gchang.com est un site généraliste. Vous pouvez déposer des annonces dans de nombreuses catégories. <br />\r\n        Pour plus d''informations, vous pouvez également consulter la listes des questions / réponses sur le forum. <br /><br />\r\n\r\n        A bientôt sur gchang.com <br />\r\n        Cordialement,<br />\r\n        L''équipe GchanG '),
(3, 'contact', '   <h1>Service clientèle</h1>\r\n        Pour toute question, n''hésitez pas à rechercher une réponse à votre question en utilisant le forum mis a votre disposition.\r\n        Pour un signalement d''un abus, envoyez un mail depuis la page aide <br />\r\n        Nous restons à votre écoute.<br /><br />\r\n        Cordialement, <br />\r\n        L''équipe Gchang ');

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `NomCategorie`) VALUES
(1, 'Cuisine'),
(2, 'Salle de Bain'),
(3, 'Sport'),
(4, 'Transports'),
(5, 'Immobilier'),
(6, 'Livres');

--
-- Contenu de la table `categorieforum`
--

INSERT INTO `categorieforum` (`idCategorieForum`, `Titre`) VALUES
(1, 'Général'),
(2, 'Autre');

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `Admin`, `Pseudo`, `Pwd`, `AdresseMail`, `NomUtilisateur`, `PrenomUtilisateur`, `Sexe`, `DateNaissance`, `DateInscription`, `NumRue`, `Rue`, `CodePostal`, `Ville`, `Pays`, `Lat`, `Lon`, `adresse`) VALUES
(1, 1, 'Admin', 'Admin', 'admin@admin', 'Admin', NULL, NULL, NULL, '2014-01-17 10:31:15', NULL, NULL, NULL, NULL, NULL, '0.000000000000000000000000000000', '0.000000000000000000000000000000', ''),
(3, 0, 'Obama', '12az&', 'obama_barack@hotmail.com', 'Barack', 'Obama', 'masculin', '1980-01-23', '2014-01-17 10:32:29', NULL, NULL, NULL, NULL, NULL, '40.714352800000000000000000000000', '-74.005973100000000000000000000000', 'New york'),
(4, 0, 'Francois', '12az&', 'francois.hollande@elysee', 'Hollande', 'Francois', 'masculin', '1980-01-14', '2014-01-17 10:44:35', NULL, NULL, NULL, NULL, NULL, '48.856614000000000000000000000000', '2.352221900000017700000000000000', 'paris'),
(5, 0, 'Angela', '12az&', 'angela.merkel@hotmail.com', 'Angela', 'Merkel', 'feminin', '1970-01-11', '2014-01-17 10:46:57', NULL, NULL, NULL, NULL, NULL, '52.520006599999990000000000000000', '13.404953999999975000000000000000', 'Berlin'),
(6, 0, 'Vlad', '12az&', 'vlad@poutine', 'Poutine', 'Vladimir', 'masculin', '1975-12-06', '2014-01-17 10:49:52', NULL, NULL, NULL, NULL, NULL, '55.755826000000000000000000000000', '37.617300000000000000000000000000', 'Moscou'),
(9, 0, 'Zak', '12az&', 'za@az', 'zakia', 'nom', 'feminin', '2014-01-22', '2014-01-20 16:18:27', NULL, NULL, NULL, NULL, NULL, '48.843458100000010000000000000000', '2.331225200000062600000000000000', 'rue notre dame des champs');

--
-- Contenu de la table `objet`
--

INSERT INTO `objet` (`idObjet`, `TitreObjet`, `idUtilisateur`, `TypeOperation`, `DescriptionObjet`, `idCategorie`, `idGrosseCat`, `PseudoProprio`) VALUES
(1, 'Chocobon', 6, 'Don', 'Un paquet de chocobon gagné lors d''une brocante, mais je n''aime pas le chocolat', 15, 1, 'Vlad'),
(2, 'Lot de Serviette', 6, 'Troc', 'J''ai un lot de serviette dont les couleurs ne me conviennent pas, j''aimerais les échanger', 4, 2, 'Vlad'),
(3, 'Maison', 6, 'Location', 'Maison de campagne très agréable je la loue pendant les vacances', 17, 5, 'Vlad'),
(4, 'Livres de Boris Akounine', 6, 'Pret', 'Très bons romans policiers, d''un très bon auteur', 25, 6, 'Vlad'),
(5, 'Raquette de tennis', 3, 'Don', 'Magnifique raquette assez utilisée mais en parfait état', 13, 3, 'Obama'),
(6, 'Ferrari', 3, 'Location', 'Voiture dont je n''ai plus utilité, je la loue à un prix dérisoire', 3, 4, 'Obama'),
(7, 'Collection Asterix et Obe', 3, 'Troc', 'La collection de Bande dessiné d''Asterix et Obelix que je troc contre une autre collection....', 27, 6, 'Obama'),
(8, 'Appartement New York', 3, 'Pret', 'je prête mon appartement pendant mes vacances, il donne sur un parc ce qui lui offre une très belle vue', 19, 5, 'Obama'),
(9, 'Kit de maquillage', 5, 'Don', 'Kit de maquillage très complet et jamais utilisé auparavant.', 9, 2, 'Angela'),
(10, 'Four micro ondes', 5, 'Location', 'Four à micro ondes, facile d''utilisation mais de contenance limitée, devenus trop petit pour mes besoins.', 7, 1, 'Angela'),
(11, 'Table de cuisine', 5, 'Troc', 'Table de cuisine stylisée je cherche à l''échanger contre une table plus grande', 7, 1, 'Angela'),
(12, 'Vélo de course VTT', 5, 'Pret', 'Je prête mon vélo de course type VTT', 5, 4, 'Angela'),
(13, 'Ballon de foot', 4, 'Don', 'Ballon de foot utilisé lors de la coupe du monde en 2010', 11, 3, 'Francois'),
(14, 'Macarons', 4, 'Troc', 'Boite de macarons de La Durée, mais comme je n''aime pas les macarons je désire les échanger contre d''autres patisseries', 15, 1, 'Francois'),
(16, 'Maison de campagne', 4, 'Location', 'Petite maison plein de charme à une heure de Paris', 17, 5, 'Francois'),
(17, 'Collection Harry Potter', 4, 'Pret', 'Je prête la collection complète des Harry Potter en Anglais', 23, 6, 'Francois'),
(18, 'Whisky', 5, 'Don', 'Belle bouteille de Whisky incluant deux verres, mais je n''aima pas cette boisson', 15, 1, 'Angela'),
(19, 'Ballon rugby', 6, 'Troc', 'Magnifique ballon de rugby en cuir, je le troc contre un ballon de foot', 11, 3, 'Vlad'),
(20, 'petit frigo', 3, 'Location', 'Tout petit frigo, pratique à placer dans un bureau', 7, 1, 'Obama'),
(21, 'montre', 9, 'Don', 'Jolie montre', 6, 3, 'Zak');

--
-- Contenu de la table `subcategorie`
--

INSERT INTO `subcategorie` (`idSubCategorie`, `NomSubCategorie`, `CategorieAssocie`, `idCategorieAssocie`) VALUES
(1, 'Voitures', 'Transports', 4),
(2, 'Vélos', 'Transports', 4),
(3, 'Equipements', 'Cuisine', 1),
(4, 'Produits', 'Salle de Bain', 2),
(5, 'Ballons', 'Sport', 3),
(6, 'Raquettes', 'Sport', 3),
(7, 'Nouriture', 'Cuisine', 1),
(8, 'Maisons', 'Immobilier', 5),
(9, 'Appartements', 'Immobilier', 5),
(10, 'Jeunesse', 'Livres', 6),
(11, 'Ado', 'Livres', 6),
(12, 'Adultes', 'Livres', 6),
(13, 'BD', 'Livres', 6);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
