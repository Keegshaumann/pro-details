<?php
$page_title = 'Contact & Book';

$success = false;
$error = '';
$form_data = ['name' => '', 'email' => '', 'phone' => '', 'service' => '', 'vehicle' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $name    = htmlspecialchars(strip_tags(trim($_POST['name'] ?? '')));
    $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(strip_tags(trim($_POST['phone'] ?? '')));
    $service = htmlspecialchars(strip_tags(trim($_POST['service'] ?? '')));
    $vehicle = htmlspecialchars(strip_tags(trim($_POST['vehicle'] ?? '')));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'] ?? '')));

    $form_data = compact('name', 'email', 'phone', 'service', 'vehicle', 'message');

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $to      = 'info@prodetails.co.za';
        $subject = "New Booking Enquiry from $name";
        $body    = "New enquiry from the Pro Details website:\n\n";
        $body   .= "Name: $name\n";
        $body   .= "Email: $email\n";
        $body   .= "Phone: $phone\n";
        $body   .= "Service Required: $service\n";
        $body   .= "Vehicle: $vehicle\n\n";
        $body   .= "Message:\n$message\n";

        $headers  = "From: noreply@prodetails.co.za\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (mail($to, $subject, $body, $headers)) {
            $success = true;
            $form_data = ['name' => '', 'email' => '', 'phone' => '', 'service' => '', 'vehicle' => '', 'message' => ''];
        } else {
            $error = 'Sorry, there was a problem sending your message. Please try calling or WhatsApp us directly.';
        }
    }
}

include 'includes/header.php';
?>

<!-- Page Hero -->
<section class="page-hero">
    <div class="page-hero-overlay"></div>
    <div class="container page-hero-content">
        <span class="section-tag">Get In Touch</span>
        <h1>Book Your <span class="gold-text">Detail</span></h1>
        <p>Request a quote or book your appointment — we'll get back to you fast</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section contact-section">
    <div class="container contact-grid">

        <!-- Contact Info -->
        <div class="contact-info">
            <h2>Let's Talk <span class="gold-text">Cars</span></h2>
            <p>Have questions about a service, want a quote, or ready to book? We're here to help. Reach out through any of the channels below or fill in the form and we'll get back to you promptly.</p>

            <div class="info-cards">
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-phone"></i></div>
                    <div class="info-content">
                        <h4>Call Us</h4>
                        <a href="tel:+27000000000">+27 (0)00 000 0000</a>
                        <span>Mon–Fri 8am–5pm, Sat 8am–2pm</span>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon whatsapp-icon"><i class="fab fa-whatsapp"></i></div>
                    <div class="info-content">
                        <h4>WhatsApp</h4>
                        <a href="https://wa.me/27000000000" target="_blank">Chat on WhatsApp</a>
                        <span>Quickest way to reach us</span>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div class="info-content">
                        <h4>Email</h4>
                        <a href="mailto:info@prodetails.co.za">info@prodetails.co.za</a>
                        <span>We reply within 24 hours</span>
                    </div>
                </div>
                <div class="info-card">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="info-content">
                        <h4>Location</h4>
                        <span>Centurion, Gauteng</span>
                        <span>South Africa</span>
                    </div>
                </div>
            </div>

            <div class="business-hours">
                <h4><i class="fas fa-clock"></i> Business Hours</h4>
                <ul>
                    <li><span>Monday – Friday</span><span>8:00 AM – 5:00 PM</span></li>
                    <li><span>Saturday</span><span>8:00 AM – 2:00 PM</span></li>
                    <li><span>Sunday</span><span>Closed</span></li>
                    <li><span>Public Holidays</span><span>By appointment</span></li>
                </ul>
            </div>
        </div>

        <!-- Contact Form -->
        <div class="contact-form-wrapper">
            <div class="form-card">
                <h3>Request a Free Quote</h3>
                <p>Fill in your details and we'll get back to you with a quote and availability.</p>

                <?php if ($success): ?>
                <div class="form-success">
                    <i class="fas fa-check-circle"></i>
                    <h4>Message Sent!</h4>
                    <p>Thanks <?php echo htmlspecialchars($_POST['name'] ?? 'there'); ?>! We'll be in touch shortly.</p>
                </div>
                <?php else: ?>

                <?php if ($error): ?>
                <div class="form-error">
                    <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
                </div>
                <?php endif; ?>

                <form method="POST" action="contact.php" class="contact-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name <span class="required">*</span></label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($form_data['name']); ?>" placeholder="Your full name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($form_data['email']); ?>" placeholder="your@email.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone / WhatsApp</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($form_data['phone']); ?>" placeholder="+27 00 000 0000">
                        </div>
                        <div class="form-group">
                            <label for="vehicle">Your Vehicle</label>
                            <input type="text" id="vehicle" name="vehicle" value="<?php echo htmlspecialchars($form_data['vehicle']); ?>" placeholder="e.g. BMW 3 Series 2020">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="service">Service Required</label>
                        <select id="service" name="service">
                            <option value="" disabled <?php echo empty($form_data['service']) ? 'selected' : ''; ?>>Select a service...</option>
                            <option value="Essential Package" <?php echo $form_data['service'] === 'Essential Package' ? 'selected' : ''; ?>>Essential Package</option>
                            <option value="Premium Package" <?php echo $form_data['service'] === 'Premium Package' ? 'selected' : ''; ?>>Premium Package</option>
                            <option value="Ultimate Package" <?php echo $form_data['service'] === 'Ultimate Package' ? 'selected' : ''; ?>>Ultimate Package</option>
                            <option value="Exterior Detailing" <?php echo $form_data['service'] === 'Exterior Detailing' ? 'selected' : ''; ?>>Exterior Detailing</option>
                            <option value="Interior Detailing" <?php echo $form_data['service'] === 'Interior Detailing' ? 'selected' : ''; ?>>Interior Detailing</option>
                            <option value="Paint Correction" <?php echo $form_data['service'] === 'Paint Correction' ? 'selected' : ''; ?>>Paint Correction</option>
                            <option value="Ceramic Coating" <?php echo $form_data['service'] === 'Ceramic Coating' ? 'selected' : ''; ?>>Ceramic Coating</option>
                            <option value="Paint Protection Film" <?php echo $form_data['service'] === 'Paint Protection Film' ? 'selected' : ''; ?>>Paint Protection Film</option>
                            <option value="Engine Bay Detailing" <?php echo $form_data['service'] === 'Engine Bay Detailing' ? 'selected' : ''; ?>>Engine Bay Detailing</option>
                            <option value="Not Sure" <?php echo $form_data['service'] === 'Not Sure' ? 'selected' : ''; ?>>Not Sure — Need Advice</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message <span class="required">*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Tell us about your car's condition and what you're looking for..." required><?php echo htmlspecialchars($form_data['message']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-gold btn-full">
                        <i class="fas fa-paper-plane"></i> Send Enquiry
                    </button>
                    <p class="form-note"><i class="fas fa-lock"></i> Your details are safe and will never be shared.</p>
                </form>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Map -->
<section class="map-section">
    <div class="container">
        <div class="map-wrapper">
            <div class="map-placeholder">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Find Us in Centurion</h3>
                <p>Embed your Google Maps iframe here</p>
                <!-- Replace the div above with your Google Maps embed:
                <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                -->
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
