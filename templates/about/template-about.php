<div class="page-about-wrapper pt-large pb-large">
    
    <?php
    // Fetch variables directly from Native Theme Options!
    $main_title = get_option('ff_ap_main_title', 'ABOUT US');

    // CTA Variables
    $cta_title    = get_option('ff_ap_cta_title', 'Need Expert Plumbing Help?');
    $cta_sub      = get_option('ff_ap_cta_sub', 'Get in touch with our professionals today.');
    $cta_btn_text = get_option('ff_ap_cta_btn_text', 'BOOK NOW');
    $cta_btn_link = get_option('ff_ap_cta_btn_link', site_url('/contact'));

    // Default About Sections Data
    $default_sections = array(
        1 => array(
            'title' => 'Dedicated to Quality Plumbing Solutions',
            'text'  => "At FlowFix Plumbing, we believe that exceptional plumbing is about more than fixing leaks or replacing pipes—it's about providing peace of mind. Every home and business relies on a safe, efficient plumbing system, and our mission is to keep those systems running flawlessly. From emergency repairs to large-scale plumbing installations, we approach every project with the same level of care, precision, and professionalism. Our licensed plumbers combine years of hands-on experience with modern tools and proven techniques to deliver solutions that are built to last.",
            'img'   => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=800&auto=format&fit=crop'
        ),
        2 => array(
            'title' => 'Experienced Professionals You Can Trust',
            'text'  => "Behind every successful project is a team of skilled professionals who genuinely care about the quality of their work. At FlowFix Plumbing, our plumbers are fully licensed, insured, and continuously trained to stay up to date with the latest industry standards, technologies, and safety practices. Whether it's diagnosing hidden leaks, repairing burst pipes, installing hot water systems, or completing commercial plumbing projects, we bring expertise and attention to detail to every task.",
            'img'   => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=800&auto=format&fit=crop'
        ),
        3 => array(
            'title' => 'Customer Satisfaction Comes First',
            'text'  => "Our customers are at the heart of everything we do. We understand that plumbing problems can be stressful, disruptive, and often unexpected, which is why we strive to make the entire experience as smooth and hassle-free as possible. From your initial enquiry to the final quality inspection, we prioritize clear communication, transparent pricing, and dependable service.",
            'img'   => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?q=80&w=800&auto=format&fit=crop'
        ),
        4 => array(
            'title' => 'Innovation, Reliability, and Lasting Results',
            'text'  => "The plumbing industry continues to evolve, and so do we. FlowFix Plumbing invests in advanced equipment and modern diagnostic technology that allows us to identify problems quickly and complete repairs with greater accuracy and efficiency. By combining innovative tools with proven industry practices, we're able to reduce unnecessary disruption.",
            'img'   => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=800&auto=format&fit=crop'
        ),
        5 => array(
            'title' => 'Building Stronger Communities Through Honest Service',
            'text'  => "As a locally owned and operated plumbing company, we're proud to serve the communities that have supported our growth over the years. Every service call is an opportunity to demonstrate our commitment to integrity, professionalism, and exceptional workmanship. Our vision is to become the first name people think of whenever they need a trusted plumbing professional.",
            'img'   => 'https://images.unsplash.com/photo-1607472586893-edb57cb31414?q=80&w=800&auto=format&fit=crop'
        )
    );

    // Fetch Dynamic Sections Data
    $about_sections = array();
    for ($i = 1; $i <= 5; $i++) {
        $about_sections[] = array(
            'title' => get_option('ff_ap_sec_'.$i.'_title', $default_sections[$i]['title']),
            'text'  => get_option('ff_ap_sec_'.$i.'_text', $default_sections[$i]['text']),
            'img'   => get_option('ff_ap_sec_'.$i.'_img', $default_sections[$i]['img'])
        );
    }
    ?>

    <div class="about-header-main">
        <h1 class="about-main-title"><?php echo esc_html($main_title); ?></h1>
    </div>

    <div class="about-content-area">
        <?php
        // Loop to generate the full-width alternating bands
        foreach ( $about_sections as $index => $section ) :
            // Even indexes (0, 2, 4) get the dark blue background. Odd (1, 3) stay grey.
            $is_even = ($index % 2 === 0);
            $row_class = $is_even ? 'row-even' : 'row-odd';
        ?>
            <!-- Full Width Background Band -->
            <section class="about-row-wrapper <?php echo esc_attr($row_class); ?> reveal-on-scroll">
                <div class="about-container about-row">
        
                    <div class="about-text-col">
                        <h2 class="about-section-title"><?php echo esc_html($section['title']); ?></h2>
                        <div class="title-underline-left"></div>
                        <p class="about-section-desc"><?php echo wp_kses_post($section['text']); ?></p>
                    </div>
                    
                    <!-- DYNAMIC CLASS ADDED HERE -->
                    <div class="about-img-col about-img-col-<?php echo $index + 1; ?>">
                        <img src="<?php echo esc_url($section['img']); ?>" alt="<?php echo esc_attr($section['title']); ?>" class="about-border-img">
                    </div>
                    
                </div>
            </section>
        <?php endforeach; ?>
    </div>


</div>


<!-- Animation -->

<style>
    /* --- ABOUT US PAGE ROW ANIMATIONS --- */

/* Base hidden state for the entire row block */
.about-row-wrapper {
    opacity: 0;
    transition: opacity 0.8s ease-out;
}

.about-row-wrapper.is-visible {
    opacity: 1;
}

/* Alternating Image Directions */
/* Even Rows (0, 2, 4 -> Row 1, 3, 5): Image starts on the right, slides in from RIGHT */
.about-row-wrapper.row-even .about-img-col {
    opacity: 0;
    transform: translateX(60px);
    transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
}

/* Odd Rows (1, 3 -> Row 2, 4): Image starts on the left, slides in from LEFT */
.about-row-wrapper.row-odd .about-img-col {
    opacity: 0;
    transform: translateX(-60px);
    transition: opacity 1s cubic-bezier(0.16, 1, 0.3, 1), transform 1s cubic-bezier(0.16, 1, 0.3, 1);
}

/* Active Triggered State for Images */
.about-row-wrapper.is-visible .about-img-col {
    opacity: 1;
    transform: translateX(0);
}

/* --- Typewriter Heading Styles --- */
.about-section-title {
    position: relative;
    display: inline-block;
}

/* Blinking cursor while typing */
.about-section-title.typing::after {
    content: '|';
    display: inline-block;
    color: #00b4d8;
    animation: cursorBlink 0.7s infinite;
    margin-left: 2px;
}

@keyframes cursorBlink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0; }
}
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const rowWrappers = document.querySelectorAll('.about-row-wrapper');

    if (rowWrappers.length === 0) return;

    // Typewriter function
    const typeWriter = (element, text, speed = 40, callback) => {
        element.textContent = '';
        element.classList.add('typing');
        let i = 0;

        const typingInterval = setInterval(() => {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
            } else {
                clearInterval(typingInterval);
                element.classList.remove('typing'); // Remove cursor when done
                if (callback) callback();
            }
        }, speed);
    };

    // Observer to handle row visibility and trigger typewriter
    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const row = entry.target;
                row.classList.add('is-visible');

                // Find the heading inside this specific row
                const heading = row.querySelector('.about-section-title');
                if (heading && !heading.classList.contains('typed')) {
                    heading.classList.add('typed');
                    const fullText = heading.getAttribute('data-text') || heading.textContent.trim();
                    
                    // Save text temporarily to prevent layout jumping
                    heading.textContent = '';
                    
                    // Small delay to let the row slide in first
                    setTimeout(() => {
                        typeWriter(heading, fullText, 35);
                    }, 300);
                }

                observer.unobserve(row);
            }
        });
    }, {
        root: null,
        rootMargin: '0px 0px -80px 0px',
        threshold: 0.2
    });

    rowWrappers.forEach(row => {
        // Store original heading text for the typewriter loop
        const heading = row.querySelector('.about-section-title');
        if (heading) {
            heading.setAttribute('data-text', heading.textContent.trim());
        }
        observer.observe(row);
    });
});
</script>
