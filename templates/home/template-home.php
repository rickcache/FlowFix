

<!-- HOME -->
<section class="home-hero" id="home">
    <div class="hero-container">
        <?php
        // Query the 'editable' CPT for the hero section
        $hero_query = new WP_Query( array(
            'post_type'      => 'editable',
            'name'           => 'home-hero', 
            'posts_per_page' => 1,
        ) );

        // Initialize variables for dynamic content
        $bg_image_url = '';
        $title = 'Welcome to <span class="text-blue">FlowFlix</span>';
        $subtitle = '<span class="text-blue">Fast. Reliable. Licensed.</span> 24/7 Emergency Plumbing.';
        $btn_text = 'contact us';
        $btn_link = '#';
        
        $cards = array(
            array('text' => 'Quality & Trust', 'icon' => ''),
            array('text' => 'Licensed Experts', 'icon' => ''),
            array('text' => '24/7 Support', 'icon' => '')
        );

        if ( $hero_query->have_posts() ) {
            $hero_query->the_post();
            
            // Override fallbacks with dynamic data if they exist
            if ( has_post_thumbnail() ) {
                $bg_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
            }
            
            $dynamic_title = get_the_title();
            if ( !empty($dynamic_title) && $dynamic_title !== 'Auto Draft' ) {
                $title = $dynamic_title; // Note: Instruct client to use HTML spans for blue text in the title
            }

            $dynamic_subtitle = get_post_meta( get_the_ID(), 'hero_subtitle', true );
            if ( !empty($dynamic_subtitle) ) $subtitle = $dynamic_subtitle;

            $dynamic_btn_text = get_post_meta( get_the_ID(), 'hero_btn_text', true );
            if ( !empty($dynamic_btn_text) ) $btn_text = $dynamic_btn_text;

            $dynamic_btn_link = get_post_meta( get_the_ID(), 'hero_btn_link', true );
            if ( !empty($dynamic_btn_link) ) $btn_link = $dynamic_btn_link;

            // Fetch dynamic card data
            for ($i = 1; $i <= 3; $i++) {
                $card_text = get_post_meta( get_the_ID(), 'hero_card_' . $i . '_text', true );
                if ( !empty($card_text) ) $cards[$i-1]['text'] = $card_text;
            }
            
            wp_reset_postdata();
        }
        
        // Inline style for dynamic background image fallback
        $bg_style = $bg_image_url ? 'background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url(' . esc_url($bg_image_url) . ');' : 'background-color: #2a2a2a;'; // Replace with a default image URL if desired
        ?>

        <div class="hero-bg" style="<?php echo $bg_style; ?>"></div>

        <div class="hero-content-wrapper">
            <div class="hero-text-content">
                
                <h1 class="hero-title"><?php echo $title; ?></h1>
                <p class="hero-subtitle"><?php echo $subtitle; ?></p>
                <a href="<?php echo esc_url($btn_link); ?>" class="hero-btn"><?php echo esc_html($btn_text); ?></a>
            </div>

            <div class="hero-trust-cards">
                <?php foreach ($cards as $index => $card) : ?>
                    <div class="trust-card card-<?php echo $index + 1; ?>">
                        <div class="card-icon-placeholder">
                            </div>
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
        // Query the 'editable' CPT for the services section
        $services_query = new WP_Query( array(
            'post_type'      => 'editable',
            'name'           => 'home-services', 
            'posts_per_page' => 1,
        ) );

        // Fallback Data based on the provided list and image
        $heading = 'SERVICES';
        
        // Stats Banner Data
        $stat_1_num = '1200'; $stat_1_text = 'companies';
        $stat_2_num = '1000+'; $stat_2_text = 'customers served';
        $stat_3_num = '1000+'; $stat_3_text = 'customers served';
        $stat_4_num = '1000+'; $stat_4_text = 'customers served';
        $stat_tagline = 'We fix <span class="text-blue-light">pipes</span> like they are our own'; // Adjusted from 'wires' to 'pipes' for plumbing

        // Bottom CTA Data
        $cta_sub = 'EMERGENCY FIXING?';
        $cta_title = 'Contact Us Right now';
        $cta_btn_text = 'Book a Quote';
        $cta_btn_link = '#';

        // 6 Service Cards mapped to the layout in Services.jpg
        $cards = array(
            1 => array('title' => 'Commercial Plumbing', 'class' => 'card-top-wide', 'img' => ''),
            2 => array('title' => 'Blocked Drains', 'class' => 'card-top-square', 'img' => ''),
            3 => array('title' => 'Emergency Plumbing', 'class' => 'card-bot-small', 'img' => ''),
            4 => array('title' => 'Hot Water Systems', 'class' => 'card-bot-tall', 'img' => ''),
            5 => array('title' => 'Leak Detection', 'class' => 'card-bot-tall', 'img' => ''),
            6 => array('title' => 'Burst Pipes', 'class' => 'card-bot-tall', 'img' => '')
        );

        if ( $services_query->have_posts() ) {
            $services_query->the_post();
            
            // Dynamic Overrides (Client can add these Custom Fields in WP Admin)
            $dyn_heading = get_post_meta( get_the_ID(), 'services_heading', true );
            if ( !empty($dyn_heading) ) $heading = $dyn_heading;

            // Fetch dynamic card data
            for ($i = 1; $i <= 6; $i++) {
                $card_title = get_post_meta( get_the_ID(), 'service_card_' . $i . '_title', true );
                $card_img = get_post_meta( get_the_ID(), 'service_card_' . $i . '_image', true ); // URL of image
                
                if ( !empty($card_title) ) $cards[$i]['title'] = $card_title;
                if ( !empty($card_img) ) $cards[$i]['img'] = $card_img;
            }
            
            wp_reset_postdata();
        }
        ?>

        <!-- Top Section: Heading and Top Cards -->
        <div class="services-header">
            <h2 class="section-title"><?php echo esc_html($heading); ?></h2>
            <div class="title-underline"></div>
        </div>
        
        <div class="services-top-grid">
            <!-- Card 1: Wide -->
            <div class="service-card <?php echo $cards[1]['class']; ?>">
                <div class="card-img-wrapper">
                    <?php if($cards[1]['img']) : ?>
                        <img src="<?php echo esc_url($cards[1]['img']); ?>" alt="<?php echo esc_attr($cards[1]['title']); ?>">
                    <?php else : ?>
                        <div class="placeholder-bg"></div>
                    <?php endif; ?>
                </div>
                <h3 class="card-label"><?php echo esc_html($cards[1]['title']); ?></h3>
            </div>

            <!-- Card 2: Square -->
            <div class="service-card <?php echo $cards[2]['class']; ?>">
                <div class="card-img-wrapper">
                    <?php if($cards[2]['img']) : ?>
                        <img src="<?php echo esc_url($cards[2]['img']); ?>" alt="<?php echo esc_attr($cards[2]['title']); ?>">
                    <?php else : ?>
                        <div class="placeholder-bg"></div>
                    <?php endif; ?>
                </div>
                <a href="#" class="view-all-link">view all</a>
                <h3 class="card-label"><?php echo esc_html($cards[2]['title']); ?></h3>
            </div>
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
                <?php echo $stat_tagline; ?>
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
                <div class="service-card <?php echo $cards[3]['class']; ?>">
                    <div class="card-img-wrapper">
                        <?php if($cards[3]['img']) : ?>
                            <img src="<?php echo esc_url($cards[3]['img']); ?>" alt="<?php echo esc_attr($cards[3]['title']); ?>">
                        <?php else : ?>
                            <div class="placeholder-bg"></div>
                        <?php endif; ?>
                    </div>
                    <a href="#" class="view-all-link">view all</a>
                    <h3 class="card-label"><?php echo esc_html($cards[3]['title']); ?></h3>
                </div>
            </div>

            <!-- Right Side: 3 Tall Cards -->
            <div class="bottom-right-col">
                <?php for($i = 4; $i <= 6; $i++) : ?>
                    <div class="service-card <?php echo $cards[$i]['class']; ?>">
                        <div class="card-img-wrapper">
                            <?php if($cards[$i]['img']) : ?>
                                <img src="<?php echo esc_url($cards[$i]['img']); ?>" alt="<?php echo esc_attr($cards[$i]['title']); ?>">
                            <?php else : ?>
                                <div class="placeholder-bg"></div>
                            <?php endif; ?>
                        </div>
                        <a href="#" class="view-all-link">view all</a>
                        <h3 class="card-label"><?php echo esc_html($cards[$i]['title']); ?></h3>
                    </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="home-about" id="about">
    <div class="about-container">
        
        <?php
        // Query the 'editable' CPT for the about section
        $about_query = new WP_Query( array(
            'post_type'      => 'editable',
            'name'           => 'home-about', 
            'posts_per_page' => 1,
        ) );

        // Default Fallbacks
        $heading = 'ABOUT US';
        $img_left = ''; 
        $img_right = '';
        
        $left_title = 'Our History';
        $left_text = "FlowFix Plumbing was established in 2014 with a simple vision: to provide honest, reliable, and high-quality plumbing services that customers could depend on. What began as a small local operation with a single service vehicle has grown into one of Sydney's trusted plumbing companies through consistent workmanship, transparent pricing, and exceptional customer service. Over the years, we have completed thousands of successful projects ranging from emergency plumbing repairs and blocked drain solutions to large-scale commercial installations and complete plumbing renovations. Our continued growth has been driven not by advertising alone, but by the recommendations of satisfied customers who value our professionalism, reliability, and commitment to doing every job right the first time. Today, FlowFix Plumbing continues to build on that foundation, combining years of experience with modern technology and skilled craftsmanship to deliver plumbing solutions that stand the test of time while remaining dedicated to the local communities we proudly serve.";

        // Specific fallbacks for the 5 timeline paragraphs
        $timeline_paras = array(
            array(
                'title' => 'About Us',
                'text'  => "At FlowFix Plumbing, we are committed to delivering dependable plumbing solutions that homeowners and businesses can trust. We understand that plumbing issues can disrupt your daily life, whether it's a leaking tap, a burst pipe, or a complete hot water system failure. That's why our team responds quickly, works efficiently, and focuses on providing long-lasting solutions instead of temporary fixes. Every project is approached with professionalism, attention to detail, and a commitment to exceeding customer expectations."
            ),
            array(
                'title' => 'Expert Team',
                'text'  => "Our team consists of fully licensed and highly skilled plumbers with extensive experience across residential, commercial, and emergency plumbing services. We continuously invest in modern equipment, advanced diagnostic technology, and ongoing industry training to ensure we can tackle even the most complex plumbing challenges. From blocked drains and leak detection to gas fitting and bathroom plumbing renovations, we deliver quality workmanship that meets the highest industry standards."
            ),
            array(
                'title' => 'Honesty & Transparency',
                'text'  => "Honesty and transparency are at the heart of everything we do. Before any work begins, we provide clear explanations of the issue, discuss the available solutions, and offer upfront pricing with no hidden surprises. We believe every customer deserves to understand the work being carried out in their home or business, giving them confidence that they are making the right decision. Building trust through open communication has helped us establish long-lasting relationships with our clients."
            ),
            array(
                'title' => 'Customer Satisfaction',
                'text'  => "Customer satisfaction is more than a goal—it's the foundation of our business. We treat every property with respect, arrive on time, maintain a clean workspace, and ensure every repair or installation is completed with precision. Our dedication to reliability has earned us the trust of countless homeowners, landlords, builders, and local businesses who continue to choose FlowFix Plumbing whenever they need expert plumbing services."
            ),
            array(
                'title' => 'Local Commitment',
                'text'  => "As a proudly local plumbing company, we take pride in serving our community with integrity, professionalism, and genuine care. Whether we're responding to an emergency in the middle of the night or helping a family upgrade their plumbing system, we approach every job with the same level of commitment and attention to detail. At FlowFix Plumbing, our mission is simple: to provide exceptional plumbing services, outstanding customer care, and reliable solutions that keep homes and businesses running smoothly for years to come."
            )
        );

        if ( $about_query->have_posts() ) {
            $about_query->the_post();
            
            $dyn_heading = get_post_meta( get_the_ID(), 'about_heading', true );
            if ( !empty($dyn_heading) ) $heading = $dyn_heading;

            $dyn_img_left = get_post_meta( get_the_ID(), 'about_image_left', true );
            if ( !empty($dyn_img_left) ) $img_left = $dyn_img_left;

            $dyn_img_right = get_post_meta( get_the_ID(), 'about_image_right', true );
            if ( !empty($dyn_img_right) ) $img_right = $dyn_img_right;

            $dyn_left_title = get_post_meta( get_the_ID(), 'about_left_title', true );
            if ( !empty($dyn_left_title) ) $left_title = $dyn_left_title;

            $dyn_left_text = get_post_meta( get_the_ID(), 'about_left_text', true );
            if ( !empty($dyn_left_text) ) $left_text = $dyn_left_text;

            // Fetch dynamic timeline paras
            for ($i = 1; $i <= 5; $i++) {
                $dyn_title = get_post_meta( get_the_ID(), 'about_para_' . $i . '_title', true );
                $dyn_text = get_post_meta( get_the_ID(), 'about_para_' . $i . '_text', true );
                
                if ( !empty($dyn_title) ) $timeline_paras[$i-1]['title'] = $dyn_title;
                if ( !empty($dyn_text) ) $timeline_paras[$i-1]['text'] = $dyn_text;
            }
            
            wp_reset_postdata();
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
                        <img src="<?php echo esc_url($img_left); ?>" alt="About Us">
                    <?php else : ?>
                        <div class="placeholder-blue"></div>
                    <?php endif; ?>
                </div>
                
                <!-- Bottom Text -->
                <div class="about-text-box border-left">
                    <h3><?php echo esc_html($left_title); ?></h3>
                    <p><?php echo esc_html($left_text); ?></p>
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
                                <p><?php echo esc_html($para['text']); ?></p>
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

    // 1. Smooth scroll to section when dot is clicked
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            // Using sections[0].offsetTop ensures we account for any weird padding in the box
            const targetScroll = sections[index].offsetTop - sections[0].offsetTop;
            
            scrollArea.scrollTo({
                top: targetScroll,
                behavior: 'smooth'
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
        // Query the 'editable' CPT for the Why Choose Us section
        $why_query = new WP_Query( array(
            'post_type'      => 'editable',
            'name'           => 'home-why-choose', 
            'posts_per_page' => 1,
        ) );

        // Fallbacks
        $title_1 = 'WHY';
        $title_2 = 'CHOOSE';
        $title_3 = 'US';
        $box_link = site_url('/about'); // Links to the about page
        
        $phone = '-2128388123';
        $email = 'example@email.com';
        $btn_text = 'Contact'; // Placeholder for the blank button in the design
        $btn_link = site_url('/contact');

        $images = array(
            1 => '', // Wide top
            2 => '', // Small bottom left
            3 => '', // Small bottom right
            4 => '', // Tall right
        );

        if ( $why_query->have_posts() ) {
            $why_query->the_post();
            
            // Dynamic text
            $dyn_title_1 = get_post_meta( get_the_ID(), 'why_title_1', true );
            if ( !empty($dyn_title_1) ) $title_1 = $dyn_title_1;

            $dyn_title_2 = get_post_meta( get_the_ID(), 'why_title_2', true );
            if ( !empty($dyn_title_2) ) $title_2 = $dyn_title_2;

            $dyn_title_3 = get_post_meta( get_the_ID(), 'why_title_3', true );
            if ( !empty($dyn_title_3) ) $title_3 = $dyn_title_3;

            $dyn_phone = get_post_meta( get_the_ID(), 'why_phone', true );
            if ( !empty($dyn_phone) ) $phone = $dyn_phone;

            $dyn_email = get_post_meta( get_the_ID(), 'why_email', true );
            if ( !empty($dyn_email) ) $email = $dyn_email;

            // Dynamic images
            for ($i = 1; $i <= 4; $i++) {
                $dyn_img = get_post_meta( get_the_ID(), 'why_image_' . $i, true );
                if ( !empty($dyn_img) ) $images[$i] = $dyn_img;
            }
            
            wp_reset_postdata();
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
        // Query the 'editable' CPT for the Process section
        $process_query = new WP_Query( array(
            'post_type'      => 'editable',
            'name'           => 'home-process', 
            'posts_per_page' => 1,
        ) );

        $heading = 'OUR PROCESS';
        
        // Fallback Data for 5 steps (Title + Description)
        $steps = array(
            1 => array(
                'title' => '1. Get in Touch',
                'desc'  => "Contact our team by phone or through our online booking form. Tell us about your plumbing issue, and we'll schedule a convenient appointment or dispatch an emergency plumber immediately if urgent assistance is required."
            ),
            2 => array(
                'title' => '2. On-Site Inspection',
                'desc'  => "One of our licensed plumbers arrives on time to thoroughly inspect the problem. Using modern tools and years of expertise, we identify the root cause and recommend the most effective solution."
            ),
            3 => array(
                'title' => '3. Transparent Quote',
                'desc'  => "Before any work begins, we provide a clear, upfront quote with no hidden fees. We'll explain the scope of work, expected timeline, and answer any questions so you know exactly what to expect."
            ),
            4 => array(
                'title' => '4. Professional Repair or Installation',
                'desc'  => "Once approved, our experienced team completes the job using high-quality materials and industry-leading techniques. We work efficiently while maintaining a clean and safe workspace, ensuring minimal disruption to your home or business."
            ),
            5 => array(
                'title' => '5. Final Quality Check',
                'desc'  => "After the work is completed, we thoroughly test every repair or installation to ensure everything is functioning perfectly. We clean up the work area, walk you through the completed job, and provide maintenance advice so your plumbing continues to perform reliably for years to come."
            )
        );

        if ( $process_query->have_posts() ) {
            $process_query->the_post();
            
            $dyn_heading = get_post_meta( get_the_ID(), 'process_heading', true );
            if ( !empty($dyn_heading) ) $heading = $dyn_heading;

            for ($i = 1; $i <= 5; $i++) {
                $dyn_title = get_post_meta( get_the_ID(), 'process_step_' . $i . '_title', true );
                $dyn_desc  = get_post_meta( get_the_ID(), 'process_step_' . $i . '_desc', true );
                
                if ( !empty($dyn_title) ) $steps[$i]['title'] = $dyn_title;
                if ( !empty($dyn_desc) ) $steps[$i]['desc'] = $dyn_desc;
            }
            
            wp_reset_postdata();
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
                    <span class="pill-text"><?php echo esc_html($steps[1]['title']); ?></span>
                    <div class="pill-circle"></div>
                    <p class="process-desc desc-right"><?php echo esc_html($steps[1]['desc']); ?></p>
                </div>

                <!-- STEP 2 (Right Pill, Text on Left) -->
                <div class="process-pill pill-left step-2" data-svg-y="240">
                    <p class="process-desc desc-left"><?php echo esc_html($steps[2]['desc']); ?></p>
                    <div class="pill-circle"></div>
                    <span class="pill-text"><?php echo esc_html($steps[2]['title']); ?></span>
                </div>

                <!-- STEP 3 (Left Pill, Text on Right) -->
                <div class="process-pill pill-right step-3" data-svg-y="400">
                    <span class="pill-text"><?php echo esc_html($steps[3]['title']); ?></span>
                    <div class="pill-circle"></div>
                    <p class="process-desc desc-right"><?php echo esc_html($steps[3]['desc']); ?></p>
                </div>

                <!-- STEP 4 (Right Pill, Text on Left) -->
                <div class="process-pill pill-left step-4" data-svg-y="560">
                    <p class="process-desc desc-left"><?php echo esc_html($steps[4]['desc']); ?></p>
                    <div class="pill-circle"></div>
                    <span class="pill-text"><?php echo esc_html($steps[4]['title']); ?></span>
                </div>

                <!-- STEP 5 (Left Pill, Text on Right) -->
                <div class="process-pill pill-right step-5" data-svg-y="720">
                    <span class="pill-text"><?php echo esc_html($steps[5]['title']); ?></span>
                    <div class="pill-circle"></div>
                    <p class="process-desc desc-right"><?php echo esc_html($steps[5]['desc']); ?></p>
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
        // Query the 'editable' CPT for the Projects section
        $projects_query = new WP_Query( array(
            'post_type'      => 'editable',
            'name'           => 'home-projects', 
            'posts_per_page' => 1,
        ) );

        // Fallbacks
        $title_line_1 = 'FEATURED';
        $title_line_2 = 'PROJECTS';
        
        $images = array(
            1 => '', 
            2 => '', 
            3 => ''
        );

        if ( $projects_query->have_posts() ) {
            $projects_query->the_post();
            
            // Dynamic text
            $dyn_title_1 = get_post_meta( get_the_ID(), 'projects_title_1', true );
            if ( !empty($dyn_title_1) ) $title_1 = $dyn_title_1;

            $dyn_title_2 = get_post_meta( get_the_ID(), 'projects_title_2', true );
            if ( !empty($dyn_title_2) ) $title_2 = $dyn_title_2;

            // Dynamic images
            for ($i = 1; $i <= 3; $i++) {
                $dyn_img = get_post_meta( get_the_ID(), 'project_image_' . $i, true );
                if ( !empty($dyn_img) ) $images[$i] = $dyn_img;
            }
            
            wp_reset_postdata();
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
        // Query the 'editable' CPT for the Testimonials section
        $testi_query = new WP_Query( array(
            'post_type'      => 'editable',
            'name'           => 'home-testimonials', 
            'posts_per_page' => 1,
        ) );

        // Fallbacks
        $heading = 'TESTIMONIALS';
        $subheading = 'WHAT OUR CLIENT SAYS ABOUT US';
        
        // CTA Fallbacks
        $cta_title = 'Book A Quotation';
        $cta_sub = 'Lets Get your Started';
        $cta_btn_text = 'BOOK NOW';
        $cta_btn_link = site_url('/contact');

        // 6 Real Testimonial Fallbacks
        $testimonials = array(
            1 => array(
                'text' => '"FlowFix Plumbing responded within an hour when our kitchen pipe burst. The plumber explained everything clearly, completed the repair quickly, and left the area spotless. The entire experience was professional from start to finish. I wouldn\'t hesitate to recommend them to anyone in Sydney."',
                'name' => 'Sarah Mitchell',
                'img'  => '' // Will fallback to dark circle
            ),
            2 => array(
                'text' => '"We\'ve used FlowFix Plumbing several times for both emergency repairs and routine maintenance. Their team is always punctual, friendly, and transparent with pricing. It\'s refreshing to work with a company that genuinely cares about customer satisfaction."',
                'name' => 'James Robertson',
                'img'  => ''
            ),
            3 => array(
                'text' => '"Our hot water system failed unexpectedly, and FlowFix had a technician at our home the very same day. They replaced the system efficiently and even took the time to explain how to maintain it properly. Outstanding service and excellent workmanship."',
                'name' => 'Emily Carter',
                'img'  => ''
            ),
            4 => array(
                'text' => '"I contacted FlowFix Plumbing after struggling with recurring blocked drains. They quickly identified the underlying issue using modern equipment and permanently solved the problem. The quality of their work exceeded my expectations, and their pricing was fair and honest."',
                'name' => 'Michael Thompson',
                'img'  => ''
            ),
            5 => array(
                'text' => '"From the first phone call to the final inspection, the entire process was seamless. The team arrived exactly when they said they would, completed our bathroom plumbing installation flawlessly, and made sure everything was working perfectly before leaving. Highly professional and incredibly reliable."',
                'name' => 'Olivia Harris',
                'img'  => ''
            ),
            6 => array(
                'text' => '"FlowFix Plumbing handled the plumbing for our office renovation, and the experience was exceptional. Their communication was excellent throughout the project, deadlines were met without delays, and the workmanship was first-class. We\'ll definitely continue using them for all our commercial plumbing needs."',
                'name' => 'Daniel Walker',
                'img'  => ''
            )
        );

        if ( $testi_query->have_posts() ) {
            $testi_query->the_post();
            
            // Dynamic Header
            $dyn_heading = get_post_meta( get_the_ID(), 'testi_heading', true );
            if ( !empty($dyn_heading) ) $heading = $dyn_heading;

            $dyn_sub = get_post_meta( get_the_ID(), 'testi_subheading', true );
            if ( !empty($dyn_sub) ) $subheading = $dyn_sub;

            // Dynamic CTA
            $dyn_cta_title = get_post_meta( get_the_ID(), 'testi_cta_title', true );
            if ( !empty($dyn_cta_title) ) $cta_title = $dyn_cta_title;

            $dyn_cta_sub = get_post_meta( get_the_ID(), 'testi_cta_sub', true );
            if ( !empty($dyn_cta_sub) ) $cta_sub = $dyn_cta_sub;

            $dyn_cta_btn = get_post_meta( get_the_ID(), 'testi_cta_btn', true );
            if ( !empty($dyn_cta_btn) ) $cta_btn_text = $dyn_cta_btn;

            $dyn_cta_link = get_post_meta( get_the_ID(), 'testi_cta_link', true );
            if ( !empty($dyn_cta_link) ) $cta_btn_link = $dyn_cta_link;

            // Dynamic Testimonial Data
            for ($i = 1; $i <= 6; $i++) {
                $dyn_text = get_post_meta( get_the_ID(), 'testi_' . $i . '_text', true );
                $dyn_name = get_post_meta( get_the_ID(), 'testi_' . $i . '_name', true );
                $dyn_img = get_post_meta( get_the_ID(), 'testi_' . $i . '_img', true );
                
                if ( !empty($dyn_text) ) $testimonials[$i]['text'] = $dyn_text;
                if ( !empty($dyn_name) ) $testimonials[$i]['name'] = $dyn_name;
                if ( !empty($dyn_img) ) $testimonials[$i]['img'] = $dyn_img;
            }
            
            wp_reset_postdata();
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
  max-width: 1400px; /* Widened to fit the larger cards comfortably */
  margin: 0 auto;
  padding: 2rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 40px;
  margin-left: 240px;
}

/* --- Left Side Content --- */
.hero-text-content {
  flex: 1;
  min-width: 300px;
  max-width: 600px;
  text-align: left; /* Ensuring strict left alignment */
  left: 1000px;
}

.hero-title {
  font-size: 4rem; /* Slightly larger to match image proportion */
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
  color: #2b7af0; /* Matched the exact blue from the image */
}

.hero-btn {
  display: inline-block;
  padding: 12px 35px;
  color: #fff;
  text-decoration: none;
  font-size: 1.1rem;
  font-weight: 500;
  border-radius: 50px; /* Pill shape */
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
  gap: 30px; /* Increased gap */
  position: relative;
  margin-right: -100px;
  /* Removed the left: -1000px bug */
}

.trust-card {
  background: #e1e1e1; 
 
  width: 220px; /* Massively increased width */
  height: 380px; /* Massively increased height */
  border-radius: 20px;
  position: relative;
  display: flex;
  flex-direction: column;
  justify-content: flex-end; /* Pushes the line to the bottom */
  padding: 25px;
  box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

/* Staggering the cards downward to match the steep step effect */
.card-1 {
  margin-top: 0;
}
.card-2 {
  margin-top: 90px;
}
.card-3 {
  margin-top: 180px;
}

/* The Yellow Circle */
.card-icon-placeholder {
  position: absolute;
  top: 20px;
  right: 20px;
  width: 45px; /* Scaled up to match the bigger card */
  height: 45px;
  background-color: #dfcd15; /* Adjusted to match the exact image yellow */
  border-radius: 50%;
}

/* The Horizontal Line near the bottom */
.card-line {
  width: 100%;
  height: 2px;
  background-color: #333; /* Darkened for visibility */
  margin-bottom: 20px;
}

.card-text {
  font-weight: 700;
  color: #333;
}

/* Responsive Cleanup */
@media (max-width: 1024px) {
  .hero-content-wrapper {
    flex-direction: column;
    justify-content: center;
    text-align: center;
  }

  .hero-text-content {
    text-align: center;
  }

  .hero-trust-cards {
    justify-content: center;
    margin-top: 3rem;
  }

  .card-1,
  .card-2,
  .card-3 {
    margin-top: 0; 
  }
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

/* --- Service Cards (Global for 2x Hover) --- */
.service-card {
  position: relative;
  background-color: #d9d9d9; 
  border-radius: 16px; /* Slightly rounder for a modern look */
  overflow: hidden; 
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}

/* Polished Card Hover: Slight lift + shadow expansion */

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
  /* Premium buttery-smooth easing for the intense 2x zoom */
  transition: transform 0.8s cubic-bezier(0.165, 0.84, 0.44, 1);
}

/* The 2x Hover Effect Requested */
.service-card:hover .card-img-wrapper img,
.service-card:hover .placeholder-bg {
  transform: scale(2);
}

.placeholder-bg {
  background-color: #8c9bb0; /* Darkened placeholder to fit the dark theme better */
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
  /* Added Glassmorphism effect for polish */
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
  gap: 30px; /* Increased gap */
  margin-bottom: 4rem;
  height: 320px;
}

.card-top-wide {
  flex: 2.5;
}

.card-top-square {
  flex: 1;
}

/* --- Middle Stats Banner --- */
.stats-banner-wrapper {
  display: flex;
  width: 100%;
  background-color: transparent; /* Cleaned up background handling */
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
  background: linear-gradient(90deg, #00b4d8 0%, #0096b4 100%); /* Cyan gradient */
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
  color: #0b1a2f; /* Fixed contrast */
  max-width: 250px;
  line-height: 1.2;
}

/* --- Bottom Grid Layout --- */
/* --- Bottom Grid Layout --- */
.services-bottom-grid {
  display: flex;
  gap: 30px;
  align-items: stretch; /* Forces left and right columns to be identically tall */
}

.bottom-left-col {
  flex: 1;
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* Locks CTA to the very top, and small card to the very bottom */
}

.bottom-right-col {
  flex: 2.5;
  display: flex;
  gap: 30px;
}

/* --- Emergency CTA (Left Side) --- */
.emergency-cta {
  margin-top: 0; /* Ensures nothing pushes this container down */
}

.emergency-cta .cta-line {
  width: 100%;
  max-width: 250px; /* Lengthened to match the line in your new image */
  height: 2px;
  background-color: #ffffff;
  margin-top: 0; /* Crucial: Flushes the line with the top of the right cards */
  margin-bottom: 20px;
}

.emergency-cta h4 {
  font-size: 1.1rem;
  margin: 0 0 10px 0;
  font-weight: 400; /* Thinned out to match the image */
  text-transform: uppercase;
  color: #ffffff;
}

.emergency-cta h3 {
  font-size: 1.8rem;
  margin: 0 0 25px 0;
  line-height: 1.3;
  font-weight: 400; /* Matched the clean, unbolded style in the new image */
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

.btn-blue:hover {
  background-color: #1976d2;
  
}

/* Bottom Cards Sizing */
.card-bot-small {
  height: 220px;
  width: 100%; 
}

.card-bot-tall {
  flex: 1;
  height: 400px;
}

/* --- Responsive Adjustments --- */
@media (max-width: 1024px) {
  .stats-main-cyan {
    padding: 2rem;
    border-radius: 30px;
    width: 100%;
  }
  .stats-left-gray {
    display: none; /* Hide the gray tail on tablets */
  }
  .stat-tagline {
    font-size: 1.3rem;
  }
}

@media (max-width: 768px) {
  .home-services {
    padding: 3rem 0;
  }
  
  .services-top-grid {
    flex-direction: column;
    height: auto;
  }

  .services-bottom-grid {
    flex-direction: column-reverse; /* Puts CTA at the bottom on mobile */
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
    height: 300px; /* Uniform height for mobile */
  }

  .stats-main-cyan {
    flex-direction: column;
    gap: 30px;
    text-align: center;
    border-radius: 20px;
  }
  
  .stat-tagline {
    max-width: 100%;
  }
  
  .emergency-cta {
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
}

/* --- About Us Section --- */
.home-about {
  background-color: #f4f5f7; /* Off-white background */
  padding: 8rem 0; /* Increased slightly for a high-end, breathable feel */
  color: #0b1a2f; /* FlowFix dark blue */
  font-family: sans-serif;
  overflow: hidden; /* Prevents horizontal scrolling from offset elements */
}

.about-container {
  /* Safe Positions Kept */
  margin-left: 8%; 
  margin-right: auto; 
  /* Swapped hard '10rem' for percentage so it scales beautifully on laptops */
  padding: 0 8%; 
  max-width: 1600px;
}

.about-header {
  /* Fixed invalid CSS syntax (was 4rem 6rem) */
  margin-bottom: 5rem; 
  padding: 0;
}

.about-header h2 {
  font-size: 3.5rem;
  font-weight: 800;
  margin: 0;
  text-transform: uppercase;
  color: #0b1a2f;
  letter-spacing: -1px; /* Tighter letter spacing for modern typography */
  line-height: 1.1;
}

.title-underline {
  width: 120px;
  height: 5px;
  background-color: #00b4d8; /* Cyan active color */
  margin-top: 20px;
  border-radius: 5px;
}

/* --- Layout Grid --- */
.about-grid {
  display: flex;
  gap: 80px; /* Widened gap for a cleaner, editorial look */
  align-items: stretch; /* Ensures both columns are the exact same height */
}

.about-col {
  flex: 1;
  display: flex;
  flex-direction: column;
  /* Magic property that aligns top/bottom items perfectly */
  justify-content: space-between; 
}

/* --- Image Boxes --- */
.about-img-box {
  position: relative;
  border-radius: 16px; /* Slightly softer corners */
  width: 100%; 
  overflow: hidden;
  /* Premium, softer shadow */
  box-shadow: 0 20px 40px rgba(11, 26, 47, 0.08);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  
}


/* ⬇️ MANUAL CONTROL: Set top image height here ⬇️ */
.img-top-left {
  height: 440px; 
}

/* ⬇️ MANUAL CONTROL: Set bottom image height to match your text here ⬇️ */
.img-bot-right {
  height: 700px; 
  overflow: visible; /* Allows the shadow to show */
  width: 82%;
  right: 18%;
 
}

.placeholder-blue {
  background-color: #0b1a2f;
  width: 100%;
  height: 100%;
  border-radius: 16px;
}


.img-bot-right img,
.img-bot-right .placeholder-blue {
  width: 105%;
  position: relative;
  z-index: 2;
 
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
  color: #4a5568; /* Slate gray for better readability than pure #333 */
}

/* Vertical Borders (Matching the Reference Image) */
.border-left {
  border-left: 4px solid #0b1a2f; 
  padding-left: 40px; 
  margin-top: 50px; 
}

.border-right {
  border-right: none; 
  padding-right: 40px;
  text-align: left; 
  margin-bottom: 50px; 
}

/* --- Timeline & Scrollable Area --- */
.timeline-wrapper {
  width: 100%;
}

.timeline-nav {
  position: relative;
  margin-bottom: 40px;
  padding: 15px 0;
  width: 85%; 
  margin-left: 0; 
  margin-right: auto; 
}

.timeline-line {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  width: 100%;
  height: 3px; /* Slightly thicker for better visibility */
  background-color: #cbd5e1; /* Softer base line */
  z-index: 1;
}

.timeline-dots {
  position: relative;
  z-index: 2;
  display: flex;
  justify-content: space-between;
}

.timeline-dots .dot {
  width: 18px; /* Slightly larger targets for better UX */
  height: 18px;
  border-radius: 50%;
  background-color: #0b1a2f;
  border: 4px solid #f4f5f7; 
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Premium snap transition */
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
  box-shadow: 0 0 15px rgba(0, 180, 216, 0.4); /* Glow effect on active */
}

/* Scrollable Container */
.scrollable-area {
  height: 350px; 
  width: 85%; 
  margin-right: auto; 
  margin-left: 0;   
  overflow-y: auto;
  position: relative;
  padding-right: 20px; /* Keeps text away from scrollbar */
  scrollbar-width: thin;
  scrollbar-color: #00b4d8 #e2e8f0;
}

/* Custom Scrollbar for Chrome/Safari */
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
  /* Fixed massive bug: 10% makes text invisible. Set to standard size */
  font-size: 1rem; 
  margin-bottom: 2.5rem;
}

/* --- Responsive Layout Stack --- */

/* Tablet Optimization (Prevents squishing before mobile snap) */
@media (max-width: 1200px) {
  .about-container {
    padding: 0 5%;
    margin-left: 5%;
  }
  .about-grid {
    gap: 40px;
  }
}

/* Mobile & Small Tablet Snap */
@media (max-width: 992px) {
  .home-about {
    padding: 5rem 0;
  }
  
  .about-container {
    margin-left: auto; /* Centers container on mobile */
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
    flex-direction: column;
    gap: 60px;
  }

  /* Reset manual heights for mobile so they look natural */
  .img-top-left,
  .img-bot-right {
    height: 400px;
    width: 100%; /* Reset offset widths */
    right: 0;
  }

  .border-right {
    border-right: none;
    border-left: 4px solid #00b4d8; /* Distinct color for mobile borders */
    padding-right: 0;
    padding-left: 30px;
    text-align: left; 
  }

  .border-left {
    border-left-color: #00b4d8;
    padding-left: 30px;
  }

  .timeline-nav,
  .scrollable-area {
    width: 100%; /* Full width on mobile */
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
  .img-bot-right {
    height: 300px; /* Even smaller for tiny screens */
  }
}


/* --- Why Choose Us Section --- */
.home-why-choose {
  background: linear-gradient(
    135deg,
    #0b1a2f 40%,
    #1a4b8c 100%
  ); /* Dark blue with gradient accent */
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
  justify-content: flex-end; /* Pushes text towards the border in reference */
}

.title-border {
  width: 4px;
  background-color: #00b4d8; /* Cyan border */
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

.line-white {
  color: #ffffff;
}

.line-cyan {
  color: #00b4d8; /* Cyan text */
}

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
  overflow: hidden; /* Keeps zoomed image inside the rounded corners */
  background-color: #d9d9d9;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Positioning based on CSS Grid */
.box-wide {
  grid-column: 1 / 3;
  grid-row: 1 / 2;
}

.box-sq-1 {
  grid-column: 1 / 2;
  grid-row: 2 / 3;
}

.box-sq-2 {
  grid-column: 2 / 3;
  grid-row: 2 / 3;
}

.box-tall {
  grid-column: 3 / 4;
  grid-row: 1 / 3;
}

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
  transform: scale(1.15); /* Zooms in when hovered */
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
  color: #0b1a2f; /* Dark blue text */
}

.info-item {
  display: flex;
  align-items: center;
  gap: 10px;
}

.info-item .arrow {
  color: #00b4d8; /* Cyan arrow for a pop of color */
  font-size: 1.2rem;
}

.why-btn {
  background-color: #0b1a2f; /* Rich dark/black color */
  color: #ffffff;
  padding: 15px 45px;
  border-radius: 50px; /* Fully rounded pill shape */
  text-decoration: none;
  font-size: 1rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 1px;
  transition: all 0.3s ease;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Soft drop shadow */
}

/* Hover Effect */
.why-btn:hover {
  background-color: #00b4d8; /* Switches to cyan on hover */
  transform: translateY(-3px); /* Slight lift effect */
  box-shadow: 0 15px 25px rgba(0, 180, 216, 0.3);
}

/* --- Responsive Adjustments --- */
@media (max-width: 992px) {
  .why-layout {
    flex-direction: column;
  }

  .why-title-col {
    justify-content: flex-start;
    width: 100%;
  }

  .why-heading {
    text-align: left;
    font-size: 3.5rem;
  }

  .why-grid {
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto auto;
  }

  .box-wide {
    grid-column: 1 / 3;
    grid-row: 1 / 2;
    height: 150px;
  }

  .box-sq-1 {
    grid-column: 1 / 2;
    grid-row: 2 / 3;
    height: 150px;
  }

  .box-sq-2 {
    grid-column: 2 / 3;
    grid-row: 2 / 3;
    height: 150px;
  }

  .box-tall {
    grid-column: 1 / 3;
    grid-row: 3 / 4;
    height: 200px;
  }

  .why-bottom-info {
    flex-direction: column;
    gap: 20px;
    align-items: flex-start;
  }
  
}

/* --- Responsive for Mobile --- */
@media (max-width: 768px) {
  .why-bottom-info {
    flex-direction: column;
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

/* Hide descriptions on mobile screens so it doesn't break off-screen */
@media (max-width: 1024px) {
  .process-desc {
    display: none; 
    /* Alternatively, you can stack the text under the pills for mobile, 
       but hiding them keeps the timeline looking clean on small screens */
  }
}

/* --- Responsive Adjustments --- */
@media (max-width: 600px) {
  .process-header .section-title {
    font-size: 2.2rem;
  }

  .process-interactive-area {
    max-width: 100%;
  }

  .process-pill {
    width: calc(50% + 22.5px); /* Adjusted for mobile circle size */
    height: 70px;
  }
  
  .pill-circle {
    width: 45px;
    height: 45px;
  }

  .pill-text {
    font-size: 1rem;
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