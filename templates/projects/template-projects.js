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
