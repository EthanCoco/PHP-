/*
Navicat MySQL Data Transfer

Source Server         : localhostphpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : fmp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-01-09 10:55:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for fmp_birt
-- ----------------------------
DROP TABLE IF EXISTS `fmp_birt`;
CREATE TABLE `fmp_birt` (
  `birtID` bigint(20) NOT NULL AUTO_INCREMENT,
  `nodeID` bigint(20) NOT NULL,
  `birtName` varchar(100) NOT NULL,
  `birtFilePath` varchar(100) NOT NULL,
  `birtStatus` tinyint(1) NOT NULL DEFAULT '1',
  `birtDorI` char(1) DEFAULT NULL,
  `birtFormat` varchar(20) NOT NULL DEFAULT 'A4',
  PRIMARY KEY (`birtID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fmp_birt
-- ----------------------------
INSERT INTO `fmp_birt` VALUES ('1', '79', '人员进出表', '79/person.html', '1', 'I', 'A4');

-- ----------------------------
-- Table structure for fmp_test
-- ----------------------------
DROP TABLE IF EXISTS `fmp_test`;
CREATE TABLE `fmp_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aa` varchar(255) DEFAULT NULL,
  `bb` varchar(255) DEFAULT NULL,
  `cc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fmp_test
-- ----------------------------
INSERT INTO `fmp_test` VALUES ('1', '424', '3242', '342342');
INSERT INTO `fmp_test` VALUES ('2', '43', '34', '324');
