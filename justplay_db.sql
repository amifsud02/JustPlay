-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justplay`
--
CREATE DATABASE IF NOT EXISTS `justplay` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `justplay`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_name`, `cat_id`) VALUES
('Action', 1),
('Thriller', 2);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `icon`, `cat_id`, `dt`) VALUES
(2, 'Battlefield 2042', 'upload/bf2042.jpg', 1, '2022-12-01 04:22:21'),
(3, 'Battlefield V', 'upload/bfv.jpg', 1, '2022-12-01 04:22:24'),
(4, 'Bloodhunt', 'upload/bloodhunt-3.webp', 1, '2023-01-05 12:02:16'),
(5, 'Brawlhalla', 'upload/brawlhalla.webp', 1, '2022-12-01 04:22:30'),
(6, 'CS:GO', 'upload/csgo.jpg', 1, '2022-12-01 04:22:34'),
(7, 'Destiny 2', 'upload/destiny-2.jpg', 1, '2022-12-01 04:22:37'),
(8, 'The Division 2', 'upload/division-2.jpg', 1, '2022-12-01 04:22:39'),
(9, 'Fall Guys', 'upload/fall-guys.webp', 1, '2022-12-01 04:22:54'),
(10, 'For Honor', 'upload/for-honor.jpg', 1, '2022-12-01 04:22:57'),
(11, 'Fortnite', 'upload/fortnite.webp', 1, '2022-12-01 04:23:00'),
(12, 'Halo Infinite', 'upload/halo-infinite.jpg', 1, '2022-12-01 04:23:03'),
(13, 'League of Legends', 'upload/league-of-legends.webp', 1, '2022-12-01 04:23:03'),
(14, 'Modern Warfare 2', 'upload/modern-warfare-2.jpg', 1, '2022-12-01 04:23:03'),
(15, 'MultiVersus', 'upload/multiversus.jpg', 1, '2022-12-01 04:23:03'),
(16, 'Overwatch', 'upload/overwatch-2.webp', 1, '2022-12-01 04:23:03'),
(17, 'PUBG: BATTLEGROUNDS', 'upload/pubg.jpg', 1, '2022-12-01 04:23:03'),
(18, 'Rainbow Six Extraction', 'upload/r6extraction.webp', 1, '2022-12-01 04:23:03'),
(19, 'Rainbox Six Seige', 'upload/r6siege.jpg', 1, '2022-12-01 04:23:03'),
(20, 'Realm Royale', 'upload/realm-royale.jpg', 1, '2022-12-01 04:23:03'),
(21, 'Rocket Arena', 'upload/rocket-arena.webp', 1, '2022-12-01 04:23:03'),
(22, 'Rogue Company', 'upload/rogue-company.webp', 1, '2022-12-01 04:23:03'),
(23, 'Rocket League', 'upload/rocket-league.webp', 1, '2022-12-01 04:23:03'),
(24, 'Splitgate', 'upload/splitgate.webp', 1, '2022-12-01 04:23:03'),
(25, 'Teamfight Tactics', 'upload/teamfight-tactics.webp', 1, '2022-12-01 04:23:03'),
(26, 'Valorant', 'upload/valorant.webp', 1, '2022-12-01 04:23:03'),
(27, 'Call Of Dute: Warzone', 'upload/warzone.webp', 1, '2022-12-01 04:23:03'),
(28, 'X Defiant', 'upload/xdefiant.jpg', 1, '2022-12-01 04:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(4, 'admin', '$2y$10$0GZ7XI.bMCQGlxVgBs9DYOqQrisNsETRxCIQ5mR1w4tngadKK60bG', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
