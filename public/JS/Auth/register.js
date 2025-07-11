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

// Password field eye
document.querySelectorAll(".toggle-password").forEach((eyeIcon) => {
    eyeIcon.addEventListener("click", function () {
        let passwordField = this.closest(".form-floating").querySelector(".form-control");;
        let icon = this.querySelector("i"); // Get the <i> inside the span

        if (passwordField.type === "password") {
            passwordField.type = "text";
            icon.classList.remove('bi-eye-fill');
            icon.classList.add('bi-eye-slash-fill'); // Closed eye
        } else {
            passwordField.type = "password";
            icon.classList.remove('bi-eye-slash-fill');
            icon.classList.add('bi-eye-fill'); // Open eye
        }
    });
});
