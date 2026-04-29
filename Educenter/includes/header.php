<!DOCTYPE html>
<html lang="id">
<head>
  <!--
    PHP: File ini di-include oleh setiap halaman sebagai bagian <head> HTML.
    Variabel $page_title dan $current_page dideklarasikan di halaman induk
    sebelum include dipanggil.
  -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="EDUCENTER – Pusat les dan bimbingan belajar terbaik untuk anak usia dini. Program Preschool, Private Class, dan Bimba.">
  <title><?php echo isset($page_title) ? htmlspecialchars($page_title) : 'EDUCENTER'; ?></title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">

  <!-- CSS Utama -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- CSS Halaman Spesifik (jika ada) -->
  <?php if (isset($extra_css)): ?>
    <link rel="stylesheet" href="<?php echo $extra_css; ?>">
  <?php endif; ?>
</head>
<body class="page-<?php echo isset($current_page) ? $current_page : 'home'; ?>">

<!-- Cursor custom (bintang kecil) untuk nuansa playful -->
<div class="custom-cursor" id="customCursor">✦</div>
