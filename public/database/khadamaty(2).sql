-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2023 at 10:14 PM
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
-- Table structure for table `abonnement`
--

CREATE TABLE `abonnement` (
  `id_abn` int(11) NOT NULL,
  `id_tech` int(11) DEFAULT NULL,
  `date_abn` datetime DEFAULT NULL,
  `date_expiration` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abonnement`
--

INSERT INTO `abonnement` (`id_abn`, `id_tech`, `date_abn`, `date_expiration`) VALUES
(1, 2, '2023-05-11 16:21:06', '2023-03-11 16:21:06'),
(2, 3, '2023-05-10 17:14:11', '2023-04-14 17:14:11'),
(3, 15, '2023-05-14 17:14:11', '2023-06-17 00:00:00'),
(4, 16, '2023-05-15 16:47:35', '2023-06-15 00:00:00'),
(5, 17, '2023-05-16 15:48:53', '2023-06-16 15:48:53'),
(6, 18, '2023-06-03 20:36:08', '2023-06-03 20:36:08'),
(7, 19, '2023-06-03 20:39:28', '2023-06-03 20:39:28'),
(8, 20, '2023-06-03 20:53:09', '2023-06-03 21:08:09'),
(11, 23, '2023-06-03 21:04:47', '2023-07-03 21:04:47'),
(12, 24, '2023-06-03 21:05:41', '2023-07-03 21:05:41');

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
(3, '64580ab1e5d27.png', 8, 'test'),
(4, '646259fa031bb.png', 16, 'test'),
(5, '64775a4ac850e.png', 2, 'bricoule');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `logo_src` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `logo_src`) VALUES
(1, '64793bd128829.svg');

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
(8, 'Anfa', 1),
(10, 'Elhamiriya', 9),
(11, 'Hay Riyad', 2),
(12, 'Agdal', 2),
(13, 'Elmdina', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stripe`
--

CREATE TABLE `stripe` (
  `id` int(11) NOT NULL,
  `secret` varchar(255) DEFAULT NULL,
  `price_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stripe`
--

INSERT INTO `stripe` (`id`, `secret`, `price_id`) VALUES
(1, 'sk_test_51Mv8imG75BGk512GJqs1fadhGte9cR8nb3cFi8y29WP9IcfwjVPihFCkr0BW76VghMKlU8xoy5KQmmqqIMUZ9YKH005oC9cu4C', 'price_1N6YQ8G75BGk512Gq4BWVDV2');

-- --------------------------------------------------------

--
-- Table structure for table `subs`
--

CREATE TABLE `subs` (
  `id_sub` int(11) NOT NULL,
  `date_sub` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subs`
--

INSERT INTO `subs` (`id_sub`, `date_sub`) VALUES
(1, '2023-05-16 16:59:35'),
(2, '2023-05-16 16:59:42'),
(3, '2023-01-01 09:00:00'),
(4, '2023-02-05 14:30:00'),
(5, '2023-03-10 18:45:00'),
(6, '2023-04-15 11:20:00'),
(7, '2023-05-20 13:15:00'),
(8, '2023-06-25 16:40:00'),
(9, '2023-07-30 20:00:00'),
(10, '2023-08-04 10:30:00'),
(11, '2023-09-09 12:45:00'),
(12, '2023-10-14 15:10:00'),
(13, '2023-11-19 17:30:00'),
(14, '2023-12-24 19:45:00'),
(15, '2024-01-29 08:15:00'),
(16, '2024-02-02 09:40:00'),
(17, '2024-03-07 12:00:00'),
(18, '2023-01-01 09:00:00'),
(19, '2023-02-05 14:30:00'),
(20, '2023-03-10 18:45:00'),
(21, '2023-04-15 11:20:00'),
(22, '2023-05-20 13:15:00'),
(23, '2023-06-25 16:40:00'),
(24, '2023-07-30 20:00:00'),
(25, '2023-08-04 10:30:00'),
(26, '2023-09-09 12:45:00'),
(27, '2023-10-14 15:10:00'),
(28, '2023-11-19 17:30:00'),
(29, '2023-12-24 19:45:00'),
(30, '2024-01-29 08:15:00'),
(31, '2024-02-02 09:40:00'),
(32, '2024-03-07 12:00:00'),
(33, '2023-01-01 09:00:00'),
(34, '2023-02-05 14:30:00'),
(35, '2023-03-10 18:45:00'),
(36, '2023-04-15 11:20:00'),
(37, '2023-05-20 13:15:00'),
(38, '2023-06-25 16:40:00'),
(39, '2023-07-30 20:00:00'),
(40, '2023-08-04 10:30:00'),
(41, '2023-09-09 12:45:00'),
(42, '2023-10-14 15:10:00'),
(43, '2023-11-19 17:30:00'),
(44, '2023-12-24 19:45:00'),
(45, '2024-01-29 08:15:00'),
(46, '2024-02-02 09:40:00'),
(47, '2024-03-07 12:00:00'),
(48, '2024-03-07 12:00:00'),
(49, '2024-03-07 12:00:00'),
(50, '2024-03-07 12:00:00'),
(51, '2024-03-07 12:00:00'),
(52, '2024-03-07 12:00:00'),
(53, '2024-03-07 12:00:00'),
(54, '2023-01-01 00:00:00'),
(55, '2023-01-01 00:00:00'),
(56, '2023-01-01 00:00:00'),
(57, '2023-01-01 00:00:00'),
(58, '2023-01-01 00:00:00'),
(59, '2023-01-01 00:00:00'),
(60, '2023-01-01 00:00:00'),
(61, '2023-01-01 00:00:00'),
(62, '2023-01-01 00:00:00'),
(63, '2023-01-01 00:00:00'),
(64, '2023-01-01 00:00:00'),
(65, '2023-01-01 00:00:00'),
(66, '2023-01-01 00:00:00'),
(67, '2023-05-01 00:00:00'),
(68, '2023-05-01 00:00:00'),
(69, '2023-05-01 00:00:00'),
(70, '2023-05-01 00:00:00'),
(71, '2023-05-01 00:00:00'),
(72, '2023-05-01 00:00:00'),
(73, '2023-05-01 00:00:00'),
(74, '2023-05-01 00:00:00'),
(75, '2023-05-01 00:00:00'),
(76, '2023-05-01 00:00:00'),
(77, '2023-05-01 00:00:00'),
(78, '2023-05-01 00:00:00'),
(79, '2023-05-01 00:00:00'),
(80, '2023-05-01 00:00:00'),
(81, '2023-05-01 00:00:00'),
(82, '2023-05-01 00:00:00'),
(83, '2023-05-01 00:00:00'),
(84, '2023-05-01 00:00:00'),
(85, '2023-05-01 00:00:00'),
(86, '2023-05-01 00:00:00'),
(87, '2023-05-17 14:30:23');

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
  `description` text NOT NULL,
  `feedback` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techniciens`
--

INSERT INTO `techniciens` (`Id_tech`, `nom`, `prenom`, `email`, `phone`, `Fk_cat`, `adresse`, `id_ville`, `secteur`, `img`, `password`, `description`, `feedback`) VALUES
(2, 'yassine', 'benlaktib', 'benlaktib@gmail.com', '0624863735', 6, 'mhamid', 3, 'Gueliz', '64285f32d9b6f.jpeg', '$2y$10$rxC67hmgmEjhHki7PQ8/ZeGm3AYxhtqxBQiba6h8bwT5NQ7T3ksEq', 'description khfifa drifa 7alawa\r\n', 0),
(3, 'ahmad', 'bodal', 'ahmad@gmail.com', '', 3, '', 2, '', 'imgdefault.png', '$2y$10$NTfzkd2wkio.BgiQm1ZIDeVBBu9KDw/0m4sk9xf2dIUGsnZlXE4t2', 'default', 0),
(8, 'Alexadro', 'Pato', 'alex@gmail.com', '54654534', 3, '12848', 1, 'oualfa', 'imgdefault.png', '$2y$10$WAAxLK44y4vA55EmmMCRA.sypHVLEAQenHVShJzKMAw7mK4NEHacK', 'default', 0),
(15, 'anass', 'anass', 'anass@gmail.com', '06625252542654', 3, 'marrakech', 3, 'Daoudiyat', 'imgdefault.png', '$2y$10$rxC67hmgmEjhHki7PQ8/ZeGm3AYxhtqxBQiba6h8bwT5NQ7T3ksEq', 'default', 0),
(16, 'hamid', 'test', 'hamid@test.com', '0661283850', 3, 'gueliz', 3, 'Gueliz', 'imgdefault.png', '$2y$10$drRXm7LY5nz0.tO7.kdlEO.W80V.hByCO84N6d05QSe8K7jmtIJoW', 'default', 0),
(17, 'yassine', 'bbbbb', 'test77@gmail.com', '', 3, '', 1, 'oualfa', 'imgdefault.png', '$2y$10$x6LHN7qLPwGPabqF7/LWC.xl3.SahriG7Exagp0cOy01F07RIvH.y', '', 0),
(18, 'anoir', 'elabsi', 'elabsi@gmail.com', '', 3, '', 3, 'Gueliz', 'imgdefault.png', '$2y$10$0dEzW6.l3R05CCzKOKI4mOpIevKxaxRtJ/uDk4bnJajfC4RsLtraq', 'خبير عمل مستقل جاهز للتحديات. اخترني لمشروعك القادم', 0),
(19, 'hassan', 'wa 7assan', 'hassan@gmail.com', '06123456789', 5, 'maroc', 3, 'Gueliz', 'imgdefault.png', '$2y$10$tw6nt9yMUNdoNb58qDIHyOKr.GX85X1.ciN.xGGFoA/tGSXYEGPJa', 'خبير عمل مستقل جاهز للتحديات. اخترني لمشروعك القادم o nadi', 0),
(20, 'ronalldo', 'nazario', 'ronaldo@gmail.com', '', 3, '', 4, 'Ahlen', 'imgdefault.png', '$2y$10$QkTSOT8KNXvE6S61Kdnjr.UC.LGAM2pJC0YSoRU5ixahiT7at3Azi', 'خبير عمل مستقل جاهز للتحديات. اخترني لمشروعك القادم', 0),
(23, 'hfuhefuhezufh', 'iuhfuhzfd', 'azertyuio@gmail.com', '', 3, '', 2, 'Hay Riyad', 'imgdefault.png', '$2y$10$PeBSZZJ/VhyqEhOL17mdDeufk6AUYc5k./rn/WhEtIe8kl5O9y00W', 'خبير عمل مستقل جاهز للتحديات. اخترني لمشروعك القادم', 0),
(24, 'isagi', 'yochi', 'isagi@gmail.com', '', 3, '', 1, 'oualfa', 'imgdefault.png', '$2y$10$C0tiH5i6SmXBdDD7L1fO6.e1Xy29Um27tmdevMJ.f0kbMeDVHefiG', 'خبير عمل مستقل جاهز للتحديات. اخترني لمشروعك القادم', 0);

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
(21, 'Dakhla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id_abn`),
  ADD KEY `abonnement_ibfk_1` (`id_tech`);

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
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_review`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `reviews_ibfk_2` (`to_id`);

--
-- Indexes for table `secteurs`
--
ALTER TABLE `secteurs`
  ADD PRIMARY KEY (`id_secteur`),
  ADD KEY `secteurs_ibfk_1` (`id_ville`);

--
-- Indexes for table `stripe`
--
ALTER TABLE `stripe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subs`
--
ALTER TABLE `subs`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `techniciens`
--
ALTER TABLE `techniciens`
  ADD PRIMARY KEY (`Id_tech`),
  ADD KEY `techniciens_ibfk_1` (`Fk_cat`),
  ADD KEY `techniciens_ibfk_2` (`id_ville`);

--
-- Indexes for table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `id_abn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id_img` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `secteurs`
--
ALTER TABLE `secteurs`
  MODIFY `id_secteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stripe`
--
ALTER TABLE `stripe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subs`
--
ALTER TABLE `subs`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `techniciens`
--
ALTER TABLE `techniciens`
  MODIFY `Id_tech` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `abonnement_ibfk_1` FOREIGN KEY (`id_tech`) REFERENCES `techniciens` (`Id_tech`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`fk_tech`) REFERENCES `techniciens` (`Id_tech`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`to_id`) REFERENCES `techniciens` (`Id_tech`) ON DELETE CASCADE;

--
-- Constraints for table `secteurs`
--
ALTER TABLE `secteurs`
  ADD CONSTRAINT `secteurs_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id_ville`) ON DELETE CASCADE;

--
-- Constraints for table `techniciens`
--
ALTER TABLE `techniciens`
  ADD CONSTRAINT `techniciens_ibfk_1` FOREIGN KEY (`Fk_cat`) REFERENCES `categories` (`id_cat`) ON DELETE CASCADE,
  ADD CONSTRAINT `techniciens_ibfk_2` FOREIGN KEY (`id_ville`) REFERENCES `villes` (`id_ville`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
