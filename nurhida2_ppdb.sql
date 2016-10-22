/*
Navicat MySQL Data Transfer

Source Server         : localhost_127.0.0.1
Source Server Version : 50611
Source Host           : 127.0.0.1:3306
Source Database       : nurhida2_ppdb

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2016-10-22 10:58:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `namalengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nohp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `lastlogin` varchar(30) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'm45ter', '9eea5100816466046808db49f18e5ce9', 'Administrator', 'marsonosaputro@gmail.com', '085742324183', 'admin', 'N', '');

-- ----------------------------
-- Table structure for data_account
-- ----------------------------
DROP TABLE IF EXISTS `data_account`;
CREATE TABLE `data_account` (
  `id_account` int(3) NOT NULL AUTO_INCREMENT,
  `id_orangtua` int(3) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `last_log` datetime DEFAULT NULL,
  `tgldaftar` date DEFAULT NULL,
  `aktif` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_account
-- ----------------------------
INSERT INTO `data_account` VALUES ('113', '0', 'ajipr2813', 'e021e6d7cc77fb96f01d238df72f34b2', '0857123412323', 'wardana02@gmail.com', '2016-10-21 11:43:09', null, '1');

-- ----------------------------
-- Table structure for data_alamat
-- ----------------------------
DROP TABLE IF EXISTS `data_alamat`;
CREATE TABLE `data_alamat` (
  `id_siswa` char(5) NOT NULL DEFAULT '',
  `dusun` varchar(100) DEFAULT NULL,
  `rt` varchar(3) DEFAULT NULL,
  `rw` varchar(3) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `kecamatan` varchar(50) DEFAULT NULL,
  `kabupaten` varchar(50) DEFAULT NULL,
  `statusrumah` varchar(25) DEFAULT NULL,
  `jarakkesekolah` varchar(4) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `transportasi` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_alamat
-- ----------------------------
INSERT INTO `data_alamat` VALUES ('L-001', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-002', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-003', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-004', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-005', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-006', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-007', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-008', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-009', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-010', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-011', 'KALITENGAH', '23', '6', 'SIDODADI', 'MASARAN', 'SRAGEN', 'Milik Sendiri', '3', '', 'Mobil pribadi');
INSERT INTO `data_alamat` VALUES ('L-012', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-013', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-014', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-015', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-016', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-017', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-018', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-019', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-020', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-021', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-022', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-023', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-024', 'Perum Keira No.20, Jetis', '04', '10', 'Makamhaji', 'Kartasura', 'Sukoharjo', 'Milik Sendiri', '4', '02717905811', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-025', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-026', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-027', 'SANGGRAHAN', '1', '21', 'MAKAMHAJI', 'KARTOSURO', 'SUKOHARJO', 'Milik Sendiri', '7', '02717650466', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-028', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-029', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-030', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-031', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-032', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-033', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-034', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-035', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-036', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('L-037', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-001', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-002', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-003', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-004', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-005', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-006', 'Perumahan Nilagraha No. 93', '003', '008', 'Gonilan', 'Kartasura', 'Sukoharjo', 'Milik Sendiri', '4', '085725497657', 'Mobil pribadi');
INSERT INTO `data_alamat` VALUES ('P-007', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-008', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-009', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-010', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-011', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-012', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-013', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-014', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-015', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-016', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-017', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-018', 'Kahuripan no 9', '1', '11', 'Sumber', 'Banjarsari', 'Surakart', 'Milik Sendiri', '3', '', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-019', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-020', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-021', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-022', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-023', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-024', 'Gawanan Barat', '03', '02', 'Gawanan', 'Colomadu', 'Karang Anyar Solo', 'Ikut dengan nenek dan kak', '3', '081384713093', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-025', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-026', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-027', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-028', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-029', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-030', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-031', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-032', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-033', 'jajar', '05', '01', 'jajar', 'laweyan', 'Surakarta', 'Milik Sendiri', '1', '0271732041', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-034', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-035', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-036', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-037', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-038', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-039', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-040', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-041', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-042', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-043', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-044', 'Serangan', '06', '02', 'Blulukan', 'Colomadu', 'Karanganyar', 'Milik Sendiri', '5', '', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-045', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-046', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-047', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-048', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-049', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');
INSERT INTO `data_alamat` VALUES ('P-050', 'Hadirejo', '11', '04', 'Kateguhan', 'Sawit', 'Boyolali', 'Milik Sendiri', '15', '02717687225', 'Sepeda motor');

-- ----------------------------
-- Table structure for data_ayah
-- ----------------------------
DROP TABLE IF EXISTS `data_ayah`;
CREATE TABLE `data_ayah` (
  `id_siswa` char(5) NOT NULL DEFAULT '',
  `status_ortu` int(2) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `tempatlahir` varchar(30) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `alamatkantor` varchar(100) DEFAULT NULL,
  `jarakkekantor` int(4) DEFAULT NULL,
  `gaji` varchar(30) DEFAULT NULL,
  `bacaanquran` varchar(10) DEFAULT NULL,
  `haji` varchar(15) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_ayah
-- ----------------------------
INSERT INTO `data_ayah` VALUES ('L-001', null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for data_biaya
-- ----------------------------
DROP TABLE IF EXISTS `data_biaya`;
CREATE TABLE `data_biaya` (
  `id_siswa` char(5) NOT NULL DEFAULT '',
  `spp` int(12) DEFAULT NULL,
  `gedung` int(12) DEFAULT NULL,
  `grawadi` int(12) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_biaya
-- ----------------------------
INSERT INTO `data_biaya` VALUES ('L-001', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-002', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-003', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-004', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-005', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-006', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-007', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-008', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-009', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-010', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-011', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-012', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-013', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-014', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-015', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-016', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-017', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-018', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-019', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-020', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-021', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-022', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-023', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-024', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-025', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-026', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-027', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-028', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-029', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-030', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-031', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-032', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-033', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-034', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-035', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-036', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('L-037', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-001', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-002', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-003', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-004', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-005', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-006', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-007', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-008', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-009', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-010', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-011', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-012', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-013', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-014', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-015', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-016', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-017', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-018', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-019', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-020', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-021', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-022', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-023', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-024', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-025', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-026', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-027', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-028', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-029', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-030', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-031', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-032', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-033', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-034', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-035', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-036', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-037', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-038', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-039', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-040', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-041', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-042', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-043', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-044', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-045', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-046', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-047', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-048', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-049', '450000', '7000000', '600000');
INSERT INTO `data_biaya` VALUES ('P-050', '450000', '7000000', '600000');

-- ----------------------------
-- Table structure for data_ibu
-- ----------------------------
DROP TABLE IF EXISTS `data_ibu`;
CREATE TABLE `data_ibu` (
  `id_siswa` char(5) NOT NULL DEFAULT '',
  `nik` varchar(20) DEFAULT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `tempatlahir` varchar(30) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `alamatkantor` varchar(100) DEFAULT NULL,
  `jarakkekantor` int(4) DEFAULT NULL,
  `gaji` varchar(30) DEFAULT NULL,
  `bacaanquran` varchar(10) DEFAULT NULL,
  `haji` varchar(15) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_ibu
-- ----------------------------
INSERT INTO `data_ibu` VALUES ('L-001', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-002', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-003', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-004', '', 'Yuli Ariyani', 'Pati', '1978-07-28', 'S1', 'ibu rumah tangga', '', '0', '', '0', '0', '081393732345');
INSERT INTO `data_ibu` VALUES ('L-005', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-006', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-007', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-008', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-009', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-010', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-011', '3314034807790012', 'SINTA DEWI SUSANTI,S.E.', 'SURAKARTA', '1979-07-08', 'S1', 'SWASTA', 'JL.RAYA PALUR KARANGANYAR NO.166 PALUR KARANGANYAR', '1', 'Rp. 2.000.000 - Rp. 4.999.999', '0', '0', '089608725554');
INSERT INTO `data_ibu` VALUES ('L-012', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-013', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-014', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-015', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-016', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-017', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-018', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-019', '', 'Isti Lanjarsari', 'Solo', '1970-06-06', 'D3', 'swasta', 'Jl. Slamet riyadi solo', '1', 'Rp. 1.000.000 - Rp. 1.999.999', '0', '0', '082137565477');
INSERT INTO `data_ibu` VALUES ('L-020', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-021', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-022', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-023', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-024', '3521094504840001', 'Ginarwati', 'Ngawi', '1984-04-05', 'D3', 'Ibu Runah tangga', '', '0', '', '0', '0', '085642038875');
INSERT INTO `data_ibu` VALUES ('L-025', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-026', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-027', '3372025808800002', 'AGUSTIN SETYORINI', 'NGANJUK', '1980-08-18', 'S1', 'GURU PAUD', 'PURBAYAN', '2', 'Rp. 1.000.000 - Rp. 1.999.999', '0', '0', '081329164046');
INSERT INTO `data_ibu` VALUES ('L-028', '', 'Marsini', 'Sukoharjo', '1975-11-03', 'SMA / Sederajat', 'IRT', 'Sembung Kulon', '0', 'kurang dari Rp. 500.000', '0', '0', '085879155375');
INSERT INTO `data_ibu` VALUES ('L-029', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-030', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-031', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-032', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-033', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-034', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-035', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-036', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('L-037', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-001', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-002', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-003', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-004', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-005', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-006', '3311122904080012', 'Astri Okvitaningrum Sukarno', 'Blora', '1976-10-05', 'S1', 'Karyawan Tiga Serangkai', 'Jl. Supomo No. 23 Surakarta', '6', 'Rp. 5.000.000 - Rp. 20.000.000', '0', '0', '085867213898');
INSERT INTO `data_ibu` VALUES ('P-007', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-008', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-009', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-010', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-011', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-012', '', 'INDAH DWI KUSUMAWARDANI', 'PURWODADI', '1985-07-02', 'S1', 'wiraswasta', '', '0', 'Rp. 1.000.000 - Rp. 1.999.999', '0', '0', '085647055092');
INSERT INTO `data_ibu` VALUES ('P-013', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-014', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-015', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-016', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-017', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-018', '3372051302090010', 'Fitri Nurhayati', 'Sragen', '1983-03-10', 'S1', 'Apoteker', 'Jl. Kahuripan no. 9, rt 1/rw 11, sumber, banjarsari, surakarta', '1', 'Rp. 2.000.000 - Rp. 4.999.999', '0', '0', '08122646765');
INSERT INTO `data_ibu` VALUES ('P-019', '', 'indriana dani ekawati', 'karanganyar', '1987-03-04', 'D3', 'wiraswasta', 'kartasura singopuran rt 3 rw 1', '1', 'Rp. 500.000 - Rp. 999.999', '0', '0', '085293178833');
INSERT INTO `data_ibu` VALUES ('P-020', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-021', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-022', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-023', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-024', '', 'Ratih Dwi Puspitasari', 'Bogor', '1984-06-11', 'D3', 'Karyawan Swasta', 'Jakarta Barat', '52', 'Rp. 2.000.000 - Rp. 4.999.999', '0', '0', '081315478732');
INSERT INTO `data_ibu` VALUES ('P-025', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-026', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-027', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-028', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-029', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-030', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-031', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-032', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-033', '3311124701830009', 'Isnaini', 'Surakarta', '1983-01-07', 'D3', 'PNS', 'UPTD Puskesmas Pajang, songgalan Rt 03/IV, Pajang, SKA', '1', 'Rp. 2.000.000 - Rp. 4.999.999', '0', '0', '081329536145');
INSERT INTO `data_ibu` VALUES ('P-034', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-035', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-036', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-037', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-038', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-039', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-040', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-041', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-042', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-043', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-044', '', 'Seliana Happira', 'Madiun', '1979-10-23', 'S1', 'PNS', 'Surakarta', '1', 'Rp. 2.000.000 - Rp. 4.999.999', '0', '0', '081326990709');
INSERT INTO `data_ibu` VALUES ('P-045', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-046', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-047', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-048', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-049', null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `data_ibu` VALUES ('P-050', null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for data_ortu
-- ----------------------------
DROP TABLE IF EXISTS `data_ortu`;
CREATE TABLE `data_ortu` (
  `id_data_ortu` char(5) NOT NULL DEFAULT '',
  `id_data_siswa` varchar(50) DEFAULT NULL,
  `status_ortu` int(2) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `tempatlahir` varchar(30) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `alamatkantor` varchar(100) DEFAULT NULL,
  `jarakkekantor` int(4) DEFAULT NULL,
  `gaji` varchar(30) DEFAULT NULL,
  `bacaanquran` varchar(10) DEFAULT NULL,
  `haji` varchar(15) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_data_ortu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_ortu
-- ----------------------------
INSERT INTO `data_ortu` VALUES ('L-001', null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for data_periode
-- ----------------------------
DROP TABLE IF EXISTS `data_periode`;
CREATE TABLE `data_periode` (
  `id_data_periode` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_awal` datetime DEFAULT NULL,
  `tanggal_akhir` datetime DEFAULT NULL,
  `tahun_periode` year(4) DEFAULT NULL,
  `jenjang` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_data_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_periode
-- ----------------------------
INSERT INTO `data_periode` VALUES ('1', '2016-11-01 00:00:37', '2016-11-30 00:00:37', '2016', 'SD');

-- ----------------------------
-- Table structure for data_saudara
-- ----------------------------
DROP TABLE IF EXISTS `data_saudara`;
CREATE TABLE `data_saudara` (
  `id_saudara` int(3) NOT NULL AUTO_INCREMENT,
  `id_siswa` char(5) NOT NULL DEFAULT '',
  `namalengkap` varchar(100) DEFAULT NULL,
  `kelamin` char(1) DEFAULT NULL,
  `ttl` varchar(100) DEFAULT NULL,
  `sekolah` varchar(100) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_saudara`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_saudara
-- ----------------------------
INSERT INTO `data_saudara` VALUES ('1', 'L-028', 'Zulfa Nur Afifah', 'P', 'Surakarta, 29 Nopember 2003', 'SDIT Nur Hidayah Surakarta', 'Kelas 5');
INSERT INTO `data_saudara` VALUES ('2', 'L-028', 'Auliya Syifa\'ur Rahmah', 'P', 'Sukoharjo, 24 Mei 2000', 'SMPIT Nur Hidayah Surakarta', 'Kelas 9');
INSERT INTO `data_saudara` VALUES ('3', 'L-028', 'Zulfa Nur Afifah', 'P', 'Surakarta, 29 Nopember 2003', 'SDIT Nur Hidayah Surakarta', 'Kelas 5');
INSERT INTO `data_saudara` VALUES ('4', 'L-028', 'Auliya Syifa\'ur Rahmah', 'P', 'Sukoharjo, 24 Mei 2000', 'SMPIT Nur Hidayah Surakarta', 'Kelas 9');
INSERT INTO `data_saudara` VALUES ('5', 'P-019', 'fairus habibbah', 'P', 'sukoharjo 13 april 2013', 'belum sekolah', 'belum sekolah');
INSERT INTO `data_saudara` VALUES ('6', 'P-044', 'Quinsha Cinta Naura', 'P', 'Surakarta, 15 Juli 2012', 'KB Siwi Karimah', 'Adik Kandung');
INSERT INTO `data_saudara` VALUES ('7', 'L-011', 'QUEENNARA SINAR ARKANANTA', 'P', 'SURAKARTA, 5 MEI 2011', '-', '-');
INSERT INTO `data_saudara` VALUES ('8', 'L-019', 'Abiyasa Danendra', 'L', 'Solo, 4 Agustus 2001', 'SMPN 1 Surakarta', 'Kelas IX');
INSERT INTO `data_saudara` VALUES ('9', 'P-044', 'Quinsha Cinta Naura', 'P', 'Surakarta, 15 Juli 2012', 'KB Siwi Karimah', 'Adik Kandung');
INSERT INTO `data_saudara` VALUES ('10', 'P-024', 'Faith Rafif Mahendra', 'L', 'Jakarta, 15 Juli 2011', 'belum sekolah', 'akan masuk TK tahun ini');
INSERT INTO `data_saudara` VALUES ('11', 'P-033', 'Rizky Galih Saputra', 'L', 'Surakarta, 13 November 2010', 'TKIT Permata Hati', 'adik kandung');
INSERT INTO `data_saudara` VALUES ('12', 'P-006', 'Anindita Putriandani Fazila', 'P', 'Surakarta, 09 Mei 2011', 'Darusalam (Play group)', 'Insya Allah untuk TK A akan kami pindah ke TKIT Nurhidayah');
INSERT INTO `data_saudara` VALUES ('13', 'L-024', 'Muh Catur setiyawan', 'L', 'Sukoharjo, 23 september 1993', 'Lulus D3', 'Saudara kandung');
INSERT INTO `data_saudara` VALUES ('14', 'L-024', 'Muh Catur setiyawan', 'L', 'Sukoharjo, 23 september 1993', 'D3 Politeknik Indonesia', 'Saudara kandung');
INSERT INTO `data_saudara` VALUES ('15', 'P-018', 'Rohmad nur hidayat', 'L', 'Sragen', 'Universitas setia budi', 'Pelajar');

-- ----------------------------
-- Table structure for data_siswa
-- ----------------------------
DROP TABLE IF EXISTS `data_siswa`;
CREATE TABLE `data_siswa` (
  `id_siswa` char(5) NOT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `namalengkap` varchar(100) DEFAULT NULL,
  `namapanggilan` varchar(30) DEFAULT NULL,
  `tempatlahir` varchar(30) DEFAULT NULL,
  `tgllahir` date DEFAULT NULL,
  `kelamin` char(1) DEFAULT NULL,
  `namaibu` varchar(100) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `tglaktif` date DEFAULT NULL,
  `jamaktif` time DEFAULT NULL,
  `asalsekolah` varchar(50) DEFAULT NULL,
  `alamatsekolah` varchar(150) DEFAULT NULL,
  `bb` varchar(2) DEFAULT NULL,
  `tb` varchar(3) DEFAULT NULL,
  `jarak` varchar(1) DEFAULT NULL,
  `km` varchar(3) DEFAULT NULL,
  `kps` varchar(30) DEFAULT NULL,
  `foto` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_siswa
-- ----------------------------
INSERT INTO `data_siswa` VALUES ('', '12', 'aji prat', 'jon', 'sukoharjo', '0000-00-00', 'L', 'Ibu', '0931', 'war', 'ajipr2813', 'e021e6d7cc77fb96f01d238df72f34b2', null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for halamanstatis
-- ----------------------------
DROP TABLE IF EXISTS `halamanstatis`;
CREATE TABLE `halamanstatis` (
  `id_halaman` int(5) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `isi_halaman` text NOT NULL,
  `tgl_posting` date NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_halaman`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of halamanstatis
-- ----------------------------
INSERT INTO `halamanstatis` VALUES ('4', 'Halaman Utama', '<h4>ALUR PENDAFTARAN <strong> <br /> </strong></h4>\n<ol>\n<li><span>Waktu pendaftaran peserta didik baru secara online adalah tanggal <strong>10 - 17 Januari 2015</strong></span><strong>.</strong></li>\n<li><span>Untuk mengisi formulir pendaftaran, pendaftar harus membuat account&nbsp;terlebih dahulu, dengan cara sebagai berikut : </span> \n<ul>\n<li><span>Klik menu Pendaftaran </span></li>\n<li><span>Isi Form Pendaftaran dengan lengkap sesuai data yang sebenarnya. Apabila data yang dimasukkan tidak lengkap, proses harus diulangi.</span></li>\n</ul>\n</li>\n<li><span>Account&nbsp;yang sudah dibuat harus diaktifkan terlebih dahulu oleh admin, dengan urutan sebagai berikut : </span> \n<ul>\n<li><span>Membayar biaya pendaftaran dengan cara transfer ke rekening <strong>Bank Muamalat</strong> nomor rekening : </span><strong><span>5210072901 a.n. Ari Puspitowati qq SDIT NUR HIDAYAH</span></strong><span><span><span>.<br /> </span></span></span></li>\n<li><span><span>Besar biaya pendaftara<span>n <span>disertakan di sms dan email konfirmasi pendaftaran, pastikan nomor HP dan email yang <span>didaftarkan masih aktif.</span></span></span></span><br /> </span></li>\n<li><span><span><span><span><span><strong><span>Untuk memudahkan pengecekan kami, pastikan besar biaya pendaftaran sama persis pada konfirmasi sms atau email</span></strong>.</span></span></span></span></span></li>\n<li><span>Melakukan konfirmasi pembayaran dengan cara mengirim sms ke sms center kami (<strong>0857 7819 1979</strong>) dengan format<span> <strong>\"@sditnh nama calon siswa#nama ibu#jumlah transfer\"</strong>. Contoh: <strong>\"@sditnh fatih pratama#annisa#275.003\". Account</strong></span><strong>&nbsp;akan diaktifkan pada jam 07.00 &ndash; 21.00 pada setiap harinya. Untuk konfirmasi setelah jam 21.00, pengaktifan akun akan kami lakukan pada hari berikutnya.</strong></span></li>\n<li><span>Account yang sudah diaktifkan akan kami informasikan melalui sms dan email.</span></li>\n</ul>\n</li>\n<li><span>Setelah account pendaftar aktif, silakan masuk form login , lalu masukkan : username dan password sesuai konfirmasi dari kami.</span></li>\n<li><span>Silakan mengisi Formulir Pendaftaran dengan lengkap.</span></li>\n<li><span><strong>Data pendaftaran lengkap kami terima paling lambat tanggal 18 Januari 2015 pukul 21.00 WIB&nbsp;</strong><br /> </span></li>\n</ol>', '2015-01-09', '');
INSERT INTO `halamanstatis` VALUES ('5', 'Petunjuk / Prosedur Pendaftaran ', '<h4>Petunjuk / Prosedur Pendaftaran</h4>\r\n<ol class=\"prosedur\">\r\n<li>Untuk membuka system PPDB Online direkomendasikan menggunakan:      \r\n<ul>\r\n<li>Google Chrome terbaru, Jika tidak punya silahkan <a title=\"google\" href=\"http://filehippo.com/download_google_chrome/\" target=\"_blank\">Klik disini</a> untuk mendownload</li>\r\n<li>Mozila Firefox terbaru, jika tidak punya silahkan <a title=\"Mozila\" href=\"http://filehippo.com/download_firefox/\" target=\"_blank\">Klik disini</a> untuk mendownload </li>\r\n</ul>\r\n</li>\r\n<li>Jika menggunakan smartphone apabila tidak ada Google Chrome bisa menggunakan browser bawaan smartphone tersebut.</li>\r\n<li>Untuk membuka file pdf&nbsp;<span class=\"huruftebal\">(formulir pendaftaran dan prosedur PPDB)</span>&nbsp;kami rekomendasikan menggunakan Foxit Reader. Jika tidak punya , silahkan&nbsp;<a href=\"http://filehippo.com/download_foxit/\" target=\"_blank\">Klik disini</a>&nbsp;untuk mendownload</li>\r\n</ol>', '2014-12-18', '');
INSERT INTO `halamanstatis` VALUES ('6', 'Agenda PPDB', '<h4>Agenda PPDB SDIT Nur Hidayah</h4>\n<h4><span>Tahun Pelajaran 2015/2016</span></h4>\n<table class=\"table table-condensed table-bordered table-striped\">\n<thead> \n<tr>\n<th>&nbsp;No</th> <th>&nbsp;Agenda</th> <th>Tanggal</th>\n</tr>\n</thead> \n<tbody>\n<tr>\n<td>&nbsp;1</td>\n<td>&nbsp;Pendaftaran online</td>\n<td>&nbsp;10 - 17 Januari 2015</td>\n</tr>\n<tr>\n<td>&nbsp;2</td>\n<td>&nbsp;Observasi Kesehatan<span>*</span></td>\n<td>&nbsp;10 - 19 Januari 2015</td>\n</tr>\n<tr>\n<td>&nbsp;3</td>\n<td>&nbsp;Observasi Calon Siswa<br /></td>\n<td>&nbsp;<span>20 &nbsp;- 22 Januari 2015</span><span>&nbsp;</span></td>\n</tr>\n<tr>\n<td>&nbsp;4</td>\n<td>&nbsp;Wawancara Orang Tua</td>\n<td>&nbsp;<span>20 - 22 </span>Januari 2015</td>\n</tr>\n<tr>\n<td>&nbsp;5</td>\n<td>&nbsp;Pengumuman</td>\n<td>&nbsp;29 Januari 2015</td>\n</tr>\n<tr>\n<td>&nbsp;6</td>\n<td>&nbsp;Daftar Ulang<br /></td>\n<td>\n<p>&nbsp;31 Januari 2015, 2 - 3 Februari 2015</p>\n</td>\n</tr>\n</tbody>\n</table>\n<p><span><strong><span>*</span>Observasi kesehatan langsung di Poliklinik Nur Hidayah </strong></span></p>\n<p><span><strong>Pagi Pukul: 08.00 - 11.30 WIB </strong></span></p>\n<p><strong>Sore Pukul: 17.00 - 19.00 WIB</strong></p>\n<p><strong></strong><span><strong>(hari libur tutup)</strong></span></p>', '2015-01-07', '');

-- ----------------------------
-- Table structure for kd_unik
-- ----------------------------
DROP TABLE IF EXISTS `kd_unik`;
CREATE TABLE `kd_unik` (
  `kd_unik` char(3) NOT NULL DEFAULT '',
  PRIMARY KEY (`kd_unik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kd_unik
-- ----------------------------
INSERT INTO `kd_unik` VALUES ('701');
INSERT INTO `kd_unik` VALUES ('702');
INSERT INTO `kd_unik` VALUES ('703');
INSERT INTO `kd_unik` VALUES ('704');
INSERT INTO `kd_unik` VALUES ('705');
INSERT INTO `kd_unik` VALUES ('706');
INSERT INTO `kd_unik` VALUES ('707');
INSERT INTO `kd_unik` VALUES ('708');
INSERT INTO `kd_unik` VALUES ('709');
INSERT INTO `kd_unik` VALUES ('710');
INSERT INTO `kd_unik` VALUES ('711');
INSERT INTO `kd_unik` VALUES ('712');
INSERT INTO `kd_unik` VALUES ('713');
INSERT INTO `kd_unik` VALUES ('714');
INSERT INTO `kd_unik` VALUES ('715');
INSERT INTO `kd_unik` VALUES ('716');
INSERT INTO `kd_unik` VALUES ('717');
INSERT INTO `kd_unik` VALUES ('718');
INSERT INTO `kd_unik` VALUES ('719');
INSERT INTO `kd_unik` VALUES ('720');
INSERT INTO `kd_unik` VALUES ('721');
INSERT INTO `kd_unik` VALUES ('722');
INSERT INTO `kd_unik` VALUES ('723');
INSERT INTO `kd_unik` VALUES ('724');
INSERT INTO `kd_unik` VALUES ('725');
INSERT INTO `kd_unik` VALUES ('726');
INSERT INTO `kd_unik` VALUES ('727');
INSERT INTO `kd_unik` VALUES ('728');
INSERT INTO `kd_unik` VALUES ('729');
INSERT INTO `kd_unik` VALUES ('730');
INSERT INTO `kd_unik` VALUES ('731');
INSERT INTO `kd_unik` VALUES ('732');
INSERT INTO `kd_unik` VALUES ('733');
INSERT INTO `kd_unik` VALUES ('734');
INSERT INTO `kd_unik` VALUES ('735');
INSERT INTO `kd_unik` VALUES ('736');
INSERT INTO `kd_unik` VALUES ('737');
INSERT INTO `kd_unik` VALUES ('738');
INSERT INTO `kd_unik` VALUES ('739');
INSERT INTO `kd_unik` VALUES ('740');
INSERT INTO `kd_unik` VALUES ('741');
INSERT INTO `kd_unik` VALUES ('742');
INSERT INTO `kd_unik` VALUES ('743');
INSERT INTO `kd_unik` VALUES ('744');
INSERT INTO `kd_unik` VALUES ('745');
INSERT INTO `kd_unik` VALUES ('746');
INSERT INTO `kd_unik` VALUES ('747');
INSERT INTO `kd_unik` VALUES ('748');
INSERT INTO `kd_unik` VALUES ('749');
INSERT INTO `kd_unik` VALUES ('750');
INSERT INTO `kd_unik` VALUES ('751');
INSERT INTO `kd_unik` VALUES ('752');
INSERT INTO `kd_unik` VALUES ('753');
INSERT INTO `kd_unik` VALUES ('754');
INSERT INTO `kd_unik` VALUES ('755');
INSERT INTO `kd_unik` VALUES ('756');
INSERT INTO `kd_unik` VALUES ('757');
INSERT INTO `kd_unik` VALUES ('758');
INSERT INTO `kd_unik` VALUES ('759');
INSERT INTO `kd_unik` VALUES ('760');
INSERT INTO `kd_unik` VALUES ('761');
INSERT INTO `kd_unik` VALUES ('762');
INSERT INTO `kd_unik` VALUES ('763');
INSERT INTO `kd_unik` VALUES ('764');
INSERT INTO `kd_unik` VALUES ('765');
INSERT INTO `kd_unik` VALUES ('766');
INSERT INTO `kd_unik` VALUES ('767');
INSERT INTO `kd_unik` VALUES ('768');
INSERT INTO `kd_unik` VALUES ('769');
INSERT INTO `kd_unik` VALUES ('770');
INSERT INTO `kd_unik` VALUES ('771');
INSERT INTO `kd_unik` VALUES ('772');
INSERT INTO `kd_unik` VALUES ('773');
INSERT INTO `kd_unik` VALUES ('774');
INSERT INTO `kd_unik` VALUES ('775');
INSERT INTO `kd_unik` VALUES ('776');
INSERT INTO `kd_unik` VALUES ('777');
INSERT INTO `kd_unik` VALUES ('778');
INSERT INTO `kd_unik` VALUES ('779');
INSERT INTO `kd_unik` VALUES ('780');
INSERT INTO `kd_unik` VALUES ('781');
INSERT INTO `kd_unik` VALUES ('782');
INSERT INTO `kd_unik` VALUES ('783');
INSERT INTO `kd_unik` VALUES ('784');
INSERT INTO `kd_unik` VALUES ('785');
INSERT INTO `kd_unik` VALUES ('786');
INSERT INTO `kd_unik` VALUES ('787');
INSERT INTO `kd_unik` VALUES ('788');
INSERT INTO `kd_unik` VALUES ('789');
INSERT INTO `kd_unik` VALUES ('790');
INSERT INTO `kd_unik` VALUES ('791');
INSERT INTO `kd_unik` VALUES ('792');
INSERT INTO `kd_unik` VALUES ('793');
INSERT INTO `kd_unik` VALUES ('794');
INSERT INTO `kd_unik` VALUES ('795');
INSERT INTO `kd_unik` VALUES ('796');
INSERT INTO `kd_unik` VALUES ('797');
INSERT INTO `kd_unik` VALUES ('798');
INSERT INTO `kd_unik` VALUES ('799');
INSERT INTO `kd_unik` VALUES ('800');
INSERT INTO `kd_unik` VALUES ('801');
INSERT INTO `kd_unik` VALUES ('802');
INSERT INTO `kd_unik` VALUES ('803');
INSERT INTO `kd_unik` VALUES ('804');
INSERT INTO `kd_unik` VALUES ('805');
INSERT INTO `kd_unik` VALUES ('806');
INSERT INTO `kd_unik` VALUES ('807');
INSERT INTO `kd_unik` VALUES ('808');
INSERT INTO `kd_unik` VALUES ('809');
INSERT INTO `kd_unik` VALUES ('810');
INSERT INTO `kd_unik` VALUES ('811');
INSERT INTO `kd_unik` VALUES ('812');
INSERT INTO `kd_unik` VALUES ('813');

-- ----------------------------
-- Table structure for opt_pendidikan
-- ----------------------------
DROP TABLE IF EXISTS `opt_pendidikan`;
CREATE TABLE `opt_pendidikan` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of opt_pendidikan
-- ----------------------------
INSERT INTO `opt_pendidikan` VALUES ('1', 'Tidak Sekolah');
INSERT INTO `opt_pendidikan` VALUES ('2', 'PAUD');
INSERT INTO `opt_pendidikan` VALUES ('3', 'TK / Sederajat');
INSERT INTO `opt_pendidikan` VALUES ('4', 'Putus SD');
INSERT INTO `opt_pendidikan` VALUES ('5', 'SD / Sederajat');
INSERT INTO `opt_pendidikan` VALUES ('6', 'SMP / Sederajat');
INSERT INTO `opt_pendidikan` VALUES ('7', 'SMA / Sederajat');
INSERT INTO `opt_pendidikan` VALUES ('8', 'Paket A');
INSERT INTO `opt_pendidikan` VALUES ('9', 'Paket B');
INSERT INTO `opt_pendidikan` VALUES ('10', 'Paket C');
INSERT INTO `opt_pendidikan` VALUES ('11', 'D1');
INSERT INTO `opt_pendidikan` VALUES ('12', 'D2');
INSERT INTO `opt_pendidikan` VALUES ('13', 'D3');
INSERT INTO `opt_pendidikan` VALUES ('14', 'D4');
INSERT INTO `opt_pendidikan` VALUES ('15', 'S1');
INSERT INTO `opt_pendidikan` VALUES ('16', 'S2');
INSERT INTO `opt_pendidikan` VALUES ('17', 'S3');
INSERT INTO `opt_pendidikan` VALUES ('18', 'Non Formal');
INSERT INTO `opt_pendidikan` VALUES ('19', 'Informal');
INSERT INTO `opt_pendidikan` VALUES ('20', 'Lainya');

-- ----------------------------
-- Table structure for opt_transport
-- ----------------------------
DROP TABLE IF EXISTS `opt_transport`;
CREATE TABLE `opt_transport` (
  `keterangan` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`keterangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of opt_transport
-- ----------------------------
INSERT INTO `opt_transport` VALUES ('Andong/bendi/saldo/dokar/delman/becak');
INSERT INTO `opt_transport` VALUES ('Angkutan umum/bus');
INSERT INTO `opt_transport` VALUES ('Jalan kaki');
INSERT INTO `opt_transport` VALUES ('Kereta api');
INSERT INTO `opt_transport` VALUES ('Kuda');
INSERT INTO `opt_transport` VALUES ('Mobil pribadi');
INSERT INTO `opt_transport` VALUES ('Mobil/bus antar jemput');
INSERT INTO `opt_transport` VALUES ('Ojek');
INSERT INTO `opt_transport` VALUES ('Perahu penyeberangan/rakit/getek');
INSERT INTO `opt_transport` VALUES ('Sepeda');
INSERT INTO `opt_transport` VALUES ('Sepeda motor');

-- ----------------------------
-- Table structure for slideshow
-- ----------------------------
DROP TABLE IF EXISTS `slideshow`;
CREATE TABLE `slideshow` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(30) DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of slideshow
-- ----------------------------
INSERT INTO `slideshow` VALUES ('3', 'gambar5.jpg', '1');
INSERT INTO `slideshow` VALUES ('4', 'banner1.jpg', '1');
INSERT INTO `slideshow` VALUES ('5', 'banner2.jpg', '1');
INSERT INTO `slideshow` VALUES ('6', 'banner3.jpg', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `namalengkap` varchar(50) DEFAULT NULL,
  `level` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'm45ter', 'b45d223682d1e3ec28f32b9ec43fbd0ad9fd8dd7', 'Marsono Saputro', '1');
INSERT INTO `user` VALUES ('2', 'taqwin', 'd0e7ce0f2a8530f2449a5d1e392ff7a3c95a7281', 'Choirul Taqwin', '1');
