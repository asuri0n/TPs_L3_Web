-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 23 mars 2018 à 09:34
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_l3`
--

-- --------------------------------------------------------

--
-- Structure de la table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `species` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `animals`
--

INSERT INTO `animals` (`id`, `name`, `species`, `age`) VALUES
(1, 'Médor', 'chien', 4),
(2, 'Félix', 'chat', 97),
(3, 'Denver', 'dinosaure', 65000000),
(4, 'et', 'et', 50),
(5, 'et', 'et', 50),
(6, 'TESTTEST', 'tEST', 150),
(7, 'TESTTEST', 'tEST', 150),
(8, 'TESTTEST', 'tEST', 150),
(9, 'TESTTEST', 'tEST', 150),
(10, 'TESTTEST', 'tEST', 150),
(11, 'TESTTEST', 'tEST', 150),
(12, 'TESTTEST', 'tEST', 150),
(13, 'TESTTEST', 'tEST', 150),
(14, 'TESTTEST', 'tEST', 150),
(15, 'TESTTEST', 'tEST', 150),
(16, 'TESTTEST', 'tEST', 150),
(17, ' n', 'ddd', 50);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
