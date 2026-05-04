<?php
$page_title = '404 — Lost';
include 'includes/header.php';
?>

<section class="page-hero" style="min-height:75vh;display:flex;align-items:center;">
    <div class="container">
        <div style="max-width:700px;">
            <div class="crumbs">
                <a href="index.php">Studio</a>
                <span class="sep">/</span>
                <span>404</span>
            </div>
            <span class="eyebrow cognac">— Page not found</span>
            <h1 class="display-1" style="margin:0.6rem 0 1.5rem;font-size:clamp(5rem,16vw,14rem);line-height:0.9;">
                4<em>0</em>4
            </h1>
            <p class="lede" style="margin-bottom:2rem;">The page you were looking for has slipped under a coating of clear-coat. Let's get you back on track.</p>
            <div style="display:flex;gap:1rem;flex-wrap:wrap;">
                <a href="index.php" class="btn btn-ink btn-large">← Back to the studio</a>
                <a href="contact.php" class="btn btn-ghost-ink btn-large">Book a detail</a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
