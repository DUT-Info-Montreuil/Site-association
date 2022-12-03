-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 26 Octobre 2022 à 15:50
-- Version du serveur :  5.7.40-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--

--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `promotion` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `promotion`, `role`) VALUES
(1, 'pogman', 'pogman@gmail.com', '$2y$10$GQ8f8Ke.RdshdU5xQjvpHu/9nkBM7OM3IqnDRwOHkzQFUkzBWhoIK', 'INFO', 'user'),
(2, 'amogus', 'susmogman@poop.io', '$2y$10$iok0v/GMqVrAemJhvxm.6eAiH4v0lE4.7XBZ6wNTDXIWd8Rlyf012', 'INFO', 'user'),
(3, 'test', 'test@test.test', '$2y$10$JreW5xAXKuuc3xmxeHNp/OUv2VS2WKE2gqqtyV8w2Y3mgofGhAxr.', 'GACO', 'user'),
(4, 'gamer', 'games@gaming.game', '$2y$10$g99TFKEXCELUXDcmy0PzouBXk9gH8gSJOmKmxHXQJTdIbDAk6YIvK', 'INFO', 'user'),
(5, 'Lucas', 'swagman@gmail.com', '$2y$10$vjnBihcNa0Gy4AW.KYzpDu8auckECUDpFiFcTcN4JYbynirIofOOm', 'INFO', 'admin'),
(6, 'Mananta', 'Mananta@gmail.com', '$2y$10$XGNwAgXWKF.3q9HgVFGvf.BmfDDO39DQJMSTL2JyN0eXwdaxcuE2K', 'INFO', 'user'),
(7, 'Mana', 'haha@gmail.com', '$2y$10$eXVDWIWoMksug..oaZV2x.jxz0IUO2HkVs4HAMsmjZ3aQebWV0SAC', 'INFOCOM', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `creatorId` bigint(20) UNSIGNED NOT NULL,
  `minParticipants` int(11) NOT NULL,
  `maxParticipants` int(11) DEFAULT NULL,
  `creationDate` date NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `promotion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `events`
--
''
INSERT INTO `events` (`id`, `title`, `description`, `creatorId`, `minParticipants`, `maxParticipants`, `creationDate`, `startDate`, `endDate`, `promotion`) VALUES
(1, 'AMOGUS REUNION (VERY IMPORTANT)', 'WE ARE GONNA MONG SOME US AND IT\'S GONNA BE EPIC (wow)', 2, 4, NULL, '2022-11-09', '2022-11-14', '2022-11-15', 'INFO'),
(6, 'Réunions des booooyz', 'Les boys se réunissent pour faire des trucs de gamer', 5, 1, NULL, '2022-11-25', '2022-12-01', '2022-12-25', 'TOUS'),
(7, 'Réunion emergency', 'Alerte je crois qu\'il y a un impostor amongus', 7, 1, NULL, '2022-11-30', '2022-11-15', '2022-12-10', 'INFOCOM'),
(8, 'Pizza Party', 'Car c bon', 5, 5, 10, '2022-11-30', '2022-11-01', '2022-11-02', 'QLIO');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_events` (`creatorId`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_events` FOREIGN KEY (`creatorId`) REFERENCES `users` (`id`);
-- Structure de la table `achat`
--

CREATE TABLE `request` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `nbLike` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `state` varchar(20) NOT NULL DEFAULT 'not reviewed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `request`
--

INSERT INTO `request` (`ID`, `title`, `description`, `nbLike`, `idUser`, `state`) VALUES
(4, 'Une table de baby-foot et de Ping-Pong', 'Afin de se divertir entre les cours', 3, 5, 'not reviewed'),
(5, 'Un service à  raclette', 'Pour se peter le bide', 1, 5, 'not reviewed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `request`
--
ALTER TABLE `request`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;


-- Structure de la table `commentReq`
--

CREATE TABLE `commentReq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idReq` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentReq`
--
ALTER TABLE `commentReq`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentReq`
--
ALTER TABLE `commentReq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

-- Structure de la table `likedRequests`
--

CREATE TABLE `likedRequests` (
  `idUser` int(11) NOT NULL,
  `idReq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- Structure de la table `eventSubscribers`
--

CREATE TABLE `eventSubscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `idEvent` bigint(20) UNSIGNED NOT NULL,
  `timeSaved` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `eventSubscribers`
--
ALTER TABLE `eventSubscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `fk_evSubUser` (`idUser`),
  ADD KEY `fk_evSubEvent` (`idEvent`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `eventSubscribers`
--
  ALTER TABLE `eventSubscribers`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eventSubscribers`
--
ALTER TABLE `eventSubscribers`
  ADD CONSTRAINT `fk_evSubEvent` FOREIGN KEY (`idEvent`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_evSubUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;