-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "db_klinik_bidan" -----------------------
CREATE DATABASE IF NOT EXISTS `db_klinik_bidan` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_klinik_bidan`;
-- ---------------------------------------------------------


-- CREATE TABLE "antrian" --------------------------------------
CREATE TABLE `antrian` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`no_urut` Int( 11 ) NOT NULL DEFAULT 1,
	`user_id` Int( 11 ) NOT NULL,
	`is_periksa` Int( 1 ) NOT NULL DEFAULT 0,
	`jadwal_id` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------


-- CREATE TABLE "jadwal_klinik" --------------------------------
CREATE TABLE `jadwal_klinik` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`bidan_id` Int( 255 ) NOT NULL,
	`waktu_buka` Time NOT NULL,
	`waktu_tutup` Time NOT NULL,
	`is_close` Int( 1 ) NOT NULL DEFAULT 0,
	`create_date` DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 12;
-- -------------------------------------------------------------


-- CREATE TABLE "konsultasi" -----------------------------------
CREATE TABLE `konsultasi` ( 
	`id` Int( 255 ) AUTO_INCREMENT NOT NULL,
	`user_id` Int( 255 ) NOT NULL,
	`comment` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`create_date` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`reg_id` Int( 11 ) NOT NULL,
	`is_read` Int( 1 ) NOT NULL DEFAULT 0,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 8;
-- -------------------------------------------------------------


-- CREATE TABLE "pengguna" -------------------------------------
CREATE TABLE `pengguna` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`name` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`phone` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`address` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`email` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`file_image` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`is_bidan` Int( 1 ) NULL DEFAULT 0,
	`nama_suami` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`tgl_lahir` Date NULL,
	`pendidikan` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`agama` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`goldar` Char( 2 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`create_date` DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`pekerjaan_suami` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`pekerjaan_istri` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 6;
-- -------------------------------------------------------------


-- CREATE TABLE "registrasi" -----------------------------------
CREATE TABLE `registrasi` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`create_date` DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`user_id` Int( 11 ) NOT NULL,
	`hamil_ke` Int( 1 ) NOT NULL DEFAULT 1,
	`jml_persalinan` Int( 1 ) NOT NULL DEFAULT 0,
	`jml_keguguran` Int( 1 ) NOT NULL DEFAULT 0,
	`jml_ank_hidup` Int( 1 ) NOT NULL DEFAULT 0,
	`jml_ank_mati` Int( 1 ) NOT NULL DEFAULT 0,
	`jml_ank_lr_kr_bln` Int( 1 ) NOT NULL DEFAULT 0 COMMENT 'Jumlah anak lahir kurang bulan',
	`jrk_hamil_dr_akhir` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'jarak kehamilan saat ini dengan yang terakhir',
	`imunisasi_tt` Int( 4 ) NULL DEFAULT 0,
	`cara_salin_akhir` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`penolong_salin_akhir` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`hpht` Date NOT NULL COMMENT 'Hari pertama haid terakhir',
	`htp` Date NOT NULL COMMENT 'hari taksiran persalinan',
	`is_kek` Int( 1 ) NOT NULL DEFAULT 1,
	`lingkar_lengan_atas` Float( 12, 0 ) NOT NULL,
	`tinggi_bd` Float( 12, 0 ) NOT NULL,
	`kontrasepsi_blm_hamil` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`rw_penyakit` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`rw_alergi` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`is_konsultasi` Int( 1 ) NOT NULL DEFAULT 0,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------


-- CREATE TABLE "rekam_medis" ----------------------------------
CREATE TABLE `rekam_medis` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`create_date` DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`bidan_id` Int( 11 ) NOT NULL,
	`is_kaki_bengkak` Int( 1 ) NOT NULL DEFAULT 0,
	`keluhan` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`tekanan_darah` VarChar( 10 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`berat_badan` Float( 12, 0 ) NOT NULL,
	`umur_kehamilan` Int( 11 ) NOT NULL,
	`tinggi_fundus` Float( 12, 0 ) NOT NULL,
	`letak_janin` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`denyut_janin` VarChar( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`imunisasi` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`tablet` VarChar( 150 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`tata_laksana` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`hasil_lab` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`tindakan` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`nasihat` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	`reg_id` Int( 11 ) NOT NULL,
	`jadwal_periksa` Date NOT NULL,
	PRIMARY KEY ( `id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 11;
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_pengguna_antrian" -------------------------
CREATE INDEX `lnk_pengguna_antrian` USING BTREE ON `antrian`( `user_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_pengguna_jadwal_klinik" -------------------
CREATE INDEX `lnk_pengguna_jadwal_klinik` USING BTREE ON `jadwal_klinik`( `bidan_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_registrasi_konsultasi" --------------------
CREATE INDEX `lnk_registrasi_konsultasi` USING BTREE ON `konsultasi`( `reg_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_pengguna_Registrasi" ----------------------
CREATE INDEX `lnk_pengguna_Registrasi` USING BTREE ON `registrasi`( `user_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_pengguna_rekam_medis" ---------------------
CREATE INDEX `lnk_pengguna_rekam_medis` USING BTREE ON `rekam_medis`( `bidan_id` );
-- -------------------------------------------------------------


-- CREATE INDEX "lnk_registrasi_rekam_medis" -------------------
CREATE INDEX `lnk_registrasi_rekam_medis` USING BTREE ON `rekam_medis`( `reg_id` );
-- -------------------------------------------------------------


-- CREATE LINK "lnk_pengguna_antrian" --------------------------
ALTER TABLE `antrian`
	ADD CONSTRAINT `lnk_pengguna_antrian` FOREIGN KEY ( `user_id` )
	REFERENCES `pengguna`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_registrasi_konsultasi" ---------------------
ALTER TABLE `konsultasi`
	ADD CONSTRAINT `lnk_registrasi_konsultasi` FOREIGN KEY ( `reg_id` )
	REFERENCES `registrasi`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_pengguna_Registrasi" -----------------------
ALTER TABLE `registrasi`
	ADD CONSTRAINT `lnk_pengguna_Registrasi` FOREIGN KEY ( `user_id` )
	REFERENCES `pengguna`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


-- CREATE LINK "lnk_registrasi_rekam_medis" --------------------
ALTER TABLE `rekam_medis`
	ADD CONSTRAINT `lnk_registrasi_rekam_medis` FOREIGN KEY ( `reg_id` )
	REFERENCES `registrasi`( `id` )
	ON DELETE Cascade
	ON UPDATE Cascade;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


