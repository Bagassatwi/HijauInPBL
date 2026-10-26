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