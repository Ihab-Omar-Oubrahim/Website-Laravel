<head>
    @include('Potato.Account.auth_header')
    <title>Login</title>
</head>

<body>

    <div class="container">
        <div class="Header">
            <div class="img-con"> <a href="{{ route('index') }}"> <img src="{{ asset('assets/res/LogoTemp.png') }}"
                        alt="Logo"> </a></div>
            <h2> Potato Web </h2>
        </div>
        <div class="Form-Con d-block mx-auto" style="max-width: 500px">
            <div class="Auth_Form w-100 mx-auto">
                <form method="post" action="{{ route('login') }}" autocomplete="off">
                    @csrf
                    <h5> Login here </h4>
                        <input type="text" name="email" placeholder="Username or Email">
                        @error('email')
                            <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                        @enderror <br>
                        <div class="password-container">
                            <input type="password" id="log_password" name="password" placeholder="Password">
                            @error('password')
                                <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                            @enderror
                            <span class="toggle-password" id="togglePassword">
                                <i class="far fa-eye-slash"></i>
                            </span>
                        </div> <br>
                        <div class="rememberMe">
                            <label class="custom-checkbox">
                                <input type="checkbox" name="remember">
                                <span class="checkmark"></span>
                            </label>
                            <span class="label mt-2" id="R-text">Remember <span id="me-t"> me</span></span>
                        </div>

                        <br><br>
                        <button type="submit"> Login </button> <br>

                        <p>Don't have an account ? <a href="{{ route('register') }}" id="Login_link">Sign in</a></p>
                </form>
            </div>
        </div>

    </div>

    <script src="{{ asset('assets/JS/Scripts/Web_Pages/Auth/login.js') }}"></script>

</body>
