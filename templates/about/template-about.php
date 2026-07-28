<div class="page-about-wrapper pt-large pb-large">
    
    <div class="about-header-main">
        <h1 class="about-main-title">ABOUT US</h1>
    </div>

    <div class="about-content-area">
        <?php
      
        $cta_title = 'Need Expert Plumbing Help?';
        $cta_sub = 'Get in touch with our professionals today.';
        $cta_btn_text = 'BOOK NOW';
        $cta_btn_link = site_url('/contact');
        // The About Us Data
        $about_sections = array(
            array(
                'title' => 'Dedicated to Quality Plumbing Solutions',
                'text'  => "At FlowFix Plumbing, we believe that exceptional plumbing is about more than fixing leaks or replacing pipes—it's about providing peace of mind. Every home and business relies on a safe, efficient plumbing system, and our mission is to keep those systems running flawlessly. From emergency repairs to large-scale plumbing installations, we approach every project with the same level of care, precision, and professionalism. Our licensed plumbers combine years of hands-on experience with modern tools and proven techniques to deliver solutions that are built to last.",
                'img'   => 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=800&auto=format&fit=crop'
            ),
            array(
                'title' => 'Experienced Professionals You Can Trust',
                'text'  => "Behind every successful project is a team of skilled professionals who genuinely care about the quality of their work. At FlowFix Plumbing, our plumbers are fully licensed, insured, and continuously trained to stay up to date with the latest industry standards, technologies, and safety practices. Whether it's diagnosing hidden leaks, repairing burst pipes, installing hot water systems, or completing commercial plumbing projects, we bring expertise and attention to detail to every task.",
                'img'   => 'https://images.unsplash.com/photo-1621905252507-b35492cc74b4?q=80&w=800&auto=format&fit=crop'
            ),
            array(
                'title' => 'Customer Satisfaction Comes First',
                'text'  => "Our customers are at the heart of everything we do. We understand that plumbing problems can be stressful, disruptive, and often unexpected, which is why we strive to make the entire experience as smooth and hassle-free as possible. From your initial enquiry to the final quality inspection, we prioritize clear communication, transparent pricing, and dependable service.",
                'img'   => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?q=80&w=800&auto=format&fit=crop'
            ),
            array(
                'title' => 'Innovation, Reliability, and Lasting Results',
                'text'  => "The plumbing industry continues to evolve, and so do we. FlowFix Plumbing invests in advanced equipment and modern diagnostic technology that allows us to identify problems quickly and complete repairs with greater accuracy and efficiency. By combining innovative tools with proven industry practices, we're able to reduce unnecessary disruption.",
                'img'   => 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=800&auto=format&fit=crop'
            ),
            array(
                'title' => 'Building Stronger Communities Through Honest Service',
                'text'  => "As a locally owned and operated plumbing company, we're proud to serve the communities that have supported our growth over the years. Every service call is an opportunity to demonstrate our commitment to integrity, professionalism, and exceptional workmanship. Our vision is to become the first name people think of whenever they need a trusted plumbing professional.",
                'img'   => 'https://images.unsplash.com/photo-1607472586893-edb57cb31414?q=80&w=800&auto=format&fit=crop'
            )
        );

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
        <p class="about-section-desc"><?php echo esc_html($section['text']); ?></p>
    </div>
    
    <!-- DYNAMIC CLASS ADDED HERE -->
    <div class="about-img-col about-img-col-<?php echo $index + 1; ?>">
        <img src="<?php echo esc_url($section['img']); ?>" alt="<?php echo esc_attr($section['title']); ?>" class="about-border-img">
    </div>
    
</div>
            </section>
        <?php endforeach; ?>
    </div>

    <!-- The CTA Box at the bottom of the wireframe -->
   <div class="services-cta-box mt-xlarge">
            <div class="cta-text">
                <h3><?php echo esc_html($cta_title); ?></h3>
                <p><?php echo esc_html($cta_sub); ?></p>
            </div>
            <div class="cta-action">
                <a href="<?php echo esc_url($cta_btn_link); ?>" class="btn-cta"><?php echo esc_html($cta_btn_text); ?></a>
            </div>
        </div>
</div>