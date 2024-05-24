-- 1. Membuat database
CREATE DATABASE IF NOT EXISTS db_lembaga_pelatihan;

-- Menggunakan database yang dibuat
USE db_lembaga_pelatihan;

-- 2. Membuat tabel user
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255),
    alamat TEXT,
    no_telp VARCHAR(15),
    email VARCHAR(255),
    foto VARCHAR(255),
    role ENUM('1', '2', '3')
);

-- 3. Membuat tabel program
CREATE TABLE IF NOT EXISTS program (
    id_program INT AUTO_INCREMENT PRIMARY KEY,
    nama_program VARCHAR(255),
    deskripsi TEXT,
    jadwal TEXT,
    biaya INT,
    materi TEXT
);

-- 4. Membuat tabel nilai
CREATE TABLE IF NOT EXISTS nilai (
    id_nilai INT AUTO_INCREMENT PRIMARY KEY,
    id_peserta INT,
    id_program INT,
    nilai_ujian INT,
    nilai_tugas INT,
    FOREIGN KEY (id_peserta) REFERENCES user(id),
    FOREIGN KEY (id_program) REFERENCES program(id_program)
);

-- 5. Membuat tabel berita
CREATE TABLE IF NOT EXISTS berita (
    id_berita INT AUTO_INCREMENT PRIMARY KEY,
    judul_berita VARCHAR(255),
    isi_berita TEXT,
    tanggal_publikasi DATE,
    foto_berita VARCHAR(255)
);

-- 6. Membuat tabel agenda
CREATE TABLE IF NOT EXISTS agenda (
    id_agenda INT AUTO_INCREMENT PRIMARY KEY,
    judul_agenda VARCHAR(255),
    tanggal_agenda DATE,
    waktu_agenda TIME,
    lokasi_agenda VARCHAR(255)
);

-- 7. Membuat tabel participant_program
CREATE TABLE IF NOT EXISTS participant_program (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_peserta INT NOT NULL,
    id_program INT NOT NULL,
    FOREIGN KEY (id_peserta) REFERENCES user(id),
    FOREIGN KEY (id_program) REFERENCES program(id_program)
);

-- 8. Menambahkan contoh data ke dalam tabel
INSERT INTO user (nama, alamat, no_telp, email, foto, role) VALUES
('Admin 1', 'Jl. Admin 1', '081234567890', 'admin1@example.com', 'admin1.jpg', '1'),
('Peserta 1', 'Jl. Peserta 1', '081234567891', 'peserta1@example.com', 'peserta1.jpg', '2'),
('Peserta 2', 'Jl. Peserta 2', '081234567892', 'peserta2@example.com', 'peserta2.jpg', '2'),
('Pelatih 1', 'Jl. Pelatih 1', '081234567893', 'pelatih1@example.com', 'pelatih1.jpg', '3');

INSERT INTO program (nama_program, deskripsi, jadwal, biaya, materi) VALUES
('Program A', 'Deskripsi Program A', 'Senin-Jumat, 08:00-16:00', 1000000, 'Materi Program A'),
('Program B', 'Deskripsi Program B', 'Senin-Jumat, 09:00-17:00', 1200000, 'Materi Program B');

INSERT INTO nilai (id_peserta, id_program, nilai_ujian, nilai_tugas) VALUES
(2, 1, 85, 90),
(3, 1, 90, 95),
(3, 2, 80, 85);

INSERT INTO berita (judul_berita, isi_berita, tanggal_publikasi, foto_berita) VALUES
('Berita 1', 'Isi Berita 1', '2024-04-01', 'berita1.jpg'),
('Berita 2', 'Isi Berita 2', '2024-04-15', 'berita2.jpg');

INSERT INTO agenda (judul_agenda, tanggal_agenda, waktu_agenda, lokasi_agenda) VALUES
('Agenda 1', '2024-05-05', '09:00:00', 'Tempat 1'),
('Agenda 2', '2024-05-10', '10:00:00', 'Tempat 2');