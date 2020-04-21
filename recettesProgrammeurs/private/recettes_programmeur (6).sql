-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 24 jan. 2020 à 11:52
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
(1, 'Apéritif'),
(2, 'Entrée'),
(3, 'Plat principal'),
(4, 'Dessert'),
(5, 'Boisson');

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
  `con_date` datetime DEFAULT NULL,
  `con_nom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `rp_contact`
--

INSERT INTO `rp_contact` (`con_id`, `con_sujet`, `con_text`, `con_email`, `con_date`, `con_nom`) VALUES
(2, 'ok', 'okok', 'ok@yahoo.fr', '2020-01-23 14:11:52', 'john');

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
(1, 'très facile'),
(2, 'facile'),
(3, 'difficile'),
(4, 'très difficile');

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
(5, 'Battez l\'oeuf avec les sucres et le sel', 31),
(6, 'Ajoutez la farine en 1 fois, pétrissez du bout des doigts', 31),
(7, 'Ajoutez le beurre mou en morceaux, pétrissez rapidement et formez une boule', 31),
(8, 'Faites cuire 10 minutes à 180°C, puis enlevez le \"poids\" et remettez 8-10 minutes pour bien cuire le centre. La pâte doit être dorée (sinon prolongez la cuisson de quelques minutes)', 31),
(9, 'faites tremper les pois chiches et les fèves dans l\'eau 12 h, les égoutter et les cuire 45 mn à l\'auto cuiseur.', 32),
(10, 'peler oignon et ail, les hacher ainsi que le persil.', 32),
(11, 'Pétrissez le tout avec vos mains en ajoutant un peu d\'eau si nécessaire.', 32),
(12, 'Rassemblez la pâte et laisser reposer au réfrigérateur pendant minimum 30 mn.', 32),
(13, 'façonner une trentaine de boulettes de la grosseur d\'une pièce de 2 euros.', 32),
(14, 'Préchauffer le four à Th 6 (180°C). Entretemps, mélanger la farine et les oeufs jusqu\'à obtenir un mélange onctueux. Ajouter l\'huile et l\'équivalent d\'1 verre de vin blanc sec.', 33),
(15, 'Egoutter les olives, les fariner légèrement et les incorporer à la pâte.', 33),
(16, 'Ajouter le jambon, bien malaxer et verser le gruyère râpé et la levure; bien poivrer, mais ne pas saler à cause du jambon!', 33),
(17, 'Beurrer un moule à cake, y verser la pâte jusqu\'aux 2/3.', 33),
(18, 'Enfourner le cake pendant 50 min à Th 6 (180°C).', 33),
(19, 'Si le dessus du cake prend une teinte dorée trop rapidement, le couvrir d\'une feuille de papier alu et le laisser cuire ainsi.', 33),
(20, 'Préchauffer le four à 210°C (thermostat 7).', 34),
(21, 'Etaler la pâte brisée et la piquer avec une fourchette.', 34),
(22, 'Emietter le thon sur la pâte.', 34),
(23, 'Mélanger dans un gros bol : la crème, le concentré de tomate, l\'oeuf et le sel; verser la préparation sur le thon.', 34),
(24, 'Saupoudrer d\'herbes de Provence, recouvrir de fromage râpé, puis faire cuire 25 min (selon puissance du four).', 34),
(25, 'Faites cuire les pâtes à l\'eau salée pendant 5 à 6 min.', 35),
(26, 'Egouttez-les et versez les dans 1 casserole. Ajoutez la crème, remuez et faites chauffer doucement. Salez, poivrez, muscadez.', 35),
(27, 'Faites chauffer une poêle à revêtement anti-adhésif. Posez les tranches de foie gras dedans et faites-les chauffer 1 min de chaque côté. Salez.', 35),
(28, 'Répartissez les pâtes à la crème dans les assiettes de service très chaudes. Ajoutez par-dessus 1 tranche de foie gras et 1 pincée de poivre concassé.', 35),
(29, 'Peler et émincer finement l’oignon. Couper les champignons en petits morceaux. Détailler les tranches de foie gras en cubes.', 36),
(30, 'Faire revenir l’oignon dans une casserole avec un peu d’huile d’olive, laisser revenir jusqu’à ce qu’il soit translucide.', 36),
(31, 'Ajouter les champignons de Paris et laisser mijoter jusqu’à évaporation totale de l’eau de cuisson des champignons.', 36),
(32, 'Ajouter le riz, bien mélanger et laisser cuire jusqu’à ce que les grains de riz deviennent translucides.', 36),
(33, 'Ajouter le vin blanc en une fois, remuer et laisser mijoter jusqu’à évaporation totale.', 36),
(34, 'Lorsque le riz est cuit, ajouter le parmesan, couvrir 2 minutes. Mélanger, le risotto devient alors bien crémeux. Ajouter les dés de foie gras. Goûter, saler et poivrer si besoin.', 36),
(35, 'Placer la pâte dans un moule et la piquer avec une fourchette.', 37),
(36, 'Badigeonner le fond avec de la moutarde.', 37),
(37, 'Écraser le thon puis le placer sur la pâte.', 37),
(38, 'Couper les tomates en tranches et les placer sur le thon.', 37),
(39, 'Mélanger les œufs, la crème et le lait (et du gruyère selon les goûts), avec sel et poivre, puis verser sur la pâte (ça doit recouvrir le thon et les tomates).', 37),
(40, 'Recouvrir le tout de gruyère....', 37),
(41, 'Cuire au four à 200°C pendant 20 à 25 min.', 37),
(42, 'Détailler le chocolat en pépites.', 38),
(43, 'Préchauffer le four à 180°C (thermostat 6). Dans un saladier, mettre 75 g de beurre, le sucre, l\'oeuf entier, la vanille et mélanger le tout.', 38),
(44, 'Ajouter petit à petit la farine mélangée à la levure, le sel et le chocolat.', 38),
(45, 'Beurrer une plaque allant au four et former les cookies sur la plaque.', 38),
(46, 'Pour former les cookies, utiliser 2 cuillères à soupe et faire des petits tas espacés les uns des autres; ils grandiront à la cuisson.', 38),
(47, 'Enfourner pour 10 minutes de cuisson.', 38),
(48, 'Préchauffer le four à 180°C (thermostat 6). Faire fondre le chocolat et le beurre au bain-marie à feu doux, ou au micro-ondes sur le programme \"décongélation\".', 39),
(49, 'Pendant ce temps, séparer les jaunes des blancs d\'oeuf.', 39),
(50, 'Monter les blancs en neige ferme. Réserver.', 39),
(51, 'Quand le mélange chocolat-beurre est bien fondu, ajouter les jaunes d’oeufs et fouetter.', 39),
(52, 'Incorporer le sucre et la farine, puis ajouter les blancs d’oeufs sans les casser.', 39),
(53, 'Beurrer et fariner un moule à manqué et y verser la pâte à gâteau.', 39),
(54, 'Enfourner pendant 20 minutes.', 39),
(55, 'Quand le gâteau est cuit, le laisser refroidir avant de le démouler.', 39);

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
(17, 'pois chiches'),
(18, 'oignon'),
(19, 'gousses d\'ail'),
(21, 'olives'),
(22, 'vin blanc'),
(23, 'huile'),
(24, 'gruyere'),
(25, 'jambon'),
(26, 'pâte brisée'),
(27, 'creme fraiche'),
(28, 'tomate concentré'),
(29, 'thon en boîte'),
(30, 'pâtes fraîches'),
(31, 'foie gras'),
(32, 'bouillon de volaille'),
(33, 'riz'),
(34, 'pâtes feuilletée'),
(35, 'oeuf'),
(36, 'chocolat noir'),
(44, 'bigtasty2');

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
(2, '€€'),
(3, '€€€'),
(4, '€€€€');

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
(31, 1, 250, 'grammes'),
(31, 2, 50, 'grammes'),
(31, 3, 200, 'grammes'),
(31, 4, 2, NULL),
(31, 7, 1, NULL),
(32, 6, 1, 'pincée'),
(32, 17, 500, 'grammes'),
(32, 18, 1, NULL),
(32, 19, 2, NULL),
(33, 21, 200, 'grammes'),
(33, 22, 1, 'verre'),
(33, 23, 15, 'cl'),
(33, 24, 150, 'grammes'),
(33, 25, 200, 'grammes'),
(34, 26, 1, ''),
(34, 27, 25, 'cl'),
(34, 28, 1, 'boite'),
(34, 29, 150, 'grammes'),
(35, 6, 1, 'pincée'),
(35, 27, 10, 'cl'),
(35, 30, 250, 'grammes'),
(35, 31, 4, 'tranches'),
(36, 6, 2, 'pincée'),
(36, 18, 1, NULL),
(36, 23, 10, 'cl'),
(36, 27, 20, 'cl'),
(36, 31, 4, 'tranches'),
(36, 32, 45, 'cl'),
(36, 33, 200, 'grammes'),
(37, 6, NULL, NULL),
(37, 24, 100, 'grammes'),
(37, 28, 1, 'boite'),
(37, 29, 1, 'boite'),
(37, 34, 1, ''),
(37, 35, 4, NULL),
(38, 1, 150, 'grammes'),
(38, 2, 80, 'grammes'),
(38, 35, 1, NULL),
(38, 36, 100, 'grammes'),
(39, 2, 100, 'grammes'),
(39, 3, 80, 'grammes'),
(39, 35, 1, NULL),
(39, 36, 200, 'grammes');

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
(31, 'Tarte au citron meringuée', '01:00:00', '2020-01-23', NULL, 1, 2, 4, 4, 'assets\\upload\\tartecitronmeringue.jpg', 'Un dessert excellent qui saura plaire aux grands comme aux petits. '),
(32, 'Falafel (croquettes de pois chiches)', '00:30:00', '2020-01-22', NULL, 1, 3, 3, 4, 'assets\\upload\\falafel.jpg', 'Les meilleurs Falafels qui raviront vos papilles !'),
(33, 'Cake aux olives', '00:30:00', '2020-01-23', NULL, 2, 2, 2, 4, 'assets\\upload\\cakeauxolives.jpg', 'Une délicieuse entrée légère et au bon goût.'),
(34, 'Tarte thon et tomate', '00:35:00', '2020-01-23', NULL, 1, 1, 2, 10, 'assets\\upload\\tartethontomate.jpg', 'Hyper rapide, pour ceux qui aiment bien cuisiner sans y passer beaucoup de temps. Vous pouvez remplacer la pâte brisée par de la pâte feuilletée.'),
(35, 'Pâtes fraîches au foie gras', '01:00:00', '2020-01-23', NULL, 3, 2, 3, 10, 'assets\\upload\\patesfoisgras.jpg', 'Un pur régal !'),
(36, 'Risotto au foie gras', '01:15:00', '2020-01-23', NULL, 3, 2, 3, 10, 'assets\\upload\\risotto.jpg', 'A déguster accompagné d’une flûte de Crémant de Loire.'),
(37, 'Quiche au thon', '01:00:00', '2020-01-24', NULL, 2, 1, 3, 4, 'assets\\upload\\quichethon.jpg', 'Pour ceux qui n\'ont pas beaucoup de temps.'),
(38, 'Cookie', '01:00:00', '2020-01-24', NULL, 1, 2, 4, 12, 'assets\\upload\\cookie.jpg', 'Très bonne recette que j\'ai déjà testée plusieurs fois ! Les cookies sont très bons, surtout avec de grosses pépites de chocolat faites maison ! Attention à ne pas faire cuire trop longtemps !'),
(39, 'Fondant au chocolat', '02:00:00', '2020-01-24', NULL, 1, 1, 4, 12, 'assets\\upload\\fondantchocolat.jpg', 'Délicieux pour les enfants !!');

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
(4, '10', 'antoine', '$2y$10$53fHHrOYDEPChNHxKVMC8ud1kBfcQ.btAgbQ.tKk/m5ZMKsRf2bpa', 'antoine@gmail.com', '2020-01-19 10:55:28', NULL),
(10, '1', 'Sophie', '$2y$10$cSkluati0psNnqwlp92u0eGig5Zeu2NgB74IKkv4FUrcMjJB/tPeu', 'Sophieaix@gmail.com', '2020-01-23 21:43:29', NULL),
(11, '1', 'Lilou', '$2y$10$QWlTm8hfPBSwBFbsqrKm9OH8jfRRXsKwJCVfVFPZpPEp2iSWyZtLm', 'Lilou@yahoo.fr', '2020-01-23 21:44:03', NULL),
(12, '1', 'Alain', '$2y$10$0Tt4wbN04Y/eFOwpcipJ8.9fDmRjndW7pHyfV2V06j9E9pL6LuVai', 'alain@gmail.com', '2020-01-23 21:44:34', NULL);

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
  ADD KEY `rp_commentaire_ibfk_1` (`com_fk_recette_id`),
  ADD KEY `rp_commentaire_ibfk_2` (`com_fk_user_id`);

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
  ADD KEY `rp_etape_ibfk_1` (`eta_fk_recette_id`);

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
  ADD KEY `rp_quantite_ibfk_2` (`qua_fk_ingredient_id`);

--
-- Index pour la table `rp_recette`
--
ALTER TABLE `rp_recette`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `rp_recette_ibfk_1` (`rec_fk_prix_id`),
  ADD KEY `rp_recette_ibfk_2` (`rec_fk_difficulte_id`),
  ADD KEY `rp_recette_ibfk_3` (`rec_fk_categorie_id`),
  ADD KEY `rp_recette_ibfk_4` (`rec_fk_user_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `rp_commentaire`
--
ALTER TABLE `rp_commentaire`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rp_contact`
--
ALTER TABLE `rp_contact`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `rp_difficulte`
--
ALTER TABLE `rp_difficulte`
  MODIFY `dif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `rp_etape`
--
ALTER TABLE `rp_etape`
  MODIFY `eta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT pour la table `rp_ingredient`
--
ALTER TABLE `rp_ingredient`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `rp_prix`
--
ALTER TABLE `rp_prix`
  MODIFY `pri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `rp_recette`
--
ALTER TABLE `rp_recette`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `rp_user`
--
ALTER TABLE `rp_user`
  MODIFY `use_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `rp_commentaire`
--
ALTER TABLE `rp_commentaire`
  ADD CONSTRAINT `rp_commentaire_ibfk_1` FOREIGN KEY (`com_fk_recette_id`) REFERENCES `rp_recette` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rp_commentaire_ibfk_2` FOREIGN KEY (`com_fk_user_id`) REFERENCES `rp_user` (`use_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rp_etape`
--
ALTER TABLE `rp_etape`
  ADD CONSTRAINT `rp_etape_ibfk_1` FOREIGN KEY (`eta_fk_recette_id`) REFERENCES `rp_recette` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rp_quantite`
--
ALTER TABLE `rp_quantite`
  ADD CONSTRAINT `rp_quantite_ibfk_1` FOREIGN KEY (`qua_fk_recette_id`) REFERENCES `rp_recette` (`rec_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rp_quantite_ibfk_2` FOREIGN KEY (`qua_fk_ingredient_id`) REFERENCES `rp_ingredient` (`ing_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rp_recette`
--
ALTER TABLE `rp_recette`
  ADD CONSTRAINT `rp_recette_ibfk_1` FOREIGN KEY (`rec_fk_prix_id`) REFERENCES `rp_prix` (`pri_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rp_recette_ibfk_2` FOREIGN KEY (`rec_fk_difficulte_id`) REFERENCES `rp_difficulte` (`dif_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rp_recette_ibfk_3` FOREIGN KEY (`rec_fk_categorie_id`) REFERENCES `rp_categorie` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rp_recette_ibfk_4` FOREIGN KEY (`rec_fk_user_id`) REFERENCES `rp_user` (`use_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
