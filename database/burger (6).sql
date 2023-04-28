-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 28 avr. 2023 à 12:39
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
  `price` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `food`
--

INSERT INTO `food` (`foodId`, `title`, `image`, `description`, `price`) VALUES
(10, 'Chicken Burger', 'pexels-griffin-wooldridge-2657960.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', '12'),
(11, 'Cheese Burger', 'pexels-valeria-boltneva-1639565.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', '11'),
(12, 'Bacon Burger', 'pexels-chevanon-photography-1108117.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', '13'),
(13, 'Frites', 'pexels-marco-fischer-115740.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', '3'),
(16, 'Frites bacon cheddar', 'pexels-fernanda-lima-16108600.jpg', 'Can I get some burger,\r\n with some peanut butter?\r\nDo you think it\'s better,\r\n with a Dr. Pepper?\r\nCan I get some turkey? \r\nI need more proteins\r\nCan I get some whisky, \r\nI could drink a fountainBaby,\r\nI\'m still hungry, since this morning I need\r\n, bacon, cheese and paincakes', '5'),
(17, 'Frites patates douces', 'pexels-valeria-boltneva-1893555.jpg', 'Can I get some burger, with some peanut butter? Do you think it\'s better, with a Dr. Pepper? Can I get some turkey? I need more proteins Can I get some whisky, I could drink a fountainBaby, I\'m still hungry, since this morning I need , bacon, cheese and paincakes', '6');

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
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` mediumtext NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`userId`, `firstname`, `lastname`, `email`, `password`, `phone`, `address`, `role`) VALUES
(2, 'Sébastien ', 'Criado', 'contact.sebastiencriado@gmail.com', '$2y$10$EyTzNCIzP67tyQ4AIYAQl.DB6NmayEgNAwd6VRpT4eQTxXnryQJdi', '0652706412', '56 avenue gaston berger', 'user'),
(3, 'Laura', 'Devos', 'lauradevos@free.fr', '$2y$10$RYkzIzESU8nYGvRrPWmKPey7q34TF2aTHWSuVSN/37V22N1OF8s.u', '0608345892', '56 avenue gaston berger', 'user'),
(4, 'patrick', 'Dupont', 'alfred.dupont@gmail.com', '$2y$10$p15VJPTSOCGXtKNzwqiaTeUpR5adP9t4VswtPrHxCfBSHzBQbHcvC', '0652706412', '56 avenue gaston berger', 'user'),
(5, 'Admin', 'Admin', 'admin@burger.com', '$2y$10$abX1RfbsGHjKENshoXmxX.G6HXNoRfL2wRxgeX16WkF8xMsg.VVQe', '0608345892', '56 avenue gaston berger', 'admin');

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
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `food`
--
ALTER TABLE `food`
  MODIFY `foodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
