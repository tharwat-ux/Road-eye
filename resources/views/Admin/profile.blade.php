<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/Admin/profile.css') }}">
    <script  src="{{ asset('JS/Admin/profile.js') }}" defer></script>
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
            <div id="info" class="box info">
                <h2>Profile Info</h2>
                <div class="card">
                    <div class="card__right">
                        <div class="item">First Name</div>
                        <div class="item">Last Name</div>
                        <div class="item">Email Address</div>
                        <div class="item">Phone Number</div>
                    </div>
                    <div class="card__left">
                        <div class="item">{{$Admin->firstname}}</div>
                        <div class="item">{{$Admin->lastname}}</div>
                        <div class="item">{{$Admin->email}}</div>
                        <div class="item">{{$Admin->phone_number}}</div>
                    </div>
                </div>
                <input class="btn-container form-btn" type="button" value="Edit Profile" onclick="showDiv()">
            </div>

            <div id="edit" class="box edit">
                <h2>Edit Profile</h2>
                <form action="{{route('AdminProfile.update', ['id' => auth()->user()->id])}}" method="post">
                    @csrf
                    <div class="username">
                        <div class="form-floating">
                            <input required type="text" name="firstname" class="form-control">
                            <label class="user-label">First Name</label>
                        </div>

                        <div class="form-floating">
                            <input required type="text" name="lastname" class="form-control">
                            <label class="user-label">Last Name</label>
                        </div>
                    </div>
                    <div class="form-floating">
                        <input required type="email" name="email" class="form-control">
                        <label class="user-label">Email Address</label>
                    </div>
                    <div class="form-floating">
                        <input required type="password" name="password" class="form-control">
                        <label class="user-label">Password</label>
                        <span class="toggle-password">
                            <i id="eye-icon" class="fa-regular fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-floating">
                        <input required type="password" name="confirm-password" class="form-control">
                        <label class="user-label">Confirm Password</label>
                        <span class="toggle-password">
                            <i id="eye-icon" class="fa-regular fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-floating">
                        <input required type="tel" name="phone" class="form-control">
                        <label class="user-label">Phone Number</label>
                    </div>
                    <div class="btn-container">
                        <input id="update-btn" class="form-btn" type="submit" value="Update Profile">
                        <input id="cancel" class="form-btn" type="reset" value="Cancel" onclick="hideDiv()">
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>