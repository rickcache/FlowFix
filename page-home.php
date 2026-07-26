<?php
/**
 * Template Name: Home Page
 */

get_header(); 
?>

<main id="primary" class="site-main">
    
    <?php 
    get_template_part( 'templates/home/template-home' ); 
    ?>

</main>

<?php 
// 3. Bring in the root footer (which brings in template-footer.php)
get_footer(); 
?>