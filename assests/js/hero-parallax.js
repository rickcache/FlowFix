/**
 * Hero Parallax Effect
 * File: hero-parallax.js
 * Location: /assets/js/hero-parallax.js
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        const heroSection = document.querySelector('.flowflix-hero');
        if (!heroSection) return;
        
        const parallaxBg = heroSection.querySelector('.hero-parallax-bg');
        if (!parallaxBg) return;
        
        let ticking = false;
        let lastScrollY = 0;
        
        function updateParallax() {
            const rect = heroSection.getBoundingClientRect();
            const viewportHeight = window.innerHeight;
            const sectionCenter = rect.top + rect.height / 2;
            const scrollProgress = (sectionCenter - viewportHeight / 2) / viewportHeight;
            
            // Clamp the translation to avoid extreme shifts
            const translateY = Math.min(Math.max(scrollProgress * 40, -30), 30);
            
            // Use requestAnimationFrame for smooth performance
            if (parallaxBg) {
                parallaxBg.style.transform = 'translateY(' + translateY + 'px)';
                parallaxBg.style.willChange = 'transform';
            }
        }
        
        // Throttled scroll handler
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    updateParallax();
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
        
        // Update on resize
        let resizeTimeout;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(updateParallax, 100);
        });
        
        // Initial call
        updateParallax();
        
        console.log('Hero parallax initialized');
    });

})(jQuery);