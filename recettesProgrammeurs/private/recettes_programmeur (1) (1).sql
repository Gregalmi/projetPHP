-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 23 jan. 2020 à 12:14
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `recettes_programmeur`
--

-- --------------------------------------------------------

--
-- Structure de la table `rp_categorie`
--

CREATE TABLE `rp_categorie` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_categorie`
--

INSERT INTO `rp_categorie` (`cat_id`, `cat_nom`) VALUES
(1, 'Dessert');

-- --------------------------------------------------------

--
-- Structure de la table `rp_commentaire`
--

CREATE TABLE `rp_commentaire` (
  `com_id` int(11) NOT NULL,
  `com_titre` varchar(20) DEFAULT NULL,
  `com_text` varchar(70) DEFAULT NULL,
  `com_date` datetime DEFAULT NULL,
  `com_fk_recette_id` int(11) NOT NULL,
  `com_fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rp_contact`
--

CREATE TABLE `rp_contact` (
  `con_id` int(11) NOT NULL,
  `con_sujet` varchar(255) DEFAULT NULL,
  `con_text` varchar(255) DEFAULT NULL,
  `con_email` varchar(70) DEFAULT NULL,
  `con_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rp_difficulte`
--

CREATE TABLE `rp_difficulte` (
  `dif_id` int(11) NOT NULL,
  `dif_nom` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_difficulte`
--

INSERT INTO `rp_difficulte` (`dif_id`, `dif_nom`) VALUES
(1, 'trés facile'),
(2, 'facile');

-- --------------------------------------------------------

--
-- Structure de la table `rp_etape`
--

CREATE TABLE `rp_etape` (
  `eta_id` int(11) NOT NULL,
  `eta_text` varchar(255) DEFAULT NULL,
  `eta_fk_recette_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_etape`
--

INSERT INTO `rp_etape` (`eta_id`, `eta_text`, `eta_fk_recette_id`) VALUES
(1, 'On commence par la pâte sablée : mettre le four à préchauffer à 180°C (thermostat 6).', 1),
(2, 'Fouetter les jaunes d\'oeuf avec le sucre et 2 cuillères d\'eau pour faire mousser.', 1),
(3, 'Mélanger au doigt la farine et le beurre coupé en petits cubes', 1),
(4, 'faire la creme', 5);

-- --------------------------------------------------------

--
-- Structure de la table `rp_ingredient`
--

CREATE TABLE `rp_ingredient` (
  `ing_id` int(11) NOT NULL,
  `ing_nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_ingredient`
--

INSERT INTO `rp_ingredient` (`ing_id`, `ing_nom`) VALUES
(1, 'farine'),
(2, 'beurre'),
(3, 'sucre'),
(4, 'jaune d\'oeuf'),
(5, 'eau'),
(6, 'sel'),
(7, 'citron'),
(8, 'blanc d\'oeuf'),
(9, ''),
(10, 'bigtasty'),
(11, 'bigtasty2'),
(12, 'lafoolie'),
(13, 'noing');

-- --------------------------------------------------------

--
-- Structure de la table `rp_prix`
--

CREATE TABLE `rp_prix` (
  `pri_id` int(11) NOT NULL,
  `pri_nom` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_prix`
--

INSERT INTO `rp_prix` (`pri_id`, `pri_nom`) VALUES
(1, '€'),
(2, '€€');

-- --------------------------------------------------------

--
-- Structure de la table `rp_quantite`
--

CREATE TABLE `rp_quantite` (
  `qua_fk_recette_id` int(11) NOT NULL,
  `qua_fk_ingredient_id` int(11) NOT NULL,
  `qua_quantite` int(11) DEFAULT NULL,
  `qua_mesure` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_quantite`
--

INSERT INTO `rp_quantite` (`qua_fk_recette_id`, `qua_fk_ingredient_id`, `qua_quantite`, `qua_mesure`) VALUES
(1, 1, 250, 'grammes'),
(1, 2, 100, 'grammes'),
(1, 3, 100, 'grammes'),
(1, 4, 2, NULL),
(5, 2, 250, 'grammes'),
(15, 9, 200, 'grammes'),
(16, 10, 5, ''),
(17, 11, 5, 'kg'),
(20, 11, 2, 'kgtl'),
(21, 12, 25, 'kg'),
(22, 13, 25, '');

-- --------------------------------------------------------

--
-- Structure de la table `rp_recette`
--

CREATE TABLE `rp_recette` (
  `rec_id` int(11) NOT NULL,
  `rec_nom` varchar(50) DEFAULT NULL,
  `rec_temps` time DEFAULT NULL,
  `rec_date` date DEFAULT NULL,
  `rec_date_modification` date DEFAULT NULL,
  `rec_fk_prix_id` int(11) DEFAULT NULL,
  `rec_fk_difficulte_id` int(11) DEFAULT NULL,
  `rec_fk_categorie_id` int(11) DEFAULT NULL,
  `rec_fk_user_id` int(11) DEFAULT NULL,
  `rec_img` varchar(255) DEFAULT NULL,
  `rec_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_recette`
--

INSERT INTO `rp_recette` (`rec_id`, `rec_nom`, `rec_temps`, `rec_date`, `rec_date_modification`, `rec_fk_prix_id`, `rec_fk_difficulte_id`, `rec_fk_categorie_id`, `rec_fk_user_id`, `rec_img`, `rec_description`) VALUES
(1, 'Tarte au citron meringuée', '01:00:00', '2020-01-16', NULL, 1, 1, 1, 4, 'assets/upload/tartecitronmeringue.jpg', 'Voici une petite recette facile et excellente !'),
(4, 'tarte aux pommes', '00:23:00', '2020-01-19', NULL, 1, 1, 1, 4, NULL, NULL),
(5, 'Creme anglaise', '02:00:00', '2020-01-19', NULL, 2, 2, 1, 6, NULL, NULL),
(6, 'Sandwich au thon', NULL, '2020-01-22', NULL, NULL, NULL, NULL, 4, NULL, NULL),
(12, 'Sandwich prix 11', NULL, '2020-01-22', NULL, 1, NULL, NULL, 4, NULL, NULL),
(15, 'test ingredient', '01:00:00', '2020-01-22', NULL, 1, 1, 1, 4, NULL, NULL),
(16, 'test  ing 2', '00:00:00', '2020-01-22', NULL, 1, 1, 1, 4, NULL, NULL),
(17, 'ingredient test 3', '01:00:00', '2020-01-22', NULL, 1, 1, 1, 4, NULL, NULL),
(20, 'test  ing 2 deja vu', '01:00:00', '2020-01-22', NULL, 1, 1, 1, 4, NULL, NULL),
(21, 'test ing si deja * 2', '02:00:00', '2020-01-22', NULL, 1, 1, 1, 4, NULL, NULL),
(22, 'dernier test 2201', '00:00:00', '2020-01-22', NULL, 1, 1, 1, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rp_user`
--

CREATE TABLE `rp_user` (
  `use_id` int(11) NOT NULL,
  `use_level` varchar(20) DEFAULT NULL,
  `use_login` varchar(20) DEFAULT NULL,
  `use_password` varchar(255) DEFAULT NULL,
  `use_email` varchar(50) DEFAULT NULL,
  `use_date` datetime DEFAULT NULL,
  `use_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_user`
--

INSERT INTO `rp_user` (`use_id`, `use_level`, `use_login`, `use_password`, `use_email`, `use_date`, `use_img`) VALUES
(1, '1', 'Bob', 'Bob13', 'bob13@gmail.com', '2020-01-16 00:00:00', NULL),
(2, '0', 'gregory', '$2y$10$IcIG4I59kN/bi', 'greg@gmail.com', '2020-01-18 10:39:52', NULL),
(3, '0', 'diego', '$2y$10$34H.w4Ie4Os9E', 'greg@gmail.com', '2020-01-18 10:43:14', NULL),
(4, '10', 'antoine', '$2y$10$53fHHrOYDEPChNHxKVMC8ud1kBfcQ.btAgbQ.tKk/m5ZMKsRf2bpa', 'antoine@gmail.com', '2020-01-19 10:55:28', NULL),
(5, '10', 'albert', '$2y$10$MKjWhImfsFRjGoavRWHb3.VUjZkCX5VIk1sRlnBTjQKiWSwwtNI2q', 'albert@gmail.com', '2020-01-19 11:05:13', NULL),
(6, '1', 'john', '$2y$10$Ra2C8DTSlNAHWGR91b7SOOX7MXgAIFdesB4W4PefMdWhSYPLic3c.', 'john@gmail.com', '2020-01-19 11:47:27', NULL),
(7, '1', 'sophie', '$2y$10$uUmIPnEYqllDzGszSW2GBOL3krSqkdP0rojNKsjAxX6eWSZyCFo3K', 'sophie@gmail.com', '2020-01-21 19:08:01', NULL),
(8, '1', 'michelle', '$2y$10$ik1njk5t5Qd62wM4NQLdruwQNB28nbc/3b.qOTLpj3hN5MH8hlN7u', 'michelle@gmail.com', '2020-01-21 19:09:25', NULL),
(9, '1', 'loic', '$2y$10$K.NAFoaOWktjSY2Xlw/WaurvZfR7svB7M2pWrl/hIAnDFgDJSrAWq', 'loic@gmail.com', '2020-01-21 19:13:48', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `rp_categorie`
--
ALTER TABLE `rp_categorie`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index pour la table `rp_commentaire`
--
ALTER TABLE `rp_commentaire`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `recette_id` (`com_fk_recette_id`),
  ADD KEY `user_id` (`com_fk_user_id`);

--
-- Index pour la table `rp_contact`
--
ALTER TABLE `rp_contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Index pour la table `rp_difficulte`
--
ALTER TABLE `rp_difficulte`
  ADD PRIMARY KEY (`dif_id`);

--
-- Index pour la table `rp_etape`
--
ALTER TABLE `rp_etape`
  ADD PRIMARY KEY (`eta_id`),
  ADD KEY `recette_id` (`eta_fk_recette_id`);

--
-- Index pour la table `rp_ingredient`
--
ALTER TABLE `rp_ingredient`
  ADD PRIMARY KEY (`ing_id`);

--
-- Index pour la table `rp_prix`
--
ALTER TABLE `rp_prix`
  ADD PRIMARY KEY (`pri_id`);

--
-- Index pour la table `rp_quantite`
--
ALTER TABLE `rp_quantite`
  ADD PRIMARY KEY (`qua_fk_recette_id`,`qua_fk_ingredient_id`),
  ADD KEY `ingredient_id_sert` (`qua_fk_ingredient_id`);

--
-- Index pour la table `rp_recette`
--
ALTER TABLE `rp_recette`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `prix_id` (`rec_fk_prix_id`),
  ADD KEY `difficulte_id` (`rec_fk_difficulte_id`),
  ADD KEY `categorie_id` (`rec_fk_categorie_id`),
  ADD KEY `user_id` (`rec_fk_user_id`);

--
-- Index pour la table `rp_user`
--
ALTER TABLE `rp_user`
  ADD PRIMARY KEY (`use_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `rp_categorie`
--
ALTER TABLE `rp_categorie`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `rp_commentaire`
--
ALTER TABLE `rp_commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rp_contact`
--
ALTER TABLE `rp_contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rp_difficulte`
--
ALTER TABLE `rp_difficulte`
  MODIFY `dif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `rp_etape`
--
ALTER TABLE `rp_etape`
  MODIFY `eta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rp_ingredient`
--
ALTER TABLE `rp_ingredient`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `rp_prix`
--
ALTER TABLE `rp_prix`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `rp_recette`
--
ALTER TABLE `rp_recette`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `rp_user`
--
ALTER TABLE `rp_user`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rp_commentaire`
--
ALTER TABLE `rp_commentaire`
  ADD CONSTRAINT `rp_commentaire_ibfk_1` FOREIGN KEY (`com_fk_recette_id`) REFERENCES `rp_recette` (`rec_id`),
  ADD CONSTRAINT `rp_commentaire_ibfk_2` FOREIGN KEY (`com_fk_user_id`) REFERENCES `rp_user` (`use_id`);

--
-- Contraintes pour la table `rp_etape`
--
ALTER TABLE `rp_etape`
  ADD CONSTRAINT `rp_etape_ibfk_1` FOREIGN KEY (`eta_fk_recette_id`) REFERENCES `rp_recette` (`rec_id`);

--
-- Contraintes pour la table `rp_quantite`
--
ALTER TABLE `rp_quantite`
  ADD CONSTRAINT `rp_quantite_ibfk_1` FOREIGN KEY (`qua_fk_recette_id`) REFERENCES `rp_recette` (`rec_id`),
  ADD CONSTRAINT `rp_quantite_ibfk_2` FOREIGN KEY (`qua_fk_ingredient_id`) REFERENCES `rp_ingredient` (`ing_id`);

--
-- Contraintes pour la table `rp_recette`
--
ALTER TABLE `rp_recette`
  ADD CONSTRAINT `rp_recette_ibfk_1` FOREIGN KEY (`rec_fk_prix_id`) REFERENCES `rp_prix` (`pri_id`),
  ADD CONSTRAINT `rp_recette_ibfk_2` FOREIGN KEY (`rec_fk_difficulte_id`) REFERENCES `rp_difficulte` (`dif_id`),
  ADD CONSTRAINT `rp_recette_ibfk_3` FOREIGN KEY (`rec_fk_categorie_id`) REFERENCES `rp_categorie` (`cat_id`),
  ADD CONSTRAINT `rp_recette_ibfk_4` FOREIGN KEY (`rec_fk_user_id`) REFERENCES `rp_user` (`use_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
