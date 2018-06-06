 -- creat dataBase
 DROP DATABASE IF EXISTS `eye_db`;
 CREATE DATABASE IF NOT EXISTS `eye_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 USE `eye_db`;

DROP TABLE IF EXISTS `family`;
CREATE TABLE `family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='家庭表';

 INSERT INTO `family` VALUES
   (null,'李四家'),
   (null,'赵刘家'),
   (null,'王五家'),
   (null,'张三家');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `sex` TINYINT(1)  DEFAULT 1 COMMENT '1:男，2:女',
  `type` TINYINT(1) DEFAULT 1 COMMENT '成员特征：1:家长，2：学生，3：老人',
  `password` varchar(255) NOT NULL,
  `authKey` varchar(255) NOT NULL,
  `accessToken` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建日期',
  `is_delete` TINYINT(1) NOT NULL DEFAULT '0',
  `nickname` varchar(255) NOT NULL DEFAULT '' COMMENT '昵称',
  `age` tinyint(3) unsigned NOT NULL,
  `avatar_url` longtext NOT NULL COMMENT '头像url',
  `f_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户';
 INSERT INTO `user` VALUES
   (null,'李明',1,1,'$2y$13$PeYpzXZJEQCG8ThP.BAYoerQHEbKVjQh3Vfx6gEpU7cKOIdR2.Sma','343&&&fd','rqerewrqew####',NOW(),0,'小李',15,'dsfadsfads',1),
   (null,'张慧',2,1,'$2y$13$PeYpzXZJEQCG8ThP.BAYoerQHEbKVjQh3Vfx6gEpU7cKOIdR2.Sma','343&&&fd','rqerewrqew####',NOW(),0,'小慧',15,'dsfadsfads',1),
   (null,'李老明',1,3,'$2y$13$PeYpzXZJEQCG8ThP.BAYoerQHEbKVjQh3Vfx6gEpU7cKOIdR2.Sma','343&&&fd','rqerewrqew####',NOW(),0,'老李',15,'dsfadsfads',1),
   (null,'赵老师',2,3,'$2y$13$PeYpzXZJEQCG8ThP.BAYoerQHEbKVjQh3Vfx6gEpU7cKOIdR2.Sma','343&&&fd','rqerewrqew####',NOW(),0,'老赵',15,'dsfadsfads',1),
   (null,'李二明',1,2,'$2y$13$PeYpzXZJEQCG8ThP.BAYoerQHEbKVjQh3Vfx6gEpU7cKOIdR2.Sma','343&&&fd','rqerewrqew####',NOW(),0,'小李',15,'dsfadsfads',1),
   (null,'李小花',2,2,'$2y$13$PeYpzXZJEQCG8ThP.BAYoerQHEbKVjQh3Vfx6gEpU7cKOIdR2.Sma','343&&&fd','rqerewrqew####',NOW(),0,'小花',15,'dsfadsfads',1),
   (null,'李小明',1,2,'$2y$13$PeYpzXZJEQCG8ThP.BAYoerQHEbKVjQh3Vfx6gEpU7cKOIdR2.Sma','343&&&fd','rqerewrqew####',NOW(),0,'小明',15,'dsfadsfads',1);

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
  `article_id` int(11) unsigned DEFAULT '0' COMMENT '',
  `user_id` int(11) unsigned DEFAULT '0' COMMENT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章关联用户表';

DROP TABLE IF EXISTS `ushop_map_location`;
CREATE TABLE `ushop_map_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(255) COMMENT '纬度，浮点数，范围为-90~90，负数表示南纬',
  `longitude` varchar(255) COMMENT '经度，浮点数，范围为-180~180，负数表示西经',
  `accuracy` varchar(255) COMMENT '位置的精确度',
  `user_id` int(11) unsigned DEFAULT '0' COMMENT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='地图坐标';



DROP TABLE IF EXISTS `person_card`;
CREATE TABLE `person_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` CHAR(20)  NOT NULL COMMENT '',
  `tip` VARCHAR(128)  NOT NULL COMMENT '',
  `f_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0  COMMENT '',
  `type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '卡的类型：1:家长，2：学生，3：老人',
  `is_del` TINYINT(1)  DEFAULT 0 COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='';
ALTER TABLE person_card ADD `user_id` int(11) NOT NULL DEFAULT 0  COMMENT '' AFTER `f_id`;

INSERT INTO `person_card` VALUES
(null,'老人','护眼小卡片',1,1,3,0),
(null,'家长','护眼小卡片',2,1,1,0),
(null,'学生','护眼小卡片',3,1,2,0),
(null,'老人','护眼小卡片',1,1,3,0);

DROP TABLE IF EXISTS `eye_card`;
CREATE TABLE `eye_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` CHAR(50)  NOT NULL COMMENT '',
  `day` CHAR(3)  NOT NULL COMMENT '坚持天数',
  `is_del` TINYINT(1)  DEFAULT 0 COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='';

INSERT INTO `eye_card` VALUES
(null,'每日打卡',5,0),
(null,'眼部保健',5,0),
(null,'眨眼锻炼',3,0),
(null,'补充维生素A',5,0);


 DROP TABLE IF EXISTS `eye_info`;
 CREATE TABLE `eye_info` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `num_R` CHAR(6)  DEFAULT '0' COMMENT '右眼度数',
   `num_L` CHAR(6)  DEFAULT '0' COMMENT '右眼度数',
   `num_RS` CHAR(6)  DEFAULT '0' COMMENT '右眼散光',
   `num_LS` CHAR(6)  DEFAULT '0' COMMENT '左眼散光',
   `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
   `advice` text COMMENT '医生建议',
   `user_id` int(11) NOT NULL,
   `is_del` TINYINT(1)  DEFAULT 0 COMMENT '1:删除',
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='';

 INSERT INTO `eye_info` VALUES
   (null,'0.5','0.5','2.00','-1.00',NOW(),'',1,0),
   (null,'0.2','0.2','2.10','-1.10',NOW(),'',1,0),
   (null,'1.5','1.5','1.00','-2.00',NOW(),'',1,0),
   (null,'2.5','2.5','0.00','-1.00',NOW(),'',2,0),
   (null,'3.5','3.5','3.00','-1.00',NOW(),'',2,0),
   (null,'5.5','5.5','2.00','-1.00',NOW(),'',2,0);

DROP TABLE IF EXISTS `eye_record`;
CREATE TABLE `eye_record` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` CHAR(50) COMMENT '眼疾类型',
  `day`  CHAR(20)   COMMENT '治疗时长',
  `method` VARCHAR(255) COMMENT '治疗方法',
  `feel` CHAR(30)  COMMENT '感受',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `tip` text COMMENT '护眼小贴士',
  `user_id` int(11) NOT NULL,
  `is_del` TINYINT(1)  DEFAULT 0 COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='健康记录';

INSERT INTO `eye_record` VALUES
(null,'溢泪症','15天','药物治疗','良好',NOW(),'',2,0),
(null,'虹膜睫状体炎','30天','药物治疗','良好',NOW(),'',3,0),
(null,'玻璃体病','1月','药物治疗','良好',NOW(),'',4,0);


DROP TABLE IF EXISTS `tip`;
CREATE TABLE `tip` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `content` text COMMENT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='贴士';



DROP TABLE IF EXISTS `ushop_world_person`;
CREATE TABLE `ushop_world_person` (
  `degrees` int(11) unsigned NOT NULL COMMENT '眼镜度数',
  `population` int(11) unsigned NOT NULL COMMENT '人口统计数',
  PRIMARY KEY (`degrees`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `ushop_world_person` VALUES
('100', '876545'),
('110', '8765789'),
('150', '3567878'),
('200', '10000'),
('250', '456789087'),
('260', '4356754'),
('285', '5460987'),
('300', '20000'),
('320', '65546'),
('330', '87654546'),
('335', '253466'),
('350', '459876564'),
('360', '897654'),
('380', '98765564'),
('400', '230453436'),
('420', '8765446'),
('425', '987665'),
('450', '876543'),
('500', '2360000'),
('530', '87667098'),
('550', '45678876'),
('600', '876534'),
('660', '87643567'),
('670', '453678'),
('700', '560000'),
('750', '987654'),
('770', '897654'),
('780', '876546'),
('800', '876976'),
('1000', '5000');


-- 根据type 获取 文章或视频的相关信息
select u.id as user_id,a.id,a.title,a.content,a.addtime as create_time,r.type,r.relation_id from `ushop_user` as u
  LEFT JOIN `ushop_eye_user_with_relation` as r on r.user_id = u.id
  LEFT JOIN `ushop_article` as a on r.relation_id = a.id and r.type = 1
where r.type = 1 and r.relation_id = 1 and u.id and a.is_delete = 0;