<div class="page-contact-wrapper pt-large pb-large">

<!-- REQUIRED: Tells WordPress which backend function to trigger -->
<input type="hidden" name="action" value="submit_lead">

<!-- NEW: The Security Token (Nonce) -->
<?php wp_nonce_field('submit_lead_action', 'lead_nonce'); ?>

    <?php
    // Fetch variables directly from Native Theme Options!
    
    $title        = get_option('ff_cp_main_title', 'CONTACT');
    $text_heading = get_option('ff_cp_text_heading', 'Get In Touch');
    $text_body    = get_option('ff_cp_text_body', "We are here to answer any questions you may have about our services.\n\nReach out to us and we'll respond as soon as we can.\n\nEven if there is something you have always wanted to experience and can't find it on FlowFix, let us know and we promise we'll do our best to find it for you.");
    
    // Dynamic Contact Info
    $phone   = get_option('ff_cp_phone', '+61 2 1234 5678');
    $email   = get_option('ff_cp_email', 'info@flowfix.com.au');
    $address = get_option('ff_cp_address', 'Sydney, NSW Australia');
    ?>

    <div class="contact-container">
        <!-- 1. Main Title -->
        <h1 class="contact-main-title"><?php echo esc_html($title); ?></h1>

        <!-- 2. Main Content (Text Left, Form Right) -->
        <div class="contact-main-section flex-row mt-large">
            
            <!-- Left Side: Text & Contact Details -->
            <div class="w-50 contact-text-content">
                <h2><?php echo esc_html($text_heading); ?></h2>
                <?php echo wpautop(wp_kses_post($text_body)); ?>
                
                <!-- Dynamic Contact Info -->
                <div class="info-details mt-medium">
                    <div class="info-item">
                        <strong>Phone:</strong>
                        <span><?php echo esc_html($phone); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Email:</strong>
                        <span><?php echo esc_html($email); ?></span>
                    </div>
                    <div class="info-item">
                        <strong>Address:</strong>
                        <span><?php echo esc_html($address); ?></span>
                    </div>
                </div>
            </div>

           <!-- Right Side: The Form -->
            <div class="w-50">
                <div class="contact-form-box">
                    
                    <!-- Success Message (Shows only after submission) -->
                    <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
                        <div class="success-message" style="background: rgba(0, 188, 212, 0.1); border-left: 4px solid #00bcd4; padding: 15px; margin-bottom: 20px; color: #fff;">
                            <strong>Thank you!</strong> Your message has been received and your account created. We will be in touch shortly.
                        </div>
                    <?php endif; ?>

                    <!-- Updated Form Action & Method -->
                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="POST" class="flowfix-form">
                        
                        <!-- REQUIRED: Tells WordPress which backend function to trigger -->
                        <input type="hidden" name="action" value="submit_lead">
                        
                        <!-- REQUIRED: The Security Token MUST be inside the form! -->
                        <?php wp_nonce_field('submit_lead_action', 'lead_nonce'); ?>
                        
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