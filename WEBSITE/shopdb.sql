/*
MySQL Data Transfer
Source Host: localhost
Source Database: shopdb
Target Host: localhost
Target Database: shopdb
Date: 10/11/2008 3:28:26 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items` (
  `itemid` text,
  `itemname` text,
  `itemprice` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `items` VALUES ('22358', 'Bloody Knuckle', '5000000');
