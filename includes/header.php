<?php
$current_page = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pro Details - Professional Car Detailing in Centurion. Premium paint correction, ceramic coating, interior detailing and more.">
    <meta name="keywords" content="car detailing centurion, paint correction, ceramic coating, car wash centurion, pro details">
    <meta property="og:title" content="Pro Details | Professional Car Detailing - Centurion">
    <meta property="og:description" content="Premium car detailing services in Centurion. Paint correction, ceramic coating, interior & exterior detailing.">
    <meta property="og:type" content="website">
    <title><?php echo isset($page_title) ? $page_title . ' | Pro Details' : 'Pro Details | Professional Car Detailing - Centurion'; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <span><i class="fas fa-map-marker-alt"></i> Centurion, Gauteng</span>
            <span><i class="fas fa-clock"></i> Mon–Sat: 8am – 5pm</span>
        </div>
        <div class="top-bar-right">
            <a href="tel:+27000000000"><i class="fas fa-phone"></i> +27 (0)00 000 0000</a>
            <a href="mailto:info@prodetails.co.za"><i class="fas fa-envelope"></i> info@prodetails.co.za</a>
            <a href="https://wa.me/27000000000" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</div>

<!-- Navigation -->
<nav class="navbar" id="navbar">
    <div class="container nav-container">
        <a href="index.php" class="logo">
            <span class="logo-pro">PRO</span><span class="logo-details">DETAILS</span>
            <span class="logo-tagline">Professional Car Detailing</span>
        </a>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <span></span><span></span><span></span>
        </button>
        <ul class="nav-menu" id="navMenu">
            <li><a href="index.php" class="<?php echo $current_page === 'index' ? 'active' : ''; ?>">Home</a></li>
            <li><a href="services.php" class="<?php echo $current_page === 'services' ? 'active' : ''; ?>">Services</a></li>
            <li><a href="gallery.php" class="<?php echo $current_page === 'gallery' ? 'active' : ''; ?>">Gallery</a></li>
            <li><a href="about.php" class="<?php echo $current_page === 'about' ? 'active' : ''; ?>">About</a></li>
            <li><a href="contact.php" class="<?php echo $current_page === 'contact' ? 'active' : ''; ?>">Contact</a></li>
            <li><a href="contact.php" class="nav-cta">Book Now</a></li>
        </ul>
    </div>
</nav>
