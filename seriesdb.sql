-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 20, 2022 at 10:17 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seriesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `name`, `description`, `image`) VALUES
(1, 'Dark Souls III', 'Dark Souls is a third-person action role-playing serie. A core mechanic of the serie is exploration. Players are encouraged to proceed with caution, learn from past mistakes, or find alternative areas to explore. Dark Souls takes place in a large and continuous open-world environment, connected through a central hub area. The player character can travel between areas and explore various paths at will, although prerequisites must be met to unlock certain areas.', 'jeu-steam-dark-souls-3-cover.jpeg'),
(2, 'The Elder Scrolls V: Skyrim', 'The Elder Scrolls V: Skyrim is an action role-playing serie, playable from either a first or third-person perspective. The player may freely roam over the land of Skyrim—an open world environment consisting of wilderness expanses, dungeons, caves, cities, towns, fortresses, and villages. Players may navigate the serie world more quickly by riding horses, paying for a ride from a city\'s stable or by utilizing a fast-travel system which allows them to warp to previously discovered locations.', ''),
(3, 'Horizon Zero Dawn', 'Horizon Zero Dawn is an action role-playing serie played from a third-person view. Players take control of Aloy, a hunter who ventures through a post-apocalyptic land ruled by robotic creatures.', ''),
(4, 'Alien: Isolation', 'Alien: Isolation is a single-player action-adventure serie with an emphasis on stealth and survival horror. The player controls Amanda Ripley from a first-person perspective, and must explore a space station and complete objectives while avoiding, outsmarting and defeating enemies. Objectives range from activating computers to collecting certain items or reaching a specific area in the serie. The player can run, climb ladders, sneak into vents, crouch behind objects to break the line of sight with enemies, and peek over or lean around for a safe view. The player also has the ability to go under tables or inside empty lockers to hide from enemies.', ''),
(5, 'The Witcher 3: Wild Hunt', 'The Witcher 3: Wild Hunt is an action role-playing serie with a third-person perspective. Players control Geralt of Rivia, a monster slayer known as a Witcher. Geralt walks, runs, rolls and dodges, and (for the first time in the series) jumps, climbs and swims. He has a variety of weapons, including bombs, a crossbow and two swords (one steel and one silver). The steel sword is used primarily to kill humans while the silver sword is more effective against creatures and monsters.', ''),
(6, 'Cyberpunk 2077', 'Cyberpunk 2077 is an action role-playing serie played in a first-person perspective as V, a mercenary whose voice, face, hairstyles, body type and modifications, background, and clothing are customisable. Stat categories—Body, Intelligence, Reflexes, Technical, and Cool—are influenced by the character classes that players assume, which are NetRunner (hacking), Techie (machinery), and Solo (combat).', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
