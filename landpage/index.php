<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komunitas - HijauIn</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<?php 
// 1. Panggil Header & Navbar
include 'includes/header.php'; 
include 'includes/navbar.php'; 
?>

<main>
    <?php 
    // 2. Panggil semua section landing page secara berurutan
    include 'sections/hero.php';
    include 'sections/stats.php';
    include 'sections/carakerja.php';
    include 'sections/features.php';
    include 'sections/testimoni.php';
    include 'sections/bottomcta.php';
    ?>
</main>

<?php 
// 3. Panggil Footer
include 'includes/footer.php'; 
?>