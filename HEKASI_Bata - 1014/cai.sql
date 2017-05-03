-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2015 at 11:11 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cai`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `password` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `PROFILEID` (`profile_id`),
  UNIQUE KEY `USERNAME` (`username`),
  KEY `USERS_USERGROUPID_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=7 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `profile_id`, `role_id`, `username`, `password`, `active`) VALUES
(1, 1, 1, 'admin', 'admin', 1),
(2, 2, 2, 'jervz', 'jervz', 1),
(3, 3, 3, 'student', 'student', 1),
(4, 5, 2, 'tonylazona', 'lazona', 1),
(5, 6, 3, 'joanmariano', 'joanmariano', 1),
(6, 7, 2, 'adrianagustin', 'a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_obj_tbl`
--

CREATE TABLE IF NOT EXISTS `game_obj_tbl` (
  `user_id` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `char_id` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `player_name` varchar(30) COLLATE latin1_general_cs NOT NULL,
  `player_lvl` int(3) NOT NULL,
  `game_lvl` int(2) NOT NULL,
  `unit_id` int(2) NOT NULL,
  `unit_stat` int(2) NOT NULL,
  `potion_cnt` int(5) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `game_obj_tbl`
--

INSERT INTO `game_obj_tbl` (`user_id`, `char_id`, `player_name`, `player_lvl`, `game_lvl`, `unit_id`, `unit_stat`, `potion_cnt`) VALUES
('pantera', 'char_1F', 'asdasd', 0, 0, 1, 0, 10),
('user', 'char_3M', 'User', 0, 0, 1, 0, 10),
('user1', 'char_3M', 'sunny', 0, 0, 0, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `unit_id` int(2) NOT NULL,
  `lesson_id` int(100) NOT NULL AUTO_INCREMENT,
  `lesson` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `answer` varchar(100) COLLATE latin1_general_cs NOT NULL,
  `lesson_stat_id` int(2) NOT NULL,
  PRIMARY KEY (`lesson_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=12 ;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`unit_id`, `lesson_id`, `lesson`, `answer`, `lesson_stat_id`) VALUES
(1, 1, 'm', 'asdfsadf', 1),
(2, 2, 'uawdgfuyasdgyu', 'jhfh', 0),
(1, 3, 'pangit si marj', 'nope', 0),
(1, 4, 'agdhdhsbd', 'hashshua', 0),
(4, 5, 'sino ang bayani ng pilipinas', 'Jose Rizal', 1),
(5, 6, 'Panget ba si margie', 'yes', 0),
(1, 7, 'Pambang prutas', 'mangga', 0),
(8, 8, 'GGGGG', 'NNNN', 0),
(8, 9, 'JASDH', 'DH', 0),
(10, 11, 'asdfsafa', 'adsfdasf1212', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `middle_name` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `last_name` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) COLLATE latin1_general_cs NOT NULL,
  `address` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `contact_no` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `email` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=8 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `gender`, `address`, `contact_no`, `email`) VALUES
(1, 'admin', 'admin', 'admin', '1992-01-30', 'Male', 'Bulacan City', '09271378298', 'tiraomargie@yahoo.com.ph'),
(2, 'Jervy', 'C', 'Calara', '2015-10-14', 'Male', 'Makati City', '09476441262', 'jervycalara@makati.sti.edu'),
(3, 'Mark', 'Fortes', 'Tagalag', '1992-01-13', 'Male', 'Bulacan', '7525356', 'marktagalag@yahoo.com'),
(4, 'Mark', 'Fortes', 'Tagalag', '1992-01-13', 'Male', 'Bulacan', '7525356', 'marktagalag@yahoo.com'),
(5, '  Tony', '  M', '  Lazona', '0000-00-00', 'Male', 'Makati City', '09476441262', 'tony@yahoo.com'),
(6, 'Joan', 'M', 'Mariano', '1990-09-11', 'Female', 'Tarlac City', '8888-222', 'joan@yahoo.com'),
(7, 'Adrian', 'A', 'Agustin', '0000-00-00', 'Male', 'Makati City', '0929339020', 'adrianagustin@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=4 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `name`) VALUES
(1, 'Administrator'),
(2, 'Teacher'),
(3, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE latin1_general_cs NOT NULL,
  `access_code` varchar(8) COLLATE latin1_general_cs NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`section_id`),
  UNIQUE KEY `access_code` (`access_code`),
  UNIQUE KEY `access_code_2` (`access_code`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `name_2` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=8 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `name`, `access_code`, `teacher_id`) VALUES
(1, '6A', '12345', 1),
(3, '6B', '6789', 1),
(4, '6C', '9999', 2),
(5, 'qweqwe', '0tpam7vi', 1),
(7, '6D', '4wc4ygb9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `profile_id`, `section_id`) VALUES
(1, 3, 1),
(2, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `teacher_id_2` (`teacher_id`),
  UNIQUE KEY `teacher_id_3` (`teacher_id`),
  UNIQUE KEY `profile_id` (`profile_id`),
  KEY `teacher_id` (`teacher_id`),
  KEY `profile_id_2` (`profile_id`),
  KEY `profile_id_3` (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=4 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `profile_id`) VALUES
(1, 2),
(2, 5),
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=11 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `name`) VALUES
(1, 'Unit 1'),
(2, 'Unit 2'),
(3, 'Unit 3'),
(4, 'Unit 4'),
(5, 'Unit 5'),
(6, 'Unit 6'),
(7, 'unit6'),
(8, 'unit6'),
(9, 'UNIT 7'),
(10, 'HLKASFJ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
