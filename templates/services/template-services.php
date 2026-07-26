<div class="page-services-wrapper pt-large pb-large">
    <div class="services-container">
        
        <h1 class="services-main-title">SERVICES</h1>

        <div class="services-grid mt-large">
            <?php
            // The data from your wireframe
            $services = array(
                array(
                    'title' => 'Emergency Plumbing',
                    'desc'  => 'Fast 24/7 emergency plumbing services when you need them most.',
                    'link'  => site_url('/emergency-plumbing')
                ),
                array(
                    'title' => 'Blocked Drains',
                    'desc'  => 'Clear stubborn drain blockages quickly with advanced equipment.',
                    'link'  => site_url('/blocked-drains')
                ),
                array(
                    'title' => 'Leak Detection',
                    'desc'  => 'Accurate leak detection to prevent costly water damage and repairs.',
                    'link'  => site_url('/leak-detection')
                ),
                array(
                    'title' => 'Hot Water Systems',
                    'desc'  => 'Installation, repairs, and maintenance for reliable hot water all year.',
                    'link'  => site_url('/hot-water-systems')
                ),
                array(
                    'title' => 'Gas Plumbing',
                    'desc'  => 'Licensed gas fitting services completed safely and to Australian standards.',
                    'link'  => site_url('/gas-plumbing')
                ),
                array(
                    'title' => 'Bathroom Renovations',
                    'desc'  => 'Complete bathroom plumbing solutions for stylish and functional renovations.',
                    'link'  => site_url('/bathroom-renovations')
                )
            );

            // Loop through the array to generate the cards
            foreach ( $services as $service ) :
            ?>
                <a href="<?php echo esc_url($service['link']); ?>" class="service-card">
                    <!-- Geometric Decorations -->
                    <div class="card-bracket"></div>
                    <div class="card-circle-small"></div>
                    <div class="card-quarter-circle"></div>
                    
                    <!-- Content -->
                    <div class="card-content">
                        <h2 class="card-title"><?php echo esc_html($service['title']); ?></h2>
                        <p class="card-desc"><?php echo esc_html($service['desc']); ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>

        <!-- The massive dark block at the bottom of the wireframe -->
        <div class="services-bottom-block mt-xlarge"></div>

    </div>
</div>

<style>
    /* --- Services Page Wrapper --- */
.page-services-wrapper {
  font-family: sans-serif;
  background-color: #dfdfdf; /* Light gray from wireframe */
  min-height: 100vh;
}

.services-container {
  max-width: 1400px;
  margin: 0 auto;
  padding: 0 2rem;
}

/* Spacing Helpers */
.pt-large {
  padding-top: 5rem;
}
.pb-large {
  padding-bottom: 5rem;
}
.mt-large {
  margin-top: 4rem;
}
.mt-xlarge {
  margin-top: 6rem;
}

/* --- Typography --- */
.services-main-title {
  font-size: 4.5rem;
  font-weight: 800;
  text-align: center;
  color: #0b1a2f; /* Dark Blue */
  margin: 0;
  text-transform: uppercase;
}

/* --- Services Grid --- */
.services-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 30px;
}

/* --- The Service Card --- */
.service-card {
  background-color: #0b1a2f; /* Dark Blue */
  display: block;
  text-decoration: none;
  position: relative;
  overflow: hidden; /* Crucial: Clips the shapes so they don't spill out */
  padding: 40px;
  min-height: 380px;
  border-radius: 6px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  transition:
    transform 0.4s ease,
    box-shadow 0.4s ease;
}

/* Hover Animation: Lift up and enhance shadow */

/* Text Content (Requires z-index to sit above the shapes) */
.card-content {
  position: relative;
  z-index: 10;
}

.card-title {
  color: #ffffff;
  font-size: 1.8rem;
  font-weight: 700;
  margin: 0 0 15px 0;
  line-height: 1.2;
}

.card-desc {
  color: #aebfd5; /* Soft light blue/gray for readability */
  font-size: 1.05rem;
  line-height: 1.6;
  margin: 0;
  max-width: 85%;
}

/* --- Geometric Decorations --- */

/* 1. Top Right Bracket Line */
.card-bracket {
  position: absolute;
  top: 25px;
  right: 25px;
  width: 65%;
  height: 50%;
  border-top: 3px solid #ffffff;
  border-right: 3px solid #ffffff;
  border-top-right-radius: 30px;
  opacity: 0.9;
}

/* 2. Small Bottom Left Circle */
.card-circle-small {
  position: absolute;
  bottom: 40px;
  left: 40px;
  width: 35px;
  height: 35px;
  background-color: #dfdfdf; /* Matches page background */
  border-radius: 50%;
}

/* 3. Large Bottom Right Quarter-Circle */
.card-quarter-circle {
  position: absolute;
  bottom: -60px;
  right: -60px;
  width: 250px;
  height: 250px;
  background-color: #dfdfdf; /* Matches page background */
  border-radius: 50%;
  transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}

/* Hover Animation: The large circle slowly expands inwards */
.service-card:hover .card-quarter-circle {
  transform: scale(1.2);
  background-color: #00b8d9;
}

/* --- Bottom Block --- */
.services-bottom-block {
  width: 100%;
  height: 350px;
  background-color: #0b1a2f;
  border-radius: 40px;
}

/* --- Responsive Adjustments --- */
@media (max-width: 1100px) {
  .services-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 768px) {
  .services-grid {
    grid-template-columns: 1fr;
  }

  .services-main-title {
    font-size: 3.5rem;
  }

  .service-card {
    min-height: 320px;
  }

  .services-bottom-block {
    height: 250px;
    border-radius: 20px;
  }
}

</style>