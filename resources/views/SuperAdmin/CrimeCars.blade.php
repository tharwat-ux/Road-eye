<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Crime Cars | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/SuperAdmin/CrimeCars.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('JS/SuperAdmin/CrimeCars.js') }}" defer></script>
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

@if ($errors->has('car_plate'))
<div class="error">
    <div class="error__icon" >
    <g transform="translate(20, 25)">
    <circle cx="25" cy="25" r="25" fill="#28a745" />
    <polyline points="15,25 23,33 35,17" fill="none" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
    </g>
    </div>
    <div class="error__title">{{ $errors->first('car_plate') }}</div>
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
            <div id="info" class="box info">
                <h2>Crime Cars Observations</h2>
                <form action="{{route('crimecar.delete', ['id'=>'_id_'])}}" target="_self" method="POST" id="deleteForm">
                    @method('Delete')
                    @csrf

                    @forelse ($CrimeHistories as $CrimeHistory)
                    <div class="dropdown">
                        <input hidden="" class="sr-only" name="state-dropdown" id="state-dropdown" type="checkbox" />
                        <label aria-label="dropdown scrollbar" for="state-dropdown" class="trigger">
                            <p>{{$CrimeHistory->car_plate}}</p>
                            <button class="remove-btn" onclick="confirmDelete(event, {{ $CrimeHistory->id }})">Remove</button>

                        </label>

                        <ul class="list webkit-scrollbar" role="list" dir="auto">
                            @foreach ($CrimeHistory->crimehistory as $observation)
                            <li class="listitem" role="listitem">
                                <div class="details">
                                    <div>{{$observation->radar->location}}</div>
                                    <div>{{$observation->created_at}}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @empty
                    <div class="box msg">
                    No Crime Cars Deteced Yet                </div>
                    @endforelse

                    <button type="button" class="btn-container form-btn sticky-btn" onclick="showDiv()">Add Crime
                        Car</button>
                </form>
            </div>
            <div id="edit" class="box edit">
                <h2>Add Crime Car</h2>
                <form action="{{route('crimecar.add')}}" method="post">
                    @csrf
                    <div class="search-bar">
                        <input name="car_plate" required type="text" id="search" placeholder="Add Crime Car..." onkeyup="filterOptions()"
                            onclick="showOptions()">
                        <div class="options" id="options">
                            @foreach ($CrimeCars as $crimecar)
                            <div class="option" onclick="selectOption(this)">{{$crimecar->car_plate}}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="btn-container">
                        <input id="update-btn" class="form-btn" type="submit" value="Add Crime Car">
                        <input id="cancel" class="form-btn" type="reset" value="Cancel" onclick="hideDiv()">
                    </div>
                </form>
            </div>
        </div>


    </div>

</body>

</html>