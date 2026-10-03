<?php
/* ============================================================
   index.php  -  Halaman Home
   ============================================================ */

include_once 'data.php';   // data pribadi, skill, dan project

$pageTitle = 'Home';
$aktif     = 'home';

include 'header.php';
?>

<!-- ============ HERO ============ -->
<section class="hero" id="home">
    <div class="container hero-grid">

        <div class="hero-text">
            <p class="pill hero-anim" style="--d:0ms">
                <span class="dot"></span> Portfolio Pribadi
            </p>

            <p class="greeting hero-anim" style="--d:80ms"><?= $profil['greeting'] ?></p>

            <h1 class="hero-name hero-anim" style="--d:160ms"><?= $profil['nama'] ?></h1>

            <p class="hero-job hero-anim" style="--d:240ms"><?= $profil['judul'] ?></p>

            <p class="hero-desc hero-anim" style="--d:320ms"><?= $profil['deskripsi'] ?></p>

            <div class="hero-actions hero-anim" style="--d:400ms">
                <a href="projects.php" class="btn btn-primary">
                    Lihat Project <?= ikon('arrow') ?>
                </a>
                <a href="<?= $profil['cv'] ?>" class="btn btn-ghost" download>
                    <?= ikon('download') ?> Download CV
                </a>
            </div>
        </div>

        <div class="hero-photo hero-anim" style="--d:240ms">
            <img src="<?= $profil['foto'] ?>" alt="Foto profil <?= $profil['nama'] ?>">
        </div>

    </div>
</section>

<!-- ============ SKILLS ============ -->
<section class="section" id="skills">
    <div class="container">

        <div class="section-head reveal">
            <p class="section-tag">Skills</p>
            <h2 class="section-title">Kemampuan Saya</h2>
            <p class="section-desc">
                Berikut beberapa teknologi yang saya pelajari dan gunakan
                untuk mengerjakan tugas dan project kuliah.
            </p>
        </div>

        <div class="grid grid-skills">
            <?php foreach ($skills as $skill): ?>
                <article class="card skill-card reveal">
                    <h3 class="card-title"><?= $skill['nama'] ?></h3>
                    <p class="card-text"><?= $skill['deskripsi'] ?></p>

                    <div class="bar">
                        <span class="bar-fill"
                              data-level="<?= (int) $skill['level'] ?>"
                              style="width: <?= (int) $skill['level'] ?>%"></span>
                    </div>
                    <p class="bar-label"><?= (int) $skill['level'] ?>%</p>
                </article>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<!-- ============ PROJECT PREVIEW ============ -->
<section class="section section-alt" id="projects">
    <div class="container">

        <div class="section-head reveal">
            <p class="section-tag">Projects</p>
            <h2 class="section-title">Project yang Pernah Saya Kerjakan</h2>
            <p class="section-desc">
                Beberapa project yang pernah saya kerjakan sebagai bagian dari perkuliahan.
            </p>
        </div>

        <div class="grid grid-projects">
            <?php foreach ($projects as $project): ?>
                <article class="card project-card reveal">
                    <img class="project-thumb"
                         src="<?= $project['gambar'] ?>"
                         alt="Thumbnail <?= $project['judul'] ?>">

                    <div class="project-body">
                        <h3 class="card-title"><?= $project['judul'] ?></h3>
                        <p class="card-text"><?= $project['deskripsi'] ?></p>

                        <div class="tags">
                            <?php foreach ($project['teknologi'] as $tech): ?>
                                <span class="tag"><?= $tech ?></span>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?= $project['link'] ?>" class="btn btn-ghost btn-sm">Lihat Project</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <div class="center reveal">
            <a href="projects.php" class="btn btn-primary">Lihat Semua Project</a>
        </div>

    </div>
</section>

<!-- ============ CTA ============ -->
<section class="section">
    <div class="container">
        <div class="cta reveal">
            <h2 class="cta-title">Tertarik untuk berkenalan?</h2>
            <p class="cta-text">
                Silakan kirim pesan lewat halaman contact. Saya terbuka untuk
                diskusi, kerja sama project, maupun sekadar berbagi cerita.
            </p>
            <a href="contact.php" class="btn btn-primary">Kunjungi Contact</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>