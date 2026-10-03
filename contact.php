<?php
/* ============================================================
   contact.php  -  Halaman Contact
   ============================================================
   Alur halaman ini:
     1. Membaca data POST dari form.
     2. Memeriksa data (validasi sederhana).
     3. Menyimpan data ke tabel contacts memakai prepared statement.
     4. Menampilkan pesan sukses atau gagal.
   ============================================================ */

include_once 'data.php';
include_once 'config/database.php';

$pageTitle = 'Contact';
$aktif     = 'contact';

// Nilai default form
$nama  = '';
$email = '';
$pesan = '';

// Status: null (belum kirim), 'sukses', 'gagal', atau 'validasi'
$status = null;
$error  = '';

/* ---------- 1. PROSES FORM (method POST) ---------- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ambil dan bersihkan input. htmlspecialchars supaya aman dari XSS.
    $nama  = trim(htmlspecialchars($_POST['nama']  ?? '', ENT_QUOTES, 'UTF-8'));
    $email = trim(htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8'));
    $pesan = trim(htmlspecialchars($_POST['pesan'] ?? '', ENT_QUOTES, 'UTF-8'));

    /* ---------- 2. VALIDASI SEDERHANA ---------- */
    if ($nama === '') {
        $status = 'validasi';
        $error  = 'Nama tidak boleh kosong.';
    } elseif (mb_strlen($nama) > 100) {
        $status = 'validasi';
        $error  = 'Nama maksimal 100 karakter.';
    } elseif ($email === '') {
        $status = 'validasi';
        $error  = 'Email tidak boleh kosong.';
    } elseif (mb_strlen($email) > 150) {
        $status = 'validasi';
        $error  = 'Email maksimal 150 karakter.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = 'validasi';
        $error  = 'Format email tidak valid.';
    } elseif ($pesan === '') {
        $status = 'validasi';
        $error  = 'Pesan tidak boleh kosong.';
    } else {

        /* ---------- 3. SIMPAN KE DATABASE (prepared statement) ---------- */
        // Tanda (?) adalah placeholder, nilainya dikirim terpisah lewat bind_param
        // sehingga aman dari SQL Injection.
        // try-catch dipakai sebagai pengaman, kalau misal tabel contacts
        // belum di-import maka pesan "Pesan gagal dikirim." yang muncul.
        try {
            $stmt = mysqli_prepare($conn, "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)");

            if ($stmt === false) {
                $berhasil = false;
            } else {
                mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
                $berhasil = mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
            }
        } catch (Throwable $e) {
            $berhasil = false;
        }

        if ($berhasil) {
            $status = 'sukses';
            // Kosongkan form setelah berhasil dikirim.
            $nama = $email = $pesan = '';
        } else {
            $status = 'gagal';
        }
    }
}

include 'header.php';
?>

<!-- ============ HEADER HALAMAN ============ -->
<section class="page-head">
    <div class="container">
        <p class="section-tag">Contact</p>
        <h1 class="section-title">Hubungi Saya</h1>
        <p class="section-desc">
            Punya pertanyaan atau ingin berdiskusi? Silakan kirim pesan lewat form di bawah.
        </p>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">

        <!-- ---------- KONTAK / SOSIAL MEDIA ---------- -->
        <div class="contact-info reveal">
            <h2 class="mini-title">Informasi Kontak</h2>

            <div class="contact-list">
                <?php foreach ($social as $s): ?>
                    <a href="<?= $s['url'] ?>" class="contact-item" target="_blank" rel="noopener">
                        <span class="contact-icon"><?= ikon($s['ikon']) ?></span>
                        <span class="contact-text">
                            <span class="contact-nama"><?= $s['nama'] ?></span>
                            <span class="contact-label"><?= $s['label'] ?></span>
                        </span>
                    </a>
                <?php endforeach; ?>
            </div>

            <div class="note-box">
                <p><b>Please Contact Mee</b> if you are interested in  <code>my</code> scope of work.</p>
            </div>
        </div>

        <!-- ---------- FORM PESAN ---------- -->
        <div class="card form-card reveal">
            <h2 class="mini-title">Kirim Pesan</h2>

            <!-- Pesan sukses / gagal / validasi -->
            <?php if ($status === 'sukses'): ?>
                <div class="alert alert-success">Terkirim! Pesan berhasil disimpan.</div>
            <?php elseif ($status === 'gagal'): ?>
                <div class="alert alert-error">Pesan gagal dikirim.</div>
            <?php elseif ($status === 'validasi'): ?>
                <div class="alert alert-error"><?= $error ?></div>
            <?php endif; ?>

            <form action="contact.php" method="POST" id="contactForm" novalidate>

                <div class="field">
                    <label for="nama">Nama</label>
                    <input type="text" id="nama" name="nama"
                           placeholder="Masukkan nama Anda"
                           value="<?= $nama ?>" maxlength="100">
                </div>

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email"
                           placeholder="nama@email.com"
                           value="<?= $email ?>" maxlength="150">
                </div>

                <div class="field">
                    <label for="pesan">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="5"
                              placeholder="Tulis pesan Anda di sini..."><?= $pesan ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Kirim Pesan</button>
            </form>
        </div>

    </div>
</section>

<?php include 'footer.php'; ?>