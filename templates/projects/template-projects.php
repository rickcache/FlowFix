<div class="page-projects-wrapper pt-large pb-large">
    <div class="projects-container">
        
        <!-- Note: The wireframe header says "SERVICES", but we are using "PROJECTS" for accuracy -->
        <h1 class="projects-main-title">PROJECTS</h1>

        <!-- Top Section: Image Left, Text Right -->
        <div class="projects-top-section flex-row mt-large">
            <div class="w-50">
                <div class="projects-top-image-placeholder">
                    <span>Pictures</span>
                </div>
            </div>
            <div class="w-50 projects-top-text">
                <h2>More than<br>1000+ projects<br>completed</h2>
                <p>We at Flowfix have experienced teams for each individual</p>
            </div>
        </div>

        <!-- Middle Section: Grid Header -->
        <div class="projects-grid-header mt-xlarge text-right">
            <h2>Here are some of<br>our Projects</h2>
        </div>

        <!-- Grid Section -->
        <div class="projects-grid mt-medium">
            <?php
            // Query ALL published projects
            $projects_query = new WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => -1, // -1 means fetch all of them
            ));

            $count = 0;
            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) : $projects_query->the_post();
                    
                    // If the count is 6 or more, add the 'hidden-card' class
                    $hidden_class = ($count >= 6) ? 'hidden-card' : '';
                    $bg_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    
                    ?>
                    <div class="project-card <?php echo esc_attr($hidden_class); ?>" style="background-image: url('<?php echo esc_url($bg_image); ?>');">
                        <?php if(!$bg_image): ?>
                            <!-- Fallback if no featured image is uploaded -->
                            <span class="placeholder-text">Pictures</span>
                        <?php endif; ?>
                    </div>
                    <?php
                    
                    $count++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>

        <!-- Show More Button -->
        <?php if ($count > 6) : ?>
            <div class="projects-btn-container mt-large text-center">
                <button id="show-more-projects-btn" class="btn-dark-blue">Show more</button>
            </div>
        <?php endif; ?>

    </div>
</div>


