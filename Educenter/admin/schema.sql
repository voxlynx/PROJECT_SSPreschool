-- ============================================================
-- EDUCENTER DATABASE SCHEMA
-- Jalankan file ini sekali untuk membuat struktur tabel.
-- Gunakan: mysql -u root -p educenter_db < schema.sql
-- ============================================================

-- Buat database jika belum ada
CREATE DATABASE IF NOT EXISTS `educenter_db`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE `educenter_db`;

-- ── Tabel Admin ────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `admins` (
  `id`         INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  `username`   VARCHAR(80)     NOT NULL UNIQUE,
  `password`   VARCHAR(255)    NOT NULL COMMENT 'bcrypt hash',
  `nama`       VARCHAR(150)    NOT NULL,
  `created_at` DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Admin default: username=admin | password=Admin@1234
-- Hash di-generate dengan password_hash('Admin@1234', PASSWORD_BCRYPT)
INSERT IGNORE INTO `admins` (`username`, `password`, `nama`) VALUES
(
  'admin',
  '$2y$12$92BXCy3fNKZVBqv7HsHpBOUGwQCxTvXK1F0Wf6T0GxqOlnKHVz/6i',
  'Administrator EDUCENTER'
);

-- ── Tabel Loker ────────────────────────────────────────────────────────────
CREATE TABLE IF NOT EXISTS `loker` (
  `id`           INT UNSIGNED    NOT NULL AUTO_INCREMENT,
  `icon`         VARCHAR(10)     NOT NULL DEFAULT '💼',
  `posisi`       VARCHAR(200)    NOT NULL,
  `tipe`         VARCHAR(100)    NOT NULL COMMENT 'Full-Time / Part-Time / Freelance',
  `lokasi`       VARCHAR(100)    NOT NULL COMMENT 'On-site / Remote / Hybrid',
  `gaji`         VARCHAR(100)    NOT NULL DEFAULT 'Nego',
  `status`       ENUM('open','close') NOT NULL DEFAULT 'open',
  `deadline`     DATE            NOT NULL,
  `deskripsi`    TEXT            NOT NULL,
  `kualifikasi`  TEXT            NOT NULL COMMENT 'JSON array of strings',
  `created_at`   DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`   DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data contoh lowongan
INSERT IGNORE INTO `loker`
  (`id`, `icon`, `posisi`, `tipe`, `lokasi`, `gaji`, `status`, `deadline`, `deskripsi`, `kualifikasi`)
VALUES
(1, '👩‍🏫', 'Guru Preschool / PAUD', 'Full-Time', 'On-site', 'Nego', 'open', '2025-05-30',
  'Kami mencari guru PAUD yang berdedikasi, kreatif, dan mencintai anak-anak untuk bergabung dalam tim pengajar SS Preschool kami.',
  '["Minimal D3\/S1 PAUD atau keguruan","Berpengalaman min. 1 tahun mengajar anak usia dini","Sabar, kreatif, dan berkomunikasi baik","Bersedia mengikuti pelatihan internal"]'
),
(2, '📖', 'Tentor Private (Semua Mapel)', 'Part-Time / Freelance', 'On-site / Online', 'Per Sesi', 'open', '2025-06-15',
  'Dibutuhkan tentor private untuk berbagai mata pelajaran SD, SMP, dan SMA. Jadwal fleksibel.',
  '["Mahasiswa aktif atau lulusan S1 semua jurusan","Menguasai minimal satu bidang studi","Komunikatif dan sabar dalam mengajar"]'
),
(3, '🔤', 'Pengajar Bimba (Bimbingan Membaca)', 'Part-Time', 'On-site', 'Kompetitif', 'open', '2025-05-20',
  'Dibutuhkan pengajar khusus bimbingan membaca untuk anak usia 3–7 tahun.',
  '["Minimal SMA\/SMK sederajat","Menyukai anak-anak usia dini","Sabar dan kreatif"]'
);
