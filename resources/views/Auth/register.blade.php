<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Dot Tech</title>
    <link rel="icon" href="../../Media/home/traffic-light-icon.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('CSS/Auth/register.css') }}">
    <script src="{{ asset('JS/Auth/register.js') }}" defer></script>
</head>

<body>


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


    <div class="signup-container">

        <div class="header">
            <h1 class="title">Sign Up</h1>
            <p class="description">Please enter your details to sign up</p>
        </div>

        <form action="{{ route('store') }}" method="post">
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
                <input required minlength="6" 
                nopattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{6,}" 
                notitle="Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)" 
                type="password" name="password" class="form-control"
                placeholder="Password">
                <label class="user-label">Password</label>
                <span class="toggle-password">
                    <i id="eye-icon" class="bi bi-eye-fill"></i>
                </span>
            </div>

            <div class="form-floating">
                <input required minlength="6" 
                nopattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&]).{6,}" 
                notitle="Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&)" 
                type="password" name="password_confirmation" class="form-control"
                placeholder="Password">
                <label class="user-label">Confirm Password</label>
                <span class="toggle-password">
                    <i id="eye-icon" class="bi bi-eye-fill"></i>
                </span>
            </div>

            <button type="submit" class="submit-button">Sign Up</button>

            <div class="footer">
                Already have an account? <a href="{{ route('login') }}">Login</a>
            </div>

        </form>

    </div>

</body>

</html>