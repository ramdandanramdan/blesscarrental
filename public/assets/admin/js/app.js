(function() {
    'use strict';

    /* =============================================
       SIDEBAR TOGGLE
       ============================================= */
    var sidebar = document.getElementById('sidebar');
    var sidebarToggle = document.getElementById('sidebarToggle');
    var sidebarOverlay = document.getElementById('sidebarOverlay');

    function isMobile() {
        return window.innerWidth < 992;
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            if (isMobile()) {
                sidebar.classList.toggle('show');
                if (sidebarOverlay) sidebarOverlay.classList.toggle('show');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        });
    }

    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            sidebarOverlay.classList.remove('show');
        });
    }

    // Close sidebar on nav link click (mobile)
    if (sidebar) {
        sidebar.querySelectorAll('.nav-link').forEach(function(link) {
            link.addEventListener('click', function() {
                if (isMobile()) {
                    sidebar.classList.remove('show');
                    if (sidebarOverlay) sidebarOverlay.classList.remove('show');
                }
            });
        });
    }

    // Counter animation is handled per-page (dashboard uses its own IntersectionObserver)

    /* =============================================
       SCROLL REVEAL ANIMATION
       ============================================= */
    if ('IntersectionObserver' in window) {
        var revealObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    revealObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('.reveal').forEach(function(el) {
            revealObserver.observe(el);
        });
    }

    /* =============================================
       AUTO STAGGER ANIMATION ON CARDS
       ============================================= */
    if ('IntersectionObserver' in window) {
        var staggerObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var cards = entry.target.querySelectorAll('.anim-stagger');
                    cards.forEach(function(card, index) {
                        card.style.animationDelay = (index * 0.06) + 's';
                        card.classList.add('anim-fade-up');
                    });
                    staggerObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.05 });

        document.querySelectorAll('.stagger-container').forEach(function(el) {
            staggerObserver.observe(el);
        });
    }

    /* =============================================
       AUTO ALERT DISMISS
       ============================================= */
    document.querySelectorAll('.alert-dismissible').forEach(function(alert) {
        setTimeout(function() {
            var closeBtn = alert.querySelector('.btn-close');
            if (closeBtn) closeBtn.click();
        }, 5000);
    });

    /* =============================================
       TABLE SEARCH FILTER
       ============================================= */
    document.querySelectorAll('[data-table-filter]').forEach(function(input) {
        input.addEventListener('keyup', function() {
            var query = this.value.toLowerCase();
            var tableId = this.getAttribute('data-table-filter');
            var table = document.getElementById(tableId);
            if (!table) return;
            var rows = table.querySelectorAll('tbody tr');
            rows.forEach(function(row) {
                var text = row.textContent.toLowerCase();
                row.style.display = text.includes(query) ? '' : 'none';
            });
        });
    });

    /* =============================================
       IMAGE PREVIEW ON FILE INPUT
       ============================================= */
    document.querySelectorAll('input[type="file"][data-preview]').forEach(function(input) {
        input.addEventListener('change', function() {
            var previewId = this.getAttribute('data-preview');
            var preview = document.getElementById(previewId);
            if (!preview || !this.files || !this.files[0]) return;
            var reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(this.files[0]);
        });
    });

    /* =============================================
       DROPZONE CLICK-TO-UPLOAD
       ============================================= */
    document.querySelectorAll('.dropzone-box input[type="file"]').forEach(function(input) {
        var dropzone = input.closest('.dropzone-box');
        if (dropzone) {
            dropzone.addEventListener('click', function(e) {
                if (e.target !== input) input.click();
            });
        }
    });

    /* =============================================
       CONFIRM DIALOGS
       ============================================= */
    document.querySelectorAll('[data-confirm]').forEach(function(el) {
        el.addEventListener('click', function(e) {
            var msg = this.getAttribute('data-confirm') || 'Are you sure?';
            if (!confirm(msg)) e.preventDefault();
        });
    });

    /* =============================================
       SMOOTH PAGE TRANSITION
       ============================================= */
    document.querySelectorAll('.sidebar-nav .nav-link:not([data-bs-toggle])').forEach(function(link) {
        link.addEventListener('click', function(e) {
            var href = this.getAttribute('href');
            if (!href || href === '#' || href.startsWith('javascript')) return;
            e.preventDefault();
            var mainContent = document.querySelector('.admin-content');
            if (mainContent) {
                mainContent.classList.remove('revealed');
                mainContent.style.opacity = '0';
                mainContent.style.transform = 'translateY(8px)';
            }
            setTimeout(function() {
                window.location.href = href;
            }, 150);
        });
    });

    /* =============================================
       PAGE LOAD ANIMATION
       ============================================= */
    window.addEventListener('load', function() {
        var mainContent = document.querySelector('.admin-content');
        if (mainContent) {
            mainContent.classList.add('revealed');
        }
    });

    /* =============================================
       PAGE LOAD ANIMATION
       ============================================= */
    window.addEventListener('load', function() {
        var mainContent = document.querySelector('.admin-content');
        if (mainContent) {
            mainContent.classList.add('revealed');
        }
    });

})();
