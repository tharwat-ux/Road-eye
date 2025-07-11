<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Feature Control | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/SuperAdmin/FeatureControl.css') }}">
    <script src="{{ asset('JS/SuperAdmin/FeatureControl.js') }}" defer></script>
</head>

<body>

@if (session('success'))
<div class="error" id="success">
    <div class="error__icon" >
    <g transform="translate(20, 25)">
    <circle cx="25" cy="25" r="25" fill="#28a745" />
    <polyline points="15,25 23,33 35,17" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    </g>
    </div>
    <div class="error__title">{{ session('success') }}</div>
</div>
@endif

    <header>
        <div class="logo"><a href="#">Dot Tech<div class="logo-animation"></div></a></div>
        <label class="switch">
            <input type="checkbox" class="dark-mode-toggle" id="darkModeToggle">
            <span title="dark mode" class="slider">
                <i class="bi bi-sun-fill"></i>
                <i class="bi bi-moon-fill"></i>
            </span>
        </label>
    </header>

    <div class="container">

        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('admins.control')}}">
                        <i class="fa-solid fa-gamepad"></i>
                        <p>Admins</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('feature.control')}}">
                        <i class="fa-solid fa-toggle-on"></i>
                        <p>Features</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('crimecars.manage')}}">
                        <i class="fa-solid fa-scale-balanced"></i>
                        <p>Crimes</p>
                    </a>
                </li>
                <li class="log-out">
                    <a href="{{route('logout')}}">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </div>

        <div class="content">
            <h2>Enable / Disable System Features</h2>
            <div class="box">
                <form action="{{ route('feature.update', ['id' => '_id_']) }}" id="myForm" target="_self" method="POST">
                    @csrf
                    <div class="search-bar">
                        <input required type="text" id="search" placeholder="Search Routes..." onkeyup="filterOptions()"
                            onclick="showOptions()">
                        <div class="options" id="options">
                            @foreach ($radars as $radar)
                            <div id="selected_radar" class="option" onclick="selectOption(this)" radar_id="{{$radar->id}}" violation="{{$radar->is_violation}}" accident="{{$radar->is_accident}}" crime="{{$radar->is_crime_cars}}">{{$radar->location}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="info">
                        <p class="feature">Violation Detection</p>
                        <label class="toggle-switch" >
                            <input type="checkbox" name="violation_ctrl" id="violation_ctrl">
                            <div class="toggle-switch-background"></div>
                            <div class="toggle-switch-handle"></div>
                        </label>
                    </div>
                    <div class="info">
                        <p class="feature">Accident Detection</p>
                        <label class="toggle-switch">
                            <input type="checkbox" name="accident_ctrl" id="accident_ctrl" >
                            <div class="toggle-switch-background"></div>
                            <div class="toggle-switch-handle"></div>
                        </label>
                    </div>
                    <div class="info">
                        <p class="feature">Crime Car Detection</p>
                        <label class="toggle-switch">
                            <input type="checkbox" name="crime_ctrl" id="crime_ctrl">
                            <div class="toggle-switch-background"></div>
                            <div class="toggle-switch-handle"></div>
                        </label>
                    </div>
                    <button type="submit" onClick="submitMyForm()" class="button">Update Controls</button>
                </form>
            </div>
        </div>

    </div>

</body>

</html>