<div class="page-contact-wrapper pt-large pb-large">
    <?php
    // Query the 'editable' CPT for the Contact page
    $contact_query = new WP_Query( array(
        'post_type'      => 'editable',
        'name'           => 'page-contact', 
        'posts_per_page' => 1,
    ) );

    // Default Fallbacks
    $title = 'CONTACT';
    
    $text_heading = 'Get In Touch';
    $text_body = "We are here to answer any questions you may have about our services.\n\nReach out to us and we'll respond as soon as we can.\n\nEven if there is something you have always wanted to experience and can't find it on FlowFix, let us know and we promise we'll do our best to find it for you.";
    
    if ( $contact_query->have_posts() ) {
        $contact_query->the_post();
        
        $dyn_title = get_post_meta( get_the_ID(), 'contact_title', true );
        if ( !empty($dyn_title) ) $title = $dyn_title;

        $dyn_heading = get_post_meta( get_the_ID(), 'contact_text_heading', true );
        if ( !empty($dyn_heading) ) $text_heading = $dyn_heading;

        $dyn_body = get_post_meta( get_the_ID(), 'contact_text_body', true );
        if ( !empty($dyn_body) ) $text_body = $dyn_body;

        wp_reset_postdata();
    }
    ?>

    <div class="contact-container">
        <!-- 1. Main Title -->
        <h1 class="contact-main-title"><?php echo esc_html($title); ?></h1>

        <!-- 2. Main Content (Text Left, Form Right) -->
        <div class="contact-main-section flex-row mt-large">
            
            <!-- Left Side: Text & Contact Details -->
            <div class="w-50 contact-text-content">
                <h2><?php echo esc_html($text_heading); ?></h2>
                <?php echo wpautop(esc_html($text_body)); ?>
                
                <!-- Moved the Contact Info here -->
                <div class="info-details mt-medium">
                    <div class="info-item">
                        <strong>Phone:</strong>
                        <span>+61 2 1234 5678</span>
                    </div>
                    <div class="info-item">
                        <strong>Email:</strong>
                        <span>info@flowfix.com.au</span>
                    </div>
                    <div class="info-item">
                        <strong>Address:</strong>
                        <span>Sydney, NSW Australia</span>
                    </div>
                </div>
            </div>

            <!-- Right Side: The Form in place of the grey box -->
            <div class="w-50">
                <div class="contact-form-box">
                    <form action="#" method="POST" class="flowfix-form">
                        
                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" name="fname" placeholder="John" required>
                            </div>
                            <div class="form-group">
                                <label for="lname">Last Name</label>
                                <input type="text" id="lname" name="lname" placeholder="Doe" required>
                            </div>
                        </div>

                        <div class="form-group-row">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" id="email" name="email" placeholder="john@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" id="phone" name="phone" placeholder="0400 000 000">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="service">Service Needed</label>
                            <select id="service" name="service">
                                <option value="">Select a service...</option>
                                <option value="emergency">Emergency Plumbing</option>
                                <option value="blocked">Blocked Drains</option>
                                <option value="hot-water">Hot Water Systems</option>
                                <option value="leak">Leak Detection</option>
                                <option value="other">Other / General Enquiry</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Your Message</label>
                            <textarea id="message" name="message" rows="4" placeholder="Tell us about your plumbing issue..." required></textarea>
                        </div>

                        <button type="submit" class="btn-submit">SEND MESSAGE</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>