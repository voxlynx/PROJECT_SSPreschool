<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "inverse-surface": "#2f3131",
                    "secondary-fixed": "#dbe1ff",
                    "tertiary-fixed-dim": "#ffb77d",
                    "tertiary-fixed": "#ffdcc3",
                    "on-surface-variant": "#4a4733",
                    "on-error": "#ffffff",
                    "on-primary": "#ffffff",
                    "inverse-primary": "#d7ca15",
                    "surface-bright": "#f9f9f9",
                    "on-secondary-fixed-variant": "#2a4386",
                    "outline-variant": "#ccc7ad",
                    "surface-container-lowest": "#ffffff",
                    "primary": "#676000",
                    "on-secondary": "#ffffff",
                    "surface": "#f9f9f9",
                    "secondary-container": "#9cb4fe",
                    "on-tertiary": "#ffffff",
                    "on-tertiary-fixed-variant": "#6e3900",
                    "on-tertiary-fixed": "#2f1500",
                    "surface-dim": "#dadada",
                    "primary-fixed-dim": "#d7ca15",
                    "primary-container": "#fdef42",
                    "on-error-container": "#93000a",
                    "surface-container-high": "#e8e8e8",
                    "surface-container": "#eeeeee",
                    "on-tertiary-container": "#a15600",
                    "inverse-on-surface": "#f1f1f1",
                    "on-primary-fixed": "#1f1c00",
                    "secondary-fixed-dim": "#b3c5ff",
                    "tertiary": "#904d00",
                    "tertiary-container": "#ffe7d7",
                    "on-secondary-container": "#2a4486",
                    "on-primary-fixed-variant": "#4d4800",
                    "on-primary-container": "#736c00",
                    "on-secondary-fixed": "#00174a",
                    "background": "#f9f9f9",
                    "error": "#ba1a1a",
                    "primary-fixed": "#f4e639",
                    "on-background": "#1a1c1c",
                    "surface-variant": "#e2e2e2",
                    "surface-tint": "#676000",
                    "surface-container-low": "#f3f3f3",
                    "on-surface": "#1a1c1c",
                    "outline": "#7b7861",
                    "error-container": "#ffdad6",
                    "surface-container-highest": "#e2e2e2",
                    "secondary": "#435b9f"
            },
            "borderRadius": {
                    "DEFAULT": "1rem",
                    "lg": "2rem",
                    "xl": "3rem",
                    "full": "9999px"
            },
            "fontFamily": {
                    "headline": ["Plus Jakarta Sans"],
                    "display": ["Plus Jakarta Sans"],
                    "body": ["Plus Jakarta Sans"],
                    "label": ["Plus Jakarta Sans"]
            }
          },
        },
      }
    </script>
<style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
        .glass-header { backdrop-filter: blur(20px); }
    </style>
</head>
<body class="bg-surface text-on-surface min-h-screen selection:bg-primary-container">
<!-- TopAppBar -->
<nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-outline-variant/20">
    <div class="flex justify-between items-center px-8 py-4 max-w-7xl mx-auto">
        
        <div class="flex items-center gap-3">
            <img src="logo_ss.png" alt="SS Preschool Logo" class="h-10 w-auto" />
            <span class="text-xl font-black text-secondary tracking-tighter">SS Preschool</span>
        </div>

        <a href="dashboard.php" class="flex items-center gap-2 bg-surface-container-low hover:bg-primary-container/20 text-on-surface-variant px-5 py-2.5 rounded-full transition-all duration-300 group">
            <span class="material-symbols-outlined text-xl transition-transform group-hover:-translate-x-1">arrow_back</span>
            <span class="font-bold text-sm">Kembali ke Beranda</span>
        </a>

    </div>
</nav>
<main class="flex-grow pt-24 pb-12 flex items-center">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 w-full">
        </div>
</main>
<div class="max-w-6xl mx-auto px-6 lg:px-8">
<div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
<!-- Left Side: Content & Illustration -->
<div class="lg:col-span-5 space-y-8 lg:sticky lg:top-32">
<div class="space-y-4">
<span class="inline-block px-4 py-1.5 rounded-full bg-secondary-container text-on-secondary-container text-xs font-bold tracking-widest uppercase">Pendaftaran Siswa Baru 2026</span>
<h1 class="text-5xl font-black text-on-surface leading-[1.1] tracking-tight">Mulai Petualangan <span class="text-secondary italic">Si Kecil</span> di Sini.</h1>
<p class="text-lg text-on-surface-variant leading-relaxed">Bergabunglah dengan komunitas belajar yang penuh kegembiraan. Kami membantu anak Anda tumbuh dengan karakter kuat dan kreativitas tanpa batas.</p>
</div>
<!-- Bento-style decorative cards -->
<div class="grid grid-cols-1 gap-6">
<div class="flex items-center gap-4 p-4 rounded-xl bg-surface-container-low transition-all duration-300 hover:translate-x-1">
<div class="w-12 h-12 rounded-full bg-primary-container/20 flex items-center justify-center">
<span class="material-symbols-outlined text-primary">auto_awesome</span>
</div>
<div>
<h3 class="font-bold text-on-surface">Kurikulum Modern</h3>
<p class="text-sm text-on-surface-variant">Metode belajar berbasis perkembangan anak.</p>
</div>
</div>
<div class="flex items-center gap-4 p-4 rounded-xl bg-surface-container-low transition-all duration-300 hover:translate-x-1">
<div class="w-12 h-12 rounded-full bg-secondary-container/20 flex items-center justify-center">
<span class="material-symbols-outlined text-secondary">verified_user</span>
</div>
<div>
<h3 class="font-bold text-on-surface">Lingkungan Aman</h3>
<p class="text-sm text-on-surface-variant">Fasilitas ramah anak &amp; diawasi penuh.</p>
</div>
</div>
</div>
<div class="relative rounded-xl overflow-hidden aspect-video shadow-lg">
</div>
</div>
<!-- Right Side: The Form -->
<div class="lg:col-span-7">
<div class="bg-surface-container-lowest rounded-xl p-8 lg:p-12 shadow-[0px_24px_48px_rgba(26,28,28,0.06)] relative overflow-hidden">
<div class="absolute top-0 right-0 w-32 h-32 bg-primary-container/20 rounded-bl-full -mr-16 -mt-16"></div>
<form action="#" class="space-y-6 relative z-10">
<!-- Section: Data Anak -->
<div class="space-y-6">
<div class="flex items-center gap-3 border-b border-outline-variant/20 pb-4">
<span class="material-symbols-outlined text-primary text-3xl" data-icon="child_care">child_care</span>
<h2 class="text-2xl font-bold text-on-surface">Data Calon Siswa</h2>
</div>
<div class="grid md:grid-cols-2 gap-6">
<div class="space-y-2 md:col-span-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Nama Lengkap Anak</label>
<input class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface placeholder:text-outline transition-all" placeholder="Masukkan nama lengkap anak" type="text"/>
</div>
<div class="space-y-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Tanggal Lahir</label>
<input class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface transition-all" type="date"/>
</div>
<div class="space-y-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Jenis Kelamin</label>
<select class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface transition-all appearance-none">
<option disabled="" selected="" value="">Pilih Jenis Kelamin</option>
<option value="Laki-laki">Laki-laki</option>
<option value="Perempuan">Perempuan</option>
</select>
</div>
<div class="space-y-2 md:col-span-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Pilihan Program</label>
<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
<label class="flex items-center gap-3 p-4 bg-surface-container-low rounded-md cursor-pointer hover:bg-primary-container/20 transition-colors group">
<input class="w-5 h-5 text-primary focus:ring-primary-container border-outline-variant" name="program" type="radio"/>
<span class="font-medium text-on-surface">Baby Class</span>
</label>
<label class="flex items-center gap-3 p-4 bg-surface-container-low rounded-md cursor-pointer hover:bg-primary-container/20 transition-colors group">
<input class="w-5 h-5 text-primary focus:ring-primary-container border-outline-variant" name="program" type="radio"/>
<span class="font-medium text-on-surface">Toddler Class</span>
</label>
<label class="flex items-center gap-3 p-4 bg-surface-container-low rounded-md cursor-pointer hover:bg-primary-container/20 transition-colors group">
<input class="w-5 h-5 text-primary focus:ring-primary-container border-outline-variant" name="program" type="radio"/>
<span class="font-medium text-on-surface">BIMBA</span>
</label>
<label class="flex items-center gap-3 p-4 bg-surface-container-low rounded-md cursor-pointer hover:bg-primary-container/20 transition-colors group">
<input class="w-5 h-5 text-primary focus:ring-primary-container border-outline-variant" name="program" type="radio"/>
<span class="font-medium text-on-surface">Meeting Parents</span>
</label>
</div>
</div>
</div>
</div>
<!-- Section: Data Orang Tua -->
<div class="space-y-6 pt-4">
<div class="flex items-center gap-3 border-b border-outline-variant/20 pb-4">
<span class="material-symbols-outlined text-secondary text-3xl" data-icon="family_history">family_history</span>
<h2 class="text-2xl font-bold text-on-surface">Data Orang Tua</h2>
</div>
<div class="grid md:grid-cols-2 gap-6">
<div class="space-y-2 md:col-span-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Nama Orang Tua / Wali</label>
<input class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface placeholder:text-outline transition-all" placeholder="Masukkan nama lengkap" type="text"/>
</div>
<div class="space-y-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Nomor Telepon (WhatsApp)</label>
<input class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface placeholder:text-outline transition-all" placeholder="08xx-xxxx-xxxx" type="tel"/>
</div>
<div class="space-y-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Alamat Email</label>
<input class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface placeholder:text-outline transition-all" placeholder="contoh@email.com" type="email"/>
</div>
<div class="space-y-2 md:col-span-2">
<label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Alamat Domisili</label>
<textarea class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface placeholder:text-outline transition-all resize-none" placeholder="Masukkan alamat lengkap" rows="3"></textarea>
</div>
</div>
</div>
<!-- Submit Button -->
<div class="pt-6">
<button class="w-full bg-secondary text-white font-bold py-5 px-8 rounded-full shadow-xl hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center gap-3 group" type="submit">
<span class="text-lg">Kirim Pendaftaran</span>
<span class="material-symbols-outlined transition-transform group-hover:translate-x-2" data-icon="arrow_forward">arrow_forward</span>
</button>
<p class="text-center text-sm text-on-surface-variant mt-6 italic">Dengan mendaftar, Anda menyetujui Kebijakan Privasi dan Syarat &amp; Ketentuan SS Preschool.</p>
</div>
</form>
</div>
</div>
</div>
</main>
<!-- BottomNavBar (Mobile Only) -->
<nav class="md:hidden fixed bottom-0 left-0 w-full h-24 bg-white dark:bg-slate-950 flex justify-around items-center px-4 pb-4 z-50 shadow-[0px_-8px_24px_rgba(0,0,0,0.04)] rounded-t-[3rem]">
<a class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 hover:text-blue-600 hover:scale-110 transition-transform duration-300 ease-out" href="#">
<span class="material-symbols-outlined" data-icon="home">home</span>
<span class="font-plus-jakarta text-[11px] font-medium uppercase tracking-widest mt-1">Beranda</span>
</a>
<a class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 hover:text-blue-600 hover:scale-110 transition-transform duration-300 ease-out" href="#">
<span class="material-symbols-outlined" data-icon="kids_bubble">bubbles</span>
<span class="font-plus-jakarta text-[11px] font-medium uppercase tracking-widest mt-1">Program</span>
</a>
<a class="flex flex-col items-center justify-center bg-yellow-400 dark:bg-yellow-500 text-blue-900 dark:text-blue-950 rounded-full px-6 py-2 shadow-lg shadow-yellow-200/50 scale-95 transition-all cubic-bezier(0.34, 1.56, 0.64, 1)" href="#">
<span class="material-symbols-outlined" data-icon="app_registration">app_registration</span>
<span class="font-plus-jakarta text-[11px] font-medium uppercase tracking-widest mt-1">Daftar</span>
</a>
<a class="flex flex-col items-center justify-center text-slate-400 dark:text-slate-500 hover:text-blue-600 hover:scale-110 transition-transform duration-300 ease-out" href="#">
<span class="material-symbols-outlined" data-icon="account_circle">account_circle</span>
<span class="font-plus-jakarta text-[11px] font-medium uppercase tracking-widest mt-1">Profil</span>
</a>
</nav>
    <footer class="bg-surface-container-low py-12 px-6">
        <div class="max-w-3xl mx-auto border-t border-outline-variant/20 pt-12 flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-4">
            <img src="logo_ss.png" alt="SS Preschool Logo" class="h-10 w-auto object-contain" />                <p class="text-on-surface-variant font-medium text-sm">© <?php echo date("Y"); ?> SS Preschool. All rights reserved.</p>
            </div>
            <div class="flex gap-6">
                <a class="text-on-surface-variant hover:text-secondary text-sm font-semibold transition-colors" href="https://www.instagram.com/ssbimbel.joglo?igsh=eG5ybjh6MDBlendr">Instagram</a>
                <a class="text-on-surface-variant hover:text-secondary text-sm font-semibold transition-colors" href="https://wa.me/6285171660808">Hubungi Kami</a>
            </div>
        </div>
    </footer>
</body></html>