CREATE DATABASE IF NOT EXISTS perpustakaan;
USE perpustakaan;
CREATE TABLE IF NOT EXISTS user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role ENUM('admin','petugas')
);
INSERT INTO user (username, password, role) VALUES ('admin', 'admin', 'admin'), ('petugas', 'petugas', 'petugas');
CREATE TABLE IF NOT EXISTS buku (id INT AUTO_INCREMENT PRIMARY KEY, judul VARCHAR(100));
CREATE TABLE IF NOT EXISTS anggota (id INT AUTO_INCREMENT PRIMARY KEY, nama VARCHAR(100));
