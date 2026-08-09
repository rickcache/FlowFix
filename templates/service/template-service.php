<?php
/* Template Name: Service Detail Page */
get_header(); 

if ( have_posts() ) : while ( have_posts() ) : the_post(); 

    // 1. Featured Image (Hero)
    $hero_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    if ( ! $hero_image ) $hero_image = 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=800&auto=format&fit=crop'; 

    // 2. Light Gray Area Data
    $top_text = get_post_meta( get_the_ID(), 'service_top_text', true );
    $top_image = get_post_meta( get_the_ID(), 'service_top_image', true );

    // 3. Dark Blue Split Area Data
    $side_image = get_post_meta( get_the_ID(), 'service_side_image', true );
    if ( ! $side_image ) $side_image = ''; 
    $split_text = get_post_meta( get_the_ID(), 'service_custom_text', true );
?>

<div class="page-service-detail-wrapper">
    
    <!-- 1. Hero Image (Forced 20:9 Ratio) -->
    <div class="service-hero-banner ratio-20-9-bg reveal-on-scroll" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
        <div class="hero-overlay-content">
            <h1 class="typewriter-heading" data-text="<?php echo esc_attr(get_the_title()); ?>"></h1>
        </div>
    </div>

    <!-- 2. Light Gray Area -->
    <div class="service-light-section">
        <div class="service-light-container">
            <div class="light-text-area reveal-on-scroll">
                <h2 class="typewriter-heading" data-text="<?php echo esc_attr(get_the_title()); ?> Overview"></h2>
                <div class="title-underline-left"></div>
                <div class="service-content-body">
                    <?php echo wpautop($top_text); ?>
                </div>
            </div>
            
            <?php if ($top_image) : ?>
            <div class="light-svg-area reveal-on-scroll slide-right">
                <!-- Forced 20:9 Ratio on the side image -->
                <img src="<?php echo esc_url($top_image); ?>" alt="<?php echo esc_attr(get_the_title()); ?> Icon" class="ratio-20-9">
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- 3. Dark Blue 50/50 Split -->
    <div class="service-split-section reveal-on-scroll">
        <!-- Forced 20:9 Ratio Background -->
        <div class="split-image-side ratio-20-9-bg" style="background-image: url('<?php echo esc_url($side_image); ?>');">
        </div>
        
        <div class="split-text-side">
            <div class="split-text-inner">
                <h3 class="typewriter-heading" data-text="Why Choose This Service?"></h3>
                <div class="title-underline-left-white"></div>
                <div class="service-content-body">
                    <?php echo wpautop($split_text); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- 4. Professional CTA / Quotation Bar -->
    <div class="service-cta-bar reveal-on-scroll slide-up">
        <div class="cta-bar-content">
            <h3>Need expert help with your <?php echo strtolower(get_the_title()); ?>?</h3>
            <p>Contact our licensed professionals today for a free, no-obligation quotation and rapid response.</p>
        </div>
        <div class="cta-bar-action">
            <a href="<?php echo site_url('/contact'); ?>" class="btn-cta">Request a Quote</a>
        </div>
    </div>

</div>

<!-- INLINE SCRIPT FOR PAGE-SPECIFIC ANIMATIONS -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Typewriter Engine
    const typeWriter = (element, text, speed = 35) => {
        element.textContent = '';
        element.classList.add('typing');
        let i = 0;
        const typingInterval = setInterval(() => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
            } else {
                clearInterval(typingInterval);
                element.classList.remove('typing'); // Stops the blinking cursor
            }
        }, speed);
    };

    // Scroll Observer
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                
                // Find and trigger any un-typed headings inside this section
                const headings = entry.target.querySelectorAll('.typewriter-heading:not(.typed)');
                headings.forEach(heading => {
                    heading.classList.add('typed');
                    const text = heading.getAttribute('data-text');
                    // Slight delay so the slide-in animation fires first
                    setTimeout(() => typeWriter(heading, text), 300);
                });

                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -80px 0px', threshold: 0.15 });

    // Attach observer to all reveal blocks
    const revealElements = document.querySelectorAll('.reveal-on-scroll');
    revealElements.forEach(el => observer.observe(el));
});
</script>

<style>
 /* --- Premium Font Imports --- */
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700;800&family=Inter:wght@400;500;600&display=swap');

    /* --- Global Typography & Spacing --- */
    .page-service-detail-wrapper {
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        color: #4a5568;
        line-height: 1.8;
        overflow-x: hidden;
    }

    .service-content-body p {
        margin-bottom: 1.5rem;
        font-size: 1.15rem;
        font-weight: 400;
    }

    /* --- Apply Premium Heading Font --- */
    .service-hero-banner h1,
    .light-text-area h2,
    .split-text-inner h3,
    .cta-bar-content h3,
    .btn-cta {
        font-family: 'Montserrat', sans-serif;
    }

    /* --- STRICT 20:9 IMAGE RATIOS --- */
    .ratio-20-9 {
        aspect-ratio: 20 / 9;
        object-fit: cover;
        width: 100%;
        border-radius: 12px;
        box-shadow: 0 20px 40px rgba(11, 26, 47, 0.1);
    }
    .ratio-20-9-bg {
        aspect-ratio: 20 / 9;
        background-size: cover;
        background-position: center;
        width: 100%;
    }

    /* --- 1. Hero Image --- */
    .service-hero-banner {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        /* Enforces minimum sizing on ultra-wide monitors while keeping ratio */
        min-height: 400px; 
    }
    .service-hero-banner::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to bottom, rgba(11, 26, 47, 0.8), rgba(11, 26, 47, 0.4));
    }
    .hero-overlay-content {
        position: relative;
        z-index: 2;
        padding: 0 2rem;
    }
    .service-hero-banner h1 {
        color: #ffffff;
        font-size: 4rem;
        font-weight: 800;
        text-transform: uppercase;
        margin: 0;
        letter-spacing: -1px;
    }

    /* --- 2. Light Gray Area --- */
    .service-light-section {
        background-color: #f4f5f7;
        padding: 7rem 2rem; /* Breathes much better */
    }
    .service-light-container {
        max-width: 1300px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        gap: 5rem;
        align-items: center;
    }
    .light-text-area {
        flex: 1 1 500px;
    }
    .light-text-area h2 {
        font-size: 2.8rem;
        font-weight: 800;
        color: #0b1a2f;
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
    }
    .light-svg-area {
        flex: 1 1 450px;
        display: flex;
        justify-content: center;
    }

    /* --- 3. Dark Blue 50/50 Split --- */
    .service-split-section {
        display: flex;
        flex-wrap: wrap;
        background-color: #0b1a2f;
    }
    .split-image-side {
        flex: 1 1 50%;
        /* 20:9 ratio enforced via class */
    }
    .split-text-side {
        flex: 1 1 50%;
        padding: 6rem 5rem;
        color: #e2e8f0; /* Soft off-white for reading comfort */
        display: flex;
        flex-direction: column;
        justify-content: center;
    }
    .split-text-inner h3 {
        color: #ffffff;
        font-size: 2.8rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        letter-spacing: -0.5px;
    }

    /* --- 4. Call to Action / Quotation Bar --- */
    .service-cta-bar {
        max-width: 1300px;
        margin: 8rem auto;
        background: linear-gradient(135deg, #00b4d8, #007bb5);
        border-radius: 20px;
        padding: 4rem 5rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 3rem;
        color: #fff;
        box-shadow: 0 30px 60px rgba(0, 180, 216, 0.2);
    }
    .cta-bar-content h3 {
        font-size: 2.4rem;
        font-weight: 800;
        margin: 0 0 10px 0;
    }
    .cta-bar-content p {
        font-size: 1.25rem;
        margin: 0;
        opacity: 0.95;
    }
    .btn-cta {
        background-color: #0b1a2f;
        color: #fff;
        padding: 1.2rem 3rem;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 800;
        font-size: 1.1rem;
        text-transform: uppercase;
        transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
        display: inline-block;
        white-space: nowrap;
    }
    .btn-cta:hover {
        background-color: #ffffff;
        color: #0b1a2f;
        transform: translateY(-4px);
        box-shadow: 0 15px 25px rgba(0,0,0,0.15);
    }

    /* --- Utility Elements & Animations --- */
    .title-underline-left {
        width: 100px;
        height: 5px;
        background-color: #00b4d8;
        margin-bottom: 2.5rem;
        border-radius: 3px;
    }
    .title-underline-left-white {
        width: 100px;
        height: 5px;
        background-color: #00b4d8; /* Keeps brand accent inside dark section */
        margin-bottom: 2.5rem;
        border-radius: 3px;
    }
    
    /* Typewriter Blinking Cursor */
    .typewriter-heading.typing::after {
        content: '|';
        color: #00b4d8;
        animation: cursorBlink 0.7s infinite;
        margin-left: 6px;
    }
    @keyframes cursorBlink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }

    /* Smooth Scroll Reveals */
    .reveal-on-scroll {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 1.2s cubic-bezier(0.16, 1, 0.3, 1), transform 1.2s cubic-bezier(0.16, 1, 0.3, 1);
        will-change: opacity, transform;
    }
    .reveal-on-scroll.slide-right {
        transform: translateX(50px);
    }
    .reveal-on-scroll.slide-up {
        transform: translateY(60px) scale(0.98);
    }
    .reveal-on-scroll.is-visible {
        opacity: 1;
        transform: translate(0, 0) scale(1);
    }

    /* --- Mobile Responsive Rules --- */
    @media (max-width: 992px) {
        .service-light-container { flex-direction: column; text-align: center; gap: 3rem; }
        .title-underline-left { margin: 0 auto 2.5rem auto; }
        .split-image-side, .split-text-side { flex: 1 1 100%; }
        /* Forces aspect ratio to reset to normal on mobile to fit text better if needed */
        .split-image-side.ratio-20-9-bg { aspect-ratio: 16 / 9; } 
        .split-text-side { padding: 4rem 2rem; text-align: center; }
        .title-underline-left-white { margin: 0 auto 2.5rem auto; }
        .service-cta-bar { flex-direction: column; text-align: center; padding: 3rem 2rem; margin: 4rem 1.5rem; gap: 2rem; }
        .service-hero-banner h1 { font-size: 3rem; }
    }
</style>
<?php 
endwhile; endif; 
get_footer(); 
?>