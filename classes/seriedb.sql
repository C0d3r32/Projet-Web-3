-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 06 mai 2025 à 17:16
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

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
(19, 'Adam Scott', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcRB1O7Rwy2CBfS9mARo2CSpO7VJyBd5xEAtYrcc-xZeFDdDXNNSlN4QPDKH2SUKwM_mDqCXEzTxbBX3LSk'),
(20, 'Britt Lower', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQfV8GBYEDsWl6XMfKou5JKMCJl5VmGOwxSdmTEESA0TO_aJR5c9LIsUl7iyjcNZktnbXoTubu3pOzw9TqaIYB8YA'),
(21, 'Sarah Bock', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcS8a24B6gowQLSvmWkEMxtOf5gfYCTlU_6DqNGG2TQ__8YVH4XGe5M1-ImptkP-Nqz1SLCQu7lRtcfIWzg'),
(28, 'Emilia Clarke', 'https://m.media-amazon.com/images/M/MV5BNjg3OTg4MDczMl5BMl5BanBnXkFtZTgwODc0NzUwNjE@._V1_.jpg'),
(29, 'Kit Harington', 'https://m.media-amazon.com/images/M/MV5BMTA2NTI0NjYxMTBeQTJeQWpwZ15BbWU3MDIxMjgyNzY@._V1_.jpg'),
(30, 'Peter Dinklage', 'https://m.media-amazon.com/images/M/MV5BMTM1MTI5Mzc0MF5BMl5BanBnXkFtZTYwNzgzOTQz._V1_FMjpg_UX1000_.jpg');

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
(39, 1, 'Good News About Hell', 'Mark commence sa journée de travail en tant que chef d\'équipe à Lumon Industries alors qu\'une nouvelle recrue rejoint son département.', 57, 27),
(40, 2, 'Half Loop', 'La nouvelle recrue Helly tente de s\'adapter à la vie au bureau, tandis que Mark s\'occupe de problèmes personnels à l\'extérieur.', 55, 27),
(41, 3, 'In Perpetuity', 'Mark découvre des indices troublants concernant le comportement d\'un ancien collègue.', 56, 27),
(42, 4, 'The You You Are', 'L\'équipe découvre des informations qui remettent en question leur perception de Lumon Industries.', 54, 27),
(43, 5, 'The Grim Barbarity of Optics and Design', 'La tension monte entre les départements alors que Mark commence à remettre en question l\'éthique de la procédure de séparation.', 58, 27),
(44, 6, 'Hide and Seek', 'Le département de Mark se retrouve au centre d\'une lutte de pouvoir au sein de Lumon.', 53, 27),
(45, 7, 'Defiant Jazz', 'Les employés découvrent une méthode pour communiquer entre leurs versions internes et externes.', 56, 27),
(46, 8, 'What\'s for Dinner?', 'Mark est confronté à des révélations troublantes concernant sa vie personnelle et professionnelle.', 55, 27),
(47, 9, 'The We We Are', 'Saison finale: les employés tentent une manœuvre risquée pour révéler la vérité sur Lumon Industries.', 60, 27),
(48, 1, 'The Passenger', 'Suite aux événements de la finale de la saison 1, Mark et ses collègues font face aux conséquences de leurs découvertes.', 58, 28),
(49, 2, 'Mirrors', 'De nouvelles procédures sont mises en place à Lumon alors que les employés tentent de s\'adapter à leur nouvelle réalité.', 57, 28),
(50, 3, 'The Labyrinth', 'L\'équipe explore des zones inconnues de Lumon et découvre des informations troublantes sur la véritable nature de l\'entreprise.', 59, 28),
(51, 4, 'Outside In', 'Mark tente de réconcilier ses deux vies alors que les barrières entre elles commencent à s\'effondrer.', 56, 28),
(52, 5, 'The Board', 'Des révélations sur les dirigeants de Lumon viennent bouleverser les croyances des employés.', 60, 28),
(53, 6, 'Memory Lane', 'Des fragments de souvenirs refont surface, remettant en question l\'efficacité de la procédure de séparation.', 58, 28),
(54, 7, 'The Founders', 'L\'histoire de la création de Lumon Industries est révélée, expliquant les motivations derrière la procédure de séparation.', 61, 28),
(55, 8, 'Convergence', 'Les vies intérieures et extérieures des employés commencent à converger de manière inattendue.', 57, 28),
(56, 9, 'Breaking Through', 'Les employés tentent une manœuvre désespérée pour briser définitivement la barrière entre leurs deux vies.', 59, 28),
(57, 10, 'Integration', 'Finale de la saison 2: les conséquences de la fusion des identités sont explorées alors que Lumon fait face à une crise existentielle.', 65, 28),
(101, 1, 'Winter Is Coming', 'Le roi Robert rend visite à son vieil ami Eddard Stark à Winterfell.', 62, 34),
(102, 2, 'The Kingsroad', 'Bran lutte entre la vie et la mort ; Jon part pour le Mur.', 56, 34),
(103, 3, 'Lord Snow', 'Eddard arrive à Port-Réal et rejoint le conseil du roi.', 58, 34),
(104, 4, 'Cripples, Bastards, and Broken Things', 'Tyrion se rend au Mur ; Jon aide Sam à s’intégrer.', 56, 34),
(105, 5, 'The Wolf and the Lion', 'Ned enquête sur la mort de Jon Arryn ; tensions entre Stark et Lannister.', 55, 34),
(106, 6, 'A Golden Crown', 'Viserys reçoit une couronne en or fondue ; Ned rend justice.', 53, 34),
(107, 7, 'You Win or You Die', 'Robert meurt ; Ned confronte Cersei.', 58, 34),
(108, 8, 'The Pointy End', 'Ned est trahi ; Arya échappe à la capture.', 59, 34),
(109, 9, 'Baelor', 'Ned est exécuté ; Robb gagne une bataille clé.', 57, 34),
(110, 10, 'Fire and Blood', 'Daenerys devient la Mère des Dragons.', 60, 34),
(111, 1, 'The North Remembers', 'Robb Stark continue sa guerre contre les Lannister ; Stannis revendique le trône.', 53, 35),
(112, 2, 'The Night Lands', 'Tyrion exerce son pouvoir ; Arya rencontre de nouveaux alliés.', 54, 35),
(113, 3, 'What Is Dead May Never Die', 'Theon jure fidélité à son père ; Catelyn tente une alliance.', 53, 35),
(114, 4, 'Garden of Bones', 'Cersei s’oppose à Tyrion ; Daenerys atteint Qarth.', 50, 35),
(115, 5, 'The Ghost of Harrenhal', 'Renly est tué ; Tyrion découvre les plans de défense.', 55, 35),
(116, 6, 'The Old Gods and the New', 'Jon découvre un secret au-delà du Mur ; Theon prend Winterfell.', 54, 35),
(117, 7, 'A Man Without Honor', 'Jaime tue son cousin ; Daenerys perd ses dragons.', 56, 35),
(118, 8, 'The Prince of Winterfell', 'Stannis approche de Port-Réal ; Theon se prépare à l’attaque.', 55, 35),
(119, 9, 'Blackwater', 'La flotte de Stannis attaque Port-Réal ; Tyrion mène la défense.', 55, 35),
(120, 10, 'Valar Morghulis', 'Tyrion est blessé ; Arya s’échappe ; Daenerys explore la Maison des Immortels.', 59, 35),
(121, 1, 'Valar Dohaeris', 'Jon rencontre Mance Rayder ; Daenerys recrute une armée.', 55, 36),
(122, 2, 'Dark Wings, Dark Words', 'Bran rêve de corbeaux ; Arya rencontre la Fraternité.', 57, 36),
(123, 3, 'Walk of Punishment', 'Daenerys achète des Immaculés ; Tyrion devient maître de la monnaie.', 56, 36),
(124, 4, 'And Now His Watch Is Ended', 'Les mutins tuent Lord Commandant Mormont ; Daenerys libère les esclaves.', 54, 36),
(125, 5, 'Kissed by Fire', 'Jon rompt ses vœux ; Jaime révèle son passé.', 57, 36),
(126, 6, 'The Climb', 'Petyr complote ; Jon grimpe le Mur.', 55, 36),
(127, 7, 'The Bear and the Maiden Fair', 'Jaime revient sauver Brienne ; Jon et Ygritte poursuivent leur route.', 57, 36),
(128, 8, 'Second Sons', 'Tyrion épouse Sansa ; Daenerys obtient l’aide des Seconds Fils.', 56, 36),
(129, 9, 'The Rains of Castamere', 'Le Mariage Rouge ; Robb et Catelyn sont assassinés.', 52, 36),
(130, 10, 'Mhysa', 'Daenerys est acclamée à Yunkai ; les survivants se réorganisent.', 63, 36),
(131, 1, 'Two Swords', 'La guerre pour le trône continue. Tyrion se retrouve face à un procès pour le meurtre de Joffrey.', 59, 37),
(132, 2, 'The Lion and the Rose', 'Le mariage de Joffrey et Margaery se termine tragiquement. Tyrion est accusé à tort.', 59, 37),
(133, 3, 'Breaker of Chains', 'Daenerys libère les esclaves de Meereen. Tyrion échappe à l’assassinat.', 58, 37),
(134, 4, 'Oathkeeper', 'Jaime et Brienne traversent les terres dévastées. Jon est confronté aux hommes libres.', 57, 37),
(135, 5, 'First of His Name', 'Tommen devient roi. Cersei complote contre Tyrion et Sansa.', 58, 37),
(136, 6, 'The Laws of Gods and Men', 'Tyrion est jugé. Daenerys lutte pour maintenir son pouvoir à Meereen.', 60, 37),
(137, 7, 'Mockingbird', 'Petyr Baelish manipule Sansa. Brienne poursuit sa quête de sauver les filles Stark.', 57, 37),
(138, 8, 'The Mountain and the Viper', 'Oberyn Martell défie la Montagne, avec des conséquences dramatiques.', 59, 37),
(139, 9, 'The Watchers on the Wall', 'Les membres de la Garde de Nuit défendent le Mur contre les sauvageons.', 60, 37),
(140, 10, 'The Children', 'Tyrion se venge, et Bran Stark découvre des révélations sur son destin.', 74, 37),
(141, 1, 'The Wars to Come', 'Cersei et Jaime affrontent leurs nouveaux rôles. Jon Snow est confronté à un dilemme.', 58, 38),
(142, 2, 'The House of Black and White', 'Arya arrive à Braavos. Tyrion se retrouve à la merci de Jorah Mormont.', 55, 38),
(143, 3, 'High Sparrow', 'Tyrion rencontre des alliés inattendus. Cersei et Jaime affrontent des nouvelles menaces à Port-Réal.', 57, 38),
(144, 4, 'Sons of the Harpy', 'Daenerys lutte pour maintenir son autorité à Meereen, tandis que les sons des harpies font leur apparition.', 56, 38),
(145, 5, 'Kill the Boy', 'Jon Snow prend des décisions difficiles à la Garde de Nuit. Daenerys fait face à une rébellion à Meereen.', 58, 38),
(146, 6, 'Unbowed, Unbent, Unbroken', 'Sansa est confrontée à une tragédie. Arya poursuit son entraînement.', 59, 38),
(147, 7, 'The Gift', 'Jon Snow se retrouve face à une trahison au sein de la Garde de Nuit. Tyrion tente de s’adapter à sa nouvelle vie.', 60, 38),
(148, 8, 'Hardhome', 'Jon Snow affronte une menace des plus terrifiantes au-delà du Mur.', 60, 38),
(149, 9, 'The Dance of Dragons', 'Daenerys affronte une rébellion dans l’arène. Jon Snow prend des décisions difficiles pour protéger la Garde de Nuit.', 58, 38),
(150, 10, 'Mother’s Mercy', 'Cersei est confrontée à un procès. Jon Snow prend une décision qui change à jamais son avenir.', 59, 38);

-- --------------------------------------------------------

--
-- Structure de la table `episode_realisateur`
--

CREATE TABLE `episode_realisateur` (
  `id_episode` int(11) NOT NULL,
  `id_realisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `episode_realisateur`
--

INSERT INTO `episode_realisateur` (`id_episode`, `id_realisateur`) VALUES
(39, 6),
(40, 6),
(41, 6),
(42, 6),
(43, 6),
(44, 6),
(45, 6),
(46, 6),
(47, 6),
(48, 6),
(49, 6),
(50, 6),
(51, 6),
(52, 6),
(53, 6),
(54, 6),
(55, 6),
(56, 6),
(57, 6),
(101, 27),
(102, 27),
(103, 28),
(104, 28),
(105, 29),
(106, 29),
(107, 30),
(108, 30),
(109, 25),
(110, 25),
(111, 25),
(112, 25),
(113, 31),
(114, 31),
(115, 32),
(117, 26),
(118, 26),
(118, 32),
(119, 33),
(120, 33),
(121, 29),
(122, 29),
(124, 35),
(125, 35),
(126, 31),
(127, 31),
(128, 36),
(129, 26),
(130, 26),
(131, 34),
(132, 35),
(133, 35),
(134, 36),
(135, 36),
(136, 31),
(137, 31),
(138, 35),
(139, 33),
(140, 35),
(141, 37),
(142, 37),
(143, 38),
(144, 38),
(145, 39),
(146, 39),
(147, 40),
(148, 40),
(149, 26),
(150, 26);

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
(6, 'Ben Stiller', 'https://encrypted-tbn2.gstatic.com/licensed-image?q=tbn:ANd9GcQUH47X-K9AekCEfyb2S46z4l69zVgfJI9PC9b5arbiV1oAE6VNLdBX95PJ_NpRQUsRT_dTvdeqivz3DBA'),
(25, 'Alan Taylor', 'https://m.media-amazon.com/images/M/MV5BMGYwMWY3NjctZTg4My00MzRiLThlODQtMTc5OTEzMzI0ZWQwXkEyXkFqcGc@._V1_.jpg'),
(26, 'David Nutter', 'https://upload.wikimedia.org/wikipedia/commons/8/8f/David_Nutter_by_Gage_Skidmore_2.jpg'),
(27, 'Timothy Van Patten', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqfoCrXYxzjYrmU_66-NW8hAXL8yne0iD0elyoR7_4WDhzzyjxmAQlBKXl73XZSRgvg0m6CKeKQNmomTLqcW7F1A'),
(28, 'Brian Kirk', 'https://encrypted-tbn0.gstatic.com/licensed-image?q=tbn:ANd9GcRJIjEg_ivzKlmSrky96DGSTVAy_Qx8a37GolV5DTFYxU7L_HksrudvHmcPlqWVv2nBVSl37DWb9qXKqb4'),
(29, 'Daniel Minahan', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcRj4FuTq7_0_vUgkx2wqfVJprzV1u1EpsY7syP-Zndz0mtHshPYQS6D-0TLCkR4xUho2VjQRPOtvPv5RVs'),
(30, 'Michael J. Bassett', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQrtH0FUkoNRXYUo2Cu_Wb7kWJk9T89pF_EkMmD9Ti0Kw0jNadAFP_yCREdW2c84xusWN5eRxPq8J9qyC63xpiLdg'),
(31, 'Alik Sakharov', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSMKWF93ZsmE9494U6w8H1c0DfUn-Bs3v0JGQo5-6uFs2jdjEb4WvPHvBj8ATYGB2fiz-2QTZI-iuYBRmzl66WSsw'),
(32, 'David Petrarca', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcScgb2k6YyXCiRAgOKfrHQiCk0UuoWEvoSJVHishrhat3NnU-vpYdcFY58feufjhHwwHYy_JOSK1LsM-neExnIMSA'),
(33, 'Neil Marshall', 'https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTYYm9BA6-6No9VNTDvwX3cdw827LHEkTe91VqDtj_5JTQ_c20ENrzCgnqJbQeHkPHCc6TbXC2FWBgcMSNddR25Jw'),
(34, 'D.B. Weiss', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcT70kFUogmkGSZD65x1OeHkidnk64tg9SaNqqP-BfZEeXvlKJkfdwzx7Ui_w7p0T-ypO3-EuFuct3upthsx3_Eb0A'),
(35, 'Alex Graves', 'https://encrypted-tbn3.gstatic.com/licensed-image?q=tbn:ANd9GcS_z8NRCrVu_RXgeBzAJthW3XCXIMqkK4_Y2ADDpMkH2I6Fk8f_aLfmma0LYEGaLCY9fkJLurEmcqtpNu4'),
(36, 'Michelle MacLaren', 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcS9Dbxi-VXiIw-bzGWulfBwalwA4fcrdpXOlrsZXlh6HvvETWkMXdxRjUVxIErJwcIr1KYWDgQWpwKKMMc3egx5jQ'),
(37, 'Michael Slovis', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDaU1q7lHmYGKfs_tmSQItndJ8zG-_wq9-mTB5zDrWSQSi_V7YlGgYB5sOBZhVQHVEl5NqH7Q-XKH-I7ILgtu3CA'),
(38, 'Mark Mylod', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQtdo7j9jrdczNODIfmzUGZ9nxD--n1g41rjkX2m2s9Dk0QWboWSc8F3yJCQSupMutbGSxHLvBvogYHXZCBO92TA'),
(39, 'Jeremy Podeswa', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcSIiZozcfbA5ALKkwpyuv2Zzb-jWNNEpgX4jH6cdf2kGUEhF8Us0aynmZ30SyWg3kbnURu8pXMhAaevbwc'),
(40, 'Miguel Sapochnik', 'https://encrypted-tbn1.gstatic.com/licensed-image?q=tbn:ANd9GcTzPvXm-PTfSfCo72IRo0wfSWgh3rAd1PSO3M7BGc84ZgnImyKD-U8Tl3UKQcbIksr-tjOATt_cI29KrXM');

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
(27, 1, 'https://fr.web.img4.acsta.net/pictures/21/12/16/17/19/2294099.jpg', 4),
(28, 2, 'https://fr.web.img3.acsta.net/img/f3/61/f361e09d400dc55b194a7a58c00556c1.jpg', 4),
(34, 1, 'https://m.media-amazon.com/images/I/81Hz0Wus+jL._AC_UF1000,1000_QL80_.jpg', 7),
(35, 2, 'https://m.media-amazon.com/images/I/81FGxNcoJoL._AC_UF1000,1000_QL80_.jpg', 7),
(36, 3, 'https://m.media-amazon.com/images/I/61FRb+twp-S._AC_UF1000,1000_QL80_.jpg', 7),
(37, 4, 'https://fr.web.img4.acsta.net/c_225_300/pictures/14/02/28/00/50/120605.jpg', 7),
(38, 5, 'https://m.media-amazon.com/images/I/61C+Sf-crFL._AC_UF894,1000_QL80_.jpg', 7);

-- --------------------------------------------------------

--
-- Structure de la table `saison_acteur`
--

CREATE TABLE `saison_acteur` (
  `id_saison` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `saison_acteur`
--

INSERT INTO `saison_acteur` (`id_saison`, `id_acteur`) VALUES
(27, 19),
(27, 20),
(28, 19),
(28, 20),
(28, 21),
(34, 28),
(34, 29),
(34, 30),
(35, 28),
(35, 29),
(35, 30),
(36, 28),
(36, 29),
(36, 30),
(37, 28),
(37, 29),
(37, 30),
(38, 28),
(38, 29),
(38, 30);

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
(4, 'Severance'),
(7, 'Game of Thrones');

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
(4, 8),
(4, 9),
(7, 16),
(7, 17),
(7, 18);

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
(8, 'Science-fiction'),
(9, 'Thriller'),
(16, 'Action'),
(17, 'Fantasy'),
(18, 'Drame');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `episode`
--
ALTER TABLE `episode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT pour la table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pour la table `saison`
--
ALTER TABLE `saison`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `serie`
--
ALTER TABLE `serie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
