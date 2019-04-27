-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 05:53 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=155 ;

-- --------------------------------------------------------

--
-- Table structure for table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
`id` int(10) NOT NULL,
  `organization` varchar(100) DEFAULT NULL,
  `org_status` int(1) DEFAULT NULL,
  `namespace` varchar(100) NOT NULL,
  `mosaic` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `election`
--

INSERT INTO `election` (`id`, `organization`, `org_status`, `namespace`, `mosaic`) VALUES
(6, 'FA', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
`id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `organization` varchar(10) DEFAULT NULL,
  `private_key` varchar(100) NOT NULL,
  `public_key` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `username`, `password`, `organization`, `private_key`, `public_key`, `address`) VALUES
(6, 'adminfa', 'fa', 'FA', '8c9c3b848bc51671fa83fa68b79b8ff03790fe5aa026b72f67d83709ef9c7ee8', 'd756a829544a0fd2bd943dd39092d4b3adbcb03fbf678fdc2a30bc5f7b5bf84a', 'TADYFN6LK6HZS7WA3WZRY7RRLFSZQ7RFLXGSFGZ6');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

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
  `passElec` int(5) DEFAULT NULL,
  `private_key` varchar(100) NOT NULL,
  `public_key` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=552 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `elec_con`
--
ALTER TABLE `elec_con`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `election`
--
ALTER TABLE `election`
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
-- AUTO_INCREMENT for table `elec_con`
--
ALTER TABLE `elec_con`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT for table `election`
--
ALTER TABLE `election`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblcandidate`
--
ALTER TABLE `tblcandidate`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tblmember`
--
ALTER TABLE `tblmember`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=552;
--
-- AUTO_INCREMENT for table `tblofficer`
--
ALTER TABLE `tblofficer`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tblvote`
--
ALTER TABLE `tblvote`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
