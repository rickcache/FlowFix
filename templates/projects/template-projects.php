<div class="page-projects-wrapper pt-large pb-large">
    <div class="projects-container">
        
        <h1 class="projects-main-title">PROJECTS</h1>

        <!-- Top Section: Image Left, Text Right -->
        <div class="projects-top-section flex-row mt-large">
            <div class="w-50">
                <!-- Swapped the black box for a premium placeholder image and removed the text -->
                <div class="projects-top-image" style="background-image: url('https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1000&auto=format&fit=crop');">
                </div>
            </div>
            <div class="w-50 projects-top-text">
                <h2>More than<br>1000+ projects<br>completed</h2>
                <p>We at Flowfix have experienced teams for each individual requirement.</p>
                <!-- Added a subtle underline accent for a premium touch -->
                <div class="title-underline-left"></div>
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
                    
                    // Fallback image if no featured image is set
                    if (!$bg_image) {
                        $bg_image = 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=600&auto=format&fit=crop';
                    }
                    ?>
                    
                    <!-- Upgraded to an interactive link card -->
                    <a href="<?php the_permalink(); ?>" class="project-card <?php echo esc_attr($hidden_class); ?>">
                        <div class="project-bg" style="background-image: url('<?php echo esc_url($bg_image); ?>');"></div>
                        <div class="project-overlay">
                            <h3 class="project-title"><?php the_title(); ?></h3>
                            <span class="project-view-text">View Project &rarr;</span>
                        </div>
                    </a>
                    
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