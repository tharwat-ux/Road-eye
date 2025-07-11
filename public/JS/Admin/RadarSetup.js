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
  
  // Search bar functions
  function filterOptions() {
    let input = document.getElementById('search').value.toLowerCase();
    let options = document.getElementById('options');
    let items = options.getElementsByClassName('option');
    let hasResults = false;
  
    for (let item of items) {
      if (item.innerText.toLowerCase().includes(input)) {
        item.style.display = 'block';
        hasResults = true;
      } else {
        item.style.display = 'none';
      }
    }
    options.style.display = hasResults ? 'block' : 'none';
  }
  
  function showOptions() {
    document.getElementById('options').style.display = 'block';
  }
  
  function selectOption(element) {
    document.getElementById('search').value = element.innerText;
    document.getElementById('options').style.display = 'none';
    document.getElementById('traffic').value = element.getAttribute('value');

  }
  
  document.addEventListener('click', function (event) {
    let searchBar = document.querySelector('.search-bar');
    if (!searchBar.contains(event.target)) {
      document.getElementById('options').style.display = 'none';
    }
  });
  