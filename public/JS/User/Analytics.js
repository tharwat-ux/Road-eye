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

function submitRadar(id, location) {
        document.getElementById('search').value = location;
        document.getElementById('radarId').value = id;

        const form = document.getElementById('searchForm');

        form.action = `/radar/${id}/ProcessAnalytics`;

        form.submit();
}

// Chart Functions
const canvas = document.getElementById("trafficChart");
const ctx = canvas.getContext("2d");

let congestionData = typeof congestion !== 'undefined'
    ? congestion
    : [10, 5, 8, 12, 15, 20, 30, 50, 65, 80, 85, 90, 95, 90, 85, 80, 70, 60, 50, 40, 30, 20, 15, 10];

console.log(congestionData);
const timeLabels = Array.from({length: 24}, (_, i) => `${i}:00`);

// Function to get a smooth color transition based on congestion
function getColor(value) {
    if (value < 33) return "#0c0";
    if (value < 66) return "yellow";
    return "red";
}

// Custom Plugin to Apply Smooth Gradient
const smoothGradientPlugin = {
    id: "smoothGradient",
    beforeDatasetsDraw(chart) {
        const { ctx, chartArea, scales } = chart;
        if (!chartArea) return;

        const dataset = chart.data.datasets[0];
        const meta = chart.getDatasetMeta(0);
        const data = dataset.data;

        ctx.save();
        ctx.lineWidth = 3;

        for (let i = 0; i < data.length - 1; i++) {
            const point1 = meta.data[i];
            const point2 = meta.data[i + 1];

            if (!point1 || !point2) continue;

            const x1 = point1.x;
            const y1 = point1.y;
            const x2 = point2.x;
            const y2 = point2.y;

            // Create smooth gradient along the curve
            const gradient = ctx.createLinearGradient(x1, y1, x2, y2);
            gradient.addColorStop(0, getColor(data[i]));
            gradient.addColorStop(0.5, getColor((data[i] + data[i + 1]) / 2)); // Midpoint transition
            gradient.addColorStop(1, getColor(data[i + 1]));

            ctx.strokeStyle = gradient;
            ctx.beginPath();
            ctx.moveTo(x1, y1);
            ctx.lineTo(x2, y2);
            ctx.stroke();
        }

        ctx.restore();
    },
};

// Chart Configuration
const trafficChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: timeLabels,
        datasets: [
            {
                label: "Traffic Congestion",
                data: congestionData,
                borderWidth: 0, // Hide default line
                // pointRadius: 0, // Hide points
                pointBackgroundColor: "white",
                pointBorderWidth: 0.5,
                pointBorderColor: "black",
                tension: 0.4, // Enable Bézier curve smoothing
            },
        ],
    },
    options: {
        responsive: false,
        scales: {
            x: {
                title: { display: true, text: "Time of Day", color: "black" },
                ticks: { color: "black" },
                grid: { display: false },
            },
            y: {
                title: { display: true, text: "Congestion Level (%)", color: "black" },
                ticks: { color: "black" },
                grid: { color: "rgba(0,0,0,0.1)" },
                min: 0,
                max: 100
            },
        },
        plugins: {
            legend: { display: false },
        },
    },
    plugins: [smoothGradientPlugin], // Apply the custom plugin
});
