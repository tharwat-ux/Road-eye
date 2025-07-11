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
});

// Upload Button
const fileInput = document.getElementById("fileInput");
const uploadBtn = document.getElementById("uploadBtn");
const loader = document.getElementById("loader");
const successMsg = document.getElementById("successMsg");
const fileNameDisplay = document.getElementById("fileName");

fileInput.addEventListener("change", function () {
    if (this.files.length > 0) {
        const fileName = this.files[0].name;
        loader.style.display = "block";
        uploadBtn.disabled = true;
        successMsg.style.display = "none";
        fileNameDisplay.style.display = "none";

        setTimeout(() => {
            loader.style.display = "none";
            successMsg.style.display = "block";
            fileNameDisplay.textContent = `Uploaded: ${fileName}`;
            fileNameDisplay.style.display = "block";
            uploadBtn.disabled = false;

            setTimeout(() => {
                successMsg.style.opacity = "0";
                setTimeout(() => {
                    successMsg.style.display = "none";
                    successMsg.style.opacity = "1";
                }, 1000);
            }, 2000);
        }, 2000); // Simulating upload time
    }
});
