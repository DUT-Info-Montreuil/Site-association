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
  `promotion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `promotion`) VALUES
(1, 'pogman', 'pogman@gmail.com', '$2y$10$GQ8f8Ke.RdshdU5xQjvpHu/9nkBM7OM3IqnDRwOHkzQFUkzBWhoIK', 'INFO'),
(2, 'amogus', 'susmogman@poop.io', '$2y$10$iok0v/GMqVrAemJhvxm.6eAiH4v0lE4.7XBZ6wNTDXIWd8Rlyf012', 'INFO'),
(3, 'test', 'test@test.test', '$2y$10$JreW5xAXKuuc3xmxeHNp/OUv2VS2WKE2gqqtyV8w2Y3mgofGhAxr.', 'GACO'),
(4, 'gamer', 'games@gaming.game', '$2y$10$g99TFKEXCELUXDcmy0PzouBXk9gH8gSJOmKmxHXQJTdIbDAk6YIvK', 'INFO');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Structure de la table `achat`
--

CREATE TABLE `request` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `request`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
ALTER TABLE `request` ADD `nbLike` INT NOT NULL AFTER `description`, ADD `idUser` INT NOT NULL AFTER `nbLike`;
