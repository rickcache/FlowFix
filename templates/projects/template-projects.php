<div class="page-projects-wrapper pt-large pb-large">
    <div class="projects-container">
        
        <?php
        // Fetch static variables directly from Native Theme Options!
        $main_title   = get_option('ff_pp_main_title', 'PROJECTS');
        
        // Top Section Data
        $top_img      = get_option('ff_pp_top_image', 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1000&auto=format&fit=crop');
        $top_heading  = get_option('ff_pp_top_heading', 'More than<br>1000+ projects<br>completed');
        $top_desc     = get_option('ff_pp_top_desc', 'We at Flowfix have experienced teams for each individual requirement.');
        
        // Grid Section Data
        $grid_heading = get_option('ff_pp_grid_heading', 'Here are some of<br>our Projects');
        $fallback_img = get_option('ff_pp_fallback_img', 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=600&auto=format&fit=crop');
        ?>

        <h1 class="projects-main-title"><?php echo esc_html($main_title); ?></h1>

        <!-- Top Section: Image Left, Text Right -->
        <div class="projects-top-section flex-row mt-large">
            <div class="w-50">
                <div class="projects-top-image" style="background-image: url('<?php echo esc_url($top_img); ?>');">
                </div>
            </div>
            <div class="w-50 projects-top-text">
                <h2><?php echo wp_kses_post($top_heading); ?></h2>
                <p><?php echo esc_html($top_desc); ?></p>
                <div class="title-underline-left"></div>
            </div>
        </div>

        <!-- Middle Section: Grid Header -->
        <div class="projects-grid-header mt-xlarge text-right">
            <h2><?php echo wp_kses_post($grid_heading); ?></h2>
        </div>

        <!-- Grid Section (Keeps WP_Query because projects are infinite/growing) -->
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
                    
                    // Dynamic fallback image from Theme Options
                    if (!$bg_image) {
                        $bg_image = $fallback_img;
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

