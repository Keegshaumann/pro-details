<?php
$page_title = 'Contact';

$success = false;
$error = '';
$form_data = ['name' => '', 'email' => '', 'phone' => '', 'service' => '', 'vehicle' => '', 'message' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = htmlspecialchars(strip_tags(trim($_POST['name'] ?? '')));
    $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone   = htmlspecialchars(strip_tags(trim($_POST['phone'] ?? '')));
    $service = htmlspecialchars(strip_tags(trim($_POST['service'] ?? '')));
    $vehicle = htmlspecialchars(strip_tags(trim($_POST['vehicle'] ?? '')));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'] ?? '')));

    $form_data = compact('name', 'email', 'phone', 'service', 'vehicle', 'message');

    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Please fill in your name, email and message.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address.';
    } else {
        $to      = 'hello@prodetails.co.za';
        $subject = "New booking enquiry — $name";
        $body    = "New enquiry from the Pro Details studio website:\n\n";
        $body   .= "Name:    $name\n";
        $body   .= "Email:   $email\n";
        $body   .= "Phone:   $phone\n";
        $body   .= "Service: $service\n";
        $body   .= "Vehicle: $vehicle\n\n";
        $body   .= "Message:\n$message\n";

        $headers  = "From: noreply@prodetails.co.za\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (@mail($to, $subject, $body, $headers)) {
            $success = true;
            $form_data = ['name' => '', 'email' => '', 'phone' => '', 'service' => '', 'vehicle' => '', 'message' => ''];
        } else {
            $error = 'We couldn\'t send your message just now. Please WhatsApp or call us directly.';
        }
    }
}

include 'includes/header.php';
?>

<!-- PAGE HERO -->
<section class="page-hero">
    <div class="container">
        <div class="page-hero-grid">
            <div class="reveal">
                <div class="crumbs">
                    <a href="index.php">Studio</a>
                    <span class="sep">/</span>
                    <span>Contact</span>
                </div>
                <span class="eyebrow cognac">— Booking · 05</span>
                <h1 class="display-1" style="margin-top:0.6rem;">Reserve<br>a <em>slot.</em></h1>
                <p class="lede" style="margin-top:1.5rem;">Tell us about your car and we'll come back same-day with a quote, a recommended scope and the next available bay date.</p>
            </div>
            <div class="page-hero-image reveal reveal-d2" style="background-image:url('https://images.unsplash.com/photo-1612825173281-9a193378527e?auto=format&fit=crop&w=1200&q=80');"></div>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="contact">
    <div class="container contact-grid">

        <div class="contact-info reveal">
            <div>
                <span class="eyebrow cognac">— Reach the studio</span>
                <h2 class="display-2" style="margin-top:0.8rem;">Get in <em>touch.</em></h2>
                <p class="lede" style="margin-top:1.2rem;">Quickest reply on WhatsApp. Phone hours mirror studio hours.</p>
            </div>

            <div class="info-list">
                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <div>
                        <span class="info-value"><a href="tel:<?php echo $site_phone_link; ?>"><?php echo $site_phone; ?></a></span>
                        <span class="info-sub">Mon–Fri 08:00–17:00 · Sat 08:00–14:00</span>
                    </div>
                </div>
                <div class="info-row">
                    <span class="info-label">WhatsApp</span>
                    <div>
                        <span class="info-value"><a href="https://wa.me/<?php echo $site_whatsapp; ?>" target="_blank" rel="noopener">Chat on WhatsApp ↗</a></span>
                        <span class="info-sub">Fastest channel — usually replies in &lt; 1hr</span>
                    </div>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <div>
                        <span class="info-value"><a href="mailto:<?php echo $site_email; ?>"><?php echo $site_email; ?></a></span>
                        <span class="info-sub">Replies inside the same business day</span>
                    </div>
                </div>
                <div class="info-row">
                    <span class="info-label">Studio</span>
                    <div>
                        <span class="info-value">Centurion, Gauteng</span>
                        <span class="info-sub">Exact address shared on booking confirmation</span>
                    </div>
                </div>
                <div class="info-row">
                    <span class="info-label">Hours</span>
                    <div>
                        <span class="info-value" style="font-size:1rem;font-family:var(--mono);line-height:1.8;">
                            Mon — Fri &nbsp; 08:00 – 17:00<br>
                            Saturday &nbsp;&nbsp;&nbsp;&nbsp; 08:00 – 14:00<br>
                            Sunday &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; By appointment
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="reveal reveal-d1">
            <div class="form-card">
                <h3 class="display-3">Request a <em>quote.</em></h3>
                <p>Two minutes. No obligation.</p>

                <?php if ($success): ?>
                <div class="form-success">
                    <svg viewBox="0 0 48 48" width="56" height="56" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="24" cy="24" r="22"/>
                        <path d="M14 24l7 7 13-14" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h4>Message received.</h4>
                    <p>Thanks — we'll be in touch shortly. Expect a reply inside the next business day.</p>
                </div>
                <?php else: ?>

                <?php if ($error): ?>
                <div class="form-error">— <?php echo $error; ?></div>
                <?php endif; ?>

                <form method="POST" action="contact.php#book" id="book" class="form" novalidate>
                    <div class="form-row">
                        <div class="field">
                            <label for="name">Name <span class="req">*</span></label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($form_data['name']); ?>" placeholder="Your name" required>
                        </div>
                        <div class="field">
                            <label for="email">Email <span class="req">*</span></label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($form_data['email']); ?>" placeholder="you@email.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="field">
                            <label for="phone">Phone / WhatsApp</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($form_data['phone']); ?>" placeholder="+27 82 000 0000">
                        </div>
                        <div class="field">
                            <label for="vehicle">Vehicle</label>
                            <input type="text" id="vehicle" name="vehicle" value="<?php echo htmlspecialchars($form_data['vehicle']); ?>" placeholder="e.g. BMW M3 — 2022">
                        </div>
                    </div>
                    <div class="field">
                        <label for="service">Service of interest</label>
                        <select id="service" name="service">
                            <option value="" <?php echo empty($form_data['service']) ? 'selected' : ''; ?>>Not sure — recommend something</option>
                            <option value="Essential Package" <?php echo $form_data['service'] === 'Essential Package' ? 'selected' : ''; ?>>Essential Package · from R 450</option>
                            <option value="Premium Package" <?php echo $form_data['service'] === 'Premium Package' ? 'selected' : ''; ?>>Premium Package · from R 1,200</option>
                            <option value="Ultimate Package" <?php echo $form_data['service'] === 'Ultimate Package' ? 'selected' : ''; ?>>Ultimate Package · from R 3,500</option>
                            <option value="Exterior Detail" <?php echo $form_data['service'] === 'Exterior Detail' ? 'selected' : ''; ?>>Exterior Detail</option>
                            <option value="Interior Detail" <?php echo $form_data['service'] === 'Interior Detail' ? 'selected' : ''; ?>>Interior Detail</option>
                            <option value="Paint Correction" <?php echo $form_data['service'] === 'Paint Correction' ? 'selected' : ''; ?>>Paint Correction</option>
                            <option value="Ceramic Coating" <?php echo $form_data['service'] === 'Ceramic Coating' ? 'selected' : ''; ?>>Ceramic Coating</option>
                            <option value="Paint Protection Film" <?php echo $form_data['service'] === 'Paint Protection Film' ? 'selected' : ''; ?>>Paint Protection Film</option>
                            <option value="Engine Bay Detail" <?php echo $form_data['service'] === 'Engine Bay Detail' ? 'selected' : ''; ?>>Engine Bay Detail</option>
                        </select>
                    </div>
                    <div class="field">
                        <label for="message">Tell us about the car <span class="req">*</span></label>
                        <textarea id="message" name="message" rows="5" placeholder="Condition, age, any specific concerns, preferred week…" required><?php echo htmlspecialchars($form_data['message']); ?></textarea>
                    </div>
                    <div class="form-foot">
                        <button type="submit" class="btn btn-ink btn-large">Send enquiry →</button>
                        <span class="form-note">— Your details stay between us</span>
                    </div>
                </form>

                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="map" aria-label="Centurion studio location">
            <span style="text-transform:uppercase;">Centurion · Gauteng</span>
            <span style="font-size:0.7rem;opacity:0.7;">Exact address on booking · By appointment only</span>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
