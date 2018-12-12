--
-- Base de données :  `pi_p2db`
--

-- --------------------------------------------------------


INSERT INTO `activite` (`id_activite`, `date_activite`, `ville_activite`, `nom_activite`, `code_activite`, `mail_activite`, `tel_activite`, `url_activite`, `descriptif_activite`, `adresse_activite`, `id_type_activite`) VALUES
(2, '2018-06-20', 'Test', 'Test', NULL, 'a.lambere@intech-sud.fr', '', 'http://lambert.com', 'gfhgjl', 'Test', NULL),
(4, '2018-07-10', 'La Chaudière', 'Randonnée pédestre', NULL, 'lop@gko', '', '', 'Départ du parking du Col de la Chaudière (parking de Siarra).', 'Parking de Siarra', 6),
(6, '2018-07-10', 'avignon', 'sport', NULL, 'sf@gmail.com', '011245780000000000', '', 'fgfgfgfgfgfgfgfgfgffgfgfgfgfgfgfgf', 'ze', 6),
(7, '2018-07-10', 'DAX', 'MUSEE', NULL, '', '', '', 'MUSEE DU VELO', 'RUE DE LA GARE', 6),
(8, '2018-07-10', 'st paul les dax', 'quad', NULL, '', '06120252025', '', 'ballade', '12 rue des cibles', 6);

INSERT INTO `boisson` (`id_boisson`, `nom_boisson`, `alcoolise`) VALUES
(1, 'Bière', 1),
(2, 'Coca Cola', 0),
(4, 'Vin Blanc', 1),
(5, 'Pétillant Raisin', 0),
(7, 'Jus d\'orange', 0);

INSERT INTO `conciergerie` (`id_preference`, `regime_conciergerie`, `aimeaimepas_conciergerie`, `loisir_conciergerie`, `hdiner_conciergerie`, `hdejeuner_conciergerie`, `gouts_conciergerie`, `arrive_conciergerie`, `depart_conciergerie`, `attente_conciergerie`, `raisonvenue_conciergerie`, `connaisetablissement_conciergerie`) VALUES
(82, 'Aucun', 'Aucune complication.', 'Course automobile et randonnée.', '20:30:00', '10:30:00', 'Jazz.', '2018-07-13', '2018-07-14', 'Boîte de chocolat.', 'Détente', 'In\'Tech'),
(83, 'Aucun', 'Pas de viande le soir, adore le poisson', 'Zumba et passer du temps en famille.', '20:30:00', '10:30:00', 'Musique relaxante.', '2018-07-13', '2018-07-14', 'Viennoiseries le matin.', 'Détente', 'Avec son mari.'),
(84, 'Aucun', 'Repas simple, enfant de moins de 6 ans (né en 2012).', 'Gym et les animaux.', '20:30:00', '10:30:00', '', NULL, NULL, NULL, NULL, NULL),
(86, 'Aucun', '+ viande rouge\r\n- poisson', 'Aime le vélo, n\'aime pas la natation', '21:00:00', '00:00:00', '', '2018-07-11', '2018-07-12', '', 'Venue entre amis', 'Client Box'),
(90, 'Végétarien', 'tert', 'sdsdsdsdsd', '18:00:00', '09:00:00', 'dsdsdsd', '2018-12-12', '2018-12-21', '', 'test', 'internet'),
(91, 'Végétarien', '', '', '19:00:00', '00:00:00', '', '2018-07-17', '2018-07-20', '', '', ''),
(92, 'Aucun', 'j\'aime manger les brocolis', 'marche', '19:00:00', '08:00:00', '', '2018-07-04', '2018-07-12', 'arrivée a 22 h', 'week end', 'internet');

INSERT INTO `formule` (`id_formule`, `id_typeformule`, `nom_formule`, `date_formule`) VALUES
(3, 2, 'Formulasse Dupont', '2018-07-10'),
(4, 1, 'vv', '2018-12-05');

INSERT INTO `formule_boisson` (`id_formule`, `id_boisson`) VALUES
(3, 4),
(4, 4);

INSERT INTO `formule_plat` (`id_plat`, `id_formule`) VALUES
(3, 3),
(3, 4),
(9, 4),
(12, 3);

INSERT INTO `groupe` (`id_groupe`, `type_groupe`, `id_adresse`, `nom_groupe`) VALUES
(1, NULL, NULL, 'Test');

INSERT INTO `info_adulte` (`id_info_adulte`, `situationfamiliale_adulte`, `mail_adulte`, `phone_adulte`, `entreprise_adulte`, `codepostal_adulte`, `adresse_adulte`, `ville_adulte`) VALUES
(28, 'veuf(ve)', 'a.malaise@intech-sud.fr', '0647789504', 'Dévellopeur', NULL, NULL, NULL),
(33, 'Marié(e)', 'n.dupond@hotmail.fr', '0607080910', 'In\'Tech', '40100', '7 avenue de la gare', 'Dax'),
(34, 'Marié(e)', 'k.dupond@outlook.fr', '0600153462', 'Cadre chez Egger', '40100', '7 avenue de la gare', 'Dax'),
(36, 'Célibataire', '', '0730285522', 'Professeur des écoles', '40100', '30 rue des assureurs', 'Dax'),
(40, 'Ne veut pas le spécifier', 'fakob@gmailm.com', '0545124578', 'Professeur des écoles', '13000', '4 square', 'MARSEILLE'),
(41, 'Ne veut pas le spécifier', '', '', '', '', 'RUE DE LA GARE', ''),
(42, 'En concubinage', '', '0618255252', 'etudiante', '40500', '108 route de beziez', 'MARSEILLE');

INSERT INTO `logement` (`id_logement`, `nom_logement`) VALUES
(1, 'Chambre 1'),
(2, 'Gîte'),
(3, 'Chalet');

INSERT INTO `materiel` (`id_materiel`, `nom_materiel`, `etat_materiel`, `id_type_materiel`, `id_historique_materiel`, `descriptif_materiel`, `id_logement`, `location_logement`) VALUES
(8, 'Sèche cheveux', 0, 2, NULL, '', NULL, 0),
(14, 'Quad rouge', 0, 1, NULL, '', NULL, 0),
(15, 'Raquettes', 1, 1, NULL, '', NULL, 0),
(16, 'vélo', 0, 1, NULL, '', NULL, 0),
(17, 'M2', 0, 2, NULL, 'QQ', 2, 1),
(18, 'ROLLER', 0, 2, NULL, '', 2, 1);

INSERT INTO `personne` (`id_personne`, `nom_personne`, `prenom_personne`, `sexe_personne`, `enfant`, `id_preference`, `id_info_adulte`, `id_utilisateur`) VALUES
(10, 'Dupond', 'Nicolas', 'Monsieur', 1, 82, 33, NULL),
(11, 'Dupond', 'Karine', 'Madame', 1, 83, 34, NULL),
(12, 'Dupond', 'Marlène', 'Fille', 0, 84, NULL, NULL),
(14, 'Dupont', 'Coban', 'Monsieur', 1, 86, 36, NULL),
(18, 'test', 'sofrat', 'Monsieur', 1, 90, 40, NULL),
(19, 'INTECH', 'SUD', 'Madame', 1, 91, 41, NULL),
(20, 'torres', 'vin', 'Madame', 1, 92, 42, NULL);

INSERT INTO `plat` (`id_plat`, `nom_plat`, `id_typeplat`) VALUES
(2, 'Araignée', 1),
(3, 'Frites', 3),
(4, 'Pâtes', 2),
(5, 'Haricots Verts', 3),
(6, 'Brocolis', 3),
(8, NULL, NULL),
(9, 'Lieu noir', 4),
(10, NULL, NULL),
(11, NULL, NULL),
(12, 'boeuf', 1),
(13, 'test', 1);

INSERT INTO `type_activite` (`id_type_activite`, `secteur_activite`) VALUES
(6, 'Extérieures'),
(10, 'TOURISTIQUE');

INSERT INTO `type_de_plats` (`id_typeplat`, `nom_typeplat`) VALUES
(1, 'Viande'),
(2, 'Féculent'),
(3, 'Légume'),
(4, 'Poisson'),
(5, 'Viennoiserie'),
(6, 'Soupe'),
(7, 'Fondue'),
(8, 'Farce'),
(9, 'En sauce'),
(10, 'Gratin'),
(11, 'Entrée'),
(12, 'Dessert');

INSERT INTO `type_formule` (`id_typeformule`, `nom_typeformule`) VALUES
(1, 'Matin'),
(2, 'Soir');

INSERT INTO `type_materiel` (`id_type_materiel`, `type_typemateriel`) VALUES
(1, 'Extérieur'),
(2, 'Logement');

INSERT INTO `utilisateur` (`login_utilisateur`, `pass_utilisateur`, `typeutilisateur_utilisateur`, `id_utilisateur`, `id_personne`) VALUES
('l.commarmond', 'l.commarmond', 1, 1, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`id_activite`),
  ADD KEY `FK_activite_id_type_activite` (`id_type_activite`);

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`),
  ADD KEY `FK_adresse_id_groupe` (`id_groupe`),
  ADD KEY `FK_adresse_id_ville` (`id_ville`);

--
-- Index pour la table `boisson`
--
ALTER TABLE `boisson`
  ADD PRIMARY KEY (`id_boisson`);

--
-- Index pour la table `conciergerie`
--
ALTER TABLE `conciergerie`
  ADD PRIMARY KEY (`id_preference`);

--
-- Index pour la table `formule`
--
ALTER TABLE `formule`
  ADD PRIMARY KEY (`id_formule`),
  ADD KEY `FK_formule_id_typeformule` (`id_typeformule`);

--
-- Index pour la table `formule_boisson`
--
ALTER TABLE `formule_boisson`
  ADD PRIMARY KEY (`id_formule`,`id_boisson`),
  ADD KEY `FK_formule_boisson_id_boisson` (`id_boisson`);

--
-- Index pour la table `formule_plat`
--
ALTER TABLE `formule_plat`
  ADD PRIMARY KEY (`id_plat`,`id_formule`),
  ADD KEY `FK_formule_plat_id_formule` (`id_formule`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_groupe`),
  ADD KEY `FK_groupe_id_adresse` (`id_adresse`);

--
-- Index pour la table `historique_materiel`
--
ALTER TABLE `historique_materiel`
  ADD PRIMARY KEY (`id_historique_materiel`),
  ADD KEY `FK_historique_materiel_id_materiel` (`id_materiel`),
  ADD KEY `FK_historique_materiel_id_personne` (`id_personne`);

--
-- Index pour la table `info_adulte`
--
ALTER TABLE `info_adulte`
  ADD PRIMARY KEY (`id_info_adulte`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id_materiel`),
  ADD KEY `FK_materiel_id_type` (`id_type_materiel`),
  ADD KEY `FK_materiel_id_historique_materiel` (`id_historique_materiel`),
  ADD KEY `FK_id_logement` (`id_logement`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`),
  ADD KEY `FK_personne_id_preference` (`id_preference`),
  ADD KEY `FK_personne_id_info_adulte` (`id_info_adulte`),
  ADD KEY `FK_personne_id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `personne_groupe`
--
ALTER TABLE `personne_groupe`
  ADD PRIMARY KEY (`id_personne`,`id_groupe`),
  ADD KEY `FK_personne_groupe_id_groupe` (`id_groupe`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`),
  ADD KEY `FK_plat_id_typeplat` (`id_typeplat`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `FK_reservation_id_logement` (`id_logement`);

--
-- Index pour la table `reservation_activite`
--
ALTER TABLE `reservation_activite`
  ADD PRIMARY KEY (`id_reservation`,`id_activite`),
  ADD KEY `FK_reservation_activite_id_activite` (`id_activite`);

--
-- Index pour la table `reservation_formule`
--
ALTER TABLE `reservation_formule`
  ADD PRIMARY KEY (`id_formule`,`id_reservation`),
  ADD KEY `FK_reservation_formule_id_reservation` (`id_reservation`);

--
-- Index pour la table `reservation_groupe`
--
ALTER TABLE `reservation_groupe`
  ADD PRIMARY KEY (`id_reservation`,`id_groupe`),
  ADD KEY `FK_reservation_groupe_id_groupe` (`id_groupe`);

--
-- Index pour la table `type_activite`
--
ALTER TABLE `type_activite`
  ADD PRIMARY KEY (`id_type_activite`),
  ADD UNIQUE KEY `secteur_activite` (`secteur_activite`);

--
-- Index pour la table `type_de_plats`
--
ALTER TABLE `type_de_plats`
  ADD PRIMARY KEY (`id_typeplat`);

--
-- Index pour la table `type_formule`
--
ALTER TABLE `type_formule`
  ADD PRIMARY KEY (`id_typeformule`);

--
-- Index pour la table `type_materiel`
--
ALTER TABLE `type_materiel`
  ADD PRIMARY KEY (`id_type_materiel`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`),
  ADD UNIQUE KEY `login_utilisateur` (`login_utilisateur`),
  ADD KEY `FK_utilisateur_id_personne` (`id_personne`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activite`
--
ALTER TABLE `activite`
  MODIFY `id_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `boisson`
--
ALTER TABLE `boisson`
  MODIFY `id_boisson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `conciergerie`
--
ALTER TABLE `conciergerie`
  MODIFY `id_preference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT pour la table `formule`
--
ALTER TABLE `formule`
  MODIFY `id_formule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_groupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `historique_materiel`
--
ALTER TABLE `historique_materiel`
  MODIFY `id_historique_materiel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `info_adulte`
--
ALTER TABLE `info_adulte`
  MODIFY `id_info_adulte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `type_activite`
--
ALTER TABLE `type_activite`
  MODIFY `id_type_activite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `type_de_plats`
--
ALTER TABLE `type_de_plats`
  MODIFY `id_typeplat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `type_formule`
--
ALTER TABLE `type_formule`
  MODIFY `id_typeformule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `type_materiel`
--
ALTER TABLE `type_materiel`
  MODIFY `id_type_materiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `FK_activite_id_type_activite` FOREIGN KEY (`id_type_activite`) REFERENCES `type_activite` (`id_type_activite`);

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `FK_adresse_id_groupe` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`),
  ADD CONSTRAINT `FK_adresse_id_ville` FOREIGN KEY (`id_ville`) REFERENCES `ville` (`id_ville`);

--
-- Contraintes pour la table `formule`
--
ALTER TABLE `formule`
  ADD CONSTRAINT `FK_formule_id_typeformule` FOREIGN KEY (`id_typeformule`) REFERENCES `type_formule` (`id_typeformule`);

--
-- Contraintes pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `FK_groupe_id_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `FK_personne_id_info_adulte` FOREIGN KEY (`id_info_adulte`) REFERENCES `info_adulte` (`id_info_adulte`),
  ADD CONSTRAINT `FK_personne_id_preference` FOREIGN KEY (`id_preference`) REFERENCES `conciergerie` (`id_preference`),
  ADD CONSTRAINT `FK_personne_id_utilisateur` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_reservation_id_logement` FOREIGN KEY (`id_logement`) REFERENCES `logement` (`id_logement`);

--
-- Contraintes pour la table `reservation_activite`
--
ALTER TABLE `reservation_activite`
  ADD CONSTRAINT `FK_reservation_activite_id_activite` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`),
  ADD CONSTRAINT `FK_reservation_activite_id_reservation` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `reservation_formule`
--
ALTER TABLE `reservation_formule`
  ADD CONSTRAINT `FK_reservation_formule_id_formule` FOREIGN KEY (`id_formule`) REFERENCES `formule` (`id_formule`),
  ADD CONSTRAINT `FK_reservation_formule_id_reservation` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `reservation_groupe`
--
ALTER TABLE `reservation_groupe`
  ADD CONSTRAINT `FK_reservation_groupe_id_groupe` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id_groupe`),
  ADD CONSTRAINT `FK_reservation_groupe_id_reservation` FOREIGN KEY (`id_reservation`) REFERENCES `reservation` (`id_reservation`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_utilisateur_id_personne` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
