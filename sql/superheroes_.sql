-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 03, 2022 at 06:05 PM
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

--
-- Database: `superheroes+`
--
CREATE DATABASE IF NOT EXISTS `superheroes+` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `superheroes+`;

-- --------------------------------------------------------

--
-- Table structure for table `ability`
--

DROP TABLE IF EXISTS `ability`;
CREATE TABLE `ability` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ability`
--

INSERT INTO `ability` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'destreza', '2022-02-14 12:17:06', '2022-02-14 12:17:06'),
(4, 'percepcion', '2022-02-22 18:19:47', '2022-02-22 18:19:47'),
(5, 'fuerza', '2022-02-22 18:19:57', '2022-02-22 18:19:57'),
(6, 'inteligencia', '2022-02-22 18:20:05', '2022-02-22 18:20:05'),
(7, 'carisma', '2022-02-22 18:20:23', '2022-02-22 18:20:23'),
(8, 'resiliencia', '2022-02-22 18:20:37', '2022-02-22 18:20:37');

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
CREATE TABLE `citizen` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idUser` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`id`, `name`, `email`, `idUser`, `created_at`, `updated_at`) VALUES
(1, 'johndoe', 'johndoe@superheroes.org', 2, '2022-02-14 08:36:44', '2022-02-14 08:36:44'),
(3, 'asdfasdf', 'asdf@superheroes.org', 1, '2022-02-14 14:48:00', '2022-02-22 23:09:36');

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
CREATE TABLE `evolution` (
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `evolution`
--

INSERT INTO `evolution` (`name`) VALUES
('beginner'),
('expert');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE `request` (
  `id` int NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `id_superhero` int NOT NULL,
  `id_citizen` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `title`, `description`, `done`, `id_superhero`, `id_citizen`, `created_at`, `updated_at`) VALUES
(1, 'titulo', 'descripcion', 1, 1, 1, '2022-02-15 07:40:02', '2022-02-15 07:55:33');

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
CREATE TABLE `superhero` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `evolution` varchar(20) NOT NULL,
  `id_user` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `superhero`
--

INSERT INTO `superhero` (`id`, `name`, `image`, `evolution`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'mastermind', 'a', 'expert', 1, '2022-02-14 08:35:23', '2022-02-14 08:35:23'),
(6, 'asdfasdf', 'asdfgasdf', 'expert', 1, '2022-02-23 01:09:41', '2022-02-23 01:10:44');

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
CREATE TABLE `superhero_ability` (
  `id` int NOT NULL,
  `id_superhero` int NOT NULL,
  `id_abillity` int NOT NULL,
  `value` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
CREATE TABLE `user` (
  `id` int NOT NULL,
  `user` varchar(20) NOT NULL,
  `psw` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `psw`, `created_at`, `updated_at`) VALUES
(1, 'mastermind', 'mastermind', '2022-02-14 08:33:20', '2022-02-14 08:33:20'),
(2, 'johndoe', 'johndoe', '2022-02-14 08:35:58', '2022-02-14 08:35:58');

--
-- Triggers `user`
--
DROP TRIGGER IF EXISTS `user_update_updated_at`;
DELIMITER $$
CREATE TRIGGER `user_update_updated_at` BEFORE UPDATE ON `user` FOR EACH ROW SET NEW.updated_at=CURRENT_TIMESTAMP
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ability`
--
ALTER TABLE `ability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY_CITIZEN_USER` (`idUser`);

--
-- Indexes for table `evolution`
--
ALTER TABLE `evolution`
  ADD UNIQUE KEY `NAME` (`name`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY_REQUEST_CITIZEN_ID` (`id_citizen`),
  ADD KEY `FOREIGN_KEY_REQUEST_SUPERHERO_ID` (`id_superhero`);

--
-- Indexes for table `superhero`
--
ALTER TABLE `superhero`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN_KEY_SUPERHERO_USER_ID` (`id_user`) USING BTREE;

--
-- Indexes for table `superhero_ability`
--
ALTER TABLE `superhero_ability`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ability`
--
ALTER TABLE `ability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `citizen`
--
ALTER TABLE `citizen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `superhero`
--
ALTER TABLE `superhero`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `superhero_ability`
--
ALTER TABLE `superhero_ability`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `FOREIGN_KEY_REQUEST_CITIZEN_ID` FOREIGN KEY (`id_citizen`) REFERENCES `citizen` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `FOREIGN_KEY_REQUEST_SUPERHERO_ID` FOREIGN KEY (`id_superhero`) REFERENCES `superhero` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `superhero`
--
ALTER TABLE `superhero`
  ADD CONSTRAINT `FOREIGN_KEY_SUPERHERO_USER` FOREIGN KEY (`id_user`) REFERENCES `superhero` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
