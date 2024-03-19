-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 23 fév. 2024 à 17:43
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `globe`
--

-- --------------------------------------------------------

--
-- Structure de la table `blocked`
--

DROP TABLE IF EXISTS `blocked`;
CREATE TABLE IF NOT EXISTS `blocked` (
  `id_user` int NOT NULL,
  `id_blocked` int NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `convo`
--

DROP TABLE IF EXISTS `convo`;
CREATE TABLE IF NOT EXISTS `convo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `convo`
--

INSERT INTO `convo` (`id`, `name`, `picture`) VALUES
(1, 'la convo des BG', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `convo_users`
--

DROP TABLE IF EXISTS `convo_users`;
CREATE TABLE IF NOT EXISTS `convo_users` (
  `id_convo` int NOT NULL,
  `id_user` int NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `convo_users`
--

INSERT INTO `convo_users` (`id_convo`, `id_user`, `time`) VALUES
(1, 1, '2024-02-21 09:45:54'),
(1, 2, '2024-02-21 09:45:56');

-- --------------------------------------------------------

--
-- Structure de la table `follow`
--

DROP TABLE IF EXISTS `follow`;
CREATE TABLE IF NOT EXISTS `follow` (
  `id_user` int NOT NULL,
  `id_follow` int NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `follow`
--

INSERT INTO `follow` (`id_user`, `id_follow`, `time`) VALUES
(1, 2, '2024-02-21 09:41:13');

-- --------------------------------------------------------

--
-- Structure de la table `hashtag_list`
--

DROP TABLE IF EXISTS `hashtag_list`;
CREATE TABLE IF NOT EXISTS `hashtag_list` (
  `hashtag` varchar(255) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_user` int NOT NULL,
  `id_tweet` int NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id_user`, `id_tweet`, `time`) VALUES
(2, 1, '2024-02-21 09:44:56'),
(2, 3, '2024-02-21 09:45:01');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_convo` int NOT NULL,
  `id_user` int NOT NULL,
  `content` varchar(10000) DEFAULT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_response` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `id_convo`, `id_user`, `content`, `time`, `id_response`) VALUES
(1, 1, 2, 'Arrete de tweet maintenant', '2024-02-21 10:47:29', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reactions`
--

DROP TABLE IF EXISTS `reactions`;
CREATE TABLE IF NOT EXISTS `reactions` (
  `id_message` int NOT NULL,
  `id_user` int NOT NULL,
  `reaction` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `retweet`
--

DROP TABLE IF EXISTS `retweet`;
CREATE TABLE IF NOT EXISTS `retweet` (
  `id_user` int NOT NULL,
  `id_tweet` int NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `retweet`
--

INSERT INTO `retweet` (`id_user`, `id_tweet`, `time`) VALUES
(1, 2, '2024-02-21 09:44:00');

-- --------------------------------------------------------

--
-- Structure de la table `signaled`
--

DROP TABLE IF EXISTS `signaled`;
CREATE TABLE IF NOT EXISTS `signaled` (
  `id_user` int NOT NULL,
  `id_signaled` int NOT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `starting_time` datetime NOT NULL,
  `stopping_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `token` varchar(30) DEFAULT NULL,
  `now` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `tweet`
--

DROP TABLE IF EXISTS `tweet`;
CREATE TABLE IF NOT EXISTS `tweet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_response` int DEFAULT NULL,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `content` varchar(255) NOT NULL,
  `id_quoted_tweet` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tweet`
--

INSERT INTO `tweet` (`id`, `id_user`, `id_response`, `time`, `content`, `id_quoted_tweet`) VALUES
(1, 1, NULL, '2024-02-21 10:42:31', 'SALUT VOICI UN TWEET DE SYPHAX', NULL),
(2, 2, 1, '2024-02-21 10:42:53', 'bon tweet ça', NULL),
(3, 1, 2, '2024-02-21 10:43:17', 'merci', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `at_user_name` varchar(30) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `banner` varchar(255) NOT NULL,
  `mail` varchar(65) NOT NULL,
  `password` varchar(50) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `private` tinyint(1) DEFAULT NULL,
  `creation_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `city` varchar(50) DEFAULT NULL,
  `campus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `at_user_name` (`at_user_name`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `at_user_name`, `profile_picture`, `bio`, `banner`, `mail`, `password`, `birthdate`, `private`, `creation_time`, `city`, `campus`) VALUES
(1, 'Syphax', '@Syphax', 'img/lm5p.jpg', 'Salut ici cest le twitter de Syphax le plus beau', 'img/1265.jpg', 'SyphaxLPB@gmail.com', 'eie2151sfe48465', '1999-02-01', 0, '2024-02-21 09:38:51', 'Paris', NULL),
(2, 'Romain', '@ronron', 'img/3fgm.jpg', 'ici ça code', 'img/ab65.jpg', 'ronron@free.fr', 'ffqoh861e2151465', '2002-05-06', 1, '2024-02-21 09:40:23', 'Paris', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
