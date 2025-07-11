<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reports | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/Admin/ReportShow.css') }}">
    <script src="{{asset('JS/Admin/ReportShow.js')}}" defer></script>
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
            <h2>Reports List</h2>
            <div class="box">
                @forelse ($Reports as $report)
                <form class="report-form" action="{{route('report.delete',['id'=>$report->id])}}" target="_self" method="POST">
                @csrf
                @method('Delete')
                @if($report->image)
                <a href="{{ asset($report->image)}}" target="_blanck" class="photo">
                        <img src="{{ asset( $report->image)}}" alt="violation capture">
                </a>
                @endif
                    <div class="details webkit-scrollbar" role="details">
                        <article class="article">{{$report->description}}</article>
                        <button type="submit" class="button">Action Taken</button>
                    </div>
                </form>

                @empty
                <div class="box msg">
                There are no reports right now 🫡
            </div>
            @endforelse
            </div>
        </div>

    </div>

</body>

</html>