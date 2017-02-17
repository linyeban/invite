/*
Navicat MySQL Data Transfer

Source Server         : zhile
Source Server Version : 50615
Source Host           : localhost:3306
Source Database       : zhile

Target Server Type    : MYSQL
Target Server Version : 50615
File Encoding         : 65001

Date: 2016-06-23 15:50:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for college
-- ----------------------------
DROP TABLE IF EXISTS `college`;
CREATE TABLE `college` (
  `collegeId` int(11) NOT NULL AUTO_INCREMENT COMMENT '学院代号',
  `collegeName` varchar(255) NOT NULL COMMENT '学院名称',
  PRIMARY KEY (`collegeId`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of college
-- ----------------------------
INSERT INTO `college` VALUES ('1', '农学院');
INSERT INTO `college` VALUES ('2', '园艺园林学院');
INSERT INTO `college` VALUES ('3', '生命科学学院');
INSERT INTO `college` VALUES ('4', '经贸学院');
INSERT INTO `college` VALUES ('5', '管理学院');
INSERT INTO `college` VALUES ('6', '信息科学与技术学院');
INSERT INTO `college` VALUES ('7', '轻工食品学院');
INSERT INTO `college` VALUES ('8', '机电工程学院');
INSERT INTO `college` VALUES ('9', '化学化工学院');
INSERT INTO `college` VALUES ('10', '环境科学与工程学院');
INSERT INTO `college` VALUES ('11', '何香凝艺术设计学院');
INSERT INTO `college` VALUES ('12', '外国语学院');
INSERT INTO `college` VALUES ('13', '城市建设学院 ');
INSERT INTO `college` VALUES ('14', '计算科学学院');
INSERT INTO `college` VALUES ('15', '自动化学院');
INSERT INTO `college` VALUES ('16', '人文与社会科学学院');
INSERT INTO `college` VALUES ('17', '动物科技学院');
INSERT INTO `college` VALUES ('18', '马克思主义学院');
INSERT INTO `college` VALUES ('19', '体育部');

-- ----------------------------
-- Table structure for company
-- ----------------------------
DROP TABLE IF EXISTS `company`;
CREATE TABLE `company` (
  `comName` varchar(255) NOT NULL,
  `comAddress` varchar(1024) DEFAULT NULL,
  `hrName` varchar(255) DEFAULT NULL,
  `phoneNum` varchar(255) DEFAULT NULL,
  `hrEmail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comName`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of company
-- ----------------------------
INSERT INTO `company` VALUES ('广州易风第二研发中心', '广州天河区五山五山路金山大厦北塔', '杨小姐', '13713434444', '999999999@qq.com');

-- ----------------------------
-- Table structure for job
-- ----------------------------
DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `jobId` int(11) NOT NULL AUTO_INCREMENT,
  `jobName` varchar(255) DEFAULT NULL,
  `comName` varchar(255) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  `needNum` int(11) DEFAULT NULL,
  `haveNum` int(11) DEFAULT '0',
  `college` varchar(255) DEFAULT NULL,
  `majorName` varchar(255) DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT '',
  `demand` varchar(1000) DEFAULT NULL COMMENT '要求',
  `salary` varchar(50) DEFAULT '' COMMENT '薪资',
  `welfare` varchar(1000) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '状态（0-未审核，1-审核通过）',
  `releaseTime` datetime DEFAULT NULL,
  PRIMARY KEY (`jobId`),
  KEY `FK_Relationship_1` (`comName`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of job
-- ----------------------------
INSERT INTO `job` VALUES ('15', 'Java高级工程师', '广州易风第二研发中心', '不限', '1', '0', '计算科学学院', '信息与计算科学', '本科以上', '广州天河区五山五山路金山大厦北塔', '熟悉spring、struts、hibernate等开源框架，具有实际的项目经验和开源框架使用能力,熟练使用js、css、html5, 熟悉Oracle、SQL Server、MySql等数据库开发、设计和忧化，以及服务端、客户端工具的使用,', '2000~4000元', '项目奖金,年终奖金,餐费补助,双休日,五险,股份期权,带薪年假,', '1', '2016-05-11 11:00:48');
INSERT INTO `job` VALUES ('28', '产品经理', '广州易风第二研发中心', '女', '1', '0', '计算科学学院', '统计学', '本科以上', '广州天河区五山五山路金山大厦北塔', '本科以上学历,2年以上硬件产品相关工作经验，至少主要负责过1款产品的从立项研发到发布的过程，并有产品质量控制的经验,熟悉硬件产品研发过程，掌握机械结构，电子电路，软件开发，包装设计，3C认证，硬件基本成本构成及核算等方面的基础知识,有项目管理经验，较强的沟通协调能力，具备独立硬件选型能力，具备丰富的与OEM/ODM、ID设计、模具厂商等供应商协同合作的经验,具有相关供应链背景,对智能硬件有浓厚兴趣并有深入了解，移动通讯相关产品如手机、GPS定位终端等为佳,', '2000以下', '五险一金,发展空间大,双休,', '1', '2016-05-11 15:46:22');

-- ----------------------------
-- Table structure for major
-- ----------------------------
DROP TABLE IF EXISTS `major`;
CREATE TABLE `major` (
  `majorId` int(11) NOT NULL AUTO_INCREMENT COMMENT '专业代号',
  `majorName` varchar(255) DEFAULT NULL COMMENT '专业名称',
  `collegeId` int(11) DEFAULT NULL COMMENT '学院代号',
  PRIMARY KEY (`majorId`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of major
-- ----------------------------
INSERT INTO `major` VALUES ('1', '农学', '1');
INSERT INTO `major` VALUES ('2', '植物保护', '1');
INSERT INTO `major` VALUES ('3', '种子科学与工程', '1');
INSERT INTO `major` VALUES ('4', '园艺', '2');
INSERT INTO `major` VALUES ('5', '园林', '2');
INSERT INTO `major` VALUES ('6', '草业科学', '2');
INSERT INTO `major` VALUES ('7', '生物技术', '3');
INSERT INTO `major` VALUES ('8', '生物科学', '3');
INSERT INTO `major` VALUES ('9', '国际经济与贸易', '4');
INSERT INTO `major` VALUES ('10', '会展经济与管理', '4');
INSERT INTO `major` VALUES ('11', '投资学', '4');
INSERT INTO `major` VALUES ('12', '农林经济与管理', '4');
INSERT INTO `major` VALUES ('13', '财务管理', '5');
INSERT INTO `major` VALUES ('14', '工商管理', '5');
INSERT INTO `major` VALUES ('15', '会计学', '5');
INSERT INTO `major` VALUES ('16', '人力资源管理', '5');
INSERT INTO `major` VALUES ('17', '市场营销', '5');
INSERT INTO `major` VALUES ('18', '计算机科学与技术', '6');
INSERT INTO `major` VALUES ('19', '网络工程', '6');
INSERT INTO `major` VALUES ('20', '信息管理与信息系统', '6');
INSERT INTO `major` VALUES ('21', '电子信息工程', '6');
INSERT INTO `major` VALUES ('22', '通信工程', '6');
INSERT INTO `major` VALUES ('23', '物联网工程', '6');
INSERT INTO `major` VALUES ('24', '自动化', '15');
INSERT INTO `major` VALUES ('25', '电气工程及其自动化', '15');
INSERT INTO `major` VALUES ('26', '食品科学与工程', '7');
INSERT INTO `major` VALUES ('27', '食品质量与安全', '7');
INSERT INTO `major` VALUES ('28', '生物工程', '7');
INSERT INTO `major` VALUES ('29', '包装工程', '7');
INSERT INTO `major` VALUES ('30', '机械电子工程', '8');
INSERT INTO `major` VALUES ('31', '机械设计制造及其自动化', '8');
INSERT INTO `major` VALUES ('32', '能源与动力工程', '8');
INSERT INTO `major` VALUES ('33', '能源与动力工程(制冷与空调技术[创新班])', '8');
INSERT INTO `major` VALUES ('34', '应用化学', '9');
INSERT INTO `major` VALUES ('35', '化学工程与工艺', '9');
INSERT INTO `major` VALUES ('36', '高分子材料与工程', '9');
INSERT INTO `major` VALUES ('37', '材料化学', '9');
INSERT INTO `major` VALUES ('38', '应用化学(分析检测[创新班])', '9');
INSERT INTO `major` VALUES ('39', '应用化学(涂料[创新班])', '9');
INSERT INTO `major` VALUES ('40', '环境科学', '10');
INSERT INTO `major` VALUES ('41', '环境工程', '10');
INSERT INTO `major` VALUES ('42', '资源环境科学', '10');
INSERT INTO `major` VALUES ('43', '产品设计', '11');
INSERT INTO `major` VALUES ('44', '环境艺术设计', '11');
INSERT INTO `major` VALUES ('45', '视觉传达设计', '11');
INSERT INTO `major` VALUES ('46', '商务英语', '12');
INSERT INTO `major` VALUES ('47', '英语', '12');
INSERT INTO `major` VALUES ('48', '日语', '12');
INSERT INTO `major` VALUES ('49', '城乡规划', '13');
INSERT INTO `major` VALUES ('50', '土木工程', '13');
INSERT INTO `major` VALUES ('51', '给排水科学与工程', '13');
INSERT INTO `major` VALUES ('52', '统计学', '14');
INSERT INTO `major` VALUES ('53', '信息与计算科学', '14');
INSERT INTO `major` VALUES ('54', '行政管理', '16');
INSERT INTO `major` VALUES ('55', '社会工作', '16');
INSERT INTO `major` VALUES ('56', '动物科学', '17');
INSERT INTO `major` VALUES ('57', '水产养殖学', '17');
INSERT INTO `major` VALUES ('58', '负责思想政治理论课教学与马克思主义中国化研究', '18');
INSERT INTO `major` VALUES ('59', '负责体育课教学与活动开展工作', '19');

-- ----------------------------
-- Table structure for notice
-- ----------------------------
DROP TABLE IF EXISTS `notice`;
CREATE TABLE `notice` (
  `noticeId` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '公告标题',
  `dateTime` datetime DEFAULT NULL COMMENT '招聘会时间',
  `clock` time DEFAULT NULL COMMENT '招聘会开始结束时间',
  `address` varchar(255) DEFAULT NULL COMMENT '举办地点',
  `publisher` varchar(255) DEFAULT NULL COMMENT '发布者',
  `releaseTime` date DEFAULT NULL COMMENT '发布时间',
  PRIMARY KEY (`noticeId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notice
-- ----------------------------
INSERT INTO `notice` VALUES ('1', '计算机科学学院招聘会', '2016-05-21 00:00:00', '13:00:00', '足球场', 'test', '2016-05-12');
INSERT INTO `notice` VALUES ('2', '计算机科学学院招聘会', '2016-05-30 00:00:00', '13:00:00', '足球场', 'test', '2016-05-11');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `email` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `identify` int(11) DEFAULT '1',
  `college` varchar(255) DEFAULT NULL,
  `sex` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('test@qq.com', 'test', '1', '2', 'undefined', '男');
INSERT INTO `user` VALUES ('admin@qq.com', 'admin', '1', '0', 'undefined', '男');
INSERT INTO `user` VALUES ('user@qq.com', 'user', '1', '1', '计算科学学院', '女');
