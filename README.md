# Portfolio Pribadi — Dimas Said Bayu Evansa

Website portfolio pribadi untuk menampilkan profile, skill, project, dan kontak.

Dibuat sebagai **HTML, CSS, PHP Native, JavaScript, dan MySQL** — tanpa framework
dan tanpa library CSS/JS eksternal. Dirancang agar ringan, mudah dibaca, dan
mudah diedit.

| | |
|---|---|
| **Bahasa** | HTML, CSS, PHP Native, JavaScript |
| **Database** | MySQL (`mysqli`) |
| **Server lokal** | XAMPP (Apache + MySQL) |
| **Tema** | Dark modern (navy) dengan aksen biru |
| **Mahasiswa** | Teknik Informatika — Universitas Indraprasta PGRI |

---

## Fitur

- **Home** — hero dengan greeting, nama, judul, foto profil, dan tombol aksi
- **Skills** — kartu skill lengkap dengan progress bar
- **Projects** — kartu project: thumbnail, deskripsi, teknologi, dan link repository
- **About** — profil diri, informasi akademik, dan tautan unduh CV
- **Contact** — kontak (email, GitHub, Instagram) plus form pesan yang tersimpan ke MySQL
- **Responsif** — tampilannya menyesuaikan di laptop, tablet, dan HP
- **Animasi ringan** — transisi, hover, dan animasi muncul saat scroll

---

## Struktur Folder

```
portfolio/
│
├── index.php            # Halaman Home
├── about.php            # Halaman About
├── projects.php         # Halaman Projects
├── contact.php          # Halaman Contact + proses form (PHP POST)
│
├── header.php           # <head> + navbar (include)
├── footer.php           # footer (include)
├── data.php             # semua data pribadi, skill, dan project
│
├── style.css            # seluruh styling
├── script.js            # navbar HP, smooth scroll, animasi, validasi
│
├── config/
│   └── database.php     # koneksi MySQL (mysqli)
│
├── assets/
│   ├── img/             # foto profil + thumbnail project
│   └── cv/              # file CV (PDF)
│
├── database.sql         # struktur tabel + data contoh
├── .htaccess            # keamanan folder
└── .gitignore
```

---

## Cara Menjalankan

### 1. Salin folder ke `htdocs`

```
C:\xampp\htdocs\portfolio
```

### 2. Jalankan Apache dan MySQL

Buka **XAMPP Control Panel**, klik **Start** pada Apache dan MySQL.

### 3. Import database

1. Buka `http://localhost/phpmyadmin`
2. Klik menu **Import**
3. Pilih file `database.sql`
4. Klik **Go**

Database `portfolio_db` dan tabel `contacts` akan otomatis dibuat.

### 4. Jalankan

```
http://localhost/portfolio/
```

---

## Cara Mengubah Isi Website

Semua teks, skill, dan project terkumpul di **satu file: `data.php`**,
sehingga tidak perlu menyentuh file lain.

| Yang diubah | Bagian |
|---|---|
| Nama, universitas, deskripsi | `$profil` |
| Email, GitHub, Instagram | `$social` |
| Daftar skill dan progress bar | `$skills` |
| Daftar project dan link repository | `$projects` |

Untuk mengganti foto dan CV, cukup timpa file-nya dengan nama yang sama:

- `assets/img/profile.jpg`
- `assets/img/project-simaha.jpg`, `project-hotel.jpg`, `project-datafraud.jpg`
- `assets/cv/cv.pdf`

---

## Cara Kerja Form Contact

1. Form memakai `method="POST"` dan `action="contact.php"`.
2. PHP memvalidasi: nama tidak kosong, email tidak kosong, format email valid, dan pesan tidak kosong.
3. Data disimpan ke tabel `contacts` memakai **prepared statement**
   (`mysqli_prepare` + `mysqli_stmt_bind_param`), sehingga aman dari SQL Injection.
4. Hasil:

| Keadaan | Pesan |
|---|---|
| Berhasil | `Terkirim! Pesan berhasil disimpan.` |
| Gagal | `Pesan gagal dikirim.` |

Pesan yang masuk bisa dilihat di phpMyAdmin → `portfolio_db` → tabel `contacts`.

---

## Catatan

- Website ini tidak memakai framework, admin panel, login, atau API.
  Seluruh backend terdiri dari PHP Native dan MySQL.
- File `.htaccess` memblokir akses langsung ke `database.sql` dan folder `.git`,
  sehingga file database tidak bisa diunduh lewat browser.
- Koneksi database memakai user `root` password kosong — settingan default XAMPP
  untuk pengembangan lokal. Jangan dipakai di server publik.