/* Pro Details — Main JavaScript */

document.addEventListener('DOMContentLoaded', function () {

    // ── Sticky Navbar ──────────────────────────────────────────
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function () {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // ── Mobile Nav Toggle ──────────────────────────────────────
    const navToggle = document.getElementById('navToggle');
    const navMenu   = document.getElementById('navMenu');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function () {
            navMenu.classList.toggle('open');
            document.body.style.overflow = navMenu.classList.contains('open') ? 'hidden' : '';
        });

        // Close on link click
        navMenu.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', function () {
                navMenu.classList.remove('open');
                document.body.style.overflow = '';
            });
        });

        // Close on outside click
        document.addEventListener('click', function (e) {
            if (!navbar.contains(e.target)) {
                navMenu.classList.remove('open');
                document.body.style.overflow = '';
            }
        });
    }

    // ── Back to Top ────────────────────────────────────────────
    const backToTop = document.getElementById('backToTop');
    if (backToTop) {
        window.addEventListener('scroll', function () {
            if (window.scrollY > 400) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });
        backToTop.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // ── Gallery Filter ─────────────────────────────────────────
    const filterBtns  = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    if (filterBtns.length > 0) {
        filterBtns.forEach(function (btn) {
            btn.addEventListener('click', function () {
                filterBtns.forEach(function (b) { b.classList.remove('active'); });
                btn.classList.add('active');

                const filter = btn.getAttribute('data-filter');

                galleryItems.forEach(function (item) {
                    if (filter === 'all' || item.getAttribute('data-category') === filter) {
                        item.style.display = '';
                        item.style.animation = 'fadeIn 0.4s ease';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }

    // ── Scroll-Reveal Animations ───────────────────────────────
    const revealElements = document.querySelectorAll(
        '.service-card, .package-card, .testimonial-card, .value-card, .process-step, .brand-item, .info-card'
    );

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = entry.target.style.transform.replace('translateY(30px)', 'translateY(0)');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    revealElements.forEach(function (el) {
        el.style.opacity = '0';
        el.style.transform = (el.style.transform || '') + ' translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });

    // ── Contact Form Validation ────────────────────────────────
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        const inputs = contactForm.querySelectorAll('input[required], textarea[required]');

        inputs.forEach(function (input) {
            input.addEventListener('blur', function () {
                validateField(input);
            });
            input.addEventListener('input', function () {
                if (input.classList.contains('error')) {
                    validateField(input);
                }
            });
        });

        contactForm.addEventListener('submit', function (e) {
            let valid = true;
            inputs.forEach(function (input) {
                if (!validateField(input)) valid = false;
            });
            if (!valid) e.preventDefault();
        });

        function validateField(field) {
            const val = field.value.trim();
            let ok = val.length > 0;
            if (field.type === 'email') {
                ok = ok && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val);
            }
            field.style.borderColor = ok ? '' : 'rgba(220,50,50,0.6)';
            field.classList.toggle('error', !ok);
            return ok;
        }
    }

    // ── Hero Parallax ──────────────────────────────────────────
    const hero = document.querySelector('.hero');
    if (hero) {
        window.addEventListener('scroll', function () {
            const scrollY = window.scrollY;
            if (scrollY < window.innerHeight) {
                hero.style.backgroundPositionY = scrollY * 0.4 + 'px';
            }
        }, { passive: true });
    }

    // ── Smooth counter animation for stats ─────────────────────
    const statNumbers = document.querySelectorAll('.stat-number, .highlight-number, .exp-number');

    const counterObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                const el = entry.target;
                const text = el.textContent;
                const numMatch = text.match(/[\d,]+/);
                if (!numMatch) return;

                const target = parseInt(numMatch[0].replace(',', ''));
                const suffix = text.replace(numMatch[0], '');
                let current = 0;
                const increment = Math.ceil(target / 50);
                const timer = setInterval(function () {
                    current = Math.min(current + increment, target);
                    el.textContent = current.toLocaleString() + suffix;
                    if (current >= target) clearInterval(timer);
                }, 30);

                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(function (el) {
        counterObserver.observe(el);
    });

});
