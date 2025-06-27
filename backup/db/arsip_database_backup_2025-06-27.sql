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

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`) VALUES (1, 'administrator12', 'admin12', 'e00cf25ad42683b3df678c61f42c6bda', 'syifasalsabila@students.amikom.ac.id');
INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `email_admin`) VALUES (2, 'administrator2', 'admin2', 'c84258e9c39059a89ab77d846ddab909', '');


#
# TABLE STRUCTURE FOR: arsip
#

DROP TABLE IF EXISTS `arsip`;

CREATE TABLE `arsip` (
  `id_arsip` int(11) NOT NULL AUTO_INCREMENT,
  `kode_arsip` varchar(50) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `waktu_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `file_arsip` varchar(255) NOT NULL,
  `keterangan_arsip` varchar(100) NOT NULL,
  `unik_arsip` char(36) NOT NULL DEFAULT uuid(),
  `jenis_arsip` enum('masuk','keluar') NOT NULL,
  `kode_qr` varchar(15) NOT NULL,
  PRIMARY KEY (`id_arsip`),
  UNIQUE KEY `unik_arsip` (`unik_arsip`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_unit` (`id_unit`),
  KEY `id_petugas` (`id_petugas`),
  CONSTRAINT `arsip_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  CONSTRAINT `arsip_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`),
  CONSTRAINT `arsip_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (2, 'SK-2332', 'VII/XA/AMIKOM/2030', 1, 2, 1, '2025-06-24 00:00:00', 'WhatsApp_Image_2025-04-29_at_21_45_08_3e2f21ac.jpg', 'Surat Keterangan Tidak Mampu Kalau Begini Terus kan', '77182bcf-41bb-11f0-b696-f875a4744ecd', 'keluar', 'ya');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (4, 'SH1234', '', 1, 2, 2, '2025-05-08 00:00:00', '', 'Surat Permohonan Hutang untuk Bank BRI', '7718756a-41bb-11f0-b696-f875a4744ecd', 'masuk', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (5, 'SP1103', '', 8, 2, 3, '2025-05-03 00:00:00', '5__RAGAM_DIALOG.pdf', 'Surat Peringatan Sebelas Maret', '77187759-41bb-11f0-b696-f875a4744ecd', 'masuk', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (6, 'KSK-001', '', 9, 1, 5, '2025-05-08 00:00:00', 'Template_Pengumpulan_UTS.docx', 'Surat laporan internal bulan april', '7718785a-41bb-11f0-b696-f875a4744ecd', 'masuk', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (7, 'KSK-002', '', 9, 1, 6, '2025-05-08 00:00:00', '', 'Rekap bulan Maret bagian kesekretariatan', '7718792b-41bb-11f0-b696-f875a4744ecd', 'masuk', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (15, 'KSK-003', '', 1, 1, 1, '2025-06-05 00:00:00', '', 'ASDFGHJKL', 'uuid()', 'masuk', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (19, 'qwwww', '', 17, 2, 1, '2025-06-19 00:00:00', 'WhatsApp_Image_2025-06-19_at_15_49_57_b7543a111.jpg', 'hey hey no no', 'c61dc61c-4d23-11f0-a5ee-c018503825b5', 'masuk', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (20, 'AR123', '', 13, 2, 1, '2025-06-21 13:05:58', 'Diagram_Alur__NON_REGULER.png', 'AI', 'cce0439e-4e65-11f0-b603-c018503825b5', 'keluar', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (21, 'coba1', '', 1, 2, 1, '2025-06-21 19:14:46', '202506141039_qrcode.png', 'coba1', '52621b68-4e99-11f0-88d9-c018503825b5', 'keluar', '');
INSERT INTO `arsip` (`id_arsip`, `kode_arsip`, `nomor_surat`, `id_kategori`, `id_unit`, `id_petugas`, `waktu_upload`, `file_arsip`, `keterangan_arsip`, `unik_arsip`, `jenis_arsip`, `kode_qr`) VALUES (24, 'sue123', '', 17, 3, 2, '2025-06-22 18:37:48', 'Metopen_docx_(1).pdf', 'fghij', '525e549d-4f5d-11f0-bdd0-c018503825b5', 'masuk', 'ya');


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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (1, 'Surat Masuk', 'Semua surat yang diterima/masuk', 'masuk');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (8, 'Surat Peringatan', 'Surat Peringatan', 'keluar');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (9, 'Surat Internal', 'Surat Internal Unit', 'masuk');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (10, 'SIM', 'Surat Izin Mengemudi', 'keluar');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (11, 'SIM A', 'Surat Izin Mengemudi AB', 'keluar');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (13, 'surat tilang', 'surat cinta dari pak polisi', 'keluar');
INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `keterangan_kategori`, `jenis_kategori`) VALUES (17, 'surot', 'sirot', 'keluar');


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

INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('2d35fe3e-4a75-11f0-99f4-c018503825b5', 1, 1, 'Pengajuan kategori dengan nama <b> surat tilang</b> dengan keterangan <b> surat cinta dari pak polisi</b> telah kami terima', '2025-06-16 12:45:57', 'sudah');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('4f34e6be-4d6f-11f0-b02e-c018503825b5', 1, 1, 'Pengajuan kategori dengan nama <b> surat A</b> dengan keterangan <b> percobaan surat A</b> telah kami tolak', '2025-06-20 07:41:31', 'sudah');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('73db3d38-4e7d-11f0-b603-c018503825b5', 1, 1, 'Pengajuan kategori dengan nama <b> Surat Perjanjian</b> dengan keterangan <b> Ini adalah Surat Perjanjian</b> telah kami terima', '2025-06-21 15:55:17', 'sudah');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('827defff-4d6f-11f0-b02e-c018503825b5', 1, 2, 'Pengajuan kategori dengan nama <b> SIM B</b> dengan keterangan <b> Surat Izin Mengemudi B</b> telah kami tolak', '2025-06-20 07:42:57', 'belum');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('973bbfb7-4e7d-11f0-b603-c018503825b5', 1, 1, 'Pengajuan kategori dengan nama <b> Surat Perjanjian</b> dengan keterangan <b> Ini adalah Surat Perjanjian</b> telah kami tolak dengan alasan <b>Kategori tidak jelas</b>', '2025-06-21 15:56:16', 'sudah');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('c65cebdc-5328-11f0-a330-c018503825b5', 1, 6, 'Pengajuan kategori dengan nama <b> mencoba mengajukan</b> dengan keterangan <b> mencoba mengajukan</b> telah kami tolak dengan alasan <b>nyerah aja udah</b>', '2025-06-27 14:31:44', 'belum');
INSERT INTO `notifikasi` (`id_notifikasi`, `id_admin`, `id_petugas`, `isi_notifikasi`, `waktu_notifikasi`, `status_notifikasi`) VALUES ('d23780f5-4d7a-11f0-b02e-c018503825b5', 1, 1, 'Pengajuan kategori dengan nama <b> kategori</b> dengan keterangan <b> surat</b> telah kami tolak dengan alasan kamu terlalu baik buat aku', '2025-06-20 09:03:55', 'sudah');


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

INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('5aac66dd-50c7-11f0-a1a7-c018503825b5', 5, 14, 'Terdapat pengajuan kategori baru dengan dari <b>()</b> dengan nama <b>try notif admin</b>', '2025-06-24 13:49:19', 'sudah');
INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('9449ff0f-50c9-11f0-a1a7-c018503825b5', 5, 16, 'Terdapat pengajuan kategori baru dengan dari <b>petugas kesekretariatan(Kesekretariatan)</b> dengan nama <b>try notif 2</b>', '2025-06-24 14:05:15', 'sudah');
INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('949a09a1-50c7-11f0-a1a7-c018503825b5', 5, 16, 'Terdapat pengajuan kategori baru dengan dari <b>()</b> dengan nama <b>try notif admin</b>', '2025-06-24 13:50:57', 'sudah');
INSERT INTO `notifikasi_admin` (`id_notif_admin`, `id_petugas`, `id_pengajuan`, `isi_notif_admin`, `waktu_notif_admin`, `status_notif_admin`) VALUES ('a3a095d1-5328-11f0-a330-c018503825b5', 6, 17, 'Terdapat pengajuan kategori baru dari <b>petugas kesekretariatan2 (Unit Kesekretariatan)</b> dengan nama <b>mencoba mengajukan</b>', '2025-06-27 14:30:45', 'sudah');


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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (1, 'Surat Tanah', 'Surat Keterangan Kepemilikan Tanah', 'accepted', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (2, 'Sertifikat Tanah', 'Sertifikat Hak Kepemilikan Tanah', 'rejected', 2, 3);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (3, 'Sertifikat Rumah', 'Sertifikat Kepemilikan Rumah', 'rejected', 3, 1);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (4, 'SIM', 'Surat Izin Mengemudi', 'accepted', 5, 1);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (5, 'SIM A', 'Surat Izin Mengemudi A', 'accepted', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (6, 'SIM B', 'Surat Izin Mengemudi B', 'rejected', 2, 3);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (7, 'SIM C', 'Surat Izin Mengemudi C', 'rejected', 3, 1);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (8, 'SIM D', 'Surat Izin Mengemudi D', 'rejected', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (9, 'surat tilang', 'surat cinta dari pak polisi', 'accepted', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (10, 'surat A', 'percobaan surat A', 'rejected', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (11, 'kategori', 'surat', 'rejected', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (12, 'Surat Perjanjian', 'Ini adalah Surat Perjanjian', 'rejected', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (13, 'surat 1', 'surat 1', 'pending', 1, 2);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (14, 'try notif admin', 'try notif admin', 'pending', 5, 1);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (15, 'try notif admin', 'try notif admin', 'pending', 5, 1);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (16, 'try notif 2', 'try notif 2', 'pending', 5, 1);
INSERT INTO `pengajuan_kategori` (`id_pengajuan`, `nama_pengajuan`, `keterangan_pengajuan`, `status_pengajuan`, `id_petugas`, `id_unit`) VALUES (17, 'mencoba mengajukan', 'mencoba mengajukan', 'rejected', 6, 1);


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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (1, 'petugas12345', 'petugas12345', '570c396b3fc856eceb8aa7357f32af1a', 2);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (2, 'petugas4567', 'petugas4567', '7b4d564cd2dfc3f27e54bc22856753a6', 3);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (3, 'petugas255', 'petugas255', '76282d79ac10baf38dff8edd515f2dc9', 1);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (5, 'petugas kesekretariatan', 'ksk1', 'b373e1616dadc07fba627a8709ced07b', 1);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (6, 'petugas kesekretariatan2', 'ksk2', '6965aa8a03f6e4e43fc294745b3bcf2a', 1);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (10, 'petugasbaru', 'petugasbaru', '4a3ad0dbfcbc623c35079e660e38b1c2', 1);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (11, 'petugase', 'petugase', '2a5fc7ad8aa87f42a17a66c462ee6ae7', 11);
INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `id_unit`) VALUES (12, 'petugasnyo', 'petugasnyo', '08ea2f43861e9c19edf3c5694b410979', 8);


#
# TABLE STRUCTURE FOR: unit
#

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `nama_unit` varchar(100) NOT NULL,
  `keterangan_unit` varchar(100) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (1, 'Kesekretariatan', 'Unit Kesekretariatan');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (2, 'Pengajaran', 'Unit Pengajaran');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (3, 'TMI', 'Unit Pengasuh Santri');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (8, 'coba unit', 'coba aja');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (10, 'coba2', 'cobba aja');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (11, 'abc', 'def');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (12, 'ghi', 'jkl');
INSERT INTO `unit` (`id_unit`, `nama_unit`, `keterangan_unit`) VALUES (13, 'mn0', 'pqr');



SET FOREIGN_KEY_CHECKS=1;