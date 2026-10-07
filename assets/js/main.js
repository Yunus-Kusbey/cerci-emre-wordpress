/**
 * Main JavaScript for Çerci Emre Theme
 */

document.addEventListener('DOMContentLoaded', function() {
    'use strict';

    // 1. Header Scroll Effect
    const header = document.getElementById('ce-header');
    if (header) {
        window.addEventListener('scroll', function() {
            if (header.getAttribute('data-sticky') === 'false') {
                return; // Sticky header disabled via Customizer
            }
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // 2. Mobile Menu Toggle
    const mobileToggle = document.getElementById('ce-mobile-toggle');
    const mobileMenu = document.getElementById('ce-mobile-menu');
    
    if (mobileToggle && mobileMenu) {
        mobileToggle.addEventListener('click', function() {
            this.classList.toggle('active');
            mobileMenu.classList.toggle('active');
            document.body.style.overflow = mobileMenu.classList.contains('active') ? 'hidden' : '';
        });
    }

    // 3. Search Overlay Toggle
    const searchToggles = document.querySelectorAll('#ce-search-toggle, .ce-mobile-search-trigger');
    const searchClose = document.getElementById('ce-search-close');
    const searchOverlay = document.getElementById('ce-search-overlay');
    const searchInput = document.querySelector('.ce-search-overlay__input');
    
    if (searchToggles.length > 0 && searchOverlay && searchClose) {
        searchToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                searchOverlay.classList.add('active');
                setTimeout(() => {
                    if (searchInput) searchInput.focus();
                }, 100);
                document.body.style.overflow = 'hidden';
            });
        });
        
        searchClose.addEventListener('click', function() {
            searchOverlay.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchOverlay.classList.contains('active')) {
                searchOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    // 4. Scroll to Top Button
    const scrollTopBtn = document.getElementById('ce-scroll-top');
    if (scrollTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // 5. Intersection Observer for Animations
    const animatedElements = document.querySelectorAll('.ce-animate');
    
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };

        const observer = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        animatedElements.forEach(el => {
            observer.observe(el);
        });
    } else {
        // Fallback for older browsers
        animatedElements.forEach(el => {
            el.classList.add('visible');
        });
    }

    // 6. Mini Cart Toggle
    const cartToggles = document.querySelectorAll('.ce-cart-trigger');
    const miniCart = document.getElementById('ce-mini-cart');
    const miniCartOverlay = document.getElementById('ce-mini-cart-overlay');
    const miniCartClose = document.getElementById('ce-mini-cart-close');

    if (cartToggles.length > 0 && miniCart && miniCartOverlay) {
        cartToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                miniCart.classList.add('is-open');
                miniCartOverlay.classList.add('is-active');
                document.body.style.overflow = 'hidden';
            });
        });

        const closeMiniCart = () => {
            miniCart.classList.remove('is-open');
            miniCartOverlay.classList.remove('is-active');
            document.body.style.overflow = '';
        };

        if (miniCartClose) miniCartClose.addEventListener('click', closeMiniCart);
        miniCartOverlay.addEventListener('click', closeMiniCart);
        
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && miniCart.classList.contains('is-open')) {
                closeMiniCart();
            }
        });
    }
});
