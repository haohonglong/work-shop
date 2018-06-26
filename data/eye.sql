 -- creat dataBase
 DROP DATABASE IF EXISTS `eye_db`;
 CREATE DATABASE IF NOT EXISTS `eye_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
 USE `eye_db`;

DROP TABLE IF EXISTS `ushop_family`;
CREATE TABLE `ushop_family` (
  `id` varchar (16) NOT NULL COMMENT '手机号',
  `name` varchar (255),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='家庭表';



CREATE TABLE `ushop_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` smallint(1) NOT NULL DEFAULT '1' COMMENT '用户类型：0=管理员，1=普通用户',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `access_token` varchar(255) NOT NULL,
  `addtime` int(11) NOT NULL DEFAULT '0',
  `is_delete` smallint(1) NOT NULL DEFAULT '0',
  `wechat_open_id` varchar(255) NOT NULL DEFAULT '' COMMENT '微信openid',
  `wechat_union_id` varchar(255) NOT NULL DEFAULT '' COMMENT '微信用户union id',
  `nickname` varchar(255) NOT NULL DEFAULT '' COMMENT '昵称',
  `avatar_url` longtext NOT NULL COMMENT '头像url',
  `store_id` int(11) NOT NULL DEFAULT '0' COMMENT '商城id',
  `is_distributor` int(11) NOT NULL DEFAULT '0' COMMENT '是否是分销商 0--不是 1--是 2--申请中',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '成为分销商的时间',
  `total_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '累计佣金',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '可提现佣金',
  `is_clerk` int(11) NOT NULL DEFAULT '0' COMMENT '是否是核销员 0--不是 1--是',
  `shop_id` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT '-1' COMMENT '会员等级',
  `integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户当前积分',
  `total_integral` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户总获得积分',
  `gender` char(1) NOT NULL COMMENT '用户的性别，值为1时是男性，值为2时是女性，值为0时是未知',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='用户';



DROP TABLE IF EXISTS `ushop_eye_user`;
CREATE TABLE `ushop_eye_user` (
  `userid` int(11) unsigned NOT NULL,
  `name` varchar(255) COMMENT '患者真实姓名',
  `age` tinyint(3) unsigned,
  `ill_age` tinyint(2) COMMENT '近视多久',
  `creat_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `modify_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `pc_id` int(11) COMMENT '家庭卡包-person_card',
  `phone` varchar (16) COMMENT '电话号码',
  `f_id` varchar (16) COMMENT '家庭号',
  `f_type` tinyint(1) unsigned DEFAULT 0 COMMENT '家庭成员特征：1:父母，2：孩子，3：老人',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='眼睛用户';

DROP TABLE IF EXISTS `ushop_eye_user_vip`;
CREATE TABLE `ushop_eye_user_vip` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `f_id` varchar (16) COMMENT '家庭号',
  `type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '1：vip',
  `is_delete` TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='vip会员';



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



DROP TABLE IF EXISTS `ushop_person_card`;
CREATE TABLE `ushop_person_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(20)  NOT NULL COMMENT '',
  `tip`   VARCHAR(128)  NOT NULL COMMENT '',
  `type` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '卡的类型：1:家长，2：学生，3：老人',
  `is_delete` TINYINT(1)  DEFAULT 0 COMMENT '1:删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='家庭卡包';

INSERT INTO `person_card` VALUES
(null,'老人','护眼小卡片',3,0),
(null,'家长','护眼小卡片',1,0),
(null,'学生','护眼小卡片',2,0),
(null,'老人','护眼小卡片',3,0);

DROP TABLE IF EXISTS `ushop_eye_card`;
CREATE TABLE `ushop_eye_card` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` CHAR(50)  NOT NULL COMMENT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='';
ALTER TABLE eye_card
drop `day` ,
drop `is_del` ;

INSERT INTO `ushop_eye_card` VALUES
(null,'每日打卡'),
(null,'眼部保健'),
(null,'眨眼锻炼'),
(null,'补充维生素A');

 DROP TABLE IF EXISTS `ushop_eye_record_log`;
 CREATE TABLE `ushop_eye_record_log` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '打卡日期',
   `eye_card_id` int(11) NOT NULL COMMENT  '打卡的id',
   `user_id` int(11) NOT NULL,
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='记录打卡次数';

 ALTER TABLE `ushop_eye_record_log`
ADD CONSTRAINT `fk_1` FOREIGN KEY (`eye_card_id`) REFERENCES `ushop_eye_card`(`id`);


 DROP TABLE IF EXISTS `ushop_eye_info`;
 CREATE TABLE `ushop_eye_info` (
   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
   `num_R` CHAR(6)  DEFAULT '0' COMMENT '右眼度数',
   `num_L` CHAR(6)  DEFAULT '0' COMMENT '右眼度数',
   `num_RS` CHAR(6)  DEFAULT '0' COMMENT '右眼散光',
   `num_LS` CHAR(6)  DEFAULT '0' COMMENT '左眼散光',
   `degrees` int(5) unsigned NOT NULL DEFAULT '0' COMMENT '眼镜的度数',
   `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
   `modify_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
   `advice` text COMMENT '医生建议',
   `user_id` int(11) NOT NULL,
   `is_delete` TINYINT(1)  DEFAULT 0 COMMENT '1:删除',
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='眼睛信息';

 DROP TABLE IF EXISTS `ushop_eye_optometry_list`;
 CREATE TABLE `ushop_eye_optometry_list` (
   `id`    int(11) unsigned NOT NULL AUTO_INCREMENT,
   `VD`   varchar (25)  DEFAULT '0' COMMENT '镜眼距,单位mm',
   `DSL`  varchar (25)  DEFAULT '0' COMMENT '左球面镜',
   `DSR`  varchar (25)  DEFAULT '0' COMMENT '右球面镜',
   `DCL`  varchar (25)  DEFAULT '0' COMMENT '左圆柱镜',
   `DCR`  varchar (25)  DEFAULT '0' COMMENT '右圆柱镜',
   `PDL`  varchar (25)  DEFAULT '0' COMMENT '左瞳距,单位mm',
   `PDR`  varchar (25)  DEFAULT '0' COMMENT '右瞳距,单位mm',
   `VAL`  varchar (25)  DEFAULT '0' COMMENT '左裸眼视力',
   `VAR`  varchar (25)  DEFAULT '0' COMMENT '右裸眼视力',
   `CVAL` varchar (25)  DEFAULT '0' COMMENT '左矫正视力',
   `CVAR` varchar (25)  DEFAULT '0' COMMENT '右矫正视力',
   `AL`   varchar (25)  DEFAULT '0' COMMENT '左眼轴向',
   `AR`   varchar (5)   DEFAULT '0' COMMENT '右眼轴向',
   `DL`   int(5) unsigned DEFAULT '0' COMMENT '左眼镜的度数',
   `DR`   int(5) unsigned DEFAULT '0' COMMENT '右眼镜的度数',
   `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
   `modify_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
   `remak` varchar (255) COMMENT '备注',
   `user_id` int(11) NOT NULL,
   `is_delete` TINYINT(1) DEFAULT 0 COMMENT '1:删除',
   PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='验光单';



 INSERT INTO `eye_info` VALUES
   (null,'0.5','0.5','2.00','-1.00',NOW(),'',1,0),
   (null,'0.2','0.2','2.10','-1.10',NOW(),'',1,0),
   (null,'1.5','1.5','1.00','-2.00',NOW(),'',1,0),
   (null,'2.5','2.5','0.00','-1.00',NOW(),'',2,0),
   (null,'3.5','3.5','3.00','-1.00',NOW(),'',2,0),
   (null,'5.5','5.5','2.00','-1.00',NOW(),'',2,0);

DROP TABLE IF EXISTS `ushop_eye_record`;
CREATE TABLE `ushop_eye_record` (
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

INSERT INTO `ushop_eye_record` VALUES
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



DROP TABLE IF EXISTS `ushop_article_favorite`;
CREATE TABLE `ushop_article_favorite` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章收藏';

DROP TABLE IF EXISTS `ushop_cashback`;
CREATE TABLE `ushop_cashback` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL COMMENT '哪个人申请返现',
  `status` TINYINT(1) DEFAULT 1 COMMENT '1：审核中，2：审核失败,3:审核通过，4:已经返现',
  `pics` longtext NOT NULL COMMENT '所有场景图片和验光单图片,json 格式',
  `remark` text COMMENT '备注',
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  `modify_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '',
  PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='政府返现';




-- 根据type 获取 文章或视频的相关信息
select u.id as user_id,a.id,a.title,a.content,a.addtime as create_time,r.type,r.relation_id from `ushop_user` as u
  LEFT JOIN `ushop_eye_user_with_relation` as r on r.user_id = u.id
  LEFT JOIN `ushop_article` as a on r.relation_id = a.id and r.type = 1
where r.type = 1 and r.relation_id = 1 and u.id and a.is_delete = 0;


