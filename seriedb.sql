-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 30 avr. 2025 à 16:13
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `seriedb`
--

-- --------------------------------------------------------

--
-- Structure de la table `acteur`
--

CREATE TABLE `acteur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `acteur`
--

INSERT INTO `acteur` (`id`, `nom`, `photo`) VALUES
(6, 'Emilia Clarke', 'https://m.media-amazon.com/images/M/MV5BNjg3OTg4MDczMl5BMl5BanBnXkFtZTgwODc0NzUwNjE@._V1_.jpg'),
(7, 'Kit Harington', 'https://m.media-amazon.com/images/M/MV5BMTA2NTI0NjYxMTBeQTJeQWpwZ15BbWU3MDIxMjgyNzY@._V1_.jpg'),
(8, 'Peter Dinklage', 'https://m.media-amazon.com/images/M/MV5BMTM1MTI5Mzc0MF5BMl5BanBnXkFtZTYwNzgzOTQz._V1_FMjpg_UX1000_.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `episode`
--

CREATE TABLE `episode` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `synopsis` text DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  `id_saison` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `episode`
--

INSERT INTO `episode` (`id`, `numero`, `titre`, `synopsis`, `duree`, `id_saison`) VALUES
(11, 1, 'Winter Is Coming', 'Lord Eddard Stark is concerned by news of a deserter from the Night\"s Watch; King Robert I Baratheon and the Lannisters arrive at Winterfell; the exiled Prince Viserys Targaryen forges a powerful new alliance. North of the Seven Kingdoms of Westeros, Night\"s Watch soldiers are attacked by supernatural White Walkers.', 62, 16),
(12, 1, 'The North Remembers', 'The North Remembers\" is the first episode of the second season of Game of Thrones. It is the eleventh episode of the series overall.', 53, 17),
(13, 1, 'Valar Dohaeris', 'Valar Dohaeris\" is the third season premiere episode of the HBO fantasy television series Game of Thrones. Written by executive producers David Benioff and ...', 55, 18),
(14, 1, 'Two Swords', 'Two Swords\" is the first episode of the fourth season of HBO\"s medieval fantasy television series Game of Thrones. The fourth season premiere and the 31st ...', 59, 19),
(15, 1, 'The Wars to Come', 'The Wars to Come\" is the first episode of the fifth season of HBO\"s medieval fantasy television series Game of Thrones, and the 41st overall.', 58, 20);

-- --------------------------------------------------------

--
-- Structure de la table `episode_realisateur`
--

CREATE TABLE `episode_realisateur` (
  `id_episode` int(11) NOT NULL,
  `id_realisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `realisateur`
--

CREATE TABLE `realisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `realisateur`
--

INSERT INTO `realisateur` (`id`, `nom`, `photo`) VALUES
(3, 'Alan Taylor', 'https://m.media-amazon.com/images/M/MV5BMGYwMWY3NjctZTg4My00MzRiLThlODQtMTc5OTEzMzI0ZWQwXkEyXkFqcGc@._V1_.jpg'),
(4, 'David Nutter', 'https://upload.wikimedia.org/wikipedia/commons/8/8f/David_Nutter_by_Gage_Skidmore_2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `saison`
--

CREATE TABLE `saison` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `affiche` varchar(255) DEFAULT NULL,
  `id_serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `saison`
--

INSERT INTO `saison` (`id`, `numero`, `affiche`, `id_serie`) VALUES
(16, 1, 'https://m.media-amazon.com/images/I/81Hz0Wus+jL._AC_UF1000,1000_QL80_.jpg', 1),
(17, 2, 'https://m.media-amazon.com/images/I/81FGxNcoJoL._AC_UF1000,1000_QL80_.jpg', 1),
(18, 3, 'https://m.media-amazon.com/images/I/61FRb+twp-S._AC_UF1000,1000_QL80_.jpg', 1),
(19, 4, 'https://fr.web.img4.acsta.net/c_225_300/pictures/14/02/28/00/50/120605.jpg', 1),
(20, 5, 'https://m.media-amazon.com/images/I/61C+Sf-crFL._AC_UF894,1000_QL80_.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `saison_acteur`
--

CREATE TABLE `saison_acteur` (
  `id_saison` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`id`, `titre`) VALUES
(1, 'Game of Thrones');

-- --------------------------------------------------------

--
-- Structure de la table `serie_tag`
--

CREATE TABLE `serie_tag` (
  `id_serie` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `serie_tag`
--

INSERT INTO `serie_tag` (`id_serie`, `id_tag`) VALUES
(1, 1),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`id`, `nom`) VALUES
(1, 'Action'),
(2, 'Fantasy'),
(3, 'Drame');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `episode`
--
ALTER TABLE `episode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_saison` (`id_saison`);

--
-- Index pour la table `episode_realisateur`
--
ALTER TABLE `episode_realisateur`
  ADD PRIMARY KEY (`id_episode`,`id_realisateur`),
  ADD KEY `id_realisateur` (`id_realisateur`);

--
-- Index pour la table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `saison`
--
ALTER TABLE `saison`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_serie` (`id_serie`);

--
-- Index pour la table `saison_acteur`
--
ALTER TABLE `saison_acteur`
  ADD PRIMARY KEY (`id_saison`,`id_acteur`),
  ADD KEY `id_acteur` (`id_acteur`);

--
-- Index pour la table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `serie_tag`
--
ALTER TABLE `serie_tag`
  ADD PRIMARY KEY (`id_serie`,`id_tag`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Index pour la table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `episode`
--
ALTER TABLE `episode`
  ADD CONSTRAINT `episode_ibfk_1` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `episode_realisateur`
--
ALTER TABLE `episode_realisateur`
  ADD CONSTRAINT `episode_realisateur_ibfk_1` FOREIGN KEY (`id_episode`) REFERENCES `episode` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `episode_realisateur_ibfk_2` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `saison`
--
ALTER TABLE `saison`
  ADD CONSTRAINT `saison_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `saison_acteur`
--
ALTER TABLE `saison_acteur`
  ADD CONSTRAINT `saison_acteur_ibfk_1` FOREIGN KEY (`id_saison`) REFERENCES `saison` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `saison_acteur_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `serie_tag`
--
ALTER TABLE `serie_tag`
  ADD CONSTRAINT `serie_tag_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `serie_tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
