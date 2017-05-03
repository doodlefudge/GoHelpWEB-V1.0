/*
MySQL Data Transfer
Source Host: localhost
Source Database: cs
Target Host: localhost
Target Database: cs
Date: 10/21/2008 3:06:29 PM
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for shop
-- ----------------------------
DROP TABLE IF EXISTS `shop`;
CREATE TABLE `shop` (
  `id` int(11) NOT NULL auto_increment,
  `itemid` int(11) NOT NULL,
  `name` text NOT NULL,
  `info` text NOT NULL,
  `count` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `category` text NOT NULL,
  `format` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `shop` VALUES ('1', '21004', 'Baby Hot Doggy', 'Cute baby doggy that follows its owner around and picks up dropped items.', '1', '1000', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('2', '21005', 'Baby Kitty', 'Cute baby kitty that follows its owner around and picks up dropped items.', '1', '6', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('3', '21026', 'Baby Pinguin', 'Cute baby pinguin that follows its owner around and picks up dropped items.', '1', '23', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('4', '21063', 'Baby Tiger', 'Cute baby tiger that follows its owner around and picks up dropped items.', '1', '9', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('5', '21052', 'Baby Turtle', 'Cute baby turtle that follows its owner around and picks up dropped items.', '1', '84', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('6', '21054', 'Baby Cow', 'Cute baby cow that follows its owner around and picks up dropped items.', '1', '64', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('7', '21055', 'Baby Beagle', 'Cute baby beagle that follows its owner around and picks up dropped items.', '1', '1', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('8', '21057', 'Baby Hamster', 'Cute baby hamster that follows its owner around and picks up dropped items.', '1', '2', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('9', '21060', 'Baby Pig', 'Cute baby pig that follows its owner around and picks up dropped items.', '1', '5', '1', '1', '.gif');
INSERT INTO `shop` VALUES ('10', '21061', 'Baby Rabbit', 'Cute baby bunny rabbit that follows its owner around and picks up dropped items. Hippity hop.', '1', '52', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('11', '21062', 'Baby Lamb', 'Cute baby lamb that follows its owner around and picks up dropped items.', '1', '1', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('12', '21028', 'Baby Cobra', 'Cute baby cobra that follows its owner around and picks up dropped items.', '1', '1', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('13', '21027', 'Baby Iguana', 'Cute baby iguana that follows its owner around and picks up dropped items.', '1', '19', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('14', '21050', 'Baby Frog', 'Cute baby frog that follows its owner around and picks up dropped items.', '1', '5', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('15', '21053', 'Baby Chicken', 'Cute baby chicken that follows its owner around and picks up dropped items.', '1', '1', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('16', '21056', 'Baby Dragon', 'Cute baby dragon that follows its owner around and picks up dropped items.', '1', '12', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('17', '21058', 'Baby Horse', 'Cute baby horse that follows its owner around and picks up dropped items.', '1', '6', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('18', '21059', 'Baby Monkey', 'Cute baby monkey that follows its owner around and picks up dropped items.', '1', '1', '2', '1', '.gif');
INSERT INTO `shop` VALUES ('19', '21065', 'Baby Mia', 'Cute baby mia that follows its owner around and picks up dropped items.', '1', '22', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('20', '21064', 'Baby Maid', 'Cute baby maid that follows its owner around and picks up dropped items.', '1', '17', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('21', '21000', 'Baby Lawolf', 'Cute baby lawolf that follows its owner around and picks up dropped items.', '1', '1', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('22', '21001', 'Baby Aibatt', 'Cute baby aibatt that follows its owner around and picks up dropped items.', '1', '1', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('23', '21002', 'Baby Leyena', 'Cute baby leyena that follows its owner around and picks up dropped items.', '1', '23', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('24', '21006', 'Baby Angel', 'Cute baby angel that follows its owner around and picks up dropped items.', '1', '1', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('25', '21007', 'Baby Cola', 'Cute baby cola that follows its owner around and picks up dropped items.', '1', '6', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('26', '1', 'none', 'none', '0', '0', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('27', '1', 'none', 'none', '0', '0', '3', '1', '.gif');
INSERT INTO `shop` VALUES ('28', '26391', 'Serif Hair Brown (F)', 'Brown hair with curves at the bottom that finish off the main stroke lines. Elegant, modern, and sensible. For females.', '1', '34', '1', '2', '.gif');
INSERT INTO `shop` VALUES ('29', '30148', 'Amplification ES (S)', 'For all levels When you purchase this package you will receive 1x Scroll of Acquisition! Use 1: Exp. Point x 1.5 for 1 hour. Stacks up to 3 times for Exp. Point x 2.5 for 1 hour. NOTE: Exp. Points gained from quests are excluded.', '20', '200', '0', '0', 'MAIN PAGE');
INSERT INTO `shop` VALUES ('32', '26390', 'Serif Hair Blue (F)', 'Blue hair with curves at the bottom that finish off the main stroke lines. Elegant, modern, and sensible. For females.', '1', '23', '1', '2', '.gif');
