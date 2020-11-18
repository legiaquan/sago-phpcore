/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50723
 Source Host           : localhost:3306
 Source Schema         : dbsago

 Target Server Type    : MySQL
 Target Server Version : 50723
 File Encoding         : 65001

 Date: 22/12/2018 15:57:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbadmin
-- ----------------------------
DROP TABLE IF EXISTS `tbadmin`;
CREATE TABLE `tbadmin`  (
  `id_admin` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `matkhau` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbadmin
-- ----------------------------
INSERT INTO `tbadmin` VALUES ('quan', 'Quân', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `tbadmin` VALUES ('hai', 'Hải', 'e10adc3949ba59abbe56e057f20f883e');

-- ----------------------------
-- Table structure for tbchitiethoadon
-- ----------------------------
DROP TABLE IF EXISTS `tbchitiethoadon`;
CREATE TABLE `tbchitiethoadon`  (
  `id_hoadon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluong` int(11) NULL DEFAULT NULL,
  `gia` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_hoadon`, `id_sanpham`) USING BTREE,
  INDEX `tbchitiethoadon_ibfk_2`(`id_sanpham`) USING BTREE,
  CONSTRAINT `tbchitiethoadon_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `tbsanpham` (`id_sanpham`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tbchitiethoadon_ibfk_3` FOREIGN KEY (`id_hoadon`) REFERENCES `tbhoadon` (`id_hoadon`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbchitiethoadon
-- ----------------------------
INSERT INTO `tbchitiethoadon` VALUES ('1543728248_quan', 2, 1, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1543728279_quan', 0, 1, 26497000);
INSERT INTO `tbchitiethoadon` VALUES ('1543728279_quan', 7, 1, 16110000);
INSERT INTO `tbchitiethoadon` VALUES ('1543728298_hai123', 1, 1, 15400000);
INSERT INTO `tbchitiethoadon` VALUES ('1543728298_hai123', 2, 1, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1543730851_quan', 8, 1, 4275000);
INSERT INTO `tbchitiethoadon` VALUES ('1543733351_quan', 1, 1, 15400000);
INSERT INTO `tbchitiethoadon` VALUES ('1543853441_quan', 0, 1, 26497000);
INSERT INTO `tbchitiethoadon` VALUES ('1543853441_quan', 2, 1, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1543858043_quan', 2, 2, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1544027082_quan', 0, 2, 26497000);
INSERT INTO `tbchitiethoadon` VALUES ('1544027082_quan', 1, 1, 15400000);
INSERT INTO `tbchitiethoadon` VALUES ('1544027082_quan', 2, 2, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1544027082_quan', 7, 1, 16110000);
INSERT INTO `tbchitiethoadon` VALUES ('1544028989_quan', 0, 1, 26497000);
INSERT INTO `tbchitiethoadon` VALUES ('1544028989_quan', 1, 1, 15400000);
INSERT INTO `tbchitiethoadon` VALUES ('1544030002_quan', 7, 1, 16110000);
INSERT INTO `tbchitiethoadon` VALUES ('1544496963_duong123', 2, 1, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1544496963_duong123', 7, 1, 16110000);
INSERT INTO `tbchitiethoadon` VALUES ('1544517274_quan', 8, 4, 4275000);
INSERT INTO `tbchitiethoadon` VALUES ('1545103532_quan', 1, 2, 15400000);
INSERT INTO `tbchitiethoadon` VALUES ('1545103532_quan', 2, 1, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1545468118_quan', 2, 1, 21850000);
INSERT INTO `tbchitiethoadon` VALUES ('1545468118_quan', 10, 2, 33250000);
INSERT INTO `tbchitiethoadon` VALUES ('1545468421_quan', 1, 1, 15400000);
INSERT INTO `tbchitiethoadon` VALUES ('1545468421_quan', 2, 1, 21850000);

-- ----------------------------
-- Table structure for tbhangdt
-- ----------------------------
DROP TABLE IF EXISTS `tbhangdt`;
CREATE TABLE `tbhangdt`  (
  `id_hangdt` int(11) NOT NULL,
  `tenhang` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_hangdt`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbhangdt
-- ----------------------------
INSERT INTO `tbhangdt` VALUES (0, 'Apple');
INSERT INTO `tbhangdt` VALUES (1, 'Samsung');
INSERT INTO `tbhangdt` VALUES (2, 'Sony');
INSERT INTO `tbhangdt` VALUES (3, 'Nokia');

-- ----------------------------
-- Table structure for tbhoadon
-- ----------------------------
DROP TABLE IF EXISTS `tbhoadon`;
CREATE TABLE `tbhoadon`  (
  `id_hoadon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ngaydat` date NOT NULL,
  `tennguoinhan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diachinguoinhan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sdtnguoinhan` int(11) NOT NULL,
  `tinhtrang` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ghichu` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  PRIMARY KEY (`id_hoadon`) USING BTREE,
  INDEX `tbhoadon_ibfk_2`(`id_user`) USING BTREE,
  CONSTRAINT `tbhoadon_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbthanhvien` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbhoadon
-- ----------------------------
INSERT INTO `tbhoadon` VALUES ('1543728248_quan', 'quan', '2018-12-02', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1543728279_quan', 'quan', '2018-12-02', 'Quân lê', 'TPHCM', 328248594, 'cancel', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1543728298_hai123', 'hai123', '2018-12-02', 'Hải', 'Bình Thuận', 123123123, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1543730851_quan', 'quan', '2018-12-02', 'Quân lê', 'TPHCM', 328248594, 'cancel', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1543733351_quan', 'quan', '2018-12-02', 'Quân lê', 'TPHCM', 328248594, 'pending', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1543853441_quan', 'quan', '2018-12-03', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1543858043_quan', 'quan', '2018-12-03', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1544027082_quan', 'quan', '2018-12-05', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1544028989_quan', 'quan', '2018-12-05', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1544030002_quan', 'quan', '2018-12-05', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1544496963_duong123', 'duong123', '2018-12-11', 'Biubiu', 'TP.HCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1544517274_quan', 'quan', '2018-12-11', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1545103532_quan', 'quan', '2018-12-18', 'Quân lê', 'TPHCM', 328248594, 'complete', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1545468118_quan', 'quan', '2018-12-22', 'Quân lê', 'TPHCM', 328248594, 'pending', 'ghichu');
INSERT INTO `tbhoadon` VALUES ('1545468421_quan', 'quan', '2018-12-22', 'Quân lê', 'VIET NAM', 328248594, 'cancel', 'ghichu');

-- ----------------------------
-- Table structure for tblienhe
-- ----------------------------
DROP TABLE IF EXISTS `tblienhe`;
CREATE TABLE `tblienhe`  (
  `id_lienhe` int(11) NOT NULL,
  `hoten` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cty` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ngaylienhe` date NOT NULL,
  PRIMARY KEY (`id_lienhe`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblienhe
-- ----------------------------
INSERT INTO `tblienhe` VALUES (14, 'Lê Gia Quân', 'SAGOPHONE', 'quanle51297@gmail.com', 328248594, 'đà nẵng', 'Đề nghị nhân viên phục vụ có thái độ tốt hơn đối với khách hàng', '2013-12-20');

-- ----------------------------
-- Table structure for tbnhomsanpham
-- ----------------------------
DROP TABLE IF EXISTS `tbnhomsanpham`;
CREATE TABLE `tbnhomsanpham`  (
  `id_nhom` int(11) NOT NULL,
  `tennhom` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id_nhom`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbnhomsanpham
-- ----------------------------
INSERT INTO `tbnhomsanpham` VALUES (0, 'Điện thoại');
INSERT INTO `tbnhomsanpham` VALUES (1, 'Phụ kiện');

-- ----------------------------
-- Table structure for tbsanpham
-- ----------------------------
DROP TABLE IF EXISTS `tbsanpham`;
CREATE TABLE `tbsanpham`  (
  `id_sanpham` int(11) NOT NULL,
  `id_hangdt` int(11) NOT NULL,
  `id_nhom` int(11) NOT NULL,
  `tensp` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hinhsp` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `new` int(11) NOT NULL,
  `seo` int(11) NOT NULL,
  PRIMARY KEY (`id_sanpham`) USING BTREE,
  INDEX `tbsanpham_ibfk_2`(`id_nhom`) USING BTREE,
  INDEX `tbsanpham_ibfk_5`(`id_hangdt`) USING BTREE,
  CONSTRAINT `tbsanpham_ibfk_2` FOREIGN KEY (`id_nhom`) REFERENCES `tbnhomsanpham` (`id_nhom`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `tbsanpham_ibfk_5` FOREIGN KEY (`id_hangdt`) REFERENCES `tbhangdt` (`id_hangdt`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbsanpham
-- ----------------------------
INSERT INTO `tbsanpham` VALUES (0, 0, 0, 'Iphone X', 'cảm giac thoải mái khi sử dụng', '0.jpg', 26497000, 1, 0, 1, 1);
INSERT INTO `tbsanpham` VALUES (1, 1, 0, 'Samsung Galaxy Note 9999', '1', '1.jpg', 22000000, 1, 30, 1, 1);
INSERT INTO `tbsanpham` VALUES (2, 0, 0, 'Iphone 8 Plus', '1', '2.jpg', 23000000, 1, 5, 1, 1);
INSERT INTO `tbsanpham` VALUES (5, 0, 0, 'Iphone 6', '1', '5.jpg', 6800000, 1, 15, 0, 0);
INSERT INTO `tbsanpham` VALUES (7, 1, 1, 'Samsung Galaxy S9', '1', '7.jpg', 17900000, 1, 10, 1, 1);
INSERT INTO `tbsanpham` VALUES (8, 3, 0, 'Nokia 5', '1', '8.jpg', 4500000, 1, 5, 1, 0);
INSERT INTO `tbsanpham` VALUES (10, 0, 1, 'Iphone Xs Max', '1', '10.jpg', 35000000, 1, 5, 1, 1);

-- ----------------------------
-- Table structure for tbthanhvien
-- ----------------------------
DROP TABLE IF EXISTS `tbthanhvien`;
CREATE TABLE `tbthanhvien`  (
  `hoten` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diachi` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `id_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hieuluc` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbthanhvien
-- ----------------------------
INSERT INTO `tbthanhvien` VALUES ('123123123123', 'thcl', 'quanle51297@gmail.com', 123123123, '123123123123', '101193d7181cc88340ae5b2b17bba8a1', '2018-12-13');
INSERT INTO `tbthanhvien` VALUES ('Biubiu', 'TP.HCM', 'biubiu@gmail.com', 328248594, 'duong123', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-11');
INSERT INTO `tbthanhvien` VALUES ('Hải', 'Bình Thuận', 'hai123@gmail.com', 123123123, 'hai123', 'e10adc3949ba59abbe56e057f20f883e', '2018-10-13');
INSERT INTO `tbthanhvien` VALUES ('Quân lê', 'VIET NAM', 'quanle51297@gmail.com', 328248594, 'quan', 'e10adc3949ba59abbe56e057f20f883e', '2012-10-10');
INSERT INTO `tbthanhvien` VALUES ('TÈO', 'BÌNH THẠNH', 'teo123@gmail.com', 328248594, 'teo123', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-22');
INSERT INTO `tbthanhvien` VALUES ('Test', 'HCM', 'test@gmail.com', 328248594, 'test123', 'e10adc3949ba59abbe56e057f20f883e', '2018-12-13');

SET FOREIGN_KEY_CHECKS = 1;
