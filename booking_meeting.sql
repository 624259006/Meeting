/*
 Navicat Premium Data Transfer

 Source Server         : localhost-3306
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : booking_meeting

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 21/05/2023 18:01:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for booking
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking`  (
  `B_ID` int NOT NULL AUTO_INCREMENT,
  `B_START_DATETIME` datetime NULL DEFAULT NULL,
  `B_END_DATETIME` datetime NULL DEFAULT NULL,
  `CREATE_AT` datetime NULL DEFAULT NULL,
  `CREATE_BY` int NULL DEFAULT NULL,
  `UPDATE_AT` datetime NULL DEFAULT NULL,
  `UPDATE_BY` int NULL DEFAULT NULL,
  `IS_ACTIVE` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'Y' COMMENT '0 = Not Active, 1 = Active',
  PRIMARY KEY (`B_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `USER_ID` int NOT NULL AUTO_INCREMENT,
  `FIRSTNAME` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LASTNAME` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ID_CARD` int NOT NULL,
  `EMAIL` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PASSWORD` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PHONE` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `PROFILE_PATH` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `USER_POSITION` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `IP_ADDRESS` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `LAST_LOGIN` datetime NULL DEFAULT NULL,
  `CREATE_AT` datetime NOT NULL,
  `CREATE_BY` int NOT NULL COMMENT '-1 = System',
  `UPDATE_AT` datetime NULL DEFAULT NULL,
  `UPDATE_BY` int NULL DEFAULT NULL,
  `USER_ACTIVE` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0' COMMENT '0 = Not Active, 1 = Active, 2 = Block',
  PRIMARY KEY (`USER_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
