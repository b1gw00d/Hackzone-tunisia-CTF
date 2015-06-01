-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2015 at 12:53 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hackzone_statut` int(100) NOT NULL,
  `signup` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `hackzone_statut`, `signup`) VALUES
(1, 'admin', '70a37ba5db63878daab739fc24f88a65', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(11, 'Forensics'),
(12, 'Web'),
(13, 'Stega / Crypto'),
(16, 'Validation'),
(17, 'Hardware'),
(18, 'Programmation');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE IF NOT EXISTS `challenges` (
`id` int(100) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `flag` varchar(50) NOT NULL,
  `categ` varchar(100) NOT NULL,
  `miss` text NOT NULL,
  `hint` varchar(300) NOT NULL,
  `etat` int(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `surname`, `score`, `flag`, `categ`, `miss`, `hint`, `etat`) VALUES
(32, 'easy one', 100, '624c40435b6d7bc4311421af38132058', 'Forensics', '									Think like Wolf...\r\n<a href="http://vps158117.ovh.net/File">easy_one</a>				', 'polynom interpolation', 0),
(33, 'Joke', 100, '0d13e487420b28f4ae170b2cae32272f', 'Stega / Crypto', '<a href="http://vps158117.ovh.net/stega/joker.jpg">joker.jpg</a>', 'No Hint', 0),
(34, 'Ghost', 200, 'c37e65c7485234fc3e13b8c2d4b9fc26', 'Stega / Crypto', '												<a href="http://vps158117.ovh.net/stega/ghost.txt">ghost.txt</a>								', 'No Hint', 0),
(36, 'interstellar', 200, 'cd21b93cfd8d6824dc2bce1a19decaf7', 'Stega / Crypto', '			<a href="http://vps158117.ovh.net/interstellar	">interstellar</a>', 'No Hint', 0),
(40, 'Trivia', 1, '7f0a6df4a8df3710ef3f20bc694af090', 'Validation', 'Enter this flag Welcome_to_HackZone', 'No Hint', 0),
(41, 'Spam<br> Challenge', 200, '9bc8b513319aa3263e74de225e231ccd', 'Web', '			<a href="http://vps142400.ovh.net/spamchall/">spamchall</a>			', 'No Hint', 0),
(42, 'Subway', 300, '19d1844b162c7e03c4c24c09c27f4ff1', 'Forensics', 'The Smartphone of Atef has been stolen. We find a memory card of the thief where the tracking files were stored. Can you help him to find his phone by telling him the nearest metro station were the thief could be.\r\n <a href="http://vps158117.ovh.net/metro_station">mem_card_image</a>		', 'No Hint', 0),
(43, 'GuestBook', 100, 'c0eec904cc54a588d736fc5706f5a0e9', 'Web', '<a href="http://vps142400.ovh.net/guestbook/">Guest Book</a>', 'No hint', 0),
(45, 'Hast', 300, '64dc4cb6b29c425a03e88cf7383d2395', 'Stega / Crypto', '<a href="http://vps158117.ovh.net/stega/hast.jpg">stega300</a>	', 'Think out of the Box', 0),
(46, 'Plotter', 200, '5273dac19cf21ac93a315d03e7ffcdd2', 'Hardware', '									Hardware	\r\nYou have 8 mins to connect to the Bluetooth module HC05.\r\n<a href="http://wiki.micropython.org/official-accessories/Bluetooth-module-HC05">source</a>						', 'No Hint', 0),
(48, 'Bonus<br> Challenge', 150, '0f2a1e4003e05ace35f41c5b84e6bf3b', 'Web', '			<a href ="http://vps142400.ovh.net/3rdchall/">bonus</a>		', 'No Hint', 0),
(49, 'Alumni_ensi', 400, 'b1fa5db53da53211afb10ec3a07c44ef', 'Web', '<a href="http://vps142400.ovh.net/alumni/">alumni</a> ', 'No Hint', 0),
(51, 'TunizJan', 200, 'ea360dbbc4f86ec37e2f208699d60e0c', 'Validation', '			41.231.55.104 2323		', 'No Hint', 0),
(54, 'Rubics Cube', 400, 'd81e63bebb43abd05a283cde5dd16541', 'Programmation', '<center> <h1> Rubics Cube Challenge </h1> </center>\n    <center> <h3> Description </h3> \n  \n    <p> The world best record to solve a 4 * 4 * 4 Rubics Cube puzzle seems to be 5 minutes ! Try to beat it xD </p>\n         </center>\n    <center> <p> <b> Allowed Operators : </b> </br> </br> \n\n<table border="1"> \n	<tr>\n	<td> Clockwise operators </td>\n	<td> Non Clockwise operators </td>\n	</tr>\n	<tr>\n	<td> L1 , R1 , U1 , D1 , F1, B1 </td>\n	<td> Li1 , Ri1 , Ui1 , Di1 , Fi1 , Bi1 </td>\n	</tr>\n	<tr>\n	<td> L2 , R2 , U2 , D2 , F2 , B2 </td>\n	<td> Li2, Ri2 , Ui2 , Di2 , Fi2 , Bi2 </td>\n	</tr>\n	</table>\n\n	 \n	 </br> </br>\n	\n\n	<b> Address :  </b>   \n	</br> </br>\n   	>>   nc 176.31.167.230 1338    </br>\n		say : start\n	    </p> </center>		', 'No hint', 0),
(55, 'The real flag<br> (solved)', 200, '24350bfdf8748e864b8b62fd05652a70', 'Validation', '			Solved By the winners Team :p		', 'No hint', 0),
(58, 'Youzer<br>IscalaChion', 500, 'ddc3344c34e40ee4c96e5ad74db2edee', 'Validation', '			ssh start@41.231.22.176 -p 2202\r\nstart:start		', 'No hint', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id` int(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `code` varchar(20) NOT NULL,
  `initcode` varchar(20) NOT NULL,
  `active` int(11) NOT NULL,
  `etat` varchar(20) NOT NULL,
  `total` int(11) NOT NULL,
  `time` int(50) NOT NULL,
  `submit_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=235 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `email`, `img`, `code`, `initcode`, `active`, `etat`, `total`, `time`, `submit_time`) VALUES
(234, 'root', '8603253d0c65f80a26866d79552cf4ed', 'root@gmail.com', './img/logo-hack.png', '', '', 1, 'OK', 0, 0, 1431536478);

-- --------------------------------------------------------

--
-- Table structure for table `solved`
--

CREATE TABLE IF NOT EXISTS `solved` (
`id` int(100) NOT NULL,
  `team_id` int(100) NOT NULL,
  `categ_id` int(100) NOT NULL,
  `id_task` int(100) NOT NULL,
  `time` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solved`
--
ALTER TABLE `solved`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `solved`
--
ALTER TABLE `solved`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
