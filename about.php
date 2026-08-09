
/* --- About Us Section --- */
.home-about {
  background-color: #f4f5f7; /* Off-white background */
  padding: 8rem 0; /* Increased slightly for a high-end, breathable feel */
  color: #0b1a2f; /* FlowFix dark blue */
  font-family: sans-serif;
  overflow: hidden; /* Prevents horizontal scrolling from offset elements */
}

.about-container {
  /* Safe Positions Kept */
  margin-left: 8%; 
  margin-right: auto; 
  /* Swapped hard '10rem' for percentage so it scales beautifully on laptops */
  padding: 0 8%; 
  max-width: 1600px;
}

.about-header {
  /* Fixed invalid CSS syntax (was 4rem 6rem) */
  margin-bottom: 5rem; 
  padding: 0;
}

.about-header h2 {
  font-size: 3.5rem;
  font-weight: 800;
  margin: 0;
  text-transform: uppercase;
  color: #0b1a2f;
  letter-spacing: -1px; /* Tighter letter spacing for modern typography */
  line-height: 1.1;
}

.title-underline {
  width: 120px;
  height: 5px;
  background-color: #00b4d8; /* Cyan active color */
  margin-top: 20px;
  border-radius: 5px;
}

/* --- Layout Grid --- */
.about-grid {
  display: flex;
  gap: 80px; /* Widened gap for a cleaner, editorial look */
  align-items: stretch; /* Ensures both columns are the exact same height */
}

.about-col {
  flex: 1;
  display: flex;
  flex-direction: column;
  /* Magic property that aligns top/bottom items perfectly */
  justify-content: space-between; 
}

/* --- Image Boxes --- */
.about-img-box {
  position: relative;
  border-radius: 16px; /* Slightly softer corners */
  width: 100%; 
  overflow: hidden;
  /* Premium, softer shadow */
  box-shadow: 0 20px 40px rgba(11, 26, 47, 0.08);
  transition: transform 0.4s ease, box-shadow 0.4s ease;
  
}


/* ⬇️ MANUAL CONTROL: Set top image height here ⬇️ */
.img-top-left {
  height: 440px; 
}

/* ⬇️ MANUAL CONTROL: Set bottom image height to match your text here ⬇️ */
.img-bot-right {
  height: 700px; 
  overflow: visible; /* Allows the shadow to show */
  width: 85%;
  right:  3%;
 
}

.placeholder-blue {
  background-color: #0b1a2f;
  width: 100%;
  height: 100%;
  border-radius: 16px;
}


.img-bot-right img,
.img-bot-right .placeholder-blue {
  width: 105%;
  position: relative;
  z-index: 2;
 
}

/* --- Text Boxes --- */
.about-text-box {
  position: relative;
  padding: 1rem 0;
  width: 100%;

}

.about-text-box h3 {
  font-size: 2.5rem;
  margin-top: 0;
  margin-bottom: 1.2rem;
  color: #0b1a2f;
  font-weight: 800;
  letter-spacing: -0.5px;
}

.about-text-box p {
  font-size: 1.15rem;
  line-height: 1.8;
  color: #4a5568; /* Slate gray for better readability than pure #333 */
}

/* Vertical Borders (Matching the Reference Image) */
.border-left {
  border-left: 4px solid #0b1a2f; 
  padding-left: 40px; 
  margin-top: 50px; 
}

.border-right {
  border-right: none; 
  padding-right: 40px;
  text-align: left; 
  margin-bottom: 50px; 
}

/* --- Timeline & Scrollable Area --- */
.timeline-wrapper {
  width: 100%;
}

.timeline-nav {
  position: relative;
  margin-bottom: 40px;
  padding: 15px 0;
  width: 85%; 
  margin-left: 0; 
  margin-right: auto; 
}

.timeline-line {
  position: absolute;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  width: 100%;
  height: 3px; /* Slightly thicker for better visibility */
  background-color: #cbd5e1; /* Softer base line */
  z-index: 1;
}

.timeline-dots {
  position: relative;
  z-index: 2;
  display: flex;
  justify-content: space-between;
}

.timeline-dots .dot {
  width: 18px; /* Slightly larger targets for better UX */
  height: 18px;
  border-radius: 50%;
  background-color: #0b1a2f;
  border: 4px solid #f4f5f7; 
  cursor: pointer;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Premium snap transition */
  padding: 0;
}

.timeline-dots .dot:hover {
  background-color: #00b4d8;
  transform: scale(1.2);
}

.timeline-dots .dot.active {
  background-color: #00b4d8; 
  border-color: #00b4d8;
  transform: scale(1.4);
  box-shadow: 0 0 15px rgba(0, 180, 216, 0.4); /* Glow effect on active */
}

/* Scrollable Container */
.scrollable-area {
  height: 350px; 
  width: 85%; 
  margin-right: auto; 
  margin-left: 0;   
  overflow-y: auto;
  position: relative;
  padding-right: 20px; /* Keeps text away from scrollbar */
  scrollbar-width: thin;
  scrollbar-color: #00b4d8 #e2e8f0;
}

/* Custom Scrollbar for Chrome/Safari */
.scrollable-area::-webkit-scrollbar {
  width: 6px;
}
.scrollable-area::-webkit-scrollbar-track {
  background: #e2e8f0;
  border-radius: 10px;
}
.scrollable-area::-webkit-scrollbar-thumb {
  background-color: #00b4d8;
  border-radius: 10px;
}

.scroll-section {
  /* Fixed massive bug: 10% makes text invisible. Set to standard size */
  font-size: 1rem; 
  margin-bottom: 2.5rem;
}

/* --- Responsive Layout Stack --- */

/* Tablet Optimization (Prevents squishing before mobile snap) */
@media (max-width: 1200px) {
  .about-container {
    padding: 0 5%;
    margin-left: 5%;
  }
  .about-grid {
    gap: 40px;
  }
}

/* Mobile & Small Tablet Snap */
@media (max-width: 992px) {
  .home-about {
    padding: 5rem 0;
  }
  
  .about-container {
    margin-left: auto; /* Centers container on mobile */
    margin-right: auto;
    padding: 0 2rem;
  }

  .about-header {
    text-align: center;
  }

  .title-underline {
    margin-left: auto;
    margin-right: auto;
  }

  .about-grid {
    flex-direction: column;
    gap: 60px;
  }

  /* Reset manual heights for mobile so they look natural */
  .img-top-left,
  .img-bot-right {
    height: 400px;
    width: 100%; /* Reset offset widths */
    right: 0;
  }

  .border-right {
    border-right: none;
    border-left: 4px solid #00b4d8; /* Distinct color for mobile borders */
    padding-right: 0;
    padding-left: 30px;
    text-align: left; 
  }

  .border-left {
    border-left-color: #00b4d8;
    padding-left: 30px;
  }

  .timeline-nav,
  .scrollable-area {
    width: 100%; /* Full width on mobile */
  }
}

/* Small Phones */
@media (max-width: 576px) {
  .about-header h2 {
    font-size: 2.8rem;
  }
  .about-text-box h3 {
    font-size: 2rem;
  }
  .img-top-left,
  .img-bot-right {
    height: 300px; /* Even smaller for tiny screens */
  }
}