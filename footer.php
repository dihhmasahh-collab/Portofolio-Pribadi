<?php
/* ============================================================
   footer.php
   ------------------------------------------------------------
   Dipakai oleh semua halaman.
   Berisi footer + penutup </main>, </body>, </html>.
   ============================================================ */
?>
</main>

<!-- ============ FOOTER ============ -->
<footer class="footer">
    <div class="container footer-inner">

        <div class="footer-left">
            <p class="footer-title">© <?= date('Y') ?> <?= $profil['nama'] ?></p>
            <p class="footer-text">Personal Portfolio</p>
        </div>

        <div class="footer-social">
            <?php foreach ($social as $s): ?>
                <a href="<?= $s['url'] ?>" class="social-btn" target="_blank" rel="noopener"
                   title="<?= $s['nama'] ?>">
                    <?= ikon($s['ikon']) ?>
                </a>
            <?php endforeach; ?>
        </div>

    </div>
</footer>

<script src="script.js"></script>
</body>
</html>