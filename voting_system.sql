-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 03:03 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `voting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
`id` int(10) NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `org_status` int(1) DEFAULT NULL,
  `setTime` varchar(100) DEFAULT NULL,
  `setDate` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `organization`, `org_status`, `setTime`, `setDate`) VALUES
(0, 'FA', 1, '0', '0'),
(2, 'NAEA', 0, '00:00:00', '0');

-- --------------------------------------------------------

--
-- Table structure for table `elec_con`
--

CREATE TABLE IF NOT EXISTS `elec_con` (
`id` int(255) NOT NULL,
  `start_term` int(255) DEFAULT NULL,
  `end_term` int(255) DEFAULT NULL,
  `year_elec` int(255) DEFAULT NULL,
  `total_mem` int(255) DEFAULT NULL,
  `mem_vote` int(255) DEFAULT NULL,
  `mem_not` int(255) DEFAULT NULL,
  `organization` varchar(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `elec_con`
--

INSERT INTO `elec_con` (`id`, `start_term`, `end_term`, `year_elec`, `total_mem`, `mem_vote`, `mem_not`, `organization`) VALUES
(1, 2014, 0, 2014, 379, 306, 73, 'FA');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
`id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `organization` varchar(10) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `organization`) VALUES
(1, 'adminfa', 'cvsuadmincvsu', 'FA'),
(2, 'adminnaea', 'naea', 'NAEA');

-- --------------------------------------------------------

--
-- Table structure for table `tblcandidate`
--

CREATE TABLE IF NOT EXISTS `tblcandidate` (
`id` int(10) NOT NULL,
  `c_number` int(20) DEFAULT NULL,
  `c_fname` varchar(100) DEFAULT NULL,
  `c_lname` varchar(100) DEFAULT NULL,
  `c_position` varchar(100) DEFAULT NULL,
  `c_organization` varchar(100) DEFAULT NULL,
  `c_college_branch` varchar(100) DEFAULT NULL,
  `c_campus` varchar(100) DEFAULT NULL,
  `c_year` int(5) DEFAULT NULL,
  `candidate_status` int(1) DEFAULT NULL,
  `c_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tblcandidate`
--

INSERT INTO `tblcandidate` (`id`, `c_number`, `c_fname`, `c_lname`, `c_position`, `c_organization`, `c_college_branch`, `c_campus`, `c_year`, `candidate_status`, `c_image`) VALUES
(1, 1, 'Jocelyn', 'Reyes', 'President', 'FA', 'CAS', 'Main', 2014, 1, 'none'),
(2, 20090022, 'Noel', 'Sedigo', 'President', 'FA', 'CAFENR', 'Main', 2014, 1, 'none'),
(3, 20080073, 'AlvinWilliam', 'Alvarez', 'Vice President', 'FA', 'CVMBS', 'Main', 2014, 1, 'none'),
(4, 20080492, 'Gil', 'Ramos', 'Vice President', 'FA', 'CAS', 'Main', 2014, 1, 'none'),
(5, 20080441, 'Nenita', 'Panaligan', 'Secretary', 'FA', 'CON', 'Main', 2014, 1, 'none'),
(6, 20141003, 'Sherine', 'Cruzate', 'Treasurer', 'FA', 'CAS', 'Main', 2014, 1, 'none'),
(7, 20080271, 'Nelia', 'Feranil', 'Treasurer', 'FA', 'CEMDS', 'Main', 2014, 1, 'none'),
(8, 30, 'Elvira', 'Belleza', 'Auditor', 'FA', 'Naic', 'Satellite', 2014, 1, 'none'),
(9, 680, 'Jennypher', 'Fenomeno', 'PRO', 'FA', 'Imus', 'Satellite', 2014, 1, 'none'),
(10, 20100078, 'Joether', 'Francisco', 'PRO', 'FA', 'CAS', 'Main', 2014, 1, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `tblmember`
--

CREATE TABLE IF NOT EXISTS `tblmember` (
`id` int(10) NOT NULL,
  `e_number` int(20) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `college_branch` varchar(100) DEFAULT NULL,
  `campus` varchar(100) DEFAULT NULL,
  `member_status` int(1) DEFAULT NULL,
  `account_status` varchar(10) DEFAULT NULL,
  `log_status` varchar(10) DEFAULT NULL,
  `passElec` int(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=519 ;

--
-- Dumping data for table `tblmember`
--

INSERT INTO `tblmember` (`id`, `e_number`, `fname`, `lname`, `password`, `organization`, `college_branch`, `campus`, `member_status`, `account_status`, `log_status`, `passElec`) VALUES
(132, 20100058, 'Cherry', 'Alvarez', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(133, 20080073, 'AlvinWilliam', 'Alvarez', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(134, 20110137, 'Rezin', 'Bahia', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(135, 20080214, 'Ma Cynthia', 'dela Cruz', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(136, 20080618, 'Emmanuel', 'Mago', 'blakship088', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(138, 20080621, 'Nelson', 'Montialto', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(139, 20080617, 'Chester', 'Saldana', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(140, 20080561, 'Melbourne', 'Talactac', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(141, 20080152, 'Maribel', 'Chua', 'NONE', 'FA', 'CON', 'Main', 1, '0', 'active', 3),
(142, 20120424, 'Lenila', 'De Vera', 'lenila', 'FA', 'CON', 'Main', 0, '1', 'active', 2),
(143, 20080564, 'Jaylord', 'Tanora', 'vetmed', 'FA', 'CVMBS', 'Main', 0, '1', 'active', 2),
(144, 20080586, 'Gilchor', 'Cubillo', 'NONE', 'FA', 'Imus', 'Satellite', 1, '0', 'active', 3),
(145, 327, 'Mildred', 'Apostol', '123456', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(146, 38, 'Estelito', 'Alaman', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(147, 680, 'Jennypher', 'Fenomeno', 'beauty', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(148, 336, 'Luisita', 'Marzan', 'NONE', 'FA', 'Imus', 'Satellite', 1, '0', 'active', 3),
(149, 452, 'Alfe', 'Solina', 'NONE', 'FA', 'Imus', 'Satellite', 1, '0', 'active', 3),
(150, 86, 'Luningning', 'Valdez', 'tikkyII', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(151, 27, 'Marte', 'Bernal', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(152, 622, 'Ma Isabel', 'del Rosario', 'kosaadik', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(153, 42, 'Manuel', 'de Guzman', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(154, 596, 'Maria Zarina', 'Fletcher', 'NONE', 'FA', 'Imus', 'Satellite', 1, '0', 'active', 3),
(155, 459, 'Sixto Jr', 'Ras', '626262', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(156, 149, 'Ernesto Jr', 'Gutierrez', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(157, 901, 'Azelle Charese', 'Agdon', 'NONE', 'FA', 'Imus', 'Satellite', 1, '0', 'active', 3),
(158, 24, 'Daniel', 'Mojica', 'DANIEL', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(159, 941, 'Anita', 'Avila', 'kikay152706', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(160, 20, 'Zailo', 'Pangilinan', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(161, 911, 'Anabella', 'Gomez', 'NONE', 'FA', 'Imus', 'Satellite', 1, '0', 'active', 3),
(162, 57, 'Napoleon', 'Ridao', 'aRIES1657', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(163, 971, 'Rosalina', 'Lacuesta', '111004', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(164, 698, 'Evelyn', 'Del Mundo', 'NONE', 'FA', 'CON', 'Main', 1, '0', 'active', 3),
(165, 20080228, 'Redentor', 'Dimaranan', '6pocket', 'FA', 'CON', 'Main', 0, '1', 'active', 2),
(166, 20110059, 'Jocelyn', 'Dimayuga', 'NONE', 'FA', 'CON', 'Main', 1, '0', 'active', 3),
(167, 20080280, 'Sunny Rose', 'Ferrera', 'rosesunny', 'FA', 'CON', 'Main', 0, '1', 'active', 2),
(168, 20090019, 'Joinito', 'Ofracio', 'regina', 'FA', 'CON', 'Main', 0, '1', 'active', 2),
(169, 20080441, 'Nenita', 'Panaligan', 'NBPRNFA', 'FA', 'CON', 'Main', 0, '1', 'active', 2),
(170, 697, 'Ederlyn', 'Papa', 'NONE', 'FA', 'CON', 'Main', 1, '0', 'active', 3),
(171, 20110065, 'Normidia', 'Quion', 'NONE', 'FA', 'CON', 'Main', 1, '0', 'active', 3),
(172, 20100018, 'Karen Louela', 'Rint', 'NONE', 'FA', 'CON', 'Main', 1, '0', 'active', 3),
(173, 20080524, 'Jane', 'Rona', 'Rapgabangel11', 'FA', 'CON', 'Main', 0, '1', 'active', 2),
(174, 20110143, 'Bernadette', 'Sapinoso', 'NONE', 'FA', 'CON', 'Main', 1, '0', 'active', 3),
(175, 20080584, 'Mary Antoniette', 'Viray', 'niette1023', 'FA', 'CON', 'Main', 0, '1', 'active', 2),
(176, 32, 'Flotilda', 'Arias', '04241956', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(177, 910, 'Ma Gemma', 'Rojales', 'maelan', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(178, 30, 'Elvira', 'Belleza', 'boyito', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(179, 489, 'Pepito', 'Saliba', 'pepito', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(180, 21, 'Cornelita', 'Binato', '123456', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(181, 900, 'Florabhel', 'Tinte', 'bhel18', 'FA', 'Imus', 'Satellite', 0, '1', 'active', 2),
(182, 52, 'Bernardita', 'Cachuela', 'NHENGCHIE', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(183, 20080189, 'Ronnel', 'Cuachin', '161616', 'FA', 'CSPEAR', 'Main', 0, '1', 'active', 2),
(184, 60, 'Lomalinda', 'Clores', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(185, 20110193, 'Erlinda', 'Eustaquio', 'bogart1977', 'FA', 'CSPEAR', 'Main', 0, '1', 'active', 2),
(186, 49, 'Ma Pilar', 'Correo', 'ynangreina', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(187, 20080659, 'Ana Liza', 'Mojica', 'zworkhin', 'FA', 'CSPEAR', 'Main', 0, '1', 'active', 2),
(189, 20110069, 'Almon', 'Oquendo', 'almonr', 'FA', 'CSPEAR', 'Main', 0, '1', 'active', 2),
(190, 20080478, 'Jazmin', 'Piores', 'djekaph', 'FA', 'CSPEAR', 'Main', 0, '1', 'active', 2),
(191, 20080499, 'Romeo Jr', 'Reyes', 'erobseyer', 'FA', 'CSPEAR', 'Main', 0, '1', 'active', 2),
(192, 20120328, 'Victor', 'Piores', 'NONE', 'FA', 'CSPEAR', 'Main', 1, '0', 'active', 3),
(193, 20080026, 'Julio', 'Alava', 'julios', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(194, 33, 'Myrna', 'de Leon', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(195, 20110090, 'Noel', 'Manarpiis', '1987christianLDS', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(196, 20060002, 'Rowena', 'Resurreccion', 'rdrweng', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(197, 79, 'Catherine', 'Diones', 'CAVITE', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(198, 45, 'Diosalyn', 'Galang', 'JHOTHO', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(199, 20080055, 'Renato', 'Agdalpen', 'jhorein', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(200, 20080281, 'Imelda', 'Filart', 'NONE', 'FA', 'CAS', 'Main', 1, '0', 'active', 1),
(201, 20130500, 'Reyna Lee', 'Pedernal', 'rezale', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(202, 20080521, 'Vivian', 'Rogando', 'vivianr', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(203, 20110138, 'Renato', 'Pelorina', 'rnpelorina', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(204, 20080492, 'Gil', 'Ramos', 'bonok_1011', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(205, 20120271, 'Carolina', 'Lontoc', 'oliver', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(206, 20130001, 'Joy', 'Babaan', 'NONE', 'FA', 'CAS', 'Main', 1, '0', 'active', 1),
(207, 20100078, 'Joether', 'Francisco', 'pokpok', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(208, 20130002, 'Merly', 'Nahilat', 'karlitos', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(209, 4, 'Soledad', 'Gatdula', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(210, 20090033, 'Emy Grace', 'Patambang', 'kisses', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(211, 41, 'Ma Leonora', 'Guerrero', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(212, 50, 'Leah', 'Lacson', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(213, 46, 'Cynthia', 'Madlangbayan', 'deyngabrielle', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(214, 2007009, 'Beverly', 'Malabag', 'anzhea', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(215, 2008020, 'Haziel', 'Toledo', '123456', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(216, 8, 'Adeliza', 'Nazareno', '1011962', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(217, 20100046, 'Bethel', 'Hernandez', 'NONE', 'FA', 'Silang', 'Satellite', 1, '0', 'active', 3),
(218, 63, 'Natalia', 'Nazareno', 'natnaz', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(219, 19, 'Elsa', 'Omipon', 'czarianne55', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(220, 20120099, 'Rizalito', 'Javier', '123456', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(221, 122, 'Ferry', 'Pabalate', '01252009', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(222, 13, 'Loreta', 'Perea', 'milkfish', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(223, 43, 'Solita', 'Poblete', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(224, 39, 'Armina', 'Pugay', 'armine', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(225, 20090031, 'Lemellu Nida', 'Llamado', 'melvin', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(226, 20130136, 'Dinah Joy', 'Malicsi', 'dinahjoy', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(227, 111, 'Sherrlyn', 'Rasdas', 'mh1esh', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(228, 56, 'Jelita', 'Ridao', 'INHYUNSMAN', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(229, 20130134, 'Hermilina', 'Mendoza', '6168ham', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(230, 26, 'Jocelyn', 'Robles', 'jikahero', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(231, 48, 'Marilyn', 'Tesorero', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(232, 20100043, 'Ma Dulce', 'Palomares', 'dddddd', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(233, 22, 'Anita', 'Valuz', 'NITZTY', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(234, 28, 'Flora', 'Viaje', 'CLASS23HABAGAT', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(235, 20120098, 'Lorna', 'Salcedo', 'werwer', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(236, 36, 'Cristeta', 'Zapanta', 'cristy', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(237, 10, 'Ligaya', 'Antiojo', '1Cor13', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(238, 20130135, 'Roselyn', 'Ymana', '111111', 'FA', 'Silang', 'Satellite', 0, '1', 'active', 2),
(239, 47, 'Leah', 'Navarro', 'lhings', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(240, 116, 'John Xavier', 'Nepomuceno', 'cvsunaic', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(241, 20130501, 'Jiemar', 'Arabani', 'jiemaa', 'FA', 'CCJ', 'Main', 0, '1', 'active', 2),
(242, 20087012, 'Darius', 'Campos', 'DAYOTAKO', 'FA', 'CCJ', 'Main', 0, '1', 'active', 2),
(243, 88, 'Elsa', 'Nueva', 'ehlnew', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(244, 20052529, 'Ruby Ann', 'Espineli', 'vespers', 'FA', 'CCJ', 'Main', 0, '1', 'active', 2),
(245, 54, 'Ma Lourds', 'Guerrero', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(246, 20062507, 'Marissa', 'Lontoc', 'lontoc', 'FA', 'CCJ', 'Main', 0, '1', 'active', 2),
(247, 20130502, 'Famela Iza', 'Matic', 'NONE', 'FA', 'CCJ', 'Main', 1, '0', 'active', 3),
(248, 96, 'Richard', 'Mondano', 'qwerty12345', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(249, 95, 'Jeffrey', 'Papa', '121284', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(250, 20110133, 'Susan', 'Tan', 'changeme', 'FA', 'CCJ', 'Main', 0, '1', 'active', 2),
(251, 20080142, 'Cesar', 'Carriaga', '20080142ccc', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(252, 20080146, 'David', 'Cero', 'amyel0727', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(253, 200994103, 'Avelino Jr', 'Tampes', 'NONE', 'FA', 'Naic', 'Satellite', 1, '0', 'active', 3),
(254, 113, 'Mat', 'Nuestro', '19840505', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(255, 173, 'Arnold', 'delos Reyes', 'ARGINCJ', 'FA', 'Naic', 'Satellite', 0, '1', 'active', 2),
(256, 20080119, 'Aiza', 'Bihis', 'ichtaca', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(257, 20080848, 'Poinsettia', 'Vida', 'NONE', 'FA', 'CEIT', 'Main', 1, '0', 'active', 3),
(258, 20080568, 'Lilia', 'Torres', 'ailils', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(259, 20080545, 'Bienvenido Jr', 'Sarmiento', 'abaksa17', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(260, 20080508, 'Efren', 'Rocillo', 'efhe12', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(261, 20080507, 'Larry', 'Rocela', 'larrajeane1115', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(262, 20090007, 'Gemmae', 'Pitong', 'JERIMAE15', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(263, 20080470, 'Gladys', 'Perey', 'larshendrikfronda', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(264, 20080147, 'Leyma', 'Cero', 'CvSU4122', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(265, 20080059, 'Vanessa', 'Coronado', 'allehnraisfer22', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(266, 20080847, 'Michael', 'Costa', 'Password', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(267, 20130003, 'Renato', 'Cubilla', 'patrasdogss1965', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(268, 20080198, 'Simeon', 'Daez', 'SIMEON', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(269, 20090199, 'Marcelino Jr', 'Dagasdas', 'madjrs', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(270, 20080222, 'Jaime', 'Dilidili', 'NONE', 'FA', 'CEIT', 'Main', 1, '0', 'active', 3),
(271, 20080236, 'Andy', 'Dizon', 'royceivy', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(272, 20080237, 'Marivic', 'Dizon', 'royceivy', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(273, 20120331, 'Danielito', 'Escano', 'NONE', 'FA', 'CEIT', 'Main', 1, '0', 'active', 3),
(274, 20080253, 'Marilyn', 'Escobar', 'NONE', 'FA', 'CEIT', 'Main', 1, '0', 'active', 3),
(275, 20080260, 'Leonardo', 'Estero', '123456', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(276, 20110102, 'Sheryl', 'Fenol', 'samuel43', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(277, 20080297, 'Emeline', 'Guevarra', 'electioncvsu', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(278, 20100007, 'Ria Clarisse', 'Mojica', 'riavote', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(279, 200812475, 'Liezl', 'Montaron', 'NONE', 'FA', 'CEIT', 'Main', 1, '0', 'active', 3),
(280, 20080419, 'Lydia', 'Nosa', 'mypassword', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(281, 20081238, 'Jo Anne', 'Nuestro', 'dexter123', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(282, 20080432, 'Rhodora', 'Nuestro', 'coireignroi', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(283, 20086050, 'Ervin', 'Papa', 'rhonalyn13', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(284, 20080455, 'Ronald', 'Pena', 'facvsu4165', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(285, 20080456, 'Roselyn', 'Pena', 'rpp52165', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(286, 20080469, 'Marlon', 'Perena', 'betong', 'FA', 'CEIT', 'Main', 0, '1', 'active', 2),
(287, 20096011, 'Michael', 'Consignado', 'jbmjaj', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(288, 20096013, 'Lea Marissa', 'Domingo', 'fain322', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(289, 20096019, 'Ricarte', 'Linggahan', 'carter', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(290, 20110172, 'Yolanda', 'Satiada', 'loyola', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(291, 20096032, 'Cherry Rose', 'Uminga', '052483', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(292, 20096033, 'Shiela', 'Vidallon', 'jerwin', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(293, 20110175, 'Jocelyn', 'Siochi', 'jocelyn', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(294, 20096001, 'Cristina', 'Olo', 'maganda9', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(295, 20110206, 'Maria Andrea', 'Francia', 'annatvt12', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 2),
(296, 20080169, 'Rhodora', 'Crizaldo', 'JUSTin31', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(297, 20080160, 'Liza', 'Costa', 'KOPZKOPZ', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(298, 20090024, 'Isaias', 'Banaag', 'isingb', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(299, 20080166, 'Lumine', 'Crisostomo', 'NONE', 'FA', 'CED', 'Main', 1, '0', 'active', 3),
(300, 20080344, 'Jason', 'Maniacop', 'kesniel13', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(301, 20080353, 'Daisy', 'Marca', 'NONE', 'FA', 'CED', 'Main', 1, '0', 'active', 3),
(302, 20080061, 'Nancy', 'Alaras', 'nca123', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(303, 20080110, 'Carmen', 'Batiles', 'carmen', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(304, 20080296, 'Julie', 'Guevara', 'NONE', 'FA', 'CED', 'Main', 1, '0', 'active', 3),
(305, 20080314, 'Patrick Glenn', 'Ilano', 'pcharm', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(306, 20120278, 'Pia Rhoda', 'Lucero', 'stephenkian', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(307, 20080497, 'Editha', 'Reyes', '101126', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(308, 20100037, 'Joana Marie', 'Tayag', 'ghejho', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(309, 200806022, 'Mary Jane', 'Tepora', 'jane2003', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(310, 20080490, 'Dulce', 'Ramos', 'dramos', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(311, 20080229, 'Ermelinda', 'Dimero', 'DIMERO', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(312, 20080245, 'Eleanor', 'Ersando', 'NONE', 'FA', 'CED', 'Main', 1, '0', 'active', 3),
(313, 20080454, 'Teresita', 'Pena', 'andrea', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(314, 20080005, 'Luzviminda', 'Rodrin', 'luvy0605', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(315, 20080534, 'Tessie', 'Samonte', 'anakreymund', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(316, 20080549, 'Reynalita', 'Sierra', 'beauty', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(317, 20080243, 'Jennifer', 'Barrientos', 'JENNY18', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(318, 20080583, 'Reizel', 'Viray', 'reizel', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(319, 20100020, 'Evelyn', 'Fontalba', '112013', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(320, 20080427, 'Ma Agnes', 'Nuestro', 'dominic', 'FA', 'CED', 'Main', 0, '1', 'active', 2),
(322, 1, 'Jocelyn', 'Reyes', '1', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(323, 20092009, 'Arlene', 'Estrada', 'Joshua01', 'FA', 'Trece', 'Satellite', 0, '1', 'active', 0),
(324, 20092010, 'Cristza', 'de Ocampo', 'curacao', 'FA', 'Trece', 'Satellite', 0, '1', 'active', 0),
(325, 20092011, 'Edison', 'Feranil', '051307', 'FA', 'Trece', 'Satellite', 0, '1', 'active', 0),
(326, 20092012, 'Vienna Mi', 'Austria', 'austria', 'FA', 'Trece', 'Satellite', 0, '1', 'active', 0),
(327, 20100091, 'Cristina', 'Signo', '20100091', 'FA', 'Trece', 'Satellite', 0, '1', 'active', 0),
(328, 20095026, 'Alicia', 'Abergos', 'alicia', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(329, 20110248, 'Frinze Al', 'Bernal', 'frinze', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(330, 20095036, 'Lambert', 'Diokno', 'lambert', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(331, 20110221, 'Victoriano', 'Rodil', 'vhycknr', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(332, 20110231, 'Teresita', 'Tolentino', '082072', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(333, 20095028, 'Maria Cristina', 'Baesa', 'cristina', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(334, 20095012, 'Joel', 'Austria', 'joelra', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(335, 20095043, 'Elmer', 'Villanueva', 'elmerbv', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(336, 20095034, 'Analyn', 'Dico', 'analyn', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(337, 20080424, 'Lilibeth', 'Novicio', '123456', 'FA', 'Cavite City', 'Satellite', 0, '1', 'active', 0),
(338, 20080530, 'Roderick', 'Rupido', 'mizrach', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(339, 200806056, 'Dolores', 'Aguilar', 'doyette', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(340, 20110195, 'Elizabeth', 'Bigalbal', 'V1ncent', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(341, 20080271, 'Nelia', 'Feranil', 'neliaf', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(342, 20080398, 'Marietta', 'Mojica', 'medley321', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(343, 20080445, 'Antonio', 'Papa', 'papato', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(344, 20120326, 'Normida', 'Hernandez', 'roilouiz', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(345, 20000840, 'Ma Soledad', 'Lising', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(346, 20080483, 'Elizabeth', 'Polinga', 'abeths', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(347, 20120301, 'Thea Maries', 'Perez', 'Lovewillbeourhome', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(348, 20080417, 'Rowena', 'Noceda', 'July25', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(349, 20080052, 'Lina', 'Abogadie', 'election', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(350, 20080144, 'Cecilia', 'Cayao', 'cescile', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(351, 20090066, 'Ma Corazon', 'Buena', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(352, 20080156, 'Estrellita', 'Corpuz', '02EDC1352', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(353, 200806053, 'Gilberto', 'David', 'monique', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(354, 200806020, 'Florindo', 'Ilagan', 'eay898', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(355, 200806058, 'Gener', 'Cueno', 'trustno1', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(356, 20130487, 'Betsy Rose', 'Fidel', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(357, 20130486, 'Mailah', 'Ulep', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(358, 20087002, 'Hydy May', 'Rodrin', 'mahalkita', 'FA', 'CED', 'Main', 0, '1', 'active', 0),
(359, 201400111, 'Juan', 'Dela Cruz', 'mypassword', 'FA', 'CEIT', 'Main', 1, '0', NULL, NULL),
(360, 20140002, 'Estrella', 'Alog', 'praisegod', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(361, 20140004, 'William', 'Alonzo', '112757', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(362, 20140095, 'Arman', 'Ambas', 'concon', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(363, 20140006, 'Josefino', 'Ambayec', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(364, 20140008, 'Elsa', 'Arcon', 'erning', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(365, 20140087, 'Evelyn', 'Bartolome', 'tonybart', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(366, 20140014, 'Lucila', 'Berbie', 'lcb123', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(367, 20140016, 'Melissa', 'Bernal', 'armejohan', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(368, 20140019, 'Evelyn', 'Britos', 'belentong', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(369, 20140107, 'Nerson', 'Camia', 'matalino04', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(370, 20140023, 'Fernando', 'Cielo', 'fmoleic51375', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(371, 20140024, 'Anacleta', 'Cosme', 'rolando', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(372, 20140025, 'Lilian', 'Cupino', 'pavola', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(373, 20140026, 'Regie', 'Delos Reyes', 'atract1993', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(374, 20140028, 'Nora', 'Dulce', 'kaijed', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(375, 20140029, 'Marian', 'Emelo', 'healer', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(376, 20140030, 'Fedelita', 'Evangelista', 'evangelista', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(377, 20140031, 'Nonilo', 'Evangelista', '021852', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(378, 20140034, 'Melita', 'Duarte', 'duarte', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(379, 20140035, 'Ulysses', 'Hufana', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(380, 20140036, 'Romulo', 'Isorena', 'isoren', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(381, 20140038, 'Elizabeth', 'Legaspi', 'jan56bubay', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(382, 20140086, 'Noelle', 'Legaspi', 'ntl060609', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(383, 20140153, 'Bernadette', 'Lim', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(384, 20140041, 'Jose', 'Lisama', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(385, 20140042, 'Remedios', 'Lisondra', 'wealthy', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(386, 20140044, 'Cecilia', 'Lorenza', 'flower', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(387, 20140045, 'Rodel', 'Lubong', '1812kode', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(388, 20140104, 'Marilou', 'Luseco', 'Luseco05', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(389, 20140046, 'William', 'Luseco', 'mechani', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(390, 20140047, 'Alexander', 'Macapia', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(391, 20140049, 'Emelita', 'Matalog', '111959', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(392, 20140050, 'Francisca', 'Medrano', 'august22', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(393, 20140053, 'Caridad', 'Merced', 'martinanthony', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(394, 20140058, 'Lucena', 'Nepumoceno', 'lorelen', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(395, 20140059, 'Deanna', 'Parcon', 'andrew', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(396, 20140061, 'Lauro', 'Pascua', '082263', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(397, 20140062, 'Efren', 'Pegos', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(398, 20140064, 'Reynaldo', 'Policar', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(399, 20140128, 'Ladylyn', 'Quilapio', '09194251661', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(402, 20140068, 'Norma', 'Ratonel', 'viavenetto', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(403, 20140093, 'Elizabeth', 'Rodriguez', 'roger24', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(404, 20140071, 'Janet', 'Rodriguez', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(405, 20140075, 'Ariel', 'Santos', 'automotive', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(406, 20140076, 'Daisy', 'Santos', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(407, 20140018, 'Ligaya', 'Talactac', 'iamgay', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(408, 20140082, 'Elizabeth', 'Ventura', 'venturaeli', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(409, 20140085, 'Nemrod', 'Zoleta', 'dormen', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(410, 20140197, 'Juvie', 'Abad', 'joyee21', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(411, 20140133, 'Raiza', 'Borreo', '123456', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(412, 20140158, 'Norman', 'Crucido', 'ocean0917', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(415, 20141002, 'Dickson', 'Dimero', '20141002', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(416, 20141003, 'Sherine', 'Cruzate', 'aerial19', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(417, 20141004, 'Michele', 'Bono', 'michele', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(418, 20141005, 'Arleen', 'Calipjo', 'NONE', 'FA', 'CAS', 'Main', 1, '0', 'active', 1),
(419, 20141006, 'Chris Rey', 'Lituanas', '3045dACRYDIUM', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(420, 20141007, 'Jonathan', 'Digma', 'getime', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(421, 20141008, 'Rosemarie', 'Calma', 'Igot4kids', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(422, 20141009, 'Josefina', 'Rint', 'nonene', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(423, 20141010, 'Cynthia', 'Dela Cruz', 'NONE', 'FA', 'CAS', 'Main', 1, '0', 'active', 1),
(424, 20140132, 'Janice', 'De Guzman', 'niceja', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(425, 20140094, 'Christopher', 'Estolino', 'NONE', 'FA', 'Rosario', 'Satellite', 1, '0', 'active', 1),
(426, 20140218, 'Jane', 'Macariola', 'jbm122098', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(427, 20140178, 'Lorna', 'Moncad', 'moncada', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(428, 20080010, 'Magdalena', 'Alcantara', 'mariya', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(429, 20080090, 'Mariedel', 'Autriz', 'nognog', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(430, 20080374, 'Marilou', 'Matilla', '412320', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(431, 20141011, 'Bettina Joyce', 'Ilagan', 'iLuvbettina', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(432, 20141012, 'Ma Cecilia', 'Lapitan', 'LORENZO', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(433, 20141013, 'Allan Robert', 'Solis', 'chikas', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(434, 20141019, 'Emeliza', 'Cruz', 'hannah25', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(435, 20141014, 'Catherine', 'Mojica', 'normal', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(436, 20141015, 'Anna Joy', 'Rodrin', 'ikawlamang07', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(437, 20141016, 'April', 'Macam', 'penglot', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(438, 20100075, 'Manny', 'Romeroso', 'ANGELS3', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(439, 20141017, 'Bonalyn', 'Caisip', 'prettywings', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(440, 20141018, 'Cecilia', 'Banaag', 'isaias', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(441, 20142001, 'Henry', 'Garcia', 'mercury', 'FA', 'Bacoor', 'Satellite', 0, '1', 'active', 0),
(442, 20142002, 'Ronan', 'Cajigal', 'romnick8503', 'FA', 'Bacoor', 'Satellite', 0, '1', 'active', 0),
(443, 20142003, 'Maiden Grace', 'Gan', 'MARK10CEE', 'FA', 'Bacoor', 'Satellite', 0, '1', 'active', 0),
(444, 20142004, 'Mery Ann Richelle', 'Dicon', 'micopogi', 'FA', 'Bacoor', 'Satellite', 0, '1', 'active', 0),
(445, 20130499, 'Nora', 'Cabaral', '191622', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(446, 20080319, 'Teresita', 'Labrador', 'isidro', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(447, 20080060, 'Eulogia', 'Alano', 'emalon56', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(448, 20080247, 'Reynaldo', 'Ersando', 'NONE', 'FA', 'CAFENR', 'Main', 1, '0', 'active', 1),
(449, 20140507, 'Ivy', 'Modina', 'yang86', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(450, 20110092, 'Roncesvalle', 'Jaectin', '09252009', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(451, 20141001, 'Zenaida', 'Mojica', 'zenaida', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(452, 20080207, 'Analita', 'Magsino', 'yahweh', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(453, 20080357, 'Renato', 'Marquez', 'NONE', 'FA', 'CAFENR', 'Main', 1, '0', 'active', 1),
(454, 20110148, 'Regina', 'Nosa', 'joeljoi', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(455, 20080449, 'Arnulfo', 'Pascual', 'NONE', 'FA', 'CAFENR', 'Main', 1, '0', 'active', 1),
(456, 20080541, 'Adelaida', 'Sangalang', 'medt24', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(457, 20080348, 'Adolfo Jr', 'Manuel', 'august28', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(458, 20090022, 'Noel', 'Sedigo', '20090022', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(459, 20143001, 'Gary', 'Pareja', 'gAPTRIXFA', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(460, 20143002, 'Celso', 'Crucido', 'NONE', 'FA', 'CAFENR', 'Main', 1, '0', 'active', 1),
(461, 20143003, 'Evelyn', 'Singson', 'NONE', 'FA', 'CAFENR', 'Main', 1, '0', 'active', 1),
(462, 20080416, 'Amparo', 'Nataya', '021950', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(463, 20143004, 'Lorenzo', 'Lapitan', 'NONE', 'FA', 'CAFENR', 'Main', 1, '0', 'active', 1),
(464, 20143005, 'Beng', 'Umali', 'bpummu28', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(465, 20143006, 'Fe', 'Dimero', 'NONE', 'FA', 'CAFENR', 'Main', 1, '0', 'active', 1),
(466, 2008175, 'Carlos', 'Rodil', 'zandrad', 'FA', 'CAFENR', 'Main', 0, '1', 'active', 0),
(467, 20144001, 'Ludivinia', 'Victorino', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(468, 20144002, 'Adora Joy', 'Plete', 'Jologs', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(469, 20144003, 'Nelia', 'Cresino', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(470, 20080416, 'Amparo', 'Nataya', '021950', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(471, 20141020, 'Renelyn', 'Cordial', 'guessglade', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(472, 20080457, 'Bernadeth', 'Pena', 'dedeth', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(473, 20080323, 'Gemma', 'Legaspi', '726119', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(474, 20080400, 'Jennifer', 'Mojica', 'jericho20', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(475, 20080308, 'Corazon', 'Herrera', '080268cvh', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(476, 20080399, 'Analyn', 'Mojica', '120964', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(477, 200806028, 'Andrew', 'Siducon', 'BONZAI0076', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(478, 20080514, 'Lani', 'Rodis', 'January311998', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(479, 20080117, 'Rene', 'Betonio', 'aspire4310', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(480, 20080413, 'Evangelina', 'Mora', 'ORCHIDARIUM', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(481, 20080204, 'Flordeliza', 'de Guzman', 'valerie', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(482, 20080136, 'Momeda', 'Callao', 'comdrone', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(484, 20080112, 'Cherry Grace', 'Bayom', '030676', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(485, 20141022, 'Lynn', 'Penales', 'Elysha910', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(486, 20120312, 'Ammie', 'Ferrer', 'ysabelle', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(487, 20141023, 'Orlando', 'Delos Reyes', '123456', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(488, 20141024, 'Antonio', 'Cinto', '20141024', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(489, 20141025, 'Agnes', 'Alimboyoguen', 'NONE', 'FA', 'CAS', 'Main', 1, '0', 'active', 1),
(490, 20141026, 'Hosea', 'Matel', 'akopoeto', 'FA', 'CAS', 'Main', 0, '1', 'active', 0),
(491, 20090067, 'Jenny Beb', 'Ebo', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(492, 20144005, 'Maria', 'Ersando', 'NONE', 'FA', 'CEMDS', 'Main', 1, '0', 'active', 1),
(493, 20144006, 'Iluminada', 'Hernandez', 'inshala', 'FA', 'CEMDS', 'Main', 0, '1', 'active', 0),
(494, 20144007, 'Alberto', 'Aguilar', 'calamaba', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 0),
(495, 20110183, 'Ma Andrea Carla', 'Ebison', 'rolando', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 0),
(496, 20140514, 'Diosmar', 'Fernandez', 'ramsoid', 'FA', 'Carmona', 'Satellite', 0, '1', 'active', 0),
(497, 20140005, 'Nestor', 'Alvarez', 'nestor', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', 0),
(498, 20080001, 'Divinia', 'Chavez', 'e82656', 'FA', 'CED', 'Main', 0, '1', 'active', -1),
(499, 20080002, 'Hernando', 'Robles', 'NONE', 'FA', 'CED', 'Main', 1, 'NONE', 'active', 0),
(500, 20080435, 'Trinidad', 'Ocampo', '060450', 'FA', 'CAS', 'Main', 0, '1', 'active', -1),
(501, 20080104, 'Cene', 'Bago', '123456', 'FA', 'CEIT', 'Main', 0, '1', 'active', -1),
(502, 200806036, 'Louziela', 'Masana', 'ziela1', 'FA', 'CAS', 'Main', 0, '1', 'active', -1),
(503, 20080570, 'Alfredo', 'Venzon', 'austral', 'FA', 'CED', 'Main', 0, '1', 'active', -1),
(504, 20143010, 'Alejandro', 'Mojica', '123456', 'FA', 'CAFENR', 'Main', 0, '1', 'active', -1),
(505, 20080141, 'Charlotte', 'Carandang', 'khylle', 'FA', 'CEIT', 'Main', 0, '1', 'active', -1),
(506, 20080085, 'Rico', 'Asuncion', 'srdjanrico', 'FA', 'CEIT', 'Main', 0, '1', 'active', -1),
(507, 20130483, 'Mildred', 'Sebastian', 'myguee14', 'FA', 'CAS', 'Main', 0, '1', 'active', -1),
(508, 20130476, 'Dinah', 'Espineli', 'Kalyn221', 'FA', 'CAS', 'Main', 0, '1', 'active', -1),
(509, 20080312, 'Yolanda', 'Ilagan', '20080312', 'FA', 'CAS', 'Main', 0, '1', 'active', -1),
(510, 20145001, 'Myleen', 'Legaspi', 'mylz4613', 'FA', 'CED', 'Main', 0, '1', 'active', -1),
(511, 20080282, 'Agnes', 'Francisco', 'mamaannes', 'FA', 'CAS', 'Main', 0, '1', 'active', -1),
(512, 20146001, 'Grace', 'Abuton', 'NONE', 'FA', 'Silang', 'Satellite', 1, 'NONE', 'active', 0),
(513, 20080124, 'Willie', 'Buclatin', '123456', 'FA', 'CEIT', 'Main', 0, '1', 'active', -1),
(514, 20090050, 'Almira', 'Magcawas', 'ihearttgp062610', 'FA', 'CEMDS', 'Main', 0, '1', 'active', -1),
(515, 20080578, 'Edna', 'Vida', 'lawsonandrea', 'FA', 'CAFENR', 'Main', 0, '1', 'active', -1),
(516, 20146002, 'Enrica', 'Esmero', '0823maxx', 'FA', 'CEMDS', 'Main', 0, '1', 'active', -1),
(517, 20080626, 'Edwin', 'Arboleda', 'akosiedwin', 'FA', 'CEIT', 'Main', 0, '1', 'active', -1),
(518, 20080482, 'Camilo', 'Polinga', '123456', 'FA', 'Rosario', 'Satellite', 0, '1', 'active', -1);

-- --------------------------------------------------------

--
-- Table structure for table `tblofficer`
--

CREATE TABLE IF NOT EXISTS `tblofficer` (
`id` int(10) NOT NULL,
  `o_number` int(10) DEFAULT NULL,
  `o_fname` varchar(100) DEFAULT NULL,
  `o_lname` varchar(100) DEFAULT NULL,
  `o_position` varchar(100) DEFAULT NULL,
  `o_organization` varchar(100) DEFAULT NULL,
  `o_college_branch` varchar(100) DEFAULT NULL,
  `o_campus` varchar(100) DEFAULT NULL,
  `start_term` int(5) DEFAULT NULL,
  `end_term` int(5) DEFAULT NULL,
  `o_status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tblvote`
--

CREATE TABLE IF NOT EXISTS `tblvote` (
`id` int(255) NOT NULL,
  `m_number` int(10) DEFAULT NULL,
  `vote_p` int(10) DEFAULT NULL,
  `vote_vp` int(10) DEFAULT NULL,
  `vote_s` int(10) DEFAULT NULL,
  `vote_t` int(10) DEFAULT NULL,
  `vote_a` int(10) DEFAULT NULL,
  `vote_pr` int(10) DEFAULT NULL,
  `v_organization` varchar(100) DEFAULT NULL,
  `v_year` int(5) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=307 ;

--
-- Dumping data for table `tblvote`
--

INSERT INTO `tblvote` (`id`, `m_number`, `vote_p`, `vote_vp`, `vote_s`, `vote_t`, `vote_a`, `vote_pr`, `v_organization`, `v_year`) VALUES
(1, 20096011, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(2, 20080323, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(3, 24, 1, 0, 0, 0, 30, 0, 'FA', 2014),
(4, 20141013, 20090022, 20080073, 20080441, 20080271, 0, 20100078, 'FA', 2014),
(5, 20080457, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(6, 113, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(7, 20080618, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(8, 20141015, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(9, 20141014, 20090022, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(10, 57, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(11, 13, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(12, 26, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(13, 20141019, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(14, 20080435, 1, 20080492, 20080441, 20141003, 30, 0, 'FA', 2014),
(15, 20141017, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(16, 20130003, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(17, 20080413, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(18, 20080136, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(19, 20080055, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(20, 20130499, 20090022, 20080073, 20080441, 0, 0, 20100078, 'FA', 2014),
(21, 19, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(22, 20080112, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(23, 20142001, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(24, 45, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(25, 200806028, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(26, 20080514, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(27, 22, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(28, 2007009, 1, 20080492, 20080441, 0, 0, 0, 'FA', 2014),
(29, 20080228, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(30, 20140042, 1, 0, 0, 0, 0, 0, 'FA', 2014),
(31, 20080499, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(32, 20080492, 20090022, 20080492, 0, 20080271, 30, 680, 'FA', 2014),
(33, 20140507, 20090022, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(34, 8, 1, 20080073, 20080441, 20080271, 30, 0, 'FA', 2014),
(35, 20080478, 1, 0, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(36, 20110193, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(37, 88, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(38, 20090033, 1, 20080492, 20080441, 0, 0, 0, 'FA', 2014),
(39, 20080189, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(40, 20110137, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(41, 20140218, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(42, 1, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(43, 20080564, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(44, 20140068, 20090022, 0, 0, 0, 0, 0, 'FA', 2014),
(45, 20080524, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(46, 20080419, 1, 20080492, 20080441, 20141003, 30, 0, 'FA', 2014),
(47, 111, 1, 0, 20080441, 20080271, 30, 0, 'FA', 2014),
(48, 173, 1, 20080073, 20080441, 0, 30, 680, 'FA', 2014),
(49, 20100007, 1, 20080492, 20080441, 20141003, 0, 0, 'FA', 2014),
(50, 20080470, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(51, 20100078, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(52, 20080073, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(53, 20140104, 20090022, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(54, 20060002, 1, 20080073, 0, 20080271, 0, 0, 'FA', 2014),
(55, 20110148, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(56, 20142003, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(57, 20100058, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(58, 20140044, 20090022, 0, 0, 20080271, 0, 0, 'FA', 2014),
(59, 20140107, 20090022, 0, 0, 0, 0, 0, 'FA', 2014),
(60, 20142004, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(61, 20080561, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(62, 20080469, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(63, 20140128, 20090022, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(64, 20090024, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(65, 95, 1, 20080492, 20080441, 20080271, 30, 0, 'FA', 2014),
(66, 116, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(67, 20141023, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(68, 20120099, 1, 20080492, 20080441, 20080271, 30, 0, 'FA', 2014),
(69, 46, 1, 0, 20080441, 0, 30, 0, 'FA', 2014),
(70, 2008020, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(71, 32, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(72, 20140030, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(73, 20140038, 20090022, 0, 20080441, 0, 30, 680, 'FA', 2014),
(74, 20140087, 1, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(75, 20090019, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(76, 20062507, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(77, 20140050, 20090022, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(78, 20052529, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(79, 20080424, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(80, 20080400, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(81, 20080399, 20090022, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(82, 20080584, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(83, 20080204, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(84, 20140002, 20090022, 20080492, 20080441, 0, 0, 20100078, 'FA', 2014),
(85, 20141020, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(86, 20130500, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(87, 20080416, 1, 20080073, 20080441, 20080271, 0, 20100078, 'FA', 2014),
(88, 20087012, 1, 0, 20080441, 0, 0, 0, 'FA', 2014),
(89, 20130501, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(90, 20080521, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(91, 20140085, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(92, 20080344, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(93, 20080441, 0, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(94, 20140031, 20090022, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(95, 20144002, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(96, 971, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(97, 20080104, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(98, 20140132, 20090022, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(99, 20080456, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(100, 459, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(101, 20140086, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(102, 20140023, 20090022, 20080492, 20080441, 0, 30, 0, 'FA', 2014),
(103, 63, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(104, 30, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(105, 20140082, 20090022, 20080492, 0, 20080271, 30, 680, 'FA', 2014),
(106, 200806036, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(107, 52, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(108, 20080160, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(109, 47, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(110, 20140019, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(111, 20080570, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(112, 20140008, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(113, 20080198, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(114, 20080147, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(115, 20080142, 20090022, 20080492, 0, 0, 0, 0, 'FA', 2014),
(116, 20140026, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(117, 20143010, 1, 20080073, 20080441, 20141003, 30, 0, 'FA', 2014),
(118, 20143001, 0, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(119, 20140158, 20090022, 20080492, 20080441, 20080271, 0, 0, 'FA', 2014),
(120, 20110102, 20090022, 20080492, 20080441, 20080271, 30, 0, 'FA', 2014),
(121, 20120271, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(122, 20140029, 20090022, 20080492, 20080441, 0, 30, 0, 'FA', 2014),
(123, 900, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(124, 622, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(125, 20140049, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(126, 20140059, 20090022, 20080492, 0, 0, 0, 0, 'FA', 2014),
(127, 20080348, 1, 20080073, 20080441, 20080271, 30, 0, 'FA', 2014),
(128, 20086050, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(129, 20080146, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(130, 20080549, 1, 20080073, 0, 20080271, 0, 20100078, 'FA', 2014),
(131, 39, 20090022, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(132, 28, 1, 20080073, 20080441, 0, 30, 680, 'FA', 2014),
(133, 20090007, 20090022, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(134, 20080119, 0, 20080492, 0, 20141003, 0, 0, 'FA', 2014),
(135, 20110090, 1, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(136, 49, 20090022, 0, 0, 0, 0, 680, 'FA', 2014),
(137, 20110175, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(138, 56, 1, 0, 0, 0, 0, 0, 'FA', 2014),
(139, 20080229, 1, 20080492, 20080441, 20141003, 0, 0, 'FA', 2014),
(140, 20142002, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(141, 20110206, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(142, 20140514, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(143, 20096033, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(144, 680, 20090022, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(145, 20144007, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(146, 20080659, 1, 20080073, 0, 20080271, 30, 20100078, 'FA', 2014),
(147, 20090199, 20090022, 20080492, 20080441, 20141003, 30, 0, 'FA', 2014),
(148, 20081238, 1, 20080073, 20080441, 20080271, 0, 680, 'FA', 2014),
(149, 20096032, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(150, 20110069, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(151, 20130136, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(152, 20140034, 20090022, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(153, 20080117, 1, 20080073, 20080441, 20080271, 0, 20100078, 'FA', 2014),
(154, 20080455, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(155, 20080141, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(156, 20080059, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(157, 20080085, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(158, 910, 1, 20080492, 20080441, 20080271, 30, 0, 'FA', 2014),
(159, 96, 1, 0, 0, 0, 30, 0, 'FA', 2014),
(160, 20141011, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(161, 20080374, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(162, 20130134, 1, 0, 20080441, 20080271, 30, 680, 'FA', 2014),
(163, 20080507, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(164, 20100043, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(165, 20130135, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(166, 20120098, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(167, 20080060, 0, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(168, 20080621, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(169, 20140024, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(170, 20141016, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(171, 20080026, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(172, 20141008, 20090022, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(173, 20130483, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(174, 20141022, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(175, 20141009, 20090022, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(176, 20130476, 1, 20080073, 0, 20080271, 0, 20100078, 'FA', 2014),
(177, 20080169, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(178, 20080312, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(179, 20145001, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(180, 20110231, 1, 20080073, 0, 0, 0, 20100078, 'FA', 2014),
(181, 20096019, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(182, 20080308, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(183, 20120278, 1, 20080073, 20080441, 20141003, 0, 20100078, 'FA', 2014),
(184, 20141024, 20090022, 20080492, 0, 0, 0, 0, 'FA', 2014),
(185, 20080427, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(186, 200806022, 1, 20080073, 20080441, 0, 0, 20100078, 'FA', 2014),
(187, 20096013, 1, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(188, 20140025, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(189, 200806053, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(190, 20141012, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(191, 20080282, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(192, 20140095, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(193, 489, 20090022, 0, 0, 0, 30, 680, 'FA', 2014),
(194, 20140018, 1, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(195, 20140093, 1, 0, 0, 0, 0, 0, 'FA', 2014),
(196, 20140197, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(197, 20100075, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(198, 20140178, 1, 0, 0, 0, 0, 0, 'FA', 2014),
(199, 20080090, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(200, 20120424, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(201, 20080280, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(202, 20110092, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(203, 20141007, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(204, 20141004, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(205, 20141003, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(206, 20080214, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(207, 20141002, 1, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(208, 20090031, 1, 20080492, 0, 0, 0, 0, 'FA', 2014),
(209, 20080432, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(210, 20080568, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(211, 10, 1, 20080073, 0, 20080271, 30, 680, 'FA', 2014),
(212, 20141026, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(213, 20080314, 1, 20080073, 20080441, 20141003, 0, 20100078, 'FA', 2014),
(214, 20080847, 20090022, 20080073, 20080441, 20080271, 30, 0, 'FA', 2014),
(215, 20080583, 1, 20080073, 20080441, 20141003, 0, 20100078, 'FA', 2014),
(216, 20080061, 1, 20080073, 0, 20080271, 0, 20100078, 'FA', 2014),
(217, 20080005, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(218, 20110138, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(219, 20080545, 0, 20080492, 0, 20080271, 30, 0, 'FA', 2014),
(220, 20140046, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(221, 20080530, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(222, 20080110, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(223, 20140036, 1, 20080073, 20080441, 0, 0, 0, 'FA', 2014),
(224, 200806020, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(225, 20080260, 1, 20080073, 20080441, 0, 0, 20100078, 'FA', 2014),
(226, 20095026, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(227, 20090022, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(228, 20110248, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(229, 20140075, 1, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(230, 20095036, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(231, 20140005, 20090022, 20080073, 0, 20080271, 0, 20100078, 'FA', 2014),
(232, 20110221, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(233, 20095028, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(234, 20095012, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(235, 20095043, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(236, 20095034, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(237, 20080124, 1, 20080073, 0, 0, 0, 20100078, 'FA', 2014),
(238, 122, 1, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(239, 941, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(240, 20140133, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(241, 86, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(242, 20092010, 1, 20080073, 20080441, 20080271, 30, 0, 'FA', 2014),
(243, 20090050, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(244, 79, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(245, 20080578, 1, 20080073, 20080441, 20141003, 0, 680, 'FA', 2014),
(246, 200806056, 20090022, 20080073, 20080441, 20080271, 0, 0, 'FA', 2014),
(247, 20146002, 20090022, 20080492, 20080441, 20141003, 30, 680, 'FA', 2014),
(248, 20110195, 1, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(249, 20130002, 1, 20080492, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(250, 20092009, 0, 20080073, 0, 20141003, 30, 680, 'FA', 2014),
(251, 327, 20090022, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(252, 20080297, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(253, 20120326, 20090022, 20080492, 0, 20080271, 0, 680, 'FA', 2014),
(254, 20092011, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(255, 20140061, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(256, 20080445, 1, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(257, 20140016, 20090022, 0, 0, 0, 0, 0, 'FA', 2014),
(258, 20080144, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(259, 20080271, 20090022, 20080492, 20080441, 20080271, 30, 0, 'FA', 2014),
(260, 20080490, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(261, 20080398, 20090022, 0, 0, 20080271, 0, 680, 'FA', 2014),
(262, 20080483, 20090022, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(263, 36, 20090022, 0, 0, 20080271, 30, 0, 'FA', 2014),
(264, 21, 1, 0, 0, 0, 0, 0, 'FA', 2014),
(265, 20141006, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(266, 20080454, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(267, 20087002, 1, 20080492, 0, 20141003, 0, 0, 'FA', 2014),
(268, 20140045, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(269, 20080237, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(270, 20080236, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(271, 20141001, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(272, 20110183, 20090022, 0, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(273, 200806058, 20090022, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(274, 20080156, 20090022, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(275, 20080417, 20090022, 20080492, 0, 20080271, 0, 680, 'FA', 2014),
(276, 20144006, 20090022, 20080492, 0, 20080271, 30, 0, 'FA', 2014),
(277, 20080052, 20090022, 20080492, 20080441, 20080271, 30, 680, 'FA', 2014),
(278, 20080497, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(279, 20080243, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(280, 20100037, 1, 20080073, 20080441, 20141003, 0, 20100078, 'FA', 2014),
(281, 20140004, 20090022, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(282, 20100020, 1, 20080073, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(283, 20120312, 1, 20080492, 20080441, 20080271, 0, 20100078, 'FA', 2014),
(284, 20080541, 1, 20080492, 20080441, 20080271, 0, 20100078, 'FA', 2014),
(285, 20110133, 1, 20080073, 20080441, 20141003, 30, 680, 'FA', 2014),
(286, 20080508, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(287, 20143005, 1, 20080073, 20080441, 20141003, 30, 0, 'FA', 2014),
(288, 20092012, 1, 20080073, 0, 0, 0, 0, 'FA', 2014),
(289, 20140028, 20090022, 20080492, 0, 20080271, 0, 0, 'FA', 2014),
(290, 20110172, 20090022, 20080073, 20080441, 20080271, 30, 0, 'FA', 2014),
(291, 20096001, 1, 20080492, 0, 20080271, 30, 20100078, 'FA', 2014),
(292, 20140058, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(293, 20080534, 1, 0, 0, 20080271, 0, 0, 'FA', 2014),
(294, 20080617, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(295, 0, 1, 20080073, 20080441, 20141003, 30, 0, '', 2014),
(296, 20080482, 20090022, 20080073, 20080441, 20080271, 30, 680, 'FA', 2014),
(297, 20120301, 20090022, 20080073, 0, 20080271, 0, 20100078, 'FA', 2014),
(298, 20080319, 20090022, 20080492, 0, 20080271, 0, 20100078, 'FA', 2014),
(299, 20080626, 20090022, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014),
(300, 20141018, 0, 20080492, 0, 20080271, 30, 20100078, 'FA', 2014),
(301, 20140014, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(302, 20100091, 1, 20080073, 0, 20141003, 0, 0, 'FA', 2014),
(303, 20080207, 20090022, 20080492, 20080441, 20080271, 30, 20100078, 'FA', 2014),
(304, 2008175, 0, 20080492, 20080441, 20080271, 0, 20100078, 'FA', 2014),
(305, 20080010, 20090022, 20080492, 0, 20080271, 0, 0, 'FA', 2014),
(306, 20080001, 1, 20080073, 20080441, 20141003, 30, 20100078, 'FA', 2014);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `election`
--
ALTER TABLE `election`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elec_con`
--
ALTER TABLE `elec_con`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcandidate`
--
ALTER TABLE `tblcandidate`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmember`
--
ALTER TABLE `tblmember`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblofficer`
--
ALTER TABLE `tblofficer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblvote`
--
ALTER TABLE `tblvote`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `elec_con`
--
ALTER TABLE `elec_con`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblcandidate`
--
ALTER TABLE `tblcandidate`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblmember`
--
ALTER TABLE `tblmember`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=519;
--
-- AUTO_INCREMENT for table `tblofficer`
--
ALTER TABLE `tblofficer`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblvote`
--
ALTER TABLE `tblvote`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=307;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
