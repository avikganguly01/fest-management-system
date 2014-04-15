-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2014 at 05:42 PM
-- Server version: 5.6.11-log
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appuser`
--

CREATE TABLE IF NOT EXISTS `appuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `sem` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `appuser`
--

INSERT INTO `appuser` (`id`, `username`, `password`, `name`, `contact_no`, `sem`, `reg_date`) VALUES
(4, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 'user1', '', 0, '2014-04-02'),
(5, 'user2', '5f4dcc3b5aa765d61d8327deb882cf99', 'user2', '', 0, '2014-04-02'),
(6, 'user3', '5f4dcc3b5aa765d61d8327deb882cf99', 'user3', '', 0, '2014-04-02'),
(7, 'user4', '5f4dcc3b5aa765d61d8327deb882cf99', 'user4', '', 0, '2014-04-02'),
(8, 'user5', '5f4dcc3b5aa765d61d8327deb882cf99', 'user5', '', 0, '2014-04-02'),
(9, 'user6', '5f4dcc3b5aa765d61d8327deb882cf99', 'user6', '', 0, '2014-04-02'),
(10, 'user7', '5f4dcc3b5aa765d61d8327deb882cf99', 'user7', '', 0, '2014-04-02'),
(11, 'user8', '5f4dcc3b5aa765d61d8327deb882cf99', 'user8', '', 0, '2014-04-02'),
(12, 'admin3', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin3', '24534', 0, '2014-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `appuser_transactions`
--

CREATE TABLE IF NOT EXISTS `appuser_transactions` (
  `transactionid` int(11) NOT NULL AUTO_INCREMENT,
  `appuserid` varchar(20) NOT NULL,
  `regid` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`transactionid`),
  KEY `appuserid` (`appuserid`),
  KEY `regid` (`regid`),
  KEY `appuserid_2` (`appuserid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=667 ;

--
-- Dumping data for table `appuser_transactions`
--

INSERT INTO `appuser_transactions` (`transactionid`, `appuserid`, `regid`, `amount`, `time`) VALUES
(666, 'admin3', '1', 100, '2014-04-15 03:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=426 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`) VALUES
(1, 'Reva ITM');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE IF NOT EXISTS `coordinators` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_name` (`event_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `role`, `name`, `event_name`, `contact_no`) VALUES
(1, 1, 'Shoaib', 'Creative Writing', '7890');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `category` int(3) DEFAULT NULL,
  `timing` varchar(30) DEFAULT NULL,
  `groupSize` int(4) NOT NULL,
  `feeHome` int(11) DEFAULT NULL,
  `feeRemote` int(11) DEFAULT NULL,
  `firstCashPrize` int(11) DEFAULT NULL,
  `secondCashPrize` int(11) DEFAULT NULL,
  `winnerreg` varchar(30) DEFAULT NULL,
  `winnercontactno` varchar(15) DEFAULT NULL,
  `runnerreg` varchar(30) DEFAULT NULL,
  `runnercontactno` varchar(15) DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT '0',
  `location` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `name_2` (`name`),
  KEY `runnerreg` (`runnerreg`),
  KEY `winnerreg` (`winnerreg`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=90 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `category`, `timing`, `groupSize`, `feeHome`, `feeRemote`, `firstCashPrize`, `secondCashPrize`, `winnerreg`, `winnercontactno`, `runnerreg`, `runnercontactno`, `status`, `location`) VALUES
(1, 'Creative Writing', 0, 'Day 1', 1, 50, 100, 3000, 1500, NULL, NULL, NULL, NULL, 0, 'Room 101');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `registrationid` varchar(20) NOT NULL,
  `name` varchar(11) NOT NULL,
  `dept` varchar(30) DEFAULT NULL,
  KEY `registrationid` (`registrationid`),
  KEY `registrationid_2` (`registrationid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `usn` varchar(15) NOT NULL,
  `collegename` varchar(60) NOT NULL,
  `dept` varchar(11) DEFAULT NULL,
  `contactno` varchar(15) NOT NULL,
  `eventname` varchar(30) NOT NULL,
  `regdate` date NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `usn` (`usn`),
  KEY `eventname` (`eventname`),
  KEY `collegename` (`collegename`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `usn`, `collegename`, `dept`, `contactno`, `eventname`, `regdate`, `paid`) VALUES
('1', 'Avik Ganguly', '1re10is010', 'Reva ITM', 'ISE', '9900878571', 'Creative Writing', '2014-04-01', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appuser_transactions`
--
ALTER TABLE `appuser_transactions`
  ADD CONSTRAINT `appuser_transactions_ibfk_1` FOREIGN KEY (`regid`) REFERENCES `registration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `appuser_transactions_ibfk_2` FOREIGN KEY (`appuserid`) REFERENCES `appuser` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD CONSTRAINT `coordinators_ibfk_1` FOREIGN KEY (`event_name`) REFERENCES `events` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_4` FOREIGN KEY (`runnerreg`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_3` FOREIGN KEY (`winnerreg`) REFERENCES `registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`registrationid`) REFERENCES `registration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_4` FOREIGN KEY (`eventname`) REFERENCES `events` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_ibfk_3` FOREIGN KEY (`collegename`) REFERENCES `college` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
