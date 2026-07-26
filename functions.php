<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* --------------------------------------------------------
 * 1. Theme Setup
 * -------------------------------------------------------- */
function flowfix_setup() {
    
    add_theme_support( 'title-tag' );
    
    
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'flowfix_setup' );

/* --------------------------------------------------------
 * 2. Enqueue Styles
 * -------------------------------------------------------- */
function flowfix_enqueue_scripts() {
   
    wp_enqueue_style( 'flowfix-style', get_stylesheet_uri() );

  
// Load the Global Header CSS 
    wp_enqueue_style( 'flowfix-header-style', get_template_directory_uri() . '/templates/header/template-header.css' );
    
    // Add this line: Load the Global Header JS
    wp_enqueue_script( 'flowfix-header-js', get_template_directory_uri() . '/templates/header/template-header.js', array(), '1.0', true );
   
    wp_enqueue_style( 'flowfix-footer-style', get_template_directory_uri() . '/templates/footer/template-footer.css' );

    
    if ( is_front_page() ) {
        wp_enqueue_style( 'flowfix-home-style', get_template_directory_uri() . '/templates/home/template-home.css' );
    }

    if ( is_home('home') ) {
        wp_enqueue_style( 'flowfix-home-style', get_template_directory_uri() . '/templates/home/template-home.css' );
    }

   
    if ( is_page('about') ) {
        wp_enqueue_style( 'flowfix-about-style', get_template_directory_uri() . '/templates/about/template-about.css' );
    }

    
    if ( is_page('contact') ) {
        wp_enqueue_style( 'flowfix-contact-style', get_template_directory_uri() . '/templates/contact/template-contact.css' );
    }

    if ( is_page('service')) {
        wp_enqueue_style( 'flowfix-service-style', get_template_directory_uri(), '/templates/services/template-service.css');
    }

        if ( is_page('services')) {
        wp_enqueue_style( 'flowfix-services-style', get_template_directory_uri(), '/templates/services/template-services.css');
    }


    // Load the Projects CSS and JS ONLY on the projects page
    if ( is_page('projects') ) {
        wp_enqueue_style( 'flowfix-projects-style', get_template_directory_uri() . '/templates/projects/template-projects.css' );
        wp_enqueue_script( 'flowfix-projects-js', get_template_directory_uri() . '/templates/projects/template-projects.js', array(), '1.0', true );
    }
}
add_action( 'wp_enqueue_scripts', 'flowfix_enqueue_scripts' );

/* --------------------------------------------------------
 * 3. Register 'Editables' Custom Post Type
 * -------------------------------------------------------- */
function flowfix_register_editables_cpt() {
    $labels = array(
        'name'                  => 'Editables',
        'singular_name'         => 'Editable Element',
        'menu_name'             => 'Editables',
        'add_new'               => 'Add New Element',
        'add_new_item'          => 'Add New Editable Element',
        'edit_item'             => 'Edit Element',
        'all_items'             => 'All Elements',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => false, // Keep false so they don't have single frontend URLs
        'show_ui'               => true,  // Show in admin dashboard
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-layout', // Layout icon
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'has_archive'           => false,
        'rewrite'               => false,
        'show_in_rest'          => true, // Enables the Gutenberg editor if needed
    );

    register_post_type( 'editable', $args );
}
add_action( 'init', 'flowfix_register_editables_cpt' );


/* --------------------------------------------------------
 * 5. Register 'Projects' Custom Post Type
 * -------------------------------------------------------- */
function flowfix_register_projects_cpt() {
    $args = array(
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => 'Add New Project',
            'all_items' => 'All Projects'
        ),
        'public' => true,
        'show_ui' => true,
        'menu_icon' => 'dashicons-portfolio', // Briefcase icon
        'supports' => array('title', 'thumbnail'), // We just need a title and a Featured Image
    );
    register_post_type('project', $args);
}
add_action('init', 'flowfix_register_projects_cpt');