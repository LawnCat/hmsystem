/*
 Navicat Premium Data Transfer

 Source Server         : test
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : hm_db

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 26/01/2024 17:51:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id` int(255) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '管理员账号',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '管理员姓名',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `age` int(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, '123456', 'cy', 'e10adc3949ba59abbe56e057f20f883e', '男', 18);

-- ----------------------------
-- Table structure for ticket
-- ----------------------------
DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `date` date NOT NULL,
  `count` int(255) NULL DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `info` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ticket
-- ----------------------------
INSERT INTO `ticket` VALUES (23, '      元旦双人票', '2024-01-01', 18, '11111', '元旦双人票是专为庆祝新年而设计的，适用于两名成人同时入园。此票包含园内所有活动和设施，让您和您的朋友或家人共度一个难忘的元旦佳节。凭票可免费携带一名身高未达1米的儿童入园，并享有快速通道和专属座位等特别待遇。');
INSERT INTO `ticket` VALUES (24, '    元旦单人票', '2023-12-28', 7, '100', '元旦单人票是专为庆祝新年的到来而设计的。持票人可享受一系列精彩纷呈的活动，包括但不限于文艺演出、庙会、烟花秀等。该票务产品适合个人或家庭使用，是您欢度元旦佳节的绝佳选择。');

-- ----------------------------
-- Table structure for ticket_user
-- ----------------------------
DROP TABLE IF EXISTS `ticket_user`;
CREATE TABLE `ticket_user`  (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(255) NULL DEFAULT NULL,
  `user_id` int(255) NULL DEFAULT NULL,
  `time` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 50 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of ticket_user
-- ----------------------------
INSERT INTO `ticket_user` VALUES (49, 24, 8, '2024-01-08 15:10:34');
INSERT INTO `ticket_user` VALUES (48, 24, 8, '2024-01-08 15:10:34');
INSERT INTO `ticket_user` VALUES (47, 24, 8, '2024-01-08 15:10:18');
INSERT INTO `ticket_user` VALUES (46, 24, 8, '2024-01-08 15:09:16');
INSERT INTO `ticket_user` VALUES (45, 24, 8, '2023-12-29 18:48:51');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(23) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `account` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '用户账号',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '用户姓名',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '用户密码',
  `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL COMMENT '用户性别',
  `age` int(255) NULL DEFAULT NULL COMMENT '用户年龄',
  `money` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT '0' COMMENT '用户余额',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (12, '654321', '123', 'c33367701511b4f6020ec61ded352059', '男', 18, '0');
INSERT INTO `user` VALUES (9, '123456789', 'cy', '25f9e794323b453885f5181f1b624d0b', '男', 18, '9200');
INSERT INTO `user` VALUES (8, '123456', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '男', 18, '-89');

SET FOREIGN_KEY_CHECKS = 1;
