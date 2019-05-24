-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 mai 2019 à 21:12
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pirbddv1`
--

-- --------------------------------------------------------

--
-- Structure de la table `matériel`
--

DROP TABLE IF EXISTS `matériel`;
CREATE TABLE IF NOT EXISTS `matériel` (
  `id_materiel` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(64) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `poidsunitaire` int(11) DEFAULT NULL,
  `alertepoids` int(11) NOT NULL,
  PRIMARY KEY (`id_materiel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matériel`
--

INSERT INTO `matériel` (`id_materiel`, `nom`, `quantite`, `poidsunitaire`, `alertepoids`) VALUES
(0, 'poisson', 500, 5, 0),
(1, 'Diode', 20, 1, 0),
(2, 'Gaz', 50, 2, 0),
(3, 'Potentiomètre', 20, 2, 0),
(4, 'Fid', 70, 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `passageporte`
--

DROP TABLE IF EXISTS `passageporte`;
CREATE TABLE IF NOT EXISTS `passageporte` (
  `id_passage` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etud_id` int(11) NOT NULL,
  PRIMARY KEY (`id_passage`),
  KEY `etud_id` (`etud_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `prêt`
--

DROP TABLE IF EXISTS `prêt`;
CREATE TABLE IF NOT EXISTS `prêt` (
  `email` varchar(64) NOT NULL,
  `id_materiel` int(11) NOT NULL,
  `quantiteemprunt` int(11) NOT NULL,
  `duree_location` date NOT NULL,
  `id_pret` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pret`),
  UNIQUE KEY `id_materiel` (`id_materiel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `prêt`
--

INSERT INTO `prêt` (`email`, `id_materiel`, `quantiteemprunt`, `duree_location`, `id_pret`) VALUES
('lucas{', 1, 2, '2019-05-16', 1),
('fge', 6, 2, '2010-04-02', 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `etud_id` int(11) NOT NULL AUTO_INCREMENT,
  `autorisation_entree` tinyint(1) NOT NULL DEFAULT '1',
  `autorisation_emprunt` tinyint(1) NOT NULL DEFAULT '1',
  `Nom_etudiant` varchar(64) NOT NULL,
  `Prenom_Etudiant` varchar(64) NOT NULL,
  `mail_INSA` varchar(64) NOT NULL,
  `numetudiant` int(15) NOT NULL,
  PRIMARY KEY (`etud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`etud_id`, `autorisation_entree`, `autorisation_emprunt`, `Nom_etudiant`, `Prenom_Etudiant`, `mail_INSA`, `numetudiant`) VALUES
(1, 1, 1, 'Radureau', 'Lulu', 'lucas@lujcas', 0),
(15, 1, 1, 'Geoffroy', 'Floriane', 'fgeoffro', 25184),
(16, 1, 1, 'Geoffroy', 'Floriane', 'fgeoffro@etud.insa-toulouse.fr', 25184),
(17, 1, 1, 'Geoffroy', 'Floriane', 'fgeoffro@etud.insa-toulouse.fr', 25184),
(18, 1, 1, 'Geoffroy', 'Floriane', 'fgeoffro@etud.insa-toulouse.fr', 25184),
(19, 1, 1, '$nom', '$prenom', '$mail', 4),
(20, 1, 1, 'jii', 'iijj', 'hhh', 544554),
(21, 1, 1, 'geof', 'oui', 'fgeoffro@etud.insa-toulouse.fr', 58476);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
