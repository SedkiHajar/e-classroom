-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 30, 2020 at 01:09 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `abs`
--

CREATE TABLE `abs` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `nbrHeur` int(11) NOT NULL,
  `justif` varchar(100) DEFAULT 'NON',
  `id_mat` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `image` longblob,
  `nomE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `anneeS`
--

CREATE TABLE `anneeS` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `nom` varchar(110) NOT NULL,
  `id` int(11) NOT NULL,
  `emplois` longblob,
  `anneeS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `id_Class` int(11) NOT NULL,
  `id_Mat` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL,
  `support` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `devoir`
--

CREATE TABLE `devoir` (
  `id` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `id_Cours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `CIN` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `villeN` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `dateN` date NOT NULL,
  `anneeS` int(100) NOT NULL,
  `classe` int(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `image` longblob NOT NULL,
  `id_admin` int(11) NOT NULL,
  `mdp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `masteradmin`
--

CREATE TABLE `masteradmin` (
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `image` longblob NOT NULL,
  `id` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `logo` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matclass`
--

CREATE TABLE `matclass` (
  `id` int(11) NOT NULL,
  `id_Mat` int(11) NOT NULL,
  `id_Class` int(11) NOT NULL,
  `id_prof` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nom` varchar(110) NOT NULL,
  `coef` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `apreciation` varchar(100) NOT NULL,
  `note` int(11) NOT NULL,
  `id_etudiant` int(11) NOT NULL,
  `id_mat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE `pm` (
  `id2` int(11) DEFAULT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) DEFAULT NULL,
  `user1read` varchar(3) DEFAULT NULL,
  `user2read` varchar(3) DEFAULT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `professeur`
--

CREATE TABLE `professeur` (
  `CIN` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `villeN` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `dateN` date NOT NULL,
  `anneeS` int(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `sexe` varchar(100) NOT NULL,
  `image` longblob NOT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tableSC`
--

CREATE TABLE `tableSC` (
  `id` int(11) NOT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `id_Cours` int(11) DEFAULT NULL,
  `video` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tableSD`
--

CREATE TABLE `tableSD` (
  `id` int(11) NOT NULL,
  `nom` varchar(500) NOT NULL,
  `id_Devoir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abs`
--
ALTER TABLE `abs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mat` (`id_mat`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anneeS`
--
ALTER TABLE `anneeS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anneeS` (`anneeS`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Class` (`id_Class`),
  ADD KEY `id_Mat` (`id_Mat`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Indexes for table `devoir`
--
ALTER TABLE `devoir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Cours` (`id_Cours`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`CIN`),
  ADD KEY `classe` (`classe`),
  ADD KEY `anneeS` (`anneeS`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `masteradmin`
--
ALTER TABLE `masteradmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matclass`
--
ALTER TABLE `matclass`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Mat` (`id_Mat`),
  ADD KEY `id_Class` (`id_Class`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Indexes for table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_mat` (`id_mat`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`CIN`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `anneeS` (`anneeS`);

--
-- Indexes for table `tableSC`
--
ALTER TABLE `tableSC`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Cours` (`id_Cours`);

--
-- Indexes for table `tableSD`
--
ALTER TABLE `tableSD`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_Devoir` (`id_Devoir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abs`
--
ALTER TABLE `abs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `anneeS`
--
ALTER TABLE `anneeS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `devoir`
--
ALTER TABLE `devoir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `CIN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masteradmin`
--
ALTER TABLE `masteradmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matclass`
--
ALTER TABLE `matclass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275498;

--
-- AUTO_INCREMENT for table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `CIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=794;

--
-- AUTO_INCREMENT for table `tableSC`
--
ALTER TABLE `tableSC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215611;

--
-- AUTO_INCREMENT for table `tableSD`
--
ALTER TABLE `tableSD`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3966272;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`anneeS`) REFERENCES `anneeS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_Class`) REFERENCES `classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_ibfk_2` FOREIGN KEY (`id_Mat`) REFERENCES `matiere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cours_ibfk_3` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `devoir_ibfk_1` FOREIGN KEY (`id_Cours`) REFERENCES `cours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`classe`) REFERENCES `classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`anneeS`) REFERENCES `anneeS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `matclass`
--
ALTER TABLE `matclass`
  ADD CONSTRAINT `matclass_ibfk_2` FOREIGN KEY (`id_Mat`) REFERENCES `matiere` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matclass_ibfk_3` FOREIGN KEY (`id_Class`) REFERENCES `classe` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matclass_ibfk_4` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`CIN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `professeur_ibfk_2` FOREIGN KEY (`anneeS`) REFERENCES `anneeS` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tableSC`
--
ALTER TABLE `tableSC`
  ADD CONSTRAINT `tablesc_ibfk_1` FOREIGN KEY (`id_Cours`) REFERENCES `cours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tableSD`
--
ALTER TABLE `tableSD`
  ADD CONSTRAINT `tablesd_ibfk_1` FOREIGN KEY (`id_Devoir`) REFERENCES `devoir` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
