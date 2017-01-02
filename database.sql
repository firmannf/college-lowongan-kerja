DROP DATABASE IF EXISTS db_lowker;

/*A. Membuat Database*/
CREATE DATABASE IF NOT EXISTS db_lowker;

/*A.1 Memilih Database*/
USE db_lowker;

CREATE TABLE IF NOT EXISTS kota(
    kota_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    kota_nama VARCHAR(51) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS kategori(
    kategori_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    kategori_nama VARCHAR(21) UNIQUE NOT NULL
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS login(
    login_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    login_username VARCHAR(26) UNIQUE NOT NULL,
    login_password VARCHAR(101) NOT NULL,
    login_role ENUM('Admin', 'Perusahaan', 'Calon Pekerja') DEFAULT 'Calon Pekerja' NOT NULL
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS admin(
    admin_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    admin_nama VARCHAR(51) UNIQUE NOT NULL,
    login_id INT(11) NOT NULL,
    
    CONSTRAINT fk_admin_login FOREIGN KEY (login_id) REFERENCES login(login_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS calon_pekerja(
    calon_pekerja_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    calon_pekerja_nama_lengkap VARCHAR(51) NOT NULL,
    calon_pekerja_alamat VARCHAR(101) NOT NULL,
    kota_id INT(11),
    calon_pekerja_jenis_kelamin enum('L', 'P') NOT NULL,
    calon_pekerja_tempat_lahir VARCHAR(51) NOT NULL,
    calon_pekerja_tanggal_lahir DATE NOT NULL,
    calon_pekerja_status_pernikahan enum('Lajang', 'Menikah', 'Janda/Duda'),
    calon_pekerja_email VARCHAR(51) NOT NULL,
    calon_pekerja_telepon VARCHAR(13) NOT NULL,
    calon_pekerja_pendidikan_terakhir enum('SD', 'SMP', 'SMA','S1', 'S2') NOT NULL,
    calon_pekerja_tempat_pendidikan_terakhir VARCHAR(51) NOT NULL,
    calon_pekerja_tempat_bekerja_terakhir VARCHAR(51) NOT NULL,
    calon_pekerja_pekerjaan_bekerja_terakhir VARCHAR(51) NOT NULL,
    calon_pekerja_file_cv VARCHAR(101) NOT NULL,
    login_id INT(11) NOT NULL,
    
    CONSTRAINT fk_calon_pekerja_kota FOREIGN KEY (kota_id) REFERENCES kota(kota_id) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_calon_pekerja_login FOREIGN KEY (login_id) REFERENCES login(login_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS perusahaan(
    perusahaan_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    perusahaan_nama VARCHAR(51) UNIQUE NOT NULL,
    perusahaan_alamat VARCHAR(101) NOT NULL,
    kota_id INT(11),
    perusahaan_email VARCHAR(51) NOT NULL,
    perusahaan_telepon VARCHAR(13) NOT NULL,
    login_id INT(11) NOT NULL,
    
    CONSTRAINT fk_perusahaan_kota FOREIGN KEY (kota_id) REFERENCES kota(kota_id) ON DELETE SET NULL ON UPDATE CASCADE,
    CONSTRAINT fk_perusahaan_login FOREIGN KEY (login_id) REFERENCES login(login_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lowongan(
    lowongan_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    perusahaan_id INT(11) NOT NULL,
    kategori_id INT(11) NOT NULL,
    lowongan_judul VARCHAR(51) NOT NULL,
    lowongan_deskripsi TEXT NOT NULL,
    lowongan_tgl_buka DATE NOT NULL,
    lowongan_tgl_tutup DATE NOT NULL,

    CONSTRAINT fk_lowongan_perusahaan FOREIGN KEY (perusahaan_id) REFERENCES perusahaan(perusahaan_id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_lowongan_kategori FOREIGN KEY (kategori_id) REFERENCES kategori(kategori_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lowongan_syarat(
    lowongan_syarat_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    lowongan_id INT(11) NOT NULL,
    lowongan_syarat VARCHAR(101) NOT NULL,
    
    CONSTRAINT fk_syarat_lowongan FOREIGN KEY (lowongan_id) REFERENCES lowongan(lowongan_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lowongan_jobdesc(
    lowongan_jobdesc_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    lowongan_id INT(11) NOT NULL,
    lowongan_jobdesc_isi VARCHAR(101) NOT NULL,
    
    CONSTRAINT fk_jobdesc_lowongan FOREIGN KEY (lowongan_id) REFERENCES lowongan(lowongan_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS lamaran(
    lamaran_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    lowongan_id INT(11) NOT NULL,
    calon_pekerja_id INT(11) NOT NULL,
    lamaran_status_lolos enum('Menunggu', 'Lolos', 'Tidak Lolos') NOT NULL,

    FOREIGN KEY (calon_pekerja_id) REFERENCES calon_pekerja(calon_pekerja_id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (lowongan_id) REFERENCES lowongan(lowongan_id) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;