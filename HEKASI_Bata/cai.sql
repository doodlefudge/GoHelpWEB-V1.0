-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2015 at 01:33 AM
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
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `PROFILEID` (`profile_id`),
  UNIQUE KEY `USERNAME` (`username`),
  KEY `USERS_USERGROUPID_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `profile_id`, `role_id`, `username`, `password`) VALUES
(1, 1, 1, 'admin', 'admin'),
(2, 2, 2, 'teacher1', 'teacher1'),
(3, 3, 2, 'teacher2', 'teacher2'),
(4, 4, 2, 'teacher3', 'teacher3'),
(5, 6, 3, 'q', 'q'),
(6, 7, 2, 'a', 'a'),
(7, 8, 3, 'tristan', 'tristan');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `profile_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profile_id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `gender`, `address`, `contact_no`, `email`) VALUES
(1, 'admin', 'admin', 'admin', '1992-01-15', 'Female', 'Bulacan City', '09271378298', 'admin@yahoo.com'),
(2, 'teacher1', 'teacher1', 'teacher1', '1992-01-15', 'Female', 'Bulacan City', '09271378298', 'teacher1@yahoo.com'),
(3, 'teacher2', 'teacher2', 'teacher2', '1992-01-15', 'Female', 'Bulacan City', '09271378298', 'teacher2@yahoo.com'),
(4, 'teacher3', 'teacher3', 'teacher3', '1992-01-15', 'Female', 'Bulacan City', '09271378298', 'teacher3@yahoo.com'),
(6, 'q', 'q', 'q', '0000-00-00', 'Male', 'q', 'q', 'q@q.q'),
(7, 'a', 'a', 'a', '0000-00-00', 'Male', 'a', 'a', 'a@a.a'),
(8, 'Tristan', 'Nunag', 'Baluyut', '0000-00-00', 'Male', 'Tarlac City', '123456789', 'b@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `name` varchar(20) NOT NULL,
  `access_code` varchar(20) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  PRIMARY KEY (`section_id`),
  UNIQUE KEY `access_code` (`access_code`),
  UNIQUE KEY `access_code_2` (`access_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `name`, `access_code`, `teacher_id`) VALUES
(1, 'section a', '12345', 1),
(2, 'section b', '23456', 2),
(3, 'section c', '34567', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `profile_id`, `section_id`) VALUES
(3, 6, 1),
(4, 8, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `profile_id`) VALUES
(1, 2),
(2, 3),
(3, 4),
(4, 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
