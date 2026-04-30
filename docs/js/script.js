// SAVIOR SSS Website JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Hero slideshow
    const hero = document.querySelector('.hero');
    const heroSlides = hero ? Array.from(hero.querySelectorAll('.hero-slide')) : [];

    if (hero && heroSlides.length > 0) {
        let activeSlideIndex = 0;
        let slideTimer = null;
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const showSlide = (index) => {
            heroSlides.forEach((slide, slideIndex) => {
                slide.classList.toggle('active', slideIndex === index);
            });
            activeSlideIndex = index;
        };

        showSlide(0);

        if (!prefersReducedMotion && heroSlides.length > 1) {
            const startSlideshow = () => {
                stopSlideshow();
                slideTimer = window.setInterval(() => {
                    const nextIndex = (activeSlideIndex + 1) % heroSlides.length;
                    showSlide(nextIndex);
                }, 6000);
            };

            const stopSlideshow = () => {
                if (slideTimer) {
                    window.clearInterval(slideTimer);
                    slideTimer = null;
                }
            };

            startSlideshow();

            hero.addEventListener('mouseenter', stopSlideshow);
            hero.addEventListener('mouseleave', startSlideshow);
        }
    }

    // Site-wide background slideshow
    const siteBg = document.querySelector('.site-bg');
    const siteSlides = siteBg ? Array.from(siteBg.querySelectorAll('.bg-slide')) : [];
    if (siteBg && siteSlides.length > 0) {
        let activeBg = 0;
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        const showBg = (i) => {
            siteSlides.forEach((s, idx) => s.classList.toggle('active', idx === i));
            activeBg = i;
        };

        showBg(0);

        if (!prefersReducedMotion && siteSlides.length > 1) {
            let bgTimer = setInterval(() => {
                showBg((activeBg + 1) % siteSlides.length);
            }, 8000);

            // pause when window not focused to save CPU
            window.addEventListener('blur', () => clearInterval(bgTimer));
            window.addEventListener('focus', () => {
                clearInterval(bgTimer);
                bgTimer = setInterval(() => {
                    showBg((activeBg + 1) % siteSlides.length);
                }, 8000);
            });
        }
    }

    // Hero calendar logic
    (function initHeroCalendar(){
        const cal = document.getElementById('heroCalendar');
        if (!cal) return;

        const monthYear = document.getElementById('hcMonthYear');
        const daysContainer = document.getElementById('hcDays');
        const prevBtn = cal.querySelector('.hc-prev');
        const nextBtn = cal.querySelector('.hc-next');

        let viewDate = new Date();

        function render() {
            daysContainer.innerHTML = '';
            const year = viewDate.getFullYear();
            const month = viewDate.getMonth();
            monthYear.textContent = viewDate.toLocaleString(undefined, { month: 'long', year: 'numeric' });

            const firstDay = new Date(year, month, 1);
            const startDay = firstDay.getDay();
            const daysInMonth = new Date(year, month + 1, 0).getDate();

            // previous month's tail
            const prevMonthDays = new Date(year, month, 0).getDate();
            for (let i = startDay - 1; i >= 0; i--) {
                const d = prevMonthDays - i;
                const el = document.createElement('div');
                el.className = 'day other';
                el.textContent = d;
                daysContainer.appendChild(el);
            }

            // current month
            const today = new Date();
            for (let d = 1; d <= daysInMonth; d++) {
                const el = document.createElement('div');
                el.className = 'day';
                if (d === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    el.classList.add('today');
                }
                el.textContent = d;
                daysContainer.appendChild(el);
            }

            // fill grid to complete weeks
            const total = daysContainer.children.length;
            const remainder = (7 - (total % 7)) % 7;
            for (let i = 1; i <= remainder; i++) {
                const el = document.createElement('div');
                el.className = 'day other';
                el.textContent = i;
                daysContainer.appendChild(el);
            }
        }

        prevBtn.addEventListener('click', function(){
            viewDate.setMonth(viewDate.getMonth() - 1);
            render();
        });

        nextBtn.addEventListener('click', function(){
            viewDate.setMonth(viewDate.getMonth() + 1);
            render();
        });

        render();
    })();

    // Contact form: send via SMS or WhatsApp (build link from form fields)
    (function contactSendHandlers(){
        const sendSmsBtn = document.getElementById('sendSmsBtn');
        const sendWaBtn = document.getElementById('sendWaBtn');
        const form = document.querySelector('.contact-form');
        if (!form) return;

        const getFormData = () => {
            const name = (document.getElementById('name') || {}).value || '';
            const email = (document.getElementById('email') || {}).value || '';
            const phone = (document.getElementById('phone') || {}).value || '';
            const subject = (document.getElementById('subject') || {}).value || '';
            const message = (document.getElementById('message') || {}).value || '';
            return { name, email, phone, subject, message };
        };

        const buildText = (data) => {
            let parts = [];
            if (data.name) parts.push('Name: ' + data.name);
            if (data.phone) parts.push('Phone: ' + data.phone);
            if (data.email) parts.push('Email: ' + data.email);
            if (data.subject) parts.push('Subject: ' + data.subject);
            if (data.message) parts.push('Message: ' + data.message);
            return parts.join('\n');
        };

        const openLink = (href) => {
            // Use window.open to let user choose app; fallback to location if blocked
            const w = window.open(href, '_blank');
            if (!w) window.location.href = href;
        };

        if (sendSmsBtn) {
            sendSmsBtn.addEventListener('click', function(){
                const data = getFormData();
                if (!data.message && !data.subject) { alert('Please enter a message or subject first.'); return; }
                const to = sendSmsBtn.dataset.smsTo || '';
                const text = buildText(data);
                // sms: URI with body (device-dependent)
                const smsHref = 'sms:' + to + '?body=' + encodeURIComponent(text);
                openLink(smsHref);
            });
        }

        if (sendWaBtn) {
            sendWaBtn.addEventListener('click', function(){
                const data = getFormData();
                if (!data.message && !data.subject) { alert('Please enter a message or subject first.'); return; }
                const waNumber = sendWaBtn.dataset.waTo || '';
                const text = buildText(data);
                const waHref = 'https://web.whatsapp.com/send?phone=' + waNumber + '&text=' + encodeURIComponent(text) + '&app_absent=0';
                openLink(waHref);
            });
        }
    })();

    // Mobile Menu Toggle
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    // Fullscreen image viewer for site images
    (function initImageViewer(){
        const viewer = document.getElementById('imageViewer');
        const viewerImg = document.getElementById('imageViewerImg');
        const closeBtn = document.getElementById('imageViewerClose');
        if (!viewer || !viewerImg || !closeBtn) return;

        const openViewer = (src, alt) => {
            viewerImg.src = src;
            viewerImg.alt = alt || 'Expanded image';
            viewer.classList.add('open');
            viewer.setAttribute('aria-hidden', 'false');
        };

        const closeViewer = () => {
            viewer.classList.remove('open');
            viewer.setAttribute('aria-hidden', 'true');
            viewerImg.src = '';
        };

        document.querySelectorAll('.gallery-image img, .staff-image-photo img, .about-card img, .content-page img').forEach((img) => {
            img.style.cursor = 'zoom-in';
            img.addEventListener('click', () => openViewer(img.src, img.alt));
        });

        closeBtn.addEventListener('click', closeViewer);
        viewer.addEventListener('click', (event) => {
            if (event.target === viewer) closeViewer();
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') closeViewer();
        });
    })();

    if (hamburger) {
        hamburger.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            
            // Animate hamburger
            const spans = hamburger.querySelectorAll('span');
            spans.forEach((span, index) => {
                if (navMenu.classList.contains('active')) {
                    if (index === 0) span.style.transform = 'rotate(45deg) translate(10px, 10px)';
                    if (index === 1) span.style.opacity = '0';
                    if (index === 2) span.style.transform = 'rotate(-45deg) translate(5px, -5px)';
                } else {
                    span.style.transform = 'none';
                    span.style.opacity = '1';
                }
            });
        });

        // Close menu when a link is clicked
        const navLinks = navMenu.querySelectorAll('a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                navMenu.classList.remove('active');
                const spans = hamburger.querySelectorAll('span');
                spans.forEach(span => {
                    span.style.transform = 'none';
                    span.style.opacity = '1';
                });
            });
        });
    }

    // Form Validation and Submission
    const applicationForm = document.querySelector('.application-form');
    const contactForm = document.querySelector('.contact-form');

    if (applicationForm) {
        applicationForm.addEventListener('submit', function(e) {
            if (!validateAdmissionForm()) {
                e.preventDefault();
                alert('Please fill in all required fields correctly.');
            }
        });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            if (!validateContactForm()) {
                e.preventDefault();
                alert('Please fill in all required fields correctly.');
            }
        });
    }

    // Check for success message
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('success') === '1') {
        showSuccessMessage();
    }
});

// Form Validation Functions
function validateAdmissionForm() {
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const level = document.getElementById('level');

    if (!name.value.trim()) {
        name.focus();
        return false;
    }

    if (!isValidEmail(email.value)) {
        email.focus();
        return false;
    }

    if (!phone.value.trim()) {
        phone.focus();
        return false;
    }

    if (!level.value) {
        level.focus();
        return false;
    }

    return true;
}

function validateContactForm() {
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const subject = document.getElementById('subject');
    const message = document.getElementById('message');

    if (!name.value.trim()) {
        name.focus();
        return false;
    }

    if (!isValidEmail(email.value)) {
        email.focus();
        return false;
    }

    if (!subject.value.trim()) {
        subject.focus();
        return false;
    }

    if (!message.value.trim() || message.value.trim().length < 10) {
        message.focus();
        alert('Please provide a message of at least 10 characters.');
        return false;
    }

    return true;
}

// Email Validation
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Success Message
function showSuccessMessage() {
    const message = document.createElement('div');
    message.style.cssText = `
        background: #4CAF50;
        color: white;
        padding: 15px 20px;
        margin-bottom: 20px;
        border-radius: 5px;
        text-align: center;
        animation: slideDown 0.3s ease;
    `;
    message.textContent = '✓ Your message has been received. We will get back to you soon!';
    
    const form = document.querySelector('.application-form') || document.querySelector('.contact-form');
    if (form) {
        form.parentElement.insertBefore(message, form);
        setTimeout(() => {
            message.remove();
        }, 5000);
    }

    // Clear URL parameter
    window.history.replaceState({}, document.title, window.location.pathname);
}

// Smooth Scroll for Anchor Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add Animation to Elements on Scroll
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver(function(entries) {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.style.animation = 'fadeInUp 0.6s ease forwards';
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Observe elements with animation classes
document.querySelectorAll('.news-card, .info-card, .staff-card, .gallery-item').forEach(el => {
    observer.observe(el);
});

// Add CSS animation styles dynamically
const style = document.createElement('style');
style.textContent = `
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
`;
document.head.appendChild(style);

// Lazy Load Images (if using img tags in future)
if ('IntersectionObserver' in window) {
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                }
                observer.unobserve(img);
            }
        });
    });

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });
}

// Console Message
console.log('SAVIOR SSS Website - Endure and Succeed');
console.log('Version 1.0 - Welcome!');
