-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 25 Juin 2020 à 15:21
-- Version du serveur :  5.7.30-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `twe_times-up`
--

-- --------------------------------------------------------

--
-- Structure de la table `Game`
--

CREATE TABLE `Game` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clef primaire',
  `pointsLimit` int(10) UNSIGNED DEFAULT NULL COMMENT 'Limite de points à atteindre pour finir la partie',
  `duration` int(10) UNSIGNED DEFAULT NULL COMMENT 'Durée maximale d''un round en secondes',
  `token` varchar(100) NOT NULL COMMENT 'token pour rejoindre les parties',
  `idWord` int(10) UNSIGNED DEFAULT NULL COMMENT 'id du mot devant être deviné en ce moment',
  `categorie` enum('animal','acteur','objet') DEFAULT NULL COMMENT 'la catégorie chosiie pour la partie',
  `playingUserId` int(10) UNSIGNED DEFAULT NULL COMMENT 'id du joueur en train de faire deviner son mot'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Game`
--

INSERT INTO `Game` (`id`, `pointsLimit`, `duration`, `token`, `idWord`, `categorie`, `playingUserId`) VALUES
(1, 30, 30, '1138220620', 3, 'acteur', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clef primaire',
  `pseudo` varchar(100) NOT NULL COMMENT 'pseudo du joueur',
  `points` int(10) UNSIGNED DEFAULT NULL COMMENT 'nombre de points du joueur',
  `manager` tinyint(1) DEFAULT NULL COMMENT '1 s''il a créé la partie, 0 sinon',
  `idGame` int(10) UNSIGNED DEFAULT NULL COMMENT 'id de la partie dans laquelle est le joueur',
  `avatar` enum('bear','beaver','cat','deer','dog2','dog','elephant','fox','horse','monkey','mouse','panda','pig','rabbit','racoon','zebra') DEFAULT NULL COMMENT 'le nom de l''avatar de l''utilisateur'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `User`
--

INSERT INTO `User` (`id`, `pseudo`, `points`, `manager`, `idGame`, `avatar`) VALUES
(1, 'Dergawi', 1, 0, 1, 'deer'),
(2, 'Alvin', 3, 0, 1, 'fox'),
(3, 'Erik', 0, 1, 1, 'pig'),
(4, 'Ashka', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `WordToGuess`
--

CREATE TABLE `WordToGuess` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'clef primaire',
  `categorie` varchar(100) NOT NULL COMMENT 'catégorie à laquelle appartient le mot',
  `value` varchar(100) NOT NULL COMMENT 'mot à faire deviner'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cette table est l''archive des mots utilisées dans les partie';

--
-- Contenu de la table `WordToGuess`
--

INSERT INTO `WordToGuess` (`id`, `categorie`, `value`) VALUES
(1, 'acteur', 'Jean Dujardin'),
(2, 'acteur', 'Marilyn Monroe'),
(3, 'acteur', 'Jim Carrey'),
(4, 'animal', 'Chien'),
(5, 'animal', 'Girafe'),
(6, 'animal', 'Lion'),
(7, 'objet', 'Chaise'),
(8, 'objet', 'Économe'),
(9, 'objet', 'Marteau'),
(10, 'objet', 'Poivrière'),
(11, 'acteur', 'Angelina Jolie'),
(12, 'animal', 'Chèvre'),
(13, 'objet', 'réveil'),
(14, 'objet', 'ordinateur'),
(15, 'objet', 'lampe'),
(16, 'objet', 'corbeille'),
(17, 'objet', 'multiprise'),
(18, 'objet', 'masque'),
(19, 'objet', 'tong'),
(20, 'objet', 't-shirt'),
(21, 'objet', 'livre'),
(22, 'objet', 'clef'),
(23, 'objet', 'stylo'),
(24, 'objet', 'pinceau'),
(25, 'objet', 'fourchette'),
(26, 'objet', 'saladier'),
(27, 'objet', 'projecteur'),
(28, 'objet', 'balai'),
(29, 'objet', 'serviette'),
(30, 'objet', 'tondeuse'),
(31, 'objet', 'raquette'),
(32, 'objet', 'valise'),
(33, 'objet', 'verre'),
(34, 'objet', 'poignée de porte'),
(35, 'objet', 'téléphone'),
(36, 'objet', 'couette'),
(37, 'objet', 'CD'),
(38, 'objet', 'tirelire'),
(39, 'objet', 'bureau'),
(40, 'objet', 'piano'),
(41, 'objet', 'étagère'),
(42, 'objet', 'guitare'),
(43, 'objet', 'aspirateur'),
(44, 'objet', 'vase'),
(45, 'objet', 'collier'),
(46, 'objet', 'bouteille'),
(47, 'objet', 'frigo'),
(48, 'objet', 'vélo'),
(49, 'objet', 'trottinette'),
(50, 'objet', 'brosse à dents'),
(51, 'objet', 'paire de lunettes'),
(52, 'objet', 'ventilateur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_word` (`idWord`),
  ADD KEY `playingUserId` (`playingUserId`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `pseudo_2` (`pseudo`),
  ADD KEY `id_game` (`idGame`);

--
-- Index pour la table `WordToGuess`
--
ALTER TABLE `WordToGuess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Game`
--
ALTER TABLE `Game`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clef primaire', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clef primaire', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `WordToGuess`
--
ALTER TABLE `WordToGuess`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'clef primaire', AUTO_INCREMENT=53;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Game`
--
ALTER TABLE `Game`
  ADD CONSTRAINT `Game_ibfk_1` FOREIGN KEY (`idWord`) REFERENCES `WordToGuess` (`id`),
  ADD CONSTRAINT `Game_ibfk_2` FOREIGN KEY (`playingUserId`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`idGame`) REFERENCES `Game` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
