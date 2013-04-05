-- phpMyAdmin SQL Dump
-- version 3.3.9.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 05 Avril 2013 à 08:00
-- Version du serveur: 5.5.9
-- Version de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `site_ejs`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(50) NOT NULL,
  `cat_label` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_label`) VALUES
(1, 'Technologies Web', ''),
(2, 'Base de donn&eacute;es', ''),
(3, 'Programmation orient&eacute;e objet', ''),
(4, 'Programmation proc&eacute;durale', '');

-- --------------------------------------------------------

--
-- Structure de la table `competent`
--

CREATE TABLE IF NOT EXISTS `competent` (
  `comp_us_id` int(11) NOT NULL,
  `comp_lvl_id` int(11) NOT NULL,
  `comp_kno_id` int(11) NOT NULL,
  `comp_date` datetime NOT NULL,
  `comp_detail` text NOT NULL,
  `comp_valid` tinyint(4) NOT NULL DEFAULT '0',
  `comp_visible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`comp_us_id`,`comp_lvl_id`,`comp_kno_id`,`comp_date`),
  KEY `comp_lvl_id` (`comp_lvl_id`),
  KEY `comp_kno_id` (`comp_kno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `competent`
--

INSERT INTO `competent` (`comp_us_id`, `comp_lvl_id`, `comp_kno_id`, `comp_date`, `comp_detail`, `comp_valid`, `comp_visible`) VALUES
(1, 7, 1, '2012-12-04 20:41:13', 'Divers applications', 0, 1),
(1, 7, 5, '2012-12-04 20:46:44', 'Mise en place de la base de donnÃ©es de ce site.', 0, 1),
(1, 7, 8, '2012-12-04 23:36:17', 'vu en cours', 0, 1),
(1, 7, 8, '2012-12-05 00:21:56', 'Vu en cours', 0, 1),
(1, 8, 4, '2012-12-04 23:47:22', 'notions', 0, 1),
(1, 8, 4, '2012-12-04 23:50:56', 'Notions', 0, 1),
(1, 8, 14, '2012-12-04 23:35:48', 'expÃ©rience nÂ°1...<br />\r\nexpÃ©rience nÂ°2...<br />\r\nexpÃ©rience nÂ°3...<br />\r\nexpÃ©rience nÂ°4...<br />\r\nexpÃ©rience nÂ°5...<br />\r\n', 0, 1),
(1, 8, 14, '2012-12-05 01:51:17', 'DÃ©veloppement d''une application de stÃ©ganographie.\r\n', 0, 1),
(1, 9, 5, '2012-12-04 20:37:18', 'mise en place de la base de donnÃ©es de ce site.', 0, 1),
(1, 9, 8, '2012-12-05 01:52:20', 'Vu en cours', 0, 1),
(1, 9, 9, '2012-12-05 00:24:43', 'Utilisation pour certains scripts de ce site', 0, 1),
(1, 9, 11, '2012-12-05 00:23:47', 'DÃ©veloppement de certain partie de ce site', 0, 1),
(1, 9, 11, '2012-12-05 01:49:58', 'DÃ©veloppement de certaines parties de ce site', 0, 1),
(1, 9, 16, '2012-12-04 21:00:53', 'bliblablou', 0, 0),
(1, 9, 18, '2012-12-05 01:57:22', 'Usage frÃ©quent', 0, 1),
(1, 9, 19, '2012-12-05 01:52:02', '', 0, 1),
(1, 10, 1, '2012-12-04 23:50:26', 'DÃ©veloppement d''une application de type "planning-agenda"', 0, 1),
(1, 10, 3, '2012-12-04 20:37:51', 'DÃ©veloppement de ce site', 0, 1),
(1, 10, 5, '2012-12-04 20:49:29', 'Mise en place de la base de donnÃ©es de ce site.', 0, 1),
(1, 10, 10, '2012-12-04 23:46:53', 'DÃ©veloppement de ce site selon les normes HTML5', 0, 1),
(1, 11, 5, '2012-12-05 17:15:56', 'Mise en place de la base de donnÃ©es de ce site.', 0, 1),
(10, 7, 4, '2012-12-11 18:53:38', '', 0, 1),
(10, 8, 9, '2012-12-11 18:50:53', '', 0, 1),
(10, 9, 2, '2012-12-11 18:52:30', '<p>I love it !</p>', 0, 1),
(10, 9, 5, '2012-12-11 18:51:38', '<p>Bonne connaissances des outlis de SGBD en g&eacute;n&eacute;ral.</p>', 0, 1),
(11, 9, 5, '2013-02-04 14:03:16', '<p>Utilisation fr&eacute;quente pour la cr&eacute;ation de site internet.</p>', 0, 1),
(11, 9, 10, '2013-02-04 14:02:31', '<p>participations sur plusieurs sites internet dans le cadre de mon stage en entreprise de BTS.</p>', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `discussion`
--

CREATE TABLE IF NOT EXISTS `discussion` (
  `dis_id` int(11) NOT NULL AUTO_INCREMENT,
  `dis_sub_id` int(11) NOT NULL,
  `dis_us_id` int(11) NOT NULL,
  `dis_title` varchar(100) NOT NULL,
  `dis_description` varchar(1024) NOT NULL,
  `dis_date` datetime NOT NULL,
  PRIMARY KEY (`dis_id`),
  KEY `dis_sub_id` (`dis_sub_id`,`dis_us_id`),
  KEY `dis_us_id` (`dis_us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `discussion`
--


-- --------------------------------------------------------

--
-- Structure de la table `enterprise`
--

CREATE TABLE IF NOT EXISTS `enterprise` (
  `en_id` int(11) NOT NULL AUTO_INCREMENT,
  `en_name` varchar(50) DEFAULT NULL,
  `en_phone` varchar(20) DEFAULT NULL,
  `en_siret` varchar(14) DEFAULT NULL,
  `en_message` text NOT NULL,
  `en_us_id` int(11) NOT NULL,
  PRIMARY KEY (`en_id`),
  KEY `en_us_id` (`en_us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `enterprise`
--

INSERT INTO `enterprise` (`en_id`, `en_name`, `en_phone`, `en_siret`, `en_message`, `en_us_id`) VALUES
(1, 'LoldLenople', NULL, '', 'Cool www.cloudforthought.com. Soory 4 Offtopic: Win a Real Madrid Champions League, do not you think?! \r\nmichigan department of health  [url=http://acquistagenericolevitra.com/#zoqf]levitra generico[/url]    buy penis milking machine ', 12);

-- --------------------------------------------------------

--
-- Structure de la table `knowledge`
--

CREATE TABLE IF NOT EXISTS `knowledge` (
  `kno_id` int(11) NOT NULL AUTO_INCREMENT,
  `kno_cat_id` int(11) NOT NULL,
  `kno_name` varchar(50) NOT NULL,
  `kno_label` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kno_id`),
  KEY `kno_cat_id` (`kno_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `knowledge`
--

INSERT INTO `knowledge` (`kno_id`, `kno_cat_id`, `kno_name`, `kno_label`) VALUES
(1, 3, 'JAVA', NULL),
(2, 3, 'C++', NULL),
(3, 3, 'PHP', NULL),
(4, 4, 'C', NULL),
(5, 2, 'MySQL', NULL),
(6, 2, 'PosgreSQL', NULL),
(7, 2, 'Oracle', NULL),
(8, 2, 'SQL server', NULL),
(9, 1, 'AJAX', NULL),
(10, 1, 'HTML 5', NULL),
(11, 1, 'JQuery', NULL),
(12, 1, 'XHTML', NULL),
(13, 3, 'C#', NULL),
(14, 3, 'VB.NET', NULL),
(15, 4, 'BASIC', NULL),
(16, 4, 'FORTRAN', NULL),
(17, 4, 'PERL', NULL),
(18, 4, 'PHP', NULL),
(19, 2, 'SQLite', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `lvl_id` int(11) NOT NULL AUTO_INCREMENT,
  `lvl_label` varchar(50) NOT NULL,
  PRIMARY KEY (`lvl_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `level`
--

INSERT INTO `level` (`lvl_id`, `lvl_label`) VALUES
(7, 'D&eacute;butant'),
(8, 'El&eacute;mentaire'),
(9, 'Interm&eacute;diaire'),
(10, 'Interm&eacute;diaire sup'),
(11, 'Avanc&eacute;'),
(12, 'Avanc&eacute; sup');

-- --------------------------------------------------------

--
-- Structure de la table `liked`
--

CREATE TABLE IF NOT EXISTS `liked` (
  `lik_us_id` int(11) NOT NULL,
  `lik_pos_id` int(11) NOT NULL,
  `lik_date` datetime NOT NULL,
  `lik_visible` int(11) NOT NULL,
  PRIMARY KEY (`lik_us_id`,`lik_pos_id`),
  KEY `lik_pos_id` (`lik_pos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `liked`
--


-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `mes_id` int(11) NOT NULL AUTO_INCREMENT,
  `mes_dest_us_id` int(11) NOT NULL,
  `mes_src_us_id` int(11) NOT NULL,
  `mes_date` datetime NOT NULL,
  `mes_title` varchar(255) NOT NULL,
  `mes_text` text NOT NULL,
  `mes_open` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mes_id`),
  KEY `mes_dest_us_id` (`mes_dest_us_id`),
  KEY `mes_src_us_id` (`mes_src_us_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `message`
--


-- --------------------------------------------------------

--
-- Structure de la table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `nl_id` int(11) NOT NULL AUTO_INCREMENT,
  `nl_title` varchar(50) NOT NULL,
  `nl_text` text NOT NULL,
  `nl_date` datetime NOT NULL,
  `nl_us_id` int(11) NOT NULL,
  PRIMARY KEY (`nl_id`),
  KEY `nl_us_id` (`nl_us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `newsletter`
--

INSERT INTO `newsletter` (`nl_id`, `nl_title`, `nl_text`, `nl_date`, `nl_us_id`) VALUES
(11, 'Progression du site', 'Bonjour!<br/>\r\nLe site permet dÃ©sormais aux Ã©tudiants d''enregistrer leurs domaines de compÃ©tence, Pour cela, il vous suffit de vous <a href="http://www.cloudforthought.com/inscription/accueil" >crÃ©er un compte</a> et d''accÃ©der Ã  la rubrique "Mon CV".<br />\r\nIl est possible de modifier vos compÃ©tences Ã  n''importe quel moment.<br />\r\nPS: Ne vous inquiÃ©tez pas! Toutes les compÃ©tences ne sont pas encore prÃ©sentes sur la liste, mais comme le site est toujours en dÃ©veloppement, cela ne saurait tarder!<br />Sur ce!', '2012-12-05 00:37:11', 1),
(12, 'Mise Ã  jour du site!', '<p>La mise &agrave; jour comprend:</p>\r\n<ul>\r\n<li>une nouvelle interface (y''a encore du travail)</li>\r\n<li>un acc&egrave;s aux anciennes news</li>\r\n<li>une s&eacute;paration des diff&eacute;rentes parties du site plus ergonomique</li>\r\n<li>un fil d''Ariane</li>\r\n</ul>\r\n<p>Voila, d''autres mise &agrave; jour devraient arriver prochainement.</p>\r\n<p>Sur ce... bonne journ&eacute;e!</p>', '2013-02-04 13:56:57', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password`
--

CREATE TABLE IF NOT EXISTS `password` (
  `psw_id` int(11) NOT NULL AUTO_INCREMENT,
  `psw_psw` varchar(32) NOT NULL,
  PRIMARY KEY (`psw_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Contenu de la table `password`
--

INSERT INTO `password` (`psw_id`, `psw_psw`) VALUES
(1, 'f71dbe52628a3f83a77ab494817525c6'),
(13, 'f71dbe52628a3f83a77ab494817525c6'),
(14, 'd61af90de34e181dcb619fdc9c9f817d'),
(15, 'f71dbe52628a3f83a77ab494817525c6'),
(16, '151ef6425b3526cc4992f5578d992e39'),
(17, '151ef6425b3526cc4992f5578d992e39'),
(18, '4be3b3a4ad275152d7d6cbddda41a6e1'),
(19, 'c33ca5e7eae116138d1d1b61158d58f9'),
(20, '7043f02648377ce9268ae6d5fda3535c');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_dis_id` int(11) NOT NULL,
  `pos_us_id` int(11) NOT NULL,
  `pos_pos_id` int(11) DEFAULT NULL,
  `pos_title` varchar(100) NOT NULL,
  `pos_text` varchar(1024) NOT NULL,
  `pos_date` datetime NOT NULL,
  `pos_visible` int(11) NOT NULL,
  PRIMARY KEY (`pos_id`),
  KEY `pos_dis_id` (`pos_dis_id`,`pos_us_id`,`pos_pos_id`),
  KEY `pos_us_id` (`pos_us_id`),
  KEY `pos_pos_id` (`pos_pos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `post`
--


-- --------------------------------------------------------

--
-- Structure de la table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_th_id` int(11) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `sub_description` varchar(1024) NOT NULL,
  PRIMARY KEY (`sub_id`),
  KEY `sub_th_id` (`sub_th_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `subject`
--


-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE IF NOT EXISTS `theme` (
  `th_id` int(11) NOT NULL AUTO_INCREMENT,
  `th_title` varchar(100) NOT NULL,
  `th_description` varchar(1024) NOT NULL,
  `th_image` varchar(20) NOT NULL DEFAULT 'default.png',
  PRIMARY KEY (`th_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `theme`
--


-- --------------------------------------------------------

--
-- Structure de la table `updatenews`
--

CREATE TABLE IF NOT EXISTS `updatenews` (
  `up_us_id` int(11) NOT NULL,
  `up_nl_id` int(11) NOT NULL,
  `up_date` datetime NOT NULL,
  PRIMARY KEY (`up_us_id`,`up_nl_id`,`up_date`),
  KEY `up_nl_id` (`up_nl_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `updatenews`
--


-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_pseudo` varchar(25) NOT NULL,
  `us_first_name` varchar(50) NOT NULL,
  `us_last_name` varchar(50) NOT NULL,
  `us_mail` varchar(100) NOT NULL,
  `us_phone` varchar(50) NOT NULL,
  `us_date` datetime NOT NULL,
  `us_ut_id` int(11) NOT NULL,
  `us_psw_id` int(11) NOT NULL,
  `us_picture` varchar(50) NOT NULL DEFAULT 'defaut.png',
  `us_visible` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`us_id`),
  UNIQUE KEY `us_pseudo` (`us_pseudo`),
  KEY `us_ut_id` (`us_ut_id`),
  KEY `us_psw_id` (`us_psw_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`us_id`, `us_pseudo`, `us_first_name`, `us_last_name`, `us_mail`, `us_phone`, `us_date`, `us_ut_id`, `us_psw_id`, `us_picture`, `us_visible`) VALUES
(1, 'damien', 'damien', 'gabrielle', 'gabrielledam@yahoo.fr', '06 48 74 33 56', '2012-11-19 00:00:00', 1, 1, 'defaut.png', 1),
(9, 'banana', 'Anna', 'BANE', 'banana@split.fr', '+335 64 87 53 21', '2012-12-03 15:52:38', 5, 13, 'defaut.png', 1),
(10, 'antoine', 'Antoine', 'GIRAUD', 'agiraud@epsi.fr', '', '2012-12-11 18:49:37', 2, 14, 'defaut.png', 1),
(11, 'domino', 'Doe', 'John', 'domino@test.fr', '06 48 75 23 56', '2013-02-04 14:01:25', 5, 15, 'defaut.png', 1),
(12, 'LoldLenople', '', '', 'sitkopavlo@gmail.com', '123456', '2013-03-19 03:21:44', 3, 16, 'defaut.png', 1),
(13, 'damien2', 'Damien', 'GABRIELLE', 'damien@ggg.fr', '', '2013-04-05 01:35:25', 5, 18, 'defaut.png', 1),
(14, 'totototo', 'toto', 'TOTO', 'toto@toto.toto', '', '2013-04-05 01:45:29', 5, 19, 'defaut.png', 1),
(15, 'toto23', 'toto', 'TOTO', 'to2to@toto.toto', '', '2013-04-05 01:48:33', 5, 20, 'defaut.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `ut_id` int(11) NOT NULL AUTO_INCREMENT,
  `ut_label` varchar(25) NOT NULL,
  PRIMARY KEY (`ut_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user_type`
--

INSERT INTO `user_type` (`ut_id`, `ut_label`) VALUES
(1, 'super_admin'),
(2, 'admin'),
(3, 'client'),
(4, 'enseignant'),
(5, '&eacutel&egraveve');
