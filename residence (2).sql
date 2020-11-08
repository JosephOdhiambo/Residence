-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 07:12 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `residence`
--

-- --------------------------------------------------------

--
-- Table structure for table `blacklisted`
--

CREATE TABLE IF NOT EXISTS `blacklisted` (
`id` int(11) NOT NULL,
  `idno` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `fault` varchar(250) NOT NULL,
  `userid` int(11) NOT NULL,
  `blacklistdate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blacklisted`
--

INSERT INTO `blacklisted` (`id`, `idno`, `name`, `fault`, `userid`, `blacklistdate`) VALUES
(1, 2922, 'vtalis', 'vdah', 3, '0000-00-00'),
(2, 23, 'vdah', 'jangili mdogo', 4, '0000-00-00'),
(3, 23, 'vdah', 'pkopkopjet', 4, '2019-04-02'),
(4, 23, 'vdah kipkirui koech', 'motelyot', 4, '0000-00-00'),
(6, 0, 'vdah', 'fdsfgsdf', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE IF NOT EXISTS `chatting` (
`id` int(11) NOT NULL,
  `user` varchar(300) NOT NULL,
  `message` varchar(300) NOT NULL,
  `ip_address` varchar(300) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id`, `user`, `message`, `ip_address`, `date_time`) VALUES
(1, 'vitalis', 'what is the matter', '::1', '2019-04-23 10:01:02'),
(2, 'vitalis', 'please call me', '::1', '2019-04-23 10:01:02'),
(3, 'caretaker', 'What happened yesternight?', '::1', '2019-04-23 10:01:48'),
(4, 'caretaker', 'please call me later', '::1', '2019-04-23 10:02:01'),
(5, 'caretaker', 'i want a meeting tomorow', '::1', '2019-04-23 10:02:50'),
(6, 'vitalis', 'At what time @caretaker?', '::1', '2019-04-23 10:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE IF NOT EXISTS `courts` (
`courtid` int(11) NOT NULL,
  `Courtname` varchar(250) NOT NULL,
  `Phaseid` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Remarks` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`courtid`, `Courtname`, `Phaseid`, `Capacity`, `Remarks`) VALUES
(1, 'Embakasi', 24, 230, 'sio mbayya'),
(2, 'fdhgh', 23, 23, 'gfhfg'),
(3, 'fdhgh', 231, 23, 'vizuri sana'),
(4, 'Imara Daima', 0, 232, 'sio mbayya');

-- --------------------------------------------------------

--
-- Table structure for table `houseproperties`
--

CREATE TABLE IF NOT EXISTS `houseproperties` (
  `propid` int(11) DEFAULT NULL,
  `housetype` varchar(250) NOT NULL,
  `houseno` int(11) NOT NULL,
  `Court` int(11) NOT NULL,
  `headhouseholdid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `occupantsdetails`
--

CREATE TABLE IF NOT EXISTS `occupantsdetails` (
`occid` int(11) NOT NULL,
  `Occupation` varchar(250) NOT NULL,
  `totaloccupants` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `phase`
--

CREATE TABLE IF NOT EXISTS `phase` (
`phaseid` int(11) NOT NULL,
  `Phaseno` int(11) NOT NULL,
  `location` varchar(250) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phase`
--

INSERT INTO `phase` (`phaseid`, `Phaseno`, `location`, `Name`) VALUES
(1, 88, 'Embakasi', 'Embakasi'),
(4, 1212, 'edah', 'edeh'),
(5, 1212, 'edah', 'edeh'),
(6, 12345, 'umoi', 'hgjhghk');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(350) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `maritalstatus` varchar(100) NOT NULL,
  `Fnames` varchar(400) NOT NULL,
  `idno` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `maritalstatus`, `Fnames`, `idno`, `phone`, `status`, `role`) VALUES
(1, 'pkopkop@gmail.com', 'pkiruivits@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '', '', '', '', 'BLACKLISTED', 'admin'),
(3, 'pkopkop', 'pk@gmail.com', '51213adadab5d949945d49e23f452b0b', 'single', 'vtalis', '2922', '719349398', 'BLACKLISTED', ''),
(4, 'ppp', 'pkk@gmail.com', '51213adadab5d949945d49e23f452b0b', 'sngle', 'vdah', '23', '13234', 'BLACKLISTED', 'admin'),
(5, 'kkkk', 'kkk@gmail.com', 'cb42e130d1471239a27fca6228094f0e', 'single', ' kipkalia kones', '29225173', '719349398', '', 'admin'),
(6, 'aaa', 'a@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'single', ' kipkalis', '2345', '719349398', '', ''),
(7, 'vitalis', 'pkirui@gmail.com', '6d19c113404cee55b4036fce1a37c058', 'married', 'pkopkop', '12345', '98765', '', ''),
(8, 'acc', 'acc@gmail.com', '1673448ee7064c989d02579c534f6b66', 'single', 'accompany', '234', '12333', '', ''),
(9, 'accc', 'accc@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'single', 'accompany', '234', '12333', '', ''),
(10, 'vdah', 'pkiruivitsa@gmail.com', '7e849ed4ae52b187fc44e4fa92fafe05', 'vdah', 'vdah', '1345', '1234', '', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blacklisted`
--
ALTER TABLE `blacklisted`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
 ADD PRIMARY KEY (`courtid`);

--
-- Indexes for table `occupantsdetails`
--
ALTER TABLE `occupantsdetails`
 ADD PRIMARY KEY (`occid`);

--
-- Indexes for table `phase`
--
ALTER TABLE `phase`
 ADD PRIMARY KEY (`phaseid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blacklisted`
--
ALTER TABLE `blacklisted`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `courts`
--
ALTER TABLE `courts`
MODIFY `courtid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `occupantsdetails`
--
ALTER TABLE `occupantsdetails`
MODIFY `occid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `phase`
--
ALTER TABLE `phase`
MODIFY `phaseid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
