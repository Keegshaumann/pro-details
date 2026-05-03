<?php
$page_title = '404 — Page Not Found';
include 'includes/header.php';
?>
<section class="page-hero" style="min-height:70vh; display:flex; align-items:center;">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content" style="position:relative; z-index:2;">
        <span class="section-tag">Oops</span>
        <h1 style="font-size:clamp(60px,12vw,120px); color:var(--gold); margin-bottom:16px;">404</h1>
        <h2 style="font-size:clamp(22px,4vw,36px); margin-bottom:16px;">Page Not Found</h2>
        <p style="color:var(--grey); margin-bottom:36px;">The page you're looking for has gone for a detail. Let's get you back on track.</p>
        <a href="index.php" class="btn btn-gold">Go Home</a>
    </div>
</section>
<?php include 'includes/footer.php'; ?>
