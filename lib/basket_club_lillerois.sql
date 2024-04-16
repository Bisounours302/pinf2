-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 16 avr. 2024 à 21:10
-- Version du serveur : 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `basket_club_lillerois`
--

-- --------------------------------------------------------

--
-- Structure de la table `boutique_objets`
--

CREATE TABLE `boutique_objets` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `boutique_objets`
--

INSERT INTO `boutique_objets` (`id`, `nom`, `prix`, `description`, `photo_url`) VALUES
(1, 'VESTE BCL', '20.00', 'Veste floquée BCL\r\n100% coton', 'veste.jpg'),
(2, 'CASQUETTE', '15.00', 'casquette BCL', 'casquette.png'),
(3, 'CHAPEAU', '3.00', 'chapeau BCL', 'chapeau.jpg'),
(4, 'CHAPEAU DELUXE', '10000.00', 'CHAPEAU DU SWAG', 'chapeau.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `entrainement`
--

CREATE TABLE `entrainement` (
  `equipe_id` int(11) NOT NULL,
  `jour` text NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entrainement`
--

INSERT INTO `entrainement` (`equipe_id`, `jour`, `heure_debut`, `heure_fin`) VALUES
(1, 'mardi', '20:30:00', '22:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `equipes`
--

INSERT INTO `equipes` (`id`, `nom`, `description`) VALUES
(1, 'SENIORAM', 'Equipe senior A masculine'),
(2, 'SENIORBM', 'Equipe senior B masculine'),
(3, 'SENIORCM', 'Equipe senior C masculine'),
(4, 'SENIORF', 'Equipe senior féminine'),
(5, 'U17AM', 'Equipe U17 masculine A'),
(6, 'U17BM', 'Equipe U17 masculine B'),
(7, 'U17F', 'Equipe U17 féminine'),
(8, 'U15M', 'Equipe U15 masculine'),
(9, 'U15F', 'Equipe U15 féminine'),
(10, 'U13M', 'Equipe U13 masculine'),
(11, 'U13F', 'Equipe U13 féminine'),
(12, 'U11M', 'Equipe U11 masculine'),
(13, 'U11F', 'Equipe U11 féminine'),
(14, 'U9M', 'Equipe U9 masculine'),
(15, 'U9F', 'Equipe U9 féminine'),
(16, 'AUTRES', 'Autres équipes');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `equipe_id` int(11) DEFAULT NULL,
  `annee` int(11) DEFAULT NULL,
  `photo_url` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `equipe_id`, `annee`, `photo_url`, `description`) VALUES
(35, 16, 2010, 'image38.png', 'Description de l\'image'),
(36, 13, 2011, 'image4.png', 'Description de l\'image'),
(37, 12, 2011, 'image28.png', 'Description de l\'image'),
(38, 10, 2011, 'image50.png', 'Description de l\'image'),
(39, 9, 2011, 'image16.png', 'Description de l\'image'),
(40, 14, 2011, 'image27.png', 'Description de l\'image'),
(41, 16, 2012, 'image42.png', 'Description de l\'image'),
(42, 16, 2012, 'image47.png', 'Description de l\'image'),
(43, 2, 2012, 'image22.png', 'Description de l\'image'),
(44, 12, 2012, 'image14.png', 'Description de l\'image'),
(45, 15, 2012, 'image37.png', 'Description de l\'image'),
(46, 14, 2012, 'image23.png', 'Description de l\'image'),
(47, 1, 2013, 'image30.png', 'Description de l\'image'),
(48, 4, 2013, 'image15.png', 'Description de l\'image'),
(49, 10, 2013, 'image33.png', 'Description de l\'image'),
(50, 9, 2013, 'image31.png', 'Description de l\'image'),
(51, 14, 2013, 'image45.png', 'Description de l\'image'),
(52, 1, 2014, 'image29.png', 'Description de l\'image'),
(53, 1, 2014, 'image32.png', 'Description de l\'image'),
(54, 10, 2014, 'image7.png', 'Description de l\'image'),
(55, 9, 2014, 'image21.png', 'Description de l\'image'),
(56, 8, 2014, 'image36.png', 'Description de l\'image'),
(57, 14, 2014, 'image2.png', 'Description de l\'image'),
(58, 3, 2015, 'image34.png', 'Description de l\'image'),
(59, 12, 2015, 'image3.png', 'Description de l\'image'),
(60, 9, 2015, 'image9.png', 'Description de l\'image'),
(61, 10, 2016, 'image1.png', 'Description de l\'image'),
(62, 5, 2016, 'image41.png', 'Description de l\'image'),
(63, 15, 2016, 'image10.png', 'Description de l\'image'),
(64, 15, 2016, 'image49.png', 'Description de l\'image'),
(65, 3, 2018, 'image12.png', 'Description de l\'image'),
(66, 4, 2018, 'image26.png', 'Description de l\'image'),
(67, 4, 2018, 'image8.png', 'Description de l\'image'),
(68, 14, 2018, 'image40.png', 'Description de l\'image'),
(69, 9, 2019, 'image46.png', 'Description de l\'image'),
(70, 14, 2019, 'image17.png', 'Description de l\'image'),
(71, 12, 2020, 'image24.png', 'Description de l\'image'),
(72, 5, 2020, 'image39.png', 'Description de l\'image'),
(73, 15, 2020, 'image6.png', 'Description de l\'image'),
(74, 4, 2022, 'image48.png', 'Description de l\'image'),
(75, 13, 2022, 'image11.png', 'Description de l\'image'),
(76, 16, 2023, 'image18.png', 'Description de l\'image'),
(77, 16, 2023, 'image25.png', 'Description de l\'image'),
(78, 8, 2023, 'image44.png', 'Description de l\'image'),
(79, 6, 2023, 'image5.png', 'Description de l\'image'),
(80, 16, 2024, 'image19.png', 'Description de l\'image'),
(81, 16, 2024, 'image35.png', 'Description de l\'image'),
(82, 3, 2024, 'image43.png', 'Description de l\'image'),
(83, 13, 2024, 'image20.png', 'Description de l\'image'),
(84, 7, 2024, 'image13.png', 'Description de l\'image');

-- --------------------------------------------------------

--
-- Structure de la table `joueurs`
--

CREATE TABLE `joueurs` (
  `id_joueur` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `id_equipe` int(11) NOT NULL,
  `entraineur` int(11) DEFAULT NULL,
  `photo_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(11) NOT NULL,
  `dateMatch` date NOT NULL,
  `opposant` varchar(255) NOT NULL,
  `equipe` text NOT NULL,
  `adresse` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`id`, `dateMatch`, `opposant`, `equipe`, `adresse`) VALUES
(1, '2022-04-19', 'Auchel', 'U17M', '1 rue du Pré'),
(2, '2024-04-17', 'Isbergues', 'SM3', '1 rue du Pré'),
(3, '2024-05-14', 'Dunkerque', 'SF1', '1 rue du Pré'),
(4, '2025-01-01', 'Paris', 'U13F', '1 rue du Pré');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `boutique_objets`
--
ALTER TABLE `boutique_objets`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipe_id` (`equipe_id`);

--
-- Index pour la table `joueurs`
--
ALTER TABLE `joueurs`
  ADD PRIMARY KEY (`id_joueur`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `boutique_objets`
--
ALTER TABLE `boutique_objets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT pour la table `joueurs`
--
ALTER TABLE `joueurs`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD CONSTRAINT `galerie_ibfk_1` FOREIGN KEY (`equipe_id`) REFERENCES `equipes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
