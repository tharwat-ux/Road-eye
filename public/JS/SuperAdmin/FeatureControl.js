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
    const violation_checked = element.getAttribute('violation');
    const accident_checked = element.getAttribute('accident');
    const crime_checked = element.getAttribute('crime');
    document.getElementById('violation_ctrl').checked = (violation_checked === '1' || violation_checked === 'true');
    document.getElementById('accident_ctrl').checked = (accident_checked === '1' || accident_checked === 'true');
    document.getElementById('crime_ctrl').checked = (crime_checked === '1' || crime_checked === 'true');
    document.getElementById('search').value = element.innerText;
    document.getElementById('options').style.display = 'none';
}

document.addEventListener('click', function(event) {
    let searchBar = document.querySelector('.search-bar');
    if (!searchBar.contains(event.target)) {
        document.getElementById('options').style.display = 'none';
    }
});


function submitMyForm(){
    const id=document.getElementById('selected_radar').getAttribute('radar_id')
    let route = document.getElementById('myForm').action;
    route = route.replace('_id_', id);
    document.getElementById('myForm').action = route;
    document.getElementById('myForm').submit();
}
    
        
