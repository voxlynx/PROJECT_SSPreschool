<?php
include 'config/database.php'; // Ini akan memanggil $pdo

$showModal = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // 1. Ambil ID jadwal dari dropdown
        $jadwal_id = $_POST['jadwal_id'];

        // 2. Tarik detail tanggal & jam dari tabel jadwal_trial berdasarkan ID tersebut
        $stmt_get = $pdo->prepare("SELECT * FROM jadwal_trial WHERE id = ?");
        $stmt_get->execute([$jadwal_id]);
        $data_jadwal = $stmt_get->fetch();

        if ($data_jadwal) {
            // Gabungkan jam mulai dan selesai untuk disimpan ke database
            $tgl_fix = $data_jadwal['tanggal'];
            $jam_fix = date('H:i', strtotime($data_jadwal['jam_mulai'])) . " - " . date('H:i', strtotime($data_jadwal['jam_selesai']));

            // 3. Masukkan ke tabel pendaftaran_trial
            $sql = "INSERT INTO pendaftaran_trial (nama_anak, tgl_lahir_anak, nama_orangtua, nomor_wa, tanggal_trial, jam_trial) 
                    VALUES (:nama, :tgl_lhr, :ortu, :wa, :tgl_t, :jam_t)";
            
            $stmt = $pdo->prepare($sql);
            $save = $stmt->execute([
                ':nama'    => $_POST['child_name'],
                ':tgl_lhr' => $_POST['child_birthdate'],
                ':ortu'    => $_POST['parent_name'],
                ':wa'      => $_POST['whatsapp'],
                ':tgl_t'   => $tgl_fix, // Sekarang tidak NULL lagi
                ':jam_t'   => $jam_fix  // Sekarang tidak NULL lagi
            ]);

            if ($save) {
                $showModal = true;
                $notif_title = "Pendaftaran Berhasil!";
                $tgl_indo = date('d F Y', strtotime($tgl_fix));
                $notif_text = "Kami tunggu kehadiran {$_POST['child_name']} di SS Preschool pada tanggal $tgl_indo pukul $jam_fix. Terimakasih!";
            }
        } else {
            die("Error: Jadwal tidak ditemukan!");
        }
    } catch (PDOException $e) {
        die("Error Database: " . $e->getMessage());
    }
}
?>
<!DOCTYPE html>

<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Pendaftaran Trial Class - SS Preschool</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                    "surface-container-low": "#f3f3f3",
                    "error": "#ba1a1a",
                    "surface-dim": "#dadada",
                    "primary": "#676000",
                    "error-container": "#ffdad6",
                    "secondary-container": "#9cb4fe",
                    "on-tertiary-fixed": "#2f1500",
                    "on-secondary": "#ffffff",
                    "on-tertiary": "#ffffff",
                    "on-surface-variant": "#4a4733",
                    "primary-fixed": "#f4e639",
                    "inverse-on-surface": "#f1f1f1",
                    "surface-tint": "#676000",
                    "surface-container-lowest": "#ffffff",
                    "on-surface": "#1a1c1c",
                    "on-primary-fixed": "#1f1c00",
                    "surface-container-highest": "#e2e2e2",
                    "secondary-fixed-dim": "#b3c5ff",
                    "on-error-container": "#93000a",
                    "surface-bright": "#f9f9f9",
                    "outline-variant": "#ccc7ad",
                    "surface-container": "#eeeeee",
                    "secondary-fixed": "#dbe1ff",
                    "background": "#f9f9f9",
                    "secondary": "#435b9f",
                    "on-secondary-fixed": "#00174a",
                    "inverse-primary": "#d7ca15",
                    "on-primary-fixed-variant": "#4d4800",
                    "inverse-surface": "#2f3131",
                    "tertiary-fixed": "#ffdcc3",
                    "on-secondary-container": "#2a4486",
                    "on-primary-container": "#736c00",
                    "tertiary-fixed-dim": "#ffb77d",
                    "surface-variant": "#e2e2e2",
                    "outline": "#7b7861",
                    "on-primary": "#ffffff",
                    "on-background": "#1a1c1c",
                    "tertiary-container": "#ffe7d7",
                    "primary-fixed-dim": "#d7ca15",
                    "on-tertiary-fixed-variant": "#6e3900",
                    "surface": "#f9f9f9",
                    "on-error": "#ffffff",
                    "primary-container": "#fdef42",
                    "on-tertiary-container": "#a15600",
                    "surface-container-high": "#e8e8e8",
                    "on-secondary-fixed-variant": "#2a4386",
                    "tertiary": "#904d00"
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
      .material-symbols-outlined {
        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      }
      body {
        font-family: 'Plus Jakarta Sans', sans-serif;
      }
      .glass-effect {
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
      }
    </style>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
<!-- TopNavBar -->
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
<!-- Content Column -->
<div class="lg:col-span-5 space-y-8">
<div class="inline-block px-4 py-1.5 rounded-full bg-tertiary-container text-on-tertiary-container font-label text-xs font-bold tracking-widest uppercase">
                        Trial Class 2026
                    </div>
<h1 class="text-5xl lg:text-6xl font-black text-on-surface tracking-tight leading-tight">
                        Pendaftaran <span class="text-secondary">Trial Class</span>
</h1>
<p class="text-lg text-on-surface-variant leading-relaxed">
                        Berikan kesempatan bagi si kecil untuk merasakan pengalaman belajar yang penuh keceriaan di SS Preschool. Daftarkan putra-putri Anda untuk sesi percobaan gratis hari ini.
                    </p>
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
<!-- Form Column -->
<div class="lg:col-span-7">
    <div class="bg-surface-container-lowest rounded-xl p-8 lg:p-12 shadow-[0px_24px_48px_rgba(26,28,28,0.06)] relative overflow-hidden">
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-container/20 rounded-bl-full -mr-16 -mt-16"></div>
        
        <form action="trial_class.php" method="POST" class="space-y-6 relative z-10">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-2">
                    <label class="block text-sm font-bold text-on-surface-variant px-2 uppercase tracking-wider">Nama Lengkap Anak</label>
                    <input name="child_name" required class="w-full bg-surface-container-highest border-none rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container transition-all" placeholder="Contoh: Budi Santoso" type="text"/>
                </div>

                <div class="space-y-2">
                    <label class="block text-sm font-bold text-on-surface-variant uppercase tracking-wider ml-1">Tanggal Lahir Anak</label>
                    <input name="child_birthdate" required type="date" class="w-full bg-surface-container-low border-0 rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container text-on-surface transition-all" />
                </div>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface-variant px-2 uppercase tracking-wider">Nama Orang Tua</label>
                <input name="parent_name" required class="w-full bg-surface-container-highest border-none rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container transition-all" placeholder="Nama lengkap Ayah/Ibu" type="text"/>
            </div>

            <div class="space-y-2">
                <label class="block text-sm font-bold text-on-surface-variant px-2 uppercase tracking-wider">Nomor WhatsApp</label>
                <div class="relative">
                    <span class="absolute left-6 top-1/2 -translate-y-1/2 text-on-surface-variant font-medium">+62</span>
                    <input name="whatsapp" required class="w-full bg-surface-container-highest border-none rounded-md py-4 pl-16 pr-6 focus:ring-2 focus:ring-primary-container transition-all" placeholder="812 3456 7890" type="tel"/>
                </div>
            </div>

<div class="space-y-4">
    <label class="block text-sm font-bold text-on-surface-variant px-2 uppercase tracking-wider">Pilih Jadwal & Waktu yang Tersedia</label>
    <div class="relative">
        <select name="jadwal_id" required class="w-full bg-surface-container-highest border-none rounded-md py-4 px-6 focus:ring-2 focus:ring-primary-container appearance-none transition-all text-on-surface-variant">
            <option value="" disabled selected>Pilih Tanggal & Sesi</option>
            
            <?php
            // Ambil jadwal dari database yang statusnya masih tersedia
            $stmt_jadwal = $pdo->query("SELECT * FROM jadwal_trial WHERE status = 'tersedia' AND tanggal >= CURDATE() ORDER BY tanggal ASC");
            while ($row = $stmt_jadwal->fetch()) {
                // Format tanggal agar enak dibaca: 05 Mei 2026
                $tgl_format = date('d M Y', strtotime($row['tanggal']));
                // Format jam: 08:30
                $jam_format = date('H:i', strtotime($row['jam_mulai'])) . " - " . date('H:i', strtotime($row['jam_selesai']));
                
                echo "<option value='{$row['id']}'>$tgl_format | Sesi $jam_format</option>";
            }
            ?>
        </select>
    </div>
</div>
            <div class="pt-4">
                <button type="submit" class="w-full bg-[#435B9F] text-white py-5 rounded-full font-bold text-lg shadow-lg hover:shadow-xl transform transition-all active:scale-[0.98] flex items-center justify-center gap-3">
                    Daftarkan Sekarang
                    <span class="material-symbols-outlined">arrow_forward</span>
                </button>
            </div>
        </form>
    </div>
</main>
<!-- Footer -->
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
<?php if ($showModal): ?>
<script>
    Swal.fire({
        title: '<?php echo $notif_title; ?>',
        text: '<?php echo $notif_text; ?>',
        icon: 'success',
        confirmButtonText: 'Oke, Mengerti!',
        confirmButtonColor: '#435b9f', // Warna biru secondary kamu
        background: '#f9f9f9',
        borderRadius: '2rem',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'dashboard.php'; // Otomatis balik ke dashboard setelah klik OK
        }
    });
</script>
<?php endif; ?>
</body></html>