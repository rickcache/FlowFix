<div class="page-services-wrapper pt-large pb-large">
    <div class="services-container">
        
        <?php
        // Fetch variables directly from Native Theme Options!
        $main_title = get_option('ff_sp_main_title', 'SERVICES');

        // CTA Variables
        $cta_title = get_option('ff_sp_cta_title', 'Need Expert Plumbing Help?');
        $cta_sub = get_option('ff_sp_cta_sub', 'Get in touch with our professionals today.');
        $cta_btn_text = get_option('ff_sp_cta_btn_text', 'BOOK NOW');
        $cta_btn_link = get_option('ff_sp_cta_btn_link', site_url('/contact'));

        // Default Services Data
        $default_services = array(
            1 => array('title' => 'Emergency Plumbing', 'desc' => 'Fast 24/7 emergency plumbing services when you need them most.', 'link' => site_url('/emergency-plumbing'), 'img' => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=600&auto=format&fit=crop'),
            2 => array('title' => 'Blocked Drains', 'desc' => 'Clear stubborn drain blockages quickly with advanced equipment.', 'link' => site_url('/blocked-drains'), 'img' => 'https://images.unsplash.com/photo-1607472586893-edb57cb31414?q=80&w=600&auto=format&fit=crop'),
            3 => array('title' => 'Leak Detection', 'desc' => 'Accurate leak detection to prevent costly water damage and repairs.', 'link' => site_url('/leak-detection'), 'img' => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=600&auto=format&fit=crop'),
            4 => array('title' => 'Hot Water Systems', 'desc' => 'Installation, repairs, and maintenance for reliable hot water all year.', 'link' => site_url('/hot-water-systems'), 'img' => 'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=600&auto=format&fit=crop'),
            5 => array('title' => 'Gas Plumbing', 'desc' => 'Licensed gas fitting services completed safely and to Australian standards.', 'link' => site_url('/gas-plumbing'), 'img' => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=600&auto=format&fit=crop'),
            6 => array('title' => 'Bathroom Renovations', 'desc' => 'Complete bathroom plumbing solutions for stylish and functional renovations.', 'link' => site_url('/bathroom-renovations'), 'img' => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?q=80&w=600&auto=format&fit=crop')
        );

        // Fetch Dynamic Services Data
        $services = array();
        for ($i = 1; $i <= 6; $i++) {
            $services[$i] = array(
                'title' => get_option('ff_sp_card_'.$i.'_title', $default_services[$i]['title']),
                'desc'  => get_option('ff_sp_card_'.$i.'_desc', $default_services[$i]['desc']),
                'link'  => get_option('ff_sp_card_'.$i.'_link', $default_services[$i]['link']),
                'img'   => get_option('ff_sp_card_'.$i.'_img', $default_services[$i]['img'])
            );
        }
        ?>

        <h1 class="services-main-title"><?php echo esc_html($main_title); ?></h1>

        <div class="services-grid mt-large">
            <?php foreach ( $services as $service ) : ?>
                <!-- Linking the whole card -->
                <a href="<?php echo esc_url($service['link']); ?>" class="service-card">
                    
                    <!-- Geometric Decorations -->
                    <div class="card-bracket"></div>
                    <div class="card-circle-small"></div>
                    
                    <!-- The Expanding Circle with Image -->
                    <div class="card-quarter-circle">
                        <div class="circle-image" style="background-image: url('<?php echo esc_url($service['img']); ?>');"></div>
                        <div class="circle-overlay"></div>
                    </div>
                    
                    <!-- Content -->
                    <div class="card-content">
                        <h2 class="card-title"><?php echo esc_html($service['title']); ?></h2>
                        <p class="card-desc"><?php echo esc_html($service['desc']); ?></p>
                    </div>
                    
                </a>
            <?php endforeach; ?>
        </div>

        <!-- CTA Block -->
        <div class="services-cta-box mt-xlarge">
            <div class="cta-text">
                <h3><?php echo esc_html($cta_title); ?></h3>
                <p><?php echo esc_html($cta_sub); ?></p>
            </div>
            <div class="cta-action">
                <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn-cta"><?php echo esc_html($cta_btn_text); ?></a>
            </div>
        </div>

    </div>
</div>

<style>
  /* --- Services Page Wrapper --- */
.page-services-wrapper {
  font-family: sans-serif;
  background-color: #dfdfdf; 
  min-height: 100vh;
}

.services-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 2rem;
}

/* Spacing Helpers */
.pt-large { padding-top: 5rem; }
.pb-large { padding-bottom: 5rem; }
.mt-large { margin-top: 4rem; }
.mt-xlarge { margin-top: 6rem; }

/* --- Typography --- */
.services-main-title {
  font-size: 4.5rem;
  font-weight: 800;
  text-align: center;
  color: #0b1a2f; 
  margin: 0;
  text-transform: uppercase;
}

/* --- Services Grid --- */
.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

/* --- The Service Card --- */
.service-card {
  background-color: #0b1a2f; 
  display: block;
  text-decoration: none;
  position: relative;
  overflow: hidden; 
  padding: 40px;
  min-height: 380px;
  border-radius: 6px;
  
  /* Upgraded main transition for a premium feel */
  transition: transform 0.5s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.5s ease;
}



/* --- Content Layering --- */
.card-content {
  position: relative;
  z-index: 10;
}

.card-title {
  color: #ffffff;
  font-size: 1.8rem;
  font-weight: 700;
  margin: 0 0 15px 0;
  line-height: 1.2;
}

.card-desc {
  color: #aebfd5; 
  font-size: 1.05rem;
  line-height: 1.6;
  margin: 0;
  max-width: 85%;
  transition: color 0.4s ease;
}

/* Make text brighter on hover for better contrast over the image */

/* --- Geometric Decorations --- */
.card-bracket {
  position: absolute;
  top: 25px;
  right: 25px;
  width: 65%;
  height: 50%;
  border-top: 3px solid #ffffff;
  border-right: 3px solid #ffffff;
  border-top-right-radius: 30px;
  opacity: 0.9;
  z-index: 2;
  transition: transform 0.5s ease;
}



.card-circle-small {
  position: absolute;
  bottom: 40px;
  left: 40px;
  width: 35px;
  height: 35px;
  background-color: #dfdfdf; 
  border-radius: 50%;
  z-index: 2;
  transition: transform 0.5s ease;
}

.service-card:hover .card-circle-small {
  transform: scale(0.5); /* Shrinks slightly to give focus to the big circle */
}

/* --- The Expanding Image Circle --- */
.card-quarter-circle {
  position: absolute;
  bottom: -60px;
  right: -60px;
  width: 250px;
  height: 250px;
  background-color: #dfdfdf;
  border-radius: 50%;
  z-index: 1;
  overflow: hidden;
  /* Animate width/height instead of scale for crisp images */
  transition: all 0.6s cubic-bezier(0.25, 1, 0.5, 1);
}

/* Inner Background Image */
.circle-image {
  position: absolute;
  inset: 0;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transform: scale(1.2); /* Starts slightly zoomed in */
  transition: opacity 0.6s ease, transform 0.8s cubic-bezier(0.25, 1, 0.5, 1);
}

/* Dark gradient overlay so text remains readable over the image */
.circle-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(11,26,47,0.9) 0%, rgba(0,184,217,0.4) 100%);
  opacity: 0;
  transition: opacity 0.6s ease;
}

/* The Reveal Animation */
.service-card:hover .card-quarter-circle {
  width: 500px; /* Expands to cover most of the card */
  height: 500px;
  bottom: -150px;
  right: -150px;
}

.service-card:hover .circle-image {
  opacity: 1;
  transform: scale(1); /* Image zooms out to normal scale nicely */
}

.service-card:hover .circle-overlay {
  opacity: 1;
}

/* --- Bottom Block --- */
.services-bottom-block {
  width: 100%;
  height: 350px;
  background-color: #0b1a2f;
  border-radius: 40px;
}



/* --- Services CTA Box --- */
.services-cta-box {
  background-color: #0b1a2f; /* Deep dark blue */
  border-radius: 40px;
  padding: 60px 80px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.services-cta-box .cta-text h3 {
  color: #ffffff;
  font-size: 2.5rem;
  font-weight: 800;
  margin: 0 0 10px 0;
  line-height: 1.2;
}

.services-cta-box .cta-text p {
  color: #00b4d8; /* Bright cyan accent */
  font-size: 1.2rem;
  margin: 0;
  font-weight: 600;
}

/* --- CTA Button --- */
.services-cta-box .btn-cta {
  background-color: #ffffff;
  color: #0b1a2f;
  padding: 18px 45px;
  border-radius: 50px; /* Pill shape */
  text-decoration: none;
  font-weight: 700;
  font-size: 1.1rem;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  display: inline-block;
}

.services-cta-box .btn-cta:hover {
  background-color: #00b4d8;
  color: #ffffff;
  transform: translateY(-4px); /* Lift effect */
  box-shadow: 0 15px 25px rgba(0, 180, 216, 0.4); /* Cyan glow */
}

/* --- Mobile Responsiveness --- */
@media (max-width: 768px) {
  .services-cta-box {
    flex-direction: column;
    text-align: center;
    padding: 40px 30px;
    gap: 30px;
    border-radius: 20px;
  }
  
  .services-cta-box .cta-text h3 {
    font-size: 2rem;
  }
  
  .services-cta-box .btn-cta {
    width: 100%;
  }
}

/* --- Responsive Adjustments --- */
@media (max-width: 1100px) {
  .services-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
  .services-grid { grid-template-columns: 1fr; }
  .services-main-title { font-size: 3.5rem; }
  .service-card { min-height: 320px; }
  .services-bottom-block {
    height: 250px;
    border-radius: 20px;
  }
}
</style>


<!-- Animation -->

<style>
  /* --- SERVICES PAGE CARD ANIMATIONS --- */

/* Base hidden state for all service cards */
.page-services-wrapper .service-card {
    opacity: 0;
    transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    will-change: opacity, transform;
}

/* Odd Cards (1, 3, 5) start shifted to the left */
.page-services-wrapper .service-card:nth-child(odd) {
    transform: translateX(-60px);
}

/* Even Cards (2, 4, 6) start shifted to the right */
.page-services-wrapper .service-card:nth-child(even) {
    transform: translateX(60px);
}

/* --- Active Triggered States --- */
.page-services-wrapper.is-animated .service-card {
    opacity: 1;
    transform: translateX(0); /* Settle perfectly into place */
}

/* Staggered cascading delays so they ripple down the page smoothly */
.page-services-wrapper.is-animated .service-card:nth-child(1) { transition-delay: 0.1s; }
.page-services-wrapper.is-animated .service-card:nth-child(2) { transition-delay: 0.2s; }
.page-services-wrapper.is-animated .service-card:nth-child(3) { transition-delay: 0.3s; }
.page-services-wrapper.is-animated .service-card:nth-child(4) { transition-delay: 0.4s; }
.page-services-wrapper.is-animated .service-card:nth-child(5) { transition-delay: 0.5s; }
.page-services-wrapper.is-animated .service-card:nth-child(6) { transition-delay: 0.6s; }

</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const servicesWrapper = document.querySelector('.page-services-wrapper');

    if (servicesWrapper) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    servicesWrapper.classList.add('is-animated');
                    observer.unobserve(entry.target); // Runs cleanly once
                }
            });
        }, {
            root: null,
            rootMargin: '0px 0px -80px 0px',
            threshold: 0.15 // Triggers when 15% of the page wrapper is visible
        });

        observer.observe(servicesWrapper);
    }
});
</script>