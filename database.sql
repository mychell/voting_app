/*
 Navicat MySQL Data Transfer

 Source Server         : local
 Source Server Version : 50144
 Source Host           : localhost
 Source Database       : local_voting_app

 Target Server Version : 50144
 File Encoding         : utf-8

 Date: 10/21/2012 22:34:02 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `entries`
-- ----------------------------
BEGIN;
INSERT INTO `entries` VALUES ('15', 'Entry 2', 'slide6.jpg', 'a:2:{i:0;s:2:\"31\";i:1;s:2:\"33\";}'), ('14', 'Entry 1', 'trianex7-full.jpg', 'a:5:{i:0;s:2:\"30\";i:1;s:2:\"31\";i:2;s:2:\"32\";i:3;s:2:\"33\";i:4;s:2:\"34\";}');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL DEFAULT '',
  `active` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', 'jjozwiak@gacommunication.com', '', '1');
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `votes`
-- ----------------------------
BEGIN;
INSERT INTO `votes` VALUES ('1', '0', '0'), ('2', '0', '0'), ('3', '0', '0'), ('4', '0', '0'), ('5', '0', '0'), ('6', 'cat_1', '0'), ('7', 'cat_2', '0'), ('8', 'cat_3', '0'), ('9', 'cat_4', '0'), ('10', 'cat_5', '0'), ('11', 'cat_1', '14'), ('12', 'cat_2', '15'), ('13', 'cat_3', '14'), ('14', 'cat_4', '15'), ('15', 'cat_5', '14'), ('16', 'cat_1', '14'), ('17', 'cat_2', '15'), ('18', 'cat_3', '14'), ('19', 'cat_4', '15'), ('20', 'cat_5', '14');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
