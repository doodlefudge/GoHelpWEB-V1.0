-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2016 at 09:58 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opencode_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_trail`
--

CREATE TABLE `tbl_audit_trail` (
  `audit_id` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `audit_date` varchar(100) NOT NULL,
  `audit_info` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_category`
--

CREATE TABLE `tbl_service_category` (
  `serv_cat_id` varchar(10) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_details` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_category`
--

INSERT INTO `tbl_service_category` (`serv_cat_id`, `category_name`, `category_details`) VALUES
('2', 'Cleaning Services', 'General Cleaning services'),
('3', 'Fixing', 'Pogi si Kevin'),
('4', 'Power Cleaning', 'Pogi ako');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_confirmation`
--

CREATE TABLE `tbl_service_confirmation` (
  `serv_conf_id` varchar(10) NOT NULL,
  `request_id` varchar(10) NOT NULL,
  `quot_price` varchar(100) NOT NULL,
  `worker_id` varchar(100) NOT NULL,
  `serv_conf_status` varchar(10) NOT NULL,
  `worker_conf_status` varchar(10) NOT NULL,
  `summary` varchar(100) NOT NULL,
  `time_of_confirmation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_confirmation`
--

INSERT INTO `tbl_service_confirmation` (`serv_conf_id`, `request_id`, `quot_price`, `worker_id`, `serv_conf_status`, `worker_conf_status`, `summary`, `time_of_confirmation`) VALUES
('CONF20161', 'REQ20161', '500', 'USER201609241', '2', '2', '', '2016-10-10 07:52:27'),
('CONF201610', 'REQ201611', '300', 'USER201609241', '2', '2', '', '2016-10-14 13:49:04'),
('CONF201611', 'REQ201612', '230', 'USER201609202', '-1', '-1', 'Test1', '2016-10-10 07:45:47'),
('CONF201612', 'REQ201613', '250', 'USER201609241', '3', '1', 'For Cleaning', '2016-10-10 08:37:32'),
('CONF201613', 'REQ20165', '250', 'USER201609241', '0', '1', 'Worker needs to be in attire', '2016-10-14 13:49:54'),
('CONF201614', 'REQ201617', '230', 'USER201609202', '2', '1', '', '2016-10-15 13:44:17'),
('CONF201615', 'REQ201616', '250', 'USER201610092', '0', '0', '', '2016-10-15 16:29:23'),
('CONF201616', 'REQ201614', '1000', 'USER201609202', '1', '1', '', '2016-10-15 13:51:56'),
('CONF201617', 'REQ201618', '500', 'USER201609202', '0', '0', '', '2016-10-15 08:46:35'),
('CONF201618', 'REQ201620', '500', 'USER201610152', '2', '1', '', '2016-10-15 15:22:44'),
('CONF201619', 'REQ201621', '500', 'USER201610152', '2', '1', '', '2016-10-15 15:55:01'),
('CONF20162', 'REQ20163', '300', 'USER201609202', '0', '2', 'Panget', '2016-10-11 04:22:54'),
('CONF20163', 'REQ20164', '300', 'USER201609202', '3', '0', '', '2016-10-11 04:19:09'),
('CONF20164', 'REQ20166', '230', 'USER201609202', '2', '2', 'Work done in 1 day', '2016-10-09 07:57:29'),
('CONF20165', 'REQ20167', '250', 'USER201609241', '-1', '-1', 'Task', '2016-10-09 07:50:51'),
('CONF20166', 'REQ20162', '300', 'USER201609202', '-1', '-1', '', '2016-10-09 07:53:47'),
('CONF20167', 'REQ20168', '340', 'USER201609241', '3', '1', 'Test', '2016-10-14 13:59:15'),
('CONF20168', 'REQ20169', '500', 'USER201609241', '3', '1', 'e', '2016-10-14 13:59:43'),
('CONF20169', 'REQ201610', '1000', 'USER201609241', '1', '-1', '', '2016-10-09 08:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_detail`
--

CREATE TABLE `tbl_service_detail` (
  `serv_detail_id` varchar(200) NOT NULL,
  `serv_cat_id` varchar(10) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `service_info` varchar(255) NOT NULL,
  `service_price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_detail`
--

INSERT INTO `tbl_service_detail` (`serv_detail_id`, `serv_cat_id`, `service_name`, `service_info`, `service_price`) VALUES
('SERV1', '2', 'Plumbing', 'Who needs a plumber when you really need it? GoHelp Will fulfill your needs!', '230'),
('SERV2', '2', 'Bathroom Care', 'Need to wipe that dirty stain from the toilet bowl but don''t got the time? Let us help you!', '250'),
('SERV3', '3', 'Leather Repair', 'Leatherware Repair', '250'),
('SERV4', '3', 'Aircon Service and repair', 'Freon changing, cleaning and other service', '500'),
('SERV5', '2', 'Pool Cleaning', 'Poole', '340'),
('SERV6', '3', 'Digging', 'Hukay Lupa 500 per square meter', '500'),
('SERV7', '2', 'Building Cleaning', 'To Clean buildings per floor', '1000'),
('SERV8', '2', 'Barnakol Removal', 'Removes Barnakol and Bornek', '300');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_request`
--

CREATE TABLE `tbl_service_request` (
  `request_id` varchar(100) NOT NULL,
  `customer_id` varchar(100) NOT NULL,
  `serv_detail_id` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `lng` varchar(100) NOT NULL,
  `date_of_service` varchar(100) NOT NULL,
  `time_start_of_service` varchar(100) NOT NULL,
  `time_end_of_service` varchar(100) NOT NULL,
  `service_detail` varchar(100) NOT NULL,
  `service_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service_request`
--

INSERT INTO `tbl_service_request` (`request_id`, `customer_id`, `serv_detail_id`, `lat`, `lng`, `date_of_service`, `time_start_of_service`, `time_end_of_service`, `service_detail`, `service_status`) VALUES
('REQ20161', 'USER201609201', 'SERV4', '14.5595745', '121.0123891', '11/13/16', '7:00 AM', '', 'yvyg6g6', '2'),
('REQ201610', 'USER201609201', 'SERV7', '14.5595419', '121.0124325', '10/17/16', '10:00 AM', '', '7hrs', '2'),
('REQ201611', 'USER201610093', 'SERV8', '14.559555', '121.012421', '10/10/16', '7:00 AM', '', '1hr', '2'),
('REQ201612', 'USER201609201', 'SERV1', '14.5641696458571', '121.014018058777', '10/11/16', '11:00 AM', '', 'sdad', '2'),
('REQ201613', 'USER201609201', 'SERV2', '14.5645720286767', '121.011998020113', '09/11/16', '9:00 AM', '', 'For service', '2'),
('REQ201614', 'USER201610142', 'SERV7', '14.5629352346264', '121.011944375932', '10/22/16', '12:00 PM', '', 'Service Request', '2'),
('REQ201615', 'USER201610142', 'SERV8', '14.5597538', '121.0118277', '10/22/16', '12:00 PM', '', 'Worker Request', '1'),
('REQ201616', 'USER201610093', 'SERV3', '14.5800450379351', '120.992537587881', '10/24/16', '7:00 AM', '', 'Genuine leather shoes need to be altered\n', '2'),
('REQ201617', 'USER201610151', 'SERV1', '14.5402684126322', '121.012189462781', '10/18/16', '7:00 AM', '', 'naputol tubo', '2'),
('REQ201618', 'USER201610153', 'SERV6', '14.5714179406207', '121.000731401145', '10/17/16', '10:00 AM', '', '1 day', '2'),
('REQ201619', 'USER201610153', 'SERV4', '14.5716366480538', '121.000634841621', '10/28/16', '12:00 PM', '', '2hours', '1'),
('REQ20162', 'USER201609201', 'SERV8', '14.5599862', '121.012452', '10/15/16', '11:00 AM', '', 'bababa', '2'),
('REQ201620', 'USER201610153', 'SERV4', '14.5716366480538', '121.000634841621', '10/28/16', '12:00 PM', '', '2hours', '2'),
('REQ201621', 'USER201610151', 'SERV4', '14.5717119300874', '121.000568792224', '10/28/16', '12:00 PM', '', 'subok lng', '2'),
('REQ20163', 'USER201609201', 'SERV8', '14.5605540085859', '121.012139506638', '10/09/16', '12:00 PM', '', 'babab', '2'),
('REQ20164', 'USER201609201', 'SERV8', '14.5605540085859', '121.012139506638', '10/09/16', '12:00 PM', '', 'babab', '2'),
('REQ20165', 'USER201610092', 'SERV2', '14.5592981594782', '121.012238413095', '10/10/16', '9:00 AM', '', '1 day\n', '2'),
('REQ20166', 'USER201610093', 'SERV1', '14.5591839320212', '121.012478135526', '10/10/16', '9:00 AM', '', '1 day', '2'),
('REQ20167', 'USER201610093', 'SERV2', '14.5599354956811', '121.012765131891', '10/13/16', '10:00 AM', '', '1 day', '2'),
('REQ20168', 'USER201610093', 'SERV5', '14.5579608507985', '121.014453917742', '10/18/16', '10:00 AM', '', '7 hrs', '2'),
('REQ20169', 'USER201610093', 'SERV6', '14.5596580404831', '121.01225014776', '10/28/16', '12:00 PM', '', '3hrs', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skill_training`
--

CREATE TABLE `tbl_skill_training` (
  `serv_detail_id` varchar(100) NOT NULL,
  `training_days` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skill_training`
--

INSERT INTO `tbl_skill_training` (`serv_detail_id`, `training_days`) VALUES
('SERV1', 3),
('SERV2', 4),
('SERV3', 2),
('SERV4', 5),
('SERV5', 4),
('SERV6', 2),
('SERV7', 5),
('SERV8', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training_summary`
--

CREATE TABLE `tbl_training_summary` (
  `training_id` varchar(100) NOT NULL,
  `id` varchar(100) NOT NULL,
  `serv_detail_id` varchar(100) NOT NULL,
  `training_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_training_summary`
--

INSERT INTO `tbl_training_summary` (`training_id`, `id`, `serv_detail_id`, `training_status`) VALUES
('USER201609202SERV1', 'USER201609202', 'SERV1', 1),
('USER201609202SERV6', 'USER201609202', 'SERV6', 1),
('USER201609202SERV7', 'USER201609202', 'SERV7', 1),
('USER201609202SERV8', 'USER201609202', 'SERV8', 1),
('USER201609241SERV4', 'USER201609241', 'SERV4', 1),
('USER201609241SERV7', 'USER201609241', 'SERV7', 1),
('USER201609241SERV8', 'USER201609241', 'SERV8', 1),
('USER201610051SERV3', 'USER201610051', 'SERV3', 1),
('USER201610052SERV2', 'USER201610052', 'SERV2', 0),
('USER201610053SERV2', 'USER201610053', 'SERV2', 1),
('USER201610053SERV5', 'USER201610053', 'SERV5', 1),
('USER201610092SERV2', 'USER201610092', 'SERV2', 1),
('USER201610092SERV3', 'USER201610092', 'SERV3', 1),
('USER201610152SERV2', 'USER201610152', 'SERV2', 0),
('USER201610152SERV4', 'USER201610152', 'SERV4', 1),
('USER201610152SERV6', 'USER201610152', 'SERV6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trans_detail`
--

CREATE TABLE `tbl_trans_detail` (
  `trans_id` varchar(255) NOT NULL,
  `serv_conf_id` varchar(100) NOT NULL,
  `trans_amt` double NOT NULL,
  `trans_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_trans_detail`
--

INSERT INTO `tbl_trans_detail` (`trans_id`, `serv_conf_id`, `trans_amt`, `trans_date`) VALUES
('01K40589FE532120R', 'CONF20162', 500, '02/10/2016 14:30:03'),
('02T681707M251124K', 'CONF20163', 300, '02/10/2016 16:00:09'),
('0JE095463H3447322', 'CONF20161', 500, '02/10/2016 16:00:09'),
('0PT00891YL5036336', 'CONF20162', 500, '02/10/2016 06:46:27'),
('0XT51028UY675404P', 'CONF201614', 230, '15/10/2016 22:14:48'),
('11094820SC8664455', 'CONF20162', 500, '02/10/2016 15:42:13'),
('2BV77600R0769530U', 'CONF201612', 250, '10/10/2016 16:31:57'),
('2CT82404M79917812', 'CONF201619', 500, '15/10/2016 23:55:09'),
('2G109323SV5192354', 'CONF20161', 500, '06/10/2016 20:05:37'),
('2TV557296T171310A', 'CONF201618', 500, '15/10/2016 11:22:45 PM'),
('2VM04759U0709305T', 'CONF20162', 500, '02/10/2016 15:14:34'),
('2W6378174T697022H', 'CONF201610', 300, '09/10/2016 17:42:11'),
('453961606X5854538', 'CONF20161', 500, '02/10/2016 14:45:45'),
('4EB04332RR839672V', 'CONF201614', 230, '15/10/2016 21:44:16'),
('61U87832PK976173U', 'CONF20162', 500, '02/10/2016 14:54:17'),
('6M268390TF236641L', 'CONF20168', 500, '09/10/2016 16:19:16'),
('6NR5980525571054S', 'CONF20162', 500, '03/10/2016 01:50:35'),
('6RM30074P82337318', 'CONF201614', 230, '15/10/2016 21:54:51'),
('6SD0131710839303A', 'CONF20162', 500, '02/10/2016 15:45:49'),
('73G12603UG079812W', 'CONF20163', 300, '09/10/2016 3:00:05 PM'),
('7RC82294MB121674F', 'CONF20161', 500, '02/10/2016 14:26:25'),
('7WX70650V7997430D', 'CONF201614', 230, '15/10/2016 21:53:59'),
('81B323616F786574G', 'CONF20167', 340, '09/10/2016 16:09:08'),
('8EJ27357PX914421F', 'CONF20162', 500, '02/10/2016 15:06:19'),
('9AY570122T0654034', 'CONF20161', 500, '02/10/2016 15:51:05'),
('9ER24062A62986137', 'CONF20164', 230, '09/10/2016 15:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `isActive` int(1) NOT NULL,
  `account_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user`, `pass`, `isActive`, `account_type`) VALUES
('USER200001011', 'admin', 'admin', 1, 0),
('USER201609201', 'martin', 'martin', 1, 1),
('USER201609202', 'worker', 'worker', 1, 2),
('USER201609241', 'worker2', 'worker2', 1, 2),
('USER201610021', 'macky', 'macky', 1, 1),
('USER201610051', 'doodlefudge', 'martin', 1, 2),
('USER201610052', 'patrick', 'patrick', 1, 2),
('USER201610053', 'lolmartin', 'lolmartin', 1, 2),
('USER201610091', 'renz', 'renz', 1, 1),
('USER201610092', 'nanette', 'nanette', 1, 2),
('USER201610092', 'rene', 'rene', 1, 1),
('USER201610093', 'rico', 'rico', 1, 1),
('USER201610141', 'mariano', 'mariano', 1, 1),
('USER201610142', 'sklbukol0', 'sklbukol0', 1, 1),
('USER201610151', 'abby', 'abby', 1, 1),
('USER201610152', 'macdo', 'macdo', 1, 2),
('USER201610153', 'angel', 'angel', 1, 1),
('USER201610154', 'mich', 'mich', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_comments`
--

CREATE TABLE `tbl_user_comments` (
  `rating_id` int(100) NOT NULL,
  `id` varchar(255) NOT NULL,
  `serv_conf_id` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  `rating` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_comments`
--

INSERT INTO `tbl_user_comments` (`rating_id`, `id`, `serv_conf_id`, `comments`, `rating`) VALUES
(1, 'USER201609201', 'CONF201612', 'service is ok', '4'),
(2, 'USER201610093', 'CONF20167', 'Service was ok', '3'),
(3, 'USER201610093', 'CONF20168', 'Service was VERY GOO. Recommend to any other worker ', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_info`
--

CREATE TABLE `tbl_user_info` (
  `id` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `address_lot` varchar(100) NOT NULL,
  `address_street` varchar(100) NOT NULL,
  `address_brgy` varchar(100) NOT NULL,
  `address_city` varchar(100) NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `email_addr` varchar(50) NOT NULL,
  `user_lat` varchar(255) NOT NULL,
  `user_lng` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user_info`
--

INSERT INTO `tbl_user_info` (`id`, `lname`, `fname`, `mname`, `address_lot`, `address_street`, `address_brgy`, `address_city`, `contact_info`, `email_addr`, `user_lat`, `user_lng`) VALUES
('USER201609201', 'martin', 'marc', 'capito', '2722 south ave. Makati City', '', '', '', '09057765633', 'marc_martin1994@yahoo.com', '0', '0'),
('USER201609202', 'Tagalag', 'Mark', 'Panot', '1534 - C ', 'Gen. P. Santos', 'Brgy. Bangkal', ' Makati City', '09057765633', 'marc_martin1994@yahoo.com', '14.5391059', '121.011136'),
('USER201609241', 'Lloren', 'Ireneo', 'Taburdan', 'Paco, Manila', 'fart', 'bort2', 'mmort', '09092359395', 'mail@makati.sti.edu', '14.5398312', '121.0115589'),
('USER201610021', 'tagalag', 'mark', 'fortes', 'makati', '', '', '', '09468079794', 'marktagalag@makati.sti.edu', '0', '0'),
('USER201610051', 'Tantong', 'John', 'port', '1534-C', 'Gen. P. Santos', 'Bangkal', 'Makati City', '09057765633', 'marc_martin1994@yahoo.com', '0', '0'),
('USER201610052', 'Uy', 'John Patrick', 'Taburdan', '2722', 'South Ave.', 'Olympia', 'Makati City', '09057765633', 'sklbukol0@yahoo.com', '0', '0'),
('USER201610053', 'Martin', 'Marie', 'Capito', '2373', 'South Ave.', 'Olympia', 'Makati City', '09055555555', 'marc_martin1994@yahoo.com', '14.5595551', '121.0126342'),
('USER201610092', 'Comia', 'Nanette', 'Dela Cruz', '1233', 'Marino', '177', 'Bacoor City', '09057765633', 'martinmarc@makati.st.edu', '14.5595406', '121.0124365'),
('USER201610093', 'puno', 'rico ', 'tango', '100', 'adelantado', 'san lorenzo', 'makati city', '09092359395', 'llorenireneo@gmail.com', '0', '0'),
('USER201610141', 'Mariano', 'Mary Joan', 'Castro', '8 ', 'Climaco St.', 'Brgy. Bangkal', 'Makati City', '09175625372', 'marianomaryjoan@yahoo.com', '0', '0'),
('USER201610142', 'Uy', 'Patrick', 'Taburdan', '2722 ', 'South Ave.', 'Brgy. Olympia', 'Makati City', '0977 465 6563', 'sklbukol0@yahoo.com', '0', '0'),
('USER201610151', 'tulya', 'abby', 'fortes', '110', 'amorsolo', 'san lorenzo', 'makati', '09468079794', 'ireneolloren@yahoo.com', '0', '0'),
('USER201610152', 'trabolta', 'john', 'arc', '27', 'osmena hi way', 'brgy 807', 'manila', '09468079794', 'marktagalag@makati.sti.edu', '14.5398312', '121.0115589'),
('USER201610153', 'locsin', 'angel', 'cute', '29', 'osmena hi way', 'brgy 808', 'manila', '09464578953', 'llorenireneo@gmail.com', '0', '0'),
('USER201610154', 'fortes', 'michael', 'roty', '123', 'edsa', 'edsa', 'manila', '0946807979', 'micheal@yahoo.com', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_worker_attendance`
--

CREATE TABLE `tbl_worker_attendance` (
  `training_id` varchar(100) NOT NULL,
  `attendance` int(10) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_worker_attendance`
--

INSERT INTO `tbl_worker_attendance` (`training_id`, `attendance`, `date`) VALUES
('USER201609202SERV7', 1, '09/23/2016'),
('USER201609202SERV7', 1, '09/24/2016'),
('USER201609202SERV7', 1, '09/26/2016'),
('USER201609202SERV7', 1, '09/27/2016'),
('USER201609202SERV7', 1, '09/28/2016'),
('USER201609202SERV1', 1, '09/24/2016'),
('USER201609202SERV1', 1, '09/26/2016'),
('USER201609202SERV1', 1, '09/27/2016'),
('USER201609202SERV8', 1, '09/27/2016'),
('USER201609202SERV8', 1, '09/28/2016'),
('USER201609202SERV8', 1, '09/29/2016'),
('USER201609202SERV8', 1, '09/30/2016'),
('USER201609241SERV4', 1, '09/27/2016'),
('USER201609241SERV4', 1, '09/28/2016'),
('USER201609241SERV4', 1, '09/29/2016'),
('USER201609241SERV4', 1, '09/30/2016'),
('USER201609241SERV4', 1, '10/01/2016'),
('USER201609241SERV7', 1, '09/28/2016'),
('USER201609241SERV7', 1, '09/29/2016'),
('USER201609241SERV7', 1, '09/30/2016'),
('USER201609241SERV7', 1, '10/03/2016'),
('USER201609241SERV7', 1, '10/04/2016'),
('USER201610053SERV2', 1, '10/12/2016'),
('USER201610053SERV2', 1, '10/13/2016'),
('USER201610053SERV2', 1, '10/14/2016'),
('USER201610053SERV2', 1, '10/15/2016'),
('USER201610051SERV3', 1, '10/09/2016'),
('USER201610051SERV3', 1, '10/10/2016'),
('USER201609202SERV6', 1, '10/09/2016'),
('USER201609202SERV6', 1, '10/10/2016'),
('USER201609241SERV8', 1, '10/10/2016'),
('USER201609241SERV8', 1, '10/11/2016'),
('USER201609241SERV8', 1, '10/12/2016'),
('USER201609241SERV8', 1, '10/13/2016'),
('USER201610092SERV3', 1, '09/06/2016'),
('USER201610092SERV3', 1, '09/07/2016'),
('USER201610092SERV2', 1, '10/10/2016'),
('USER201610092SERV2', 1, '10/11/2016'),
('USER201610092SERV2', 1, '10/12/2016'),
('USER201610092SERV2', 1, '10/13/2016'),
('USER201610053SERV5', 1, '10/11/2016'),
('USER201610053SERV5', 1, '10/12/2016'),
('USER201610053SERV5', 1, '10/13/2016'),
('USER201610053SERV5', 1, '10/14/2016'),
('USER201610052SERV2', 0, '10/16/2016'),
('USER201610052SERV2', 0, '10/22/2016'),
('USER201610052SERV2', 0, '10/23/2016'),
('USER201610052SERV2', 0, '10/25/2016'),
('USER201610152SERV6', 1, '10/10/2016'),
('USER201610152SERV6', 1, '10/11/2016'),
('USER201610152SERV2', 0, '10/06/2016'),
('USER201610152SERV2', 0, '10/13/2016'),
('USER201610152SERV2', 0, '10/19/2016'),
('USER201610152SERV2', 0, '10/13/2016'),
('USER201610152SERV4', 1, '10/12/2016'),
('USER201610152SERV4', 1, '10/12/2016'),
('USER201610152SERV4', 1, '10/13/2016'),
('USER201610152SERV4', 1, '10/13/2016'),
('USER201610152SERV4', 1, '10/13/2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_worker_skills`
--

CREATE TABLE `tbl_worker_skills` (
  `id` varchar(100) NOT NULL,
  `skill_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_worker_skills`
--

INSERT INTO `tbl_worker_skills` (`id`, `skill_id`) VALUES
('USER201609202', 'SERV7'),
('USER201609202', 'SERV1'),
('USER201609202', 'SERV8'),
('USER201609241', 'SERV4'),
('USER201609241', 'SERV7'),
('USER201609241', 'SERV2'),
('USER201609241', 'SERV3'),
('USER201609241', 'SERV5'),
('USER201609241', 'SERV6'),
('USER201609241', 'SERV5'),
('USER201609241', 'SERV6'),
('USER201610053', 'SERV2'),
('USER201609202', 'SERV6'),
('USER201609241', 'SERV8'),
('USER201610092', 'SERV3'),
('USER201610092', 'SERV2'),
('USER201610053', 'SERV5'),
('USER201610051', 'SERV3'),
('USER201610152', 'SERV6'),
('USER201610152', 'SERV4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_service_category`
--
ALTER TABLE `tbl_service_category`
  ADD PRIMARY KEY (`serv_cat_id`);

--
-- Indexes for table `tbl_service_confirmation`
--
ALTER TABLE `tbl_service_confirmation`
  ADD PRIMARY KEY (`serv_conf_id`);

--
-- Indexes for table `tbl_service_detail`
--
ALTER TABLE `tbl_service_detail`
  ADD PRIMARY KEY (`serv_detail_id`);

--
-- Indexes for table `tbl_service_request`
--
ALTER TABLE `tbl_service_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_skill_training`
--
ALTER TABLE `tbl_skill_training`
  ADD PRIMARY KEY (`serv_detail_id`);

--
-- Indexes for table `tbl_training_summary`
--
ALTER TABLE `tbl_training_summary`
  ADD PRIMARY KEY (`training_id`,`id`,`serv_detail_id`);

--
-- Indexes for table `tbl_trans_detail`
--
ALTER TABLE `tbl_trans_detail`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`,`user`);

--
-- Indexes for table `tbl_user_comments`
--
ALTER TABLE `tbl_user_comments`
  ADD PRIMARY KEY (`rating_id`);

--
-- Indexes for table `tbl_user_info`
--
ALTER TABLE `tbl_user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user_comments`
--
ALTER TABLE `tbl_user_comments`
  MODIFY `rating_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
