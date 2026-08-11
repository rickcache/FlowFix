<!-- HOME -->
<section class="home-hero" id="home">
    <div class="hero-container">
        <?php
        // Fetch variables directly from our Native Theme Options! 
        // Format: get_option('database_key', 'Fallback Value');
        
        $title    = get_option('ff_hero_title', 'Welcome to <span class="text-blue">FlowFix</span>');
        $subtitle = get_option('ff_hero_subtitle', '<span class="text-blue">Fast. Reliable. Licensed.</span> 24/7 Emergency Plumbing.');
        $btn_text = get_option('ff_hero_btn_text', 'contact us');
        $btn_link = get_option('ff_hero_btn_link', '#');
        $bg_image_url = get_option('ff_hero_bg_image', ''); // We will add an image uploader to the dashboard next!

        // Fetch dynamic card data
        $cards = array(
            array('text' => get_option('ff_hero_card_1_text', 'Quality & Trust')),
            array('text' => get_option('ff_hero_card_2_text', 'Licensed Experts')),
            array('text' => get_option('ff_hero_card_3_text', '24/7 Support'))
        );
        
        // Inline style for dynamic background image fallback
        $bg_style = $bg_image_url ? 'background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(' . esc_url($bg_image_url) . ');' : 'background-color: #2a2a2a;'; 
        ?>

        <div class="hero-bg" style="<?php echo $bg_style; ?>"></div>

        <div class="hero-content-wrapper">
            <div class="hero-text-content">
                
                <!-- We use wp_kses_post instead of esc_html here so the <span> tags for the blue text actually render! -->
                <h1 class="hero-title"><?php echo wp_kses_post($title); ?></h1>
                <p class="hero-subtitle"><?php echo wp_kses_post($subtitle); ?></p>
                <a href="<?php echo esc_url($btn_link); ?>" class="hero-btn"><?php echo esc_html($btn_text); ?></a>
            </div>

            <div class="hero-trust-cards">
                <?php foreach ($cards as $index => $card) : ?>
                    <div class="trust-card card-<?php echo $index + 1; ?>">
                       <img src="<?php echo get_template_directory_uri(); ?>/assests/images/badge.png" class="card-icon-placeholder" alt="Trust Badge">
                        <div class="card-line"></div>
                        <p class="card-text"><?php echo esc_html($card['text']); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="home-services" id="services">
    <div class="services-container">
        <?php
        // Fetch variables directly from our Native Theme Options!
        
        $heading = get_option('ff_services_heading', 'SERVICES');
        
        // Stats Banner Data
        $stat_1_num = get_option('ff_stat_1_num', '1200'); 
        $stat_1_text = get_option('ff_stat_1_text', 'companies');
        
        $stat_2_num = get_option('ff_stat_2_num', '1000+'); 
        $stat_2_text = get_option('ff_stat_2_text', 'customers served');
        
        $stat_3_num = get_option('ff_stat_3_num', '1000+'); 
        $stat_3_text = get_option('ff_stat_3_text', 'customers served');
        
        $stat_4_num = get_option('ff_stat_4_num', '1000+'); 
        $stat_4_text = get_option('ff_stat_4_text', 'customers served');
        
        $stat_tagline = get_option('ff_stat_tagline', 'We fix <span class="text-blue-light">pipes</span> like they are our own');

        // Bottom CTA Data
        $cta_sub = get_option('ff_services_cta_sub', 'EMERGENCY FIXING?');
        $cta_title = get_option('ff_services_cta_title', 'Contact Us Right now');
        $cta_btn_text = get_option('ff_services_cta_btn_text', 'Book a Quote');
        $cta_btn_link = get_option('ff_services_cta_btn_link', '#');

        // 6 Service Cards with default classes mapped to the layout
        $default_cards = array(
            1 => array('title' => 'Commercial Plumbing', 'class' => 'card-top-wide'),
            2 => array('title' => 'Blocked Drains', 'class' => 'card-top-square'),
            3 => array('title' => 'Emergency Plumbing', 'class' => 'card-bot-small'),
            4 => array('title' => 'Hot Water Systems', 'class' => 'card-bot-tall'),
            5 => array('title' => 'Leak Detection', 'class' => 'card-bot-tall'),
            6 => array('title' => 'Burst Pipes', 'class' => 'card-bot-tall')
        );

        $cards = array();
        for ($i = 1; $i <= 6; $i++) {
            $cards[$i] = array(
                'title' => get_option('ff_service_card_' . $i . '_title', $default_cards[$i]['title']),
                'class' => $default_cards[$i]['class'],
                'img'   => get_option('ff_service_card_' . $i . '_img', ''),
                'link'  => get_option('ff_service_card_' . $i . '_link', site_url('/services')) 
            );
        }
        ?>

        <!-- Top Section: Heading and Top Cards -->
        <div class="services-header">
            <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
            <div class="title-underline"></div>
        </div>
        
        <div class="services-top-grid">
            <!-- Card 1: Wide (Now the card ITSELF is the link) -->
            <a href="<?php echo esc_url($cards[1]['link']); ?>" class="service-card <?php echo $cards[1]['class']; ?>" style="text-decoration: none; color: inherit;">
                <div class="card-img-wrapper">
                    <?php if($cards[1]['img']) : ?>
                        <img src="<?php echo esc_url($cards[1]['img']); ?>" alt="<?php echo esc_attr($cards[1]['title']); ?>">
                    <?php else : ?>
                        <div class="placeholder-bg"></div>
                    <?php endif; ?>
                </div>
                <h3 class="card-label"><?php echo esc_html($cards[1]['title']); ?></h3>
            </a>

            <!-- Card 2: Square -->
            <a href="<?php echo esc_url($cards[2]['link']); ?>" class="service-card <?php echo $cards[2]['class']; ?>" style="text-decoration: none; color: inherit;">
                <div class="card-img-wrapper">
                    <?php if($cards[2]['img']) : ?>
                        <img src="<?php echo esc_url($cards[2]['img']); ?>" alt="<?php echo esc_attr($cards[2]['title']); ?>">
                    <?php else : ?>
                        <div class="placeholder-bg"></div>
                    <?php endif; ?>
                </div>
                <span class="view-all-link">view all</span>
                <h3 class="card-label"><?php echo esc_html($cards[2]['title']); ?></h3>
            </a>
        </div>
    </div>

    <!-- Middle Section: Stats Banner (Full Width) -->
    <div class="stats-banner-wrapper">
        <div class="stats-left-gray"></div>
        <div class="stats-main-cyan">
            <div class="stat-block">
                <span class="stat-num"><?php echo esc_html($stat_1_num); ?></span>
                <span class="stat-text"><?php echo esc_html($stat_1_text); ?></span>
            </div>
            <div class="stat-block">
                <span class="stat-num"><?php echo esc_html($stat_2_num); ?></span>
                <span class="stat-text"><?php echo esc_html($stat_2_text); ?></span>
            </div>
            <div class="stat-block">
                <span class="stat-num"><?php echo esc_html($stat_3_num); ?></span>
                <span class="stat-text"><?php echo esc_html($stat_3_text); ?></span>
            </div>
            <div class="stat-block">
                <span class="stat-num"><?php echo esc_html($stat_4_num); ?></span>
                <span class="stat-text"><?php echo esc_html($stat_4_text); ?></span>
            </div>
            <div class="stat-tagline">
                <?php echo wp_kses_post($stat_tagline); ?>
            </div>
        </div>
    </div>

    <!-- Bottom Section: CTA and Bottom Cards -->
    <div class="services-container">
        <div class="services-bottom-grid">
            <!-- Left Side: CTA and Small Card -->
            <div class="bottom-left-col">
                <div class="emergency-cta">
                    <div class="cta-line"></div>
                    <h4><?php echo esc_html($cta_sub); ?></h4>
                    <h3><?php echo esc_html($cta_title); ?></h3>
                    <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn-blue"><?php echo esc_html($cta_btn_text); ?></a>
                </div>

                <!-- Card 3: Small Square -->
                <a href="<?php echo esc_url($cards[3]['link']); ?>" class="service-card <?php echo $cards[3]['class']; ?>" style="text-decoration: none; color: inherit;">
                    <div class="card-img-wrapper">
                        <?php if($cards[3]['img']) : ?>
                            <img src="<?php echo esc_url($cards[3]['img']); ?>" alt="<?php echo esc_attr($cards[3]['title']); ?>">
                        <?php else : ?>
                            <div class="placeholder-bg"></div>
                        <?php endif; ?>
                    </div>
                    <span class="view-all-link">view all</span>
                    <h3 class="card-label"><?php echo esc_html($cards[3]['title']); ?></h3>
                </a>
            </div>

            <!-- Right Side: 3 Tall Cards -->
            <div class="bottom-right-col">
                <?php for($i = 4; $i <= 6; $i++) : ?>
                    <a href="<?php echo esc_url($cards[$i]['link']); ?>" class="service-card <?php echo $cards[$i]['class']; ?>" style="text-decoration: none; color: inherit;">
                        <div class="card-img-wrapper">
                            <?php if($cards[$i]['img']) : ?>
                                <img src="<?php echo esc_url($cards[$i]['img']); ?>" alt="<?php echo esc_attr($cards[$i]['title']); ?>">
                            <?php else : ?>
                                <div class="placeholder-bg"></div>
                            <?php endif; ?>
                        </div>
                        <span class="view-all-link">view all</span>
                        <h3 class="card-label"><?php echo esc_html($cards[$i]['title']); ?></h3>
                    </a>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="home-about" id="about">
    <div class="about-container">
        
        <?php
        // Fetch variables directly from our Native Theme Options!
        $heading    = get_option('ff_about_heading', 'ABOUT US');
        $img_left   = get_option('ff_about_img_left', ''); 
        $img_right  = get_option('ff_about_img_right', '');
        
        $left_title = get_option('ff_about_left_title', 'Our History');
        $left_text  = get_option('ff_about_left_text', "FlowFix Plumbing was established in 2014 with a simple vision: to provide honest, reliable, and high-quality plumbing services that customers could depend on. What began as a small local operation with a single service vehicle has grown into one of Sydney's trusted plumbing companies through consistent workmanship, transparent pricing, and exceptional customer service. Over the years, we have completed thousands of successful projects ranging from emergency plumbing repairs and blocked drain solutions to large-scale commercial installations and complete plumbing renovations. Our continued growth has been driven not by advertising alone, but by the recommendations of satisfied customers who value our professionalism, reliability, and commitment to doing every job right the first time. Today, FlowFix Plumbing continues to build on that foundation, combining years of experience with modern technology and skilled craftsmanship to deliver plumbing solutions that stand the test of time while remaining dedicated to the local communities we proudly serve.");

        // Default fallbacks for the 5 timeline paragraphs
        $default_timeline = array(
            1 => array(
                'title' => 'About Us',
                'text'  => "At FlowFix Plumbing, we are committed to delivering dependable plumbing solutions that homeowners and businesses can trust. We understand that plumbing issues can disrupt your daily life, whether it's a leaking tap, a burst pipe, or a complete hot water system failure. That's why our team responds quickly, works efficiently, and focuses on providing long-lasting solutions instead of temporary fixes. Every project is approached with professionalism, attention to detail, and a commitment to exceeding customer expectations."
            ),
            2 => array(
                'title' => 'Expert Team',
                'text'  => "Our team consists of fully licensed and highly skilled plumbers with extensive experience across residential, commercial, and emergency plumbing services. We continuously invest in modern equipment, advanced diagnostic technology, and ongoing industry training to ensure we can tackle even the most complex plumbing challenges. From blocked drains and leak detection to gas fitting and bathroom plumbing renovations, we deliver quality workmanship that meets the highest industry standards."
            ),
            3 => array(
                'title' => 'Honesty & Transparency',
                'text'  => "Honesty and transparency are at the heart of everything we do. Before any work begins, we provide clear explanations of the issue, discuss the available solutions, and offer upfront pricing with no hidden surprises. We believe every customer deserves to understand the work being carried out in their home or business, giving them confidence that they are making the right decision. Building trust through open communication has helped us establish long-lasting relationships with our clients."
            ),
            4 => array(
                'title' => 'Customer Satisfaction',
                'text'  => "Customer satisfaction is more than a goal—it's the foundation of our business. We treat every property with respect, arrive on time, maintain a clean workspace, and ensure every repair or installation is completed with precision. Our dedication to reliability has earned us the trust of countless homeowners, landlords, builders, and local businesses who continue to choose FlowFix Plumbing whenever they need expert plumbing services."
            ),
            5 => array(
                'title' => 'Local Commitment',
                'text'  => "As a proudly local plumbing company, we take pride in serving our community with integrity, professionalism, and genuine care. Whether we're responding to an emergency in the middle of the night or helping a family upgrade their plumbing system, we approach every job with the same level of commitment and attention to detail. At FlowFix Plumbing, our mission is simple: to provide exceptional plumbing services, outstanding customer care, and reliable solutions that keep homes and businesses running smoothly for years to come."
            )
        );

        // Fetch dynamic timeline paras from theme options
        $timeline_paras = array();
        for ($i = 1; $i <= 5; $i++) {
            $timeline_paras[] = array(
                'title' => get_option('ff_about_para_' . $i . '_title', $default_timeline[$i]['title']),
                'text'  => get_option('ff_about_para_' . $i . '_text', $default_timeline[$i]['text'])
            );
        }
        ?>

        <!-- Header -->
        <div class="about-header">
            <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
            <div class="title-underline"></div>
        </div>

        <!-- Two Column Grid -->
        <div class="about-grid">
            
            <!-- Left Column -->
            <div class="about-col col-left">
                <!-- Top Image -->
                <div class="about-img-box img-top-left">
                    <?php if($img_left) : ?>
                        <img src="<?php echo esc_url($img_left); ?>" alt="<?php echo esc_attr($heading); ?>">
                    <?php else : ?>
                        <div class="placeholder-blue"></div>
                    <?php endif; ?>
                </div>
                
                <!-- Bottom Text -->
                <div class="about-text-box border-left">
                    <h3><?php echo esc_html($left_title); ?></h3>
                    <p><?php echo wp_kses_post($left_text); ?></p>
                </div>
            </div>

            <!-- Right Column -->
            <div class="about-col col-right">
                
                <!-- Top Timeline & Scrollable Text -->
                <div class="timeline-wrapper">
                    <div class="timeline-nav">
                        <div class="timeline-line"></div>
                        <div class="timeline-dots">
                            <button class="dot active" data-index="0" aria-label="Go to paragraph 1"></button>
                            <button class="dot" data-index="1" aria-label="Go to paragraph 2"></button>
                            <button class="dot" data-index="2" aria-label="Go to paragraph 3"></button>
                            <button class="dot" data-index="3" aria-label="Go to paragraph 4"></button>
                            <button class="dot" data-index="4" aria-label="Go to paragraph 5"></button>
                        </div>
                    </div>
                    
                    <div class="about-text-box border-right scrollable-area" id="aboutScrollArea">
                        <?php foreach ($timeline_paras as $index => $para) : ?>
                            <div class="scroll-section" id="para-<?php echo $index; ?>">
                                <h3><?php echo esc_html($para['title']); ?></h3>
                                <p><?php echo wp_kses_post($para['text']); ?></p>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>

                <!-- Bottom Image -->
                <div class="about-img-box img-bot-right">                   
                    <?php if($img_right) : ?>
                        <img src="<?php echo esc_url($img_right); ?>" alt="Our Team">
                    <?php else : ?>
                        <div class="placeholder-blue"></div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<!--  Timeline JavaScript -->
<script>
 document.addEventListener('DOMContentLoaded', function() {
    const scrollArea = document.getElementById('aboutScrollArea');
    const sections = scrollArea.querySelectorAll('.scroll-section');
    const dots = document.querySelectorAll('.timeline-dots .dot');

    // Safety check: ensure elements exist before running script
    if (!scrollArea || sections.length === 0 || dots.length === 0) return;

    // 1. Smooth scroll to section when dot is clicked (UPDATED to use scrollIntoView)
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            sections[index].scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });
    });

    // 2. Update active dot accurately on scroll using Intersection Observer
    const observerOptions = {
        root: scrollArea, // Tell the observer to only watch inside the scrollable box
        rootMargin: '0px',
        threshold: 0.6 // The dot changes when 60% of the paragraph becomes visible
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // When a section enters the view
            if (entry.isIntersecting) {
                // Find which number paragraph this is (0 through 4)
                const index = Array.from(sections).indexOf(entry.target);
                
                // Clear all active states
                dots.forEach(dot => dot.classList.remove('active'));
                
                // Light up the correct dot
                if(dots[index]) {
                    dots[index].classList.add('active');
                }
            }
        });
    }, observerOptions);

    // Tell the observer to start watching every paragraph
    sections.forEach(section => observer.observe(section));
 });

 document.addEventListener('DOMContentLoaded', function() {
    const pills = document.querySelectorAll('.process-pill');
    
    pills.forEach(pill => {
      pill.addEventListener('click', function() {
        // 1. Remove active class from ALL pills
        pills.forEach(p => p.classList.remove('active'));
        
        // 2. Add active class to the ONE you just clicked
        this.classList.add('active');
      });
    });
  });
</script>

<!-- WHY CHOOSE US -->
<section class="home-why-choose">
    <div class="why-container">
        
        <?php
        // Fetch variables directly from our Native Theme Options!
        
        // Titles
        $title_1 = get_option('ff_why_title_1', 'WHY');
        $title_2 = get_option('ff_why_title_2', 'CHOOSE');
        $title_3 = get_option('ff_why_title_3', 'US');
        
        // Links & Contact Info
        $box_link = get_option('ff_why_box_link', site_url('/about')); 
        $phone    = get_option('ff_why_phone', '-2128388123');
        $email    = get_option('ff_why_email', 'example@email.com');
        $btn_text = get_option('ff_why_btn_text', 'Contact'); 
        $btn_link = get_option('ff_why_btn_link', site_url('/contact'));

        // Fetch Dynamic Images
        $images = array();
        for ($i = 1; $i <= 4; $i++) {
            $images[$i] = get_option('ff_why_image_' . $i, '');
        }
        ?>

        <div class="why-layout">
            <!-- Left Side: Title -->
            <div class="why-title-col">
                <div class="title-border"></div>
                <h2 class="why-heading">
                    <span class="line-white"><?php echo esc_html($title_1); ?></span>
                    <span class="line-white"><?php echo esc_html($title_2); ?></span>
                    <span class="line-cyan"><?php echo esc_html($title_3); ?></span>
                </h2>
            </div>

            <!-- Right Side: Image Grid & Bottom Info -->
            <div class="why-content-col">
                <!-- Image Grid -->
                <div class="why-grid">
                    <!-- Box 1: Top Wide -->
                    <a href="<?php echo esc_url($box_link); ?>" class="why-box box-wide">
                        <?php if($images[1]) : ?>
                            <img src="<?php echo esc_url($images[1]); ?>" alt="Why Choose Us">
                        <?php else : ?>
                            <div class="placeholder-light"></div>
                        <?php endif; ?>
                    </a>

                    <!-- Box 2: Bottom Left Square -->
                    <a href="<?php echo esc_url($box_link); ?>" class="why-box box-sq-1">
                        <?php if($images[2]) : ?>
                            <img src="<?php echo esc_url($images[2]); ?>" alt="Our Experience">
                        <?php else : ?>
                            <div class="placeholder-light"></div>
                        <?php endif; ?>
                    </a>

                    <!-- Box 3: Bottom Right Square -->
                    <a href="<?php echo esc_url($box_link); ?>" class="why-box box-sq-2">
                        <?php if($images[3]) : ?>
                            <img src="<?php echo esc_url($images[3]); ?>" alt="Our Quality">
                        <?php else : ?>
                            <div class="placeholder-light"></div>
                        <?php endif; ?>
                    </a>

                    <!-- Box 4: Right Tall -->
                    <a href="<?php echo esc_url($box_link); ?>" class="why-box box-tall">
                        <?php if($images[4]) : ?>
                            <img src="<?php echo esc_url($images[4]); ?>" alt="Our Team">
                        <?php else : ?>
                            <div class="placeholder-light"></div>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- Bottom Contact Info -->
                <div class="why-bottom-info">
                    <div class="info-links">
                        <span class="info-item">
                            <span class="arrow">→</span> <?php echo esc_html($phone); ?>
                        </span>
                        <span class="info-item">
                            <?php echo esc_html($email); ?>
                        </span>
                    </div>
                    <a href="<?php echo esc_url($btn_link); ?>" class="why-btn"><?php echo esc_html($btn_text); ?></a>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- PROCESS  -->
<section class="home-process" id="process">
    <div class="process-container">
        
        <?php
        // Fetch variables directly from our Native Theme Options!
        $heading = get_option('ff_process_heading', 'OUR PROCESS');
        
        // Default Fallback Data for 5 steps (Added Image URLs)
        $default_steps = array(
            1 => array(
                'title' => '1. Get in Touch',
                'desc'  => "Contact our team by phone or through our online booking form. Tell us about your plumbing issue, and we'll schedule a convenient appointment or dispatch an emergency plumber immediately if urgent assistance is required.",
                'img'   => get_template_directory_uri() . '/assests/images/process-1.jpg'
            ),
            2 => array(
                'title' => '2. On-Site Inspection',
                'desc'  => "One of our licensed plumbers arrives on time to thoroughly inspect the problem. Using modern tools and years of expertise, we identify the root cause and recommend the most effective solution.",
                'img'   => get_template_directory_uri() . '/assests/images/process-2.jpg'
            ),
            3 => array(
                'title' => '3. Transparent Quote',
                'desc'  => "Before any work begins, we provide a clear, upfront quote with no hidden fees. We'll explain the scope of work, expected timeline, and answer any questions so you know exactly what to expect.",
                'img'   => get_template_directory_uri() . '/assests/images/process-3.jpg'
            ),
            4 => array(
                'title' => '4. Professional Repair or Installation',
                'desc'  => "Once approved, our experienced team completes the job using high-quality materials and industry-leading techniques. We work efficiently while maintaining a clean and safe workspace, ensuring minimal disruption to your home or business.",
                'img'   => get_template_directory_uri() . '/assests/images/process-4.jpg'
            ),
            5 => array(
                'title' => '5. Final Quality Check',
                'desc'  => "After the work is completed, we thoroughly test every repair or installation to ensure everything is functioning perfectly. We clean up the work area, walk you through the completed job, and provide maintenance advice so your plumbing continues to perform reliably for years to come.",
                'img'   => get_template_directory_uri() . '/assests/images/process-5.jpg'
            )
        );

        // Fetch dynamic step data from theme options
        $steps = array();
        for ($i = 1; $i <= 5; $i++) {
            $steps[$i] = array(
                'title' => get_option('ff_process_step_' . $i . '_title', $default_steps[$i]['title']),
                'desc'  => get_option('ff_process_step_' . $i . '_desc', $default_steps[$i]['desc']),
                'img'   => get_option('ff_process_step_' . $i . '_img', $default_steps[$i]['img'])
            );
        }
        ?>

        <div class="process-header">
            <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
            <div class="title-underline"></div>
        </div>

        <div class="process-interactive-area">
            
            <svg class="process-svg" viewBox="0 0 400 800" preserveAspectRatio="none">
                <path id="process-path" 
                      d="M 200 0 
                         C 330 20, 330 80, 330 80 
                         C 330 160, 70 160, 70 240 
                         C 70 320, 330 320, 330 400 
                         C 330 480, 70 480, 70 560 
                         C 70 640, 330 640, 330 720 
                         C 330 780, 200 800, 200 800" 
                      fill="none" stroke="rgba(255,255,255,0.4)" stroke-width="2" />
                
                <circle id="process-dot" cx="330" cy="80" r="10" fill="#ffffff" />
            </svg>

            <div class="process-steps-wrapper">
                
                <!-- STEP 1 (Left Pill, Text on Right) -->
                <div class="process-pill pill-right step-1 active" data-svg-y="80">
                    <img src="<?php echo esc_url($steps[1]['img']); ?>" class="pill-bg-image" alt="">
                    <span class="pill-text"><?php echo esc_html($steps[1]['title']); ?></span>
                    <div class="pill-circle"></div>
                    <p class="process-desc desc-right"><?php echo wp_kses_post($steps[1]['desc']); ?></p>
                </div>

                <!-- STEP 2 (Right Pill, Text on Left) -->
                <div class="process-pill pill-left step-2" data-svg-y="240">
                    <img src="<?php echo esc_url($steps[2]['img']); ?>" class="pill-bg-image" alt="">
                    <p class="process-desc desc-left"><?php echo wp_kses_post($steps[2]['desc']); ?></p>
                    <div class="pill-circle"></div>
                    <span class="pill-text"><?php echo esc_html($steps[2]['title']); ?></span>
                </div>

                <!-- STEP 3 (Left Pill, Text on Right) -->
                <div class="process-pill pill-right step-3" data-svg-y="400">
                    <img src="<?php echo esc_url($steps[3]['img']); ?>" class="pill-bg-image" alt="">
                    <span class="pill-text"><?php echo esc_html($steps[3]['title']); ?></span>
                    <div class="pill-circle"></div>
                    <p class="process-desc desc-right"><?php echo wp_kses_post($steps[3]['desc']); ?></p>
                </div>

                <!-- STEP 4 (Right Pill, Text on Left) -->
                <div class="process-pill pill-left step-4" data-svg-y="560">
                    <img src="<?php echo esc_url($steps[4]['img']); ?>" class="pill-bg-image" alt="">
                    <p class="process-desc desc-left"><?php echo wp_kses_post($steps[4]['desc']); ?></p>
                    <div class="pill-circle"></div>
                    <span class="pill-text"><?php echo esc_html($steps[4]['title']); ?></span>
                </div>

                <!-- STEP 5 (Left Pill, Text on Right) -->
                <div class="process-pill pill-right step-5" data-svg-y="720">
                    <img src="<?php echo esc_url($steps[5]['img']); ?>" class="pill-bg-image" alt="">
                    <span class="pill-text"><?php echo esc_html($steps[5]['title']); ?></span>
                    <div class="pill-circle"></div>
                    <p class="process-desc desc-right"><?php echo wp_kses_post($steps[5]['desc']); ?></p>
                </div>

            </div>
        </div>

    </div>
</section>

<script>
 document.addEventListener('DOMContentLoaded', () => {
    const path = document.getElementById('process-path');
    const dot = document.getElementById('process-dot');
    const pills = document.querySelectorAll('.process-pill');
    
    if(!path || !dot) return;

    const totalLength = path.getTotalLength();
    let currentDistance = 0;
    let animationFrameId = null;

    // Initialize dot position at first step
    setDotToDistance(findDistanceForY(80));

    pills.forEach(pill => {
        pill.addEventListener('click', () => {
            // Remove active class from all, add to clicked
            pills.forEach(p => p.classList.remove('active'));
            pill.classList.add('active');

            // Get target Y coordinate defined in data attribute
            const targetY = parseFloat(pill.getAttribute('data-svg-y'));
            
            // Find length along SVG path that matches this Y coordinate
            const targetDistance = findDistanceForY(targetY);
            
            // Animate the dot
            animateDotTo(targetDistance);
        });
    });

    // Binary search to find SVG path length for a given Y coordinate
    function findDistanceForY(targetY) {
        let start = 0;
        let end = totalLength;
        let distance = 0;
        
        for (let i = 0; i < 30; i++) {
            let mid = (start + end) / 2;
            let pt = path.getPointAtLength(mid);
            if (pt.y < targetY) {
                start = mid;
            } else {
                end = mid;
            }
            distance = mid;
        }
        return distance;
    }

    function setDotToDistance(distance) {
        currentDistance = distance;
        let pt = path.getPointAtLength(distance);
        dot.setAttribute('cx', pt.x);
        dot.setAttribute('cy', pt.y);
    }

    // Smooth physics animation
    function animateDotTo(targetLength) {
        if (animationFrameId) cancelAnimationFrame(animationFrameId);
        
        const easeOut = t => t * (2 - t);
        let startLength = currentDistance;
        let diff = targetLength - startLength;
        let startTime = performance.now();
        let duration = 600; // ms to travel
        
        function step(currentTime) {
            let elapsed = currentTime - startTime;
            let progress = Math.min(elapsed / duration, 1);
            let easeProgress = easeOut(progress);
            
            let dist = startLength + (diff * easeProgress);
            setDotToDistance(dist);
            
            if (progress < 1) {
                animationFrameId = requestAnimationFrame(step);
            }
        }
        animationFrameId = requestAnimationFrame(step);
    }
  });
</script>

<!-- FEATURED PROJECTS  -->
<section class="home-projects">
    <div class="projects-container">
        <?php
        // Fetch variables directly from our Native Theme Options!

        $title_line_1 = get_option('ff_projects_title_1', 'FEATURED');
        $title_line_2 = get_option('ff_projects_title_2', 'PROJECTS');
        
        // Fetch Dynamic Images
        $images = array();
        for ($i = 1; $i <= 3; $i++) {
            $images[$i] = get_option('ff_project_image_' . $i, '');
        }
        ?>

        <div class="projects-header">
            <h2 class="projects-heading">
                <span class="block-text"><?php echo esc_html($title_line_1); ?></span>
                <span class="block-text"><?php echo esc_html($title_line_2); ?></span>
            </h2>
        </div>
    </div>

    <div class="projects-parallax-wrapper">
        
        <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div class="parallax-band" style="
                <?php if($images[$i]) : ?>
                    background-image: url('<?php echo esc_url($images[$i]); ?>');
                <?php else : ?>
                    background-color: #1a4b8c; /* Fallback color if no image */
                <?php endif; ?>
            "></div>
            
            <?php if ($i < 3) : ?>
                <div class="parallax-gap"></div>
            <?php endif; ?>
            
        <?php endfor; ?>

    </div>
</section>

<!-- TESTIMONIALS  -->
<section class="home-testimonials">
    <div class="testimonials-container">
        
        <?php
        // Fetch variables directly from our Native Theme Options!
        
        // Header
        $heading    = get_option('ff_testi_heading', 'TESTIMONIALS');
        $subheading = get_option('ff_testi_subheading', 'WHAT OUR CLIENT SAYS ABOUT US');
        
        // CTA Box
        $cta_title    = get_option('ff_testi_cta_title', 'Book A Quotation');
        $cta_sub      = get_option('ff_testi_cta_sub', 'Lets Get your Started');
        $cta_btn_text = get_option('ff_testi_cta_btn_text', 'BOOK NOW');
        $cta_btn_link = get_option('ff_testi_cta_btn_link', site_url('/contact'));

        // 6 Real Testimonial Fallbacks
        $default_testimonials = array(
            1 => array(
                'text' => '"FlowFix Plumbing responded within an hour when our kitchen pipe burst. The plumber explained everything clearly, completed the repair quickly, and left the area spotless. The entire experience was professional from start to finish. I wouldn\'t hesitate to recommend them to anyone in Sydney."',
                'name' => 'Sarah Mitchell'
            ),
            2 => array(
                'text' => '"We\'ve used FlowFix Plumbing several times for both emergency repairs and routine maintenance. Their team is always punctual, friendly, and transparent with pricing. It\'s refreshing to work with a company that genuinely cares about customer satisfaction."',
                'name' => 'James Robertson'
            ),
            3 => array(
                'text' => '"Our hot water system failed unexpectedly, and FlowFix had a technician at our home the very same day. They replaced the system efficiently and even took the time to explain how to maintain it properly. Outstanding service and excellent workmanship."',
                'name' => 'Emily Carter'
            ),
            4 => array(
                'text' => '"I contacted FlowFix Plumbing after struggling with recurring blocked drains. They quickly identified the underlying issue using modern equipment and permanently solved the problem. The quality of their work exceeded my expectations, and their pricing was fair and honest."',
                'name' => 'Michael Thompson'
            ),
            5 => array(
                'text' => '"From the first phone call to the final inspection, the entire process was seamless. The team arrived exactly when they said they would, completed our bathroom plumbing installation flawlessly, and made sure everything was working perfectly before leaving. Highly professional and incredibly reliable."',
                'name' => 'Olivia Harris'
            ),
            6 => array(
                'text' => '"FlowFix Plumbing handled the plumbing for our office renovation, and the experience was exceptional. Their communication was excellent throughout the project, deadlines were met without delays, and the workmanship was first-class. We\'ll definitely continue using them for all our commercial plumbing needs."',
                'name' => 'Daniel Walker'
            )
        );

        // Fetch Dynamic Testimonial Data
        $testimonials = array();
        for ($i = 1; $i <= 6; $i++) {
            $testimonials[$i] = array(
                'text' => get_option('ff_testi_' . $i . '_text', $default_testimonials[$i]['text']),
                'name' => get_option('ff_testi_' . $i . '_name', $default_testimonials[$i]['name']),
                'img'  => get_option('ff_testi_' . $i . '_img', '')
            );
        }
        ?>

        <div class="testi-header">
            <h2 class="testi-heading"><?php echo esc_html($heading); ?></h2>
            <p class="testi-subheading"><?php echo esc_html($subheading); ?></p>
        </div>

        <div class="testi-grid">
            <?php foreach ($testimonials as $testi) : ?>
                <div class="testi-card">
                    <div class="testi-content">
                        <!-- Added the 5 stars here so they appear consistently -->
                        <div class="testi-stars" style="color: #ffc107; font-size: 1.2rem; margin-bottom: 10px;">⭐⭐⭐⭐⭐</div>
                        <p><?php echo esc_html($testi['text']); ?></p>
                    </div>
                    <div class="testi-profile">
                        <div class="profile-pic">
                            <?php if($testi['img']) : ?>
                                <img src="<?php echo esc_url($testi['img']); ?>" alt="<?php echo esc_attr($testi['name']); ?>">
                            <?php endif; ?>
                        </div>
                        <span class="profile-name"><?php echo esc_html($testi['name']); ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="testi-cta-box">
            <div class="cta-text">
                <h3><?php echo esc_html($cta_title); ?></h3>
                <p><?php echo esc_html($cta_sub); ?></p>
            </div>
            <div class="cta-action">
                <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn-gray"><?php echo esc_html($cta_btn_text); ?></a>
            </div>
        </div>

    </div>
</section>


<style>
/* --- HERO Section General --- */
.home-hero {
  position: relative;
  width: 100%;
  min-height: 80vh; 
  display: flex;
  align-items: center;
  overflow: hidden;
  color: #ffffff;
  font-family: sans-serif; 
}

.hero-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  z-index: 1;
}

.hero-content-wrapper {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: 1400px; 
  margin: 0 auto;
  padding: 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 40px;
  /* Kept your desktop offset */
  margin-left: 240px; 
}

/* --- Left Side Content --- */
.hero-text-content {
  flex: 1;
  min-width: 300px;
  max-width: 600px;
  text-align: left; 
}

.hero-title {
  font-size: 4rem; 
  font-weight: 700;
  margin: 0 0 10px 0;
  line-height: 1.1;
}

.hero-subtitle {
  font-size: 1.2rem;
  margin-bottom: 2rem;
  font-weight: 600;
}

.text-blue {
  color: #2b7af0; 
}

.hero-btn {
  display: inline-block;
  padding: 12px 35px;
  color: #fff;
  text-decoration: none;
  font-size: 1.1rem;
  font-weight: 500;
  border-radius: 50px; 
  background: rgba(255, 255, 255, 0.15);
  backdrop-filter: blur(10px);
  -webkit-backdrop-filter: blur(10px);
  border: 1px solid rgba(255, 255, 255, 0.3);
  transition: background 0.3s ease;
}

.hero-btn:hover {
  background: rgba(255, 255, 255, 0.25);
}

/* --- Right Side Cards --- */
.hero-trust-cards {
  display: flex;
  gap: 20px; /* Tighter gap for smaller cards */
  position: relative;
  margin-right: -100px; 
}

.trust-card {
  /* 1. Decreased Opacity & Glass Effect */
  background: rgba(225, 225, 225, 0.15); 
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255, 255, 255, 0.3); /* Subtle glass edge */
  
  /* 2. Smaller Size */
  width: 170px; 
  height: 270px; 
  
  border-radius: 20px;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: flex-end; 
  padding: 20px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
  overflow: hidden; /* Crucial: Keeps the reflection inside the card */
}

/* 3. The Reflective Glass Animation */
.trust-card::before {
  content: '';
  position: absolute;
  top: 0;
  left: -150%;
  width: 50%;
  height: 100%;
  background: linear-gradient(
    to right, 
    rgba(255, 255, 255, 0) 0%, 
    rgba(255, 255, 255, 0.4) 50%, 
    rgba(255, 255, 255, 0) 100%
  );
  transform: skewX(-25deg); /* Angles the reflection */
  animation: glass-shine 5s infinite; /* Sweeps across every 5 seconds */
  z-index: 1; 
  pointer-events: none; /* Prevents the glare from blocking clicks */
}


@keyframes glass-shine {
  0% { left: -150%; }
  20% { left: 150%; }
  100% { left: 150%; } /* The gap between 20% and 100% creates a pause between shines */
}

/* Staggering the smaller cards */
.card-1 { margin-top: 0; }
.card-2 { margin-top: 60px; } /* Adjusted for new size */
.card-3 { margin-top: 120px; } /* Adjusted for new size */

/* The SVG Badge (Replaces the Yellow Circle) */
.card-icon-placeholder {
  position: absolute;
  top: 15px;
  right: 15px;
  
  /* Increased size to make the badge bigger */
  width: 200px; 
  height: 200px; 
  
  background-image: url('../images/badge.svg');
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  
  z-index: 2;
}

.card-line {
  width: 100%;
  height: 2px;
  /* Changed to white so it pops on the transparent glass */
  background-color: rgba(255, 255, 255, 0.8); 
  margin-bottom: 15px;
  z-index: 2;
  position: relative;
}

.card-text {
  font-weight: 700;
  /* Changed to white with a soft shadow for readability */
  color: #0c0101; 
  text-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  z-index: 2;
  position: relative;
  font-size: 0.95rem; /* Scaled text down to fit */
}

/* Staggering the cards */
.card-1 { margin-top: 0; }
.card-2 { margin-top: 90px; }
.card-3 { margin-top: 180px; }

/* The SVG Badge (Replaces the Yellow Circle) */
.card-icon-placeholder {
  position: absolute;
  top: 15px; /* Keeps it near the top */
  
  /* The magic trick to perfectly center an absolute element horizontally */
  left: 50%;
  transform: translateX(-50%);

  /* Increased size to make the badge bigger */
  width: 200px; 
  height: 200px; 
  background-size: contain;
  background-position: center;
  background-repeat: no-repeat;
  
  z-index: 2;
}

/* The Horizontal Line */
.card-line {
  width: 100%;
  height: 2px;
  background-color: #333; 
  margin-bottom: 20px;
}

.card-text {
  font-weight: 700;
  color: #333;
}

/* =========================================
   RESPONSIVE LAYOUT STACK
   ========================================= */

/* Smaller Laptops (Max 1200px) */
@media (max-width: 1200px) {
  .hero-content-wrapper {
    margin-left: auto; /* Resets the massive 240px margin */
    padding: 2rem 5%;
  }
  .hero-trust-cards {
    margin-right: 0; /* Resets the negative 100px margin */
    gap: 20px;
  }
  .trust-card {
    width: 200px; /* Scales cards down slightly to fit */
    height: 340px;
  }
}

/* Tablets (Max 1024px) */
@media (max-width: 1024px) {
  .hero-content-wrapper {
    justify-content: center;
    text-align: center;
    padding: 6rem 2rem; /* Add generous top/bottom padding */
  }

  .hero-text-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto; /* Perfectly centers the text block */
  }

  .hero-title {
    font-size: 3.5rem;
  }
  
  .hero-subtitle {
    margin-bottom: 2.5rem;
  }

  /* THIS IS THE MAGIC BULLET: Hides the ugly stacked cards completely on tablets and smaller */
  .hero-trust-cards {
    display: none; 
  }
}

/* Mobile (Max 768px) */
@media (max-width: 768px) {
  .hero-title {
    font-size: 2.8rem;
  }
  
  .hero-subtitle {
    font-size: 1.1rem;
  }
}

/* Small Phones (Max 480px) */
@media (max-width: 480px) {
  .hero-title {
    font-size: 2.2rem;
  }
}

/* --- GLOBAL FIX FOR RESPONSIVE LAYOUTS --- */
*, *::before, *::after {
  box-sizing: border-box;
}


/* --- SERVICES Section General --- */
.home-services {
  background: linear-gradient(135deg, #0b1a2f 0%, #061224 100%);
  color: #ffffff;
  padding: 5rem 0; 
  font-family: sans-serif;
}

.services-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

/* --- Header --- */
.services-header {
  margin-bottom: 3rem;
}

.section-title {
  font-size: 3.5rem;
  font-weight: 800;
  margin: 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.title-underline {
  width: 150px;
  height: 5px;
  background-color: #00b4d8; 
  margin-top: 15px;
  border-radius: 5px;
}

/* --- Service Cards --- */
.service-card {
  position: relative;
  background-color: #d9d9d9; 
  border-radius: 16px; 
  overflow: hidden; 
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.card-img-wrapper {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: 16px;
  overflow: hidden;
}

.card-img-wrapper img,
.placeholder-bg {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.service-card:hover .card-img-wrapper img,
.service-card:hover .placeholder-bg {
  transform: scale(2);
}

.placeholder-bg {
  background-color: #8c9bb0; 
}

.view-all-link {
  position: absolute;
  top: 20px;
  right: 25px;
  color: #00b4d8;
  font-size: 0.9rem;
  font-weight: 700;
  text-decoration: none;
  z-index: 2;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.card-label {
  position: absolute;
  bottom: 20px;
  left: 20px;
  margin: 0;
  z-index: 2;
  background: rgba(11, 26, 47, 0.7); 
  backdrop-filter: blur(8px);
  -webkit-backdrop-filter: blur(8px);
  padding: 8px 18px;
  border-radius: 8px;
  font-size: 1.1rem;
  font-weight: 600;
  pointer-events: none;
}

/* --- Top Grid Layout --- */
.services-top-grid {
  display: flex;
  gap: 30px; 
  margin-bottom: 4rem;
  height: 320px;
}

.card-top-wide { flex: 2.5; }
.card-top-square { flex: 1; }

/* --- Middle Stats Banner --- */
.stats-banner-wrapper {
  display: flex;
  width: 100%;
  background-color: transparent; 
  margin-bottom: 4rem;
  position: relative;
}

.stats-left-gray {
  width: 10%; 
  opacity: 0;
  background-color:  #0b1a2f;
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
}

.stats-main-cyan {
  width: 90%;
  background: linear-gradient(90deg, #00b4d8 0%, #0096b4 100%); 
  border-top-left-radius: 50px;
  border-bottom-left-radius: 50px;
  display: flex;
  align-items: center;
  justify-content: space-around;
  padding: 2.5rem 3rem;
  box-shadow: 0 10px 30px rgba(0, 180, 216, 0.2);
}

.stat-block {
  display: flex;
  flex-direction: column;
  text-align: center;
}

.stat-num {
  font-size: 2.5rem;
  font-weight: 800;
  color: #fff;
  line-height: 1;
  margin-bottom: 5px;
}

.stat-text {
  font-size: 0.9rem;
  color: #e0f7fa;
  text-transform: uppercase;
  letter-spacing: 1px;
  font-weight: 600;
}

.stat-tagline {
  font-size: 1.6rem;
  font-weight: 800;
  color: #0b1a2f; 
  max-width: 250px;
  line-height: 1.2;
}

/* --- Bottom Grid Layout --- */
.services-bottom-grid {
  display: flex;
  gap: 30px;
  align-items: stretch; 
}

.bottom-left-col {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between; 
}

.bottom-right-col {
  flex: 2.5;
  display: flex;
  gap: 30px;
}

/* --- Emergency CTA --- */
.emergency-cta { margin-top: 0; }

.emergency-cta .cta-line {
  width: 100%;
  max-width: 250px; 
  height: 2px;
  background-color: #ffffff;
  margin-top: 0; 
  margin-bottom: 20px;
}

.emergency-cta h4 {
  font-size: 1.1rem;
  margin: 0 0 10px 0;
  font-weight: 400; 
  text-transform: uppercase;
  color: #ffffff;
}

.emergency-cta h3 {
  font-size: 1.8rem;
  margin: 0 0 25px 0;
  line-height: 1.3;
  font-weight: 400; 
}

.btn-blue {
  display: inline-block;
  background-color: #2196f3;
  color: #fff;
  padding: 12px 30px;
  border-radius: 50px;
  text-decoration: none;
  font-weight: 700;
  font-size: 1rem;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.btn-blue:hover { background-color: #1976d2; }

.card-bot-small {
  height: 220px;
  width: 100%; 
}

.card-bot-tall {
  flex: 1;
  height: 400px;
}

/* ========================================= */
/* --- RESPONSIVE ADJUSTMENTS (Media Queries) */
/* ========================================= */

/* TABLET */
@media (max-width: 1024px) {
  .stats-main-cyan {
    padding: 2rem;
    border-radius: 30px;
    width: 100%;
  }
  .stats-left-gray { display: none; }
  
  .stat-tagline { font-size: 1.3rem; }
  
  .services-bottom-grid { gap: 20px; }
  .bottom-right-col { gap: 20px; }
}

/* MOBILE */
@media (max-width: 768px) {
  .home-services { padding: 3rem 0; }
  .section-title { font-size: 2.5rem; }
  
  .services-top-grid {
    flex-direction: column;
    height: auto;
  }

  .services-bottom-grid {
    flex-direction: column-reverse; /* Puts CTA at the bottom */
    height: auto;
  }

  .bottom-right-col {
    flex-direction: column;
  }

  .card-top-wide,
  .card-top-square,
  .card-bot-small,
  .card-bot-tall {
    width: 100%;
    height: 250px; /* Shorter for mobile to prevent infinite scrolling */
  }

  .stats-main-cyan {
    flex-direction: column;
    gap: 30px;
    text-align: center;
    border-radius: 20px;
  }
  
  .stat-tagline {
    max-width: 100%;
    font-size: 1.5rem;
  }
  
  .emergency-cta {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 2rem;
  }

  .bottom-left-col {
    gap: 20px;
  }
}

/* --- About Us Section --- */
.home-about {
  background-color: #f4f5f7; 
  padding: 8rem 0; 
  color: #0b1a2f; 
  font-family: sans-serif;
  overflow: hidden; 
}

.about-container {
  margin-left: 8%; 
  margin-right: auto; 
  padding: 0 8%; 
  max-width: 1600px;
}

.about-header {
  margin-bottom: 5rem; 
  padding: 0;
}

.about-header h2 {
  font-size: 3.5rem;
  font-weight: 800;
  margin: 0;
  text-transform: uppercase;
  color: #0b1a2f;
  letter-spacing: -1px; 
  line-height: 1.1;
}

.title-underline {
  width: 120px;
  height: 5px;
  background-color: #00b4d8; 
  margin-top: 20px;
  border-radius: 5px;
}

/* --- Layout Grid (UPDATED to CSS Grid) --- */
.about-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  column-gap: 80px;
  row-gap: 60px;
  align-items: start;
}

.about-col {
  display: contents; /* Unwraps flex columns so children snap to the grid */
}

/* --- Image Boxes --- */
.about-img-box {
  position: relative;
  border-radius: 16px; 
  width: 100%; 
  overflow: hidden;
  box-shadow: 0 20px 40px rgba(11, 26, 47, 0.08);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.about-img-box img {
  width: 100%;
  height: 100%;
  object-fit: cover; 
  display: block;
}

/* Map Grid Items to their Correct Positions */
.img-top-left {
  grid-column: 1;
  grid-row: 1;
  height: 440px; 
}

.timeline-wrapper {
  grid-column: 2;
  grid-row: 1;
  width: 100%;
}

.about-img-box.img-bot-right {
  grid-column: 2;
  grid-row: 2;
  height: 100%; /* Dynamically stretches to match left text height */
  align-self: stretch; 
  width: 100%; 
  right: 0;
  margin-top: 0;
}

.placeholder-blue {
  background-color: #0b1a2f;
  width: 100%;
  height: 100%;
  border-radius: 16px;
}

.img-bot-right img,
.img-bot-right .placeholder-blue {
  width: 100%;
  height: 100%;
  object-fit: cover;
  position: relative;
  z-index: 2;
  border-radius: 16px;
}

/* --- Text Boxes --- */
.about-text-box {
  position: relative;
  padding: 1rem 0;
  width: 100%;
}

.about-text-box h3 {
  font-size: 2.5rem;
  margin-top: 0;
  margin-bottom: 1.2rem;
  color: #0b1a2f;
  font-weight: 800;
  letter-spacing: -0.5px;
}

.about-text-box p {
  font-size: 1.15rem;
  line-height: 1.8;
  color: #4a5568; 
}

/* Vertical Borders */
.border-left {
  grid-column: 1;
  grid-row: 2;
  border-left: 4px solid #0b1a2f; 
  padding-left: 40px; 
  margin-top: 0; 
}

.border-right {
  border-right: none; 
  padding-right: 40px;
  text-align: left; 
  margin-bottom: 50px; 
}

/* --- Timeline Nav & Scroll Area (UPDATED Width) --- */
.timeline-nav {
  position: relative;
  margin-bottom: 40px;
  padding: 15px 0;
  width: 100%; 
  margin-left: 0; 
  margin-right: auto; 
}

.timeline-line {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  width: 100%;
  height: 3px; 
  background-color: #cbd5e1; 
  z-index: 1;
}

.timeline-dots {
  position: relative;
  z-index: 2;
  display: flex;
  justify-content: space-between;
}

.timeline-dots .dot {
  width: 18px; 
  height: 18px;
  border-radius: 50%;
  background-color: #0b1a2f;
  border: 4px solid #f4f5f7; 
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
  padding: 0;
}

.timeline-dots .dot:hover {
  background-color: #00b4d8;
  transform: scale(1.2);
}

.timeline-dots .dot.active {
  background-color: #00b4d8; 
  border-color: #00b4d8;
  transform: scale(1.4);
  box-shadow: 0 0 15px rgba(0, 180, 216, 0.4); 
}

/* Scrollable Container */
.scrollable-area {
  height: 350px; 
  width: 100%; 
  margin-right: auto; 
  margin-left: 0;   
  overflow-y: auto;
  position: relative;
  padding-right: 20px; 
  scrollbar-width: thin;
  scrollbar-color: #00b4d8 #e2e8f0;
}

/* Custom Scrollbar */
.scrollable-area::-webkit-scrollbar {
  width: 6px;
}
.scrollable-area::-webkit-scrollbar-track {
  background: #e2e8f0;
  border-radius: 10px;
}
.scrollable-area::-webkit-scrollbar-thumb {
  background-color: #00b4d8;
  border-radius: 10px;
}

.scroll-section {
  font-size: 1rem; 
  margin-bottom: 2.5rem;
}

/* --- Responsive Layout Stack --- */

/* Tablet Optimization */
@media (max-width: 1200px) {
  .about-container {
    padding: 0 5%;
    margin-left: 5%;
  }
  .about-grid {
    column-gap: 40px;
  }
}

/* Mobile & Small Tablet Snap (UPDATED to reset Grid) */
@media (max-width: 992px) {
  .home-about {
    padding: 5rem 0;
  }
  
  .about-container {
    margin-left: auto; 
    margin-right: auto;
    padding: 0 2rem;
  }

  .about-header {
    text-align: center;
  }

  .title-underline {
    margin-left: auto;
    margin-right: auto;
  }

  .about-grid {
    display: flex;
    flex-direction: column;
    gap: 60px;
  }

  .about-col {
    display: flex; /* Reverts 'contents' so they stack naturally */
    flex-direction: column;
    gap: 40px;
  }

  /* Reset manual heights for mobile */
  .img-top-left,
  .about-img-box.img-bot-right {
    height: 400px;
    width: 100%; 
    right: 0;
  }

  .border-right {
    border-right: none;
    border-left: 4px solid #00b4d8; 
    padding-right: 0;
    padding-left: 30px;
    text-align: left; 
  }

  .border-left {
    border-left-color: #00b4d8;
    padding-left: 30px;
  }
}

/* Small Phones */
@media (max-width: 576px) {
  .about-header h2 {
    font-size: 2.8rem;
  }
  .about-text-box h3 {
    font-size: 2rem;
  }
  .img-top-left,
  .about-img-box.img-bot-right {
    height: 300px; 
  }
}

/* --- GLOBAL RESPONSIVE FIX --- */
*, *::before, *::after {
  box-sizing: border-box;
}

/* --- Why Choose Us Section --- */
.home-why-choose {
  background: linear-gradient(135deg, #0b1a2f 40%, #1a4b8c 100%); 
  color: #ffffff;
  padding: 6rem 0;
  font-family: sans-serif;
}

.why-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

.why-layout {
  display: flex;
  gap: 50px;
  align-items: center;
}

/* --- Left Side: Title --- */
.why-title-col {
  flex: 0 0 35%;
  display: flex;
  gap: 20px;
  justify-content: flex-end; 
}

.title-border {
  width: 4px;
  background-color: #00b4d8; 
  border-radius: 2px;
}

.why-heading {
  margin: 0;
  font-size: 4.5rem;
  font-weight: 700;
  line-height: 1.1;
  text-align: right;
  display: flex;
  flex-direction: column;
}

.line-white { color: #ffffff; }
.line-cyan { color: #00b4d8; }

/* --- Right Side: Content & Grid --- */
.why-content-col {
  flex: 1;
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.why-grid {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  grid-template-rows: 150px 150px;
  gap: 20px;
}

/* Image Boxes - Links */
.why-box {
  display: block;
  position: relative;
  border-radius: 12px;
  overflow: hidden; 
  background-color: #d9d9d9;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Positioning based on CSS Grid */
.box-wide { grid-column: 1 / 3; grid-row: 1 / 2; }
.box-sq-1 { grid-column: 1 / 2; grid-row: 2 / 3; }
.box-sq-2 { grid-column: 2 / 3; grid-row: 2 / 3; }
.box-tall { grid-column: 3 / 4; grid-row: 1 / 3; }

/* Image styling and Zoom Hover Effect */
.why-box img,
.placeholder-light {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.6s ease;
  display: block;
}

.placeholder-light {
  background-color: #d9d9d9;
}

/* The Hover Trigger */
.why-box:hover img,
.why-box:hover .placeholder-light {
  transform: scale(1.15); 
}

/* --- Bottom Contact Info --- */
.why-bottom-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top: 10px;
}

/* Phone and Email Links */
.info-links {
  display: flex;
  gap: 40px;
  font-size: 1.1rem;
  font-weight: 700;
  color: #ffffff; /* FIXED: Changed from dark blue to white for contrast */
}

.info-item {
  display: flex;
  align-items: center;
  gap: 10px;
}

.info-item .arrow {
  color: #00b4d8; 
  font-size: 1.2rem;
}

.why-btn {
  background-color: #0b1a2f; 
  color: #ffffff;
  padding: 15px 45px;
  border-radius: 50px; 
  text-decoration: none;
  font-size: 1rem;
  font-weight: 700;
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); 
}

.why-btn:hover {
  background-color: #00b4d8; 
  transform: translateY(-3px); 
  box-shadow: 0 15px 25px rgba(0, 180, 216, 0.3);
}
/* --- Responsive Adjustments --- */
@media (max-width: 992px) {
  .why-layout {
    flex-direction: column;
    /* This forces the children to stretch full width instead of shrinking to the center */
    align-items: stretch; 
  }

  .why-title-col {
    justify-content: flex-end;
    width: 100%;
  }

  .why-heading {
    text-align: right;
    font-size: 3.8rem;
  }

  .why-content-col {
    width: 100%; /* Forces the grid container to expand */
    margin-top: 20px;
  }

  .why-grid {
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto auto;
    width: 100%; /* Ensures grid takes up the new wide space */
  }

  /* Increased heights so they look proportional when widened */
  .box-wide {
    grid-column: 1 / 3;
    grid-row: 1 / 2;
    height: 220px; 
  }

  .box-sq-1 {
    grid-column: 1 / 2;
    grid-row: 2 / 3;
    height: 200px;
  }

  .box-sq-2 {
    grid-column: 2 / 3;
    grid-row: 2 / 3;
    height: 200px;
  }

  .box-tall {
    grid-column: 1 / 3;
    grid-row: 3 / 4;
    height: 280px; 
  }

  .why-bottom-info {
    flex-direction: column;
    gap: 20px;
    align-items: flex-end; /* Aligns the button to the right to match the text */
    margin-top: 20px;
  }
}

/* --- Responsive for Mobile (Small Phones) --- */
@media (max-width: 768px) {
  .why-heading {
    font-size: 3rem;
  }

  .why-bottom-info {
    align-items: center;
    gap: 30px;
    text-align: center;
  }
  
  .info-links {
    flex-direction: column;
    gap: 15px;
  }
  
  .why-btn {
    width: 100%; /* Makes button full width on phones */
  }

  /* Shrink box heights slightly for very small screens so they don't take up the whole viewport */
  .box-wide { height: 180px; }
  .box-sq-1, .box-sq-2 { height: 160px; }
  .box-tall { height: 220px; }
}


/* ======================================================
   OUR PROCESS SECTION - EXACT REFERENCE MATCH
   ====================================================== */

/* --- Main Section Background --- */
.home-process {
  background: linear-gradient(180deg, #c7d5e4 0%, #46678c 32%, #0e2439 65%, #030a13 100%);
  padding: 5rem 0 6rem 0;
  font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  color: #ffffff;
  min-height: 195vh;
  box-sizing: border-box;
  overflow:visible;
}

.process-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

/* --- Section Header --- */
.process-header {
  margin-bottom: 8rem;
  left: 100%;
}

.process-header .section-title {
  color: #0b213a;
  font-size: 4rem;
  font-weight: 800;
  margin: 0;
  letter-spacing: 1.5px;
  text-transform: uppercase;
}

.process-header .title-underline {
  width: 180px;
  height: 6px;
  background-color: #00bcd4; 
  margin-top: 12px;
  border-radius: 2px;
}

/* --- Interactive Timeline Area --- */
.process-interactive-area {
  position: relative;
  max-width: 700px; /* INCREASED: Gives staggered pills more room to go left and right */
  margin: 0 auto;
  aspect-ratio: 450 / 650;
  width: 100%;
  right: 1%;
}

.process-path {
    color: linear-gradient(180deg, #c7d5e4 0%, #46678c 32%, #0e2439 65%, #030a13 100%);

}
/* Background Wavy Vector SVG (Centered) */
.process-svg {
  
  opacity: 60%;
  position: absolute;
  top: -4%; /* Pulls the line up past the top pill */
  left: 0;
  width: 100%;
  height: 150%; /* Makes the entire line 10% taller */
  z-index: 1;
  pointer-events: none;
  overflow: visible;
}
.process-steps-wrapper {

  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: 2;
}

/* --- The Pill Boxes --- */
.process-pill {
  position: absolute;
  
  /* 1. MAKE IT LONGER: Increase this to stretch further across the center */
  width: 75%; 
  
  /* 2. MAKE IT THICKER: Increase this for a taller, bulkier pill */
  height: 18%; 
  
  transform: translateY(-50%); 
  
  /* Use a massive border-radius to guarantee perfect round ends no matter how thick it gets */
  border-radius: 100px; 
  
  display: flex;
  align-items: center;
  cursor: pointer;
  transition: transform 0.3s ease, filter 0.3s ease;
  box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
}


/* --- Image Background for Pills --- */
.pill-bg-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: inherit; /* Matches the curve of the pill perfectly */
    opacity: 0; /* Hidden by default (Shows background color instead) */
    transition: opacity 0.4s ease;
    z-index: 0;
}

/* Add a dark tint overlay so the white text is readable over images */
.process-pill::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.4); /* 40% black overlay */
    border-radius: inherit;
    opacity: 0;
    transition: opacity 0.4s ease;
    z-index: 1;
}

/* When the pill is active, fade in the image and the dark tint */
.process-pill.active .pill-bg-image,
.process-pill.active::before {
    opacity: 1;
}

/* Ensure the text and circle stay ON TOP of the image */
.pill-text,
.pill-circle {
    position: relative;
    z-index: 2;
}

/* --- Alternating Staggered Positions & Shading --- */

/* Step 1, 3, 5: Anchored fully to the LEFT edge */
.step-1, .step-3, .step-5 {
  left: -10%; 
  justify-content: flex-end; /* Pushes circle to the center line */
  padding-right: 15px; /* Spacing for the larger circle */
  padding-left: 25px;
}

/* Step 2, 4: Anchored fully to the RIGHT edge */
.step-2, .step-4 {
  left: 40%; 
  justify-content: flex-start; /* Pulls circle to the center line */
  padding-left: 15px; /* Spacing for the larger circle */
  padding-right: 25px;
}

/* Step 1 */
.step-1 { top: 11.5%; background-color: #0075ff; z-index: 5; }
/* Step 2 */
.step-2 { top: 42%; background-color: #003368; z-index: 4; }
/* Step 3 */
.step-3 { top: 70%; background-color: #001b3d; z-index: 3; }
/* Step 4 */
.step-4 { top: 100%; background-color: #001026; z-index: 2; }
/* Step 5 */
.step-5 { top: 130.5%; background-color: #000714; z-index: 1; }

/* --- Interactive Hover Effects --- */
.process-pill:hover {
  filter: brightness(1.2);
  transform: translateY(-50%) scale(1.03);
  box-shadow: 0 18px 36px rgba(0, 0, 0, 0.55);
}

.process-pill.active {
  transform: translateY(-50%) scale(1.05);
  box-shadow: 0 20px 40px rgba(0, 117, 255, 0.3);
}

/* --- Pill Text (Optional) --- */
.pill-text {
  flex: 1;
  text-align: center;
  font-weight: 700;
  font-size: 1.6rem; /* Slightly larger text */
  color: #ffffff;
  padding: 0 10px;
  pointer-events: none; 
}

/* Inner Alternating Circles */
.pill-circle {
  /* 3. MAKE CIRCLE BIGGER: Scaled up to match the thicker pills */
  width: 55px; 
  height: 55px;
  
  background-color: #e2e2e2;
  border-radius: 50%;
  pointer-events: none;
  flex-shrink: 0; 
  box-shadow: inset -2px -2px 5px rgba(0, 0, 0, 0.1), 0 5px 10px rgba(0,0,0,0.4); 
}


/* --- Process Descriptions --- */
.process-desc {
  position: absolute;
  width: 320px; /* Width of the text box */
  font-size: 0.95rem;
  font-weight: 700;
  line-height: 1.6;
  color: #e4e9f0; /* Soft off-white to match the theme */
  pointer-events: auto; /* Allows users to select text if they want */
  margin: 0;
transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) !important; 
  z-index: 10;  
}

/* Position for pills on the left (Text goes to the right) */
.desc-right {
  left: 130%; /* Pushes text outside the pill to the right */
  text-align: left;
  transform-origin: left center !important;
}

/* Position for pills on the right (Text goes to the left) */
.desc-left {
  right: 140%; /* Pushes text outside the pill to the left */
  text-align: right;
  transform-origin: right center !important;
}

/* --- The Selection Effect (Hover and Active states) --- */
.process-pill:hover .process-desc,
.process-pill.active .process-desc {
  color: #0075ff; /* Bright cyan/blue */
  text-shadow: 0 0 15px #0075ff(248, 248, 248, 0.5); /* Creates the "bright" glowing effect */
  transform: scale(1.2); /* Scales the text up */
}

/* Make sure the active pill comes to the very front so the big text doesn't hide behind other pills */
.process-pill:hover,
.process-pill.active {
  z-index: 20 !important; 
}

/* ========================================= */
/* --- RESPONSIVE ADJUSTMENTS (Media Queries) */
/* ========================================= */

/* TABLET (Below 1024px) */
@media (max-width: 1024px) {
  .process-desc {
    display: none; /* Keeps descriptions hidden so they don't break horizontal boundaries */
  }

  .process-pill {
    width: 65%; /* Shrink width so left/right offsets fit on screen */
  }

  .step-1, .step-3, .step-5 { 
    left: -5%; 
  }

  .step-2, .step-4 { 
    left: 40%; 
  }
}

/* MOBILE (Below 768px) */
@media (max-width: 768px) {
  .process-header .section-title {
    font-size: 3rem;
  }
  
  .process-interactive-area {
    aspect-ratio: 1 / 1.5; /* Makes the box taller so pills have breathing room */
  }

  .process-pill {
    width: 70%;
    height: 15%; /* Scale relative height down */
  }

  /* Pull everything inward to center the timeline nicely */
  .step-1, .step-3, .step-5 {
    left: 5%;
    padding-left: 15px;
  }

  .step-2, .step-4 {
    left: 25%;
    padding-right: 15px;
  }

  .pill-text {
    font-size: 1.3rem;
  }
}

/* SMALL MOBILE (Below 480px) */
@media (max-width: 480px) {
  .process-header {
    margin-bottom: 4rem;
  }

  .process-header .section-title {
    font-size: 2.2rem;
  }

  .process-interactive-area {
    aspect-ratio: 1 / 1.8; /* Extends height further for small screens */
  }

  .process-pill {
    width: 85%; /* Make pills wide and tappable */
    height: 12%; 
  }

  /* Practically overlap them in the center so they fit perfectly */
  .step-1, .step-3, .step-5 { 
    left: 2%; 
  }
  .step-2, .step-4 { 
    left: 13%; 
  }
  
  .pill-circle {
    width: 45px;
    height: 45px;
  }

  .pill-text {
    font-size: 1.1rem;
  }
}


/* --- Featured Projects Section --- */
.home-projects {
  background-color: #030a13; /* Deep blue background to match reference */
  padding: 6rem 0 0 0; /* Padding top, 0 on bottom so the last image touches the edge if desired */
  font-family: sans-serif;
}

.projects-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

/* --- Header --- */
.projects-header {
  margin-bottom: 4rem;
}

.projects-heading {
  margin: 0;
  font-size: 3.5rem;
  font-weight: 700;
  color: #ffffff;
  line-height: 1.2;
}

.block-text {
  display: block;
}

/* --- Parallax Bands --- */
.projects-parallax-wrapper {
  width: 100%;
  display: flex;
  flex-direction: column;
}

.parallax-band {
  width: 100%;
  height: 400px; /* Adjust this to change how tall the image strips are */

  /* The core parallax properties */
  background-attachment: fixed;
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;

  /* Optional: Adds a slight tint to make the images look cohesive */
  /* box-shadow: inset 0 0 0 1000px rgba(0, 180, 216, 0.2); Cyan tint */
}

/* The dark blue space between the images */
.parallax-gap {
  width: 100%;
  height: 60px; /* Adjust the thickness of the gap */
  background-color: #0b1a2f;
}

/* --- Responsive --- */
@media (max-width: 768px) {
  .projects-heading {
    font-size: 2.5rem;
  }

  .parallax-band {
    height: 250px; /* Slightly shorter bands on mobile */
    /* Note: iOS Safari sometimes struggles with background-attachment: fixed. 
           If it acts jittery on iPhones, uncomment the line below to disable parallax on mobile */
    /* background-attachment: scroll; */
  }

  .parallax-gap {
    height: 40px;
  }
}

/* --- Testimonials Section --- */
.home-testimonials {
  background-color: #ffffff;
  padding: 6rem 0;
  font-family: sans-serif;
  color: #0b1a2f; /* Deep blue text to match theme */
}

.testimonials-container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 0 2rem;
}

/* --- Header --- */
.testi-header {
  margin-bottom: 3rem;
}

.testi-heading {
  font-size: 3.5rem;
  font-weight: 800;
  margin: 0 0 10px 0;
  text-transform: uppercase;
  color: #0b1a2f;
}

.testi-subheading {
  font-size: 1rem;
  font-weight: 700;
  margin: 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* --- Testimonials Grid --- */
.testi-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
  margin-bottom: 4rem;
}

.testi-card {
  border: 1px solid #0b1a2f;
  aspect-ratio: 1 / 1; /* Makes them perfect squares */
  position: relative;
  padding: 2rem;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.testi-content p {
  font-size: 0.95rem;
  line-height: 1.6;
  margin: 0;
  color: #333;
}

.testi-profile {
  display: flex;
  align-items: center;
  gap: 15px;
}

/* The dark circle in the bottom left */
.profile-pic {
  width: 50px;
  height: 50px;
  background-color: #0b1a2f; /* Fallback dark blue circle */
  border-radius: 50%;
  overflow: hidden;
}

.profile-pic img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.profile-name {
  font-weight: 700;
  font-size: 0.9rem;
}

/* --- CTA Box --- */
.testi-cta-box {
  background-color: #0b1a2f; /* Deep dark blue */
  border-radius: 25px;
  padding: 3rem 4rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #ffffff;
}

.cta-text h3 {
  font-size: 2.2rem;
  margin: 0 0 10px 0;
  font-weight: 700;
}

.cta-text p {
  font-size: 1.1rem;
  margin: 0;
  font-weight: 300;
}

.btn-gray {
  display: inline-block;
  background-color: #d9d9d9;
  color: #0b1a2f;
  padding: 15px 40px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: 600;
  font-size: 1rem;
  text-transform: uppercase;
  transition: background-color 0.3s ease;
}

.btn-gray:hover {
  background-color: #ffffff;
}

/* --- Responsive Adjustments --- */
@media (max-width: 992px) {
  .testi-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .testi-heading {
    font-size: 2.5rem;
  }

  .testi-grid {
    grid-template-columns: 1fr;
  }

  .testi-card {
    aspect-ratio: auto;
    min-height: 250px;
  }

  .testi-cta-box {
    flex-direction: column;
    text-align: center;
    padding: 2.5rem 2rem;
    gap: 30px;
  }
}

</style>


 <!--- Hero animation --->

 <script>
  document.addEventListener('DOMContentLoaded', () => {
    const heroSection = document.querySelector('.home-hero');

    if (heroSection) {
        // Small timeout ensures the DOM is fully painted before triggering
        setTimeout(() => {
            heroSection.classList.add('is-animated');
        }, 150);
    }
});
 </script>
<style>

  /* --- HERO SECTION ANIMATIONS --- */

/* Initial hidden state for the text content on the left */
.hero-text-content {
    opacity: 0;
    transform: translateX(-50px);
    transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
}

/* Initial hidden state for the trust cards on the right */
.trust-card {
    opacity: 0;
    transform: translateY(-40px); /* Positioned higher up so they drop down */
    transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}

/* Staggered Drop-Down Delays for the Cards */
.trust-card.card-1 { transition-delay: 0.2s; }
.trust-card.card-2 { transition-delay: 0.4s; }
.trust-card.card-3 { transition-delay: 0.6s; }

/* --- Active Triggered States --- */
.home-hero.is-animated .hero-text-content {
    opacity: 1;
    transform: translateX(0);
}

.home-hero.is-animated .trust-card {
    opacity: 1;
    transform: translateY(0);
}

</style>


<!--- Service Countdown Animation --->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const statsSection = document.querySelector('.stats-banner-wrapper');
    
    if (!statsSection) return;

    let animated = false;

    const animateNumbers = () => {
        const statNums = statsSection.querySelectorAll('.stat-num');
        
        statNums.forEach(numElement => {
            const originalText = numElement.textContent.trim();
            
            // Extract the numeric value and keep track of any trailing characters (like '+')
            const targetNumber = parseInt(originalText.replace(/[^0-9]/g, ''), 10);
            if (isNaN(targetNumber)) return;

            const suffix = originalText.replace(/[0-9]/g, '');
            let currentNumber = 0;
            const duration = 2000; // Animation duration in milliseconds (2 seconds)
            const frameRate = 30; // Milliseconds per frame
            const totalFrames = duration / frameRate;
            const increment = targetNumber / totalFrames;

            const counter = setInterval(() => {
                currentNumber += increment;
                if (currentNumber >= targetNumber) {
                    currentNumber = targetNumber;
                    clearInterval(counter);
                }
                // Update text keeping any original formatting/suffixes
                numElement.textContent = Math.floor(currentNumber).toLocaleString() + suffix;
            }, frameRate);
        });
    };

    // Trigger the animation when the stats banner scrolls into view
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !animated) {
                animated = true;
                animateNumbers();
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.3 // Triggers when 30% of the stats banner is visible
    });

    observer.observe(statsSection);
});
</script>


<!-- Why Choose Us Section Animation-->

<style>
  /* --- WHY CHOOSE US TILE ANIMATIONS --- */

/* Base state for all boxes before they animate */
.home-why-choose .why-box {
    opacity: 0;
    transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
    will-change: opacity, transform;
}

/* 1. Top Wide Box flies in from the TOP */
.home-why-choose .box-wide {
    transform: translateY(-60px);
}

/* 2. Bottom Left Square flies in from the LEFT */
.home-why-choose .box-sq-1 {
    transform: translateX(-60px);
}

/* 3. Bottom Right Square flies in from the RIGHT */
.home-why-choose .box-sq-2 {
    transform: translateX(60px);
}

/* 4. Tall Right Box flies in from the BOTTOM */
.home-why-choose .box-tall {
    transform: translateY(60px);
}

/* --- Active Triggered States (When section becomes visible) --- */
.home-why-choose.is-animated .why-box {
    opacity: 1;
    transform: translate(0, 0); /* All settle perfectly into their grid slots */
}

/* Staggered micro-delays so they cascade sequentially */
.home-why-choose.is-animated .box-wide { transition-delay: 0.1s; }
.home-why-choose.is-animated .box-sq-1 { transition-delay: 0.25s; }
.home-why-choose.is-animated .box-sq-2 { transition-delay: 0.4s; }
.home-why-choose.is-animated .box-tall { transition-delay: 0.55s; }
</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const whySection = document.querySelector('.home-why-choose');

    if (whySection) {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    whySection.classList.add('is-animated');
                    observer.unobserve(entry.target); // Runs smoothly once
                }
            });
        }, {
            root: null,
            rootMargin: '0px 0px -100px 0px',
            threshold: 0.2 // Triggers when 20% of the section is visible
        });

        observer.observe(whySection);
    }
});
</script>




<!--  Featured Project -->

<style>
  /* --- FEATURED PROJECTS PARALLAX STYLES --- */
.home-projects .parallax-band {
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    /* Hardware acceleration layer */
    will-change: background-position;
    transform: translateZ(0);
}

</style>
<script>

  document.addEventListener('DOMContentLoaded', () => {
    const projectsSection = document.querySelector('.home-projects');
    
    if (!projectsSection) return;

    const parallaxBands = projectsSection.querySelectorAll('.parallax-band');

    window.addEventListener('scroll', () => {
        const rect = projectsSection.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        // Check if the projects section is currently visible in the viewport
        if (rect.top <= windowHeight && rect.bottom >= 0) {
            // Calculate how far we've scrolled into the section (0 to 1-ish)
            const scrollProgress = (windowHeight - rect.top) / (windowHeight + rect.height);
            
            parallaxBands.h((band, index) => {
                // Different multipliers for each band create a multi-layered depth effect
                const speed = (index + 1) * 40; 
                const yOffset = (scrollProgress - 0.5) * speed;
                
                band.style.backgroundPosition = `center calc(50% + ${yOffset}px)`;
            });
        }
    }, { passive: true });
});

</script>