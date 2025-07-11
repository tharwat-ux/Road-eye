<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile | Dot Tech</title>
    <link rel="icon" href="../../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/User/password_edit.css') }}">
    <script src="{{ asset('JS/User/password_edit.js') }}" defer></script>
</head>

<body>
@if (session('error') or $errors->any())
<div class="error">
    <div class="error__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
    </div>
    <div class="error__title">{{ session('error') }}{{ $errors->first() }}
    </div>
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
                <li><a href="{{ route('UserProfile',['id' =>auth()->user()->id]) }}" >View</a></li>
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
                <h2>Change Password</h2>
                <form action= "{{route('password.update',['id'=>auth()->id()])}}" method="post">
                @csrf
                    <div class="form-floating">
                        <input required type="password" name="current_password" class="form-control">
                        <label class="user-label">Current Password</label>
                        <span class="toggle-password">
                            <i id="eye-icon" class="fa-regular fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-floating">
                        <input required type="password" name="new_password" class="form-control">
                        <label class="user-label">New Password</label>
                        <span class="toggle-password">
                            <i id="eye-icon" class="fa-regular fa-eye"></i>
                        </span>
                    </div>
                    <div class="form-floating">
                        <input required type="password" name="new_password_confirmation" class="form-control">
                        <label class="user-label">Confirm Password</label>
                        <span class="toggle-password">
                            <i id="eye-icon" class="fa-regular fa-eye"></i>
                        </span>
                    </div>
                    <div class="btn-container">
                        <input id="update-btn" class="form-btn" type="submit" value="Change Password">
                        <!-- <input id="cancel" class="form-btn" type="reset" value="Cancel" onclick="hideDiv()"> -->
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>