# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: eye_db
# Generation Time: 2018-05-26 14:14:12 +0000
# ************************************************************



 USE `my_db`;

DROP TABLE IF EXISTS `ushop_eye_user`;
CREATE TABLE `ushop_eye_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_type` tinyint(1) unsigned DEFAULT '1' COMMENT '家庭成员特征：1:家长，2：学生，3：老人',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1:男，0:女',
  `age` tinyint(3) unsigned DEFAULT NULL,
  `patient_age` tinyint(3) unsigned DEFAULT NULL COMMENT '患者的年龄',
  `user_id` int(11) unsigned DEFAULT '0' COMMENT '',
  `family_id` int(11) unsigned DEFAULT '0' COMMENT '成员属于哪个家庭的',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='眼睛客户附加信息';

DROP TABLE IF EXISTS `ushop_eye_user_with_article`;
CREATE TABLE `ushop_eye_user_with_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1:article，2:video',
  `article_id` int(11) unsigned DEFAULT '0' COMMENT '',
  `user_id` int(11) unsigned DEFAULT '0' COMMENT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章关联用户表';

# Dump of table ushop_eye_card
# ------------------------------------------------------------
DROP TABLE IF EXISTS `ushop_eye_card`;
CREATE TABLE `ushop_eye_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(50) NOT NULL,
  `day` char(3) NOT NULL COMMENT '坚持天数',
  `is_del` tinyint(1) DEFAULT '0' COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ushop_eye_card` WRITE;
/*!40000 ALTER TABLE `ushop_eye_card` DISABLE KEYS */;

INSERT INTO `ushop_eye_card` (`id`, `title`, `day`, `is_del`)
VALUES
	(1,'每日打卡','5',0),
	(2,'眼部保健','5',0),
	(3,'眨眼锻炼','3',0),
	(4,'补充维生素A','5',0),
	(5,'yaya','10',1),
	(6,'哈哈','10',0),
	(7,'ddddd','100',1);

/*!40000 ALTER TABLE `ushop_eye_card` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ushop_eye_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ushop_eye_info`;

CREATE TABLE `ushop_eye_info` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num_R` char(6) DEFAULT '0' COMMENT '右眼度数',
  `num_L` char(6) DEFAULT '0' COMMENT '右眼度数',
  `num_RS` char(6) DEFAULT '0' COMMENT '右眼散光',
  `num_LS` char(6) DEFAULT '0' COMMENT '左眼散光',
  `c_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  `m_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '更新日期',
  `advice` text COMMENT '医生建议',
  `user_id` int(11) NOT NULL,
  `is_del` tinyint(1) DEFAULT '0' COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE ushop_eye_info DROP m_date;
ALTER TABLE ushop_eye_info ADD `m_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP  COMMENT '更新日期' AFTER `date`;


LOCK TABLES `ushop_eye_info` WRITE;
/*!40000 ALTER TABLE `ushop_eye_info` DISABLE KEYS */;

INSERT INTO `ushop_eye_info` (`id`, `num_R`, `num_L`, `num_RS`, `num_LS`, `date`, `advice`, `user_id`, `is_del`)
VALUES
	(1,'0.5','0.5','2.00','-1.00','2018-05-26 17:30:21','眼睛是心灵的窗户，所以我们要爱惜自己的眼睛，平时要加以保护和不要太疲劳，更要保持清洁，注意休息\n',1,0),
	(2,'0.2','0.2','2.10','-1.10','2018-05-26 17:30:21','如果眼睛出现不适建议及时就医，不要用手揉眼睛，眼睛疾病的表现形式一开始可能就是眼干，眼涩，流眼泪等状况。',2,0),
	(3,'1.5','1.5','1.00','-2.00','2018-05-26 17:30:21','8发生在玻璃体的主要是玻璃体浑浊9发生在视网膜的疾病主要有视网膜出血渗出黄斑变性视网膜炎等10视神经会发生视神经炎视神经萎缩等11眼部常见的肿瘤有眼睑鳞状细胞癌视网膜母细胞瘤以及球后占位性瘤12还有就是屈光不正即近视远视散光还有无法纠正的弱视13根据色异常可分色弱红色盲绿色盲全色盲14最后还有青光眼\n      以上是对“眼睛疾病都有哪些?”这个问题的建议，希望对您有帮助，祝您健康',3,0),
	(4,'2.5','2.5','0.00','-1.00','2018-05-26 17:30:21','一般眼睛有问题会出现视力下降，眼睛胀痛，畏光流泪，有分泌物增多等等，建议具体情况到医院就诊检查',4,0),
	(5,'3.5','3.5','3.00','-1.00','2018-05-26 17:30:21','',5,0),
	(6,'5.5','5.5','2.00','-1.00','2018-05-26 17:30:21','',6,0),
	(7,'0.15','0.25','2.00','-1.12','2018-05-26 17:30:53','注意用眼习惯22',7,0);

/*!40000 ALTER TABLE `ushop_eye_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ushop_eye_record
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ushop_eye_record`;

CREATE TABLE `ushop_eye_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(50) DEFAULT NULL COMMENT '眼疾类型',
  `day` char(20) DEFAULT NULL COMMENT '治疗时长',
  `method` varchar(255) DEFAULT NULL COMMENT '治疗方法',
  `feel` char(30) DEFAULT NULL COMMENT '感受',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tip` text COMMENT '护眼小贴士',
  `user_id` int(11) NOT NULL,
  `is_del` tinyint(1) DEFAULT '0' COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='健康记录';

LOCK TABLES `ushop_eye_record` WRITE;
/*!40000 ALTER TABLE `ushop_eye_record` DISABLE KEYS */;

INSERT INTO `ushop_eye_record` (`id`, `type`, `day`, `method`, `feel`, `date`, `tip`, `user_id`, `is_del`)
VALUES
	(1,'溢泪症','15天','药物治疗','良好','2018-05-26 19:56:15','',2,0),
	(2,'虹膜睫状体炎','30天','药物治疗','良好','2018-05-26 19:56:15','',3,0),
	(3,'玻璃体病','1月','药物治疗','良好','2018-05-26 19:56:15','',4,0),
	(4,'迎风流泪','30','开刀','良好','2018-05-26 20:14:38','好好休息一下',1,0),
	(5,'眼睛充血','15','滴眼药水','良好','2018-05-26 22:10:05','眼结膜上布满了毛细血管，一旦血管破裂，就会有充血现象。眼科专家提醒，通常结膜出血没有明显原因，但如果患有严重高血压或血小板缺乏等疾病时，结膜也会充血。',0,0);

/*!40000 ALTER TABLE `ushop_eye_record` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ushop_family
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ushop_family`;

CREATE TABLE `ushop_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='家庭表';

LOCK TABLES `ushop_family` WRITE;
/*!40000 ALTER TABLE `ushop_family` DISABLE KEYS */;

INSERT INTO `ushop_family` (`id`, `username`)
VALUES
	(1,'李四家'),
	(2,'赵刘家'),
	(3,'王五家'),
	(4,'张三家');

/*!40000 ALTER TABLE `ushop_family` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ushop_person_card
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ushop_person_card`;

CREATE TABLE `ushop_person_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(20) NOT NULL,
  `tip` varchar(128) NOT NULL,
  `f_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '卡的类型：1:家长，2：学生，3：老人',
  `is_del` tinyint(1) DEFAULT '0' COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ushop_person_card` WRITE;
/*!40000 ALTER TABLE `ushop_person_card` DISABLE KEYS */;

INSERT INTO `ushop_person_card` (`id`, `title`, `tip`, `f_id`, `type`, `is_del`)
VALUES
	(1,'老人','护眼小卡片',1,3,0),
	(2,'家长','护眼小卡片',2,1,0),
	(3,'学生','护眼小卡片',3,2,0),
	(4,'老人','护眼小卡片',1,3,0),
	(5,'老人','dfadsfasdfadsfadsfadfadfad',1,1,0),
	(6,'老人','dfadsfasdfadsfadsfadfadfad',1,1,0),
	(7,'老人','dfadsfasdfadsfadsfadfadfad',1,3,0);

/*!40000 ALTER TABLE `ushop_person_card` ENABLE KEYS */;
UNLOCK TABLES;

DROP TABLE IF EXISTS `ushop_world_person`;
CREATE TABLE `ushop_world_person` (
  `degrees` int(11) NOT NULL COMMENT '眼睛度数',
  `population` int(11) NOT NULL COMMENT '人口数量',
  UNIQUE KEY `index_degrees` (`degrees`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ushop_world_person
-- ----------------------------
INSERT INTO `ushop_world_person` VALUES
('100', '876545')
,('110', '8765789')
,('150', '3567878')
,('200', '10000')
,('250', '456789087')
,('260', '4356754')
,('285', '5460987')
,('300', '20000')
,('320', '65546')
,('330', '87654546')
,('350', '459876564')
,('360', '897654')
,('380', '98765564')
,('400', '230453436')
,('420', '8765446')
,('425', '987665')
,('450', '876543')
,('500', '2360000')
,('550', '45678876')
,('600', '876534')
,('660', '87643567')
,('700', '560000')
,('750', '987654')
,('770', '897654')
,('780', '876546')
,('800', '876976')
,('1000', '5000');
