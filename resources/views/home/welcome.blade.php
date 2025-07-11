<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dot Tech</title>
    <link rel="icon" href="../../Media/home/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/home/welcome.css') }}">
    <script src="https://kit.fontawesome.com/2e12323ded.js" crossorigin="anonymous"></script>
    <script src="{{ asset('JS/home/welcome.js') }}" defer></script>
</head>

<body>
    <header>
        <div class="logo"><a href="{{ route('home') }}">Dot Tech<div class="logo-animation"></div></a></div>
        <nav>
            <button class="burger-menu" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-links">
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#services">SERVICES</a></li>
                <li><a href="#why-choose">WHY US</a></li>
                <li><a href="#team">TEAM</a></li>
                <li class="computer-links"><a href="{{ route('login') }}">LOGIN</a></li>
                <li class="computer-links"><a href="{{ route('register') }}">SIGN UP</a></li>
            </ul>
            <div class="phone-links">
                <a href="../Login/index.html">LOGIN</a>
                <a href="../Sign Up/index.html">SIGN UP</a>
            </div>
            <label class="switch">
                <input type="checkbox" class="dark-mode-toggle" id="darkModeToggle">
                <span title="dark mode" class="slider">
                    <i class="bi bi-sun-fill"></i>
                    <i class="bi bi-moon-fill"></i>
                </span>
            </label>
        </nav>
    </header>

    <div id="hero">
        <div class="hero-content">
            <h1>Welcome to Dot Tech</h1>
            <p>Innovative solutions for the digital age</p>
        </div>
    </div>

    <main>
        <button id="rollUpBtn"><i class="fas fa-arrow-up"></i></button>

        <section id="services">
            <div class="section-header">
                <h2>Our Services</h2>
            </div>
            <div class="section-content">
                <div class="card">
                    <div class="service-symbol">
                        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
                            type="module"></script>
                        <dotlottie-player
                            src="https://lottie.host/5e8de794-b54f-4b80-9cf2-bfd70c76735c/pYdV39O6oX.lottie"
                            background="transparent" speed="0.7" loop autoplay>
                        </dotlottie-player>
                    </div>
                    <h3>Traffic Monitoring</h3>
                    <p>AI-powered cameras track and analyze real-time vehicle movement to improve road safety and traffic flow.
                    </p>
                </div>
                <div class="card">
                    <div class="service-symbol">
                        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
                            type="module"></script>
                        <dotlottie-player
                            src="https://lottie.host/ea8b5802-b393-4a1b-ac05-afc5b66b0d3e/4PkHbjFjtK.lottie"
                            background="transparent" speed="1" loop autoplay>
                        </dotlottie-player>
                    </div>
                    <h3>Speed Monitoring and Violation Detection</h3>
                    <p>Automatically detects speeding and traffic violations using smart vision technology and alerts authorities instantly.
                        eligendi ratione.
                    </p>
                </div>
                <div class="card">
                    <div class="service-symbol">
                        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
                            type="module"></script>
                        <dotlottie-player
                            src="https://lottie.host/1f514d2a-4826-4292-889a-3a2b62ebcc41/Wjg27KfQei.lottie"
                            background="transparent" speed="1" loop autoplay>
                        </dotlottie-player>
                    </div>
                    <h3>Accident Detection</h3>
                    <p>Identifies accidents in real-time and notifies emergency services with precise location and visual evidence.
                        eligendi ratione.
                    </p>
                </div>
                <div class="card">
                    <div class="service-symbol">
                        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
                            type="module"></script>
                        <dotlottie-player
                            src="https://lottie.host/58100058-1851-4148-a2cd-f9fbde74bc87/mHcDPkIab2.lottie"
                            background="transparent" speed="3" loop autoplay>
                        </dotlottie-player>
                    </div>
                    <h3>Congestion Prediction</h3>
                    <p>Predicts traffic congestion using AI analysis of vehicle density, speed, and historical trends.
                        eligendi ratione.
                    </p>
                </div>
                <div class="card">
                    <div class="service-symbol">
                        <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs"
                            type="module"></script>
                        <dotlottie-player
                            src="https://lottie.host/97d31db2-0f9a-4093-b6fe-633cffd43820/3XZwHYL6zd.lottie"
                            background="transparent" speed="1" loop autoplay>
                        </dotlottie-player>
                    </div>
                    <h3>Crime On Record Detection</h3>
                    <p>Scans license plates to detect vehicles linked to criminal records and alerts nearby law enforcement units.
                        eligendi ratione.
                    </p>
                </div>
            </div>
        </section>

        <section id="about">
            <div class="section-header">
                <h2>About Us</h2>
            </div>
            <div class="section-content">
                <p>Dot Tech is a leading technology company dedicated to innovation and excellence.</p>
                <div class="about-content">
                    <div class="img-container">
                        <img src="../../Media/home/traffic_light_red.jpg" alt="traffic light red">
                    </div>
                    <div class="article">
                        <h3>We Are Dot Tech</h3>
                        <p>At Dot Tech, we blend innovation with AI-driven solutions to revolutionize how cities manage traffic, monitor road conditions, and enforce regulations.
                        </p>
                        <br>
                        <p>Our mission is to create safer, smarter, and more sustainable urban environments through cutting-edge technology and real-time data analysis.
                        </p>
                        <br>
                        <p>With a dedicated team and a passion for excellence, we aim to redefine the future of intelligent transportation.
                        </p>
                        </div>
                </div>
            </div>
        </section>

        <section id="why-choose">
            <div class="section-header">
                <h2>Why Choose Us</h2>
            </div>
            <div class="section-content">
                <div class="card">
                    <div class="why-us-symbol">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h3>Enhanced Road Safety</h3>
                    <p>Our system minimizes accidents and risky behaviors through real-time monitoring and intelligent traffic control.

                    </p>
                </div>
                <div class="card">
                    <div class="why-us-symbol">
                        <i class="bi bi-car-front-fill"></i>
                    </div>
                    <h3>Reduced Traffic Congestion</h3>
                    <p>AI-driven traffic flow management reduces bottlenecks and keeps urban movement smooth and efficient.
                    </p>
                </div>
                <div class="card">
                    <div class="why-us-symbol">
                        <i class="fa-solid fa-scale-balanced"></i>
                    </div>
                    <h3>Improved Law Enforcement</h3>
                    <p>Automated violation detection and crime recognition empower authorities with timely and accurate insights.
                    </p>
                </div>
                <div class="card">
                    <div class="why-us-symbol">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                    <h3>Empowered Road Users</h3>
                    <p>Drivers and pedestrians benefit from smarter routing, alerts, and safer travel experiences.

                </p>
                </div>
                <div class="card">
                    <div class="why-us-symbol">
                        <i class="fa-brands fa-pagelines"></i>
                    </div>
                    <h3>Sustainable Urban Mobility</h3>
                    <p>Efficient traffic management contributes to lower emissions and greener, more livable cities.
                    </p>
                </div>
            </div>
        </section>

        <section id="team">
            <div class="section-header">
                <h2>Our Team</h2>
            </div>
            <div class="section-content">
                <div class="card">
                    <div class="profile-photo">
                        <img src="https://randomuser.me/api/portraits/women/75.jpg" alt="Jane Doe">
                    </div>
                    <h3>Jane Doe</h3>
                    <p>Machine Learning Developer</p>
                    <div class="social-links">
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-photo">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith">
                    </div>
                    <h3>John Smith</h3>
                    <p>Deep Learning Developer</p>
                    <div class="social-links">
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-photo">
                        <img src="https://randomuser.me/api/portraits/men/46.jpg" alt="Michael Johnson">
                    </div>
                    <h3>Michael Johnson</h3>
                    <p>Deep Learning Developer</p>
                    <div class="social-links">
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-photo">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Emily Brown">
                    </div>
                    <h3>Emily Brown</h3>
                    <p>Backend Developer</p>
                    <div class="social-links">
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div class="profile-photo">
                        <img src="https://randomuser.me/api/portraits/men/33.jpg" alt="John Smith">
                    </div>
                    <h3>Chris Edward</h3>
                    <p>Frontend Developer</p>
                    <div class="social-links">
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Email"><i class="fas fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Info</h3>
                <p>Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200
                    Latin words, combined with a handful
                </p>
            </div>

            <div class="footer-section">
                <h3>Links</h3>
                <ul class="footer-links">
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#why-choose">Why Us</a></li>
                    <li><a href="#team">Team</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h3>Contact</h3>
                <p><i class="fas fa-map-marker-alt"></i> Location</p>
                <p><i class="fas fa-phone"></i> Call +01 1234567890</p>
                <p><i class="fas fa-envelope"></i> DotTech@gmail.com</p>
            </div>

            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 All Rights Reserved By <span>Dot Tech Team</span></p>
        </div>
    </footer>
</body>

</html>