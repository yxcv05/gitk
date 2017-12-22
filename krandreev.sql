/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : krandreev

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-12-21 07:26:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `description`
-- ----------------------------
DROP TABLE IF EXISTS `description`;
CREATE TABLE `description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records of description
-- ----------------------------
INSERT INTO `description` VALUES ('17', 'Genre: Shmoop');
INSERT INTO `description` VALUES ('18', 'Calories: 475');
INSERT INTO `description` VALUES ('16', 'Type: PC');
INSERT INTO `description` VALUES ('15', 'Type: HDD');
INSERT INTO `description` VALUES ('11', 'Capacity: 500 GB');
INSERT INTO `description` VALUES ('5', 'Capacity: 500 GB');
INSERT INTO `description` VALUES ('12', 'Lang: php');
INSERT INTO `description` VALUES ('13', 'Type: HDD');
INSERT INTO `description` VALUES ('14', 'Type: HDD');
INSERT INTO `description` VALUES ('9', 'Capacity: 1 TB');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(80) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(80) NOT NULL,
  `img` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', 'Seagate Laptop', '7500', 'hardware', '1.jpg');
INSERT INTO `goods` VALUES ('2', 'HGST Travelstar', '3000', 'hardware', '2.jpg');
INSERT INTO `goods` VALUES ('3', 'Toshiba', '3200', 'hardware', '3.jpg');
INSERT INTO `goods` VALUES ('4', 'Курсовая работа', '700', 'software', '4.jpg');
INSERT INTO `goods` VALUES ('5', 'Destiny the taken king', '3000', 'games', '5.jpg');
INSERT INTO `goods` VALUES ('6', 'Dead poets society', '400', 'books', '6.jpg');
INSERT INTO `goods` VALUES ('7', 'Hamburger', '140', 'food', '7.jpg');

-- ----------------------------
-- Table structure for `goods_desc`
-- ----------------------------
DROP TABLE IF EXISTS `goods_desc`;
CREATE TABLE `goods_desc` (
  `id_goods` int(11) NOT NULL,
  `id_desc` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=cp1251;

-- ----------------------------
-- Records of goods_desc
-- ----------------------------
INSERT INTO `goods_desc` VALUES ('1', '5', '1');
INSERT INTO `goods_desc` VALUES ('2', '11', '2');
INSERT INTO `goods_desc` VALUES ('3', '9', '3');
INSERT INTO `goods_desc` VALUES ('4', '12', '4');
INSERT INTO `goods_desc` VALUES ('1', '13', '5');
INSERT INTO `goods_desc` VALUES ('2', '14', '6');
INSERT INTO `goods_desc` VALUES ('3', '15', '7');
INSERT INTO `goods_desc` VALUES ('5', '16', '8');
INSERT INTO `goods_desc` VALUES ('6', '17', '9');
INSERT INTO `goods_desc` VALUES ('7', '18', '10');
