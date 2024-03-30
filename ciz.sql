-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ciz
DROP DATABASE IF EXISTS `ciz`;
CREATE DATABASE IF NOT EXISTS `ciz` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ciz`;

-- Dumping structure for table ciz.tb_alat
DROP TABLE IF EXISTS `tb_alat`;
CREATE TABLE IF NOT EXISTS `tb_alat` (
  `a_id` int unsigned NOT NULL AUTO_INCREMENT,
  `a_nama` varchar(50) NOT NULL,
  `a_satuan` enum('Rupiah','Kg','g') NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ciz.tb_alat: ~2 rows (approximately)
DELETE FROM `tb_alat`;
INSERT INTO `tb_alat` (`a_id`, `a_nama`, `a_satuan`) VALUES
	(1, 'Beras', 'Kg'),
	(2, 'Uang', 'Rupiah');

-- Dumping structure for table ciz.tb_distribusi
DROP TABLE IF EXISTS `tb_distribusi`;
CREATE TABLE IF NOT EXISTS `tb_distribusi` (
  `d_id` int NOT NULL,
  `d_penerima` varchar(50) NOT NULL,
  `d_jumlah_hak` int NOT NULL,
  `d_jumlah_terdistribusi` int DEFAULT NULL,
  `d_waktu` datetime DEFAULT NULL,
  `d_keterangan` text,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ciz.tb_distribusi: ~0 rows (approximately)
DELETE FROM `tb_distribusi`;

-- Dumping structure for table ciz.tb_infaq
DROP TABLE IF EXISTS `tb_infaq`;
CREATE TABLE IF NOT EXISTS `tb_infaq` (
  `i_id` int unsigned NOT NULL AUTO_INCREMENT,
  `i_waktu` datetime NOT NULL,
  `i_warga` int NOT NULL,
  `i_nominal` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ciz.tb_infaq: ~0 rows (approximately)
DELETE FROM `tb_infaq`;

-- Dumping structure for table ciz.tb_jenis
DROP TABLE IF EXISTS `tb_jenis`;
CREATE TABLE IF NOT EXISTS `tb_jenis` (
  `j_id` int unsigned NOT NULL AUTO_INCREMENT,
  `j_nama` varchar(50) NOT NULL,
  `j_alat` int NOT NULL,
  `j_kuantitas` float NOT NULL,
  PRIMARY KEY (`j_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ciz.tb_jenis: ~2 rows (approximately)
DELETE FROM `tb_jenis`;
INSERT INTO `tb_jenis` (`j_id`, `j_nama`, `j_alat`, `j_kuantitas`) VALUES
	(1, 'Zakat Fitrah', 2, 27000),
	(2, 'Zakat Fitrah', 1, 2.7);

-- Dumping structure for table ciz.tb_tunai
DROP TABLE IF EXISTS `tb_tunai`;
CREATE TABLE IF NOT EXISTS `tb_tunai` (
  `t_id` int unsigned NOT NULL AUTO_INCREMENT,
  `t_waktu` datetime NOT NULL,
  `t_warga` int NOT NULL,
  `t_jenis` int NOT NULL,
  `t_tanggungan` tinyint NOT NULL,
  `t_total` decimal(20,6) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ciz.tb_tunai: ~0 rows (approximately)
DELETE FROM `tb_tunai`;

-- Dumping structure for table ciz.tb_user
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE IF NOT EXISTS `tb_user` (
  `u_id` int NOT NULL,
  `u_name` varchar(50) NOT NULL,
  `u_uname` varchar(50) NOT NULL,
  `u_pass` varchar(150) NOT NULL,
  `u_level` enum('admin','staff') NOT NULL,
  `u_access` set('01','02','03','04','05','06') NOT NULL,
  `u_created_at` datetime NOT NULL,
  `u_updated_at` datetime NOT NULL,
  `u_activated_at` datetime DEFAULT NULL,
  `u_status` enum('active','non') DEFAULT 'non',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ciz.tb_user: ~0 rows (approximately)
DELETE FROM `tb_user`;

-- Dumping structure for table ciz.tb_warga
DROP TABLE IF EXISTS `tb_warga`;
CREATE TABLE IF NOT EXISTS `tb_warga` (
  `w_id` int unsigned NOT NULL AUTO_INCREMENT,
  `w_nama` varchar(50) NOT NULL,
  `w_jenis_kelamin` enum('L','P') NOT NULL,
  `w_status_keluarga` enum('Kepala Keluarga','Istri','Anak') NOT NULL,
  `w_jumlah_keluarga` tinyint NOT NULL DEFAULT '1',
  `w_rt` enum('01','02','03','04','05','06') NOT NULL,
  `w_status_warga` enum('Muzakki','Mustahik') NOT NULL,
  `w_created_at` datetime NOT NULL,
  `w_updated_at` datetime NOT NULL,
  PRIMARY KEY (`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table ciz.tb_warga: ~1 rows (approximately)
DELETE FROM `tb_warga`;
INSERT INTO `tb_warga` (`w_id`, `w_nama`, `w_jenis_kelamin`, `w_status_keluarga`, `w_jumlah_keluarga`, `w_rt`, `w_status_warga`, `w_created_at`, `w_updated_at`) VALUES
	(1, 'Tuminem', 'P', 'Istri', 1, '01', 'Mustahik', '2024-03-30 14:48:02', '2024-03-30 08:03:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
