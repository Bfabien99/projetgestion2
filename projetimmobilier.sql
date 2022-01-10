-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 10 jan. 2022 à 14:52
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetimmobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tel` int(11) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `pseudo`, `password`, `email`, `tel`, `picture`) VALUES
(1, 'fabienbrou', 'admin', 'admin', 'zanpolobino99@gmail.com', 153148864, 'IMG-61dc2a637c2550.17578076.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `proprietes`
--

CREATE TABLE `proprietes` (
  `id` int(11) NOT NULL,
  `ownername` varchar(255) NOT NULL,
  `ownertel` int(11) NOT NULL,
  `postdate` datetime NOT NULL,
  `picture` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `area` double NOT NULL,
  `details` varchar(10000) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proprietes`
--

INSERT INTO `proprietes` (`id`, `ownername`, `ownertel`, `postdate`, `picture`, `location`, `area`, `details`, `price`) VALUES
(14, 'Tatum Hall', 123456789, '2022-01-10 00:00:00', 'IMG-61dc387e5c0c09.56128876.jpeg', 'dicta quasi cum labo', 189, 'pariatur aliqua re', 577),
(15, 'Judah Nicholson', 2229275, '2022-01-10 00:00:00', 'IMG-61dc2b217f32d6.81289694.jpeg', 'dolor architecto per', 50, 'mollit aliquip commo', 777);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `proprietes`
--
ALTER TABLE `proprietes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `proprietes`
--
ALTER TABLE `proprietes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
