SET FOREIGN_KEY_CHECKS=0;
#
# TABLE STRUCTURE FOR: admin
#

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(100) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`) VALUES (1, 'administrator1231', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'syifasalsabila@students.amikom.ac.id');
INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`) VALUES (2, 'administrator2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '');


#
# TABLE STRUCTURE FOR: arsip
#

DROP TABLE IF EXISTS `arsip`;

CREATE TABLE `arsip` (
  `id_arsip` int(11) NOT NULL AUTO_INCREMENT,
  `kode_qr` varchar(11) DEFAULT NULL,
  `nomor_dokumen` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `waktu_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `file_arsip` varchar(255) NOT NULL,
  `keterangan_arsip` varchar(100) NOT NULL,
  PRIMARY KEY (`id_arsip`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_unit` (`id_unit`),
  KEY `id_petugas` (`id_petugas`),
  KEY `kode_qr` (`kode_qr`),
  CONSTRAINT `arsip_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `arsip_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`),
  CONSTRAINT `arsip_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  CONSTRAINT `arsip_ibfk_4` FOREIGN KEY (`kode_qr`) REFERENCES `kode_qr` (`kode_qr`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `arsip` (`id_arsip`, `kode_qr`, `nomor_dokumen`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`) VALUES (32, 'QR-71HN7ULU', '2/PERCOBAAN/2025', 21, 14, 13, '2025-07-03 10:42:42', 'NEW_ALUR_!-Page-12.png', 'Arsip petugas 1 kategori A Unit A');
INSERT INTO `arsip` (`id_arsip`, `kode_qr`, `nomor_dokumen`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`) VALUES (33, 'QR-I2M3OQ32', '1/PERCOBAAN/2025', 22, 17, 14, '2025-07-03 10:45:31', 'ilide_info-cara-backup-file-database-di-codeigniter-docx-pr_16005913534c4ee0a6d5c85f4c38c2aa7.pdf', 'Arsip petugas 2 Unit B');
INSERT INTO `arsip` (`id_arsip`, `kode_qr`, `nomor_dokumen`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`) VALUES (34, NULL, '3PERCOBAAN/2025', 24, 17, 14, '2025-07-03 10:46:56', 'Template_Proposal_Non_Skripsi_Update_Maret_2024.docx', 'Arsip petugas 2 Kategori C dan tidak punya QR');
INSERT INTO `arsip` (`id_arsip`, `kode_qr`, `nomor_dokumen`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`) VALUES (35, NULL, '4/PERCOBAAN/2025', 22, 14, 13, '2025-07-03 10:49:04', 'NEW_ALUR_!-Page-13.png', 'Arsip petugas 1 Kategori B dan tidak punya kode QR');
INSERT INTO `arsip` (`id_arsip`, `kode_qr`, `nomor_dokumen`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`) VALUES (36, 'QR-VH9ZC8WT', '456', 21, 14, 13, '2025-07-03 17:35:13', 'QR-VH9ZC8WT.png', 'ini');


#
# TABLE STRUCTURE FOR: kategori
#

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan_kategori` varchar(100) NOT NULL,
  `jenis_kategori` enum('masuk','keluar') NOT NULL DEFAULT 'keluar',
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (21, 'Kategori A', 'This is Kategori A', 'keluar');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (22, 'Kategori B', 'This is Kategori B', 'keluar');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (24, 'Kategori C', 'Ini kategori C dari pengajuan petugas', 'keluar');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (25, 'modif notif lagi', 'modif notif lagi', 'keluar');


#
# TABLE STRUCTURE FOR: kode_qr
#

DROP TABLE IF EXISTS `kode_qr`;

CREATE TABLE `kode_qr` (
  `kode_qr` varchar(11) NOT NULL,
  `nomor_dokumen` varchar(100) NOT NULL,
  `waktu_generate` datetime NOT NULL DEFAULT current_timestamp(),
  `foto_qr` varchar(255) DEFAULT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  PRIMARY KEY (`kode_qr`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_unit` (`id_unit`),
  CONSTRAINT `kode_qr_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  CONSTRAINT `kode_qr_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `kode_qr` (`kode_qr`, `nomor_dokumen`, `waktu_generate`, `foto_qr`, `id_petugas`, `id_unit`) VALUES ('QR-71HN7ULU', '2/PERCOBAAN/2025', '2025-07-03 10:38:58', 'QR-71HN7ULU.png', 13, 14);
INSERT INTO `kode_qr` (`kode_qr`, `nomor_dokumen`, `waktu_generate`, `foto_qr`, `id_petugas`, `id_unit`) VALUES ('QR-I2M3OQ32', '1/PERCOBAAN/2025', '2025-07-03 10:35:43', 'QR-I2M3OQ32.png', 14, 17);
INSERT INTO `kode_qr` (`kode_qr`, `nomor_dokumen`, `waktu_generate`, `foto_qr`, `id_petugas`, `id_unit`) VALUES ('QR-VH9ZC8WT', '456', '2025-07-03 17:32:45', 'QR-VH9ZC8WT.png', 13, 14);


#
# TABLE STRUCTURE FOR: notifikasi
#

DROP TABLE IF EXISTS `notifikasi`;

CREATE TABLE `notifikasi` (
  `id_notifikasi` char(36) NOT NULL DEFAULT uuid(),
  `id_admin` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `isi_notifikasi` text NOT NULL,
  `waktu_notifikasi` datetime NOT NULL DEFAULT current_timestamp(),
  `status_notifikasi` varchar(20) NOT NULL DEFAULT 'belum',
  PRIMARY KEY (`id_notifikasi`),
  KEY `id_admin` (`id_admin`),
  KEY `id_petugas` (`id_petugas`),
  CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  CONSTRAINT `notifikasi_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('3628f70c-57be-11f0-b3f8-c018503825b5', 1, 13, 'Pengajuan kategori dengan nama <b> Kategori C</b> dengan keterangan <b> Ini kategori C dari pengajuan petugas</b> telah kami terima', '2025-07-03 10:31:31', 'sudah');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('6eaa5915-58a3-11f0-9997-c018503825b5', 1, 13, 'Pengajuan kategori dengan nama <b> modif notif</b> dengan keterangan <b> modif notif</b> telah kami tolak dengan alasan <b>tolak</b>', '2025-07-04 13:52:21', 'sudah');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('7eafd5b3-58a6-11f0-9997-c018503825b5', 1, 13, 'Pengajuan kategori dengan nama <b> modif notif lagi</b> dengan keterangan <b> modif notif lagi</b> telah kami terima', '2025-07-04 14:14:16', 'sudah');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('ab4bfb0e-57be-11f0-b3f8-c018503825b5', 1, 14, 'Pengajuan kategori dengan nama <b> Kategori D</b> dengan keterangan <b> percobaan pengajuan untuk ditolak</b> telah kami tolak dengan alasan <b>ditolak</b>', '2025-07-03 10:34:47', 'belum');


#
# TABLE STRUCTURE FOR: notifikasi_admin
#

DROP TABLE IF EXISTS `notifikasi_admin`;

CREATE TABLE `notifikasi_admin` (
  `id_notif_admin` char(36) NOT NULL DEFAULT uuid(),
  `id_petugas` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `isi_notif_admin` text NOT NULL,
  `waktu_notif_admin` datetime NOT NULL DEFAULT current_timestamp(),
  `status_notif_admin` varchar(20) NOT NULL DEFAULT 'belum',
  PRIMARY KEY (`id_notif_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('192e301e-57be-11f0-b3f8-c018503825b5', 13, 18, 'Terdapat pengajuan kategori baru dari <b>ini petugas 1 (Unit Unit A)</b> dengan nama <b>Kategori C</b>', '2025-07-03 10:30:42', 'sudah');
INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('3dab9069-57c3-11f0-b3f8-c018503825b5', 13, 20, 'Terdapat pengajuan kategori baru dari <b>ini petugas 1 (Unit Unit A)</b> dengan nama <b>Kategori D</b>', '2025-07-03 11:07:31', 'sudah');
INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('40a8667b-58a1-11f0-9997-c018503825b5', 13, 21, 'Terdapat pengajuan kategori baru dari <b>ini petugas 1 (Unit Unit A)</b> dengan nama <b>modif notif</b>', '2025-07-04 13:36:45', 'sudah');
INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('6f2828a0-58a6-11f0-9997-c018503825b5', 13, 22, 'Terdapat pengajuan kategori baru dari <b>ini petugas 1 (Unit Unit A)</b> dengan nama <b>modif notif lagi</b>', '2025-07-04 14:13:50', 'sudah');
INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('7d8d01f7-57be-11f0-b3f8-c018503825b5', 14, 19, 'Terdapat pengajuan kategori baru dari <b>ini petugas 2 (Unit Unit B)</b> dengan nama <b>Kategori D</b>', '2025-07-03 10:33:30', 'sudah');


#
# TABLE STRUCTURE FOR: pengajuan_kategori
#

DROP TABLE IF EXISTS `pengajuan_kategori`;

CREATE TABLE `pengajuan_kategori` (
  `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pengajuan` varchar(75) NOT NULL,
  `keterangan_pengajuan` varchar(75) NOT NULL,
  `status_pengajuan` varchar(50) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  PRIMARY KEY (`id_pengajuan`),
  KEY `id_petugas` (`id_petugas`),
  KEY `id_unit` (`id_unit`),
  CONSTRAINT `pengajuan_kategori_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  CONSTRAINT `pengajuan_kategori_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (18, 'Kategori C', 'Ini kategori C dari pengajuan petugas', 'accepted', 13, 14);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (19, 'Kategori D', 'percobaan pengajuan untuk ditolak', 'rejected', 14, 17);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (21, 'modif notif', 'modif notif', 'rejected', 13, 14);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (22, 'modif notif lagi', 'modif notif lagi', 'accepted', 13, 14);


#
# TABLE STRUCTURE FOR: petugas
#

DROP TABLE IF EXISTS `petugas`;

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_petugas` varchar(100) NOT NULL,
  `username_petugas` varchar(100) NOT NULL,
  `password_petugas` varchar(100) NOT NULL,
  `id_unit` int(11) NOT NULL,
  PRIMARY KEY (`id_petugas`),
  KEY `id_unit` (`id_unit`),
  CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (13, 'ini petugas 1', 'petugas1', 'b53fe7751b37e40ff34d012c7774d65f', 14);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (14, 'ini petugas 2', 'petugas2', 'ac5604a8b8504d4ff5b842480df02e91', 17);


#
# TABLE STRUCTURE FOR: unit
#

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(100) NOT NULL,
  `keterangan_unit` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (14, 'Unit A', 'Ini adalah Unit A');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (17, 'Unit B', 'Ini adalah Unit B');



SET FOREIGN_KEY_CHECKS=1;