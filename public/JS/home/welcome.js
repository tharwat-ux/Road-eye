document.addEventListener("DOMContentLoaded", () => {
  const darkModeToggle = document.getElementById('darkModeToggle');
  const body = document.body;
  const header = document.querySelector("header")
  const burgerMenu = document.querySelector(".burger-menu")
  const navLinks = document.querySelector(".nav-links")
  const navItems = document.querySelectorAll(".nav-links li a")

  // Check for saved dark mode preference
  if (localStorage.getItem('darkMode') === 'true') {
    body.classList.add('dark');
    // added for slider
    darkModeToggle.checked = true;
  }

  // 'click' for button - 'change' for slider
  darkModeToggle.addEventListener('change', () => {
    body.classList.toggle('dark');
    localStorage.setItem('darkMode', body.classList.contains('dark'));
  });

  // Toggle burger menu
  burgerMenu.addEventListener("click", () => {
    burgerMenu.classList.toggle("active")
    navLinks.classList.toggle("show")
  })

  // Close menu when a link is clicked
  navLinks.addEventListener("click", (e) => {
    if (e.target.tagName === "A") {
      burgerMenu.classList.remove("active")
      navLinks.classList.remove("show")
    }
  })

  // Close menu when clicking outside
  document.addEventListener("click", (e) => {
    if (!e.target.closest("nav") && !e.target.closest(".burger-menu")) {
      burgerMenu.classList.remove("active")
      navLinks.classList.remove("show")
    }
  })

  // Add 'active' class to current page link
  const currentLocation = location.href
  navItems.forEach((link) => {
    if (link.href === currentLocation) {
      link.classList.add("active")
    }
  })

  // Change header background on scroll
  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      header.classList.add("scrolled")
    } else {
      header.classList.remove("scrolled")
    }
  })
})

// Select the roll-up button
const rollUpBtn = document.getElementById("rollUpBtn");

// Show/hide button on scroll
window.onscroll = function () {
    if (document.documentElement.scrollTop > 300) {
        rollUpBtn.style.display = "block";
    } else {
        rollUpBtn.style.display = "none";
    }
};

// Scroll to top function
rollUpBtn.addEventListener("click", function () {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});

// Function to check when elements are in viewport
function revealOnScroll() {
    const elements = document.querySelectorAll(".section-content");
    elements.forEach((element) => {
        const elementTop = element.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;
        if (elementTop < windowHeight - 100) {
            element.classList.add("show");
        }
    });
}

// Run function when scrolling
window.addEventListener("scroll", revealOnScroll);

// Initial check in case elements are already in view
revealOnScroll();
