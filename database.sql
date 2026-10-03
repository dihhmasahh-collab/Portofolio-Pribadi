-- ============================================================
--  database.sql
--  ------------------------------------------------------------
--  File ini bisa langsung di-import ke phpMyAdmin.
--
--  Cara import:
--   1. Jalankan XAMPP -> klik Start pada Apache dan MySQL.
--   2. Buka browser -> http://localhost/phpmyadmin
--   3. Klik menu "Import" di bagian atas.
--   4. Pilih file database.sql ini, lalu klik "Go".
--
--  Setelah selesai, database "portfolio_db" dan tabel "contacts"
--  akan otomatis dibuat.
-- ============================================================

-- 1. Membuat database
CREATE DATABASE IF NOT EXISTS portfolio_db;

-- 2. Memakai database tersebut
USE portfolio_db;

-- 3. Membuat tabel untuk menyimpan pesan dari form contact
CREATE TABLE IF NOT EXISTS contacts (
    id         INT AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(100) NOT NULL,
    email      VARCHAR(150) NOT NULL,
    message    TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 4. Contoh data (opsional, boleh dihapus)
INSERT INTO contacts (name, email, message) VALUES
('[NAMA ANDA]', '[EMAIL]', 'Contoh pesan dari form contact.');