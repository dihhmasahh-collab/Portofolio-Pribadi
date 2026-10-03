<?php
/* ============================================================
   projects.php  -  Halaman Projects
   ============================================================ */

include_once 'data.php';

$pageTitle = 'Projects';
$aktif     = 'projects';

include 'header.php';
?>

<!-- ============ HEADER HALAMAN ============ -->
<section class="page-head">
    <div class="container">
        <p class="section-tag">Projects</p>
        <h1 class="section-title">Project Saya</h1>
        <p class="section-desc">
            Kumpulan project kuliah dan belajar mandiri.
        </p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="grid grid-projects">
            <?php foreach ($projects as $i => $project): ?>
                <article class="card project-card reveal">
                    <img class="project-thumb"
                         src="<?= $project['gambar'] ?>"
                         alt="Thumbnail <?= $project['judul'] ?>">

                    <div class="project-body">
                        <span class="project-no">Project 0<?= $i + 1 ?></span>
                        <h3 class="card-title"><?= $project['judul'] ?></h3>
                        <p class="card-text"><?= $project['deskripsi'] ?></p>

                        <div class="tags">
                            <?php foreach ($project['teknologi'] as $tech): ?>
                                <span class="tag"><?= $tech ?></span>
                            <?php endforeach; ?>
                        </div>

                        <?php if ($project['link'] === '#'): ?>
                            <a href="#" class="btn btn-ghost btn-sm">Lihat Project</a>
                            <small class="hint">Link project belum tersedia.</small>
                        <?php else: ?>
                            <a href="<?= $project['link'] ?>" class="btn btn-ghost btn-sm"
                               target="_blank" rel="noopener">Lihat Project</a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ CTA ============ -->
<section class="section">
    <div class="container">
        <div class="cta reveal">
            <h2 class="cta-title">Punya project untuk dikerjakan?</h2>
            <p class="cta-text">Silakan kirim pesan, saya akan membalas lewat email.</p>
            <a href="contact.php" class="btn btn-primary">Kunjungi Contact</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>