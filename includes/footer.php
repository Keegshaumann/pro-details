<!-- Pre-Footer CTA -->
<section class="prefoot">
    <div class="container prefoot-grid">
        <div class="prefoot-text">
            <span class="eyebrow">— Booking</span>
            <h2 class="display-2">Hand the keys over.<br><em>We'll do the rest.</em></h2>
            <p>Drop-off, collection or on-site appointments at our Centurion studio. We'll respond inside the same business day.</p>
        </div>
        <div class="prefoot-actions">
            <a href="contact.php" class="btn btn-cognac btn-large">Reserve a Slot →</a>
            <a href="https://wa.me/<?php echo $site_whatsapp; ?>" target="_blank" rel="noopener" class="btn btn-ghost-ink btn-large">Chat on WhatsApp</a>
            <p class="prefoot-meta">Or call <a href="tel:<?php echo $site_phone_link; ?>"><?php echo $site_phone; ?></a></p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="site-footer">
    <div class="container">
        <div class="footer-mast">
            <a href="index.php" class="footer-brand">Pro Details</a>
            <div class="footer-mast-meta">
                <span>Est. 2017</span>
                <span class="dot">·</span>
                <span>Centurion · Gauteng · ZA</span>
                <span class="dot">·</span>
                <span>By appointment only</span>
            </div>
        </div>

        <div class="footer-grid">
            <div class="footer-col footer-col-lead">
                <p class="footer-lead">A small studio of obsessive detailers. We treat every car — daily, classic or hypercar — like the only one in the bay.</p>
                <div class="footer-socials">
                    <a href="https://wa.me/<?php echo $site_whatsapp; ?>" target="_blank" rel="noopener" aria-label="WhatsApp">WhatsApp ↗</a>
                    <a href="https://www.instagram.com/" target="_blank" rel="noopener" aria-label="Instagram">Instagram ↗</a>
                    <a href="https://www.facebook.com/" target="_blank" rel="noopener" aria-label="Facebook">Facebook ↗</a>
                </div>
            </div>
            <div class="footer-col">
                <h4 class="footer-h">Studio</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">Ethos</a></li>
                    <li><a href="gallery.php">Work</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="footer-h">Services</h4>
                <ul>
                    <li><a href="services.php#exterior">Exterior Detail</a></li>
                    <li><a href="services.php#interior">Interior Detail</a></li>
                    <li><a href="services.php#paint-correction">Paint Correction</a></li>
                    <li><a href="services.php#ceramic-coating">Ceramic Coating</a></li>
                    <li><a href="services.php#ppf">Paint Protection Film</a></li>
                    <li><a href="services.php#engine-bay">Engine Bay</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4 class="footer-h">Visit</h4>
                <address>
                    Centurion, Gauteng<br>
                    South Africa<br><br>
                    <a href="tel:<?php echo $site_phone_link; ?>"><?php echo $site_phone; ?></a><br>
                    <a href="mailto:<?php echo $site_email; ?>"><?php echo $site_email; ?></a>
                </address>
                <p class="footer-hours">
                    <strong>Mon — Fri</strong> 08:00 – 17:00<br>
                    <strong>Saturday</strong> 08:00 – 14:00<br>
                    <strong>Sunday</strong> Closed
                </p>
            </div>
        </div>

        <div class="footer-rule"></div>

        <div class="footer-bottom">
            <p>© <?php echo date('Y'); ?> Pro Details Studio. All rights reserved.</p>
            <p class="footer-bottom-meta">Crafted in Centurion · <span class="mono">v2.0</span></p>
        </div>

        <div class="footer-wordmark" aria-hidden="true">PRO·DETAILS</div>
    </div>
</footer>

<button class="back-to-top" id="backToTop" aria-label="Back to top">
    <span>Top</span>
    <svg viewBox="0 0 16 16" width="14" height="14" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M8 13V3M3 8l5-5 5 5"/></svg>
</button>

<script src="/assets/js/main.js" defer></script>
</body>
</html>
