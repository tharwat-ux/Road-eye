<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Payments | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('CSS/User/violation_show.css')}}">
    <script src="{{asset('JS/User/violation_show.js')}}" defer></script>
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
                <li class="profile">
                    <img src="{{ asset(auth()->user()->image)}}" alt="Profile Photo">
                    <h2>{{auth()->user()->firstname.' '.auth()->user()->lastname}}</h2>
                </li>
                <li>
                    <a href="{{route('UserProfile.edit',['id'=>Auth()->id()])}}">
                        <i class="bi bi-pen"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li>
                <a href="{{ route('Analytics.show', ['id' => 0]) }}">
                    <i class="bi bi-graph-up"></i>
                    <p>Analytics</p>
                </a>
                </li>
                <li>
                    <a href="{{route('UserViolation.show',['id'=>Auth()->id()])}}">
                        <i class="bi bi-currency-dollar"></i>
                        <p>Payments</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('report.upload')}}">
                        <i class="bi bi-exclamation-triangle"></i>
                        <p>Report</p>
                    </a>
                </li>
                <li class="log-out">
                    <a href="{{ route('logout') }}">
                        <i class="bi bi-box-arrow-right"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content">
            <h2>Violations List 📝</h2>
            @forelse ($violations as $violation)
            <div class="box">
                <a href="{{ asset('violations/' . $violation->image) }}" target="_blank" class="photo">
                    <img src="{{ asset('violations/' . $violation->image)}}" alt="violation capture">
                </a>
                <div class="details">
                    <div class="info">
                        <div>
                            <i class="bi bi-car-front-fill"></i>
                            <span>Car Plate</span>
                        </div>
                        <p>{{$violation->car_plate}}</p>
                    </div>
                    <div class="info">
                        <div>
                            <i class="bi bi-speedometer"></i>
                            <span>Violation</span>
                        </div>
                        <p>{{$violation->description}}</p>
                    </div>
                    <div class="info">
                        <div>
                            <i class="bi bi-clock-fill"></i>
                            <span>Time</span>
                        </div>
                        <p>{{$violation->created_at}}</p>
                    </div>
                    <div class="info">
                        <div>
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Place</span>
                        </div>
                        <p>{{$violation->radar->location}}</p>
                    </div>
                    <div class="info">
                        <div>
                            <i class="bi bi-currency-dollar"></i>
                            <span>Fees</span>
                        </div>
                        <p>{{$violation->fees}}</p>
                    </div>
                    <form action="" method="GET">
                        <button type="submit" class="button">Pay now</button>
                    </form>
                </div>
            </div>


            @empty
            <div class="box msg">
                You don't have any violations right now 🫡
            </div>
        </div>
        @endforelse

    </div>

</body>

</html>