-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 30 mai 2022 à 21:10
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `appg10b`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur_data`
--

CREATE TABLE `capteur_data` (
  `capteur_data_id` int(11) NOT NULL,
  `value` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `data_type_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur_data`
--

INSERT INTO `capteur_data` (`capteur_data_id`, `value`, `date_time`, `data_type_id`) VALUES
(1, 22, '2022-05-02 16:03:12', 1),
(2, 70, '2022-05-02 16:01:19', 2),
(3, 65, '2022-05-02 15:50:23', 3),
(4, 50, '2022-05-02 15:52:30', 4);

-- --------------------------------------------------------

--
-- Structure de la table `capteur_type`
--

CREATE TABLE `capteur_type` (
  `capteur_type_id` int(11) NOT NULL,
  `name` text,
  `unité` text,
  `zone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur_type`
--

INSERT INTO `capteur_type` (`capteur_type_id`, `name`, `unité`, `zone`) VALUES
(1, 'Temperature', '°C', 1),
(2, 'Humidité', '%', 1),
(3, 'Son', 'dB', 1),
(4, 'Luminosité', 'Lux.m²', 1);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `connexion_id` varchar(36) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `is-admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `FAQ`
--

CREATE TABLE `FAQ` (
  `FAQ_id` int(11) NOT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `FAQ`
--

INSERT INTO `FAQ` (`FAQ_id`, `question`, `answer`) VALUES
(1, 'Est-ce que les visiteurs ont le droit de nourrir les animaux ?', 'Seulement lors des évènements et heures autorisées'),
(2, 'Quelles zones ferment plus tôt ?', 'Les zones des lions et des éléphants ferment à 19h, et toutes les autres à 20h'),
(3, 'Comment accéder au parc ?', 'Vous pouvez venir en voiture, en bus ou en vélo.'),
(13, 'Le zoo est-il accessible en voiture?', 'Oui, un parking payant est disponible à l\'entrée');

-- --------------------------------------------------------

--
-- Structure de la table `password_reinitialisation`
--

CREATE TABLE `password_reinitialisation` (
  `pass_relnit_ID` varchar(36) NOT NULL,
  `email` text NOT NULL,
  `User_id` int(11) NOT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `User_id` int(11) NOT NULL,
  `Pseudo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `email` text,
  `lastName` text,
  `firstName` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`User_id`, `Pseudo`, `password`, `admin`, `score`, `email`, `lastName`, `firstName`) VALUES
(24, 'root', '$2y$10$B0U2YXUm.rnYK8Cjq7pGY.9D0FUXuRbgOPYZUI/HvWGlFDegVURBu', 1, 0, 'root@admin', 'root', 'root');

-- --------------------------------------------------------

--
-- Structure de la table `Zones`
--

CREATE TABLE `Zones` (
  `zone_id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Zones`
--

INSERT INTO `Zones` (`zone_id`, `nom`) VALUES
(1, 'singe');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteur_data`
--
ALTER TABLE `capteur_data`
  ADD UNIQUE KEY `capteur_data_capteur_data_id_uindex` (`capteur_data_id`);

--
-- Index pour la table `capteur_type`
--
ALTER TABLE `capteur_type`
  ADD PRIMARY KEY (`capteur_type_id`),
  ADD UNIQUE KEY `capteur_type_capteur_type_id_uindex` (`capteur_type_id`);

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`connexion_id`),
  ADD UNIQUE KEY `connexion_connexion_id_uindex` (`connexion_id`);

--
-- Index pour la table `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`FAQ_id`);

--
-- Index pour la table `password_reinitialisation`
--
ALTER TABLE `password_reinitialisation`
  ADD PRIMARY KEY (`pass_relnit_ID`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`User_id`);

--
-- Index pour la table `Zones`
--
ALTER TABLE `Zones`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteur_data`
--
ALTER TABLE `capteur_data`
  MODIFY `capteur_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `capteur_type`
--
ALTER TABLE `capteur_type`
  MODIFY `capteur_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `FAQ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `User`
--
ALTER TABLE `User`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `Zones`
--
ALTER TABLE `Zones`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
