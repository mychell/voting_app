/*
 Navicat MySQL Data Transfer

 Source Server         : local
 Source Server Version : 50144
 Source Host           : localhost
 Source Database       : local_voting_app

 Target Server Version : 50144
 File Encoding         : utf-8

 Date: 10/24/2012 17:12:51 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `machine_name` varchar(255) DEFAULT NULL,
  `cat_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `categories`
-- ----------------------------
BEGIN;
INSERT INTO `categories` VALUES ('30', 'cat_1', 'Most GA-like'), ('31', 'cat_2', 'Traditional'), ('32', 'cat_3', 'Spookiest'), ('33', 'cat_4', 'Chicago-themed'), ('34', 'cat_5', 'Kitten Friday');
COMMIT;

-- ----------------------------
--  Table structure for `entries`
-- ----------------------------
DROP TABLE IF EXISTS `entries`;
CREATE TABLE `entries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entry_title` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `categories` varchar(255) DEFAULT NULL,
  `contestant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `entries`
-- ----------------------------
BEGIN;
INSERT INTO `entries` VALUES ('15', 'Entry 2 testing', 'slide6.jpg', 'a:1:{i:0;s:2:\"31\";}', null), ('14', 'Entry 1', 'trianex7-full.jpg', 'a:5:{i:0;s:2:\"30\";i:1;s:2:\"31\";i:2;s:2:\"32\";i:3;s:2:\"33\";i:4;s:2:\"34\";}', 'Jason Jozwiak'), ('18', 'The Spooky Punkin', 'momentary_volume2.jpg', 'a:1:{i:0;s:2:\"32\";}', 'Rip VanWinckle');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'jjozwiak@gacommunication.com', '0'), ('2', 'jason.jozwiak@gmail.com', '0'), ('3', 'mia.billetdeaux@gmail.com', '1');
COMMIT;

-- ----------------------------
--  Table structure for `votes`
-- ----------------------------
DROP TABLE IF EXISTS `votes`;
CREATE TABLE `votes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catmname` varchar(255) DEFAULT NULL,
  `entid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `votes`
-- ----------------------------
BEGIN;
INSERT INTO `votes` VALUES ('1', '0', '0'), ('2', '0', '0'), ('3', '0', '0'), ('4', '0', '0'), ('5', '0', '0'), ('6', 'cat_1', '0'), ('7', 'cat_2', '0'), ('8', 'cat_3', '0'), ('9', 'cat_4', '0'), ('10', 'cat_5', '0'), ('11', 'cat_1', '14'), ('12', 'cat_2', '15'), ('13', 'cat_3', '14'), ('14', 'cat_4', '15'), ('15', 'cat_5', '14'), ('16', 'cat_1', '14'), ('17', 'cat_2', '15'), ('18', 'cat_3', '14'), ('19', 'cat_4', '15'), ('20', 'cat_5', '14'), ('21', 'cat_1', '14'), ('22', 'cat_2', '15'), ('23', 'cat_3', '14'), ('24', 'cat_4', '15'), ('25', 'cat_5', '14'), ('26', 'cat_1', '14'), ('27', 'cat_2', '14'), ('28', 'cat_3', '14'), ('29', 'cat_4', '15'), ('30', 'cat_5', '14'), ('31', 'cat_1', '14'), ('32', 'cat_2', '15'), ('33', 'cat_3', '14'), ('34', 'cat_4', '15'), ('35', 'cat_5', '14'), ('36', 'cat_1', '14'), ('37', 'cat_2', '15'), ('38', 'cat_3', '14'), ('39', 'cat_4', '15'), ('40', 'cat_5', '14'), ('41', 'cat_1', '14'), ('42', 'cat_2', '15'), ('43', 'cat_3', '14'), ('44', 'cat_4', '15'), ('45', 'cat_5', '14'), ('46', 'cat_1', '14'), ('47', 'cat_2', '15'), ('48', 'cat_3', '14'), ('49', 'cat_4', '15'), ('50', 'cat_5', '14'), ('51', 'cat_1', '14'), ('52', 'cat_2', '15'), ('53', 'cat_3', '14'), ('54', 'cat_4', '15'), ('55', 'cat_5', '14'), ('56', 'cat_1', '14'), ('57', 'cat_2', '15'), ('58', 'cat_3', '14'), ('59', 'cat_4', '15'), ('60', 'cat_5', '14'), ('61', 'cat_1', '14'), ('62', 'cat_2', '14'), ('63', 'cat_3', '14'), ('64', 'cat_4', '14'), ('65', 'cat_5', '14'), ('66', 'cat_1', '14'), ('67', 'cat_2', '15'), ('68', 'cat_3', '14'), ('69', 'cat_4', '14'), ('70', 'cat_5', '14'), ('71', 'cat_1', '14'), ('72', 'cat_2', '14'), ('73', 'cat_3', '14'), ('74', 'cat_4', '14'), ('75', 'cat_5', '14');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
