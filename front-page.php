<?php
get_header(); 
?>

<main id="primary" class="site-main">
    
    <?php 
    // Fetches the layout from templates/home/template-home.php
    get_template_part( 'templates/home/template-home' ); 
    ?>

</main>

<?php 
get_footer(); 
?>