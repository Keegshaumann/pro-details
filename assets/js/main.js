/* Pro Details — Studio JS · v2.0 */

(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', init);

    function init() {
        stickyHeader();
        mobileNav();
        revealOnScroll();
        backToTop();
        galleryFilter();
        smoothAnchors();
    }

    /* Sticky header — adds shadow/state on scroll */
    function stickyHeader() {
        const header = document.getElementById('siteHeader');
        if (!header) return;
        const onScroll = () => {
            header.classList.toggle('is-scrolled', window.scrollY > 12);
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    }

    /* Mobile nav toggle */
    function mobileNav() {
        const toggle = document.getElementById('navToggle');
        const menu = document.getElementById('navMenu');
        if (!toggle || !menu) return;

        let scrollY = 0;

        const lockScroll = () => {
            scrollY = window.scrollY;
            document.body.style.position = 'fixed';
            document.body.style.top = `-${scrollY}px`;
            document.body.style.left = '0';
            document.body.style.right = '0';
            document.body.style.width = '100%';
        };
        const unlockScroll = () => {
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.left = '';
            document.body.style.right = '';
            document.body.style.width = '';
            window.scrollTo(0, scrollY);
        };

        const close = () => {
            toggle.classList.remove('is-open');
            menu.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            unlockScroll();
        };
        const open = () => {
            toggle.classList.add('is-open');
            menu.classList.add('is-open');
            toggle.setAttribute('aria-expanded', 'true');
            lockScroll();
        };

        toggle.addEventListener('click', () => {
            menu.classList.contains('is-open') ? close() : open();
        });

        menu.querySelectorAll('a').forEach(a => a.addEventListener('click', close));

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && menu.classList.contains('is-open')) close();
        });

        const mq = window.matchMedia('(min-width: 769px)');
        mq.addEventListener('change', (e) => {
            if (e.matches && menu.classList.contains('is-open')) close();
        });
    }

    /* Reveal-on-scroll using IntersectionObserver */
    function revealOnScroll() {
        const els = document.querySelectorAll('.reveal');
        if (!('IntersectionObserver' in window) || !els.length) {
            els.forEach(el => el.classList.add('is-in'));
            return;
        }
        const io = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-in');
                    io.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -8% 0px' });
        els.forEach(el => io.observe(el));
    }

    /* Back-to-top button */
    function backToTop() {
        const btn = document.getElementById('backToTop');
        if (!btn) return;
        const onScroll = () => {
            btn.classList.toggle('is-visible', window.scrollY > 600);
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
        btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
    }

    /* Gallery category filter */
    function galleryFilter() {
        const filters = document.getElementById('galFilters');
        const grid = document.getElementById('galleryGrid');
        if (!filters || !grid) return;

        const items = grid.querySelectorAll('.gallery-item');

        filters.addEventListener('click', (e) => {
            const btn = e.target.closest('.gal-filter');
            if (!btn) return;

            filters.querySelectorAll('.gal-filter').forEach(b => b.classList.remove('is-active'));
            btn.classList.add('is-active');

            const cat = btn.dataset.filter;
            items.forEach(item => {
                const match = cat === 'all' || item.dataset.cat === cat;
                item.style.transition = 'opacity .35s ease, transform .35s ease';
                if (match) {
                    item.style.display = '';
                    requestAnimationFrame(() => {
                        item.style.opacity = '1';
                        item.style.transform = '';
                    });
                } else {
                    item.style.opacity = '0';
                    item.style.transform = 'scale(0.96)';
                    setTimeout(() => { item.style.display = 'none'; }, 320);
                }
            });
        });
    }

    /* Smooth-scroll for in-page anchors with sticky-header offset */
    function smoothAnchors() {
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', (e) => {
                const id = a.getAttribute('href');
                if (id.length < 2) return;
                const target = document.querySelector(id);
                if (!target) return;
                e.preventDefault();
                const offset = 90;
                const top = target.getBoundingClientRect().top + window.scrollY - offset;
                window.scrollTo({ top, behavior: 'smooth' });
            });
        });
    }
})();
