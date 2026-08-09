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


// Load Custom Theme Options Dashboard
require_once get_template_directory() . '/theme-options.php';


function flowfix_enqueue_assets() {
    // Load the main stylesheet
    wp_enqueue_style('flowfix-style', get_stylesheet_uri(), array(), '1.0.0');

    // Load the custom JavaScript file (Make sure you create a 'main.js' file in an 'assets/js' folder!)
    wp_enqueue_script('flowfix-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'flowfix_enqueue_assets');

function flowfix_theme_setup() {
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable Featured Images
    add_theme_support('post-thumbnails');
    
    // HTML5 Support for cleaner markup
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'flowfix_theme_setup');

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


// Enqueue WP Media Uploader for our Theme Options
function flowfix_admin_scripts($hook) {
    // Only load these scripts on our custom FlowFix settings page
    if (strpos($hook, 'flowfix') !== false) {
        wp_enqueue_media(); // Loads the WP Media Library
    }
}
add_action('admin_enqueue_scripts', 'flowfix_admin_scripts');


/// ==========================================
// CUSTOM METABOX (FULL LAYOUT VERSION)
// ==========================================

function flowfix_enqueue_meta_media($hook) {
    if ($hook == 'post.php' || $hook == 'post-new.php') {
        wp_enqueue_media();
    }
}
add_action('admin_enqueue_scripts', 'flowfix_enqueue_meta_media');

function flowfix_add_service_metabox() {
    add_meta_box(
        'flowfix_service_meta',           
        'Service Page Content',            
        'flowfix_service_metabox_html',   
        'page',                           
        'normal',                         
        'high'                            
    );
}
add_action('add_meta_boxes', 'flowfix_add_service_metabox');

function flowfix_service_metabox_html($post) {
    wp_nonce_field('flowfix_save_meta', 'flowfix_meta_nonce');
    
    // Retrieve existing values
    $top_text = get_post_meta($post->ID, 'service_top_text', true);
    $top_image = get_post_meta($post->ID, 'service_top_image', true);
    $side_image = get_post_meta($post->ID, 'service_side_image', true);
    $service_text = get_post_meta($post->ID, 'service_custom_text', true);
    ?>
    <div style="padding: 10px 0;">
        <p><em>Note: The absolute top Hero Image is controlled by the "Featured Image" box on the right sidebar.</em></p>
        
        <h3 style="background:#f0f0f1; padding:10px; margin-top:20px;">1. Light Gray Area (Top Section)</h3>
        
        <label style="display:block; font-weight:bold; margin-bottom:5px;">Top Section Text (HTML allowed):</label>
        <textarea name="service_top_text" rows="6" style="width: 100%; font-family: monospace; margin-bottom:15px;"><?php echo esc_textarea($top_text); ?></textarea>

        <label style="display:block; font-weight:bold; margin-bottom:5px;">Top Section SVG/Icon URL:</label>
        <div style="display: flex; gap: 10px; margin-bottom: 20px;">
            <input type="text" name="service_top_image" value="<?php echo esc_attr($top_image); ?>" class="large-text ff-meta-image-url" style="width: 70%;" />
            <input type="button" class="button button-secondary ff-meta-upload-btn" value="Upload SVG/Image" />
        </div>

        <h3 style="background:#f0f0f1; padding:10px; margin-top:20px;">2. Dark Blue 50/50 Split (Bottom Section)</h3>
        
        <label style="display:block; font-weight:bold; margin-bottom:5px;">Left Side Photo URL:</label>
        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
            <input type="text" name="service_side_image" value="<?php echo esc_attr($side_image); ?>" class="large-text ff-meta-image-url" style="width: 70%;" />
            <input type="button" class="button button-secondary ff-meta-upload-btn" value="Upload Image" />
        </div>
        
        <label style="display:block; font-weight:bold; margin-bottom:5px;">Right Side Dark Box Text (HTML allowed):</label>
        <textarea name="service_custom_text" rows="8" style="width: 100%; font-family: monospace;"><?php echo esc_textarea($service_text); ?></textarea>
    </div>
    
    <script>
    jQuery(document).ready(function($){
        $('.ff-meta-upload-btn').click(function(e) {
            e.preventDefault();
            var button = $(this);
            var inputField = button.siblings('.ff-meta-image-url');
            var customUploader = wp.media({
                title: 'Select Image',
                button: { text: 'Use this image' },
                multiple: false
            });
            customUploader.on('select', function() {
                var attachment = customUploader.state().get('selection').first().toJSON();
                inputField.val(attachment.url);
            });
            customUploader.open();
        });
    });
    </script>
    <?php
}

function flowfix_save_service_meta($post_id) {
    if (!isset($_POST['flowfix_meta_nonce']) || !wp_verify_nonce($_POST['flowfix_meta_nonce'], 'flowfix_save_meta')) return;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_page', $post_id)) return;

    if (isset($_POST['service_top_text'])) update_post_meta($post_id, 'service_top_text', wp_kses_post($_POST['service_top_text']));
    if (isset($_POST['service_top_image'])) update_post_meta($post_id, 'service_top_image', sanitize_text_field($_POST['service_top_image']));
    if (isset($_POST['service_side_image'])) update_post_meta($post_id, 'service_side_image', sanitize_text_field($_POST['service_side_image']));
    if (isset($_POST['service_custom_text'])) update_post_meta($post_id, 'service_custom_text', wp_kses_post($_POST['service_custom_text']));
}
add_action('save_post', 'flowfix_save_service_meta');


function flowfix_register_menus() {
    register_nav_menus(array(
        'primary' => 'Primary Header Menu'
    ));
}
add_action('after_setup_theme', 'flowfix_register_menus');



/* ==========================================
   PROCESS CONTACT FORM & CREATE USER
   ========================================== */
add_action('admin_post_nopriv_submit_lead', 'ff_handle_lead_submission');
add_action('admin_post_submit_lead', 'ff_handle_lead_submission');

function ff_handle_lead_submission() {
    // 1. SECURITY CHECK: Verify the Nonce
    if (!isset($_POST['lead_nonce']) || !wp_verify_nonce($_POST['lead_nonce'], 'submit_lead_action')) {
        wp_die('Security check failed. Please refresh the page and try again.');
    }

    // 2. Check if the required form data exists
    if (isset($_POST['email']) && isset($_POST['fname'])) {
        
        // Sanitize Inputs
        $fname   = sanitize_text_field($_POST['fname']);
        $lname   = sanitize_text_field($_POST['lname']);
        $email   = sanitize_email($_POST['email']);
        $phone   = sanitize_text_field($_POST['phone']);
        $service = sanitize_text_field($_POST['service']);
        $message = sanitize_textarea_field($_POST['message']);
        
        $full_name = $fname . ' ' . $lname;

        // 3. Create the Lead inside your custom dashboard page
        $lead_id = wp_insert_post(array(
            'post_title'   => 'New Lead: ' . $full_name . ' (' . $service . ')',
            'post_type'    => 'ff_lead',
            'post_status'  => 'publish', 
        ));

        // Save the custom fields
        if ($lead_id) {
            update_post_meta($lead_id, 'lead_email', $email);
            update_post_meta($lead_id, 'lead_phone', $phone);
            update_post_meta($lead_id, 'lead_service', $service);
            update_post_meta($lead_id, 'lead_message', $message);
        }

        // 4. Create the WordPress User
        if (!email_exists($email)) {
            $random_password = wp_generate_password(12, false);
            $user_id = wp_create_user($email, $random_password, $email);
            
            if (!is_wp_error($user_id)) {
                wp_update_user(array(
                    'ID'           => $user_id,
                    'display_name' => $full_name,
                    'first_name'   => $fname,
                    'last_name'    => $lname
                ));
            }
        }

        // 5. EMAIL NOTIFICATION TO ADMIN
        $admin_email = get_option('admin_email'); // Pulls the main WP admin email
        $subject = 'New Website Lead: ' . $full_name;
        $email_body = "You have received a new quote request from the FlowFix website.\n\n" .
                      "Name: $full_name\n" .
                      "Email: $email\n" .
                      "Phone: $phone\n" .
                      "Service Needed: $service\n\n" .
                      "Message:\n$message\n\n" .
                      "Check your WordPress Leads Dashboard for more details.";
        
        wp_mail($admin_email, $subject, $email_body);

        // 6. Redirect back with success message
        $redirect_url = add_query_arg('status', 'success', wp_get_referer());
        wp_safe_redirect($redirect_url);
        exit;
    }
}

/* ==========================================
   CUSTOM LEADS / QUOTATIONS POST TYPE
   ========================================== */
function ff_register_leads_cpt() {
    register_post_type('ff_lead', array(
        'labels' => array(
            'name'               => 'Leads / Quotations',
            'singular_name'      => 'Lead',
            'add_new_item'       => 'Add New Lead',
            'edit_item'          => 'View Lead',
            'search_items'       => 'Search Leads',
            'not_found'          => 'No leads found.'
        ),
        'public'              => false, // False means no frontend single pages
        'show_ui'             => true,  // This forces it to show in the admin dashboard!
        'show_in_menu'        => true,
        'menu_position'       => 21,
        'menu_icon'           => 'dashicons-clipboard', 
        'supports'            => array('title', 'custom-fields'),
        'capability_type'     => 'post',
    ));
}
add_action('init', 'ff_register_leads_cpt');


/* ==========================================
   CUSTOMIZE THE LEADS DASHBOARD COLUMNS
   ========================================== */

// 1. Define the specific columns we want to show
add_filter('manage_ff_lead_posts_columns', 'ff_set_custom_lead_columns');
function ff_set_custom_lead_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb']; // The checkbox for bulk actions
    $new_columns['title'] = 'Lead Name';
    $new_columns['lead_email'] = 'Email Address';
    $new_columns['lead_phone'] = 'Phone Number';
    $new_columns['lead_service'] = 'Service Requested';
    $new_columns['date'] = 'Date Received';
    
    return $new_columns;
}

// 2. Populate those columns with the data we saved
add_action('manage_ff_lead_posts_custom_column', 'ff_custom_lead_column_data', 10, 2);
function ff_custom_lead_column_data($column, $post_id) {
    switch ($column) {
        case 'lead_email':
            $email = get_post_meta($post_id, 'lead_email', true);
            echo '<a href="mailto:' . esc_attr($email) . '">' . esc_html($email) . '</a>';
            break;
            
        case 'lead_phone':
            $phone = get_post_meta($post_id, 'lead_phone', true);
            echo esc_html($phone);
            break;
            
        case 'lead_service':
            $service = get_post_meta($post_id, 'lead_service', true);
            // Makes the service look clean (e.g., changes "hot-water" to "Hot Water")
            echo '<strong>' . esc_html(ucwords(str_replace('-', ' ', $service))) . '</strong>';
            break;
    }
}