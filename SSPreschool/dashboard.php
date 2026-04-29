<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>SS Preschool - Tempat Pikiran Ingin Tahu Mulai Bersinar</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface-container-highest": "#e2e2e2",
                    "on-error": "#ffffff",
                    "error": "#ba1a1a",
                    "on-secondary-fixed": "#00174a",
                    "tertiary": "#904d00",
                    "error-container": "#ffdad6",
                    "surface-container": "#eeeeee",
                    "surface-bright": "#f9f9f9",
                    "on-primary-fixed-variant": "#4d4800",
                    "on-secondary": "#ffffff",
                    "secondary-fixed": "#dbe1ff",
                    "primary": "#676000",
                    "inverse-primary": "#d7ca15",
                    "secondary": "#435b9f",
                    "on-tertiary-container": "#a15600",
                    "surface-container-lowest": "#ffffff",
                    "on-surface-variant": "#4a4733",
                    "on-surface": "#1a1c1c",
                    "on-secondary-container": "#2a4486",
                    "on-tertiary": "#ffffff",
                    "on-primary": "#ffffff",
                    "surface-dim": "#dadada",
                    "on-primary-container": "#736c00",
                    "surface-container-low": "#f3f3f3",
                    "primary-container": "#fdef42",
                    "secondary-fixed-dim": "#b3c5ff",
                    "surface-container-high": "#e8e8e8",
                    "tertiary-fixed-dim": "#ffb77d",
                    "secondary-container": "#9cb4fe",
                    "surface": "#f9f9f9",
                    "tertiary-container": "#ffe7d7",
                    "primary-fixed": "#f4e639",
                    "background": "#f9f9f9",
                    "tertiary-fixed": "#ffdcc3",
                    "primary-fixed-dim": "#d7ca15",
                    "outline": "#7b7861",
                    "on-secondary-fixed-variant": "#2a4386",
                    "on-primary-fixed": "#1f1c00",
                    "on-error-container": "#93000a",
                    "inverse-on-surface": "#f1f1f1",
                    "on-background": "#1a1c1c",
                    "on-tertiary-fixed-variant": "#6e3900",
                    "on-tertiary-fixed": "#2f1500",
                    "surface-variant": "#e2e2e2",
                    "surface-tint": "#676000",
                    "inverse-surface": "#2f3131",
                    "outline-variant": "#ccc7ad"
            },
            "borderRadius": {
                    "DEFAULT": "1rem",
                    "lg": "2rem",
                    "xl": "3rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Plus Jakarta Sans"],
                    "body": ["Plus Jakarta Sans"],
                    "label": ["Plus Jakarta Sans"]
            }
          },
        }
      }
    </script>
<style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-nav {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        .text-glow {
            text-shadow: 0 0 20px rgba(253, 239, 66, 0.4);
        }
        .asymmetric-shape {
            border-radius: 4rem 1rem 4rem 1rem;
        }
        html {
            scroll-behavior: smooth;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        
    </style>
</head>
<body class="bg-background text-on-surface selection:bg-primary-container selection:text-on-primary-container">
<!-- TopNavBar -->
<header class="fixed top-0 w-full z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl shadow-[0px_24px_48px_rgba(26,28,28,0.06)]">
<div class="flex items-center justify-between px-8 py-4 max-w-7xl mx-auto">
<div class="flex items-center gap-3">
<img 
  alt="SS Preschool Logo" 
  class="h-10 w-10 object-contain" 
  src="logo_ss.png"
/><span class="text-2xl font-black tracking-tighter text-slate-900">SS Preschool</span>
</div>
<nav class="hidden md:flex items-center gap-8 font-['Plus_Jakarta_Sans'] text-sm font-medium tracking-tight">
<a class="text-slate-900 font-bold border-b-2 border-yellow-400 pb-1 hover:text-yellow-600 transition-all duration-300" href="#program">Program</a>
<a class="text-slate-600 hover:text-yellow-600 transition-all duration-300" href="#kurikulum">Kurikulum</a>
<a class="text-slate-600 hover:text-yellow-600 transition-all duration-300" href="#fasilitas">Fasilitas</a>
<a class="text-slate-600 hover:text-yellow-600 transition-all duration-300" href="#faq">FAQ</a>
<a class="text-slate-600 hover:text-yellow-600 transition-all duration-300" href="#kontak">Kontak</a>
</nav>
<button class="bg-primary-container text-on-primary-container px-6 py-2.5 rounded-full font-bold text-sm scale-95 active:scale-90 transition-transform shadow-sm">
                Login 
            </button>
</div>
</header>
<main class="pt-24">
<!-- Hero Section -->
<section class="relative px-6 pt-12 pb-24 lg:pt-20 lg:pb-32 overflow-hidden">
<div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-16">
<div class="flex-1 space-y-8 relative z-10">
<span class="inline-block px-4 py-1.5 bg-secondary-fixed text-on-secondary-fixed rounded-full text-xs font-bold tracking-widest uppercase">Penerimaan Siswa Baru 2026</span>
<h1 class="text-5xl lg:text-7xl font-extrabold text-on-surface leading-[1.1] tracking-tight">
                        Tempat Pikiran Ingin Tahu <span class="text-primary underline decoration-primary-container decoration-8 underline-offset-4">Mulai Bersinar</span>
</h1>
<p class="text-lg text-on-surface-variant max-w-xl leading-relaxed">
                        Membangun fondasi masa depan anak Anda melalui lingkungan belajar yang aman, suportif, dan penuh keceriaan di SS Preschool.
                    </p>
<div class="flex flex-wrap gap-4">
<a href="pendaftaran.php">
    <button class="bg-secondary text-on-secondary px-8 py-4 rounded-full font-bold text-lg hover:shadow-xl transition-all active:scale-95">
        Daftar Sekarang
    </button>
</a><button class="flex items-center gap-2 px-8 py-4 rounded-full font-bold text-lg text-secondary hover:bg-surface-container transition-all">
<span class="material-symbols-outlined">play_circle</span>
                            Lihat Tour Sekolah
                        </button>
</div>
</div>
<div class="flex-1 relative">
<div class="absolute -top-12 -right-12 w-64 h-64 bg-primary-container rounded-full blur-3xl opacity-40"></div>
<div class="relative z-10 asymmetric-shape overflow-hidden shadow-2xl">
<div class="swiper mySwiper rounded-[2rem] shadow-2xl overflow-hidden">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img src="playground.jpeg" class="w-full h-full object-cover" alt="Playground">
        </div>
        <div class="swiper-slide">
            <img src="kurikulum1.jpeg" class="w-full h-full object-cover" alt="Belajar">
        </div>
        <div class="swiper-slide">
            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDZK9PQISisnV_VA0PP__kvO_6JmnH-FIMYojEO7A-g2FtulfNQO74u4Xp2xOkV_FtVvYnrNmPwdDRs1PzSYWTfde5quA1CL41bwJSWs4L8IJiIVd-XYjxchOzANF3kBscMlW3uYWjJ3MV0w33mOVysGPuAVwE54VyzO_Plff3eWeNfm0DuYInJgNDKXoAZDDsmLogQP0CwLeOAQwvjgnljJ42Mpk4lzl1XeZ9_XGnC5aNRwLVR2opPZB1WBaVfYFPMwu99DjHLbdA" class="w-full h-full object-cover" alt="Anak">
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<style>
    .swiper {
        width: 100%;
        height: 500px; /* Sesuaikan tinggi dengan desain kamu */
    }
    /* Warna titik navigasi jadi kuning sesuai tema kamu */
    .swiper-pagination-bullet-active {
        background: #FDEF42 !important;
    }
</style>
</div>
</div>
</section>
<!-- Programs Section -->
<section id= "program" class="py-24 bg-surface-container-low">
<div class="max-w-7xl mx-auto px-6">
<div class="text-center max-w-3xl mx-auto mb-16">
<h2 class="text-4xl font-bold mb-6">Program Unggulan Kami</h2>
<p class="text-on-surface-variant">Kurikulum yang dirancang khusus untuk mendukung setiap tahapan perkembangan buah hati Anda.</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
<!-- Card 1 -->
<div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col justify-between transition-all hover:-translate-y-2 hover:shadow-lg group">
<div>
<div class="w-16 h-16 bg-primary-container/20 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-primary text-3xl">child_care</span>
</div>
<h3 class="text-xl font-bold mb-2 text-slate-900">Baby Class</h3>
<p class="text-sm font-semibold text-secondary mb-4">(15 bulan - 30 bulan)</p>
<p class="text-on-surface-variant text-sm leading-relaxed mb-8">Untuk si kecil yang mulai aktif, dengan aktivitas sensori &amp; motorik yang menyenangkan.</p>
</div>
<button onclick="kirimWhatsApp('Baby Class')" class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-3 rounded-full font-bold text-sm transition-colors">
        <span class="material-symbols-outlined text-lg">chat</span> Konsultasi Admin
    </button>
</div>
<!-- Card 2 -->
<div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col justify-between transition-all hover:-translate-y-2 hover:shadow-lg group border-t-4 border-secondary">
<div>
<div class="w-16 h-16 bg-secondary-container/20 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-secondary text-3xl">child_friendly</span>
</div>
<h3 class="text-xl font-bold mb-2 text-slate-900">Toddler Class</h3>
<p class="text-sm font-semibold text-secondary mb-4">(2,5 th - 4 th)</p>
<p class="text-on-surface-variant text-sm leading-relaxed mb-8">Melatih kemandirian, komunikasi, dan sosialisasi anak melalui permainan edukatif.</p>
</div>
<button onclick="kirimWhatsApp('Toddler Class')" class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-3 rounded-full font-bold text-sm transition-colors">
        <span class="material-symbols-outlined text-lg">chat</span> Konsultasi Admin
    </button>
</div>
<!-- Card 3 -->
<div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col justify-between transition-all hover:-translate-y-2 hover:shadow-lg group border-t-4 border-primary">
<div>
<div class="w-16 h-16 bg-primary-container/20 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-primary text-3xl">menu_book</span>
</div>
<h3 class="text-xl font-bold mb-2 text-slate-900">BIMBA</h3>
<p class="text-sm font-semibold text-secondary mb-4">(3th - 7th)</p>
<p class="text-on-surface-variant text-sm leading-relaxed mb-8">Belajar membaca, menulis, dan berhitung dengan cara yang menyenangkan dan tanpa paksaan.</p>
</div>
<button onclick="kirimWhatsApp('BIMBA Class')" class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-3 rounded-full font-bold text-sm transition-colors">
        <span class="material-symbols-outlined text-lg">chat</span> Konsultasi Admin
    </button>
</div>
<!-- Card 4 -->
<div class="bg-surface-container-lowest p-8 rounded-xl flex flex-col justify-between transition-all hover:-translate-y-2 hover:shadow-lg group border-t-4 border-tertiary">
<div>
<div class="w-16 h-16 bg-tertiary-container/20 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
<span class="material-symbols-outlined text-tertiary text-3xl">groups</span>
</div>
<h3 class="text-xl font-bold mb-2 text-slate-900">Meeting Parents</h3>
<p class="text-sm font-semibold text-secondary mb-4">Sesi Tatap Muka</p>
<p class="text-on-surface-variant text-sm leading-relaxed mb-8">Sesi yang dirancang untuk membahas kemajuan akademik, perkembangan perilaku, dan tujuan pribadi siswa.</p>
</div>
<button onclick="kirimWhatsApp('Meeting Parents')" class="w-full flex items-center justify-center gap-2 bg-green-500 hover:bg-green-600 text-white py-3 rounded-full font-bold text-sm transition-colors">
        <span class="material-symbols-outlined text-lg">chat</span> Konsultasi Admin
    </button>
</div>
</div>
</div>
</section>
<section id="kurikulum" class="py-24 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex flex-col lg:flex-row gap-20 items-center">
            
            <div class="flex-1 order-2 lg:order-1 relative">
                <div class="grid grid-cols-2 gap-4">
                    <div class="rounded-[2rem] overflow-hidden shadow-lg aspect-square"> 
                        <img 
                            src="kurikulum1.jpeg" 
                            alt="Kurikulum SS Preschool 1" 
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                        />
                    </div>
                    <div class="rounded-[2rem] overflow-hidden shadow-lg aspect-square"> 
                        <img 
                            src="kurikulum2.jpeg" 
                            alt="Kurikulum SS Preschool 2" 
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                        />
                    </div>
                    <div class="col-span-2 rounded-[2rem] overflow-hidden shadow-lg h-48 md:h-64"> 
                        <img 
                            src="kurikulum3.png" 
                            alt="Kurikulum SS Preschool 3" 
                            class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
                        />
                    </div>
                </div>
                <div class="absolute inset-0 bg-primary-container/10 -z-10 blur-3xl rounded-full scale-150"></div>
            </div>

            <div class="flex-1 order-1 lg:order-2 space-y-8">
                <h2 class="text-4xl font-extrabold text-on-surface">Kurikulum Berbasis Perkembangan Anak</h2>
                <p class="text-on-surface-variant text-lg leading-relaxed">Kami menerapkan play-based learning untuk mendukung tumbuh kembang anak secara alami dan menyenangkan sejak usia dini.</p>
                
                <div class="space-y-6">
                    <div class="flex gap-4">
                        <div class="bg-primary-container p-2 rounded-full h-fit shadow-sm"><span class="material-symbols-outlined text-on-primary-container">check</span></div>
                        <div>
                            <h4 class="font-bold text-lg">Sensory & Active Learning</h4>
                            <p class="text-on-surface-variant">Stimulasi motorik kasar, motorik halus, dan kognitif melalui bermain air, pasir, tekstur, dan eksplorasi lingkungan.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="bg-primary-container p-2 rounded-full h-fit shadow-sm"><span class="material-symbols-outlined text-on-primary-container">check</span></div>
                        <div>
                            <h4 class="font-bold text-lg">Stimulasi Bahasa Sejak Dini</h4>
                            <p class="text-on-surface-variant">Membaca dongeng interaktif untuk memperkaya kosa kata, melatih komunikasi, dan membangun bonding positif.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="bg-primary-container p-2 rounded-full h-fit shadow-sm"><span class="material-symbols-outlined text-on-primary-container">check</span></div>
                        <div>
                            <h4 class="font-bold text-lg">Social & Emotional Skills</h4>
                            <p class="text-on-surface-variant">Snack time dan aktivitas kelompok melatih kemandirian, berbagi, menunggu giliran, dan bersosialisasi.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Fasilitas Bento Grid -->
<section id="fasilitas" class="py-24 bg-surface">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-4xl font-bold mb-16 text-center">Fasilitas SS Preschool</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[250px]">
            
            <div class="md:row-span-2 bg-surface-container-lowest rounded-3xl overflow-hidden relative group">
                <img src="playground.jpeg" alt="Indoor Playground" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="text-white text-2xl font-bold">Indoor Playground</h3>
                    <p class="text-slate-200 text-sm mt-2">Area bermain indoor yang aman untuk aktivitas fisik anak.</p>
                </div>
            </div>

            <div class="md:col-span-2 bg-surface-container-lowest rounded-3xl overflow-hidden relative group">
                <img src="fasilitas2.jpeg" alt="CCTV" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="text-white text-xl font-bold">CCTV di Setiap Ruang Kelas</h3>
                    <p class="text-slate-200 text-sm mt-2">Keamanan terpantau untuk kenyamanan Ayah & Bunda.</p>
                </div>
            </div>

            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden relative group">
                <img src="studio_seni.jpeg" alt="Art Room" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-white text-lg font-bold">Studio Seni</h3>
                </div>
            </div>

            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden relative group">
                <img src="kelas1.jpeg" alt="Ruang Kelas" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-white text-lg font-bold">Ruang Kelas Nyaman</h3>
                </div>
            </div>

            <div class="md:col-span-2 bg-surface-container-lowest rounded-3xl overflow-hidden relative group">
                <img src="media.jpeg" alt="Media Pembelajaran" 
                    class="w-full aspect-video object-cover transition-transform duration-500 group-hover:scale-105" />
                
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 via-slate-900/20 to-transparent flex flex-col justify-end p-8">
                    <h3 class="text-white text-xl font-bold">Media Pembelajaran Interaktif</h3>
                    <p class="text-slate-200 text-sm mt-2">Mendukung belajar aktif melalui visual, sensorik, dan permainan edukatif.</p>
                </div>
            </div>

            <div class="bg-surface-container-lowest rounded-3xl overflow-hidden relative group">
                <img src="area_makan.jpeg" alt="Area Makan" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" />
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/90 to-transparent flex flex-col justify-end p-6">
                    <h3 class="text-white text-lg font-bold">Area Makan Sehat</h3>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
// Pengaturan Waktu
date_default_timezone_set('Asia/Jakarta');
$bulan_ini = date('m');
$tahun_ini = date('Y');
$hari_ini  = date('j'); // Angka tanggal sekarang
$nama_bulan_ini = date('F Y');

// Logika Kalender
$jumlah_hari = cal_days_in_month(CAL_GREGORIAN, $bulan_ini, $tahun_ini);
$hari_pertama = date('N', strtotime("$tahun_ini-$bulan_ini-01")); // 1 (Senin) - 7 (Minggu)
?>

<section id="kalender" class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-primary-container/10 rounded-[2.5rem] p-8 lg:p-16 flex flex-col lg:flex-row gap-12 items-center">
            
            <div class="flex-1 space-y-8">
                <h2 class="text-4xl lg:text-5xl font-black tracking-tight">Ingin Mencoba Dulu?</h2>
                <p class="text-on-surface-variant text-lg leading-relaxed">
                    Daftarkan anak Anda untuk mengikuti <strong>Kelas Trial Gratis</strong> dan rasakan langsung pengalaman belajar di SS Preschool.
                </p>
                <ul class="space-y-5">
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined bg-white p-2 rounded-xl text-secondary shadow-sm">event_available</span> 
                        <span class="text-on-surface-variant"><strong>Pilih Jadwal yang Tersedia</strong> </span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined bg-white p-2 rounded-xl text-secondary shadow-sm">location_on</span> 
                        <span class="text-on-surface-variant">SS Preschool</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined bg-white p-2 rounded-xl text-secondary shadow-sm">group_add</span> 
                        <span class="text-on-surface-variant">Terbatas untuk 5 siswa per sesi</span>
                    </li>
                </ul>
                <div class="pt-4">
                    <a href="trial_class.php" class="inline-block bg-[#435B9F] px-10 py-5 rounded-full text-white font-bold text-lg hover:shadow-2xl hover:-translate-y-1 transition-all">
                        Ambil Jadwal Trial
                    </a>
                </div>
            </div>

            <div class="flex-1 w-full max-w-md">
                <div class="bg-white p-8 rounded-[2rem] shadow-[0px_20px_50px_rgba(0,0,0,0.05)]">
                    <h3 class="text-xl font-black mb-8 text-center text-slate-800">Jadwal Terdekat – <?php echo $nama_bulan_ini; ?></h3>
                    
                    <div class="grid grid-cols-7 gap-2 text-center text-[10px] font-black mb-4 uppercase tracking-widest text-slate-400">
                        <div>S</div><div>S</div><div>R</div><div>K</div><div>J</div><div>S</div><div>M</div>
                    </div>

                    <div class="grid grid-cols-7 gap-3 text-center">
                        <?php
                        // 1. Slot Kosong untuk awal bulan
                        for ($i = 1; $i < $hari_pertama; $i++) {
                            echo '<div class="p-3"></div>';
                        }

                        // 2. Perulangan Tanggal
                        for ($tgl = 1; $tgl <= $jumlah_hari; $tgl++) {
                            $timestamp = strtotime("$tahun_ini-$bulan_ini-$tgl");
                            $hari_ke = date('N', $timestamp);
                            
                            // Cek Hari Libur/Weekend (Sabtu & Minggu) untuk warna biru
                            $is_weekend = ($hari_ke == 6 || $hari_ke == 7);
                            // Cek Hari Ini untuk lingkaran kuning
                            $is_today = ($tgl == $hari_ini);

                            // Tentukan Style Class
                            $class = "p-3 text-sm font-bold rounded-full transition-all flex items-center justify-center w-10 h-10 mx-auto ";
                            
                            if ($is_today) {
                                $class .= "bg-[#FDEF42] text-slate-900 ring-4 ring-yellow-100 shadow-md";
                            } elseif ($is_weekend) {
                                $class .= "bg-indigo-50 text-indigo-600 hover:bg-indigo-100 cursor-pointer";
                            } else {
                                $class .= "text-slate-400 hover:bg-slate-50 cursor-pointer";
                            }

                            echo '<a href="trial_class.php?tgl='.$tahun_ini.'-'.$bulan_ini.'-'.$tgl.'" class="'.$class.'">'.$tgl.'</a>';
                        }
                        ?>
                    </div>

                    <p class="text-[10px] text-center mt-8 text-slate-400 italic font-medium leading-relaxed">
                        *Klik pada tanggal yang berwarna untuk mendaftar trial
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- FAQ Section -->
<section id= "faq" class="py-24 bg-surface-container-low">
<div class="max-w-3xl mx-auto px-6">
<h2 class="text-4xl font-bold mb-12 text-center">Pertanyaan Umum</h2>
<div class="space-y-4">
<div class="bg-surface-container-lowest rounded-xl p-6 group cursor-pointer">
<div class="flex justify-between items-center mb-2">
<h4 class="text-lg font-bold">Berapa rasio guru dan murid?</h4>
<span class="material-symbols-outlined group-hover:rotate-45 transition-transform">add</span>
</div>
<div class="hidden group-active:block text-on-surface-variant pt-4 border-t border-surface-container">
                            Kami menjaga rasio 1:5 untuk Baby Class dan 1:8 untuk Toddler/BIMBA guna memastikan setiap anak mendapatkan perhatian personal yang maksimal.
                        </div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-6 group cursor-pointer">
<div class="flex justify-between items-center mb-2">
<h4 class="text-lg font-bold">Apakah tersedia layanan antar-jemput?</h4>
<span class="material-symbols-outlined group-hover:rotate-45 transition-transform">add</span>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-6 group cursor-pointer">
<div class="flex justify-between items-center mb-2">
<h4 class="text-lg font-bold">Bagaimana sistem keamanan di sekolah?</h4>
<span class="material-symbols-outlined group-hover:rotate-45 transition-transform">add</span>
</div>
</div>
<div class="bg-surface-container-lowest rounded-xl p-6 group cursor-pointer">
<div class="flex justify-between items-center mb-2">
<h4 class="text-lg font-bold">Apakah ada kegiatan ekstrakurikuler?</h4>
<span class="material-symbols-outlined group-hover:rotate-45 transition-transform">add</span>
</div>
</div>
</div>
</div>
</section>
<!-- Contact & Map -->
<section id= "kontak" class="py-24 bg-surface" id="contact">
<div class="max-w-7xl mx-auto px-8">
<div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
<div class="space-y-12">
<div>
<h2 class="text-4xl font-extrabold mb-6">Hubungi Kami</h2>
<p class="text-on-surface-variant text-lg">Kami dengan senang hati mengundang Anda untuk berkeliling dan mengenal lebih dekat lingkungan belajar kami. Silakan jadwalkan kunjungan atau hubungi kami untuk informasi lebih lanjut.</p>
</div>
<div class="space-y-8">
<div class="flex gap-6 items-center">
<div class="w-14 h-14 bg-primary-container rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-on-primary-container">call</span>
</div>
<div>
<p class="text-xs font-bold text-outline uppercase">Call Us</p>
<p class="text-xl font-bold text-on-surface">+62851-7166-0808</p>
</div>
</div>
<div class="flex gap-6 items-center">
<div class="w-14 h-14 bg-secondary-container rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-white">mail</span>
</div>
<div>
<p class="text-xs font-bold text-outline uppercase">Email Us</p>
<p class="text-xl font-bold text-on-surface">sspreschool@gmail.com</p>
</div>
</div>
<div class="flex gap-6 items-center">
<div class="w-14 h-14 bg-tertiary-container rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-on-tertiary-container">location_on</span>
</div>
<div>
<p class="text-xs font-bold text-outline uppercase">Visit Us</p>
<p class="text-xl font-bold text-on-surface"> JL.	AL	MUBAROK	III	NO.68, Joglo, Kembangan, Jakarta Barat, DKI Jakarta</p>
</div>
</div>
</div>
<div class="flex gap-4">
<button class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary hover:text-white transition-all">
<span class="material-symbols-outlined">social_leaderboard</span>
</button>
<button class="w-12 h-12 rounded-full border border-outline-variant flex items-center justify-center hover:bg-secondary hover:text-white transition-all">
<span class="material-symbols-outlined">photo_camera</span>
</button>
</div>
</div>
<div class="bg-surface-container-low rounded-xl overflow-hidden shadow-inner min-h-[400px] relative">
<div class="absolute inset-0 grayscale opacity-50 bg-[url('https://images.unsplash.com/photo-1524661135-423995f22d0b?ixlib=rb-4.0.3&amp;auto=format&amp;fit=crop&amp;w=1200&amp;q=80')]" data-location="Chicago" style=""></div>
<div class="absolute inset-0 flex items-center justify-center">
<div class="bg-white p-6 rounded-lg shadow-xl flex items-center gap-4">
<div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center">
<span class="material-symbols-outlined text-white">location_on</span>
</div>
<div>
<p class="font-bold">SS Preschool HQ</p>
<p class="text-xs text-outline">Open 8:00 AM - 6:00 PM</p>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>

</main>
<!-- Footer -->
<footer class="w-full rounded-t-[3rem] mt-20 bg-slate-50 dark:bg-slate-950">
<div class="flex flex-col md:flex-row justify-between items-center px-12 py-16 gap-8 max-w-7xl mx-auto">
<div class="space-y-4">
<span class="text-xl font-extrabold text-slate-900 dark:text-slate-50">SS Preschool</span>
<p class="text-slate-500 max-w-xs font-['Plus_Jakarta_Sans'] text-sm leading-relaxed">Mendidik dengan hati, membentuk karakter unggul sejak dini.</p>
</div>
<div class="flex flex-wrap justify-center gap-8 text-sm font-['Plus_Jakarta_Sans']">
<a class="text-slate-500 hover:underline decoration-yellow-400 underline-offset-4 transition-opacity" href="#">Kebijakan Privasi</a>
<a class="text-slate-500 hover:underline decoration-yellow-400 underline-offset-4 transition-opacity" href="#">Syarat &amp; Ketentuan</a>
<a class="text-slate-500 hover:underline decoration-yellow-400 underline-offset-4 transition-opacity" href="#">Peta Situs</a>
</div>
<div class="text-slate-500 text-sm font-['Plus_Jakarta_Sans']">
                © 2026 SS Preschool. Semua Hak Dilindungi.
            </div>
</div>
</footer>
<script>
function kirimWhatsApp(namaProgram) {
    const nomorWA = "6285171660808";

    const pesan = `Halo 👋

Saya tertarik mendaftarkan anak saya ke program ${namaProgram} di SS Preschool 🌈

Boleh dibantu untuk informasi lengkap mengenai program dan proses pendaftarannya? 😊

Nama anak : 
Usia anak :
No. WA yang dapat dihubungi : 

Terima kasih 🙏🏻`;

    const encoded = encodeURI(pesan);
    const url = `https://api.whatsapp.com/send?phone=${nomorWA}&text=${encoded}`;
    
    window.open(url, '_blank');
}
</script>
</body></html>