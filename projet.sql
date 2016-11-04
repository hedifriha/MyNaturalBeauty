-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 11 Mai 2014 à 15:34
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `contenu` varchar(5000) NOT NULL,
  `remarque` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `imge` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `authentifier`
--

CREATE TABLE IF NOT EXISTS `authentifier` (
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `authentifier`
--

INSERT INTO `authentifier` (`login`, `password`) VALUES
('admin', '123456');

-- --------------------------------------------------------

--
-- Structure de la table `centre`
--

CREATE TABLE IF NOT EXISTS `centre` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `region` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `site` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `numero` int(50) NOT NULL,
  `remarque` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `clic` int(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `remarque` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `email`, `date`, `remarque`) VALUES
(82, 'boukmicha', 'hajer', 'hajer.boukmcha@esprit.tn', '2014-03-03', 'rien'),
(84, 'limem', 'mohammed', 'mohamedlimem@yahoo.fr', '2014-03-03', 'lovehh'),
(85, 'aifa', '', '', '', ''),
(86, '', '', '', '', ''),
(87, '', '', '', '', ''),
(88, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `conseil`
--

CREATE TABLE IF NOT EXISTS `conseil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `contenu` varchar(5000) NOT NULL,
  `imge` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `imge` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `note` double NOT NULL,
  `remarque` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=892 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `imge`, `date`, `note`, `remarque`) VALUES
(10, 'dzvrubb', '', 'hivkhbljb', 88, '656'),
(25, 'qsd', '', '2014-03-03', 205, 'rien'),
(44, 'qsd', 'esprit.png', '2014-03-03', 2.5, 'eshbvvkdbs'),
(50, 'rima', '', '2014-03-03', 2.56, 'bhima'),
(51, 'moh', '', '2586', 14, ''),
(53, 'ki', 'a', 'mù', 0, 'm'),
(54, '', '', '', 0, ''),
(55, '', '', '', 0, ''),
(66, 'hajer', 'images/produits/Jellyfish.jpg', '2014-03-03', 19, 'je t aime'),
(74, 'limem', '', '', 0, ''),
(78, 'limem', '', '', 0, ''),
(82, 'qsd', '', '2014-03-03', 5, 'qsd'),
(84, 'hajerr', 'images/produits/06.jpg', '2014-03-03', 2.5, 'rien'),
(87, 'kl,l,', '', '458', 44641, 'eshbvvkdbs'),
(547, 'moh', '', '', 0, ''),
(548, '', '', '', 0, ''),
(549, 'limem', '', '', 0, ''),
(654, 'ezvskv', '', '855', 8484, 'eshbvvkdbs'),
(857, '', '', '', 0, ''),
(858, '', '', '', 0, ''),
(859, '', '', '', 0, ''),
(860, '', '', '', 0, ''),
(861, '', '', '', 0, ''),
(862, '', '', '', 0, ''),
(863, '', '', '', 0, ''),
(864, '', '', '', 0, ''),
(865, '', '', '', 0, ''),
(866, '', '', '', 0, ''),
(867, '', '', '', 0, ''),
(868, '', '', '', 0, ''),
(869, '', '', '', 0, ''),
(870, '', '', '', 0, ''),
(871, 'oumyma', '', '217', 2.5, ''),
(872, '', '', '', 0, ''),
(873, 'ho', 'images/produits/', '2014-03-03', 2.5, ''),
(874, 'rima', 'images/produits/', '1992-12-13', 0, ''),
(875, 'rien', 'images/produits/', '2014-03-03', 54, ''),
(876, 'hajz', 'images/produits/', '2014-03-03', 2.5, ''),
(877, 'chaffai', 'produits/', '2014-03-03', 3.8, ''),
(878, 'gjkb', 'produits', '2014-03-03', 57, ''),
(879, 'mùm', 'images/produits', '2014-03-03', 87, ''),
(880, 'dvsf', 'images/produits/', '2014-03-03', 25, ''),
(881, 'haf', 'images/produits/', '2014-03-03', 874, ''),
(882, 'hkll', 'images/produits/', '2014-03-03', 205, ''),
(883, 'a', 'images/produits/', 'a', 0, ''),
(884, 'h', '', '54', 52, ''),
(885, 'gh', '', '2014-03-03', 4.5, ''),
(886, 'mah', '', '2014-03-03', 20, ''),
(887, 'mah', '', '846548', 58, ''),
(888, 'mah', '', '846548', 58, ''),
(889, '', 'images/produits/', '', 0, ''),
(890, '', 'images/produits/', '', 0, ''),
(891, '', 'images/produits/', '', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `util`
--

CREATE TABLE IF NOT EXISTS `util` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `pays` varchar(50) NOT NULL,
  `age` int(50) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `util`
--

INSERT INTO `util` (`id`, `nom`, `prenom`, `pseudo`, `email`, `sexe`, `pays`, `age`, `password`) VALUES
(2, 'admin', 'admin', 'admin', 'admin@es.fr', '', 'tunisie', 25, 'azQSwx1278');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
