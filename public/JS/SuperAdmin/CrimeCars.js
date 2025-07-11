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
    document.getElementById('search').value = element.innerText;
    document.getElementById('options').style.display = 'none';
}

document.addEventListener('click', function (event) {
    let searchBar = document.querySelector('.search-bar');
    if (!searchBar.contains(event.target)) {
        document.getElementById('options').style.display = 'none';
    }
});

// Toggle view
function showDiv() {
    document.getElementById("edit").style.display = "block";
    document.getElementById("info").style.display = "none";
}

function hideDiv() {
    document.getElementById("edit").style.display = "none";
    document.getElementById("info").style.display = "block";
}


function confirmDelete(event, carId) {
    event.preventDefault(); // تمنع الفورم من الإرسال مباشرة

    Swal.fire({
        title: "Delete this crime car and all of it's records?",
        text: "This is irreversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // تغيّر الـ action الخاص بالفورم ثم ترسله
            let route = document.getElementById('deleteForm').action;
            route = route.replace('_id_',carId);
            document.getElementById('deleteForm').action = route;
            document.getElementById('deleteForm').submit();
            form.submit();
        }
    });
}
