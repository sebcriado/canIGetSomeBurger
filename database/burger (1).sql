-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 19 avr. 2023 à 14:03
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `burger`
--

-- --------------------------------------------------------

--
-- Structure de la table `food`
--

CREATE TABLE `food` (
  `foodId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`foodId`, `title`, `image`, `description`, `price`) VALUES
(1, 'Cheese burger', 'pexels-valeria-boltneva-1639565.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', 12),
(2, 'Chicken burger', 'pexels-griffin-wooldridge-2657960.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', 11),
(3, 'Bacon burger', 'pexels-chevanon-photography-1108117.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', 13),
(4, 'Frites', 'pexels-marco-fischer-115740.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', 3),
(5, 'Frites bacon cheddar', 'pexels-fernanda-lima-16108600.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', 5),
(6, 'Frites patates douces', 'pexels-valeria-boltneva-1893555.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', 6);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `date` date NOT NULL,
  `statut` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idFood` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` mediumtext NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`foodId`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `fk_user` (`idUser`),
  ADD KEY `fk_food` (`idFood`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_food` FOREIGN KEY (`idFood`) REFERENCES `food` (`foodId`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
