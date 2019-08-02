# Host: localhost  (Version 5.6.21)
# Date: 2019-07-06 11:05:48
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "user"
#

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `username` varchar(128) NOT NULL DEFAULT '',
  `nik` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(128) NOT NULL DEFAULT '',
  `password` varchar(256) NOT NULL DEFAULT '',
  `image` varchar(128) NOT NULL DEFAULT '',
  `alamat` varchar(255) DEFAULT '',
  `pekerjaan` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

#
# Data for table "user"
#

REPLACE INTO `user` VALUES (1,'admin','admin','123','admin@gmail.com','e10adc3949ba59abbe56e057f20f883e','default.jpg','jl saptamarga','informasi',1,1,1560158480),(10,'theo','theo','1234456','theo@gmail.com','e10adc3949ba59abbe56e057f20f883e','default.jpg','jl perum','data',2,1,1560158480),(11,'jemz','jemz','123','jemzginting@gmail.com','e10adc3949ba59abbe56e057f20f883e','default.jpg','gandus','analis ',2,1,1560917637),(12,'putri','putri','123','putri@gmail.com','e10adc3949ba59abbe56e057f20f883e','default.jpg','kertpati','honor',2,1,1560917844),(13,'boy','boy','123','sapramartga@gmail.com','e10adc3949ba59abbe56e057f20f883e','default.jpg','palembang','SMBR',2,1,1561363663);

#
# Structure for table "penilaian"
#

CREATE TABLE `penilaian` (
  `id_nilai` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` int(5) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_nilai`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `penilaian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

#
# Data for table "penilaian"
#

REPLACE INTO `penilaian` VALUES (1,2,'2019-06-26',10),(2,3,'2019-06-26',10),(3,4,'2019-06-26',10),(4,1,'2019-06-26',10),(5,1,NULL,10),(6,4,'2019-06-28',10),(7,4,'2019-06-30',10),(8,3,'2019-06-30',10),(9,2,'2019-06-30',10),(10,4,'2019-07-02',10),(11,4,'2019-07-02',10),(12,4,'2019-07-06',10);

#
# Structure for table "konsultasi"
#

CREATE TABLE `konsultasi` (
  `no_konsul` varchar(11) NOT NULL DEFAULT '',
  `nama_permohon` varchar(50) NOT NULL,
  `tanggal_permohonan` date NOT NULL,
  `waktu_permohonan` time NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `ktp` varchar(200) NOT NULL,
  `jenis_informasi` varchar(200) NOT NULL,
  `tujuan_informasi` text NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no_konsul`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `konsultasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "konsultasi"
#

REPLACE INTO `konsultasi` VALUES ('PTA006','jemz','2019-07-01','09:00:00','08127875821','7eeef7573d1eac1924532d72e4da8dc4.jpg','Perceraian','Konsultasi Masa Tenggang',11,'terima'),('PTA007','theo','2019-07-02','08:00:00','081992156001','b55c4046cefce937bc475856648ec798.jpg','Infaq','Syarat Infaq berdasarkan Syariat',10,'terima'),('PTA008','putri','2019-07-04','10:00:00','08125567182','334d983dfa8a8f982343df25480a5909.jpg','Wasiat','pembagian wasiat',12,'terima'),('PTA009','theo','2019-07-17','11:00:00','0821888324550','21af1e84f25d6ccf5d95fd98fcf37fcc.jpg','Waris','ahli waris',10,'terima'),('PTA010','jemz','2019-07-18','10:00:00','081278759921','86c025b64e300485cfc4e66ae29272e1.jpg','Zakat','Syarat Zakat',11,'terima'),('PTA012','putri','2019-07-25','09:00:00','08192322213','63c9032cb363e9286cc6cdc218c4f048.jpg','Perceraian','AKU NAK CEGHAI',12,'terima'),('PTA013','theo','2019-07-02','14:15:00','081231231','fcf786fc90826b75749292aa48852e74.jpg','Zakat','membantu orang',10,'terima');

#
# Structure for table "chat"
#

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(5) DEFAULT NULL,
  `waktu` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pesan` text,
  `id_target` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_chat`),
  KEY `id_user` (`id_user`),
  KEY `id_target` (`id_target`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_target`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

#
# Data for table "chat"
#

REPLACE INTO `chat` VALUES (1,12,'2019-07-02 22:00:26','admin, mau minta bantuan',1),(2,10,'2019-07-02 22:00:48','mau konsultasi caranya gmanaa ya min',1),(3,10,'2019-07-04 07:51:09','kurang',1),(4,10,'2019-07-04 07:51:10','kurang',1),(5,10,'2019-07-04 07:52:26','ad',1),(6,10,'2019-07-04 07:52:44','ta',1),(7,10,'2019-07-04 07:53:57','jbj',1),(8,10,'2019-07-04 07:53:57','jbj',1),(9,10,'2019-07-04 07:56:29','ui',1),(10,10,'2019-07-04 07:56:30','ui',1),(11,10,'2019-07-04 07:57:53','cek',1),(12,10,'2019-07-04 07:59:02','hj',1),(13,10,'2019-07-04 07:59:19','asd',1),(14,10,'2019-07-04 07:59:30','asds',1),(15,10,'2019-07-04 08:07:21','cz',1),(16,10,'2019-07-04 08:07:33','dfdsf',1),(17,10,'2019-07-04 08:09:04','k',1),(18,10,'2019-07-04 08:09:04','k',1),(19,10,'2019-07-04 08:09:08','mm',1),(20,10,'2019-07-04 08:09:09','mm',1),(21,10,'2019-07-04 08:09:23','mmm',1),(22,10,'2019-07-04 08:14:20','yaya',1),(23,10,'2019-07-04 08:14:21','yaya',1),(24,10,'2019-07-04 08:15:21','asd',1),(25,10,'2019-07-04 08:15:22','asd',1),(26,10,'2019-07-04 08:17:37','yoyo',1),(27,10,'2019-07-04 08:17:37','yoyo',1),(28,10,'2019-07-04 08:19:10','kl',1),(29,10,'2019-07-04 08:19:20','hk',1),(30,10,'2019-07-04 08:20:06','asdas',1),(31,10,'2019-07-04 08:21:41','yaya',1),(32,10,'2019-07-04 08:21:41','yaya',1),(33,10,'2019-07-04 08:23:06','kuta',1),(34,10,'2019-07-04 08:23:06','kuta',1),(35,10,'2019-07-04 08:23:37','xcz',1),(36,10,'2019-07-04 08:23:46','qwerty',1),(37,10,'2019-07-04 08:24:32','sd',1),(38,10,'2019-07-04 08:25:21','',1),(39,10,'2019-07-04 08:25:24','dfd',1),(40,10,'2019-07-04 08:25:25','',1),(41,10,'2019-07-04 08:25:30','dsd',1),(42,10,'2019-07-04 08:25:31','',1),(43,10,'2019-07-04 08:25:36','asd',1),(44,10,'2019-07-04 08:25:36','',1),(45,10,'2019-07-04 08:26:16','jj',1),(46,10,'2019-07-04 08:26:16','jj',1),(47,10,'2019-07-04 08:28:05','lala',1),(48,10,'2019-07-04 08:28:26','kuat',1),(49,10,'2019-07-04 08:29:11','lepas aja',1),(50,10,'2019-07-04 08:30:42','kau la',1),(51,1,'2019-07-04 10:29:24','hey',10),(52,10,'2019-07-05 21:50:15','alin',1),(53,10,'2019-07-05 21:59:27','permisi',1),(54,10,'2019-07-06 08:46:44','selamat pagi',1);

#
# Structure for table "user_role"
#

CREATE TABLE `user_role` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Data for table "user_role"
#

REPLACE INTO `user_role` VALUES (1,'Admin'),(2,'Member');
