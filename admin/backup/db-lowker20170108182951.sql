DROP TABLE IF EXISTS admin;

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_nama` varchar(51) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_nama` (`admin_nama`),
  KEY `fk_admin_login` (`login_id`),
  CONSTRAINT `fk_admin_login` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("2","Admin","21");



DROP TABLE IF EXISTS calon_pekerja;

CREATE TABLE `calon_pekerja` (
  `calon_pekerja_id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_pekerja_nama_lengkap` varchar(51) NOT NULL,
  `calon_pekerja_alamat` varchar(101) NOT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `calon_pekerja_jenis_kelamin` enum('L','P') NOT NULL,
  `calon_pekerja_tempat_lahir` varchar(51) NOT NULL,
  `calon_pekerja_tanggal_lahir` date NOT NULL,
  `calon_pekerja_status_pernikahan` enum('Lajang','Menikah','Janda/Duda') DEFAULT NULL,
  `calon_pekerja_email` varchar(51) NOT NULL,
  `calon_pekerja_telepon` varchar(13) NOT NULL,
  `calon_pekerja_pendidikan_terakhir` enum('SD','SMP','SMA','S1','S2') NOT NULL,
  `calon_pekerja_tempat_pendidikan_terakhir` varchar(51) NOT NULL,
  `calon_pekerja_tempat_bekerja_terakhir` varchar(51) NOT NULL,
  `calon_pekerja_pekerjaan_bekerja_terakhir` varchar(51) NOT NULL,
  `calon_pekerja_file_cv` varchar(101) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`calon_pekerja_id`),
  KEY `fk_calon_pekerja_kota` (`kota_id`),
  KEY `fk_calon_pekerja_login` (`login_id`),
  CONSTRAINT `fk_calon_pekerja_kota` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_calon_pekerja_login` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO calon_pekerja VALUES("6","Rakhmat Sabarudin","Jl. Asia Afrika","1","L","Bandung","2017-01-31","Lajang","rakhmat@gmail.com","088888888","SD","SMA 77 Bandung","-","-","","19");
INSERT INTO calon_pekerja VALUES("7","Firman Nizammudin Fakhrul","Jl. Antapani","1","L","Bandung","2017-01-12","Lajang","firmannizammudin@gmail.com","087821996016","SD","SMKN 4 Bandung","Perusahaan XYZ","Android Developer","firmannizammudinfakhrul20170108165949.jpg","22");
INSERT INTO calon_pekerja VALUES("10","Evan Gilang","","1","L","","0000-00-00","Lajang","","","SD","","","","","28");



DROP TABLE IF EXISTS kategori;

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(21) NOT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `kategori_nama` (`kategori_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO kategori VALUES("8","Marketing");
INSERT INTO kategori VALUES("6","Pertambangan");
INSERT INTO kategori VALUES("4","Teknologi Informasi");



DROP TABLE IF EXISTS kota;

CREATE TABLE `kota` (
  `kota_id` int(11) NOT NULL AUTO_INCREMENT,
  `kota_nama` varchar(51) NOT NULL,
  PRIMARY KEY (`kota_id`),
  UNIQUE KEY `kota_nama` (`kota_nama`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO kota VALUES("1","Bandung");
INSERT INTO kota VALUES("4","DKI Jakarta");
INSERT INTO kota VALUES("5","Surabaya");



DROP TABLE IF EXISTS lamaran;

CREATE TABLE `lamaran` (
  `lamaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `calon_pekerja_id` int(11) NOT NULL,
  `lamaran_status_lolos` enum('Menunggu','Lolos','Tidak Lolos') NOT NULL,
  PRIMARY KEY (`lamaran_id`),
  UNIQUE KEY `lowongan_id` (`lowongan_id`,`calon_pekerja_id`),
  UNIQUE KEY `lowongan_id_2` (`lowongan_id`,`calon_pekerja_id`),
  KEY `calon_pekerja_id` (`calon_pekerja_id`),
  CONSTRAINT `lamaran_ibfk_1` FOREIGN KEY (`calon_pekerja_id`) REFERENCES `calon_pekerja` (`calon_pekerja_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `lamaran_ibfk_2` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO lamaran VALUES("8","6","6","Tidak Lolos");
INSERT INTO lamaran VALUES("13","6","7","Lolos");
INSERT INTO lamaran VALUES("14","13","7","Menunggu");
INSERT INTO lamaran VALUES("15","10","7","Menunggu");
INSERT INTO lamaran VALUES("16","13","10","Menunggu");



DROP TABLE IF EXISTS login;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_username` varchar(26) NOT NULL,
  `login_password` varchar(101) NOT NULL,
  `login_role` enum('Admin','Perusahaan','Calon Pekerja') NOT NULL DEFAULT 'Calon Pekerja',
  PRIMARY KEY (`login_id`),
  UNIQUE KEY `login_username` (`login_username`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO login VALUES("19","rakhmat","dc5e1940657c054009d83261b4e5ab86","Calon Pekerja");
INSERT INTO login VALUES("20","googlehq","967b25aaaa3cc005258c6692cf788306","Perusahaan");
INSERT INTO login VALUES("21","admin","21232f297a57a5a743894a0e4a801fc3","Admin");
INSERT INTO login VALUES("22","firmannf","68beb1b04725ba41ede11bfc15509ee2","Calon Pekerja");
INSERT INTO login VALUES("25","ms","ee33e909372d935d190f4fcb2a92d542","Perusahaan");
INSERT INTO login VALUES("27","fb","35ce1d4eb0f666cd136987d34f64aedc","Perusahaan");
INSERT INTO login VALUES("28","evan","98cc7d37dc7b90c14a59ef0c5caa8995","Calon Pekerja");



DROP TABLE IF EXISTS lowongan;

CREATE TABLE `lowongan` (
  `lowongan_id` int(11) NOT NULL AUTO_INCREMENT,
  `perusahaan_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `lowongan_judul` varchar(51) NOT NULL,
  `lowongan_deskripsi` text NOT NULL,
  `lowongan_tgl_buka` date NOT NULL,
  `lowongan_tgl_tutup` date NOT NULL,
  PRIMARY KEY (`lowongan_id`),
  KEY `fk_lowongan_perusahaan` (`perusahaan_id`),
  KEY `fk_lowongan_kategori` (`kategori_id`),
  CONSTRAINT `fk_lowongan_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_lowongan_perusahaan` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`perusahaan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO lowongan VALUES("6","6","4","Looking for Android Dev","for real we\'re looking for android developer","2017-01-02","2017-01-17");
INSERT INTO lowongan VALUES("10","7","4","Mencari Programmer .NET","Mencari programmer .net yang sangat berpengalaman","2017-01-08","2017-01-26");
INSERT INTO lowongan VALUES("13","6","4","Mencari Programmer C++","Mencari programmer C++ yang sangat mantap sekali","2017-01-08","2017-01-31");



DROP TABLE IF EXISTS lowongan_jobdesc;

CREATE TABLE `lowongan_jobdesc` (
  `lowongan_jobdesc_id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `lowongan_jobdesc_isi` varchar(101) NOT NULL,
  PRIMARY KEY (`lowongan_jobdesc_id`),
  KEY `fk_jobdesc_lowongan` (`lowongan_id`),
  CONSTRAINT `fk_jobdesc_lowongan` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO lowongan_jobdesc VALUES("6","6","Just do the code");
INSERT INTO lowongan_jobdesc VALUES("8","10","Melacak, kompilasi, dan menganalisis data penggunaan situs web perusahaan");
INSERT INTO lowongan_jobdesc VALUES("9","10","Mengembangkan atau gaya dokumen pedoman untuk konten situs web");
INSERT INTO lowongan_jobdesc VALUES("12","13","Membuat algoritma AI dengan bahasa C++");



DROP TABLE IF EXISTS lowongan_syarat;

CREATE TABLE `lowongan_syarat` (
  `lowongan_syarat_id` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) NOT NULL,
  `lowongan_syarat` varchar(101) NOT NULL,
  PRIMARY KEY (`lowongan_syarat_id`),
  KEY `fk_syarat_lowongan` (`lowongan_id`),
  CONSTRAINT `fk_syarat_lowongan` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`lowongan_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

INSERT INTO lowongan_syarat VALUES("67","6","OOP Expert");
INSERT INTO lowongan_syarat VALUES("68","6","Java Expert");
INSERT INTO lowongan_syarat VALUES("71","10","Bisa C#");
INSERT INTO lowongan_syarat VALUES("73","10","Bisa SQL Server");
INSERT INTO lowongan_syarat VALUES("76","13","Bisa C++");
INSERT INTO lowongan_syarat VALUES("77","13","Bisa OOP");



DROP TABLE IF EXISTS perusahaan;

CREATE TABLE `perusahaan` (
  `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT,
  `perusahaan_nama` varchar(51) NOT NULL,
  `perusahaan_alamat` varchar(101) NOT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `perusahaan_email` varchar(51) NOT NULL,
  `perusahaan_telepon` varchar(13) NOT NULL,
  `login_id` int(11) NOT NULL,
  PRIMARY KEY (`perusahaan_id`),
  UNIQUE KEY `perusahaan_nama` (`perusahaan_nama`),
  KEY `fk_perusahaan_kota` (`kota_id`),
  KEY `fk_perusahaan_login` (`login_id`),
  CONSTRAINT `fk_perusahaan_kota` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`kota_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_perusahaan_login` FOREIGN KEY (`login_id`) REFERENCES `login` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO perusahaan VALUES("6","Google HQ","Antapani","1","google@gmail.com","0222222","20");
INSERT INTO perusahaan VALUES("7","Microsoft","Jl. Dipatiukur JKT","4","ms@outlook.com","021222222","25");
INSERT INTO perusahaan VALUES("9","Facebook","","1","","","27");



