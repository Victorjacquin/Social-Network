-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 29 mai 2022 à 19:02
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `client_professional`
--

DROP TABLE IF EXISTS `client_professional`;
CREATE TABLE IF NOT EXISTS `client_professional` (
  `ID_Client` int(11) NOT NULL,
  `ID_Professional` int(11) NOT NULL,
  PRIMARY KEY (`ID_Client`,`ID_Professional`),
  KEY `ID_Professionnal` (`ID_Professional`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client_professional`
--

INSERT INTO `client_professional` (`ID_Client`, `ID_Professional`) VALUES
(22, 6),
(15, 7),
(22, 7),
(27, 7),
(7, 8),
(14, 8),
(22, 8),
(7, 11),
(27, 11);

-- --------------------------------------------------------

--
-- Structure de la table `like_`
--

DROP TABLE IF EXISTS `like_`;
CREATE TABLE IF NOT EXISTS `like_` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Client` int(11) NOT NULL,
  `ID_Post` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_Client` (`ID_Client`),
  KEY `ID_Post` (`ID_Post`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `like_`
--

INSERT INTO `like_` (`ID`, `Date`, `ID_Client`, `ID_Post`) VALUES
(54, '2022-05-27 14:56:22', 13, 25),
(56, '2022-05-27 15:00:49', 24, 27),
(57, '2022-05-27 15:15:20', 24, 52),
(72, '2022-05-27 17:20:54', 7, 50),
(73, '2022-05-27 17:20:56', 7, 48),
(78, '2022-05-28 15:32:02', 7, 51),
(80, '2022-05-28 18:27:35', 27, 55),
(81, '2022-05-28 18:27:37', 27, 52),
(82, '2022-05-29 19:38:00', 7, 53);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `ID_Post` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(255) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_Professional` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_Post`),
  KEY `ID_Professionnal` (`ID_Professional`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`ID_Post`, `Libelle`, `Date`, `ID_Professional`) VALUES
(23, 'dd', '2022-05-16 15:38:56', 6),
(24, 'ddss', '2022-05-16 15:39:18', 6),
(25, 'ppk', '2022-05-16 15:52:50', 6),
(26, 'voici mon 1er post', '2022-05-16 16:01:58', 7),
(27, 'sas', '2022-05-16 16:28:50', 6),
(28, 'yycc', '2022-05-19 18:04:20', 6),
(29, 'yycc', '2022-05-19 18:04:23', 6),
(30, 'yyccbgbg', '2022-05-19 18:04:25', 6),
(31, 'oeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', '2022-05-19 18:04:51', 7),
(35, 'ss', '2022-05-19 18:20:53', 7),
(36, 'ee', '2022-05-19 19:17:00', 6),
(37, 'ee', '2022-05-19 19:18:22', 6),
(38, 'ee', '2022-05-19 19:27:22', 6),
(39, 'ee', '2022-05-19 19:27:51', 6),
(40, 'eee', '2022-05-19 19:27:53', 6),
(41, 'ee', '2022-05-19 19:28:19', 6),
(42, '1', '2022-05-19 19:28:44', 6),
(43, 'z', '2022-05-19 19:34:02', 6),
(45, '111', '2022-05-19 19:35:29', 6),
(46, 's', '2022-05-22 11:44:19', 6),
(47, 's', '2022-05-22 11:54:21', 6),
(48, 'zz', '2022-05-22 19:44:41', 6),
(49, 'zz', '2022-05-22 19:45:06', 6),
(50, 'nouveau', '2022-05-23 11:21:05', 6),
(51, 'aa', '2022-05-26 16:12:58', 7),
(52, 'llol', '2022-05-26 16:20:13', 6),
(53, 'a', '2022-05-26 16:25:15', 9),
(54, 'x', '2022-05-28 17:55:19', 6),
(55, 's', '2022-05-28 17:59:08', 10),
(56, 'r', '2022-05-28 18:25:10', 11);

-- --------------------------------------------------------

--
-- Structure de la table `user_client`
--

DROP TABLE IF EXISTS `user_client`;
CREATE TABLE IF NOT EXISTS `user_client` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_client`
--

INSERT INTO `user_client` (`ID`, `Pseudo`, `Email`, `Password`) VALUES
(7, 'Victor', 'ticvor.j@gmail.com', '4786f3282f04de5b5c7317c490c6d922'),
(13, 'dd', 'dd', '1aabac6d068eef6a7bad3fdf50a05cc8'),
(14, 'ee', 'ee', '08a4415e9d594ff960030b921d42b91e'),
(15, 'ddd', 'ddd', '77963b7a931377ad4ab5ad6a9cd718aa'),
(16, 'v', 'v', '9e3669d19b675bd57058fd4664205d2a'),
(17, 's', 's', 's'),
(18, 'zz', 'zz', 'zz'),
(19, 'ff', 'ff', 'ff'),
(20, 'aa', 'aa', 'aa'),
(21, 'bbb', 'bbb', 'bbb'),
(22, 'aaa', 'aaa', '47bce5c74f589f4867dbd57e9ca9f808'),
(24, 'rr', 'rr', '514f1b439f404f86f77090fa9edc96ce'),
(25, 'c', 'c', '4a8a08f09d37b73795649038408b5f33'),
(27, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Structure de la table `user_professional`
--

DROP TABLE IF EXISTS `user_professional`;
CREATE TABLE IF NOT EXISTS `user_professional` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_professional`
--

INSERT INTO `user_professional` (`ID`, `Pseudo`, `Email`, `Password`) VALUES
(6, 'pro', 'pro@a.fr', '1f0f70bf2b5ad94c7387e64c16dc455a'),
(7, 'pro2', 'pro2', '666bdb756f29cd99c79036421c7d21a4'),
(8, 'Victor', 'vv', 'vvv'),
(9, 'azaz', 'azaz', 'a9d3b34800d4283ed34b2bbbeb443a77'),
(10, 'pro3', 'pro3', '729cd29d8819dcdf8cbe42c342a4bda9'),
(11, 'pro4', 'pro4', '33727d4809d7f6461a5aafd580a76529'),
(12, 'pro5', 'pro5', '02aa5e2f3483dbdb52206a06414d4395');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client_professional`
--
ALTER TABLE `client_professional`
  ADD CONSTRAINT `client_professional_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `user_client` (`ID`),
  ADD CONSTRAINT `client_professional_ibfk_2` FOREIGN KEY (`ID_Client`) REFERENCES `user_client` (`ID`),
  ADD CONSTRAINT `client_professional_ibfk_3` FOREIGN KEY (`ID_Professional`) REFERENCES `user_professional` (`ID`);

--
-- Contraintes pour la table `like_`
--
ALTER TABLE `like_`
  ADD CONSTRAINT `like__ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `user_client` (`ID`),
  ADD CONSTRAINT `like__ibfk_2` FOREIGN KEY (`ID_Post`) REFERENCES `post` (`ID_Post`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`ID_Professional`) REFERENCES `user_professional` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
