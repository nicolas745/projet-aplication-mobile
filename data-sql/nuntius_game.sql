-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 mars 2023 à 14:57
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
-- Base de données : `nuntius game`
--

-- --------------------------------------------------------

--
-- Structure de la table `ami_attent`
--

DROP TABLE IF EXISTS `ami_attent`;
CREATE TABLE IF NOT EXISTS `ami_attent` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_receveur` bigint(20) NOT NULL,
  `id_send` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_receveur` (`id_receveur`),
  KEY `id_send` (`id_send`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `blacklist`
--

DROP TABLE IF EXISTS `blacklist`;
CREATE TABLE IF NOT EXISTS `blacklist` (
  `id` bigint(20) NOT NULL,
  `id_who` bigint(20) NOT NULL,
  `id_blocker` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_who` (`id_who`),
  KEY `id_blocker` (`id_blocker`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE IF NOT EXISTS `jeux` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `url` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likejeux`
--

DROP TABLE IF EXISTS `likejeux`;
CREATE TABLE IF NOT EXISTS `likejeux` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_jeux` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jeux` (`id_jeux`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likeplatforme`
--

DROP TABLE IF EXISTS `likeplatforme`;
CREATE TABLE IF NOT EXISTS `likeplatforme` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_platforme` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_platforme` (`id_platforme`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `listamie`
--

DROP TABLE IF EXISTS `listamie`;
CREATE TABLE IF NOT EXISTS `listamie` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_ami2` bigint(20) NOT NULL,
  `id_ami1` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ami2` (`id_ami2`),
  KEY `id_ami1` (`id_ami1`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `listamie`
--

INSERT INTO `listamie` (`id`, `id_ami2`, `id_ami1`) VALUES
(3, 10, 9),
(4, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `text` text,
  `jour` date NOT NULL,
  `id_receveur` bigint(20) NOT NULL,
  `id_envoyeur` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_receveur` (`id_receveur`),
  KEY `id_envoyeur` (`id_envoyeur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `platforme`
--

DROP TABLE IF EXISTS `platforme`;
CREATE TABLE IF NOT EXISTS `platforme` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sex`
--

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sex`
--

INSERT INTO `sex` (`id`, `nom`, `url`) VALUES
(1, 'garçon', 'garcon.svg'),
(2, 'fille', 'fille.svg'),
(3, 'non binaire', 'nonbinaire.svg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `description` text,
  `e_mail` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `image` text,
  `id_sex` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `e_mail` (`e_mail`),
  KEY `id_sex` (`id_sex`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `description`, `e_mail`, `password`, `image`, `id_sex`) VALUES
(1, 'a', NULL, 'a@a.a', '86f7e437faa5a7fce15d1ddcb9eaeaea377667b8', NULL, 1),
(2, 'b', NULL, 'b@b.b', 'e9d71f5ee7c92d6dc9e92ffdad17b8bd49418f98', NULL, 2),
(3, 'c', NULL, 'c@c.c', '84a516841ba77a5b4648de2cd0dfcb30ea46dbb4', NULL, 3),
(7, 'd', NULL, 'd@d.d', '3c363836cf4e16666669a25da280a1865c2d2874', NULL, 3),
(8, 'p', NULL, 'p@p.p', '516b9783fca517eecbd1d064da2d165310b19759', NULL, 2),
(9, 'm', NULL, 'm@m.m', '6b0d31c0d563223024da45691584643ac78c96e8', NULL, 2),
(10, 't', NULL, 't@t.t', '8efd86fb78a56a5145ed7739dcb00c78581c5375', NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
