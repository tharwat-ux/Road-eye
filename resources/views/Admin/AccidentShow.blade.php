<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Accidents | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/Admin/AccidentShow.css') }}">
    <script src="{{asset('JS/Admin/AccidentShow.js')}}" defer></script>
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
                    <a href="{{route('admin.profile',['id'=>auth()->id()])}}">
                        <i class="fa-solid fa-pen"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>
                <li>
                    <a href="../Segmentation/index.html">
                        <i class="fa-solid fa-ruler"></i>
                        <p>Metrics</p>
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
            <h2>Accidents List</h2>
            <div class="box">
            @forelse ($Accidents as $accident)
                <form class="report-form" action="{{route('accident.handle',['id'=>$accident->id])}}" target="_self" method="POST">
                    @csrf
                    <a href="{{asset('accidents/' . $accident->image)}}" target="_blank" class="photo">
                        <img src="{{ asset('accidents/' . $accident->image)}}" alt="violation capture">
                    </a>
                    <div class="details" role="details">
                        <div class="info">
                            <div>
                                <i class="bi bi-clock-fill"></i>
                                <span>Time</span>
                            </div>
                            <p>{{$accident->created_at}}</p>
                        </div>
                        <div class="info">
                            <div>
                                <i class="bi bi-geo-alt-fill"></i>
                                <span>Place</span>
                            </div>
                            <p>{{$accident->radar->location}}</p>
                        </div>
                        <input type="hidden" name="action_type" value="">
                        <div class="btn-container">
                            <button type="submit" onclick="this.form.action_type.value='approve'" class="button">Approve</button>
                            <button type="submit" onclick="this.form.action_type.value='decline'" class="button decline-btn">Decline</button>
                        </div>
                    </div>
                </form>
                @empty
                <div class="box msg">
                There are no accidents right now 🫡
                </div>
                @endforelse
            </div>
        </div>

    </div>

</body>

</html>