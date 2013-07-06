/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : project_management

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-07-06 16:50:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `core_user`
-- ----------------------------
DROP TABLE IF EXISTS `core_user`;
CREATE TABLE `core_user` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of core_user
-- ----------------------------

-- ----------------------------
-- Table structure for `pm_project`
-- ----------------------------
DROP TABLE IF EXISTS `pm_project`;
CREATE TABLE `pm_project` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pm_project
-- ----------------------------

-- ----------------------------
-- Table structure for `pm_task`
-- ----------------------------
DROP TABLE IF EXISTS `pm_task`;
CREATE TABLE `pm_task` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `summary` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pm_task
-- ----------------------------
