<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- This is the hook WordPress uses to inject your CSS -->
    <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php 
// This fetches your visual header
get_template_part( 'templates/header/template-header' ); 
?>