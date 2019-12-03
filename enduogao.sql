
        -- phpMyAdmin SQL Dump
-- version 4.0.10.20
-- https://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019-11-15 11:56:53
-- 服务器版本: 5.5.54
-- PHP 版本: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `enduogao`
--

-- --------------------------------------------------------

--
-- 表的结构 `cd_access`
--

CREATE TABLE IF NOT EXISTS `cd_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分组ID',
  `purviewval` varchar(128) DEFAULT NULL COMMENT '分组对应权限值',
  `group_id` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1481 ;

--
-- 转存表中的数据 `cd_access`
--

INSERT INTO `cd_access` (`id`, `purviewval`, `group_id`) VALUES
(1476, '/admin/FormData/index/extend_id/28.html', 2),
(1474, '/admin/FormData/delete/extend_id/27.html', 2),
(1475, '/admin/FormData/view/extend_id/27.html', 2),
(1473, '/admin/FormData/update/extend_id/27.html', 2),
(1472, '/admin/FormData/add/extend_id/27.html', 2),
(1471, '/admin/FormData/index/extend_id/27.html', 2),
(1470, '/admin/FormData/view/extend_id/25.html', 2),
(1469, '/admin/FormData/delete/extend_id/25.html', 2),
(1468, '/admin/FormData/update/extend_id/25.html', 2),
(1467, '/admin/FormData/add/extend_id/25.html', 2),
(1466, '/admin/FormData/index/extend_id/25.html', 2),
(1465, '/admin/FormData', 2),
(1463, '/admin/Base/password', 2),
(1464, '/admin/Base/delCache', 2),
(1462, '/admin/Base/password', 2),
(1461, '/admin/Sys', 2),
(1460, '/admin/DoHtml/index', 2),
(1458, '/admin/DoHtml/dolist', 2),
(1459, '/admin/DoHtml/doview', 2),
(1457, '/admin/DoHtml/doindex', 2),
(1456, '/admin/DoHtml', 2),
(1455, '/admin/Position/delete', 2),
(1454, '/admin/Position/update', 2),
(1453, '/admin/Position/add', 2),
(1452, '/admin/Position/index', 2),
(1451, '/admin/Position', 2),
(1450, '/admin/Frament/delete', 2),
(1448, '/admin/Frament/add', 2),
(1449, '/admin/Frament/update', 2),
(1446, '/admin/Frament', 2),
(1447, '/admin/Frament/index', 2),
(1445, '/admin/Content/setStatus', 2),
(1444, '/admin/Content/delPosition', 2),
(1442, '/admin/Content/move', 2),
(1443, '/admin/Content/setPosition', 2),
(1439, '/admin/Content/delete', 2),
(1441, '/admin/Content/updateSort', 2),
(1440, '/admin/Content/update', 2),
(1438, '/admin/Content/add', 2),
(1437, '/admin/Content/index', 2),
(1436, '/admin/Content', 2),
(1435, '/admin/Catagory/setSort', 2),
(1434, '/admin/Catagory/updateSort', 2),
(1433, '/admin/Catagory/delete', 2),
(1432, '/admin/Catagory/update', 2),
(1431, '/admin/Catagory/add', 2),
(1430, '/admin/Catagory/index', 2),
(1429, '/admin/Catagory', 2),
(1428, '/admin/Cms', 2),
(1427, '/admin/Member/batchUpdate', 2),
(1426, '/admin/Member/updatePassword', 2),
(1425, '/admin/Member/start', 2),
(1424, '/admin/Member/forbidden', 2),
(1423, '/admin/Member/delete', 2),
(1422, '/admin/Member/backRecharge', 2),
(1421, '/admin/Member/recharge', 2),
(1420, '/admin/Member/add', 2),
(1419, '/admin/Member/viewMember', 2),
(1418, '/admin/Member/index', 2),
(1417, '/admin/Member', 2),
(1477, '/admin/FormData/add/extend_id/28.html', 2),
(1478, '/admin/FormData/update/extend_id/28.html', 2),
(1479, '/admin/FormData/delete/extend_id/28.html', 2),
(1480, '/admin/FormData/view/extend_id/28.html', 2);

-- --------------------------------------------------------

--
-- 表的结构 `cd_apitoken`
--

CREATE TABLE IF NOT EXISTS `cd_apitoken` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `token` varchar(1000) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL COMMENT '//ip',
  `timestamp` int(11) DEFAULT NULL,
  `code` char(200) NOT NULL,
  `failcode` char(255) DEFAULT '',
  `bindcode` char(100) DEFAULT NULL COMMENT '//绑定',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`),
  KEY `bindcode` (`bindcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cd_apitoken`
--

INSERT INTO `cd_apitoken` (`id`, `uid`, `token`, `ip`, `timestamp`, `code`, `failcode`, `bindcode`) VALUES
(1, 21, '68c86f40c4d1400374126c40e8d37ed1', '59.52.204.43', 1573726579, '', '', NULL),
(3, 22, 'a1c075b4c66c61d6f3054437e0d22615', '59.52.205.24', 1573616450, '', '485539', ''),
(4, 18, 'd69ad7edd11c472d59d35229f49bac72', NULL, 1572590979, '', '', '524158');

-- --------------------------------------------------------

--
-- 表的结构 `cd_catagory`
--

CREATE TABLE IF NOT EXISTS `cd_catagory` (
  `class_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(250) DEFAULT NULL,
  `subtitle` varchar(250) DEFAULT NULL COMMENT '副标题',
  `type` tinyint(4) DEFAULT NULL,
  `list_tpl` varchar(250) DEFAULT NULL,
  `detail_tpl` varchar(250) DEFAULT NULL,
  `pic` varchar(250) DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `description` text,
  `jumpurl` varchar(250) DEFAULT NULL,
  `sortid` int(9) DEFAULT NULL,
  `pid` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `filename` varchar(32) DEFAULT NULL COMMENT '生成文件名',
  `module_id` smallint(5) DEFAULT NULL,
  `upload_config_id` tinyint(9) DEFAULT NULL COMMENT '上传配置',
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `class_id` (`class_id`),
  KEY `class_name` (`class_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `cd_catagory`
--

INSERT INTO `cd_catagory` (`class_id`, `class_name`, `subtitle`, `type`, `list_tpl`, `detail_tpl`, `pic`, `keyword`, `description`, `jumpurl`, `sortid`, `pid`, `status`, `filepath`, `filename`, `module_id`, `upload_config_id`) VALUES
(7, '关于我们', '', 1, 'about', '', '', '', '', '', 1, 0, 10, '/html/gongsijianjie', 'index.html', 0, 3),
(8, '案例详情', '', 1, 'pic', 'viewproduct', '', '', '', '', 2, 0, 10, '/html/chanpinzhongxin', 'index.html', 0, 0),
(9, '新闻资讯', '', 2, 'list', 'view', '', '', '', '', 9, 0, 10, '/html/xinwenzixun', 'index.html', 24, NULL),
(10, '营养师', '', 1, 'about', '', '', '', '', '', 2, 0, 10, '/html/rencaizhaopin', 'index.html', 0, 0),
(11, '消息中心', '', 1, 'gustbook', '', '', '', '', '/about/11', 11, 0, 10, '/html/zaixianliuyan', 'index.html', 0, 0),
(12, '免费食谱', '', 1, 'about', '', '', '', '', '', 12, 0, 10, '/html/lianxiwomen', 'index.html', 0, 0),
(19, 'banner', '', 1, '', '', '', '', '', '', 19, 0, 10, '/html/banner', 'index.html', 0, 4),
(22, '图文资讯', '', 2, 'list', 'view', '', '', '', '', 22, 9, 10, '/html/xinwenzixun/tuwenzixun', 'index.html', 24, 0),
(23, '视频资讯', '', 2, 'list', 'view', '', '', '', '', 23, 9, 10, '/html/xinwenzixun/shipinzixun', 'index.html', 24, 0);

-- --------------------------------------------------------

--
-- 表的结构 `cd_catagory_foods`
--

CREATE TABLE IF NOT EXISTS `cd_catagory_foods` (
  `class_id` int(10) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(250) DEFAULT NULL,
  `subtitle` varchar(250) DEFAULT NULL COMMENT '副标题',
  `type` tinyint(4) DEFAULT '1',
  `list_tpl` varchar(250) DEFAULT NULL,
  `detail_tpl` varchar(250) DEFAULT NULL,
  `pic` varchar(250) DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `description` text,
  `jumpurl` varchar(250) DEFAULT NULL,
  `sortid` int(9) DEFAULT NULL,
  `pid` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `filepath` varchar(255) DEFAULT NULL,
  `filename` varchar(32) DEFAULT NULL COMMENT '生成文件名',
  `module_id` smallint(5) DEFAULT NULL,
  `upload_config_id` tinyint(9) DEFAULT NULL COMMENT '上传配置',
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `class_id` (`class_id`),
  KEY `class_name` (`class_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `cd_catagory_foods`
--

INSERT INTO `cd_catagory_foods` (`class_id`, `class_name`, `subtitle`, `type`, `list_tpl`, `detail_tpl`, `pic`, `keyword`, `description`, `jumpurl`, `sortid`, `pid`, `status`, `filepath`, `filename`, `module_id`, `upload_config_id`) VALUES
(1, '水果', '', 1, '', '', '', '', '', '', 1, 0, 10, '/html/shuiguo', 'index.html', 0, 0),
(2, '面包', '', 1, '', '', '', '', '', '', 2, 0, 10, '/html/mianbao', 'index.html', 0, 0),
(3, '面食', '', 1, NULL, NULL, NULL, '', '', '', 4, 0, 10, '/html/mianshi', 'index.html', NULL, NULL),
(4, '汤类', '', 1, NULL, NULL, NULL, '', '', '', 3, 0, 10, '/html/tanglei', 'index.html', NULL, NULL),
(5, '米饭', '', 1, NULL, NULL, NULL, '', '', '', 5, 0, 10, '/html/mifan', 'index.html', NULL, NULL),
(6, '肉', '', 1, NULL, NULL, NULL, '', '', '', 6, 0, 10, '/html/rou', 'index.html', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cd_config`
--

CREATE TABLE IF NOT EXISTS `cd_config` (
  `name` varchar(50) NOT NULL,
  `data` varchar(250) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cd_config`
--

INSERT INTO `cd_config` (`name`, `data`) VALUES
('cnzz', '<script type="text/javascript" src="https://s22.cnzz.com/z_stat.php?id=1273547893&web_id=1273547893"></script>'),
('copyright', ''),
('default_themes', 'index'),
('description', 'H业供应商'),
('email_pwd', '123456'),
('email_user', '274363574@qq.com'),
('filepath', '/html'),
('file_size', '50M'),
('file_type', 'gif,png,jpg,jpeg,PNG,JPG,doc,docx,xls,xlsx,csv,pdf.rar,zip,txt,mp4,flv'),
('fiveday', '5'),
('fourday', '4'),
('images_size', '10M'),
('index_name', 'index.html'),
('keyword', ''),
('mobil_domain', ''),
('mobil_status', '1'),
('mobil_themes', 'mobil'),
('off_msg', '站点维护升级中!'),
('oneday', '1'),
('port', '25'),
('sevenday', '21'),
('site_logo', '/uploads/admin/15569621469008.png'),
('site_status', '1'),
('site_title', '恩多高后台系统'),
('sixday', '6'),
('smtp', 'smtp.qq.com'),
('status', '1'),
('sub_title', '副标题'),
('threeday', '3'),
('towday', '2'),
('url_type', '2'),
('water_logo', '/uploads/admin/15569623345163.jpg'),
('water_status', '1');

-- --------------------------------------------------------

--
-- 表的结构 `cd_config_upload`
--

CREATE TABLE IF NOT EXISTS `cd_config_upload` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `upload_replace` tinyint(1) DEFAULT NULL,
  `thumb_status` tinyint(1) DEFAULT NULL,
  `water_status` tinyint(1) DEFAULT NULL,
  `thumb_type` tinyint(1) DEFAULT NULL,
  `thumb_width` varchar(10) DEFAULT NULL,
  `thumb_height` varchar(10) DEFAULT NULL,
  `water_position` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='网站配置' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cd_config_upload`
--

INSERT INTO `cd_config_upload` (`id`, `title`, `upload_replace`, `thumb_status`, `water_status`, `thumb_type`, `thumb_width`, `thumb_height`, `water_position`, `status`) VALUES
(3, '默认配置', 0, 1, 0, 2, '100', '100', 5, 1),
(4, 'banner水印', 0, 0, 1, 0, '', '', 9, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cd_content`
--

CREATE TABLE IF NOT EXISTS `cd_content` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `hit` int(10) unsigned NOT NULL COMMENT '//浏览量',
  `title` varchar(250) DEFAULT NULL,
  `class_id` tinyint(4) DEFAULT NULL,
  `tag` varchar(1000) DEFAULT NULL COMMENT '//标签',
  `weixin` varchar(255) DEFAULT NULL COMMENT '//微信',
  `pic` varchar(250) DEFAULT NULL,
  `video_url` varchar(1000) DEFAULT NULL COMMENT '//视频链接',
  `detail` text,
  `status` tinyint(4) DEFAULT NULL,
  `section1` varchar(255) DEFAULT NULL,
  `section2` varchar(255) DEFAULT NULL,
  `section3` varchar(255) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `jumpurl` varchar(250) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `description` text,
  `views` varchar(250) DEFAULT '1',
  `sortid` varchar(250) DEFAULT NULL,
  `author` varchar(250) DEFAULT NULL,
  `praise` int(10) unsigned NOT NULL COMMENT '//点赞',
  PRIMARY KEY (`content_id`),
  KEY `title` (`title`),
  KEY `class_id` (`class_id`),
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- 转存表中的数据 `cd_content`
--

INSERT INTO `cd_content` (`content_id`, `hit`, `title`, `class_id`, `tag`, `weixin`, `pic`, `video_url`, `detail`, `status`, `section1`, `section2`, `section3`, `position`, `jumpurl`, `create_time`, `keyword`, `description`, `views`, `sortid`, `author`, `praise`) VALUES
(33, 18, '关于我们', 7, NULL, NULL, '/uploads/admin/15719903877292.png', NULL, '<p>恩多高有限公司</p>', 10, NULL, NULL, NULL, '', '', 1571973712, '', '', '', '33', 'admin', 0),
(48, 33, '图文', 22, '', '', '/uploads/admin/15731106061790.jpg', '', '', 10, '', '', '', '', '', 1571992945, '', '', '', '48', 'admin', 1),
(49, 19, '视频课程22', 23, '', '', '/uploads/admin/15731106355531.jpg', '', '', 10, '', '', '', '', '', 1571993024, '', '', '', '49', 'admin', 1),
(50, 59, '视频课程', 23, '', '', '/uploads/admin/15731106279512.jpg', '', '<p>视频课程</p>', 10, '', '', '', '', '', 1571995630, '', '', '', '50', 'admin', 0),
(51, 464, '视频课程1234', 23, '', '', '/uploads/admin/15731106178119.jpg', 'www.baidu.com', '', 10, '', '', '', '', '', 1571996767, '', '', '', '51', 'admin', 0),
(52, 0, '熊圆圆', 10, '高级营养师', 's1149365497', '/uploads/admin/15731108806781.jpg', '', '<p>熊圆圆营养师</p>', 10, '', '', '', '', '', 1572068700, '', '', '', '52', 'admin', 0),
(53, 9, '消息中心', 11, '', '', '', '', '<p>恩多高消息消息</p>', 10, NULL, NULL, NULL, '', '', 1572926649, '', '', '', '53', 'admin', 0),
(54, 0, '六个月长三厘米', 8, '', '', '', '', '', 10, NULL, NULL, NULL, '', '', 1573107329, '', '', '', '54', 'admin', 0),
(55, 0, '高圆圆', 10, '高级营养师', 's1149365497', '/uploads/admin/15731108675842.jpg', '', '', 10, '11111', '2222', '3', '', '', 1573110297, '', '', '', '55', 'admin', 0);

-- --------------------------------------------------------

--
-- 表的结构 `cd_diet_records`
--

CREATE TABLE IF NOT EXISTS `cd_diet_records` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `food_id` varchar(1000) NOT NULL COMMENT '//食物id',
  `list` varchar(1000) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL COMMENT '//',
  `type_id` int(11) NOT NULL COMMENT '//早中晚餐',
  PRIMARY KEY (`data_id`),
  KEY `food_id` (`food_id`(255)),
  KEY `uid` (`uid`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `cd_diet_records`
--

INSERT INTO `cd_diet_records` (`data_id`, `title`, `uid`, `food_id`, `list`, `addtime`, `type_id`) VALUES
(25, '你是猪吗', 22, '', '[{"food_id":0,"unit_id":2,"count":5},{"food_id":0,"unit_id":2,"count":5}]', '1573700156', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cd_extend`
--

CREATE TABLE IF NOT EXISTS `cd_extend` (
  `extend_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `table_name` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `sortid` tinyint(4) DEFAULT NULL COMMENT '排序',
  `action` varchar(50) DEFAULT NULL COMMENT '操作方法',
  `orderby` varchar(50) DEFAULT NULL COMMENT '默认排序',
  PRIMARY KEY (`extend_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `cd_extend`
--

INSERT INTO `cd_extend` (`extend_id`, `title`, `table_name`, `status`, `type`, `sortid`, `action`, `orderby`) VALUES
(23, '测试模型 所有字段测试', 'case', 10, 1, 1, '', ''),
(24, '资讯模型', 'pro', 10, 1, 1, 'add,update,delete,view', ''),
(25, '订单列表', 'order_list', 10, 2, 2, 'delete', ''),
(27, '收货管理', 'shouhuo', 10, 2, 3, 'delete', ''),
(28, '消息中心', 'test', 10, 2, 1, 'add,update,delete', ''),
(29, '会员积分管理', 'integral_list', 10, 2, 4, 'delete', '1'),
(30, '问题反馈', 'problem', 10, 2, 5, 'delete', ''),
(31, '点赞管理列表', 'praise', 10, 2, 6, 'delete', ''),
(32, 'banner', 'banner', 10, 2, 100, 'add,update,delete', '');

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_banner`
--

CREATE TABLE IF NOT EXISTS `cd_ext_banner` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `imglist` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cd_ext_banner`
--

INSERT INTO `cd_ext_banner` (`data_id`, `title`, `imglist`, `url`) VALUES
(1, 'banner', '/uploads/admin/15734374856984.jpg', 'www.baidu.com');

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_case`
--

CREATE TABLE IF NOT EXISTS `cd_ext_case` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `content_id` int(100) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `des` varchar(250) DEFAULT NULL,
  `images` text,
  `files` text,
  `thumb` varchar(250) DEFAULT NULL,
  `markt_price` decimal(10,2) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `flah` varchar(250) DEFAULT NULL,
  `wb` text,
  `datetime` int(10) DEFAULT NULL,
  `xheditor` text,
  `ueditor` text,
  `money` decimal(10,2) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `zb` varchar(250) DEFAULT NULL,
  `province` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_integral_list`
--

CREATE TABLE IF NOT EXISTS `cd_ext_integral_list` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '//user_id',
  `email` varchar(250) DEFAULT NULL,
  `content` text,
  `create_time` int(10) DEFAULT NULL,
  `ip` varchar(250) DEFAULT NULL,
  `integral` int(11) NOT NULL COMMENT '//积分',
  `type` varchar(250) DEFAULT '0',
  PRIMARY KEY (`data_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- 转存表中的数据 `cd_ext_integral_list`
--

INSERT INTO `cd_ext_integral_list` (`data_id`, `user_id`, `email`, `content`, `create_time`, `ip`, `integral`, `type`) VALUES
(80, 21, NULL, NULL, 1571722466, '59.52.204.43', 1, '1'),
(81, 21, NULL, NULL, 1573722573, '59.52.204.43', 1, '1');

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_order_list`
--

CREATE TABLE IF NOT EXISTS `cd_ext_order_list` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) DEFAULT NULL,
  `mobil` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `qq` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `images` text,
  `sex` tinyint(4) DEFAULT NULL,
  `detail` text,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cd_ext_order_list`
--

INSERT INTO `cd_ext_order_list` (`data_id`, `username`, `mobil`, `email`, `qq`, `address`, `thumb`, `images`, `sex`, `detail`, `time`) VALUES
(2, '何应敏', '13545028471', '274363574@qq.com', '274363574', '湖北武汉', '', '', 2, '<p>测试内容</p>', 1555257600),
(3, '赵莎莎', '13545028471', '274363574@qq.com', '274363574', '鄂城区泽林镇', '/uploads/admin/15729241354334.jpg', '/uploads/admin/15729241319002.jpg|', 1, '<p>测试内容</p>', 1556208000),
(4, '艾一方', '13545028471', '274363574@qq.com', '67766767', '鄂城区泽林镇', '/uploads/admin/15729241103301.png', '/uploads/admin/15729240889765.png|', 2, '<p>测试内容</p>', 1546302770);

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_praise`
--

CREATE TABLE IF NOT EXISTS `cd_ext_praise` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `content_id` varchar(250) DEFAULT NULL,
  `uid` varchar(250) DEFAULT NULL,
  `addtime` varchar(250) DEFAULT '0',
  PRIMARY KEY (`data_id`),
  KEY `content_id` (`content_id`),
  KEY `uid` (`uid`),
  KEY `uid_2` (`uid`),
  KEY `uid_3` (`uid`),
  KEY `uid_4` (`uid`),
  KEY `uid_5` (`uid`),
  KEY `uid_6` (`uid`),
  KEY `uid_7` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_pro`
--

CREATE TABLE IF NOT EXISTS `cd_ext_pro` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `content_id` int(100) DEFAULT NULL,
  `images` text,
  `thumb` varchar(250) DEFAULT NULL,
  `copyfrom` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `cd_ext_pro`
--

INSERT INTO `cd_ext_pro` (`data_id`, `content_id`, `images`, `thumb`, `copyfrom`) VALUES
(1, 69, '/uploads/admin/15561974668031.jpg|', '/uploads/admin/15560893258682.jpg', 'admin'),
(2, 14, '/uploads/admin/15561975022371.jpg|', '/uploads/admin/15561975053977.jpg', NULL),
(3, 70, '/uploads/admin/15562952088667.jpg|/uploads/admin/15562952071453.jpg|', '/uploads/admin/15562952174067.jpg', 'admin'),
(5, 49, NULL, NULL, NULL),
(6, 50, NULL, NULL, NULL),
(7, 51, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_problem`
--

CREATE TABLE IF NOT EXISTS `cd_ext_problem` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `problemtype` varchar(250) DEFAULT NULL,
  `discribe` varchar(250) DEFAULT NULL,
  `create_time` varchar(250) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `uid` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `cd_ext_problem`
--

INSERT INTO `cd_ext_problem` (`data_id`, `problemtype`, `discribe`, `create_time`, `img`, `uid`) VALUES
(3, '好卡', '描述', '2019-11-09 05:19:09', 'a:0:{}', '22'),
(4, '好卡', '描述', '2019-11-09 05:24:21', 'a:0:{}', '22'),
(5, '界面卡顿:', '古古惑惑还回家', '2019-11-13 03:28:32', 'a:0:{}', '21'),
(9, '', '', '2019-11-13 05:59:40', 'a:1:{i:0;s:46:"20191113/fbbf0cda2e0fe40aa8178164d1f717c50.jpg";}', '22'),
(10, '', '', '2019-11-13 06:00:05', 'a:1:{i:0;s:46:"20191113/e1f1997e111948c3fbc8137d853623590.jpg";}', '22');

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_shouhuo`
--

CREATE TABLE IF NOT EXISTS `cd_ext_shouhuo` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `uid` varchar(250) DEFAULT NULL,
  `sfz` varchar(250) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `addr` varchar(250) DEFAULT NULL,
  `relname` varchar(250) DEFAULT NULL,
  `sex` tinyint(4) DEFAULT NULL,
  `province` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `files` text,
  `name` varchar(250) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `goods_id` varchar(250) DEFAULT NULL,
  `mobile` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`data_id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- 转存表中的数据 `cd_ext_shouhuo`
--

INSERT INTO `cd_ext_shouhuo` (`data_id`, `uid`, `sfz`, `create_time`, `addr`, `relname`, `sex`, `province`, `city`, `district`, `files`, `name`, `school`, `goods_id`, `mobile`) VALUES
(49, '22', NULL, 1573282270, '江西南昌', NULL, NULL, NULL, NULL, NULL, NULL, '舒斌', NULL, '21', '18279559717');

-- --------------------------------------------------------

--
-- 表的结构 `cd_ext_test`
--

CREATE TABLE IF NOT EXISTS `cd_ext_test` (
  `data_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `description` text,
  `thumb` varchar(250) DEFAULT NULL,
  `content` text,
  `create_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cd_ext_test`
--

INSERT INTO `cd_ext_test` (`data_id`, `title`, `description`, `thumb`, `content`, `create_time`) VALUES
(1, '好消息，签到就送豪礼！！！', '恩多高很多好礼', '', '<div style="text-align: center;">恩多高很多好礼</div>', 1556288888);

-- --------------------------------------------------------

--
-- 表的结构 `cd_field`
--

CREATE TABLE IF NOT EXISTS `cd_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `extend_id` int(9) NOT NULL COMMENT '模块ID',
  `name` varchar(64) NOT NULL COMMENT '字段名称',
  `field` varchar(32) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '表单类型1输入框 2下拉框 3单选框 4多选框 5上传图片 6编辑器 7时间',
  `list_show` tinyint(4) NOT NULL COMMENT '列表显示',
  `align` varchar(12) DEFAULT NULL,
  `is_search` tinyint(4) DEFAULT NULL COMMENT '是否搜索',
  `config` varchar(255) DEFAULT NULL COMMENT '下拉框或者单选框默认值',
  `note` varchar(255) DEFAULT NULL COMMENT '提示信息',
  `message` varchar(255) DEFAULT NULL COMMENT '错误提示',
  `validate` varchar(32) DEFAULT NULL COMMENT '验证方式',
  `rule` mediumtext COMMENT '验证规则',
  `sortid` mediumint(9) DEFAULT '0' COMMENT '排序号',
  `default_value` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `extend_id` (`extend_id`) USING BTREE
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=694 ;

--
-- 转存表中的数据 `cd_field`
--

INSERT INTO `cd_field` (`id`, `extend_id`, `name`, `field`, `type`, `list_show`, `align`, `is_search`, `config`, `note`, `message`, `validate`, `rule`, `sortid`, `default_value`, `status`) VALUES
(619, 23, '缩略图', 'thumb', 8, 1, NULL, NULL, '', '', '', '', '', 1, '', 1),
(615, 23, '价格', 'price', 1, 1, NULL, NULL, '', '', '', '', '', 2, '', 0),
(616, 23, '描述', 'des', 1, 1, NULL, NULL, '', '', '', '', '', 3, '', 1),
(617, 23, '图集', 'images', 9, 1, NULL, NULL, '', '', '', '', '', 4, '', 1),
(618, 23, '附件', 'files', 10, 1, NULL, NULL, '', '', '', '', '', 5, '', 1),
(620, 23, '市场价', 'markt_price', 13, 1, NULL, NULL, '', '', '', '', '', 6, '10', 1),
(621, 23, '性别', 'sex', 2, 1, NULL, NULL, '男|1,女|2', '', '', '', '', 7, '2', 1),
(622, 23, '标识', 'flah', 4, 1, NULL, NULL, '推荐|1,置顶|2', '', '', '', '', 8, '', 1),
(623, 23, '文本域', 'wb', 6, 1, NULL, NULL, '', '', '', '', '', 9, '', 1),
(624, 23, '日期', 'datetime', 7, 1, NULL, NULL, '', '', '', '', '', 10, '', 1),
(625, 23, 'xheditor', 'xheditor', 11, 1, NULL, NULL, '', '', '', '', '', 11, '', 1),
(626, 23, '百度编辑器', 'ueditor', 16, 1, NULL, NULL, '', '', '', '', '', 12, '', 1),
(627, 23, '货币', 'money', 13, 1, NULL, NULL, '', '', '', '', '', 13, '', 1),
(629, 23, '颜色选择器', 'color', 18, 1, NULL, NULL, '', '', '', '', '', 14, '', 1),
(631, 23, '三级联动', 'province|city|district', 17, 1, NULL, NULL, '', '', '', '', '', 15, '', 1),
(635, 24, '图集', 'images', 9, 1, '', 1, '', '', '', 'notEmpty', '', 636, '', 1),
(636, 24, '缩略图', 'thumb', 8, 1, NULL, NULL, '', '', '', '', '', 654, '', 1),
(637, 25, '姓名', 'username', 1, 1, '', 1, '', '', '', 'notEmpty', '', 637, '', 1),
(638, 25, '电话', 'mobil', 1, 1, '', 1, '', '', '', '', '', 638, '', 1),
(639, 25, '邮箱', 'email', 1, 1, '', 1, '', '', '', '', '', 639, '', 1),
(640, 25, 'qq', 'qq', 1, 1, '', 1, '', '', '', '', '', 640, '', 1),
(641, 25, '住址', 'address', 1, 1, '', 0, '', '', '', '', '', 641, '', 1),
(642, 25, '缩略图', 'thumb', 8, 1, 'center', 0, '', '', '', '', '', 642, '', 1),
(643, 25, '图集', 'images', 9, 0, '', 0, '', '', '', '', '', 643, '', 1),
(644, 25, '性别', 'sex', 2, 1, 'center', 1, '男|1|primary,女|2|success', '', '', '', '', 644, '1', 1),
(647, 25, '日期', 'time', 7, 1, '', 0, '', '', '', '', '', 647, '', 1),
(645, 0, '详情', 'detail', 11, 0, NULL, NULL, '', '', '', '', '', 645, '', 1),
(646, 25, '详情', 'detail', 16, 0, '', 0, '', '', '', '', '', 646, '', 1),
(648, 27, '操作人名称', 'uid', 1, 1, '', 0, '', '', '', 'notEmpty', '', 646, '', 1),
(684, 27, '电话', 'mobile', 1, 1, '', 1, '', '', '', '', '', 652, '', 1),
(685, 30, '问题类型', 'problemtype', 1, 1, '', 0, '', '', '', '', '', 685, '', 1),
(681, 29, '积分交易类型', 'type', 1, 1, '', 1, '', '', '', '', '', 681, '', 1),
(686, 30, '描述', 'discribe', 1, 1, '', 0, '', '', '', '', '', 686, '', 1),
(653, 27, '创建时间', 'create_time', 12, 1, '', 1, '', '', '', '', '', 660, '', 1),
(654, 24, '来源', 'copyfrom', 1, 1, '', 1, '', '', '', '', '', 635, '', 1),
(655, 27, '收获地址', 'addr', 1, 1, '', 1, '', '', '', '', '', 655, '', 1),
(683, 27, '商品名称', 'goods_id', 1, 1, '', 0, '', '', '', '', '', 653, '', 1),
(687, 30, '添加时间', 'create_time', 1, 1, '', 0, '', '', '', '', '', 687, '', 1),
(660, 28, '标题', 'title', 1, 1, '', 1, '', '', '', '', '', 660, '', 1),
(661, 28, '描述', 'description', 6, 1, '', 1, '', '', '', '', '', 661, '', 1),
(679, 31, '会员id', 'uid', 1, 1, '', 1, '', '', '', '', '', 679, '', 1),
(663, 28, '内容', 'content', 11, 1, '', 0, '', '', '', '', '', 663, '', 1),
(664, 28, '创建时间', 'create_time', 12, 1, '', 1, '', '', '', '', '', 664, '', 1),
(682, 27, '姓名', 'name', 1, 1, '', 1, '', '', '', '', '', 647, '', 1),
(677, 31, '标题', 'title', 1, 1, '', 1, '', '', '', '', '', 677, '', 1),
(678, 31, '对应文章id', 'content_id', 1, 1, '', 1, '', '', '', '', '', 678, '', 1),
(674, 29, '获得积分', 'integral', 20, 1, '', 0, '', '', '', '', '', 675, '', 1),
(670, 29, '签到时间', 'create_time', 12, 1, '', 1, '', '', '', '', '', 680, '', 1),
(673, 29, 'IP', 'ip', 20, 1, '', 0, '', '', '', '', '', 679, '', 1),
(672, 29, '用户名称', 'user_id', 20, 1, '', 0, '', '', '', '', '', 672, '', 1),
(688, 30, '图片', 'img', 1, 1, '', 0, '', '', '', '', '', 688, '', 1),
(689, 30, '用户', 'uid', 1, 1, '', 0, '', '', '', '', '', 684, '', 1),
(690, 31, '点赞时间', 'addtime', 1, 1, '', 0, '', '', '', '', '', 690, '', 1),
(691, 32, '标题', 'title', 1, 1, '', 1, '', '', '', 'notEmpty', '', 691, '', 1),
(692, 32, '图片', 'imglist', 8, 1, 'center', 0, '', '', '', '', '', 692, '', 1),
(693, 32, '链接', 'url', 1, 1, '', 0, '', '', '', '', '', 693, '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cd_foods`
--

CREATE TABLE IF NOT EXISTS `cd_foods` (
  `content_id` int(10) NOT NULL AUTO_INCREMENT,
  `hit` int(10) unsigned NOT NULL COMMENT '//浏览量',
  `title` varchar(250) DEFAULT NULL,
  `class_id` tinyint(4) DEFAULT NULL,
  `tag` varchar(1000) DEFAULT NULL COMMENT '//标签',
  `weixin` varchar(255) DEFAULT NULL COMMENT '//微信',
  `pic` varchar(250) DEFAULT NULL,
  `video_url` varchar(1000) DEFAULT NULL COMMENT '//视频链接',
  `detail` text,
  `status` tinyint(4) DEFAULT NULL,
  `position` varchar(250) DEFAULT NULL,
  `jumpurl` varchar(250) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `description` text,
  `views` varchar(250) DEFAULT '1',
  `sortid` varchar(250) DEFAULT NULL,
  `author` varchar(250) DEFAULT NULL,
  `praise` int(10) unsigned NOT NULL COMMENT '//点赞',
  `tracedata` varchar(1000) DEFAULT NULL COMMENT '//微量元素',
  `energy_value` char(255) DEFAULT NULL,
  `weight` char(255) DEFAULT NULL,
  `unit` char(255) DEFAULT NULL,
  `protein` varchar(1000) DEFAULT '0' COMMENT '//蛋白质',
  `axunge` varchar(1000) NOT NULL DEFAULT '0' COMMENT '//脂肪',
  `carbohydrate` varchar(1000) NOT NULL DEFAULT '0' COMMENT '//碳水化合物',
  PRIMARY KEY (`content_id`),
  KEY `title` (`title`),
  KEY `class_id` (`class_id`),
  KEY `create_time` (`create_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `cd_foods`
--

INSERT INTO `cd_foods` (`content_id`, `hit`, `title`, `class_id`, `tag`, `weixin`, `pic`, `video_url`, `detail`, `status`, `position`, `jumpurl`, `create_time`, `keyword`, `description`, `views`, `sortid`, `author`, `praise`, `tracedata`, `energy_value`, `weight`, `unit`, `protein`, `axunge`, `carbohydrate`) VALUES
(2, 0, '苹果', 1, '', '', '/uploads/admin/15732081624303.jpg', '', '', 10, '', '', 1573209706, '', '', '', '2', 'admin', 0, '[]', '', '', '', '10', '60', '20'),
(3, 0, '梨', 1, '', '', '/uploads/admin/15732081932051.jpg', '', '', 10, '', '', 1573209697, '', '', '', '3', 'admin', 0, '[]', '', '', '', '60', '30', '40'),
(4, 0, '炒粉', 3, '', '', '/uploads/admin/15732081302553.jpg', '', '<p>啊实打实发</p>', 10, '', '', 1573209689, '', '', '', '4', 'admin', 0, '[]', '', '', '', '10', '20', '50'),
(5, 0, '香蕉', 1, '', '', '/uploads/admin/15732081197463.jpg', '', NULL, 10, '', '', 1573209673, '', '', '', '5', 'admin', 0, '[]', '', '', '', '20', '10', '30'),
(6, 0, '橘子', 1, '', '', '/uploads/admin/15732081138400.jpg', '', NULL, 10, NULL, '', 1573209677, '', '', '', '6', 'admin', 0, '[]', '', '', '', '10', '30', '50'),
(7, 0, '樱桃', 1, '', '维生素A', '/uploads/admin/15732081055487.jpg', '', NULL, 10, NULL, '', 1573209680, '', '', '', '7', 'admin', 0, '[["维生素A","0.1"],["维生素B","0.2"]]', '12', '5666', '毫克', '20', '30', '40'),
(8, 0, '猕猴桃', 1, NULL, NULL, '/uploads/admin/15732097439490.jpg', NULL, NULL, 10, NULL, NULL, 1573537863, NULL, NULL, '1', '8', 'admin', 0, '[["1","222"],["2","22"]]', '500', '10', '克', '10', '50', '30');

-- --------------------------------------------------------

--
-- 表的结构 `cd_frament`
--

CREATE TABLE IF NOT EXISTS `cd_frament` (
  `frament_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `pic` varchar(250) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`frament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `cd_frament`
--

INSERT INTO `cd_frament` (`frament_id`, `title`, `pic`, `content`) VALUES
(1, '首页简介', NULL, '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;深圳市XXXX电子有限公司办公室地址位于中国个经济特区，鹏城深圳，深圳深圳市福田区福虹路华强花园11栋602，于2014年03月03日在深圳市市场监督管理局注册...<a href="/html/gongsijianjie">详细&gt;&gt;</a></p>'),
(2, '用户协议', NULL, '<h3 style="text-align: center;"><span style="color: rgb(25, 25, 25);"><span style="font-size:18px;"><br /></span></span></h3><h3 style="text-align: center;"><span style="color: rgb(25, 25, 25);"><span style="font-size:18px;">恩多高用户协议</span></span></h3><div><span style="color:#191919;"><br /></span></div>'),
(3, '身高管理', NULL, '<div class="tbody"><div class="tbody_height"><div class="banner"><img src="http://edg.leteng.net/static/js/admin/img/banner.png" alt="" /></div><div class="con1"><div class="p1">身高还能管理？很多家长表示还是第一次听到。在欧美日韩等发达国家，身材普遍比我国人群高挑，表面上是基因遗传的原因，实际上是生长环境，营养，以及对身高的干预重视培养出来的结果。                  <br /><br />他们从孩子生下来就会对身高、体重进行检测，一旦发现生长水平偏低、生长速度缓慢，马上就会进行相应的干预，降低发生矮小的风险。然而中国的家长对孩子的身高却远不及发达国家的重视。特别是在当今社会各类竞争异常激烈的情况下，在爱情、婚姻、事业等竞争中，高个子的确拥有竞争优势，所以让孩子的身高成为绊脚石还是加分项，就取决于家长今天的关注度。</div></div><div class="con2">    <h1>孩子个子矮，遗传不背这个锅！</h1><img class="left" src="http://edg.leteng.net/static/js/admin/img/ico.png" alt="" /><img class="right" src="http://edg.leteng.net/static/js/admin/img/ico1.png" alt="" /><div class="cl"></div><div class="p1">很多家长都认为身高是遗传因素造成的，父母矮孩子也高不到哪里去，不重视身高问题，不及时干预纠正身高问题，错过最佳时期，造成终身遗憾。其实遗传因素对于孩子身高的影响只占30%左右，另外70%是环境因素的作用，身高不仅仅取决于遗传，环境因素至少起到三分之二的作用。所以孩子身高不完全受遗传影响，外在因素也不容忽视，加强锻炼，好的生活习惯以及充足营养都是孩子长高的关键。</div></div><div class="con3"><h1>如何预测孩子的未来身高呢？</h1><div class="p1">    家长都希望自己的孩子能够长高高，有一双大长腿和高挑的身材，对于孩子未来能长多高，很多家长都有过憧憬。其实身高是可以预测的，依据身高预测可以精确判断生长潜力空间，确定身高干预的最佳时机和方法。身高预测是一项系统工程对遗传身高、骨胳身高、趋势身高、影响身高的其他变量因素，如遗传基因等。遗传身高计算法：                      <img class="ico" src="http://edg.leteng.net/static/js/admin/img/ico2.png" alt="" />上面计算公式中,12这个数值，是成年男女平均身高的差值。以我国为例,18岁男性的平均身高为172厘米,18岁女性的平均身高为160厘米，二者相减为12厘米。因此也有的遗传身高计算公式中，这个系数的数值为13厘米。这样算出来的遗传身高是平均值，在这个平均值上下6.5厘米的范围内，都属于遗传身高的正常范围。</div><div class="btn">    <a href=""><img src="http://edg.leteng.net/static/js/admin/img/ico3.png" alt="" class="ico1" /></a><div class="text">立即预测未来身高</div><div class="iconfont icon-you"></div>    </div></div><div class="con4"><div class="left"><img src="http://edg.leteng.net/static/js/admin/img/line.png" alt="" /></div><div class="right"><div class="item"><div class="h1">0~3岁是宝宝长个黄金期</div><div class="cont">很多家长都认为身高是遗传因素造成的，父母矮孩子也高不到哪里去，不重视身高问题，不及时干预纠正身高问题，错过最佳时期，造成终身遗憾。其实遗传因素对于孩子身高的影响只占30%左右，另外70%是环境因素的作用，身高不仅仅取决于遗传，环境因素至少起到三分之二的作用。所以孩子身高不完全受遗传影响，外在因素也不容忽视，加强锻炼，好的生活习惯以及充足营养都是孩子长高的关键。恩多高，紧抓0~18岁成长关键黄金期，致力为中国家庭提供一流的健康管理综合服务。公司实力吸聚医疗机构儿科临床医师、临床营养师、运动助长管理师、医疗心理咨询师以及健康管理师等高层次人才，以儿童青少年身高管理为主体，以营养补充和膳食补充等自主产品为侧翼，遵循自然生长规律，以提升国人平均身高水平为使命，传导健康营养理念，为亿万家庭带来真诚专业的服务，良心有效的产品，让营养与健康的曙光，照亮每一个中国家庭。</div></div><div class="item"><div class="h1">4~6岁是孩子长个的黄金分界线</div><div class="cont">早一年管理孩子就能多长2-4cm。父母对孩子身高的关注和管理一定要趁早，因为遗传因素对于孩子身高的影响只占30%左右，另外70%是环境因素的作用，身高不仅仅取决于遗传，环境因素至少起到三分之二的作用。其实判定孩子矮小有一条黄金分界线，那就是4岁。在孩子4岁左右，人体内生长激素、甲状腺素已基本形成，饮食、睡眠、运动等习惯逐渐形成，这些条件对今后的生长发育都起着决定性作用。</div></div><div class="item"><div class="h1">7~12岁青春期前每早一年管理孩子就能多长2-4cm</div><div class="cont">通常女孩在10~12岁开始，男孩在12~14岁开始，身高则会出现突增，增长速度可以达到每年7~8厘米，快的可以达到10~12厘米。值得注意的是，如果孩子过早发育，孩子的骨骺线会提前闭合。有研究证明，孩子早发育一年，身高平均少长7cm。所以孩子年龄越小，骨骺的软骨层增生及分化越活跃，生长的潜力及空间越大。这时候家长千万不要等到孩子发育后期再治疗，因为此时骨骺接近闭合，生长潜力很小。4~6岁、7~12岁这个阶段，虽然不是高峰期，但每年身高增长较平稳且时间较长，青春前期的身高增长将完成整个人体身高80%左右的增长幅度，所以一定要赶在青春期启动前（女孩9岁、男孩10岁）针对性进行身高管理，青春期前每早一年管理孩子就能多长2-4cm。                             <br /><br />恩多高，紧抓0~18岁成长关键黄金期，致力为中国家庭提供一流的健康管理综合服务。公司实力吸聚医疗机构儿科临床医师、临床营养师、运动助长管理师、医疗心理咨询师以及健康管理师等高层次人才，以儿童青少年身高管理为主体，以营养补充和膳食补充等自主产品为侧翼，遵循自然生长规律，以提升国人平均身高水平为使命，传导健康营养理念，为亿万家庭带来真诚专业的服务，良心有效的产品，让营养与健康的曙光，照亮每一个中国家庭。</div></div><div class="item"><div class="h1">13~18岁抓住孩子最后生长高峰期</div><div class="cont">13~18岁是孩子进入青春期阶段，青春期也是孩子身高又一快速增长期。女孩约为10-14岁，男孩约为12-16岁之间，女生在整个青春期身高可以增长20~25厘米，男孩整个青春期增长25~30厘米。若生长提前减缓或停止，则导致错过生长高峰期，成年时身高则不尽人意。同时由于女性生理构造和进化的需要，更早的发育年龄也使得骨骺闭合一般比男性早，所以女孩子的长高时间相较男孩子更加急迫。                             <br /><br />恩多高，紧抓0~18岁成长关键黄金期，致力为中国家庭提供一流的健康管理综合服务。公司实力吸聚医疗机构儿科临床医师、临床营养师、运动助长管理师、医疗心理咨询师以及健康管理师等高层次人才，以儿童青少年身高管理为主体，以营养补充和膳食补充等自主产品为侧翼，遵循自然生长规律，以提升国人平均身高水平为使命，传导健康营养理念，为亿万家庭带来真诚专业的服务，良心有效的产品，让营养与健康的曙光，照亮每一个中国家庭</div></div></div><div class="cl"></div></div><div class="con5">    <div class="item"><div class="h1">以儿童青少年助长结果为导向，互联网+运营模式，线上线下打造一体化专业服务</div><div class="cont">汇聚各专业、各层次资深专家教授：蒋竞雄教授，从事儿科临床和儿童保健工作三十余年，主攻儿童营养和生长发育，在儿童身高管理和身高促进、儿童肥胖干预、婴幼儿喂养、儿童营养评价、婴幼儿过敏预防、儿童保健服务市场开发等方面有独到的见解和丰富的实践经验；肖敬民教授从事中医教学与临床经验诊断40余年，擅长中医疑难杂症；徐永庭教授，中原一代名医洪子云，李培生真传弟子，从事中医临床40余年，教学科研20多年，擅长中医治疗各种疑难杂症。用强大的医疗技术背景，丰富的实践经验，给予孩子专业、适合的解决方案，帮助孩子健康长高。</div>    </div>    <div class="item"><div class="h1">线上线下打造一体化专业服务</div><div class="cont">     <div class="label1">线上</div>恩多高布局了社交电商系统、入驻电商平台、专业的营养教育课程体系，针对成长阶段所带来身高影响的核心因素，紧抓影响一生长高的关键时期，帮助家长们足不出户就可以为您孩子的量身定制专业科学的助长解决方案。                         <div class="label2">线下</div>恩多高打造了江西省首家儿童青少年医疗保健机构，内设有临床营养生长发育科、内分泌科、中医儿科、儿童保健科、针灸推拿科、小儿内科、小儿外科、五官科、医学检验科9大科室，行业专家一对一专业指导，同时恩多高品牌入驻各大知名药房渠道，旨在为家长和孩子提供直观的体验与服务，面对面解决家长的疑惑。</div>    </div></div></div></div>');

-- --------------------------------------------------------

--
-- 表的结构 `cd_goods`
--

CREATE TABLE IF NOT EXISTS `cd_goods` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT '' COMMENT '//昵称',
  `headimgurl` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `relname` varchar(250) DEFAULT NULL,
  `amount` varchar(1000) DEFAULT NULL,
  `price` varchar(1000) NOT NULL COMMENT '//售价',
  `longitude` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `cd_goods`
--

INSERT INTO `cd_goods` (`m_id`, `name`, `nickname`, `headimgurl`, `status`, `create_time`, `relname`, `amount`, `price`, `longitude`) VALUES
(21, '商品2', '', '/uploads/admin/1572492710412.png', 10, 1572501539, NULL, '80', '20', NULL),
(22, '商品1', '', '/uploads/admin/15724926906514.png', 10, 1572501547, '', '0', '0', ''),
(25, '商品3', '', '/uploads/admin/1572492710412.png', 10, 1572501684, NULL, '500', '120', NULL),
(26, '小武', '', '/uploads/admin/1572492710412.png', 0, 1572501697, NULL, '80', '120', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cd_group`
--

CREATE TABLE IF NOT EXISTS `cd_group` (
  `group_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(36) DEFAULT NULL COMMENT '分组名称',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态 10正常 0禁用',
  `role` tinyint(4) DEFAULT NULL COMMENT '角色类别 1超级管理员 2普通管理员',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `cd_group`
--

INSERT INTO `cd_group` (`group_id`, `name`, `status`, `role`) VALUES
(1, '超级管理员', 10, 1),
(2, '运营人员', 10, 2);

-- --------------------------------------------------------

--
-- 表的结构 `cd_height_forecast`
--

CREATE TABLE IF NOT EXISTS `cd_height_forecast` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `sex` tinyint(1) NOT NULL DEFAULT '0',
  `father_h` varchar(255) DEFAULT NULL,
  `mother` varchar(255) DEFAULT NULL,
  `age` int(11) NOT NULL,
  `myheight` varchar(255) DEFAULT NULL,
  `myweight` varchar(255) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`data_id`),
  KEY `age` (`age`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cd_height_forecast`
--

INSERT INTO `cd_height_forecast` (`data_id`, `sex`, `father_h`, `mother`, `age`, `myheight`, `myweight`, `uid`, `addtime`) VALUES
(1, 1, NULL, NULL, 20, '160', NULL, 22, '1573544732');

-- --------------------------------------------------------

--
-- 表的结构 `cd_hook`
--

CREATE TABLE IF NOT EXISTS `cd_hook` (
  `hook_id` int(10) NOT NULL AUTO_INCREMENT,
  `hook_name` varchar(250) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) DEFAULT NULL,
  `sortid` varchar(250) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`hook_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `cd_hook`
--

INSERT INTO `cd_hook` (`hook_id`, `hook_name`, `description`, `status`, `sortid`, `create_time`) VALUES
(3, 'view_big_pic', '图片预览', 10, '3', 1555249194);

-- --------------------------------------------------------

--
-- 表的结构 `cd_link`
--

CREATE TABLE IF NOT EXISTS `cd_link` (
  `link_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `jumpurl` varchar(250) DEFAULT NULL,
  `catagory_id` tinyint(4) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `sortid` varchar(250) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `catagory_id` (`catagory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `cd_link`
--

INSERT INTO `cd_link` (`link_id`, `title`, `jumpurl`, `catagory_id`, `create_time`, `sortid`, `type`, `status`) VALUES
(8, '百度', 'http://www.baidu.com', 2, 1556094364, '100', 1, 10),
(9, '新浪', 'http://www.baidu.com', 1, 1556094375, '100', 1, 10),
(10, '腾讯', 'http://www.baidu.com', 1, 1556094394, '102', 2, 10);

-- --------------------------------------------------------

--
-- 表的结构 `cd_link_catagory`
--

CREATE TABLE IF NOT EXISTS `cd_link_catagory` (
  `catagory_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `sortid` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`catagory_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cd_link_catagory`
--

INSERT INTO `cd_link_catagory` (`catagory_id`, `title`, `sortid`) VALUES
(1, '默认分类', '100'),
(2, '底部链接', '2');

-- --------------------------------------------------------

--
-- 表的结构 `cd_log`
--

CREATE TABLE IF NOT EXISTS `cd_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `username` varchar(250) DEFAULT NULL,
  `event` varchar(250) DEFAULT NULL,
  `ip` varchar(250) DEFAULT NULL,
  `time` int(10) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111 ;

--
-- 转存表中的数据 `cd_log`
--

INSERT INTO `cd_log` (`log_id`, `user_id`, `username`, `event`, `ip`, `time`) VALUES
(4, 1, 'admin', '用户登录', '127.0.0.1', 1556096526),
(5, 6, 'zhaosha', '用户登录', '127.0.0.1', 1556102140),
(6, 1, 'admin', '用户登录', '127.0.0.1', 1556102187),
(27, 2, 'test01', '用户登录', '127.0.0.1', 1556366799),
(28, 1, 'admin', '用户登录', '127.0.0.1', 1556366828),
(29, 1, 'admin', '用户登录', '127.0.0.1', 1556437027),
(30, 1, 'admin', '用户登录', '127.0.0.1', 1556437360),
(31, 1, 'admin', '用户登录', '127.0.0.1', 1556441797),
(32, 2, 'test01', '用户登录', '127.0.0.1', 1556515814),
(33, 1, 'admin', '用户登录', '127.0.0.1', 1556515848),
(34, 2, 'test01', '用户登录', '127.0.0.1', 1556515885),
(35, 1, 'admin', '用户登录', '127.0.0.1', 1556515994),
(36, 2, 'test01', '用户登录', '127.0.0.1', 1556516392),
(37, 1, 'admin', '用户登录', '127.0.0.1', 1556516540),
(38, 1, 'admin', '用户登录', '127.0.0.1', 1556516580),
(39, 2, 'test01', '用户登录', '127.0.0.1', 1556516730),
(40, 1, 'admin', '用户登录', '127.0.0.1', 1556516771),
(41, 1, 'admin', '用户登录', '127.0.0.1', 1556614256),
(42, 1, 'admin', '用户登录', '127.0.0.1', 1556614332),
(43, 2, 'test01', '用户登录', '127.0.0.1', 1556622005),
(44, 1, 'admin', '用户登录', '127.0.0.1', 1556622126),
(45, 1, 'admin', '用户登录', '127.0.0.1', 1556774819),
(46, 2, 'test01', '用户登录', '127.0.0.1', 1556774949),
(47, 1, 'admin', '用户登录', '127.0.0.1', 1556774978),
(48, 2, 'test01', '用户登录', '127.0.0.1', 1556788360),
(49, 1, 'admin', '用户登录', '127.0.0.1', 1556788939),
(50, 1, 'admin', '用户登录', '127.0.0.1', 1556813470),
(51, 1, 'admin', '用户登录', '127.0.0.1', 1556855061),
(52, 1, 'admin', '用户登录', '127.0.0.1', 1557145343),
(53, 1, 'admin', '用户登录', '127.0.0.1', 1557192329),
(54, 1, 'admin', '用户登录', '127.0.0.1', 1570515782),
(55, 1, 'admin', '用户登录', '127.0.0.1', 1571303727),
(56, 1, 'admin', '用户登录', '127.0.0.1', 1571306623),
(57, 1, 'admin', '用户登录', '127.0.0.1', 1571361074),
(58, 1, 'admin', '用户登录', '127.0.0.1', 1571366185),
(59, 1, 'admin', '用户登录', '127.0.0.1', 1571370383),
(60, 1, 'admin', '用户登录', '127.0.0.1', 1571379465),
(61, 1, 'admin', '用户登录', '127.0.0.1', 1571447628),
(62, 1, 'admin', '用户登录', '127.0.0.1', 1571448389),
(63, 1, 'admin', '用户登录', '192.168.1.126', 1571474610),
(64, 1, 'admin', '用户登录', '182.85.212.17', 1571475314),
(65, 1, 'admin', '用户登录', '182.85.215.126', 1571622725),
(66, 1, 'admin', '用户登录', '182.85.215.126', 1571637114),
(67, 1, 'admin', '用户登录', '59.53.224.84', 1571713406),
(68, 1, 'admin', '用户登录', '59.53.224.84', 1571729732),
(69, 1, 'admin', '用户登录', '59.52.227.18', 1571748505),
(70, 1, 'admin', '用户登录', '59.52.206.70', 1571798324),
(71, 1, 'admin', '用户登录', '59.52.206.70', 1571811632),
(72, 1, 'admin', '用户登录', '182.85.212.65', 1571881012),
(73, 1, 'admin', '用户登录', '182.85.212.65', 1571903235),
(74, 1, 'admin', '用户登录', '59.53.226.64', 1571967367),
(75, 1, 'admin', '用户登录', '59.53.226.64', 1571968864),
(76, 1, 'admin', '用户登录', '59.53.226.64', 1571969928),
(77, 1, 'admin', '用户登录', '59.53.226.64', 1571970856),
(78, 1, 'admin', '用户登录', '59.53.222.202', 1572059827),
(79, 1, 'admin', '用户登录', '59.52.207.48', 1572414379),
(80, 1, 'admin', '用户登录', '59.52.207.48', 1572429563),
(81, 1, 'admin', '用户登录', '59.53.226.119', 1572485746),
(82, 1, 'admin', '用户登录', '182.85.213.16', 1572579435),
(83, 1, 'admin', '用户登录', '182.85.213.16', 1572580408),
(84, 1, 'admin', '用户登录', '59.52.227.96', 1572772259),
(85, 1, 'admin', '用户登录', '182.85.212.73', 1572832347),
(86, 1, 'admin', '用户登录', '182.85.212.73', 1572849927),
(87, 1, 'admin', '用户登录', '115.153.15.184', 1572876781),
(88, 1, 'admin', '用户登录', '59.52.227.111', 1572878951),
(89, 1, 'admin', '用户登录', '59.52.207.221', 1572916109),
(90, 1, 'admin', '用户登录', '59.52.207.221', 1572932368),
(91, 1, 'admin', '用户登录', '182.85.215.233', 1573002850),
(92, 1, 'admin', '用户登录', '182.85.215.233', 1573024559),
(93, 1, 'admin', '用户登录', '182.85.215.233', 1573034099),
(94, 1, 'admin', '用户登录', '59.63.146.196', 1573038128),
(95, 1, 'admin', '用户登录', '115.153.15.184', 1573055594),
(96, 1, 'admin', '用户登录', '182.85.215.36', 1573089930),
(97, 1, 'admin', '用户登录', '182.85.215.36', 1573093013),
(98, 1, 'admin', '用户登录', '59.63.146.188', 1573142830),
(99, 1, 'admin', '用户登录', '182.85.213.201', 1573175121),
(100, 1, 'admin', '用户登录', '182.85.213.201', 1573187899),
(101, 1, 'admin', '用户登录', '182.85.213.201', 1573207804),
(102, 1, 'admin', '用户登录', '59.53.226.255', 1573261809),
(103, 1, 'admin', '用户登录', '59.53.224.180', 1573435930),
(104, 1, 'admin', '用户登录', '59.53.224.180', 1573451685),
(105, 1, 'admin', '用户登录', '59.53.224.180', 1573463923),
(106, 1, 'admin', '用户登录', '182.85.215.113', 1573520831),
(107, 1, 'admin', '用户登录', '182.85.215.113', 1573524204),
(108, 1, 'admin', '用户登录', '59.52.205.24', 1573632098),
(109, 1, 'admin', '用户登录', '59.52.204.43', 1573715117),
(110, 1, 'admin', '用户登录', '59.52.204.43', 1573722233);

-- --------------------------------------------------------

--
-- 表的结构 `cd_member`
--

CREATE TABLE IF NOT EXISTS `cd_member` (
  `m_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT '' COMMENT '//昵称',
  `sex` tinyint(1) DEFAULT NULL COMMENT '//1男 2女',
  `mobile` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `headimgurl` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `create_time` int(10) DEFAULT NULL,
  `relname` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL COMMENT '//code',
  `amount` varchar(500) NOT NULL DEFAULT '0',
  `province` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `district` varchar(250) DEFAULT NULL,
  `color` varchar(250) DEFAULT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `longitude` varchar(250) DEFAULT NULL,
  `height` char(200) DEFAULT NULL COMMENT '//身高',
  `weight` char(200) DEFAULT NULL COMMENT '体重',
  `age` char(100) DEFAULT NULL COMMENT '//年龄',
  `openid` char(255) DEFAULT NULL,
  `unionid` char(255) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `mobile` (`mobile`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `cd_member`
--

INSERT INTO `cd_member` (`m_id`, `username`, `nickname`, `sex`, `mobile`, `email`, `headimgurl`, `status`, `create_time`, `relname`, `password`, `code`, `amount`, `province`, `city`, `district`, `color`, `birth`, `longitude`, `height`, `weight`, `age`, `openid`, `unionid`) VALUES
(11, '寒塘冷月', '寒风', 1, '13545028471', '274363574@qq.com', '/uploads/admin/15724926525377.png', 10, 1554866985, '吴城', '7f6ffaa6bb0b408017b62254211691b5', NULL, '8', '江西省', '吉安市', '遂川县', '#f61e1e', NULL, '{"longitude":114.297834,"latitude":30.588522,"address":"湖北省武汉市江岸区一元街街道武汉市中医医院"}', NULL, NULL, NULL, NULL, NULL),
(18, '用户17770571694', '好的', 1, '17770571694', NULL, NULL, 10, 1571466091, NULL, 'e10adc3949ba59abbe56e057f20f883e', '695679', '3', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '123456', '5555'),
(21, '用户15170429300', '鱼鱼', 0, '15170429300', NULL, NULL, 10, 1571813733, NULL, '14e1b600b1fd579f47433b88e8d85291', '205705', '5', NULL, NULL, NULL, NULL, NULL, NULL, '170', '50', '15', NULL, NULL),
(22, '用户17611509611', 'FPX牛逼', 1, '17611509611', NULL, '20191114/2282d94136e7c8fef8f161532761df95.jpg', 10, 1571820547, NULL, 'b206e95a4384298962649e58dc7b39d4', '105784', '512', NULL, NULL, NULL, NULL, NULL, NULL, '', '50', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cd_microelement`
--

CREATE TABLE IF NOT EXISTS `cd_microelement` (
  `frament_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `pic` varchar(250) DEFAULT NULL,
  `content` text,
  `transform_unit` int(255) DEFAULT NULL,
  PRIMARY KEY (`frament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `cd_microelement`
--

INSERT INTO `cd_microelement` (`frament_id`, `title`, `pic`, `content`, `transform_unit`) VALUES
(1, '维生素A', NULL, NULL, 10),
(2, '膳食纤维', NULL, NULL, NULL),
(3, '维生素D', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `cd_node`
--

CREATE TABLE IF NOT EXISTS `cd_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `val` varchar(255) NOT NULL,
  `pid` int(4) NOT NULL,
  `sortid` int(4) NOT NULL,
  `status` tinyint(4) DEFAULT '10' COMMENT '状态',
  `is_menu` tinyint(4) DEFAULT NULL,
  `icon` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=292 ;

--
-- 转存表中的数据 `cd_node`
--

INSERT INTO `cd_node` (`id`, `title`, `val`, `pid`, `sortid`, `status`, `is_menu`, `icon`) VALUES
(136, '会员管理', '/admin/Member', 0, 1, 10, 1, 'fa fa-user'),
(137, '添加', '/admin/Member/add', 136, 100, 10, NULL, NULL),
(138, '修改', '/admin/Member/update', 138, 100, 10, NULL, NULL),
(139, '充值', '/admin/Member/recharge', 136, 100, 10, NULL, NULL),
(140, '回收', '/admin/Member/backRecharge', 136, 100, 10, NULL, NULL),
(177, '会员列表', '/admin/Member/index', 136, 98, 10, NULL, NULL),
(141, '删除', '/admin/Member/delete', 136, 100, 10, NULL, NULL),
(142, '禁用', '/admin/Member/forbidden', 136, 100, 10, NULL, NULL),
(143, '启用', '/admin/Member/start', 136, 100, 10, NULL, NULL),
(144, '重置密码', '/admin/Member/updatePassword', 136, 100, 10, NULL, NULL),
(145, '批量修改', '/admin/Member/batchUpdate', 136, 100, 10, NULL, NULL),
(146, '查看数据', '/admin/Member/viewMember', 136, 99, 10, NULL, NULL),
(147, 'cms管理', '/admin/Cms', 0, 3, 10, 1, ''),
(148, '栏目管理', '/admin/Catagory', 147, 100, 10, 1, ''),
(149, '内容管理', '/admin/Content', 147, 100, 10, 1, ''),
(150, '碎片管理', '/admin/Frament', 147, 100, 10, 1, ''),
(151, '推荐位置管理', '/admin/Position', 147, 100, 1, 1, ''),
(152, '友情链接管理', '/admin/Linkcatagory', 152, 100, 10, NULL, NULL),
(153, '友情链接管理分类', '/admin/Linkcatagory', 250, 100, 10, 1, ''),
(154, '友情连接管理', '/admin/Link', 250, 100, 1, 1, ''),
(155, '添加', '/admin/Link/add', 154, 100, 10, NULL, NULL),
(156, '修改', '/admin/Link/update', 154, 100, 10, NULL, NULL),
(157, '删除', '/admin/Link/delete', 154, 100, 10, NULL, NULL),
(158, '添加', '/admin/Linkcatagory/add', 153, 100, 10, NULL, NULL),
(159, '修改', '/admin/Linkcatagory/update', 153, 100, 10, NULL, NULL),
(160, '删除', '/admin/Linkcatagory/delete', 153, 100, 10, NULL, NULL),
(161, '添加', '/admin/Position/add', 151, 100, 10, NULL, NULL),
(162, '修改', '/admin/Position/update', 151, 100, 10, NULL, NULL),
(163, '删除', '/admin/Position/delete', 151, 100, 10, NULL, NULL),
(164, '添加', '/admin/Frament/add', 150, 100, 10, NULL, NULL),
(165, '修改', '/admin/Frament/update', 150, 100, 10, NULL, NULL),
(166, '删除', '/admin/Frament/delete', 150, 100, 10, NULL, NULL),
(167, '添加', '/admin/Content/add', 149, 100, 10, NULL, NULL),
(168, '修改', '/admin/Content/update', 168, 100, 10, NULL, NULL),
(169, '删除', '/admin/Content/delete', 149, 100, 10, NULL, NULL),
(170, '修改', '/admin/Content/update', 149, 100, 10, NULL, NULL),
(171, '设置排序', '/admin/Content/updateSort', 149, 100, 10, NULL, NULL),
(172, '文章移动', '/admin/Content/move', 149, 100, 10, NULL, NULL),
(173, '设置推荐位', '/admin/Content/setPosition', 149, 100, 10, NULL, NULL),
(174, '删除推荐位', '/admin/Content/delPosition', 149, 100, 10, NULL, NULL),
(175, '文章发布草稿', '/admin/Content/setStatus', 149, 100, 10, NULL, NULL),
(176, '文章列表', '/admin/Content/index', 149, 99, 10, NULL, NULL),
(179, '碎片列表', '/admin/Frament/index', 150, 99, 10, NULL, NULL),
(180, '友情链接管理列表', '/admin/Linkcatagory/index', 153, 99, 10, NULL, NULL),
(181, '友情链接列表', '/admin/Link/index', 154, 99, 10, NULL, NULL),
(182, '设置排序', '/admin/Link/updateSort', 154, 100, 10, NULL, NULL),
(183, '栏目列表', '/admin/Catagory/index', 148, 100, 10, NULL, NULL),
(184, '添加', '/admin/Catagory/add', 148, 100, 10, NULL, NULL),
(185, '修改', '/admin/Catagory/update', 148, 100, 10, NULL, NULL),
(186, '删除', '/admin/Catagory/delete', 148, 100, 10, NULL, NULL),
(187, '设置排序', '/admin/Catagory/updateSort', 148, 100, 10, NULL, NULL),
(188, '移动排序', '/admin/Catagory/setSort', 148, 100, 10, NULL, NULL),
(189, '模型管理', '/admin/Extend', 0, 4, 10, 1, ''),
(190, '字段管理', '/admin/Field', 0, 5, 10, NULL, NULL),
(191, '模型列表', '/admin/Extend/index', 189, 100, 10, NULL, NULL),
(192, '添加', '/admin/Extend/add', 189, 100, 10, NULL, NULL),
(193, '修改', '/admin/Extend/update', 189, 100, 10, NULL, NULL),
(194, '删除', '/admin/Extend/delete', 189, 100, 10, NULL, NULL),
(195, '设置排序', '/admin/Extend/updateSort', 189, 100, 10, NULL, NULL),
(196, '字段列表', '/admin/Field/index', 190, 100, 10, NULL, NULL),
(197, '添加', '/admin/Field/add', 190, 100, 10, NULL, NULL),
(198, '修改', '/admin/Field/update', 190, 100, 10, NULL, NULL),
(199, '删除', '/admin/Field/delete', 190, 100, 10, NULL, NULL),
(200, '设置排序', '/admin/Field/updateSort', 190, 100, 10, NULL, NULL),
(201, '上下移动排序', '/admin/Field/setSort', 190, 100, 10, NULL, NULL),
(202, '插件管理', '/admin/Chajian', 0, 100, 1, 1, ''),
(203, '钩子管理', '/admin/Hook', 202, 100, 10, 1, ''),
(204, '插件管理', '/admin/Plugins', 202, 100, 10, 1, ''),
(205, '添加', '/admin/Hook/add', 203, 100, 10, NULL, NULL),
(206, '修改', '/admin/Hook/update', 203, 100, 10, NULL, NULL),
(207, '钩子列表', '/admin/Hook/index', 203, 99, 10, NULL, NULL),
(208, '删除', '/admin/Hook/delete', 203, 100, 10, NULL, NULL),
(209, '插件列表', '/admin/Plugins/index', 204, 100, 10, NULL, NULL),
(210, '添加', '//admin/Plugins/add', 204, 100, 10, NULL, NULL),
(211, '修改', '/admin/Plugins/update', 204, 100, 10, NULL, NULL),
(212, '删除', '/admin/Plugins/delete', 204, 100, 10, NULL, NULL),
(213, '系统管理', '/admin/Sys', 0, 100, 10, 1, 'fa fa-cogs'),
(214, '用户管理', '/admin/User', 213, 100, 10, 1, 'fa fa-user-secret nav-icon'),
(215, '分组管理', '/admin/Group', 213, 100, 10, 1, 'fa fa-user nav-icon'),
(216, '操作节点', '/admin/Node', 213, 100, 10, 1, ''),
(217, '登录日志', '/admin/Log', 213, 100, 10, 1, 'glyphicon glyphicon-log-in nav-icon'),
(218, '系统配置', '/admin/Config', 213, 100, 10, 1, 'glyphicon glyphicon-cog nav-icon'),
(219, '修改密码', '/admin/Base/password', 213, 100, 10, 1, 'fa fa-lock nav-icon'),
(220, '数据备份', '/admin/Backup', 213, 100, 10, 1, 'fa fa-share nav-icon'),
(221, '用户列表', '/admin/User/index', 214, 100, 10, NULL, NULL),
(222, '添加', '/admin/User/add', 214, 100, 10, NULL, NULL),
(223, '修改', '/admin/User/update', 214, 100, 10, NULL, NULL),
(224, '删除', '/admin/User/delete', 214, 100, 10, NULL, NULL),
(225, '修改密码', '/admin/User/updatePassword', 214, 100, 10, NULL, NULL),
(226, '分组列表', '/admin/Group/index', 215, 100, 10, NULL, NULL),
(227, '添加', '/admin/Group/add', 215, 100, 10, NULL, NULL),
(228, '修改', '/admin/Group/update', 215, 100, 10, NULL, NULL),
(229, '删除', '/admin/Group/delete', 215, 100, 10, NULL, NULL),
(230, '禁用', '/admin/Group/forbidden', 215, 100, 10, NULL, NULL),
(231, '启用', '/admin/Group/start', 215, 100, 10, NULL, NULL),
(232, '设置权限', '/admin/Base/auth', 215, 100, 10, NULL, NULL),
(233, '禁用', '/admin/User/forbidden', 214, 100, 10, NULL, NULL),
(234, '启用', '/admin/User/start', 214, 100, 10, NULL, NULL),
(235, '节点列表', '/admin/Node/index', 216, 100, 10, NULL, NULL),
(236, '添加', '/admin/Node/add', 216, 100, 10, NULL, NULL),
(237, '修改', '/admin/Node/update', 216, 100, 10, NULL, NULL),
(238, '删除', '/admin/Node/delete', 216, 100, 10, NULL, NULL),
(239, '日志列表', '/admin/Log/index', 217, 100, 10, NULL, NULL),
(240, '配置列表', '/admin/Config/index', 218, 100, 10, NULL, NULL),
(241, '修改密码', '/admin/Base/password', 219, 100, 10, NULL, NULL),
(242, '备份列表', '/admin/Backup/index', 220, 100, 10, NULL, NULL),
(243, '新建备份', '/admin/Backup/backupData', 220, 100, 10, NULL, NULL),
(244, '删除', '/admin/Backup/delete', 220, 100, 10, NULL, NULL),
(245, '数据列表', '/admin/Back/table', 220, 100, 10, NULL, NULL),
(246, '下载数据', '/admin/Backup/download', 220, 100, 10, NULL, NULL),
(247, '删除', '/admin/Log/delete', 217, 100, 10, NULL, NULL),
(250, '功能管理', '/admin/Function', 0, 4, 1, 1, ''),
(251, '推荐位列表', '/admin/Position/index', 151, 99, 10, NULL, NULL),
(252, '静态化身成', '/admin/DoHtml', 0, 6, 10, 1, ''),
(253, '生成首页', '/admin/DoHtml/doindex', 252, 100, 10, NULL, NULL),
(254, '生成列表页', '/admin/DoHtml/dolist', 252, 100, 10, NULL, NULL),
(255, '生成详情页', '/admin/DoHtml/doview', 252, 100, 10, NULL, NULL),
(256, '静态生成首页', '/admin/DoHtml/index', 252, 100, 10, NULL, NULL),
(257, '清除缓存', '/admin/Base/delCache', 213, 100, 10, 1, ''),
(258, '其他', '/admin/FormData', 0, 3, 10, 1, ''),
(259, '上传配置', '/admin/UploadConfig', 250, 100, 10, 1, 'fa fa-upload'),
(260, '配置列表', '/admin/UploadConfig/index', 259, 100, 10, NULL, ''),
(261, '添加配置', '/admin/UploadConfig/add', 259, 100, 10, 2, ''),
(262, '修改配置', '/admin/UploadConfig/update', 259, 100, 10, 2, ''),
(263, '删除配置', '/admin/UploadConfig/delete', 259, 100, 10, 2, ''),
(264, '积分商品', '/admin/Goods', 0, 2, 10, 1, ''),
(265, '积分列表', '/admin/Goods/index', 264, 100, 10, NULL, ''),
(266, '添加', '/admin/Goods/add', 264, 101, 10, NULL, ''),
(267, '删除', '/admin/Goods/delete', 264, 102, 10, NULL, ''),
(268, '食物管理', '/admin/Foods', 0, 1, 10, 1, ''),
(269, '栏目管理', '/admin/Catagory_foods', 268, 1, 10, 1, ''),
(270, '栏目列表', '/admin/Catagory_foods/index', 269, 1, 10, 1, ''),
(271, '添加', '/admin/Catagory_foods/add', 269, 2, 10, NULL, ''),
(272, '修改', '/admin/Catagory_foods/update', 269, 3, 10, NULL, ''),
(273, '删除', '/admin/Catagory_foods/delect', 269, 5, 10, NULL, ''),
(274, '设置排序', '/admin/Catagory_foods/updateSort', 269, 6, 10, NULL, ''),
(275, '内容管理', '/admin/Foods', 268, 2, 10, 1, ''),
(276, '内容列表', '/admin/Foods/index', 275, 1, 10, NULL, ''),
(277, '添加', '/admin/Foods/add', 275, 2, 10, NULL, ''),
(278, '修改', '/admin/Foods/update', 275, 3, 10, NULL, ''),
(279, '删除', '/admin/Foods/delect', 275, 100, 10, NULL, ''),
(280, '设置排序', '/admin/Foods/updateSort', 275, 100, 10, NULL, ''),
(282, '计量单位', '/admin/Unit', 268, 100, 10, 1, ''),
(283, '添加', '/admin/Unit/add', 282, 100, 10, NULL, ''),
(284, '修改', '/admin/Unit/update', 282, 100, 10, NULL, ''),
(285, '删除', '/admin/Unit/delect', 282, 100, 10, NULL, ''),
(286, '单位列表', '/admin/Unit/index', 282, 100, 10, NULL, ''),
(287, '微量元素', '/admin/Microelement', 268, 100, 10, 1, ''),
(288, '添加', '/admin/Microelement/add', 287, 100, 10, NULL, ''),
(289, '修改', '/admin/Microelement/update', 287, 100, 10, NULL, ''),
(290, '删除', '/admin/Microelement/delect', 287, 100, 10, NULL, ''),
(291, '微量元素列表', '/admin/Microelement/index', 287, 100, 10, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `cd_plugins`
--

CREATE TABLE IF NOT EXISTS `cd_plugins` (
  `plugins_id` int(10) NOT NULL AUTO_INCREMENT,
  `plugins_name` varchar(250) DEFAULT NULL,
  `plugins_dir` varchar(250) DEFAULT NULL,
  `description` text,
  `version` varchar(250) DEFAULT NULL,
  `author` varchar(250) DEFAULT NULL,
  `hook_name` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`plugins_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cd_plugins`
--

INSERT INTO `cd_plugins` (`plugins_id`, `plugins_name`, `plugins_dir`, `description`, `version`, `author`, `hook_name`, `status`, `type`) VALUES
(1, '图片预览', 'viewbigpic', '列表以及表单鼠标移动上去放大显示图片', '1.0.0', 'xhadmin', 'view_big_pic', 10, 3);

-- --------------------------------------------------------

--
-- 表的结构 `cd_position`
--

CREATE TABLE IF NOT EXISTS `cd_position` (
  `position_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `sortid` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cd_position`
--

INSERT INTO `cd_position` (`position_id`, `title`, `sortid`) VALUES
(1, '推荐', '100'),
(2, '热点', '100');

-- --------------------------------------------------------

--
-- 表的结构 `cd_sigin_integral`
--

CREATE TABLE IF NOT EXISTS `cd_sigin_integral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oneday` varchar(255) DEFAULT NULL COMMENT '//连续一天积分',
  `towday` varchar(255) DEFAULT NULL COMMENT '//连续两天积分',
  `threeday` varchar(255) DEFAULT NULL COMMENT '//连续三天积分',
  `fourday` varchar(255) DEFAULT NULL COMMENT '//连续四天积分',
  `fiveday` varchar(255) DEFAULT NULL COMMENT '//连续五天积分',
  `six` varchar(255) DEFAULT NULL COMMENT '//连续六天积分',
  `sevenday` varchar(255) DEFAULT NULL COMMENT '//连续七天积分',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `cd_singin_day`
--

CREATE TABLE IF NOT EXISTS `cd_singin_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `continue_day` varchar(11) NOT NULL DEFAULT '0' COMMENT '//连续天数',
  `addtime` int(11) NOT NULL COMMENT '//添加时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `cd_singin_day`
--

INSERT INTO `cd_singin_day` (`id`, `uid`, `continue_day`, `addtime`) VALUES
(7, 21, '1', 1573722573);

-- --------------------------------------------------------

--
-- 表的结构 `cd_unit`
--

CREATE TABLE IF NOT EXISTS `cd_unit` (
  `frament_id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `pic` varchar(250) DEFAULT NULL,
  `content` text,
  `transform_unit` int(255) DEFAULT NULL,
  PRIMARY KEY (`frament_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cd_unit`
--

INSERT INTO `cd_unit` (`frament_id`, `title`, `pic`, `content`, `transform_unit`) VALUES
(1, '份', NULL, NULL, 1000),
(2, '碗', NULL, NULL, 500);

-- --------------------------------------------------------

--
-- 表的结构 `cd_user`
--

CREATE TABLE IF NOT EXISTS `cd_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL COMMENT '姓名',
  `user` varchar(24) DEFAULT NULL COMMENT '登录用户名',
  `pwd` varchar(32) DEFAULT NULL COMMENT '登录密码',
  `group_id` tinyint(4) DEFAULT NULL COMMENT '所属分组ID',
  `type` tinyint(4) DEFAULT NULL COMMENT '账户类型 1超级管理员 2普通管理员',
  `note` varchar(128) DEFAULT NULL COMMENT '备注',
  `status` tinyint(4) DEFAULT NULL COMMENT '10正常 0禁用',
  `create_time` int(10) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `cd_user`
--

INSERT INTO `cd_user` (`user_id`, `name`, `user`, `pwd`, `group_id`, `type`, `note`, `status`, `create_time`) VALUES
(1, '舒小武', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '超级管理员', 10, 1504862392);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
