<div class="page-contact-wrapper pt-large pb-large">
    <?php
    // Query the 'editable' CPT for the Contact page
    $contact_query = new WP_Query( array(
        'post_type'      => 'editable',
        'name'           => 'page-contact', 
        'posts_per_page' => 1,
    ) );

    // Default Fallbacks matching the wireframe structure
    $title = 'CONTACT';
    
    // Right side text section fallbacks
    $text_heading = 'Get In Touch';
    $text_body = "We are here to answer any questions you may have about our services.\n\nReach out to us and we'll respond as soon as we can.\n\nEven if there is something you have always wanted to experience and can't find it on FlowFix, let us know and we promise we'll do our best to find it for you.";
    
    $img_left = ''; // Left placeholder image

    if ( $contact_query->have_posts() ) {
        $contact_query->the_post();
        
        $dyn_title = get_post_meta( get_the_ID(), 'contact_title', true );
        if ( !empty($dyn_title) ) $title = $dyn_title;

        $dyn_heading = get_post_meta( get_the_ID(), 'contact_text_heading', true );
        if ( !empty($dyn_heading) ) $text_heading = $dyn_heading;

        $dyn_body = get_post_meta( get_the_ID(), 'contact_text_body', true );
        if ( !empty($dyn_body) ) $text_body = $dyn_body;

        $dyn_img = get_post_meta( get_the_ID(), 'contact_image', true );
        if ( !empty($dyn_img) ) $img_left = $dyn_img;

        wp_reset_postdata();
    }
    ?>

    <div class="contact-container">
        <!-- 1. Main Title -->
        <h1 class="contact-main-title"><?php echo esc_html($title); ?></h1>

        <!-- 2. Middle Section (Image/Map Left, Text Right) -->
        <div class="contact-middle flex-row mt-large">
            <div class="w-50">
                <?php if($img_left) : ?>
                    <img src="<?php echo esc_url($img_left); ?>" alt="Contact Us" class="contact-rounded-img">
                <?php else : ?>
                    <!-- Matches the gray box in the wireframe -->
                    <div class="contact-placeholder-box"></div>
                <?php endif; ?>
            </div>
            
            <div class="w-50 contact-text-content">
                <h2><?php echo esc_html($text_heading); ?></h2>
                <!-- wpautop automatically turns line breaks into paragraph tags -->
                <?php echo wpautop(esc_html($text_body)); ?>
            </div>
        </div>

        <!-- 3. Bottom Dark Section -->
        <div class="contact-bottom-bar mt-xlarge">
            <!-- Left empty as per the wireframe, ready for a map, CTA, or form later -->
        </div>
    </div>
</div>
