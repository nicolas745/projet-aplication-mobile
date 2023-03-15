-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 08 mars 2023 à 19:54
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `e_mail` varchar(256) DEFAULT NULL,
  `password` varchar(256) NOT NULL,
  `id_sex` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `e_mail` (`e_mail`),
  KEY `id_sex` (`id_sex`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
