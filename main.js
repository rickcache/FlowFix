document.addEventListener("DOMContentLoaded", () => {
  const hamburgerBtn = document.getElementById("hamburger-btn");
  const closeBtn = document.getElementById("close-sidebar-btn");
  const sidebar = document.getElementById("mobile-sidebar");
  const overlay = document.getElementById("sidebar-overlay");

  // Function to open/close menu
  function toggleMenu() {
    sidebar.classList.toggle("is-active");
    overlay.classList.toggle("is-active");
    document.body.classList.toggle("no-scroll"); // Stops background scrolling
  }

  // Event Listeners
  if (hamburgerBtn) hamburgerBtn.addEventListener("click", toggleMenu);
  if (closeBtn) closeBtn.addEventListener("click", toggleMenu);

  // Close sidebar if user clicks the dark overlay
  if (overlay) overlay.addEventListener("click", toggleMenu);
});

document.addEventListener("DOMContentLoaded", () => {
  const processPills = document.querySelectorAll(".process-pill");

  if (processPills.length > 0) {
    processPills.forEach((pill) => {
      pill.addEventListener("click", function () {
        // 1. Remove 'active' class from all pills
        processPills.forEach((p) => p.classList.remove("active"));

        // 2. Add 'active' class to the clicked pill
        this.classList.add("active");
      });
    });
  }
});

//Experiment Animations
document.addEventListener("DOMContentLoaded", () => {
  // Select elements you want to animate on scroll
  const animatedElements = document.querySelectorAll(
    ".service-card, .about-col, .process-pill, .section-title",
  );

  // Add initial CSS state via JS so they start hidden and shifted down
  animatedElements.forEach((el) => {
    el.style.opacity = "0";
    el.style.transform = "translateY(30px)";
    el.style.transition = "opacity 0.6s ease-out, transform 0.6s ease-out";
  });

  // Use Intersection Observer to trigger the fade-in when visible
  const observerOptions = {
    root: null,
    rootMargin: "0px",
    threshold: 0.15, // Triggers when 15% of the element is visible
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
        entry.target.style.transform = "translateY(0)";
        observer.unobserve(entry.target); // Animate only once
      }
    });
  }, observerOptions);

  animatedElements.forEach((el) => {
    observer.observe(el);
  });
});

//Abouts Section Timeline
document.addEventListener("DOMContentLoaded", () => {
  const dots = document.querySelectorAll(".timeline-dots .dot");
  const scrollArea = document.getElementById("aboutScrollArea");

  if (dots.length > 0 && scrollArea) {
    dots.forEach((dot, index) => {
      dot.addEventListener("click", function () {
        // Remove active class from all dots
        dots.forEach((d) => d.classList.remove("active"));
        // Add to clicked dot
        this.classList.add("active");

        // Find corresponding text section and scroll to it
        const targetSection = document.getElementById("para-" + index);
        if (targetSection) {
          scrollArea.scrollTo({
            top: targetSection.offsetTop - scrollArea.offsetTop,
            behavior: "smooth",
          });
        }
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const transitionBoxes = document.querySelectorAll(".flowfix-transition-box");

  const observer = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    },
    {
      root: null,
      rootMargin: "0px 0px -100px 0px",
      threshold: 0.05,
    },
  );

  transitionBoxes.forEach((box) => {
    observer.observe(box);
  });
});
