/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : covid_questioner

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 15/02/2021 00:22:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for participant_answers
-- ----------------------------
DROP TABLE IF EXISTS `participant_answers`;
CREATE TABLE `participant_answers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `participant_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `code` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of participant_answers
-- ----------------------------

-- ----------------------------
-- Table structure for participants
-- ----------------------------
DROP TABLE IF EXISTS `participants`;
CREATE TABLE `participants`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `gender` enum('M','F') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_of_birth` date NULL DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `result` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of participants
-- ----------------------------

-- ----------------------------
-- Table structure for question_answers
-- ----------------------------
DROP TABLE IF EXISTS `question_answers`;
CREATE TABLE `question_answers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `score` int(11) NULL DEFAULT NULL,
  `code` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of question_answers
-- ----------------------------
INSERT INTO `question_answers` VALUES (3, 2, 'Ya', NULL, 'G2');
INSERT INTO `question_answers` VALUES (4, 2, 'Tidak', NULL, 'G02');
INSERT INTO `question_answers` VALUES (5, 3, 'Ya', NULL, 'G3');
INSERT INTO `question_answers` VALUES (6, 3, 'Tidak', NULL, 'G03');
INSERT INTO `question_answers` VALUES (7, 4, 'Ya', NULL, 'G4');
INSERT INTO `question_answers` VALUES (8, 4, 'Tidak', NULL, 'G04');
INSERT INTO `question_answers` VALUES (9, 5, 'Ya', NULL, 'G5');
INSERT INTO `question_answers` VALUES (10, 5, 'Tidak', NULL, 'G05');
INSERT INTO `question_answers` VALUES (11, 6, 'Ya', NULL, 'G6');
INSERT INTO `question_answers` VALUES (12, 6, 'Tidak', NULL, 'G06');
INSERT INTO `question_answers` VALUES (13, 7, 'Ya', NULL, 'G7');
INSERT INTO `question_answers` VALUES (14, 7, 'Tidak', NULL, 'G07');
INSERT INTO `question_answers` VALUES (15, 1, 'Ya', NULL, 'G1');
INSERT INTO `question_answers` VALUES (16, 1, 'Tidak', NULL, 'G01');

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `seq` int(11) NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES (1, 'Apakah anda menderita Demam?', 1, '2021-02-12 13:42:37', '2021-02-13 14:41:33');
INSERT INTO `questions` VALUES (2, 'Apakah anda menderita Pusing?', 2, '2021-02-12 13:43:37', '2021-02-12 13:43:37');
INSERT INTO `questions` VALUES (3, 'Apakah anda menderita Bersin-bersin?', 3, '2021-02-12 13:44:07', '2021-02-12 13:44:07');
INSERT INTO `questions` VALUES (4, 'Apakah anda menderita Batuk?', 4, '2021-02-12 13:44:30', '2021-02-12 13:44:30');
INSERT INTO `questions` VALUES (5, 'Apakah anda menderita Sakit Tenggorokan?', 5, '2021-02-12 13:45:02', '2021-02-12 13:45:02');
INSERT INTO `questions` VALUES (6, 'Apakah anda merasa mudah lelah?', 6, '2021-02-12 13:45:47', '2021-02-12 13:45:47');
INSERT INTO `questions` VALUES (7, 'Apakah anda menderita Nyeri Dada?', 7, '2021-02-12 13:46:13', '2021-02-12 13:46:13');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `remember_token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'administrator', '$2y$10$waSNNX1woPWw8Zr.HprpHu5MrnF62Z1isxydZ14KPvrc8csi3q4/i', 'Administrator', 'administrator@gmail.com', 'SaQJi6kpa9sahhUwooQLtVf602YPTEKZ3y2yMsEzj6mQiJyL1QmFbuCJezWZ', '2021-01-18 10:25:57', NULL);

SET FOREIGN_KEY_CHECKS = 1;
