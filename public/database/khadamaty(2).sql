-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2023 at 11:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khadamaty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `phone`, `password`) VALUES
(1, 'yassine', '0624863735', '123');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_cat`, `nom`, `description`, `img`) VALUES
(3, 'Electrical', 'Electrical', 'electrice.jpg'),
(4, 'painting', 'painting', 'sbagh.jpg'),
(5, 'Plumbing', 'Plumbing', 'plomberie.jpg'),
(6, 'Door Repair', 'Door Repair', 'njar.jpg'),
(7, 'Machine repair', 'Machine repair', 'electromenage.jpg'),
(8, 'Green House', 'Green House', 'parabole.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id_img` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `fk_tech` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id_img`, `img`, `fk_tech`, `description`) VALUES
(1, '64241ef09fae6.jpeg', 2, 'Test'),
(3, '64580ab1e5d27.png', 8, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id_review` int(11) NOT NULL,
  `from_id` int(11) DEFAULT NULL,
  `to_id` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id_review`, `from_id`, `to_id`, `content`) VALUES
(4, 2, 2, 'test yassine'),
(5, 2, 2, 'good work I apreciate it\r\nIt\'s was a pleasure to work with you ❤️'),
(9, 2, 2, 'a la'),
(12, 3, 2, 'haki o haki ya lala\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `secteurs`
--

CREATE TABLE `secteurs` (
  `id_secteur` int(11) NOT NULL,
  `secteur` varchar(255) DEFAULT NULL,
  `id_ville` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `secteurs`
--

INSERT INTO `secteurs` (`id_secteur`, `secteur`, `id_ville`) VALUES
(1, 'Gueliz', 3),
(2, 'Daoudiyat', 3),
(3, 'oualfa', 1),
(4, 'bourgoune', 1),
(5, 'Ahlen', 4),
(6, 'Merkalla', 4),
(8, 'Anfa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `techniciens`
--

CREATE TABLE `techniciens` (
  `Id_tech` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `Fk_cat` int(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `id_ville` int(100) NOT NULL,
  `secteur` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `feedback` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techniciens`
--

INSERT INTO `techniciens` (`Id_tech`, `nom`, `prenom`, `email`, `phone`, `Fk_cat`, `adresse`, `id_ville`, `secteur`, `img`, `password`, `feedback`) VALUES
(2, 'yassine', 'benlaktib', 'benlaktib@gmail.com', '0624863735', 3, 'mhamid', 1, 'Gueliz', '64285f32d9b6f.jpeg', '$2y$10$SROYR1QyJGxc4WNRwLHYAuN/8lgIiVbPymtertk0jRxvcixl6ygHG', 0),
(3, 'ahmad', 'bodal', 'ahmad@gmail.com', '', 3, '', 2, '', 'imgdefault.png', '$2y$10$NTfzkd2wkio.BgiQm1ZIDeVBBu9KDw/0m4sk9xf2dIUGsnZlXE4t2', 0),
(8, 'Alexadro', 'Pato', 'alex@gmail.com', '54654534', 7, '12848', 1, 'oualfa', 'imgdefault.png', '$2y$10$WAAxLK44y4vA55EmmMCRA.sypHVLEAQenHVShJzKMAw7mK4NEHacK', 0),
(12, '[value-2]', '[value-3]', '[value-4]', '[value-5]', 3, '[value-7]', 1, 'oualfa', 'imgdefault.png', '[value-11]', 0),
(13, '[value-2]', '[value-3]', '[value-4]', '[value-5]', 3, '[value-7]', 1, 'oualfa', 'imgdefault.png', '[value-11]', 0),
(14, '[value-2]', '[value-3]', '[value-4]', '[value-5]', 3, '[value-7]', 1, 'oualfa', 'imgdefault.png', '[value-11]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `villes`
--

CREATE TABLE `villes` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `villes`
--

INSERT INTO `villes` (`id_ville`, `nom_ville`) VALUES
(1, 'Casablanca'),
(2, 'Rabat'),
(3, 'Marrakech'),
(4, 'Tanger'),
(5, 'Fès'),
(6, 'Agadir'),
(7, 'Oujda'),
(8, 'Essaouira'),
(9, 'Meknès'),
(10, 'Tétouan'),
(11, 'El Jadida'),
(13, 'Kénitra'),
(14, 'Nador'),
(15, 'Mohammedia'),
(16, 'Béni Mellal'),
(17, 'Ouarzazate'),
(18, 'Chefchaouen'),
(19, 'Safi'),
(20, 'Laâyoune'),
(21, 'Dakhla'),
(24, 'Tout le maroc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`),
  ADD KEY `fk_tech` (`fk_tech`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`to_id`);

--
-- Indexes for table `secteurs`
--
ALTER TABLE `secteurs`
  ADD PRIMARY KEY (`id_secteur`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Indexes for table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`Id_tech`),
  ADD KEY `Fk_cat` (`Fk_cat`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `secteurs`
--
ALTER TABLE `secteurs`
  MODIFY `id_secteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `Id_tech` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`fk_tech`) REFERENCES `techniciens` (`Id_tech`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `techniciens` (`Id_tech`);

--
-- Constraints for table `secteurs`
--
ALTER TABLE `secteurs`
  ADD CONSTRAINT `secteurs_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id_ville`);

--
-- Constraints for table `techniciens`
--
ALTER TABLE `techniciens`
  ADD CONSTRAINT `techniciens_ibfk_1` FOREIGN KEY (`Fk_cat`) REFERENCES `categories` (`id_cat`),
  ADD CONSTRAINT `techniciens_ibfk_2` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id_ville`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
