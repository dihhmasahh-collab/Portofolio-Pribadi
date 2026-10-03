<?php
/* ============================================================
   header.php
   ------------------------------------------------------------
   Dipakai oleh semua halaman (index, about, projects, contact).
   Berisi bagian <head> + navbar.

   Variabel yang boleh diatur sebelum include:
   $pageTitle : judul di tab browser
   $aktif     : menu yang sedang aktif (home/about/skills/projects/contact)
   ============================================================ */

$pageTitle = $pageTitle ?? 'Portfolio';
$aktif     = $aktif     ?? 'home';

// Daftar menu navbar
$menu = [
    'home'     => ['label' => 'Home',     'url' => 'index.php'],
    'about'    => ['label' => 'About',    'url' => 'about.php'],
    'skills'   => ['label' => 'Skills',   'url' => 'index.php#skills'],
    'projects' => ['label' => 'Projects', 'url' => 'projects.php'],
    'contact'  => ['label' => 'Contact',  'url' => 'contact.php'],
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?> | Portfolio <?= $profil['nama'] ?></title>
    <meta name="description" content="Portfolio pribadi mahasiswa Teknik Informatika: profile, skill, dan project kuliah.">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ============ NAVBAR ============ -->
<header class="navbar">
    <div class="container nav-inner">

        <a href="index.php" class="brand">Portfolio</a>

        <button class="nav-toggle" id="navToggle" aria-label="Buka menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="nav-menu" id="navMenu">
            <?php foreach ($menu as $key => $item): ?>
                <a href="<?= $item['url'] ?>"
                   class="nav-link <?= $aktif === $key ? 'active' : '' ?>">
                    <?= $item['label'] ?>
                </a>
            <?php endforeach; ?>
        </nav>

    </div>
</header>

<main>