<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Control | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/SuperAdmin/AdminControl.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script  src="{{ asset('JS/SuperAdmin/AdminControl.js') }}" defer></script>
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
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <div class="error">
        <div class="error__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
         </div>
        <div class="error__title">{{ $error }}</div>
        </div>
        @endforeach
        </ul>   
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
                <h2>Admins List</h2>
                @forelse ($Admins as $Admin)

                <form class="car-box" action="{{ route('admin.remove',['id'=>$Admin->id])}}" id="delete_form" method="post">
                @csrf
                @method('DELETE')
                    <div class="card">
                        <div class="message-text-container">
                            <p class="message-text">{{$Admin->firstname .' '.$Admin->lastname}}</p>
                            <p class="message-text">{{$Admin->email}}</p>
                            <p class="message-text">{{$Admin->phone_number}}</p>
                        </div>
                        <button type="button" onclick="confirmDelete({{ $Admin->id }})" class="close-btn">

                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 15 15" stroke-width="0" fill="none"
                                stroke="currentColor" class="cross-icon">
                                <path fill="currentColor"
                                    d="M11.7816 4.03157C12.0062 3.80702 12.0062 3.44295 11.7816 3.2184C11.5571 2.99385 11.193 2.99385 10.9685 3.2184L7.50005 6.68682L4.03164 3.2184C3.80708 2.99385 3.44301 2.99385 3.21846 3.2184C2.99391 3.44295 2.99391 3.80702 3.21846 4.03157L6.68688 7.49999L3.21846 10.9684C2.99391 11.193 2.99391 11.557 3.21846 11.7816C3.44301 12.0061 3.80708 12.0061 4.03164 11.7816L7.50005 8.31316L10.9685 11.7816C11.193 12.0061 11.5571 12.0061 11.7816 11.7816C12.0062 11.557 12.0062 11.193 11.7816 10.9684L8.31322 7.49999L11.7816 4.03157Z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </form>
                @empty
                <div class="box msg">
                No admins Yet
                </div>
                @endforelse

                <input class="btn-container form-btn sticky-btn" type="button" value="Add Admin" onclick="showDiv()">
            </div>

            <div id="edit" class="box edit">
                <h2>Add Admin</h2>
                <form class="profile-form" action="{{ route('admin.add')}}" method="post">
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
                        <input required type="password" name="password_confirmation" class="form-control">
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
                        <input id="update-btn" class="form-btn" type="submit" value="Add Admin">
                        <input id="cancel" class="form-btn" type="reset" value="Cancel" onclick="hideDiv()">
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>