
// Light/Dark mode
document.addEventListener("DOMContentLoaded", () => {
    const darkModeToggle = document.getElementById('darkModeToggle');
    const body = document.body;
  
    // Check for saved dark mode preference
    if (localStorage.getItem('darkMode') === 'true') {
      body.classList.add('dark');
      darkModeToggle.checked = true;
    }
  
    darkModeToggle.addEventListener('change', () => {
      body.classList.toggle('dark');
      localStorage.setItem('darkMode', body.classList.contains('dark'));
    });
  })
  