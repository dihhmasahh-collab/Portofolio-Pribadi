<?php
/* ============================================================
   data.php
   ------------------------------------------------------------
   SEMUA data pribadi, skill, dan project disimpan di file ini.
   Cukup ubah bagian di bawah ini, tidak perlu menyentuh file lain.
   ============================================================ */


/* ---------- 1. DATA PRIBADI ---------- */
$profil = [
    'nama'        => 'Dimas Said Bayu Evansa',
    'greeting'    => 'Halo, saya',
    'judul'       => 'Mahasiswa Teknik Informatika',
    'deskripsi'   => 'Saya adalah mahasiswa Teknik Informatika yang tertarik pada pengembangan website, pemrograman, dan teknologi.',
    'status'      => 'Mahasiswa Aktif',
    'jurusan'     => 'Teknik Informatika',
    'universitas' => 'Universitas Indraprasta PGRI',
    'minat'       => 'Web Development, Pemrograman, Database',
    'foto'        => 'assets/img/profile.jpg',
    'cv'          => 'assets/cv/cv.pdf',
];


/* ---------- 2. SOSIAL MEDIA ---------- */
/* Ganti [EMAIL], [GITHUB], [INSTAGRAM], [LINKEDIN] dengan data asli Anda.
   Untuk GitHub/Instagram/LinkedIn cukup isi username, misal: github.com/usernameanda */
$social = [
    [
        'nama'  => 'Email',
        'label' => 'dimassaidbayuevansa@gmail.com',
        'url'   => 'mailto:dimassaidbayuevansa@gmail.com',
        'ikon'  => 'email',
    ],
    [
        'nama'  => 'GitHub',
        'label' => 'dihhmasahh-collab',
        'url'   => 'https://github.com/dihhmasahh-collab',
        'ikon'  => 'github',
    ],
    [
        'nama'  => 'Instagram',
        'label' => 'mochalattee_01',
        'url'   => 'https://www.instagram.com/mochalattee_01/',
        'ikon'  => 'instagram',
    ],

];


/* ---------- 3. DAFTAR SKILL ---------- */
/* "level" adalah angka 0-100 (persentase progress bar) */
$skills = [
    [
        'nama'       => 'HTML',
        'deskripsi'  => 'Membuat struktur halaman website.',
        'level'      => 80,
    ],
    [
        'nama'       => 'CSS',
        'deskripsi'  => 'Membuat tampilan dan layout website.',
        'level'      => 70,
    ],
    [
        'nama'       => 'PHP',
        'deskripsi'  => 'Membuat website dinamis dan pengolahan data.',
        'level'      => 60,
    ],
    [
        'nama'       => 'MySQL',
        'deskripsi'  => 'Menyimpan dan mengelola data.',
        'level'      => 60,
    ],
    [
        'nama'       => 'JavaScript',
        'deskripsi'  => 'Menambahkan interaksi pada halaman website.',
        'level'      => 55,
    ],
    [
        'nama'       => 'Java',
        'deskripsi'  => 'Dasar pemrograman berorientasi objek (OOP).',
        'level'      => 55,
    ],
    [
        'nama'       => 'Git / GitHub',
        'deskripsi'  => 'Menyimpan dan mengelola versi kode.',
        'level'      => 50,
    ],
    [
        'nama'       => 'Python',
        'deskripsi'  => 'Dasar pemrograman dan analisis data.',
        'level'      => 50,
    ],
];


/* ---------- 4. DAFTAR PROJECT ---------- */
/* Ganti gambar, deskripsi, dan link sesuai project Anda sendiri. */
$projects = [
   [
        'judul'     => 'Website Sistem Kelas (SiMaha)',
        'deskripsi' => 'Website pengelolaan informasi kelas mahasiswa yang menyediakan fitur login, registrasi, dashboard, jadwal kuliah, materi pembelajaran, tugas, profil mahasiswa, dan notifikasi.',
        'teknologi' => ['HTML', 'CSS', 'PHP', 'JavaScript', 'LocalStorage'],
        'gambar'    => 'assets/img/project-simaha.jpg',
        'link'      => 'https://github.com/dihhmasahh-collab/Kelas',
    ],
   [
    'judul'     => 'Sistem Manajemen Hotel',
    'deskripsi' => 'Aplikasi web untuk mengelola operasional hotel: data kamar, tamu, dan karyawan, proses check-in dan check-out, pembayaran, serta laporan hunian dan pendapatan.',
    'teknologi' => ['PHP', 'MySQL', 'Bootstrap 5'],
    'gambar'    => 'assets/img/project-hotel.jpg',
    'link'      => 'https://github.com/dihhmasahh-collab/Sistem-Manajemen-Hotel',
   ],
       [
        'judul'     => 'Fraud Detection App',
        'deskripsi' => 'Aplikasi deteksi fraud untuk menganalisis data dan mengidentifikasi transaksi yang terindikasi mencurigakan menggunakan pendekatan analisis data.',
        'teknologi' => ['Python', 'Machine Learning', 'Data Analysis'],
        'gambar'    => 'assets/img/project-datafraud.jpg',
        'link'      => 'https://github.com/dihhmasahh-collab/fraud-detection-app',
    ],
];


/* ============================================================
   FUNGSI BANTUAN (bonus kecil)
   Fungsi untuk menampilkan icon SVG tanpa perlu library.
   Dipakai di halaman Contact dan Footer.
   ============================================================ */
function ikon($nama)
{
    // Icon memakai stroke (garis) supaya ringan dan mudah dibaca.
    switch ($nama) {
        case 'email':
            return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                      <rect x="2.5" y="4.5" width="19" height="15" rx="3"></rect>
                      <path d="M3.5 7.5 12 13l8.5-5.5"></path>
                    </svg>';

        case 'github':
            return '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none">
                      <path d="M12 .5A11.5 11.5 0 0 0 .5 12a11.5 11.5 0 0 0 7.86 10.92c.58.1.79-.25.79-.56v-2c-3.2.7-3.88-1.54-3.88-1.54-.53-1.34-1.3-1.7-1.3-1.7-1.05-.72.08-.71.08-.71 1.17.08 1.78 1.2 1.78 1.2 1.04 1.78 2.73 1.27 3.4.97.1-.75.4-1.27.74-1.56-2.55-.29-5.24-1.28-5.24-5.7 0-1.26.45-2.29 1.19-3.1-.12-.29-.52-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11 11 0 0 1 5.8 0c2.2-1.5 3.17-1.18 3.17-1.18.63 1.59.23 2.76.12 3.05.74.81 1.18 1.84 1.18 3.1 0 4.43-2.69 5.4-5.26 5.69.42.36.79 1.06.79 2.15v3.19c0 .31.21.67.8.56A11.5 11.5 0 0 0 23.5 12 11.5 11.5 0 0 0 12 .5z"></path>
                    </svg>';

        case 'instagram':
            return '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none">
                      <path d="M12 2.2c3.2 0 3.6 0 4.85.07 1.17.05 1.8.25 2.23.41.56.22.96.48 1.38.9.42.42.68.82.9 1.38.16.42.36 1.06.41 2.23.06 1.25.07 1.63.07 4.81s-.01 3.56-.07 4.81c-.05 1.17-.25 1.8-.41 2.23-.22.56-.48.96-.9 1.38-.42.42-.82.68-1.38.9-.42.16-1.06.36-2.23.41-1.25.06-1.63.07-4.85.07s-3.6-.01-4.85-.07c-1.17-.05-1.8-.25-2.23-.41-.56-.22-.96-.48-1.38-.9-.42-.42-.68-.82-.9-1.38-.16-.42-.36-1.06-.41-2.23-.06-1.25-.07-1.63-.07-4.81s.01-3.56.07-4.81c.05-1.17.25-1.8.41-2.23.22-.56.48-.96.9-1.38.42-.42.82-.68 1.38-.9.42-.16 1.06-.36 2.23-.41C8.44 2.21 8.84 2.2 12 2.2zm0 5.05a4.75 4.75 0 1 0 0 9.5 4.75 4.75 0 0 0 0-9.5zm0 1.6a3.15 3.15 0 1 1 0 6.3 3.15 3.15 0 0 1 0-6.3zm5.15-3.3a1.11 1.11 0 1 0 0 2.22 1.11 1.11 0 0 0 0-2.22z"></path>
                    </svg>';

        case 'linkedin':
            return '<svg viewBox="0 0 24 24" fill="currentColor" stroke="none">
                      <path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM9 9h3.8v1.7h.05c.53-.95 1.83-1.95 3.77-1.95 4.03 0 4.78 2.5 4.78 5.76V21h-4v-5.6c0-1.34-.03-3.06-1.9-3.06-1.9 0-2.2 1.45-2.2 2.96V21H9z"></path>
                    </svg>';

        case 'download':
            return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 3v12"></path>
                      <path d="m7.5 10.5 4.5 4.5 4.5-4.5"></path>
                      <path d="M4 20h16"></path>
                    </svg>';

        case 'arrow':
            return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"
                        stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 12h13"></path>
                      <path d="m12.5 5.5 6.5 6.5-6.5 6.5"></path>
                    </svg>';

        default:
            return '';
    }
}