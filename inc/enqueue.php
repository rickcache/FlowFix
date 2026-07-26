<?php
/**
 * Enqueue Scripts & Styles
 * Location: /assets/inc/enqueue.php
 * 
 * @package FlowFlix
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// ============================================================
// 1. ENQUEUE STYLES
// ============================================================
function flowflix_enqueue_styles() {
    // Main theme stylesheet
    wp_enqueue_style(
        'flowflix-main-style',
        get_template_directory_uri() . '/style.css',
        array(),
        '1.0.0'
    );
    
    // Hero template CSS (only on home page)
    if (is_page_template('home')) {
        wp_enqueue_style(
            'flowflix-hero-style',
            get_template_directory_uri() . '/assets/templates/home/template-home.css',
            array('flowflix-main-style'),
            '1.0.0'
        );
    }
    
    // Additional styles for other templates if needed
    if (is_page_template('about')) {
        wp_enqueue_style(
            'flowflix-about-style',
            get_template_directory_uri() . '/assets/templates/about/template-about.css',
            array('flowflix-main-style'),
            '1.0.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'flowflix_enqueue_styles');

// ============================================================
// 2. ENQUEUE SCRIPTS
// ============================================================
function flowflix_enqueue_scripts() {
    // jQuery (already included in WordPress)
    
    // Hero parallax script (only on home page)
    if (is_page_template('home')) {
        wp_enqueue_script(
            'flowflix-hero-parallax',
            get_template_directory_uri() . '/assets/js/hero-parallax.js',
            array('jquery'),
            '1.0.0',
            true // Load in footer
        );
        
        // Localize script for dynamic data if needed
        wp_localize_script('flowflix-hero-parallax', 'flowflix_hero', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('flowflix_hero_nonce'),
        ));
    }
    
    // Main theme scripts
    wp_enqueue_script(
        'flowflix-main-scripts',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'flowflix_enqueue_scripts');

// ============================================================
// 3. ADMIN ENQUEUE (for dashboard)
// ============================================================
function flowflix_admin_enqueue_scripts($hook) {
    // Only load on hero post type edit screen
    if ($hook === 'post.php' || $hook === 'post-new.php') {
        $screen = get_current_screen();
        if ($screen && $screen->post_type === 'hero') {
            wp_enqueue_style(
                'flowflix-admin-hero',
                get_template_directory_uri() . '/assets/css/admin-hero.css',
                array(),
                '1.0.0'
            );
            
            wp_enqueue_script(
                'flowflix-admin-hero',
                get_template_directory_uri() . '/assets/js/admin-hero.js',
                array('jquery'),
                '1.0.0',
                true
            );
        }
    }
}
add_action('admin_enqueue_scripts', 'flowflix_admin_enqueue_scripts');

// ============================================================
// 4. INLINE STYLES (for critical CSS)
// ============================================================
function flowflix_inline_styles() {
    // Add critical CSS inline for faster loading
    if (is_page_template('home')) {
        ?>
        <style>
            /* Critical hero styles to prevent FOUC */
            .flowflix-hero {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 500px;
                overflow: hidden;
                position: relative;
                width: 100%;
            }
            .hero-parallax-bg {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-size: cover;
                background-position: center;
                z-index: 0;
            }
            .hero-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.35);
                z-index: 1;
            }
            .hero-content {
                position: relative;
                z-index: 2;
                width: 100%;
                max-width: 1200px;
                padding: 0 1.5rem;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'flowflix_inline_styles', 1);