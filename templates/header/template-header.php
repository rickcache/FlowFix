<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
// Fetch Header Variables from Native Theme Options
$header_logo     = get_option('ff_header_logo');
$header_btn_txt  = get_option('ff_header_btn_text', 'Contact Now');
$header_btn_link = get_option('ff_header_btn_link', site_url('/contact'));
?>

<header class="site-header">
    <div class="header-container flex-row align-center space-between">
        
        <!-- 1. Logo -->
        <div class="header-logo">
            <a href="<?php echo home_url(); ?>" aria-label="Home">
                <?php if($header_logo) : ?>
                    <img src="<?php echo esc_url($header_logo); ?>" alt="<?php bloginfo('name'); ?>" style="max-height: 50px; width: auto;">
                <?php else : ?>
                    <div class="logo-circle" style="width:50px; height:50px; background:#ccc; border-radius:50%;"></div>
                <?php endif; ?>
            </a>
        </div>

        <!-- 2. Desktop Navigation (Editable via WP Menus) -->
        <nav class="desktop-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'desktop-menu-list flex-row',
                'fallback_cb'    => false,
            ));
            ?>
        </nav>

        <!-- 3. Right Action Area -->
        <div class="header-actions flex-row align-center">
            <a href="<?php echo esc_url($header_btn_link); ?>" class="header-contact-btn btn-primary"><?php echo esc_html($header_btn_txt); ?></a>
            
            <!-- Hamburger Button (Mobile Only) -->
            <button class="hamburger-btn" id="hamburger-btn" aria-label="Open Menu">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>

    </div>
</header>

<!-- 4. Mobile Sidebar & Overlay -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<div class="mobile-sidebar" id="mobile-sidebar">
    <div class="sidebar-header flex-row align-center space-between">
        <h2>Menu</h2>
        <button class="close-sidebar-btn" id="close-sidebar-btn" aria-label="Close Menu">&times;</button>
    </div>
    
    <!-- Mobile Navigation (Editable via WP Menus) -->
    <nav class="mobile-nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'mobile-menu-list',
            'fallback_cb'    => false,
        ));
        ?>
    </nav>
</div>

<!-- Header Spacer (Pushes content down if header is fixed) -->
<div class="header-spacer"></div>