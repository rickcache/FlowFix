<?php
// 1. Get the Hero Image (Featured Image of the page)
$hero_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
if ( ! $hero_image ) {
    $hero_image = 'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=1920&auto=format&fit=crop'; // Fallback Hero
}

// 2. Get the Side Image (From a custom field, or fallback)
$side_image = get_post_meta( get_the_ID(), 'service_side_image', true );
if ( ! $side_image ) {
    $side_image = 'https://images.unsplash.com/photo-1585704032915-c3400ca199e7?q=80&w=800&auto=format&fit=crop'; // Fallback Side Image
}

// 3. Get the Page Content
$content = get_the_content();
if ( empty( $content ) ) {
    $content = '<h2>Expert Solutions</h2><p>We provide top-tier, reliable services tailored to your needs. Add your custom text in the WordPress editor to replace this placeholder.</p><ul><li>Licensed & Insured</li><li>Fast Response Times</li><li>Upfront Pricing</li></ul>';
} else {
    $content = apply_filters( 'the_content', $content );
}
?>

<div class="page-service-detail-wrapper">
    
    <!-- 1. Full-Width Hero Section -->
    <div class="service-hero" style="background-image: url('<?php echo esc_url($hero_image); ?>');">
        <div class="service-hero-overlay"></div>
    </div>

    <!-- 2. Main Body Area -->
    <div class="service-body pb-large">
        
        <!-- Centered Title -->
        <div class="service-title-container pt-large pb-large">
            <h1 class="service-detail-title"><?php echo get_the_title(); ?></h1>
        </div>

        <!-- Full-Bleed 50/50 Split Section -->
        <div class="service-split-container">
            <!-- Left Side Image -->
            <div class="split-left" style="background-image: url('<?php echo esc_url($side_image); ?>');">
                <!-- Image is handled via background for perfect full-bleed coverage -->
            </div>
            
            <!-- Right Side Dark Content Box -->
            <div class="split-right">
                <div class="split-content-inner">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    /* --- Wrapper & Base --- */
.page-service-detail-wrapper {
  font-family: sans-serif;
}

.service-body {
  background-color: #dfdfdf; /* Light gray from wireframe */
}

/* Spacing Helpers */
.pt-large {
  padding-top: 4rem;
}
.pb-large {
  padding-bottom: 4rem;
}

/* --- 1. Hero Section --- */
.service-hero {
  width: 100%;
  height: 450px;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  position: relative;
}

.service-hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(11, 26, 47, 0.4); /* Dark blue transparent tint */
}

/* --- 2. Title Section --- */
.service-title-container {
  text-align: center;
}

.service-detail-title {
  font-size: 2.2rem;
  font-weight: 600;
  color: #1a1a1a;
  text-transform: uppercase;
  letter-spacing: 1px;
  margin: 0;
}

/* --- 3. Full-Bleed Split Section --- */
.service-split-container {
  display: flex;
  width: 100%;
  min-height: 500px;
}

.split-left {
  width: 50%;
  background-size: cover;
  background-position: center;
}

.split-right {
  width: 50%;
  background-color: #0b1a2f; /* FlowFix Dark Blue */
  display: flex;
  align-items: center; /* Centers content vertically */
  padding: 4rem;
}

.split-content-inner {
  max-width: 600px;
  width: 100%;
  color: #ffffff;
}

/* Styling the editable text area */
.split-content-inner h2 {
  font-size: 2.5rem;
  color: #436594; /* Match the blue from previous pages */
  margin-top: 0;
  margin-bottom: 1.5rem;
}

.split-content-inner p {
  font-size: 1.1rem;
  line-height: 1.8;
  color: #aebfd5;
  margin-bottom: 1.5rem;
}

.split-content-inner ul {
  list-style-type: none;
  padding: 0;
}

.split-content-inner ul li {
  font-size: 1.1rem;
  color: #aebfd5;
  margin-bottom: 10px;
  position: relative;
  padding-left: 25px;
}

.split-content-inner ul li::before {
  content: "■";
  color: #436594;
  position: absolute;
  left: 0;
  font-size: 0.8rem;
  top: 3px;
}

/* --- Responsive Adjustments --- */
@media (max-width: 992px) {
  .service-split-container {
    flex-direction: column;
  }

  .split-left,
  .split-right {
    width: 100%;
  }

  .split-left {
    min-height: 400px;
  }

  .split-right {
    padding: 3rem 2rem;
  }
}

</style>
