/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : 127.0.0.1:8889
 Source Schema         : uts_pwl

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 19/04/2022 10:57:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang` (
  `BRG_KODE` int(11) NOT NULL AUTO_INCREMENT,
  `BRG_NAMA` varchar(50) NOT NULL,
  `BRG_HARGA` int(11) NOT NULL,
  `BRG_GAMBAR` varchar(255) NOT NULL,
  `BRG_STOK` int(11) NOT NULL,
  PRIMARY KEY (`BRG_KODE`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `USER_KODE` int(11) NOT NULL AUTO_INCREMENT,
  `USER_NAMA` varchar(30) NOT NULL,
  `USER_EMAIL` varchar(30) NOT NULL,
  `USER_TELP` varchar(30) NOT NULL,
  `USER_PASSWORD` varchar(255) NOT NULL,
  `USER_PERAN` varchar(10) NOT NULL,
  PRIMARY KEY (`USER_KODE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
