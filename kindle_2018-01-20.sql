# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 139.199.175.222 (MySQL 5.5.57)
# Database: kindle
# Generation Time: 2018-01-20 14:54:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table kd_admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_admin`;

CREATE TABLE `kd_admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(30) NOT NULL DEFAULT '',
  `admin_email` varchar(30) NOT NULL DEFAULT '',
  `admin-mobile` int(11) NOT NULL,
  `role` tinyint(2) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table kd_book
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_book`;

CREATE TABLE `kd_book` (
  `book_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(30) NOT NULL DEFAULT '' COMMENT '作者',
  `category` int(11) NOT NULL COMMENT '分类',
  `publish` varchar(50) NOT NULL DEFAULT '' COMMENT '出版社',
  `price` int(11) NOT NULL COMMENT '价格',
  `thumb` varchar(255) DEFAULT NULL COMMENT '图片路径',
  `format` varchar(11) DEFAULT 'MOBI' COMMENT '格式',
  `remark` varchar(255) DEFAULT NULL COMMENT '简介',
  `type` int(5) DEFAULT '0' COMMENT '图书是否是周推,月推,精品,热门,最新',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加图书时间',
  `click` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `collect` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0:未收藏 1:收藏',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_book` WRITE;
/*!40000 ALTER TABLE `kd_book` DISABLE KEYS */;

INSERT INTO `kd_book` (`book_id`, `book_name`, `author`, `category`, `publish`, `price`, `thumb`, `format`, `remark`, `type`, `add_time`, `click`, `collect`)
VALUES
	(13,'金融','李培',2,'2',52,'/static/images/book01.0.jpg','MOBI','这是与金融相关的书籍',1,'2018-01-16 15:31:40',29,0),
	(14,'知识不是力量','南桥',4,'3',34,'/static/images/book01.0.jpg','MOBI','知识不是力量',1,'2018-01-16 15:31:40',17,0),
	(16,'残袍','风御九秋',4,'3',32,'/static/images/book01.0.jpg','MOBI','残袍，原名左登峰，二十出头，正直青年遇纷纷乱世抗日时期。为家兼己之生养，权靠文物局两块的薪水度日，谁叫这是祖上蒙荫积累的差事，且供养之日为老母及亲姐二人，己独身没几个花费，这才勉强度日。偶然一日被遇事被赶上山守庙，后结识其妻子巫心语，和伙伴十三（猫），直至日寇即将攻济南府，安稳的生活随之打破，正统道术探险随之展开。',2,'2018-01-16 15:31:40',16,0),
	(17,'咱们仨','杨绛',3,'10',30,'/static/images/book01.0.jpg','MOBI','这是杨绛的著作',2,'2018-01-16 15:31:40',3,0),
	(25,'为啥我撒','撒大声地',0,'',99,'/static/images/book01.0.jpg','jpj','阿萨德发多少vfd',6,'2018-01-16 15:31:40',10,0),
	(27,'哈哈','哈哈哈',1,'5',888,'/static/images/book01.0.jpg','阿萨斯多','徐莎的数据',6,'2018-01-16 15:31:40',9,0),
	(28,'美丽的我','zjj',1,'4',9999999,'/static/images/book01.0.jpg','MOBI','美丽的我,美丽的你美丽的世界!',4,'2018-01-16 15:31:40',11,0),
	(29,'linux','书生',3,'2',999,'/static/images/book01.0.jpg','MOBI','6666666666666666666666666666666666666',4,'2018-01-16 15:31:40',3,0),
	(31,'撒哈拉之谜','溜溜哒',4,'5',998,'/static/images/book01.0.jpg','MOBI','这是一个神奇的地方这是一个神奇的地方这是一个神奇的地方',5,'2018-01-16 15:31:40',67,0),
	(32,'撒哈拉之谜2','溜溜哒',4,'5',998,'/static/images/book01.0.jpg','MOBI','这是一个神奇的地方,你们觉得呢',5,'2018-01-16 15:31:40',4,0),
	(33,'撒哈拉之谜3','溜溜哒',4,'5',998,'/static/images/book01.0.jpg','MOBI','这是一个神奇的地方,你们觉得呢乌拉乌拉黑',1,'2018-01-16 15:31:40',34,0),
	(37,'12345t\'y','王二',5,'2',6,'/static/images/book01.0.jpg','','仍热热热爱艾热二级阿尔五年前阿姨那我比预期 4别无语他他',2,'2018-01-16 15:31:40',8,0),
	(38,'阿道夫底色','啊是粉色',4,'1',98,'/static/images/book01.0.jpg','','regergsergereryhsrthrthrthjtr6j6jn 爱而已诱⑤( ⊙ o ⊙ )！呀',3,'2018-01-16 15:31:40',0,0),
	(48,'开始东方今典v','暗室逢灯',1,'9',999,'/uploads/20180115/20180115115951150.jpeg','frbi','但就在农村低你抽时间啊撒娇佛诶菲尔没怎么想吃啥跨境电商及额外热偶起来,参数名称是打开的撒肚皮舞垂搜撇开我带来,猜灯谜名称是单位',2,'2018-01-15 19:59:51',23,0),
	(50,'少部分的2','神盾局噢搜的',6,'2',998,'/static/images/book01.0.jpg','MOBI',' 才能升级我家都我都玩曹德旺群殴单位22222222222222222',2,'2018-01-15 21:26:41',34,0),
	(51,'撒哈拉之谜4','溜溜哒',4,'5',998,'/static/images/book01.0.jpg','MOBI','只要998',1,'2018-01-15 21:28:11',1,0),
	(52,'骆驼祥子','老舍',2,'2',28,'/uploads/20180115/20180115133913487.jpeg','fobi','讲述了箱子人生伴随着买骆驼的三起三落',5,'2018-01-15 21:39:13',6,0),
	(54,'243','24',2,'2',214,'/uploads/20180115/20180115144922207.jpeg','213','123',6,'2018-01-15 22:49:22',8,0),
	(60,'无法让人','大锅饭',1,'2',6,'/uploads/20180116/20180116022450218.jpeg','','尔尔雅突然',6,'2018-01-16 10:24:50',66,0),
	(63,'哈哈哈','呵呵',1,'1',66,'/uploads/20180116/20180116032928885.jpeg','','多少饭的健身房打扫房间的搜房课文电脑上风机房我开发饿哦无法CSam的欧文开封发没发请款单马上都离开菲尔',6,'2018-01-16 11:29:30',118,0),
	(65,'好了','好了',1,'2',66,'/uploads/20180116/20180116033309349.jpeg','','污染 ',1,'2018-01-16 11:33:09',2,0),
	(66,'红玫瑰与白玫瑰','张爱玲',3,'2',66,'/uploads/20180116/20180116064532733.jpeg','','只是一部值得看的小说',1,'2018-01-16 14:45:33',9,0),
	(67,'红玫瑰与白玫瑰','张爱玲',1,'2',88,'/uploads/20180116/20180116064630315.jpeg','','这是一部值得观看的书',1,'2018-01-16 14:46:31',10,0),
	(68,'名侦探','哼哼',1,'2',8,'/uploads/20180116/20180116064835969.jpeg','','人格顺风耳特热',1,'2018-01-16 14:48:36',35,0),
	(69,'骆驼祥子','老舍',4,'2',9,'/uploads/20180116/20180116065016418.jpeg','','通过讲述骆驼祥子的一生来纵观一个时代',1,'2018-01-16 14:50:16',2,0),
	(71,'似懂非懂s','发的',3,'1',36,'/uploads/20180116/20180116113132942.jpeg','','',1,'2018-01-16 19:31:33',7,0),
	(72,'大青蛙无所','水电费',1,'2',777,'/uploads/20180116/20180116113347630.jpeg','','',0,'2018-01-16 19:33:48',7,0),
	(73,'无情的无','而突然',1,'1',66,'/uploads/20180116/20180116124601440.jpeg','','',1,'2018-01-16 20:46:02',3,0),
	(74,'辅导班','如果还让他',1,'1',77,'/uploads/20180116/20180116124711895.jpeg','','',3,'2018-01-16 20:47:12',3,0),
	(75,'ertygh','rer',3,'3',33,'/uploads/20180116/20180116125246328.jpeg','','',1,'2018-01-16 20:52:47',3,0),
	(77,'省的被夫人','多少分',2,'2',98,'/uploads/20180117/20180117015553246.jpeg','','长时间的看可大风狗日从根深蒂固跌微积分我家人你当初看手机儿我去玩儿推哦而退藕的法规和健康自行车VB那么As电饭锅和就二兔',4,'2018-01-17 09:55:53',3,0),
	(78,'ertgrerte','ert ',1,'2',66,'/uploads/20180117/20180117020934444.jpeg','','',4,'2018-01-17 10:09:34',3,0),
	(79,'红玫瑰与白玫瑰','123',2,'3',66,'/uploads/20180117/20180117023104363.jpeg','','',3,'2018-01-17 10:31:05',0,0),
	(80,'童年','高尔基',1,'4',123,'/uploads/20180117/20180117072058464.jpeg','','是能否打开积分日哦上传就斗殴if光荣吗处理DVD上课自行车VB你As电饭锅和就去玩儿与',2,'2018-01-17 15:21:03',0,0),
	(81,'名人传','列夫,托儿思泰',5,'2',456,'/uploads/20180117/20180117072212315.jpeg','','去玩儿推哦阿萨德发过火监控VB你们,.',2,'2018-01-17 15:22:15',0,0),
	(82,'朝花夕拾','是否',1,'2',56,'/uploads/20180117/20180117072443623.jpeg','','“我也相信他爱我，但是我无法跟他解释我那突如其来的心慌。我害怕，害怕因为最初是我先说喜欢，所以永远只能由我主动。害怕因为我先迈出了那一步，所以他会理所当然觉得每一步都应该由我来迈。害怕我爱他比他爱我多很多……”',7,'2018-01-17 15:24:47',0,0),
	(83,'php快速入门','书生',2,'6',357,'/uploads/20180117/20180117073626164.png','','人到了一定年龄，就会变得平和了，再也不是从前那个发了脾气九头牛都拉不回来的自己。从前有人夸几句，总会兴奋好几天，而现在，微微一笑，只当鼓励，从前有人批评，总会伤心难过，而现在，懂得面对，为的是做更好的自己，从前有人讥讽，总会找人理论，而现在，不会再为别人犯的错误来惩罚自己。',2,'2018-01-17 15:36:31',0,0),
	(84,'天上的街市','冰心',16,'7',86,'/uploads/20180117/20180117073757897.jpeg','','人到了一定年龄，就会变得平和了，再也不是从前那个发了脾气九头牛都拉不回来的自己。从前有人夸几句，总会兴奋好几天，而现在，微微一笑，只当鼓励，从前有人批评，总会伤心难过，而现在，懂得面对，为的是做更好的自己，从前有人讥讽，总会找人理论，而现在，不会再为别人犯的错误来惩罚自己。',2,'2018-01-17 15:38:01',0,0),
	(85,'名人传','冰心',2,'2',88,'/uploads/20180117/20180117073951154.jpeg','','我小时候的记忆不见了，记忆是从七岁时开始的，这年，我八岁刚读二年级，刚放学，我和其他的二年级小学生一样的收拾书包，跑出教室，带着好似开心的神色扑到了在外等候的母亲身上。\r\n回到家中，邻居有几个小孩，我们经常一起玩耍，此时，大家玩着扮家家酒，在其中我非常的耀眼，秀气的脸上时刻带着阳光的笑容，两个小男孩和两个小女孩再加上我，两个小男孩一个胖一个瘦，瘦的那个还有点帅，胖的那个就不怎么样了',3,'2018-01-17 15:39:55',0,0),
	(86,'java快速入门','我我我',31,'9',88,'/uploads/20180117/20180117074050902.jpeg','','只要有了愤怒表现出来就是了，愤怒的他看着我，“哼，都是你，没有人选我。”在他看来这个笑的很好看的人是罪魁祸首，他用力一推，我啪的一声摔了个四脚朝天。\r\n瘦弱的我被体型健壮的他这么一推，身上许多处都是剧痛，但这时，我的脸上没有一滴眼泪，甚至有些茫然，虽然感到自己身上的痛觉，我却不知道此时应该干什么，两个男孩早就逃之夭夭了，两个小女孩一脸惊慌的看着我，她们觉得我现在应该哭了啊？',3,'2018-01-17 15:40:53',0,0),
	(87,'php快速入门','123',2,'4',56,'/uploads/20180117/20180117074156612.png','','天州市葫芦镇小葫芦村，有一位慈祥的母亲叫左淑芬（化名）。今年78岁了，满白的头发，消瘦的脸颊，满脸的皱纹像一辈子操劳。她三十几岁就守寡，丈夫因病撒手人寰。含辛茹苦把儿子扶养成人，并且给儿子娶了媳妇。时光荏再，岁月无情。她比别人要付出很多，看样子更显得老些了。\r\n　　老人眼睛不太好，还有白内障的症状。俗话说：“树老生虫，人老生病。”这是人与自然的客观规律，任何人都无法改变的事实。尽管是如此的情况，她都坚持做事不闲着。不论寒冬还是酷暑，坚持吃过早饭就下楼；中午倚在某个角落吃个面包，直到天黑才回家了。老人心里在',3,'2018-01-17 15:42:01',0,0);

/*!40000 ALTER TABLE `kd_book` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_category`;

CREATE TABLE `kd_category` (
  `cate_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_category` WRITE;
/*!40000 ALTER TABLE `kd_category` DISABLE KEYS */;

INSERT INTO `kd_category` (`cate_id`, `cate_name`)
VALUES
	(1,'人文科学'),
	(2,'经济学'),
	(3,'文学'),
	(4,'科学与自热'),
	(5,'网络科技'),
	(6,'期刊'),
	(16,'芭莎'),
	(30,'自然科学'),
	(31,'历史'),
	(32,'经商'),
	(33,'诗歌鉴赏与分析');

/*!40000 ALTER TABLE `kd_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_collect
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_collect`;

CREATE TABLE `kd_collect` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_collect` WRITE;
/*!40000 ALTER TABLE `kd_collect` DISABLE KEYS */;

INSERT INTO `kd_collect` (`id`, `user_id`, `book_id`)
VALUES
	(56,52,33),
	(59,52,37),
	(62,49,65),
	(63,49,71),
	(65,49,17),
	(67,1,51),
	(68,52,27),
	(69,1,69);

/*!40000 ALTER TABLE `kd_collect` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_migrations`;

CREATE TABLE `kd_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `kd_migrations` WRITE;
/*!40000 ALTER TABLE `kd_migrations` DISABLE KEYS */;

INSERT INTO `kd_migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2018_01_16_014647_entrust_setup_tables',1);

/*!40000 ALTER TABLE `kd_migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_node
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_node`;

CREATE TABLE `kd_node` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `node_name` varchar(30) NOT NULL DEFAULT '' COMMENT '节点名称',
  `routes` varchar(15) NOT NULL DEFAULT '' COMMENT '节点路由名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_node` WRITE;
/*!40000 ALTER TABLE `kd_node` DISABLE KEYS */;

INSERT INTO `kd_node` (`id`, `node_name`, `routes`)
VALUES
	(2,'添加管理员','add_admin'),
	(3,'管理员列表','admin_list'),
	(5,'添加书籍','bookadd'),
	(6,'用户列表','listK'),
	(7,'会员列表','vip_lists'),
	(8,'添加会员','add_vip'),
	(9,'积分列表','score_lists'),
	(10,'书籍列表','booklist'),
	(11,'类目列表','booksort'),
	(12,'订单列表','order_lists'),
	(13,'登入后台','admin'),
	(14,'权限配置','role_node'),
	(15,'添加权限节点','add_node'),
	(16,'欢迎界面','welcome'),
	(20,'权限浏览','power_lists');

/*!40000 ALTER TABLE `kd_node` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_order`;

CREATE TABLE `kd_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(25) NOT NULL DEFAULT '' COMMENT '唯一订单号',
  `user_id` int(11) NOT NULL COMMENT '用户编号',
  `time` int(11) NOT NULL DEFAULT '1' COMMENT '会员时间',
  `total` int(11) NOT NULL COMMENT '总金额',
  `status` int(2) NOT NULL DEFAULT '0' COMMENT '0未支付,1已支付',
  `add_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建订单时间',
  `payway` int(2) NOT NULL DEFAULT '0' COMMENT '0支付宝,1微信支付',
  `desc` varchar(255) DEFAULT '' COMMENT '商品描述',
  `buyer_email` varchar(50) DEFAULT NULL COMMENT '卖家支付宝账号',
  `trade_no` varchar(255) DEFAULT NULL COMMENT '支付单号',
  `notify_time` varchar(20) DEFAULT NULL COMMENT '支付时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_order` WRITE;
/*!40000 ALTER TABLE `kd_order` DISABLE KEYS */;

INSERT INTO `kd_order` (`id`, `order_id`, `user_id`, `time`, `total`, `status`, `add_time`, `payway`, `desc`, `buyer_email`, `trade_no`, `notify_time`)
VALUES
	(1,'201801200456463630360535',2,6,35,1,'2018-01-20 12:56:46',0,'用户2申请开通6个月的会员,共付款35元','18438628502','2018012021001004880225111771','2018-01-20 12:57:16'),
	(2,'201801200506394845302829',2,1,6,1,'2018-01-20 13:06:39',0,'用户2申请开通1个月的会员,共付款6元','18438628502','2018012021001004880224043211','2018-01-20 13:07:14'),
	(3,'201801200508539143971328',4,13,66,1,'2018-01-20 13:08:53',0,'用户4申请开通13个月的会员,共付款66元','18438628502','2018012021001004880225141417','2018-01-20 13:09:16'),
	(4,'201801201353134945436431',2,1,6,0,'2018-01-20 21:53:13',0,'用户2申请开通1个月的会员,共付款6元',NULL,NULL,NULL),
	(5,'201801201353256419019334',2,1,6,0,'2018-01-20 21:53:25',0,'用户2申请开通1个月的会员,共付款6元',NULL,NULL,NULL),
	(6,'201801201444006098159728',2,7,41,0,'2018-01-20 22:44:00',0,'用户2申请开通7个月的会员,共付款41元',NULL,NULL,NULL),
	(7,'201801201449579905280617',2,1,6,0,'2018-01-20 22:49:57',0,'用户2申请开通1个月的会员,共付款6元',NULL,NULL,NULL);

/*!40000 ALTER TABLE `kd_order` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_publish
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_publish`;

CREATE TABLE `kd_publish` (
  `publish_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `publish_name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`publish_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_publish` WRITE;
/*!40000 ALTER TABLE `kd_publish` DISABLE KEYS */;

INSERT INTO `kd_publish` (`publish_id`, `publish_name`)
VALUES
	(1,'人民教育出版社'),
	(2,'人民邮电出版社 '),
	(3,'机械工业出版社'),
	(4,'清华大学出版社 '),
	(5,'中国金融出版社'),
	(6,'商务印书馆 '),
	(7,'人民出版社'),
	(8,'科学出版社'),
	(9,'中国水利水电出版社 '),
	(10,'作家出版社');

/*!40000 ALTER TABLE `kd_publish` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_role`;

CREATE TABLE `kd_role` (
  `role_id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(6) NOT NULL DEFAULT '',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_role` WRITE;
/*!40000 ALTER TABLE `kd_role` DISABLE KEYS */;

INSERT INTO `kd_role` (`role_id`, `role_name`)
VALUES
	(1,'超级管理员'),
	(2,'管理员'),
	(3,'VIP会员'),
	(4,'普通会员'),
	(5,'书虫');

/*!40000 ALTER TABLE `kd_role` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_role_node
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_role_node`;

CREATE TABLE `kd_role_node` (
  `role_id` int(11) NOT NULL COMMENT '角色',
  `node_id` int(11) NOT NULL COMMENT '权限节点'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_role_node` WRITE;
/*!40000 ALTER TABLE `kd_role_node` DISABLE KEYS */;

INSERT INTO `kd_role_node` (`role_id`, `node_id`)
VALUES
	(2,5),
	(2,6),
	(2,7),
	(2,8),
	(2,10),
	(2,11),
	(2,12),
	(2,13),
	(2,14),
	(2,15),
	(2,16),
	(1,2),
	(1,6),
	(1,7),
	(1,8),
	(1,9),
	(1,10),
	(1,11),
	(1,12),
	(1,13),
	(1,14),
	(1,15),
	(1,16),
	(1,20);

/*!40000 ALTER TABLE `kd_role_node` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_score
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_score`;

CREATE TABLE `kd_score` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_score` WRITE;
/*!40000 ALTER TABLE `kd_score` DISABLE KEYS */;

INSERT INTO `kd_score` (`id`, `user_id`, `total`)
VALUES
	(1,2,41),
	(2,4,66);

/*!40000 ALTER TABLE `kd_score` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_set
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_set`;

CREATE TABLE `kd_set` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL DEFAULT '',
  `name` varchar(255) NOT NULL DEFAULT '',
  `href` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_set` WRITE;
/*!40000 ALTER TABLE `kd_set` DISABLE KEYS */;

INSERT INTO `kd_set` (`id`, `url`, `name`, `href`)
VALUES
	(1,'/static/images/kindle-book01.png','个人文档','https://www.amazon.cn/mn/dcw/myx.html/ref=kinw_myk_redirect#/home/content/pdocs/dateDsc/'),
	(2,'/static/images/kindle-book02.png','电子书','https://www.amazon.cn/mn/dcw/myx.html/ref=kinw_myk_redirect#/home/content/booksAll/dateDsc/'),
	(3,'/static/images/kindle-book03.png','我的设备','https://www.amazon.cn/mn/dcw/myx.html/ref=kinw_myk_redirect#/home/devices/1'),
	(4,'/static/images/kindle-book04.png','设置','https://www.amazon.cn/mn/dcw/myx.html/ref=kinw_myk_redirect#/home/settings/payment');

/*!40000 ALTER TABLE `kd_set` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_type`;

CREATE TABLE `kd_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_type` WRITE;
/*!40000 ALTER TABLE `kd_type` DISABLE KEYS */;

INSERT INTO `kd_type` (`type_id`, `type_name`)
VALUES
	(1,'最新'),
	(2,'首页书单广场轮播'),
	(3,'精品'),
	(4,'周推'),
	(5,'月推'),
	(6,'热门'),
	(7,'随便看看');

/*!40000 ALTER TABLE `kd_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_user`;

CREATE TABLE `kd_user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `nickname` varchar(10) NOT NULL DEFAULT '' COMMENT '昵称',
  `role` tinyint(2) NOT NULL DEFAULT '5' COMMENT '角色',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  `k_email` varchar(255) NOT NULL DEFAULT '' COMMENT '自动生成的 kindle邮箱',
  `d_email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_user` WRITE;
/*!40000 ALTER TABLE `kd_user` DISABLE KEYS */;

INSERT INTO `kd_user` (`user_id`, `email`, `pswd`, `nickname`, `role`, `create_time`, `k_email`, `d_email`)
VALUES
	(1,'bagua@qq.com','$2y$10$B8jQIARwyIQLzi47Tqm.a.Api2OmrXSmDk3u0vQ72BQvMQCOCwvhG','诸葛武侯',1,'2018-01-12 23:45:10','bagua@kindleshudan.com','bagua@kindle.cn'),
	(2,'g@1.com','$2y$10$mH3h8QFCybAPnHyejOJlFeSDbNzZvRhJENFaR6kP2ZVYoPXhaXzgK','书虫9753340',5,'2018-01-13 09:10:24','g@kindleshudan.com','g@kindle.cn'),
	(3,'22@q.com','$2y$10$oNGSw/P2QFtLMrx5vdR4peHigJs6A2AEMsOliE87.fqx6njdZiROe','书虫3605792',5,'2018-01-13 09:11:31','22@kindleshudan.com',''),
	(4,'345@qq.com','$2y$10$ujhXjC.ZIiBw1B6fFX.ulOUGQGSckQVLN5s2ySSaUjTstxUBQtVA.','leiyan',2,'2018-01-13 17:53:38','345@kindleshudan.com',''),
	(46,'ga@1.com','$2y$10$wXgNHAab54bE.ODvSzFQWOt6lQKHvv7OJ7cUPhHjnYgKX2vxriSkm','书虫2545382',5,'2018-01-13 20:40:22','ga@kindleshudan.com',''),
	(49,'1@1.com','$2y$10$2qjGjZ71224LJxm0FYb5FuL6TL4yrL8zI4jjDvvMJsJkNwAMj81cS','王小熊猫',2,'2018-01-16 09:11:10','1@kindleshudan.com','1@kindle.cn'),
	(50,'as@qq.com','$2y$10$l4HUHQ8Ch5fW5BvUMi5.9.WhKowN9VlfkQ1b6.NT69pA49.3lUXFi','测试',2,'2018-01-16 09:12:02','as@kindleshudan.com',''),
	(51,'2323@1.com','$2y$10$yh/xi/3DNSDvCl8Tec1f5el2J4IOtH0Wgrg/RkNAMJbdddzcVp4Gy','书虫4627199',5,'2018-01-16 14:58:20','2323@kindleshudan.com','2323@kindle.cn'),
	(52,'1076@qq.com','$2y$10$d8Pl5oJGchhuedjxWTh/8urYHviG1D2Epe6Yl./CMJu9FmOykjqP2','书虫9261615',5,'2018-01-16 22:08:57','1076@kindleshudan.com','1076@kindle.cn');

/*!40000 ALTER TABLE `kd_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kd_vip
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kd_vip`;

CREATE TABLE `kd_vip` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL DEFAULT '',
  `nickname` varchar(10) NOT NULL DEFAULT '',
  `level` varchar(255) NOT NULL DEFAULT '',
  `total` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kd_vip` WRITE;
/*!40000 ALTER TABLE `kd_vip` DISABLE KEYS */;

INSERT INTO `kd_vip` (`user_id`, `email`, `nickname`, `level`, `total`)
VALUES
	(1,'1@qq.com','ll','一星',0),
	(2,'2@qq.com','zjj','二星',0),
	(20,'5@qq.com','yan','一星',41);

/*!40000 ALTER TABLE `kd_vip` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
