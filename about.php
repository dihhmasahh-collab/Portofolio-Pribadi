<?php
/* ============================================================
   about.php  -  Halaman About
   ============================================================ */

include_once 'data.php';

$pageTitle = 'About';
$aktif     = 'about';

include 'header.php';
?>

<!-- ============ ABOUT HERO ============ -->
<section class="page-head">
    <div class="container">
        <p class="section-tag">About</p>
        <h1 class="section-title">About Me</h1>
        <p class="section-desc">
            Sedikit penjelasan tentang saya sebagai mahasiswa Teknik Informatika.
        </p>
    </div>
</section>

<section class="section">
    <div class="container about-grid">

        <!-- Foto -->
        <div class="about-photo reveal">
            <img src="<?= $profil['foto'] ?>" alt="Foto profil <?= $profil['nama'] ?>">
        </div>

        <!-- Informasi -->
        <div class="about-info">
            <p class="reveal">
                Saya merupakan mahasiswa Teknik Informatika yang sedang mempelajari berbagai bidang
                teknologi, khususnya pengembangan website, pemrograman, database, dan aplikasi.
                Saat ini saya terus belajar secara mandiri agar bisa membuat project yang lebih baik.
            </p>

            <div class="info-grid">
                <?php
                // Data singkat yang ditampilkan sebagai kartu
                $info = [
                    'Nama'       => $profil['nama'],
                    'Status'     => $profil['status'],
                    'Jurusan'    => $profil['jurusan'],
                    'Universitas'=> $profil['universitas'],
                    'Minat'      => $profil['minat'],
                ];
                foreach ($info as $label => $value):
                ?>
                    <div class="info-item reveal">
                        <p class="info-label"><?= $label ?></p>
                        <p class="info-value"><?= $value ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="tags reveal">
                <span class="tag">HTML</span>
                <span class="tag">CSS</span>
                <span class="tag">JavaScript</span>
                <span class="tag">PHP</span>
                <span class="tag">MySQL</span>
                <span class="tag">Python</span>
            </div>

            <div class="reveal">
                <a href="<?= $profil['cv'] ?>" class="btn btn-primary" download>
                    <?= ikon('download') ?> Download CV
                </a>
            </div>
        </div>

    </div>
</section>

<?php include 'footer.php'; ?>