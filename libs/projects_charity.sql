-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 03:19 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects_charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(60) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `fname` varchar(150) DEFAULT NULL,
  `sex` varchar(6) DEFAULT NULL,
  `fone` varchar(12) DEFAULT NULL,
  `acex` text,
  `icode` text,
  `pl` int(1) DEFAULT '0',
  `img` text NOT NULL,
  `addon` datetime NOT NULL,
  `admin` varchar(50) DEFAULT NULL,
  `stage` int(1) DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `email`, `fname`, `sex`, `fone`, `acex`, `icode`, `pl`, `img`, `addon`, `admin`, `stage`, `status`) VALUES
(1, 'switch', 'switch@gmail.com', 'Doctor Switch', 'Male', '07062356697', '$2y$10$JR0Qay7oG2DljEZZB05k0OJSC2o58Viom8Igq9Rud6Fhjsw64x8mO', '$2y$10$QIZuXqGRDGZ9wgWKgpie5eVp.Xd2O0VNeSaDO6kT97MLRCkyoBwAW', 0, '', '2018-03-19 12:00:07', 'self', 2, 1),
(2, 'jushcare', 'sammy@gmail.com', 'Samuel France', 'Male', '07062356699', '$2y$10$0FvdVdXM0u/arZcY.e4yfeTi.iRACC4rqCCqsarFyXFLhCs0x0HcO', NULL, 1, '', '2018-07-12 11:39:17', 'switch', 0, 1),
(3, 'Charity', 'charity@gmail.com', 'Charity NK', 'Female', '07012345678', '$2y$10$MX/B4K.weWKUsCNiTRUPYO/Un0IHQuOhwQd/.aPbLyOfJYWF4kGXG', '$2y$10$bxuhce.Xm1QSDLclW5j9nerj0QzAsjReB18EbxrZsBW3GG3uqGMlK', 0, '', '2018-08-04 13:20:12', 'switch', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `qstid` text NOT NULL,
  `cat` int(3) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `qstid`, `cat`, `user`, `dated`, `status`) VALUES
(1, '59', 5, 'joanian', '2018-08-06 23:09:39', 0),
(2, '58', 5, 'joanian', '2018-08-06 23:08:59', 1),
(3, '52', 5, 'joanian', '2018-08-07 12:01:30', 0),
(4, '60', 5, 'joanian', '2018-08-06 23:08:59', 1),
(5, '69', 6, 'joanian', '2018-08-06 23:24:22', 1),
(6, '74', 6, 'joanian', '2018-08-06 23:24:22', 1),
(7, '67', 6, 'joanian', '2018-08-06 23:24:23', 1),
(8, '72', 6, 'joanian', '2018-08-06 23:24:23', 1),
(9, '68', 6, 'joanian', '2018-08-06 23:26:11', 0),
(10, '65', 6, 'joanian', '2018-08-06 23:26:11', 0),
(11, '70', 6, 'joanian', '2018-08-06 23:26:11', 0),
(12, '66', 6, 'joanian', '2018-08-06 23:26:11', 0),
(13, '64', 6, 'joanian', '2018-08-06 23:26:11', 0),
(14, '5', 1, 'efemale', '2018-08-25 17:09:36', 0),
(15, '6', 1, 'efemale', '2018-08-25 17:09:36', 0),
(16, '4', 1, 'efemale', '2018-08-25 17:09:36', 0),
(17, '2', 1, 'efemale', '2018-08-25 17:07:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bacalculator`
--

CREATE TABLE `bacalculator` (
  `id` int(11) NOT NULL,
  `wh` int(3) DEFAULT NULL,
  `kga` varchar(3) DEFAULT NULL,
  `hrs` varchar(5) DEFAULT NULL,
  `hg` int(3) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `cal` varchar(10) DEFAULT NULL,
  `dated` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bacalculator`
--

INSERT INTO `bacalculator` (`id`, `wh`, `kga`, `hrs`, `hg`, `user`, `cal`, `dated`, `status`) VALUES
(1, 40, 'KG', '5', 4, 'joanian', '0.13088235', '2018-08-07 11:45:10', 0),
(2, 40, 'KG', '5', 4, 'joanian', '0.13', '2018-08-07 12:09:13', 0),
(3, 15, 'KG', '6', 14, 'joanian', '1.83', '2018-08-25 17:08:21', 0),
(4, 86, 'KG', '4', 17, 'joanian', '0.34', '2018-08-25 17:09:46', 0),
(5, 40, 'KG', '3', 23, 'joanian', '1.13', '2018-08-25 17:10:36', 0),
(6, 64, 'LB', '4.5', 6, 'joanian', '0.12', '2018-08-26 13:49:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(11) NOT NULL,
  `cat` int(1) NOT NULL,
  `ch` text NOT NULL,
  `ch2` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `cat`, `ch`, `ch2`, `user`, `status`) VALUES
(1, 1, ' Within the past three months, some of my friends and family have spoken to ', 'Hello', 'joanian', 1),
(2, 2, 'Slow and steady often wins the race, so if your goal (or your first goal â€“ goals can change) is to cut back', 'Slow and steady often wins the race, so if your goal (or your first goal â€“ goals can change) is to cut backdgfg hjdghd', 'joanian', 1),
(3, 3, 'Here are some common \"rules\" that have worked for people who were trying to cut down or quit drinking. Put a check mark beside the ones that might work for you. There\'s some space at the bottom of this exercise where you can record some personal rules that might work for you.', 'Cutting back can also be helpful when planning on quitting drinking entirely. The below suggestions can really help out.', 'joanian', 1),
(4, 4, 'Hello world', 'how u doing', 'joanian', 1),
(5, 5, 'dfd gbgt', 'yuhjyhn ujyunju', 'joanian', 1),
(6, 6, 'dfecde vrfref', '', 'joanian', 1),
(7, 1, 'is to do this', '', 'efemale', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `topic` varchar(80) NOT NULL,
  `msg` text,
  `user` varchar(50) DEFAULT NULL,
  `stage` int(1) DEFAULT '0',
  `dated` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `topic`, `msg`, `user`, `stage`, `dated`, `status`) VALUES
(1, 'Case Study Regarding YourSelf', 'If you have any personal issues, you might want to discuss with us, or an heart-2-heart communication, please do feel free to write us by using the form fields below and we shall reply you within hours, or click on read feedback\r\n\r\nIf you have any personal issues, you might want to discuss with us, or an heart-2-heart communication, please do feel free to write us by using the form fields below and we shall reply you within hours, or click on read feedback', 'joanian', 0, '2018-08-07 01:09:58', 1),
(2, 'How to control', 'If you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedback', 'efemale', 0, '2018-08-25 18:22:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_reply`
--

CREATE TABLE `feedback_reply` (
  `id` int(11) NOT NULL,
  `mid` int(4) NOT NULL,
  `msg` text,
  `user` varchar(50) DEFAULT NULL,
  `stage` int(1) DEFAULT '0',
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_reply`
--

INSERT INTO `feedback_reply` (`id`, `mid`, `msg`, `user`, `stage`, `dated`, `status`) VALUES
(1, 1, 'Welcome to Behaviour Adaptation Section. Have you gone through the Control section? Hope it was helpful? This section helps you from the beginning of your program to the stage of maintaining your new found lifestyle. It will give you an insight on how to go past the first two weeks which is usually the most difficult. You will also be given the opportunity to join a support group which will act as a very good support system as you fight this war against alcohol. You will learn what triggers are and how to handle your triggers until you are able to achieve your set goal. How do you deal with the desire to drink when it rears its ugly head? Find that out in this section. Do you need someone to talk when you are confused? This section offers you an opportunity to do just that. Finally you are able to assess yourself to see if you are making project. Isn’t this section interesting? You have no way of knowing until have gone through the activities yourself, have fun as you do that.', 'joanian', 0, '2018-08-07 14:25:27', 0),
(2, 1, 'to write us by using the form fields below and we shall reply you within hours, or click on read feedback If you have any personal issues, you might want to discuss with us, or an heart-2-heart communication, please do feel free to write us by using the form fields below and we shall reply you within hours, or click on read feedback', 'joanian', 0, '2018-08-07 14:20:55', 1),
(3, 1, 'to write us by using the form fields below and we shall reply you within hours, or click on read feedback If you have any personal issues, you might want to discuss with us, or an heart-2-heart communication, please do feel free to write us by using the form fields below and we shall reply you within hours, or click on read feedback', 'joanian', 0, '2018-08-07 14:38:11', 1),
(4, 2, 'Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity Charity How to control How to control Charity ', 'efemale', 0, '2018-08-25 17:29:19', 1),
(5, 2, 'yugduycfj efegwyfcuyfc efuegyuycfj ejhcgfeiucfyefkhc ewfcjefe bfehfikew f ewibhf ewfekhbf ewvihewbk ewfiewb fewfyuef ewfiuebwkjf ewfiuewkjfewfiuebjf ewfiebf efiuefkjn', 'efemale', 0, '2018-08-25 17:58:19', 1),
(6, 2, 'wgjdwghd  If you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedbackIf you have any personal issues, you might want to discuss with us, or an heart2heart communication, please do feel free to write us by using the form fields below and we shall reply you within 24hours, or click on read feedback', 'efemale', 0, '2018-08-25 18:00:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `cont` text NOT NULL,
  `dated` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `user`, `cont`, `dated`, `status`) VALUES
(2, 'switcher', 'Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you ', '2018-08-06 12:27:28', 1),
(3, 'drswitch', 'Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you ', '2018-08-06 12:27:28', 1),
(5, 'joanian', 'Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having ', '2018-08-06 13:29:41', 1),
(7, 'efemale', 'CalOutForumHaving a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support networkHaving a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support networkHaving a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support networkHaving a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support networkHaving a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network', '2018-08-25 19:04:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_reply`
--

CREATE TABLE `forum_reply` (
  `id` int(11) NOT NULL,
  `fid` int(3) DEFAULT NULL,
  `user` varchar(50) DEFAULT NULL,
  `reply` text,
  `dated` datetime DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_reply`
--

INSERT INTO `forum_reply` (`id`, `fid`, `user`, `reply`, `dated`, `status`) VALUES
(1, 3, 'joanian', 'Just because I love you, doesn\'t warrant nonsense; and all because I care don\'t guaranty that I can\'t still move ON...\n I love YOU doesn\'t mean I\'m a Fool... But I only believe in GOD and Love, and because of God I chose to Love YOU  alone... I desired not to go angry by NOT calling you But using God shield to Protect You...\n\nBut I understand and still LOVE you.... IFUNANYA', '2018-08-07 21:08:35', 1),
(2, 2, 'joanian', 'Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network  Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network  Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network can really help you Having a good support network ', '2018-08-07 21:43:56', 1),
(3, 3, 'efemale', 'WHDYUDWYUDW WHUBWUDYWUDYW DGBWUYWHD WDUYHJ WNDW8DGYUN ', '2018-08-25 19:05:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loginrec`
--

CREATE TABLE `loginrec` (
  `id` int(11) NOT NULL,
  `user` varchar(50) DEFAULT NULL,
  `attempttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(1) DEFAULT NULL,
  `sessid` varchar(40) DEFAULT NULL,
  `logintime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `failed` int(11) NOT NULL,
  `logouttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginrec`
--

INSERT INTO `loginrec` (`id`, `user`, `attempttime`, `status`, `sessid`, `logintime`, `failed`, `logouttime`) VALUES
(1, 'drswitch', '2018-07-20 08:42:46', 1, 'apbkl5gas1j4dbte5bit8fbl76', '2018-07-20 08:42:46', 0, '2018-07-20 08:42:31'),
(3, 'switch', '2018-08-05 14:32:39', 1, '95if9fhsi66o2cf8nhasq72a57', '2018-08-05 14:32:39', 0, '2018-07-13 15:22:32'),
(11, 'switcher', '2018-08-04 12:43:21', 0, '95if9fhsi66o2cf8nhasq72a57', '2018-08-03 12:12:13', 0, '2018-08-04 12:43:21'),
(15, 'joanian', '2018-08-26 12:50:17', 0, 'cqme32qdfcop85i9ilmis0gob4', '2018-08-26 12:40:30', 0, '2018-08-26 12:50:17'),
(19, 'efemale', '2018-08-26 12:34:14', 0, 'cqme32qdfcop85i9ilmis0gob4', '2018-08-25 17:17:32', 0, '2018-08-26 12:34:14'),
(21, 'Charity', '2018-08-25 17:25:49', 1, 'isq11kmtv09u4mjpft5hgluq07', '2018-08-25 17:25:49', 0, '2018-08-25 17:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `acex` text,
  `dname` varchar(30) DEFAULT NULL,
  `sex` int(1) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `amt` varchar(10) DEFAULT NULL,
  `rate` int(1) DEFAULT NULL,
  `goal` int(1) DEFAULT NULL,
  `img` text,
  `nob` varchar(15) NOT NULL COMMENT 'No of Drink',
  `dated` datetime DEFAULT NULL,
  `stage` int(1) NOT NULL DEFAULT '0',
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `name`, `email`, `acex`, `dname`, `sex`, `dob`, `amt`, `rate`, `goal`, `img`, `nob`, `dated`, `stage`, `status`) VALUES
(1, 'Timmy Jush Imoleayo', 'jushcare@gmail.com', '$2y$10$WvoZFHlcyrgKUBC0TH2UKOi0RGbSvrDgL.Nc8KHRxonugs3i1zXja', 'drswitch', 1, '1999-12-11', '200', 1, 1, 'http://localhost/charity/img/avatar/DrSwitch26694.png', '', '2018-07-10 20:34:58', 1, 1),
(2, 'Titus', 'info@mail.com', '$2y$10$Th7Gre/.U2fo.mDUU6VQcOj5iEMVnbQcqvA4uMYDyaXM3CwpwwYfi', 'switcher', 1, '2018-05-15', '300', 1, 1, 'http://localhost/charity/img/avatar/switcher23956.jpg', '', '2018-07-22 18:27:00', 1, 1),
(3, 'Jacob Joan', 'joanian@webmail.com', '$2y$10$1cBrs702WODvaxutm5ylUOVP1cRR1utjelQb1JVJwMTTtDmMkqlKO', 'joanian', 1, '2010-02-23', '300', 1, 2, 'http://localhost/charity/img/avatar/m.png', '10', '2018-08-04 15:48:28', 0, 1),
(4, 'wertyui uywdyue', 'kk@kk.com', '$2y$10$pA7sknw1SWU03hudkXNeVeYqWy/Bf19vIuIHdmDHkCy1PnlFXZG4u', 'efemale', 2, '2000-11-11', '300', 1, 2, 'http://localhost/charity/img/avatar/f.png', '3', '2018-08-25 17:55:45', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `adby` varchar(30) DEFAULT NULL,
  `cat` int(1) NOT NULL,
  `content` text,
  `dated` datetime DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `adby`, `cat`, `content`, `dated`, `status`) VALUES
(1, 'switch', 1, '<b>Money :</b> I often find that when I go out drinking I wake up to find that I have spent all of my money.', '2018-07-29 21:59:51', 2),
(2, 'switch', 1, '<b>Foggy Memory :</b> I often find that when I wake up in the morning after drinking I am hung over and have a foggy memory of the night before.', '2018-07-29 22:05:59', 2),
(3, 'switch', 1, '<b>Work :</b> I find that drinking is affecting my performance at work.', '2018-07-29 22:05:59', 1),
(4, 'switch', 1, '&lt;b&gt;Can\'t Stop :&lt;/b&gt; I find that once I start drinking I get on a roll and have a hard time stopping at one or two...', '2018-07-29 22:15:32', 2),
(5, 'switch', 1, '&lt;b&gt;Friends and Family :&lt;/b&gt; Within the past three months, some of my friends and family have spoken to me about my drinking.', '2018-07-29 22:17:25', 1),
(6, 'switch', 1, '&lt;b&gt;Withdrawal Symptoms :&lt;/b&gt; When I quit drinking for a few days I experience withdrawal symptoms.', '2018-07-29 22:19:12', 1),
(7, 'switch', 1, '&lt;b&gt;My Social Life :&lt;/b&gt; I find that people begin to stray away from me after I\'ve been drinking for a while', '2018-07-29 22:19:55', 1),
(8, 'switch', 1, '&lt;b&gt;The Law :&lt;/b&gt; I\'ve had a few issues with the law because I\'ve been drunk', '2018-07-29 22:20:28', 1),
(9, 'switch', 1, '&lt;b&gt;Risky Behavior :&lt;/b&gt; I\'ve acted stupid, or have taken unnecessary chances while I was drinking', '2018-07-29 22:20:55', 1),
(10, 'switch', 1, '&lt;b&gt;My Health:&lt;/b&gt; I\'ve noticed that drinking has affected my health (I\'ve fallen down while drinking, had accidents, have been worried about my liver, etc).', '2018-07-29 22:21:28', 1),
(11, 'switch', 1, '&lt;b&gt;Guilt :&lt;/b&gt; I often have a feeling of guilt or remorse after drinking.', '2018-07-29 22:22:00', 0),
(12, 'switch', 2, 'Get rid of (or give away) any open or closed bottles of alcohol in the home', '2018-08-03 13:41:49', 1),
(13, 'switch', 2, 'Substitute alcoholic drinks with something non-alcoholic', '2018-08-03 13:41:59', 1),
(14, 'switch', 2, 'Stay out of bars and restaurants â€“ at least for a little while', '2018-08-03 13:42:09', 1),
(15, 'switch', 2, 'Avoid heavy drinkers', '2018-08-03 13:42:17', 1),
(16, 'switch', 2, 'Make a commitment to not buy alcohol â€“ even if itâ€™s a gift for a family member, a celebration or a friend', '2018-08-03 13:42:27', 1),
(17, 'switch', 2, 'Start warming up to your Support Network', '2018-08-03 13:42:37', 1),
(18, 'switch', 2, 'Even if you plan on not drinking, avoid going &quot;out for drinks&quot; with coworkers or after sporting events', '2018-08-03 13:42:46', 1),
(19, 'switch', 2, 'Throw away or get rid of everything in your home that reminds you of drinking: beer bottle openers, highball glasses, corkscrews etc', '2018-08-03 13:42:56', 1),
(20, 'switch', 2, 'Make a list of people or places that you should avoid', '2018-08-03 13:43:04', 1),
(21, 'switch', 2, 'Practice saying &quot;No thanks&quot;', '2018-08-03 13:43:13', 1),
(22, 'switch', 2, 'Remind yourself of your public pledge', '2018-08-03 13:43:22', 1),
(23, 'switch', 3, '&lt;b&gt;Have a drink spacer:&lt;/b&gt; Have a full glass of water after every drink.', '2018-08-03 13:44:17', 1),
(24, 'switch', 3, '&lt;b&gt;Set a strict budget:&lt;/b&gt; If you go out to a bar, only bring a set amount of money with you (remember cab fare). Leave your bank card and credit cards at home.', '2018-08-03 13:44:35', 1),
(25, 'switch', 3, '&lt;b&gt;Eat something:&lt;/b&gt; Eat something before you start drinking, and have some snacks.', '2018-08-03 13:44:54', 1),
(26, 'switch', 3, '&lt;b&gt;Find a buddy:&lt;/b&gt; If you find that you\'re having a tough time cutting the evening short, call a buddy or friend. Let them know that you might be calling.', '2018-08-03 13:45:17', 1),
(27, 'switch', 3, '&lt;b&gt;Set limits at events:&lt;/b&gt; Decide, before an event, how many drinks that you\'re going to allow yourself to have. Don\'t go over your limit.', '2018-08-03 13:45:36', 1),
(28, 'switch', 3, '&lt;b&gt;Use substitutes:&lt;/b&gt; Have a glass of mineral or soda water after every drink. This will slow you down, help you with hydration, and cause you to drink less.', '2018-08-03 13:46:01', 1),
(29, 'switch', 3, '&lt;b&gt;Pick a time to go home:&lt;/b&gt; Before you leave the house, set your watch alarm or pick a time that you\'re going to stop drinking and head home.', '2018-08-03 13:46:22', 1),
(30, 'switch', 3, '&lt;b&gt;People:&lt;/b&gt; There may be some heavy drinkers that influence how much you drink. Resolve not to hang around them while they\'re drinking.', '2018-08-03 13:46:45', 1),
(31, 'switch', 3, '&lt;b&gt;Drink slowly:&lt;/b&gt; Savor and enjoy the taste of an alcoholic drink by taking small sips instead of drinking quickly.', '2018-08-03 13:47:04', 1),
(32, 'switch', 3, '&lt;b&gt;Places:&lt;/b&gt; There may be some bars, friend\'s houses or other locations (tailgate parties, cottages or summer houses) where you often find yourself drinking too much. Decide to stay away from these places.', '2018-08-03 13:47:21', 1),
(33, 'switch', 3, '&lt;b&gt;Set a weekly limit:&lt;/b&gt; Set a limit on the total number of drinks you\'ll have per week and do not go past your limit. Use your diary to track the number (and type) of drinks you have every week.', '2018-08-03 13:47:48', 1),
(34, 'switch', 3, '&lt;b&gt;Set a daily limit:&lt;/b&gt; Set a limit on the total number of drinks you\'ll have per day and do not go past your limit. Use your tracker to track the number (and type) of drinks you have per day.', '2018-08-03 13:48:06', 1),
(35, 'switch', 2, 'Stop drinking and make a good saving of your money', '2018-08-04 13:25:41', 1),
(36, 'switch', 4, '<b>Use Self-Talk:</b> Ask yourself \"Do I feel better about myself if I reach my goals?\" or \"If I dont drink, will anything bad happen?\" or perhaps \"If I do drink, what do I have to gain?\"', '2018-08-05 15:30:56', 1),
(37, 'switch', 4, '&lt;b&gt;Log Back In:&lt;/b&gt; Come back to this program on a daily basis and revisit the exercises you\'ve already completed â€“ or do them over again. It\'s anonymous and no one but you will know.', '2018-08-05 15:33:15', 1),
(38, 'switch', 4, '&lt;b&gt;Eat something:&lt;/b&gt; Eat something before you start drinking, and have some snacks.', '2018-08-05 15:33:39', 1),
(39, 'switch', 4, '&lt;b&gt;Use Your Support Team:&lt;/b&gt; If you\'re feeling pressure lean on a friend or family member. If it\'s late at night and you need someone to talk to. Log in to our anonymous Support Group and see if there\'s anyone you can talk to, or read the posts of others who have experienced the same feelings and frustrations.', '2018-08-05 15:34:07', 1),
(40, 'switch', 4, '&lt;b&gt;Avoid:&lt;/b&gt; For the first few weeks do not hang around people who drink, or drink excessively. Don\'t let your guard down.', '2018-08-05 15:34:28', 1),
(41, 'switch', 4, '&lt;b&gt;Practice:&lt;/b&gt; Imagine scenarios that you\'ll eventually be placed in and practice saying: &quot;No thanks&quot;. Visualize both how you\'ll say &quot;No thanks&quot; and imagine how confident you\'ll feel afterwards.', '2018-08-05 15:34:46', 1),
(42, 'switch', 4, '&lt;b&gt;Make a Public Pledge:&lt;/b&gt; Make a Public Pledge that supports your goal and frequently remind yourself of the reasons why youâ€™re cutting down or quitting.', '2018-08-05 15:35:13', 1),
(43, 'switch', 4, '&lt;b&gt;Help Others:&lt;/b&gt; Log into the online Support Group and give some encouragement to others who are just starting out. You might be surprised to realize how much helping others helps you.', '2018-08-05 15:35:45', 1),
(44, 'switch', 4, '&lt;b&gt;Remember your Triggers:&lt;/b&gt; Remind yourself of your trigger situations and avoid them at all costs. Plan your day ahead of time so you can stay away from them.', '2018-08-05 15:36:04', 1),
(45, 'switch', 4, '&lt;b&gt;Talk to your Doctor:&lt;/b&gt; Consider a visit with your doctor to see if he or she can recommend any other strategies or medications that might help you get past the first few weeks.', '2018-08-05 15:36:24', 1),
(46, 'switch', 5, 'Having a great time with others who are drinking and wanting to share the experience', '2018-08-06 20:28:43', 1),
(47, 'switch', 5, 'Missing the feeling of being drunk or &quot;high&quot;', '2018-08-06 20:29:07', 1),
(48, 'switch', 5, 'Having withdrawal symptoms (physical pain from not drinking)', '2018-08-06 20:29:20', 1),
(49, 'switch', 5, 'Seeing alcohol on grocery or corner store shelves or in the freezer', '2018-08-06 23:13:49', 1),
(50, 'switch', 5, 'Walking past a bar or restaurant where I used to drink', '2018-08-06 23:14:07', 1),
(51, 'switch', 5, 'Stressful situations', '2018-08-06 23:14:16', 1),
(52, 'switch', 5, 'Feeling like &quot;I can have just one drink&quot; or &quot;just one more drink&quot;', '2018-08-06 23:14:27', 1),
(53, 'switch', 5, 'Experiencing a strong craving to drink', '2018-08-06 23:14:37', 1),
(54, 'switch', 5, 'A specific time of the day when you used to pour yourself a drink', '2018-08-06 23:14:46', 1),
(55, 'switch', 5, 'Being around family members who drink', '2018-08-06 23:15:51', 1),
(56, 'switch', 5, 'Feeling great, and wanting a drink because it\'ll make me feel even better or more social', '2018-08-06 23:16:02', 1),
(57, 'switch', 5, 'Hanging out with friends I used to drink with', '2018-08-06 23:16:13', 1),
(58, 'switch', 5, 'Weekends', '2018-08-06 23:16:39', 1),
(59, 'switch', 5, 'Being bored or having nothing to do', '2018-08-06 23:47:04', 1),
(60, 'switch', 5, 'Watching sports', '2018-08-06 23:47:13', 1),
(61, 'switch', 5, 'Feeling stressed out', '2018-08-06 23:47:21', 1),
(62, 'switch', 5, 'Someone offering you a drink and having a hard time saying &quot;No thanks&quot;', '2018-08-06 23:47:34', 1),
(63, 'switch', 6, 'Drink non-alcoholic beverages (e.g., water, soda, pop, juice, coffee, tea).', '2018-08-07 00:15:07', 1),
(64, 'switch', 6, 'Eat some food or distract yourself with some snacks.', '2018-08-07 00:15:18', 1),
(65, 'switch', 6, ' Engage in other activities (e.g. walk, sports, hobby, go to the gym, clean the house).', '2018-08-07 00:15:37', 1),
(66, 'switch', 6, 'Get in touch with friends or family who will help you get over the urge.', '2018-08-07 00:15:45', 1),
(67, 'switch', 6, 'Think about how much money youâ€™ll save by not drinking. \r\nMake sure you use the money you save to buy something nice for yourself.', '2018-08-07 00:15:57', 1),
(68, 'switch', 6, 'Try to distract yourself from thinking about your desire to drink.', '2018-08-07 00:16:07', 1),
(69, 'switch', 6, 'Think about your Costs and Benefits exercise and focus on your benefits.', '2018-08-07 00:16:16', 1),
(70, 'switch', 6, 'Give yourself 15 minutes. Reassure yourself that the thoughts and desires will go away on their own.', '2018-08-07 00:16:32', 1),
(71, 'switch', 6, 'Leave the place or situation when you get the urge.', '2018-08-07 00:16:42', 1),
(72, 'switch', 6, 'Try to identify whatâ€™s causing your desire to have drink.', '2018-08-07 00:16:55', 1),
(73, 'switch', 6, 'Review what youâ€™ve learned from this program.', '2018-08-07 00:17:04', 1),
(74, 'switch', 6, 'Log onto our Support Group or feedback to get or give advice.', '2018-08-07 00:17:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setgoal`
--

CREATE TABLE `setgoal` (
  `id` int(11) NOT NULL,
  `cont` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `dated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setgoal`
--

INSERT INTO `setgoal` (`id`, `cont`, `user`, `dated`) VALUES
(1, 'Because you\'re now part of a &lt;b&gt; community of like-minded people who are struggling&lt;/b&gt; to control their use of alcohol, your goal can help inspire others who are considering taking the brave steps that you have. Take a few moments now to review some of the goals that other program members have made. It\'s important to remember that everyone\'s goals are different, and that everyone moves at their own pace. It\'s especially important to reach out and help others if they experience a slip.Because you\'re now part of a community of like-minded people who are struggling to control their use of alcohol, your goal can help inspire others who are&lt;br/&gt; considering taking the brave steps that you have. Take a few moments now to review some of the goals that other program members have made. It\'s important to remember that everyone\'s goals are different, and that everyone moves at their own pace. It\'s especially important to reach out and help others if they experience a \r\n&lt;br/&gt;slip.Because you\'re now part of a community of like-minded people who are struggling to control their use of alcohol, your goal can help inspire others who are considering taking the brave steps that you have. Take a few moments now to review some of the goals that other program members have made. It\'s important to &lt;br/&gt;remember that everyone\'s goals are different, and that everyone moves at their own pace. It\'s especially important to reach out and help others if they experience a slip.', 'switcher', '2018-08-04 13:11:10'),
(3, 'Because you\'re now part of a community of like-minded people who are struggling to control their use of alcohol, your goal can help inspire others who are considering taking the brave steps that you have. Take a few moments now to review some of the goals that other program members have made. It\'s important to remember that everyone\'s goals are different, and that everyone moves at their own pace. It\'s especially important to reach out and help others if they experience a slip.Because you\'re now part of a community of like-minded people who are struggling to control their use of alcohol, your goal can help inspire others who are', 'joanian', '2018-08-05 00:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `category`, `status`) VALUES
(1, 'drink-too-much', 1),
(2, 'cutting-back', 1),
(3, 'changing-the-rule', 1),
(4, 'first-two-weeks', 1),
(5, 'triggers', 1),
(6, 'dealings-with-desires', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tradrink`
--

CREATE TABLE `tradrink` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `vol` int(3) NOT NULL,
  `per` int(3) NOT NULL,
  `bottles` int(3) NOT NULL,
  `amt` int(5) NOT NULL,
  `tamt` varchar(100) NOT NULL,
  `dated` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tradrink`
--

INSERT INTO `tradrink` (`id`, `user`, `dob`, `brand`, `vol`, `per`, `bottles`, `amt`, `tamt`, `dated`, `status`) VALUES
(1, 'switcher', '2018-08-01', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:38', 1),
(2, 'switcher', '2018-08-02', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:41', 1),
(3, 'switcher', '2018-08-03', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:44', 1),
(4, 'switcher', '2018-08-04', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:46', 1),
(5, 'switcher', '2018-08-05', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:49', 1),
(6, 'switcher', '2018-08-06', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:51', 1),
(7, 'switcher', '2018-08-07', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:53', 1),
(8, 'switcher', '2018-08-08', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:56', 1),
(9, 'switcher', '2018-08-09', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:38:58', 1),
(10, 'switcher', '2018-08-10', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:01', 1),
(11, 'switcher', '2018-08-11', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:03', 1),
(12, 'switcher', '2018-08-12', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:05', 1),
(13, 'switcher', '2018-08-13', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:07', 1),
(14, 'switcher', '2018-08-14', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:10', 1),
(15, 'switcher', '2018-08-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:12', 1),
(16, 'switcher', '2018-08-16', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:15', 1),
(17, 'switcher', '2018-08-17', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:17', 1),
(18, 'switcher', '2018-08-18', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:19', 1),
(19, 'switcher', '2018-08-19', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:21', 1),
(20, 'switcher', '2018-08-20', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:24', 1),
(21, 'switcher', '2018-08-21', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:26', 1),
(22, 'switcher', '2018-08-22', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:28', 1),
(23, 'switcher', '2018-08-23', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:31', 1),
(24, 'switcher', '2018-08-24', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:33', 1),
(25, 'switcher', '2018-08-25', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:35', 1),
(26, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:38', 1),
(27, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:39:40', 1),
(28, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:01', 1),
(29, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:04', 1),
(30, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:07', 1),
(31, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:09', 1),
(32, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:11', 1),
(33, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:14', 1),
(34, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:16', 1),
(35, 'switcher', '2018-09-15', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:18', 1),
(36, 'drswitch', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:21', 1),
(37, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:23', 1),
(38, 'drswitch', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:25', 1),
(39, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:28', 1),
(40, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:30', 1),
(41, 'drswitch', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:32', 1),
(42, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:35', 1),
(43, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:37', 1),
(44, 'drswitch', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:39', 1),
(45, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:42', 1),
(46, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:44', 1),
(47, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:46', 1),
(48, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:49', 1),
(49, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:51', 1),
(50, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:53', 1),
(51, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:56', 1),
(52, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:40:58', 1),
(53, 'switcher', '2018-09-30', 'Legend', 28, 14, 6, 700, '', '2018-08-02 22:41:00', 1),
(54, 'switcher', '2018-09-26', 'Hero', 18, 17, 2, 400, '', '2018-08-03 13:38:47', 1),
(55, 'switcher', '2018-10-10', 'Heniken', 17, 3, 3, 400, '', '2018-08-04 13:05:08', 1),
(56, 'joanian', '2018-08-01', 'Gulder', 25, 60, 15, 800, '', '2018-08-05 01:12:16', 1),
(57, 'joanian', '2018-08-02', 'B-Shout', 30, 50, 10, 600, '', '2018-08-05 02:09:38', 1),
(58, 'joanian', '2018-08-03', 'Gulder', 28, 25, 35, 300, '', '2018-08-05 02:10:10', 1),
(59, 'efemale', '2018-08-25', 'Gulder', 26, 14, 11, 600, '6600', '2018-08-25 19:11:08', 1),
(60, 'efemale', '2018-08-26', 'Star', 50, 49, 15, 900, '13500', '2018-08-25 19:12:28', 1),
(61, 'joanian', '2018-08-26', 'Gulder', 21, 5, 10, 600, '6000', '2018-08-26 13:46:35', 1),
(62, 'joanian', '2018-08-26', 'Star', 19, 3, 4, 1000, '4000', '2018-08-26 13:47:57', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bacalculator`
--
ALTER TABLE `bacalculator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_reply`
--
ALTER TABLE `feedback_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum_reply`
--
ALTER TABLE `forum_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginrec`
--
ALTER TABLE `loginrec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `user_2` (`user`),
  ADD UNIQUE KEY `user_3` (`user`),
  ADD UNIQUE KEY `user_4` (`user`),
  ADD UNIQUE KEY `user_5` (`user`),
  ADD UNIQUE KEY `user_6` (`user`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setgoal`
--
ALTER TABLE `setgoal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tradrink`
--
ALTER TABLE `tradrink`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `bacalculator`
--
ALTER TABLE `bacalculator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `feedback_reply`
--
ALTER TABLE `feedback_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `forum_reply`
--
ALTER TABLE `forum_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `loginrec`
--
ALTER TABLE `loginrec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `setgoal`
--
ALTER TABLE `setgoal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tradrink`
--
ALTER TABLE `tradrink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
