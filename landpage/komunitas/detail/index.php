<?php 
// 1. Panggil Header & Navbar
include '../../includes/header.php'; 
include '../../includes/navbar.php'; 
?>
<!DOCTYPE html><html lang="id"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Green Campus - Detail Komunitas | HijauIn</title>
<!-- Tailwind CSS CDN with Forms & Container Queries -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Google Fonts: Plus Jakarta Sans -->
<link href="https://fonts.googleapis.com" rel="preconnect">
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet">
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#f0fdf4',
              100: '#dcfce7',
              200: '#bbf7d0',
              500: '#22c55e',
              600: '#16a34a',
              700: '#15803d',
              800: '#166534',
              900: '#14532d',
              dark: '#0e3d23',
              deep: '#092917'
            }
          }
        }
      }
    }
  </script>
<style data-purpose="custom-typography">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      color: #1f2937;
      background-color: #fafbfc;
    }
  </style>
</head>


<?php
    include '../../includes/footer.php';
?>