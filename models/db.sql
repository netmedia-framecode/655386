-- Active: 1734576880718@@127.0.0.1@3306@spk_blt
CREATE TABLE
  utilities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    logo VARCHAR(50),
    name_web VARCHAR(75),
    keyword TEXT,
    description TEXT,
    author VARCHAR(50)
  );

CREATE TABLE
  auth (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image VARCHAR(50),
    bg VARCHAR(35),
    model INT DEFAULT 2
  );

CREATE TABLE
  user_role (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(35)
  );

INSERT INTO
  user_role (role)
VALUES
  ('Administrator'),
  ('Owner'),
  ('Member');

CREATE TABLE
  user_status (
    id_status INT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(35)
  );

INSERT INTO
  user_status (status)
VALUES
  ('Active'),
  ('No Active');

CREATE TABLE
  users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_active INT,
    en_user VARCHAR(75),
    token CHAR(6),
    name VARCHAR(100),
    image VARCHAR(100),
    email VARCHAR(75),
    password VARCHAR(100),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_active) REFERENCES user_status (id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  user_menu (
    id_menu INT AUTO_INCREMENT PRIMARY KEY,
    icon VARCHAR(50),
    menu VARCHAR(50)
  );

CREATE TABLE
  user_sub_menu (
    id_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_menu INT,
    id_active INT,
    title VARCHAR(50),
    url VARCHAR(50),
    FOREIGN KEY (id_menu) REFERENCES user_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_active) REFERENCES user_status (id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
  );

CREATE TABLE
  user_access_menu (
    id_access_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_menu INT,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_menu) REFERENCES user_menu (id_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  user_access_sub_menu (
    id_access_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
    id_role INT,
    id_sub_menu INT,
    FOREIGN KEY (id_role) REFERENCES user_role (id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
    FOREIGN KEY (id_sub_menu) REFERENCES user_sub_menu (id_sub_menu) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  kriteria (
    id_kriteria INT AUTO_INCREMENT PRIMARY KEY,
    kode_kriteria VARCHAR(10),
    nama_kriteria VARCHAR(50),
    atribut ENUM ('Benefit', 'Cost'),
    bobot FLOAT
  );

CREATE TABLE
  sub_kriteria (
    id_sub_kriteria INT AUTO_INCREMENT PRIMARY KEY,
    id_kriteria INT,
    sub_kriteria VARCHAR(50),
    nilai_sub INT,
    FOREIGN KEY (id_kriteria) REFERENCES kriteria (id_kriteria) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  penerima_blt (
    id_penerima_blt INT AUTO_INCREMENT PRIMARY KEY,
    nama_lengkap VARCHAR(100),
    nik CHAR(16) UNIQUE,
    alamat TEXT,
    rt_rw VARCHAR(10),
    desa_kelurahan VARCHAR(100),
    kecamatan VARCHAR(100),
    kabupaten_kota VARCHAR(100),
    status_pekerjaan VARCHAR(50),
    jumlah_tanggungan INT,
    penghasilan CHAR(20)
    -- status_penerima ENUM ('Layak', 'Tidak Layak')
  );

CREATE TABLE
  alternatif (
    id_alternatif INT AUTO_INCREMENT PRIMARY KEY,
    id_penerima_blt INT,
    penghasilan VARCHAR(75),
    pekerjaan VARCHAR(75),
    tanggungan VARCHAR(75),
    luas_tanah VARCHAR(75),
    umur VARCHAR(75),
    FOREIGN KEY (id_penerima_blt) REFERENCES penerima_blt (id_penerima_blt) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  tabel_nilai (
    id_nilai INT AUTO_INCREMENT PRIMARY KEY,
    id_kriteria INT,
    id_penerima_blt INT,
    nilai_sub INT,
    FOREIGN KEY (id_kriteria) REFERENCES kriteria (id_kriteria) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_penerima_blt) REFERENCES penerima_blt (id_penerima_blt) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  tabel_hasil (
    id_hasil INT AUTO_INCREMENT PRIMARY KEY,
    id_alternatif INT,
    nilai_total INT,
    FOREIGN KEY (id_alternatif) REFERENCES alternatif (id_penerima_blt) ON UPDATE CASCADE ON DELETE CASCADE
  );

CREATE TABLE
  tabel_normalisasi (
    id_normalisasi INT AUTO_INCREMENT PRIMARY KEY,
    id_alternatif INT,
    id_kriteria INT,
    nilai_normalisasi FLOAT,
    FOREIGN KEY (id_kriteria) REFERENCES kriteria (id_kriteria) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_alternatif) REFERENCES alternatif (id_alternatif) ON UPDATE CASCADE ON DELETE CASCADE
  );