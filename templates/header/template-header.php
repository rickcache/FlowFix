<header class="site-header">
    <div class="header-container flex-row align-center space-between">
        
        <!-- 1. Logo (Light Gray Circle from wireframe) -->
        <div class="header-logo">
            <a href="<?php echo home_url(); ?>" aria-label="Home">
                <div class="logo-circle"></div>
            </a>
        </div>

        <!-- 2. Desktop Navigation -->
        <nav class="desktop-nav">
            <ul>
                <!-- Added active-link class to "home" to make it blue -->
                <li><a href="<?php echo site_url('/home'); ?>">home</a></li>
                <li><a href="<?php echo site_url('/about'); ?>">about</a></li>
                <li><a href="<?php echo site_url('/services'); ?>">services</a></li>
                <li><a href="<?php echo site_url('/projects'); ?>">Projects</a></li>
                <li><a href="<?php echo site_url('/contact'); ?>">contact</a></li>
            </ul>
        </nav>

        <!-- 3. Right Action Area (Button & Hamburger) -->
        <div class="header-actions flex-row align-center">
            <!-- New Contact Now Button -->
            <a href="<?php echo site_url('/contact'); ?>" class="header-contact-btn">Contact Now</a>
            
            <!-- Hamburger Button (Mobile Only) -->
            <button class="hamburger-btn" id="hamburger-btn" aria-label="Open Menu">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>

    </div>
</header>

<!-- 4. Mobile Sidebar & Overlay (Unchanged) -->
<div class="sidebar-overlay" id="sidebar-overlay"></div>

<div class="mobile-sidebar" id="mobile-sidebar">
    <div class="sidebar-header">
        <h2>Menu</h2>
        <button class="close-sidebar-btn" id="close-sidebar-btn" aria-label="Close Menu">&times;</button>
    </div>
    
    <nav class="mobile-nav">
        <ul>
            <li><a href="<?php echo site_url(); ?>">Home</a></li>
            <li><a href="<?php echo site_url('/about'); ?>">About</a></li>
            <li><a href="<?php echo site_url('/services'); ?>">Services</a></li>
            <li><a href="<?php echo site_url('/projects'); ?>">Projects</a></li>
            <li><a href="<?php echo site_url('/contact'); ?>">Contact</a></li>
        </ul>
    </nav>
</div>

<!-- Header Spacer -->
<div class="header-spacer"></div>