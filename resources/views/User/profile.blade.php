<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile | Dot Tech</title>
    <link rel="icon" href="../../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/User/profile.css') }}">
    <script src="{{ asset('JS/User/profile.js') }}" defer></script>
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
        <div class="logo"><a href="index.html">Dot Tech<div class="logo-animation"></div></a></div>
        <nav>
            <button class="burger-menu" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
            <ul class="nav-links">
                <li><a href="{{ route('UserProfile',['id' =>$user->id]) }}" >View</a></li>
                <li><a href="{{ route('UserProfile.edit',['id' =>auth()->user()->id]) }}">Edit Info</a></li>
                <li><a href="{{ route('password.edit',['id' =>auth()->user()->id]) }}">Change Password</a></li>
            </ul>
            <label class="switch">
                <input type="checkbox" class="dark-mode-toggle" id="darkModeToggle">
                <span title="dark mode" class="slider">
                    <i class="bi bi-sun-fill"></i>
                    <i class="bi bi-moon-fill"></i>
                </span>
            </label>
        </nav>
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
            <div class="box">
                <h2>Profile Info</h2>
                <div class="profile-card">
                    <div class="card">
                        <div class="card__right">
                            <div class="item">First Name</div>
                        </div>
                        <div class="card__left">
                            <div class="item">{{$user->firstname}}</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card__right">
                            <div class="item">Last Name</div>
                        </div>
                        <div class="card__left">
                            <div class="item">{{$user->lastname}}</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card__right">
                            <div class="item">Email Address</div>
                        </div>
                        <div class="card__left">
                            <div class="item">{{$user->email}}</div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card__right">
                            <div class="item">Phone Number</div>
                        </div>
                        <div class="card__left">
                            <div class="item">{{$user->phone_number}}</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card__right">
                            <div class="item">Car(s)</div>
                        </div>
                        <div class="card__left cars">
                        @foreach ($cars as $car)
                        <div class="car-card">
                                <svg class="wave" viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0,256L11.4,240C22.9,224,46,192,69,192C91.4,192,114,224,137,234.7C160,245,183,235,206,213.3C228.6,192,251,160,274,149.3C297.1,139,320,149,343,181.3C365.7,213,389,267,411,282.7C434.3,299,457,277,480,250.7C502.9,224,526,192,549,181.3C571.4,171,594,181,617,208C640,235,663,277,686,256C708.6,235,731,149,754,122.7C777.1,96,800,128,823,165.3C845.7,203,869,245,891,224C914.3,203,937,117,960,112C982.9,107,1006,181,1029,197.3C1051.4,213,1074,171,1097,144C1120,117,1143,107,1166,133.3C1188.6,160,1211,224,1234,218.7C1257.1,213,1280,139,1303,133.3C1325.7,128,1349,192,1371,192C1394.3,192,1417,128,1429,96L1440,64L1440,320L1428.6,320C1417.1,320,1394,320,1371,320C1348.6,320,1326,320,1303,320C1280,320,1257,320,1234,320C1211.4,320,1189,320,1166,320C1142.9,320,1120,320,1097,320C1074.3,320,1051,320,1029,320C1005.7,320,983,320,960,320C937.1,320,914,320,891,320C868.6,320,846,320,823,320C800,320,777,320,754,320C731.4,320,709,320,686,320C662.9,320,640,320,617,320C594.3,320,571,320,549,320C525.7,320,503,320,480,320C457.1,320,434,320,411,320C388.6,320,366,320,343,320C320,320,297,320,274,320C251.4,320,229,320,206,320C182.9,320,160,320,137,320C114.3,320,91,320,69,320C45.7,320,23,320,11,320L0,320Z"
                                        fill-opacity="1"></path>
                                </svg>
                                <div class="car-content">
                                    <i class="message-icon bi bi-car-front-fill"></i>
                                    <p class="message-text">{{$car->car_plate}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

</html>