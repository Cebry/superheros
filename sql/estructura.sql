-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2022 at 02:43 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `ability`
--

DROP TABLE IF EXISTS `ability`;
CREATE TABLE IF NOT EXISTS `ability` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `ability`
--
DROP TRIGGER IF EXISTS `ability_update_updated_at`;
DELIMITER $$
CREATE TRIGGER `ability_update_updated_at` BEFORE UPDATE ON `ability` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

DROP TABLE IF EXISTS `citizen`;
CREATE TABLE IF NOT EXISTS `citizen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idUser` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FOREIGN_KEY_CITIZEN_USER` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `citizen`
--
DROP TRIGGER IF EXISTS `citizen_update_updated_at`;
DELIMITER $$
CREATE TRIGGER `citizen_update_updated_at` BEFORE UPDATE ON `citizen` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `evolution`
--

DROP TABLE IF EXISTS `evolution`;
CREATE TABLE IF NOT EXISTS `evolution` (
  `name` varchar(20) NOT NULL,
  UNIQUE KEY `NAME` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `id_superhero` int NOT NULL,
  `id_citizen` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FOREIGN_KEY_REQUEST_CITIZEN_ID` (`id_citizen`),
  KEY `FOREIGN_KEY_REQUEST_SUPERHERO_ID` (`id_superhero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `request`
--
DROP TRIGGER IF EXISTS `request_update_updated_at`;
DELIMITER $$
CREATE TRIGGER `request_update_updated_at` BEFORE UPDATE ON `request` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `superhero`
--

DROP TABLE IF EXISTS `superhero`;
CREATE TABLE IF NOT EXISTS `superhero` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `evolution` varchar(20) NOT NULL,
  `id_user` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FOREIGN_KEY_SUPERHERO_USER_ID` (`id_user`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `superhero`
--
DROP TRIGGER IF EXISTS `superhero_update_updated_at`;
DELIMITER $$
CREATE TRIGGER `superhero_update_updated_at` BEFORE UPDATE ON `superhero` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `superhero_ability`
--

DROP TABLE IF EXISTS `superhero_ability`;
CREATE TABLE IF NOT EXISTS `superhero_ability` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_superhero` int NOT NULL,
  `id_ability` int NOT NULL,
  `value` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `superhero_ability_superhero_id` (`id_superhero`),
  KEY `superhero_ability_ability_id` (`id_ability`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `superhero_ability`
--
DROP TRIGGER IF EXISTS `superhero_ability_update_updated_at`;
DELIMITER $$
CREATE TRIGGER `superhero_ability_update_updated_at` BEFORE UPDATE ON `superhero_ability` FOR EACH ROW set NEW.updated_at = CURRENT_TIMESTAMP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `user`
--
DROP TRIGGER IF EXISTS `user_update_updated_at`;
DELIMITER $$
CREATE TRIGGER `user_update_updated_at` BEFORE UPDATE ON `user` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citizen`
--
ALTER TABLE `citizen`
  ADD CONSTRAINT `FOREIGN_KEY_CITIZEN_USER` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `FOREIGN_KEY_REQUEST_CITIZEN_ID` FOREIGN KEY (`id_citizen`) REFERENCES `citizen` (`id`),
  ADD CONSTRAINT `FOREIGN_KEY_REQUEST_SUPERHERO_ID` FOREIGN KEY (`id_superhero`) REFERENCES `superhero` (`id`);

--
-- Constraints for table `superhero`
--
ALTER TABLE `superhero`
  ADD CONSTRAINT `FOREIGN_KEY_SUPERHERO_USER` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `superhero_ability`
--
ALTER TABLE `superhero_ability`
  ADD CONSTRAINT `superhero_ability_ability_id` FOREIGN KEY (`id_ability`) REFERENCES `ability` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `superhero_ability_superhero_id` FOREIGN KEY (`id_superhero`) REFERENCES `superhero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;