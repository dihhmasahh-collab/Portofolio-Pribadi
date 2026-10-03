<?php
/* ============================================================
   config/database.php
   ------------------------------------------------------------
   Koneksi ke database MySQL menggunakan mysqli (PHP Native).
   Settingan ini sama dengan settingan default XAMPP:
     host     : localhost
     user     : root
     password : (kosong)
     database : portfolio_db

   Kalau password MySQL Anda tidak kosong, isi di $password.
   ============================================================ */

$host     = "localhost";
$user     = "root";
$password = "";
$database = "portfolio_db";

// Mulai PHP 8.1, mysqli otomatis melempar exception kalau query gagal.
// Baris ini mengubahnya jadi "tidak melempar", supaya kita bisa cek
// sendiri dengan if (...) dan menampilkan pesan yang rapi.
mysqli_report(MYSQLI_REPORT_OFF);

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi. mysqli_connect() mengembalikan FALSE kalau gagal.
if ($conn === false) {
    // Hentikan halaman dan tampilkan pesan error.
    die(
        "<div style='font-family:sans-serif;padding:24px;background:#0f1629;color:#e8ecf6'>
            <h2>Koneksi Database Gagal</h2>
            <p>Pesan error: " . mysqli_connect_error() . "</p>
            <p style='color:#9aa7c2'>Pastikan MySQL sudah dijalankan di XAMPP Control Panel
            dan database <b>portfolio_db</b> sudah di-import melalui phpMyAdmin.</p>
        </div>"
    );
}

// Supaya teks Indonesia (seperti huruf beraksen) tersimpan dengan benar.
mysqli_set_charset($conn, "utf8mb4");

// Zona waktu supaya tanggal pesan sesuai waktu Indonesia.
date_default_timezone_set('Asia/Jakarta');

/* ============================================================
   CARA PAKAI:
   Di file lain cukup tulis:
       include_once 'config/database.php';
   Setelah itu variabel $conn sudah bisa dipakai, contoh:
       $sql = "SELECT * FROM contacts";
       $result = mysqli_query($conn, $sql);
   ============================================================ */
