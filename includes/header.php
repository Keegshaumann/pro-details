<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
$site_phone = '+27 82 555 0123';
$site_phone_link = '+27825550123';
$site_whatsapp = '27825550123';
$site_email = 'hello@prodetails.co.za';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f4efe6">
    <meta name="description" content="Pro Details — Centurion's premier automotive detailing studio. Paint correction, ceramic coating and concours-grade detailing for discerning owners.">
    <meta name="keywords" content="car detailing centurion, paint correction pretoria, ceramic coating centurion, ppf gauteng, pro details">
    <meta property="og:title" content="Pro Details — Automotive Detailing Studio · Centurion">
    <meta property="og:description" content="Paint correction, ceramic coating and concours-grade detailing in Centurion, Gauteng.">
    <meta property="og:type" content="website">
    <title><?php echo isset($page_title) ? $page_title . ' — Pro Details' : 'Pro Details — Automotive Detailing Studio · Centurion'; ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://images.unsplash.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Serif:ital@0;1&family=Geist:wght@300;400;500;600;700&family=Geist+Mono:wght@400;500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'%3E%3Crect width='32' height='32' rx='4' fill='%230e0e0c'/%3E%3Ctext x='16' y='22' font-family='Georgia,serif' font-size='18' font-style='italic' fill='%23f4efe6' text-anchor='middle'%3EP%3C/text%3E%3C/svg%3E">
</head>
<body class="page-<?php echo $current_page; ?>">

<!-- Announcement Strip -->
<div class="announce">
    <div class="container announce-inner">
        <span class="announce-dot"></span>
        <span>Now booking — May &amp; June detailing slots open</span>
        <a href="contact.php" class="announce-link">Reserve →</a>
    </div>
</div>

<!-- Navigation -->
<header class="site-header" id="siteHeader">
    <div class="container nav-container">
        <a href="index.php" class="brand" aria-label="Pro Details home">
            <span class="brand-mark" aria-hidden="true">
                <svg viewBox="0 0 40 40" width="36" height="36"><circle cx="20" cy="20" r="18.5" fill="none" stroke="currentColor" stroke-width="1"/><text x="20" y="26" font-family="Instrument Serif, Georgia, serif" font-size="22" font-style="italic" text-anchor="middle" fill="currentColor">P</text></svg>
            </span>
            <span class="brand-word">
                <span class="brand-name">Pro Details</span>
                <span class="brand-sub">Automotive Studio · Centurion</span>
            </span>
        </a>

        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation" aria-expanded="false">
            <span></span><span></span>
        </button>

        <nav class="nav" id="navMenu" aria-label="Primary">
            <ul class="nav-list">
                <li><a href="index.php" class="<?php echo $current_page === 'index' ? 'is-active' : ''; ?>"><span class="nav-num">01</span> Studio</a></li>
                <li><a href="services.php" class="<?php echo $current_page === 'services' ? 'is-active' : ''; ?>"><span class="nav-num">02</span> Services</a></li>
                <li><a href="gallery.php" class="<?php echo $current_page === 'gallery' ? 'is-active' : ''; ?>"><span class="nav-num">03</span> Work</a></li>
                <li><a href="about.php" class="<?php echo $current_page === 'about' ? 'is-active' : ''; ?>"><span class="nav-num">04</span> Ethos</a></li>
                <li><a href="contact.php" class="<?php echo $current_page === 'contact' ? 'is-active' : ''; ?>"><span class="nav-num">05</span> Contact</a></li>
            </ul>
            <div class="nav-cta-group">
                <a href="tel:<?php echo $site_phone_link; ?>" class="nav-phone"><?php echo $site_phone; ?></a>
                <a href="contact.php" class="btn btn-ink">Book a Detail</a>
            </div>
        </nav>
    </div>
</header>
