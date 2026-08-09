<?php
/**
 * FlowFix Custom Theme Options (Native PHP) - Includes Home, Services, and About Pages
 */

// 1. Create the Menu & Submenus (Fixed the missing slash in the comment)
function flowfix_admin_menu() {
    // Main Menu (Home)
    add_menu_page('FlowFix Options', 'FlowFix', 'manage_options', 'flowfix-home', 'flowfix_home_admin_page', 'dashicons-building', 59);
    add_submenu_page('flowfix-home', 'Home Page Settings', 'Home Page', 'manage_options', 'flowfix-home', 'flowfix_home_admin_page');
    
    // Services Page Submenu
    add_submenu_page('flowfix-home', 'Services Page', 'Services Page', 'manage_options', 'flowfix-services-page', 'flowfix_services_page_admin');

    //  About Page Submenu
    add_submenu_page('flowfix-home', 'About Page', 'About Page', 'manage_options', 'flowfix-about-page', 'flowfix_about_page_admin');

    // Contact Page Submenu 
    add_submenu_page('flowfix-home', 'Contact Page', 'Contact Page', 'manage_options', 'flowfix-contact-page', 'flowfix_contact_page_admin');

    // Projects Page Submenu 
    add_submenu_page('flowfix-home', 'Projects Page', 'Projects Page', 'manage_options', 'flowfix-projects-page', 'flowfix_projects_page_admin');

    // Header Page Submenu 
    add_submenu_page('flowfix-home', 'Header Page', 'Header Page', 'manage_options', 'flowfix-header-page', 'flowfix_header_page_admin');

    // Footer Page Submenu 
    add_submenu_page('flowfix-home', 'Footer Page', 'Footer Page', 'manage_options', 'flowfix-footer-page', 'flowfix_footer_page_admin');
}
// Ensure your menu is actually hooking into WordPress properly
add_action('admin_menu', 'flowfix_admin_menu');


// 2. Reusable HTML Callbacks for Inputs
function ff_text_input_callback($args) {
    $option = get_option($args[0]);
    echo '<input type="text" id="'. esc_attr($args[0]) .'" name="'. esc_attr($args[0]) .'" value="' . esc_attr($option) . '" class="regular-text" style="width: 100%; max-width: 600px;" />';
}

function ff_textarea_callback($args) {
    $option = get_option($args[0]);
    echo '<textarea id="'. esc_attr($args[0]) .'" name="'. esc_attr($args[0]) .'" rows="4" class="large-text" style="width: 100%; max-width: 600px;">' . esc_textarea($option) . '</textarea>';
}

function ff_image_upload_callback($args) {
    $option = get_option($args[0]);
    echo '<div class="ff-image-uploader" style="display: flex; gap: 10px; align-items: flex-start;">';
    echo '<div>';
    echo '<input type="text" id="'. esc_attr($args[0]) .'" name="'. esc_attr($args[0]) .'" value="' . esc_attr($option) . '" class="regular-text ff-image-url" />';
    echo '<input type="button" class="button ff-upload-btn" value="Upload / Select Image" style="margin-top: 5px; display: block;" />';
    echo '</div>';
    if ($option) {
        echo '<div class="image-preview" style="border: 1px solid #ccc; padding: 3px; border-radius: 4px; background: #fff;">';
        echo '<img src="'.esc_url($option).'" style="max-width: 100px; height: auto; display: block;" />';
        echo '</div>';
    }
    echo '</div>';
}

 //======================== ADDS THE FIELDS =============================== //
// 3. Register All Settings
function flowfix_register_settings() {
    
    // ========== HOME PAGE SETTINGS ==========
    
    // Hero
    register_setting('ff_hero_group', 'ff_hero_title');
    register_setting('ff_hero_group', 'ff_hero_subtitle');
    register_setting('ff_hero_group', 'ff_hero_btn_text');
    register_setting('ff_hero_group', 'ff_hero_btn_link');
    register_setting('ff_hero_group', 'ff_hero_bg_image');
    add_settings_section('ff_hero_sec', 'Hero Section Settings', null, 'ff-hero');
    add_settings_field('ff_hero_title', 'Hero Title', 'ff_text_input_callback', 'ff-hero', 'ff_hero_sec', array('ff_hero_title'));
    add_settings_field('ff_hero_subtitle', 'Hero Subtitle', 'ff_textarea_callback', 'ff-hero', 'ff_hero_sec', array('ff_hero_subtitle'));
    add_settings_field('ff_hero_btn_text', 'Button Text', 'ff_text_input_callback', 'ff-hero', 'ff_hero_sec', array('ff_hero_btn_text'));
    add_settings_field('ff_hero_btn_link', 'Button Link', 'ff_text_input_callback', 'ff-hero', 'ff_hero_sec', array('ff_hero_btn_link'));
    add_settings_field('ff_hero_bg_image', 'Background Image', 'ff_image_upload_callback', 'ff-hero', 'ff_hero_sec', array('ff_hero_bg_image'));
    for ($i=1; $i<=3; $i++) {
        register_setting('ff_hero_group', 'ff_hero_card_'.$i.'_text');
        add_settings_field('ff_hero_card_'.$i.'_text', 'Card '.$i.' Text', 'ff_text_input_callback', 'ff-hero', 'ff_hero_sec', array('ff_hero_card_'.$i.'_text'));
    }

    // Services
   
    register_setting('ff_services_group', 'ff_services_heading');
    add_settings_section('ff_services_sec', 'Services Main Settings', null, 'ff-services');
    add_settings_field('ff_services_heading', 'Main Heading', 'ff_text_input_callback', 'ff-services', 'ff_services_sec', array('ff_services_heading'));
    for ($i=1; $i<=6; $i++) {
        register_setting('ff_services_group', 'ff_service_card_'.$i.'_title');
        register_setting('ff_services_group', 'ff_service_card_'.$i.'_img'); // <-- ADDED THIS
        add_settings_field('ff_service_card_'.$i.'_title', 'Service '.$i.' Title', 'ff_text_input_callback', 'ff-services', 'ff_services_sec', array('ff_service_card_'.$i.'_title'));
        add_settings_field('ff_service_card_'.$i.'_img', 'Service '.$i.' Image', 'ff_image_upload_callback', 'ff-services', 'ff_services_sec', array('ff_service_card_'.$i.'_img')); // <-- ADDED THIS
    }
    // About
    register_setting('ff_about_group', 'ff_about_heading');
    register_setting('ff_about_group', 'ff_about_left_title');
    register_setting('ff_about_group', 'ff_about_left_text');
    register_setting('ff_about_group', 'ff_about_img_left');
    register_setting('ff_about_group', 'ff_about_img_right');
    add_settings_section('ff_about_sec', 'About Us Settings', null, 'ff-about');
    add_settings_field('ff_about_heading', 'Heading', 'ff_text_input_callback', 'ff-about', 'ff_about_sec', array('ff_about_heading'));
    add_settings_field('ff_about_left_title', 'Left Side Title', 'ff_text_input_callback', 'ff-about', 'ff_about_sec', array('ff_about_left_title'));
    add_settings_field('ff_about_left_text', 'Left Side Text', 'ff_textarea_callback', 'ff-about', 'ff_about_sec', array('ff_about_left_text'));
    add_settings_field('ff_about_img_left', 'Left Image', 'ff_image_upload_callback', 'ff-about', 'ff_about_sec', array('ff_about_img_left'));
    add_settings_field('ff_about_img_right', 'Right Image', 'ff_image_upload_callback', 'ff-about', 'ff_about_sec', array('ff_about_img_right'));
    for ($i=1; $i<=5; $i++) {
        register_setting('ff_about_group', 'ff_about_para_'.$i.'_title');
        register_setting('ff_about_group', 'ff_about_para_'.$i.'_text');
        add_settings_field('ff_about_para_'.$i.'_title', 'Timeline '.$i.' Title', 'ff_text_input_callback', 'ff-about', 'ff_about_sec', array('ff_about_para_'.$i.'_title'));
        add_settings_field('ff_about_para_'.$i.'_text', 'Timeline '.$i.' Text', 'ff_textarea_callback', 'ff-about', 'ff_about_sec', array('ff_about_para_'.$i.'_text'));
    }

    // Process
    register_setting('ff_process_group', 'ff_process_heading');
    add_settings_section('ff_process_sec', 'Process Settings', null, 'ff-process');
    add_settings_field('ff_process_heading', 'Heading', 'ff_text_input_callback', 'ff-process', 'ff_process_sec', array('ff_process_heading'));
    for ($i=1; $i<=5; $i++) {
        register_setting('ff_process_group', 'ff_process_step_'.$i.'_title');
        register_setting('ff_process_group', 'ff_process_step_'.$i.'_desc');
        add_settings_field('ff_process_step_'.$i.'_title', 'Step '.$i.' Title', 'ff_text_input_callback', 'ff-process', 'ff_process_sec', array('ff_process_step_'.$i.'_title'));
        add_settings_field('ff_process_step_'.$i.'_desc', 'Step '.$i.' Description', 'ff_textarea_callback', 'ff-process', 'ff_process_sec', array('ff_process_step_'.$i.'_desc'));
    }


    // ========== HOMEPAGE: WHY CHOOSE US ==========
    register_setting('ff_why_group', 'ff_why_title_1');
    register_setting('ff_why_group', 'ff_why_title_2');
    register_setting('ff_why_group', 'ff_why_title_3');
    register_setting('ff_why_group', 'ff_why_box_link');
    register_setting('ff_why_group', 'ff_why_phone');
    register_setting('ff_why_group', 'ff_why_email');
    register_setting('ff_why_group', 'ff_why_btn_text');
    register_setting('ff_why_group', 'ff_why_btn_link');
    
    add_settings_section('ff_why_sec', 'Why Choose Us Settings', null, 'ff-why');
    
    add_settings_field('ff_why_title_1', 'Title Line 1 (WHY)', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_title_1'));
    add_settings_field('ff_why_title_2', 'Title Line 2 (CHOOSE)', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_title_2'));
    add_settings_field('ff_why_title_3', 'Title Line 3 (US)', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_title_3'));
    add_settings_field('ff_why_box_link', 'Box Link URL', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_box_link'));
    add_settings_field('ff_why_phone', 'Phone Number', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_phone'));
    add_settings_field('ff_why_email', 'Email Address', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_email'));
    add_settings_field('ff_why_btn_text', 'Button Text', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_btn_text'));
    add_settings_field('ff_why_btn_link', 'Button Link', 'ff_text_input_callback', 'ff-why', 'ff_why_sec', array('ff_why_btn_link'));
    
    for ($i=1; $i<=4; $i++) {
        register_setting('ff_why_group', 'ff_why_image_'.$i);
        add_settings_field('ff_why_image_'.$i, 'Grid Image '.$i, 'ff_image_upload_callback', 'ff-why', 'ff_why_sec', array('ff_why_image_'.$i));
    }

    // ========== HOMEPAGE: FEATURED PROJECTS ==========
    register_setting('ff_home_proj_group', 'ff_projects_title_1');
    register_setting('ff_home_proj_group', 'ff_projects_title_2');
    
    add_settings_section('ff_home_proj_sec', 'Featured Projects (Homepage)', null, 'ff-home-proj');
    
    add_settings_field('ff_projects_title_1', 'Title Line 1', 'ff_text_input_callback', 'ff-home-proj', 'ff_home_proj_sec', array('ff_projects_title_1'));
    add_settings_field('ff_projects_title_2', 'Title Line 2', 'ff_text_input_callback', 'ff-home-proj', 'ff_home_proj_sec', array('ff_projects_title_2'));
    
    for ($i=1; $i<=3; $i++) {
        register_setting('ff_home_proj_group', 'ff_project_image_'.$i);
        add_settings_field('ff_project_image_'.$i, 'Parallax Image '.$i, 'ff_image_upload_callback', 'ff-home-proj', 'ff_home_proj_sec', array('ff_project_image_'.$i));
    }

    // Testimonials
    register_setting('ff_testi_group', 'ff_testi_heading');
    register_setting('ff_testi_group', 'ff_testi_subheading');
    add_settings_section('ff_testi_sec', 'Testimonials Settings', null, 'ff-testi');
    add_settings_field('ff_testi_heading', 'Heading', 'ff_text_input_callback', 'ff-testi', 'ff_testi_sec', array('ff_testi_heading'));
    add_settings_field('ff_testi_subheading', 'Subheading', 'ff_text_input_callback', 'ff-testi', 'ff_testi_sec', array('ff_testi_subheading'));
    for ($i=1; $i<=6; $i++) {
        register_setting('ff_testi_group', 'ff_testi_'.$i.'_name');
        register_setting('ff_testi_group', 'ff_testi_'.$i.'_text');
        register_setting('ff_testi_group', 'ff_testi_'.$i.'_img');
        add_settings_field('ff_testi_'.$i.'_name', 'Client '.$i.' Name', 'ff_text_input_callback', 'ff-testi', 'ff_testi_sec', array('ff_testi_'.$i.'_name'));
        add_settings_field('ff_testi_'.$i.'_text', 'Client '.$i.' Review', 'ff_textarea_callback', 'ff-testi', 'ff_testi_sec', array('ff_testi_'.$i.'_text'));
        add_settings_field('ff_testi_'.$i.'_img', 'Client '.$i.' Image', 'ff_image_upload_callback', 'ff-testi', 'ff_testi_sec', array('ff_testi_'.$i.'_img'));
    }

    // ========== SERVICES PAGE SETTINGS ==========
    
    register_setting('ff_sp_group', 'ff_sp_main_title');
    register_setting('ff_sp_group', 'ff_sp_cta_title');
    register_setting('ff_sp_group', 'ff_sp_cta_sub');
    register_setting('ff_sp_group', 'ff_sp_cta_btn_text');
    register_setting('ff_sp_group', 'ff_sp_cta_btn_link');

    add_settings_section('ff_sp_main_sec', 'Page Header & CTA', null, 'ff-sp');
    add_settings_field('ff_sp_main_title', 'Main Page Title', 'ff_text_input_callback', 'ff-sp', 'ff_sp_main_sec', array('ff_sp_main_title'));
    add_settings_field('ff_sp_cta_title', 'CTA Title', 'ff_text_input_callback', 'ff-sp', 'ff_sp_main_sec', array('ff_sp_cta_title'));
    add_settings_field('ff_sp_cta_sub', 'CTA Subtitle', 'ff_textarea_callback', 'ff-sp', 'ff_sp_main_sec', array('ff_sp_cta_sub'));
    add_settings_field('ff_sp_cta_btn_text', 'CTA Button Text', 'ff_text_input_callback', 'ff-sp', 'ff_sp_main_sec', array('ff_sp_cta_btn_text'));
    add_settings_field('ff_sp_cta_btn_link', 'CTA Button Link', 'ff_text_input_callback', 'ff-sp', 'ff_sp_main_sec', array('ff_sp_cta_btn_link'));

    add_settings_section('ff_sp_grid_sec', 'Service Cards', null, 'ff-sp');
    for ($i=1; $i<=6; $i++) {
        register_setting('ff_sp_group', 'ff_sp_card_'.$i.'_title');
        register_setting('ff_sp_group', 'ff_sp_card_'.$i.'_desc');
        register_setting('ff_sp_group', 'ff_sp_card_'.$i.'_link');
        register_setting('ff_sp_group', 'ff_sp_card_'.$i.'_img');
        
        add_settings_field('ff_sp_card_'.$i.'_title', 'Card '.$i.' Title', 'ff_text_input_callback', 'ff-sp', 'ff_sp_grid_sec', array('ff_sp_card_'.$i.'_title'));
        add_settings_field('ff_sp_card_'.$i.'_desc', 'Card '.$i.' Description', 'ff_textarea_callback', 'ff-sp', 'ff_sp_grid_sec', array('ff_sp_card_'.$i.'_desc'));
        add_settings_field('ff_sp_card_'.$i.'_link', 'Card '.$i.' Link', 'ff_text_input_callback', 'ff-sp', 'ff_sp_grid_sec', array('ff_sp_card_'.$i.'_link'));
        add_settings_field('ff_sp_card_'.$i.'_img', 'Card '.$i.' Image', 'ff_image_upload_callback', 'ff-sp', 'ff_sp_grid_sec', array('ff_sp_card_'.$i.'_img'));
    }

    // ========== ABOUT PAGE SETTINGS (NEW) ==========
    
    register_setting('ff_ap_group', 'ff_ap_main_title');
    register_setting('ff_ap_group', 'ff_ap_cta_title');
    register_setting('ff_ap_group', 'ff_ap_cta_sub');
    register_setting('ff_ap_group', 'ff_ap_cta_btn_text');
    register_setting('ff_ap_group', 'ff_ap_cta_btn_link');

    add_settings_section('ff_ap_main_sec', 'Page Header & CTA', null, 'ff-ap');
    add_settings_field('ff_ap_main_title', 'Main Page Title', 'ff_text_input_callback', 'ff-ap', 'ff_ap_main_sec', array('ff_ap_main_title'));
    add_settings_field('ff_ap_cta_title', 'CTA Title', 'ff_text_input_callback', 'ff-ap', 'ff_ap_main_sec', array('ff_ap_cta_title'));
    add_settings_field('ff_ap_cta_sub', 'CTA Subtitle', 'ff_textarea_callback', 'ff-ap', 'ff_ap_main_sec', array('ff_ap_cta_sub'));
    add_settings_field('ff_ap_cta_btn_text', 'CTA Button Text', 'ff_text_input_callback', 'ff-ap', 'ff_ap_main_sec', array('ff_ap_cta_btn_text'));
    add_settings_field('ff_ap_cta_btn_link', 'CTA Button Link', 'ff_text_input_callback', 'ff-ap', 'ff_ap_main_sec', array('ff_ap_cta_btn_link'));

    add_settings_section('ff_ap_sections_sec', 'About Page Sections', null, 'ff-ap');
    for ($i=1; $i<=5; $i++) {
        register_setting('ff_ap_group', 'ff_ap_sec_'.$i.'_title');
        register_setting('ff_ap_group', 'ff_ap_sec_'.$i.'_text');
        register_setting('ff_ap_group', 'ff_ap_sec_'.$i.'_img');
        
        add_settings_field('ff_ap_sec_'.$i.'_title', 'Section '.$i.' Title', 'ff_text_input_callback', 'ff-ap', 'ff_ap_sections_sec', array('ff_ap_sec_'.$i.'_title'));
        add_settings_field('ff_ap_sec_'.$i.'_text', 'Section '.$i.' Text', 'ff_textarea_callback', 'ff-ap', 'ff_ap_sections_sec', array('ff_ap_sec_'.$i.'_text'));
        add_settings_field('ff_ap_sec_'.$i.'_img', 'Section '.$i.' Image', 'ff_image_upload_callback', 'ff-ap', 'ff_ap_sections_sec', array('ff_ap_sec_'.$i.'_img'));
    }

// ========== CONTACT PAGE SETTINGS ==========
    
    // 1. Register the settings in the database
    register_setting('ff_cp_group', 'ff_cp_main_title'); 
    register_setting('ff_cp_group', 'ff_cp_text_heading'); 
    register_setting('ff_cp_group', 'ff_cp_text_body'); 
    register_setting('ff_cp_group', 'ff_cp_phone'); 
    register_setting('ff_cp_group', 'ff_cp_email'); 
    register_setting('ff_cp_group', 'ff_cp_address');
    
    // 2. Create the Section
    add_settings_section('ff_cp_main_sec', 'Contact Page Details', null, 'ff-cp');
    
    // 3. Create the input fields
    add_settings_field('ff_cp_main_title', 'Main Page Title', 'ff_text_input_callback', 'ff-cp', 'ff_cp_main_sec', array('ff_cp_main_title'));
    add_settings_field('ff_cp_text_heading', 'Left Heading', 'ff_text_input_callback', 'ff-cp', 'ff_cp_main_sec', array('ff_cp_text_heading'));
    add_settings_field('ff_cp_text_body', 'Left Body Text', 'ff_textarea_callback', 'ff-cp', 'ff_cp_main_sec', array('ff_cp_text_body'));
    add_settings_field('ff_cp_phone', 'Phone Number', 'ff_text_input_callback', 'ff-cp', 'ff_cp_main_sec', array('ff_cp_phone'));
    add_settings_field('ff_cp_email', 'Email Address', 'ff_text_input_callback', 'ff-cp', 'ff_cp_main_sec', array('ff_cp_email'));
    add_settings_field('ff_cp_address', 'Physical Address', 'ff_text_input_callback', 'ff-cp', 'ff_cp_main_sec', array('ff_cp_address'));


    // ========== PROJECTS PAGE SETTINGS ==========
    
    register_setting('ff_pp_group', 'ff_pp_main_title'); 
    register_setting('ff_pp_group', 'ff_pp_top_image'); 
    register_setting('ff_pp_group', 'ff_pp_top_heading'); 
    register_setting('ff_pp_group', 'ff_pp_top_desc'); 
    register_setting('ff_pp_group', 'ff_pp_grid_heading'); 
    register_setting('ff_pp_group', 'ff_pp_fallback_img'); 
    
    add_settings_section('ff_pp_main_sec', 'Projects Page Content', null, 'ff-pp');
    
    add_settings_field('ff_pp_main_title', 'Main Page Title', 'ff_text_input_callback', 'ff-pp', 'ff_pp_main_sec', array('ff_pp_main_title'));
    add_settings_field('ff_pp_top_image', 'Top Left Image', 'ff_image_upload_callback', 'ff-pp', 'ff_pp_main_sec', array('ff_pp_top_image'));
    add_settings_field('ff_pp_top_heading', 'Top Right Heading', 'ff_textarea_callback', 'ff-pp', 'ff_pp_main_sec', array('ff_pp_top_heading'));
    add_settings_field('ff_pp_top_desc', 'Top Right Description', 'ff_textarea_callback', 'ff-pp', 'ff_pp_main_sec', array('ff_pp_top_desc'));
    add_settings_field('ff_pp_grid_heading', 'Grid Heading', 'ff_textarea_callback', 'ff-pp', 'ff_pp_main_sec', array('ff_pp_grid_heading'));
    add_settings_field('ff_pp_fallback_img', 'Grid Fallback Image', 'ff_image_upload_callback', 'ff-pp', 'ff_pp_main_sec', array('ff_pp_fallback_img'));

    // ========== GLOBAL FOOTER SETTINGS ==========
    
    register_setting('ff_global_group', 'ff_footer_about');
    register_setting('ff_global_group', 'ff_footer_address');
    register_setting('ff_global_group', 'ff_footer_phone');
    register_setting('ff_global_group', 'ff_footer_email');
    register_setting('ff_global_group', 'ff_footer_copyright');
    register_setting('ff_global_group', 'ff_footer_col1_title');
    register_setting('ff_global_group', 'ff_footer_col2_title');

    add_settings_section('ff_footer_info_sec', 'Footer Company Info', null, 'ff-global');
    add_settings_field('ff_footer_about', 'About Text', 'ff_textarea_callback', 'ff-global', 'ff_footer_info_sec', array('ff_footer_about'));
    add_settings_field('ff_footer_address', 'Address', 'ff_text_input_callback', 'ff-global', 'ff_footer_info_sec', array('ff_footer_address'));
    add_settings_field('ff_footer_phone', 'Phone', 'ff_text_input_callback', 'ff-global', 'ff_footer_info_sec', array('ff_footer_phone'));
    add_settings_field('ff_footer_email', 'Email', 'ff_text_input_callback', 'ff-global', 'ff_footer_info_sec', array('ff_footer_email'));
    add_settings_field('ff_footer_copyright', 'Copyright Text', 'ff_text_input_callback', 'ff-global', 'ff_footer_info_sec', array('ff_footer_copyright'));

    add_settings_section('ff_footer_links_sec', 'Footer Link Columns', null, 'ff-global');
    add_settings_field('ff_footer_col1_title', 'Column 1 Title', 'ff_text_input_callback', 'ff-global', 'ff_footer_links_sec', array('ff_footer_col1_title'));
    add_settings_field('ff_footer_col2_title', 'Column 2 Title', 'ff_text_input_callback', 'ff-global', 'ff_footer_links_sec', array('ff_footer_col2_title'));

    // Generate the 5 link slots for Column 1
    for ($i=1; $i<=5; $i++) {
        register_setting('ff_global_group', 'ff_footer_col1_link_'.$i.'_text');
        register_setting('ff_global_group', 'ff_footer_col1_link_'.$i.'_url');
        add_settings_field('ff_footer_col1_link_'.$i.'_text', 'Col 1 - Link '.$i.' Text', 'ff_text_input_callback', 'ff-global', 'ff_footer_links_sec', array('ff_footer_col1_link_'.$i.'_text'));
        add_settings_field('ff_footer_col1_link_'.$i.'_url', 'Col 1 - Link '.$i.' URL', 'ff_text_input_callback', 'ff-global', 'ff_footer_links_sec', array('ff_footer_col1_link_'.$i.'_url'));
    }

    // Generate the 5 link slots for Column 2
    for ($i=1; $i<=5; $i++) {
        register_setting('ff_global_group', 'ff_footer_col2_link_'.$i.'_text');
        register_setting('ff_global_group', 'ff_footer_col2_link_'.$i.'_url');
        add_settings_field('ff_footer_col2_link_'.$i.'_text', 'Col 2 - Link '.$i.' Text', 'ff_text_input_callback', 'ff-global', 'ff_footer_links_sec', array('ff_footer_col2_link_'.$i.'_text'));
        add_settings_field('ff_footer_col2_link_'.$i.'_url', 'Col 2 - Link '.$i.' URL', 'ff_text_input_callback', 'ff-global', 'ff_footer_links_sec', array('ff_footer_col2_link_'.$i.'_url'));
    }

    // ========== GLOBAL HEADER SETTINGS ==========
    
    register_setting('ff_global_group', 'ff_header_logo'); 
    register_setting('ff_global_group', 'ff_header_btn_text'); 
    register_setting('ff_global_group', 'ff_header_btn_link'); 
    
    add_settings_section('ff_header_sec', 'Header Settings', null, 'ff-global');
    add_settings_field('ff_header_logo', 'Header Logo', 'ff_image_upload_callback', 'ff-global', 'ff_header_sec', array('ff_header_logo'));
    add_settings_field('ff_header_btn_text', 'Button Text (e.g. Contact Now)', 'ff_text_input_callback', 'ff-global', 'ff_header_sec', array('ff_header_btn_text'));
    add_settings_field('ff_header_btn_link', 'Button Link', 'ff_text_input_callback', 'ff-global', 'ff_header_sec', array('ff_header_btn_link'));
}
add_action('admin_init', 'flowfix_register_settings');


// ========== HEADER SETTINGS REGISTRATION ==========
// Wrap the settings registration in a function and hook it to admin_init
function flowfix_register_header_settings() {
    
    // Changed from 'ff_global_group' to 'ff_hp_group' to match the form above
    register_setting('ff_hp_group', 'ff_header_logo'); 
    register_setting('ff_hp_group', 'ff_header_btn_text'); 
    register_setting('ff_hp_group', 'ff_header_btn_link'); 
    
    // Changed from 'ff-global' to 'ff-hp' to match the form above
    add_settings_section('ff_header_sec', 'Header Settings', null, 'ff-hp');
    
    add_settings_field('ff_header_logo', 'Header Logo', 'ff_image_upload_callback', 'ff-hp', 'ff_header_sec', array('ff_header_logo'));
    add_settings_field('ff_header_btn_text', 'Button Text (e.g. Contact Now)', 'ff_text_input_callback', 'ff-hp', 'ff_header_sec', array('ff_header_btn_text'));
    add_settings_field('ff_header_btn_link', 'Button Link', 'ff_text_input_callback', 'ff-hp', 'ff_header_sec', array('ff_header_btn_link'));
}
add_action('admin_init', 'flowfix_register_header_settings');


// ========== FOOTER SETTINGS REGISTRATION ==========
function flowfix_register_footer_settings() {
    
    // Using 'ff_footer_group' instead of 'ff_global_group'
    register_setting('ff_footer_group', 'ff_footer_about');
    register_setting('ff_footer_group', 'ff_footer_address');
    register_setting('ff_footer_group', 'ff_footer_phone');
    register_setting('ff_footer_group', 'ff_footer_email');
    register_setting('ff_footer_group', 'ff_footer_copyright');
    register_setting('ff_footer_group', 'ff_footer_col1_title');
    register_setting('ff_footer_group', 'ff_footer_col2_title');

    // Using 'ff-footer' instead of 'ff-global'
    add_settings_section('ff_footer_info_sec', 'Footer Company Info', null, 'ff-footer');
    add_settings_field('ff_footer_about', 'About Text', 'ff_textarea_callback', 'ff-footer', 'ff_footer_info_sec', array('ff_footer_about'));
    add_settings_field('ff_footer_address', 'Address', 'ff_text_input_callback', 'ff-footer', 'ff_footer_info_sec', array('ff_footer_address'));
    add_settings_field('ff_footer_phone', 'Phone', 'ff_text_input_callback', 'ff-footer', 'ff_footer_info_sec', array('ff_footer_phone'));
    add_settings_field('ff_footer_email', 'Email', 'ff_text_input_callback', 'ff-footer', 'ff_footer_info_sec', array('ff_footer_email'));
    add_settings_field('ff_footer_copyright', 'Copyright Text', 'ff_text_input_callback', 'ff-footer', 'ff_footer_info_sec', array('ff_footer_copyright'));

    add_settings_section('ff_footer_links_sec', 'Footer Link Columns', null, 'ff-footer');
    add_settings_field('ff_footer_col1_title', 'Column 1 Title', 'ff_text_input_callback', 'ff-footer', 'ff_footer_links_sec', array('ff_footer_col1_title'));
    add_settings_field('ff_footer_col2_title', 'Column 2 Title', 'ff_text_input_callback', 'ff-footer', 'ff_footer_links_sec', array('ff_footer_col2_title'));

    // Generate the 5 link slots for Column 1
    for ($i=1; $i<=5; $i++) {
        register_setting('ff_footer_group', 'ff_footer_col1_link_'.$i.'_text');
        register_setting('ff_footer_group', 'ff_footer_col1_link_'.$i.'_url');
        add_settings_field('ff_footer_col1_link_'.$i.'_text', 'Col 1 - Link '.$i.' Text', 'ff_text_input_callback', 'ff-footer', 'ff_footer_links_sec', array('ff_footer_col1_link_'.$i.'_text'));
        add_settings_field('ff_footer_col1_link_'.$i.'_url', 'Col 1 - Link '.$i.' URL', 'ff_text_input_callback', 'ff-footer', 'ff_footer_links_sec', array('ff_footer_col1_link_'.$i.'_url'));
    }

    // Generate the 5 link slots for Column 2
    for ($i=1; $i<=5; $i++) {
        register_setting('ff_footer_group', 'ff_footer_col2_link_'.$i.'_text');
        register_setting('ff_footer_group', 'ff_footer_col2_link_'.$i.'_url');
        add_settings_field('ff_footer_col2_link_'.$i.'_text', 'Col 2 - Link '.$i.' Text', 'ff_text_input_callback', 'ff-footer', 'ff_footer_links_sec', array('ff_footer_col2_link_'.$i.'_text'));
        add_settings_field('ff_footer_col2_link_'.$i.'_url', 'Col 2 - Link '.$i.' URL', 'ff_text_input_callback', 'ff-footer', 'ff_footer_links_sec', array('ff_footer_col2_link_'.$i.'_url'));
    }
}
add_action('admin_init', 'flowfix_register_footer_settings');


// 4. Build the Home Page UI
function flowfix_home_admin_page() {
    $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'hero';
    ?>
    <div class="wrap">
        <h1>Home Page Settings</h1>
        <h2 class="nav-tab-wrapper">
            <a href="?page=flowfix-home&tab=hero" class="nav-tab <?php echo $active_tab == 'hero' ? 'nav-tab-active' : ''; ?>">Hero</a>
            <a href="?page=flowfix-home&tab=services" class="nav-tab <?php echo $active_tab == 'services' ? 'nav-tab-active' : ''; ?>">Services</a>
            <a href="?page=flowfix-home&tab=about" class="nav-tab <?php echo $active_tab == 'about' ? 'nav-tab-active' : ''; ?>">About</a>
            <a href="?page=flowfix-home&tab=why" class="nav-tab <?php echo $active_tab == 'why' ? 'nav-tab-active' : ''; ?>">Why Choose Us</a>
            <a href="?page=flowfix-home&tab=process" class="nav-tab <?php echo $active_tab == 'process' ? 'nav-tab-active' : ''; ?>">Process</a>
            <a href="?page=flowfix-home&tab=projects" class="nav-tab <?php echo $active_tab == 'projects' ? 'nav-tab-active' : ''; ?>">Projects</a>
            <a href="?page=flowfix-home&tab=testi" class="nav-tab <?php echo $active_tab == 'testi' ? 'nav-tab-active' : ''; ?>">Testimonials</a>
        </h2>
        <form method="post" action="options.php" style="background: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <?php
            if( $active_tab == 'hero' ) { settings_fields('ff_hero_group'); do_settings_sections('ff-hero'); }
            elseif( $active_tab == 'services' ) { settings_fields('ff_services_group'); do_settings_sections('ff-services'); }
            elseif( $active_tab == 'about' ) { settings_fields('ff_about_group'); do_settings_sections('ff-about'); }
            elseif( $active_tab == 'why' ) { settings_fields('ff_why_group'); do_settings_sections('ff-why'); }
            elseif( $active_tab == 'process' ) { settings_fields('ff_process_group'); do_settings_sections('ff-process'); }
            elseif( $active_tab == 'projects' ) { settings_fields('ff_home_proj_group'); do_settings_sections('ff-home-proj'); }
            elseif( $active_tab == 'testi' ) { settings_fields('ff_testi_group'); do_settings_sections('ff-testi'); }
            
            submit_button('Save Changes', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 8px 24px;'));
            ?>
        </form>
    </div>
    <?php
}

// 5. Build the Services Page UI
function flowfix_services_page_admin() {
    ?>
    <div class="wrap">
        <h1>Services Page Settings</h1>
        <form method="post" action="options.php" style="background: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <?php
            settings_fields('ff_sp_group'); 
            do_settings_sections('ff-sp');
            submit_button('Save Changes', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 8px 24px;'));
            ?>
        </form>
    </div>
    <?php
}

// 6. Build the About Page UI 
function flowfix_about_page_admin() {
    ?>
    <div class="wrap">
        <h1>About Page Settings</h1>
        <form method="post" action="options.php" style="background: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <?php
            settings_fields('ff_ap_group'); 
            do_settings_sections('ff-ap');
            submit_button('Save Changes', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 8px 24px;'));
            ?>
        </form>
    </div>
    <?php
}

// 7. Build the Contact Page Ui 
function flowfix_contact_page_admin() {
    ?>
    <div class="wrap">
        <h1>Contact Page Settings</h1>
        <form method="post" action="options.php" style="background: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <?php
            settings_fields('ff_cp_group'); 
            do_settings_sections('ff-cp');
            submit_button('Save Changes', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 8px 24px;'));
            ?>
        </form>
    </div>
    <?php
}


// 8. Build the Projects Page Ui 
function flowfix_projects_page_admin() {
    ?>
    <div class="wrap">
        <h1>Projects Page Settings</h1>
        <form method="post" action="options.php" style="background: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <?php
            settings_fields('ff_pp_group'); 
            do_settings_sections('ff-pp');
            submit_button('Save Changes', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 8px 24px;'));
            ?>
        </form>
    </div>
    <?php
}

// 9. Build the Footer Page UI 
function flowfix_footer_page_admin() {
    ?>
    <div class="wrap">
        <h1>Footer Page Settings</h1>
        <form method="post" action="options.php" style="background: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <?php
            // Target the footer group and section
            settings_fields('ff_footer_group'); 
            do_settings_sections('ff-footer');
            submit_button('Save Changes', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 8px 24px;'));
            ?>
        </form>
    </div>
    <?php
}

// 10. Build the Header Page UI 
function flowfix_header_page_admin() {
    ?>
    <div class="wrap">
        <h1>Header Page Settings</h1>
        <form method="post" action="options.php" style="background: #fff; padding: 20px; margin-top: 20px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <?php
            // The form is looking for the 'ff_hp_group' settings and 'ff-hp' section
            settings_fields('ff_hp_group'); 
            do_settings_sections('ff-hp');
            submit_button('Save Changes', 'primary', 'submit', true, array('style' => 'font-size: 16px; padding: 8px 24px;'));
            ?>
        </form>
    </div>
    <?php
}

// 11. Global JS for Media Uploader
function flowfix_admin_footer_scripts() {
    $screen = get_current_screen();
    if (strpos($screen->id, 'flowfix') !== false) {
        ?>
        <script>
        jQuery(document).ready(function($){
            $('.ff-upload-btn').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var inputField = button.siblings('.ff-image-url');
                var customUploader = wp.media({
                    title: 'Select or Upload an Image',
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
}
add_action('admin_footer', 'flowfix_admin_footer_scripts');
?>

