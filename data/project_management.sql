/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : project_management

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2013-07-10 18:15:29
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `core_member`
-- ----------------------------
DROP TABLE IF EXISTS `core_member`;
CREATE TABLE `core_member` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of core_member
-- ----------------------------

-- ----------------------------
-- Table structure for `pm_backlog`
-- ----------------------------
DROP TABLE IF EXISTS `pm_backlog`;
CREATE TABLE `pm_backlog` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `sprint_id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pm_backlog
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
-- Table structure for `pm_project_member`
-- ----------------------------
DROP TABLE IF EXISTS `pm_project_member`;
CREATE TABLE `pm_project_member` (
  `member_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `time_on_project` int(11) NOT NULL COMMENT '在项目上的有效时间',
  PRIMARY KEY (`member_id`,`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pm_project_member
-- ----------------------------

-- ----------------------------
-- Table structure for `pm_sprint`
-- ----------------------------
DROP TABLE IF EXISTS `pm_sprint`;
CREATE TABLE `pm_sprint` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pm_sprint
-- ----------------------------

-- ----------------------------
-- Table structure for `pm_status`
-- ----------------------------
DROP TABLE IF EXISTS `pm_status`;
CREATE TABLE `pm_status` (
  `id` int(11) NOT NULL,
  `type` enum('') NOT NULL,
  `value` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pm_status
-- ----------------------------

-- ----------------------------
-- Table structure for `pm_task`
-- ----------------------------
DROP TABLE IF EXISTS `pm_task`;
CREATE TABLE `pm_task` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `summary` text NOT NULL,
  `sprint_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `assign_member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pm_task
-- ----------------------------
