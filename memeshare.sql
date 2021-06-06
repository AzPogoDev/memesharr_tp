-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 06 juin 2021 à 19:17
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `memeshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(155) NOT NULL,
  `content` text NOT NULL,
  `memeId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `author`, `content`, `memeId`) VALUES
(1, 'Henri', 'Ces drole', 1),
(2, 'Anonyme', 'dsqdsqdsq', 3),
(3, 'Anonyme', 'Commentaire trop bien', 3),
(4, 'Anonyme', 'Deuxieme commentaire', 1),
(5, 'Anonyme', 'Beau meme', 6),
(6, 'Anonyme', 'tres beau', 1),
(7, 'Anonyme', '\'aime biuen', 3),
(8, 'Anonyme', 'j\'\"', 6);

-- --------------------------------------------------------

--
-- Structure de la table `meme`
--

DROP TABLE IF EXISTS `meme`;
CREATE TABLE IF NOT EXISTS `meme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(155) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `meme`
--

INSERT INTO `meme` (`id`, `author`, `img`) VALUES
(1, 'Henri', 'https://images.theconversation.com/files/177834/original/file-20170712-14488-19lw3sc.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop'),
(2, 'Dalil', 'https://www.sunset.com/wp-content/uploads/PLANT-MEME-BEAN-0120-1280x720.jpg'),
(3, 'Pierre', 'https://thecyphersagency.com/wp-content/uploads/2017/05/leo2.png'),
(11, 'Anonmye', 'http://urlme.me/success/typed_a_url/made_a_meme.jpg'),
(10, 'Anonmye', 'http://urlme.me/success/typed_a_url/made_a_meme.jpg'),
(6, 'Anonmye', 'https://www.codeur.com/blog/wp-content/uploads/2020/07/memes-700x525.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
