<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Setup | Dot Tech</title>
    <link rel="icon" href="../../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/Admin/RadarSetup.css') }}">
    <script src="{{asset('JS/Admin/RadarSetup.js')}}" defer></script>
</head>

<body>
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
                    <a href="{{route('admin.profile',['id'=>auth()->id()])}}">
                        <i class="fa-solid fa-pen"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('radar.show')}}">
                        <i class="fa-solid fa-gear"></i>
                        <p>Setup</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('violation.show')}}">
                        <i class="fa-solid fa-ban"></i>
                        <p>Violations</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('accident.show')}}">
                        <i class="fa-solid fa-car-burst"></i>
                        <p>Accidents</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('report.show')}}">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        <p>Reports</p>
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
            <h2>{{$radar->location}}</h2>
            <div class="box">
                <form class="report-form" action="{{route('RadarSetup.save',['id'=>$radar->id])}}" target="_self" method="POST">
                    @csrf
                    <a href="{{asset('radars/' . $radar->image) }}" target="_blanck" class="photo">
                    <img src="{{ asset('radars/' . $radar->image) }}" alt="radar capture">
                    </a>
                    <div class="search-bar">
                        <input type="text" id="search" placeholder="Traffic Signal..." onkeyup="filterOptions()"
                            onclick="showOptions()">
                        <div class="options" id="options">
                        @foreach ($traffics as $traffic)
                        <div class="option" onclick="selectOption(this)" value='{{$traffic->id}}'>{{$traffic->location}}</div>
                        <input type="text" id="traffic" name='traffic_id' hidden value="">
                        @endforeach
                        </div>
                    </div>
                    <div class="dimensions">
                        <div class="form-floating">
                            <input required type="text" name="width" class="form-control" placeholder="" value='{{$radar->width}}'>
                            <label class="user-label">Width</label>
                        </div>

                        <div class="form-floating">
                            <input required type="text" name="lenght" class="form-control" placeholder="" value='{{$radar->lenght}}'>
                            <label class="user-label">Lenght</label>
                        </div>
                    </div>
                    <div class="form-floating">
                            <input required type="text" name="max_speed" class="form-control" placeholder="" value='{{$radar->max_speed}}'>
                            <label class="user-label">Max speed</label>
                    </div>
                    <input id="update-btn" class="button" type="submit" value="Setup Radar">
                </form>
            </div>
        </div>

    </div>

</body>

</html>