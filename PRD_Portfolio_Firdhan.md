# 📄 Product Requirements Document (PRD)
**Proyek:** Website Portofolio Personal Premium Firdhan
**Versi:** 1.0

---

## 1. Visi & Deskripsi Produk
Sebuah website portofolio personal berskala premium dan interaktif yang dirancang untuk memamerkan perjalanan karir, keahlian teknis, dan galeri proyek. Website ini harus mencerminkan profesionalisme tingkat tinggi, dengan desain UI/UX yang dinamis, tidak kaku (tidak terlihat seperti *template* AI), dan sangat cepat berkat implementasi SPA (Single Page Application).

## 2. Tujuan (Objectives)
*   **Membangun *Personal Branding*:** Menampilkan citra profesional yang memukau bagi pengunjung.
*   **Sentralisasi Informasi:** Menyatukan data pengalaman kerja (dari LinkedIn) dan repositori proyek (dari GitHub) ke dalam satu wadah interaktif.
*   **Memudahkan Perekrutan:** Menyediakan akses instan bagi rekruter atau klien untuk mengunduh CV/Resume terbaru.
*   **Manajemen Konten Mandiri:** Memiliki sistem CMS (Content Management System) di belakang layar untuk memperbarui konten kapan saja tanpa perlu menyentuh kode.

## 3. Target Pengguna (Target Audience)
1.  **Rekruter & HRD:** Yang mencari informasi pengalaman kerja, CV, dan kontak dengan cepat dari berbagai perangkat (terutama HP).
2.  **Calon Klien:** Yang ingin melihat *showcase* proyek secara detail beserta video demonya.
3.  **Pengembang Lain (Developers):** Yang tertarik dengan arsitektur teknologi (Tech Stack) yang digunakan pada proyek-proyek Anda.

---

## 4. Kebutuhan Fungsional (Functional Requirements - FR)

### Sisi Pengunjung (Public Front-End)
*   **FR-01 | Dynamic Hero Section:** Layar utama yang menyambut pengunjung dengan animasi masuk yang elegan, memuat foto profil, *headline* karir, dan tombol *Call-to-Action*.
*   **FR-02 | Interactive Timeline:** Seksi pengalaman kerja yang diurutkan berdasarkan waktu, menampilkan perusahaan, jabatan, dan deskripsi (mengambil referensi dari LinkedIn).
*   **FR-03 | 3D Project Showcase:** Galeri proyek dengan bentuk *card*. Saat kursor di-*hover*, *card* akan memberikan respons visual (3D tilt/glow). Terdapat fitur klik untuk memutar video demo proyek.
*   **FR-04 | Document Download:** Fitur unduh dokumen *Resume/CV* (PDF) dengan satu kali klik.

### Sisi Admin (Back-End CMS)
*   **FR-05 | Secure Authentication:** Halaman login khusus untuk Super Admin (Anda) yang terproteksi dengan aman.
*   **FR-06 | Dashboard CMS:** Panel kendali berbasis antarmuka grafis (GUI) yang sangat mudah digunakan.
*   **FR-07 | Full CRUD System:** Kemampuan untuk Membuat (Create), Membaca (Read), Mengubah (Update), dan Menghapus (Delete) entri Proyek, Pengalaman Kerja, dan Keahlian (Skills).
*   **FR-08 | Media Management:** Sistem untuk mengunggah foto, video (demo proyek), dan PDF. Sistem harus bisa menautkan media tersebut ke proyek atau profil yang relevan.

---

## 5. Kebutuhan Non-Fungsional (Non-Functional Requirements - NFR)

*   **NFR-01 | Performa (Kecepatan):** Website harus terasa instan. Navigasi antar halaman tidak boleh memicu *reload* browser penuh. Media yang diunggah harus dikompresi otomatis (format WebP) agar *bandwidth* tetap rendah. *Skeleton loader* harus digunakan jika data membutuhkan waktu muat.
*   **NFR-02 | Responsivitas Layar:** Wajib menggunakan pendekatan *Mobile-First*. Harus tampil proporsional di HP (1 kolom), Tablet (2 kolom), dan Desktop (multi-kolom lebar). Menu harus bisa beradaptasi menjadi *Burger Menu* di layar kecil.
*   **NFR-03 | Estetika UI/UX:** Desain tidak boleh terlihat generik. Harus menerapkan teknik desain modern (misal: *dark mode* elegan, *glassmorphism*, atau tipografi premium) dipadukan dengan *micro-animations* yang halus.

---

## 6. Tumpukan Teknologi (Technology Stack)

Sesuai kesepakatan, proyek ini akan dibangun di atas arsitektur standar emas modern:
*   **Core Backend & API:** Laravel 13 (PHP 8.x) - *Telah diinisialisasi*
*   **Database:** MySQL (Database Name: `db_websaya`)
*   **Local URL Environment:** `http://websaya.test`
*   **Frontend Engine:** React.js atau Vue.js
*   **SPA Bridge:** Inertia.js (Menghubungkan Laravel & React/Vue tanpa API terpisah)
*   **UI Styling:** Tailwind CSS
*   **Animation Library:** Framer Motion (jika React) atau GSAP (jika Vue)
*   **CMS Admin Panel:** Filament PHP
*   **File & Upload Manager:** Spatie Laravel MediaLibrary

---

## 7. Fase Pengembangan (Milestones)

1.  **[✅ SELESAI] Fase 1: Setup & Konfigurasi** (Instalasi Laravel 13, Database MySQL, Inertia, dan Tailwind).
2.  **[✅ SELESAI] Fase 2: Backend & CMS** (Instalasi Filament, pembuatan sistem CRUD, tabel database, dan logika *upload* media).
3.  **[✅ SELESAI] Fase 3: Frontend & Animasi** (Perancangan UI utama React, integrasi animasi Framer Motion, dan penyambungan data otomatis dari Backend Filament ke Frontend).
4.  **[🔜 SEDANG DIKERJAKAN] Fase 4: Optimasi & Testing** (Pengujian responsivitas HP/PC, pengujian kecepatan, dan *final polishing* animasi).

---

## 8. Log Perubahan (Changelog)
*   **17 Mei 2026:** Pembuatan dokumen PRD. Keputusan menggunakan Laravel 13 dan MySQL (Database: `db_websaya`). Konfigurasi `.env` telah disesuaikan.
*   **17 Mei 2026 (Update Fase 1):** Eksekusi instalasi Laravel Breeze (React + Inertia) selesai dilakukan. Migrasi database dan NPM build berhasil. Memasuki Fase 2 (Filament CMS).
*   **17 Mei 2026 (Update Fitur Tambahan & Validasi):**
    *   **Experience:** Tambah fitur status "Bekerja sampai sekarang" (is_current) dan dukungan upload foto/dokumen (PDF).
    *   **Projects:** "Teknologi yang Digunakan" diubah menjadi Dropdown/Autocomplete (saat mengetik nama bahasa pemrograman/framework, akan muncul pilihan dengan logo/ikonnya).
    *   **Profile/Settings:** 
        *   Nomor WA (wajib angka, tidak bisa input huruf).
        *   URL LinkedIn (validasi khusus format `www.linkedin.com/in/...`).
        *   URL GitHub (validasi khusus format `https://github.com/...`).
        *   Lokasi digabung menjadi 1 kolom dengan Dropdown yang berisi 514+ Provinsi dan Kota/Kabupaten di seluruh Indonesia hasil tarikan API.
    *   **Dashboard Admin:** Hapus widget bawaan Filament, ganti dengan widget khusus "Live Visitors" (Grafik Donut/Bar) untuk memantau jumlah pengunjung website secara *live*.
*   **17 Mei 2026 (Update Fase 3 & AI CV Parser):**
    *   **Frontend Premium Redesign:** Redesign Hero Section untuk membuang gaya *template* AI generik (hapus gradien warna warni dan tombol *pill*, ganti dengan tipografi masif dan modern). Menghapus navigasi "Admin" untuk pengunjung umum.
    *   **Modul Education:** Membuat arsitektur CRUD baru untuk Riwayat Pendidikan.
    *   **🚀 AI CV Parser:** Membangun fitur *upload* PDF CV di Admin Panel yang terhubung langsung dengan **Google Gemini AI**. AI akan membedah PDF, mengekstrak data menjadi JSON, dan langsung menyimpannya ke *Database* (Summary, WA, LinkedIn, Pengalaman Kerja, Pendidikan) secara otomatis!
    *   **Stabilisasi & Bug Fixing (Filament v3.2+):** Memperbaiki inkonsistensi *Strict Typing* pada kelas *Page* (menggunakan *method overrides*), mengatasi masalah path file temporer Livewire, serta mem-*bypass* batasan cURL SSL lokal di Laragon untuk kelancaran API AI.
*   **17 Mei 2026 (Update Interaktivitas UI/UX):**
    *   **Admin Panel SPA & Modals:** Mengganti rute navigasi konvensional di Filament menjadi *Single Page Application* (SPA) dengan animasi transisi yang halus. Semua form Create/Edit direfaktor menjadi Pop-up Modal yang elegan untuk efisiensi layar.
    *   **Dynamic Skills & Tech Stack:** Menambahkan arsitektur CRUD baru untuk *Skills* yang dilengkapi dengan pilihan kategori (Frontend, Backend, Database). Pemetaan ikon di-upgrade menggunakan SVG orisinal dari DevIcons, lengkap dengan sistem deteksi otomatis anti-typo.
    *   **Multiple Photo Gallery:** Membuka fungsi *multi-upload* untuk lampiran di *Experience*, yang secara otomatis merender *carousel/slider* horizontal interaktif dengan fitur *snap-scroll* di *frontend*.
    *   **Frontend Clone (Vandaru UI):** Merombak total *layout* frontend `Portfolio.jsx` agar mengadopsi bahasa desain dari portofolio klasik pengguna (`vandaru.my.id`). Pembaruan meliputi: *Floating Pill Navbar*, *Center-aligned Hero* dengan *Glow blobs*, *Jet-black Background* (`#050505`), dan desain *card* keahlian/pengalaman yang dilengkapi *blur effects* dan *SimpleIcons* interaktif.
    *   **Admin UI Polish:** Mengoptimalkan tabel dengan menyembunyikan kolom panjang (URL, lokasi) secara *default* (bisa di-*toggle*). Mengubah tombol aksi menjadi tombol interaktif (outlined button). Memperbaiki *bug* *SVG scaling* pada ikon *Sparkles* di halaman AI CV Uploader, dan memastikan *layout uploader* berukuran proporsional dan terlihat canggih.
    *   **Typography & Styling:** Mengganti *font* standar Laravel (Figtree) dengan **Inter** untuk menyempurnakan otentisitas gaya desain `vandaru.my.id`. Memodifikasi proporsi teks *Hero Summary* dengan ukuran dan spasi yang jauh lebih rileks (`leading-relaxed`, `max-w-3xl`) agar paragraf panjang tetap nyaman dibaca tanpa merusak hierarki desain.
    *   **Security & Optimizations (Level MAX):** Mengimplementasikan perlindungan aplikasi berlapis tingkat tinggi:
        *   Menambahkan `SecurityHeaders` *Middleware* (XSS Protection, Strict-Transport-Security, Permissions-Policy, X-Frame-Options).
        *   Sesi otomatis berakhir *(Auto-Logout)* setelah 10 menit diam atau bila *browser* ditutup.
        *   Enkripsi penuh pada data *Cookie* & *Session*.
        *   *Force HTTPS* di *environment* Production.
        *   Mengaktifkan *Strict Mode* pada Model Eloquent untuk mencegah *N+1 query*, *Mass Assignment*, dan eksploitasi beban database dari potensi aksi jahat/bug.
    *   **Animated Admin Login:** Mengubah tata letak laman Login di Filament dengan memberikan sentuhan *glassmorphism* (efek kaca *blur*), *Glow effect*, beserta injeksi kode CSS *Keyframes* agar animasi masuk *(Slide Up & Fade)* dan interaksi kursor di form login tampak mewah.
    *   **Frontend Polish & Ambient Animations:** Mengatasi *bug* tata letak *navbar* yang miring dengan mengubah skema *centering* ke `inset-x-0 mx-auto w-max` untuk akurasi sempurna. Melakukan perbaikan *symlink storage* yang putus penyebab gambar galeri rusak (`php artisan storage:link`). Menginjeksi animasi rotasi dan skala yang terus berdetak pada awan bercahaya (*ambient glow*) di latar belakang Hero untuk menciptakan kesan visual yang lebih hidup.
    *   **Experience Timeline Polish:** Memperbarui logika penambahan pengalaman *(Experience)*. Di Backend (Filament), jika status "Is current" diaktifkan, maka kolom `end_date` akan otomatis dikosongkan dan dinonaktifkan *(disabled)*, lalu pada tabel admin statusnya akan diformat menjadi *badge* hijau "Present". Di Frontend, label "Present" kini menggunakan teks hijau *emerald* bersinar tebal (`text-emerald-400 font-semibold`) agar status pekerjaan aktif lebih menonjol di mata perekrut.
    *   **Image Storage Fix (403 Forbidden):** Mengatasi *bug* 403 Forbidden pada gambar yang diunggah di Filament akibat kesalahan konfigurasi *disk* default (`local` vs `public`). Mengubah `FILESYSTEM_DISK=public` di `.env`, memaksa `->disk('public')` pada `FileUpload`, dan memigrasikan fisik *file* dari *private* ke jalur publik yang tepat agar selaras dengan *symlink* ke *frontend*.
    *   **Experience Timeline Sorting:** Menyempurnakan logika pengurutan *(sorting)* daftar pengalaman. Data pengalaman kerja kini difilter dengan prioritas mutlak: Pekerjaan berstatus "Present" (`is_current = true`) akan selalu berada di urutan teratas *(Top Rank)*, diikuti dengan pekerjaan berdasarkan tanggal berakhir (`end_date`), dan terakhir berdasarkan tanggal mulai (`start_date`). Urutan ini diterapkan secara konsisten baik di *Frontend* maupun di *Tabel Admin Backend*.
    *   **Admin UI & Performance Optimization:** Memperbaiki *bug TypeError Closure* yang menyebabkan *form edit* meledak menjadi *Internal Server Error*. Selain itu, mengubah mode modal *Create* dan *Edit* menjadi `slideOver()`, sehingga *form* muncul dengan mulus dari sisi kanan layar *(SPA Mode)*. Ini memangkas waktu *loading* secara drastis, membuat navigasi instan tanpa *refresh* penuh, dan menjadikan aplikasi jauh lebih responsif.
    *   **Project Auto-Slide & Zoom Lightbox:** Menambahkan kapabilitas *multi-image upload* (unggahan banyak gambar sekaligus) pada form `Project` di Filament *(Backend)*. Di sisi *Frontend*, mengimplementasikan komponen **AutoSlider** cerdas menggunakan *Framer Motion* yang memutar gambar secara otomatis setiap 3 detik. Selain itu, gambar kini dapat **diklik untuk diperbesar (Zoom) menggunakan efek Lightbox** *full-screen* (*backdrop-blur*).
    *   **Project Card Premium Redesign:** Merombak total *layout* kartu proyek *(Project Card)* agar lebih mirip dengan referensi desain premium. Gambar proyek sekarang membentang penuh (*edge-to-edge*) di bagian atas kartu. Di bagian bawah (*footer* kartu), ikon teknologi kini disederhanakan **hanya menampilkan logo saja** di dalam lingkaran kecil, dan tombol *Github* serta *Live URL* diubah menjadi ikon melingkar *(circular buttons)* yang sangat *clean* dan modern.
