--
-- Base de données :  `pi_p2db`
--

-- --------------------------------------------------------


CREATE TABLE `activite` (
  `id_activite` int(11) NOT NULL,
  `date_activite` date DEFAULT NULL,
  `ville_activite` varchar(255) DEFAULT NULL,
  `nom_activite` varchar(255) DEFAULT NULL,
  `code_activite` varchar(25) DEFAULT NULL,
  `mail_activite` varchar(255) DEFAULT NULL,
  `tel_activite` varchar(20) DEFAULT NULL,
  `url_activite` varchar(255) DEFAULT NULL,
  `descriptif_activite` varchar(255) DEFAULT NULL,
  `adresse_activite` varchar(255) DEFAULT NULL,
  `id_type_activite` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `adresse_adresse` varchar(255) NOT NULL,
  `codepostal_adresse` int(11) NOT NULL,
  `id_groupe` int(11) DEFAULT NULL,
  `id_ville` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `boisson` (
  `id_boisson` int(11) NOT NULL,
  `nom_boisson` varchar(255) DEFAULT NULL,
  `alcoolise` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `conciergerie` (
  `id_preference` int(11) NOT NULL,
  `regime_conciergerie` varchar(255) DEFAULT NULL,
  `aimeaimepas_conciergerie` varchar(255) DEFAULT NULL,
  `loisir_conciergerie` varchar(255) DEFAULT NULL,
  `hdiner_conciergerie` time NOT NULL,
  `hdejeuner_conciergerie` time NOT NULL,
  `gouts_conciergerie` varchar(255) NOT NULL,
  `arrive_conciergerie` date DEFAULT NULL,
  `depart_conciergerie` date DEFAULT NULL,
  `attente_conciergerie` varchar(255) DEFAULT NULL,
  `raisonvenue_conciergerie` varchar(255) DEFAULT NULL,
  `connaisetablissement_conciergerie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `formule` (
  `id_formule` int(11) NOT NULL,
  `id_typeformule` int(11) DEFAULT NULL,
  `nom_formule` varchar(255) DEFAULT NULL,
  `date_formule` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `formule_boisson` (
  `id_formule` int(11) NOT NULL,
  `id_boisson` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `formule_plat` (
  `id_plat` int(11) NOT NULL,
  `id_formule` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `groupe` (
  `id_groupe` int(11) NOT NULL,
  `type_groupe` tinyint(1) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `nom_groupe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `historique_materiel` (
  `id_historique_materiel` int(11) NOT NULL,
  `debut_reservation` date DEFAULT NULL,
  `fin_reservation` date DEFAULT NULL,
  `id_materiel` int(11) DEFAULT NULL,
  `id_personne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `info_adulte` (
  `id_info_adulte` int(11) NOT NULL,
  `situationfamiliale_adulte` varchar(25) NOT NULL,
  `mail_adulte` varchar(255) DEFAULT NULL,
  `phone_adulte` varchar(20) DEFAULT NULL,
  `entreprise_adulte` varchar(255) DEFAULT NULL,
  `codepostal_adulte` varchar(5) DEFAULT NULL,
  `adresse_adulte` varchar(255) DEFAULT NULL,
  `ville_adulte` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `nom_logement` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `materiel` (
  `id_materiel` int(11) NOT NULL,
  `nom_materiel` varchar(255) NOT NULL,
  `etat_materiel` tinyint(1) NOT NULL DEFAULT '0',
  `id_type_materiel` int(11) DEFAULT NULL,
  `id_historique_materiel` int(11) DEFAULT NULL,
  `descriptif_materiel` varchar(255) DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL,
  `location_logement` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nom_personne` varchar(255) NOT NULL,
  `prenom_personne` varchar(255) NOT NULL,
  `sexe_personne` varchar(255) DEFAULT NULL,
  `enfant` tinyint(1) DEFAULT NULL,
  `id_preference` int(11) DEFAULT NULL,
  `id_info_adulte` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `personne_groupe` (
  `id_personne` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nom_plat` varchar(255) DEFAULT NULL,
  `id_typeplat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `debut_reservation` date DEFAULT NULL,
  `fin_reservation` date DEFAULT NULL,
  `id_logement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reservation_activite` (
  `id_reservation` int(11) NOT NULL,
  `id_activite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reservation_formule` (
  `id_formule` int(11) NOT NULL,
  `id_reservation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `reservation_groupe` (
  `id_reservation` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `type_activite` (
  `id_type_activite` int(11) NOT NULL,
  `secteur_activite` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `type_de_plats` (
  `id_typeplat` int(11) NOT NULL,
  `nom_typeplat` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `type_formule` (
  `id_typeformule` int(11) NOT NULL,
  `nom_typeformule` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `type_materiel` (
  `id_type_materiel` int(11) NOT NULL,
  `type_typemateriel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `utilisateur` (
  `login_utilisateur` varchar(255) DEFAULT NULL,
  `pass_utilisateur` varchar(255) DEFAULT NULL,
  `typeutilisateur_utilisateur` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_personne` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `commune_ville` varchar(255) NOT NULL,
  `codepostal_ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;