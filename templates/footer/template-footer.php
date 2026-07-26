<?php
// Query the 'editable' CPT for the global footer
$footer_query = new WP_Query( array(
    'post_type'      => 'editable',
    'name'           => 'global-footer', 
    'posts_per_page' => 1,
) );

// Fallback Data
$about_text = 'FlowFlix is your trusted partner for fast, reliable, and licensed plumbing solutions. Available 24/7 for all emergencies.';
$col1_title = 'Quick Links';
$col2_title = 'Services';
$address = '123 Plumbing Way, NY 10001';
$phone = '-2128388123';
$email = 'example@email.com';
$copyright = '&copy; ' . date('Y') . ' FlowFlix. All rights reserved.';

// Empty arrays for dynamic links
$col1_links = array();
$col2_links = array();

if ( $footer_query->have_posts() ) {
    $footer_query->the_post();
    
    // Dynamic Text
    $dyn_about = get_post_meta( get_the_ID(), 'footer_about_text', true );
    if ( !empty($dyn_about) ) $about_text = $dyn_about;

    $dyn_col1 = get_post_meta( get_the_ID(), 'footer_col1_title', true );
    if ( !empty($dyn_col1) ) $col1_title = $dyn_col1;

    $dyn_col2 = get_post_meta( get_the_ID(), 'footer_col2_title', true );
    if ( !empty($dyn_col2) ) $col2_title = $dyn_col2;

    $dyn_address = get_post_meta( get_the_ID(), 'footer_address', true );
    if ( !empty($dyn_address) ) $address = $dyn_address;

    $dyn_phone = get_post_meta( get_the_ID(), 'footer_phone', true );
    if ( !empty($dyn_phone) ) $phone = $dyn_phone;

    $dyn_email = get_post_meta( get_the_ID(), 'footer_email', true );
    if ( !empty($dyn_email) ) $email = $dyn_email;

    $dyn_copy = get_post_meta( get_the_ID(), 'footer_copyright', true );
    if ( !empty($dyn_copy) ) $copyright = $dyn_copy;

    // Fetch dynamic links (Up to 5 per column)
    for ($i = 1; $i <= 5; $i++) {
        $c1_text = get_post_meta( get_the_ID(), 'footer_col1_link_' . $i . '_text', true );
        $c1_url = get_post_meta( get_the_ID(), 'footer_col1_link_' . $i . '_url', true );
        if ( !empty($c1_text) ) $col1_links[] = array('text' => $c1_text, 'url' => $c1_url);

        $c2_text = get_post_meta( get_the_ID(), 'footer_col2_link_' . $i . '_text', true );
        $c2_url = get_post_meta( get_the_ID(), 'footer_col2_link_' . $i . '_url', true );
        if ( !empty($c2_text) ) $col2_links[] = array('text' => $c2_text, 'url' => $c2_url);
    }
    
    wp_reset_postdata();
}

// Fallback links if empty
if(empty($col1_links)) {
    $col1_links = array(
        array('text' => 'Home', 'url' => site_url('/')),
        array('text' => 'About Us', 'url' => site_url('/about')),
        array('text' => 'Projects', 'url' => site_url('/projects')),
        array('text' => 'Contact', 'url' => site_url('/contact'))
    );
}
if(empty($col2_links)) {
    $col2_links = array(
        array('text' => 'Emergency Plumbing', 'url' => site_url('/services')),
        array('text' => 'Blocked Drains', 'url' => site_url('/services')),
        array('text' => 'Hot Water Systems', 'url' => site_url('/services')),
        array('text' => 'Leak Detection', 'url' => site_url('/services'))
    );
}
?>

<footer class="site-footer">
    <div class="footer-top">
        <div class="footer-container">
            <div class="footer-grid">
                
                <div class="footer-col brand-col">
                    <h2 class="footer-logo">Flow<span class="text-cyan">Flix</span></h2>
                    <p class="footer-about"><?php echo esc_html($about_text); ?></p>
                </div>

                <div class="footer-col">
                    <h3 class="footer-title"><?php echo esc_html($col1_title); ?></h3>
                    <ul class="footer-links">
                        <?php foreach($col1_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3 class="footer-title"><?php echo esc_html($col2_title); ?></h3>
                    <ul class="footer-links">
                        <?php foreach($col2_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3 class="footer-title">Contact Us</h3>
                    <ul class="footer-contact-info">
                        <li><strong>A:</strong> <?php echo esc_html($address); ?></li>
                        <li><strong>P:</strong> <?php echo esc_html($phone); ?></li>
                        <li><strong>E:</strong> <?php echo esc_html($email); ?></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-container">
            <p class="copyright-text"><?php echo $copyright; ?></p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>