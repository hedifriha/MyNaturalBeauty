-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 30 Mars 2014 à 11:18
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
(84, 'limem', 'mohammed', 'mohamedlimem@yahoo.fr', '2014-03-03', 'love'),
(85, 'aifa', '', '', '', ''),
(86, '', '', '', '', ''),
(87, '', '', '', '', ''),
(88, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `note` double NOT NULL,
  `remarque` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=873 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `date`, `note`, `remarque`) VALUES
(41, 'limem', '2014-03-03', 2.5, 'je t aime'),
(50, 'rima', '2014-03-03', 2.56, 'bhima'),
(51, 'moh', '2586', 14, ''),
(54, '', '', 0, ''),
(55, '', '', 0, ''),
(74, 'limem', '', 0, ''),
(78, 'limem', '', 0, ''),
(547, 'moh', '', 0, ''),
(548, '', '', 0, ''),
(549, 'limem', '', 0, ''),
(857, '', '', 0, ''),
(858, '', '', 0, ''),
(859, '', '', 0, ''),
(860, '', '', 0, ''),
(861, '', '', 0, ''),
(862, '', '', 0, ''),
(863, '', '', 0, ''),
(864, '', '', 0, ''),
(865, '', '', 0, ''),
(866, '', '', 0, ''),
(867, '', '', 0, ''),
(868, '', '', 0, ''),
(869, '', '', 0, ''),
(870, '', '', 0, ''),
(871, 'oumyma', '217', 2.5, ''),
(872, '', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
