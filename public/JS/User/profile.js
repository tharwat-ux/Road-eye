document.addEventListener("DOMContentLoaded", () => {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
    const burgerMenu = document.querySelector(".burger-menu")
    const navLinks = document.querySelector(".nav-links")

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
})
