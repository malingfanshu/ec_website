/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : ec_website

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-03-02 18:06:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ec_brand
-- ----------------------------
DROP TABLE IF EXISTS `ec_brand`;
CREATE TABLE `ec_brand` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '品牌名',
  `brand_intro` text CHARACTER SET utf8 COMMENT '品牌介绍',
  `brand_logo` text CHARACTER SET utf8 COMMENT '品牌logo图',
  `create_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '创建时间',
  `status` enum('0','1','2') DEFAULT '1' COMMENT '品牌状态（1：正常；2：冻结）',
  `remarks` text CHARACTER SET utf8 COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_brand
-- ----------------------------
INSERT INTO `ec_brand` VALUES ('1', '小米', '小米是......', null, '1456388453', '1', '');

-- ----------------------------
-- Table structure for ec_cart
-- ----------------------------
DROP TABLE IF EXISTS `ec_cart`;
CREATE TABLE `ec_cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '唯一标识',
  `member_id` bigint(20) unsigned DEFAULT NULL COMMENT '用户id',
  `goods_id` bigint(20) DEFAULT NULL COMMENT '商品id',
  `quantity` int(11) DEFAULT NULL COMMENT '该商品数量',
  `create_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '商品添加时间',
  `remarks` text CHARACTER SET utf8 COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_cart
-- ----------------------------

-- ----------------------------
-- Table structure for ec_discount
-- ----------------------------
DROP TABLE IF EXISTS `ec_discount`;
CREATE TABLE `ec_discount` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '折扣活动id',
  `discount_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '限时折扣名',
  `discount` decimal(5,2) DEFAULT NULL COMMENT '折扣',
  `description` text CHARACTER SET utf8 COMMENT '描述',
  `goods_id` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '限时折扣参与商品id',
  `start_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '开始时间',
  `end_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '结束时间',
  `create_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '创建时间',
  `status` enum('2','1','0') CHARACTER SET utf8 DEFAULT '0' COMMENT '折扣活动状态（0：等待审核；1：正常；2：暂停）',
  `remarks` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_discount
-- ----------------------------
INSERT INTO `ec_discount` VALUES ('1', '限时折扣活动1', '6.50', '活动描述1', '1,2', '1455421001', '1486463000', '1455420009', '1', null);

-- ----------------------------
-- Table structure for ec_empty
-- ----------------------------
DROP TABLE IF EXISTS `ec_empty`;
CREATE TABLE `ec_empty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_empty
-- ----------------------------

-- ----------------------------
-- Table structure for ec_goods
-- ----------------------------
DROP TABLE IF EXISTS `ec_goods`;
CREATE TABLE `ec_goods` (
  `goods_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goods_common_id` bigint(50) DEFAULT NULL COMMENT '同种商品ID',
  `goods_name` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '商品名',
  `goods_short_tag` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '商品短标签',
  `goods_long_tag` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT '商品长标签',
  `goods_pic` text CHARACTER SET utf8 COMMENT '商品图片',
  `gc_id` bigint(20) DEFAULT NULL COMMENT '所属分类id',
  `goods_market_price` decimal(18,4) DEFAULT '0.0000' COMMENT '市场价',
  `status` enum('2','1','0') CHARACTER SET utf8 DEFAULT '1' COMMENT '商品状态（0：下架；1：正常；2：冻结）',
  `goods_storage` bigint(20) unsigned DEFAULT '0' COMMENT '商品库存',
  `goods_brand` bigint(20) unsigned DEFAULT NULL COMMENT '品牌id',
  `goods_price` decimal(18,4) DEFAULT '0.0000' COMMENT '商品价格',
  `goods_spec` text CHARACTER SET utf8 COMMENT '规格字段（区分不同颜色等，json格式字符串）',
  `goods_details` text CHARACTER SET utf8 COMMENT '商品详情',
  `remarks` text CHARACTER SET utf8 COMMENT '备注',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_goods
-- ----------------------------
INSERT INTO `ec_goods` VALUES ('1', '1', '红米手机2 红色 标准版', 'short_tag1', 'long_tag1', null, '7', '10.0000', '1', '0', '0', '9.0000', '\r\n{\"specification\":[[{\"spec_id\":\"101\",\"spec_name\":\"\\u7ea2\\u8272\"},{\"spec_id\":\"102\",\"spec_name\":\"\\u84dd\\u8272\"}],[{\"spec_id\":\"201\",\"spec_name\":\"\\u6807\\u51c6\\u7248\"},{\"spec_id\":\"202\",\"spec_name\":\"\\u9ad8\\u914d\\u7248\"}]],\"direction\":[{\"spec_id_set\":\"101|201\",\"goods_id\":\"1\"},{\"spec_id_set\":\"101|202\",\"goods_id\":\"3\"},{\"spec_id_set\":\"102|201\",\"goods_id\":\"2\"},{\"spec_id_set\":\"102|202\",\"goods_id\":\"4\"}]}', '详情1', null);
INSERT INTO `ec_goods` VALUES ('2', '1', '红米手机2 蓝色 标准版', 'short_tag2', 'long_tag2', null, '7', '11.0000', '1', '100', '0', '10.0000', '\r\n{\"specification\":[[{\"spec_id\":\"101\",\"spec_name\":\"\\u7ea2\\u8272\"},{\"spec_id\":\"102\",\"spec_name\":\"\\u84dd\\u8272\"}],[{\"spec_id\":\"201\",\"spec_name\":\"\\u6807\\u51c6\\u7248\"},{\"spec_id\":\"202\",\"spec_name\":\"\\u9ad8\\u914d\\u7248\"}]],\"direction\":[{\"spec_id_set\":\"101|201\",\"goods_id\":\"1\"},{\"spec_id_set\":\"101|202\",\"goods_id\":\"3\"},{\"spec_id_set\":\"102|201\",\"goods_id\":\"2\"},{\"spec_id_set\":\"102|202\",\"goods_id\":\"4\"}]}', '详情2', null);
INSERT INTO `ec_goods` VALUES ('3', '1', '红米手机2 红色 高配版', 'short_tag3', 'long_tag3', null, '7', '12.0000', '1', '100', '0', '11.0000', '\r\n{\"specification\":[[{\"spec_id\":\"101\",\"spec_name\":\"\\u7ea2\\u8272\"},{\"spec_id\":\"102\",\"spec_name\":\"\\u84dd\\u8272\"}],[{\"spec_id\":\"201\",\"spec_name\":\"\\u6807\\u51c6\\u7248\"},{\"spec_id\":\"202\",\"spec_name\":\"\\u9ad8\\u914d\\u7248\"}]],\"direction\":[{\"spec_id_set\":\"101|201\",\"goods_id\":\"1\"},{\"spec_id_set\":\"101|202\",\"goods_id\":\"3\"},{\"spec_id_set\":\"102|201\",\"goods_id\":\"2\"},{\"spec_id_set\":\"102|202\",\"goods_id\":\"4\"}]}', '详情3', null);
INSERT INTO `ec_goods` VALUES ('4', '1', '红米手机2 蓝色 高配版', 'short_tag4', 'long_tag4', null, '11', '13.0000', '1', '0', '0', '12.0000', '\r\n{\"specification\":[[{\"spec_id\":\"101\",\"spec_name\":\"\\u7ea2\\u8272\"},{\"spec_id\":\"102\",\"spec_name\":\"\\u84dd\\u8272\"}],[{\"spec_id\":\"201\",\"spec_name\":\"\\u6807\\u51c6\\u7248\"},{\"spec_id\":\"202\",\"spec_name\":\"\\u9ad8\\u914d\\u7248\"}]],\"direction\":[{\"spec_id_set\":\"101|201\",\"goods_id\":\"1\"},{\"spec_id_set\":\"101|202\",\"goods_id\":\"3\"},{\"spec_id_set\":\"102|201\",\"goods_id\":\"2\"},{\"spec_id_set\":\"102|202\",\"goods_id\":\"4\"}]}', '详情4', null);

-- ----------------------------
-- Table structure for ec_goods_class
-- ----------------------------
DROP TABLE IF EXISTS `ec_goods_class`;
CREATE TABLE `ec_goods_class` (
  `gc_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `gc_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '分类名',
  `gc_description` text CHARACTER SET utf8 COMMENT '分类描述',
  `gc_parent_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '父级分类id',
  `gc_pic` text CHARACTER SET utf8 COMMENT '分类图片',
  `gc_sort` bigint(20) unsigned DEFAULT '0' COMMENT '排序字段',
  `remarks` text CHARACTER SET utf8 COMMENT '备注',
  PRIMARY KEY (`gc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_goods_class
-- ----------------------------
INSERT INTO `ec_goods_class` VALUES ('1', '一级分类1', '无描述', '0', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('2', '一级分类2', '无描述', '0', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('3', '二级分类1', '无描述', '1', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('4', '二级分类2', '无描述', '1', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('5', '二级分类3', '无描述', '2', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('6', '二级分类4', '无描述', '2', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('7', '三级分类1', '无描述', '3', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('8', '三级分类2', '无描述', '3', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('9', '三级分类3', '无描述', '4', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('10', '三级分类4', '无描述', '4', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('11', '三级分类5', '无描述', '5', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('12', '三级分类6', '无描述', '5', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('13', '三级分类7', '无描述', '6', null, '0', null);
INSERT INTO `ec_goods_class` VALUES ('14', '三级分类8', '无描述', '6', null, '0', null);

-- ----------------------------
-- Table structure for ec_lock
-- ----------------------------
DROP TABLE IF EXISTS `ec_lock`;
CREATE TABLE `ec_lock` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `member_id` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户id',
  `ip` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'IP地址',
  `lock_reason` text CHARACTER SET utf8 COMMENT '被锁原因',
  `lock_grade` int(10) DEFAULT NULL COMMENT '被锁级别',
  `lock_time` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '被锁时间',
  `remarks` text CHARACTER SET utf8 COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_lock
-- ----------------------------

-- ----------------------------
-- Table structure for ec_member
-- ----------------------------
DROP TABLE IF EXISTS `ec_member`;
CREATE TABLE `ec_member` (
  `member_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '用户唯一编号',
  `nickname` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '用户昵称（只能用字母、数字和下划线，不能小于6位）',
  `cell_phone` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '手机号码',
  `true_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户真实姓名',
  `email_address` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '电子邮箱地址',
  `identification` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '标识',
  `password` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '登录密码（只能用数字、字母、下划线，大于6位，不能全用数字）',
  `money` decimal(18,4) DEFAULT NULL COMMENT '账户余额',
  `pay_password` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '支付密码（只能用数字、字母、下划线，大于6位，不能全用数字）',
  `status` enum('6','5','4','3','2','1') CHARACTER SET utf8 NOT NULL DEFAULT '1' COMMENT '会员状态（1：正常状态；6：未激活状态）',
  `create_time` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户创建时间',
  `login_ip` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '上一次登录的IP',
  `birthday` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '生日',
  `login_time` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '上一次登录时间',
  `remarks` text CHARACTER SET utf8 COMMENT '备注',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_member
-- ----------------------------
INSERT INTO `ec_member` VALUES ('1', 'ab_cd', '15577375746', null, null, null, 'f97e827a3e4d85273b5c333b92da4153', '0.0000', '', '1', '1453711913', null, null, '', null);
INSERT INTO `ec_member` VALUES ('5', 'a123sdf', null, null, '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo11454489875', 'f97e827a3e4d85273b5c333b92da4153', null, '1cd97b8fbbe8b4d37e4bbfec3e5fab3f', '6', '1454489876', null, '2016-02-19', null, null);

-- ----------------------------
-- Table structure for ec_system_member
-- ----------------------------
DROP TABLE IF EXISTS `ec_system_member`;
CREATE TABLE `ec_system_member` (
  `member_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `card_id` int(11) unsigned DEFAULT NULL COMMENT '工号',
  `nick_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '昵称',
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '密码',
  `true_name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '真实姓名',
  `member_authority` enum('6','5','4','3','2','1') CHARACTER SET utf8 DEFAULT NULL COMMENT '会员权限',
  `status` enum('6','5','4','3','2','1') CHARACTER SET utf8 DEFAULT NULL COMMENT '会员状态',
  `login_ip` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '登录IP',
  `login_time` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '登录时间',
  `create_time` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '创建时间',
  `remarks` varchar(30) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_system_member
-- ----------------------------

-- ----------------------------
-- Table structure for ec_system_message
-- ----------------------------
DROP TABLE IF EXISTS `ec_system_message`;
CREATE TABLE `ec_system_message` (
  `system_message_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '系统消息id',
  `method` enum('sns','email','sms') CHARACTER SET utf8 NOT NULL DEFAULT 'sms' COMMENT '系统消息方式',
  `type` enum('verification','code') NOT NULL DEFAULT 'code' COMMENT '系统消息类型',
  `target` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '发送目标',
  `identification` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '消息标识',
  `title` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '消息标题',
  `content` text CHARACTER SET utf8 COMMENT '消息内容',
  `send_time` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '发送消息的时间',
  `remarks` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`system_message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_system_message
-- ----------------------------
INSERT INTO `ec_system_message` VALUES ('3', 'sms', 'code', '15577375746', '12lotfsseo2fy', '身份验证', '{\"code\":\"553375\",\"product\":\"\\u9648\\u57f9\\u6377\\u5546\\u57ce\\u7684\\uff08\\u6211\\u624b\\u673a\\u53f7\\u88ab\\u9650\\u5236\\u4e86\\uff0c\\u7528\\u522b\\u7684\\u6d4b\\u8bd5\\u4e00\\u4e0b\\uff09\"}', '1453813660', null);
INSERT INTO `ec_system_message` VALUES ('7', 'sms', 'code', '15577375746', '14pde2yckb2lq', '身份验证', '{\"code\":\"573760\",\"product\":\"\\u9648\\u57f9\\u6377\\u5546\\u57ce\\u7684\\uff08\\u6211\\u624b\\u673a\\u53f7\\u88ab\\u9650\\u5236\\u4e86\\uff0c\\u7528\\u522b\\u7684\\u6d4b\\u8bd5\\u4e00\\u4e0b\\uff09\"}', '1453876499', null);
INSERT INTO `ec_system_message` VALUES ('8', 'sms', 'code', '15577375746', '101z90zqxzhhs', '身份验证', '{\"code\":\"335858\",\"product\":\"\\u9648\\u57f9\\u6377\\u5546\\u57ce\\u7684\\uff08\\u6211\\u624b\\u673a\\u53f7\\u88ab\\u9650\\u5236\\u4e86\\uff0c\\u7528\\u522b\\u7684\\u6d4b\\u8bd5\\u4e00\\u4e0b\\uff09\"}', '1453878632', null);
INSERT INTO `ec_system_message` VALUES ('14', 'email', 'verification', '18378305258@163.com', '83i1b5q39096bk140pltkad2c61453879458', '测试标题', '{\"information\":\"测试内容\"}', '1453879458', null);
INSERT INTO `ec_system_message` VALUES ('15', 'sms', 'code', '18378305258', '10fdeqrcwyrbw', '身份验证', '{\"code\":\"672899\",\"product\":\"\\u6ce8\\u518c\\u9a8c\\u8bc1\"}', '1454048566', null);
INSERT INTO `ec_system_message` VALUES ('16', 'sms', 'code', '18378305258', '10fdeqrg2jnsc', '身份验证', '{\"code\":\"992396\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454048752', null);
INSERT INTO `ec_system_message` VALUES ('17', 'sms', 'code', '18378305258', '15q897ncvw74m', '身份验证', '{\"code\":\"684587\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454052029', null);
INSERT INTO `ec_system_message` VALUES ('18', 'sms', 'code', '18378305258', 'zt9t7ncqs8u6', '身份验证', '{\"code\":\"944562\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454052478', null);
INSERT INTO `ec_system_message` VALUES ('19', 'sms', 'code', '18378305258', '14pde596zdoh9', '身份验证', '{\"code\":\"061964\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454052606', null);
INSERT INTO `ec_system_message` VALUES ('20', 'sms', 'code', '18378305258', 'z2birk6xnmjs', '身份验证', '{\"code\":\"277131\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454052822', null);
INSERT INTO `ec_system_message` VALUES ('21', 'sms', 'code', '18378305258', 'iv11r7da52me', '身份验证', '{\"code\":\"037344\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454053051', null);
INSERT INTO `ec_system_message` VALUES ('22', 'sms', 'code', '18378305258', '15pzlf11mf3l6', '身份验证', '{\"code\":\"910044\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454053351', null);
INSERT INTO `ec_system_message` VALUES ('23', 'sms', 'code', '18378305258', 'zddo3htd7fcn', '身份验证', '{\"code\":\"608155\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454310510', null);
INSERT INTO `ec_system_message` VALUES ('24', 'sms', 'code', '18378305258', 'z26bs5jruylo', '身份验证', '{\"code\":\"787091\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454311135', null);
INSERT INTO `ec_system_message` VALUES ('25', 'sms', 'code', '18378305258', 'z25dikgw2msu', '身份验证', '{\"code\":\"225298\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454397191', null);
INSERT INTO `ec_system_message` VALUES ('26', 'sms', 'code', '18378305258', 'z2biw29pp2sq', '身份验证', '{\"code\":\"666344\",\"product\":\"\\u6377\\u5546\\u57ce\\u7684\\u6ce8\\u518c\"}', '1454397354', null);
INSERT INTO `ec_system_message` VALUES ('27', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo11454463570', '测试标题', '测试内容', '1454463570', null);
INSERT INTO `ec_system_message` VALUES ('28', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo11454466454', '主题', '<font style=\'color:red\'>测试内容</font>,请30分钟内到<a href=http://www.baidu.com>http://www.baidu.com</a>完成注册', '1454466454', null);
INSERT INTO `ec_system_message` VALUES ('29', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>', '1454468131', null);
INSERT INTO `ec_system_message` VALUES ('30', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454468286', null);
INSERT INTO `ec_system_message` VALUES ('31', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454468697', null);
INSERT INTO `ec_system_message` VALUES ('32', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454468943', null);
INSERT INTO `ec_system_message` VALUES ('33', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454469361', null);
INSERT INTO `ec_system_message` VALUES ('34', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454469452', null);
INSERT INTO `ec_system_message` VALUES ('35', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454469629', null);
INSERT INTO `ec_system_message` VALUES ('36', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454469690', null);
INSERT INTO `ec_system_message` VALUES ('37', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454469730', null);
INSERT INTO `ec_system_message` VALUES ('38', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454469771', null);
INSERT INTO `ec_system_message` VALUES ('39', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454470112', null);
INSERT INTO `ec_system_message` VALUES ('40', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454470220', null);
INSERT INTO `ec_system_message` VALUES ('41', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454470275', null);
INSERT INTO `ec_system_message` VALUES ('42', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454470404', null);
INSERT INTO `ec_system_message` VALUES ('43', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454470776', null);
INSERT INTO `ec_system_message` VALUES ('44', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454470810', null);
INSERT INTO `ec_system_message` VALUES ('45', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454470953', null);
INSERT INTO `ec_system_message` VALUES ('46', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454471236', null);
INSERT INTO `ec_system_message` VALUES ('47', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454471315', null);
INSERT INTO `ec_system_message` VALUES ('48', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454471435', null);
INSERT INTO `ec_system_message` VALUES ('49', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454471491', null);
INSERT INTO `ec_system_message` VALUES ('50', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454478312', null);
INSERT INTO `ec_system_message` VALUES ('51', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454478356', null);
INSERT INTO `ec_system_message` VALUES ('52', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454478643', null);
INSERT INTO `ec_system_message` VALUES ('53', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454478935', null);
INSERT INTO `ec_system_message` VALUES ('54', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479084', null);
INSERT INTO `ec_system_message` VALUES ('55', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479214', null);
INSERT INTO `ec_system_message` VALUES ('56', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479357', null);
INSERT INTO `ec_system_message` VALUES ('57', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479388', null);
INSERT INTO `ec_system_message` VALUES ('58', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479480', null);
INSERT INTO `ec_system_message` VALUES ('59', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479615', null);
INSERT INTO `ec_system_message` VALUES ('60', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479740', null);
INSERT INTO `ec_system_message` VALUES ('61', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479845', null);
INSERT INTO `ec_system_message` VALUES ('62', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454479895', null);
INSERT INTO `ec_system_message` VALUES ('63', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454480253', null);
INSERT INTO `ec_system_message` VALUES ('64', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454482309', null);
INSERT INTO `ec_system_message` VALUES ('65', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454484589', null);
INSERT INTO `ec_system_message` VALUES ('66', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454484801', null);
INSERT INTO `ec_system_message` VALUES ('67', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo1', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo1</a></font>完成注册', '1454489531', null);
INSERT INTO `ec_system_message` VALUES ('68', 'email', 'verification', '18378305258@163.com', '87kkom73s2hgrhsiafh3ip9fo11454489875', '主题', '30分钟内，请到<font style=\'color:red\'><a target=\'_blank\' href=http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo11454489875>http://localhost/ec_website/index.php/Shop/Login/registerEmailVerify/identification/87kkom73s2hgrhsiafh3ip9fo11454489875</a></font>完成注册', '1454489876', null);

-- ----------------------------
-- Table structure for ec_test
-- ----------------------------
DROP TABLE IF EXISTS `ec_test`;
CREATE TABLE `ec_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `content` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ec_test
-- ----------------------------
INSERT INTO `ec_test` VALUES ('1', 'content1');
INSERT INTO `ec_test` VALUES ('2', null);
