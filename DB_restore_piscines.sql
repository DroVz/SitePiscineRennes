-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 20 nov. 2022 à 12:24
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
-- Structure de la table `activite`
--

DROP TABLE IF EXISTS `activite`;
CREATE TABLE IF NOT EXISTS `activite` (
  `id_activite` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `reservation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_activite`),
  UNIQUE KEY `id_activite` (`id_activite`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`id_activite`, `libelle`, `description`, `reservation`) VALUES
(1, 'Nage libre', 'Accès aux bassins en toute autonomie, sans contrainte de temps', 0),
(2, 'Cours de natation débutant', 'Apprentissage de la natation sous la supervision d\'un professeur', 1),
(3, 'Cours de natation avancé', 'Approfondissement des techniques de natation sous la supervision d\'un professeur', 1),
(4, 'Aquagym', 'Découverte de l\'aquagym avec un professeur', 1),
(5, 'Bébés nageurs', 'Découverte du milieu aquatique pour un tout-petit (moins de 2 ans) accompagné d\'un adulte', 1),
(6, 'Cours particulier', 'Apprentissage de la natation pour une personne avec un professeur', 1);

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

DROP TABLE IF EXISTS `code`;
CREATE TABLE IF NOT EXISTS `code` (
  `id_code` int(11) NOT NULL AUTO_INCREMENT,
  `id_formule` int(11) NOT NULL,
  `date_generation` datetime NOT NULL,
  `code` char(8) COLLATE utf8_unicode_ci NOT NULL,
  `entrees_restantes` int(11) NOT NULL,
  PRIMARY KEY (`id_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `code_seance`
--

DROP TABLE IF EXISTS `code_seance`;
CREATE TABLE IF NOT EXISTS `code_seance` (
  `id_seance` int(11) NOT NULL,
  `id_code` int(11) NOT NULL,
  PRIMARY KEY (`id_seance`,`id_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `formule`
--

DROP TABLE IF EXISTS `formule`;
CREATE TABLE IF NOT EXISTS `formule` (
  `id_formule` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_activite` int(11) NOT NULL,
  `id_situation` int(11) NOT NULL,
  `nb_entrees` int(11) NOT NULL,
  `nb_personnes` int(11) NOT NULL,
  `duree_validite` int(11) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id_formule`),
  UNIQUE KEY `id_formule` (`id_formule`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `formule`
--

INSERT INTO `formule` (`id_formule`, `id_activite`, `id_situation`, `nb_entrees`, `nb_personnes`, `duree_validite`, `prix`) VALUES
(1, 1, 1, 10, 1, 12, 49.95),
(2, 1, 2, 10, 1, 12, 19.95),
(3, 1, 3, 10, 1, 12, 15.95),
(4, 1, 1, 10, 2, 12, 94.35),
(5, 1, 2, 10, 2, 12, 37.55),
(6, 1, 3, 10, 2, 12, 29.95),
(7, 2, 1, 10, 1, 12, 105.45),
(8, 2, 2, 10, 1, 12, 85.15),
(9, 2, 3, 10, 1, 12, 74.25),
(10, 2, 1, 20, 1, 18, 203),
(11, 2, 2, 20, 1, 18, 165),
(12, 2, 3, 20, 1, 18, 143),
(13, 3, 1, 10, 1, 12, 105.45),
(14, 3, 2, 10, 1, 12, 85.15),
(15, 3, 3, 10, 1, 12, 74.25),
(16, 3, 1, 20, 1, 18, 203),
(17, 3, 2, 20, 1, 18, 165),
(18, 3, 3, 20, 1, 18, 143),
(19, 4, 1, 10, 1, 12, 110),
(20, 4, 3, 10, 1, 12, 95),
(21, 5, 1, 1, 1, 6, 15.35),
(22, 5, 3, 1, 1, 6, 9.85),
(23, 5, 1, 5, 1, 12, 76.5),
(24, 5, 3, 5, 1, 12, 49.15),
(25, 6, 1, 5, 1, 12, 212),
(26, 6, 2, 5, 1, 12, 84),
(27, 6, 3, 5, 1, 12, 68);

-- --------------------------------------------------------

--
-- Structure de la table `piscine`
--

DROP TABLE IF EXISTS `piscine`;
CREATE TABLE IF NOT EXISTS `piscine` (
  `id_piscine` int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_piscine`),
  UNIQUE KEY `id_piscine` (`id_piscine`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `piscine`
--

INSERT INTO `piscine` (`id_piscine`, `nom`, `adresse`) VALUES
(1, 'Piscine Crébigny', '47 bis, rue des Maillots'),
(2, 'Piscine des Glaïeuls', '3, avenue Matthew Webb'),
(3, 'Piscine Saint-Doux', '36, rue du Papillon'),
(4, 'Piscine Villepierre', '1, rue Folle-bouée');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `id_seance` int(11) NOT NULL,
  `id_piscine` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL,
  `dateheure` datetime NOT NULL,
  `professeur` text COLLATE utf8_unicode_ci NOT NULL,
  `capacite` int(11) NOT NULL,
  PRIMARY KEY (`id_seance`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `id_piscine`, `id_activite`, `dateheure`, `professeur`, `capacite`) VALUES
(1, 1, 2, '2022-11-21 08:30:00', 'Bernard PAPILLON', 10),
(2, 1, 2, '2022-11-23 16:00:00', 'Bernard PAPILLON', 10),
(3, 1, 2, '2022-11-26 09:30:00', 'Bernard PAPILLON', 10),
(4, 1, 3, '2022-11-22 14:30:00', 'Sophie BRASSE', 10),
(5, 1, 4, '2022-11-23 10:00:00', 'Sophie BRASSE', 15),
(6, 1, 5, '2022-11-26 10:00:00', 'Héléna TASSION', 3),
(7, 1, 6, '2022-11-21 14:00:00', 'Héléna TASSION', 1),
(8, 1, 6, '2022-11-21 15:00:00', 'Héléna TASSION', 1),
(9, 1, 6, '2022-11-21 16:00:00', 'Héléna TASSION', 1),
(10, 1, 6, '2022-11-21 17:00:00', 'Héléna TASSION', 1),
(11, 1, 6, '2022-11-24 08:30:00', 'Héléna TASSION', 1),
(12, 1, 6, '2022-11-24 09:30:00', 'Héléna TASSION', 1),
(13, 1, 6, '2022-11-24 10:30:00', 'Héléna TASSION', 1),
(14, 1, 6, '2022-11-24 11:30:00', 'Héléna TASSION', 1),
(15, 1, 6, '2022-11-23 14:00:00', 'Stacy REINE', 1),
(16, 1, 6, '2022-11-23 15:00:00', 'Stacy REINE', 1),
(17, 1, 6, '2022-11-23 16:00:00', 'Stacy REINE', 1),
(18, 1, 6, '2022-11-23 17:00:00', 'Stacy REINE', 1),
(19, 1, 6, '2022-11-25 09:00:00', 'Stacy REINE', 1),
(20, 1, 6, '2022-11-25 10:00:00', 'Stacy REINE', 1),
(21, 1, 6, '2022-11-25 11:00:00', 'Stacy REINE', 1),
(22, 1, 6, '2022-11-25 13:00:00', 'Stacy REINE', 1),
(23, 1, 6, '2022-11-25 14:00:00', 'Stacy REINE', 1),
(24, 1, 6, '2022-11-25 15:00:00', 'Stacy REINE', 1),
(25, 2, 2, '2022-11-21 09:00:00', 'René NUFFARD', 12),
(26, 2, 2, '2022-11-22 09:00:00', 'René NUFFARD', 12),
(27, 2, 2, '2022-11-23 09:00:00', 'René NUFFARD', 12),
(28, 2, 2, '2022-11-24 09:00:00', 'René NUFFARD', 12),
(29, 2, 2, '2022-11-25 09:00:00', 'René NUFFARD', 12),
(30, 2, 2, '2022-11-26 08:30:00', 'René NUFFARD', 12),
(31, 2, 2, '2022-11-21 15:00:00', 'Armand CHOW', 12),
(32, 2, 2, '2022-11-22 15:00:00', 'Armand CHOW', 12),
(33, 2, 2, '2022-11-23 15:00:00', 'Armand CHOW', 12),
(34, 2, 2, '2022-11-24 15:00:00', 'Armand CHOW', 12),
(35, 2, 2, '2022-11-25 15:00:00', 'Armand CHOW', 12),
(36, 2, 2, '2022-11-26 09:30:00', 'Armand CHOW', 12),
(37, 2, 3, '2022-11-23 09:00:00', 'Armand CHOW', 10),
(38, 2, 3, '2022-11-25 10:30:00', 'Armand CHOW', 10),
(39, 2, 3, '2022-11-26 11:00:00', 'Armand CHOW', 10),
(40, 2, 4, '2022-11-24 10:00:00', 'Sophie BRASSE', 5),
(41, 3, 2, '2022-11-22 07:30:00', 'Arthur PLOUF', 8),
(42, 3, 2, '2022-11-22 08:30:00', 'Arthur PLOUF', 8),
(43, 3, 2, '2022-11-22 09:30:00', 'Arthur PLOUF', 8),
(44, 3, 2, '2022-11-22 10:30:00', 'Arthur PLOUF', 8),
(45, 3, 2, '2022-11-23 07:30:00', 'Arthur PLOUF', 8),
(46, 3, 2, '2022-11-23 08:30:00', 'Arthur PLOUF', 8),
(47, 3, 2, '2022-11-23 09:30:00', 'Arthur PLOUF', 8),
(48, 3, 2, '2022-11-23 10:30:00', 'Arthur PLOUF', 8),
(49, 3, 2, '2022-11-24 07:30:00', 'Arthur PLOUF', 8),
(50, 3, 2, '2022-11-24 08:30:00', 'Arthur PLOUF', 8),
(51, 3, 2, '2022-11-24 09:30:00', 'Arthur PLOUF', 8),
(52, 3, 2, '2022-11-24 10:30:00', 'Arthur PLOUF', 8),
(53, 3, 3, '2022-11-25 09:30:00', 'Arthur PLOUF', 8),
(54, 3, 3, '2022-11-25 10:30:00', 'Arthur PLOUF', 8),
(55, 3, 3, '2022-11-26 09:30:00', 'Arthur PLOUF', 8),
(56, 3, 3, '2022-11-26 10:30:00', 'Arthur PLOUF', 8),
(57, 3, 4, '2022-11-21 16:30:00', 'Sophie BRASSE', 10),
(58, 3, 4, '2022-11-25 15:30:00', 'Sophie BRASSE', 10),
(59, 3, 4, '2022-11-25 16:30:00', 'Sophie BRASSE', 10),
(60, 3, 5, '2022-11-25 09:30:00', 'Iris DOE', 4),
(61, 3, 5, '2022-11-26 09:30:00', 'Iris DOE', 4),
(62, 4, 2, '2022-11-22 10:30:00', 'Iris DOE', 10),
(63, 4, 2, '2022-11-22 15:30:00', 'Iris DOE', 10),
(64, 4, 2, '2022-11-23 10:30:00', 'Iris DOE', 10),
(65, 4, 2, '2022-11-23 15:30:00', 'Iris DOE', 10),
(66, 4, 2, '2022-11-24 10:30:00', 'Iris DOE', 10),
(67, 4, 2, '2022-11-24 15:30:00', 'Iris DOE', 10),
(68, 4, 3, '2022-11-21 13:30:00', 'Stacy REINE', 10),
(69, 4, 3, '2022-11-21 17:30:00', 'Stacy REINE', 10),
(70, 4, 3, '2022-11-22 13:30:00', 'Stacy REINE', 10),
(71, 4, 3, '2022-11-22 17:30:00', 'Stacy REINE', 10),
(72, 4, 3, '2022-11-24 13:30:00', 'Stacy REINE', 10),
(73, 4, 3, '2022-11-24 17:30:00', 'Stacy REINE', 10),
(74, 4, 6, '2022-11-21 09:30:00', 'Iris DOE', 1),
(75, 4, 6, '2022-11-21 10:30:00', 'Iris DOE', 1),
(76, 4, 6, '2022-11-21 11:30:00', 'Iris DOE', 1),
(77, 4, 6, '2022-11-22 09:30:00', 'Iris DOE', 1),
(78, 4, 6, '2022-11-22 10:30:00', 'Iris DOE', 1),
(79, 4, 6, '2022-11-22 11:30:00', 'Iris DOE', 1),
(80, 4, 6, '2022-11-24 09:30:00', 'Iris DOE', 1),
(81, 4, 6, '2022-11-24 10:30:00', 'Iris DOE', 1),
(82, 4, 6, '2022-11-24 11:30:00', 'Iris DOE', 1),
(83, 4, 6, '2022-11-23 09:30:00', 'Héléna TASSION', 1),
(84, 4, 6, '2022-11-23 10:30:00', 'Héléna TASSION', 1),
(85, 4, 6, '2022-11-23 11:30:00', 'Héléna TASSION', 1),
(86, 4, 6, '2022-11-23 09:30:00', 'Héléna TASSION', 1),
(87, 4, 6, '2022-11-25 10:30:00', 'Héléna TASSION', 1),
(88, 4, 6, '2022-11-25 11:30:00', 'Héléna TASSION', 1),
(89, 4, 6, '2022-11-25 09:30:00', 'Héléna TASSION', 1),
(90, 4, 6, '2022-11-25 10:30:00', 'Héléna TASSION', 1),
(91, 4, 6, '2022-11-25 11:30:00', 'Héléna TASSION', 1);

-- --------------------------------------------------------

--
-- Structure de la table `situation`
--

DROP TABLE IF EXISTS `situation`;
CREATE TABLE IF NOT EXISTS `situation` (
  `id_situation` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_situation`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `situation`
--

INSERT INTO `situation` (`id_situation`, `libelle`) VALUES
(1, 'Adulte'),
(2, 'Moins de 18 ans'),
(3, 'Demandeur d\'emploi');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `mot_de_passe` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
