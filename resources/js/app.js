document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;

    // ========== PARTICLE SYSTEM ==========
    const carSvgs = [
        '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M5 11l1.5-4.5h11L19 11M3 11h18v5h-2a2 2 0 01-4 0H9a2 2 0 01-4 0H3v-5z"/></svg>',
        '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>',
        '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>'
    ];

    for (let i = 0; i < 12; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        const idx = i % carSvgs.length;
        if (i < 8) {
            particle.innerHTML = carSvgs[idx];
        } else {
            particle.textContent = ['⛽', '🔑', '🛞', '🏁'][i - 8];
            particle.style.fontSize = (16 + Math.random() * 24) + 'px';
        }
        particle.style.left = Math.random() * 100 + '%';
        if (!particle.style.fontSize) {
            particle.style.fontSize = (30 + Math.random() * 50) + 'px';
        }
        particle.style.animationDuration = (15 + Math.random() * 25) + 's';
        particle.style.animationDelay = (Math.random() * 20) + 's';
        particle.style.color = '#0ea5e9';
        body.appendChild(particle);
    }

    // ========== COUNTER ANIMATION ==========
    const counters = document.querySelectorAll('.animate-counter');
    if (counters.length > 0) {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.dataset.target) || 0;
                    const suffix = el.dataset.suffix || '';
                    const duration = parseInt(el.dataset.duration) || 1500;
                    const steps = 30;
                    const increment = target / steps;
                    let current = 0;
                    let step = 0;
                    const timer = setInterval(function() {
                        step++;
                        current = Math.min(Math.round(increment * step), target);
                        el.textContent = current.toLocaleString() + suffix;
                        if (step >= steps) {
                            clearInterval(timer);
                            el.textContent = target.toLocaleString() + suffix;
                        }
                    }, duration / steps);
                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(function(c) { observer.observe(c); });
    }

    // ========== PASSWORD TOGGLE ==========
    document.querySelectorAll('.password-toggle').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const input = this.closest('.password-field').querySelector('input');
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                if (icon) icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                if (icon) icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });

    // ========== SPEED LINE GENERATOR ==========
    function createWindLines(container) {
        if (!container) return;
        for (let i = 0; i < 4; i++) {
            const line = document.createElement('div');
            line.className = 'wind-line';
            line.style.top = (15 + Math.random() * 70) + '%';
            line.style.width = (40 + Math.random() * 80) + 'px';
            line.style.animationDelay = (Math.random() * 3) + 's';
            line.style.animationDuration = (1.5 + Math.random() * 2) + 's';
            container.appendChild(line);
        }
    }

    document.querySelectorAll('.wind-lines').forEach(function(el) {
        createWindLines(el);
    });

    // ========== AOS REFRESH ON DYNAMIC CONTENT ==========
    if (typeof AOS !== 'undefined') {
        window.addEventListener('load', function() { setTimeout(function() { AOS.refresh(); }, 500); });
    }

    // ========== SPOTLIGHT CARD HOVER ==========
    const spotlightSelector = 'main .bg-white.rounded-2xl, main .bg-white.rounded-xl, main .bg-white.rounded-lg, main .bg-white.rounded-3xl, main .bg-gray-50.rounded-2xl, main .bg-gray-50.rounded-xl, main .bg-gray-50.rounded-lg, main .bg-gray-50.rounded-3xl';
    document.querySelectorAll(spotlightSelector).forEach(function(card) {
        card.addEventListener('mousemove', function(e) {
            const rect = this.getBoundingClientRect();
            this.style.setProperty('--mx', ((e.clientX - rect.left) / rect.width * 100) + '%');
            this.style.setProperty('--my', ((e.clientY - rect.top) / rect.height * 100) + '%');
        });
    });

    // ========== HERO PARALLAX DOTS ==========
    const heroSliders = document.querySelectorAll('.hero-slider');
    heroSliders.forEach(function(slider) {
        slider.addEventListener('mousemove', function(e) {
            const rect = slider.getBoundingClientRect();
            const x = (e.clientX - rect.left) / rect.width - 0.5;
            const y = (e.clientY - rect.top) / rect.height - 0.5;
            const dots = slider.querySelectorAll('.dot-float');
            dots.forEach(function(dot, i) {
                const speed = 5 + i * 2;
                dot.style.transform = 'translate(' + (x * speed) + 'px, ' + (y * speed) + 'px)';
            });
        });
        slider.addEventListener('mouseleave', function() {
            const dots = slider.querySelectorAll('.dot-float');
            dots.forEach(function(dot) {
                dot.style.transform = '';
            });
        });
    });
});
