/*
Navicat MySQL Data Transfer

Source Server         : 139.196.43.170_3306
Source Server Version : 50722
Source Host           : 139.196.43.170:3306
Source Database       : my_db

Target Server Type    : MYSQL
Target Server Version : 50722
File Encoding         : 65001

Date: 2018-06-06 17:05:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ushop_eye_card`
-- ----------------------------
DROP TABLE IF EXISTS `ushop_eye_card`;
CREATE TABLE `ushop_eye_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL,
  `day` char(3) NOT NULL COMMENT '坚持天数',
  `status` tinyint(1) DEFAULT '0' COMMENT '0未选,1已选',
  `is_del` tinyint(1) DEFAULT '0' COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ushop_eye_card
-- ----------------------------
INSERT INTO `ushop_eye_card` VALUES ('1', '每日打卡', '5', '1', '0');
INSERT INTO `ushop_eye_card` VALUES ('2', '眼部保健', '5', '0', '0');
INSERT INTO `ushop_eye_card` VALUES ('3', '眨眼锻炼', '3', '0', '0');
INSERT INTO `ushop_eye_card` VALUES ('4', '补充维生素A', '5', '0', '0');
INSERT INTO `ushop_eye_card` VALUES ('5', '打卡2', '6', '0', '0');
INSERT INTO `ushop_eye_card` VALUES ('6', '打卡', '8', '0', '0');
INSERT INTO `ushop_eye_card` VALUES ('7', '打卡', '3', '0', '1');
INSERT INTO `ushop_eye_card` VALUES ('8', '做眼保健操', '7', '0', '1');
