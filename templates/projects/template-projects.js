document.addEventListener("DOMContentLoaded", function () {
  const hamburgerBtn = document.getElementById("hamburger-btn");
  const closeBtn = document.getElementById("close-sidebar-btn");
  const sidebar = document.getElementById("mobile-sidebar");
  const overlay = document.getElementById("sidebar-overlay");

  // Function to open the sidebar
  function openMenu() {
    sidebar.classList.add("active");
    overlay.classList.add("active");
    document.body.style.overflow = "hidden"; // Prevents background scrolling
  }

  // Function to close the sidebar
  function closeMenu() {
    sidebar.classList.remove("active");
    overlay.classList.remove("active");
    document.body.style.overflow = ""; // Restores background scrolling
  }

  // Event Listeners
  if (hamburgerBtn) {
    hamburgerBtn.addEventListener("click", openMenu);
  }

  if (closeBtn) {
    closeBtn.addEventListener("click", closeMenu);
  }

  // Clicking anywhere on the dark overlay closes the menu
  if (overlay) {
    overlay.addEventListener("click", closeMenu);
  }
});

// Animations

document.addEventListener("DOMContentLoaded", () => {
  // --- 1. TOP SECTION COUNTDOWN ANIMATION ---
  const topTextSection = document.querySelector(".projects-top-text");

  if (topTextSection) {
    const headingElement = topTextSection.querySelector("h2");

    if (headingElement) {
      let originalHTML = headingElement.innerHTML;
      // Check if there is a number string like "1000+" or "1000" inside the heading
      let match = originalHTML.match(/([0-9,]+)(\+?)/);

      if (match) {
        let fullMatch = match[0];
        let targetNumber = parseInt(match[1].replace(/,/g, ""), 10);
        let suffix = match[2] || "";
        let animatedOnce = false;

        const observer = new IntersectionObserver(
          (entries, observer) => {
            entries.forEach((entry) => {
              if (entry.isIntersecting && !animatedOnce) {
                animatedOnce = true;
                let currentNumber = 0;
                let duration = 2000; // 2 seconds
                let frameRate = 30;
                let totalFrames = duration / frameRate;
                let increment = targetNumber / totalFrames;

                const counter = setInterval(() => {
                  currentNumber += increment;
                  if (currentNumber >= targetNumber) {
                    currentNumber = targetNumber;
                    clearInterval(counter);
                  }
                  let formattedNum =
                    Math.floor(currentNumber).toLocaleString() + suffix;
                  headingElement.innerHTML = originalHTML.replace(
                    fullMatch,
                    formattedNum,
                  );
                }, frameRate);

                observer.unobserve(entry.target);
              }
            });
          },
          { threshold: 0.3 },
        );

        observer.observe(topTextSection);
      }
    }
  }

  // --- 2. PROJECTS TOP SECTION FADE-IN ---
  const topSection = document.querySelector(".projects-top-section");
  if (topSection) {
    const topObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            topSection.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.1 },
    );
    topObserver.observe(topSection);
  }

  // --- 3. STAGGERED PROJECT GRID CARD REVEALS ---
  const projectCards = document.querySelectorAll(
    ".page-projects-wrapper .project-card",
  );

  if (projectCards.length > 0) {
    const cardObserver = new IntersectionObserver(
      (entries, observer) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            // Add a micro-stagger based on index so they ripple onto screen
            projectCards.forEach((card, index) => {
              setTimeout(() => {
                card.classList.add("is-visible");
              }, index * 100); // 100ms delay per card
            });
            observer.unobserve(entry.target);
          }
        });
      },
      {
        root: null,
        rootMargin: "0px 0px -50px 0px",
        threshold: 0.1,
      },
    );

    // Observe the container grid or the first card to trigger the batch
    cardObserver.observe(projectCards[0]);
  }
});
