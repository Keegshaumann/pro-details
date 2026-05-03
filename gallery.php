<?php
$page_title = 'Gallery';
include 'includes/header.php';
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <span class="section-tag">Our Work</span>
        <h1>The <span class="gold-text">Gallery</span></h1>
        <p>Real cars. Real results. See the Pro Details difference.</p>
    </div>
</section>

<!-- Gallery Filter -->
<section class="section gallery-section">
    <div class="container">
        <div class="gallery-filters">
            <button class="filter-btn active" data-filter="all">All Work</button>
            <button class="filter-btn" data-filter="exterior">Exterior</button>
            <button class="filter-btn" data-filter="interior">Interior</button>
            <button class="filter-btn" data-filter="correction">Paint Correction</button>
            <button class="filter-btn" data-filter="ceramic">Ceramic Coating</button>
        </div>

        <div class="gallery-grid" id="galleryGrid">
            <!-- Gallery items - replace src with real images -->
            <?php
            $gallery_items = [
                ['category' => 'correction', 'title' => 'BMW 3 Series — Paint Correction', 'desc' => 'Full paint correction removing swirls and scratches'],
                ['category' => 'exterior', 'title' => 'Mercedes C-Class — Full Exterior Detail', 'desc' => 'Hand wash, clay bar and paint sealant'],
                ['category' => 'ceramic', 'title' => 'Audi Q5 — Ceramic Coating', 'desc' => '2-year ceramic coating with paint correction'],
                ['category' => 'interior', 'title' => 'BMW X5 — Interior Restoration', 'desc' => 'Full leather clean, condition and steam clean'],
                ['category' => 'correction', 'title' => 'VW Golf GTI — Paint Correction', 'desc' => 'Single stage correction and wax'],
                ['category' => 'exterior', 'title' => 'Toyota Land Cruiser — Full Detail', 'desc' => 'Premium package exterior & interior'],
                ['category' => 'ceramic', 'title' => 'Porsche 911 — PPF + Ceramic', 'desc' => 'Full bonnet PPF with ceramic coating'],
                ['category' => 'interior', 'title' => 'Range Rover — Interior Detail', 'desc' => 'Deep clean, odour treatment and leather conditioning'],
                ['category' => 'correction', 'title' => 'Ford Mustang — Multi-Stage Correction', 'desc' => '3-stage paint correction to perfection'],
                ['category' => 'exterior', 'title' => 'Jeep Wrangler — Exterior Detail', 'desc' => 'Full exterior decontamination and protection'],
                ['category' => 'ceramic', 'title' => 'Tesla Model 3 — Ceramic Coating', 'desc' => 'Paint correction and 5-year ceramic coating'],
                ['category' => 'interior', 'title' => 'Audi A4 — Interior Steam Clean', 'desc' => 'Full interior steam clean and shampoo'],
            ];

            $icons = [
                'exterior' => 'fa-car',
                'interior' => 'fa-couch',
                'correction' => 'fa-magic',
                'ceramic' => 'fa-layer-group',
            ];

            foreach ($gallery_items as $index => $item):
            ?>
            <div class="gallery-item" data-category="<?php echo $item['category']; ?>">
                <div class="gallery-placeholder">
                    <i class="fas <?php echo $icons[$item['category']]; ?>"></i>
                    <p>Add Photo Here</p>
                </div>
                <div class="gallery-overlay">
                    <div class="gallery-info">
                        <h4><?php echo $item['title']; ?></h4>
                        <p><?php echo $item['desc']; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Upload Prompt -->
        <div class="gallery-upload-note">
            <div class="upload-note-inner">
                <i class="fas fa-camera"></i>
                <h3>Ready to Showcase Your Work?</h3>
                <p>Replace the placeholder images above with your real before/after photos. Each tile accepts a standard JPG or PNG image.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-banner">
    <div class="cta-overlay"></div>
    <div class="container cta-content">
        <h2>Want Results Like <span class="gold-text">These?</span></h2>
        <p>Book your detail today and join hundreds of satisfied Pro Details customers.</p>
        <div class="cta-buttons">
            <a href="contact.php" class="btn btn-gold">Book a Detail</a>
            <a href="services.php" class="btn btn-white">View Services</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
