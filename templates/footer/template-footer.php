<?php
// Fetch variables directly from Native Theme Options!

$about_text = get_option('ff_footer_about', 'FlowFlix is your trusted partner for fast, reliable, and licensed plumbing solutions. Available 24/7 for all emergencies.');
$col1_title = get_option('ff_footer_col1_title', 'Quick Links');
$col2_title = get_option('ff_footer_col2_title', 'Services');
$address    = get_option('ff_footer_address', '123 Plumbing Way, NY 10001');
$phone      = get_option('ff_footer_phone', '-2128388123');
$email      = get_option('ff_footer_email', 'example@email.com');
$copyright  = get_option('ff_footer_copyright', '&copy; ' . date('Y') . ' FlowFlix. All rights reserved.');

// Default Fallback Links
$default_col1 = array(
    1 => array('text' => 'Home', 'url' => site_url('/')),
    2 => array('text' => 'About Us', 'url' => site_url('/about')),
    3 => array('text' => 'Projects', 'url' => site_url('/projects')),
    4 => array('text' => 'Contact', 'url' => site_url('/contact')),
    5 => array('text' => '', 'url' => '') // Slot 5 empty by default
);

$default_col2 = array(
    1 => array('text' => 'Emergency Plumbing', 'url' => site_url('/services')),
    2 => array('text' => 'Blocked Drains', 'url' => site_url('/services')),
    3 => array('text' => 'Hot Water Systems', 'url' => site_url('/services')),
    4 => array('text' => 'Leak Detection', 'url' => site_url('/services')),
    5 => array('text' => '', 'url' => '') // Slot 5 empty by default
);

// Fetch Dynamic Links (Up to 5 per column)
$col1_links = array();
$col2_links = array();

for ($i = 1; $i <= 5; $i++) {
    $c1_text = get_option('ff_footer_col1_link_' . $i . '_text', $default_col1[$i]['text']);
    $c1_url  = get_option('ff_footer_col1_link_' . $i . '_url', $default_col1[$i]['url']);
    if (!empty($c1_text)) {
        $col1_links[] = array('text' => $c1_text, 'url' => $c1_url);
    }

    $c2_text = get_option('ff_footer_col2_link_' . $i . '_text', $default_col2[$i]['text']);
    $c2_url  = get_option('ff_footer_col2_link_' . $i . '_url', $default_col2[$i]['url']);
    if (!empty($c2_text)) {
        $col2_links[] = array('text' => $c2_text, 'url' => $c2_url);
    }
}
?>

<footer class="site-footer">
    <div class="footer-top">
        <div class="footer-container">
            <div class="footer-grid">
                
                <!-- Brand Column -->
                <div class="footer-col brand-col">
                    <h2 class="footer-logo">Flow<span class="text-cyan">Flix</span></h2>
                    <p class="footer-about"><?php echo esc_html($about_text); ?></p>
                </div>

                <!-- Column 1 Links -->
                <div class="footer-col">
                    <h3 class="footer-title"><?php echo esc_html($col1_title); ?></h3>
                    <ul class="footer-links">
                        <?php foreach($col1_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Column 2 Links -->
                <div class="footer-col">
                    <h3 class="footer-title"><?php echo esc_html($col2_title); ?></h3>
                    <ul class="footer-links">
                        <?php foreach($col2_links as $link) : ?>
                            <li><a href="<?php echo esc_url($link['url']); ?>"><?php echo esc_html($link['text']); ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contact Column -->
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

    <!-- Copyright -->
    <div class="footer-bottom">
        <div class="footer-container">
            <!-- Used wp_kses_post to allow the &copy; HTML entity to render properly -->
            <p class="copyright-text"><?php echo wp_kses_post($copyright); ?></p>
        </div>
    </div>

    <!-- FLOATING CONTACT WIDGET -->
<div class="ff-floating-widget">
    <div class="ff-widget-menu">
        <a href="https://wa.me/61400000000" target="_blank" class="ff-widget-item whatsapp" title="Chat on WhatsApp">
            <span class="ff-tooltip">WhatsApp</span>
            <i class="dashicons dashicons-whatsapp"></i>
        </a>
        <a href="tel:+61212345678" class="ff-widget-item phone" title="Call Us">
            <span class="ff-tooltip">Call Us</span>
            <i class="dashicons dashicons-phone"></i>
        </a>
        <a href="<?php echo site_url('/contact'); ?>" class="ff-widget-item quote" title="Ask for Quotation">
            <span class="ff-tooltip">Get Quote</span>
            <i class="dashicons dashicons-clipboard"></i>
        </a>
    </div>
    <button id="ffWidgetToggle" class="ff-widget-main-btn" aria-label="Quick Contact Menu">
        <span class="ff-burger-icon">
            <span class="line"></span>
            <span class="line"></span>
            <span class="line"></span>
        </span>
        <span class="ff-close-text">&times;</span>
    </button>
</div>
</footer>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const widget = document.querySelector('.ff-floating-widget');
    const toggleBtn = document.getElementById('ffWidgetToggle');

    if (widget && toggleBtn) {
        // Toggle open/close state on click
        toggleBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            widget.classList.toggle('is-open');
        });

        // Close widget if user clicks anywhere outside of it
        document.addEventListener('click', (e) => {
            if (!widget.contains(e.target)) {
                widget.classList.remove('is-open');
            }
        });
    }
});
</script>

<?php wp_footer(); ?>
</body>
</html>