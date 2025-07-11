<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Analytics | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/User/Analytics.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('JS/User/Analytics.js') }}" defer></script>
</head>

<body>

@if (request()->has('CongestionData'))
<script>
        congestion = @json($CongestionData);
</script>

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
            <h2>The Future is NOW 🔮</h2>
            <div class="box">
            <form id="searchForm" method="POST" action="{{ route('Analytics.process', 0) }}">
                @csrf
                <input type="hidden" name="id" id="radarId">

                <div class="search-bar">
                    <input type="text" id="search" placeholder="Search Routes..."
                        onkeyup="filterOptions()" onclick="showOptions()">

                    <div class="options" id="options">
                        @foreach ($radars as $radar)
                            <div class="option" onclick="submitRadar('{{ $radar->id }}', '{{ $radar->location }}')">
                                {{ $radar->location }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>


                <h3>Traffic Congestion Throughout the Day</h3>
                <div class="chart-container">
                    <canvas id="trafficChart"></canvas>
                </div>
            </div>
        </div>

    </div>

</body>

</html>