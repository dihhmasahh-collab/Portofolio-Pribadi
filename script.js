/* ============================================================
   script.js  -  JavaScript sederhana (tanpa framework)
   ------------------------------------------------------------
   Isi file:
     1. Membuka / menutup menu navbar di HP
     2. Smooth scrolling untuk link yang menuju section
     3. Menandai link navbar sesuai posisi scroll
     4. Animasi muncul saat section terlihat
     5. Animasi progress bar skills
     6. Validasi ringan form contact
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

    /* --------------------------------------------------------
       1. NAVBAR MOBILE
       -------------------------------------------------------- */
    var navToggle = document.getElementById('navToggle');
    var navMenu   = document.getElementById('navMenu');

    if (navToggle && navMenu) {

        navToggle.addEventListener('click', function () {
            var kebuka = navMenu.classList.toggle('open');   // true = kebuka
            navToggle.classList.toggle('open', kebuka);
            navToggle.setAttribute('aria-expanded', kebuka ? 'true' : 'false');
        });

        // Tutup menu kalau link di dalam menu diklik
        navMenu.addEventListener('click', function (e) {
            if (e.target.classList.contains('nav-link')) {
                navMenu.classList.remove('open');
                navToggle.classList.remove('open');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });

        // Tutup menu kalau diklik di luar navbar
        document.addEventListener('click', function (e) {
            if (!navMenu.contains(e.target) && !navToggle.contains(e.target)) {
                navMenu.classList.remove('open');
                navToggle.classList.remove('open');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }


    /* --------------------------------------------------------
       2. SMOOTH SCROLLING
       --------------------------------------------------------
       Menghitung tinggi navbar supaya judul section tidak tertutup.
       -------------------------------------------------------- */
    function tinggiNavbar() {
        var navbar = document.querySelector('.navbar');
        return navbar ? navbar.offsetHeight : 0;
    }

    function scrollKeAtas(el) {
        var atas = el.getBoundingClientRect().top + window.pageYOffset - tinggiNavbar() - 16;
        window.scrollTo({ top: atas, behavior: 'smooth' });
    }

    // Intercept semua link yang diawali #
    document.querySelectorAll('a[href^="#"]').forEach(function (link) {
        link.addEventListener('click', function (e) {
            var id = link.getAttribute('href');

            // biarkan "#" biasa (misal link project) behave normal
            if (id === '#' || id.length < 2) {
                e.preventDefault();
                return;
            }

            var tujuan = document.querySelector(id);
            if (tujuan) {
                e.preventDefault();
                scrollKeAtas(tujuan);
            }
        });
    });


    /* --------------------------------------------------------
       3. MENANDAI LINK NAVBAR YANG AKTIF
       -------------------------------------------------------- */
    var sectionIds = ['home', 'skills', 'projects'];
    var navLinks   = document.querySelectorAll('.nav-link');

    function tandaiLinkAktif() {
        var posisi = window.pageYOffset + tinggiNavbar() + 40;
        var aktif  = '';

        sectionIds.forEach(function (id) {
            var section = document.getElementById(id);
            if (section && section.offsetTop <= posisi) {
                aktif = id;
            }
        });

        // kalau sudah di paling bawah, tandai section terakhir
        if (window.innerHeight + window.pageYOffset >= document.body.offsetHeight - 5) {
            var terakhir = sectionIds[sectionIds.length - 1];
            if (document.getElementById(terakhir)) {
                aktif = terakhir;
            }
        }

        navLinks.forEach(function (link) {
            var cocok = link.getAttribute('href').indexOf('#' + aktif) !== -1;
            link.classList.toggle('active', cocok && aktif !== '');
        });
    }

    window.addEventListener('scroll', tandaiLinkAktif, { passive: true });


    /* --------------------------------------------------------
       4. ANIMASI MUNCUL SAAT SECTION TERLIHAT
       --------------------------------------------------------
       IntersectionObserver didukung browser modern.
       Kalau tidak didukung, semua elemen langsung ditampilkan.
       -------------------------------------------------------- */
    var revealItems = document.querySelectorAll('.reveal');

    if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry, i) {
                if (entry.isIntersecting) {
                    // jeda sedikit antar card supaya muncul berurutan
                    entry.target.style.transitionDelay = (i * 60) + 'ms';
                    entry.target.classList.add('show');
                    observer.unobserve(entry.target);   // animasi cukup sekali
                }
            });
        }, { threshold: 0.12 });

        revealItems.forEach(function (el) { observer.observe(el); });
    } else {
        revealItems.forEach(function (el) { el.classList.add('show'); });
    }

    tandaiLinkAktif();   // langsung jalan saat halaman pertama dibuka


    /* --------------------------------------------------------
       5. ANIMASI PROGRESS BAR SKILLS
       --------------------------------------------------------
       Bar dimulai dari 0 lalu bertambah saat terlihat.
       Lebar tujuan diambil dari atribut data-level.
       -------------------------------------------------------- */
    var barFill = document.querySelectorAll('.bar-fill');

    function isiBar(el) {
        var target = el.getAttribute('data-level') || '0';
        el.style.width = '0';                 // mulai kosong
        void el.offsetWidth;                  // paksa browser membaca posisi baru
        el.style.width = target + '%';        // lalu isi ke lebar tujuan
    }

    if (barFill.length && 'IntersectionObserver' in window) {
        var barObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    isiBar(entry.target);
                    barObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.4 });

        barFill.forEach(function (el) {
            el.style.width = '0';              // siapkan keadaan awal
            barObserver.observe(el);
        });
    } else {
        // browser lama: langsung tampilkan sesuai data-level
        barFill.forEach(function (el) {
            el.style.width = (el.getAttribute('data-level') || '0') + '%';
        });
    }


    /* --------------------------------------------------------
       6. VALIDASI RINGAN FORM CONTACT
       --------------------------------------------------------
       Ini hanya pengecekan di sisi browser supaya user lebih cepat
       tahu. Pengecekan utama tetap dilakukan di contact.php (server).
       -------------------------------------------------------- */
    var form = document.getElementById('contactForm');

    if (form) {
        var fields = {
            nama:  form.querySelector('[name="nama"]'),
            email: form.querySelector('[name="email"]'),
            pesan: form.querySelector('[name="pesan"]')
        };

        function tampilPesan(text, warna) {
            var lama = form.querySelector('.alert');
            if (lama) { lama.remove(); }

            var box = document.createElement('div');
            box.className = 'alert alert-' + warna;
            box.textContent = text;
            form.prepend(box);
        }

        form.addEventListener('submit', function (e) {
            var nama  = fields.nama.value.trim();
            var email = fields.email.value.trim();
            var pesan = fields.pesan.value.trim();

            if (nama === '' || email === '' || pesan === '') {
                e.preventDefault();
                tampilPesan('Nama, email, dan pesan tidak boleh kosong.', 'error');
                return;
            }

            // pola email sederhana: ada @ dan ada titik setelah @
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                e.preventDefault();
                tampilPesan('Format email tidak valid.', 'error');
            }
        });
    }

});