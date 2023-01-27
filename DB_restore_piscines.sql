-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 18 jan. 2023 à 15:20
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
-- Base de données : `piscines`
--

-- --------------------------------------------------------

--
-- Structure de la table `piscine`
--

DROP TABLE IF EXISTS `piscine`;
CREATE TABLE IF NOT EXISTS `piscine` (
  `id_piscine` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `image` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `map` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `descriptif` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_piscine`),
  UNIQUE KEY `id_piscine` (`id_piscine`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `piscine`
--

INSERT INTO `piscine` (`id_piscine`, `nom`, `adresse`, `actif`, `image`, `map`, `descriptif`) VALUES
(1, 'Piscine Crébigny', '47 bis, rue des Maillots', 1, 'view/img/Brequigny.webp', 'view/img/MapBrequigny.png', '  La piscine de Bréquigny vous proposes un cadre idéale pour la decouverte de la nage libre. <br>                         Notament grâce à son grand bassin de 50m de long. <br>                         Des plongeoirs y sont aussi installé pour les courageux d\'entre vous.'),
(2, 'Piscine des Glaïeuls', '3, avenue Matthew Webb', 1, 'view/img/Gayeulles.webp', 'view/img/MapGayeulles.png', '  La piscine des Gayeulles vous proposes un cadre idéale pour la decouverte de la nage libre. <br>                         Notament grâce à son grand bassin de 50m de long. <br>                         Des plongeoirs y sont aussi installé pour les courageux d\'entre vous.'),
(3, 'Piscine Saint-Doux', '36, rue du Papillon', 1, 'view/img/SaintGeorge.jpg', 'view/img/MapSaintGeorge.png', '  La piscine de Saint George vous proposes un cadre idéale pour la decouverte de la nage libre. <br>                         Notament grâce à son grand bassin de 50m de long. <br>                         Des plongeoirs y sont aussi installé pour les courageux d\'entre vous.'),
(4, 'Piscine Villepierre', '1, rue Folle-bouée', 1, 'view/img/VilleJean.webp', 'view/img/MapVilleJean.png', '  La piscine de Ville Jean vous proposes un cadre idéale pour la decouverte de la nage libre. <br>                         Notament grâce à son grand bassin de 50m de long. <br>                         Des plongeoirs y sont aussi installé pour les courageux d\'entre vous.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
