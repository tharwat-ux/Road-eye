<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile | Dot Tech</title>
    <link rel="icon" href="../../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/User/profile_edit.css') }}">
    <script src="{{ asset('JS/User/profile_edit.js') }}" defer></script>
</head>

<body>

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
                    <a href="../../Analytics/index.html">
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
                <h2>Edit Info</h2>
                <form action="{{ route('profile_update', ['id' =>auth()->user()->id]) }}" method="post" enctype="multipart/form-data">
                 @csrf  
                    <div class="image-container circle" id="imageContainer">
                        <img id="previewImage" src="{{ asset(auth()->user()->image)}}" alt="اختر صورة" >
                        <label class="upload-btn">
                            Upload Image
                            <input type="file" id="imageInput" accept="image/*" name="image">
                        </label>
                    </div>
                    <div class="username">
                        <div class="form-floating">
                            <input required type="text" name="firstname" class="form-control" placeholder="" value="{{$user->firstname}}">
                            <label class="user-label">First Name</label>
                        </div>

                        <div class="form-floating">
                            <input required type="text" name="lastname" class="form-control" placeholder="" value="{{$user->lastname}}">
                            <label class="user-label">Last Name</label>
                        </div>
                    </div>
                    <div class="form-floating">
                        <input required type="email" name="email" class="form-control" placeholder="" value="{{$user->email}}">
                        <label class="user-label">Email Address</label>
                    </div>
                    <div class="form-floating">
                        <input type="tel" name="phone" class="form-control" placeholder="" value="{{$user->phone_number}}">
                        <label class="user-label">Phone Number</label>
                    </div>
                    <div class="form-floating">
                        <input type="text" name="car_id" class="form-control" placeholder="" id="car">
                        <label class="user-label">Add Car</label>
                    </div>
                    <div class="btn-container">
                        <input id="update-btn" class="form-btn" type="submit" value="Update Info">
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>