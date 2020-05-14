-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 14 Mai 2020 à 13:55
-- Version du serveur :  5.7.30-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_web_si`
--

CREATE DATABASE IF NOT EXISTS tp_web_si;
USE tp_web_si;

--
-- Structure de la table `annuaire`
--

CREATE TABLE `annuaire` (
  `idAnnuaire` int(11) NOT NULL,
  `libelle` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `annuaire`
--

INSERT INTO `annuaire` (`idAnnuaire`, `libelle`) VALUES
(1, 'ETU'),
(2, 'PROF');

-- --------------------------------------------------------

--
-- Structure de la table `appartenance`
--

CREATE TABLE `appartenance` (
  `idGroupe` int(11) NOT NULL,
  `idIndividu` int(11) NOT NULL,
  `annee` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartenance`
--

INSERT INTO `appartenance` (`idGroupe`, `idIndividu`, `annee`) VALUES
(27, 202, 2020);

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE `groupe` (
  `idGroupe` int(11) NOT NULL,
  `libelle` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`idGroupe`, `libelle`) VALUES
(27, 'encoreUnTest'),
(24, 'remodifié'),
(25, 'tteste');

-- --------------------------------------------------------

--
-- Structure de la table `individu`
--

CREATE TABLE `individu` (
  `idIndividu` int(11) NOT NULL,
  `nom` varchar(55) DEFAULT NULL,
  `prenom` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `idStatut` int(11) NOT NULL,
  `idAnnuaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `individu`
--

INSERT INTO `individu` (`idIndividu`, `nom`, `prenom`, `email`, `num`, `idStatut`, `idAnnuaire`) VALUES
(200, 'Ba', 'Adja', 'Ba.Adja@parisnanterre.fr', 340003, 2, 2),
(201, 'Binous', 'Wassim', 'Binous.Wassim@parisnanterre.fr', 340004, 2, 2),
(202, 'Bocoum', 'Idy', 'Bocoum.Idy@parisnanterre.fr', 340005, 2, 2),
(203, 'Brochado', 'Alexandre', 'Brochado.Alexandre@parisnanterre.fr', 340006, 2, 2),
(204, 'Clebien', 'Nangninta', 'Clebien.Nangninta@parisnanterre.fr', 340007, 2, 2),
(205, 'Das', 'Rahul', 'Das.Rahul@parisnanterre.fr', 340008, 2, 2),
(206, 'Elarj', 'Aniss', 'Elarj.Aniss@parisnanterre.fr', 340009, 2, 2),
(207, 'Fall', 'Seynabou', 'Fall.Seynabou@parisnanterre.fr', 340010, 2, 2),
(208, 'Jestin', 'Gabriel', 'Jestin.Gabriel@parisnanterre.fr', 340011, 2, 2),
(209, 'Keloute ndamukong', 'Ubald', 'Keloute ndamukong.Ubald@parisnanterre.fr', 340012, 2, 2),
(210, 'Khalfi', 'Sofian', 'Khalfi.Sofian@parisnanterre.fr', 340013, 2, 2),
(211, 'Le men', 'Yann', 'Le men.Yann@parisnanterre.fr', 340014, 2, 2),
(212, 'Mboup', 'Gaye', 'Mboup.Gaye@parisnanterre.fr', 340015, 2, 2),
(213, 'Mouzouri', 'Ilhame', 'Mouzouri.Ilhame@parisnanterre.fr', 340016, 2, 2),
(214, 'Ndiaye', 'Moussa', 'Ndiaye.Moussa@parisnanterre.fr', 340017, 2, 2),
(215, 'Quellec', 'Nathan', 'Quellec.Nathan@parisnanterre.fr', 340018, 2, 2),
(216, 'Rajaratnam', 'Sarujan', 'Rajaratnam.Sarujan@parisnanterre.fr', 340019, 2, 2),
(217, 'Raypoulet', 'Hemanath', 'Raypoulet.Hemanath@parisnanterre.fr', 340020, 2, 2),
(218, 'Sakho', 'Assane', 'Sakho.Assane@parisnanterre.fr', 340021, 2, 2),
(219, 'Schauffler', 'Ophelie', 'Schauffler.Ophelie@parisnanterre.fr', 340022, 2, 2),
(220, 'Si-mohammed', 'Samy', 'Si-mohammed.Samy@parisnanterre.fr', 340023, 2, 2),
(221, 'Sidate', 'Alexis', 'Sidate.Alexis@parisnanterre.fr', 340024, 2, 2),
(222, 'Zemali', 'Lynda', 'Zemali.Lynda@parisnanterre.fr', 340025, 2, 2),
(223, 'Abalil', 'Rizlane', 'Abalil.Rizlane@parisnanterre.fr', 340026, 2, 2),
(224, 'Achou', 'Sara', 'Achou.Sara@parisnanterre.fr', 340027, 2, 2),
(225, 'Akkoura', 'Aniesse', 'Akkoura.Aniesse@parisnanterre.fr', 340028, 2, 2),
(226, 'Ali', 'Ikram-masjid', 'Ali.Ikram-masjid@parisnanterre.fr', 340029, 2, 2),
(227, 'Ali', 'Faiz', 'Ali.Faiz@parisnanterre.fr', 340030, 2, 2),
(228, 'Ali', 'Ikram-masjid', 'Ali.Ikram-masjid@parisnanterre.fr', 340031, 2, 2),
(229, 'Alouda', 'Lidao', 'Alouda.Lidao@parisnanterre.fr', 340032, 2, 2),
(230, 'Alouda', 'Lidao', 'Alouda.Lidao@parisnanterre.fr', 340033, 2, 2),
(231, 'Askar', 'Mohammad', 'Askar.Mohammad@parisnanterre.fr', 340034, 2, 2),
(232, 'Auger', 'Antoine', 'Auger.Antoine@parisnanterre.fr', 340035, 2, 2),
(233, 'Auger', 'Antoine', 'Auger.Antoine@parisnanterre.fr', 340036, 2, 2),
(234, 'Balde', 'Mamadou saliou', 'Balde.Mamadou saliou@parisnanterre.fr', 340037, 2, 2),
(235, 'Baro', 'Mohamed', 'Baro.Mohamed@parisnanterre.fr', 340038, 2, 2),
(236, 'Barolle', 'Romain', 'Barolle.Romain@parisnanterre.fr', 340039, 2, 2),
(237, 'Barolle', 'Romain', 'Barolle.Romain@parisnanterre.fr', 340040, 2, 2),
(238, 'Barry', 'Aissatou', 'Barry.Aissatou@parisnanterre.fr', 340041, 2, 2),
(239, 'Belhaimeur', 'Mohamed', 'Belhaimeur.Mohamed@parisnanterre.fr', 340042, 2, 2),
(240, 'Benaissa', 'Adam', 'Benaissa.Adam@parisnanterre.fr', 340043, 2, 2),
(241, 'Benali', 'Ahmed', 'Benali.Ahmed@parisnanterre.fr', 340044, 2, 2),
(242, 'Berte', 'Ulrich', 'Berte.Ulrich@parisnanterre.fr', 340045, 2, 2),
(243, 'Berte', 'Ulrich', 'Berte.Ulrich@parisnanterre.fr', 340046, 2, 2),
(244, 'Beyaz', 'Sefkan', 'Beyaz.Sefkan@parisnanterre.fr', 340047, 2, 2),
(245, 'Bodart', 'Valentin', 'Bodart.Valentin@parisnanterre.fr', 340048, 2, 2),
(246, 'Boucamus', 'Cassandra', 'Boucamus.Cassandra@parisnanterre.fr', 340049, 2, 2),
(247, 'Boumaza', 'Karim', 'Boumaza.Karim@parisnanterre.fr', 340050, 2, 2),
(248, 'Bouzekri', 'Ryan', 'Bouzekri.Ryan@parisnanterre.fr', 340051, 2, 2),
(249, 'Bouzekri', 'Ryan', 'Bouzekri.Ryan@parisnanterre.fr', 340052, 2, 2),
(250, 'Callet', 'Theo', 'Callet.Theo@parisnanterre.fr', 340053, 2, 2),
(251, 'Callet', 'Theo', 'Callet.Theo@parisnanterre.fr', 340054, 2, 2),
(252, 'Cazenave', 'Louis', 'Cazenave.Louis@parisnanterre.fr', 340055, 2, 2),
(253, 'Chatillon', 'Julien', 'Chatillon.Julien@parisnanterre.fr', 340056, 2, 2),
(254, 'Chatillon', 'Julien', 'Chatillon.Julien@parisnanterre.fr', 340057, 2, 2),
(255, 'Chen', 'Juline', 'Chen.Juline@parisnanterre.fr', 340058, 2, 2),
(256, 'Chen', 'Juline', 'Chen.Juline@parisnanterre.fr', 340059, 2, 2),
(257, 'Crentsil', 'Robert', 'Crentsil.Robert@parisnanterre.fr', 340060, 2, 2),
(258, 'Crentsil', 'Robert', 'Crentsil.Robert@parisnanterre.fr', 340061, 2, 2),
(259, 'Dandeu', 'Tom', 'Dandeu.Tom@parisnanterre.fr', 340062, 2, 2),
(260, 'Dandeu', 'Tom', 'Dandeu.Tom@parisnanterre.fr', 340063, 2, 2),
(261, 'Delaporte', 'Lucie', 'Delaporte.Lucie@parisnanterre.fr', 340064, 2, 2),
(262, 'Delaporte', 'Lucie', 'Delaporte.Lucie@parisnanterre.fr', 340065, 2, 2),
(263, 'Diop', 'Maguette', 'Diop.Maguette@parisnanterre.fr', 340066, 2, 2),
(264, 'Djamaldine ben', 'Hadji', 'Djamaldine ben.Hadji@parisnanterre.fr', 340067, 2, 2),
(265, 'Dubois', 'Dorian', 'Dubois.Dorian@parisnanterre.fr', 340068, 2, 2),
(266, 'El amrani', 'Amine', 'El amrani.Amine@parisnanterre.fr', 340069, 2, 2),
(267, 'Esmel', 'Nome', 'Esmel.Nome@parisnanterre.fr', 340070, 2, 2),
(268, 'Fahim', 'Aymane', 'Fahim.Aymane@parisnanterre.fr', 340071, 2, 2),
(269, 'Fekih', 'Kevin', 'Fekih.Kevin@parisnanterre.fr', 340072, 2, 2),
(270, 'Feugier', 'Augustin', 'Feugier.Augustin@parisnanterre.fr', 340073, 2, 2),
(271, 'Gac', 'Kevin', 'Gac.Kevin@parisnanterre.fr', 340074, 2, 2),
(272, 'Ganeshn', 'Haresh', 'Ganeshn.Haresh@parisnanterre.fr', 340075, 2, 2),
(273, 'Gavalda', 'Clement', 'Gavalda.Clement@parisnanterre.fr', 340076, 2, 2),
(274, 'Gilbert', 'Cyprien', 'Gilbert.Cyprien@parisnanterre.fr', 340077, 2, 2),
(275, 'Gilbert', 'Cyprien', 'Gilbert.Cyprien@parisnanterre.fr', 340078, 2, 2),
(276, 'Gorlicki', 'Paul', 'Gorlicki.Paul@parisnanterre.fr', 340079, 2, 2),
(277, 'Goyet', 'Camille', 'Goyet.Camille@parisnanterre.fr', 340080, 2, 2),
(278, 'Goyet', 'Camille', 'Goyet.Camille@parisnanterre.fr', 340081, 2, 2),
(279, 'Grandelaude', 'Mathias', 'Grandelaude.Mathias@parisnanterre.fr', 340082, 2, 2),
(280, 'Hadjara', 'Celina', 'Hadjara.Celina@parisnanterre.fr', 340083, 2, 2),
(281, 'Houhou', 'Sara', 'Houhou.Sara@parisnanterre.fr', 340084, 2, 2),
(282, 'Igoudjilene', 'Kenza', 'Igoudjilene.Kenza@parisnanterre.fr', 340085, 2, 2),
(283, 'Jalloh', 'Yusuf', 'Jalloh.Yusuf@parisnanterre.fr', 340086, 2, 2),
(284, 'Jardin', 'Samy', 'Jardin.Samy@parisnanterre.fr', 340087, 2, 2),
(285, 'Jardin', 'Samy', 'Jardin.Samy@parisnanterre.fr', 340088, 2, 2),
(286, 'Jules', 'Julissa', 'Jules.Julissa@parisnanterre.fr', 340089, 2, 2),
(287, 'Kadi', 'Imane', 'Kadi.Imane@parisnanterre.fr', 340090, 2, 2),
(288, 'Kadri', 'Nassim', 'Kadri.Nassim@parisnanterre.fr', 340091, 2, 2),
(289, 'Kende', 'Emmanuela', 'Kende.Emmanuela@parisnanterre.fr', 340092, 2, 2),
(290, 'Kouhafa', 'Latifa', 'Kouhafa.Latifa@parisnanterre.fr', 340093, 2, 2),
(291, 'Lacom', 'Marveen', 'Lacom.Marveen@parisnanterre.fr', 340094, 2, 2),
(292, 'Le', 'Phong sac', 'Le.Phong sac@parisnanterre.fr', 340095, 2, 2),
(293, 'Le lorier', 'Lucas', 'Le lorier.Lucas@parisnanterre.fr', 340096, 2, 2),
(294, 'Legendre', 'Angele', 'Legendre.Angele@parisnanterre.fr', 340097, 2, 2),
(295, 'Lemaza kunday ndjuka', 'Revelle', 'Lemaza kunday ndjuka.Revelle@parisnanterre.fr', 340098, 2, 2),
(296, 'Limbasse', 'Noemie', 'Limbasse.Noemie@parisnanterre.fr', 340099, 2, 2),
(297, 'Limbasse', 'Noemie', 'Limbasse.Noemie@parisnanterre.fr', 340100, 2, 2),
(298, 'Lin', 'Xinlei', 'Lin.Xinlei@parisnanterre.fr', 340101, 2, 2),
(299, 'Louveau', 'Christophe', 'Louveau.Christophe@parisnanterre.fr', 340102, 2, 2),
(300, 'Malinvaud', 'Paul', 'Malinvaud.Paul@parisnanterre.fr', 340103, 2, 2),
(301, 'Martin', 'Vanessa', 'Martin.Vanessa@parisnanterre.fr', 340104, 2, 2),
(302, 'Medaoud', 'Salim', 'Medaoud.Salim@parisnanterre.fr', 340105, 2, 2),
(303, 'Mousset', 'Pierre', 'Mousset.Pierre@parisnanterre.fr', 340106, 2, 2),
(304, 'Mousset', 'Pierre', 'Mousset.Pierre@parisnanterre.fr', 340107, 2, 2),
(306, 'Nanquette', 'Olivier', 'Nanquette.Olivier@parisnanterre.fr', 340109, 2, 2),
(307, 'Nass', 'Julien', 'Nass.Julien@parisnanterre.fr', 340110, 2, 2),
(308, 'Nass', 'Julien', 'Nass.Julien@parisnanterre.fr', 340111, 2, 2),
(309, 'Noursaid', 'Lahcen', 'Noursaid.Lahcen@parisnanterre.fr', 340112, 2, 2),
(310, 'Oumbe oumbe', 'David', 'Oumbe oumbe.David@parisnanterre.fr', 340113, 2, 2),
(311, 'Pires', 'Dany', 'Pires.Dany@parisnanterre.fr', 340114, 2, 2),
(312, 'Pires', 'Dany', 'Pires.Dany@parisnanterre.fr', 340115, 2, 2),
(313, 'Quenum', 'Heloise', 'Quenum.Heloise@parisnanterre.fr', 340116, 2, 2),
(314, 'Quenum', 'Heloise', 'Quenum.Heloise@parisnanterre.fr', 340117, 2, 2),
(315, 'Rageh', 'Nydel', 'Rageh.Nydel@parisnanterre.fr', 340118, 2, 2),
(316, 'Rageh', 'Nydel', 'Rageh.Nydel@parisnanterre.fr', 340119, 2, 2),
(317, 'Ripert', 'Alexandre', 'Ripert.Alexandre@parisnanterre.fr', 340120, 2, 2),
(318, 'Sadat', 'Halima', 'Sadat.Halima@parisnanterre.fr', 340121, 2, 2),
(319, 'Sardaoui', 'Amine', 'Sardaoui.Amine@parisnanterre.fr', 340122, 2, 2),
(320, 'Sereir', 'Zohra', 'Sereir.Zohra@parisnanterre.fr', 340123, 2, 2),
(321, 'Sharma', 'Aurelien', 'Sharma.Aurelien@parisnanterre.fr', 340124, 2, 2),
(322, 'Sintes', 'Manon', 'Sintes.Manon@parisnanterre.fr', 340125, 2, 2),
(323, 'Smahi', 'Lydia', 'Smahi.Lydia@parisnanterre.fr', 340126, 2, 2),
(324, 'Soleil', 'Emilie', 'Soleil.Emilie@parisnanterre.fr', 340127, 2, 2),
(325, 'Soumare', 'Fatimata', 'Soumare.Fatimata@parisnanterre.fr', 340128, 2, 2),
(326, 'Sun', 'Jialei', 'Sun.Jialei@parisnanterre.fr', 340129, 2, 2),
(327, 'Tahir', 'Mohamed - imrane', 'Tahir.Mohamed - imrane@parisnanterre.fr', 340130, 2, 2),
(328, 'Tissot', 'Guilhem', 'Tissot.Guilhem@parisnanterre.fr', 340131, 2, 2),
(329, 'Tliba', 'Ahmed', 'Tliba.Ahmed@parisnanterre.fr', 340132, 2, 2),
(330, 'LE ROUX', 'Annaig', 'LE ROUX.Annaig@parisnanterre.fr', 34100, 1, 1),
(331, 'Bouchakhchoukha', 'Adel', 'Bouchakhchoukha.Adel@parisnanterre.fr', 34101, 1, 1),
(332, 'BELLINI', 'Béatrice', 'BELLINI.Béatrice@parisnanterre.fr', 34102, 1, 1),
(333, 'Hardouin Ceccantini', 'Cécile', 'Hardouin Ceccantini.Cécile@parisnanterre.fr', 34103, 1, 1),
(334, 'Mesnager', 'Laurent', 'Mesnager.Laurent@parisnanterre.fr', 34104, 1, 1),
(335, 'Le Cun', 'Bertrand', 'Le Cun.Bertrand@parisnanterre.fr', 34105, 1, 1),
(336, 'Hanen', 'Claire', 'Hanen.Claire@parisnanterre.fr', 34106, 1, 1),
(337, 'Guyon', 'Thomas', 'Guyon.Thomas@parisnanterre.fr', 34107, 1, 1),
(338, 'Ben Hamida Mrabet', 'Sana', 'Ben Hamida Mrabet.Sana@parisnanterre.fr', 34108, 1, 1),
(339, 'Ikken', 'Sonia', 'Ikken.Sonia@parisnanterre.fr', 34109, 1, 1),
(340, 'Gervais', 'Marie-Pierre', 'Gervais.Marie-Pierre@parisnanterre.fr', 34110, 1, 1),
(341, 'Duvernet', 'Laurent', 'Duvernet.Laurent@parisnanterre.fr', 34111, 1, 1),
(342, 'Castillo_', 'Alberto', 'Castillo_.Alberto@parisnanterre.fr', 34112, 1, 1),
(343, 'Baarir', 'Souheib', 'Baarir.Souheib@parisnanterre.fr', 34113, 1, 1),
(344, 'Delbot', 'François', 'Delbot.François@parisnanterre.fr', 34114, 1, 1),
(345, 'Azhar-Arnal', 'Juliette', 'Azhar-Arnal.Juliette@parisnanterre.fr', 34115, 1, 1),
(346, 'Rukoz-Castillo', 'Marta', 'Rukoz-Castillo.Marta@parisnanterre.fr', 34116, 1, 1),
(347, 'Legond-Aubry', 'Fabrice', 'Legond-Aubry.Fabrice@parisnanterre.fr', 34117, 1, 1),
(348, 'Quinio', 'Bernard', 'Quinio.Bernard@parisnanterre.fr', 34118, 1, 1),
(349, 'Pradat-Peyre', 'Jean-François', 'Pradat-Peyre.Jean-François@parisnanterre.fr', 34119, 1, 1),
(350, 'Ameur', 'Yannick', 'Ameur.Yannick@parisnanterre.fr', 34120, 1, 1),
(351, 'Décallonne', 'Marc', 'Décallonne.Marc@parisnanterre.fr', 34121, 1, 1),
(352, 'Dubois', 'Aloîs', 'Dubois.Aloîs@parisnanterre.fr', 34122, 1, 1),
(353, 'Duriez', 'Nathalie', 'Duriez.Nathalie@parisnanterre.fr', 34123, 1, 1),
(354, 'Florea', 'Paul', 'Florea.Paul@parisnanterre.fr', 34124, 1, 1),
(355, 'Isoard', 'Thierry Michel', 'Isoard.Thierry Michel@parisnanterre.fr', 34125, 1, 1),
(356, 'Latif', 'Youssef', 'Latif.Youssef@parisnanterre.fr', 34126, 1, 1),
(357, 'Leloir', 'Nicole', 'Leloir.Nicole@parisnanterre.fr', 34127, 1, 1),
(358, 'Novelli', 'Emmanuelle', 'Novelli.Emmanuelle@parisnanterre.fr', 34128, 1, 1),
(359, 'Pujol', 'Nicolas', 'Pujol.Nicolas@parisnanterre.fr', 34129, 1, 1),
(360, 'Renaud', 'Francis', 'Renaud.Francis@parisnanterre.fr', 34130, 1, 1),
(361, 'Serdoun', 'Samy', 'Serdoun.Samy@parisnanterre.fr', 34131, 1, 1),
(362, 'Starck', 'Monia', 'Starck.Monia@parisnanterre.fr', 34132, 1, 1),
(363, 'Thomas', 'Aurélie', 'Thomas.Aurélie@parisnanterre.fr', 34133, 1, 1),
(364, 'Tourvieille', 'Marc', 'Tourvieille.Marc@parisnanterre.fr', 34134, 1, 1),
(365, 'Zamfirou', 'Michel', 'Zamfirou.Michel@parisnanterre.fr', 34135, 1, 1),
(366, 'Zilova', 'Jana', 'Zilova.Jana@parisnanterre.fr', 34136, 1, 1),
(367, 'Menouer', 'Tarek', 'Menouer.Tarek@parisnanterre.fr', 34137, 1, 1),
(368, 'Rodier', 'Lise', 'Rodier.Lise@parisnanterre.fr', 34138, 1, 1),
(369, 'Angarita Arocha', 'Rafael Enrique', 'Angarita Arocha.Rafael Enrique@parisnanterre.fr', 34139, 1, 1),
(370, 'Ait Salaht', 'Farah', 'Ait Salaht.Farah@parisnanterre.fr', 34140, 1, 1),
(371, 'Rousseau', 'Pierre', 'Rousseau.Pierre@parisnanterre.fr', 34141, 1, 1),
(372, 'Medjek', 'Sarah', 'Medjek.Sarah@parisnanterre.fr', 34142, 1, 1),
(373, 'Guézou', 'Xavier', 'Guézou.Xavier@parisnanterre.fr', 34143, 1, 1),
(374, 'D_Alfonso', 'Giovanna', 'D_Alfonso.Giovanna@parisnanterre.fr', 34144, 1, 1),
(375, 'KELLOU-MENOUER', 'Kenza', 'KELLOU-MENOUER.Kenza@parisnanterre.fr', 34145, 1, 1),
(376, 'Oulhaci', 'Faiza', 'Oulhaci.Faiza@parisnanterre.fr', 34146, 1, 1),
(377, 'Poizat', 'Pascal', 'Poizat.Pascal@parisnanterre.fr', 34147, 1, 1),
(378, 'SADDEM', 'Rim ', 'SADDEM.Rim @parisnanterre.fr', 34148, 1, 1),
(379, 'BENAMMAR', 'Nassima ', 'BENAMMAR.Nassima @parisnanterre.fr', 34149, 1, 1),
(380, 'ARFAOUI', 'Khadija', 'ARFAOUI.Khadija@parisnanterre.fr', 34150, 1, 1),
(381, 'Walter', 'Jean-Marc', 'Walter.Jean-Marc@parisnanterre.fr', 34151, 1, 1),
(382, 'Bendraou', 'Reda', 'Bendraou.Reda@parisnanterre.fr', 34152, 1, 1),
(383, 'Cojean', 'Bruno', 'Cojean.Bruno@parisnanterre.fr', 34153, 1, 1),
(384, 'Abrantes', 'Pedro', 'Abrantes.Pedro@parisnanterre.fr', 34154, 1, 1),
(385, 'Zouari', 'Belhassen', 'Zouari.Belhassen@parisnanterre.fr', 34155, 1, 1),
(386, 'HOUHOU', 'Sara ', 'HOUHOU.Sara @parisnanterre.fr', 34156, 1, 1),
(387, 'GUEHIS-SAADAOUI', 'Sonia', 'GUEHIS-SAADAOUI.Sonia@parisnanterre.fr', 34157, 1, 1),
(388, 'Hillah', 'Lom Messan', 'Hillah.Lom Messan@parisnanterre.fr', 34158, 1, 1),
(389, 'Hmedeh', 'Zeinab', 'Hmedeh.Zeinab@parisnanterre.fr', 34159, 1, 1),
(390, 'Gherbi', 'Tahar', 'Gherbi.Tahar@parisnanterre.fr', 34160, 1, 1),
(391, 'Alaoui', 'Malek', 'Alaoui.Malek@parisnanterre.fr', 34161, 1, 1),
(392, 'Non defini', 'Non defini', 'Non defini.Non defini@parisnanterre.fr', 404, 1, 1),
(393, 'Pierre', 'Laurent', 'Pierre.Laurent@parisnanterre.fr', 34163, 1, 1),
(394, 'Hyon', 'Emmanuel', 'Hyon.Emmanuel@parisnanterre.fr', 34164, 1, 1),
(1389, 'Import', 'Export', 'blabla@fake.fr', 355558, 1, 1),
(1390, 'test', 'test', 'test@fake.com', 350666, 1, 1),
(1392, 'TESTzaeeza', 'zaeaz', 'zaeaze@gmail.com', 56485, 1, 1),
(1393, 'Test5', 'Test5', 'Test5@gmail.com', 5555888, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `idStatut` int(11) NOT NULL,
  `libelle` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`idStatut`, `libelle`) VALUES
(1, 'PR'),
(2, 'ETU');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `annuaire`
--
ALTER TABLE `annuaire`
  ADD PRIMARY KEY (`idAnnuaire`);

--
-- Index pour la table `appartenance`
--
ALTER TABLE `appartenance`
  ADD PRIMARY KEY (`idGroupe`,`idIndividu`,`annee`),
  ADD KEY `idIndividu` (`idIndividu`);

--
-- Index pour la table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`idGroupe`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `individu`
--
ALTER TABLE `individu`
  ADD PRIMARY KEY (`idIndividu`),
  ADD UNIQUE KEY `num` (`num`),
  ADD KEY `idStatut` (`idStatut`),
  ADD KEY `idAnnuaire` (`idAnnuaire`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`idStatut`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `annuaire`
--
ALTER TABLE `annuaire`
  MODIFY `idAnnuaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `individu`
--
ALTER TABLE `individu`
  MODIFY `idIndividu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1394;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `idStatut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenance`
--
ALTER TABLE `appartenance`
  ADD CONSTRAINT `appartenance_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`idGroupe`),
  ADD CONSTRAINT `appartenance_ibfk_2` FOREIGN KEY (`idIndividu`) REFERENCES `individu` (`idIndividu`);

--
-- Contraintes pour la table `individu`
--
ALTER TABLE `individu`
  ADD CONSTRAINT `individu_ibfk_1` FOREIGN KEY (`idStatut`) REFERENCES `statut` (`idStatut`),
  ADD CONSTRAINT `individu_ibfk_2` FOREIGN KEY (`idAnnuaire`) REFERENCES `annuaire` (`idAnnuaire`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
