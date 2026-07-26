<?php


// ============================================================
// 3. HERO TEMPLATE (with fallback & parallax)
// ============================================================
function flowflix_render_hero($post_id = null) {
    // If no post_id provided, get the most recent hero
    if (!$post_id) {
        $hero_posts = get_posts(array(
            'post_type' => 'hero',
            'posts_per_page' => 1,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',
        ));
        if (!empty($hero_posts)) {
            $post_id = $hero_posts[0]->ID;
        } else {
            // Fallback: use default values (no DB content)
            return flowflix_hero_fallback();
        }
    }

    $post = get_post($post_id);
    if (!$post || $post->post_type !== 'hero') {
        return flowflix_hero_fallback();
    }

    // --- COLLECT VARIABLES with fallbacks ---

    // 1. Tagline (ACF or fallback)
    $tagline = get_field('hero_tagline', $post_id);
    if (empty($tagline)) {
        $tagline = 'Welcome to FlowFlix'; // default from image
    }

    // 2. Main Title (ACF or use post title, then fallback)
    $title = get_field('hero_title', $post_id);
    if (empty($title)) {
        $title = get_the_title($post_id);
    }
    if (empty($title)) {
        $title = 'Fast, Reliable, Licensed, 24/7 Emergency Plumbing.';
    }

    // 3. Button Text
    $button_text = get_field('hero_button_text', $post_id);
    if (empty($button_text)) {
        $button_text = 'contact us';
    }

    // 4. Button URL
    $button_url = get_field('hero_button_url', $post_id);
    if (empty($button_url)) {
        $button_url = '#contact';
    }

    // 5. Background Image
    $bg_image_url = get_field('hero_background_image', $post_id);
    if (empty($bg_image_url)) {
        // Fallback: featured image, then hardcoded fallback
        $thumb_id = get_post_thumbnail_id($post_id);
        if ($thumb_id) {
            $thumb_url = wp_get_attachment_image_url($thumb_id, 'full');
            if ($thumb_url) {
                $bg_image_url = $thumb_url;
            }
        }
    }
    if (empty($bg_image_url)) {
        // Final fallback: a placeholder gradient or a default image
        $bg_image_url = ''; // Will be handled by CSS fallback
    }

    // 6. Unique ID for parallax & styling
    $hero_id = 'hero-' . $post_id;

    // --- OUTPUT HTML with structured variables ---
    ob_start();
    ?>
    <section id="<?php echo esc_attr($hero_id); ?>" class="flowflix-hero">
        <div class="hero-parallax-bg" style="background-image: url('<?php echo esc_url($bg_image_url); ?>');">
            <div class="hero-overlay"></div>
        </div>
        <div class="hero-content container">
            <div class="hero-inner">
                <span class="hero-tagline"><?php echo esc_html($tagline); ?></span>
                <h1 class="hero-title"><?php echo esc_html($title); ?></h1>
                <a href="<?php echo esc_url($button_url); ?>" class="hero-button">
                    <?php echo esc_html($button_text); ?>
                </a>
            </div>
        </div>
    </section>

    <?php
    return ob_get_clean();
}