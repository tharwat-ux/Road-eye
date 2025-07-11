<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Report | Dot Tech</title>
    <link rel="icon" href="../../Media/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/User/reports.CSS') }}">
    <script src="{{ asset('JS/User/reports.js') }}" defer></script>
</head>

<body>
@if (session('error'))
<div class="error">
    <div class="error__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
    </div>
    <div class="error__title">{{ session('error') }}</div>
</div>
@endif
@if (session('success'))
<div class="error" id="not">
    <div class="error__icon">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    <path fill="#28a745" d="M9 19l-7-7 1.41-1.41L9 16.17l10.59-10.59L21 7l-12 12z"></path>
    </svg>
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
            <h2>Help us improve our services 😊</h2>
            <div class="box">
                <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <button class="button" id="uploadBtn">
                        <svg class="w-6 h-6" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"
                                stroke-linejoin="round" stroke-linecap="round"></path>
                        </svg>
                        <span class="text">Upload Photo</span>
                        <div class="upload-btn">
                            <input type="file" class="upload-photo" accept="image/*" name='report_img' id="fileInput">
                        </div>
                        <div class="loader" id="loader"></div>
                    </button>
                    <div class="file-name" id="fileName"></div>
                    <div class="success" id="successMsg">Upload successful!</div>
                    <div class="form-floating">
                        <textarea required name="report" id="report-area" cols="30" rows="10"
                            class="form-control" name='report_desc' ></textarea>
                        <label for="report-area" class="user-label">Report your issue</label>
                    </div>
                    <div class="btn-container">
                        <!-- From Uiverse.io by adamgiebl -->
                        <button id="update-btn" class="form-btn" type="submit">
                            <div class="svg-wrapper-1">
                                <div class="svg-wrapper">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                                        <path fill="none" d="M0 0h24v24H0z"></path>
                                        <path fill="currentColor"
                                            d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                            <span>Send</span>
                        </button>
                        <input class="form-btn" type="reset" value="Cancel">
                    </div>
                </form>
            </div>
        </div>

    </div>

</body>

</html>