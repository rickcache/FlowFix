
<div class="page-about-wrapper">
    <?php
    // Query the 'editable' CPT for the About page
    $about_query = new WP_Query( array(
        'post_type'      => 'editable',
        'name'           => 'page-about', 
        'posts_per_page' => 1,
    ) );

    // Default Fallbacks based on your provided text and wireframe
    $title = 'ABOUT US';
    
    // Splitting your text to match the 5 staggered blocks in the design
    $text_1 = "At FlowFix Plumbing, we believe every home and business deserves plumbing services they can rely on. Since our founding, we've built our reputation by delivering prompt, high-quality workmanship with honest communication and transparent pricing.";
    $text_2 = "Whether it's a minor leak, a blocked drain, or a major plumbing emergency, our licensed team is committed to providing solutions that last. We combine years of industry experience with modern tools and proven techniques to handle projects of every size.";
    $text_3 = "From emergency repairs and hot water system installations to gas fitting and complete plumbing upgrades, every job is completed with careful attention to safety, quality, and efficiency. Our goal is not just to fix today's problem, but to help prevent tomorrow's.";
    $text_4 = "What truly sets FlowFix Plumbing apart is our customer-first approach. We arrive on time, explain every step of the process, and ensure you're confident in the work before we leave.";
    $text_5 = "By focusing on reliability, professionalism, and long-term relationships, we've become a trusted plumbing partner for homeowners and businesses across Sydney.";

    $img_1 = '';
    $img_2 = '';
    $img_3 = '';

    // CTA Fallbacks
    $cta_title = 'Book A Quotation';
    $cta_sub = 'Lets Get your Started';
    $cta_btn = 'BOOK NOW';
    $cta_link = site_url('/contact');

    if ( $about_query->have_posts() ) {
        $about_query->the_post();
        
        $dyn_title = get_post_meta( get_the_ID(), 'about_page_title', true );
        if ( !empty($dyn_title) ) $title = $dyn_title;

        // Dynamic Texts
        for ($i = 1; $i <= 5; $i++) {
            $dyn_text = get_post_meta( get_the_ID(), 'about_text_' . $i, true );
            if ( !empty($dyn_text) ) ${"text_$i"} = $dyn_text;
        }

        // Dynamic Images
        for ($i = 1; $i <= 3; $i++) {
            $dyn_img = get_post_meta( get_the_ID(), 'about_image_' . $i, true );
            if ( !empty($dyn_img) ) ${"img_$i"} = $dyn_img;
        }

        // Dynamic CTA
        $dyn_cta_title = get_post_meta( get_the_ID(), 'about_cta_title', true );
        if ( !empty($dyn_cta_title) ) $cta_title = $dyn_cta_title;

        $dyn_cta_sub = get_post_meta( get_the_ID(), 'about_cta_sub', true );
        if ( !empty($dyn_cta_sub) ) $cta_sub = $dyn_cta_sub;

        $dyn_cta_btn = get_post_meta( get_the_ID(), 'about_cta_btn', true );
        if ( !empty($dyn_cta_btn) ) $cta_btn = $dyn_cta_btn;

        $dyn_cta_link = get_post_meta( get_the_ID(), 'about_cta_link', true );
        if ( !empty($dyn_cta_link) ) $cta_link = $dyn_cta_link;

        wp_reset_postdata();
    }
    ?>

    <!-- Section 1: Light Base & Title -->
    <section class="about-sec about-light pt-large pb-xlarge">
        <div class="about-container">
            <h1 class="about-main-title"><?php echo esc_html($title); ?></h1>
            <div class="about-text-box w-50">
                <p><?php echo esc_html($text_1); ?></p>
            </div>
        </div>
    </section>

    <!-- Section 2: Dark Band (Img Left, Text Right) -->
    <section class="about-sec about-dark pb-xlarge">
        <div class="about-container flex-row">
            <div class="about-img-box pull-up">
                <?php if($img_1) : ?>
                    <img src="<?php echo esc_url($img_1); ?>" alt="About FlowFix">
                <?php else : ?>
                    <div class="placeholder-box"></div>
                <?php endif; ?>
            </div>
            <div class="about-text-box w-50 text-white text-right-desktop">
                <p><?php echo esc_html($text_2); ?></p>
            </div>
        </div>
    </section>

    <!-- Section 3: Light Band (Text Left, Img Right) -->
    <section class="about-sec about-light pb-xlarge">
        <div class="about-container flex-row">
            <div class="about-text-box w-50">
                <p><?php echo esc_html($text_3); ?></p>
            </div>
            <div class="about-img-box pull-up">
                <?php if($img_2) : ?>
                    <img src="<?php echo esc_url($img_2); ?>" alt="Our Experience">
                <?php else : ?>
                    <div class="placeholder-box placeholder-dark"></div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Section 4: Dark Band (Img Left, Text Right) -->
    <section class="about-sec about-dark pb-medium">
        <div class="about-container flex-row">
            <div class="about-img-box pull-up">
                <?php if($img_3) : ?>
                    <img src="<?php echo esc_url($img_3); ?>" alt="Our Team">
                <?php else : ?>
                    <div class="placeholder-box"></div>
                <?php endif; ?>
            </div>
            <div class="about-text-box w-50 text-white text-right-desktop">
                <p><?php echo esc_html($text_4); ?></p>
            </div>
        </div>
    </section>

    <!-- Section 5: Light Base, Final Text & CTA -->
    <section class="about-sec about-light pt-medium pb-large">
        <div class="about-container">
            <div class="about-text-box w-50 align-right-box mb-xlarge">
                <p><?php echo esc_html($text_5); ?></p>
            </div>

            <!-- CTA Block (Reused style from Testimonials) -->
            <div class="about-cta-box">
                <div class="cta-text">
                    <h3><?php echo esc_html($cta_title); ?></h3>
                    <p><?php echo esc_html($cta_sub); ?></p>
                </div>
                <div class="cta-action">
                    <a href="<?php echo esc_url($cta_link); ?>" class="btn-gray"><?php echo esc_html($cta_btn); ?></a>
                </div>
            </div>
        </div>
    </section>

</div>
