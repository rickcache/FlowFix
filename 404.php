<?php 
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); 
?>

<main class="page-404-wrapper">
    <!-- Using the glassmorphism style for the error container -->
    <div class="error-glass-card">
        <h1 class="error-code">404</h1>
        <h2 class="error-heading">Page Not Found</h2>
        
        <div class="card-line" style="margin: 20px auto; width: 50%;"></div>
        
        <p class="error-description">
            Oops! It looks like you've taken a wrong turn. The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>
        
        <!-- Re-using your Home Hero Button style -->
        <a href="<?php echo esc_url(home_url('/')); ?>" class="hero-btn" style="margin-top: 20px;">Return to Homepage</a>
    </div>
</main>

<?php get_footer(); ?>

<style>
    /* ==========================================
   404 ERROR PAGE STYLES
   ========================================== */

.page-404-wrapper {
    min-height: 75vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #0a1f35; /* Matches your dark blue sections */
    padding: 40px 20px;
    font-family: sans-serif;
}

.error-glass-card {
    background: rgba(225, 225, 225, 0.05); /* Very subtle transparent white */
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    padding: 60px 40px;
    max-width: 650px;
    width: 100%;
    text-align: center;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    position: relative;
    overflow: hidden;
}

/* Subtle background glow inside the card */
.error-glass-card::before {
    content: '';
    position: absolute;
    top: -50px;
    left: -50px;
    width: 150px;
    height: 150px;
    background: radial-gradient(circle, rgba(223, 205, 21, 0.15) 0%, rgba(0,0,0,0) 70%); /* Uses your yellow accent */
    border-radius: 50%;
    z-index: 0;
    pointer-events: none;
}

.error-code {
    font-size: 8rem;
    font-weight: 800;
    margin: 0;
    line-height: 1;
    color: transparent;
    -webkit-text-stroke: 2px rgba(255, 255, 255, 0.2);
    position: relative;
    z-index: 2;
}

.error-heading {
    color: #ffffff;
    font-size: 2.5rem;
    text-transform: uppercase;
    margin-top: 10px;
    margin-bottom: 20px;
    position: relative;
    z-index: 2;
}

.error-description {
    color: #cccccc;
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 30px;
    position: relative;
    z-index: 2;
}
</style>